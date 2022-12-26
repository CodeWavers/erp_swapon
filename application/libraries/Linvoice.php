<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Linvoice
{

    //Retrieve  Invoice List
    public function invoice_list()
    {

        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $CI->load->library('occational');
        $company_info = $CI->Invoices->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'total_invoice' => $CI->Invoices->count_invoice(),
            'currency'      => $currency_details[0]['currency'],
            'company_info'  => $company_info,
            'bank_list'        => $CI->Web_settings->bank_list(),
            'bkash_list'        =>$CI->Web_settings->bkash_list(),
            'nagad_list'        =>  $CI->Web_settings->nagad_list(),
            'rocket_list'        =>  $CI->Web_settings->rocket_list(),
            'card_list'            => $CI->Settings->get_real_card_data()
        );
        // echo "<pre>";
        // print_r($company_info);
        // exit();
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }
    //Retrieve  Invoice details by id
    public function invoice_list1()
    {

        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $company_info = $CI->Invoices->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'total_invoice' => $CI->Invoices->invoice_list(),
            'currency'      => $currency_details[0]['currency'],
            'company_info'  => $company_info,
        );
        $invoiceList = $CI->parser->parse('report/payment_history', $data, true);
        return $invoiceList;
    }


    //pdf download
    public function pdf_download()
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

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

        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position']
        );
        $invoiceList = $CI->parser->parse('invoice/invoice_list_pdf', $data, true);
        return $invoiceList;
    }

    // Search invoice by customer id
    public function invoice_search($customer_id, $links, $per_page, $page)
    {

        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $invoices_list = $CI->Invoices->invoice_search($customer_id, $per_page, $page);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'links'         => $links,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }

    //inovie_manage search by invoice id
    public function invoice_list_invoice_no($invoice_no)
    {

        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $invoices_list = $CI->Invoices->invoice_list_invoice_id($invoice_no);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'links'         => '',
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }

    // date to date invoice list
    public function invoice_list_date_to_date($from_date, $to_date, $links, $perpage, $page)
    {

        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $invoices_list = $CI->Invoices->invoice_list_date_to_date($from_date, $to_date, $perpage, $page);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'links'         => $links,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }



    //Retrieve  Invoice List
    public function search_inovoice_item($customer_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->library('occational');
        $invoices_list = $CI->Invoices->search_inovoice_item($customer_id);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $data = array(
            'title' => display('manage_invoice'),
            'invoices_list' => $invoices_list
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }

    //Invoice add form
    public function invoice_add_form()
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Courier');
        $CI->load->model('Service');
        $CI->load->model('Warehouse');
        $CI->load->model('Settings');
        $CI->load->model('Aggre');


        $employee_list    = $CI->Service->employee_list();
        $customer_details = $CI->Invoices->pos_customer_setup();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();

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
            'card_list'     => $CI->Settings->get_real_card_data(),
            'bank_list'     => $CI->Web_settings->bank_list(),
            'bkash_list'     => $CI->Web_settings->bkash_list(),
            'nagad_list'     => $CI->Web_settings->nagad_list(),
            'rocket_list'     => $CI->Web_settings->rocket_list(),
            'courier_list'     => $courier_list,
            'branch_list'     => $branch_list,
            'outlet_list'     => $outlet_user,
            'receiver_list'    => $receiver_list,
            'aggre_list'    => $aggre_list,
            'cw'            => $cw
        );

      //  echo '<pre>';print_r($data['rocket_list']);
        $invoiceForm = $CI->parser->parse('invoice/add_invoice_form', $data, true);
        return $invoiceForm;
    }
    //Pos invoice add form
    public function pos_invoice_add_form()
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Courier');
        $CI->load->model('Service');
        $CI->load->model('Settings');
        $CI->load->model('Warehouse');
        $CI->load->model('Aggre');
        $customer_details = $CI->Invoices->pos_customer_setup();
        $employee_list    = $CI->Service->employee_list();
        $card_list = $CI->Settings->get_real_card_data();

        $bank_list          = $CI->Web_settings->bank_list();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $rocket_list        = $CI->Web_settings->rocket_list();
        $courier_list        = $CI->Courier->get_courier_list();
        $branch_list        = $CI->Courier->get_branch_list();
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $receiver_list        = $CI->Courier->get_receiver_list();

        $outlet_list = $CI->Warehouse->branch_list_product();

        $cw = $CI->Warehouse->central_warehouse();
        $aggre_list = $CI->Aggre->aggre_list_product();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $tablecolumn = $CI->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $data = array(
            'title'         => display('pos_invoice'),
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
            'rocket_list'     => $rocket_list,
            'courier_list'     => $courier_list,
            'branch_list'     => $branch_list,
            'outlet_list'     => $outlet_user,
            'receiver_list'    => $receiver_list,
            'aggre_list'    => $aggre_list,
            'cw'            => $cw
        );

     //   echo '<pre>';print_r($card_list);exit();
        $invoiceForm = $CI->parser->parse('invoice/add_pos_invoice_form', $data, true);
        return $invoiceForm;
    }
    public function pre_invoice_add_form()
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Courier');
        $CI->load->model('Service');
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
        $branch_list        = $CI->Courier->get_branch_list();
        $data = array(
            'title'         => display('add_new_invoice'),
            'employee_list' => $employee_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'customer_name' => $customer_details[0]['customer_name'],
            'customer_id'   => $customer_details[0]['customer_id'],
            'customer_id_two'   => $customer_details[0]['customer_id_two'],
            'bank_list'     => $bank_list,
            'bkash_list'     => $bkash_list,
            'nagad_list'     => $nagad_list,
            'branch_list'     => $branch_list
        );
        $invoiceForm = $CI->parser->parse('invoice/pre_add_invoice_form', $data, true);
        return $invoiceForm;
    }

    //Insert invoice
    public function insert_invoice($data)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->Invoices->invoice_entry($data);
        return true;
    }

    //Invoice Edit Data
    public function invoice_edit_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Courier');
        $CI->load->model('Service');
        $CI->load->model('Warehouse');
        $CI->load->model('Settings');
        $CI->load->model('Reports');
        $CI->load->model('Rqsn');

        $employee_list    = $CI->Service->employee_list();
        $invoice_detail = $CI->Invoices->retrieve_invoice_editdata($invoice_id);
        $payment_info = $CI->Invoices->payment_details($invoice_id);
        $courier_list        = $CI->Courier->get_courier_list();
        $bank_list      = $CI->Web_settings->bank_list();
        $bkash_list     = $CI->Web_settings->bkash_list();
        $rocket_list     = $CI->Web_settings->rocket_list();
        $branch_list    = $CI->Courier->get_branch_list();
        $taxinfo        = $CI->Invoices->service_invoice_taxinfo($invoice_id);
        $taxfield       = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $i = 0;

        $agg_id = $invoice_detail[0]['agg_id'];
        $outlet_id = $invoice_detail[0]['outlet_id'];

        if (!empty($agg_id)){
            $agg_name=$CI->db->select('aggre_name')->from('aggre_list')->where('id',$agg_id)->get()->row()->aggre_name;

        }
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;

                if ($outlet_id == 'HK7TGDT69VFMXB7') {
                    $stock = $CI->Reports->getCheckList(null, $invoice_detail[$k]['product_id'])['central_stock'];
                    //   $available_quantity = $this->Reports->current_stock($product_id,1);
                } else {
                    $stock = $CI->Rqsn->outlet_stock(null, $invoice_detail[$k]['product_id'])['outlet_stock'];

                    // echo '<pre>';print_r($available_quantity);exit();
                }
