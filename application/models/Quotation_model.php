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
        $this->db->where('quotation_id', $quot_id);
        $this->db->delete('quotation');
        //used product
        $this->db->where('quot_id', $quot_id);
        $this->db->delete('quot_products_used');
        // used labour
        $this->db->where('quot_id', $quot_id);
        $this->db->delete('quotation_service_used');
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
