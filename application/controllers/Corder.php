<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Corder extends CI_Controller
{

    public $order_id;

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->model('Suppliers');
        $this->load->library('auth');
    }

    //Index page load
    public function index()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lorder');
        $CI->load->model('Products');



       // die();
        $content = $this->lorder->order_list();
        $this->template->full_admin_html_view($content);
    }
    public function order_status_form($id)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lorder');
        $CI->load->model('Products');

        $content = $this->lorder->order_status($id);
        $this->template->full_admin_html_view($content);
    }

    public function CheckOrderList()
    {
        // GET data
        $this->load->model('Order');
        $postData = $this->input->post();
        $data = $this->Order->getOrderList($postData);
        echo json_encode($data);
    }

    public function update_order($id){




        $ch = curl_init();

        $url=api_url().'order/update_order/'.$id;


        $data=array(

          'id' => $id
        );
//        echo $url;
//
//        die();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// In real life you should use something like:
//        curl_setopt($ch, CURLOPT_POSTFIELDS,
//                 http_build_query($data));

// Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);

// Further processing ...
        if ($server_output == "OK") {


        } else {



        }


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

    public function order_invoice(){

      //  echo '<pre>';print_r($_POST);exit();
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Web_settings');
        $CI->load->model('Rqsn');
        $CI->load->model('Settings');
        $CI->load->model('Products');

        $role_list    = $CI->Rqsn->role_list();

//        echo '<pre>';print_r($role_list[0]['id']);exit();
        $tablecolumn = $this->db->list_fields('tax_collection');
        $invoice_id = $this->input->post('order_id', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);
        $quantity = $this->input->post('quantity', TRUE);

        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        //$quantity = $this->input->post('product_quantity', TRUE);
        $invoice_no_generated = $this->number_generator();

        $Vdate = $this->input->post('invoice_date', TRUE);
        //$customer_id = $this->input->post('customer_id', TRUE);


        $pay_type = $this->input->post('type', TRUE);

        $check_order = $this->db->select('*')->from('invoice')->where(array('invoice_id'=> $invoice_id))->get()->num_rows();


            $datainv = array(
                'invoice_id' => $invoice_id,
                'date' => (!empty($this->input->post('invoice_date', TRUE)) ? $this->input->post('invoice_date', TRUE) : date('Y-m-d')),
                'total_amount' => $this->input->post('grand_total', TRUE),
                'customer_id' => (!empty($this->input->post('customer_id', TRUE)) ? $this->input->post('customer_id', TRUE) :1),
                'invoice' => $invoice_no_generated,
                'total_discount' => $this->input->post('discount', TRUE),
                'paid_amount' => $this->input->post('paid_amount', TRUE),
                'due_amount' => $this->input->post('due_amount', TRUE),
                'shipping_cost' => $this->input->post('shipping_cost', TRUE),
                'courier_status' => 1,
                'outlet_id' => 'OpSoxJvBbbS8Rws',
                'sale_type' => 4,
                'delivery_type' => 2,
                'payment_type' => $pay_type,
                'sales_by' => $createby,
                'status' => 2,
                'is_ecom' => 1,


            );

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


            $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
            $headn = $customer_id . '-' . $cusifo->customer_name;
            $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
            $customer_headcode = $coainfo->HeadCode;
            $cs_name= $cusifo->customer_name;

        $grand_total=$this->input->post('grand_total', TRUE);
        $total_discount=$this->input->post('discount', TRUE);

        $grand_total_wtd=$grand_total+$total_discount;

        $shipping_cost=$this->input->post('shipping_cost', TRUE);

        $due_amount= $this->input->post('due_amount', TRUE);
        $paid_amount= $this->input->post('paid_amount', TRUE);

        if ($due_amount > 0) {
            $cosdr = array(
                'VNo' => $invoice_id,
                'Vtype' => 'INV-CC',
                'VDate' => $Vdate,
                'COAID' => $customer_headcode,
                'Narration' => 'Customer debit For Invoice No -  ' . $invoice_no_generated . ' Customer ' . $cs_name,
                'Debit' => $due_amount,
                'Credit' => 0,
                'IsPosted' => 1,
                'CreateBy' => $createby,
                'CreateDate' => $createdate,
                'IsAppove' => 1
            );
            $this->db->insert('acc_transaction', $cosdr);
        }


        if ($shipping_cost > 0){
            $dc_income = array(
                'VNo'            =>  $invoice_id,
                'Vtype'          =>  'INV-CC',
                'VDate'          =>  $Vdate,
                'COAID'          =>  40105,
                'Narration'      =>  'Delivery Charge For Invoice No -  ' . $invoice_no_generated . ' Customer  ' . $cs_name,
                'Credit'          =>   (!empty($this->input->post('shipping_cost', TRUE)) ? $this->input->post('shipping_cost', TRUE): 0),
                'Debit'         =>  0,
                'IsPosted'       =>  1,
                'CreateBy'       => $createby,
                'CreateDate'     => $createdate,
                'IsAppove'       => 1
            );
            $this->db->insert('acc_transaction', $dc_income);
        }


        $pro_sale_income = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INVOICE',
            'VDate'          =>  $Vdate,
            'COAID'          =>  303,
            'Narration'      =>  'Sale Income For Invoice ID - ' . $invoice_id . ' Customer ' .$cs_name,
            'Debit'          =>  0,
            'Credit'         => $grand_total_wtd-$this->input->post('shipping_cost', TRUE),
            'IsPosted'       => 1,
            'CreateBy'       => $createby,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $pro_sale_income);


        if ($total_discount > 0) {
            $dis_transaction = array(

                'VNo' => $invoice_id,
                'Vtype' => 'INVOICE',
                'VDate' => $Vdate,
                'COAID' => 406,
                'Narration' => 'Sales Discount for Invoice ID - ' . $invoice_id,
                'Credit' => 0,
                'Debit' => $total_discount,
                'IsPosted' => 1,
                'CreateBy' => $createby,
                'CreateDate' => $createdate,
                'IsAppove' => 1,

            );

            $this->db->insert('acc_transaction', $dis_transaction);

        }


        ///Customer credit for Paid Amount
        $cc = array(
            'VNo'            =>  $invoice_id,
            'Vtype'          =>  'INV',
            'VDate'          =>  $Vdate,
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand in Sale for Invoice ID - ' . $invoice_id . ' customer- ' . $cs_name,
            'Debit'          =>  $paid_amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,

        );


        $data = array(
            'invoice_id'    => $invoice_id,
            'pay_type'      =>1,
            'amount'        => $paid_amount,
            'pay_date'      =>  $Vdate,
            'status'        =>  1,
            'account'       => '',
            'COAID'         => 1020101
        );
        $this->db->insert('acc_transaction', $cc);

        $this->db->insert('paid_amount', $data);
            // echo '<pre>'; print_r($datainv); exit();

        if ($check_order <= 0) {
            $this->db->insert('invoice', $datainv);
        }else{
            $this->db->where('invoice_id',$invoice_id);
            $this->db->update('invoice',$datainv);

            $this->db->where('invoice_id',$invoice_id);
            $this->db->delete('invoice_details');
        }


            $current_stock = $this->input->post('stock', TRUE);
            $rate = $this->input->post('price', TRUE);
            $p_id = $this->input->post('product_id', TRUE);
            $total_amount = $this->input->post('total_price', TRUE);
            $variation = $this->input->post('variation', TRUE);


            for ($i = 0, $n = count($p_id); $i < $n; $i++) {
                $product_quantity = $quantity[$i];
                $stock = $current_stock[$i];
                $var = $variation[$i];
                $product_rate = $rate[$i];
                $product_id = $p_id[$i];
                $total_price = $total_amount[$i];
                $supplier_rate = $this->supplier_price($product_id);


                $data1 = array(
                    'invoice_details_id' => date('Ymdhs'),
                    'invoice_id' => $invoice_id,
                    'product_id' => $product_id,
                    'quantity' => $product_quantity,
                    'rate' => $product_rate,
                    'description' => 'Order Sales',
                    // 'tax'                => $tax,
                    'supplier_rate' => $supplier_rate,
                    'total_price' => $total_price,
                    'status' => 2
                );


                if (!empty($quantity)) {

                    if ($product_quantity > $stock) {
                        $pr_rqsn_id = date('Ymdhs');
                        $datarq = array(
                            'pr_rqsn_id' => $pr_rqsn_id,
                            'date' => (!empty($this->input->post('invoice_date', true)) ? $this->input->post('invoice_date', true) : date('Y-m-d')),
                            'details' => 'Production Requisition',
                            'to_id' => $role_list[0]['id'],
                            'status' => 1,
                        );


                        $this->db->insert('pr_rqsn', $datarq);
                        $check_product = $this->db->select('*')->from('pr_rqsn_details')->where(array('product_id' => $product_id))->get()->num_rows();
                        $exist_qty = $this->db->select('quantity')->from('pr_rqsn_details')->where(array('product_id' => $product_id))->get()->row()->quantity;

                        if ($check_product > 0) {

                            $this->db->set(array('quantity' => $product_quantity + $exist_qty, 'last_updated' => date('Y-m-d')));
                            $this->db->where('product_id', $product_id);
                            $this->db->update('pr_rqsn_details');

                        } else {
                            $rqsn_details = array(
                                'pr_rqsn_detail_id' => mt_rand(),
                                'pr_rqsn_id' => $pr_rqsn_id,
                                'product_id' => $product_id,
                                'quantity' => $product_quantity - $stock,
//                            'unit'                => $un,
                                'variation' => $var,
                                'status' => 1,
                                'create_date' => date('Y-m-d'),
                                //temporary added
                                'isaprv' => 2,
//                'isrcv'                => 1,

                            );

                            $this->db->insert('pr_rqsn_details', $rqsn_details);


                        }
                    }
                    //echo '<pre>';print_r($data1);exit();

                        $this->db->insert('invoice_details', $data1);


                }
            }
        }




    public function courier_transaction()
    {


        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $invoice_no_generated = $this->number_generator();

        $Vdate = $this->input->post('invoice_date', TRUE);
        $invoice_id = $this->input->post('order_id', TRUE);
        $order_no = $this->input->post('order_no', TRUE);

        $courier_condtion = $this->input->post('courier_condtion', TRUE);

        $courier_id = $this->input->post('courier_id', TRUE);
        $corifo = $this->db->select('*')->from('courier_name')->where('courier_id', $courier_id)->get()->row();
        $headn_cour = $corifo->id . '-' . $corifo->courier_name;
        $coainfo_cor = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn_cour)->get()->row();
        $courier_headcode = $coainfo_cor->HeadCode;
        $courier_name= $corifo->courier_name;

        $grand_total=$this->input->post('grand_total_price', TRUE);
        $branch_id=$this->input->post('branch_id', TRUE);
        $paid_amount=$this->input->post('paid_amount', TRUE);
        $due_amount=$this->input->post('due_amount', TRUE);
        $shipping_cost=$this->input->post('delivery_charge', TRUE);
        $courier_condtion=$this->input->post('courier_condtion', TRUE);
        if ($courier_condtion == 1 || 2){
            $condition_cost=$this->input->post('condition_charge', TRUE);

        }

        if ($courier_condtion == 3){
            $condition_cost=0;

        }
        $courier_pay=$grand_total-($shipping_cost+$condition_cost);
        $courier_pay_partial=$due_amount-($shipping_cost+$condition_cost);
        $pay_amount=($due_amount)-(($shipping_cost+$condition_cost)*2);


        $DC=$this->input->post('delivery_charge', TRUE)+$this->input->post('condition_charge', TRUE);
        $check_order = $this->db->select('*')->from('invoice')->where(array('invoice_id'=> $invoice_id))->get()->num_rows();




        $invoice_data=array(
            'invoice_id' =>$invoice_id,
            'courier_id' =>$courier_id,
            'branch_id' =>$branch_id,
            'shipping_cost' =>$shipping_cost,
            'condition_cost' =>$condition_cost,


        );

        if ($check_order <=0){
            $this->db->insert('invoice',$invoice_data);

        }else{
            $this->db->where('invoice_id',$invoice_id);
            $this->db->update('invoice',$invoice_data);

            $this->db->where('VNo',$invoice_id);
            $this->db->delete('acc_transaction');

        }


        if ( $courier_condtion ==  1){


            $cordr = array(
                'VNo'            =>  $invoice_id,
                'Vtype'          =>  'INV-CC',
                'VDate'          =>  $Vdate,
                'COAID'          =>  $courier_headcode,
                'Narration'      =>  'Courier Debit For  e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
                'Credit'          => 0,
                'Debit'         =>   (!empty($courier_pay) ? $courier_pay : null),
                'IsPosted'       =>  1,
                'CreateBy'       => $createby,
                'CreateDate'     => $createdate,
                'IsAppove'       => 1
            );
            $this->db->insert('acc_transaction', $cordr);
            $cor_credit = array(
                'VNo'            =>  $invoice_id,
                'Vtype'          =>  'INV-CC',
                'VDate'          =>  $Vdate,
                'COAID'          =>  $courier_headcode,
                'Narration'      =>  'Courier Credit For  e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
                'Debit'          => 0,
                'Credit'         =>   (!empty($pay_amount) ? $pay_amount : null),
                'IsPosted'       =>  1,
                'CreateBy'       => $createby,
                'CreateDate'     => $createdate,
                'IsAppove'       => 1
            );
            $this->db->insert('acc_transaction', $cor_credit);

            $corcc = array(
                'VNo'            =>  $invoice_id,
                'Vtype'          =>  'INV-CC',
                'VDate'          =>  $Vdate,
                'COAID'          =>  $courier_headcode,
                'Narration'      =>  'Delivery Charge and Condition Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
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
                'Narration'      =>  'Delivery Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                'Debit'          =>   (!empty($this->input->post('delivery_charge', TRUE)) ? $this->input->post('delivery_charge', TRUE): 0),
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
                'Narration'      =>  'Condition Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                'Debit'          =>   (!empty($this->input->post('condition_charge', TRUE)) ? $this->input->post('condition_charge', TRUE): 0),
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
                'Narration'      =>  'Courier Debit For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
                'Debit'          =>  (!empty($pay_amount) ? $pay_amount : null),
                'Credit'         =>  0,
                'IsPosted'       =>  1,
                'CreateBy'       => $createby,
                'CreateDate'     => $createdate,
                'IsAppove'       => 1
            );
            $this->db->insert('acc_transaction', $cordr);

            $cor_credit= array(
                'VNo'            =>  $invoice_id,
                'Vtype'          =>  'INV-CC',
                'VDate'          =>  $Vdate,
                'COAID'          =>  $courier_headcode,
                'Narration'      =>  'Courier Credit For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
                'Credit'          =>  (!empty($courier_pay_partial) ? $courier_pay_partial : null),
                'Debit'         =>  0,
                'IsPosted'       =>  1,
                'CreateBy'       => $createby,
                'CreateDate'     => $createdate,
                'IsAppove'       => 1
            );

            $this->db->insert('acc_transaction', $cor_credit);

            $corcc = array(
                'VNo'            =>  $invoice_id,
                'Vtype'          =>  'INV-CC',
                'VDate'          =>  $Vdate,
                'COAID'          =>  $courier_headcode,
                'Narration'      =>  'Delivery Charge and Condition Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
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
                'Narration'      =>  'Delivery Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                'Debit'          =>   (!empty($this->input->post('delivery_charge', TRUE)) ? $this->input->post('delivery_charge', TRUE): 0),
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
                'Narration'      =>  'Condition Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
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

//            $cosdr = array(
//                'VNo'            =>  $invoice_id,
//                'Vtype'          =>  'INV-CC',
//                'VDate'          =>  $Vdate,
//                'COAID'          =>  $customer_headcode,
//                'Narration'      =>  'Customer debit For Invoice No -  ' . $invoice_no_generated . ' Customer ' . $cs_name,
//                'Debit'          =>  $this->input->post('n_total', TRUE) - (!empty($this->input->post('previous', TRUE)) ? $this->input->post('previous', TRUE) : 0),
//                'Credit'         =>  0,
//                'IsPosted'       =>  1,
//                'CreateBy'       => $createby,
//                'CreateDate'     => $createdate,
//                'IsAppove'       => 1
//            );
//            $this->db->insert('acc_transaction', $cosdr);

            $corcr = array(
                'VNo'            =>  $invoice_id,
                'Vtype'          =>  'INV-CC',
                'VDate'          =>  $Vdate,
                'COAID'          =>  $courier_headcode,
                'Narration'      =>  'Delivery Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                'Credit'          =>   (!empty($this->input->post('delivery_charge', TRUE)) ? $this->input->post('delivery_charge', TRUE): null),
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
                'Narration'      =>  'Delivery Charge For e-commerce Order No -  ' . $order_no . ' Courier  ' . $courier_name,
//                'Debit'          =>  $this->input->post('shipping_cost', TRUE),
                'Debit'          =>   (!empty($this->input->post('delivery_charge', TRUE)) ? $this->input->post('delivery_charge', TRUE): null),
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

        redirect('Corder/order_status_form/'.$invoice_id);

       // echo '<pre>';print_r($_POST) ;exit();
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

        public function invoice_inserted_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lorder');
        $content = $CI->lorder->invoice_html_data_manual($invoice_id);
        $this->template->full_admin_html_view($content);
    }
    public function print_order()
    {



        if(isset($_POST['submit'])){

            if(!empty($_POST['select_check'])) {



                foreach($_POST['select_check'] as $value){

                    $data['id'][] =  $value;

                }

            }

        }
//        echo '<pre>';print_r($data);
//        exit();
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lorder');
        $content = $CI->lorder->invoice_html_data_all(json_encode($_POST['select_check']));
        $this->template->full_admin_html_view($content);
    }


}
