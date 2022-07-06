<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoices extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lcustomer');
        $this->load->library('Smsgateway');
        $this->load->library('session');
        $this->load->model('Customers');
        $this->auth->check_admin_auth();
    }

    //Count invoice
    public function count_invoice()
    {
        $CI = &get_instance();

        $CI->load->model('Warehouse');

        $outlet_id = ($CI->Warehouse->get_outlet_user()) ? $CI->Warehouse->get_outlet_user()[0]['outlet_id'] : null;

        $data = $this->db->where('outlet_id', $outlet_id)->from("invoice")->count_all_results();
        // echo '<pre>';
        // print_r($data);
        // exit();

        return $data;
    }



    public function getInvoiceList($postData = null)
    {
        $this->load->library('occational');
        $this->load->model('Warehouse');
        $response = array();
        $usertype = $this->session->userdata('user_type');
        $fromdate = $this->input->post('fromdate', TRUE);
        $todate   = $this->input->post('todate', TRUE);
        if (!empty($fromdate)) {
            $datbetween = "(a.date BETWEEN '$fromdate' AND '$todate')";
        } else {
            $datbetween = "";
        }
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (b.customer_name like '%" . $searchValue . "%' or x.outlet_name like '%" . $searchValue . "%' or a.invoice like '%" . $searchValue . "%' or a.date like'%" . $searchValue . "%' or a.invoice_id like'%" . $searchValue . "%' or u.first_name like'%" . $searchValue . "%'or u.last_name like'%" . $searchValue . "%')";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('invoice a');
        $this->db->where('a.is_pre',1);
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id', 'left');
        $this->db->join('users u', 'u.user_id = a.sales_by', 'left');
        $this->db->join('outlet_warehouse x', 'x.outlet_id = a.outlet_id', 'left');

        $this->db->order_by('a.invoice', 'desc');
        if ($usertype == 2) {
            $this->db->where('a.sales_by', $this->session->userdata('user_id'));
        }
        if (!empty($fromdate) && !empty($todate)) {
            $this->db->where($datbetween);
        }
        if ($searchValue != '')
            $this->db->where($searchQuery);

        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('invoice a');
          $this->db->where('a.is_pre',1);
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id', 'left');
        $this->db->join('users u', 'u.user_id = a.sales_by', 'left');
        $this->db->join('outlet_warehouse x', 'x.outlet_id = a.outlet_id', 'left');

        $this->db->order_by('a.invoice', 'desc');
        if ($usertype == 2) {
            $this->db->where('a.sales_by', $this->session->userdata('user_id'));
        }
        if (!empty($fromdate) && !empty($todate)) {
            $this->db->where($datbetween);
        }
        if ($searchValue != '')
            $this->db->where($searchQuery);

        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;

        $cw_name = $this->Warehouse->central_warehouse()[0]['central_warehouse'];

        ## Fetch records
        $this->db->select("a.*,b.customer_name,u.first_name,u.last_name, x.*, a.outlet_id as outlt");
        $this->db->from('invoice a');
          $this->db->where('a.is_pre',1);
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id', 'left');
        $this->db->join('users u', 'u.user_id = a.sales_by', 'left');
        $this->db->join('outlet_warehouse x', 'x.outlet_id = a.outlet_id', 'left');
        $this->db->order_by('a.invoice', 'desc');
        if ($usertype == 2) {
            $this->db->where('a.sales_by', $this->session->userdata('user_id'));
        }
        if (!empty($fromdate) && !empty($todate)) {
            $this->db->where($datbetween);
        }
        if ($searchValue != '')
            $this->db->where($searchQuery);

        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        // echo '<pre>'; print_r($this->db->get()->result_array());exit();
        $records = $this->db->get()->result();
        $data = array();
        $sl = 1;

        foreach ($records as $record) {
            $button = '';
            $base_url = base_url();
            $jsaction = "return confirm('Are You Sure ?')";

            $button .= '  <a href="' . $base_url . 'Cinvoice/invoice_inserted_data/' . $record->invoice_id . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="' . display('invoice') . '"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';

            //    $button .='  <a href="'.$base_url.'Cinvoice/min_invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('mini_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';

            //$button .='  <a href="'.$base_url.'Cinvoice/pos_invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('pos_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';

            $button .= '  <a href="' . $base_url . 'Cinvoice/chalan_invoice_inserted_data/' . $record->invoice_id . '" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Chalan"><i class="fa fa-fax" aria-hidden="true"></i></a>';

            $button .= '  <a href="' . $base_url . 'Cinvoice/invoicdetails_download/' . $record->invoice_id . '" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="' . display('download') . '"><i class="fa fa-download"></i></a>';

            if ($this->permission1->method('manage_invoice', 'update')->access()) {
                $button .= ' <a href="' . $base_url . 'Cinvoice/invoice_update_form/' . $record->invoice_id . '" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="' . display('update') . '"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
            }



            $details = '  <a href="' . $base_url . 'Cinvoice/invoice_inserted_data/' . $record->invoice_id . '" class="" >' . $record->invoice . '</a>';
            $details_i = '  <a href="' . $base_url . 'Cinvoice/invoice_inserted_data/' . $record->invoice_id . '" class="" >' . $record->invoice_id . '</a>';

            $out = (($record->outlt == 'HK7TGDT69VFMXB7') ? $cw_name : $record->outlet_name);


            // $outlet = ($this->Warehouse->branch_search_item($record->outlet_id)) ? $this->Warehouse->branch_search_item($record->outlet_id)[0]['outlet_name'] : '';

            $data[] = array(
                'sl'               => $sl,
                'invoice_id'       => $details_i,
                'invoice'          => $details,
                'outlet_name'      => $out,
                'salesman'         => $record->first_name . ' ' . $record->last_name,
                'customer_name'    => $record->customer_name,
                'final_date'       => $this->occational->dateConvert($record->date),
                'total_amount'     => $record->total_amount,
                'button'           => $button,
            );
            $sl++;
        }

        // echo '<pre>';
        // print_r($data);
        // exit();
        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
        );

        return $response;
    }


    //Count todays_sales_report
    public function todays_sales_report()
    {
        $CI = &get_instance();

        $CI->load->model('Warehouse');

        $outlet_id = ($CI->Warehouse->get_outlet_user()) ? $CI->Warehouse->get_outlet_user()[0]['outlet_id'] : null;


        $today = date('Y-m-d');
        $this->db->select('a.*,b.customer_name, b.customer_id, a.invoice_id,a.invoice');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.date', $today);
        $this->db->where('a.outlet_id', $outlet_id);
        $this->db->order_by('a.invoice', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

    //    ======= its for  best_sales_products ===========
    public function best_sales_products()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = ($CI->Warehouse->get_outlet_user()) ? $CI->Warehouse->get_outlet_user()[0]['outlet_id'] : null;
        $this->db->select('b.product_id, b.product_name, sum(a.quantity) as quantity');
        $this->db->from('invoice_details a');
        $this->db->where('i.outlet_id', $outlet_id);
        $this->db->join('invoice i', 'i.invoice_id = a.invoice_id');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->group_by('b.product_id');
        $this->db->order_by('quantity', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ======= its for  best_sales_products ===========
    public function best_saler_product_list()
    {
        $this->db->select('b.product_id, b.product_name, sum(a.quantity) as quantity');
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->group_by('b.product_id');
        $this->db->order_by('quantity', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //    ======= its for  todays_customer_receipt ===========
    public function todays_customer_receipt($today = null)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->get_outlet_user()[0]['outlet_id'];
        $this->db->select('a.*,b.HeadName,c.customer_name,c.address2');
        $this->db->from('acc_transaction a');
        $this->db->join('acc_coa b', 'a.COAID=b.HeadCode');
        $this->db->join('customer_information c', 'b.customer_id=c.customer_id');
        // $this->db->where('outlet_id', $outlet_id);
        $this->db->where('a.Credit >', 0);
        $this->db->where('DATE(a.VDate)', $today);
        $this->db->where('a.IsAppove', 1);
        $query = $this->db->get();
        return $query->result();
    }

    //    ======= its for  todays_customer_receipt ===========
    public function filter_customer_wise_receipt($custome_id = null, $district = null, $from_date = null)
    {
        $this->db->select('a.*,b.HeadName,c.address2');
        $this->db->from('acc_transaction a');
        $this->db->join('acc_coa b', 'a.COAID=b.HeadCode');
        $this->db->join('customer_information c', 'b.customer_id=c.customer_id');
        if ($custome_id) {
            $this->db->where('a.Credit >', 0);
            $this->db->where('a.IsAppove', 1);
            $this->db->where('b.customer_id', $custome_id);
        }
        if ($district) {
            $this->db->where('a.IsAppove', 1);
            $this->db->where('a.Credit >', 0);
            $this->db->where('c.address2', $district);
        }
        if ($from_date) {
            $this->db->where('a.IsAppove', 1);
            $this->db->where('a.Credit >', 0);
            $this->db->where('DATE(a.VDate)', $from_date);
        }
        if ($custome_id && $district && $from_date) {
            $this->db->where('a.IsAppove', 1);
            $this->db->where('a.Credit >', 0);
            $this->db->where('b.customer_id', $custome_id);
            $this->db->where('c.address2', $district);
            $this->db->where('DATE(a.VDate)', $from_date);
        }



        $query = $this->db->get();
        return $query->result();
    }

    //invoice List
    public function invoice_list($perpage = null, $page = null)
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id', 'left');
        $this->db->order_by('a.invoice', 'desc');
        if ($perpage && $page)
            $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function todays_invoice()
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id', 'left');
        $this->db->where('a.date', date('Y-m-d'));
        $this->db->order_by('a.invoice', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // pdf list
    public function invoice_list_pdf()
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->order_by('a.invoice', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function user_invoice_data($user_id)
    {
        return  $this->db->select('*')->from('users')->where('user_id', $user_id)->get()->row();
    }
    // search invoice by customer id
    public function invoice_search($customer_id, $per_page, $page)
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.customer_id', $customer_id);
        $this->db->order_by('a.invoice', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // invoice search by invoice id
    public function invoice_list_invoice_id($invoice_no)
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('invoice', $invoice_no);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // date to date invoice list
    public function invoice_list_date_to_date($from_date, $to_date, $perpage, $page)
    {
        $dateRange = "a.date BETWEEN '$from_date' AND '$to_date'";
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where($dateRange, NULL, FALSE);
        $this->db->order_by('a.invoice', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Invoiec list date to date
    public function invoice_list_date_to_date_count($from_date, $to_date)
    {
        $dateRange = "a.date BETWEEN '$from_date%' AND '$to_date%'";
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where($dateRange, NULL, FALSE);
        $this->db->order_by('a.invoice', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //invoice List
    public function invoice_list_count()
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->order_by('a.invoice', 'desc');
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    // count invoice search by customer
    public function invoice_search_count($customer_id)
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.customer_id', $customer_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //invoice Search Item
    public function search_inovoice_item($customer_id)
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('b.customer_id', $customer_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //POS invoice entry
    public function pos_invoice_setup($product_id, $outlet_id = null)
    {

        $this->load->model('Reports');
        $this->load->model('Rqsn');
        $this->load->model('Products');

        // echo '<pre>';
        // print_r($product_id);
        // exit();


        $product_information = $this->Products->get_single_pr_details($product_id, true);

        $p_id=$this->db->select('product_id')->from('product_information')->where('product_id',$product_id)->or_where('sku',$product_id)->get()->row()->product_id;
        // echo '<pre>';
        // print_r($product_information);
        // exit();
        //8901058841091
        if ($product_information != null) {
            $product_information = $product_information[0];
            $this->db->select('SUM(a.quantity) as total_purchase');
            $this->db->from('product_purchase_details a');
            $this->db->where('a.product_id', $product_id);
            $total_purchase = $this->db->get()->row();

            $this->db->select('SUM(b.quantity) as total_sale');
            $this->db->from('invoice_details b');
            $this->db->where('b.product_id', $product_id);
            $total_sale = $this->db->get()->row();

            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $available_quantity = $this->Reports->getCheckList(null, $p_id)['central_stock'];
             //   $available_quantity = $this->Reports->current_stock($product_id,1);
            } else {
                $available_quantity = $this->Rqsn->outlet_stock(null, $p_id)['outlet_stock'];

               // echo '<pre>';print_r($available_quantity);exit();
            }

            $data2 = (object) array(
                'total_product'  => $available_quantity,
                'supplier_price' => $product_information->supplier_price,
                'price'          => $product_information->price,
                'purchase_price'          => $product_information->purchase_price,
                'supplier_id'    => $product_information->supplier_id,
                'product_id'     => $product_information->product_id,
                'product_name'   => $product_information->product_name,
                'product_model'  => $product_information->product_model,
                'sku'  => $product_information->sku,
                'product_color'  => $product_information->color_name,
                'product_size'   => $product_information->size_name,
                'unit'           => $product_information->unit,
                'tax'            => $product_information->tax,
                'image'          => $product_information->image,
                'serial_no'      => $product_information->serial_no,
                'warehouse'      => $product_information->warehouse,
                'warrenty_date'  => $product_information->warrenty_date,
                'expired_date'   => $product_information->expired_date,
            );

            // echo '<pre>';
            // print_r($data2);
            // exit();

            return $data2;
        } else {
            return false;
        }
    }

    //POS customer setup
    public function pos_customer_setup()
    {
        $query = $this->db->select('*')
            ->from('customer_information')
            ->where('customer_name', 'Walking Customer')
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }






    //        public function add_cheque($data) {
    //            $this->db->select('*');
    //            $this->db->from('customer_information');
    //            $this->db->where('customer_name', $data['customer_name']);
    //            $query = $this->db->get();
    //            if ($query->num_rows() > 0) {
    //                return FALSE;
    //            } else {
    //                $this->db->insert('customer_information', $data);
    //                return TRUE;
    //            }
    //        }





    //Count invoice
    public function invoice_entry()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $CI->load->model('Products');
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $invoice_id = $this->generator(10);
        $invoice_id = strtoupper($invoice_id);
        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $quantity = $this->input->post('product_quantity', TRUE);
        $invoice_no_generated = $this->number_generator();

        $Vdate = $this->input->post('invoice_date', TRUE);
        $agg_id = $this->input->post('agg_id', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);

        $sel_type = $this->input->post('sel_type', TRUE);

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


        //Data inserting into invoice table
        $delivery_type = $this->input->post('deliver_type', TRUE);




        if ($this->input->post('paid_amount', TRUE) <= 0) {

            $datainv = array(
                'invoice_id'      => $invoice_id,
                'customer_id'     => $customer_id,
                'agg_id'     =>  (!empty($agg_id) ? $agg_id : NULL),
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
                'condition_cost'   => $this->input->post('condition_cost', TRUE),
                'commission'   => $this->input->post('commission', TRUE),
                'sale_type'   => $this->input->post('sel_type', TRUE),
                'courier_condtion'   => $this->input->post('courier_condtion', TRUE),
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
                'courier_status'      => 1,

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
                        // print_r($image_url);
                    }

                    // echo '<pre>';print_r( $uploadImgData[$i]['image']);exit();
                }
            }
            // exit();
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

                    //  echo '<pre>';print_r($data);
                    // $this->ProductModel->add_products($data);
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
                        // print_r($image_url);
                    }

                    // echo '<pre>';print_r( $uploadImgData[$i]['image']);exit();
                }
            }
            // exit();
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

                    //  echo '<pre>';print_r($data);
                    // $this->ProductModel->add_products($data);
                    if (!empty($data)) {
                        $this->db->insert('cus_cheque', $data);
                    }
                }
            }



            $datainv = array(
                'invoice_id'      => $invoice_id,
                'customer_id'     => $customer_id,
                'agg_id'     =>  (!empty($agg_id) ? $agg_id : NULL),
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
                'condition_cost'   => $this->input->post('condition_cost', TRUE),
                'commission'   => $this->input->post('commission', TRUE),
                'sale_type'   => $this->input->post('sel_type', TRUE),
                'courier_condtion'   => $this->input->post('courier_condtion', TRUE),
                'sales_by'        => $createby,
                'status'          => 1,
                // 'payment_type'    =>  $this->input->post('paytype',TRUE)[0],
                //                'cheque_date'     =>$cheque_d,
                //                'cheque_no'    =>  $cheque,
                'delivery_type'    =>  $delivery_type,
                'bank_id'         => (!empty($this->input->post('bank_id', TRUE)) ? $this->input->post('bank_id', TRUE) : null),
                // 'bkash_id'         => (!empty($this->input->post('bkash_id', TRUE)) ? $this->input->post('bkash_id', TRUE) : null),
                // 'nagad_id'         => (!empty($this->input->post('nagad_id', TRUE)) ? $this->input->post('nagad_id', TRUE) : null),
                'courier_id'         => (!empty($this->input->post('courier_id', TRUE)) ? $this->input->post('courier_id', TRUE) : null),
                'branch_id'         => (!empty($this->input->post('branch_id', TRUE)) ? $this->input->post('branch_id', TRUE) : null),
                'outlet_id'       =>  $this->input->post('outlet_name', TRUE),
                'reciever_id'       => $this->input->post('deli_reciever', TRUE),
                'receiver_number'     => $this->input->post('del_rec_num', TRUE),
                'customer_card_no'      => $cus_card,
                'courier_status'      => 1,

            );


            // echo '<pre>'; print_r($datainv); exit();

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
        // print_r($sumval);
        // exit();

        if ($sel_type == 1 || 2) {


            $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
            $headn = $customer_id . '-' . $cusifo->customer_name;
            $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
            $customer_headcode = $coainfo->HeadCode;
            $cs_name= $cusifo->customer_name;

        } else if ($sel_type == 3){

            $cusifo = $this->db->select('*')->from('aggre_list')->where('id', $agg_id)->get()->row();
            $headn = $agg_id . '-' . $cusifo->aggre_name;
            $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
            $customer_headcode = $coainfo->HeadCode;
            $cs_name= $cusifo->aggre_name;
        }

        if ($delivery_type == 2){
            $courier_condtion = $this->input->post('courier_condtion', TRUE);

            $courier_id = $this->input->post('courier_id', TRUE);
            $corifo = $this->db->select('*')->from('courier_name')->where('courier_id', $courier_id)->get()->row();
            $headn_cour = $corifo->id . '-' . $corifo->courier_name;
            $coainfo_cor = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn_cour)->get()->row();
            $courier_headcode = $coainfo_cor->HeadCode;
            $courier_name= $corifo->courier_name;

            $grand_total=$this->input->post('grand_total_price', TRUE);
            $shipping_cost=$this->input->post('shipping_cost', TRUE);
            $condition_cost=$this->input->post('condition_cost', TRUE);
            $due_amount= $this->input->post('due_amount', TRUE);
            $paid_amount= $this->input->post('paid_amount', TRUE);

            $courier_pay=$grand_total-($shipping_cost+$condition_cost);
            $courier_pay_partial=$due_amount-($shipping_cost+$condition_cost);


            $DC=$this->input->post('shipping_cost', TRUE)+$this->input->post('condition_cost', TRUE);

            if ( $courier_condtion ==  1){


                $corcr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Courier Debit For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => 0,
                    'Debit'         =>   (!empty($courier_pay) ? $courier_pay : null),
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcr);

                $corcc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge and Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => (!empty($DC) ? $DC : null),
                    'Debit'         =>   0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcc);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

                $condition_charge = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040105,
                    'Narration'      =>  'Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('condition_cost', TRUE)) ? $this->input->post('condition_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $condition_charge);

            }

            if ( $courier_condtion ==  2){




                $cordr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Courier Debit For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Debit'          =>  (!empty($courier_pay_partial) ? $courier_pay_partial : null),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $cordr);
                $corcc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge and Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => (!empty($DC) ? $DC : null),
                    'Debit'         =>   0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcc);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

                $condition_charge = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040105,
                    'Narration'      =>  'Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('condition_cost', TRUE)) ? $this->input->post('condition_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $condition_charge);

            }

            if($courier_condtion == 3){

                $cosdr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $customer_headcode,
                    'Narration'      =>  'Customer debit For Invoice No -  ' . $invoice_no_generated . ' Customer ' . $cs_name,
                    'Debit'          =>  $this->input->post('n_total', TRUE) - (!empty($this->input->post('previous', TRUE)) ? $this->input->post('previous', TRUE) : 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $cosdr);

                $corcr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Credit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): null),
                    'Debit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcr);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): null),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

