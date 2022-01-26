<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cdiscount extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('session');
        $this->load->model('Discount_model');
        $this->auth->check_admin_auth();
    }

    //Designation form
    public function add_discount() {
    $data['title'] = 'Add Discount';
    $data['customers']= $this->Discount_model->customer_dropdown();
    $data['categories']= $this->Discount_model->category_dropdown();
 //   echo '<pre>';print_r($data);exit();
    $content = $this->parser->parse('discount/add_discount_form', $data, true);
    $this->template->full_admin_html_view($content);
    }

    //Discount Creation

        public function create_discount(){


            $customer_id=$this->input->post('customer_id',true);
            $category_id=$this->input->post('category_id',true);
            $discount=$this->input->post('discount',true);

            if ( !empty($customer_id) )
            {
                foreach ($customer_id as $key => $value )
                {
                    $data['customer_id']=$customer_id[$key];
                    $data['discount_id']=mt_rand();

                   // $data['customer_id'] = $customer_id[$key];
                    $data['category_id']=$category_id[$key];
                   // $data['cheque_id']=$this->generator(10);
                    $data['discount_percentage'] = $discount[$key];

                    //echo '<pre>';print_r($data);exit();
                    // $this->ProductModel->add_products($data);
//                    if ( ! empty($data))
//                    {
                    $result=$this->db->insert('discount', $data);
//                    ;
                 //   }
                }

            }


            if ($result ==TRUE) {
                $this->session->set_flashdata('message', display('save_successfully'));
                    redirect("Cdiscount/add_discount");
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
                redirect("Cdiscount/add_discount");
            }




        

    }

        public function update_discount(){

            $discount_id=$this->input->post('discount_id',true);
            $customer_id=$this->input->post('customer_id',true);
            $category_id=$this->input->post('category_id',true);
            $discount=$this->input->post('discount',true);


                        $postData=array(
                'customer_id'   => $customer_id,
                'category_id'   => $category_id,
                'discount_percentage'       => $discount,
            );

            $this->db->where('discount_id', $discount_id);
           $result= $this->db->update('discount',$postData);


            if ($result == TRUE) {
                $this->session->set_flashdata('message', 'Update Successfully');
                redirect("Cdiscount/manage_discount");
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
                redirect("Cdiscount/manage_discount");
            }




    }




    public function autocompletecustomersearch(){
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Discount_model');
        $customer_name   = $this->input->post('customer_name',TRUE);
        $product_info   = $CI->Discount_model->autocompletcustomerdata($customer_name);

        if(!empty($product_info)){
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label'=>$value['customer_name'],'value'=>$value['customer_id']);
            }
        }else{
            $json_product[] = 'No Customer Found';
        }
        echo json_encode($json_product);

    }

    public function autocompletecategorysearch(){
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Discount_model');
        $category_name   = $this->input->post('category_name',TRUE);
        $product_info   = $CI->Discount_model->autocompletcategorydata($category_name);

        if(!empty($product_info)){
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label'=>$value['category_name'],'value'=>$value['category_id']);
            }
        }else{
            $json_product[] = 'No Category Found';
        }
        echo json_encode($json_product);

    }


        //product info retrive by product id for invoice
    public function retrieve_discount_data() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Discount_model');
        // $product_id = $this->input->post('product_id',TRUE);


        $discount_info = $CI->Discount_model->get_items();

        echo json_encode($discount_info);
    }

        //Manage designation
    public function manage_discount() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Discount_model');
        $CI->load->model('Reports');
        $data['title'] = 'Manage Discount';
        $data['t'] = $this->Discount_model->getDiscountList();
        //$data['t'] = $this->Reports->getCheckList_rqsn();
        // $data = $this->Reports->getCheckLi st_rqsn();


      //  echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('discount/discount_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function discount_edit($id){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $this->linvoice->discount_edit_form($id);
        $this->template->full_admin_html_view($content);
    }

    public function discount_delete($id){

      //  echo $id;exit();
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Discount_model');
        if ($this->Discount_model->discount_delete($id)) {
            $this->session->set_flashdata('message', display('successfully_delete'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);

    }





    //Insert invoice
    public function insert_invoice() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $invoice_id = $CI->Invoices->invoice_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        redirect(base_url('Cinvoice/invoice_inserted_data/'.$invoice_id));

    }

    // ================= manual sale insert ============================
    public function manual_sales_insert(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $invoice_id = $CI->Invoices->invoice_entry();
        if(!empty($invoice_id)){
            $data['status'] = true;
            $data['invoice_id'] = $invoice_id;
            $data['message'] = display('save_successfully');
            $mailsetting = $this->db->select('*')->from('email_config')->get()->result_array();
            if($mailsetting[0]['isinvoice']==1){
                $mail = $this->invoice_pdf_generate($invoice_id);
                if($mail == 0){
                    $data['message2'] = $this->session->set_userdata(array('error_message' => display('please_config_your_mail_setting')));
                }
            }
            $data['details'] = $this->load->view('invoice/invoice_html', $data, true);
        }else{
            $data['status'] = false;
            $data['error_message'] = 'Sorry';
        }

        echo json_encode($data);
    }


//    public function add_cheque(){
//        $invoice_id=$this->input->post('invoice_id',TRUE);
//        $cheque_date=$this->input->post('cheque_date',TRUE);
//        $cheque_no=$this->input->post('cheque_no',TRUE);
//        $amount=$this->input->post('amount',TRUE);
//
//
//        if ( ! empty($cheque_no) && ! empty($cheque_date) )
//        {
//            foreach ($cheque_no as $key => $value )
//            {
//
//                $data['cheque_no'] = $value;
//                $data['invoice_id']=$invoice_id;
//                $data['cheque_id']=$this->generator(10);
//
//                $data['cheque_date'] = $cheque_date[$key];
//                $data['amount'] = $amount[$key];
//                $data['status'] = 2;
//
//                //   echo '<pre>';print_r($data);exit();
//                // $this->ProductModel->add_products($data);
//                if ( ! empty($data))
//                {
//                    $this->db->insert('cus_cheque', $data);
//                }
//            }
//
//        }
//        echo json_encode($data);
//
//
//    }

    public function invoice_pdf_generate($invoice_id = null) {
        $id = $invoice_id;
        $this->load->model('Invoices');
        $this->load->model('Web_settings');
        $this->load->library('occational');
        $this->load->library('numbertowords');
        $invoice_detail = $this->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $this->db->select('*')
            ->from('tax_settings')
            ->where('is_show',1)
            ->get()
            ->result_array();
        $txregname ='';
        foreach($taxfield as $txrgname){
            $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';
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
                if(!empty($invoice_detail[$k]['description'])){
                    $descript = $descript+1;
                }
                if(!empty($invoice_detail[$k]['serial_no'])){
                    $isserial = $isserial+1;
                }
                if(!empty($invoice_detail[$k]['discount_per'])){
                    $is_discount = $is_discount+1;
                }

                if(!empty($invoice_detail[$k]['unit'])){
                    $isunit = $isunit+1;

                }

            }
        }

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $company_info     = $this->Invoices->retrieve_company();
        $totalbal         = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        $amount_inword    = $this->numbertowords->convert_number($totalbal);
        $user_id          = $invoice_detail[0]['sales_by'];
        $users            = $this->Invoices->user_invoice_data($user_id);
        $name            = $invoice_detail[0]['customer_name'];
        $email            = $invoice_detail[0]['customer_email'];
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
            'total_amount'      => number_format($invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'], 2, '.', ','),
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
            'users_name'        => $users->first_name.' '.$users->last_name,
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

            if($send_email){
                return 1;
            }else{
                return 0;

            }

        }
        return 0;

    }


    public function setmail($email, $file_path, $id = null, $name = null) {
        $setting_detail = $this->db->select('*')->from('email_config')->get()->row();
        $subject = 'Purchase  Information';
        $message = strtoupper($name) . '-' . $id;
        $config = Array(
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

                return false;
            }
        } else {

            return true;
        }
    }

    //Email testing for email
    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //invoice Update Form
    public function invoice_update_form($invoice_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->invoice_edit_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }

    // invoice Update
    public function invoice_update() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $invoice_id = $CI->Invoices->update_invoice();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        $this->invoice_inserted_data($invoice_id);
    }

    //Search Inovoice Item
    public function search_inovoice_item() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');

        $customer_id = $this->input->post('customer_id',TRUE);
        $content     = $CI->linvoice->search_inovoice_item($customer_id);
        $this->template->full_admin_html_view($content);
    }

    //Manage invoice list
    public function manage_invoice() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->model('Invoices');
        $content = $this->linvoice->invoice_list();
        $this->template->full_admin_html_view($content);
    }

    public function CheckInvoiceList(){
        // GET data
        $this->load->model('Invoices');
        $postData = $this->input->post();
        $data = $this->Invoices->getInvoiceList($postData);
        echo json_encode($data);
    }