//                $stock = $CI->Invoices->stock_qty_check($invoice_detail[$k]['product_id']);
                $invoice_detail[$k]['stock_qty'] = $stock + $invoice_detail[$k]['quantity'];
            }
        }

        $nagad_list        = $CI->Web_settings->nagad_list();
        $card_list = $CI->Settings->get_real_card_data();

        $outlet = $CI->Warehouse->branch_search_item($invoice_detail[0]['outlet_id']);
        $receiver_list        = $CI->Courier->get_receiver_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        if ($invoice_detail[0]['courier_condtion'] == 1){
            $con='Conditional';
        }
        if ($invoice_detail[0]['courier_condtion'] == 2){
            $con='Partial';
        }
        if ($invoice_detail[0]['courier_condtion'] == 3){
            $con='No Condition';
        }
        $data = array(
            'title'           => 'Due Invoice View',
            'con'      => $con,
            'courier_condtion'      => $invoice_detail[0]['courier_condtion'],
            'invoice_id'      => $invoice_detail[0]['invoice_id'],
            'receiver_list'     => $receiver_list,
            'agg_name'     => $agg_name,

            'agg_id'     => $invoice_detail[0]['agg_id'],
            'sale_type'     => $invoice_detail[0]['sale_type'],
            'customer_id'     => $invoice_detail[0]['customer_id'],
            'customer_name'   => $invoice_detail[0]['customer_name'],
            'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
            'customer_name_two'   => $invoice_detail[0]['customer_name_two'],
            'customer_mobile_two'   => $invoice_detail[0]['customer_mobile_two'],
            'date'            => $invoice_detail[0]['date'],
            'invoice_details' => $invoice_detail[0]['invoice_details'],
            'outlet_name'     => $outlet[0]['outlet_name'],
            'invoice'         => $invoice_detail[0]['invoice'],
            'total_amount'    => $invoice_detail[0]['total_amount'],
            'paid_amount'     => $invoice_detail[0]['p_amnt'],
            'due_amount'      => $invoice_detail[0]['due_amnt'],
            'invoice_discount' => $invoice_detail[0]['invoice_discount'],
            'delivery_ac' => $invoice_detail[0]['delivery_ac'],
            'perc_discount' => $invoice_detail[0]['perc_discount'],
            'total_discount'  => $invoice_detail[0]['total_discount'],
            'rr'            => $invoice_detail[0]['unit'],
            'warrenty_date'   => $invoice_detail[0]['warrenty_date'],
            'sn'              => $invoice_detail[0]['sn'],
            'bank'             => $invoice_detail[0]['bank_id'],
            'tax'             => $invoice_detail[0]['tax'],
            'taxes'          => $taxfield,
            'prev_due'        => $invoice_detail[0]['prevous_due'],
            'net_total'       => $invoice_detail[0]['prevous_due'] + $invoice_detail[0]['total_amount'],
            'shipping_cost'   => $invoice_detail[0]['shipping_cost'],
            'condition_cost'   => $invoice_detail[0]['condition_cost'],
            'total_commission'   => $invoice_detail[0]['total_commission'],
            'comm_type'   => $invoice_detail[0]['comm_type'],
            'commission'   => $invoice_detail[0]['commission'],
            'total_tax'       => $invoice_detail[0]['taxs'],
            'invoice_all_data' => $invoice_detail,
            'taxvalu'         => $taxinfo,
            'discount_type'   => $currency_details[0]['discount_type'],
            'bank_list'       => $bank_list,
            'bkash_list'      => $bkash_list,
            'rocket_list'      => $rocket_list,
            'employee_list' => $employee_list,
            'rid'         => $invoice_detail[0]['rid'],
            'receiver_name'         => $invoice_detail[0]['receiver_name'],
            'receiver_number'         => $invoice_detail[0]['receiver_number'],
            'bank_id'         => $invoice_detail[0]['bank_id'],
            'bkash_id'        => $invoice_detail[0]['bkash_id'],
            'nagad_list'     => $nagad_list,
            'card_list'     => $card_list,
            'courier_list'     => $courier_list,
            'branch_list'     => $branch_list,
            'courier_id'      => $invoice_detail[0]['courier_id'],
            'courier_name'      => $invoice_detail[0]['courier_name'],
            'branch_name'      => $invoice_detail[0]['branch_name'],
            'branch_id'       => $invoice_detail[0]['branch_id'],
            'paytype'         => $invoice_detail[0]['payment_type'],
            'delivery_type'   => $invoice_detail[0]['delivery_type'],
            'payment_info'    => $payment_info,
            //'sales_by'   => $invoice_detail[0]['sales_by'],
            'sales_first_name'   => $invoice_detail[0]['customer_name'],
            // 'sales_last_name'   => $invoice_detail[0]['last_name'],
        );
