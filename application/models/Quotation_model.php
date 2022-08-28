<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quotation_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //    ========== its for quotation_list ==============
    public function quotation_list($offset, $limit)
    {
        $this->db->select('a.*, b.customer_name, b.customer_mobile');
        $this->db->from('quotation a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function pre_order_list($offset, $limit)
    {
        $this->db->select('a.*, b.customer_name, b.customer_mobile');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.is_pre', '2');
        $this->db->order_by('a.invoice', 'desc');
        $this->db->limit($offset, $limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function pre_order_entry()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $CI->load->model('Products');
        $CI->load->model('Invoices');
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $invoice_id = $this->Invoices->generator(10);
        $invoice_id = strtoupper($invoice_id);
        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $quantity = $this->input->post('product_quantity', TRUE);
        $invoice_no_generated = $this->Invoices->number_generator();

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
                'perc_discount' => $this->input->post('perc_discount', TRUE),
                'sales_by'        => $createby,
                'status'          => 2,
                'is_pre'          => 2,
                // 'payment_type'    =>  $this->input->post('paytype',TRUE),
                'delivery_type'    =>  $delivery_type,
                'delivery_ac'       =>  $this->input->post('delivery_ac', TRUE),
                // 'bank_id'         => (!empty($this->input->post('bank_id', TRUE)) ? $this->input->post('bank_id', TRUE) : null),
                // 'bkash_id'         => (!empty($this->input->post('bkash_id', TRUE)) ? $this->input->post('bkash_id', TRUE) : null),
                // 'nagad_id'         => (!empty($this->input->post('nagad_id', TRUE)) ? $this->input->post('nagad_id', TRUE) : null),
                'courier_id'         => (!empty($this->input->post('courier_id', TRUE)) ? $this->input->post('courier_id', TRUE) : null),
                'branch_id'         => (!empty($this->input->post('branch_id', TRUE)) ? $this->input->post('branch_id', TRUE) : null),
                'outlet_id'       =>  $this->input->post('outlet_name', TRUE),
                'reciever_id'       => $this->input->post('deli_reciever', TRUE),
                'receiver_number'     => $this->input->post('del_rec_num', TRUE),
                'customer_card_no'      => $cus_card,
                'courier_status'      => ($delivery_type == 1) ? 0 : 1


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
                    $data['cheque_id'] = $this->Invoices->generator(10);
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
                    $data['cheque_id'] = $this->Invoices->generator(10);
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
                'perc_discount' => $this->input->post('perc_discount', TRUE),

                'sales_by'        => $createby,
                'status'          => 1,
                'is_pre'          => 2,
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
                'courier_status'      => ($delivery_type == 1) ? 0 : 1


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
            $supplier_rate = $this->Invoices->supplier_price($product_id);
            $disper = $discount_per[$i];
            $comm = $commission_per[$i];
            $discount = is_numeric($product_quantity) * is_numeric($product_rate) * is_numeric($disper) / 100;
            // $tax = $tax_amount[$i];
            // $description = $invoice_description[$i];

            $data1 = array(
                'invoice_details_id' => $this->Invoices->generator(15),
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
                'status'             => 2,
                'pre_order'             => 2,
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


                //echo '<pre>';print_r($data1);exit();
                $this->db->insert('invoice_details', $data1);
                //$this->db->insert('product_purchase_details', $data2);
                // $this->db->insert('product_purchase_details', $data2);

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



    //quotation insert
    public function quotation_entry($postData)
    {
        $CI = &get_instance();
        $VNo = $postData['quotation_id'];
        $Vtype = 'PreOrder';
        $Vdate = $postData['quotdate'];
        $customer_id = $postData['customer_id'];
        $createby = $postData['create_by'];
        $createdate = date('Y-m-s');

        $quot_no = $this->input->post('quotation_no', TRUE);

        $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
        $headn = $customer_id . '-' . $cusifo->customer_name;
        $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
        $customer_headcode = $coainfo->HeadCode;

        $pay_type = $this->input->post('paytype', TRUE);

        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $bkashname = '';
        $card_id = $this->input->post('card_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);



        $paid = $this->input->post('p_amount', TRUE);
        // echo "<pre>";print_r($paid);
        if (count($paid) > 0) {
            for ($i = 0; $i < count($pay_type); $i++) {


                if ($pay_type[$i] == 1) {

                    $cc = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  1020101,
                        'Narration'      =>  'Cash in Hand in Sale for Pre Order No. ' . $quot_no . ' customer- ' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'pay_date'      =>  $Vdate,
                        'status'        =>  1,
                        'account'       => '',
                        'COAID'         => 1020101
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Hand) for Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer  Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname,
                        'COAID'         => $bankcoaid,
                        'pay_date'       =>  $Vdate,
                        'status'        =>  1
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer Advance (Cash In Bank) for Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bkashcoaid,
                        'Narration'      =>  'Cash in Bkash for Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bkashname,
                        'pay_date'       =>  $Vdate,
                        'COAID'         => $bkashcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer advance in Bank For Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $nagadcoaid,
                        'Narration'      =>  'Cash in Nagad paid amount for customer  Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'pay_date'       =>  $Vdate,
                        'account'       => $nagadname,
                        'COAID'         => $nagadcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer Advance (Cash In Nagad) for Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer in card - ' . $card_info[0]['card_no'] . '  Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          => ($paid[$i]) - ($paid[$i] * ($card_info[0]['percentage'] / 100)),
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname,
                        'pay_date'       =>  $Vdate,
                        'COAID'         => $bankcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );

                    $carddebit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  '40404',
                        'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Preorder NO. ' . $quot_no,
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

        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quot_no', $quot_no);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('quotation', $postData);
            return TRUE;
        }
    }

    public function payment_details($quotation_id)
    {
        $this->db->select('*')
            ->from('qout_payment')
            ->where('quotation_id', $quotation_id);

        $query = $this->db->get();

        return $query->result_array();
    }

    // Delete Quotation
    public function quotation_delete($quot_id)
    {
        //quotation
        $this->db->where('invoice_id', $quot_id);
        $this->db->delete('invoice');
        //used product
        $this->db->where('invoice_id', $quot_id);
        $this->db->delete('invoice_details');

        return true;
    }

    // ================  Quotation edit information ===================
    public function quot_main_edit($quot_id)
    {
        return $this->db->select('*')
            ->from('quotation')
            ->where('quotation_id', $quot_id)
            ->get()
            ->result_array();
    }
    //Item tax details
    public function itemtaxdetails($quot_no)
    {
        $taxdetector = 'item' . $quot_no;
        return $this->db->select('*')
            ->from('quotation_taxinfo')
            ->where('relation_id', $taxdetector)
            ->get()
            ->result_array();
    }
    //Service tax details
    public function servicetaxdetails($quot_no)
    {
        $taxdetector = 'serv' . $quot_no;
        return $this->db->select('*')
            ->from('quotation_taxinfo')
            ->where('relation_id', $taxdetector)
            ->get()
            ->result_array();
    }

    public function bank_list()
    {

        return $this->db->select('*')
            ->from('bank_add')
            ->get()
            ->result_array();
    }


    public function quot_product_edit($quot_id)
    {
        return $this->db->select('*')
            ->from('quot_products_used')
            ->where('quot_id', $quot_id)
            ->order_by('id', 'asc')
            ->get()
            ->result_array();
    }

    public function customerinfo($customer_id)
    {
        return $this->db->select('*')
            ->from('customer_information')
            ->where('customer_id', $customer_id)
            ->get()
            ->result_array();
    }

    // quotation update
    public function quotation_update($postData)
    {
        $CI = &get_instance();
        $VNo = $postData['quotation_id'];
        $Vtype = 'PreOrder';
        $Vdate = $postData['quotdate'];
        $customer_id = $postData['customer_id'];
        $createby = $postData['create_by'];
        $createdate = date('Y-m-s');

        $quot_no = $this->input->post('quotation_no', TRUE);

        $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id', $customer_id)->get()->row();
        $headn = $customer_id . '-' . $cusifo->customer_name;
        $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName', $headn)->get()->row();
        $customer_headcode = $coainfo->HeadCode;

        $pay_type = $this->input->post('paytype', TRUE);

        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $bkashname = '';
        $card_id = $this->input->post('card_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);



        $paid = $this->input->post('p_amount', TRUE);


        $this->db->where('VNO', $VNo)
            ->delete('acc_transaction');

        $this->db->where('quotation_id', $VNo)
            ->delete('qout_payment');

        // echo "<pre>";print_r($paid);
        if (count($paid) > 0) {
            for ($i = 0; $i < count($pay_type); $i++) {


                if ($pay_type[$i] == 1) {

                    $cc = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  1020101,
                        'Narration'      =>  'Cash in Hand in Sale for Pre Order No. ' . $quot_no . ' customer- ' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'pay_date'      =>  $Vdate,
                        'status'        =>  1,
                        'account'       => '',
                        'COAID'         => 1020101
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Hand) for Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer  Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname,
                        'COAID'         => $bankcoaid,
                        'pay_date'       =>  $Vdate,
                        'status'        =>  1
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer Advance (Cash In Bank) for Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bkashcoaid,
                        'Narration'      =>  'Cash in Bkash for Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bkashname,
                        'pay_date'       =>  $Vdate,
                        'COAID'         => $bkashcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer advance in Bank For Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $nagadcoaid,
                        'Narration'      =>  'Cash in Nagad paid amount for customer  Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'pay_date'       =>  $Vdate,
                        'account'       => $nagadname,
                        'COAID'         => $nagadcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer Advance (Cash In Nagad) for Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
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
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Paid amount for customer in card - ' . $card_info[0]['card_no'] . '  Pre Order No. ' . $quot_no . ' customer -' . $cusifo->customer_name,
                        'Debit'          => ($paid[$i]) - ($paid[$i] * ($card_info[0]['percentage'] / 100)),
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'quotation_id'    => $VNo,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname,
                        'pay_date'       =>  $Vdate,
                        'COAID'         => $bankcoaid,
                        'status'        =>  1,
                    );

                    $this->db->insert('qout_payment', $data);

                    $cuscredit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  $customer_headcode,
                        'Narration'      =>  'Customer credit (Cash In Bank) for Paid Amount For Customer Pre Order No. ' . $quot_no . ' Customer- ' . $cusifo->customer_name,
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       => 1,
                        'CreateBy'       => $createby,
                        'CreateDate'     => $createdate,
                        'IsAppove'       => 1
                    );

                    $carddebit = array(
                        'VNo'            =>  $VNo,
                        'Vtype'          =>  $Vtype,
                        'VDate'          =>  $Vdate,
                        'COAID'          =>  '40404',
                        'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Preorder NO. ' . $quot_no,
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

        $this->db->select('*');
        $this->db->from('quotation');
        $this->db->where('quotation_id', $postData['quotation_id']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $this->db->where('quotation_id', $postData['quotation_id']);
            $this->db->update('quotation', $postData);
            return TRUE;
        } else {
            return FALSE;
        }
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



    public function quot_service_detail($quot_id)
    {
        $result = $this->db->select('a.*,b.*')
            ->from('quotation_service_used a')
            ->join('product_service b', 'a.service_id=b.service_id')
            ->where('a.quot_id', $quot_id)
            ->order_by('a.id', 'asc')
            ->get()
            ->result_array();
        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }




    public function quot_product_detail($quot_id)
    {
        return $this->db->select('a.*,b.*, cl.color_name, sz.size_name')
            ->from('quot_products_used a')
            ->join('product_information b', 'a.product_id=b.product_id', 'left')
            ->join('color_list cl', 'cl.color_id = b.color', 'left')
            ->join('size_list sz', 'sz.size_id = b.size', 'left')
            ->where('a.quot_id', $quot_id)
            ->order_by('a.id', 'asc')
            ->get()
            ->result_array();
    }



    //    ========= its for quotation onkeyup search ============
    public function quotationonkeyup_search($keyword)
    {
        $this->db->select('a.*, b.customer_name');
        $this->db->from('quotation a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        if ($this->session->userdata('user_type') == 3) {
            $this->db->where('a.customer_id', $this->session->userdata('user_id'));
            $this->db->where('a.cust_show', 1);
        }
        $this->db->like('b.customer_name', $keyword, 'both');
        $this->db->or_like('a.quot_no', $keyword, 'both');
        $this->db->order_by('a.id', 'desc');
        $this->db->limit(100);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_allproduct()
    {
        return $this->db->select('*')->from('product_information')->get()->result();
    }


    public function get_allcustomer()
    {
        return $this->db->select('*')
            ->from('customer_information')
            ->order_by('customer_name', 'asc')
            ->get()
            ->result_array();
    }
}