// invoice list pdf download
    public function sale_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('linvoice');
        $CI->load->library('pdfgenerator');
        $invoices_list = $CI->Invoices->invoice_list_pdf();
        if (!empty($invoices_list)) {
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
                }
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
            'company_info'  => $company_info
        );
        $this->load->helper('download');
        $content = $this->parser->parse('invoice/invoice_list_pdf', $data, true);
        $time = date('Ymdhi');
        $dompdf = new DOMPDF();
        $dompdf->load_html($content);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/'.'sales'.$time.'.pdf', $output);
        $file_path = 'assets/data/pdf/'.'sales'.$time.'.pdf';
        $file_name = 'sales'.$time.'.pdf';
        force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }


    public function invoicdetails_download($invoice_id = null) {

        $this->load->model('Invoices');
        $this->load->model('Web_settings');
        $this->load->library('occational');
        $this->load->library('numbertowords');
        $invoice_detail = $this->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $this->db->select('*')
            ->from('tax_settings')
            ->where('is_show',1)
            ->get()
            ->result_array();
        $txregname ='';
        foreach($taxfield as $txrgname){
            $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';
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
                if(!empty($invoice_detail[$k]['description'])){
                    $descript = $descript+1;
                }
                if(!empty($invoice_detail[$k]['serial_no'])){
                    $isserial = $isserial+1;
                }
                if(!empty($invoice_detail[$k]['discount_per'])){
                    $is_discount = $is_discount+1;
                }
                if(!empty($invoice_detail[$k]['unit'])){
                    $isunit = $isunit+1;
                }
            }
        }

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $company_info     = $this->Invoices->retrieve_company();
        $totalbal         = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        $amount_inword    = $this->numbertowords->convert_number($totalbal);
        $user_id          = $invoice_detail[0]['sales_by'];
        $users            = $this->Invoices->user_invoice_data($user_id);
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
            'total_amount'      => number_format($invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'], 2, '.', ','),
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
            'users_name'        => $users->first_name.' '.$users->last_name,
            'tax_regno'         => $txregname,
            'is_desc'           => $descript,
            'is_serial'         => $isserial,
            'is_unit'           => $isunit,
        );



        $this->load->library('pdfgenerator');
        $dompdf = new DOMPDF();
        $page = $this->load->view('invoice/invoice_download', $data, true);
        $file_name = time();
        $dompdf->load_html($page,'UTF-8');
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents("assets/data/pdf/invoice/$file_name.pdf", $output);
        $filename = $file_name . '.pdf';
        $file_path = base_url() . 'assets/data/pdf/invoice/' . $filename;

        $this->load->helper('download');
        force_download('./assets/data/pdf/invoice/' . $filename, NULL);
        redirect("Cinvoice/manage_invoice");
    }

    // search invoice by customer id
    public function invoice_search() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->model('Invoices');
        $customer_id = $this->input->get('customer_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cinvoice/invoice_search/');
        $config["total_rows"] = $this->Invoices->invoice_search_count($customer_id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->linvoice->invoice_search($customer_id, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    // search invoice by invoice id
    public function manage_invoice_invoice_id() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->model('Invoices');
        $invoice_no = $this->input->post('invoice_no',TRUE);
        $content = $this->linvoice->invoice_list_invoice_no($invoice_no);
        $this->template->full_admin_html_view($content);
    }

    // invoice list date to date 
    public function date_to_date_invoice() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->model('Invoices');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cinvoice/date_to_date_invoice/');
        $config["total_rows"] = $this->Invoices->invoice_list_date_to_date_count($from_date, $to_date);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  

        $content = $this->linvoice->invoice_list_date_to_date($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    //POS invoice page load
    public function pos_invoice() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->pos_invoice_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Insert pos invoice
    public function insert_pos_invoice() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $product_id = $this->input->post('product_id',TRUE);

        $product_details  = $CI->Invoices->pos_invoice_setup($product_id);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $prinfo = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->result_array();
        $tr = " ";
        if (!empty($product_details)) {
            $product_id = $this->generator(5);
            $serialdata =explode(',', $product_details->serial_no);
            if($product_details->total_product > 0){
                $qty = 1;
            }else{
                $qty = 1;
            }

            $html = "";
            if (empty($serialdata)) {
                $html .="No Serial Found !";
            }else{
                // Select option created for product
                $date = date('Y-m-d');
                $html .="<select name=\"serial_no[]\"   class=\"serial_no_1 form-control\" id=\"serial_no_" . $product_details->product_id . "\">";
                $html .= "<option value=''>".display('select_one')."</option>";
                foreach ($serialdata as $serial) {
                    $html .="<option value=".$serial.">".$serial."</option>";
                }
                $html .="</select>";
            }

            $tr .= "<tr id=\"row_" . $product_details->product_id . "\">
						<td class=\"\" style=\"\">
							
							<input type=\"text\" name=\"product_name\" onkeypress=\"invoice_productList('" . $product_details->product_id . "');\" class=\"form-control productSelection \" value='" . $product_details->product_name . "- (" . $product_details->product_model . ")" . "' placeholder='" . display('product_name') . "' required=\"\" id=\"product_name_" . $product_details->product_id . "\" tabindex=\"\" readonly>

							<input type=\"hidden\" class=\"form-control autocomplete_hidden_value product_id_" . $product_details->product_id . "\" name=\"product_id[]\" id=\"SchoolHiddenId_" . $product_details->product_id . "\" value = \"$product_details->product_id\"/>
							
						</td>
                        
                        <td>
                             <input type=\"text\" name=\"desc[]\" class=\"form-control text-right \"  />
                        </td>
                        
                        <td style=\"width:120px\">".$html."</td>
                        
                        <td>
                        
                             <input id=\"warehouse\" type=\"text\" name=\"warehouse[]\" class=\"form-control text-center \" value='".$product_details->warehouse."'  readonly/>
                        </td>
                        
	  					<td>
                            <input type=\"text\" name=\"available_quantity[]\" class=\"form-control text-right available_quantity_" . $product_details->product_id . "\" value='" . $product_details->total_product . "' readonly=\"\" id=\"available_quantity_" . $product_details->product_id . "\"/>
                        </td>

                        <td>
                            <input class=\"form-control text-right unit_'" . $product_details->product_id . "' valid\" value=\"$product_details->unit\" readonly=\"\" aria-invalid=\"false\" type=\"text\">
                        </td>
                    
                        <td>
                            <input type=\"text\" name=\"product_quantity[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" class=\"total_qntt_" . $product_details->product_id . " form-control text-right\" id=\"total_qntt_" . $product_details->product_id . "\" placeholder=\"0.00\" min=\"0\" value='" . $qty . "'/>
                        </td>
                        
                        <td>
                        
                              <input id=\'warrenty_date\' type=\"text\" name=\"warrenty_date[]\" class=\"form-control datepicker \" value=\" $product_details->warrenty_date\"  />
                        </td>
                        
                   
                                            
                                    

                        
                        

						<td style=\"width:85px\">
							<input type=\"text\" name=\"product_rate[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" value='" . $product_details->price . "' id=\"price_item_" . $product_details->product_id . "\" class=\"price_item1 form-control text-right\" required placeholder=\"0.00\" min=\"0\"/>
						</td>

						<td class=\"\">
							<input type=\"text\" name=\"discount[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" id=\"discount_" . $product_details->product_id . "\" class=\"form-control text-right\" placeholder=\"0.00\" min=\"0\"/>

							<input type=\"hidden\" value=" . $currency_details[0]['discount_type'] . " name=\"discount_type\" id=\"discount_type_" . $product_details->product_id . "\">
						</td>

						<td class=\"text-right\" style=\"width:100px\">
							<input class=\"total_price form-control text-right\" type=\"text\" name=\"total_price[]\" id=\"total_price_" . $product_details->product_id . "\" value='" . $product_details->price . "' tabindex=\"-1\" readonly=\"readonly\"/>
						</td>

						<td>";
            $sl=0;
            foreach ($taxfield as $taxes) {
                $txs = 'tax'.$sl;
                $tr .= "<input type=\"hidden\" id=\"total_tax".$sl."_" . $product_details->product_id . "\" class=\"total_tax".$sl."_" . $product_details->product_id . "\" value='" . $prinfo[0][$txs] . "'/>
                            <input type=\"hidden\" id=\"all_tax".$sl."_" . $product_details->product_id . "\" class=\" total_tax".$sl."\" value='" . $prinfo[0][$txs]*$product_details->price . "' name=\"tax[]\"/>";
                $sl++; }

            $tr .= "<input type=\"hidden\" id=\"total_discount_" . $product_details->product_id . "\" />
							<input type=\"hidden\" id=\"all_discount_" . $product_details->product_id . "\" class=\"total_discount dppr\"/>
							<button  class=\"btn btn-danger btn-xs text-center\" type=\"button\"  onclick=\"deleteRow(this)\">" . '<i class="fa fa-close"></i>' . "</button>
						</td>
					</tr>";
            echo $tr;
        } else {
            return false;
        }
    }

    //Retrive right now inserted data to cretae html
    public function invoice_inserted_data($invoice_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->invoice_html_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }

    public function invoice_inserted_data_manual() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $invoice_id = $this->input->post('invoice_id',TRUE);
        $chalan_value= $this->input->post('chalan_value',TRUE);
        $CI->load->library('linvoice');


        //echo '<pre>';print_r($_POST['chalan_value']);exit();
        if (isset($_POST['chalan_value'])){
            $content = $CI->linvoice->invoice_chalan_html_data_manual($invoice_id);
            $this->template->full_admin_html_view($content);
          //  echo $_POST['chalan_value']; // Displays value of checked checkbox.
        }else{

           // echo "value Not found";
            $content = $CI->linvoice->invoice_html_data_manual($invoice_id);
            $this->template->full_admin_html_view($content);
        }



    }
    public function pos_invoice_inserted_data_manual() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $invoice_id = $this->input->post('invoice_id',TRUE);
        $url = $this->input->post('url',TRUE);
        $content = $CI->linvoice->pos_invoice_html_data_manual($invoice_id,$url);
        $this->template->full_admin_html_view($content);
    }


    //Retrive right now inserted data to cretae html
    public function pos_invoice_inserted_data($invoice_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->pos_invoice_html_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }
