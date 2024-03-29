<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lreturn
{

    public function return_form()
    {
        $CI = &get_instance();

        $CI->load->model('warehouse');

        $isOutletLoggedIn = $CI->warehouse->get_outlet_user();

        $data = array(
            'title' => 'return',
            'isOutletLoggedIn'  => $isOutletLoggedIn,
        );
        $returnForm = $CI->parser->parse('return/form', $data, true);
        return $returnForm;
    }

    public function invoice_return_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Courier');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $invoice_detail = $CI->Invoices->retrieve_invoice_editdata($invoice_id);

//        echo '<pre>';print_r($invoice_detail);exit();
        $CI->load->model('Warehouse');
        $outlet_user        = $CI->Warehouse->get_outlet_user();

        $i = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
            }
        }
        $agg_id = $invoice_detail[0]['agg_id'];
        $outlet_id = $invoice_detail[0]['outlet_id'];

        if (!empty($agg_id)){
            $agg_name=$CI->db->select('aggre_name')->from('aggre_list')->where('id',$agg_id)->get()->row()->aggre_name;

        }
        $courier_list        = $CI->Courier->get_courier_list();
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
            'title'         => display('invoice_return'),
            'invoice_id'    => $invoice_detail[0]['invoice_id'],
            'customer_id'   => $invoice_detail[0]['customer_id'],
            'agg_name'     => $agg_name,
            'agg_id'     => $invoice_detail[0]['agg_id'],
            'courier_list' =>$courier_list,
            'con'      => $con,
            "receiver_list"        => $CI->Courier->get_receiver_list(),
            'customer_name' => $invoice_detail[0]['customer_name'],
            'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
            'date'          => $invoice_detail[0]['date'],
            'receiver_number'          => $invoice_detail[0]['receiver_number'],
            'courier_condtion'          => $invoice_detail[0]['courier_condtion'],
            'delivery_type'          => $invoice_detail[0]['delivery_type'],
            'courier_name'          => $invoice_detail[0]['courier_name'],
            'courier_id'          => $invoice_detail[0]['courier_id'],
            'branch_id'          => $invoice_detail[0]['branch_id'],
            'branch_name'          => $invoice_detail[0]['branch_name'],
            'rid'         => $invoice_detail[0]['rid'],
            'receiver_name'         => $invoice_detail[0]['receiver_name'],
            'total_amount'  => $invoice_detail[0]['total_amount'],
            // 'paid_amount'   => $invoice_detail[0]['p_amnt'],
            'paid_amount'   => $invoice_detail[0]['total_amount_paid'],
            'due_amount'    => $invoice_detail[0]['due_amount'],
            'total_discount' => $invoice_detail[0]['total_discount'],
            'invoice_discount' => $invoice_detail[0]['invoice_discount'],
            'tax'           => $invoice_detail[0]['tax'],
            'total_tax'     => $invoice_detail[0]['total_tax'],
            'invoice_all_data' => $invoice_detail,
            'discount_type' => $currency_details[0]['discount_type'],
            'outlet_id'     => $invoice_detail[0]['outlet_id'],
            'invoice'     => $invoice_detail[0]['invoice'],
            'courier_status'     => $invoice_detail[0]['courier_status'],
            'shipping_cost'     => $invoice_detail[0]['shipping_cost'],
            'condition_cost'     => $invoice_detail[0]['condition_cost'],
            'sale_type'     => $invoice_detail[0]['sale_type'],
            'perc_discount'     => $invoice_detail[0]['perc_discount'],
            'delivery_ac'     => $invoice_detail[0]['delivery_ac'],
            'commission'     => $invoice_detail[0]['commission'],
            'comm_type'     => $invoice_detail[0]['comm_type'],
            'total_commission'     => $invoice_detail[0]['total_commission'],
            'card_list'     => $CI->Settings->get_real_card_data(),
            'bank_list'     => $CI->Web_settings->bank_list(),
            'bkash_list'     => $CI->Web_settings->bkash_list(),
            'nagad_list'     => $CI->Web_settings->nagad_list(),
            'rocket_list'     => $CI->Web_settings->rocket_list(),
        );

