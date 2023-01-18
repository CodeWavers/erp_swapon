<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rqsn extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lrqsn');
        $this->load->library('Smsgateway');
        $this->load->library('session');
        $this->load->model('Service');
        $this->auth->check_admin_auth();
    }
    public function role_list()
    {

        return $list = $this->db->select('*')
            ->from('sec_role')
            ->where('type','production')

            ->get()->result_array();
    }

    // outlet list
    public function outlet_list()
    {
        $user_id = $this->session->userdata('user_id');
        return $list = $this->db->select('*')
            ->from('outlet_warehouse')
            ->where('outlet_warehouse.user_id', $user_id)
            ->get()->result_array();
    }
    public function outlet_list_to()
    {
        $user_id = $this->session->userdata('user_id');
        return $list = $this->db->select('*')
            ->from('outlet_warehouse')
            //->where('outlet_warehouse.user_id',$user_id)
            ->get()->result_array();
    }

    // outlet list
    public function cw_list()
    {
        return $list = $this->db->select('*')
            ->from('central_warehouse a')
            // ->join('outlet_warehouse b','a.warehouse_id=b.warehouse_id')
            ->get()->result_array();
    }
    public function get_po_details($product_id, $supplier_id)
    {
        //        $this->db->select('SUM(a.quantity) as total_purchase,b.*');
        //        $this->db->from('product_purchase_details a');
        //        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        //        $this->db->where('a.product_id', $product_id);
        //        $this->db->where('b.supplier_id', $supplier_id);
        //        $total_purchase = $this->db->get()->row();
        //
        //        $this->db->select('SUM(b.quantity) as total_sale');
        //        $this->db->from('invoice_details b');
        //        $this->db->where('b.product_id', $product_id);
        //        $total_sale = $this->db->get()->row();

        $this->db->select('a.*,b.*,c.*');
        $this->db->from('product_information a');
        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->join('rqsn_details c', 'c.product_id=a.product_id');
        $this->db->where(array('c.rqsn_detail_id' => $product_id, 'c.status' => 4));
        $this->db->where('b.supplier_id', $supplier_id);
        //  $this->db->where('c.status', 4);
        $product_information = $this->db->get()->row();

        //  $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);

        $total_price = ($product_information->a_qty) * ($product_information->supplier_price);

        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data2 = array(
            'product_name'  => $product_information->product_name,
            'p_id'  => $product_information->product_id,
            'quantity'  => $product_information->a_qty,
            'supplier_price' => $product_information->supplier_price,
            'total_price' => $total_price,
            'price'          => $product_information->price,
            'supplier_id'    => $product_information->supplier_id,
            'unit'           => $product_information->unit,
            'tax'            => $product_information->tax,
            'discount_type'  => $currency_details[0]['discount_type'],
        );

        return $data2;
    }

    public function rqsn_entry()
    {
          // echo "<pre>";print_r($_POST);exit();

        $this->load->model('Web_settings');
        $rqsn_id = mt_rand();
        $user_id = $this->session->userdata('user_id');
        //    echo "Ok";exit();

        //Data inserting into invoice table
        $datarq = array(
            'rqsn_id'     => $rqsn_id,
            'date'            => (!empty($this->input->post('invoice_date', true)) ? $this->input->post('invoice_date', true) : date('Y-m-d')),
            'details'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Requisition'),
            'from_id' => $this->input->post('from_id', true),
            'to_id'  => $this->input->post('to_id', true),
          //  'user_id'  => $user_id,
            'status'   => 1,
        );

          // echo "<pre>";print_r($datarq);exit();
        $this->db->insert('rqsn', $datarq);


        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $unit             = $this->input->post('unit', true);
        $qty_price             = $this->input->post('qty_price', true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $un  = $unit[$i];
            $product_id   = $p_id[$i];
            //$rate   = $qty_price[$i];
            $rate = $this->Web_settings->product_details($p_id[$i]);
            //echo "<pre>";print_r($rate[0]['price']);exit();


            $rqsn_details = array(
                'rqsn_detail_id'     => mt_rand(),
                'rqsn_id'     => $rqsn_id,
                'product_id'         => $product_id,
                'quantity'                => $qty,
                'unit'                => $un,
                'rate'                => $rate[0]['price'],
                'item_total'          => $rate[0]['price'] * $qty,
                'status'                => 1,

            );
           // echo "<pre>";print_r($rate);exit();
            if (!empty($quantity)) {
                $this->db->insert('rqsn_details', $rqsn_details);
            }
        }

        return $rqsn_id;
    }
    public function  transfer_entry()
    {
        $this->load->model('Web_settings');
        $rqsn_id = mt_rand();
        $user_id = $this->session->userdata('user_id');
        //    echo "Ok";exit();
        $Vdate =date('Y-m-d');
        //Data inserting into invoice table
        $datarq = array(
            'rqsn_id'     => $rqsn_id,
            'date'            => (!empty($this->input->post('invoice_date', true)) ? $this->input->post('invoice_date', true) : date('Y-m-d')),
            'details'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Transfer'),
            'from_id' => $this->input->post('to_id', true),
            'to_id'  => $this->input->post('from_id', true),
            'grand_total'  => $this->input->post('total_expense', true),
            'send_by'  => $user_id,
            'status'   => 1,
        );

        $this->db->insert('rqsn', $datarq);

        $outlet_name=$this->db->select('outlet_name')->from('outlet_warehouse')->where('outlet_id',$this->input->post('to_id', true))->get()->row()->outlet_name;




        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $unit             = $this->input->post('unit', true);
        $qty_price             = $this->input->post('qty_price', true);
        $total_price             = $this->input->post('total_price', true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $un  = $unit[$i];
            $product_id   = $p_id[$i];
            $rate   = $qty_price[$i];
            $t_price   = $total_price[$i];


            $rqsn_details = array(
                'rqsn_detail_id'     => mt_rand(),
                'rqsn_id'     => $rqsn_id,
                'product_id'         => $product_id,
                'quantity'                => $qty,
                'unit'                => $un,
                'status'                => 2,


                //temporary added
                'rate' =>$rate,
                'item_total' =>$t_price,
                'a_qty' =>$qty,
                'isaprv'                => 1,
//                'isrcv'                => 1,
                'is_return' => (isset($_POST['return']) ? 1 : 0),

            );
            if (!empty($quantity)) {
                $this->db->insert('rqsn_details', $rqsn_details);
            }
        }
//        //Income Credit
//        $incCr = array(
//            'VNo'            =>  $rqsn_id,
//            'Vtype'          =>  'Transfer',
//            'VDate'          =>  $Vdate,
//            'COAID'          =>  306,
//            'Narration'      =>  'Income For Transfer ID -  ' . $rqsn_id . ' for Outlet  ' . $outlet_name,
//            'Credit'          =>  (!empty($this->input->post('total_expense', TRUE)) ? $this->input->post('total_expense', TRUE): 0),
//            'Debit'         =>  0,
//            'IsPosted'       =>  1,
//            'CreateBy'       => $user_id,
//            'CreateDate'     => $Vdate,
//            'IsAppove'       => 1
//        );
//        $this->db->insert('acc_transaction', $incCr);
////Current Asset Receivable
//        $curDr = array(
//            'VNo'            =>  $rqsn_id,
//            'Vtype'          =>  'Transfer',
//            'VDate'          =>  $Vdate,
//            'COAID'          =>  1020303,
//            'Narration'      =>  'Receivable For Transfer ID -  ' . $rqsn_id . ' for Outlet  ' . $outlet_name,
//            'Credit'          =>  0,
//            'Debit'         =>  (!empty($this->input->post('total_expense', TRUE)) ? $this->input->post('total_expense', TRUE): 0),
//            'IsPosted'       =>  1,
//            'CreateBy'       => $user_id,
//            'CreateDate'     => $Vdate,
//            'IsAppove'       => 1
//        );
//        $this->db->insert('acc_transaction', $curDr);
//        //Current Liabilties Payable
//        $curLCr = array(
//            'VNo'            =>  $rqsn_id,
//            'Vtype'          =>  'Transfer',
//            'VDate'          =>  $Vdate,
//            'COAID'          =>  50201,
//            'Narration'      =>  'Payable For Transfer ID -  ' . $rqsn_id . ' for Outlet  ' . $outlet_name,
//            'Credit'          =>  (!empty($this->input->post('total_expense', TRUE)) ? $this->input->post('total_expense', TRUE): 0),
//            'Debit'         =>  0,
//            'IsPosted'       =>  1,
//            'CreateBy'       => $user_id,
//            'CreateDate'     => $Vdate,
//            'IsAppove'       => 1
//        );
//        $this->db->insert('acc_transaction', $curLCr);
//        //Expense Debit
//        $exDr = array(
//            'VNo'            =>  $rqsn_id,
//            'Vtype'          =>  'Transfer',
//            'VDate'          =>  $Vdate,
//            'COAID'          =>  407,
//            'Narration'      =>  'Transfer Expense For Transfer ID -  ' . $rqsn_id . ' for Outlet  ' . $outlet_name,
//            'Credit'          => 0,
//            'Debit'         =>  (!empty($this->input->post('total_expense', TRUE)) ? $this->input->post('total_expense', TRUE): 0),
//            'IsPosted'       =>  1,
//            'CreateBy'       => $user_id,
//            'CreateDate'     => $Vdate,
//            'IsAppove'       => 1
//        );
//        $this->db->insert('acc_transaction', $exDr);

        return $rqsn_id;
    }
    public function pr_rqsn_entry()
    {
        $this->load->model('Web_settings');
        $pr_rqsn_id = date('Ymdhs');

        //    echo "Ok";exit();

        //Data inserting into invoice table
        $datarq = array(
            'pr_rqsn_id'     => $pr_rqsn_id,
            'date'            => (!empty($this->input->post('invoice_date', true)) ? $this->input->post('invoice_date', true) : date('Y-m-d')),
            'details'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Production Requisition'),
            'to_id'  => $this->input->post('to_id', true),
            'status'   => 1,
        );
   ;

        $this->db->insert('pr_rqsn', $datarq);


        $quantity         = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $unit             = $this->input->post('unit', true);



        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $un  = $unit[$i];
            $product_id   = $p_id[$i];


            $check_product = $this->db->select('*')->from('pr_rqsn_details')->where('product_id',$product_id)->get()->num_rows();
            $exist_qty = $this->db->select('quantity')->from('pr_rqsn_details')->where('product_id',$product_id)->get()->row()->quantity;

            if ($check_product > 0){

                $this->db->set(array('quantity'=> $qty+$exist_qty,'last_updated' =>date('Y-m-d')));
                $this->db->where('product_id', $product_id);
                $this->db->update('pr_rqsn_details');

            }else{
                $rqsn_details = array(
                    'pr_rqsn_detail_id'     => mt_rand(),
                    'pr_rqsn_id'     => $pr_rqsn_id,
                    'product_id'         => $product_id,
                    'quantity'                => $qty,
                    'unit'                => $un,
                    'status'                => 1,
                    'create_date'                => date('Y-m-d'),


                    //temporary added


                    'isaprv'                => 1,
//                'isrcv'                => 1,

                );
                if (!empty($quantity)) {
                    $this->db->insert('pr_rqsn_details', $rqsn_details);
                }

            }




        }

        return $pr_rqsn_id;
    }

    public function rqsn_entry_cw()
    {
        $this->load->model('Web_settings');
        $rqsn_id = mt_rand();

        //    echo "Ok";exit();

        //Data inserting into invoice table
        $datarq = array(
            'rqsn_id'     => $rqsn_id,
            'date'            => (!empty($this->input->post('invoice_date', true)) ? $this->input->post('invoice_date', true) : date('Y-m-d')),
            'details'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Requisition'),
            'purchase_order_no' => $this->input->post('po_No', true),
            'from_id' => $this->input->post('from_id', true),
            'to_id'  => $this->input->post('to_id', true),
            'status'   => 1,
        );
        //        $datarq = array(
        //            'rqsn_id'     => 1,
        //            'date'            => '22/1/2012',
        //            'details'         => 'Regs',
        //            'from_id'=> 'abc',
        //            'to_id'  =>'765t',
        //            'status'   => 1,
        //        );

        //  echo '<pre>';print_r($datarq);exit();

        $this->db->insert('rqsn', $datarq);


        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $unit             = $this->input->post('unit', true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $un  = $unit[$i];
            $product_id   = $p_id[$i];


            $rqsn_details = array(
                'rqsn_detail_id'     => 'PO' . mt_rand(),
                'rqsn_id'     => $rqsn_id,
                'product_id'         => $product_id,
                'quantity'                => $qty,
                'unit'                => $un,
                'status'                => 1,

            );
            if (!empty($qty)) {
                $this->db->insert('rqsn_details', $rqsn_details);
            }
        }

        return $rqsn_id;
    }


    public function purchase_order_entry()
    {
        $this->load->model('Web_settings');
        $this->load->model('Purchases');
        $purchase_id = mt_rand();

        $po_id = $this->input->post('pur_order_no', TRUE);
        $po_no = $this->Purchases->purchase_details($po_id)[0]['purchase_order_no'];

        $supplier_id = $this->input->post('supplier_id', TRUE);
        $supinfo = $this->db->select('*')->from('supplier_information')->where('supplier_id', $supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id . '-' . $supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName', $sup_head)->get()->row();
        $VDate = $this->input->post('purchase_date', TRUE);

        //    echo "Ok";exit();

        //Data inserting into invoice table
        $datarq = array(
            'purchase_id'     => $purchase_id,
            // 'purchase_order_no' => $po_no,
            'purchase_date'            => (!empty($this->input->post('purchase_date', true)) ? $this->input->post('purchase_date', true) : date('Y-m-d')),
            // 'details'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Requisition'),

            'supplier_id' => $this->input->post('supplier_id', true),
            'base_total' => $this->input->post('total', true),
            'total_discount' => $this->input->post('discount', true),
            'grand_total_amount' => $this->input->post('grand_total_price', true),
            'paid_amount' => $this->input->post('paid_amount', true),
            'due_amount' => $this->input->post('due_amount', true),
            'isFinal'   => 1,
        );
        //        $datarq = array(
        //            'rqsn_id'     => 1,
        //            'date'            => '22/1/2012',
        //            'details'         => 'Regs',
        //            'from_id'=> 'abc',
        //            'to_id'  =>'765t',
        //            'status'   => 1,
        //        );

        //  echo '<pre>';print_r($datarq);exit();

        if ($this->input->post('paid_amount') <= 0) {
            $datarq['status'] = 2;
            $this->db->insert('product_purchase', $datarq);
        } else {
            $datarq['status'] = 1;
            $this->db->insert('product_purchase', $datarq);
        }



        $price             = $this->input->post('rate', true);
        $quantity            = $this->input->post('order_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        // $unit             = $this->input->post('unit', true);
        // $stock             = $this->input->post('stock', true);
        $warrenty_date             = $this->input->post('warrenty_date', true);
        // $expiry_date             = $this->input->post('expired_date', true);
        $item_total             = $this->input->post('row_total', true);
        // $unit             = $this->input->post('unit', true);
        $rq_details_id             = $this->input->post('rqsn_detail_id', true);

        $damaged_qty = $this->input->post('damaged_qty', TRUE);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            // $un  = $unit[$i];
            $product_id   = $p_id[$i];
            $rate = $price[$i];
            // $stk = $stock[$i];
            $item_warr = $warrenty_date[$i];
            // $item_expr = $expiry_date[$i];
            $per_item_total = $item_total[$i];
            $per_rq    = $rq_details_id[$i];



            $rqsn_details = array(
                'purchase_detail_id'     => 'RQ' . mt_rand(),
                // 'rqsn_id'     => $rqsn_id,
                'rqsn_details_id'   => $per_rq,
                'purchase_id'       => $purchase_id,
                'product_id'         => $product_id,
                'qty'                => $qty,
                'damaged_qty'        => $damaged_qty[$i],
                'rate'                => $rate,
                // 'stock'               => $stk,
                'warrenty_date'       => $item_warr,
                // 'expiry_date'         => $item_expr,
                'total_amount'          => $per_item_total,
                // 'unit'                => $un,
                'status'                => 1,

            );
            if (!empty($quantity)) {
                $this->db->insert('product_purchase_details', $rqsn_details);
            }
        }

        $createdate = date('Y-m-d H:i:s');
        $createby = $this->session->userdata('user_id');
        $receive_by = $createby;
        $receive_date = $createdate;


        $paidamount = $this->input->post('paid_amount', TRUE);
        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $tt_id = $this->input->post('tt_id', TRUE);
        $tt_bank_id = $this->input->post('tt_bank', TRUE);

        // echo '<pre>';
        // print_r($bank_id);
        // print_r($bkash_id);
        // print_r($tt_id);
        // print_r($tt_bank_id);




        // $bkash_id = $this->input->post('bkash_id', TRUE);
        // if (!empty($bkash_id)) {
        //     $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id)->get()->row()->bkash_no;

        //     $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bkashname)->get()->row()->HeadCode;
        // } else {
        //     $bkashcoaid = '';
        // }

        // $nagad_id = $this->input->post('nagad_id', TRUE);
        // if (!empty($nagad_id)) {
        //     $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id)->get()->row()->nagad_no;

        //     $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $nagadname)->get()->row()->HeadCode;
        // } else {
        //     $nagadcoaid = '';
        // }

        $purchasecoatran = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  $sup_coa->HeadCode,
            'Narration'      =>  'Supplier .' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $this->input->post('grand_total_price', TRUE),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );
        ///Inventory Debit
        $coscr = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory Debit For Supplier ' . $supinfo->supplier_name,
            'Debit'          =>  $this->input->post('grand_total_price', TRUE),
            'Credit'         =>  0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );

        // Expense for company
        $expense = array(
            'VNo'            => $purchase_id,
            'Vtype'          => 'Purchase',
            'VDate'          => $this->input->post('purchase_date', TRUE),
            'COAID'          => 402,
            'Narration'      => 'Company Credit For  ' . $supinfo->supplier_name,
            'Debit'          => $this->input->post('grand_total_price', TRUE),
            'Credit'         => 0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $cashinhand = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand For Supplier ' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $paidamount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        $this->db->insert('acc_transaction', $coscr);
        $this->db->insert('acc_transaction', $purchasecoatran);
        $this->db->insert('acc_transaction', $expense);

        $bank_count = 0;
        $bkash_count = 0;
        $nagad_count = 0;
        $tt_cash_count = 0;
        $tt_bank_count = 0;
        $tt_id_count = 0;
        $lc_no = $this->input->post('lc', TRUE);
        //lc to be addded


        $pay_type = $this->input->post('paytype', TRUE);
        $paid = $this->input->post('p_amount', TRUE);
        // echo "<pre>";print_r($paid);
        if (!empty($paid)) {
            for ($i = 0; $i < count($pay_type); $i++) {



                if ($pay_type[$i] == 1) {
                    $cc = array(

                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  1020101,
                        'Narration'      =>  'Cash in Hand for Purchase ID - ' . $purchase_id,
                        'Credit'         =>  $paid[$i],
                        'Debit'          =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );
                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => ''
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (cash in hand) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('purchase_payment', $data);
                        $this->db->insert('acc_transaction', $cc);
                    }
                }
                if ($pay_type[$i] == 4) {

                    // print_r($bank_id . " no\n");
                    if (!empty($bank_id)) {
                        $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                        $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                    } else {
                        $bankcoaid = '';
                    }

                    $bankc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Credit for company in bank for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at bank) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $bankc);
                        $this->db->insert('purchase_payment', $data);
                    }

                    $bank_count++;
                }
                if ($pay_type[$i] == 3) {

                    if (!empty($bkash_id)) {
                        $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id[$i])->get()->row()->bkash_no;

                        $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
                    } else {
                        $bkashcoaid = '';
                    }
                    $bkashc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $bkashcoaid,
                        'Narration'      =>  'Credit for company in bkash for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bkashname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at bKash) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $bkashc);
                        $this->db->insert('purchase_payment', $data);
                    }

                    $bkash_count++;
                }
                if ($pay_type[$i] == 5) {
                    if (!empty($nagad_id)) {
                        $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id[$i])->get()->row()->nagad_no;

                        $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
                    } else {
                        $nagadcoaid = '';
                    }

                    $nagadc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $nagadcoaid,
                        'Narration'      =>  'Credit for company in nagad for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $nagadname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at Nagad) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $nagadc);
                        $this->db->insert('purchase_payment', $data);
                    }
                    $nagad_count++;
                }

                if ($pay_type[$i] == 6) {
                    // for ($j = 0; $j < count($tt_id); $j++) {
                    if ($tt_id[$i] == 1) {
                        if (!empty($tt_bank_id)) {
                            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $tt_bank_id[$i])->get()->row()->bank_name;

                            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                        } else {
                            $bankcoaid = '';
                        }

                        $bankc = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $VDate,
                            'COAID'          =>  $bankcoaid,
                            'Narration'      =>  'Credit for company in bank (TT) for Purchase ID - ' . $purchase_id,
                            'Credit'         =>  $paid[$i],
                            'Debit'          =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $createby,
                            'CreateDate'     =>  $createdate,
                            'IsAppove'       =>  1,

                        );
                        // echo '<pre>';
                        // print_r($bankc);

                        $data = array(
                            'purchase_id'    => $purchase_id,
                            'pay_type'      => $pay_type[$i],
                            'pay_subtype'   => $tt_id[$i],
                            'amount'        => $paid[$i],
                            'account'       => $bankname
                        );


                        $supplierdebit = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $this->input->post('purchase_date', TRUE),
                            'COAID'          =>  $sup_coa->HeadCode,
                            'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' Cash at bank (TT) for Purchase Id - ' . $purchase_id,
                            'Debit'          =>  $paid[$i],
                            'Credit'         =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $receive_by,
                            'CreateDate'     =>  $receive_date,
                            'IsAppove'       =>  1
                        );
                        if ($paid[$i] > 0) {
                            $this->db->insert('acc_transaction', $supplierdebit);
                            $this->db->insert('acc_transaction', $bankc);
                            $this->db->insert('purchase_payment', $data);
                        }
                        $tt_bank_count++;
                    }
                    if ($tt_id[$i] == 2) {
                        $cc = array(

                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $VDate,
                            'COAID'          =>  1020101,
                            'Narration'      =>  'Cash in Hand (TT) for Purchase ID - ' . $purchase_id,
                            'Credit'         =>  $paid[$i],
                            'Debit'          =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $createby,
                            'CreateDate'     =>  $createdate,
                            'IsAppove'       =>  1,

                        );

                        $data = array(
                            'purchase_id'    => $purchase_id,
                            'pay_type'      => $pay_type[$i],
                            'pay_subtype'   => $tt_id[$i],
                            'amount'        => $paid[$i],
                            'account'       => ''
                        );

                        $supplierdebit = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $this->input->post('purchase_date', TRUE),
                            'COAID'          =>  $sup_coa->HeadCode,
                            'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' Cash in hand (TT) for Purchase Id - ' . $purchase_id,
                            'Debit'          =>  $paid[$i],
                            'Credit'         =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $receive_by,
                            'CreateDate'     =>  $receive_date,
                            'IsAppove'       =>  1
                        );

                        if ($paid[$i] > 0) {
                            $this->db->insert('acc_transaction', $supplierdebit);
                            $this->db->insert('acc_transaction', $cc);
                            $this->db->insert('purchase_payment', $data);
                        }
                    }
                }

                if ($pay_type[$i] == 7) {

                    $lc_liablities = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  503,
                        'Narration'      =>  'LC Liabilities Credit for purchase no. ' . $purchase_id . ', LC No. ' . $lc_no[$i],
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );
                    $this->db->insert('acc_transaction', $lc_liablities);


                    $data = array(
                        'lc_no'   => $lc_no[$i],
                        'purchase_id'   => $purchase_id,
                        'amount'        => $paid[$i],
                        'status'        => 1,
                    );

                    $this->db->insert('lc_list', $data);

                    /** Accounts (later) */
                }
            }
        }

        $this->db->where('rqsn_id', $po_id);
        $this->db->set('status', 5);
        $this->db->update('rqsn');
    }


    public function approve_rqsn_count()
    {
        $query = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('a.to_id', 'HK7TGDT69VFMXB7')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return $query;
    }



    public function approve_rqsn()
    {
        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Reports');
        ## Fetch records
        $records = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('a.to_id', 'HK7TGDT69VFMXB7')
            ->get()
            ->result();

        $sl = 1;





        foreach ($records as $record) {


            $stock = $CI->Reports->getCheckList(null, $record->product_id,'','')['central_stock'];


            $data[] = array(

                // 'cw_id'=>$record->to_id,

                'outlet_name' => $record->outlet_name,
                'date' => $record->date,
                'product_name' => $record->product_name,
                'sku' => $record->sku,
                'model'        => $record->product_model,
                'quantity' => $record->quantity,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id,
                'stok_quantity' => sprintf('%0.2f', $stock),

            );
        }
        ## Response


        return $data;
    }

    public function approve_rqsn_outlet_count()
    {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.to_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('c.user_id', $user_id)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return $query;
    }

    public function approve_rqsn_outlet()
    {

        ## Fetch records

        $user_id = $this->session->userdata('user_id');
        $records = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.to_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('c.user_id', $user_id)
            ->get()
            ->result();

        // $data = array();

        $sl = 1;





        foreach ($records as $record) {
            $stockin = $this->db->select('sum(quantity) as totalSalesQnty')->from('invoice_details')->where('product_id', $record->product_id)->get()->row();
            $warrenty_stock = $this->db->select('sum(ret_qty) as totalWarrentyQnty')->from('warrenty_return')->where('product_id', $record->product_id)->get()->row();
            //$wastage_stock = $this->db->select('sum(ret_qty) as totalWastageQnty')->from('warrenty_return')->where('product_id',$record->product_id,'usablity',3)->get()->row();
            $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,Avg(rate) as purchaseprice')->from('product_purchase_details')->where('product_id', $record->product_id)->get()->row();

            $outlet_name = $this->db->select('outlet_name')->from('outlet_warehouse')->where('outlet_id', $record->from_id)->get()->row();

            $this->db->select('a.*,c.*,d.*,SUM(a.a_qty) as total_purchase');
            $this->db->from('rqsn_details a');
            $this->db->join('rqsn c', 'a.rqsn_id=c.rqsn_id');
            $this->db->join('outlet_warehouse d', 'c.from_id=d.outlet_id');
            $this->db->where('a.product_id', $record->product_id);
            $this->db->where('d.user_id', $user_id);
            $total_purchase = $this->db->get()->row();

            $this->db->select('SUM(b.quantity) as total_sale');
            $this->db->from('invoice_details b');
            $this->db->join('invoice d', 'd.invoice_id=b.invoice_id');
            //  $this->db->join('outlet_warehouse c','c.outlet_id=d.sales_by');
            $this->db->where('b.product_id', $record->product_id);
            $this->db->where('d.sales_by', $user_id);
            $total_sale = $this->db->get()->row();
            $stock_r = $this->db->select('a.*,c.*,b.*,sum(a.a_qty) as totalQty')
                ->from('rqsn_details a')
                ->join('rqsn c', 'a.rqsn_id=c.rqsn_id')
                ->join('outlet_warehouse b', 'b.outlet_id=c.to_id')
                ->where('a.product_id', $record->product_id)
                ->where('b.outlet_id', $record->to_id)
                ->get()->row();


            $out_qty = (!empty($total_sale->total_sale) ? $total_sale->total_sale : 0) + (!empty($stock_r->totalQty) ? $stock_r->totalQty : 0);
            //  $out_qty=(!empty($stockin->totalSalesQnty)?$stockin->totalSalesQnty:0)+(!empty($stock_r->totalQty)?$stock_r->totalQty:0);
            //  $sprice = (!empty($record->price)?$record->price:0);
            // $pprice = (!empty($stockout->purchaseprice)?sprintf('%0.2f',$stockout->purchaseprice):0);
            // $stock =  (!empty($stockout->totalPurchaseQnty)?$stockout->totalPurchaseQnty:0)-$out_qty;
            $stock =  (!empty($total_purchase->total_purchase) ? $total_purchase->total_purchase : 0) - $out_qty;
            // $newStock=(!empty($warrenty_stock->totalWarrentyQnty)?$warrenty_stock->totalWarrentyQnty:0);



            $data[] = array(

                'outlet_name' => $outlet_name->outlet_name,
                'date' => $record->date,
                'product_name' => $record->product_name,
                'quantity' => $record->quantity,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id,
                'stok_quantity' => sprintf('%0.2f', $stock),

            );
        }

        ## Response


        return $data;
    }

    public function approve_chalan()
    {
        // $values = array("DV", "CV", "JV","Contra");

        return $approveinfo = $this->db->select('*,c.quantity as o_qty, x.damaged_qty')
            ->from('rqsn a')
            //->join('rqsn_details b','a.rqsn_id=b.rqsn_id')
            ->join('rqsn_details c', 'c.rqsn_id=a.rqsn_id')
            ->join('product_purchase_details x', 'x.rqsn_details_id=c.rqsn_detail_id')
            ->join('product_information d', 'd.product_id=c.product_id')
            ->join('size_list sz', 'd.size=sz.size_id', 'left')
            ->join('color_list cl', 'd.color=cl.color_id', 'left')
            ->where('c.status', 1)
            ->get()
            ->result();
    }


    public function rqsn_list()
    {
        // $values = array("DV", "CV", "JV","Contra");

        return $approveinfo = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 3)
            ->where('b.isaprv', 1)
            ->where('b.isrcv', 1)
            ->where('b.iscw', 1)
            ->where('a.to_id', 'HK7TGDT69VFMXB7')
            ->get()
            ->result();
    }

    public function rqsn_list_outlet()
    {
        $user_id = $this->session->userdata('user_id');
        $approveinfo = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.to_id')
            //  ->join('central_warehouse e','e.warehouse_id=a.to_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 3)
            ->where('b.isrcv', 1)
            ->where('b.iscw', 1)
            ->where('c.user_id', $user_id)
            ->get()
            ->result();



        foreach ($approveinfo as $record) {

            //            $cw=$this->db->select('*')
            //                ->from('rqsn a')
            //                ->join('central_warehouse b','a.to_id=b.warehouse_id')
            //                ->where('a.to_id',$record->to_id)
            //                ->get()
            //                ->row();

            $from = $this->db->select('*')
                ->from('rqsn a')
                ->join('outlet_warehouse b', 'a.from_id=b.outlet_id')
                ->join('central_warehouse e', 'e.warehouse_id=b.warehouse_id')
                ->where('a.from_id', $record->from_id)
                ->get()
                ->row();

            $to = $this->db->select('*')
                ->from('rqsn a')
                ->join('outlet_warehouse b', 'a.to_id=b.outlet_id')
                ->where('a.to_id', $record->to_id)
                ->get()
                ->row();

            $data[] = array(
                // 'cw'=>$cw->central_warehouse,
                'from_id' => $record->from_id,
                'to_id' => $record->to_id,
                'rqsn_id' => $record->rqsn_id,

                'from' => $to->outlet_name,
                'to' => $from->outlet_name,
                'date' => $record->date,
                'product_name' => $record->product_name,
                'a_qty' => $record->a_qty,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id


            );
        }



        return $data;
    }


    public function approve_rqsn_purchase()
    {
        // $values = array("DV", "CV", "JV","Contra");

        return $approveinfo = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            //->join('outlet_warehouse c','c.outlet_id=a.from_id')
            // ->join('product_information d', 'd.product_id=b.product_id')
            ->where('a.status', 1)
            ->where('b.status', 1)
            ->where('a.to_id', 3)
            ->group_by('a.purchase_order_no')
            ->order_by('a.purchase_order_no', 'desc')
            ->get()
            ->result();
    }

    public function rqsn_approval_edit_data($rqsn_id)
    {
        return $approveinfo = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            //->join('outlet_warehouse c','c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->join('central_warehouse e', 'e.warehouse_id=a.from_id')
            ->join('size_list sz', 'd.size=sz.size_id', 'left')
            ->join('color_list cl', 'd.color=cl.color_id', 'left')
            // ->join('supplier_information f', 'f.supplier_id=a.supplier_id')
            ->where('a.rqsn_id', $rqsn_id)
            ->where('b.status', 1)
            ->where('a.to_id', 3)
            ->get()
            ->result_array();
    }

    public function approve_outlet()
    {
        // $values = array("DV", "CV", "JV","Contra");
        $user_id = $this->session->userdata('user_id');
        $approveinfo = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            ->join('central_warehouse e', 'e.warehouse_id=a.to_id','left')
            ->join('product_information d', 'd.product_id=b.product_id')


            ->where('b.status', 2)
            // ->where('b.isaprv',1)
            ->where('c.user_id', $user_id)
            ->get()
            ->result();
        //echo '<pre>';print_r($approveinfo);exit();


        foreach ($approveinfo as $record) {

            $cw = $this->db->select('*')
                ->from('rqsn a')
                ->join('central_warehouse b', 'a.to_id=b.warehouse_id')
                ->where('a.to_id', $record->to_id)
                ->get()
                ->row();

            $from = $this->db->select('*')
                ->from('rqsn a')
                ->join('outlet_warehouse b', 'a.from_id=b.outlet_id')
                ->join('central_warehouse e', 'e.warehouse_id=b.warehouse_id')
                ->where('a.from_id', $record->from_id)
                ->get()
                ->row();

            $to = $this->db->select('*')
                ->from('rqsn a')
                ->join('outlet_warehouse b', 'a.to_id=b.outlet_id')
                ->where('a.to_id', $record->to_id)
                ->get()
                ->row();

            $data[] = array(
                'cw' => $cw->central_warehouse,
                'from_id' => $record->from_id,
                'to_id' => $record->to_id,
                'otlt_name' => $record->outlet_name,
                'from' => $to->outlet_name,
                'to' => $from->outlet_name,
                'date' => $record->date,
                'product_name' =>  '(' . $record->sku . ' )'.$record->product_name  ,
                'a_qty' => $record->a_qty,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id


            );
        }



        return $data;
    }

    public function return_rcv()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        // echo $outlet_id;exit();

        // $values = array("DV", "CV", "JV","Contra");
        $user_id = $this->session->userdata('user_id');
        $approveinfo = $this->db->select('*, SUM(a_qty) as a_qty')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id', 'left')
            ->join('central_warehouse e', 'e.warehouse_id=a.to_id', 'left')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.is_return', 1)
             ->where('b.isrcv',null)
            ->where('a.from_id', $outlet_id)
            ->group_by(array('b.product_id', 'b.rqsn_id'))
            ->get()
            ->result();

        // $approveinfo = $this->db->select('*,SUM(a_qty) as a_qty')
        //     ->from('rqsn a')
        //     ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
        //     ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
        //     ->join('central_warehouse e', 'e.warehouse_id=a.to_id', 'left')
        //     ->join('product_information d', 'd.product_id=b.product_id')
        //     ->where('b.status', 2)
        //     // ->where('b.isaprv',1)
        //     ->where('c.user_id', $user_id)
        //     ->group_by(array('b.product_id', 'b.rqsn_id'))
        //     ->get()
        //     ->result();
        // echo '<pre>';
        // print_r($approveinfo);
        // exit();


        foreach ($approveinfo as $record) {

            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $outlet_name = $this->db->select('central_warehouse')->from('central_warehouse')->where('warehouse_id', $outlet_id)->get()->row()->central_warehouse;
            } else {
                $outlet_name = $this->db->select('outlet_name')->from('outlet_warehouse')->where('outlet_id', $outlet_id)->get()->row()->outlet_name;
            }
            $cw = $this->db->select('*')
                ->from('rqsn a')
                ->join('central_warehouse b', 'a.to_id=b.warehouse_id')
                ->where('a.to_id', $record->to_id)
                ->or_where('a.from_id', $record->to_id)
                ->get()
                ->row();

            $from = $this->db->select('*')
                ->from('rqsn a')
                ->join('outlet_warehouse b', 'a.from_id=b.outlet_id')
                ->join('central_warehouse e', 'e.warehouse_id=b.warehouse_id')
                ->where('a.from_id', $record->from_id)
                ->get()
                ->row();

            $to = $this->db->select('*')
                ->from('rqsn a')
                ->join('outlet_warehouse b', 'a.to_id=b.outlet_id')
                ->where('a.to_id', $record->to_id)
                ->get()
                ->row();

            $data[] = array(
                'outlet_name' => $outlet_name,
                'outlet_id' => $outlet_id,
                'cw' => $cw->central_warehouse,
                'from_id' => $record->from_id,
                'to_id' => $record->to_id,
                'otlt_name' => $record->outlet_name,
                'from' => $to->outlet_name,
                'to' => $from->outlet_name,
                'date' => $record->date,
                'product_name' =>  '(' . $record->sku . ' )' . $record->product_name,
                'a_qty' => $record->a_qty,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id,
                'rqsn_id' => $record->rqsn_id,
                'product_id' => $record->product_id


            );
        }



        return $data;
    }


    public function approved($data = [])
    {
        $sup_price = $this->db->select('a.supplier_price')
            ->from('supplier_product a')
            ->join('product_information c', 'c.product_id = a.product_id')
            ->join('rqsn_details b', 'b.product_id = a.product_id')
            ->where('b.rqsn_detail_id', $data['rqsn_detail_id'])
            ->get()
            ->result_array();

        $inv_price = $sup_price[0]['supplier_price'] * $data['a_qty'];

        $det = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'b.rqsn_id = a.rqsn_id')
            ->where('b.rqsn_detail_id', $data['rqsn_detail_id'])
            ->join('outlet_warehouse o', 'o.outlet_id = a.from_id')
            ->get()
            ->result_array();

        // echo '<pre>';
        // print_r($det);
        // exit();

        $cntrcr = array(
            'VNo'            =>  $det[0]['rqsn_id'],
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory Debit For Outlet ' . $det[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $inv_price,
            'IsPosted'       => 1,
            'CreateBy'       => $det[0]['user_id'],
            'CreateDate'     => date('Y-m-d'),
            'IsAppove'       => 1
        );

        $outdr = array(
            'VNo'            =>  $det[0]['rqsn_id'],
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory Credit',
            'Debit'          =>  $inv_price,
            'Credit'         =>  0,
            'IsPosted'       => 1,
            'CreateBy'       => $det[0]['user_id'],
            'CreateDate'     => date('Y-m-d'),
            'IsAppove'       => 1
        );

        $this->db->insert('acc_transaction', $outdr);
        $this->db->insert('acc_transaction', $cntrcr);




        return $this->db->where('rqsn_detail_id', $data['rqsn_detail_id'])
            ->update('rqsn_details', $data);
    }

    public function chalan_received($data = [])
    {
        return $this->db->where('chalan_id', $data['chalan_id'])
            ->update('product_purchase_details', $data);
    }

    public function received($data = [])
    {
        return $this->db->where('rqsn_detail_id', $data['rqsn_detail_id'])
            ->update('rqsn_details', $data);
    }

    public function delete_rqsn($rqsn_id)
    {
        $this->db->where('rqsn_detail_id', $rqsn_id)
            ->delete('rqsn_details');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function r_delete_rqsn($rqsn_id)
    {
        $this->db->where('rqsn_id', $rqsn_id)
            ->delete('rqsn');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }



    public function retrieve_rqsn_editdata($req_id)
    {
        $this->db->select('a.*,b.*,c.*,d.*');
        $this->db->from('rqsn a');
        //    $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->join('rqsn_details b', 'b.rqsn_id = a.rqsn_id');
        $this->db->join('outlet_warehouse d', 'd.outlet_id = a.from_id');
        //
        $this->db->join('product_information c', 'c.product_id = b.product_id');
        $this->db->where('a.rqsn_id', $req_id);
        $this->db->group_by('c.product_id');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function outlet_stock($postData = null, $post_product_id = null,$from_date=null,$to_date=null, $value = null)
    {
        $this->load->model('suppliers');
        $this->load->model('warehouse');
        $response = array();


        $outlet_id = $this->warehouse->get_outlet_user()[0]['outlet_id'];

//        echo $outlet_id;
//        exit();

        if ($from_date == null){
            $date = date('Y-m-d');
            $op_date = date( 'Y-m-d', strtotime( $date . ' -1 day' ) );

        }else{
            $op_date = date( 'Y-m-d', strtotime( $from_date . ' -1 day' ) );

        }

        $product_sku = $this->input->post('product_sku', TRUE);

        $cat_id = $this->input->post('cat_id', TRUE);


        ## Read value
        if (!$post_product_id) {

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
                $searchQuery = " (d.product_name like '%" . $searchValue . "%' or d.product_model like '%" . $searchValue . "%'  or d.sku like '%" . $searchValue . "%') ";
            }

            ## Total number of records without filtering
            $this->db->select('count(*) as allcount');
            $this->db->from('product_information d');
//            $this->db->join('rqsn_details b', 'd.product_id=b.product_id','left');
//            $this->db->join('rqsn c', 'b.rqsn_id=c.rqsn_id','left');
          //  $this->db->where('c.from_id', $outlet_id);
            if ($product_sku != '') {
                $this->db->where_in('d.sku', $product_sku);
            }



            if (isset($cat_id) && $cat_id != '') {
                $this->db->like('d.category_id', $cat_id,'both');
            }
            if ($searchValue != '') {
                $this->db->where($searchQuery);
            }

//                for ($i = 0, $ien = count($product_sku); $i < $ien; $i++) {
//                    $this->db->or_where('d.sku',$product_sku[$i]);
//                }

            $this->db->group_by('d.product_id');
            $records = $this->db->get()->num_rows();
            $totalRecords = $records;

            ## Total number of record with filtering
            $this->db->select('count(*) as allcount');
            $this->db->from('product_information d');
//            $this->db->join('rqsn_details b', 'd.product_id=b.product_id','left');
//            $this->db->join('rqsn c', 'b.rqsn_id=c.rqsn_id','left');
            //$this->db->where('c.from_id', $outlet_id);
            if ($product_sku != '') {
                $this->db->where_in('d.sku', $product_sku);
            }
           if (isset($cat_id) && $cat_id != '') {
                $this->db->like('d.category_id', $cat_id,'both');
              }
            if ($searchValue != '') {
                $this->db->where($searchQuery);
            }

//                for ($i = 0, $ien = count($product_sku); $i < $ien; $i++) {
//                    $this->db->or_where('d.sku',$product_sku[$i]);
//                }


            $this->db->group_by('d.product_id');
            $records = $this->db->get()->num_rows();
            $totalRecordwithFilter = $records;
        }
        ## Fetch records
        $this->db->select("*");
//        $this->db->from('rqsn a');
//        $this->db->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id');
//        $this->db->join('product_information d', 'd.product_id=b.product_id');

        $this->db->from('product_information d');
//        $this->db->join('rqsn_details b', 'd.product_id=b.product_id','left');
//        $this->db->join('rqsn a', 'b.rqsn_id=a.rqsn_id','left');

//        $this->db->where('b.status', 3);
//        $this->db->where('b.isrcv', 1);
//        $this->db->where('a.from_id', $outlet_id);

        if ($product_sku != '') {
            $this->db->where_in('d.sku', $product_sku);
        }

        if (!$post_product_id && $searchValue != '')
            $this->db->where($searchQuery);

        if ($post_product_id) {
            $this->db->where('d.product_id', $post_product_id);
        }

        if (isset($cat_id) && $cat_id != '') {
            $this->db->like('d.category_id', $cat_id,'both');
        }

//            for ($i = 0, $ien = count($product_sku); $i < $ien; $i++) {
//                $this->db->or_where('d.sku',$product_sku[$i]);
//            }


        if (!$post_product_id) {
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->group_by('d.product_id');
            $this->db->limit($rowperpage, $start);
        }


        $records = $this->db->get()->result();
        $data = array();

        $sl = 1;



        $closing_inventory = '';


        foreach ($records as $record) {

            $production_cost = $this->db->select('avg(production_cost) as cost')->from('production_cost a')->where('a.product_id', $record->product_id)->get()->row();
            $production_price = (!empty($production_cost->cost) ? sprintf('%0.2f', $production_cost->cost) : 0);

            $stockin = $this->db->select('sum(a.quantity) as totalSalesQnty')
                ->from('invoice_details a')
                ->join('invoice d', 'd.invoice_id=a.invoice_id')
                ->where('a.product_id', $record->product_id)
                ->where('d.outlet_id', $outlet_id)
                ->get()
                ->row();

            $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,Avg(rate) as purchaseprice')->from('product_purchase_details')->where('product_id', $record->product_id)->get()->row();

            $product_supplier_price = $this->suppliers->pr_supp_price($record->product_id);


            $sprice = (!empty($record->price) ? $record->price : 0);
            $pprice = (!empty($stockout->purchaseprice) ? sprintf('%0.2f', $stockout->purchaseprice) : 0);
           // $stock =  (!empty($stockout->totalPurchaseQnty) ? $stockout->totalPurchaseQnty : 0) - (!empty($stockin->totalSalesQnty) ? $stockin->totalSalesQnty : 0);



            $return_given = $this->db->select('sum(a.ret_qty) as totalReturnQnty')
                ->from('rqsn_return a')
                ->where('a.product_id', $record->product_id)
                ->where('a.from_id', $outlet_id)
                ->get()
                ->row();

            if ($from_date)
                $this->db->where('c.date >=', $from_date);
            if ($to_date)
                $this->db->where('c.date <=', $to_date);
            $this->db->select('a.*,c.*,,SUM(a.a_qty) as total_purchase');
            $this->db->from('rqsn_details a');
            $this->db->join('rqsn c', 'a.rqsn_id=c.rqsn_id');
            // $this->db->join('outlet_warehouse d', 'c.from_id=d.outlet_id');
            $this->db->where('a.product_id', $record->product_id);
            $this->db->where('c.from_id', $outlet_id);
            $this->db->where('a.isaprv', 1);
            $this->db->where('a.isrcv', 1);
            $total_purchase = $this->db->get()->row();



            if ($from_date)
                $this->db->where('d.date >=', $from_date);
            if ($to_date)
                $this->db->where('d.date <=', $to_date);
            $this->db->select('SUM(b.quantity) as total_sale');
            $this->db->from('invoice_details b');
            $this->db->join('invoice d', 'd.invoice_id=b.invoice_id');
            $this->db->where('b.product_id', $record->product_id);
            $this->db->where('d.outlet_id', $outlet_id);
            $this->db->where('b.pre_order', 1);
            $total_sale = $this->db->get()->row();

            $out_qty = (!empty($total_sale->total_sale) ? $total_sale->total_sale : 0);



            if ($from_date)
                $this->db->where('a.create_date >=', $from_date);
            if ($to_date)
                $this->db->where('a.create_date <=', $to_date);

            $phy_count = $this->db->select('SUM(a.difference) as phy_qty')
                ->from('stock_taking_details a')
                ->join('stock_taking b', 'b.stid = a.stid','left')
                ->where(array(
                    'b.outlet_id' =>$outlet_id,
                    'a.product_id' => $record->product_id,
                    'a.status' => 1,

                ))
                ->group_by('a.product_id')
                ->order_by('a.id','desc')
                ->get()
                ->row();

//            echo '<pre>';print_r($outlet_id);
//            echo '<pre>';print_r($phy_count);
            $diff = (!empty($phy_count->phy_qty) ? $phy_count->phy_qty : 0);

            $stock =  ((!empty($total_purchase->total_purchase) ? $total_purchase->total_purchase : 0) - $out_qty)+$diff;


            //echo '<pre>';print_r($diff);
            /************************
             *  Opening Stock Start *
             * **********************/
            if ($from_date) {
                $this->db->where('d.date <=', $op_date);
                $stockin = $this->db->select('sum(a.quantity) as totalSalesQnty')
                    ->from('invoice_details a')
                    ->join('invoice d', 'd.invoice_id=a.invoice_id')
                    ->where('a.product_id', $record->product_id)
                    ->where('d.outlet_id', $outlet_id)
                    ->get()
                    ->row();

                $this->db->where('product_purchase.purchase_date <=', $op_date);
                $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,Avg(rate) as purchaseprice')
                    ->from('product_purchase_details')
                    ->join('product_purchase', 'product_purchase.purchase_id = product_purchase_details.purchase_id')
                    ->where('product_id', $record->product_id)
                    ->get()
                    ->row();

                $product_supplier_price = $this->suppliers->pr_supp_price($record->product_id);


                $sprice = (!empty($record->price) ? $record->price : 0);
                $pprice = (!empty($stockout->purchaseprice) ? sprintf('%0.2f', $stockout->purchaseprice) : 0);
                $stock =  (!empty($stockout->totalPurchaseQnty) ? $stockout->totalPurchaseQnty : 0) - (!empty($stockin->totalSalesQnty) ? $stockin->totalSalesQnty : 0);



                $return_given = $this->db->select('sum(a.ret_qty) as totalReturnQnty')
                    ->from('rqsn_return a')
                    ->where('a.product_id', $record->product_id)
                    ->where('a.from_id', $outlet_id)
                    ->get()
                    ->row();

                $this->db->where('c.date <=', $op_date);
                $this->db->select('a.*,c.*,,SUM(a.a_qty) as total_purchase');
                $this->db->from('rqsn_details a');
                $this->db->join('rqsn c', 'a.rqsn_id=c.rqsn_id');
                // $this->db->join('outlet_warehouse d', 'c.from_id=d.outlet_id');
                $this->db->where('a.product_id', $record->product_id);
                $this->db->where('c.from_id', $outlet_id);
                $this->db->where('a.isaprv', 1);
                $this->db->where('a.isrcv', 1);
                $opening_total_purchase = $this->db->get()->row();

                $this->db->where('d.date <=', $op_date);
                $this->db->select('SUM(b.quantity) as total_sale');
                $this->db->from('invoice_details b');
                $this->db->join('invoice d', 'd.invoice_id=b.invoice_id');
                $this->db->where('b.product_id', $record->product_id);
                $this->db->where('d.outlet_id', $outlet_id);
                $opening_total_sale = $this->db->get()->row();

                $opening_out_qty = (!empty($opening_total_sale->total_sale) ? $opening_total_sale->total_sale : 0);

                $this->db->where('a.create_date <=', $op_date);
                $phy_count = $this->db->select('SUM(a.difference) as phy_qty')
                    ->from('stock_taking_details a')
                    ->join('stock_taking b', 'b.stid = a.stid')
                    ->where(array(
                        'b.outlet_id' =>$outlet_id,
                        'a.product_id' => $record->product_id,
                        'a.status' => 1,

                    ))
                    ->group_by('a.product_id')
                    ->order_by('a.id','desc')
                    ->get()
                    ->row();
                $diff = (!empty($phy_count->phy_qty) ? $phy_count->phy_qty : 0);
                $opening_stock =  ((!empty($opening_total_purchase->total_purchase) ? $opening_total_purchase->total_purchase : 0) - $opening_out_qty)+$diff;


            } else {
                $opening_stock = $stock;
            }

            // Opening stock end



            /************************
             *  Closing Stock Start *
             * **********************/

            if ($to_date) {
                $this->db->where('d.date <=', $to_date);
                $stockin = $this->db->select('sum(a.quantity) as totalSalesQnty')
                    ->from('invoice_details a')
                    ->join('invoice d', 'd.invoice_id=a.invoice_id')
                    ->where('a.product_id', $record->product_id)
                    ->where('d.outlet_id', $outlet_id)
                    ->get()
                    ->row();

                $this->db->where('product_purchase.purchase_date <=', $to_date);
                $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,Avg(rate) as purchaseprice')
                    ->from('product_purchase_details')
                    ->join('product_purchase', 'product_purchase.purchase_id = product_purchase_details.purchase_id')
                    ->where('product_id', $record->product_id)
                    ->get()
                    ->row();

                $product_supplier_price = $this->suppliers->pr_supp_price($record->product_id);


                $sprice = (!empty($record->price) ? $record->price : 0);
                $pprice = (!empty($stockout->purchaseprice) ? sprintf('%0.2f', $stockout->purchaseprice) : 0);
                $stock =  (!empty($stockout->totalPurchaseQnty) ? $stockout->totalPurchaseQnty : 0) - (!empty($stockin->totalSalesQnty) ? $stockin->totalSalesQnty : 0);



                $return_given = $this->db->select('sum(a.ret_qty) as totalReturnQnty')
                    ->from('rqsn_return a')
                    ->where('a.product_id', $record->product_id)
                    ->where('a.from_id', $outlet_id)
                    ->get()
                    ->row();

                $this->db->where('c.date <=', $to_date);
                $this->db->select('a.*,c.*,,SUM(a.a_qty) as total_purchase');
                $this->db->from('rqsn_details a');
                $this->db->join('rqsn c', 'a.rqsn_id=c.rqsn_id');
                // $this->db->join('outlet_warehouse d', 'c.from_id=d.outlet_id');
                $this->db->where('a.product_id', $record->product_id);
                $this->db->where('c.from_id', $outlet_id);
                $this->db->where('a.isaprv', 1);
                $this->db->where('a.isrcv', 1);
                $closing_total_purchase = $this->db->get()->row();

                $this->db->where('d.date <=', $to_date);
                $this->db->select('SUM(b.quantity) as total_sale');
                $this->db->from('invoice_details b');
                $this->db->join('invoice d', 'd.invoice_id=b.invoice_id');
                $this->db->where('b.product_id', $record->product_id);
                $this->db->where('d.outlet_id', $outlet_id);
                $closing_total_sale = $this->db->get()->row();

                $this->db->where('a.create_date <=', $to_date);
                $phy_count = $this->db->select('SUM(a.difference) as phy_qty')
                    ->from('stock_taking_details a')
                    ->join('stock_taking b', 'b.stid = a.stid')
                    ->where(array(
                        'b.outlet_id' =>$outlet_id,
                        'a.product_id' => $record->product_id,
                        'a.status' => 1,

                    ))
                    ->group_by('a.product_id')
                    ->order_by('a.id','desc')
                    ->get()
                    ->row();
                $closing_out_qty = (!empty($closing_total_sale->total_sale) ? $closing_total_sale->total_sale : 0);
                $diff = (!empty($phy_count->phy_qty) ? $phy_count->phy_qty : 0);
                $closing_stock =  ((!empty($closing_total_purchase->total_purchase) ? $closing_total_purchase->total_purchase : 0) - $closing_out_qty)+$diff;


            } else {
                $closing_stock = $stock;
            }
            
            // Closing stock end
            if ($value == 1) {
               
                if ($closing_stock > 0) {
                        $data[] = array(
                            'sl'            =>   $sl,
                            'product_name'  =>  $record->product_name,
                            'product_model' =>  $record->product_model,
                            // 'production_cost'  => $production_price,
                            'product_type'  =>  $record->finished_raw,
                            'sales_price'   =>  sprintf('%0.2f', $sprice),
                            // 'purchase_p'    =>  $pprice,
                            'sku'          => $record->sku,
                            'category'  => (!empty($record->category_name) ? $record->category_name : ''),
                            'totalPurchaseQnty' => sprintf('%0.2f', $total_purchase->total_purchase),
                            'totalSalesQnty' => sprintf('%0.2f', $out_qty),
                            'dispatch' => $total_sale->total_sale,
                            'return_given' => sprintf('%0.2f', $return_given->totalReturnQnty),
                            'stok_quantity' => sprintf('%0.2f', $closing_stock),
                            'opening_stock' => $opening_stock,
                            'closing_stock' => $closing_stock,
                            'total_sale_price' => ($closing_stock) * $sprice,
                            'purchase_total' => (($closing_stock * $pprice) != 0)
                                ? ($closing_stock * $pprice)
                                : ($production_price
                                    ? $production_price * $closing_stock
                                    : 0),

                            'opening_inventory' => (($opening_stock * $pprice) != 0)
                                ? ($opening_stock * $pprice)
                                : ($product_supplier_price
                                    ? $production_price * $opening_stock
                                    : 0),

                        );
                        $sl++;
                    }
               }
                if ($value == 0) {
                    if ($closing_stock < 1) {
                        $data[] = array(
                            'sl'            =>   $sl,
                            'product_name'  =>  $record->product_name,
                            'product_model' =>  $record->product_model,
                            // 'production_cost'  => $production_price,
                            'product_type'  =>  $record->finished_raw,
                            'sales_price'   =>  sprintf('%0.2f', $sprice),
                            // 'purchase_p'    =>  $pprice,
                            'sku'          => $record->sku,
                            'category'  => (!empty($record->category_name) ? $record->category_name : ''),
                            'totalPurchaseQnty' => sprintf('%0.2f', $total_purchase->total_purchase),
                            'totalSalesQnty' => sprintf('%0.2f', $out_qty),
                            'dispatch' => $total_sale->total_sale,
                            'return_given' => sprintf('%0.2f', $return_given->totalReturnQnty),
                            'stok_quantity' => sprintf('%0.2f', $closing_stock),
                            'opening_stock' => $opening_stock,
                            'closing_stock' => $closing_stock,
                            'total_sale_price' => ($closing_stock) * $sprice,
                            'purchase_total' => (($closing_stock * $pprice) != 0)
                                ? ($closing_stock * $pprice)
                                : ($production_price
                                    ? $production_price * $closing_stock
                                    : 0),

                            'opening_inventory' => (($opening_stock * $pprice) != 0)
                                ? ($opening_stock * $pprice)
                                : ($product_supplier_price
                                    ? $production_price * $opening_stock
                                    : 0),

                        );
                        $sl++;
                    }
                }
                if ($value == 2) {
                    $data[] = array(
                        'sl'            =>   $sl,
                        'product_name'  =>  $record->product_name,
                        'product_model' =>  $record->product_model,
                        // 'production_cost'  => $production_price,
                        'product_type'  =>  $record->finished_raw,
                        'sales_price'   =>  sprintf('%0.2f', $sprice),
                        // 'purchase_p'    =>  $pprice,
                        'sku'          => $record->sku,
                        'category'  => (!empty($record->category_name) ? $record->category_name : ''),
                        'totalPurchaseQnty' => sprintf('%0.2f', $total_purchase->total_purchase),
                        'totalSalesQnty' => sprintf('%0.2f', $out_qty),
                        'dispatch' => $total_sale->total_sale,
                        'return_given' => sprintf('%0.2f', $return_given->totalReturnQnty),
                        'stok_quantity' => sprintf('%0.2f', $closing_stock),
                        'opening_stock' => $opening_stock,
                        'closing_stock' => $closing_stock,
                        'total_sale_price' => ($closing_stock) * $sprice,
                        'purchase_total' => (($closing_stock * $pprice) != 0)
                            ? ($closing_stock * $pprice)
                            : ($production_price
                                ? $production_price * $closing_stock
                                : 0),

                        'opening_inventory' => (($opening_stock * $pprice) != 0)
                            ? ($opening_stock * $pprice)
                            : ($product_supplier_price
                                ? $production_price * $opening_stock
                                : 0),

                    );
                    $sl++;
                }

            //$closing_inventory = array_sum(array_column($data, 'purchase_total'));
     }
        $opening_finished= 0;
        $opening_raw= 0;
        $opening_tools= 0;

        $closing_finished= 0;
        $closing_raw= 0;
        $closing_tools= 0;


        foreach($data as $key => $value){

            if($value['product_type'] == 1) {
                $opening_finished+= $value['opening_inventory'];
                $closing_finished+= $value['purchase_total'];
            }
            if($value['product_type'] == 2) {
                $opening_raw+= $value['opening_inventory'];
                $closing_raw+= $value['purchase_total'];
            }
            if($value['product_type'] == 3) {
                $opening_tools+= $value['opening_inventory'];
                $closing_tools+= $value['purchase_total'];
            }
        }

        // print_r($data);
        // exit();
        ## Response
        if (!$post_product_id) {

            $response = array(
                "draw" => intval($draw),
                "iTotalRecords" => $totalRecordwithFilter,
                "iTotalDisplayRecords" => $totalRecords,
                "aaData" => $data,
                "closing_inventory"     => $closing_inventory,
                "opening_finished" => $opening_finished,
                "opening_raw" => $opening_raw,
                "opening_tools" => $opening_tools,

                "closing_finished" => $closing_finished,
                "closing_raw" => $closing_raw,
                "closing_tools" => $closing_tools,
            );
        } else {
            $response = array(
                "draw" => intval($draw),
                "outlet_stock"     => sprintf('%0.2f', $stock)
            );
        }

        return $response;
    }

    public function expiry_outlet_stock($post_product_id = null, $is_exp = null)
    {
        $this->load->library('occational');
        $this->load->model('suppliers');
        $this->load->model('warehouse');
        $response = array();


        $outlet_id = $this->warehouse->get_outlet_user()[0]['outlet_id'];

        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);


        $product_sku = $this->input->post('product_sku', TRUE);

        $cat_id = $this->input->post('cat_id', TRUE);

        $date = date('Y-m-d');

        ## Read value

        ## Fetch records
        $this->db->select("*");
        $this->db->from('product_purchase_details p');
        $this->db->join('product_information b', 'p.product_id=b.product_id', 'left');
        $this->db->join('cats c', 'b.category_id=c.id', 'left');
        $this->db->order_by('p.id', 'asc');

        if ($is_exp == 2) {
            $this->db->where('p.expired_date <', $date);
        } else {
            $this->db->where('p.expired_date >=', $date);
        }


        if ($product_sku != '') {
            $this->db->where_in('d.sku', $product_sku);
        }


        if ($post_product_id) {
            $this->db->where('b.product_id', $post_product_id);
        }

        if (isset($cat_id) && $cat_id != '') {
            $this->db->like('b.category_id', $cat_id, 'both');
        }

        if ($from_date) {
            $this->db->where('p.expired_date >=', $from_date);
        }
        if ($to_date) {
            $this->db->where('p.expired_date <=', $to_date);
        }




        $records = $this->db->get()->result();
        $data = array();

        $sl = 1;

        $expired_stock = 0;



        foreach ($records as $record) {

            $production_cost = $this->db->select('avg(production_cost) as cost')->from('production_cost a')->where('a.product_id', $record->product_id)->get()->row();
            $production_price = (!empty($production_cost->cost) ? sprintf('%0.2f', $production_cost->cost) : 0);

            if ($from_date) {
                $this->db->where('product_purchase.purchase_date >=', $from_date);
            }
            if ($to_date) {
                $this->db->where('product_purchase.purchase_date <=', $to_date);
            }
            $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,sum(damaged_qty) as damaged_qty,Avg(rate) as purchaseprice')
                ->join('product_purchase', 'product_purchase.purchase_id = product_purchase_details.purchase_id')
                ->from('product_purchase_details')
                ->where('product_purchase.outlet_id', $outlet_id)
                ->where(array('product_purchase_details.product_id' => $record->product_id, 'product_purchase_details.purchase_id' => $record->purchase_id))
                ->get()->row();

            $sprice = (!empty($record->price) ? $record->price : 0);
            $pprice = (!empty($stockout->purchaseprice) ? sprintf('%0.2f', $stockout->purchaseprice) : 0);


            $return_given = $this->db->select('sum(a.a_qty) as totalReturnQnty')
                ->from('rqsn_details a')
                ->join('rqsn c', 'c.rqsn_id = a.rqsn_id')
                ->where('c.to_id', $outlet_id)
                ->where('a.isaprv', 1)
                ->where('a.isrcv', 1)
                ->where('a.is_return', 2)
                ->where(array('a.product_id' => $record->product_id, 'a.purchase_id' => $record->purchase_id))
                ->get()
                ->row();


            $this->db->select('a.*,c.*,,SUM(a.a_qty) as total_purchase');
            $this->db->from('rqsn_details a');
            $this->db->join('rqsn c', 'a.rqsn_id=c.rqsn_id');
            // $this->db->join('outlet_warehouse d', 'c.from_id=d.outlet_id');
            $this->db->where(array('a.product_id' => $record->product_id, 'a.purchase_id' => $record->purchase_id));
            $this->db->where('c.from_id', $outlet_id);
            $this->db->where('a.isaprv', 1);
            $this->db->where('a.isrcv', 1);
            $this->db->where('a.is_return', 0);
            $total_purchase = $this->db->get()->row();


            $this->db->select('SUM(b.quantity) as total_sale');
            $this->db->from('invoice_details b');
            $this->db->join('invoice d', 'd.invoice_id=b.invoice_id');
            $this->db->where(array('b.product_id' => $record->product_id, 'b.purchase_id' => $record->purchase_id));
            $this->db->where('d.outlet_id', $outlet_id);
            $this->db->where('b.pre_order', 1);
            $total_sale = $this->db->get()->row();

            $out_qty = (!empty($total_sale->total_sale) ? $total_sale->total_sale : 0);




            $phy_count = $this->db->select('SUM(a.difference) as phy_qty')
                ->from('stock_taking_details a')
                ->join('stock_taking b', 'b.stid = a.stid', 'left')
                ->where(array(
                    'b.outlet_id' => $outlet_id,
                    'a.product_id' => $record->product_id,
                    'a.status' => 1,

                ))
                ->group_by('a.product_id')
                ->order_by('a.id', 'desc')
                ->get()
                ->row();

            $diff = (!empty($phy_count->phy_qty) ? $phy_count->phy_qty : 0);
            $return_product = (!empty($return_given->totalReturnQnty) ? $return_given->totalReturnQnty : 0);

            $stock =  ((!empty($total_purchase->total_purchase) ? $total_purchase->total_purchase : 0) + (!empty($stockout->totalPurchaseQnty) ? $stockout->totalPurchaseQnty : 0) - $out_qty - $return_product) + $diff;


            $expired_stock += $stock;
            $date_now = new DateTime();
            $expired_date   = new DateTime($record->expired_date);
            if ($date_now > $expired_date) {
                $expiry_status = '<span class="label label-danger ">Expired</span>';
            } else {
                $expiry_status = '<span class="label label-success ">Available</span>';
            }





            if ($stock > 0) {
                $data[] = array(
                    'sl'            =>   $sl,
                    'product_name'  =>  $record->product_name_bn,
                    'expiry_status'  =>  $expiry_status,
                    'purchase_id'  =>  $record->purchase_id,
                    'expiry_date'  =>  $this->occational->dateConvert($record->expired_date),
                    'expired_date'  =>  $record->expired_date,
                    'product_type'  =>  $record->finished_raw,
                    'production_cost'  => $production_price,
                    'product_model' => ($record->product_model ? $record->product_model : ''),
                    'category' => ($record->name ? $record->name : ''),
                    'sku' => ($record->sku ? $record->sku : ''),
                    'sales_price'   =>  sprintf('%0.2f', $sprice),
                    'purchase_p'    =>  $pprice,
                    //                    'damagedQnty'   => $stockout->damaged_qty,
                    'stok_quantity' => sprintf('%0.2f', $stock),

                    'total_sale_price' => $stock * $sprice,

                    'totalPurchaseQnty' => sprintf('%0.2f', $total_purchase->total_purchase),
                    'totalSalesQnty' => sprintf('%0.2f', $out_qty),
                    'dispatch' => $total_sale->total_sale,
                    'return_given' => sprintf('%0.2f', $return_product),

                    'closing_stock' => $stock,



                );
            }

            $sl++;
        }



        $response = array(
            "expired_stock" => $expired_stock,
            "aaData" => $data,
            "outlet_stock"     => sprintf('%0.2f', $stock)
        );


        return $response;
    }



    // customer information
    public function customer_info($customer_id)
    {
        return $this->db->select('*')
            ->from('customer_information')
            ->where('customer_id', $customer_id)
            ->get()
            ->row();
    }




    public function employees()
    {
        $this->db->select('*');
        $this->db->from('employee_history');
        $query = $this->db->get();
        $data = $query->result();

        $list[''] = 'Select Employee';
        if (!empty($data)) {
            foreach ($data as $value) {
                $list[$value->id] = $value->first_name . ' ' . $value->last_name;
            }
        }
        return $list;
    }



    public function get_purhcase_rqsn()
    {
        $query = $this->db->select('*, a.status as st')
            ->from('rqsn a')
            ->where('a.from_id', 'HK7TGDT69VFMXB7')
            ->where('a.to_id', '3')
            ->join('central_warehouse b', 'b.warehouse_id = a.from_id')
            ->order_by('a.date', 'desc')
            ->get();
        return $query->result_array();
    }

    public function get_rqsn_details($rqsn_id)
    {
        $query = $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'b.rqsn_id = a.rqsn_id')
            ->join('product_information c', 'c.product_id = b.product_id')
            ->where('a.rqsn_id', $rqsn_id)
            ->order_by('a.date', 'desc')
            ->get();

        return $query->result_array();
    }

    public function get_outlet_rqsn()
    {
        $query = $this->db->select('*')
            ->from('rqsn a')
            ->where('a.to_id', 'HK7TGDT69VFMXB7')
            ->join('outlet_warehouse b', 'b.outlet_id = a.from_id')
            ->order_by('a.date', 'desc')
            ->get();
        return $query->result_array();
    }

    public function get_outlet_rqsn_details($rqsn_id)
    {
        $query = $this->db->select('*, b.status as item_status')
            ->from('rqsn a')
            ->join('rqsn_details b', 'b.rqsn_id = a.rqsn_id')
            ->join('product_information c', 'c.product_id = b.product_id')
            ->where('a.rqsn_id', $rqsn_id)
            ->order_by('a.date', 'desc')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_recieved_item_rqsn($rqsn_id)
    {
        $this->load->model('products');

        $query = $this->db->select('*, b.status as item_status')
            ->from('rqsn a')
            ->join('rqsn_details b', 'b.rqsn_id = a.rqsn_id')
            ->join('product_information c', 'c.product_id = b.product_id')
            ->where('a.rqsn_id', $rqsn_id)
            ->where('b.isrcv', 1)
            ->order_by('a.date', 'desc')
            ->get();

        // echo '<pre>';
        // print_r($query->result_array());
        // exit();

        if ($query->num_rows() > 0) {
            $query =  $query->result_array();
            foreach ($query as $k => $v) {
                $pr_id = $query[$k]['product_id'];

                $pr_all_details = $this->products->get_single_pr_details($pr_id)[0];

                $query[$k]['pr_details'] = html_escape($pr_all_details['product_name'] . '(' . $pr_all_details['product_model'] . ')' . '(' . $pr_all_details['color_name'] . ')' . '(' . $pr_all_details['size_name'] . ')' . '(' . $pr_all_details['category_name'] . ')');
            }

            return $query;
        }
        return false;
    }

    public function transfer_count($outlet_id)
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('rqsn a');
        $this->db->join('rqsn_details b', 'b.rqsn_id=a.rqsn_id');
        $this->db->where('a.to_id != 3');
        $this->db->where('b.status', 3);

        if ($outlet_id) {
            $this->db->group_start()
                ->where('a.from_id', $outlet_id)
                ->or_where('a.to_id', $outlet_id)
                ->group_end();
        }

        $records = $this->db->get()->result();

        return $records;
    }

    public function get_rqsn_transfer($rqsn_id = null, $outlet_id = null, $limit = null)
    {
        $this->load->model('warehouse');
        $this->db->select('a.*, b.*, sz.size_name,x.first_name,x.last_name, cl.color_name, d.product_name, d.product_model')
            ->from('rqsn a')
            ->join('rqsn_details b', 'a.rqsn_id = b.rqsn_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->join('size_list sz', 'd.size=sz.size_id', 'left')
            ->join('color_list cl', 'd.color=cl.color_id', 'left')
            ->join('users x', 'a.send_by=x.user_id', 'left')
            ->where('a.to_id != 3')
            ->where('b.status', 3)
            ->order_by('a.date', 'desc');

        if ($limit)
            $this->db->limit($limit);

        if ($rqsn_id)
            $this->db->where('a.rqsn_id', $rqsn_id);

        if ($outlet_id) {
            $this->db->group_start()
                ->where('a.from_id', $outlet_id)
                ->or_where('a.to_id', $outlet_id)
                ->group_end();
        }

        $q =    $this->db->get();

        if ($q->num_rows() > 0) {
            $new_q = $q->result_array();

            foreach ($new_q as $k => $v) {
                $new_q[$k]['from_outlet'] = $this->warehouse->get_outlet_or_cw_info($new_q[$k]['from_id'])[0]['outlet_name'];
                $new_q[$k]['to_outlet'] = $this->warehouse->get_outlet_or_cw_info($new_q[$k]['to_id'])[0]['outlet_name'];
            }

            return $new_q;
        }

        return false;
    }

    public function get_rqsn_approved_list()
    {
        $this->db->select('a.*, b.*, c.*');
        $this->db->from('pr_rqsn a');
        $this->db->join('pr_rqsn_details b', 'b.pr_rqsn_id = a.pr_rqsn_id');
        $this->db->join('product_information c', 'c.product_id = b.product_id');
        $this->db->group_by('b.product_id');
        $this->db->where('a.status', 1);
        $this->db->where('b.isaprv', 1);
       // $this->db->where('b.isRcv', 0);

        // $this->db->join('supplier_information d', 'd.supplier_id = b.supplier_id');

        $query = $this->db->get();

        // echo '<pre>'; print_r($query->result_array()); die();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;


    }
    public function get_item_list_finalize()
    {
        $this->db->select('a.*, b.*, c.*');
        $this->db->from('pr_rqsn a');
        $this->db->join('pr_rqsn_details b', 'b.pr_rqsn_id = a.pr_rqsn_id');
        $this->db->join('product_information c', 'c.product_id = b.product_id');
        $this->db->group_by('b.product_id');
        $this->db->where('a.status', 1);
        $this->db->where('b.isaprv', 2);

        // $this->db->join('supplier_information d', 'd.supplier_id = b.supplier_id');

        $query = $this->db->get();

        // echo '<pre>'; print_r($query->result_array()); die();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;


    }
}