//Min invoice data
    public function min_invoice_inserted_data($invoice_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->min_invoice_html_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }

    //Chalan invoice data
    public function chalan_invoice_inserted_data($invoice_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $content = $CI->linvoice->chalan_invoice_html_data($invoice_id);
        $this->template->full_admin_html_view($content);
    }
    // Retrieve_product_data
    public function retrieve_product_data() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $product_id  = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);

        $product_info = $CI->Invoices->get_total_product($product_id, $supplier_id);

        echo json_encode($product_info);
    }

    //product info retrive by product id for invoice
    public function retrieve_product_data_inv() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $product_id = $this->input->post('product_id',TRUE);


        $product_info = $CI->Invoices->get_total_product_invoic($product_id);

        echo json_encode($product_info);
    }

    // Invoice delete
    public function invoice_delete($invoice_id) {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $result = $CI->Invoices->delete_invoice($invoice_id);
        if ($result) {
            $this->session->set_userdata(array('message' => display('successfully_delete')));
            redirect('Cinvoice/manage_invoice');
        }
    }



    //AJAX INVOICE STOCKs
    public function product_stock_check($product_id) {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $purchase_stocks = $CI->Invoices->get_total_purchase_item($product_id);
        $total_purchase = 0;
        if (!empty($purchase_stocks)) {
            foreach ($purchase_stocks as $k => $v) {
                $total_purchase = ($total_purchase + $purchase_stocks[$k]['quantity']);
            }
        }
        $sales_stocks = $CI->Invoices->get_total_sales_item($product_id);
        $total_sales = 0;
        if (!empty($sales_stocks)) {
            foreach ($sales_stocks as $k => $v) {
                $total_sales = ($total_sales + $sales_stocks[$k]['quantity']);
            }
        }

        $final_total = ($total_purchase - $total_sales);
        return $final_total;
    }