//                $this->db->set('courier_paid',1);
//                $this->db->where('invoice_id',$invoice_id);
//                $this->db->update('invoice');

            }


        }





        ///Inventory credit
        $coscr = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INV',
            'VDate'          =>  $Vdate,
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory credit For Invoice No' . $invoice_no_generated,
            'Debit'          =>  0,
            'Credit'         =>  $sumval, //purchase price asbe
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

        ///Customer credit for Paid Amount


        $paid = $this->input->post('p_amount', TRUE);
        // echo "<pre>";print_r($paid);

        if (count($paid) > 0 ) {
            for ($i = 0; $i < count($pay_type); $i++) {

                if ($paid[$i] > 0){

                    if ($pay_type[$i] == 1) {

                        $cc = array(
                            'VNo'            =>  $invoice_id,
                            'Vtype'          =>  'INV',
                            'VDate'          =>  $Vdate,
                            'COAID'          =>  1020101,
                            'Narration'      =>  'Cash in Hand in Sale for Invoice ID - ' . $invoice_id . ' customer- ' . $cs_name,
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
                            'Narration'      =>  'Customer credit (Cash In Hand) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cs_name,
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
                            'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Cash in Bkash paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cs_name,
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
                            'Narration'      =>  'Customer credit (Cash In Bkash) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Cash in Nagad paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                            'Narration'      =>  'Customer credit (Cash In Nagad) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cusifo->customer_name,
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
                            'Narration'      =>  'Paid amount for customer in card - ' . $card_info[0]['card_no'] . '  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                            'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Invoice NO- ' . $invoice_no_generated,
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


        }

            // echo '<pre>';print_r($CUS);



        //  $p_id_two=$this->db->query(" SELECT product_id_two FROM `product_information` WHERE product_id=$product_id")->result();

        $rate                = $this->input->post('product_rate', TRUE);
        $p_id                = $this->input->post('product_id', TRUE);
        $total_amount        = $this->input->post('total_price', TRUE);
        $discount_rate       = $this->input->post('discount_amount', TRUE);
        $discount_per        = $this->input->post('discount', TRUE);
        $commission_per        = $this->input->post('comm', TRUE);
        // $tax_amount          = $this->input->post('tax',TRUE);
        $invoice_description = $this->input->post('desc', TRUE);
        $serial_n            = $this->input->post('serial_no', TRUE);
        // $warehouse           =$this->input->post('warehouse',TRUE);
        $warrenty            = $this->input->post('warrenty_date', TRUE);
        // $expiry            = $this->input->post('expiry_date', TRUE);


        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            // $war=$warehouse[$i];
            // $warrenty_date = $warrenty[$i];
            // $expiry_date = $expiry[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $serial_no  = (!empty($serial_n[$i]) ? $serial_n[$i] : null);
            $total_price = $total_amount[$i];
            $supplier_rate = $this->supplier_price($product_id);
            $disper = $discount_per[$i];
            $comm = $commission_per[$i];
            $discount = is_numeric($product_quantity) * is_numeric($product_rate) * is_numeric($disper) / 100;
            // $tax = $tax_amount[$i];
            // $description = $invoice_description[$i];

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
                'commission_per'       => $comm,
                // 'tax'                => $tax,
                'paid_amount'        => $paidamount,
                'due_amount'         => $this->input->post('due_amount', TRUE),
                'supplier_rate'      => $supplier_rate,
                'total_price'        => $total_price,
                'status'             => 2
            );
            //  echo '<pre>';print_r($data1);exit();
            // $data2 = array(
            //     'purchase_id'=>date('YmdHis'),
            //     'purchase_detail_id' => $this->generator(15),
            //     'product_id'         => $product_id,
            //     'quantity'           => -$product_quantity,
            //     'warehouse'           => $warehouse,
            //     'warrenty_date'      => $warrenty_date,
            //     'rate'               => $product_rate,
            //     'discount'           => $discount,
            //     'total_amount'       => $total_price,
            //     'status'             => 1
            // );

            if (!empty($quantity)) {
                //echo '<pre>';print_r($data1);exit();
                $this->db->insert('invoice_details', $data1);
                //$this->db->insert('product_purchase_details', $data2);
                // $this->db->insert('product_purchase_details', $data2);
            }
        }



        // $message = 'Mr.' . $customerinfo->customer_name . ',
        // ' . 'You have purchase  ' . $this->input->post('grand_total_price', TRUE) . ' ' . $currency_details[0]['currency'] . ' You have paid .' . $this->input->post('paid_amount', TRUE) . ' ' . $currency_details[0]['currency'];


        // $config_data = $this->db->select('*')->from('sms_settings')->get()->row();
        // if ($config_data->isinvoice == 1) {
        //     $this->smsgateway->send([
        //         'apiProvider' => 'nexmo',
        //         'username'    => $config_data->api_key,
        //         'password'    => $config_data->api_secret,
        //         'from'        => $config_data->from,
        //         'to'          => $customerinfo->customer_mobile,
        //         'message'     => $message
        //     ]);
        // }
        // exit();
        return $invoice_id;
    }

    public function pos_invoice_entry()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $CI->load->model('Products');
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $invoice_id = $this->generator(10);
        $invoice_id = strtoupper($invoice_id);
        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $quantity = $this->input->post('product_quantity', TRUE);
        $invoice_no_generated = $this->number_generator();

        $Vdate = $this->input->post('invoice_date', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);


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


        //Data inserting into invoice table
        $delivery_type = $this->input->post('deliver_type', TRUE);




        if ($this->input->post('paid_amount', TRUE) <= 0) {

            $datainv = array(
                'invoice_id'      => $invoice_id,
                'customer_id'     => $customer_id,
                'agg_id'     =>  (!empty($agg_id) ? $agg_id : NULL),
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
                'condition_cost'   => $this->input->post('condition_cost', TRUE),
                'commission'   => $this->input->post('commission', TRUE),
                'sale_type'   => $this->input->post('sel_type', TRUE),
                'courier_condtion'   => $this->input->post('courier_condtion', TRUE),
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
                'courier_status'      => 1,

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
                        // print_r($image_url);
                    }

                    // echo '<pre>';print_r( $uploadImgData[$i]['image']);exit();
                }
            }
            // exit();
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

                    //  echo '<pre>';print_r($data);
                    // $this->ProductModel->add_products($data);
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
                        // print_r($image_url);
                    }

                    // echo '<pre>';print_r( $uploadImgData[$i]['image']);exit();
                }
            }
            // exit();
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

                    //  echo '<pre>';print_r($data);
                    // $this->ProductModel->add_products($data);
                    if (!empty($data)) {
                        $this->db->insert('cus_cheque', $data);
                    }
                }
            }



            $datainv = array(
                'invoice_id'      => $invoice_id,
                'customer_id'     => $customer_id,
                'agg_id'     =>  (!empty($agg_id) ? $agg_id : NULL),
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
                'condition_cost'   => $this->input->post('condition_cost', TRUE),
                'commission'   => $this->input->post('commission', TRUE),
                'sale_type'   => $this->input->post('sel_type', TRUE),
                'courier_condtion'   => $this->input->post('courier_condtion', TRUE),
                'sales_by'        => $createby,
                'status'          => 1,
                // 'payment_type'    =>  $this->input->post('paytype',TRUE)[0],
                //                'cheque_date'     =>$cheque_d,
                //                'cheque_no'    =>  $cheque,
                'delivery_type'    =>  $delivery_type,
                'bank_id'         => (!empty($this->input->post('bank_id', TRUE)) ? $this->input->post('bank_id', TRUE) : null),
                // 'bkash_id'         => (!empty($this->input->post('bkash_id', TRUE)) ? $this->input->post('bkash_id', TRUE) : null),
                // 'nagad_id'         => (!empty($this->input->post('nagad_id', TRUE)) ? $this->input->post('nagad_id', TRUE) : null),
                'courier_id'         => (!empty($this->input->post('courier_id', TRUE)) ? $this->input->post('courier_id', TRUE) : null),
                'branch_id'         => (!empty($this->input->post('branch_id', TRUE)) ? $this->input->post('branch_id', TRUE) : null),
                'outlet_id'       =>  $this->input->post('outlet_name', TRUE),
                'reciever_id'       => $this->input->post('deli_reciever', TRUE),
                'receiver_number'     => $this->input->post('del_rec_num', TRUE),
                'customer_card_no'      => $cus_card,
                'courier_status'      => 1,

            );


            // echo '<pre>'; print_r($datainv); exit();

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
        // print_r($sumval);
        // exit();




            $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
            $headn = $customer_id . '-' . $cusifo->customer_name;
            $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
            $customer_headcode = $coainfo->HeadCode;
            $cs_name= $cusifo->customer_name;


        if ($delivery_type == 2){
            $courier_condtion = $this->input->post('courier_condtion', TRUE);

            $courier_id = $this->input->post('courier_id', TRUE);
            $corifo = $this->db->select('*')->from('courier_name')->where('courier_id', $courier_id)->get()->row();
            $headn_cour = $corifo->id . '-' . $corifo->courier_name;
            $coainfo_cor = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn_cour)->get()->row();
            $courier_headcode = $coainfo_cor->HeadCode;
            $courier_name= $corifo->courier_name;

            $grand_total=$this->input->post('grand_total_price', TRUE);
            $shipping_cost=$this->input->post('shipping_cost', TRUE);
            $condition_cost=$this->input->post('condition_cost', TRUE);
            $due_amount= $this->input->post('due_amount', TRUE);
            $paid_amount= $this->input->post('paid_amount', TRUE);

            $courier_pay=$grand_total-($shipping_cost+$condition_cost);
            $courier_pay_partial=$due_amount-($shipping_cost+$condition_cost);


            $DC=$this->input->post('shipping_cost', TRUE)+$this->input->post('condition_cost', TRUE);

            if ( $courier_condtion ==  1){


                $corcr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Courier Debit For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => 0,
                    'Debit'         =>   (!empty($courier_pay) ? $courier_pay : null),
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcr);

                $corcc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge and Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => (!empty($DC) ? $DC : null),
                    'Debit'         =>   0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcc);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

                $condition_charge = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040105,
                    'Narration'      =>  'Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('condition_cost', TRUE)) ? $this->input->post('condition_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $condition_charge);

            }

            if ( $courier_condtion ==  2){




                $cordr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Courier Debit For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Debit'          =>  (!empty($courier_pay_partial) ? $courier_pay_partial : null),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $cordr);
                $corcc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge and Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => (!empty($DC) ? $DC : null),
                    'Debit'         =>   0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcc);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

                $condition_charge = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040105,
                    'Narration'      =>  'Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('condition_cost', TRUE)) ? $this->input->post('condition_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $condition_charge);

            }

            if($courier_condtion == 3){

                $cosdr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $customer_headcode,
                    'Narration'      =>  'Customer debit For Invoice No -  ' . $invoice_no_generated . ' Customer ' . $cs_name,
                    'Debit'          =>  $this->input->post('n_total', TRUE) - (!empty($this->input->post('previous', TRUE)) ? $this->input->post('previous', TRUE) : 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $cosdr);

                $corcr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Credit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): null),
                    'Debit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcr);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): null),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

