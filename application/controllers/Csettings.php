<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Csettings extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->db->query('SET SESSION sql_mode = ""');
    $this->load->library('lsettings');
    $this->load->library('auth');
    $this->load->library('session');
    $this->load->model('Settings');
    $this->auth->check_admin_auth();
    $this->load->model('Web_settings');
  }

  public function index()
  {
    $CI = &get_instance();
    $CI->load->model('Warehouse');
    $outlet_list = $CI->Warehouse->cw_and_outlet_merged();
    $signed_outlet = $CI->Warehouse->get_outlet_user();

    $signed_outlet_id = '';

    if ($signed_outlet) {
      $signed_outlet_id = $signed_outlet[0]['outlet_id'];
    }

    $data = [
      'title' => display('add_new_bank'),
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    ];
    $content = $this->parser->parse('settings/new_bank', $data, true);
    $this->template->full_admin_html_view($content);
  }

  public function rocket()
  {
    $CI = &get_instance();
    $CI->load->model('Warehouse');
    $outlet_list = $CI->Warehouse->cw_and_outlet_merged();
    $signed_outlet = $CI->Warehouse->get_outlet_user();

    $signed_outlet_id = '';

    if ($signed_outlet) {
      $signed_outlet_id = $signed_outlet[0]['outlet_id'];
    }

    // echo '<pre>';
    // print_r($outlet_list);
    // exit();
    $data = [
      'title' => 'Add Rocket',
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    ];
    // echo '<pre>';
    // print_r($data);
    // exit();

    $content = $this->parser->parse('settings/new_rocket', $data, true);
    $this->template->full_admin_html_view($content);
  }
  public function bkash()
  {
    $CI = &get_instance();
    $CI->load->model('Warehouse');
    $outlet_list = $CI->Warehouse->cw_and_outlet_merged();
    $signed_outlet = $CI->Warehouse->get_outlet_user();

    $signed_outlet_id = '';

    if ($signed_outlet) {
      $signed_outlet_id = $signed_outlet[0]['outlet_id'];
    }

    // echo '<pre>';
    // print_r($outlet_list);
    // exit();
    $data = [
      'title' => 'Add Bkash',
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    ];
    // echo '<pre>';
    // print_r($data);
    // exit();

    $content = $this->parser->parse('settings/new_bkash', $data, true);
    $this->template->full_admin_html_view($content);
  }

  public function nagad()
  {
    $CI = &get_instance();
    $CI->load->model('Warehouse');
    $outlet_list = $CI->Warehouse->cw_and_outlet_merged();
    $signed_outlet = $CI->Warehouse->get_outlet_user();

    $signed_outlet_id = '';

    if ($signed_outlet) {
      $signed_outlet_id = $signed_outlet[0]['outlet_id'];
    }

    $data = [
      'title' => 'Add Nagad',
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    ];
    $content = $this->parser->parse('settings/new_nagad', $data, true);
    $this->template->full_admin_html_view($content);
  }

  public function card()
  {
    $CI = &get_instance();
    $CI->load->model('Warehouse');
    $outlet_list = $CI->Warehouse->cw_and_outlet_merged();
    $signed_outlet = $CI->Warehouse->get_outlet_user();

    $signed_outlet_id = '';

    if ($signed_outlet) {
      $signed_outlet_id = $signed_outlet[0]['outlet_id'];
    }

    $data = [
      'title' => 'Add card',
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    ];
    $content = $this->parser->parse('settings/new_card', $data, true);
    $this->template->full_admin_html_view($content);
  }

  #================Add new bank==============#

  public function add_new_bank()
  {
    if ($_FILES['signature_pic']['name']) {
      $config['upload_path'] = './my-assets/image/logo/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
      $config['max_size'] = "*";
      $config['max_width'] = "*";
      $config['max_height'] = "*";
      $config['encrypt_name'] = true;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('signature_pic')) {
        $error = ['error' => $this->upload->display_errors()];
        $this->session->set_userdata(['error_message' => $this->upload->display_errors()]);
        redirect(base_url('Csettings/index'));
      } else {
        $image = $this->upload->data();
        $signature_pic = base_url() . "my-assets/image/logo/" . $image['file_name'];
      }
    }
    $coa = $this->Settings->headcode();
    if ($coa->HeadCode != null) {
      $headcode = $coa->HeadCode + 1;
    } else {
      $headcode = "102010201";
    }

    $createby = $this->session->userdata('user_id');
    $createdate = date('Y-m-d H:i:s');
    $data = [
      'bank_id' => $this->auth->generator(10),
      'bank_name' => $this->input->post('bank_name', true),
      'ac_name' => $this->input->post('ac_name', true),
      'ac_number' => $this->input->post('ac_no', true),
      'branch' => $this->input->post('branch', true),
      // 'outlet_id' => $this->input->post('outlet', true),
      'signature_pic' => !empty($signature_pic) ? $signature_pic : null,
      'status' => 1,
    ];
    $bank_coa = [
      'HeadCode' => $headcode,
      'HeadName' => $this->input->post('bank_name', true),
      'PHeadName' => 'Cash At Bank',
      'HeadLevel' => '4',
      'IsActive' => '1',
      'IsTransaction' => '1',
      'IsGL' => '1',
      'HeadType' => 'A',
      'IsBudget' => '0',
      'IsDepreciation' => '0',
      'DepreciationRate' => '0',
      'CreateBy' => $createby,
      'CreateDate' => $createdate,
    ];
    $bankinfo = $this->Settings->bank_entry($data);

    $this->db->insert('acc_coa', $bank_coa);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/bank_list'));
    exit();
  }

  public function add_new_bkash()
  {
    $coa = $this->Settings->headcode_bkash();
    if ($coa->HeadCode != null) {
      $headcode = $coa->HeadCode + 1;
    } else {
      $headcode = "102010301";
    }

    $createby = $this->session->userdata('user_id');
    $createdate = date('Y-m-d H:i:s');
    $data = [
      'bkash_id' => $this->auth->generator(10),
      'ac_name' => $this->input->post('ac_name', true),
      'bkash_no' => $this->input->post('bkash_no', true),
      'bkash_type' => $this->input->post('bkash_type', true),
      'status' => 1,
      // 'outlet_id' => $this->input->post('outlet', true),
    ];
    $bank_coa = [
      'HeadCode' => $headcode,
      'HeadName' => 'BK-' . $this->input->post('bkash_no', true),
      'PHeadName' => 'Cash At Bkash',
      'HeadLevel' => '4',
      'IsActive' => '1',
      'IsTransaction' => '1',
      'IsGL' => '1',
      'HeadType' => 'A',
      'IsBudget' => '0',
      'IsDepreciation' => '0',
      'DepreciationRate' => '0',
      'CreateBy' => $createby,
      'CreateDate' => $createdate,
    ];
    $bankinfo = $this->Settings->bkash_entry($data);

    $this->db->insert('acc_coa', $bank_coa);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/bkash_list'));
    // exit();
  }
  public function add_new_rocket()
  {
    $coa = $this->Settings->headcode_rocket();
    if ($coa->HeadCode != null) {
      $headcode = $coa->HeadCode + 1;
    } else {
      $headcode = "102010501";
    }

    $createby = $this->session->userdata('user_id');
    $createdate = date('Y-m-d H:i:s');
    $data = [
      'rocket_id' => $this->auth->generator(10),
      'ac_name' => $this->input->post('ac_name', true),
      'rocket_no' => $this->input->post('rocket_no', true),
      'rocket_type' => $this->input->post('rocket_type', true),
      'status' => 1,
      // 'outlet_id' => $this->input->post('outlet', true),
    ];
    $bank_coa = [
      'HeadCode' => $headcode,
      'HeadName' => 'RK-' . $this->input->post('rocket_no', true),
      'PHeadName' => 'Cash At Rocket',
      'HeadLevel' => '4',
      'IsActive' => '1',
      'IsTransaction' => '1',
      'IsGL' => '1',
      'HeadType' => 'A',
      'IsBudget' => '0',
      'IsDepreciation' => '0',
      'DepreciationRate' => '0',
      'CreateBy' => $createby,
      'CreateDate' => $createdate,
    ];
     $this->Settings->rocket_entry($data);

    $this->db->insert('acc_coa', $bank_coa);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/rocket_list'));
    // exit();
  }
  public function add_new_nagad()
  {
    $coa = $this->Settings->headcode_nagad();
    if ($coa->HeadCode != null) {
      $headcode = $coa->HeadCode + 1;
    } else {
      $headcode = "102010401";
    }

    $createby = $this->session->userdata('user_id');
    $createdate = date('Y-m-d H:i:s');
    $data = [
      'nagad_id' => $this->auth->generator(10),
      'ac_name' => $this->input->post('ac_name', true),
      'nagad_no' => $this->input->post('nagad_no', true),
      'nagad_type' => $this->input->post('nagad_type', true),
      // 'outlet_id' => $this->input->post('outlet', true),
      'status' => 1,
    ];
    $bank_coa = [
      'HeadCode' => $headcode,
      'HeadName' => 'NG-' . $this->input->post('nagad_no', true),
      'PHeadName' => 'Cash At Nagad',
      'HeadLevel' => '4',
      'IsActive' => '1',
      'IsTransaction' => '1',
      'IsGL' => '1',
      'HeadType' => 'A',
      'IsBudget' => '0',
      'IsDepreciation' => '0',
      'DepreciationRate' => '0',
      'CreateBy' => $createby,
      'CreateDate' => $createdate,
    ];
    $bankinfo = $this->Settings->nagad_entry($data);

    $this->db->insert('acc_coa', $bank_coa);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/nagad'));
    exit();
  }

  public function bank_transaction()
  {
    $bank_list = $this->Settings->get_bank_list();
    $data = [
      'title' => display('bank_transaction'),
      'bank_list' => $bank_list,
    ];
    $content = $this->parser->parse('settings/bank_debit_credit_manage', $data, true);
    $this->template->full_admin_html_view($content);
  }
  public function bkash_transaction()
  {
    $bkash_list = $this->Settings->get_bkash_list();
    $data = [
      'title' => 'Bkash Transaction',
      'bkash_list' => $bkash_list,
    ];
    $content = $this->parser->parse('settings/bkash_debit_credit_manage', $data, true);
    $this->template->full_admin_html_view($content);
  }

  public function rocket_transaction()
  {
    $rocket_list = $this->Settings->get_rocket_list();
    $data = [
      'title' => 'Rocket Transaction',
      'rocket_list' => $rocket_list,
    ];
    $content = $this->parser->parse('settings/rocket_debit_credit_manage', $data, true);
    $this->template->full_admin_html_view($content);
  }
  public function nagad_transaction()
  {
    $nagad_list = $this->Settings->get_nagad_list();
    $data = [
      'title' => 'Nagad Transaction',
      'nagad_list' => $nagad_list,
    ];
    $content = $this->parser->parse('settings/nagad_debit_credit_manage', $data, true);
    $this->template->full_admin_html_view($content);
  }

  public function bank_debit_credit_manage()
  {
    $bank_list = $this->Settings->get_bank_list();
    $data = [
      'title' => display('bank_transaction'),
      'bank_list' => $bank_list,
    ];
    $content = $this->parser->parse('settings/bank_debit_credit_manage', $data, true);
    $this->template->full_admin_html_view($content);
  }

  #===========Bank Debit Credit Manage==========#

  public function bank_debit_credit_manage_add()
  {
    if ($this->input->post('account_type', true) == "Debit(+)") {
      $dr = $this->input->post('ammount', true);
    } else {
      $cr = $this->input->post('ammount', true);
    }
    $receive_by = $this->session->userdata('user_id');
    $receive_date = date('Y-m-d');
    $bankname = $this->db
      ->select('bank_name')
      ->from('bank_add')
      ->where('bank_id', $this->input->post('bank_id'))
      ->get()
      ->row()->bank_name;
    $coaid = $this->db
      ->select('HeadCode')
      ->from('acc_coa')
      ->where('HeadName', $bankname)
      ->get()
      ->row()->HeadCode;
    //  echo '<pre>';print_r($bankname);exit();
    $coabanktransaction = [
      'VNo' => $this->input->post('withdraw_deposite_id', true),
      'Vtype' => 'Bank Transaction',
      'VDate' => $this->input->post('date', true),
      'COAID' => $coaid,
      'Narration' => $this->input->post('description', true),
      'Debit' => !empty($dr) ? $dr : 0,
      'Credit' => !empty($cr) ? $cr : 0,
      'IsPosted' => 1,
      'CreateBy' => $receive_by,
      'CreateDate' => date('Y-m-d H:i:s'),
      'IsAppove' => 1,
    ];
    $this->db->insert('acc_transaction', $coabanktransaction);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/bank_list'));
    exit();
  }

  public function bkash_debit_credit_manage_add()
  {
    if ($this->input->post('account_type', true) == "Debit(+)") {
      $dr = $this->input->post('ammount', true);
    } else {
      $cr = $this->input->post('ammount', true);
    }
    $receive_by = $this->session->userdata('user_id');
    $receive_date = date('Y-m-d');
    $bkashname = $this->db
      ->select('bkash_no')
      ->from('bkash_add')
      ->where('bkash_id', $this->input->post('bkash_id'))
      ->get()
      ->row()->bkash_no;
      $coa_name='BK-'. $bkashname;

      $coaid = $this->db
      ->select('HeadCode')
      ->from('acc_coa')
      ->where('HeadName', $coa_name)
      ->get()
      ->row()->HeadCode;
    //echo '<pre>';print_r($bkashname);exit();
    $coabanktransaction = [
      'VNo' => $this->input->post('withdraw_deposite_id', true),
      'Vtype' => 'Bkash Transaction',
      'VDate' => $this->input->post('date', true),
      'COAID' => $coaid,
      'Narration' => $this->input->post('description', true),
      'Debit' => !empty($dr) ? $dr : 0,
      'Credit' => !empty($cr) ? $cr : 0,
      'IsPosted' => 1,
      'CreateBy' => $receive_by,
      'CreateDate' => date('Y-m-d H:i:s'),
      'IsAppove' => 1,
    ];

    // echo '<pre>';print_r($coabanktransaction);exit();
    $this->db->insert('acc_transaction', $coabanktransaction);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/bkash_list'));
    exit();
  }
  public function rocket_debit_credit_manage_add()
  {
    if ($this->input->post('account_type', true) == "Debit(+)") {
      $dr = $this->input->post('ammount', true);
    } else {
      $cr = $this->input->post('ammount', true);
    }
    $receive_by = $this->session->userdata('user_id');
    $receive_date = date('Y-m-d');
    $bkashname = $this->db
      ->select('rocket_no')
      ->from('rocket_add')
      ->where('rocket_id', $this->input->post('rocket_id'))
      ->get()
      ->row()->rocket_no;

    $coa_name='RK-'. $bkashname;
      $coaid = $this->db
      ->select('HeadCode')
      ->from('acc_coa')
      ->where('HeadName', $coa_name)
      ->get()
      ->row()->HeadCode;
   // echo '<pre>';print_r($coa_name);exit();
    $coabanktransaction = [
      'VNo' => $this->input->post('withdraw_deposite_id', true),
      'Vtype' => 'Rocket Transaction',
      'VDate' => $this->input->post('date', true),
      'COAID' => $coaid,
      'Narration' => $this->input->post('description', true),
      'Debit' => !empty($dr) ? $dr : 0,
      'Credit' => !empty($cr) ? $cr : 0,
      'IsPosted' => 1,
      'CreateBy' => $receive_by,
      'CreateDate' => date('Y-m-d H:i:s'),
      'IsAppove' => 1,
    ];

     //echo '<pre>';print_r($coabanktransaction);exit();
    $this->db->insert('acc_transaction', $coabanktransaction);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/rocket_list'));
    exit();
  }
  public function nagad_debit_credit_manage_add()
  {
    if ($this->input->post('account_type', true) == "Debit(+)") {
      $dr = $this->input->post('ammount', true);
    } else {
      $cr = $this->input->post('ammount', true);
    }
    $receive_by = $this->session->userdata('user_id');
    $receive_date = date('Y-m-d');
    $nagadname = $this->db
      ->select('nagad_no')
      ->from('nagad_add')
      ->where('nagad_id', $this->input->post('nagad_id'))
      ->get()
      ->row()->nagad_no;
      $coa_name='NG-'. $nagadname;

      $coaid = $this->db
      ->select('HeadCode')
      ->from('acc_coa')
      ->where('HeadName', $coa_name)
      ->get()
      ->row()->HeadCode;
    //echo '<pre>';print_r($bkashname);exit();
    $coabanktransaction = [
      'VNo' => $this->input->post('withdraw_deposite_id', true),
      'Vtype' => 'Nagad Transaction',
      'VDate' => $this->input->post('date', true),
      'COAID' => $coaid,
      'Narration' => $this->input->post('description', true),
      'Debit' => !empty($dr) ? $dr : 0,
      'Credit' => !empty($cr) ? $cr : 0,
      'IsPosted' => 1,
      'CreateBy' => $receive_by,
      'CreateDate' => date('Y-m-d H:i:s'),
      'IsAppove' => 1,
    ];

    // echo '<pre>';print_r($coabanktransaction);exit();
    $this->db->insert('acc_transaction', $coabanktransaction);
    $this->session->set_userdata(['message' => display('successfully_added')]);
    redirect(base_url('Csettings/nagad_list'));
    exit();
  }
  #==============Bank Ledger============#

  public function bank_ledger()
  {
    $bank_id = $this->input->post('bank_id', true);
    $from = $this->input->post('from_date', true);
    $to = $this->input->post('to_date', true);
    $content = $this->lsettings->bank_ledger($bank_id, $from, $to);
    $this->template->full_admin_html_view($content);
  }
  public function bkash_ledger()
  {
    $bkash_id = $this->input->post('bkash_id', true);
    $from = $this->input->post('from_date', true);
    $to = $this->input->post('to_date', true);
    $content = $this->lsettings->bkash_ledger($bkash_id, $from, $to);
    $this->template->full_admin_html_view($content);
  }
  public function rocket_ledger()
  {
    $rocket_id = $this->input->post('rocket_id', true);
    $from = $this->input->post('from_date', true);
    $to = $this->input->post('to_date', true);
    $content = $this->lsettings->rocket_ledger($rocket_id, $from, $to);
    $this->template->full_admin_html_view($content);
  }
  public function nagad_ledger()
  {
    $nagad_id = $this->input->post('nagad_id', true);
    $from = $this->input->post('from_date', true);
    $to = $this->input->post('to_date', true);
    $content = $this->lsettings->nagad_ledger($nagad_id, $from, $to);
    $this->template->full_admin_html_view($content);
  }

  #================Add Person==============#

  public function add_person()
  {
    $content = $this->lsettings->add_person();
    $this->template->full_admin_html_view($content);
  }

  #================Submit Person==============#

  public function submit_person()
  {
    $person_id = $this->auth->generator(10);
    $data = [
      'person_id' => $person_id,
      'person_name' => $this->input->post('name', true),
      'person_phone' => $this->input->post('phone', true),
      'person_address' => $this->input->post('address', true),
      'status' => 1,
    ];

    $result = $this->Settings->submit_person_personal_loan($data);
    if ($result) {
      $this->session->set_userdata(['message' => display('successfully_added')]);
      redirect(base_url('Csettings/manage_person'));
    } else {
      $this->session->set_userdata(['error_message' => display('not_added')]);
      redirect(base_url('Csettings/manage_person'));
    }
  }

  //Phone search by name
  public function phone_search_by_name()
  {
    $person_id = $this->input->post('person_id', true);
    $result = $this->db
      ->select('person_phone')
      ->from('person_information')
      ->where('person_id', $person_id)
      ->get()
      ->row();
    if ($result) {
      echo $result->person_phone;
    } else {
      return false;
    }
  }

  //Person loan search by phone number
  public function loan_phone_search_by_name()
  {
    $person_id = $this->input->post('person_id', true);
    $result = $this->db
      ->select('person_phone')
      ->from('pesonal_loan_information')
      ->where('person_id', $person_id)
      ->get()
      ->row();
    if ($result) {
      echo $result->person_phone;
    } else {
      return false;
    }
  }

  #================Add loan==============#

  public function add_loan()
  {
    $content = $this->lsettings->add_loan();
    $this->template->full_admin_html_view($content);
  }

  #================Submit loan==============#

  public function submit_loan()
  {
    $transaction_id = $this->auth->generator(10);
    $data = [
      'transaction_id' => $transaction_id,
      'person_id' => $this->input->post('person_id', true),
      'debit' => $this->input->post('ammount', true),
      'date' => $this->input->post('date', true),
      'details' => $this->input->post('details', true),
      'status' => 1,
    ];

    $result = $this->Settings->submit_loan_personal($data);
    if ($result) {
      $this->session->set_userdata(['message' => display('successfully_added')]);
      redirect(base_url('Csettings/add_loan'));
    } else {
      $this->session->set_userdata(['error_message' => display('not_added')]);
      redirect(base_url('Csettings/add_loan'));
    }
  }

  #================Add payment==============#

  public function add_payment()
  {
    $content = $this->lsettings->add_payment();
    $this->template->full_admin_html_view($content);
  }

  #================Submit loan==============#

  public function submit_payment()
  {
    $transaction_id = $this->auth->generator(10);
    $data = [
      'transaction_id' => $transaction_id,
      'person_id' => $this->input->post('person_id', true),
      'credit' => $this->input->post('ammount', true),
      'date' => $this->input->post('date', true),
      'details' => $this->input->post('details', true),
      'status' => 2,
    ];

    $result = $this->Settings->submit_payment_per_loan($data);
    if ($result) {
      $this->session->set_userdata(['message' => display('successfully_added')]);
      redirect(base_url('Csettings/add_payment'));
    } else {
      $this->session->set_userdata(['error_message' => display('not_added')]);
      redirect(base_url('Csettings/add_payment'));
    }
  }

  #================Manage Person==============#

  public function manage_person()
  {
    #
    #pagination starts
    #
    $config["base_url"] = base_url('Csettings/manage_person/');
    $config["total_rows"] = $this->Settings->person_list_count();
    $config["per_page"] = 10;
    $config["uri_segment"] = 3;
    $config["num_links"] = 5;
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
    $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
    $links = $this->pagination->create_links();
    #
    #pagination ends
    #
    $content = $this->lsettings->manage_person_loan_person($links, $config["per_page"], $page);
    $this->template->full_admin_html_view($content);
  }

  #############===manage loan form ==#####################

  public function manage_loan()
  {
    #
    #pagination starts
    #
    $config["base_url"] = base_url('Csettings/manage_loan/');
    $config["total_rows"] = $this->Settings->person_loan_count();
    $config["per_page"] = 10;
    $config["uri_segment"] = 3;
    $config["num_links"] = 5;
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
    $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
    $links = $this->pagination->create_links();
    #
    #pagination ends
    #
    $content = $this->lsettings->manage_loan($links, $config["per_page"], $page);
    $this->template->full_admin_html_view($content);
  }

  #================Edit Person==============#

  public function person_edit($person_id)
  {
    $content = $this->lsettings->edit_person($person_id);
    $this->template->full_admin_html_view($content);
  }

  ########===========person loan edit data =========####

  public function person_loan_edit($person_id)
  {
    $content = $this->lsettings->edit_person_loan($person_id);
    $this->template->full_admin_html_view($content);
  }

  ### Personal loan update ============================#####

  public function loan_edit($person_id)
  {
    $content = $this->lsettings->edit_loan($person_id);
    $this->template->full_admin_html_view($content);
  }

  #================update Person==============#update_loan_person

  public function update_person($person_id)
  {
    $data = [
      'person_name' => $this->input->post('name', true),
      'person_phone' => $this->input->post('phone', true),
      'person_address' => $this->input->post('address', true),
      'status' => 1,
    ];
    $result = $this->Settings->update_person($data, $person_id);
    if ($result) {
      $this->session->set_userdata(['message' => display('successfully_updated')]);
      redirect(base_url('Cloan/manage1_person'));
    } else {
      $this->session->set_userdata(['error_message' => display('not_added')]);
      redirect(base_url('Cloan/manage1_person'));
    }
  }

  //############## update loan date##############
  public function update_loan($person_id)
  {
    $data = [
      'per_loan_id' => $this->input->post('per_loan_id', true),
      'person_id' => $this->input->post('person_id', true),
      'date' => $this->input->post('date', true),
      'debit' => $this->input->post('debit', true),
      'credit' => $this->input->post('credit', true),
      'details' => $this->input->post('details', true),
    ];
    $result = $this->Settings->update_per_loan($data, $person_id);
    if ($result) {
      $this->session->set_userdata(['message' => display('successfully_updated')]);
      redirect(base_url('Csettings/manage_loan'));
    } else {
      $this->session->set_userdata(['error_message' => display('not_added')]);
      redirect(base_url('Csettings/manage_loan'));
    }
  }

  // Update person loan
  public function update_loan_person($person_id)
  {
    $hname = $person_id . '-' . $this->input->post('oldname', true);
    $data = [
      'person_name' => $this->input->post('name', true),
      'person_phone' => $this->input->post('phone', true),
      'person_address' => $this->input->post('address', true),
      'status' => 1,
    ];
    $loan_person = [
      'HeadName' => $person_id . '-' . $this->input->post('name', true),
    ];
    $result = $this->Settings->update_loan_person($data, $person_id);
    if ($result) {
      $this->db->where('HeadName', $hname);
      $this->db->update('acc_coa', $loan_person);
      $this->session->set_userdata(['message' => display('successfully_updated')]);
      redirect(base_url('Csettings/manage_person'));
    } else {
      $this->session->set_userdata(['error_message' => display('not_added')]);
      redirect(base_url('Csettings/manage_person'));
    }
  }

  //Person ledger
  public function person_ledger($person_id)
  {
    $content = $this->lsettings->person_ledger_data($person_id);
    $this->template->full_admin_html_view($content);
  }

  // Persona loan details
  public function person_loan_deails($person_id)
  {
    $content = $this->lsettings->person_loan_data($person_id);
    $this->template->full_admin_html_view($content);
  }

  //Ledger search
  public function ledger_search()
  {
    $CI = &get_instance();
    $this->auth->check_admin_auth();
    $CI->load->library('lreport');
    $CI->load->model('Reports');
    $today = date('Y-m-d');

    $person_id = $this->input->post('person_id', true) ? $this->input->post('person_id', true) : "";
    $from_date = $this->input->post('from_date', true);

    $to_date = $this->input->post('to_date', true) ? $this->input->post('to_date', true) : $today;
    $content = $this->lsettings->ledger_search_by_date($person_id, $from_date, $to_date);

    $this->template->full_admin_html_view($content);
  }
  //person_loan_search
  public function person_loan_search()
  {
    $CI = &get_instance();
    $this->auth->check_admin_auth();
    $CI->load->library('lreport');
    $CI->load->model('Reports');
    $today = date('Y-m-d');

    $person_id = $this->input->post('person_id', true) ? $this->input->post('person_id', true) : "";
    $from_date = $this->input->post('from_date', true);

    $to_date = $this->input->post('to_date', true) ? $this->input->post('to_date', true) : $today;
    $content = $this->lsettings->person_loan_search_by_date($person_id, $from_date, $to_date);

    $this->template->full_admin_html_view($content);
  }

  #==============Bank list============#

  public function bank_list()
  {
    $content = $this->lsettings->bank_list();
    $this->template->full_admin_html_view($content);
  }

  public function bkash_list()
  {
    $content = $this->lsettings->bkash_list();
    $this->template->full_admin_html_view($content);
  }

  public function rocket_list()
  {
    $content = $this->lsettings->rocket_list();
    $this->template->full_admin_html_view($content);
  }

  public function nagad_list()
  {
    $content = $this->lsettings->nagad_list();
    $this->template->full_admin_html_view($content);
  }

  #=============Bank edit==============#

  public function edit_bank($bank_id)
  {
    $content = $this->lsettings->bank_show_by_id($bank_id);
    $this->template->full_admin_html_view($content);
  }

  public function edit_bkash($bkash_id)
  {
    $content = $this->lsettings->bkash_show_by_id($bkash_id);
    $this->template->full_admin_html_view($content);
  }

  public function edit_rocket($rocket_id)
  {
    $content = $this->lsettings->rocket_show_by_id($rocket_id);
    $this->template->full_admin_html_view($content);
  }

  public function edit_nagad($nagad_id)
  {
    $content = $this->lsettings->nagad_show_by_id($nagad_id);
    $this->template->full_admin_html_view($content);
  }

  #============Update Bank=============#

  public function update_bank($bank_id)
  {
    $content = $this->lsettings->bank_update_by_id($bank_id);
    $this->session->set_userdata(['message' => display('successfully_updated')]);
    redirect('Csettings/bank_list');
  }
  public function update_bkash($bkash_id)
  {
    $content = $this->lsettings->bkash_update_by_id($bkash_id);
    $this->session->set_userdata(['message' => display('successfully_updated')]);
    redirect('Csettings/bkash_list');
  }

  public function update_rocket($rocket_id)
  {
    $content = $this->lsettings->rocket_update_by_id($rocket_id);
    $this->session->set_userdata(['message' => display('successfully_updated')]);
    redirect('Csettings/rocket_list');
  }
  public function update_nagad($nagad_id)
  {
    $content = $this->lsettings->nagad_update_by_id($nagad_id);
    $this->session->set_userdata(['message' => display('successfully_updated')]);
    redirect('Csettings/nagad_list');
  }



    //Bank Delete
    public function bank_delete($bank_id){
        $info = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;
        $head = $this->db->select('HeadCode')->from('acc_coa')->where('HeadCode', $info)->get()->row()->HeadCode;

        $this->db->where('bank_id', $bank_id);
        $this->db->delete('bank_add');
        $this->db->where('HeadCode', $head);
        $this->db->delete('acc_coa');
        $this->session->set_userdata(['message' => 'Successfully Deleted']);
        redirect('Csettings/bank_list');
    }

  #==============Table list============#

  public function table_list()
  {
    #
    #pagination starts
    #
    $config["base_url"] = base_url('Csettings/table_list/');
    $config["total_rows"] = $this->Settings->table_list_count();
    $config["per_page"] = 10;
    $config["uri_segment"] = 3;
    $config["num_links"] = 5;
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
    $page = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
    $links = $this->pagination->create_links();
    #
    #pagination ends
    #
    $content = $this->lsettings->table_list($links, $config["per_page"], $page);

    $this->template->full_admin_html_view($content);
  }

  #=============Commission==============#

  public function commission()
  {
    $customer_info = $this->Settings->customer_info();
    $currency_details = $this->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('commission'),
      'customer_info' => $customer_info,
      'product_info' => "",
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
    ];
    $content = $this->parser->parse('commission/commission_generate', $data, true);
    $this->template->full_admin_html_view($content);
  }

  #==============Retrive commission=========#

  public function retrive_product_info()
  {
    $customer_id = $this->input->post('customer_id', true);
    $product_info = $this->db
      ->select(
        '
                                invoice_details.*,
                                product_information.product_model
                                '
      )
      ->from('invoice')
      ->join('invoice_details', 'invoice_details.invoice_id = invoice.invoice_id')
      ->join('product_information', 'invoice_details.product_id = product_information.product_id')
      ->where('invoice.customer_id', $customer_id)
      ->group_by('invoice_details.product_id')
      ->get()
      ->result();

    if ($product_info) {
      echo "<select class=\"form-control\" name=\"product_model\" id=\"product_model\">";
      echo "<option>" . display('select_one') . "</option>";
      foreach ($product_info as $product) {
        echo "<option value='" .
          $product->product_id .
          "'>" .
          $product->product_model .
          "</option>";
      }
      echo "</select>";
    }
  }

  //Commission generator
  public function commission_generate()
  {
    $customer_info = $this->Settings->customer_info();
    $product_info = $this->Settings->product_info();

    $commission_rate = $this->input->post('commission_rate', true);

    $subTotalCtn = 0;
    $subTotalQnty = 0;
    $subTotalComs = 0;
    if ($product_info) {
      foreach ($product_info as $k => $product) {
        $product_info[$k]['per_cartoon'] = $product_info[$k]['quantity'];

        $product_info[$k]['total_commission_rate'] =
          $product_info[$k]['quantity'] * $commission_rate;

        $product_info[$k]['commission'] = $commission_rate;

        $product_info[$k]['subTotalQnty'] = $subTotalQnty + $product_info[$k]['quantity'];
        $subTotalQnty = $product_info[$k]['subTotalQnty'];

        $product_info[$k]['subTotalComs'] =
          $subTotalComs + $product_info[$k]['total_commission_rate'];
        $subTotalComs = $product_info[$k]['subTotalComs'];
      }
    }

    $currency_details = $this->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('commission'),
      'customer_info' => $customer_info,
      'product_info' => $product_info,
      'subTotalCtn' => $subTotalCtn,
      'subTotalQnty' => $subTotalQnty,
      'subTotalComs' => $subTotalComs,
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
    ];

    $content = $this->parser->parse('commission/commission_generate', $data, true);
    $this->template->full_admin_html_view($content);
  }

  //This function is used to Generate Key
  public function generator($lenth)
  {
    $number = [
      "a",
      "b",
      "c",
      "d",
      "e",
      "f",
      "g",
      "h",
      "i",
      "j",
      "k",
      "l",
      "n",
      "m",
      "o",
      "p",
      "q",
      "r",
      "s",
      "t",
      "u",
      "v",
      "w",
      "x",
      "y",
      "z",
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "0",
    ];

    for ($i = 0; $i < $lenth; $i++) {
      $rand_value = rand(0, 34);
      $rand_number = $number["$rand_value"];

      if (empty($con)) {
        $con = $rand_number;
      } else {
        $con = "$con" . "$rand_number";
      }
    }
    return $con;
  }

  public function delete_personal_loan($id = null)
  {
    if ($this->Settings->delete_personal_loan($id)) {
      #set success message
      $this->session->set_flashdata('message', display('delete_successfully'));
    } else {
      #set exception message
      $this->session->set_flashdata('exception', display('please_try_again'));
    }
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function delete_office_loan($id = null)
  {
    if ($this->Settings->delete_office_loan($id)) {
      #set success message
      $this->session->set_flashdata('message', display('delete_successfully'));
    } else {
      #set exception message
      $this->session->set_flashdata('exception', display('please_try_again'));
    }
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function card_list()
  {
    $this->load->library('lsettings');
    $content = $this->lsettings->card_list();
    $this->template->full_admin_html_view($content);
  }

  public function add_new_card()
  {
    $this->load->model('Settings');

    $data = [
      'card_id' => date('YmdHis'),
      'card_name' => $this->input->post('ac_name', true),
      'percentage'  => $this->input->post('percentage', true),
      'status' => 1,
    ];

    $this->Settings->create_card($data);
    redirect('Csettings/card_list');
  }

  public function edit_card($card_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');

    $card_info = $CI->Settings->retrieve_card_data($card_id);

    $data = [
      'title' => 'Edit Cards',
      'info' => $card_info,
    ];
    $content = $this->parser->parse('settings/edit_card', $data, true);
    $this->template->full_admin_html_view($content);
  }

  public function update_card()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $card_id = $this->input->post('card_id');

    $data = [
      'card_name' => $this->input->post('ac_name', true),
      'percentage'  => $this->input->post('percentage', true)
    ];

    $CI->Settings->update_card($card_id, $data);

    redirect('Csettings/card_list');
  }

  public function delete_card($card_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');

    $CI->Settings->delete_card($card_id);
    redirect('Csettings/card_list');
  }

  public function add_card()
  {
    $CI = &get_instance();

    $CI->load->model('Settings');
    $CI->load->model('Warehouse');
    $outlet_list = $CI->Warehouse->cw_and_outlet_merged();
    $signed_outlet = $CI->Warehouse->get_outlet_user();

    $signed_outlet_id = '';

    if ($signed_outlet) {
      $signed_outlet_id = $signed_outlet[0]['outlet_id'];
    }

    $card_type = $CI->Settings->read_all_card();
    $bank_list = $CI->Settings->get_bank_list();

  //  echo '<pre>';print_r($card_type);exit();

    $data = array(
      'title'   => 'Add Card',
      'card_type'   => $card_type,
      'bank_list'   => $bank_list,
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    );

    $view = $CI->parser->parse('settings/add_new_card_form', $data, TRUE);

    $CI->template->full_admin_html_view($view);
  }

  public function add_real_card()
  {
    $CI = &get_instance();

    $data = array(
      'card_id' => $this->input->post('card_type', true),
      'card_no_id' => date('YmdHis'),
      'card_no'  => $this->input->post('ac_name', true),
      'bank_id'  => $this->input->post('bank_id', true),
      // 'outlet_id' => $this->input->post('outlet', true),
    );

    $CI->db->insert('card_list', $data);

    redirect('Csettings/manage_bank_card');
  }

  public function manage_bank_card()
  {
    $this->load->library('lsettings');
    $content = $this->lsettings->real_card_list();
    $this->template->full_admin_html_view($content);
  }

  public function edit_bank_card($card_id)
  {
    $CI = &get_instance();

    $CI->load->model('Warehouse');
    $outlet_list = $CI->Warehouse->cw_and_outlet_merged();
    $signed_outlet = $CI->Warehouse->get_outlet_user();

    $signed_outlet_id = '';

    if ($signed_outlet) {
      $signed_outlet_id = $signed_outlet[0]['outlet_id'];
    }

    $CI = &get_instance();
    $CI->load->model('Settings');

    $card_info = $CI->Settings->get_real_card_data($card_id);

    $card_type = $CI->Settings->read_all_card();
    $bank_list = $CI->Settings->get_bank_list();

    $data = [
      'bank_list'   => $bank_list,
      'card_types'  => $card_type,
      'title' => 'Edit Cards',
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id,
      'info' => $card_info,
    ];
    $content = $this->parser->parse('settings/edit_real_card', $data, true);
    $this->template->full_admin_html_view($content);
  }

  public function update_bank_card()
  {
    $CI = &get_instance();

    $card_no_id = $this->input->post('card_no_id');

    $data = [
      'card_id' => $this->input->post('card_id', true),
      'card_no'  => $this->input->post('card_no', true),
      'bank_id'  => $this->input->post('bank_id', true),
      // 'outlet_id' => $this->input->post('outlet', true),
    ];

    $this->db->where('card_no_id', $card_no_id);
    $this->db->update('card_list', $data);

    redirect('Csettings/manage_bank_card');
  }

  public function delete_bank_card($card_no_id)
  {

    $this->db->where('card_no_id', $card_no_id);
    $this->db->delete('card_list');
    redirect('Csettings/manage_bank_card');
  }

  public function lc()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');

    $lc_list = $CI->Settings->read_lc();

    $sl = 1;
    foreach ($lc_list as $k => $v) {
      $lc_list[$k]['sl'] = $sl;
      $sl++;
    }

    $data = array(
      'title'   => 'LC list',
      'lc_list' => $lc_list,
    );

    $view = $this->parser->parse('settings/lc_list_form', $data, TRUE);

    $this->template->full_admin_html_view($view);
  }

  public function view_lc($lc_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Purchases');
    $CI->load->model('Web_settings');
    $CI->load->model('Accounts');

    $bank_list = $CI->Web_settings->bank_list();

    $lc_expenses = $CI->Accounts->get_data_by_headcode(40104);

    $lc_payments = $this->db->select('a.*')
      ->from('lc_payment a')
      ->where('a.lc_id', $lc_id)
      ->get()->result_array();

    // echo '<pre>';
    // print_r($lc_expenses);
    // exit;




    $lc_details = $CI->Settings->read_lc($lc_id);
    $pur_id = $lc_details[0]['pur_id'];

    $product_details = $CI->Purchases->get_purchase_product_details($pur_id);

    // echo '<pre>';
    // print_r($product_details);
    // exit;

    $lc_exp_history = $this->db->select('a.*, b.HeadName')
      ->from('acc_transaction a')
      ->join('acc_coa b', 'a.coaid = b.HeadCode')
      ->where('a.VNo', $lc_details[0]['lc_no'])
      ->like('a.COAID', 40104, 'after')
      ->get()->result_array();

    $sl = 1;
    $qty_tot = 0;
    foreach ($product_details as $k => $v) {
      $qty_tot += $product_details[$k]['p_qty'];
      $product_details[$k]['sl'] = $sl;
      $product_details[$k]['p_qty'] = (int)$product_details[$k]['p_qty'];
      $sl++;
    }

    $p_sl = 1;
    foreach ($lc_payments as $k => $v) {
      switch ($lc_payments[$k]['pay_type']) {
        case 1:
          $lc_payments[$k]['pay_name'] = 'Cash';
          break;

        case 2:
          $lc_payments[$k]['pay_name'] = 'Bank';
          break;

        case 3:
          $lc_payments[$k]['pay_name'] = 'Cash (TT)';
          break;

        case 4:
          $lc_payments[$k]['pay_name'] = 'Bank (TT)';
          break;
      }

      $lc_payments[$k]['sl'] = $p_sl;
      $p_sl++;
    }

    $data = array(
      'title'   => 'View LC',
      'lc_details' => $lc_details,
      'pr_details'  => $product_details,
      'total_qty'   => $qty_tot,
      'bank_list'   => $bank_list,
      'lc_expenses' => $lc_expenses,
      'lc_payments' => $lc_payments,
      'exp_history' => $lc_exp_history
    );

    $view = $this->parser->parse('settings/single_lc_view', $data, TRUE);

    $this->template->full_admin_html_view($view);
  }

  public function update_lc()
  {

    $total_qty = $this->input->post('total_qty', TRUE);

    $lc_tot = $this->input->post('lc_amount', TRUE);
    $margin = $this->input->post('margin', TRUE);
    $paid_amount = $this->input->post('new_value', TRUE);
    $due_amount = $this->input->post('lc_balance', TRUE);

    $createdate = date('Y-m-d H:i:s');
    $createby = $this->session->userdata('user_id');

    $lc_id = $this->input->post('lc_id', TRUE);

    $pay_type = $this->input->post('pay_type', TRUE);
    $margin_amount = $this->input->post('supp_amount', TRUE);
    $lc_no = $this->input->post('lc_no', TRUE);
    $bank_id = $this->input->post('bank_id', TRUE);
    $tt_bank_id = $this->input->post('tt_bank_id', TRUE);
    $tt_pay = $this->input->post('tt_pay', TRUE);
    $new_value = $this->input->post('new_value', TRUE);

    $data = array(
      'margin'  => $margin,
      'paid'    => $paid_amount,
      'margin_value'  => $new_value,
      'due_amount'    => $due_amount,
      'status'    => ($due_amount == 0 ? 3 : 2)
    );

    $this->db->where('id', $lc_id);
    $this->db->update('lc_list', $data);
    // exit();


    $total_expense = $this->input->post('total_expense', TRUE);

    $per_item_total = ((float)$lc_tot + (float)$total_expense) / (float)$total_qty;

    $purchase_id = $this->input->post('purchase_id', TRUE);
    // print_r($per_item_total);

    $products = $this->db->select('product_id')
      ->where('purchase_id', $purchase_id)
      ->from('product_purchase_details')
      ->get()
      ->result_array();

    // echo '<pre>';
    // print_r($products);
    // exit();

    foreach ($products as $pr) {
      $this->db->set('additional_price', $per_item_total);
      $this->db->where('product_id', $pr['product_id']);
      $this->db->where('purchase_id', $purchase_id);
      $this->db->update('product_purchase_details');
    }

    if (!empty($margin_amount[0])) {
      $this->db->where('lc_id', $lc_id);
      $this->db->delete('lc_payment');

      $this->db->where('VNo', $purchase_id);
      $this->db->not_like('COAID', 40104, 'after');
      $this->db->delete('acc_transaction');
      // exit();

      for ($i = 0; $i < count($pay_type); $i++) {
        $paid_amount = $margin_amount[$i];
        $pay_option = $pay_type[$i];

        if ($pay_option == 1) { //cash
          $cashcr = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
            'Credit'         =>  $paid_amount,
            'Debit'          =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
          );

          $lc_liablities = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  503,
            'Narration'      =>  'LC Liabilities Debit for Purchase ID. ' . $purchase_id . ', LC No. ' . $lc_no,
            'Debit'          =>  $paid_amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
          );


          $this->db->insert('acc_transaction', $cashcr);
          $this->db->insert('acc_transaction', $lc_liablities);

          $data = array(
            'lc_id'     => $lc_id,
            'pay_type'  => 1,
            'account'   => '',
            'amount'    => $paid_amount
          );

          $this->db->insert('lc_payment', $data);
        } else if ($pay_option == 2) { //bank

          $bank_name = '';
          if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
          } else {
            $bankcoaid = '';
          }

          $bankc = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Credit for company in bank for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
            'Credit'         =>  $paid_amount,
            'Debit'          =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,

          );

          $lc_liablities = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  503,
            'Narration'      =>  'LC Liabilities Debit for Purchase ID. ' . $purchase_id . ', LC No. ' . $lc_no,
            'Debit'          =>  $paid_amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
          );

          $this->db->insert('acc_transaction', $bankc);
          $this->db->insert('acc_transaction', $lc_liablities);

          $data = array(
            'lc_id'     => $lc_id,
            'pay_type'  => 2,
            'account'   => $bank_name,
            'amount'    => $paid_amount
          );

          $this->db->insert('lc_payment', $data);
        } else if ($pay_option == 3) { //tt
          if ($tt_pay[$i] == 1) {
            $cashcr = array(
              'VNo'            =>  $lc_no,
              'Vtype'          =>  'Purchase',
              'VDate'          =>  $createdate,
              'COAID'          =>  1020101,
              'Narration'      =>  'Cash in Hand (TT) for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
              'Credit'         =>  $paid_amount,
              'Debit'          =>  0,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $createby,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1,
            );

            $lc_liablities = array(
              'VNo'            =>  $lc_no,
              'Vtype'          =>  'Purchase',
              'VDate'          =>  $createdate,
              'COAID'          =>  503,
              'Narration'      =>  'LC Liabilities Debit for Purchase ID. ' . $purchase_id . ', LC No. ' . $lc_no,
              'Debit'          =>  $paid_amount,
              'Credit'         =>  0,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $createby,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1
            );


            $this->db->insert('acc_transaction', $cashcr);
            $this->db->insert('acc_transaction', $lc_liablities);

            $data = array(
              'lc_id'     => $lc_id,
              'pay_type'  => 3,
              'account'   => '',
              'amount'    => $paid_amount
            );

            $this->db->insert('lc_payment', $data);
          } else {
            $bank_name = '';
            if (!empty($bank_id)) {
              $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $tt_bank_id[$i])->get()->row()->bank_name;

              $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
            } else {
              $bankcoaid = '';
            }

            $bankc = array(
              'VNo'            =>  $lc_no,
              'Vtype'          =>  'Purchase',
              'VDate'          =>  $createdate,
              'COAID'          =>  $bankcoaid,
              'Narration'      =>  'Credit for company in bank (TT) for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
              'Credit'         =>  $paid_amount,
              'Debit'          =>  0,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $createby,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1,

            );

            $lc_liablities = array(
              'VNo'            =>  $lc_no,
              'Vtype'          =>  'Purchase',
              'VDate'          =>  $createdate,
              'COAID'          =>  503,
              'Narration'      =>  'LC Liabilities Debit for Purchase ID. ' . $purchase_id . ', LC No. ' . $lc_no,
              'Debit'          =>  $paid_amount,
              'Credit'         =>  0,
              'IsPosted'       =>  1,
              'CreateBy'       =>  $createby,
              'CreateDate'     =>  $createdate,
              'IsAppove'       =>  1
            );

            $this->db->insert('acc_transaction', $bankc);
            $this->db->insert('acc_transaction', $lc_liablities);

            $data = array(
              'lc_id'     => $lc_id,
              'pay_type'  => 4,
              'account'   => $bank_name,
              'amount'    => $paid_amount
            );

            $this->db->insert('lc_payment', $data);
          }
        }
      }
    }

    $expense_head = $this->input->post('expense_head', TRUE);
    $exp_amount = $this->input->post('exp_amount', TRUE);
    $exp_payment = $this->input->post('exp_payment', TRUE);
    $exp_bank_id = $this->input->post('exp_bank_id', TRUE);


    if (!empty($exp_amount[0])) {
      $this->db->where('VNo', $purchase_id);
      $this->db->like('COAID', 40104, 'after');
      $this->db->delete('acc_transaction');
      for ($i = 0; $i < count($expense_head); $i++) {
        $head = $expense_head[$i];
        $head_amount = $exp_amount[$i];
        $exp_pay_type = $exp_payment[$i];

        $head_dr = array(
          'VNo'            =>  $lc_no,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $createdate,
          'COAID'          =>  $head,
          'Narration'      =>  'LC Expenses Debit for Purchase ID. ' . $purchase_id . ', LC No. ' . $lc_no,
          'Debit'          =>  $head_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $createby,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1
        );

        $this->db->insert('acc_transaction', $head_dr);

        if ($exp_pay_type == 1) {
          $cashcr = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
            'Credit'         =>  $head_amount,
            'Debit'          =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
          );

          $this->db->insert('acc_transaction', $cashcr);
        } else if ($exp_pay_type == 2) {
          if (!empty($exp_bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $exp_bank_id[$i])->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
          } else {
            $bankcoaid = '';
          }
          $bankc = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Credit for company in bank for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
            'Credit'         =>  $head_amount,
            'Debit'          =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,

          );
          $this->db->insert('acc_transaction', $bankc);
        } else if ($exp_pay_type == 3) {
          $cashcr = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand (TT) for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
            'Credit'         =>  $head_amount,
            'Debit'          =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
          );

          $this->db->insert('acc_transaction', $cashcr);
        } else {
          if (!empty($exp_bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $exp_bank_id[$i])->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
          } else {
            $bankcoaid = '';
          }
          $bankc = array(
            'VNo'            =>  $lc_no,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $createdate,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Credit for company in bank (TT) for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
            'Credit'         =>  $head_amount,
            'Debit'          =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $createby,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
          );
          $this->db->insert('acc_transaction', $bankc);
        }
      }
    }


    redirect('Csettings/lc');
  }

  public function lc_payment()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Web_settings');

    $bank_list          = $CI->Web_settings->bank_list();

    $due_lc = $CI->Settings->get_due_lc();

    // echo '<pre>';

    // print_r($due_lc);
    // exit();

    $sl = 1;

    if ($due_lc) {
      foreach ($due_lc as $k => $v) {
        $due_lc[$k]['sl'] = $sl;
        $due_lc[$k]['sl2'] = $sl + 1;
        $sl++;
      }
    }

    $data = array(
      'title'   => 'LC Payment',
      'due_list'  => $due_lc,
      'bank_list' => $bank_list
    );


    $view = $this->parser->parse('settings/due_lc_list_form', $data, TRUE);
    $this->template->full_admin_html_view($view);
  }

  public function update_lc_payment()
  {
    $lc_id = $this->input->post('lc_id', TRUE);
    $lc_no = $this->input->post('lc_no', TRUE);
    $lc_amount = $this->input->post('lc_value', TRUE);
    $purchase_id = $this->input->post('pur_id', TRUE);
    $pay_type = json_decode(stripslashes($this->input->post('pay_type', TRUE)));
    $amount = json_decode(stripslashes($this->input->post('amount', TRUE)));
    $bank_id = json_decode(stripslashes($this->input->post('bank_id', TRUE)));
    $createdate = date('Y-m-d H:i:s');
    $createby = $this->session->userdata('user_id');

    // echo '<pre>';
    // print_r($pay_type);
    // print_r($amount);
    // print_r($bank_id);
    // exit();

    for ($i = 0; $i < count($pay_type); $i++) {

      $single_pay = $pay_type[$i];
      $single_amount = $amount[$i];
      $single_bank = $bank_id[$i];

      if ($single_pay == 1) {
        $cashcr = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $createdate,
          'COAID'          =>  1020101,
          'Narration'      =>  'Cash in Hand for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
          'Credit'         =>  $single_amount,
          'Debit'          =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $createby,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1,
        );

        $this->db->insert('acc_transaction', $cashcr);
      } else if ($single_pay == 2) {
        if (!empty($bank_id)) {
          $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

          $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
          $bankcoaid = '';
        }
        $bankc = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $createdate,
          'COAID'          =>  $bankcoaid,
          'Narration'      =>  'Credit for company in bank for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
          'Credit'         =>  $single_amount,
          'Debit'          =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $createby,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1,

        );
        $this->db->insert('acc_transaction', $bankc);
      } else if ($single_pay == 3) {
        $cashcr = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $createdate,
          'COAID'          =>  1020101,
          'Narration'      =>  'Cash in Hand (TT) for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
          'Credit'         =>  $single_amount,
          'Debit'          =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $createby,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1,
        );

        $this->db->insert('acc_transaction', $cashcr);
      } else {
        if (!empty($bank_id)) {
          $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

          $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
          $bankcoaid = '';
        }
        $bankc = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $createdate,
          'COAID'          =>  $bankcoaid,
          'Narration'      =>  'Credit for company in bank (TT) for Purchase ID - ' . $purchase_id . ', LC No. ' . $lc_no,
          'Credit'         =>  $single_amount,
          'Debit'          =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $createby,
          'CreateDate'     =>  $createdate,
          'IsAppove'       =>  1,
        );
        $this->db->insert('acc_transaction', $bankc);
      }
    }

    $lc_liablities = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $createdate,
      'COAID'          =>  503,
      'Narration'      =>  'LC Liabilities Debit for Purchase ID. ' . $purchase_id . ', LC No. ' . $lc_no,
      'Debit'          =>  $lc_amount,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
    $this->db->insert('acc_transaction', $lc_liablities);

    $this->db->where('id', $lc_id);
    $this->db->set(array(
      'status' => 3,
      'paid'   => $lc_amount,
      'due_amount'    => 0
    ));
    $this->db->update('lc_list');
  }

  // public function undo_lc_margin()
  // {
  //   $lc_id = $this->input->post('lc_id', TRUE);

  //   $this->db->where('id', $lc_id);
  //   $this->db->set('status', 1);
  //   $this->db->update('lc_list');
  // }
}
