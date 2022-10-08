<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Returnse extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lcustomer');
        $this->load->library('session');
        $this->load->model('Customers');
        $this->auth->check_admin_auth();
    }

//    public function return_invoice_entry()
//    {
//        // echo '<pre>';
//        // print_r($_POST);
//        // exit;
//        $CI = &get_instance();
//
//        $CI->load->model('Invoices');
//
//        $invoice_id = $this->input->post('invoice_id', TRUE);
//        $total          = $this->input->post('grand_total_price', TRUE);
//        $add_cost = (!empty($this->input->post('total_tax', TRUE))) ? $this->input->post('total_tax', TRUE) : 0;
//        $customer_id    = $this->input->post('customer_id', TRUE);
//        $isrtn          = $this->input->post('rtn', TRUE);
//        $cus_tot = (float)$total - (float)$add_cost;
//
//        $invoice_details =
//
//            $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
//        $headn = $customer_id . '-' . $cusifo->customer_name;
//        $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
//        $customer_headcode = $coainfo->HeadCode;
//
//        $base_total = $this->input->post('base_total', TRUE);
//        $old_total = $this->input->post('total_amount', TRUE);
//        $date      = date('Y-m-d');
//        $createby  = $this->session->userdata('user_id');
//        $createdate = date('Y-m-d H:i:s');
//
//        $ads      = $this->input->post('radio', TRUE);
//        $quantity = $this->input->post('product_quantity', TRUE);
//        $available_quantity = $this->input->post('available_quantity', TRUE);
//
//        $rate         = $this->input->post('product_rate', TRUE);
//        $p_id         = $this->input->post('product_id', TRUE);
//        $total_amount = $this->input->post('total_price', TRUE);
//        $discount_rate = $this->input->post('discount', TRUE);
//        $tax_amount   = $this->input->post('tax', TRUE);
//        $soldqty      = $this->input->post('sold_qty', TRUE);
//
//        $is_cash_return = $this->input->post('cash_return', TRUE);
//        $is_replace = $this->input->post('is_replace', TRUE);
//
//        $rep_quantity = $this->input->post('rep_qty', TRUE);
//        $rep_rate         = $this->input->post('replace_rate', TRUE);
//        $rep_p_id         = $this->input->post('rep_pr_id', TRUE);
//        $rep_item_total = $this->input->post('rep_item_total', TRUE);
//
//        $rep_cus_return = $this->input->post('rep_grand', TRUE);
//        $rep_cash_cost = '';
//        $rep_add_cost = $this->input->post('rep_deduction', TRUE);
//        $rep_grand_total = $this->input->post('rep_total_cost', TRUE);
//        $rep_base_total = $this->input->post('rep_total', TRUE);
//
//
//
//        if ($is_replace == 1) {
//
//            if ($add_cost > 0) {
//                $expense = array(
//                    'VNo'            => $invoice_id,
//                    'Vtype'          => 'Return',
//                    'VDate'          => $date,
//                    'COAID'          => 40405,
//                    'Narration'      => 'Additional Cost Debit For Return',
//                    'Debit'          => abs($add_cost),
//                    'Credit'         => 0,
//                    'IsPosted'       => 1,
//                    'CreateBy'       => $createby,
//                    'CreateDate'     => $createdate,
//                    'IsAppove'       => 1
//                );
//                $this->db->insert('acc_transaction', $expense);
//            }
//
//
//
//            $cash = array(
//                'VNo'            => $invoice_id,
//                'Vtype'          => 'Return',
//                'VDate'          => $date,
//                'COAID'          => 1020101,
//                'Narration'      => 'Cash credit For Return',
//                'Debit'          => 0,
//                'Credit'         => $total,
//                'IsPosted'       => 1,
//                'CreateBy'       => $createby,
//                'CreateDate'     => $createdate,
//                'IsAppove'       => 1
//            );
//            $this->db->insert('acc_transaction', $cash);
//
//            $sale_income_dr = array(
//                'VNo'            => $invoice_id,
//                'Vtype'          => 'Return',
//                'VDate'          => $date,
//                'COAID'          => 303,
//                'Narration'      => 'Sale Income Debit for return',
//                'Debit'          => $base_total,
//                'Credit'         => 0,
//                'IsPosted'       => 1,
//                'CreateBy'       => $createby,
//                'CreateDate'     => $createdate,
//                'IsAppove'       => 1
//            );
//            // $this->db->insert('acc_transaction', $cash);
//            $this->db->insert('acc_transaction', $sale_income_dr);
//
//
//            // if ($rep_grand_total > 0) {
//            $cash = array(
//                'VNo'            => $invoice_id,
//                'Vtype'          => 'Return',
//                'VDate'          => $date,
//                'COAID'          => 1020101,
//                'Narration'      => 'Cash Credit For Return',
//                'Debit'          => abs($rep_base_total),
//                'Credit'         => 0,
//                'IsPosted'       => 1,
//                'CreateBy'       => $createby,
//                'CreateDate'     => $createdate,
//                'IsAppove'       => 1
//            );
//            $sale_income = array(
//                'VNo'            => $invoice_id,
//                'Vtype'          => 'Return',
//                'VDate'          => $date,
//                'COAID'          => 303,
//                'Narration'      => 'Sale Income Credit for return',
//                'Debit'          => 0,
//                'Credit'         => abs($rep_base_total),
//                'IsPosted'       => 1,
//                'CreateBy'       => $createby,
//                'CreateDate'     => $createdate,
//                'IsAppove'       => 1
//            );
//
//
//
//
//
//            // if (is_array($p_id))
//            for ($i = 0; $i < count($rep_p_id); $i++) {
//
//                $product_quantity = $rep_quantity[$i];
//                $product_rate     = $rep_rate[$i];
//                $product_id       = $rep_p_id[$i];
//                $total_price      = $rep_item_total[$i];
//                $supplier_rate    = $this->supplier_rate($product_id);
//                // $discount         = $discount_rate[$i];
//                // $tax              = -$tax_amount[$i];
//
//                $data1 = array(
//                    'invoice_details_id' => $this->generator(15),
//                    'invoice_id'        => $invoice_id,
//                    'product_id'        => $product_id,
//                    'quantity'          => $product_quantity,
//                    'rate'              => $product_rate,
//                    // 'discount'          => is_numeric($discount),
//                    // 'tax'               => $tax,
//                    'supplier_rate'     => $supplier_rate[0]['supplier_price'],
//                    'paid_amount'       => $total_price,
//                    'total_price'       => $total_price,
//                    'status'            => 2
//                );
//
//                $this->db->insert('invoice_details', $data1);
//            }
//
//            $this->db->insert('acc_transaction', $cash);
//            $this->db->insert('acc_transaction', $sale_income);
//
//            for ($i = 0; $i < count($p_id); $i++) {
//
//                $product_quantity = $quantity[$i];
//                $product_rate     = $rate[$i];
//                $product_id       = $p_id[$i];
//                $sqty             = $soldqty[$i];
//                $total_price      = $total_amount[$i];
//                $supplier_rate    = $this->supplier_rate($product_id);
//                $discount         = $discount_rate[$i];
//                $tax              = -$tax_amount[$i];
//
//                $data1 = array(
//                    'invoice_details_id' => $this->generator(15),
//                    'invoice_id'        => $invoice_id,
//                    'product_id'        => $product_id,
//                    'quantity'          => -$product_quantity,
//                    'rate'              => $product_rate,
//                    'discount'          => -is_numeric($discount),
//                    'tax'               => $tax,
//                    'supplier_rate'     => $supplier_rate[0]['supplier_price'],
//                    'paid_amount'       => -$total,
//                    'total_price'       => -$total_price,
//                    'status'            => 1
//                );
//
//
//                $returns = array(
//                    'outlet_id'     => $this->input->post('outlet_id', TRUE),
//                    'return_id'     => $this->generator(15),
//                    'invoice_id'    => $invoice_id,
//                    'product_id'    => $product_id,
//                    'customer_id'   => $this->input->post('customer_id', TRUE),
//                    'ret_qty'       => $product_quantity,
//                    'byy_qty'       => $sqty,
//                    'date_purchase' => $this->input->post('invoice_date', TRUE),
//                    'date_return'   => $date,
//                    'product_rate'  => $product_rate,
//                    'deduction'     => $discount,
//                    'total_deduct'  => $this->input->post('total_discount', TRUE),
//                    'total_tax'     => $this->input->post('total_tax', TRUE),
//                    'total_ret_amount' => $total_price,
//                    'net_total_amount' => $this->input->post('grand_total_price', TRUE),
//                    'reason'        => $this->input->post('details', TRUE),
//                    'usablity'      => 2
//                );
//
//                $this->db->insert('invoice_details', $data1);
//
//                $this->db->insert('product_return', $returns);
//            }
//
//
//            // $this->db->insert('acc_transaction', $cos);
//        } else {
//
//            if ($is_cash_return  == 1) {
//
//                if ($add_cost > 0) {
//                    $expense = array(
//                        'VNo'            => $invoice_id,
//                        'Vtype'          => 'Return',
//                        'VDate'          => $date,
//                        'COAID'          => 40405,
//                        'Narration'      => 'Additional Cost Debit For Return',
//                        'Debit'          => abs($add_cost),
//                        'Credit'         => 0,
//                        'IsPosted'       => 1,
//                        'CreateBy'       => $createby,
//                        'CreateDate'     => $createdate,
//                        'IsAppove'       => 1
//                    );
//                    $this->db->insert('acc_transaction', $expense);
//                }
//
//
//                $cash = array(
//                    'VNo'            => $invoice_id,
//                    'Vtype'          => 'Return',
//                    'VDate'          => $date,
//                    'COAID'          => 1020101,
//                    'Narration'      => 'Cash credit For Return',
//                    'Debit'          => 0,
//                    'Credit'         => $total,
//                    'IsPosted'       => 1,
//                    'CreateBy'       => $createby,
//                    'CreateDate'     => $createdate,
//                    'IsAppove'       => 1
//                );
//                $this->db->insert('acc_transaction', $cash);
//
//                $sale_income_dr = array(
//                    'VNo'            => $invoice_id,
//                    'Vtype'          => 'Return',
//                    'VDate'          => $date,
//                    'COAID'          => 303,
//                    'Narration'      => 'Sale Income Debit for return',
//                    'Debit'          => $base_total,
//                    'Credit'         => 0,
//                    'IsPosted'       => 1,
//                    'CreateBy'       => $createby,
//                    'CreateDate'     => $createdate,
//                    'IsAppove'       => 1
//                );
//
//                $this->db->insert('acc_transaction', $sale_income_dr);
//
//            } else {
//                if ($add_cost > 0) {
//                    $expense = array(
//                        'VNo'            => $invoice_id,
//                        'Vtype'          => 'Return',
//                        'VDate'          => $date,
//                        'COAID'          => 40405,
//                        'Narration'      => 'Additional Cost Debit For Return',
//                        'Debit'          => abs($add_cost),
//                        'Credit'         => 0,
//                        'IsPosted'       => 1,
//                        'CreateBy'       => $createby,
//                        'CreateDate'     => $createdate,
//                        'IsAppove'       => 1
//                    );
//                    $this->db->insert('acc_transaction', $expense);
//                }
//
//                $cash = array(
//                    'VNo'            => $invoice_id,
//                    'Vtype'          => 'Return',
//                    'VDate'          => $date,
//                    'COAID'          => 1020101,
//                    'Narration'      => 'Cash credit For Return',
//                    'Debit'          => 0,
//                    'Credit'         => $total,
//                    'IsPosted'       => 1,
//                    'CreateBy'       => $createby,
//                    'CreateDate'     => $createdate,
//                    'IsAppove'       => 1
//                );
//
//                $this->db->insert('acc_transaction', $cash);
//
//                $sale_income_dr = array(
//                    'VNo'            => $invoice_id,
//                    'Vtype'          => 'Return',
//                    'VDate'          => $date,
//                    'COAID'          => 303,
//                    'Narration'      => 'Sale Income Debit for return',
//                    'Debit'          => $base_total,
//                    'Credit'         => 0,
//                    'IsPosted'       => 1,
//                    'CreateBy'       => $createby,
//                    'CreateDate'     => $createdate,
//                    'IsAppove'       => 1
//                );
//                $this->db->insert('acc_transaction', $sale_income_dr);
//
//            }
//
//
//            // if (is_array($p_id))
//            for ($i = 0; $i < count($p_id); $i++) {
//
//                $product_quantity = $quantity[$i];
//                $product_rate     = $rate[$i];
//                $product_id       = $p_id[$i];
//                $sqty             = $soldqty[$i];
//                $total_price      = $total_amount[$i];
//                $supplier_rate    = $this->supplier_rate($product_id);
//                $discount         = $discount_rate[$i];
//                $tax              = -$tax_amount[$i];
//
//                $data1 = array(
//                    'invoice_details_id' => $this->generator(15),
//                    'invoice_id'        => $invoice_id,
//                    'product_id'        => $product_id,
//                    'quantity'          => -$product_quantity,
//                    'rate'              => $product_rate,
//                    'discount'          => -is_numeric($discount),
//                    'tax'               => $tax,
//                    'supplier_rate'     => $supplier_rate[0]['supplier_price'],
//                    'paid_amount'       => -$total,
//                    'total_price'       => -$total_price,
//                    'status'            => 2
//                );
//
//
//                $returns = array(
//                    'outlet_id'     => $this->input->post('outlet_id', TRUE),
//                    'return_id'     => $this->generator(15),
//                    'invoice_id'    => $invoice_id,
//                    'product_id'    => $product_id,
//                    'customer_id'   => $this->input->post('customer_id', TRUE),
//                    'ret_qty'       => $product_quantity,
//                    'byy_qty'       => $sqty,
//                    'date_purchase' => $this->input->post('invoice_date', TRUE),
//                    'date_return'   => $date,
//                    'product_rate'  => $product_rate,
//                    'deduction'     => $discount,
//                    'total_deduct'  => $this->input->post('total_discount', TRUE),
//                    'total_tax'     => $this->input->post('total_tax', TRUE),
//                    'total_ret_amount' => $total_price,
//                    'net_total_amount' => $this->input->post('grand_total_price', TRUE),
//                    'reason'        => $this->input->post('details', TRUE),
//                    'usablity'      => 1
//                );
//
//
//
//                $this->db->insert('product_return', $returns);
//
//                $this->db->insert('invoice_details', $data1);
//            }
//        }
//        return $invoice_id;
//    }

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
    public function return_invoice_entry_new() {

        $CI =&get_instance();

        $CI->load->model('Invoices');
        $CI->load->model('Settings');

        $invoice_id_new =$this->generator(10);
        $invoice_no_generated =$this->number_generator();

        $invoice_id =$this->input->post('invoice_id', TRUE);
        $delivery_type =$this->input->post('deliver_type', TRUE);
        $total =$this->input->post('grand_total_price', TRUE);
        $add_cost =( !empty($this->input->post('total_tax', TRUE))) ? $this->input->post('total_tax', TRUE): 0;
        $customer_id =$this->input->post('customer_id', TRUE);
        $isrtn =$this->input->post('rtn', TRUE);
        $cus_tot =(float)$total - (float)$add_cost;

        $invoice_details =$cusifo =$this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
        $headn =$customer_id . '-' . $cusifo->customer_name;
        $coainfo =$this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
        $customer_headcode =$coainfo->HeadCode;

        $base_total =$this->input->post('base_total', TRUE);
        $old_total =$this->input->post('total_amount', TRUE);
        $old_paid =$this->input->post('old_paid', TRUE);
        $date =date('Y-m-d');
        $createby =$this->session->userdata('user_id');
        $createdate =date('Y-m-d H:i:s');

        $ads =$this->input->post('radio', TRUE);
        $quantity =$this->input->post('product_quantity', TRUE);
        $available_quantity =$this->input->post('available_quantity', TRUE);

        $rate =$this->input->post('product_rate', TRUE);
        $p_id =$this->input->post('product_id', TRUE);
        $re_p_id =$this->input->post('re_product_id', TRUE);
        $total_amount =$this->input->post('total_price', TRUE);
        $net_pay =$this->input->post('net_pay', TRUE);
        $total =$this->input->post('total', TRUE);
        $discount_rate =$this->input->post('discount_per', TRUE);
        $tax_amount =$this->input->post('tax', TRUE);
        $soldqty =$this->input->post('sold_qty', TRUE);
        $courier_condtion =$this->input->post('courier_condtion', TRUE);
        $commission =$this->input->post('sku_cm', TRUE);

        $is_cash_return =$this->input->post('cash_return', TRUE);
        $is_customer_dc =$this->input->post('pay_person', TRUE);
        $pay_person =$this->input->post('pay_person', TRUE);
        $is_replace =$this->input->post('is_replace', TRUE);

        $rep_quantity =$this->input->post('re_product_quantity', TRUE);
        $re_warrenty_date =$this->input->post('re_warrenty_date', TRUE);
        $re_expiry_date =$this->input->post('re_expiry_date', TRUE);
       $re_discount =$this->input->post('re_discount', TRUE);
       $re_comm =$this->input->post('re_comm', TRUE);
       $re_perc_discount =$this->input->post('re_discount', TRUE);
       $re_total_price =$this->input->post('re_total_price', TRUE);
       $re_total_price_wd =$this->input->post('re_total_price_wd', TRUE);
       $re_total_comm =$this->input->post('re_total_comm', TRUE);
        $rep_rate =$this->input->post('re_product_rate', TRUE);
        $rep_item_total =$this->input->post('rep_item_total', TRUE);
        $invoice =$this->input->post('invoice', TRUE);
        $total_refund =$this->input->post('total_refund', TRUE);
        $re_n_total =$this->input->post('re_n_total', TRUE);

        $courier_id =$this->input->post('courier_id', TRUE);
        $corifo =$this->db->select('*')->from('courier_name')->where('courier_id', $courier_id)->get()->row();
        $headn_cour =$corifo->id . '-' . $corifo->courier_name;
        $coainfo_cor =$this->db->select('*')->from('acc_coa')->where('HeadName', $headn_cour)->get()->row();
        $courier_headcode =$coainfo_cor->HeadCode;
        $courier_name=$corifo->courier_name;

        $sales_return =array('VNo'=> $invoice_id_new,
            'Vtype'=> 'Return',
            'VDate'=> $date,
            'COAID'=> 407,
            'Narration'=> 'Sales Return For  Invoice ID - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
            'Debit'=>  $this->input->post('sales_return', TRUE)+$this->input->post('sku_discount', TRUE),
            'Credit'=>0,
            'IsPosted'=> 1,
            'CreateBy'=> $createby,
            'CreateDate'=> $createdate,
            'IsAppove'=> 1);
        $this->db->insert('acc_transaction', $sales_return);

    if ($this->input->post('sku_discount', TRUE) > 0){
    $sales_discount =array('VNo'=> $invoice_id_new,
        'Vtype'=> 'Return',
        'VDate'=> $date,
        'COAID'=> 406,
        'Narration'=> 'Return Discount For  Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
        'Debit'=>  0,
        'Credit'=>$this->input->post('sku_discount', TRUE),
        'IsPosted'=> 1,
        'CreateBy'=> $createby,
        'CreateDate'=> $createdate,
        'IsAppove'=> 1);
    $this->db->insert('acc_transaction', $sales_discount);

    }

        if ($is_customer_dc ==1) {
            $dc = array(
                'VNo' => $invoice_id,
                'Vtype' => 'INV-CC',
                'VDate' => $date,
                'COAID' => 4040104,
                'Narration' => 'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Courier  ' . $courier_name,
                'Debit' => (!empty($this->input->post('dc', TRUE)) ? $this->input->post('dc', TRUE) : 0),
                'Credit' => 0,
                'IsPosted' => 1,
                'CreateBy' => $createby,
                'CreateDate' => $createdate,
                'IsAppove' => 1
            );
            $this->db->insert('acc_transaction', $dc);
        }

        if ($commission > 0) {
            $com_transaction = array(

                'VNo' => $invoice_id,
                'Vtype' => 'Return',
                'VDate' => $date,
                'COAID' => 410,
                'Narration'=> 'Sales Commission For  Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                'Credit' => $commission,
                'Debit' => 0,
                'IsPosted' => 1,
                'CreateBy' => $createby,
                'CreateDate' => $createdate,
                'IsAppove' => 1,

            );

            $this->db->insert('acc_transaction', $com_transaction);

        }

        if ($is_cash_return ==1) {

            if ($total_refund < 0){
                $cash =array('VNo'=> $invoice_id_new,
                    'Vtype'=> 'Return',
                    'VDate'=> $date,
                    'COAID'=> 1020101,
                    'Narration'=> 'Cash Refund credit For Return',
                    'Debit'=> 0,
                    'Credit'=>  $this->input->post('cash_refund', TRUE),
                    'IsPosted'=> 1,
                    'CreateBy'=> $createby,
                    'CreateDate'=> $createdate,
                    'IsAppove'=> 1);
                $this->db->insert('acc_transaction', $cash);

                $cus_ac =array('VNo'=> $invoice_id_new,
                        'Vtype'=> 'Return',
                        'VDate'=> $date,
                        'COAID'=> $customer_headcode,
                        'Narration'=> 'Customer account cash refund Amount For Customer Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                        'Debit'=> 0,
                        'Credit'=>  $this->input->post('dueAmount', TRUE)+(abs($this->input->post('customer_ac', TRUE))),
                        'IsPosted'=> 1,
                        'CreateBy'=> $createby,
                        'CreateDate'=> $createdate,
                        'IsAppove'=> 1);
                $this->db->insert('acc_transaction', $cus_ac);

            }else{
                $cus_ac_dr =array('VNo'=> $invoice_id_new,
                    'Vtype'=> 'Return',
                    'VDate'=> $date,
                    'COAID'=> $customer_headcode,
                    'Narration'=> 'Customer account Debit Amount For Customer Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                    'Debit'=> 0,
                    'Credit'=> $this->input->post('sales_return', TRUE)+$this->input->post('paidAmount', TRUE),
                    'IsPosted'=> 1,
                    'CreateBy'=> $createby,
                    'CreateDate'=> $createdate,
                    'IsAppove'=> 1);
                $this->db->insert('acc_transaction', $cus_ac_dr);

                $pay_type = $this->input->post('paytype', TRUE);

                $paid = $this->input->post('p_amount', TRUE);
                $bank_id = $this->input->post('bank_id_m', TRUE);

                $bkash_id = $this->input->post('bkash_id', TRUE);
                $bkashname = '';
                $card_id = $this->input->post('card_id', TRUE);
                $nagad_id = $this->input->post('nagad_id', TRUE);
                if (count($paid) > 0 ) {
                    for ($i = 0; $i < count($pay_type); $i++) {

                        if ($paid[$i] > 0){
                            if ($pay_type[$i] == 1) {

                                $cc = array(
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INV',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  1020101,
                                    'Narration'      =>  'Cash in Hand in Return for Invoice ID - ' . $invoice_id . ' customer- ' .  $cusifo->customer_name,
                                    'Debit'          =>  $paid[$i],
                                    'Credit'         =>  0,
                                    'IsPosted'       =>  1,
                                    'CreateBy'       =>  $createby,
                                    'CreateDate'     =>  $createdate,
                                    'IsAppove'       =>  1,

                                );

                                $data = array(
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'pay_date'      =>  $createdate,
                                    'status'        =>  1,
                                    'account'       => '',
                                    'COAID'         => 1020101
                                );


                                $this->db->insert('acc_transaction', $cc);

                                //echo '<pre>';print_r($data);exit();
                                $this->db->insert('paid_amount', $data);
                            }
                            if ($pay_type[$i] == 4) {
                                if (!empty($bank_id)) {
                                    $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                                    $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                                } else {
                                    $bankcoaid = '';
                                }
                                $bankc = array(
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
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
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'account'       => $bankname,
                                    'COAID'         => $bankcoaid,
                                    'pay_date'       =>  $createdate,
                                    'status'        =>  1
                                );



                                $this->db->insert('paid_amount', $data);


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
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
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
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'account'       => $bkashname,
                                    'pay_date'       =>  $createdate,
                                    'COAID'         => $bkashcoaid,
                                    'status'        =>  1,
                                );


                                $this->db->insert('paid_amount', $data);
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
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
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
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'pay_date'       =>  $createdate,
                                    'account'       => $nagadname,
                                    'COAID'         => $nagadcoaid,
                                    'status'        =>  1,
                                );



                                $this->db->insert('paid_amount', $data);

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
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
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
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'account'       => $bankname,
                                    'pay_date'       =>  $createdate,
                                    'COAID'         => $bankcoaid,
                                    'status'        =>  1,
                                );

                                $this->db->insert('paid_amount', $data);

                                $carddebit = array(
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INV',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  '40404',
                                    'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Invoice NO- ' . $invoice_no_generated,
                                    'Debit'          =>  $paid[$i] * ($card_info[0]['percentage'] / 100),
                                    'Credit'         =>  0,
                                    'IsPosted'       => 1,
                                    'CreateBy'       => $createby,
                                    'CreateDate'     => $createdate,
                                    'IsAppove'       => 1
                                );
                                $this->db->insert('acc_transaction', $carddebit);
                                $this->db->insert('acc_transaction', $bankc);
                            }
                        }

                    }


                }

            }



            $data_new_inv =array('invoice_id'=> $invoice_id_new,
                'customer_id'=> $customer_id,
                'outlet_id'=> $this->input->post('outlet_id', TRUE),
                'date'=>date('Y-m-d'),
                'time'    =>date("h:i A") ,
                'agg_id'=> ( !empty($agg_id) ? $agg_id : NULL),
                'total_amount'=> $this->input->post('total_refund', TRUE),
                'paid_amount'=> $this->input->post('paidAmount', TRUE) > 0 ? $this->input->post('paidAmount', TRUE) : $this->input->post('paid_amount', TRUE),
                'due_amount'=> $this->input->post('due_amount', TRUE),
                'invoice'=> $invoice_no_generated,
                'sale_type'   => $this->input->post('sel_type', TRUE),
                'sales_return'=> $this->input->post('sales_return', TRUE),
                'total_discount'=> $this->input->post('sku_discount', TRUE),
                'cash_refund'=> $this->input->post('cash_refund', TRUE),
                'customer_ac'=> $this->input->post('customer_ac', TRUE),
                'shipping_cost'=> $this->input->post('shipping_cost', TRUE),
                'delivery_ac'=> $this->input->post('delivery_ac', TRUE),
                'delivery_type'=> $delivery_type,
                'courier_status'=> 5,
                'previous_paid'=> $this->input->post('paid_amount', TRUE),

                'sales_by'=> $createby,
                'status'=> 2,
                'payment_type'=> 1,



            );
          //echo '<pre>'; print_r($data_new_inv); exit();
            $inv=$this->db->insert('invoice', $data_new_inv);

            for ($i =0; $i < count($p_id); $i++) {

                $product_quantity =$quantity[$i];
                $product_rate =$rate[$i];
                $product_id =$p_id[$i];
                $sqty =$soldqty[$i];
                $total_price =$total_amount[$i];
                $supplier_rate =$this->supplier_rate($product_id);
                $discount =$discount_rate[$i];
                $tax =-$tax_amount[$i];




                $data1 =array(
                    'invoice_details_id'=> $this->generator(15),
                    'invoice_id'=> $invoice_id_new,
                    'product_id'=> $product_id,
                    'quantity'=> -$product_quantity,
                    'rate'=> $product_rate,
                    'discount'=> -is_numeric($discount),
                    'tax'=> $tax,
                    'description'        => 'Return',
                    'supplier_rate'=> $supplier_rate[0]['supplier_price'],
                    'paid_amount'=> -$total,
                    'total_price'=> -$total_price,
                    'total_price_wd'=> -($product_quantity*$product_rate),
                    'status'=> 2,
                    'is_return'=> 1,
                );
                $this->db->insert('invoice_details', $data1);



                $usabilty='';

                if ($is_cash_return ==1) {
                    $usabilty=1;
                }

                if ($is_replace ==1) {
                    $usabilty=2;
                }



                $returns =array('outlet_id'=> $this->input->post('outlet_id', TRUE),
                    'return_id'=> $this->generator(15),
                    'invoice_id'=> $invoice_id,
                    'invoice_id_new'=>  $invoice_id_new ,
                    'product_id'=> $product_id,
                    'customer_id'=> $this->input->post('customer_id', TRUE),
                    'ret_qty'=> $product_quantity,
                    'byy_qty'=> $sqty,
                    'date_purchase'=> $this->input->post('invoice_date', TRUE),
                    'date_return'=> $date,
                    'product_rate'=> $product_rate,
                    'deduction'=> $discount,
                    'total_deduct'=> $this->input->post('total_discount', TRUE),
                    'delivery_charge'=> $add_cost,
                    //                'total_tax'     => $this->input->post('total_tax', TRUE),
                    'total_ret_amount'=> $total_price,
                    'net_total_amount'=> $this->input->post('grand_total_price', TRUE),
                    'reason'=> $this->input->post('details', TRUE),
                    'usablity'=> $usabilty );

                $this->db->insert('product_return', $returns);

            }
            redirect(base_url('Cinvoice/invoice_inserted_data/' . $invoice_id_new));
        }

        if ($is_replace == 1) {




            $datainv =array('invoice_id'=> $invoice_id_new,
                'customer_id'=> $customer_id,
                'date'=>date('Y-m-d'),
                'time'    =>date("h:i A") ,
                'sale_type'   => $this->input->post('sel_type', TRUE),
                'agg_id'=> ( !empty($agg_id) ? $agg_id : NULL),
                'total_amount'=> $this->input->post('re_grandTotal', TRUE),
                'invoice'=> $invoice_no_generated,
                'invoice_details' => (!empty($this->input->post('re_inva_details', TRUE)) ? $this->input->post('re_inva_details', TRUE) : ''),
                'invoice_discount' => $this->input->post('re_invoice_discount', TRUE),
                'perc_discount' => $this->input->post('re_perc_discount', TRUE),
                'total_discount'  => $this->input->post('re_total_discount', TRUE),
                'total_commission'  => $this->input->post('re_total_commission', TRUE),
                'comm_type'  => $this->input->post('commission_type', TRUE),
                'paid_amount'=> $this->input->post('re_paid_amount', TRUE),
                'due_amount'=> $this->input->post('re_due_amount', TRUE),
                'prevous_due'     => $this->input->post('previous', TRUE),
                'commission'   => $this->input->post('commission', TRUE),
                'shipping_cost'=> ( !empty($add_cost) ? $add_cost : null),
                 'condition_cost'   => $this->input->post('re_condition_cost', TRUE),
                'courier_condtion'=> $this->input->post('re_courier_condtion', TRUE),
                'delivery_ac'=> $this->input->post('re_delivery_ac', TRUE),
                'sales_by'=> $createby,
                'status'=> 2,
                'payment_type'=> 1,
                'delivery_type'=> $delivery_type,
                'courier_id'=> ( !empty($this->input->post('courier_id', TRUE)) ? $this->input->post('courier_id', TRUE) : null),
                'branch_id'=> ( !empty($this->input->post('branch_id', TRUE)) ? $this->input->post('branch_id', TRUE) : null),
                'outlet_id'=> $this->input->post('outlet_id', TRUE),
                'reciever_id'=> $this->input->post('reciever_id', TRUE),
                'receiver_number'=> $this->input->post('receiver_number', TRUE),
                'courier_status'=> 6,
                'previous_paid'=> $this->input->post('paid_amount', TRUE),


            );

            $inv=$this->db->insert('invoice', $datainv);

            for ($i =0; $i < count($p_id); $i++) {

                $product_quantity =$quantity[$i];
                $product_rate =$rate[$i];
                $product_id =$p_id[$i];
                $sqty =$soldqty[$i];
                $total_price =$total_amount[$i];
                $supplier_rate =$this->supplier_price($product_id);
                $discount =$discount_rate[$i];
                $tax =-$tax_amount[$i];

                $data1 =array(
                    'invoice_details_id'=> $this->generator(15),
                    'invoice_id'=> $invoice_id_new,
                    'product_id'=> $product_id,
                    'quantity'=> -$product_quantity,
                    'rate'=> $product_rate,
                    'description'        => 'Return',
                    'discount'=> -is_numeric($discount),
                    'tax'=> $tax,
                    'supplier_rate'=> $supplier_rate[0]['supplier_price'],
                    'paid_amount'=> -$total,
                    'total_price'=> -$total_price,
                    'total_price_wd'=> -($product_quantity*$product_rate),
                    'status'=> 2,
                     'is_return'=> 1,
                );
                $this->db->insert('invoice_details', $data1);

                $usabilty='';

                if ($is_cash_return ==1) {
                    $usabilty=1;
                }

                if ($is_replace ==1) {
                    $usabilty=2;
                }

                $returns =array('outlet_id'=> $this->input->post('outlet_id', TRUE),
                    'return_id'=> $this->generator(15),
                    'invoice_id'=> $invoice_id,
                    'invoice_id_new'=>  $invoice_id_new ,
                    'product_id'=> $product_id,
                    'customer_id'=> $this->input->post('customer_id', TRUE),
                    'ret_qty'=> $product_quantity,
                    'byy_qty'=> $sqty,
                    'date_purchase'=> $this->input->post('invoice_date', TRUE),
                    'date_return'=> $date,
                    'product_rate'=> $product_rate,
                    'deduction'=> $discount,
                    'total_deduct'=> $this->input->post('total_discount', TRUE),
                    'delivery_charge'=> $add_cost,
                    //                'total_tax'     => $this->input->post('total_tax', TRUE),
                    'total_ret_amount'=> $total_price,
                    'net_total_amount'=> $this->input->post('grand_total_price', TRUE),
                    'reason'=> $this->input->post('details', TRUE),
                    'usablity'=> $usabilty );

                $this->db->insert('product_return', $returns);

            }
            for ($i =0; $i < count($re_p_id); $i++) {

                $product_rate = $rep_rate [$i];
                $product_id = $re_p_id[$i];
                $product_quantity = $rep_quantity[$i];
                $total_price = $re_total_price[$i];
                $total_price_wd = (!empty($re_total_price_wd[$i]) ? $re_total_price_wd[$i] : $total_price);
                $supplier_rate = $this->supplier_price($product_id);
                $disper = $re_discount[$i];
                $comm = $re_comm[$i];

                $data1 =array(
                    'invoice_details_id' => $this->generator(15),
                    'invoice_id'         => $invoice_id_new,
                    'product_id'         => $product_id,
                    'quantity'           => $product_quantity,
                    'rate'               => $product_rate,
//                    'discount'           => $discount,
                    'description'        => 'Replacement',
                    'discount_per'       => $disper,
                    'commission_per'       => $comm,
                    'supplier_rate'      => $supplier_rate,
                    'total_price'        => $total_price,
                    'total_price_wd'        => $total_price_wd,
                    'status'             => 2
                );

                $inv_dt=$this->db->insert('invoice_details', $data1);
            }
            if ($this->input->post('re_total_discount', TRUE) > 0) {
                $re_sales_discount = array('VNo' => $invoice_id_new,
                    'Vtype' => 'Replacement',
                    'VDate' => $date,
                    'COAID' => 406,
                    'Narration' => 'Sales Discount  Replacement For  Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                    'Debit' => $this->input->post('re_total_discount', TRUE),
                    'Credit' => 0,
                    'IsPosted' => 1,
                    'CreateBy' => $createby,
                    'CreateDate' => $createdate,
                    'IsAppove' => 1);
                $this->db->insert('acc_transaction', $re_sales_discount);
            }
            $sale_income_cr =array('VNo'=> $invoice_id_new,
                'Vtype'=> 'Return',
                'VDate'=> $date,
                'COAID'=> 303,
                'Narration'=> 'Sales Credit for  Replacement  Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                'Debit'=> 0,
                'Credit'=> $this->input->post('grandTotal', TRUE)+$this->input->post('re_total_discount', TRUE),
                'IsPosted'=> 1,
                'CreateBy'=> $createby,
                'CreateDate'=> $createdate,
                'IsAppove'=> 1);
            $this->db->insert('acc_transaction', $sale_income_cr);

           // echo $re_n_total;exit();
            if ($re_n_total < 0){
                if ($this->input->post('re_cash_refund', TRUE) > 0){
                    $cash =array('VNo'=> $invoice_id_new,
                        'Vtype'=> 'Replacement',
                        'VDate'=> $date,
                        'COAID'=> 1020101,
                        'Narration'=> 'Cash Refund credit For  Replacement For  Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                        'Debit'=> 0,
                        'Credit'=>  $this->input->post('re_cash_refund', TRUE),
                        'IsPosted'=> 1,
                        'CreateBy'=> $createby,
                        'CreateDate'=> $createdate,
                        'IsAppove'=> 1);
                    $this->db->insert('acc_transaction', $cash);

                    $re_customer_ac=abs($this->input->post('re_customer_ac', TRUE));
                    if ($re_customer_ac> 0) {
                        $cus_ac = array('VNo' => $invoice_id_new,
                            'Vtype' => 'Replacement',
                            'VDate' => $date,
                            'COAID' => $customer_headcode,
                            'Narration' => 'Customer account cash refund Amount For Customer Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                            'Debit' => 0,
                            'Credit' => abs($this->input->post('re_customer_ac', TRUE)),
                            'IsPosted' => 1,
                            'CreateBy' => $createby,
                            'CreateDate' => $createdate,
                            'IsAppove' => 1);
                        $this->db->insert('acc_transaction', $cus_ac);
                    }
                }
            }else{
                //echo $re_n_total;exit();

                if ($this->input->post('re_due_amount', TRUE) > 0) {
                    $re_sales_discount = array('VNo' => $invoice_id_new,
                        'Vtype' => 'Replacement',
                        'VDate' => $date,
                        'COAID' => $customer_headcode,
                        'Narration'=> 'Customer account Debit Amount For Customer Invoice NO - ' . $invoice_no_generated . ' Customer- ' . $cusifo->customer_name,
                        'Debit' => $this->input->post('re_due_amount', TRUE),
                        'Credit' => 0,
                        'IsPosted' => 1,
                        'CreateBy' => $createby,
                        'CreateDate' => $createdate,
                        'IsAppove' => 1);
                    $this->db->insert('acc_transaction', $re_sales_discount);
                }
                $pay_type = $this->input->post('paytype', TRUE);
                $paid = $this->input->post('p_amount', TRUE);
                $bank_id = $this->input->post('bank_id_m', TRUE);

                $bkash_id = $this->input->post('bkash_id', TRUE);
                $bkashname = '';
                $card_id = $this->input->post('card_id', TRUE);
                $nagad_id = $this->input->post('nagad_id', TRUE);
                if (count($paid) > 0 ) {
                 //   echo count($paid);exit();
                    for ($i = 0; $i < count($pay_type); $i++) {

                        if ($paid[$i] > 0){
                            if ($pay_type[$i] == 1) {

                                $cc = array(
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INV',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  1020101,
                                    'Narration'      =>  'Cash in Hand in Replacement for Invoice ID - ' . $invoice_id_new . ' customer- ' .  $cusifo->customer_name,
                                    'Debit'          =>  $paid[$i],
                                    'Credit'         =>  0,
                                    'IsPosted'       =>  1,
                                    'CreateBy'       =>  $createby,
                                    'CreateDate'     =>  $createdate,
                                    'IsAppove'       =>  1,

                                );


                                $data = array(
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'pay_date'      =>  $createdate,
                                    'status'        =>  1,
                                    'account'       => '',
                                    'COAID'         => 1020101
                                );

                                $this->db->insert('acc_transaction', $cc);

                                $this->db->insert('paid_amount', $data);
                            }
                            if ($pay_type[$i] == 4) {
                                if (!empty($bank_id)) {
                                    $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                                    $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                                } else {
                                    $bankcoaid = '';
                                }
                                $bankc = array(
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  $bankcoaid,
                                    'Narration'      =>  'Paid amount for customer  Invoice ID - ' . $invoice_id_new . ' customer -' . $cusifo->customer_name,
                                    'Debit'          =>  $paid[$i],
                                    'Credit'         =>  0,
                                    'IsPosted'       =>  1,
                                    'CreateBy'       =>  $createby,
                                    'CreateDate'     =>  $createdate,
                                    'IsAppove'       =>  1,

                                );

                                $data = array(
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'account'       => $bankname,
                                    'COAID'         => $bankcoaid,
                                    'pay_date'       =>  $createdate,
                                    'status'        =>  1
                                );



                                $this->db->insert('paid_amount', $data);


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
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  $bkashcoaid,
                                    'Narration'      =>  'Cash in Bkash paid amount for customer  Invoice ID - ' . $invoice_id_new . ' customer -' . $cusifo->customer_name,
                                    'Debit'          =>  $paid[$i],
                                    'Credit'         =>  0,
                                    'IsPosted'       =>  1,
                                    'CreateBy'       =>  $createby,
                                    'CreateDate'     =>  $createdate,
                                    'IsAppove'       =>  1,

                                );

                                $data = array(
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'account'       => $bkashname,
                                    'pay_date'       =>  $createdate,
                                    'COAID'         => $bkashcoaid,
                                    'status'        =>  1,
                                );


                                $this->db->insert('paid_amount', $data);
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
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  $nagadcoaid,
                                    'Narration'      =>  'Cash in Nagad paid amount for customer  Invoice ID - ' . $invoice_id_new . ' customer -' . $cusifo->customer_name,
                                    'Debit'          =>  $paid[$i],
                                    'Credit'         =>  0,
                                    'IsPosted'       =>  1,
                                    'CreateBy'       =>  $createby,
                                    'CreateDate'     =>  $createdate,
                                    'IsAppove'       =>  1,

                                );

                                $data = array(
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'pay_date'       =>  $createdate,
                                    'account'       => $nagadname,
                                    'COAID'         => $nagadcoaid,
                                    'status'        =>  1,
                                );



                                $this->db->insert('paid_amount', $data);

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
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INVOICE',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  $bankcoaid,
                                    'Narration'      =>  'Paid amount for customer in card - ' . $card_info[0]['card_no'] . '  Invoice ID - ' . $invoice_id_new . ' customer -' . $cusifo->customer_name,
                                    'Debit'          => ($paid[$i]) - ($paid[$i] * ($card_info[0]['percentage'] / 100)),
                                    'Credit'         =>  0,
                                    'IsPosted'       =>  1,
                                    'CreateBy'       =>  $createby,
                                    'CreateDate'     =>  $createdate,
                                    'IsAppove'       =>  1,

                                );

                                $data = array(
                                    'invoice_id'    => $invoice_id_new,
                                    'pay_type'      => $pay_type[$i],
                                    'amount'        => $paid[$i],
                                    'account'       => $bankname,
                                    'pay_date'       =>  $createdate,
                                    'COAID'         => $bankcoaid,
                                    'status'        =>  1,
                                );

                                $this->db->insert('paid_amount', $data);

                                $carddebit = array(
                                    'VNo'            =>  $invoice_id_new,
                                    'Vtype'          =>  'INV',
                                    'VDate'          =>  $createdate,
                                    'COAID'          =>  '40404',
                                    'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Invoice ID- ' . $invoice_id_new,
                                    'Debit'          =>  $paid[$i] * ($card_info[0]['percentage'] / 100),
                                    'Credit'         =>  0,
                                    'IsPosted'       => 1,
                                    'CreateBy'       => $createby,
                                    'CreateDate'     => $createdate,
                                    'IsAppove'       => 1
                                );
                                $this->db->insert('acc_transaction', $carddebit);
                                $this->db->insert('acc_transaction', $bankc);
                            }
                        }

                    }


                }
            }










            redirect('Cinvoice/invoice_inserted_data/' .$invoice_id_new);
        }

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
    }
    ///#################### Supplier return  Entry ############///////////
    public function return_supplier_entry()
    {
        $purchase_id = $this->input->post('purchase_id', TRUE);
        $total       = $this->input->post('grand_total_price', TRUE);
        $supplier_id = $this->input->post('supplier_id', TRUE);
        $isrtn       = $this->input->post('rtn', TRUE);
        $supinfo     = $this->db->select('*')->from('supplier_information')->where('supplier_id', $supplier_id)->get()->row();
        $sup_head    = $supinfo->supplier_id . '-' . $supinfo->supplier_name;
        $sup_coa     = $this->db->select('*')->from('acc_coa')->where('HeadName', $sup_head)->get()->row();
        $receive_by   = $this->session->userdata('user_id');
        $receive_date = date('Y-m-d');
        $createdate   = date('Y-m-d H:i:s');

        $date  = date('Y-m-d');

        $supplierledger = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Return',
            'VDate'          =>  $date,
            'COAID'          =>  $sup_coa->HeadCode,
            'Narration'      =>  'Supplier Return to .' . $supinfo->supplier_name,
            'Debit'          =>  $total,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $receive_by,
            'CreateDate'     =>  $receive_date,
            'IsAppove'       =>  1
        );




        $quantity           = $this->input->post('product_quantity', TRUE);
        $available_quantity = $this->input->post('available_quantity', TRUE);
        $cartoon            = $this->input->post('cartoon', TRUE);
        $rate               = $this->input->post('product_rate', TRUE);
        $p_id               = $this->input->post('product_id', TRUE);
        $total_amount       = $this->input->post('total_price', TRUE);
        $discount_rate      = $this->input->post('discount', TRUE);
        $soldqty            = $this->input->post('ret_qty', TRUE);

        $pdid = $this->input->post('purchase_detail_id');


        if (is_array($p_id))
            for ($i = 0; $i < count($p_id); $i++) {
                $cartoon_quantity = $cartoon[$i];
                $product_quantity = $quantity[$i];
                $product_rate     = $rate[$i];
                $product_id       = $p_id[$i];
                $sqty             = $soldqty[$i];
                $total_price      = $total_amount[$i];
                $discount         = $discount_rate[$i];
                $detais_id        = $pdid[$i];

                $data1 = array(
                    'purchase_detail_id' => $detais_id,
                    'purchase_id'        => $purchase_id,
                    'product_id'         => $product_id,
                    'quantity'           => -$product_quantity,
                    'rate'               => $product_rate,
                    'discount'           => -is_numeric($discount),
                    'total_amount'       => -$total_price,
                    'status'             => 1
                );


                $returns = array(
                    'return_id'    => $this->generator(15),
                    'purchase_id'  => $purchase_id,
                    'product_id'   => $product_id,
                    'supplier_id'  => $this->input->post('supplier_id', TRUE),
                    'ret_qty'      => $product_quantity,
                    'byy_qty'      => $sqty,
                    'date_purchase' => $this->input->post('return_date', TRUE),
                    'date_return'  => $date,
                    'product_rate' => $product_rate,
                    'deduction'    => $discount,
                    'total_deduct' => $this->input->post('total_discount', TRUE),
                    'total_ret_amount' => $total_price,
                    'net_total_amount' => $this->input->post('grand_total_price', TRUE),
                    'reason'       => $this->input->post('details', TRUE),
                    'usablity'     => $this->input->post('radio', TRUE)
                );


                $this->db->insert('product_purchase_details', $data1);

                $this->db->insert('product_return', $returns);
            }

        $this->db->insert('acc_transaction', $supplierledger);

        return $purchase_id;
    }

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

    // return list count
    public function return_list_count()
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('usablity', 1);
        $this->db->group_by('a.invoice_id', 'desc');
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    ///start  return list
    public function return_list($perpage, $page)
    {
        $this->db->select('a.net_total_amount,a.*,b.customer_name,i.*');
        $this->db->from('product_return a');
        $this->db->join('invoice i', 'i.invoice_id = a.invoice_id');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('usablity', 1);
        $this->db->or_where('usablity', 2);
        $this->db->group_by('a.invoice_id');
        $this->db->order_by('a.date_return', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // date between search return list  invoice
    public function return_dateWise_invoice($from_date, $to_date, $perpage, $page)
    {
        $dateRange = "a.date_return BETWEEN '$from_date' AND '$to_date'";

        $this->db->select('a.net_total_amount,a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('usablity', 1);
        $this->db->where($dateRange, NULL, FALSE);
        $this->db->group_by('a.invoice_id', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        return $query->result_array();
    }

    // supplier return list
    public function supplier_return_list($perpage, $page)
    {
        $this->db->select('a.net_total_amount,a.*,b.supplier_name');
        $this->db->from('product_return a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('usablity', 2);
        $this->db->group_by('a.purchase_id', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // date between search return list  supplier/purchase
    public function return_dateWise_supplier($from_date, $to_date, $perpage, $page)
    {
        $dateRange = "a.date_return BETWEEN '$from_date' AND '$to_date'";

        $this->db->select('a.net_total_amount,a.*,b.supplier_name');
        $this->db->from('product_return a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('usablity', 2);
        $this->db->where($dateRange, NULL, FALSE);
        $this->db->group_by('a.purchase_id', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function retrieve_invoice_html_data($invoice_id)
    {
        $this->db->select('c.total_ret_amount,
						c.*,
						b.*,
						d.product_id,
						d.product_name,
						d.product_details,
						d.product_model');
        $this->db->from('product_return c');
        $this->db->join('customer_information b', 'b.customer_id = c.customer_id');
        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->where('c.invoice_id', $invoice_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function retrieve_replace_html_data($invoice_id)
    {
        return $this->db->select('a.*,b.product_name,b.product_model')
            ->from('invoice_details a')
            ->join('product_information b','a.product_id=b.product_id')
            ->where('invoice_id',$invoice_id)->get()->result();


    }

    // supplier return html data
    public function supplier_return_html_data($purchase_id)
    {
        $this->db->select('c.total_ret_amount,
						c.*,
                        c.product_rate as price,
						b.*,
						d.product_id,
						d.product_name,
						d.product_details,
						d.product_model');
        $this->db->from('product_return c');
        $this->db->join('supplier_information b', 'b.supplier_id = c.supplier_id');
        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->where('c.purchase_id', $purchase_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

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

    // wastage return list bellow
    public function wastage_return_list_count()
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('usablity', 3);
        $this->db->group_by('a.invoice_id', 'desc');
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    // supplier list count
    public function supplier_return_list_count()
    {
        $this->db->select('a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('usablity', 2);
        $this->db->group_by('a.invoice_id', 'desc');
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    ///start  return list
    public function wastage_return_list($perpage, $page)
    {
        $this->db->select('a.net_total_amount,a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('usablity', 3);
        $this->db->group_by('a.invoice_id', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    /////////// supplier returns form data
    public function supplier_return($purchase_id)
    {
        $this->db->select('c.*,a.*,b.*,a.product_id,d.product_name,d.product_model,');
        $this->db->from('product_purchase c');
        $this->db->join('product_purchase_details a', 'a.purchase_id = c.purchase_id');
        $this->db->join('product_information d', 'd.product_id = a.product_id');
      //  $this->db->join('supplier_product e', 'e.product_id = d.product_id');
        $this->db->join('supplier_information b', 'b.supplier_id = c.supplier_id');

        $this->db->where('c.purchase_id', $purchase_id);
        $this->db->group_by('d.product_id');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // return delete with invoice id
    public function returninvoice_delete($invoice_id = null)
    {
        $this->db->where('invoice_id', $invoice_id)
            ->delete('product_return');

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    // return delete with purchase id
    public function return_purchase_delete($purchase_id = null)
    {
        $this->db->where('purchase_id', $purchase_id)
            ->delete('product_return');

        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    // pdf invoice return list
    public function pdf_invoice_return_list()
    {
        $this->db->select('a.net_total_amount,a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('usablity', 1);
        $this->db->group_by('a.invoice_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // supplier return list pdf
    public function pdf_supplier_return_list()
    {
        $this->db->select('a.net_total_amount,a.*,b.supplier_name');
        $this->db->from('product_return a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('usablity', 2);
        $this->db->group_by('a.purchase_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
}