//                $this->db->set('courier_paid',1);
//                $this->db->where('invoice_id',$invoice_id);
//                $this->db->update('invoice');

            }


        }





        ///Inventory credit
        $coscr = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INV',
            'VDate'          =>  $Vdate,
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory credit For Invoice No' . $invoice_no_generated,
            'Debit'          =>  0,
            'Credit'         =>  $sumval, //purchase price asbe
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

        ///Customer credit for Paid Amount


        $paid = $this->input->post('p_amount', TRUE);
        // echo "<pre>";print_r($paid);

        if (count($paid) > 0 ) {
            for ($i = 0; $i < count($pay_type); $i++) {

                if ($paid[$i] > 0){

                    if ($pay_type[$i] == 1) {

                        $cc = array(
                            'VNo'            =>  $invoice_id,
                            'Vtype'          =>  'INV',
                            'VDate'          =>  $Vdate,
                            'COAID'          =>  1020101,
                            'Narration'      =>  'Cash in Hand in Sale for Invoice ID - ' . $invoice_id . ' customer- ' . $cs_name,
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
                            'Narration'      =>  'Customer credit (Cash In Hand) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cs_name,
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
                            'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Cash in Bkash paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cs_name,
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
                            'Narration'      =>  'Customer credit (Cash In Bkash) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Cash in Nagad paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                            'Narration'      =>  'Customer credit (Cash In Nagad) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cusifo->customer_name,
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
                            'Narration'      =>  'Paid amount for customer in card - ' . $card_info[0]['card_no'] . '  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                            'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cs_name,
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
                            'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Invoice NO- ' . $invoice_no_generated,
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


        }

            // echo '<pre>';print_r($CUS);



        //  $p_id_two=$this->db->query(" SELECT product_id_two FROM `product_information` WHERE product_id=$product_id")->result();

        $rate                = $this->input->post('product_rate', TRUE);
        $p_id                = $this->input->post('product_id', TRUE);
        $total_amount        = $this->input->post('total_price', TRUE);
        $discount_rate       = $this->input->post('discount_amount', TRUE);
        $discount_per        = $this->input->post('discount', TRUE);
        $commission_per        = $this->input->post('comm', TRUE);
        // $tax_amount          = $this->input->post('tax',TRUE);
        $invoice_description = $this->input->post('desc', TRUE);
        $serial_n            = $this->input->post('serial_no', TRUE);
        // $warehouse           =$this->input->post('warehouse',TRUE);
        $warrenty            = $this->input->post('warrenty_date', TRUE);
        // $expiry            = $this->input->post('expiry_date', TRUE);


        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            // $war=$warehouse[$i];
            // $warrenty_date = $warrenty[$i];
            // $expiry_date = $expiry[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $serial_no  = (!empty($serial_n[$i]) ? $serial_n[$i] : null);
            $total_price = $total_amount[$i];
            $supplier_rate = $this->supplier_price($product_id);
            $disper = $discount_per[$i];
            $comm = $commission_per[$i];
            $discount = is_numeric($product_quantity) * is_numeric($product_rate) * is_numeric($disper) / 100;
            // $tax = $tax_amount[$i];
            // $description = $invoice_description[$i];

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
                'commission_per'       => $comm,
                // 'tax'                => $tax,
                'paid_amount'        => $paidamount,
                'due_amount'         => $this->input->post('due_amount', TRUE),
                'supplier_rate'      => $supplier_rate,
                'total_price'        => $total_price,
                'status'             => 2
            );
            //  echo '<pre>';print_r($data1);exit();
            // $data2 = array(
            //     'purchase_id'=>date('YmdHis'),
            //     'purchase_detail_id' => $this->generator(15),
            //     'product_id'         => $product_id,
            //     'quantity'           => -$product_quantity,
            //     'warehouse'           => $warehouse,
            //     'warrenty_date'      => $warrenty_date,
            //     'rate'               => $product_rate,
            //     'discount'           => $discount,
            //     'total_amount'       => $total_price,
            //     'status'             => 1
            // );

            if (!empty($quantity)) {
                //echo '<pre>';print_r($data1);exit();
                $this->db->insert('invoice_details', $data1);
                //$this->db->insert('product_purchase_details', $data2);
                // $this->db->insert('product_purchase_details', $data2);
            }
        }



        // $message = 'Mr.' . $customerinfo->customer_name . ',
        // ' . 'You have purchase  ' . $this->input->post('grand_total_price', TRUE) . ' ' . $currency_details[0]['currency'] . ' You have paid .' . $this->input->post('paid_amount', TRUE) . ' ' . $currency_details[0]['currency'];


        // $config_data = $this->db->select('*')->from('sms_settings')->get()->row();
        // if ($config_data->isinvoice == 1) {
        //     $this->smsgateway->send([
        //         'apiProvider' => 'nexmo',
        //         'username'    => $config_data->api_key,
        //         'password'    => $config_data->api_secret,
        //         'from'        => $config_data->from,
        //         'to'          => $customerinfo->customer_mobile,
        //         'message'     => $message
        //     ]);
        // }
        // exit();
        return $invoice_id;
    }

    //Get Supplier rate of a product
    public function supplier_rate($product_id)
    {
        $this->db->select('supplier_price');
        $this->db->from('supplier_product');
        $this->db->where(array('product_id' => $product_id));
        $query = $this->db->get();
        return $query->result_array();

        $this->db->select('Avg(rate) as supplier_price');
        $this->db->from('product_purchase_details');
        $this->db->where(array('product_id' => $product_id));
        $query = $this->db->get()->row();
        return $query->result_array();
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


    //Retrieve invoice Edit Data
    public function retrieve_invoice_editdata($invoice_id)
    {
        $this->db->select('a.*,cr.*,br.*, a.due_amount as due_amnt, a.paid_amount as p_amnt, sum(c.quantity) as sum_quantity, a.total_tax as taxs,a. prevous_due,b.customer_name,c.*,c.tax as total_tax,c.product_id,d.product_name,d.product_model,d.tax,d.unit,d.*');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->join('invoice_details c', 'c.invoice_id = a.invoice_id');
        $this->db->join('courier_name cr', 'cr.courier_id = a.courier_id','left');
        $this->db->join('branch_name br', 'br.branch_id = a.branch_id','left');

        // $this->db->join('employee_history u', 'a.sales_by = u.id');

        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->where('a.invoice_id', $invoice_id);
        $this->db->group_by('d.product_id');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function retrieve_invoice_order_data($invoice_id)
    {
        $this->db->select('*');
        $this->db->from('invoice a');
        $this->db->join('courier_name cr', 'cr.courier_id = a.courier_id','left');
        $this->db->join('branch_name br', 'br.branch_id = a.branch_id','left');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //update_invoice
    public function update_invoice()
    {

        $CI = &get_instance();

        $CI->load->model('Products');

        $Vdate = $this->input->post('invoice_date', TRUE);

        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column  = count($tablecolumn) - 4;
        $invoice_id  = $this->input->post('invoice_id', TRUE);
        $invoice_no  = $this->input->post('invoice', TRUE);
        $createby    = $this->session->userdata('user_id');
        $createdate  = date('Y-m-d H:i:s');
        $customer_id = $this->input->post('customer_id', TRUE);
        $quantity    = $this->input->post('product_quantity', TRUE);
        $product_id  = $this->input->post('product_id', TRUE);

        $changeamount = $this->input->post('change', TRUE);
        if ($changeamount > 0) {
            $paidamount = $this->input->post('n_total', TRUE);
        } else {
            $paidamount = $this->input->post('paid_amount', TRUE);
        }


        $card_id = $this->input->post('card_id', TRUE);
        $bank_id = $this->input->post('bank_id', TRUE);
        // if (!empty($bank_id)) {
        //     $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

        //     $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        // } else {
        //     $bankcoaid = '';
        // }

        $transection_id = $this->auth->generator(15);


        $this->db->where('VNo', $invoice_id);
        $this->db->delete('acc_transaction');
        $this->db->where('relation_id', $invoice_id);
        $this->db->delete('tax_collection');

        $data = array(
            'invoice_id'      => $invoice_id,
            'customer_id'     => $this->input->post('customer_id', TRUE),
            'date'            => $this->input->post('invoice_date', TRUE),
            'total_amount'    => $this->input->post('grand_total_price', TRUE),
            'total_tax'       => $this->input->post('total_tax', TRUE),
            'customer_name_two'       => $this->input->post('customer_name_two', TRUE),
            'customer_mobile_two'       => $this->input->post('customer_mobile_two', TRUE),
            'invoice_details' => $this->input->post('inva_details', TRUE),
            'due_amount'      => $this->input->post('due_amount', TRUE),
            'paid_amount'     => $this->input->post('paid_amount', TRUE),
            'invoice_discount' => $this->input->post('invoice_discount', TRUE),
            'total_discount'  => $this->input->post('total_discount', TRUE),
            'prevous_due'     => $this->input->post('previous', TRUE),
            'courier_id'     => $this->input->post('courier_id', TRUE),
            'branch_id'     => $this->input->post('branch_id', TRUE),
            'is_pre'     => 1,
            // 'sales_by'     => $this->input->post('employee_id',TRUE),
            'shipping_cost'   => $this->input->post('shipping_cost', TRUE),
            'courier_condtion'   => $this->input->post('courier_condtion', TRUE),
            // 'payment_type'    => (!empty($this->input->post('paytype', TRUE)) ? $this->input->post('paytype', TRUE) : null),
            'delivery_type'    => (!empty($this->input->post('delivery_type', TRUE)) ? $this->input->post('delivery_type', TRUE) : null),
            // 'bank_id'         => (!empty($this->input->post('bank_id', TRUE)) ? $this->input->post('bank_id', TRUE) : null),
            // 'bkash_id'         =>  (!empty($this->input->post('bkash_id',TRUE))?$this->input->post('bank_id',TRUE):null),
            // 'branch_id'         =>  (!empty($this->input->post('branch_id',TRUE))?$this->input->post('branch_id',TRUE):null),
        );

        //echo '<pre>';print_r($data);exit();delivery_type,paytype



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
        // Cash in Hand debit




        if ($invoice_id != '') {
            $this->db->where('invoice_id', $invoice_id);
            $this->db->update('invoice', $data);
        }




        for ($j = 0; $j < $num_column; $j++) {
            $taxfield = 'tax' . $j;
            $taxvalue = 'total_tax' . $j;
            $taxdata[$taxfield] = $this->input->post($taxvalue);
        }
        $taxdata['customer_id'] = $customer_id;
        $taxdata['date']        = (!empty($this->input->post('invoice_date', TRUE)) ? $this->input->post('invoice_date', TRUE) : date('Y-m-d'));
        $taxdata['relation_id'] = $invoice_id;
        // $this->db->insert('tax_collection', $taxdata);

        // Inserting for Accounts adjustment.
        ############ default table :: customer_payment :: inflow_92mizdldrv #################

        $invoice_d_id  = $this->input->post('invoice_details_id', TRUE);
        $cartoon       = $this->input->post('cartoon', TRUE);
        $quantity      = $this->input->post('product_quantity', TRUE);
        $rate          = $this->input->post('product_rate', TRUE);
        $p_id          = $this->input->post('product_id', TRUE);
        $total_amount  = $this->input->post('total_price', TRUE);
        $discount_rate = $this->input->post('discount_amount', TRUE);
        $discount_per  = $this->input->post('discount', TRUE);
        $invoice_description = $this->input->post('desc', TRUE);

        $this->db->where('invoice_id', $invoice_id);
        $this->db->delete('invoice_details');

        $this->db->where('invoice_id', $invoice_id);
        $this->db->delete('paid_amount');


        $serial_n       = $this->input->post('serial_no', TRUE);
        // $warehouse       = $this->input->post('warehouse',TRUE);
        $warrenty_date       = $this->input->post('warrenty_date', TRUE);
        $expiry_date       = $this->input->post('expiry_date', TRUE);
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $cartoon_quantity = $cartoon[$i];
            $product_quantity = $quantity[$i];
            $product_rate     = $rate[$i];
            $product_id       = $p_id[$i];
            $serial_no        = (!empty($serial_n[$i]) ? $serial_n[$i] : null);
            // $war        = (!empty($warehouse[$i])?$warehouse[$i]:null);
            $total_price      = $total_amount[$i];
            $supplier_rate    = $this->supplier_price($product_id);
            $discount         = $discount_rate[$i];
            $dis_per          = $discount_per[$i];
            // $desciption        = $invoice_description[$i];
            if (!empty($tax_amount[$i])) {
                $tax = $tax_amount[$i];
            } else {
                $tax = $this->input->post('tax');
            }


            $data1 = array(
                'invoice_details_id' => $this->generator(15),
                'invoice_id'         => $invoice_id,
                'product_id'         => $product_id,
                'sn'          => $serial_no,
                // 'warehouse'          => $war,
                'warrenty_date'          => $serial_no,
                'expiry_date'          => $serial_no,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'discount'           => $discount,
                'total_price'        => $total_price,
                'discount_per'       => $dis_per,
                'tax'                => $this->input->post('total_tax', TRUE),
                'paid_amount'        => $paidamount,
                'supplier_rate'     => (!empty($supplier_rate)) ? $supplier_rate: null,
                'due_amount'         => $this->input->post('due_amount', TRUE),
                'pre_order'=>1
                // 'description'       => $desciption,
            );
            $this->db->insert('invoice_details', $data1);





            $customer_id = $this->input->post('customer_id', TRUE);
        }




        $invoice_id  = $this->input->post('invoice_id', TRUE);

        $pay_row = $this->input->post('row_id', true);
        $pay_amount = $this->input->post('pay_amount', true);

        // for ($i = 0; $i < count($pay_row); $i++) {
        //     $this->db->where('id', $pay_row[$i]);
        //     $this->db->set('amount', $pay_amount[$i]);
        //     $this->db->update('paid_amount');
        // }

        $paid = $this->input->post('p_amount', TRUE);
        $pay_type = $this->input->post('paytype', TRUE);
        $p_amount = $this->input->post('p_amount', TRUE);
        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $bkashname = '';
        $card_id = $this->input->post('card_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);


        if ($sel_type == 1 || 2) {


            $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
            $headn = $customer_id . '-' . $cusifo->customer_name;
            $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
            $customer_headcode = $coainfo->HeadCode;
            $cs_name= $cusifo->customer_name;

        } else if ($sel_type == 3){

            $cusifo = $this->db->select('*')->from('aggre_list')->where('id', $agg_id)->get()->row();
            $headn = $agg_id . '-' . $cusifo->aggre_name;
            $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
            $customer_headcode = $coainfo->HeadCode;
            $cs_name= $cusifo->aggre_name;
        }

        if ($delivery_type == 2){
            $courier_condtion = $this->input->post('courier_condtion', TRUE);

            $courier_id = $this->input->post('courier_id', TRUE);
            $corifo = $this->db->select('*')->from('courier_name')->where('courier_id', $courier_id)->get()->row();
            $headn_cour = $corifo->id . '-' . $corifo->courier_name;
            $coainfo_cor = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn_cour)->get()->row();
            $courier_headcode = $coainfo_cor->HeadCode;
            $courier_name= $corifo->courier_name;

            $grand_total=$this->input->post('grand_total_price', TRUE);
            $shipping_cost=$this->input->post('shipping_cost', TRUE);
            $condition_cost=$this->input->post('condition_cost', TRUE);
            $due_amount= $this->input->post('due_amount', TRUE);
            $paid_amount= $this->input->post('paid_amount', TRUE);

            $courier_pay=$grand_total-($shipping_cost+$condition_cost);
            $courier_pay_partial=$due_amount-($shipping_cost+$condition_cost);


            $DC=$this->input->post('shipping_cost', TRUE)+$this->input->post('condition_cost', TRUE);

            if ( $courier_condtion ==  1){


                $corcr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Courier Debit For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => 0,
                    'Debit'         =>   (!empty($courier_pay) ? $courier_pay : null),
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcr);

                $corcc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge and Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => (!empty($DC) ? $DC : null),
                    'Debit'         =>   0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcc);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

                $condition_charge = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040105,
                    'Narration'      =>  'Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('condition_cost', TRUE)) ? $this->input->post('condition_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $condition_charge);

            }

            if ( $courier_condtion ==  2){




                $cordr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Courier Debit For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Debit'          =>  (!empty($courier_pay_partial) ? $courier_pay_partial : null),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $cordr);
                $corcc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge and Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                    'Credit'          => (!empty($DC) ? $DC : null),
                    'Debit'         =>   0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcc);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

                $condition_charge = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040105,
                    'Narration'      =>  'Condition Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('condition_cost', TRUE)) ? $this->input->post('condition_cost', TRUE): 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $condition_charge);

            }

            if($courier_condtion == 3){

                $cosdr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $customer_headcode,
                    'Narration'      =>  'Customer debit For Invoice No -  ' . $invoice_no_generated . ' Customer ' . $cs_name,
                    'Debit'          =>  $this->input->post('n_total', TRUE) - (!empty($this->input->post('previous', TRUE)) ? $this->input->post('previous', TRUE) : 0),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $cosdr);

                $corcr = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  $courier_headcode,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Credit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): null),
                    'Debit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $corcr);

                $dc = array(
                    'VNo'            =>  $invoice_id,
                    'Vtype'          =>  'INV-CC',
                    'VDate'          =>  $Vdate,
                    'COAID'          =>  4040104,
                    'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                    'Debit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): null),
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       => $createby,
                    'CreateDate'     => $createdate,
                    'IsAppove'       => 1
                );
                $this->db->insert('acc_transaction', $dc);