//    =========== its for 1 increment =============
    function randomChange($myValue) {
        $random = rand(0, 1);
        if ($random > 0)
            return $myValue + 1;

        return $myValue - 1;
    }

    //This function is used to Generate Key
    public function generator($lenth) {
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
    //customer previous due
    public function previous() {
        $CI = & get_instance();
        $CI->load->model('Customers');
        $customer_id = $this->input->post('customer_id',TRUE);
        $this->db->select("a.*,b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
        $this->db->from('customer_information a');
        $this->db->join('acc_coa b','a.customer_id = b.customer_id','left');
        $this->db->where('a.customer_id',$customer_id);
        $result = $this->db->get()->result_array();
        $balance = $result[0]['balance'];
        $b = (!empty($balance)?$balance:0);
        if ($b){
            echo  $b;
        } else {
            echo  $b;
        }
    }

    public function customer_autocomplete(){
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Customers');
        $customer_id    = $this->input->post('customer_id',TRUE);
        $customer_info   = $CI->Customers->customer_search($customer_id);

        if($customer_info){
            $json_customer[''] = '';
            foreach ($customer_info as $value) {
                $json_customer[] = array('label'=>$value['customer_name'],'value'=>$value['customer_id']);
            }
        }else{
            $json_customer[] = 'No Record found';
        }
        echo json_encode($json_customer);
    }
    //csv excel 
    public function exportinvocsv() {
        // file name 
        $this->load->model('Invoices');
        $filename = 'sale_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");
        // get data 
        $invoicedata = $this->Invoices->invoice_csv_file();
        // file creation 
        $file = fopen('php://output', 'w');

        $header = array('invoice_no', 'invoice_id', 'customer_name', 'date', 'total_amount');
        fputcsv($file, $header);
        foreach ($invoicedata as $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }


    public function gui_pos(){
        $this->load->model('Invoices');
        $this->load->model('Web_settings');
        $taxfield = $this->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn)-4;
        $data['title'] = display('gui_pos');
        $saveid=$this->session->userdata('user_id');
        $walking_customer      = $this->Invoices->walking_customer();
        $data['customer_id']   = $walking_customer[0]['customer_id'];
        $data['customer_name'] = $walking_customer[0]['customer_name'];
        $data['categorylist']  = $this->Invoices->category_dropdown();
        $customer_details      = $this->Invoices->pos_customer_setup();
        $data['customerlist']  = $this->Invoices->customer_dropdown();
        $currency_details      = $this->Web_settings->retrieve_setting_editdata();
        $data['customer_name'] = $customer_details[0]['customer_name'];
        $data['customer_id']   = $customer_details[0]['customer_id'];
        $data['itemlist']      =  $this->Invoices->allproduct();
        $data['discount_type'] = $currency_details[0]['discount_type'];
        $data['position']       = $currency_details[0]['currency_position'];
        $data['currency']       = $currency_details[0]['currency'];
        $data['taxes']         = $taxfield;
        $data['taxnumber']     = $num_column;
        $data['todays_invoice']= $this->Invoices->todays_invoice();
        $content  = $this->parser->parse('invoice/gui_pos_invoice', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //gui pos invoice
    public function gui_pos_invoice() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $product_id = $this->input->post('product_id',TRUE);

        $product_details = $CI->Invoices->pos_invoice_setup($product_id);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $prinfo = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->result_array();

        $tr = " ";
        if (!empty($product_details)) {
            $product_id = $this->generator(5);
            $serialdata =explode(',', $product_details->serial_no);
            if($product_details->total_product > 0){
                $qty = 1;
            }else{
                $qty = 1;
            }

            $html = "";
            if (empty($serialdata)) {
                $html .="No Serial Found !";
            }else{
                // Select option created for product
                $html .="<select name=\"serial_no[]\"   class=\"serial_no_1 form-control\" id=\"serial_no_".$product_details->product_id."\">";
                $html .= "<option value=''>".display('select_one')."</option>";
                foreach ($serialdata as $serial) {
                    $html .="<option value=".$serial.">".$serial."</option>";
                }
                $html .="</select>";
            }

            $tr .= "<tr id=\"row_" . $product_details->product_id . "\">
                        <td class=\"\" style=\"width:220px\">
                            
                            <input type=\"text\" name=\"product_name\" onkeypress=\"invoice_productList('" . $product_details->product_id . "');\" class=\"form-control productSelection \" value='" . $product_details->product_name . "- (" . $product_details->product_model . ")" . "' placeholder='" . display('product_name') . "' required=\"\"  tabindex=\"\" readonly>

                            <input type=\"hidden\" class=\"form-control autocomplete_hidden_value product_id_" . $product_details->product_id . "\" name=\"product_id[]\" id=\"SchoolHiddenId_" . $product_details->product_id . "\" value = \"$product_details->product_id\"/>
                        </td>
                        <td>".$html."</td>
                        <td>
                            <input type=\"text\" name=\"available_quantity[]\" class=\"form-control text-right available_quantity_" . $product_details->product_id . "\" value='" . $product_details->total_product . "' readonly=\"\" id=\"available_quantity_" . $product_details->product_id . "\"/>
                        </td>
                        <td>
                            <input type=\"text\" name=\"product_quantity[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" class=\"total_qntt_" . $product_details->product_id . " form-control text-right\" id=\"total_qntt_" . $product_details->product_id . "\" placeholder=\"0.00\" min=\"0\" value='" . $qty . "' required=\"required\"/>
                        </td>
                        <td style=\"width:85px\">
                            <input type=\"text\" name=\"product_rate[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" value='" . $product_details->price . "' id=\"price_item_" . $product_details->product_id . "\" class=\"price_item1 form-control text-right\" required placeholder=\"0.00\" min=\"0\"/>
                        </td>

                        <td class=\"\">
                            <input type=\"text\" name=\"discount[]\" onkeyup=\"quantity_calculate('" . $product_details->product_id . "');\" onchange=\"quantity_calculate('" . $product_details->product_id . "');\" id=\"discount_" . $product_details->product_id . "\" class=\"form-control text-right\" placeholder=\"0.00\" min=\"0\"/>

                            <input type=\"hidden\" value=" . $currency_details[0]['discount_type'] . " name=\"discount_type\" id=\"discount_type_" . $product_details->product_id . "\">
                        </td>

                        <td class=\"text-right\" style=\"width:100px\">
                            <input class=\"total_price form-control text-right\" type=\"text\" name=\"total_price[]\" id=\"total_price_" . $product_details->product_id . "\" value='" . $product_details->price . "' tabindex=\"-1\" readonly=\"readonly\"/>
                        </td>

                        <td>";
            $sl=0;
            foreach ($taxfield as $taxes) {
                $txs = 'tax'.$sl;
                $tr .= "<input type=\"hidden\" id=\"total_tax".$sl."_" . $product_details->product_id . "\" class=\"total_tax".$sl."_" . $product_details->product_id . "\" value='" . $prinfo[0][$txs] . "'/>
                            <input type=\"hidden\" id=\"all_tax".$sl."_" . $product_details->product_id . "\" class=\" total_tax".$sl."\" value='" . $prinfo[0][$txs]*$product_details->price . "' name=\"tax[]\"/>";
                $sl++; }
            $tr.="<input type=\"hidden\" id=\"total_discount_" . $product_details->product_id . "\" />
                            <input type=\"hidden\" id=\"all_discount_" . $product_details->product_id . "\" class=\"total_discount dppr\"/>
                            <a style=\"text-align: right;\" class=\"btn btn-danger btn-xs\" href=\"#\"  onclick=\"deleteRow(this)\">" . '<i class="fa fa-close"></i>' . "</a>
                             <a style=\"text-align: right;\" class=\"btn btn-success btn-xs\" href=\"#\"  onclick=\"detailsmodal('".$product_details->product_name."','".$product_details->total_product."','".$product_details->product_model."','".$product_details->unit."','".$product_details->price."','".$product_details->image."')\">" . '<i class="fa fa-eye"></i>' . "</a>
                        </td>
                    </tr>";
            echo $tr;
        } else {
            return false;
        }
    }

    public function getitemlist(){
        $this->load->model('Invoices');
        $prod=$this->input->post('product_name',TRUE);
        $catid=$this->input->post('category_id',TRUE);
        $getproduct = $this->Invoices->searchprod($catid,$prod);
        if(!empty($getproduct)){
            $data['itemlist']=$getproduct;
            $this->load->view('invoice/getproductlist', $data);
        }
        else{
            $title['title'] = 'Product Not found';
            $this->load->view('invoice/productnot_found', $title);
        }
    }
    public function instant_customer(){
        $this->load->model('Customers');

        $data = array(
            'customer_id_two'    => $this->input->post('customer_id_two',TRUE),
            'contact_person'    => $this->input->post('contact_person',TRUE),
            'contact'    => $this->input->post('contact',TRUE),
            'customer_name'    => $this->input->post('customer_name',TRUE),
            'customer_address' => $this->input->post('address',TRUE),
            'customer_mobile'  => $this->input->post('mobile',TRUE),
            'customer_email'   => $this->input->post('email',TRUE),
            'status'           => 1
        );

        $result = $this->Customers->customer_entry($data);
        if ($result) {

            $customer_id = $this->db->insert_id();
            $vouchar_no = $this->auth->generator(10);
            //Customer  basic information adding.
            $coa = $this->Customers->headcode();
            if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
            }else{
                $headcode="102030001";
            }
            $c_acc=$customer_id.'-'.$this->input->post('customer_name',TRUE);
            $createby=$this->session->userdata('user_id');
            $createdate=date('Y-m-d H:i:s');

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
                'customer_id'      => $customer_id,
                'DepreciationRate' => '0',
                'CreateBy'         => $createby,
                'CreateDate'       => $createdate,
            ];
            //Previous balance adding -> Sending to customer model to adjust the data.
            $this->db->insert('acc_coa',$customer_coa);
            $this->Customers->previous_balance_add($this->input->post('previous_balance',TRUE), $customer_id);

            $data['status']        = true;
            $data['message']       = display('save_successfully');
            $data['customer_id']   = $customer_id;
            $data['customer_name'] = $data['customer_name'];
        } else {
            $data['status'] = false;
            $data['error_message'] = display('please_try_again');
        }
        echo json_encode($data);
    }


    public function add_cheque(){
        $this->load->model('Invoices');
        $invoice_id=$this->input->post('invoice_id',TRUE);
        $cheque_date=$this->input->post('cheque_date',TRUE);
        $cheque_no=$this->input->post('cheque_no',TRUE);
        $cheque_type=$this->input->post('cheque_type',TRUE);
        $amount=$this->input->post('amount',TRUE);

        if ( ! empty($cheque_no) && ! empty($cheque_date) )
        {
            foreach ($cheque_no as $key => $value )
            {

                $data['cheque_no'] = $value;
                $data['invoice_id']=$invoice_id;
                $data['cheque_id']=$this->generator(10);

                $data['cheque_type'] = $cheque_type[$key];
                $data['cheque_date'] = $cheque_date[$key];
                $data['amount'] = $amount[$key];
                $data['status'] = 2;

                   //echo '<pre>';print_r($data);
                // $this->ProductModel->add_products($data);


                   $result= $this->db->insert('cus_cheque', $data);

            }

        }

//        $data=array(
//
//            'cheque_id'=>$this->generator(10),
//            'invoice_id'=>$this->generator(10),
//            'cheque_no'=>$cheque_no,
//            'amount'=>$amount,
//            'cheque_date'=>$cheque_date,
//            'status'=>2,
//
//        );

       // echo '<pre>';print_r($data);


        // $this->db->insert('cus_cheque', $data);


        if ($result) {

            $data['status']        = true;
            $data['message']       = display('save_successfully');
            redirect('Admin_dashboard/sales_cheque_report');

        } else {
            $data['status'] = false;
            $data['error_message'] = display('please_try_again');
            redirect('Admin_dashboard/sales_cheque_report');
        }
       // echo json_encode($data);
    }

}