//      echo "<pre>" ;print_r($invoice_detail[0]['delivery_type']);exit();
        $chapterList = $CI->parser->parse('invoice/edit_invoice_form', $data, true);
        return $chapterList;
    }

    public function pre_invoice_edit_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Courier');
        $CI->load->model('Service');
        $CI->load->model('Warehouse');
        $CI->load->model('Settings');
        $CI->load->model('Reports');
        $CI->load->model('Rqsn');

        $employee_list    = $CI->Service->employee_list();
        $invoice_detail = $CI->Invoices->retrieve_invoice_editdata($invoice_id);
        $payment_info = $CI->Invoices->payment_details($invoice_id);
        $courier_list        = $CI->Courier->get_courier_list();
        $bank_list      = $CI->Web_settings->bank_list();
        $bkash_list     = $CI->Web_settings->bkash_list();
        $branch_list    = $CI->Courier->get_branch_list();
        $taxinfo        = $CI->Invoices->service_invoice_taxinfo($invoice_id);
        $taxfield       = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $i = 0;

        $agg_id = $invoice_detail[0]['agg_id'];
        $outlet_id = $invoice_detail[0]['outlet_id'];

        if (!empty($agg_id)){
            $agg_name=$CI->db->select('aggre_name')->from('aggre_list')->where('id',$agg_id)->get()->row()->aggre_name;

        }
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;

                if ($outlet_id == 'HK7TGDT69VFMXB7') {
                    $stock = $CI->Reports->getCheckList(null, $invoice_detail[$k]['product_id'])['central_stock'];
                    //   $available_quantity = $this->Reports->current_stock($product_id,1);
                } else {
                    $stock = $CI->Rqsn->outlet_stock(null, $invoice_detail[$k]['product_id'])['outlet_stock'];

                    // echo '<pre>';print_r($available_quantity);exit();
                }
