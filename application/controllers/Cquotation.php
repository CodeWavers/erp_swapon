<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cquotation extends CI_Controller
{

    public $menu;
    private $user_id;
    private $user_type;

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('session');
        $this->load->model('Quotation_model');
        $this->load->model('Web_settings');
        $this->load->model('Products');
        $this->auth->check_admin_auth();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
    }

    // Job Form
    public function index()
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Courier');
        $CI->load->model('Service');
        $CI->load->model('Warehouse');
        $CI->load->model('Settings');
        $CI->load->model('Aggre');

        $card_list = $CI->Settings->get_real_card_data();
        $employee_list    = $CI->Service->employee_list();
        $customer_details = $CI->Invoices->pos_customer_setup();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $bank_list          = $CI->Web_settings->bank_list();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $courier_list        = $CI->Courier->get_courier_list();
        $branch_list        = $CI->Courier->get_branch_list();
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $receiver_list        = $CI->Courier->get_receiver_list();

        $outlet_list = $CI->Warehouse->branch_list_product();

        $cw = $CI->Warehouse->central_warehouse();
        $aggre_list = $CI->Aggre->aggre_list_product();

        $data = array(
            'title'         => display('add_new_invoice'),
            'employee_list' => $employee_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'customer_name' => $customer_details[0]['customer_name'],
            'customer_id'   => $customer_details[0]['customer_id'],
            'customer_id_two'   => $customer_details[0]['customer_id_two'],
            'card_list'     => $card_list,
            'bank_list'     => $bank_list,
            'bkash_list'     => $bkash_list,
            'nagad_list'     => $nagad_list,
            'courier_list'     => $courier_list,
            'branch_list'     => $branch_list,
            'outlet_list'     => $outlet_user,
            'receiver_list'    => $receiver_list,
            'aggre_list'    => $aggre_list,
            'cw'            => $cw
        );
        $content = $this->parser->parse('quotation/quotation_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function pre_order(){
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Quotation_model');
        $invoice_id = $CI->Quotation_model->pre_order_entry();
        if (!empty($invoice_id)) {
            $this->session->set_userdata(array('message' => display('quotation_successfully_added')));
            redirect(base_url('Cquotation/manage_quotation'));
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Cquotation'));
        }



    }




    //    ========== its for  insert_quotation =============
    public function  insert_quotation()
    {
        $quot_id = $this->auth->generator(15);
        $tablecolumn = $this->db->list_fields('quotation_taxinfo');
        $num_column = count($tablecolumn) - 4;
        $customershow = 0;
        $status = 1;
        $data = array(
            'quotation_id'        => $quot_id,
            'customer_id'         => $this->input->post('customer_id', TRUE),
            'outlet_id'         => $this->input->post('outlet_id', TRUE),
            'quotdate'            => $this->input->post('qdate', TRUE),
            'expire_date'         => $this->input->post('expiry_date', TRUE),
            'item_total_amount'   => $this->input->post('grand_total_price', TRUE),
            'advance_paid'  => $this->input->post('paid_amount', TRUE),
            'due_amount'  => $this->input->post('due_amount', TRUE),
            'item_total_dicount'  => $this->input->post('total_discount', TRUE),
            // 'item_total_tax'      => $this->input->post('total_tax', TRUE),
            // 'service_total_amount' => $this->input->post('grand_total_service_amount', TRUE),
            // 'service_total_discount' => $this->input->post('totalServiceDicount', TRUE),
            // 'service_total_tax'   => $this->input->post('total_service_tax', TRUE),
            'quot_dis_item'       => $this->input->post('invoice_discount', TRUE),
            'quot_dis_service'    => $this->input->post('service_discount', TRUE),
            'quot_no'             => $this->input->post('quotation_no', TRUE),
            'create_by'           => $this->session->userdata('user_id'),
            'quot_description'    => $this->input->post('details', TRUE),
            'status'              => $status,
        );

        $result = $this->Quotation_model->quotation_entry($data);

        if ($result == TRUE) {
            // Used Item Details Part
            $item         = $this->input->post('product_id', TRUE);
            $serial       = $this->input->post('serial_no', TRUE);
            $descrp       = $this->input->post('desc', TRUE);
            $item_rate    = $this->input->post('product_rate', TRUE);
            $item_supp_rate = $this->input->post('supplier_price', TRUE);
            $item_qty     = $this->input->post('product_quantity', TRUE);
            $item_dis_per = $this->input->post('discount', TRUE);
            $item_total_discount = $this->input->post('discount_amount', TRUE);
            $item_tax     = $this->input->post('tax', TRUE);
            $totalp       =  $this->input->post('total_price', TRUE);
            for ($j = 0, $n = count($item); $j < $n; $j++) {
                $product_id    = $item[$j];
                $rate          = $item_rate[$j];
                $qty           = $item_qty[$j];
                $supplier_rate = $item_supp_rate[$j];
                $discount      = $item_dis_per[$j];
                $totaldiscount = $item_total_discount[$j];
                // $tax           = $item_tax[$j];
                // $srl           = $serial[$j];
                $dcript        = $descrp[$j];
                $total_price   = $totalp[$j];
                $quotitem = array(
                    'quot_id'       => $quot_id,
                    'product_id'    => $product_id,
                    // 'serial_no'     => $srl,
                    'description'   => $dcript,
                    'rate'          => $rate,
                    'supplier_rate' => $supplier_rate,
                    'total_price'   => $total_price,
                    'discount_per'  => $discount,
                    'discount'      => $totaldiscount,
                    // 'tax'           => $tax,
                    'used_qty'      => $qty,
                );
                $this->db->insert('quot_products_used', $quotitem);
            }


            $this->session->set_userdata(array('message' => display('quotation_successfully_added')));
            redirect(base_url('Cquotation/manage_quotation'));
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Cquotation'));
        }
    }

    //    ========== its for get_customer_info ===========
    public function get_customer_info()
    {
        $customer_id = $this->input->post('customer_id', TRUE);
        $get_customer_info = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
        echo json_encode($get_customer_info);
    }

    //    ============ its for invoice pdf generate =======
    public function quotation_pdf_generate($quot_id = null)
    {
        $id = $quot_id;
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $data['currency_details'] = $this->Web_settings->retrieve_setting_editdata();
        $data['discount_type']   = $currency_details[0]['discount_type'];
        $data['title']            = display('quotation_details');
        $data['quot_service']     = $this->Quotation_model->quot_service_detail($quot_id);
        $data['quot_main']        = $this->Quotation_model->quot_main_edit($quot_id);
        $data['quot_product']     = $this->Quotation_model->quot_product_detail($quot_id);
        $data['customer_info']    = $this->Quotation_model->customerinfo($data['quot_main'][0]['customer_id']);
        $data['company_info'] = $this->Quotation_model->retrieve_company();
        $name    = $data['customer_info'][0]['customer_name'];
        $email   = $data['customer_info'][0]['customer_email'];
        $this->load->library('pdfgenerator');
        $html   = $this->load->view('quotation/quotation_invoice_pdf', $data, true);
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/quotation/' . $id . '.pdf', $output);
        $file_path = getcwd() . '/assets/data/pdf/quotation/' . $id . '.pdf';
        $send_email = '';
        if (!empty($email)) {
            $send_email = $this->setmail($email, $file_path, $id, $name);

            if ($send_email) {
                return 1;
            } else {
                return 0;
            }
        }
        return 0;
    }

    public function setmail($email, $file_path, $id = null, $name = null)
    {
        $setting_detail = $this->db->select('*')->from('email_config')->get()->row();
        $subject = 'Quotation Information';
        $message = strtoupper($name) . '-' . $id;
        $config = array(
            'protocol'  => $setting_detail->protocol,
            'smtp_host' => $setting_detail->smtp_host,
            'smtp_port' => $setting_detail->smtp_port,
            'smtp_user' => $setting_detail->smtp_user,
            'smtp_pass' => $setting_detail->smtp_pass,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'wordwrap'  => TRUE
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($setting_detail->smtp_user);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->attach($file_path);
        $check_email = $this->test_input($email);
        if (filter_var($check_email, FILTER_VALIDATE_EMAIL)) {
            if ($this->email->send()) {
                return true;
            } else {
                $this->session->set_flashdata(array('exception' => display('please_configure_your_mail.')));
                return false;
            }
        } else {

            return false;
        }
    }

    //Email testing for email
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //========= its for customer ownquotation count ============
    public function customer_ownquotation_count($user_id, $user_type)
    {
        $this->db->select('count(a.quotation_id) ttl_quotation');
        $this->db->from('quotation a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->order_by('a.id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    //    ============= its for  manage quotation ============
    public function manage_quotation()
    {
        $data['currency_details'] = $this->Web_settings->retrieve_setting_editdata();
        $data['title'] = display('manage_quotation');
        $config["base_url"] = base_url('Cquotation/manage_quotation/');
        $config["total_rows"] = $this->db->count_all('quotation');
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $config["last_link"] = "Last";
        $config["first_link"] = "First";
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';
        #Paggination end#


        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $limit = $config["per_page"];
        $data['quotation_list'] = $this->Quotation_model->pre_order_list($limit, $page);
        $data['links'] = $this->pagination->create_links();
        $data['pagenum'] = $page;

        $content = $this->parser->parse('quotation/quotation_list', $data, true);
        $this->template->full_admin_html_view($content);
    }



    public function quot_number_generator()
    {
        $this->db->select_max('quot_no', 'quot_no');
        $query   = $this->db->get('quotation');
        $result  = $query->result_array();
        $quot_no = $result[0]['quot_no'];
        if ($quot_no != '') {
            $quot_no = $quot_no + 1;
        } else {
            $quot_no = 1000;
        }
        return $quot_no;
    }

    // quotation delete
    public function delete_quotation($quot_id = null)
    {
        if ($this->Quotation_model->quotation_delete($quot_id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect(base_url('Cquotation/manage_quotation'));
    }

    public function invoice_update_form($invoice_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->pre_invoice_edit_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }

    //    ========= its for available quantity check  only job performed===========
    public function available_quantity_check()
    {
        $product_id = $this->input->post('product_id', TRUE);
        $this->db->select('SUM(a.quantity) as total_purchase');
        $this->db->from('product_purchase_details a');
        $this->db->where('a.product_id', $product_id);
        $total_purchase = $this->db->get()->row();

        $this->db->select('SUM(b.quantity) as total_sale');
        $this->db->from('invoice_details b');
        $this->db->where('b.product_id', $product_id);
        $total_sale = $this->db->get()->row();

        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where(array('product_id' => $product_id, 'status' => 1));
        $product_information = $this->db->get()->row();
        $available_quantity  = ($total_purchase->total_purchase - $total_sale->total_sale);
        $result = array(
            'available_qty' => $available_quantity,
            'price'         => $product_information->price,
        );
        echo json_encode($result);
    }

    // Quotation To Sales
    public function quotation_to_sales($quot_id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Courier');
        $CI->load->model('Invoices');
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');

        $card_list = $CI->Settings->get_real_card_data();
        $bank_list          = $CI->Web_settings->bank_list();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();



        $branch_list        = $CI->Courier->get_branch_list();
        $receiver_list        = $CI->Courier->get_receiver_list();
        $payment_details = $this->Quotation_model->payment_details($quot_id);


        $taxfield = $this->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();

        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $currency_details     = $this->Web_settings->retrieve_setting_editdata();
        $data['currency_details'] = $this->Web_settings->retrieve_setting_editdata();
        $data['title']        = display('quotation_details');
        $data['quot_main']    = $this->Quotation_model->quot_main_edit($quot_id);
        $data['quot_product'] = $this->Quotation_model->quot_product_detail($quot_id);
        $data['quot_service'] = $this->Quotation_model->quot_service_detail($quot_id);
        $data['customer_info'] = $this->Quotation_model->customerinfo($data['quot_main'][0]['customer_id']);
        $data['itemtaxin']    = $this->Quotation_model->itemtaxdetails($data['quot_main'][0]['quot_no']);
        $data['servicetaxin'] = $this->Quotation_model->servicetaxdetails($data['quot_main'][0]['quot_no']);
        $data['taxes']       = $taxfield;
        $data['taxnumber']   = $num_column;
        $data['bank_list']   = $bank_list;
        $data['card_list']   = $card_list;
        $data['bkash_list']   = $bkash_list;
        $data['nagad_list']   = $nagad_list;
        $data['customers']   = $this->Quotation_model->get_allcustomer();
        $data['get_productlist'] = $this->Quotation_model->get_allproduct();
        $data['discount_type']   = $currency_details[0]['discount_type'];
        $data['company_info'] = $this->Quotation_model->retrieve_company();
        $data['branch_list']     = $branch_list;
        $data['receiver_list']    = $receiver_list;
        $data['previous']    =  $CI->Invoices->get_customer_previous($data['quot_main'][0]['customer_id']);
        $data['payment_info']    = $payment_details;


        $content = $this->parser->parse('quotation/quotation_to_sales', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function pre_to_sales($invoice_id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Courier');
        $CI->load->model('Invoices');
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        $inv_details=$this->db->from('invoice')->where('invoice_id',$invoice_id)->get()->row();


        $Vdate = $this->input->post('invoice_date', TRUE);

        $this->db->set('is_pre',1);
        $this->db->where('invoice_id',$invoice_id);
        $this->db->update('invoice');

        $this->db->set('pre_order',1);
        $this->db->where('invoice_id',$invoice_id);
        $this->db->update('invoice_details');

        $coscr = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INV',
            'VDate'          =>  $Vdate,
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory credit For Invoice No' . $inv_details->invoice,
            'Debit'          =>  0,
            'Credit'         =>  $inv_details->total_amount, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );



        $pro_sale_income = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INVOICE',
            'VDate'          =>  $Vdate,
            'COAID'          =>  303,
            'Narration'      =>  'Sale Income For Invoice ID - ' . $invoice_id . ' Customer ' .$cs_name,
            'Debit'          =>  0,
            'Credit'         => (!empty($courier_pay) ? $courier_pay : null),
            'IsPosted'       => 1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $pro_sale_income);

        $this->session->set_userdata(array('message' => 'Added to Invoice'));
        redirect(base_url('Cquotation/manage_quotation'));

    }

    // Edit quotation
    public function quotation_edit($quot_id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $card_list = $CI->Settings->get_real_card_data();
        $bank_list          = $CI->Web_settings->bank_list();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();

        $taxfield = $this->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();

        $payment_details = $this->Quotation_model->payment_details($quot_id);

        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $data['currency_details'] = $this->Web_settings->retrieve_setting_editdata();
        $data['title'] = display('quotation_details');
        $data['quot_main']    = $this->Quotation_model->quot_main_edit($quot_id);
        $data['quot_product'] = $this->Quotation_model->quot_product_detail($quot_id);
        $data['quot_service'] = $this->Quotation_model->quot_service_detail($quot_id);
        $data['customer_info'] = $this->Quotation_model->customerinfo($data['quot_main'][0]['customer_id']);
        $data['itemtaxin']    = $this->Quotation_model->itemtaxdetails($data['quot_main'][0]['quot_no']);
        $data['servicetaxin'] = $this->Quotation_model->servicetaxdetails($data['quot_main'][0]['quot_no']);
        $data['taxes']       = $taxfield;
        $data['taxnumber']   = $num_column;
        $data['customers']   = $this->Quotation_model->get_allcustomer();
        $data['get_productlist'] = $this->Quotation_model->get_allproduct();
        $data['discount_type']   = $currency_details[0]['discount_type'];
        $data['company_info'] = $this->Quotation_model->retrieve_company();
        $data['card_list']     = $card_list;
        $data['bank_list']     = $bank_list;
        $data['bkash_list']    = $bkash_list;
        $data['nagad_list']    = $nagad_list;
        $data['payment_info']    = $payment_details;
        $content = $this->parser->parse('quotation/quotation_update', $data, true);
        $this->template->full_admin_html_view($content);
    }


    public function update_quotation()
    {
        $quot_id = $this->input->post('quotation_id', TRUE);
        $tablecolumn = $this->db->list_fields('quotation_taxinfo');
        $num_column = count($tablecolumn) - 4;
        $customershow = 0;
        $status = 1;
        $data = array(
            'quotation_id'        => $quot_id,
            'customer_id'         => $this->input->post('customer_id', TRUE),
            'quotdate'            => $this->input->post('qdate', TRUE),
            'expire_date'         => $this->input->post('expiry_date', TRUE),
            'item_total_amount'   => $this->input->post('grand_total_price', TRUE),
            'item_total_amount'   => $this->input->post('grand_total_price', TRUE),
            'advance_paid'  => $this->input->post('paid_amount', TRUE),
            'due_amount'  => $this->input->post('due_amount', TRUE),
            // 'item_total_tax'      => $this->input->post('total_tax', TRUE),
            // 'service_total_amount' => $this->input->post('grand_total_service_amount', TRUE),
            // 'service_total_discount' => $this->input->post('totalServiceDicount', TRUE),
            // 'service_total_tax'   => $this->input->post('total_service_tax', TRUE),
            'quot_dis_item'       => $this->input->post('invoice_discount', TRUE),
            'quot_dis_service'    => $this->input->post('service_discount', TRUE),
            'quot_no'             => $this->input->post('quotation_no', TRUE),
            'create_by'           => $this->session->userdata('user_id'),
            'quot_description'    => $this->input->post('details', TRUE),
            'status'              => $status,
        );

        $result = $this->Quotation_model->quotation_update($data);

        if ($result == TRUE) {

            $this->db->where('quot_id', $quot_id);
            $this->db->delete('quot_products_used');
            $this->db->where('quot_id', $quot_id);
            $this->db->delete('quotation_service_used');
            // Used Item Details Part
            $item         = $this->input->post('product_id', TRUE);
            // $serial       = $this->input->post('serial_no', TRUE);
            // $descrp       = $this->input->post('desc', TRUE);
            $item_rate    = $this->input->post('product_rate', TRUE);
            $item_supp_rate = $this->input->post('supplier_price', TRUE);
            $item_qty     = $this->input->post('product_quantity', TRUE);
            $item_dis_per = $this->input->post('discount', TRUE);
            $item_total_discount = $this->input->post('discount_amount', TRUE);
            // $item_tax     = $this->input->post('tax', TRUE);
            $totalp       =  $this->input->post('total_price', TRUE);
            for ($j = 0, $n = count($item); $j < $n; $j++) {
                $product_id    = $item[$j];
                $rate          = $item_rate[$j];
                $qty           = $item_qty[$j];
                $supplier_rate = $item_supp_rate[$j];
                $discount      = $item_dis_per[$j];
                $totaldiscount = $item_total_discount[$j];
                // $tax           = $item_tax[$j];
                // $srl           = $serial[$j];
                // $dcript        = $descrp[$j];
                $total_price   = $totalp[$j];
                $quotitem = array(
                    'quot_id'       => $quot_id,
                    'product_id'    => $product_id,
                    // 'serial_no'     => $srl,
                    // 'description'   => $dcript,
                    'rate'          => $rate,
                    'supplier_rate' => $supplier_rate,
                    'total_price'   => $total_price,
                    'discount_per'  => $discount,
                    'discount'      => $totaldiscount,
                    // 'tax'           => $tax,
                    'used_qty'      => $qty,
                );


                $this->db->insert('quot_products_used', $quotitem);
            }

            $this->session->set_userdata(array('message' => display('quotation_successfully_updated')));
            redirect(base_url('Cquotation/manage_quotation'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Cquotation'));
        }
    }

    public function add_quotation_to_invoice()
    {
        $CI = &get_instance();
        // echo '<pre>';
        // print_r($_POST);
        // exit();
        $quotation_id = $this->input->post('quotation_id', TRUE);
        $quotation_no = $this->input->post('quotation_no', TRUE);
        $customer_id  = $this->input->post('customer_id', TRUE);
        $invoice_id   = $this->generator(10);
        $invoice_id   = strtoupper($invoice_id);
        $createby     = $this->session->userdata('user_id');
        $createdate   = date('Y-m-d H:i:s');
        $quantity     = $this->input->post('product_quantity', TRUE);
        $tablecolumn  = $this->db->list_fields('tax_collection');
        $num_column   = count($tablecolumn) - 4;

        $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
        $headn   = $customer_id . '-' . $cusifo->customer_name;
        $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
        $customer_headcode = $coainfo->HeadCode;


        $quotdata = array(
            'status'  => 2,
        );
        $this->db->where('quotation_id', $quotation_id);
        $this->db->update('quotation', $quotdata);

        $acc_data = array(
            'Vtype' => 'INVOICE',
            'VNo'   => $invoice_id
        );

        $this->db->where('VNo', $quotation_id);
        $this->db->update('acc_transaction', $acc_data);

        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $quantity = $this->input->post('product_quantity', TRUE);
        $invoice_no_generated = $this->number_generator();

        $Vdate = $this->input->post('invoice_date', TRUE);

        $pay_type = $this->input->post('paytype', TRUE);
        $p_amount = $this->input->post('p_amount', TRUE);
        // echo '<pre>'; print_r(count($pay_type)); exit();
        $cus_card = $this->input->post('cus_card', TRUE);


        $changeamount = $this->input->post('change', TRUE);
        if ($changeamount > 0) {
            $paidamount = $this->input->post('n_total', TRUE);
        } else {
            $paidamount = $this->input->post('paid_amount', TRUE);
        }

        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $bkashname = '';
        $card_id = $this->input->post('card_id', TRUE);

        $nagad_id = $this->input->post('nagad_id', TRUE);


        $available_quantity = $this->input->post('available_quantity', TRUE);
        $currency_details = $this->Web_settings->retrieve_setting_editdata();

        $result = array();
        foreach ($available_quantity as $k => $v) {
            if ($v < $quantity[$k]) {
                $this->session->set_userdata(array('error_message' => display('you_can_not_buy_greater_than_available_qnty')));
                redirect('Cinvoice');
            }
        }



        $product_id = $this->input->post('product_id', TRUE);
        if ($product_id == null) {
            $this->session->set_userdata(array('error_message' => display('please_select_product')));
            redirect('Cinvoice/pos_invoice');
        }

        if (($this->input->post('customer_name_others', TRUE) == null) && ($this->input->post('customer_id') == null) && ($this->input->post('customer_name', TRUE) == null)) {
            $this->session->set_userdata(array('error_message' => display('please_select_customer')));
            redirect(base_url() . 'Cinvoice');
        }





        if (($this->input->post('customer_id') == null) && ($this->input->post('customer_name') == null)) {

            $data = array(
                'customer_name'    => $this->input->post('customer_name_others', TRUE),
                'customer_address' => $this->input->post('customer_name_others_address', TRUE),
                'customer_mobile'  => $this->input->post('customer_mobile', TRUE),
                'customer_email'   => "",
                'status'           => 2
            );



            $this->db->insert('customer_information', $data);
            $customer_id = $this->db->insert_id();
            $coa = $this->headcode();
            if ($coa->HeadCode != NULL) {
                $headcode = $coa->HeadCode + 1;
            } else {
                $headcode = "102030000001";
            }
            $c_acc = $customer_id . '-' . $this->input->post('customer_name_others', TRUE);
            $createby = $this->session->userdata('user_id');
            $createdate = date('Y-m-d H:i:s');
            $customer_coa = [
                'HeadCode'         => $headcode,
                'HeadName'         => $c_acc,
                'PHeadName'        => 'Customer Receivable',
                'HeadLevel'        => '4',
                'IsActive'         => '1',
                'IsTransaction'    => '1',
                'IsGL'             => '0',
                'HeadType'         => 'A',
                'IsBudget'         => '0',
                'IsDepreciation'   => '0',
                'DepreciationRate' => '0',
                'CreateBy'         => $createby,
                'CreateDate'       => $createdate,
            ];
            $this->db->insert('acc_coa', $customer_coa);
            $this->db->select('*');
            $this->db->from('customer_information');
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $json_customer[] = array('label' => $row->customer_name, 'value' => $row->customer_id);
            }
            $cache_file = './my-assets/js/admin_js/json/customer.json';
            $customerList = json_encode($json_customer);
            file_put_contents($cache_file, $customerList);


            //Previous balance adding -> Sending to customer model to adjust the data.
            $this->Customers->previous_balance_add(0, $customer_id);
        } else {
            $customer_id = $this->input->post('customer_id', TRUE);
        }


        //Full or partial Payment record.
        $paid_amount = $this->input->post('paid_amount', TRUE);
        if ($this->input->post('paid_amount', TRUE) >= 0) {

            $this->db->set('status', '1');
            $this->db->where('customer_id', $customer_id);

            $this->db->update('customer_information');
        }
        $transection_id = $this->auth->generator(15);


        for ($j = 0; $j < $num_column; $j++) {
            $taxfield = 'tax' . $j;
            $taxvalue = 'total_tax' . $j;
            $taxdata[$taxfield] = $this->input->post($taxvalue);
        }
        $taxdata['customer_id'] = $customer_id;
        $taxdata['date']        = (!empty($this->input->post('invoice_date', TRUE)) ? $this->input->post('invoice_date', TRUE) : date('Y-m-d'));
        $taxdata['relation_id'] = $invoice_id;
        $this->db->insert('tax_collection', $taxdata);

        // Inserting for Accounts adjustment.
        ############ default table :: customer_payment :: inflow_92mizdldrv #################


        //Data inserting into invoice table
        $delivery_type = $this->input->post('deliver_type', TRUE);

        if ($this->input->post('paid_amount', TRUE) <= 0) {

            $datainv = array(
                'invoice_id'      => $invoice_id,
                'customer_id'     => $customer_id,
                'date'            => (!empty($this->input->post('invoice_date', TRUE)) ? $this->input->post('invoice_date', TRUE) : date('Y-m-d')),
                'total_amount'    => $this->input->post('grand_total_price', TRUE),
                'total_tax'       => $this->input->post('total_tax', TRUE),
                'customer_name_two'       => $this->input->post('customer_name_two', TRUE),
                'customer_mobile_two'       => $this->input->post('customer_mobile_two', TRUE),
                'invoice'         => $invoice_no_generated,
                'invoice_details' => (!empty($this->input->post('inva_details', TRUE)) ? $this->input->post('inva_details', TRUE) : ''),
                'invoice_discount' => $this->input->post('invoice_discount', TRUE),
                'total_discount'  => $this->input->post('total_discount', TRUE),
                'paid_amount'     => $this->input->post('paid_amount', TRUE),
                'due_amount'      => $this->input->post('due_amount', TRUE),
                'prevous_due'     => $this->input->post('previous', TRUE),
                'shipping_cost'   => $this->input->post('shipping_cost', TRUE),
                'sales_by'        => $createby,
                'status'          => 2,
                // 'payment_type'    =>  $this->input->post('paytype',TRUE),
                'delivery_type'    =>  $delivery_type,
                // 'bank_id'         => (!empty($this->input->post('bank_id', TRUE)) ? $this->input->post('bank_id', TRUE) : null),
                // 'bkash_id'         => (!empty($this->input->post('bkash_id', TRUE)) ? $this->input->post('bkash_id', TRUE) : null),
                // 'nagad_id'         => (!empty($this->input->post('nagad_id', TRUE)) ? $this->input->post('nagad_id', TRUE) : null),
                'courier_id'         => (!empty($this->input->post('courier_id', TRUE)) ? $this->input->post('courier_id', TRUE) : null),
                'branch_id'         => (!empty($this->input->post('branch_id', TRUE)) ? $this->input->post('branch_id', TRUE) : null),
                'outlet_id'       =>  $this->input->post('outlet_name', TRUE),
                'reciever_id'       => $this->input->post('deli_reciever', TRUE),
                'receiver_number'     => $this->input->post('del_rec_num', TRUE),
                'customer_card_no'      => $cus_card,

            );


            // echo '<pre>'; print_r($datainv); exit();
            $this->db->insert('invoice', $datainv);



            $cheque_date = $this->input->post('cheque_date', TRUE);
            $cheque_no = $this->input->post('cheque_no', TRUE);
            $cheque_type = $this->input->post('cheque_type', TRUE);
            $amount = $this->input->post('amount', TRUE);



            $this->load->library('upload');
            $image = array();
            if ($_FILES['image']['name']) {
                $ImageCount = count($_FILES['image']['name']);
                for ($i = 0; $i < $ImageCount; $i++) {
                    $_FILES['file']['name']       = $_FILES['image']['name'][$i];
                    $_FILES['file']['type']       = $_FILES['image']['type'][$i];
                    $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$i];
                    $_FILES['file']['error']      = $_FILES['image']['error'][$i];
                    $_FILES['file']['size']       = $_FILES['image']['size'][$i];

                    // File upload configuration
                    $uploadPath = 'my-assets/image/cheque/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
                    $config['encrypt_name']  = TRUE;

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // print_r('ues');

                    // Upload file to server
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data

                        $imageData = $this->upload->data();
                        $uploadImgData[$i]['image'] = $config['upload_path'] . $imageData['file_name'];
                        $image_url = base_url() . $uploadImgData[$i]['image'];
                    }
                }
            }

            if (!empty($cheque_no) && !empty($cheque_date)) {

                foreach ($cheque_no as $key => $value) {


                    $data['cheque_no'] = $value;
                    $data['invoice_id'] = $invoice_id;
                    $data['cheque_id'] = $this->generator(10);
                    $data['cheque_type'] = $cheque_type[$key];
                    $data['cheque_date'] = $cheque_date[$key];
                    $data['amount'] = $amount[$key];
                    $data['image'] = (!empty($image_url) ? $image_url : base_url('my-assets/image/product.png'));
                    $data['status'] = 2;

                    if (!empty($data)) {
                        $this->db->insert('cus_cheque', $data);
                    }
                }
            }
        } else {


            $cheque_date = $this->input->post('cheque_date', TRUE);
            $cheque_no = $this->input->post('cheque_no', TRUE);
            $cheque_type = $this->input->post('cheque_type', TRUE);
            $amount = $this->input->post('amount', TRUE);



            $this->load->library('upload');
            $image = array();

            if ($_FILES['image']['name']) {
                $ImageCount = count($_FILES['image']['name']);
                for ($i = 0; $i < $ImageCount; $i++) {
                    $_FILES['file']['name']       = $_FILES['image']['name'][$i];
                    $_FILES['file']['type']       = $_FILES['image']['type'][$i];
                    $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$i];
                    $_FILES['file']['error']      = $_FILES['image']['error'][$i];
                    $_FILES['file']['size']       = $_FILES['image']['size'][$i];

                    // File upload configuration
                    $uploadPath = 'my-assets/image/cheque/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
                    $config['encrypt_name']  = TRUE;

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    // print_r('ues');

                    // Upload file to server
                    if ($this->upload->do_upload('file')) {
                        // Uploaded file data

                        $imageData = $this->upload->data();
                        $uploadImgData[$i]['image'] = $config['upload_path'] . $imageData['file_name'];
                        $image_url = base_url() . $uploadImgData[$i]['image'];
                    }
                }
            }
            if (!empty($cheque_no) && !empty($cheque_date)) {

                foreach ($cheque_no as $key => $value) {


                    $data['cheque_no'] = $value;
                    $data['invoice_id'] = $invoice_id;
                    $data['cheque_id'] = $this->generator(10);
                    $data['cheque_type'] = $cheque_type[$key];
                    $data['cheque_date'] = $cheque_date[$key];
                    $data['amount'] = $amount[$key];
                    $data['image'] = (!empty($image_url) ? $image_url : base_url('my-assets/image/product.png'));
                    $data['status'] = 2;

                    if (!empty($data)) {
                        $this->db->insert('cus_cheque', $data);
                    }
                }
            }


            $datainv = array(
                'invoice_id'      => $invoice_id,
                'customer_id'     => $customer_id,
                'date'            => (!empty($this->input->post('invoice_date', TRUE)) ? $this->input->post('invoice_date', TRUE) : date('Y-m-d')),
                'total_amount'    => $this->input->post('grand_total_price', TRUE),
                'total_tax'       => $this->input->post('total_tax', TRUE),
                'invoice'         => $invoice_no_generated,
                'invoice_details' => (!empty($this->input->post('inva_details', TRUE)) ? $this->input->post('inva_details', TRUE) : ''),
                'invoice_discount' => $this->input->post('invoice_discount', TRUE),
                'total_discount'  => $this->input->post('total_discount', TRUE),
                'customer_name_two'       => $this->input->post('customer_name_two', TRUE),
                'customer_mobile_two'       => $this->input->post('customer_mobile_two', TRUE),
                'paid_amount'     => $this->input->post('paid_amount', TRUE),
                'due_amount'      => $this->input->post('due_amount', TRUE),
                'prevous_due'     => $this->input->post('previous', TRUE),
                'shipping_cost'   => $this->input->post('shipping_cost', TRUE),
                'sales_by'        => $createby,
                'status'          => 1,

                'delivery_type'    =>  $delivery_type,
                'bank_id'         => (!empty($this->input->post('bank_id', TRUE)) ? $this->input->post('bank_id', TRUE) : null),

                'courier_id'         => (!empty($this->input->post('courier_id', TRUE)) ? $this->input->post('courier_id', TRUE) : null),
                'branch_id'         => (!empty($this->input->post('branch_id', TRUE)) ? $this->input->post('branch_id', TRUE) : null),
                'outlet_id'       =>  $this->input->post('outlet_name', TRUE),
                'reciever_id'       => $this->input->post('deli_reciever', TRUE),
                'receiver_number'     => $this->input->post('del_rec_num', TRUE),
                'customer_card_no'      => $cus_card,

            );



            $this->db->insert('invoice', $datainv);
        }


        $prinfo  = $this->db->select('product_id,Avg(rate) as product_rate')->from('product_purchase_details')->where_in('product_id', $product_id)->group_by('product_id')->get()->result();

        $pr_open_price = $this->db->select('supplier_price')
            ->from('supplier_product')
            ->where_in('product_id', $product_id)
            ->group_by('product_id')
            ->get()
            ->result();

        $purchase_ave = [];
        $i = 0;
        if ($prinfo) {
            foreach ($prinfo as $avg) {
                $purchase_ave[] =  $avg->product_rate * $quantity[$i];
                $i++;
            }
        } else {
            foreach ($pr_open_price as $avg) {
                $purchase_ave[] =  $avg->supplier_price * $quantity[$i];
                $i++;
            }
        }
        $sumval = array_sum($purchase_ave);

        $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
        $headn = $customer_id . '-' . $cusifo->customer_name;
        $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
        $customer_headcode = $coainfo->HeadCode;


        ///Inventory credit
        $coscr = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INV',
            'VDate'          =>  $Vdate,
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory credit For Invoice No' . $invoice_no_generated . ' PreOrder NO. ' . $quotation_no,
            'Debit'          =>  0,
            'Credit'         =>  $sumval, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );

        /***************************************************************
        Inventory ledger will be credit only in Perpetual Accounting
        Method. Not in the method we are following.
         **************************************************************/
        // $this->db->insert('acc_transaction', $coscr);

        // Customer Transactions
        //Customer debit for Product Value
        $cosdr = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INV',
            'VDate'          =>  $Vdate,
            'COAID'          =>  $customer_headcode,
            'Narration'      =>  'Customer debit For Invoice No -  ' . $invoice_no_generated . ' PreOrder NO. ' . $quotation_no . ' Customer ' . $cusifo->customer_name,
            'Debit'          =>  $this->input->post('n_total', TRUE) - (!empty($this->input->post('previous', TRUE)) ? $this->input->post('previous', TRUE) : 0),
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $cosdr);

        $pro_sale_income = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INVOICE',
            'VDate'          =>  $Vdate,
            'COAID'          =>  303,
            'Narration'      =>  'Sale Income For Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no .  ' Customer ' . $cusifo->customer_name,
            'Debit'          =>  0,
            'Credit'         =>  $this->input->post('n_total', TRUE) - (!empty($this->input->post('previous', TRUE)) ? $this->input->post('previous', TRUE) : 0),
            'IsPosted'       => 1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $pro_sale_income);

        $paid = $this->input->post('p_amount', TRUE);
        if (count($paid) > 0) {
            for ($i = 0; $i < count($pay_type); $i++) {


                if ($pay_type[$i] == 1) {

                    $cc = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  1020101,
                        'Narration'      =>  'Cash in Hand in Sale for Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' customer- ' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'invoice_id'    => $invoice_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'pay_date'      =>  $Vdate,
                        'status'        =>  1,
                        'account'       => '',
                        'COAID'         => 1020101
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Hand) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' Customer- ' . $cusifo->customer_name,
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );
                    $this->db->insert('acc_transaction', $cuscredit);

                    $this->db->insert('acc_transaction', $cc);
                }
                if ($pay_type[$i] == 4) {
                    if (!empty($bank_id)) {
                        $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                        $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                    } else {
                        $bankcoaid = '';
                    }
                    $bankc = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INVOICE',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer  Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'invoice_id'    => $invoice_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname,
                        'COAID'         => $bankcoaid,
                        'pay_date'       =>  $Vdate,
                        'status'        =>  1
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' Customer- ' . $cusifo->customer_name,
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );
                    $this->db->insert('acc_transaction', $cuscredit);

                    $this->db->insert('acc_transaction', $bankc);
                }
                if ($pay_type[$i] == 3) {
                    if (!empty($bkash_id)) {
                        $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id[$i])->get()->row()->bkash_no;

                        $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
                    } else {
                        $bkashcoaid = '';
                    }
                    $bkashc = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INVOICE',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bkashcoaid,
                        'Narration'      =>  'Cash in Bkash paid amount for customer  Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'invoice_id'    => $invoice_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bkashname,
                        'pay_date'       =>  $Vdate,
                        'COAID'         => $bkashcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bkash) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' Customer- ' . $cusifo->customer_name,
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );
                    $this->db->insert('acc_transaction', $cuscredit);

                    $this->db->insert('acc_transaction', $bkashc);
                }
                if ($pay_type[$i] == 5) {

                    if (!empty($nagad_id)) {
                        $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id[$i])->get()->row()->nagad_no;

                        $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
                    } else {
                        $nagadcoaid = '';
                    }

                    $nagadc = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INVOICE',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $nagadcoaid,
                        'Narration'      =>  'Cash in Nagad paid amount for customer  Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'invoice_id'    => $invoice_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'pay_date'       =>  $Vdate,
                        'account'       => $nagadname,
                        'COAID'         => $nagadcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Nagad) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' Customer- ' . $cusifo->customer_name,
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );
                    $this->db->insert('acc_transaction', $cuscredit);

                    $this->db->insert('acc_transaction', $nagadc);
                }
                if ($pay_type[$i] == 6) {

                    $card_info = $CI->Settings->get_real_card_data($card_id[$i]);

                    if (!empty($card_id)) {
                        $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $card_info[0]['bank_id'])->get()->row()->bank_name;

                        $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                    } else {
                        $bankcoaid = '';
                    }
                    $bankc = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INVOICE',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer in card - ' . $card_info[0]['card_no'] . '  Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          => ($paid[$i]) - ($paid[$i] * ($card_info[0]['percentage'] / 100)),
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'invoice_id'    => $invoice_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname,
                        'pay_date'       =>  $Vdate,
                        'COAID'         => $bankcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' PreOrder NO. ' . $quotation_no . ' Customer- ' . $cusifo->customer_name,
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );

                    $carddebit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  '40404',
                        'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Invoice NO- ' . $invoice_no_generated . ' PreOrder NO. ' . $quotation_no,
                        'Debit'          =>  $paid[$i] * ($card_info[0]['percentage'] / 100),
                        'Credit'         =>  0,
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );


                    $this->db->insert('acc_transaction', $cuscredit);
                    $this->db->insert('acc_transaction', $carddebit);
                    $this->db->insert('acc_transaction', $bankc);
                }
            }
        }
        $customerinfo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();

        $rate                = $this->input->post('product_rate', TRUE);
        $p_id                = $this->input->post('product_id', TRUE);
        $total_amount        = $this->input->post('total_price', TRUE);
        $discount_rate       = $this->input->post('discount_amount', TRUE);
        $discount_per        = $this->input->post('discount', TRUE);
        // $tax_amount          = $this->input->post('tax',TRUE);
        $invoice_description = $this->input->post('desc', TRUE);
        $serial_n            = $this->input->post('serial_no', TRUE);
        // $warehouse           =$this->input->post('warehouse',TRUE);
        $warrenty            = $this->input->post('warrenty_date', TRUE);
        // $expiry            = $this->input->post('expiry_date', TRUE);


        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $serial_no  = (!empty($serial_n[$i]) ? $serial_n[$i] : null);
            $total_price = $total_amount[$i];
            $supplier_rate = $this->supplier_price($product_id);
            $disper = $discount_per[$i];
            $discount = is_numeric($product_quantity) * is_numeric($product_rate) * is_numeric($disper) / 100;

            $data1 = array(
                'invoice_details_id' => $this->generator(15),
                'invoice_id'         => $invoice_id,
                'product_id'         => $product_id,
                'sn'          => $serial_no,
                'quantity'           => $product_quantity,
                // 'warrenty_date'      => $warrenty_date,
                // 'expiry_date'      => $expiry_date,
                // 'warehouse'          => $war,
                'rate'               => $product_rate,
                'discount'           => $discount,
                'description'        => 'Manual Sales',
                'discount_per'       => $disper,
                // 'tax'                => $tax,
                'paid_amount'        => $paidamount,
                'due_amount'         => $this->input->post('due_amount', TRUE),
                'supplier_rate'      => $supplier_rate,
                'total_price'        => $total_price,
                'status'             => 2
            );

            if (!empty($quantity)) {
                $this->db->insert('invoice_details', $data1);
            }
        }



        $this->session->set_userdata(array('message' => display('successfully_added')));
        redirect(base_url('Cquotation/manage_quotation'));
    }

    public function headcode()
    {
        $query = $this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030001%'");
        return $query->row();
    }

    public function supplier_price($product_id)
    {
        $this->db->select('supplier_price');
        $this->db->from('supplier_product');
        $this->db->where(array('product_id' => $product_id));
        $supplier_product = $this->db->get()->row();


        $this->db->select('Avg(rate) as supplier_price');
        $this->db->from('product_purchase_details');
        $this->db->where(array('product_id' => $product_id));
        $purchasedetails = $this->db->get()->row();
        $price = (!empty($purchasedetails->supplier_price) ? $purchasedetails->supplier_price : $supplier_product->supplier_price);

        return (!empty($price) ? $price : 0);
    }


    public function invoice_pdf_generate($invoice_id = null)
    {
        $id = $invoice_id;
        $this->load->model('Invoices');
        $this->load->model('Web_settings');
        $this->load->library('occational');
        $this->load->library('numbertowords');
        $invoice_detail = $this->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $this->db->select('*')
            ->from('tax_settings')
            ->where('is_show', 1)
            ->get()
            ->result_array();
        $txregname = '';
        foreach ($taxfield as $txrgname) {
            $regname = $txrgname['tax_name'] . ' Reg No  - ' . $txrgname['reg_no'] . ', ';
            $txregname .= $regname;
        }
        $subTotal_quantity = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;
        $descript = 0;
        $isserial = 0;
        $isunit = 0;
        $is_discount = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $this->occational->dateConvert($invoice_detail[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
            }

            $i = 0;
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
                if (!empty($invoice_detail[$k]['description'])) {
                    $descript = $descript + 1;
                }
                if (!empty($invoice_detail[$k]['serial_no'])) {
                    $isserial = $isserial + 1;
                }
                if (!empty($invoice_detail[$k]['discount_per'])) {
                    $is_discount = $is_discount + 1;
                }

                if (!empty($invoice_detail[$k]['unit'])) {
                    $isunit = $isunit + 1;
                }
            }
        }

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $company_info = $this->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'];
        $amount_inword = $this->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $this->Invoices->user_invoice_data($user_id);
        $name    = $invoice_detail[0]['customer_name'];
        $email   = $invoice_detail[0]['customer_email'];
        $data = array(
            'title'             => display('invoice_details'),
            'invoice_id'        => $invoice_detail[0]['invoice_id'],
            'customer_info'     => $invoice_detail,
            'invoice_no'        => $invoice_detail[0]['invoice'],
            'customer_name'     => $invoice_detail[0]['customer_name'],
            'customer_address'  => $invoice_detail[0]['customer_address'],
            'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
            'customer_email'    => $invoice_detail[0]['customer_email'],
            'final_date'        => $invoice_detail[0]['final_date'],
            'invoice_details'   => $invoice_detail[0]['invoice_details'],
            'total_amount'      => number_format($invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'], 2, '.', ','),
            'subTotal_quantity' => $subTotal_quantity,
            'total_discount'    => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
            'total_tax'         => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount'  => number_format($subTotal_ammount, 2, '.', ','),
            'paid_amount'       => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
            'due_amount'        => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
            'previous'          => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
            'shipping_cost'     => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
            'invoice_all_data'  => $invoice_detail,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'discount_type'     => $currency_details[0]['discount_type'],
            'currency_details'  => $currency_details,
            'am_inword'         => $amount_inword,
            'is_discount'       => $is_discount,
            'users_name'        => $users->first_name . ' ' . $users->last_name,
            'tax_regno'         => $txregname,
            'is_desc'           => $descript,
            'is_serial'         => $isserial,
            'is_unit'           => $isunit,
        );

        $this->load->library('pdfgenerator');
        $html = $this->load->view('invoice/invoice_download', $data, true);
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/invoice/' . $id . '.pdf', $output);
        $file_path = getcwd() . '/assets/data/pdf/invoice/' . $id . '.pdf';
        $send_email = '';
        if (!empty($email)) {
            $send_email = $this->setmail($email, $file_path, $invoice_detail[0]['invoice'], $name);

            if ($send_email) {
                return 1;
            } else {
                return 0;
            }
        }
        return 0;
    }


    //service details pdf sent to mail after adding invoice
    public function service_pdf_generate($invoice_id = null)
    {
        $id = $invoice_id;
        $this->load->model('Service');
        $this->load->model('Web_settings');
        $this->load->model('Invoices');
        $this->load->library('occational');
        $employee_list = $this->Service->employee_list();
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $service_inv_main = $this->Service->service_invoice_updata($invoice_id);
        $customer_info =  $this->Service->customer_info($service_inv_main[0]['customer_id']);
        $taxinfo = $this->Service->service_invoice_taxinfo($invoice_id);
        $taxfield = $this->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $company_info = $this->Invoices->retrieve_company();

        $subTotal_quantity = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;

        if (!empty($service_inv_main)) {
            foreach ($service_inv_main as $k => $v) {
                $service_inv_main[$k]['final_date'] = $this->occational->dateConvert($service_inv_main[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $service_inv_main[$k]['qty'];
                $subTotal_ammount = $subTotal_ammount + $service_inv_main[$k]['total'];
            }

            $i = 0;
            foreach ($service_inv_main as $k => $v) {
                $i++;
                $service_inv_main[$k]['sl'] = $i;
            }
        }
        $name    = $customer_info->customer_name;
        $email   = $customer_info->customer_email;
        $data = array(
            'title'         => display('service_details'),
            'employee_list' => $employee_list,
            'invoice_id'    => $service_inv_main[0]['voucher_no'],
            'final_date'    => $service_inv_main[0]['final_date'],
            'customer_id'   => $service_inv_main[0]['customer_id'],
            'customer_info' => $customer_info,
            'customer_name' => $customer_info->customer_name,
            'customer_address' => $customer_info->customer_address,
            'customer_mobile' => $customer_info->customer_mobile,
            'customer_email' => $customer_info->customer_email,
            'details'       => $service_inv_main[0]['details'],
            'total_amount'  => $service_inv_main[0]['total_amount'],
            'total_discount' => $service_inv_main[0]['total_discount'],
            'invoice_discount' => $service_inv_main[0]['invoice_discount'],
            'subTotal_ammount' => number_format($subTotal_ammount, 2, '.', ','),
            'subTotal_quantity' => number_format($subTotal_quantity, 2, '.', ','),
            'total_tax'     => $service_inv_main[0]['total_tax'],
            'paid_amount'   => $service_inv_main[0]['paid_amount'],
            'due_amount'    => $service_inv_main[0]['due_amount'],
            'shipping_cost' => $service_inv_main[0]['shipping_cost'],
            'invoice_detail' => $service_inv_main,
            'taxvalu'       => $taxinfo,
            'discount_type' => $currency_details[0]['discount_type'],
            'currency_details' => $currency_details,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
            'taxes'         => $taxfield,
            'stotal'        => $service_inv_main[0]['total_amount'] - $service_inv_main[0]['previous'],
            'employees'     => $service_inv_main[0]['employee_id'],
            'previous'      => $service_inv_main[0]['previous'],
            'company_info'  => $company_info,

        );
        $this->load->library('pdfgenerator');
        $html = $this->load->view('service/invoice_download', $data, true);
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/service/' . $id . '.pdf', $output);
        $file_path = getcwd() . '/assets/data/pdf/service/' . $id . '.pdf';
        $send_email = '';
        if (!empty($email)) {
            $send_email = $this->setmail($email, $file_path, $id, $name);

            if ($send_email) {
                return 1;
            } else {

                return 0;
            }
        }
        return 0;
    }



    // Quotation View Details
    public function quotation_details_data($quot_id = null)
    {
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $data['currency_details'] = $this->Web_settings->retrieve_setting_editdata();
        $data['title'] = display('quotation_details');
        $data['quot_main']    = $this->Quotation_model->quot_main_edit($quot_id);
        $data['quot_product'] = $this->Quotation_model->quot_product_detail($quot_id);
        $data['quot_service'] = $this->Quotation_model->quot_service_detail($quot_id);
        $data['customer_info'] = $this->Quotation_model->customerinfo($data['quot_main'][0]['customer_id']);
        $data['discount_type']   = $currency_details[0]['discount_type'];
        $data['company_info'] = $this->Quotation_model->retrieve_company();
        $content = $this->parser->parse('quotation/quotation_details', $data, true);
        $this->template->full_admin_html_view($content);
    }



    // Quotation View Details
    public function quotation_download($quot_id = null)
    {
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $data['currency_details'] = $this->Web_settings->retrieve_setting_editdata();
        $data['title']            = display('quotation_details');
        $data['quot_main']        = $this->Quotation_model->quot_main_edit($quot_id);
        $data['quot_service']     = $this->Quotation_model->quot_service_detail($quot_id);
        $data['quot_product']     = $this->Quotation_model->quot_product_detail($quot_id);
        $data['customer_info']    = $this->Quotation_model->customerinfo($data['quot_main'][0]['customer_id']);
        $data['discount_type']   = $currency_details[0]['discount_type'];
        $data['company_info'] = $this->Quotation_model->retrieve_company();
        $data['currency_details'] = $this->Web_settings->retrieve_setting_editdata();

        $this->load->library('pdfgenerator');
        $dompdf = new DOMPDF();
        $page = $this->load->view('quotation/quotation_download', $data, true);
        $file_name = time();
        $dompdf->load_html($page);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents("assets/data/pdf/quotation/$file_name.pdf", $output);
        $filename = $file_name . '.pdf';
        $file_path = base_url() . 'assets/data/pdf/quotation/' . $filename;

        $this->load->helper('download');
        force_download('./assets/data/pdf/quotation/' . $filename, NULL);
        redirect("Cquotation/manage_quotation");
    }


    //This function is used to Generate Key
    public function generator($lenth)
    {
        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9");

        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 8);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }
        return $con;
    }

    //NUMBER GENERATOR
    public function number_generator()
    {
        $this->db->select_max('invoice', 'invoice_no');
        $query = $this->db->get('invoice');
        $result = $query->result_array();
        $invoice_no = $result[0]['invoice_no'];
        if ($invoice_no != '') {
            $invoice_no = $invoice_no + 1;
        } else {
            $invoice_no = 1000;
        }
        return $invoice_no;
    }
}
