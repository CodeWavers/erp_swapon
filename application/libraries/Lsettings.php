<?php

if (!defined('BASEPATH')) {
  exit('No direct script access allowed');
}

class Lsettings
{
  //Add person
  public function add_person()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');

    $data = [
      'title' => display('add_person'),
    ];
    $bankList = $CI->parser->parse('settings/add_person', $data, true);
    return $bankList;
  }

  //personal loan
  public function add_person1()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');

    $data = [
      'title' => display('add_person'),
    ];
    $bankList = $CI->parser->parse('settings/add_person1', $data, true);
    return $bankList;
  }

  //Add loan
  public function add_loan()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $person_list = $CI->Settings->person_list_personal_loan();

    $data = [
      'title' => display('add_loan'),
      'person_list' => $person_list,
    ];
    $add_loan = $CI->parser->parse('settings/add_loan', $data, true);
    return $add_loan;
  }

  //Add payment
  public function add_payment()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $person_list = $CI->Settings->person_list_personal_loan();

    $data = [
      'title' => display('add_payment'),
      'person_list' => $person_list,
    ];
    $add_payment = $CI->parser->parse('settings/add_payment', $data, true);
    return $add_payment;
  }

  //Manage person
  public function manage_person($links, $per_page, $limit)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Web_settings');
    $person_list = $CI->Settings->person_list_limt($per_page, $limit);
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('manage_person'),
      'person_list' => $person_list,
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'links' => $links,
    ];
    $manage_person = $CI->parser->parse('settings/manage_person', $data, true);
    return $manage_person;
  }

  //Manage personal loan person information
  public function manage_person_loan_person($links, $per_page, $limit)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $person_list = $CI->Settings->person_list_limt_loan($per_page, $limit);

    if (!empty($person_list)) {
      foreach ($person_list as $index => $value) {
        $person_list[$index]['balance'] =
          $person_list[$index]['debit'] - $person_list[$index]['credit'];
      }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('manage_person'),
      'person_list' => $person_list,
      'links' => $links,
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
    ];
    $manage_person = $CI->parser->parse('settings/peson_loan_manage', $data, true);
    return $manage_person;
  }

  // ####### Manage Personal loan ###############
  public function manage_loan($links, $per_page, $limit)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $person_list = $CI->Settings->loan_list_personal($per_page, $limit);

    $data = [
      'title' => display('manage_person'),
      'person_list' => $person_list,
      'links' => $links,
    ];
    $manage_person = $CI->parser->parse('settings/loan_manage', $data, true);
    return $manage_person;
  }

  public function edit_person($person_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $person_list = $CI->Settings->select_person_by_id($person_id);

    $data = [
      'title' => display('personal_edit'),
      'person_id' => $person_list[0]['person_id'],
      'person_name' => $person_list[0]['person_name'],
      'person_phone' => $person_list[0]['person_phone'],
      'person_address' => $person_list[0]['person_address'],
    ];

    $manage_person = $CI->parser->parse('settings/person_edit', $data, true);
    return $manage_person;
  }

  //personal loan update date
  public function edit_person_loan($person_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $person_list = $CI->Settings->select_loan_person_by_id($person_id);

    $data = [
      'title' => display('personal_edit'),
      'person_id' => $person_list[0]['person_id'],
      'person_name' => $person_list[0]['person_name'],
      'person_phone' => $person_list[0]['person_phone'],
      'person_address' => $person_list[0]['person_address'],
    ];

    $manage_person = $CI->parser->parse('settings/person_loan_edit', $data, true);
    return $manage_person;
  }

  // Edit loan for personal loan
  public function edit_loan($person_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $loan_per_list = $CI->Settings->loan_updatlist_personal();
    $person_list = $CI->Settings->updata_loan_id($person_id);

    $data = [
      'title' => 'Manage Person',
      'person_id' => $loan_per_list,
      'date' => $person_list[0]['date'],
      'per_loan_id' => $person_list[0]['per_loan_id'],
      'per_loan_name' => $person_list[0]['person_name'],
      'seleceted_person_id' => $person_list[0]['person_id'],
      'debit' => $person_list[0]['debit'],
      'credit' => $person_list[0]['credit'],
      'details' => $person_list[0]['details'],
    ];

    $manage_person = $CI->parser->parse('settings/loan_edit', $data, true);
    return $manage_person;
  }

  //Person Ledger data
  public function person_ledger_data($person_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');

    $person_details_all = $CI->Settings->person_list();
    $person_details = $CI->Settings->select_person_by_id($person_id);
    $ledger = $CI->Settings->personledger_tradational($person_id);
    $CI->load->library('occational');
    $balance = 0;
    $total_credit = 0;
    $total_debit = 0;
    $total_balance = 0;

    if (!empty($ledger)) {
      foreach ($ledger as $k => $v) {
        $ledger[$k]['balance'] = $ledger[$k]['debit'] - $ledger[$k]['credit'] + $balance;
        $balance = $ledger[$k]['balance'];
        $ledger[$k]['subtotalDebit'] = $total_debit + $ledger[$k]['debit'];
        $ledger[$k]['date'] = $CI->occational->dateConvert($ledger[$k]['date']);
        $total_debit = $ledger[$k]['subtotalDebit'];
        $ledger[$k]['subtotalCredit'] = $total_credit + $ledger[$k]['credit'];
        $total_credit = $ledger[$k]['subtotalCredit'];
        $ledger[$k]['subtotalBalance'] = $total_balance + $ledger[$k]['balance'];
        $total_balance = $ledger[$k]['subtotalDebit'] - $ledger[$k]['subtotalCredit'];
      }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('person_ledger'),
      'person_details_all' => $person_details_all,
      'person_details' => $person_details,
      'person_id' => $person_details[0]['person_id'],
      'person_name' => $person_details[0]['person_name'],
      'person_phone' => $person_details[0]['person_phone'],
      'person_address' => $person_details[0]['person_address'],
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'ledger' => $ledger,
      'subtotalDebit' => number_format($total_debit, 2, '.', ','),
      'subtotalCredit' => number_format($total_credit, 2, '.', ','),
      'subtotalBalance' => number_format($total_balance, 2, '.', ','),
      'links' => '',
    ];
    $chapterList = $CI->parser->parse('settings/person_ledger', $data, true);
    return $chapterList;
  }

  // personal loan details
  public function person_loan_data($person_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->library('occational');
    $person_details_all = $CI->Settings->person_list_personal_loan();
    $person_details = $CI->Settings->select_loan_person_by_id($person_id);
    $ledger = $CI->Settings->personal_loan_tradational($person_id);
    $balance = 0;
    $total_credit = 0;
    $total_debit = 0;
    $total_balance = 0;

    if (!empty($ledger)) {
      foreach ($ledger as $k => $v) {
        $ledger[$k]['balance'] = $ledger[$k]['debit'] - $ledger[$k]['credit'] + $balance;
        $balance = $ledger[$k]['balance'];
        $ledger[$k]['date'] = $CI->occational->dateConvert($ledger[$k]['date']);
        $ledger[$k]['subtotalDebit'] = $total_debit + $ledger[$k]['debit'];
        $total_debit = $ledger[$k]['subtotalDebit'];
        $ledger[$k]['subtotalCredit'] = $total_credit + $ledger[$k]['credit'];
        $total_credit = $ledger[$k]['subtotalCredit'];
        $ledger[$k]['subtotalBalance'] =
          $ledger[$k]['subtotalDebit'] - $ledger[$k]['subtotalCredit'];
        $total_balance = $ledger[$k]['subtotalBalance'];
      }
    }

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('person_ledger'),
      'person_details_all' => $person_details_all,
      'person_details' => $person_details,
      'person_id' => $person_details[0]['person_id'],
      'person_name' => $person_details[0]['person_name'],
      'person_phone' => $person_details[0]['person_phone'],
      'person_address' => $person_details[0]['person_address'],
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'ledger' => $ledger,
      'subtotalDebit' => number_format($total_debit, 2, '.', ','),
      'subtotalCredit' => number_format($total_credit, 2, '.', ','),
      'subtotalBalance' => number_format($total_balance, 2, '.', ','),
      'links' => '',
    ];
    $chapterList = $CI->parser->parse('settings/person_loan_summary', $data, true);
    return $chapterList;
  }

  //Ledger search by date
  public function ledger_search_by_date($person_id, $from_date, $to_date)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->library('occational');
    $person_details_all = $CI->Settings->person_list();
    $person_details = $CI->Settings->select_person_by_id($person_id);
    $ledger = $CI->Settings->ledger_search_by_date($person_id, $from_date, $to_date);

    $balance = 0;
    $total_credit = 0;
    $total_debit = 0;
    $total_balance = 0;

    if (!empty($ledger)) {
      foreach ($ledger as $k => $v) {
        $ledger[$k]['balance'] = $ledger[$k]['debit'] - $ledger[$k]['credit'] + $balance;
        $balance = $ledger[$k]['balance'];
        $ledger[$k]['date'] = $CI->occational->dateConvert($ledger[$k]['date']);
        $ledger[$k]['subtotalDebit'] = $total_debit + $ledger[$k]['debit'];
        $total_debit = $ledger[$k]['subtotalDebit'];
        $ledger[$k]['subtotalCredit'] = $total_credit + $ledger[$k]['credit'];
        $total_credit = $ledger[$k]['subtotalCredit'];
        $ledger[$k]['subtotalBalance'] = $total_balance + $ledger[$k]['balance'];
        $total_balance = $ledger[$k]['subtotalBalance'];
      }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('person_ledger'),
      'person_details' => $person_details,
      'person_details_all' => $person_details_all,
      'person_id' => $person_details[0]['person_id'],
      'person_name' => $person_details[0]['person_name'],
      'person_phone' => $person_details[0]['person_phone'],
      'person_address' => $person_details[0]['person_address'],
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'ledger' => $ledger,
      'subtotalDebit' => $total_debit,
      'subtotalCredit' => $total_credit,
      'subtotalBalance' => $total_balance,
      'links' => '',
    ];
    $chapterList = $CI->parser->parse('settings/person_ledger', $data, true);
    return $chapterList;
  }

  //person_loan_search_by_date search by date
  public function person_loan_search_by_date($person_id, $from_date, $to_date)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->library('occational');
    $person_details_all = $CI->Settings->pesonal_loan_information();
    $person_details = $CI->Settings->select_person_by_id($person_id);
    $ledger = $CI->Settings->person_loan_search_by_date($person_id, $from_date, $to_date);
    $balance = 0;
    $total_credit = 0;
    $total_debit = 0;
    $total_balance = 0;

    if (!empty($ledger)) {
      foreach ($ledger as $k => $v) {
        $ledger[$k]['balance'] = $ledger[$k]['debit'] - $ledger[$k]['credit'] + $balance;
        $balance = $ledger[$k]['balance'];
        $ledger[$k]['date'] = $CI->occational->dateConvert($ledger[$k]['date']);
        $ledger[$k]['subtotalDebit'] = $total_debit + $ledger[$k]['debit'];
        $total_debit = $ledger[$k]['subtotalDebit'];
        $ledger[$k]['subtotalCredit'] = $total_credit + $ledger[$k]['credit'];
        $total_credit = $ledger[$k]['subtotalCredit'];
        $ledger[$k]['subtotalBalance'] = $total_balance + $ledger[$k]['balance'];
        $total_balance = $ledger[$k]['subtotalBalance'];
      }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('person_ledger'),
      'person_details' => $person_details,
      'person_details_all' => $person_details_all,
      'person_id' => $person_details[0]['person_id'],
      'person_name' => $person_details[0]['person_name'],
      'person_phone' => $person_details[0]['person_phone'],
      'person_address' => $person_details[0]['person_address'],
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'ledger' => $ledger,
      'subtotalDebit' => $total_debit,
      'subtotalCredit' => $total_credit,
      'subtotalBalance' => $total_balance,
      'links' => '',
    ];
    $chapterList = $CI->parser->parse('settings/person_loan_summary', $data, true);
    return $chapterList;
  }

  #===============Bank list============#

  public function bank_list()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Web_settings');
    $bank_list = $CI->Settings->get_bank_list();

    if (!empty($bank_list)) {
      foreach ($bank_list as $index => $value) {
        $bb = $CI->Settings->bank_balance($value['bank_name']);
        $bank_list[$index]['balance'] = !empty($bb[0]['balance']) ? $bb[0]['balance'] : 0;
      }
    }

    $i = 0;
    if (!empty($bank_list)) {
      foreach ($bank_list as $k => $v) {
        $i++;
        $bank_list[$k]['sl'] = $i;
      }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => display('bank_list'),
      'bank_list' => $bank_list,
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
    ];
    $bankList = $CI->parser->parse('settings/bank', $data, true);
    return $bankList;
  }

  public function bkash_list()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Web_settings');
    $bkash_list = $CI->Settings->get_bkash_list();

    if (!empty($bkash_list)) {
      foreach ($bkash_list as $index => $value) {
        $bb = $CI->Settings->bkash_balance($value['bkash_no']);
        $bkash_list[$index]['balance'] = !empty($bb[0]['balance']) ? $bb[0]['balance'] : 0;
      }
    }

    $i = 0;
    if (!empty($bkash_list)) {
      foreach ($bkash_list as $k => $v) {
        $i++;
        $bkash_list[$k]['sl'] = $i;
      }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => 'Bkash List',
      'bkash_list' => $bkash_list,
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
    ];
    $bankList = $CI->parser->parse('settings/bkash', $data, true);
    return $bankList;
  }

  public function nagad_list()
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Web_settings');
    $nagad_list = $CI->Settings->get_nagad_list();

    if (!empty($nagad_list)) {
      foreach ($nagad_list as $index => $value) {
        $bb = $CI->Settings->bank_balance($value['bank_name']);
        $nagad_list[$index]['balance'] = !empty($bb[0]['balance']) ? $bb[0]['balance'] : 0;
      }
    }

    $i = 0;
    if (!empty($nagad_list)) {
      foreach ($nagad_list as $k => $v) {
        $i++;
        $nagad_list[$k]['sl'] = $i;
      }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data = [
      'title' => 'Nagad List',
      'nagad_list' => $nagad_list,
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
    ];
    $bankList = $CI->parser->parse('settings/nagad', $data, true);
    return $bankList;
  }

  #=============Bank show by id=======#

  public function bank_show_by_id($bank_id)
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
    $bank_list = $CI->Settings->get_bank_by_id($bank_id);
    $data = [
      'title' => display('bank_edit'),
      'bank_list' => $bank_list,
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id

    ];
    $bankList = $CI->parser->parse('settings/edit_bank', $data, true);
    return $bankList;
  }

  public function bkash_show_by_id($bkash_id)
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

    $bkash_list = $CI->Settings->get_bkash_by_id($bkash_id);
    $data = [
      'title' => 'Bkash Edit',
      'bkash_list' => $bkash_list,
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    ];
    $bankList = $CI->parser->parse('settings/edit_bkash', $data, true);
    return $bankList;
  }
  public function nagad_show_by_id($nagad_id)
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

    $nagad_list = $CI->Settings->get_nagad_by_id($nagad_id);
    $data = [
      'title' => 'Nagad Edit',
      'nagad_list' => $nagad_list,
      'outlet_list' => $outlet_list,
      'signed_outlet_id'  => $signed_outlet_id
    ];
    $bankList = $CI->parser->parse('settings/edit_nagad', $data, true);
    return $bankList;
  }

  #=============Bank Update by id=======#

  public function bank_update_by_id($bank_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $bank_list = $CI->Settings->bank_update_by_id($bank_id);
    return true;
  }
  public function bkash_update_by_id($bkash_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $bkash_list = $CI->Settings->bkash_update_by_id($bkash_id);
    return true;
  }
  public function nagad_update_by_id($nagad_id)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $nagad_list = $CI->Settings->nagad_update_by_id($nagad_id);
    return true;
  }

  #============bank ledger=============#

  public function bank_ledger($bank_id = null, $from = null, $to = null)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Reports');
    $CI->load->model('Web_settings');
    $CI->load->model('Warehouse');
    $outlet_id = $_POST['outlet'];
    $today   = date('Y-m-d');
    $outlet_user        = $CI->Warehouse->get_outlet_user();
    $cw = $CI->Warehouse->central_warehouse();

    $outlet_list = $CI->Warehouse->branch_list_product();
    if (!$outlet_id) {
      $outlet_id = $outlet_user[0]['outlet_id'];
    }


    $bank_list = $CI->Settings->get_bank_list();
    $from_date = !empty($from) ? $from : date('Y-m-d');
    $to_date = !empty($to) ? $to : date('Y-m-d');
    $bank_info = $CI->Settings->bank_info($bank_id);
    $ledger = $CI->Settings->bank_ledger($bank_info[0]['bank_name'], $from_date, $to_date, $outlet_id);
    $total_ammount = 0;
    $total_credit = 0;
    $total_debit = 0;
    $balance = 0;
    $total_debit = 0;
    $total_credit = 0;

    if (!empty($ledger)) {
      foreach ($ledger as $index => $value) {
        $ledger[$index]['debit'] = $ledger[$index]['Debit'];
        $total_debit += $ledger[$index]['debit'];

        $ledger[$index]['balance'] =
          $balance + ($ledger[$index]['Debit'] - $ledger[$index]['Credit']);
        $ledger[$index]['credit'] = $ledger[$index]['Credit'];
        $total_credit += $ledger[$index]['credit'];
        $balance = $ledger[$index]['balance'];
      }
    }

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $company_info = $CI->Reports->retrieve_company();
    $data = [
      'title' => display('bank_ledger'),
      'ledger' => $ledger,
      'outlet' => $outlet_user,
      'cw' => $cw,
      'outlet_list' => $outlet_list,
      'bank_info' => $bank_info,
      'bank_list' => $bank_list,
      'total_credit' => number_format($total_credit, 2, '.', ','),
      'total_debit' => number_format($total_debit, 2, '.', ','),
      'balance' => number_format($balance, 2, '.', ','),
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'software_info' => $currency_details,
      'company' => $company_info,
    ];
    $bank_ledger = $CI->parser->parse('settings/bank_ledger', $data, true);
    return $bank_ledger;
  }
  public function bkash_ledger($bkash_id = null, $from = null, $to = null)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Reports');
    $CI->load->model('Web_settings');
    $CI->load->model('Warehouse');
    $outlet_id = $_POST['outlet'];

    $outlet_user = $CI->Warehouse->get_outlet_user();
    $cw = $CI->Warehouse->central_warehouse();
    $outlet_list = $CI->Warehouse->branch_list_product();

    if (!$outlet_id) {
      $outlet_id = $outlet_user[0]['outlet_id'];
    }

    $outlet_user        = $CI->Warehouse->get_outlet_user();
    $bkash_list = $CI->Settings->get_bkash_list();
    $from_date = !empty($from) ? $from : date('Y-m-d');
    $to_date = !empty($to) ? $to : date('Y-m-d');
    $bkash_info = $CI->Settings->bkash_info($bkash_id);
    $bkash_no = $bkash_info[0]['bkash_no'];
    $ledger = $CI->Settings->bkash_ledger($bkash_no, $from_date, $to_date, $outlet_id);
    $total_ammount = 0;
    $total_credit = 0;
    $total_debit = 0;
    $balance = 0;
    $total_debit = 0;
    $total_credit = 0;

    if (!empty($ledger)) {
      foreach ($ledger as $index => $value) {
        $ledger[$index]['debit'] = $ledger[$index]['Debit'];
        $total_debit += $ledger[$index]['debit'];

        $ledger[$index]['balance'] =
          $balance + ($ledger[$index]['Debit'] - $ledger[$index]['Credit']);
        $ledger[$index]['credit'] = $ledger[$index]['Credit'];
        $total_credit += $ledger[$index]['credit'];
        $balance = $ledger[$index]['balance'];
      }
    }

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $company_info = $CI->Reports->retrieve_company();
    $data = [
      'title' => "Bkash Ledger",
      'ledger' => $ledger,
      'outlet' => $outlet_user,
      'cw' => $cw,
      'outlet_list' => $outlet_list,
      'bkash_info' => $bkash_info,
      'bkash_list' => $bkash_list,
      'total_credit' => number_format($total_credit, 2, '.', ','),
      'total_debit' => number_format($total_debit, 2, '.', ','),
      'balance' => number_format($balance, 2, '.', ','),
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'software_info' => $currency_details,
      'company' => $company_info,
      'first_outlet' => $outlet_user,
    ];

    //echo '<pre>';print_r($data);exit();
    $bkash_ledger = $CI->parser->parse('settings/bkash_ledger', $data, true);
    return $bkash_ledger;
  }
  public function nagad_ledger($nagad_id = null, $from = null, $to = null)
  {
    $CI = &get_instance();
    $CI->load->model('Settings');
    $CI->load->model('Reports');
    $CI->load->model('Web_settings');
    $CI->load->model('Warehouse');
    $outlet_id = $_POST['outlet'];

    $outlet_user = $CI->Warehouse->get_outlet_user();
    $cw = $CI->Warehouse->central_warehouse();
    $outlet_list = $CI->Warehouse->branch_list_product();

    if (!$outlet_id) {
      $outlet_id = $outlet_user[0]['outlet_id'];
    }

    $outlet_user        = $CI->Warehouse->get_outlet_user();
    $nagad_list = $CI->Settings->get_nagad_list();
    $from_date = !empty($from) ? $from : date('Y-m-d');
    $to_date = !empty($to) ? $to : date('Y-m-d');
    $nagad_info = $CI->Settings->nagad_info($nagad_id);
    $nagad_no = $nagad_info[0]['nagad_no'];
    $ledger = $CI->Settings->nagad_ledger($nagad_no, $from_date, $to_date, $outlet_id);
    $total_ammount = 0;
    $total_credit = 0;
    $total_debit = 0;
    $balance = 0;
    $total_debit = 0;
    $total_credit = 0;

    if (!empty($ledger)) {
      foreach ($ledger as $index => $value) {
        $ledger[$index]['debit'] = $ledger[$index]['Debit'];
        $total_debit += $ledger[$index]['debit'];

        $ledger[$index]['balance'] =
          $balance + ($ledger[$index]['Debit'] - $ledger[$index]['Credit']);
        $ledger[$index]['credit'] = $ledger[$index]['Credit'];
        $total_credit += $ledger[$index]['credit'];
        $balance = $ledger[$index]['balance'];
      }
    }

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $company_info = $CI->Reports->retrieve_company();
    $data = [
      'title' => "Nagad Ledger",
      'ledger' => $ledger,
      'outlet' => $outlet_user,
      'cw' => $cw,
      'outlet_list' => $outlet_list,
      'nagad_info' => $nagad_info,
      'nagad_list' => $nagad_list,
      'total_credit' => number_format($total_credit, 2, '.', ','),
      'total_debit' => number_format($total_debit, 2, '.', ','),
      'balance' => number_format($balance, 2, '.', ','),
      'currency' => $currency_details[0]['currency'],
      'position' => $currency_details[0]['currency_position'],
      'software_info' => $currency_details,
      'company' => $company_info,
      'first_outlet' => $outlet_user,
    ];

    //echo '<pre>';print_r($data);exit();
    $nagad_ledger = $CI->parser->parse('settings/nagad_ledger', $data, true);
    return $nagad_ledger;
  }

  public function card_list()
  {
    $CI = &get_instance();

    $CI->load->model('Settings');

    $card_list = $CI->Settings->read_all_card();

    $i = 0;
    foreach ($card_list as $k => $v) {
      $i++;
      $card_list[$k]['sl'] = $i;
      $card_list[$k]['percentage'] = (float)$card_list[$k]['percentage'];
    }

    $data = [
      'title' => 'Manage Cards',
      'card_list' => $card_list,
    ];

    return $CI->parser->parse('settings/manage_cards', $data, true);
  }

  public function real_card_list()
  {
    $CI = &get_instance();

    $CI->load->model('Settings');

    $card_list = $CI->Settings->get_real_card_data();

    // if (!$card_list) {
    //   echo 'hello';
    // }

    $i = 0;
    foreach ($card_list as $k => $v) {
      $i++;
      $card_list[$k]['sl'] = $i;
    }

    $data = [
      'title' => 'Manage Cards',
      'card_list' => $card_list,
    ];

    // echo '<pre>';
    // print_r($data);
    // exit();

    return $CI->parser->parse('settings/manage_real_card_form', $data, true);
  }
}