//                $this->db->set('courier_paid',1);
//                $this->db->where('invoice_id',$invoice_id);
//                $this->db->update('invoice');

            }


        }





        ///Inventory credit
        $coscr = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INV',
            'VDate'          =>  $Vdate,
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory credit For Invoice No' . $invoice_no_generated,
            'Debit'          =>  0,
            'Credit'         =>  $sumval, //purchase price asbe
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

        // echo "<pre>";print_r($paid);
        if (count($paid) > 0) {
            for ($i = 0; $i < count($pay_type); $i++) {

                // $account_name = '';

                // switch ($pay_type[$i]) {
                //     case 1:
                //         $account_name = '';
                //         break;

                //     case 2:
                //         $account_name = '';
                //         break;

                //     case 3:
                //         $account_name = $bkashname;
                //         break;

                //     case 4:
                //         $account_name = $bankname;
                //         break;

                //     case 5:
                //         $account_name = $nagadname;
                //         break;

                //     case 6:
                //         $account_name = '';
                //         break;
                // }

                // $data = array(
                //     'invoice_id'    => $invoice_id,
                //     'pay_type'      => $pay_type[$i],
                //     'amount'        => $p_amount[$i],
                //     'account'       => $account_name
                // );

                // $this->db->insert('paid_amount', $data);

                if ($pay_type[$i] == 1) {

                    $cc = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  1020101,
                        'Narration'      =>  'Cash in Hand in Sale for Invoice ID - ' . $invoice_id . ' customer- ' . $cusifo->customer_name,
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
                        'account'       => '',
                        'COAID'         => 1020101
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Hand) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cusifo->customer_name,
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
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                        'COAID'         => $bankcoaid
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cusifo->customer_name,
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
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bkashcoaid,
                        'Narration'      =>  'Cash in Bkash paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                        'COAID'         => $bkashcoaid
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bkash) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cusifo->customer_name,
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
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $nagadcoaid,
                        'Narration'      =>  'Cash in Nagad paid amount for customer  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                        'account'       => $nagadname,
                        'COAID'         => $nagadcoaid,
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Nagad) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cusifo->customer_name,
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
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer in card - ' . $card_info[0]['card_no'] . '  Invoice ID - ' . $invoice_id . ' customer -' . $cusifo->customer_name,
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
                        'COAID'         => $bankcoaid,
                    );

                    $this->db->insert('paid_amount', $data);

                    $cuscredit = array(
                        'VNo'            =>  $invoice_id,
                        'Vtype'          =>  'INV',
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Invoice ID - ' . $invoice_id . ' Customer- ' . $cusifo->customer_name,
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
                        'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Invoice NO- ' . $invoice_no_generated,
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




            // echo '<pre>';print_r($CUS);

        }


        return $invoice_id;
    }

    public function customer_balance($customer_id)
    {
        $this->db->select("
        b.HeadCode,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance");
        $this->db->from('customer_information a');
        $this->db->join('acc_coa b', 'a.customer_id = b.customer_id', 'left');
        $this->db->where('a.customer_id', $customer_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve invoice_html_data
    public function retrieve_invoice_html_data($invoice_id)
    {
        $this->db->select(
            'a.total_tax,
                        a.*,
                        b.*,
                        c.*,
                        d.product_id,
                        d.product_name,
                        d.sku,
                        d.image,
                        d.product_details,
                        d.unit,
                        d.product_model,
                        a.paid_amount as paid_amount,
                        a.due_amount as due_amount,
                        m.color_name,
                        n.size_name,
                        e.branch_name,
                        f.courier_name,
                        o.receiver_name,
                        a.receiver_number as rec_num
                       '

        );
        $this->db->from('invoice a');
        $this->db->join('invoice_details c', 'c.invoice_id = a.invoice_id');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->join('color_list m', 'm.color_id = d.color', 'left');
        $this->db->join('size_list n', 'n.size_id = d.size', 'left');
        $this->db->join('branch_name e', 'e.branch_id = a.branch_id', 'left');
        $this->db->join('courier_name f', 'f.courier_id = a.courier_id', 'left');
        $this->db->join('receiever_info o', 'o.id = a.reciever_id', 'left');
        $this->db->where('a.invoice_id', $invoice_id);
        $this->db->where('c.quantity >', 0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Delete invoice Item
    public function retrieve_product_data($product_id)
    {
        $this->db->select('supplier_price,price,supplier_id,tax');
        $this->db->from('product_information a');
        $this->db->join('supplier_product b', 'a.product_id=b.product.id');
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //Retrieve company Edit Data
    public function retrieve_company()
    {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Delete invoice Item
    public function delete_invoice($invoice_id)
    {

        $this->db->where('invoice_id', $invoice_id)->delete('invoice');
        //Delete invoice_details table
        $this->db->where('invoice_id', $invoice_id)->delete('invoice_details');
        //Delete transaction from customer_ledger table
        return true;
    }

    public function invoice_search_list($cat_id, $company_id)
    {
        $this->db->select('a.*,b.sub_category_name,c.category_name');
        $this->db->from('invoices a');
        $this->db->join('invoice_sub_category b', 'b.sub_category_id = a.sub_category_id');
        $this->db->join('invoice_category c', 'c.category_id = b.category_id');
        $this->db->where('a.sister_company_id', $company_id);
        $this->db->where('c.category_id', $cat_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // GET TOTAL PURCHASE PRODUCT
    public function get_total_purchase_item($product_id)
    {
        $this->db->select('SUM(quantity) as total_purchase');
        $this->db->from('product_purchase_details');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // GET TOTAL SALES PRODUCT
    public function get_total_sales_item($product_id)
    {
        $this->db->select('SUM(quantity) as total_sale');
        $this->db->from('invoice_details');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Get total product
    public function get_total_product($product_id, $product_status)
    {

        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Reports');

        $this->db->select('a.*');
        $this->db->from('product_information a');
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $product_information = $this->db->get()->row();


        $available_quantity=$CI->Reports->current_stock($product_id,$product_status=null);


        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data2 = array(
            'total_product'  => $available_quantity,
//            'supplier_price' => $product_information->supplier_price,
//            'price'          => $product_information->price,
//            'supplier_id'    => $product_information->supplier_id,
            'unit'           => $product_information->unit,
            'tax'            => $product_information->tax,
            'discount_type'  => $currency_details[0]['discount_type'],
        );

        return $data2;
    }

    // product information retrieve by product id
    public function get_total_product_invoic($product_id, $customer_id)
    {

        $user_id = $this->session->userdata('user_id');

        $outlet_id = $this->input->post('outlet_id', TRUE);


        $this->db->select('a.*');
        $this->db->from('product_information a');

        // $this->db->join('product_purchase_details c', 'a.product_id=c.product_id');
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));
        $product_information = $this->db->get()->row();
        // $warehouse_information = $this->db->query("SELECT warehouse FROM `product_purchase_details` WHERE product_id=$product_id GROUP BY warehouse")->result();
        // $sn_info = $this->db->query("SELECT sn FROM `product_purchase_details` WHERE product_id=$product_id")->result();




        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $this->load->model('Reports');
        $this->load->model('Rqsn');

        $this->db->select('a.*');
        $this->db->from('discount a');
        $this->db->where('a.customer_id', $customer_id);
        // $this->db->where('a.category_id', $product_information->category_id);
        $discount = $this->db->get()->row();


        if ($outlet_id == 'HK7TGDT69VFMXB7') {
            $available_quantity = $this->Reports->getCheckList(null, $product_id)['central_stock'];
            //   $available_quantity = $this->Reports->current_stock($product_id,1);
        } else {
            $available_quantity = $this->Rqsn->outlet_stock(null, $product_id)['outlet_stock'];

            // echo '<pre>';print_r($available_quantity);exit();
        }
      //  $available_quantity = $this->reports->current_stock($product_id,1);

        $data2['total_product']  = $available_quantity;
        $data2['supplier_price'] = 0;
        // $data2['category_id'] = $product_information->category_id;
        $data2['customer_id'] = $customer_id;
        $data2['stock']     = number_format($available_quantity,2);
        // $data2['discount'] = $discount->discount_percentage;
        //  $data2['warehouse']      = $product_information->warehouse;
        $data2['price']          = $product_information->price;
        $data2['purchase_price']          = $product_information->purchase_price;
        $data2['supplier_id']    = '';

        // $data2['warrenty_date']  = $product_information->warrenty_date;
        // $data2['expired_date']  = $product_information->expired_date;
        $data2['unit']           = $product_information->unit;
        // $data2['tax']            = $product_information->tax;
        // $data2['serial']         = $html;
        // $data2['discount_type']  = $currency_details[0]['discount_type'];
        // $data2['txnmber']        = $num_column;

        // echo "<pre>";
        // print_r($data2);
        // exit();
        return $data2;
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
        $this->db->select_max('invoice', 'invoice');
        $query = $this->db->get('invoice');
        $result = $query->result_array();
        $invoice_no = $result[0]['invoice'];
        if ($invoice_no != '') {
            $invoice_no = $invoice_no + 1;
        } else {
            $invoice_no = 1000;
        }
        return $invoice_no;
    }
    public function headcode()
    {
        $query = $this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030001%'");
        return $query->row();
    }
    //csv invoice
    public function invoice_csv_file()
    {
        $query = $this->db->select('a.invoice,a.invoice_id,b.customer_name,a.date,a.total_amount')
            ->from('invoice a')
            ->join('customer_information b', 'b.customer_id = a.customer_id', 'left')
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function category_dropdown()
    {
        $data = $this->db->select("*")
            ->from('product_category')
            ->get()
            ->result();

        $list = array('' => 'select_category');
        if (!empty($data)) {
            foreach ($data as $value)
                $list[$value->category_id] = $value->category_name;
            return $list;
        } else {
            return false;
        }
    }

    public function customer_dropdown()
    {
        $data = $this->db->select("*")
            ->from('customer_information')
            ->get()
            ->result();

        $list[''] = 'Select Customer';
        if (!empty($data)) {
            foreach ($data as $value)
                $list[$value->customer_id] = $value->customer_name;
            return $list;
        } else {
            return false;
        }
    }

    public function walking_customer()
    {
        return $data = $this->db->select('*')->from('customer_information')->like('customer_name', 'walking', 'after')->get()->result_array();
    }

    public function allproduct($pr_status = 1)
    {
        $this->db->select('*');
        $this->db->from('product_information a');
        $this->db->where('a.finished_raw', $pr_status);
        $this->db->order_by('a.product_name', 'asc');
        $query = $this->db->get();
        $itemlist = $query->result();
        return $itemlist;
    }

    public function searchprod($cid = null, $pname = null)
    {
        $this->db->select('*');
        $this->db->from('product_information a');
        $this->db->like('a.category_id', $cid);
        $this->db->group_start();
        $this->db->like('a.product_name', $pname);
        $this->db->or_like('a.product_model', $pname);
        $this->db->or_like('a.product_id', $pname);
        $this->db->group_end();
        $this->db->join('size_list sl', 'a.size=sl.size_id', 'left');
        $this->db->join('color_list cl', 'a.color=cl.color_id', 'left');
        $this->db->order_by('a.product_name', 'asc');
        $query = $this->db->get();
        $itemlist = $query->result();
        return $itemlist;
    }




    public function service_invoice_taxinfo($invoice_id)
    {
        return $this->db->select('*')
            ->from('tax_collection')
            ->where('relation_id', $invoice_id)
            ->get()
            ->result_array();
    }


    public function customerinfo_rpt($customer_id)
    {
        return $this->db->select('*')
            ->from('customer_information')
            ->where('customer_id', $customer_id)
            ->get()
            ->result_array();
    }


    public function autocompletproductdata($product_name, $pr_status = null)
    {
        $this->db->select('*')
            ->from('product_information');

        if ($pr_status) {
            $this->db->where('product_information.finished_raw', $pr_status);
        }

        $query =  $this->db->group_start()
            ->like('product_name', $product_name, 'both')
            ->or_like('sku', $product_name, 'both')
            ->group_end()
            ->order_by('product_name', 'asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    public function stock_qty_check($product_id)
    {
        $this->db->select('SUM(a.quantity) as total_purchase');
        $this->db->from('product_purchase_details a');
        $this->db->where('a.product_id', $product_id);
        $total_purchase = $this->db->get()->row();

        $this->db->select('SUM(b.quantity) as total_sale');
        $this->db->from('invoice_details b');
        $this->db->where('b.product_id', $product_id);
        $total_sale = $this->db->get()->row();

        $this->db->select('a.*,b.*');
        $this->db->from('product_information a');
        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));
        $product_information = $this->db->get()->row();

        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);
        return (!empty($available_quantity) ? $available_quantity : 0);
    }

    public function payment_details($invoice_id)
    {
        $this->db->select('*')
            ->from('paid_amount')
            ->where('invoice_id', $invoice_id);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function due_invoices()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $query = $this->db->select('invoice_id, date, invoice, customer_id')
            ->from('invoice')
            ->where('due_amount >', '0')
            ->where('outlet_id', $outlet_list[0]['outlet_id'])
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;
    }

    public function get_invoice_details($invoice_id)
    {
        $q = $this->db->select('*')
            ->from('invoice')
            ->where('invoice_id', $invoice_id)
            ->get()
            ->result();

        return $q;
    }
}
