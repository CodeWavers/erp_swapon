<?php defined('BASEPATH') or exit('No direct script access allowed');

class Accounts_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Smsgateway');
        $this->load->library('session');
        $this->auth->check_admin_auth();
    }

    function get_userlist()
    {
        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('IsActive', 1);
        $this->db->order_by('HeadName');
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function dfs($HeadName, $HeadCode, $oResult, $visit, $d)
    {
        if ($d == 0) echo "<li class=\"jstree-open \">$HeadName";
        else if ($d == 1) echo "<li class=\"jstree-open\"><a href='javascript:' onclick=\"loadCoaData('" . $HeadCode . "')\">$HeadName</a>";
        else echo "<li><a href='javascript:' onclick=\"loadCoaData('" . $HeadCode . "')\">$HeadName</a>";
        $p = 0;
        for ($i = 0; $i < count($oResult); $i++) {

            if (!$visit[$i]) {
                if ($HeadName == $oResult[$i]->PHeadName) {
                    $visit[$i] = true;
                    if ($p == 0) echo "<ul>";
                    $p++;
                    $this->dfs($oResult[$i]->HeadName, $oResult[$i]->HeadCode, $oResult, $visit, $d + 1);
                }
            }
        }
        if ($p == 0)
            echo "</li>";
        else
            echo "</ul>";
    }

    function dfs_t($HeadName, $HeadCode, $oResult, $visit, $d)
    {
        if ($d == 0) echo "<td class=\"jstree-open \">$HeadName";
        else if ($d == 1) echo "<td class=\"jstree-open\"><a href='javascript:' onclick=\"loadCoaData('" . $HeadCode . "')\">$HeadName</a>";
        else echo "<td><a href='javascript:' onclick=\"loadCoaData('" . $HeadCode . "')\">$HeadName</a>";
        $p = 0;
        for ($i = 0; $i < count($oResult); $i++) {

            if (!$visit[$i]) {
                if ($HeadName == $oResult[$i]->PHeadName) {
                    $visit[$i] = true;
                    if ($p == 0) echo "<ul>";
                    $p++;
                    $this->dfs_t($oResult[$i]->HeadName, $oResult[$i]->HeadCode, $oResult, $visit, $d + 1);
                }
            }
        }
        if ($p == 0)
            echo "</td>";
        else
            echo "</td>";
    }

    // Accounts list
    public function Transacc()
    {
        return  $data = $this->db->select("*")
            ->from('acc_coa')
            ->like('HeadCode', 40401, 'after')
            ->not_like('HeadCode', 40401, 'none')
            ->where('IsTransaction', 1)
            ->where('IsActive', 1)
            ->order_by('HeadName')
            ->get()
            ->result();
    }

    public function cr_transacc()
    {
        return  $data = $this->db->select("*")
            ->from('acc_coa')
            ->like('HeadCode', 304, 'after')
            ->not_like('HeadCode', 304, 'none')
            ->where('IsTransaction', 1)
            ->where('IsActive', 1)
            ->order_by('HeadName')
            ->get()
            ->result();
    }

    public function ContV_transacc()
    {
        return  $data = $this->db->select("*")
            ->from('acc_coa')
            ->like('HeadCode', 10201, 'after')
            ->not_like('HeadCode', 10201, 'none')
            ->where('IsTransaction', 1)
            ->where('IsActive', 1)
            ->order_by('HeadName')
            ->get()
            ->result();
    }

    public function JV_transacc()
    {
        return  $data = $this->db->select("*")
            ->from('acc_coa')
            ->where('IsTransaction', 1)
            ->where('IsActive', 1)
            ->order_by('HeadName')
            ->get()
            ->result();
    }

    // Credit Account Head
    public function Cracc()
    {
        return  $data = $this->db->select("*")
            ->from('acc_coa')
            ->like('HeadCode', 10201, 'after')
            ->where('IsTransaction', 1)
            // ->where('HeadLevel', 4)
            ->order_by('HeadName')
            ->get()
            ->result();
    }
    // Insert Debit voucher
    public function insert_debitvoucher()
    {
        $CI = &get_instance();
        $CI->load->model('Settings');

        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "DV";
        $cAID = $this->input->post('cmbDebit', TRUE);
        $dAID = $this->input->post('txtCode', TRUE);
        $Debit = $this->input->post('txtAmount', TRUE);
        $Credit = $this->input->post('grand_total', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $bank_id = $this->input->post('bank_id_m', TRUE);
        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;
            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }

        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  1020101,
            'Narration'      =>  $Narration,
            'Credit'          =>  $Credit,
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0
        );
        $bankc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  $Narration,
            'Credit'          =>  $Credit,
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0
        );

        if (!empty($bkash_id)) {
            $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id)->get()->row()->bkash_no;

            $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
        } else {
            $bkashcoaid = '';
        }
        $bkashc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  $Narration,
            'Credit'          =>  $Credit,
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,

        );

        if (!empty($nagad_id)) {
            $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id)->get()->row()->nagad_no;

            $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
        } else {
            $nagadcoaid = '';
        }

        $nagadc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  $Narration,
            'Credit'          =>  $Credit,
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,
        );

        $card_id = $this->input->post('card_id', TRUE);
        $card_info = $CI->Settings->get_real_card_data($card_id);

        if (!empty($card_id)) {
            $card_bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $card_info[0]['bank_id'])->get()->row()->bank_name;

            $card_bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $card_bankname)->get()->row()->HeadCode;
        } else {
            $card_bankcoaid = '';
        }
        $cardc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $card_bankcoaid,
            'Narration'      =>  $Narration,
            'Credit'          => ($Credit) - ($Credit * ($card_info[0]['percentage'] / 100)),
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,

        );

        $expdebit = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  '40404',
            'Narration'      =>  $Narration,
            'Debit'          =>  $Credit * ($card_info[0]['percentage'] / 100),
            'Credit'         =>  0,
            'IsPosted'       => 1,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 0
        );

        if ($this->input->post('paytype', TRUE) == 4) {
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($this->input->post('paytype', TRUE) == 1) {
            $this->db->insert('acc_transaction', $cc);
        }
        if ($this->input->post('paytype', TRUE) == 3) {
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($this->input->post('paytype', TRUE) == 5) {
            $this->db->insert('acc_transaction', $nagadc);
        }
        if ($this->input->post('paytype', TRUE) == 6) {
            $this->db->insert('acc_transaction', $cardc);
            $this->db->insert('acc_transaction', $expdebit);
        }

        for ($i = 0; $i < count($dAID); $i++) {
            $dbtid = $dAID[$i];
            $Damnt = $Debit[$i];

            $debitheadinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode', $dbtid)->get()->row();

            $debitinsert = array(
                'VNo'            =>  $voucher_no,
                'Vtype'          =>  $Vtype,
                'VDate'          =>  $VDate,
                'COAID'          =>  $dbtid,
                'Narration'      =>  $Narration,
                'Debit'          =>  $Damnt,
                'Credit'         =>  0,
                'IsPosted'       => $IsPosted,
                'CreateBy'       => $CreateBy,
                'CreateDate'     => $createdate,
                'IsAppove'       => 0
            );

            $this->db->insert('acc_transaction', $debitinsert);
            $headinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode', $cAID)->get()->row();
        }
        // exit();
        return true;
    }


    // Update debit voucher
    public function update_debitvoucher()
    {
        $voucher_no = $this->input->post('txtVNo', TRUE);
        $Vtype = "DV";
        $cAID = $this->input->post('cmbDebit', TRUE);
        $dAID = $this->input->post('txtCode', TRUE);
        $Debit = $this->input->post('txtAmount', TRUE);
        $Credit = $this->input->post('grand_total', TRUE);
        // print_r($Credit);
        // exit();
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        $dbtHead = $this->input->post('dbtHead', TRUE);


        $this->db->where('VNo', $voucher_no);
        $this->db->where('COAID', $dbtHead);
        $this->db->set('Credit', $Credit);
        $this->db->update('acc_transaction');





        for ($i = 0; $i < count($dAID); $i++) {
            $dbtid = $dAID[$i];
            $Damnt = $Debit[$i];

            $this->db->where('VNo', $voucher_no);
            $this->db->where('COAID', $dbtid);
            $this->db->set('Debit', $Damnt);
            $this->db->update('acc_transaction');
        }
        return true;
    }
    //Generate Voucher No
    public function voNO()
    {
        $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'DV-', 'after')
            ->order_by('ID', 'desc')
            // ->limit(1)
            ->get()
            ->result_array();

        $v_arr = array();
        foreach ($data as $v) {
            array_push($v_arr, $v['voucher']);
        }

        return $v_arr;
    }

    public function Cashvoucher()
    {
        return  $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'CHV-', 'after')
            ->order_by('ID', 'desc')
            ->get()
            ->result_array();
    }
    // Credit voucher no
    public function crVno()
    {
        $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'CV-', 'after')
            ->order_by('ID', 'desc')
            // ->limit(1)
            ->get()
            ->result_array();

        $v_arr = array();
        foreach ($data as $v) {
            array_push($v_arr, $v['voucher']);
        }

        return $v_arr;
    }


    public function mr_no()
    {
        return  $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'MR-', 'after')
            ->order_by('ID', 'desc')
            ->limit(1)
            ->get()
            ->result_array();
    }

    // Contra voucher

    public function contra()
    {
        $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'Contra-', 'after')
            ->order_by('ID', 'desc')
            ->get()
            ->result_array();

        $v_arr = array();
        foreach ($data as $v) {
            array_push($v_arr, $v['voucher']);
        }

        return $v_arr;
    }


    // Insert Credit voucher
    public function insert_creditvoucher()
    {
        $CI = &get_instance();
        $CI->load->model('Settings');

        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "CV";

        $dAID = $this->input->post('cmbDebit', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);
        $cAID = $this->input->post('txtCode', TRUE);
        $Credit = $this->input->post('txtAmount', TRUE);
        $debit = $this->input->post('grand_total', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 1;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $bank_id = $this->input->post('bank_id_m', TRUE);
        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;
            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }

        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  1020101,
            'Narration'      =>  $Narration,
            'Credit'          =>  0,
            'Debit'          => $debit,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0
        );
        $bankc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  $Narration,
            'Credit'          =>  0,
            'Debit'          => $debit,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0
        );

        if (!empty($bkash_id)) {
            $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id)->get()->row()->bkash_no;

            $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
        } else {
            $bkashcoaid = '';
        }
        $bkashc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  $Narration,
            'Credit'          =>  0,
            'Debit'          => $debit,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,

        );

        if (!empty($nagad_id)) {
            $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id)->get()->row()->nagad_no;

            $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
        } else {
            $nagadcoaid = '';
        }

        $nagadc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  $Narration,
            'Credit'          =>  0,
            'Debit'          => $debit,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,
        );

        $card_id = $this->input->post('card_id', TRUE);
        $card_info = $CI->Settings->get_real_card_data($card_id);

        if (!empty($card_id)) {
            $card_bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $card_info[0]['bank_id'])->get()->row()->bank_name;

            $card_bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $card_bankname)->get()->row()->HeadCode;
        } else {
            $card_bankcoaid = '';
        }
        $cardc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $card_bankcoaid,
            'Narration'      =>  $Narration,
            'Credit'          => 0,
            'Debit'         => ($debit) - ($debit * ($card_info[0]['percentage'] / 100)),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,

        );

        $expdebit = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  '40404',
            'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Voucher NO- ' . $voucher_no,
            'Debit'          =>  $debit * ($card_info[0]['percentage'] / 100),
            'Credit'         =>  0,
            'IsPosted'       => 1,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 0
        );

        if ($this->input->post('paytype', TRUE) == 4) {
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($this->input->post('paytype', TRUE) == 1) {
            $this->db->insert('acc_transaction', $cc);
        }
        if ($this->input->post('paytype', TRUE) == 3) {
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($this->input->post('paytype', TRUE) == 5) {
            $this->db->insert('acc_transaction', $nagadc);
        }
        if ($this->input->post('paytype', TRUE) == 6) {
            $this->db->insert('acc_transaction', $cardc);
            $this->db->insert('acc_transaction', $expdebit);
        }



        for ($i = 0; $i < count($cAID); $i++) {
            $crtid = $cAID[$i];
            $Cramnt = $Credit[$i];


            $debitheadinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode', $crtid)->get()->row();
            //$cusifo = $this->db->select('*')->from('customer_information')->where('customer_id',$cus_id)->get()->row();




            $debitinsert = array(
                'VNo'            =>  $voucher_no,
                'Vtype'          =>  $Vtype,
                'VDate'          =>  $VDate,
                'COAID'          =>  $crtid,
                'Narration'      =>  'Customer credit for Paid Amount Customer ' . $debitheadinfo->HeadName . ' ' . $Narration,
                'Debit'          =>  0,
                'Credit'         =>  $Cramnt,
                'IsPosted'       => $IsPosted,
                'CreateBy'       => $CreateBy,
                'CreateDate'     => $createdate,
                'IsAppove'       => 0
            );

            $this->db->insert('acc_transaction', $debitinsert);

            $headinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode', $dAID)->get()->row();

            // $cinsert = array(
            //     'VNo'            =>  $voucher_no,
            //     'Vtype'          =>  $Vtype,
            //     'VDate'          =>  $VDate,
            //     'COAID'          =>  $dAID,
            //     'Narration'      =>  'Credit Vourcher from ' . $headinfo->HeadName,
            //     'Debit'          =>  $Cramnt,
            //     'Credit'         =>  0,
            //     'IsPosted'       => $IsPosted,
            //     'CreateBy'       => $CreateBy,
            //     'CreateDate'     => $createdate,
            //     'IsAppove'       => 0
            // );

            // $this->db->insert('acc_transaction', $cinsert);


            $headinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode', $dAID)->get()->row();
        }
        return true;
    }
    public function retrieve_mr_html_data($coaid, $id, $user_id)
    {

        //   $sumDebit=query('SELECT SUM(Debit) FROM `acc_transaction` WHERE COAID=\'102030000001\'');

        $this->db->select('a.*,b.COAID,b.Credit,c.customer_name,c.customer_address');
        $this->db->from('money_receipt a');
        $this->db->join('acc_transaction b', 'a.VNo=b.VNo');
        $this->db->join('customer_information c', 'c.customer_id=a.customer_id');

        $this->db->where('b.VNo', $coaid);
        $this->db->where('b.COAID', $id);

        $data = $this->db->get()->result_array();

        $this->db->select('(sum(b.Debit)-sum(b.Credit)) as total');
        $this->db->from('acc_transaction b');

        //   $this->db->where('b.VNo', $coaid);
        $this->db->where('b.COAID', $id);
        $data2 = $this->db->get()->result_array();

        $this->db->select('first_name,last_name');
        $this->db->from('users ');

        //   $this->db->where('b.VNo', $coaid);
        $this->db->where('user_id', $user_id);
        $user = $this->db->get()->result_array();
        //        if ($query->num_rows() > 0) {
        //            return $query->result_array();
        //        }

        $response = array(
            'data' => $data,
            'total' => $data2,
            'user' => $user
        );

        return $response;
    }



    public function insert_moneyrecipt()
    {
        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "MR";

        $dAID = $this->input->post('cmbDebit', TRUE);
        $cAID = $this->input->post('txtCode', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);
        $Credit = $this->input->post('txtAmount', TRUE);
        $debit = $this->input->post('grand_total', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $pay_type = $this->input->post('paytype', TRUE);
        $other_name = $this->input->post('other', TRUE);
        $bank_name = $this->input->post('bank_id', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $cheque_type = $this->input->post('cheque_type', TRUE);
        $cheque_no = $this->input->post('cheque_no', TRUE);
        $cheque_date = $this->input->post('cheque_date', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 1;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');


        if (!empty($bkash_id)) {
            $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id)->get()->row()->bkash_no;

            $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bkashname)->get()->row()->HeadCode;
        } else {
            $bkashcoaid = '';
        }
        if (!empty($nagad_id)) {
            $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id)->get()->row()->nagad_no;

            $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $nagadname)->get()->row()->HeadCode;
        } else {
            $nagadcoaid = '';
        }


        $debitheadinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode', $cAID)->get()->row();
        //$cusifo = $this->db->select('*')->from('customer_information')->where('customer_id',$cus_id)->get()->row();




        $customer_account = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $cAID,
            'Narration'      =>  'Money receipt for Paid Amount Customer ' . $debitheadinfo->HeadName . ' ' . $Narration,
            'Debit'          =>  0,
            'Credit'         =>  $Credit,
            'IsPosted'       => $IsPosted,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );

        $this->db->insert('acc_transaction', $customer_account);

        //        $headinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode',$dAID)->get()->row();
        //
        //        $cinsert = array(
        //            'VNo'            =>  $voucher_no,
        //            'Vtype'          =>  $Vtype,
        //            'VDate'          =>  $VDate,
        //            'COAID'          =>  $dAID,
        //            'Narration'      =>  'Money receipt  from '.$headinfo->HeadName,
        //            'Debit'          =>  $Credit,
        //            'Credit'         =>  0,
        //            'IsPosted'       => $IsPosted,
        //            'CreateBy'       => $CreateBy,
        //            'CreateDate'     => $createdate,
        //            'IsAppove'       => 1
        //        );
        //
        //        $this->db->insert('acc_transaction',$cinsert);
        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand for Money Receipt -' . $Vtype . ' Customer ' . $debitheadinfo->HeadName,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        $bankc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  1020102,
            'Narration'      =>  'Cash in Bank amount for customer  Money Receipt  No - ' . $Vtype . ' Customer ' . $debitheadinfo->HeadName . ' in ' . $bank_name,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );
        $bkashc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  'Cash in Bkash amount for customer  Money Receipt  No - ' . $Vtype . ' Customer ' . $debitheadinfo->HeadName . ' in ' . $bank_name,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );
        $nagadc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  'Cash in Nagad amount for customer  Money Receipt  No - ' . $Vtype . ' Customer ' . $debitheadinfo->HeadName . ' in ' . $bank_name,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );


        $data = array(

            'VNo'            =>  $voucher_no,
            'pay_type'          =>  $pay_type,
            'date'          =>  $VDate,
            'COAID'          =>  $cAID,
            'customer_id'          =>  $customer_id,
            'remark'        => $Narration

        );
        $data2 = array(

            'VNo'            =>  $voucher_no,
            'pay_type'          =>  $pay_type,
            'date'          =>  $VDate,
            'COAID'          =>  $cAID,
            'customer_id'          =>  $customer_id,
            'remark'        => $Narration,
            'bank_name'        => $bank_name,
            'cheque_type'        => $cheque_type,
            'cheque_no'        => $cheque_no,
            'cheque_date'        => $cheque_date,

        );
        $data3 = array(

            'VNo'            =>  $voucher_no,
            'pay_type'          =>  $pay_type,
            'date'          =>  $VDate,
            'COAID'          =>  $bkashcoaid,
            'customer_id'    =>  $customer_id,
            'remark'        => $Narration,
            'bkash_id'          =>  $bkashname,

        );
        $data4 = array(

            'VNo'            =>  $voucher_no,
            'pay_type'          =>  $pay_type,
            'date'          =>  $VDate,
            'COAID'          =>  $nagadcoaid,
            'customer_id'          =>  $customer_id,
            'nagad_id'          =>  $nagadname,
            'remark'        => $Narration

        );
        if ($pay_type == 1) {
            $this->db->insert('money_receipt', $data);
            $this->db->insert('acc_transaction', $cc);
        }
        if ($pay_type == 2) {
            $this->db->insert('money_receipt', $data2);
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($pay_type == 3) {
            $this->db->insert('money_receipt', $data3);
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($pay_type == 4) {
            $this->db->insert('money_receipt', $data4);
            $this->db->insert('acc_transaction', $nagadc);
        }

        //$this->db->insert('money_receipt',$data);

        //$headinfo = $this->db->select('*')->from('acc_coa')->where('HeadCode',$dAID)->get()->row();



        return true;
    }

    // Insert Countra voucher
    public function insert_contravoucher()
    {
        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "Contra";
        $dAID = $this->input->post('cmbDebit', TRUE);
        $cAID = $this->input->post('txtCode', TRUE);
        $debit = $this->input->post('txtAmount', TRUE);
        $credit = $this->input->post('txtAmountcr', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        for ($i = 0; $i < count($cAID); $i++) {
            $crtid = $cAID[$i];
            $Cramnt = $credit[$i];
            $debits = $debit[$i];

            $contrainsert = array(
                'VNo'            =>  $voucher_no,
                'Vtype'          =>  $Vtype,
                'VDate'          =>  $VDate,
                'COAID'          =>  $crtid,
                'Narration'      =>  $Narration,
                'Debit'          =>  $debits,
                'Credit'         =>  $Cramnt,
                'IsPosted'       => $IsPosted,
                'CreateBy'       => $CreateBy,
                'CreateDate'     => $createdate,
                'IsAppove'       => 0
            );

            $this->db->insert('acc_transaction', $contrainsert);
        }
        return true;
    }
    // Insert journal voucher
    public function insert_journalvoucher()
    {
        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "JV";
        $dAID = $this->input->post('cmbDebit', TRUE);
        $cAID = $this->input->post('txtCode', TRUE);
        $debit = $this->input->post('txtAmount', TRUE);
        $credit = $this->input->post('txtAmountcr', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        for ($i = 0; $i < count($cAID); $i++) {
            $crtid = $cAID[$i];
            $Cramnt = $credit[$i];
            $debits = $debit[$i];

            $contrainsert = array(
                'VNo'            =>  $voucher_no,
                'Vtype'          =>  $Vtype,
                'VDate'          =>  $VDate,
                'COAID'          =>  $crtid,
                'Narration'      =>  $Narration,
                'Debit'          =>  $debits,
                'Credit'         =>  $Cramnt,
                'IsPosted'       => $IsPosted,
                'CreateBy'       => $CreateBy,
                'CreateDate'     => $createdate,
                'IsAppove'       => 0
            );

            $this->db->insert('acc_transaction', $contrainsert);
        }
        return true;
    }

    public function update_journalvoucher()
    {

        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "JV";
        $dAID = $this->input->post('cmbDebit', TRUE);
        $cAID = $this->input->post('txtCode', TRUE);
        $debit = $this->input->post('txtAmount', TRUE);
        $credit = $this->input->post('txtAmountcr', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $this->db->where(' VNo', $voucher_no);
        $this->db->delete('acc_transaction');

        for ($i = 0; $i < count($cAID); $i++) {
            $crtid = $cAID[$i];
            $Cramnt = $credit[$i];
            $debits = $debit[$i];

            $contrainsert = array(
                'VNo'            =>  $voucher_no,
                'Vtype'          =>  $Vtype,
                'VDate'          =>  $VDate,
                'COAID'          =>  $crtid,
                'Narration'      =>  $Narration,
                'Debit'          =>  $debits,
                'Credit'         =>  $Cramnt,
                'IsPosted'       => $IsPosted,
                'CreateBy'       => $CreateBy,
                'CreateDate'     => $createdate,
                'IsAppove'       => 0
            );

            $this->db->insert('acc_transaction', $contrainsert);
        }

        return true;
    }

    public function update_contravoucher()
    {
        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "Contra";
        $dAID = $this->input->post('cmbDebit', TRUE);
        $cAID = $this->input->post('txtCode', TRUE);
        $debit = $this->input->post('txtAmount', TRUE);
        $credit = $this->input->post('txtAmountcr', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        $this->db->where(' VNo', $voucher_no);
        $this->db->delete('acc_transaction');

        for ($i = 0; $i < count($cAID); $i++) {
            $crtid = $cAID[$i];
            $Cramnt = $credit[$i];
            $debits = $debit[$i];

            $contrainsert = array(
                'VNo'            =>  $voucher_no,
                'Vtype'          =>  $Vtype,
                'VDate'          =>  $VDate,
                'COAID'          =>  $crtid,
                'Narration'      =>  $Narration,
                'Debit'          =>  $debits,
                'Credit'         =>  $Cramnt,
                'IsPosted'       => $IsPosted,
                'CreateBy'       => $CreateBy,
                'CreateDate'     => $createdate,
                'IsAppove'       => 0
            );
            $this->db->insert('acc_transaction', $contrainsert);
        }
        return true;
    }
    // journal voucher
    public function journal()
    {
        $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'Journal-', 'after')
            ->order_by('ID', 'desc')
            ->get()
            ->result_array();

        $v_arr = array();
        foreach ($data as $v) {
            array_push($v_arr, $v['voucher']);
        }

        return $v_arr;
    }

    // voucher Aprove
    public function approve_voucher()
    {
        $values = array("DV", "CV", "JV", "Contra");

        return $approveinfo = $this->db->select('*,sum(Credit) as Credit,sum(Debit) as Debit')
            ->from('acc_transaction')
            ->where_in('Vtype', $values)
            ->where('IsAppove', 0)
            ->group_by('VNo')
            ->get()
            ->result();
    }

    public function get_approved_voucher()
    {
        $values = array("DV", "CV", "JV", "Contra");

        return $approveinfo = $this->db->select('*,sum(Credit) as Credit,sum(Debit) as Debit')
            ->from('acc_transaction')
            ->where_in('Vtype', $values)
            ->where('IsAppove', 1)
            ->group_by('VNo')
            ->order_by('VDate', 'desc')
            ->get()
            ->result();
    }
    //approved
    public function approved($data = [])
    {
        return $this->db->where('VNo', $data['VNo'])
            ->update('acc_transaction', $data);
    }


    public function delete_voucher($voucher)
    {
        $this->db->where('VNo', $voucher)
            ->delete('acc_transaction');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    //debit update voucher
    public function dbvoucher_updata($id)
    {
        return  $vou_info = $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $id)
            ->where('Credit <', 1)
            ->get()
            ->result();
    }

    public function journal_updata($id)
    {
        return  $vou_info = $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $id)
            ->get()
            ->result_array();
    }

    //credit voucher update
    public function crdtvoucher_updata($id)
    {
        return  $vou_info = $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $id)
            ->where('Debit <', 1)
            ->get()
            ->result();
    }
    //Debit voucher inof

    public function debitvoucher_updata($id)
    {
        return $cr_info = $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $id)
            ->where('Credit<', 1)
            ->get()
            ->result_array();
    }
    // debit update voucher credit info
    public function crvoucher_updata($id)
    {
        return $v_info = $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $id)
            ->where('Debit<', 1)
            ->get()
            ->result_array();
    }

    // update Credit voucher
    public function update_creditvoucher()
    {
        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "CV";
        $dAID = $this->input->post('cmbDebit', TRUE);
        $cAID = $this->input->post('txtCode', TRUE);
        $Credit = $this->input->post('txtAmount', TRUE);
        $debit = $this->input->post('grand_total', TRUE);
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 0;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        $this->db->where('VNo', $voucher_no);
        $this->db->where('COAID', $dAID);
        $this->db->set('Debit', $debit);
        $this->db->update('acc_transaction');





        for ($i = 0; $i < count($dAID); $i++) {
            $dbtid = $cAID[$i];
            $Damnt = $Credit[$i];

            $this->db->where('VNo', $voucher_no);
            $this->db->where('COAID', $dbtid);
            $this->db->set('Credit', $Damnt);
            $this->db->update('acc_transaction');
        }

        return true;
    }

    //Trial Balance Report
    public function trial_balance_report()
    {

        //        if($WithOpening)
        //            $WithOpening=true;
        //        else
        //            $WithOpening=false;

        $sql = "SELECT * FROM acc_coa WHERE   IsActive=1 AND HeadType IN ('A','L') ORDER BY HeadCode";
        $oResultTr = $this->db->query($sql);

        $sql = "SELECT * FROM acc_coa WHERE   IsActive=1 AND HeadType IN ('I','E') ORDER BY HeadCode";
        $oResultInEx = $this->db->query($sql);

        $data = array(
            'oResultTr'   => $oResultTr->result_array(),
            'oResultInEx' => $oResultInEx->result_array(),
            // 'WithOpening' => $WithOpening
        );

        return $data;
    }


    public  function get_vouchar()
    {

        $date = date('Y-m-d');
        $sql = "SELECT *, VNo, Vtype,VDate, SUM(Debit+Credit)/2 as Amount FROM acc_transaction  WHERE VDate='$date' AND VType IN ('DV','JV','CV') GROUP BY VNO, Vtype, VDate ORDER BY VDate";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public  function get_vouchar_view($date)
    {
        $sql = "SELECT acc_income_expence.COAID,SUM(acc_income_expence.Amount) AS Amount, acc_coa.HeadName FROM acc_income_expence INNER JOIN acc_coa ON acc_coa.HeadCode=acc_income_expence.COAID WHERE Date='$date' AND acc_income_expence.IsApprove=1 AND acc_income_expence.Paymode='Cash' GROUP BY acc_income_expence.COAID, acc_coa.HeadName ORDER BY acc_coa.HeadName";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public  function get_cash()
    {
        $date = date('Y-m-d');


        $sql = "SELECT SUM(Debit) as Amount FROM acc_transaction WHERE VDate='$date' AND COAID ='1020101' AND VType NOT IN ('DV','JV','CV') AND IsAppove='1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function get_general_ledger()
    {

        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('IsGL', 1);
        $this->db->order_by('HeadName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function general_led_get($Headid)
    {

        $sql = "SELECT * FROM acc_coa WHERE HeadCode='$Headid' ";
        $query = $this->db->query($sql);
        $rs = $query->row();


        $sql = "SELECT * FROM acc_coa WHERE IsTransaction=1 AND PHeadName='" . $rs->HeadName . "' ORDER BY HeadName";
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function voucher_report_serach($vouchar)
    {
        $sql = "SELECT SUM(Debit) as Amount FROM acc_transaction WHERE VDate='$vouchar' AND COAID ='1020101' AND VType NOT IN ('DV','JV','CV') AND IsAppove='1'";
        $query = $this->db->query($sql);
        return $query->row();
    }


    public function general_led_report_headname($cmbGLCode)
    {
        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('HeadCode', $cmbGLCode);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function general_led_report_headname2($cmbGLCode, $cmbCode, $dtpFromDate, $dtpToDate, $chkIsTransction, $outlet_id)
    {

        if ($outlet_id != 1) {
            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $this->db->select('acc_transaction.Vtype, acc_transaction.VNo, acc_transaction.COAID, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit,acc_coa.HeadName,acc_transaction.IsAppove, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration,');
                $this->db->from('acc_transaction');
                $this->db->join('acc_coa', 'acc_transaction.COAID = acc_coa.HeadCode', 'left');
                $this->db->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left');
                $this->db->where('acc_transaction.IsAppove', 1);
                $this->db->where('VDate BETWEEN "' . $dtpFromDate . '" and "' . $dtpToDate . '"');
                if ($cmbCode == "Transaction Head") {
                    $this->db->like('acc_transaction.COAID', $cmbGLCode, 'after');
                } else {
                    $this->db->where('acc_transaction.COAID', $cmbCode);
                }
                $this->db->where('outlet_warehouse.id is NULL');
                $this->db->order_by('acc_transaction.VDate', 'desc');
            } else {
                $this->db->select('acc_transaction.Vtype, acc_transaction.VNo, acc_transaction.COAID, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit,acc_coa.HeadName,acc_transaction.IsAppove, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration,');
                $this->db->from('acc_transaction');
                $this->db->join('acc_coa', 'acc_transaction.COAID = acc_coa.HeadCode', 'left');
                $this->db->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left');
                $this->db->where('acc_transaction.IsAppove', 1);
                $this->db->where('VDate BETWEEN "' . $dtpFromDate . '" and "' . $dtpToDate . '"');
                if ($cmbCode == "Transaction Head") {
                    $this->db->like('acc_transaction.COAID', $cmbGLCode, 'after');
                } else {
                    $this->db->where('acc_transaction.COAID', $cmbCode);
                }
                $this->db->where('outlet_warehouse.outlet_id', $outlet_id);
                $this->db->order_by('acc_transaction.VDate', 'desc');
            }
        } else {
            $this->db->select('acc_transaction.Vtype, acc_transaction.VNo, acc_transaction.COAID, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit,acc_coa.HeadName,acc_transaction.IsAppove, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration,');
            $this->db->from('acc_transaction');
            $this->db->join('acc_coa', 'acc_transaction.COAID = acc_coa.HeadCode', 'left');
            $this->db->where('acc_transaction.IsAppove', 1);
            $this->db->where('VDate BETWEEN "' . $dtpFromDate . '" and "' . $dtpToDate . '"');
            if ($cmbCode == "Transaction Head") {
                $this->db->like('acc_transaction.COAID', $cmbGLCode, 'after');
            } else {
                $this->db->where('acc_transaction.COAID', $cmbCode);
            }
            $this->db->order_by('acc_transaction.VDate', 'desc');
        }


        $query = $this->db->get();
        return $query->result();
    }
    // prebalance calculation
    public function general_led_report_prebalance($cmbCode, $dtpFromDate, $outlet_id = null, $cmbGLCode = null)
    {

        if ($outlet_id == 1) {
            $this->db->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit');
            $this->db->from('acc_transaction');
            $this->db->where('acc_transaction.IsAppove', 1);
            $this->db->where('VDate < ', $dtpFromDate);
            if ($cmbCode == "Transaction Head") {
                $this->db->like('acc_transaction.COAID', $cmbGLCode, 'after');
            } else {
                $this->db->where('acc_transaction.COAID', $cmbCode);
            }
            $query = $this->db->get()->row();
        } else {

            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $this->db->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit');
                $this->db->from('acc_transaction');
                $this->db->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left');
                $this->db->where('acc_transaction.IsAppove', 1);
                $this->db->where('VDate < ', $dtpFromDate);
                if ($cmbCode == "Transaction Head") {
                    $this->db->like('acc_transaction.COAID', $cmbGLCode, 'after');
                } else {
                    $this->db->where('acc_transaction.COAID', $cmbCode);
                }
                $this->db->where('outlet_warehouse.id is NULL');
            } else {
                $this->db->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit');
                $this->db->from('acc_transaction');
                $this->db->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left');
                $this->db->where('acc_transaction.IsAppove', 1);
                $this->db->where('VDate < ', $dtpFromDate);
                if ($cmbCode == "Transaction Head") {
                    $this->db->like('acc_transaction.COAID', $cmbGLCode, 'after');
                } else {
                    $this->db->where('acc_transaction.COAID', $cmbCode);
                }
                $this->db->where('outlet_warehouse.id', $outlet_id);
            }
            $query = $this->db->get()->row();
        }


        return $balance = $query->predebit - $query->precredit;
    }

    public function get_status()
    {

        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('IsTransaction', 1);
        $this->db->like('HeadCode', '1020102', 'after');
        $this->db->order_by('HeadName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    //Profict loss report search
    //

    //Base Project profit loss
    //    public function profit_loss_serach(){
    //
    //        $sql="SELECT * FROM acc_coa WHERE acc_coa.HeadType='I'";
    //        $sql1 = $this->db->query($sql);
    //
    //        $sql="SELECT * FROM acc_coa WHERE acc_coa.HeadType='E'";
    //        $sql2 = $this->db->query($sql);
    //
    //        $data = array(
    //            'oResultAsset'     => $sql1->result(),
    //            'oResultLiability' => $sql2->result(),
    //        );
    //        return $data;
    //    }


    public function profit_loss_serach($outlet_id = null)
    {

        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet = $CI->Warehouse->get_outlet_user();


        if (!$outlet_id) {
            $outlet_id = $outlet[0]['outlet_id'];
        }

        if ($outlet_id != 1) {
            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $product_sale = $this->db->select('(sum(credit)-sum(debit)) as product_sale')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->where('COAID', 303)->get()->result_array();
                $indirect_income = $this->db->select('(sum(credit)-sum(debit)) as indirect_income')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->like('COAID', '3040')->get()->result_array();
                $service_income = $this->db->select('(sum(credit)-sum(debit)) as service_income')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->where('COAID', 304)->get()->result_array();
                $sale_return = $this->db->select('(sum(credit)-sum(debit)) as sale_return')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->where('Vtype', 'Return')->get()->result_array();

                $indirect_income_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.id IS NULL')->where('HeadType', 'I')->like('COAID', '3040')->group_by('a.HeadCode')->get()->result();


                $product_purchase = $this->db->select('(sum(debit)-sum(credit)) as product_purchase')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->where('COAID', 402)->get()->result_array();
                $opening_inventory = $this->db->select('(sum(debit)-sum(credit)) as opening_inventory')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->where('COAID', 10205)->get()->result_array();
                $direct_expense = $this->db->select('(sum(debit)-sum(credit)) as direct_expense')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->like('COAID', '4010')->get()->result_array();
                $indirect_expense = $this->db->select('(sum(debit)-sum(credit)) as indirect_expense')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.id IS NULL')->like('COAID', '4040')->get()->result_array();

                $expense = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.id IS NULL')->where('HeadType', 'E')->like('COAID', '4010')->group_by('a.HeadCode')->get()->result();
                $indirect_expense_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.id IS NULL')->where('HeadType', 'E')->like('COAID', '4040')->group_by('a.HeadCode')->get()->result();
            } else {

                $product_sale = $this->db->select('(sum(credit)-sum(debit)) as product_sale')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 303)->get()->result_array();
                $indirect_income = $this->db->select('(sum(credit)-sum(debit)) as indirect_income')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '3040')->get()->result_array();
                $service_income = $this->db->select('(sum(credit)-sum(debit)) as service_income')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 304)->get()->result_array();
                $sale_return = $this->db->select('(sum(credit)-sum(debit)) as sale_return')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('Vtype', 'Return')->get()->result_array();

                $indirect_income_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'I')->like('COAID', '3040')->group_by('a.HeadCode')->get()->result();


                $product_purchase = $this->db->select('(sum(debit)-sum(credit)) as product_purchase')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 402)->get()->result_array();
                $opening_inventory = $this->db->select('(sum(debit)-sum(credit)) as opening_inventory')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 10205)->get()->result_array();
                $direct_expense = $this->db->select('(sum(debit)-sum(credit)) as direct_expense')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '4010')->get()->result_array();
                $indirect_expense = $this->db->select('(sum(debit)-sum(credit)) as indirect_expense')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '4040')->get()->result_array();

                $expense = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'E')->like('COAID', '4010')->group_by('a.HeadCode')->get()->result();
                $indirect_expense_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'E')->like('COAID', '4040')->group_by('a.HeadCode')->get()->result();
            }
        } else {
            $product_sale = $this->db->select('(sum(credit)-sum(debit)) as product_sale')->from('acc_transaction')->where('COAID', 303)->get()->result_array();
            $indirect_income = $this->db->select('(sum(credit)-sum(debit)) as indirect_income')->from('acc_transaction')->like('COAID', '3040')->get()->result_array();
            $service_income = $this->db->select('(sum(credit)-sum(debit)) as service_income')->from('acc_transaction')->where('COAID', 304)->get()->result_array();
            $sale_return = $this->db->select('(sum(credit)-sum(debit)) as sale_return')->from('acc_transaction')->where('Vtype', 'Return')->get()->result_array();

            $indirect_income_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'I')->like('COAID', '3040')->group_by('a.HeadCode')->get()->result();


            $product_purchase = $this->db->select('(sum(debit)-sum(credit)) as product_purchase')->from('acc_transaction')->where('COAID', 402)->get()->result_array();
            $opening_inventory = $this->db->select('(sum(debit)-sum(credit)) as opening_inventory')->from('acc_transaction')->where('COAID', 10205)->get()->result_array();
            $direct_expense = $this->db->select('(sum(debit)-sum(credit)) as direct_expense')->from('acc_transaction')->like('COAID', '4010')->get()->result_array();
            $indirect_expense = $this->db->select('(sum(debit)-sum(credit)) as indirect_expense')->from('acc_transaction')->like('COAID', '4040')->get()->result_array();

            $expense = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'E')->like('COAID', '4010')->group_by('a.HeadCode')->get()->result();
            $indirect_expense_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'E')->like('COAID', '4040')->group_by('a.HeadCode')->get()->result();
        }


        //  $closing_inventory=$this->db->select('sum(grand_total_amount) as closing_inventory')->from('product_purchase')->get()->result_array();




        $data = array();
        $sl = 1;
        foreach ($expense as $i) {

            if ($outlet_id) {

                $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', $i->COAID)->get()->row();
            } else {
                $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();
            }
            $arr_ex[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }

        foreach ($indirect_expense_c as $i) {

            $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_ind_ex[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }
        foreach ($indirect_income_c as $i) {

            $amount = $this->db->select('sum(credit)-sum(debit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_ind_in[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }

        //
        $data = array(
            'product_sale' => $product_sale[0]['product_sale'],
            'opening_inventory' => $opening_inventory[0]['opening_inventory'],
            'product_purchase' => $product_purchase[0]['product_purchase'],
            // 'closing_inventory' =>$closing_inventory[0]['closing_inventory'],
            'service_income' => $service_income[0]['service_income'],
            'direct_expense' => $direct_expense[0]['direct_expense'],
            'indirect_expense' => $indirect_expense[0]['indirect_expense'],
            'indirect_income' => $indirect_income[0]['indirect_income'],
            'sale_return' => $sale_return[0]['sale_return'],
            'expense' => $arr_ex,
            'indirect_expense_c' => $arr_ind_ex,
            'indirect_income_c' => $arr_ind_in,


        );
        $sl++;

        return $data;
    }

    public function balance_sheet($outlet_id = null)
    {

        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet = $CI->Warehouse->get_outlet_user();


        if (!$outlet_id) {
            $outlet_id = $outlet[0]['outlet_id'];
        }

        if ($outlet_id) {
            $capital = $this->db->select('(sum(credit)-sum(debit)) as capital')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 2)->get()->result_array();
            $current_liabilities = $this->db->select('(sum(credit)-sum(debit)) as current_liabilities')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '5020')->get()->result_array();
            $non_current_liabilities = $this->db->select('(sum(credit)-sum(debit)) as non_current_liabilities')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '5010')->get()->result_array();
            $acc_pay = $this->db->select('(sum(credit)-sum(debit)) as acc_pay')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '502020')->get()->result_array();
            $emp_led = $this->db->select('(sum(credit)-sum(debit)) as emp_led')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '502040')->get()->result_array();
            $acc_pay_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'L')->like('COAID', '502020')->group_by('a.HeadCode')->get()->result();
            $emp_led_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'L')->like('COAID', '502040')->group_by('a.HeadCode')->get()->result();
            $non_current_liabilities_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'L')->like('COAID', '5010')->group_by('a.HeadCode')->get()->result();

            $fixed_assets = $this->db->select('(sum(debit)-sum(credit)) as fixed_assets')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '1030')->get()->result_array();

            $current_assets = $this->db->select('(sum(debit)-sum(credit)) as current_assets')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '1020')->get()->result_array();
            $current_assets_c = $this->db->select('*,(sum(b.debit)-sum(b.credit)) as total_debit')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '1020')->get()->result();
            $acc_rcv = $this->db->select('(sum(debit)-sum(credit)) as acc_rcv')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '102030')->get()->result_array();

            $acc_rcv_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '102030')->group_by('a.HeadCode')->get()->result();
            $cash_bank_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '10201020')->group_by('a.HeadCode')->get()->result();
            $cash_bkash_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '10201030')->group_by('a.HeadCode')->get()->result();

            $cash_nagad_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '10201040')->group_by('a.HeadCode')->get()->result();

            $fixed_assets_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '1030')->group_by('a.HeadCode')->get()->result();

            $cash_eq = $this->db->select('(sum(debit)-sum(credit)) as cash_eq')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '102010')->get()->result_array();
            $cash_hand = $this->db->select('(sum(debit)-sum(credit)) as cash_hand')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '1020101')->get()->result_array();
            $cash_bank = $this->db->select('(sum(debit)-sum(credit)) as cash_bank')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '1020102')->get()->result_array();
            $cash_bkash = $this->db->select('(sum(debit)-sum(credit)) as cash_bkash')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '1020103')->get()->result_array();

            $cash_nagad = $this->db->select('(sum(debit)-sum(credit)) as cash_nagad')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '1020103')->get()->result_array();


            $cash_eq_c = $this->db->select('*,(sum(b.debit)-sum(b.credit)) as total_debit')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '102010')->get()->result();
            $cash_hand_c = $this->db->select('*,(sum(b.debit)-sum(b.credit)) as total_debit')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'A')->like('COAID', '10201010')->get()->result();


            $product_sale = $this->db->select('sum(credit) as product_sale')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 303)->get()->result_array();
            $product_purchase = $this->db->select('sum(debit) as product_purchase')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 402)->get()->result_array();
            $opening_inventory = $this->db->select('sum(debit) as opening_inventory')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 10205)->get()->result_array();
            $direct_expense = $this->db->select('sum(Debit) as direct_expense')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '4010')->get()->result_array();

            $indirect_expense = $this->db->select('sum(Debit) as indirect_expense')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '4040')->get()->result_array();
            $indirect_income = $this->db->select('sum(Credit) as indirect_income')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->like('COAID', '3040')->get()->result_array();
            //  $closing_inventory=$this->db->select('sum(grand_total_amount) as closing_inventory')->from('product_purchase')->get()->result_array();
            $service_income = $this->db->select('sum(credit) as service_income')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('COAID', 304)->get()->result_array();
            $sale_return = $this->db->select('sum(credit) as sale_return')->from('acc_transaction')->join('outlet_warehouse', 'acc_transaction.CreateBy = outlet_warehouse.user_id', 'left')->where('outlet_warehouse.outlet_id', $outlet_id)->where('Vtype', 'Return')->get()->result_array();

            $expense = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'E')->like('COAID', '4010')->get()->result();
            $indirect_expense_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'E')->like('COAID', '4040')->get()->result();
            $indirect_income_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')->where('x.outlet_id', $outlet_id)->where('HeadType', 'I')->like('COAID', '3040')->get()->result();
        } else {
            $capital = $this->db->select('(sum(credit)-sum(debit)) as capital')->from('acc_transaction')->where('COAID', 2)->get()->result_array();
            $current_liabilities = $this->db->select('(sum(credit)-sum(debit)) as current_liabilities')->from('acc_transaction')->like('COAID', '5020')->get()->result_array();
            $non_current_liabilities = $this->db->select('(sum(credit)-sum(debit)) as non_current_liabilities')->from('acc_transaction')->like('COAID', '5010')->get()->result_array();
            $acc_pay = $this->db->select('(sum(credit)-sum(debit)) as acc_pay')->from('acc_transaction')->like('COAID', '502020')->get()->result_array();
            $emp_led = $this->db->select('(sum(credit)-sum(debit)) as emp_led')->from('acc_transaction')->like('COAID', '502040')->get()->result_array();
            $acc_pay_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'L')->like('COAID', '502020')->group_by('a.HeadCode')->get()->result();
            $emp_led_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'L')->like('COAID', '502040')->group_by('a.HeadCode')->get()->result();
            $non_current_liabilities_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'L')->like('COAID', '5010')->group_by('a.HeadCode')->get()->result();

            $fixed_assets = $this->db->select('(sum(debit)-sum(credit)) as fixed_assets')->from('acc_transaction')->like('COAID', '1030')->get()->result_array();

            $current_assets = $this->db->select('(sum(debit)-sum(credit)) as current_assets')->from('acc_transaction')->like('COAID', '1020')->get()->result_array();
            $current_assets_c = $this->db->select('*,(sum(b.debit)-sum(b.credit)) as total_debit')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '1020')->get()->result();
            $acc_rcv = $this->db->select('(sum(debit)-sum(credit)) as acc_rcv')->from('acc_transaction')->like('COAID', '102030')->get()->result_array();

            $acc_rcv_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '102030')->group_by('a.HeadCode')->get()->result();
            $cash_bank_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '10201020')->group_by('a.HeadCode')->get()->result();
            $cash_bkash_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '10201030')->group_by('a.HeadCode')->get()->result();

            $cash_nagad_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '10201040')->group_by('a.HeadCode')->get()->result();

            $fixed_assets_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '1030')->group_by('a.HeadCode')->get()->result();

            $cash_eq = $this->db->select('(sum(debit)-sum(credit)) as cash_eq')->from('acc_transaction')->like('COAID', '102010')->get()->result_array();
            $cash_hand = $this->db->select('(sum(debit)-sum(credit)) as cash_hand')->from('acc_transaction')->like('COAID', '1020101')->get()->result_array();
            $cash_bank = $this->db->select('(sum(debit)-sum(credit)) as cash_bank')->from('acc_transaction')->like('COAID', '1020102')->get()->result_array();
            $cash_bkash = $this->db->select('(sum(debit)-sum(credit)) as cash_bkash')->from('acc_transaction')->like('COAID', '1020103')->get()->result_array();

            $cash_nagad = $this->db->select('(sum(debit)-sum(credit)) as cash_nagad')->from('acc_transaction')->like('COAID', '1020103')->get()->result_array();


            $cash_eq_c = $this->db->select('*,(sum(b.debit)-sum(b.credit)) as total_debit')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '102010')->get()->result();
            $cash_hand_c = $this->db->select('*,(sum(b.debit)-sum(b.credit)) as total_debit')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'A')->like('COAID', '10201010')->get()->result();


            $product_sale = $this->db->select('sum(credit) as product_sale')->from('acc_transaction')->where('COAID', 303)->get()->result_array();
            $product_purchase = $this->db->select('sum(debit) as product_purchase')->from('acc_transaction')->where('COAID', 402)->get()->result_array();
            $opening_inventory = $this->db->select('sum(debit) as opening_inventory')->from('acc_transaction')->where('COAID', 10205)->get()->result_array();
            $direct_expense = $this->db->select('sum(Debit) as direct_expense')->from('acc_transaction')->like('COAID', '4010')->get()->result_array();

            $indirect_expense = $this->db->select('sum(Debit) as indirect_expense')->from('acc_transaction')->like('COAID', '4040')->get()->result_array();
            $indirect_income = $this->db->select('sum(Credit) as indirect_income')->from('acc_transaction')->like('COAID', '3040')->get()->result_array();
            //  $closing_inventory=$this->db->select('sum(grand_total_amount) as closing_inventory')->from('product_purchase')->get()->result_array();
            $service_income = $this->db->select('sum(credit) as service_income')->from('acc_transaction')->where('COAID', 304)->get()->result_array();
            $sale_return = $this->db->select('sum(credit) as sale_return')->from('acc_transaction')->where('Vtype', 'Return')->get()->result_array();

            $expense = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'E')->like('COAID', '4010')->get()->result();
            $indirect_expense_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'E')->like('COAID', '4040')->get()->result();
            $indirect_income_c = $this->db->select('*')->from('acc_coa a')->join('acc_transaction b', 'a.HeadCode=b.COAID')->where('HeadType', 'I')->like('COAID', '3040')->get()->result();
        }

        $data = array();
        $sl = 1;
        foreach ($acc_pay_c as $i) {

            $amount = $this->db->select('sum(credit)-sum(debit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_ac_pay[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }
        foreach ($emp_led_c as $i) {

            $amount = $this->db->select('sum(credit)-sum(debit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_em_led[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }
        foreach ($non_current_liabilities_c as $i) {

            $amount = $this->db->select('sum(credit)-sum(debit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_ncl[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }

        foreach ($acc_rcv_c as $i) {

            $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_ac_rcv[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }
        foreach ($cash_bank_c as $i) {

            $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_cash_bank[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }

        foreach ($cash_bkash_c as $i) {

            $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_cash_bkash[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }


        foreach ($cash_nagad_c as $i) {

            $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_cash_nagad[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }

        foreach ($fixed_assets_c as $i) {

            $amount = $this->db->select('sum(debit)-sum(credit) as amount')->from('acc_transaction')->where('COAID', $i->COAID)->get()->row();


            $arr_fixed_assets[] = array(
                'HeadName' => $i->HeadName,
                'amount' => $amount->amount


            );
        }
        //
        $data = array(
            'product_sale' => $product_sale[0]['product_sale'],
            'opening_inventory' => $opening_inventory[0]['opening_inventory'],
            'product_purchase' => $product_purchase[0]['product_purchase'],
            // 'closing_inventory' =>$closing_inventory[0]['closing_inventory'],
            'service_income' => $service_income[0]['service_income'],
            'direct_expense' => $direct_expense[0]['direct_expense'],
            'indirect_expense' => $indirect_expense[0]['indirect_expense'],
            'indirect_income' => $indirect_income[0]['indirect_income'],
            'sale_return' => $sale_return[0]['sale_return'],
            'expense' => $expense,
            'indirect_expense_c' => $indirect_expense_c,
            'indirect_income_c' => $indirect_income_c,




            'capital' => $capital[0]['capital'],
            'current_liabilities' => $current_liabilities[0]['current_liabilities'],
            'acc_pay_c' => $arr_ac_pay,
            'non_current_liabilities' => $non_current_liabilities[0]['non_current_liabilities'],
            'non_current_liabilities_c' => $arr_ncl,
            'fixed_assets' => $fixed_assets[0]['fixed_assets'],
            'fixed_assets_c' => $arr_fixed_assets,

            'current_assets' => $current_assets[0]['current_assets'],
            'current_assets_c' => $current_assets_c,
            'acc_rcv' => $acc_rcv[0]['acc_rcv'],
            'acc_pay' => $acc_pay[0]['acc_pay'],
            'emp_led' => $emp_led[0]['emp_led'],
            'cash_eq' => $cash_eq[0]['cash_eq'],
            'cash_hand' => $cash_hand[0]['cash_hand'],
            'cash_bank' => $cash_bank[0]['cash_bank'],
            'cash_bkash' => $cash_bkash[0]['cash_bkash'],
            'cash_nagad' => $cash_nagad[0]['cash_nagad'],
            'cash_eq_c' => $cash_eq_c,
            'cash_hand_c' => $cash_hand_c,
            'cash_bank_c' => $arr_cash_bank,
            'cash_bkash_c' => $arr_cash_bkash,
            'cash_nagad_c' => $arr_cash_nagad,
            'emp_led_c' => $arr_em_led,
            'acc_rcv_c' => $arr_ac_rcv,
        );
        $sl++;

        return $data;
    }


    public function fixed_assets()
    {
        return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName', 'Assets')
            ->get()
            ->result_array();
    }
    public function liabilities_data()
    {
        return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName', 'Liabilities')
            ->get()
            ->result_array();
    }

    public function income_fields()
    {
        return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName', 'Income')
            ->get()
            ->result_array();
    }

    public function expense_fields()
    {
        return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName', 'Expence')
            ->get()
            ->result_array();
    }

    public function balance_sheet_search($outlet_id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet = $CI->Warehouse->get_outlet_user();


        if (!$outlet_id) {
            $outlet_id = $outlet[0]['outlet_id'];
        }


        $sql = "SELECT * FROM acc_coa WHERE acc_coa.HeadType='A'";
        $sql3 = $this->db->query($sql);

        $sql = "SELECT * FROM acc_coa WHERE acc_coa.HeadType='L' ";
        //$sql="SELECT * FROM acc_coa WHERE acc_coa.HeadType='I'";
        $sql2 = $this->db->query($sql);

        $sql = "SELECT * FROM acc_coa WHERE acc_coa.HeadType='I'";
        $sql1 = $this->db->query($sql);

        $sql = "SELECT * FROM acc_coa WHERE acc_coa.HeadType='E'";
        $sql4 = $this->db->query($sql);

        if ($outlet_id) {
            $total = $this->db->select('a.*,sum(b.Debit) as total_debit,sum(b.Credit) as total_credit')->from('acc_coa a')
                ->join('acc_transaction b', 'b.COAID = a.HeadCode')
                ->join('outlet_warehouse x', 'b.CreateBy = x.user_id', 'left')
                ->where('a.IsTransaction', 1)
                // ->where('a.IsGL', 1)
                ->where('x.outlet_id', $outlet_id)
                ->get()->result_array();
        } else {
            $total = $this->db->select('a.*,sum(b.Debit) as total_debit,sum(b.Credit) as total_credit')->from('acc_coa a')
                ->where('a.IsTransaction', 1)
                // ->where('a.IsGL', 1)
                ->join('acc_transaction b', 'b.COAID = a.HeadCode')
                ->get()->result_array();
        }

        $data = array(

            'oResultIncome' => $sql1->result(),
            'oResultExpence' => $sql4->result(),
            'oResultAsset'     => $sql3->result(),
            'oResultLiability' => $sql2->result(),
            'total' => $total,
        );

        // echo '<pre>';print_r($data);exit();
        return $data;
    }

    public function trial_balance_new()
    {


        $coa = $this->db->select('*')->from('acc_coa')->where('HeadLevel', '0')->get()->result_array();
        $assets = $this->db->select('a.*,sum(b.Debit) as total_debit,sum(b.Credit) as total_credit')->from('acc_coa a')
            ->join('acc_transaction b', 'b.COAID = a.HeadCode')
            ->group_by('b.COAID')
            ->get()->result_array();


        $data = array(

            'oResultCoa'     => $coa,
            'oResultAssets'     => $assets,

        );

        // echo '<pre>';print_r($data);exit();
        return $data;
    }
    public function profit_loss_serach_date($dtpFromDate, $dtpToDate)
    {
        $sqlF = "SELECT  acc_transaction.VDate, acc_transaction.COAID, acc_coa.HeadName FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND acc_transaction.IsAppove = 1 AND  acc_transaction.COAID LIKE '301%'";
        $query = $this->db->query($sqlF);
        return $query->result();
    }

    public function treeview_selectform($id)
    {
        $data = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode', $id)
            ->get()
            ->row();
        return $data;
    }
    public function get_supplier()
    {
        $this->db->select('*');
        $this->db->from('supplier_information');
        $this->db->where('status', 1);
        $this->db->order_by('supplier_id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    // Customer list
    public function get_customer()
    {
        $this->db->select('*');
        $this->db->from('customer_information');
        $query = $this->db->get();
        return $query->result();
    }

    public function Spayment()
    {
        return  $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'PM-', 'after')
            ->order_by('ID', 'desc')
            ->get()
            ->result_array();
    }
    // customer code
    public function Creceive()
    {
        return  $data = $this->db->select("VNo as voucher")
            ->from('acc_transaction')
            ->like('VNo', 'CR-', 'after')
            ->order_by('ID', 'desc')
            ->get()
            ->result_array();
    }
    public function supplier_payment_insert()
    {

        // echo '<pre>';
        // print_r($_POST);
        // exit();

        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);

        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }

        // print_r($bankcoaid);
        // exit();

        $this->load->model('Web_settings');
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype = "PM";
        $cAID = $this->input->post('cmbDebit', TRUE);
        $dAID = $this->input->post('txtCode', TRUE);
        $Debit = $this->input->post('txtAmount', TRUE);
        $Credit = 0;
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 1;
        $sup_id = $this->input->post('supplier_id', TRUE);

        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        $dbtid = $dAID;
        $Damnt = $Debit;
        $supplier_id = $sup_id;
        $supinfo = $this->db->select('*')->from('supplier_information')->where('supplier_id', $supplier_id)->get()->row();
        $supplierdebit = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $dbtid,
            'Narration'      =>  $Narration,
            'Debit'          =>  $Damnt,
            'Credit'         =>  0,
            'IsPosted'       => $IsPosted,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  1020101,
            'Narration'      =>  'Paid to ' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $Damnt,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );
        $bankc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Supplier Payment To ' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $Damnt,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        // print_r($bankc);
        // exit();

        if (!empty($bkash_id)) {
            $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id)->get()->row()->bkash_no;

            $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
        } else {
            $bkashcoaid = '';
        }

        $bkashc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  'Supplier Payment To ' . $supinfo->supplier_name,
            'Credit'          =>  $Damnt,
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,

        );

        if (!empty($nagad_id)) {
            $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id)->get()->row()->nagad_no;

            $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
        } else {
            $nagadcoaid = '';
        }

        $nagadc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  'Supplier Payment To ' . $supinfo->supplier_name,
            'Credit'          =>  $Damnt,
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,
        );


        $this->db->insert('acc_transaction', $supplierdebit);

        if ($this->input->post('paytype', TRUE) == 4) {
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($this->input->post('paytype', TRUE) == 1) {
            $this->db->insert('acc_transaction', $cc);
        }
        if ($this->input->post('paytype', TRUE) == 3) {
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($this->input->post('paytype', TRUE) == 5) {
            $this->db->insert('acc_transaction', $nagadc);
        }
        $this->session->set_flashdata('message', display('save_successfully'));
        redirect('accounts/supplier_paymentreceipt/' . $supplier_id . '/' . $voucher_no . '/' . $dbtid);
    }

    public function insert_cashadjustment()
    {
        $this->load->model('Web_settings');
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $voucher_no       = $this->input->post('txtVNo', TRUE);
        $Vtype           = "AD";
        $amount          = $this->input->post('txtAmount', TRUE);
        $type            = $this->input->post('type', TRUE);
        if ($type == 1) {
            $debit = $amount;
            $credit = 0;
        }
        if ($type == 2) {
            $debit = 0;
            $credit = $amount;
        }
        $VDate = $this->input->post('dtpDate', TRUE);
        $Narration = $this->input->post('txtRemarks', TRUE);
        $IsPosted = 1;
        $IsAppove = 1;
        $CreateBy = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');

        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  1020101,
            'Narration'      =>  $Narration,
            'Debit'          =>  $debit,
            'Credit'         =>  $credit,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        $this->db->insert('acc_transaction', $cc);

        return true;
    }

    public function supplierinfo($supplier_id)
    {
        return $this->db->select('*')
            ->from('supplier_information')
            ->where('supplier_id', $supplier_id)
            ->get()
            ->result_array();
    }

    public function supplierpaymentinfo($voucher_no, $coaid)
    {
        return   $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $voucher_no)
            ->where('COAID', $coaid)
            ->get()
            ->result_array();
    }

    public function customer_receive_insert()
    {

        $CI = &get_instance();

        $CI->load->model('Settings');

        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);

        $bank_id = $this->input->post('bank_id', TRUE);
        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }
        $this->load->model('Web_settings');
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $voucher_no       = addslashes(trim($this->input->post('txtVNo', TRUE)));
        $Vtype           = "CR";
        $cAID            = $this->input->post('cmbDebit', TRUE);
        $dAID            = $this->input->post('txtCode', TRUE);
        $Debit           = 0;
        $Credit          = $this->input->post('txtAmount', TRUE);
        $VDate           = $this->input->post('dtpDate', TRUE);
        $customer_id     = $this->input->post('customer_id', TRUE);
        $Narration       = addslashes(trim($this->input->post('txtRemarks', TRUE)));
        $IsPosted = 1;
        $IsAppove = 1;
        $CreateBy        = $this->session->userdata('user_id');
        $createdate      = date('Y-m-d H:i:s');
        $dbtid           = $dAID;
        $Credit          = $Credit;
        $customerid      = $customer_id;
        $customerinfo = $this->db->select('*')->from('customer_information')->where('customer_id', $customerid)->get()->row();
        $customercredit = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $VDate,
            'COAID'          =>  $dbtid,
            'Narration'      =>  $Narration,
            'Debit'          =>  0,
            'Credit'         =>  $Credit,
            'IsPosted'       => $IsPosted,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 0
        );

        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand For  ' . $customerinfo->customer_name,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0
        );
        $bankc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Customer Receive From ' . $customerinfo->customer_name,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0
        );

        if (!empty($bkash_id)) {
            $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id)->get()->row()->bkash_no;

            $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
        } else {
            $bkashcoaid = '';
        }
        $bkashc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  'Customer Receive in BKash From ' . $customerinfo->customer_name,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,

        );

        if (!empty($nagad_id)) {
            $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id)->get()->row()->nagad_no;

            $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
        } else {
            $nagadcoaid = '';
        }

        $nagadc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  'Customer Receive in Nagad From ' . $customerinfo->customer_name,
            'Debit'          =>  $Credit,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,
        );

        $card_id = $this->input->post('card_id', TRUE);
        $card_info = $CI->Settings->get_real_card_data($card_id);

        if (!empty($card_id)) {
            $card_bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $card_info[0]['bank_id'])->get()->row()->bank_name;

            $card_bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $card_bankname)->get()->row()->HeadCode;
        } else {
            $card_bankcoaid = '';
        }
        $cardc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  $card_bankcoaid,
            'Narration'      =>  'Customer Receive in Bank From ' . $customerinfo->customer_name,
            'Debit'          => ($Credit) - ($Credit * ($card_info[0]['percentage'] / 100)),
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  0,

        );

        $expdebit = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $createdate,
            'COAID'          =>  '40404',
            'Narration'      =>  'Expense Debit for card no. ' . $card_info[0]['card_no'] . ' Voucher NO- ' . $voucher_no,
            'Debit'          =>  $Credit * ($card_info[0]['percentage'] / 100),
            'Credit'         =>  0,
            'IsPosted'       => 1,
            'CreateBy'       => $CreateBy,
            'CreateDate'     => $createdate,
            'IsAppove'       => 0
        );


        $this->db->insert('acc_transaction', $customercredit);
        if ($this->input->post('paytype', TRUE) == 4) {
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($this->input->post('paytype', TRUE) == 1) {
            $this->db->insert('acc_transaction', $cc);
        }
        if ($this->input->post('paytype', TRUE) == 3) {
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($this->input->post('paytype', TRUE) == 5) {
            $this->db->insert('acc_transaction', $nagadc);
        }
        if ($this->input->post('paytype', TRUE) == 6) {
            $this->db->insert('acc_transaction', $cardc);
            $this->db->insert('acc_transaction', $expdebit);
        }

        // $message = 'Mr.' . $customerinfo->customer_name . ',
        // ' . 'You have Paid ' . $Credit . ' ' . $currency_details[0]['currency'];

        // $config_data = $this->db->select('*')->from('sms_settings')->get()->row();
        // if ($config_data->isreceive == 1) {
        //     $this->smsgateway->send([
        //         'apiProvider' => 'nexmo',
        //         'username'    => $config_data->api_key,
        //         'password'    => $config_data->api_secret,
        //         'from'        => $config_data->from,
        //         'to'          => $customerinfo->customer_mobile,
        //         'message'     => $message
        //     ]);
        // }

        $this->session->set_flashdata('message', display('save_successfully'));
        redirect('accounts/customer_receipt/' . $customerid . '/' . $voucher_no . '/' . $dbtid);
    }


    public function custoinfo($customer_id)
    {
        return $this->db->select('*')
            ->from('customer_information')
            ->where('customer_id', $customer_id)
            ->get()
            ->result_array();
    }

    public function customerreceiptinfo($voucher_no, $coaid)
    {
        return   $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $voucher_no)
            ->where('COAID', $coaid)
            ->get()
            ->result_array();
    }
    // =================== Settings data ==============================
    public function software_setting_info()
    {
        $this->db->select('*');
        $this->db->from('web_setting');
        $this->db->where('setting_id', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }


    public function bankbook_firstqury($FromDate, $HeadCode, $outlet_id)
    {
        if ($outlet_id) {
            $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
            LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
              WHERE VDate < '$FromDate' AND COAID = '$HeadCode' AND outlet_warehouse.outlet_id = '$outlet_id' AND IsAppove =1 GROUP BY IsAppove, COAID";
        } else {

            $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
              WHERE VDate < '$FromDate' AND COAID = '$HeadCode' AND IsAppove =1 GROUP BY IsAppove, COAID";
        }
        return  $sql;
    }

    public function bankbook_secondqury($FromDate, $HeadCode, $ToDate, $outlet_id)
    {
        if ($outlet_id != 1) {
            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration, acc_transaction.CreateBy FROM acc_transaction
            LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
            INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
         WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID='$HeadCode' AND outlet_warehouse.id IS NULL ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
            } else {

                $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration, acc_transaction.CreateBy FROM acc_transaction
            LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
            INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
         WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID='$HeadCode' AND outlet_warehouse.outlet_id = '$outlet_id' ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
            }
        } else {
            $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration, acc_transaction.CreateBy
     FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
         WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID='$HeadCode' ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
        }
        return $sql;
    }

    public function cashbook_firstqury($FromDate, $HeadCode, $outlet_id)
    {

        if ($outlet_id) {

            $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
                LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
              WHERE VDate > '$FromDate' AND COAID LIKE '$HeadCode%' AND IsAppove =1 AND outlet_warehouse.outlet_id = '$outlet_id' GROUP BY IsAppove, COAID";
        } else {

            $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
              WHERE VDate > '$FromDate' AND COAID LIKE '$HeadCode%' AND IsAppove =1 GROUP BY IsAppove, COAID";
        }
        return  $sql;
    }


    public function cashbook_secondqury($FromDate, $HeadCode, $ToDate, $outlet_id)
    {


        if ($outlet_id != 1) {
            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $sql = "SELECT acc_transaction.ID,acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
                FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
                LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
                WHERE acc_transaction.IsAppove =1 AND acc_transaction.VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID  LIKE '$HeadCode%' AND outlet_warehouse.id IS NULL GROUP BY acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
               HAVING SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit)<>0
               ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
            } else {
                $sql = "SELECT acc_transaction.ID,acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
        FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
        LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
        WHERE acc_transaction.IsAppove =1 AND acc_transaction.VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID  LIKE '$HeadCode%' AND outlet_warehouse.outlet_id = '$outlet_id' GROUP BY acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
               HAVING SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit)<>0
               ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
            }
        } else {
            $sql = "SELECT acc_transaction.ID,acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
        FROM acc_transaction JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
        WHERE acc_transaction.IsAppove =1 AND acc_transaction.VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID LIKE '$HeadCode%' GROUP BY acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
               HAVING SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit)<>0
               ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
        }

        return $sql;
    }


    public function inventoryledger_firstqury($FromDate, $HeadCode, $outlet_id)
    {
        if ($outlet_id) {
            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
            LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
              WHERE VDate < '$FromDate' AND COAID = '$HeadCode' AND outlet_warehouse.id IS NULL AND IsAppove =1 GROUP BY IsAppove, COAID";
            } else {
                $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
            LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
              WHERE VDate < '$FromDate' AND COAID = '$HeadCode' AND outlet_warehouse.outlet_id = '$outlet_id' AND IsAppove =1 GROUP BY IsAppove, COAID";
            }
        } else {
            $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction
              WHERE VDate < '$FromDate' AND COAID = '$HeadCode' AND IsAppove =1 GROUP BY IsAppove, COAID";
        }
        return  $sql;
    }


    public function inventoryledger_secondqury($FromDate, $HeadCode, $ToDate, $outlet_id)
    {
        if ($outlet_id != 1) {
            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration FROM acc_transaction
            LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
            INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
              WHERE VDate > '$FromDate' AND VDATE < '$ToDate' AND COAID = '$HeadCode' AND outlet_warehouse.id IS NULL AND IsAppove =1 GROUP BY IsAppove, COAID";
            } else {
                $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration FROM acc_transaction
            LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
            INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
            WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID='$HeadCode' AND outlet_warehouse.outlet_id = '$outlet_id' ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
            }
        } else {
            $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration
            FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode
            WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID='$HeadCode' ORDER BY  acc_transaction.VDate, acc_transaction.VNo";
        }
        return  $sql;
    }


    public function trial_balance_firstquery($dtpFromDate, $dtpToDate, $COAID)
    {
        $sql = "SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '" . $dtpFromDate . "' AND '" . $dtpToDate . "' AND COAID LIKE '$COAID%' ";
        return $sql;
    }


    public function trial_balance_secondquery($dtpFromDate, $dtpToDate, $COAID)
    {
        $sql = "SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '" . $dtpFromDate . "' AND '" . $dtpToDate . "' AND COAID LIKE '$COAID%' ";

        return $sql;
    }

    public function profitloss_firstquery($dtpFromDate, $dtpToDate, $COAID)
    {

        $sql = "SELECT SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE  COAID LIKE '$COAID%'";

        return $sql;
    }
    public function profitloss_secondquery($dtpFromDate, $dtpToDate, $COAID)
    {
        $sql = "SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND  COAID LIKE '$COAID%'";

        return $sql;
    }

    public function trial_firstquery($dtpFromDate, $dtpToDate, $COAID)
    {

        $sql = "SELECT SUM(acc_transaction.Debit) as total_debit FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_coa.IsActive = 1 AND COAID LIKE '$COAID%'";

        return $sql;
    }

    public function trial_secondquery($dtpFromDate, $dtpToDate, $COAID, $outlet_id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet = $CI->Warehouse->get_outlet_user();


        if (!$outlet_id) {
            $outlet_id = $outlet[0]['outlet_id'];
        }
        if ($outlet_id != 1) {
            if ($outlet_id == 'HK7TGDT69VFMXB7') {
                $sql = "SELECT SUM(acc_transaction.Credit) as total_credit , SUM(acc_transaction.Debit) as total_debit FROM acc_transaction LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
                INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND outlet_warehouse.id IS NULL AND acc_coa.IsActive = 1 AND  COAID LIKE '$COAID%'";
            } else {
                $sql = "SELECT SUM(acc_transaction.Credit) as total_credit , SUM(acc_transaction.Debit) as total_debit FROM acc_transaction LEFT JOIN outlet_warehouse ON acc_transaction.CreateBy = outlet_warehouse.user_id
            INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND outlet_warehouse.outlet_id = '$outlet_id' AND acc_coa.IsActive = 1 AND  COAID LIKE '$COAID%'";
            }
        } else {
            $sql = "SELECT SUM(acc_transaction.Credit) as total_credit , SUM(acc_transaction.Debit) as total_debit FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND acc_coa.IsActive = 1 AND  COAID LIKE '$COAID%'";
        }

        return $sql;
    }


    public function cashflow_firstquery()
    {
        $sql = "SELECT * FROM acc_coa WHERE acc_coa.IsTransaction=1 AND acc_coa.HeadType='A' AND acc_coa.IsActive=1 AND acc_coa.HeadCode LIKE '1020101%'";

        return $sql;
    }

    public function cashflow_secondquery($dtpFromDate, $dtpToDate, $COAID)
    {
        $sql = "SELECT SUM(acc_transaction.Debit)- SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '" . $dtpFromDate . "' AND '" . $dtpToDate . "' AND COAID LIKE '$COAID%'";

        return $sql;
    }

    public function cashflow_thirdquery()
    {
        $sql = "SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '102%' AND IsActive=1 AND HeadCode NOT LIKE '1020101%' AND HeadCode!='102' ";

        return $sql;
    }

    public function cashflow_forthquery($dtpFromDate, $dtpToDate, $COAID)
    {
        $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '" . $dtpFromDate . "' AND '" . $dtpToDate . "' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";

        return $sql;
    }


    public function cashflow_fifthquery($dtpFromDate, $dtpToDate, $COAID)
    {
        $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '" . $dtpFromDate . "' AND '" . $dtpToDate . "' AND COAID LIKE '4%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";

        return $sql;
    }


    public function cashflow_sixthquery()
    {
        $sql = "SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '3%' AND IsActive=1 ";
        return $sql;
    }

    public function cashflow_seventhquery($dtpFromDate, $dtpToDate, $COAID)
    {
        $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '" . $dtpFromDate . "' AND '" . $dtpToDate . "' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";
        return $sql;
    }

    public function get_v_details($v_no)
    {
        $res = $this->db->select('a.*, b.HeadName')
            ->from('acc_transaction a')
            ->where('a.VNo', $v_no)
            ->join('acc_coa b', 'b.HeadCode = a.COAID')
            ->get()
            ->result_array();

        return $res;
    }

    public function get_the_head_aginst($v_no, $cred_deb = null) //Accepts 'Credit' or 'Debit'
    {
        $this->db->select('b.HeadName')
            ->from('acc_transaction a')
            ->join('acc_coa b', 'a.COAID = b.HeadCode')
            ->where('a.VNO', $v_no);
        if ($cred_deb)
            $this->db->where('a.' . $cred_deb . ' >', 0);

        $res = $this->db->get();

        // echo '<pre>';
        // print_r($res->result_array());
        if ($res->num_rows() > 0) {
            return $res->result_array();
        }

        return false;
    }

    public function get_all_expense($from_date = null, $to_date = null, $outlet_id = null)
    {

        $oneMnthAgo = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
        $today = date("Y-m-d");

        $this->db->select('a.*, SUM(a.Debit) as tot_dr, b.HeadName')
            ->from('acc_transaction a')
            ->join('acc_coa b', 'b.HeadCode = a.COAID', 'left')
            ->where('b.HeadType', 'E')
            ->group_by('a.COAID')
            ->order_by('a.VDate', 'desc');

        if ($from_date && $to_date) {
            $this->db->where('a.VDate >=', $from_date);
            $this->db->where('a.VDate <=', $to_date);
        } elseif ($from_date && !$to_date) {
            $this->db->where('a.VDate >=', $from_date);
        } elseif (!$from_date && $to_date) {
            $this->db->where('a.VDate <=', $to_date);
        } else {
            $this->db->where('a.VDate >=', $oneMnthAgo);
            $this->db->where('a.VDate <=', $today);
        }

        if ($outlet_id) {
            if (!($outlet_id == "HK7TGDT69VFMXB7")) {
                $this->db->join('outlet_warehouse o', 'o.user_id = a.CreateBy', 'left');
                $this->db->where('o.outlet_id', $outlet_id);
            } else {
                $this->db->join('outlet_warehouse o', 'o.user_id = a.CreateBy', 'left');
                $this->db->where('o.outlet_id is NULL');
            }
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;
    }

    public function checkIsGL($HeadCode)
    {
        $q = $this->db->select('isGL')
            ->from('acc_coa')
            ->where('HeadCode', $HeadCode)
            ->get()->result();

        if ($q[0]->isGL == 1) {
            return true;
        }

        return false;
    }

    public function getHeadCode($HeadCode)
    {
        $q = $this->db->select('PHeadName')
            ->from('acc_coa')
            ->where('HeadCode', $HeadCode)
            ->get()
            ->result();

        $head = $this->db->select('HeadCode')
            ->from('acc_coa')
            ->where('HeadName', $q[0]->PHeadName)
            ->get()
            ->result();

        return $head[0]['HeadCode'];
    }

    public function getAllTransUnderAHead($COAID)
    {
        $this->db->select('acc_transaction.*, acc_coa.HeadName, sum(acc_transaction.Debit) as tot_dr, sum(acc_transaction.Credit) as tot_cr')
            ->from('acc_transaction')
            ->like('COAID', $COAID, 'after')
            ->join('acc_coa', 'acc_transaction.COAID = acc_coa.HeadCode')
            ->group_by('acc_transaction.COAID');

        $q = $this->db->get();

        if ($q->num_rows() > 0) {
            return $q->result_array();
        }

        return false;
    }

    public function cost_of_good_manufactured()
    {
        $this->load->model('Accounts_model');
        $this->load->model('Purchases');
        $this->load->model('products');
        $this->load->model('reports');
        $this->load->model('Invoices');

        $raw_mat_purchase = $this->Purchases->get_total_purchase_amount(2)[0]['all_total'];
        $tools_purchase = $this->Purchases->get_total_purchase_amount(3)[0]['all_total'];

        $raw_opening_inventory = $this->Purchases->get_opening_stock_value(2)[0]['all_open_total'];
        $tools_opening_inventory = $this->Purchases->get_opening_stock_value(3)[0]['all_open_total'];

        $all_raw_mat = $this->products->all_product_list(2, 1);
        $all_tools = $this->products->all_product_list(3, 1);

        $raw_closing_stock = 0;
        $tools_closing_stock = 0;

        foreach ($all_raw_mat as $raw) {
            $raw_closing_stock += $this->reports->getCheckList(null, $raw['product_id'])['pprice'];
        }

        foreach ($all_tools as $tools) {
            $tools_closing_stock += $this->reports->getCheckList(null, $tools['product_id'])['pprice'];
        }


        $total_raw_in = $raw_mat_purchase + $raw_opening_inventory;
        $total_tools_in = $tools_purchase + $tools_opening_inventory;

        $total_raw_consumed = $total_raw_in - $raw_closing_stock;
        $total_tools_consumed = $total_tools_in - $tools_closing_stock;

        $production_expenses = $this->Accounts_model->getAllTransUnderAHead('40105');

        $total_production_expenses = 0;

        foreach ($production_expenses as $pr_exp) {
            $total_production_expenses += $pr_exp['Debit'];
        }

        $prime_cost = $total_raw_consumed + $total_tools_consumed + $total_production_expenses;

        $factory_operating_expenses = $this->Accounts_model->getAllTransUnderAHead('40101');

        $total_factory_op_exp = 0;

        foreach ($factory_operating_expenses as $fact_exp) {
            $total_factory_op_exp += $fact_exp['Debit'];
        }

        $cost_of_good_manufactured = $prime_cost + $total_factory_op_exp;

        $data = array(
            'raw_mat_purchase'  => ($raw_mat_purchase ? number_format($raw_mat_purchase, 2) : '0.00'),
            'tools_purchase'  => ($tools_purchase ? number_format($tools_purchase, 2) : '0.00'),
            'raw_opening_inventory' => ($raw_opening_inventory ? number_format($raw_opening_inventory, 2) : '0.00'),
            'tool_opening_inventory' => ($tools_opening_inventory ? number_format($tools_opening_inventory, 2) : '0.00'),
            'raw_closing_stock'     => $raw_closing_stock ? number_format($raw_closing_stock, 2) : '0.00',
            'tools_closing_stock'     => $tools_closing_stock ? number_format($tools_closing_stock, 2) : '0.00',
            'total_raw_in'         => $total_raw_in ? number_format($total_raw_in, 2) : '0.00',
            'total_tools_in'         => $total_tools_in ? number_format($total_tools_in, 2) : '0.00',
            'total_raw_consumed'  => $total_raw_consumed ? number_format($total_raw_consumed, 2) : '0.00',
            'total_tools_consumed'  => $total_tools_consumed ? number_format($total_tools_consumed, 2) : '0.00',
            'production_exp'        => $production_expenses,
            'total_production_exp'  => $total_production_expenses ? number_format($total_production_expenses, 2) : '0.00',
            'prime_cost'            => $prime_cost ? number_format($prime_cost, 2) : '0.00',
            'factory_exp'           => $factory_operating_expenses,
            'total_factory_op_exp'  => $total_factory_op_exp ? number_format($total_factory_op_exp, 2) : '0.00',
            'cost_of_goods_mfd'     => $cost_of_good_manufactured ? number_format($cost_of_good_manufactured, 2) : '0.00',
        );

        return $data;
    }
}