//                $stock = $CI->Invoices->stock_qty_check($invoice_detail[$k]['product_id']);
                $invoice_detail[$k]['stock_qty'] = $stock + $invoice_detail[$k]['quantity'];
            }
        }

        $nagad_list        = $CI->Web_settings->nagad_list();
        $card_list = $CI->Settings->get_real_card_data();

        $outlet = $CI->Warehouse->branch_search_item($invoice_detail[0]['outlet_id']);
        $receiver_list        = $CI->Courier->get_receiver_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        if ($invoice_detail[0]['courier_condtion'] == 1){
            $con='Conditional';
        }
        if ($invoice_detail[0]['courier_condtion'] == 2){
            $con='Partial';
        }
        if ($invoice_detail[0]['courier_condtion'] == 3){
            $con='No Condition';
        }
        $data = array(
            'title'           => 'Due Invoice View',
            'con'      => $con,
            'courier_condtion'      => $invoice_detail[0]['courier_condtion'],
            'invoice_id'      => $invoice_detail[0]['invoice_id'],
            'receiver_list'     => $receiver_list,
            'agg_name'     => $agg_name,

            'agg_id'     => $invoice_detail[0]['agg_id'],
            'sale_type'     => $invoice_detail[0]['sale_type'],
            'customer_id'     => $invoice_detail[0]['customer_id'],
            'customer_name'   => $invoice_detail[0]['customer_name'],
            'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
            'customer_name_two'   => $invoice_detail[0]['customer_name_two'],
            'customer_mobile_two'   => $invoice_detail[0]['customer_mobile_two'],
            'date'            => $invoice_detail[0]['date'],
            'invoice_details' => $invoice_detail[0]['invoice_details'],
            'outlet_name'     => $outlet[0]['outlet_name'],
            'invoice'         => $invoice_detail[0]['invoice'],
            'total_amount'    => $invoice_detail[0]['total_amount'],
            'paid_amount'     => $invoice_detail[0]['p_amnt'],
            'due_amount'      => $invoice_detail[0]['due_amnt'],
            'invoice_discount' => $invoice_detail[0]['invoice_discount'],
            'delivery_ac' => $invoice_detail[0]['delivery_ac'],
            'perc_discount' => $invoice_detail[0]['perc_discount'],
            'total_discount'  => $invoice_detail[0]['total_discount'],
            'rr'            => $invoice_detail[0]['unit'],
            'warrenty_date'   => $invoice_detail[0]['warrenty_date'],
            'sn'              => $invoice_detail[0]['sn'],
            'bank'             => $invoice_detail[0]['bank_id'],
            'tax'             => $invoice_detail[0]['tax'],
            'taxes'          => $taxfield,
            'prev_due'        => $invoice_detail[0]['prevous_due'],
            'net_total'       => $invoice_detail[0]['prevous_due'] + $invoice_detail[0]['total_amount'],
            'shipping_cost'   => $invoice_detail[0]['shipping_cost'],
            'condition_cost'   => $invoice_detail[0]['condition_cost'],
            'total_commission'   => $invoice_detail[0]['total_commission'],
            'comm_type'   => $invoice_detail[0]['comm_type'],
            'commission'   => $invoice_detail[0]['commission'],
            'total_tax'       => $invoice_detail[0]['taxs'],
            'invoice_all_data' => $invoice_detail,
            'taxvalu'         => $taxinfo,
            'discount_type'   => $currency_details[0]['discount_type'],
            'bank_list'       => $bank_list,
            'bkash_list'      => $bkash_list,
            'employee_list' => $employee_list,
            'rid'         => $invoice_detail[0]['rid'],
            'receiver_name'         => $invoice_detail[0]['receiver_name'],
            'receiver_number'         => $invoice_detail[0]['receiver_number'],
            'bank_id'         => $invoice_detail[0]['bank_id'],
            'bkash_id'        => $invoice_detail[0]['bkash_id'],
            'nagad_list'     => $nagad_list,
            'card_list'     => $card_list,
            'courier_list'     => $courier_list,
            'branch_list'     => $branch_list,
            'courier_id'      => $invoice_detail[0]['courier_id'],
            'courier_name'      => $invoice_detail[0]['courier_name'],
            'branch_name'      => $invoice_detail[0]['branch_name'],
            'branch_id'       => $invoice_detail[0]['branch_id'],
            'paytype'         => $invoice_detail[0]['payment_type'],
            'delivery_type'   => $invoice_detail[0]['delivery_type'],
            'payment_info'    => $payment_info,
            //'sales_by'   => $invoice_detail[0]['sales_by'],
            'sales_first_name'   => $invoice_detail[0]['customer_name'],
            // 'sales_last_name'   => $invoice_detail[0]['last_name'],
        );