//        echo '<pre>';print_r($invoice_detail[0]['receiver_name']);exit();
        $chapterList = $CI->parser->parse('return/return_data_form', $data, true);
        return $chapterList;
    }

    //start  Supplier return form data
    public function supplier_return_data($purchase_id)
    {
        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Web_settings');
        $purchase_detail = $CI->Returnse->supplier_return($purchase_id);

        $i = 0;
        if (!empty($purchase_detail)) {
            foreach ($purchase_detail as $k => $v) {
                $i++;
                $purchase_detail[$k]['sl'] = $i;
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('supplier_return'),
            'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'supplier_id'   => $purchase_detail[0]['supplier_id'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'date'          => $purchase_detail[0]['purchase_date'],
            'total_amount'  => $purchase_detail[0]['total_amount'],
            'total_discount' => $purchase_detail[0]['total_discount'],
            'purchase_all_data' => $purchase_detail,
            'discount_type' => $currency_details[0]['discount_type'],
        );
        //echo '<pre>';print_r($purchase_detail);exit();
        $chapterList = $CI->parser->parse('return/supplier_return_form', $data, true);
        return $chapterList;
    }

    // start return list
    public function return_list($links, $perpage, $page)
    {

        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $return_list = $CI->Returnse->return_list($perpage, $page);
        if (!empty($return_list)) {
            foreach ($return_list as $k => $v) {
                $return_list[$k]['final_date'] = $CI->occational->dateConvert($return_list[$k]['date_return']);
            }
            $i = 0;
            if (!empty($return_list)) {
                foreach ($return_list as $k => $v) {
                    $i++;
                    $return_list[$k]['sl'] = $i + $CI->uri->segment(3);
                    $return_list[$k]['delivery_type']=( $return_list[$k]['delivery_type'] == '1') ? 'Pick Up' : (( $return_list[$k]['delivery_type'] == '2') ? 'Courier' : 'Nothing Selected');



                    if (  $return_list[$k]['sale_type'] == 1){
                        $st='Whole Sale';
                    }
                    if ( $return_list[$k]['sale_type']== 2){
                        $st='Retail';
                    }
                    if ( $return_list[$k]['sale_type'] == 3){
                        $st='Aggregators Sale';
                    }

                    if ( $return_list[$k]['sale_type'] == null){

                        $st='';
                    }
                    $return_list[$k]['sale_type']=$st;
                    if ($return_list[$k]['due_amount'] > 0){
                        $payment_status='<span class="label label-danger ">Due</span>';
                    } else{
                        $payment_status='<span class="label label-success ">Paid</span>';
                    }
                    $return_list[$k]['payment_status']=$payment_status;

                    if ( $return_list[$k]['courier_status'] == 1){
                        $courier_status='Processing';
                    }

                    if ($return_list[$k]['courier_status']  == 2){
                        $courier_status='Shipped';

                    }
                    if ($return_list[$k]['courier_status']   == 3){

                        $courier_status='Delivered';
                    }
                    if ($return_list[$k]['courier_status']  == 4){

                        $courier_status='Cancelled';
                    }
                    if ($return_list[$k]['courier_status']   == 5){
                        $courier_status='Returned';

                    }
                    if ($return_list[$k]['courier_status']  == 6){

                        $courier_status='Exchanged';
                    }
                    if ($return_list[$k]['courier_status']   == null){

                        $courier_status='';
                    }
                    $return_list[$k]['delivery_status']=$courier_status;

                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'       => display('return_list'),
            'return_list' => $return_list,
            'links'       => $links,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
        );

       // echo '<pre>';print_r($data);exit();
        $returnList = $CI->parser->parse('return/return_list', $data, true);
        return $returnList;
    }

    /// end return list
    // supplier return list
    public function supplier_return_list($links, $perpage, $page)
    {

        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $return_list = $CI->Returnse->supplier_return_list($perpage, $page);
        if (!empty($return_list)) {
            foreach ($return_list as $k => $v) {
                $return_list[$k]['final_date'] = $CI->occational->dateConvert($return_list[$k]['date_return']);
            }
            $i = 0;
            if (!empty($return_list)) {
                foreach ($return_list as $k => $v) {
                    $i++;
                    $return_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'       => display('return_list'),
            'return_list' => $return_list,
            'links'       => $links,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
        );
        $returnList = $CI->parser->parse('return/return_supllier_list', $data, true);
        return $returnList;
    }

    // wastage return list start
    public function wastage_return_list($links, $perpage, $page)
    {

        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $return_list = $CI->Returnse->wastage_return_list($perpage, $page);
        if (!empty($return_list)) {
            foreach ($return_list as $k => $v) {
                $return_list[$k]['final_date'] = $CI->occational->dateConvert($return_list[$k]['date_return']);
            }
            $i = 0;
            if (!empty($return_list)) {
                foreach ($return_list as $k => $v) {
                    $i++;
                    $return_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'       => display('return_list'),
            'return_list' => $return_list,
            'links'       => $links,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
        );
        $returnList = $CI->parser->parse('return/return_list', $data, true);
        return $returnList;
    }

    //wastage return list end
    public function invoice_html_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $invoice_detail = $CI->Returnse->retrieve_invoice_html_data($invoice_id);
        $replace_details = $CI->Invoices->retrieve_invoice_editdata($invoice_detail[0]['invoice_id_new']);

//        echo '<pre>';print_r($invoice_detail[0]['invoice_id_new']);exit();



        $subTotal_quantity = 0;
        $subTotal_quantity_replace = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;
        $subTotal_ammount_replace = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date_return']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['ret_qty'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_ret_amount'];
            }

            $i = 0;
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
            }
        }

        if (!empty($replace_details)) {
            foreach ($replace_details as $m => $n) {
                $subTotal_quantity_replace = $subTotal_quantity_replace + $replace_details[$m]['quantity'];
                $subTotal_ammount_replace = $subTotal_ammount_replace + $replace_details[$m]['total_price'];
            }

            $z = 0;
            foreach ($replace_details as $m => $n) {
                $z++;
                $replace_details[$m]['sl'] = $z;
            }
        }

        //echo '<pre>';print_r($replace_details);exit();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'            => display('invoice_return'),
            'invoice_id'       => $invoice_detail[0]['invoice_id'],
            'invoice_id_new'       => $invoice_detail[0]['invoice_id_new'],
            'return_id'       => $invoice_detail[0]['return_id'],
            'customer_name'    => $invoice_detail[0]['customer_name'],
            'customer_address' => $invoice_detail[0]['customer_address'],
            'customer_mobile'  => $invoice_detail[0]['customer_mobile'],
            'customer_email'   => $invoice_detail[0]['customer_email'],
            'final_date'       => $invoice_detail[0]['final_date'],
            'delivery_charge'     => number_format($invoice_detail[0]['delivery_charge'], 2, '.', ','),
            'total_amount'     => number_format($invoice_detail[0]['net_total_amount'], 2, '.', ','),
            'subTotal_quantity' => $subTotal_quantity,
            'subTotal_quantity_replace' => $subTotal_quantity_replace,
            'deduction'        => number_format($invoice_detail[0]['deduction'], 2, '.', ','),
            'total_deduct'     => number_format($invoice_detail[0]['total_deduct'], 2, '.', ','),
            'total_tax'        => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
            'subTotal_ammount' => number_format($subTotal_ammount, 2, '.', ','),
            'subTotal_ammount_replace' => number_format($subTotal_ammount_replace, 2, '.', ','),
            'totalnamount'     => number_format(($subTotal_ammount + $invoice_detail[0]['total_tax']) - $invoice_detail[0]['total_deduct'], 2, '.', ','),
            'totalnamount_replace'     =>number_format($subTotal_ammount_replace,2),
            'note'             => $invoice_detail[0]['reason'],
            'invoice_all_data' => $invoice_detail,
            'replace_all_data' => $replace_details,
            'company_info'     => $company_info,
            'currency'         => $currency_details[0]['currency'],
            'position'         => $currency_details[0]['currency_position'],
            'discount_type'    => $currency_details[0]['discount_type'],
        );

        $chapterList = $CI->parser->parse('return/return_invoice_html', $data, true);
        return $chapterList;
    }

    // supplier return html data
    public function supplier_html_data($purchase_id)
    {
        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $return_detail = $CI->Returnse->supplier_return_html_data($purchase_id);
        $subTotal_quantity = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;
        if (!empty($return_detail)) {
            foreach ($return_detail as $k => $v) {
                $return_detail[$k]['final_date'] = $CI->occational->dateConvert($return_detail[$k]['date_return']);
                $subTotal_quantity = $subTotal_quantity + $return_detail[$k]['ret_qty'];
                $subTotal_ammount = $subTotal_ammount + $return_detail[$k]['total_ret_amount'];
            }

            $i = 0;
            foreach ($return_detail as $k => $v) {
                $i++;
                $return_detail[$k]['sl'] = $i;
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'          => display('supplier_return'),
            'purchase_id'    => $return_detail[0]['purchase_id'],
            'invoice_no'     => $return_detail[0]['return_id'],
            'supplier_name'  => $return_detail[0]['supplier_name'],
            'address'        => $return_detail[0]['address'],
            'mobile'         => $return_detail[0]['mobile'],
            'final_date'     => $return_detail[0]['final_date'],
            'total_amount'   => number_format($return_detail[0]['net_total_amount'], 2, '.', ','),
            'subTotal_quantity' => $subTotal_quantity,
            'deduction'      => number_format($return_detail[0]['deduction'], 2, '.', ','),
            'total_deduct'   => number_format($return_detail[0]['total_deduct'], 2, '.', ','),
            'subTotal_ammount' => number_format($subTotal_ammount, 2, '.', ','),
            'note'           => $return_detail[0]['reason'],
            'return_detail'  => $return_detail,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'discount_type'  => $currency_details[0]['discount_type'],
        );

        $chapterList = $CI->parser->parse('return/return_supplier_html', $data, true);
        return $chapterList;
    }

    // date wise report return list invoice4 id
    public function return_list_datebetween($from_date, $to_date, $links, $perpage, $page)
    {

        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $return_list = $CI->Returnse->return_dateWise_invoice($from_date, $to_date, $perpage, $page);
        if (!empty($return_list)) {
            foreach ($return_list as $k => $v) {
                $return_list[$k]['final_date'] = $CI->occational->dateConvert($return_list[$k]['date_return']);
            }
            $i = 0;
            if (!empty($return_list)) {
                foreach ($return_list as $k => $v) {
                    $i++;
                    $return_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'       => display('return_list'),
            'return_list' => $return_list,
            'links'       => $links,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
        );
        $returnList = $CI->parser->parse('return/return_list', $data, true);
        return $returnList;
    }

    // return report date wise supplier purchase return
    public function datewise_supplier_return_list($from_date, $to_date, $links, $perpage, $page)
    {

        $CI = &get_instance();
        $CI->load->model('Returnse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $return_list = $CI->Returnse->return_dateWise_supplier($from_date, $to_date, $perpage, $page);
        if (!empty($return_list)) {
            foreach ($return_list as $k => $v) {
                $return_list[$k]['final_date'] = $CI->occational->dateConvert($return_list[$k]['date_return']);
            }
            $i = 0;
            if (!empty($return_list)) {
                foreach ($return_list as $k => $v) {
                    $i++;
                    $return_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'       => display('return_list'),
            'return_list' => $return_list,
            'links'       => $links,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
        );
        $returnList = $CI->parser->parse('return/return_supllier_list', $data, true);
        return $returnList;
    }
}