//      echo "<pre>" ;print_r($invoice_detail[0]['delivery_type']);exit();

        $chapterList = $CI->parser->parse('quotation/edit_invoice_form', $data, true);
        return $chapterList;
    }

    public function discount_edit_form($id)
    {


        // echo 'ok';exit();
        $CI = &get_instance();
        $CI->load->model('Discount_model');
        $CI->load->model('Products');
        $CI->load->model('Web_settings');
        $discount_list    = $CI->Discount_model->discount_edit_data($id);
        //  $outlet_list    = $CI->Rqsn->outlet_list();
        //$outlet_list_to    = $CI->Rqsn->outlet_list_to();
        // $cw_list    = $CI->Rqsn->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Edit Discount",
            'customer_name' => $discount_list[0]['customer_name'],
            'category_name' => $discount_list[0]['category_name'],
            'discount' => $discount_list[0]['discount_percentage'],
            'customer_id' => $discount_list[0]['customer_id'],
            'category_id' => $discount_list[0]['category_id'],
            'discount_id' => $discount_list[0]['discount_id'],

        );

        // echo '<pre'; print_r($data);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('discount/edit_discount_form', $data, true);
        return $invoiceForm;
    }

    //Invoice html Data
    public function invoice_html_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');


        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $CI->db->select('*')
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
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
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

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        //  $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        $totalbal = $invoice_detail[0]['total_amount'];
        $amount_inword = $CI->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
            'title'             => display('invoice_details'),
            'invoice_id'        => $invoice_detail[0]['invoice_id'],
            'invoice_no'        => $invoice_detail[0]['invoice'],
            'customer_name'     => $invoice_detail[0]['customer_name'],
            'sale_type'     => $invoice_detail[0]['sale_type'],
            'customer_address'  => $invoice_detail[0]['customer_address'],
            'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
            'customer_email'    => $invoice_detail[0]['customer_email'],
            'final_date'        => $invoice_detail[0]['final_date'],
            'invoice_details'   => $invoice_detail[0]['invoice_details'],
            'total_amount'      => number_format($invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'], 2, '.', ','),
            'total'      => number_format($invoice_detail[0]['total_amount'], 2, '.', ','),
            'subTotal_quantity' => $subTotal_quantity,
            'invoice_discount'    => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
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
            'am_inword'         => $amount_inword,
            'is_discount'       => $is_discount,
            'users_name'        => $users->first_name . ' ' . $users->last_name,
            'tax_regno'         => $txregname,
            'is_desc'           => $descript,
            'is_serial'         => $isserial,
            'is_unit'           => $isunit,
        );




        $chapterList = $CI->parser->parse('invoice/invoice_html_manual', $data, true);
        return $chapterList;
    }


    //Invoice html Data manual
    public function invoice_html_data_manual($invoice_id, $manage = null)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $CI->load->model('Warehouse');

        $redirect_url = $_SESSION['redirect_uri'];

        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $payment_info = $CI->Invoices->payment_details_total($invoice_id);

     //   echo '<pre>';print_r($payment_info);exit();
        $cus_id = $invoice_detail[0]['customer_id'];
        $agg_id = $invoice_detail[0]['agg_id'];

        if (!empty($agg_id)){
            $agg_name=$CI->db->select('aggre_name')->from('aggre_list')->where('id',$agg_id)->get()->row()->aggre_name;

        }
        $customer_balance = $CI->Invoices->customer_balance($cus_id);
        $taxfield = $CI->db->select('*')
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
        $subTotal_ammount_wd = 0;
        $descript = 0;
        $isserial = 0;
        $isunit = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
                if ($invoice_detail[$k]['total_price_wd'] > 0){
                    $subTotal_ammount_wd = $subTotal_ammount_wd + $invoice_detail[$k]['total_price_wd'];

                }
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
                if (!empty($invoice_detail[$k]['unit'])) {
                    $isunit = $isunit + 1;
                }
            }
        }

        $outlet = $CI->Warehouse->branch_search_item($invoice_detail[0]['outlet_id']);

        $inwords = $CI->numbertowords->convert_number($invoice_detail[0]['total_amount']);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        // $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        $totalbal = $invoice_detail[0]['total_amount'];
        $amount_inword = $CI->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);


        if ($invoice_detail[0]['delivery_type'] == 1){
            $dt='Pick Up';
        }
        if ($invoice_detail[0]['delivery_type'] == 2){
            $dt='Courier';
        }

        if ($invoice_detail[0]['payment_type'] == 1){
            $pt='Cash';
        }

        if ($invoice_detail[0]['payment_type'] == 4){
            $pt='Bank';
        }
        if ($invoice_detail[0]['payment_type'] == 3){
            $pt='Bkash';
        }
        if ($invoice_detail[0]['payment_type'] == 6){
            $pt='Card';
        }
        if ($invoice_detail[0]['payment_type'] == 2){
            $pt='Cheque';
        }

        if ($invoice_detail[0]['sale_type'] == 1){
            $st='Whole Sale';
        }
        if ($invoice_detail[0]['sale_type'] == 3){
            $st='Aggregators Sale';
        }

        if ($invoice_detail[0]['courier_condtion'] == 1){
            $con='Conditional';
        }
        if ($invoice_detail[0]['courier_condtion'] == 2){
            $con='Partial';
        }
        if ($invoice_detail[0]['courier_condtion'] == 3){
            $con='No Condition';
        }

       $price=$invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'];
        $round_price=round($price);
        $rounding=$round_price-$price;



        $data = array(
            'title'             => $invoice_detail[0]['invoice'].'-'.$outlet[0]['outlet_name'].'-'.date('Y-m-d'),
            'balance'        => $customer_balance[0]['balance'],
            'pay_type' => $invoice_detail[0]['payment_type'],
            'is_pre' => $invoice_detail[0]['is_pre'],
            'delivery_type'        => $invoice_detail[0]['delivery_type'],
            'invoice_id'        => $invoice_detail[0]['invoice_id'],
            'dt'        => $dt,
            'pt'        => $pt,
            'st'        => $st,
            'con'        => $con,
            'condition_cost'        => $invoice_detail[0]['condition_cost'],
            'invoice_no'        => $invoice_detail[0]['invoice'],
            'outlet_name'        => $outlet[0]['outlet_name'],
            'outlet_address'        => $outlet[0]['address'],
            'sale_type'     => $invoice_detail[0]['sale_type'],
            'agg_name'     => $agg_name,
            'time'     => $invoice_detail[0]['time'],
            'date'     => $invoice_detail[0]['date'],
            'customer_name'     => $invoice_detail[0]['customer_name'],
            'shop_name'  => $invoice_detail[0]['shop_name'],
            'customer_address'  => $invoice_detail[0]['customer_address'],
            'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
            'customer_email'    => $invoice_detail[0]['customer_email'],
            'courier_status'    => $invoice_detail[0]['courier_status'],
            'final_date'        => $invoice_detail[0]['final_date'],
            'inv_date'        => $invoice_detail[0]['date'],
            'invoice_details'   => $invoice_detail[0]['invoice_details'],
            'rounding' =>number_format($rounding,2),
            'total_amount'      => number_format(round($invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due']), 2, '.', ','),
            'total'      => number_format($invoice_detail[0]['total_amount'], 2, '.', ','),
            'subTotal_quantity' => $subTotal_quantity,
            'previous_paid'    => number_format($invoice_detail[0]['previous_paid'], 2, '.', ','),
            'invoice_discount'    => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
            'total_discount'    => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
//            'sub_total'    => number_format($invoice_detail[0]['total_discount']+$invoice_detail[0]['total_amount'], 2, '.', ','),
            'sub_total'    => number_format($subTotal_ammount_wd, 2, '.', ','),
            'total_tax'         => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount'  => number_format($subTotal_ammount, 2, '.', ','),
            'paid_amount'       => number_format(round($invoice_detail[0]['paid_amount']), 2, '.', ','),
            'due_amount'        => number_format(round($invoice_detail[0]['due_amount']), 2, '.', ','),
            'sales_return'        => number_format(round($invoice_detail[0]['sales_return']), 2, '.', ','),
            'cash_refund'        => number_format(round($invoice_detail[0]['cash_refund']), 2, '.', ','),
            'customer_ac'        => number_format(round($invoice_detail[0]['customer_ac']), 2, '.', ','),
            'changeamount'        => number_format($invoice_detail[0]['changeamount'], 2, '.', ','),
            'previous'          => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
            'shipping_cost'     => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
            'total_commission'     => number_format($invoice_detail[0]['total_commission']+$invoice_detail[0]['commission'], 2, '.', ','),
            'invoice_all_data'  => $invoice_detail,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'discount_type'     => $currency_details[0]['discount_type'],
            'inv_logo'          => $currency_details[0]['invoice_logo'],
            'am_inword'         => $amount_inword,
            'is_discount'       => $invoice_detail[0]['total_discount'] - $invoice_detail[0]['invoice_discount'],
            'users_name'        => $users->first_name . ' ' . $users->last_name,
            'tax_regno'         => $txregname,
            'is_desc'           => $descript,
            'is_serial'         => $isserial,
            'is_unit'           => $isunit,
            'inwords'           => $inwords,
            'manage'            => $manage,
            'payment_info'            => $payment_info,
            'red_url'           => isset($redirect_url) ? $redirect_url : null,

        );

//
        $pay_type=$invoice_detail[0]['sale_type'];
//         echo '<pre>';
//         print_r($data);
//         exit();
        if ($pay_type == 2 ){
            $chapterList = $CI->parser->parse('invoice/pos_dell_arte_invoice_html_manual', $data, true);

        }else{
            $chapterList = $CI->parser->parse('invoice/invoice_html_manual_new', $data, true);

        }
//        $chapterList = $CI->parser->parse('invoice/invoice_html_manual', $data, true);
        return $chapterList;
    }
    public function invoice_chalan_html_data_manual($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $cus_id = $invoice_detail[0]['customer_id'];
        $customer_balance = $CI->Invoices->customer_balance($cus_id);
        $taxfield = $CI->db->select('*')
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
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
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
                if (!empty($invoice_detail[$k]['unit'])) {
                    $isunit = $isunit + 1;
                }
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        //$totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        $totalbal = $invoice_detail[0]['total_amount'];
        $amount_inword = $CI->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
            'title'             => display('invoice_details'),
            'balance'        => $customer_balance[0]['balance'],
            'pay_type' => $invoice_detail[0]['payment_type'],
            'invoice_id'        => $invoice_detail[0]['invoice_id'],
            'invoice_no'        => $invoice_detail[0]['invoice'],
            'customer_name'     => $invoice_detail[0]['customer_name'],
            'customer_address'  => $invoice_detail[0]['customer_address'],
            'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
            'customer_email'    => $invoice_detail[0]['customer_email'],
            'final_date'        => $invoice_detail[0]['final_date'],
            'invoice_details'   => $invoice_detail[0]['invoice_details'],
            'invoice_discount'    => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
            'total_amount'      => number_format($invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'], 2, '.', ','),
            'total'      => number_format($invoice_detail[0]['total_amount'], 2, '.', ','),
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
            'am_inword'         => $amount_inword,
            'is_discount'       => $invoice_detail[0]['total_discount'] - $invoice_detail[0]['invoice_discount'],
            'users_name'        => $users->first_name . ' ' . $users->last_name,
            'tax_regno'         => $txregname,
            'is_desc'           => $descript,
            'is_serial'         => $isserial,
            'is_unit'           => $isunit,

        );

        // echo '<pre>';print_r($data);exit();

        $chapterList = $CI->parser->parse('invoice/invoice_chalan_html_manual', $data, true);
        return $chapterList;
    }

    //POS invoice html Data
    public function pos_invoice_html_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $CI->db->select('*')
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
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
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

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'];
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
            'title'                => display('invoice_details'),
            'invoice_id'           => $invoice_detail[0]['invoice_id'],
            'invoice_no'           => $invoice_detail[0]['invoice'],
            'customer_name'        => $invoice_detail[0]['customer_name'],
            'customer_address'     => $invoice_detail[0]['customer_address'],
            'customer_mobile'      => $invoice_detail[0]['customer_mobile'],
            'customer_email'       => $invoice_detail[0]['customer_email'],
            'final_date'           => $invoice_detail[0]['final_date'],
            'invoice_details'      => $invoice_detail[0]['invoice_details'],
            'total_amount'         => number_format($totalbal, 2, '.', ','),
            'subTotal_cartoon'     => $subTotal_cartoon,
            'subTotal_quantity'    => $subTotal_quantity,
            'invoice_discount'     => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
            'total_discount'       => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
            'total_tax'            => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount'     => number_format($subTotal_ammount, 2, '.', ','),
            'paid_amount'          => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
            'due_amount'           => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
            'shipping_cost'        => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
            'invoice_all_data'     => $invoice_detail,
            'previous'             => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
            'company_info'         => $company_info,
            'is_discount'         => $is_discount,
            'currency'             => $currency_details[0]['currency'],
            'position'             => $currency_details[0]['currency_position'],
            'users_name'           => $users->first_name . ' ' . $users->last_name,
            'tax_regno'            => $txregname,
            'is_desc'              => $descript,
            'is_serial'            => $isserial,
            'is_unit'              => $isunit,

        );

        $chapterList = $CI->parser->parse('invoice/pos_invoice_html', $data, true);
        return $chapterList;
    }

    /// Manual invoice insert data
    public function pos_invoice_html_data_manual($invoice_id, $url)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $CI->db->select('*')
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
        $is_discount = 0;
        $isunit = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
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
                if (!empty($invoice_detail[$k]['unit'])) {
                    $isunit = $isunit + 1;
                }
                if (!empty($invoice_detail[$k]['discount_per'])) {
                    $is_discount = $is_discount + 1;
                }
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'];
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
            'title'                => display('invoice_details'),
            'invoice_id'           => $invoice_detail[0]['invoice_id'],
            'invoice_no'           => $invoice_detail[0]['invoice'],
            'customer_name'        => $invoice_detail[0]['customer_name'],
            'customer_address'     => $invoice_detail[0]['customer_address'],
            'customer_mobile'      => $invoice_detail[0]['customer_mobile'],
            'customer_email'       => $invoice_detail[0]['customer_email'],
            'final_date'           => $invoice_detail[0]['final_date'],
            'invoice_details'      => $invoice_detail[0]['invoice_details'],
            'total_amount'         => number_format($totalbal, 2, '.', ','),
            'subTotal_cartoon'     => $subTotal_cartoon,
            'subTotal_quantity'    => $subTotal_quantity,
            'invoice_discount'     => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
            'total_discount'       => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
            'total_tax'            => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount'     => number_format($subTotal_ammount, 2, '.', ','),
            'paid_amount'          => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
            'due_amount'           => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
            'shipping_cost'        => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
            'invoice_all_data'     => $invoice_detail,
            'previous'             => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
            'company_info'         => $company_info,
            'is_discount'         => $is_discount,
            'currency'             => $currency_details[0]['currency'],
            'position'             => $currency_details[0]['currency_position'],
            'users_name'           => $users->first_name . ' ' . $users->last_name,
            'tax_regno'            => $txregname,
            'is_desc'              => $descript,
            'is_serial'            => $isserial,
            'is_unit'              => $isunit,
            'url'                  => $url,

        );

        $chapterList = $CI->parser->parse('invoice/pos_invoice_html_direct', $data, true);
        return $chapterList;
    }
    // min invoice data
    public function min_invoice_html_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $CI->db->select('*')
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
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
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
                if (!empty($invoice_detail[$k]['unit'])) {
                    $isunit = $isunit + 1;
                }
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'];
        $amount_inword = $CI->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
            'title'            => display('invoice_details'),
            'invoice_id'       => $invoice_detail[0]['invoice_id'],
            'invoice_no'       => $invoice_detail[0]['invoice'],
            'customer_name'    => $invoice_detail[0]['customer_name'],
            'customer_address' => $invoice_detail[0]['customer_address'],
            'customer_mobile'  => $invoice_detail[0]['customer_mobile'],
            'customer_email'   => $invoice_detail[0]['customer_email'],
            'final_date'       => $invoice_detail[0]['final_date'],
            'invoice_details'  => $invoice_detail[0]['invoice_details'],
            'branch_name'  => $invoice_detail[0]['branch_name'],
            'courier_name'  => $invoice_detail[0]['courier_name'],
            'total_amount'     => number_format($totalbal, 2, '.', ','),
            'subTotal_cartoon' => $subTotal_cartoon,
            'subTotal_quantity' => $subTotal_quantity,
            'invoice_discount' => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
            'total_discount'   => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
            'total_tax'        => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount' => number_format($subTotal_ammount, 2, '.', ','),
            'paid_amount'      => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
            'due_amount'       => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
            'shipping_cost'   => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
            'invoice_all_data' => $invoice_detail,
            'previous'         => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
            'company_info'     => $company_info,
            'currency'         => $currency_details[0]['currency'],
            'logo'             => $currency_details[0]['logo'],
            'am_inword'        => $amount_inword,
            'is_discount'      => $invoice_detail[0]['total_discount'] - $invoice_detail[0]['invoice_discount'],
            'position'         => $currency_details[0]['currency_position'],
            'users_name'       => $users->first_name . ' ' . $users->last_name,
            'tax_regno'        => $txregname,
            'is_desc'          => $descript,
            'is_serial'        => $isserial,
            'is_unit'          => $isunit,
        );

        //   echo '<pre>';print_r($data);exit();

        $chapterList = $CI->parser->parse('invoice/min_invoice_html', $data, true);
        return $chapterList;
    }
    // min invoice data
    public function chalan_invoice_html_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $CI->db->select('*')
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
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
                $invoice_detail[$k]['extra'] = (($invoice_detail[$k]['product_model']) ? ' - ' . html_escape($invoice_detail[$k]['product_model']) : '') . (($invoice_detail[$k]['color_name']) ? ' - ' . html_escape($invoice_detail[$k]['color_name']) : '') . (($invoice_detail[$k]['size_name']) ? ' - ' . html_escape($invoice_detail[$k]['size_name']) : '');
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
                if (!empty($invoice_detail[$k]['unit'])) {
                    $isunit = $isunit + 1;
                }
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount'] + $invoice_detail[0]['prevous_due'];
        $amount_inword = $CI->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
            'title'            => display('invoice_details'),
            'invoice_id'       => $invoice_detail[0]['invoice_id'],
            'invoice_no'       => $invoice_detail[0]['invoice'],
            'customer_name'    => $invoice_detail[0]['customer_name'],
            'customer_address' => $invoice_detail[0]['customer_address'],
            'customer_mobile'  => $invoice_detail[0]['customer_mobile'],
            'customer_email'   => $invoice_detail[0]['customer_email'],
            'final_date'       => $invoice_detail[0]['final_date'],
            'invoice_details'  => $invoice_detail[0]['invoice_details'],
            'total_amount'     => number_format($totalbal, 2, '.', ','),
            'subTotal_cartoon' => $subTotal_cartoon,
            'subTotal_quantity' => $subTotal_quantity,
            'invoice_discount' => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
            'total_discount'   => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
            'total_tax'        => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount' => number_format($subTotal_ammount, 2, '.', ','),
            'paid_amount'      => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
            'due_amount'       => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
            'shipping_cost'   => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
            'invoice_all_data' => $invoice_detail,
            'previous'         => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
            'company_info'     => $company_info,
            'currency'         => $currency_details[0]['currency'],
            'logo'             => $currency_details[0]['logo'],
            'am_inword'        => $amount_inword,
            'is_discount'      => $invoice_detail[0]['total_discount'] - $invoice_detail[0]['invoice_discount'],
            'position'         => $currency_details[0]['currency_position'],
            'users_name'       => $users->first_name . ' ' . $users->last_name,
            'tax_regno'        => $txregname,
            'is_desc'          => $descript,
            'is_serial'        => $isserial,
            'is_unit'          => $isunit,
        );

        $chapterList = $CI->parser->parse('invoice/chalan_invoice_html', $data, true);
        return $chapterList;
    }

    public function due_invoice_edit_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Customers');
        $CI->load->model('Courier');
        $CI->load->model('Service');
        $CI->load->model('Warehouse');
        $CI->load->model('Settings');
        $employee_list    = $CI->Service->employee_list();
        $invoice_detail = $CI->Invoices->retrieve_invoice_editdata($invoice_id);

        $payment_info = $CI->Invoices->payment_details($invoice_id);

        $bank_list      = $CI->Web_settings->bank_list();
        $bkash_list      = $CI->Web_settings->bkash_list();
        $branch_list      = $CI->Courier->get_branch_list();
        $taxinfo        = $CI->Invoices->service_invoice_taxinfo($invoice_id);
        $taxfield       = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $i = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
                $stock = $CI->Invoices->stock_qty_check($invoice_detail[$k]['product_id']);
                $invoice_detail[$k]['stock_qty'] = $stock + $invoice_detail[$k]['quantity'];
            }
        }

        $nagad_list        = $CI->Web_settings->nagad_list();
        $card_list = $CI->Settings->get_real_card_data();

        $outlet = $CI->Warehouse->branch_search_item($invoice_detail[0]['outlet_id']);

        $cus_info = $CI->Customers->customer_list_advance($invoice_detail[0]['customer_id']);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'           => 'Due Invoice View',
            'invoice_id'      => $invoice_detail[0]['invoice_id'],
            'customer_id'     => $invoice_detail[0]['customer_id'],
            'customer_name'   => $invoice_detail[0]['customer_name'],
            'customer_name_two'   => $invoice_detail[0]['customer_name_two'],
            'customer_mobile'   => $cus_info[0]['customer_mobile'],
            'date'            => $invoice_detail[0]['date'],
            'invoice_details' => $invoice_detail[0]['invoice_details'],
            'outlet_name'     => $outlet[0]['outlet_name'],
            'invoice'         => $invoice_detail[0]['invoice'],
            'total_amount'    => $invoice_detail[0]['total_amount'],
            'paid_amount'     => $invoice_detail[0]['p_amnt'],
            'due_amount'      => $invoice_detail[0]['due_amnt'],
            'invoice_discount' => $invoice_detail[0]['invoice_discount'],
            'total_discount'  => $invoice_detail[0]['total_discount'],
            'unit'            => $invoice_detail[0]['unit'],
            'warrenty_date'   => $invoice_detail[0]['warrenty_date'],
            'sn'              => $invoice_detail[0]['sn'],
            'bank'             => $invoice_detail[0]['bank_id'],
            'tax'             => $invoice_detail[0]['tax'],
            'taxes'          => $taxfield,
            'prev_due'        => $invoice_detail[0]['prevous_due'],
            'net_total'       => $invoice_detail[0]['prevous_due'] + $invoice_detail[0]['total_amount'],
            'shipping_cost'   => $invoice_detail[0]['shipping_cost'],
            'total_tax'       => $invoice_detail[0]['taxs'],
            'invoice_all_data' => $invoice_detail,
            'taxvalu'         => $taxinfo,
            'discount_type'   => $currency_details[0]['discount_type'],
            'bank_list'       => $bank_list,
            'bkash_list'      => $bkash_list,
            'branch_list'     => $branch_list,
            'employee_list' => $employee_list,
            'bank_id'         => $invoice_detail[0]['bank_id'],
            'bkash_id'        => $invoice_detail[0]['bkash_id'],
            'nagad_list'     => $nagad_list,
            'card_list'     => $card_list,
            'courier_id'      => $invoice_detail[0]['courier_id'],
            'branch_id'       => $invoice_detail[0]['branch_id'],
            'paytype'         => $invoice_detail[0]['payment_type'],
            'delivery_type'   => $invoice_detail[0]['delivery_type'],
            'payment_info'    => $payment_info,
            //'sales_by'   => $invoice_detail[0]['sales_by'],
            'sales_first_name'   => $invoice_detail[0]['first_name'],
            'sales_last_name'   => $invoice_detail[0]['last_name'],
        );
        // echo "<pre>" ;print_r($data);exit();
        $chapterList = $CI->parser->parse('invoice/edit_due_invoice_form', $data, true);
        return $chapterList;
    }
}
