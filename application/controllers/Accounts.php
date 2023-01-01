<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->model(array(
            'accounts_model', 'Web_settings'
        ));
        $this->load->library('laccounting');
        $this->auth->check_admin_auth();
    }


    public function C_O_A()
    {
        $content = $this->laccounting->coa_form();
        $this->template->full_admin_html_view($content);
    }


    // tree view controller
    public function show_tree($id = null)
    {
        $content = $this->laccounting->treeview_form();
        $this->template->full_admin_html_view($content);
    }


    public function selectedform($id)
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $role_reult = $CI->Accounts_model->treeview_selectform($id);
        $baseurl = base_url() . 'accounts/insert_coa';


        if ($role_reult) {
            $html = "";
            $html .= form_open_multipart('accounts/insert_coa', 'id="form"');
            $html .= "<div id=\"newData\">
   <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
      <tr>
        <td>Head Code</td>
        <td><input type=\"text\" name=\"txtHeadCode\" id=\"txtHeadCode\" class=\"form_input\"  value=\"" . $role_reult->HeadCode . "\" /></td>
      </tr>
      <tr>
        <td>Head Name</td>
        <td><input type=\"text\" name=\"txtHeadName\" id=\"txtHeadName\" class=\"form_input\" value=\"" . $role_reult->HeadName . "\"/>
<input type=\"hidden\" name=\"HeadName\" id=\"HeadName\" class=\"form_input\" value=\"" . $role_reult->HeadName . "\"/>
        </td>
      </tr>
      <tr>
        <td>Parent Head</td>
        <td><input type=\"text\" name=\"txtPHead\" id=\"txtPHead\" class=\"form_input\" readonly=\"readonly\" value=\"" . $role_reult->PHeadName . "\"/></td>
      </tr>
      <tr>

        <td>Head Level</td>
        <td><input type=\"text\" name=\"txtHeadLevel\" id=\"txtHeadLevel\" class=\"form_input\" readonly=\"readonly\" value=\"" . $role_reult->HeadLevel . "\"/></td>
      </tr>
       <tr>
        <td>Head Type</td>
        <td><input type=\"text\" name=\"txtHeadType\" id=\"txtHeadType\" class=\"form_input\" readonly=\"readonly\" value=\"" . $role_reult->HeadType . "\"/></td>
      </tr>

       <tr>
         <td>&nbsp;</td>
         <td><input type=\"checkbox\" name=\"IsTransaction\" value=\"1\" id=\"IsTransaction\" size=\"28\"  onchange=\"IsTransaction_change()\"";
            if ($role_reult->IsTransaction == 1) {
                $html .= "checked";
            }
            $html .= "/><label for=\"IsTransaction\"> IsTransaction</label>
         <input type=\"checkbox\" value=\"1\" name=\"IsActive\" id=\"IsActive\" size=\"28\"";
            if ($role_reult->IsActive == 1) {
                $html .= "checked";
            }
            $html .= "/><label for=\"IsActive\"> IsActive</label>
         <input type=\"checkbox\" value=\"1\" name=\"IsGL\" id=\"IsGL\" size=\"28\" onchange=\"IsGL_change();\"";
            if ($role_reult->IsGL == 1) {
                $html .= "checked";
            }
            $html .= "/><label for=\"IsGL\"> IsGL</label>

        </td>";
            $html .= "</tr>
       <tr>
                    <td>&nbsp;</td>
                    <td>";
            $html .= "<input type=\"button\" name=\"btnNew\" id=\"btnNew\" value=\"New\" onClick=\"newHeaddata(" . $role_reult->HeadCode . ")\" />
                      <input type=\"submit\" name=\"btnSave\" id=\"btnSave\" value=\"Save\" disabled=\"disabled\"/>";

            $html .= " <input type=\"submit\" name=\"btnUpdate\" id=\"btnUpdate\" value=\"Update\" />";
            $html .= "</tr></table>
 </form>
			";
        }

        echo json_encode($html);
    }

    public function newform($id)
    {

        $newdata = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode', $id)
            ->get()
            ->row();


        $newidsinfo = $this->db->select('*,count(HeadCode) as hc')
            ->from('acc_coa')
            ->where('PHeadName', $newdata->HeadName)
            ->get()
            ->row();

        $nid  = $newidsinfo->hc;
        $n = $nid + 1;
        if ($n / 10 < 1)
            $HeadCode = $id . "0" . $n;
        else
            $HeadCode = $id . $n;

        $info['headcode'] =  $HeadCode;
        $info['rowdata'] =  $newdata;
        $info['headlabel'] =  $newdata->HeadLevel + 1;
        echo json_encode($info);
    }

    public function insert_coa()
    {
        $headcode    = $this->input->post('txtHeadCode', TRUE);
        $newdata = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode', $headcode)
            ->get()
            ->row();
        if ($newdata) {
            $this->session->set_flashdata('error_message',  "Headcode Exist !");
            redirect("accounts/show_tree");
        } else {
            $HeadName    = $this->input->post('txtHeadName', TRUE);
            $PHeadName   = $this->input->post('txtPHead', TRUE);
            $HeadLevel   = $this->input->post('txtHeadLevel', TRUE);
            $txtHeadType = $this->input->post('txtHeadType', TRUE);
            $isact       = $this->input->post('IsActive', TRUE);
            $IsActive    = (!empty($isact) ? $isact : 0);
            $trns        = $this->input->post('IsTransaction', TRUE);
            $IsTransaction = (!empty($trns) ? $trns : 0);
            $isgl        = $this->input->post('IsGL', TRUE);
            $IsGL       = (!empty($isgl) ? $isgl : 0);
            $createby = $this->session->userdata('user_id');
            $createdate = date('Y-m-d H:i:s');
            $postData = array(
                'HeadCode'       =>  $headcode,
                'HeadName'       =>  $HeadName,
                'PHeadName'      =>  $PHeadName,
                'HeadLevel'      =>  $HeadLevel,
                'IsActive'       =>  $IsActive,
                'IsTransaction'  =>  $IsTransaction,
                'IsGL'           =>  $IsGL,
                'HeadType'       => $txtHeadType,
                'IsBudget'       => 0,
                'CreateBy'       => $createby,
                'CreateDate'     => $createdate,
            );
            $upinfo = $this->db->select('*')
                ->from('acc_coa')
                ->where('HeadCode', $headcode)
                ->get()
                ->row();
            if (empty($upinfo)) {
                $this->db->insert('acc_coa', $postData);
            } else {

                $hname = $this->input->post('HeadName', TRUE);
                $updata = array(
                    'PHeadName'      =>  $HeadName,
                );


                $this->db->where('HeadCode', $headcode)
                    ->update('acc_coa', $postData);
                $this->db->where('PHeadName', $hname)
                    ->update('acc_coa', $updata);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // Debit voucher Create
    public function debit_voucher()
    {
        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $bank_list        = $this->Web_settings->bank_list();
        $card_list = $CI->Settings->get_real_card_data();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();

        $data = array(
            'bank_list'     => $bank_list,
            'card_list'     => $card_list,
            'bkash_list'    => $bkash_list,
            'nagad_list'    => $nagad_list
        );
        $data['title'] = display('debit_voucher');
        $data['acc'] = $this->accounts_model->Transacc();
        $data['voucher_no'] = $this->accounts_model->voNO();
        $data['crcc'] = $this->accounts_model->Cracc();

        // echo '<pre>';print_r($data['acc']);exit();
        $content = $this->parser->parse('newaccount/debit_voucher', $data, true);
        $this->template->full_admin_html_view($content);
    }

    // cash adjustment
    public function cash_adjustment()
    {
        $data['title']      = display('cash_adjustment');
        $data['voucher_no'] = $this->accounts_model->Cashvoucher();
        $content = $this->parser->parse('newaccount/cash_adjustment', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Create Cash Adjustment
    public function create_cash_adjustment()
    {
        $this->form_validation->set_rules('txtAmount', display('amount'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->insert_cashadjustment()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect('accounts/cash_adjustment/');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/cash_adjustment");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/cash_adjustment");
        }
    }

    public function balance_sheet()
    {
        $data['title']       = display('balance_sheet');
        $from_date           = (!empty($this->input->post('dtpFromDate')) ? $this->input->post('dtpFromDate') : date('Y-m-d'));
        $to_date             = (!empty($this->input->post('dtpToDate')) ? $this->input->post('dtpToDate') : date('Y-m-d'));
        $data['from_date']   = $from_date;
        $data['to_date']     = $to_date;
        $data['fixed_assets'] = $this->account_model->fixed_assets();
        $data['liabilities'] = $this->account_model->liabilities_data();
        $data['incomes']     = $this->account_model->income_fields();
        $data['expenses']    = $this->account_model->expense_fields();
        $data['module']      = "account";
        $data['page']        = "balance_sheet";
        echo modules::run('template/layout', $data);
    }

    // Debit voucher code select onchange
    public function debtvouchercode($id)
    {

        //        $debitvcode = $this->db->select('*')
        //            ->from('acc_coa')
        //            ->where('HeadCode',$id)
        //            ->get()
        //            ->row();
        //    $code = $debitvcode->balance;

        $debitvcode =  $this->db->select("
        b.HeadCode,b.customer_id,((select ifnull(sum(Debit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)-(select ifnull(sum(Credit),0) from acc_transaction where COAID= `b`.`HeadCode` AND IsAppove = 1)) as balance")
            ->from('acc_coa b')
            ->where('b.HeadCode', $id)
            ->get()
            ->row();


        $data['HeadCode'] = $debitvcode->HeadCode;
        $data['balance'] = $debitvcode->balance;
        $data['customer_id'] = $debitvcode->customer_id;
        echo json_encode($data);
    }
    //Supplier code
    public function supplier_headcode($id)
    {
        $supplier_info = $this->db->select('supplier_name')->from('supplier_information')->where('supplier_id', $id)->get()->row();
        $head_name = $id . '-' . $supplier_info->supplier_name;
        $supplierhcode = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadName', $head_name)
            ->get()
            ->row();
        $code = $supplierhcode->HeadCode;
        echo json_encode($code);
    }
    //Create Debit Voucher
    public function create_debit_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');

        $_SESSION['pay_to'] = $this->input->post('pay_to', TRUE);
        if ($this->form_validation->run()) {
            if ($this->accounts_model->insert_debitvoucher()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect("accounts/print_voucher/" . addslashes(trim($this->input->post('txtVNo', TRUE))) . "/");
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            // redirect("accounts/debit_voucher");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/debit_voucher");
        }
    }

    public function print_voucher($v_no)
    {
        $CI = &get_instance();

        $CI->load->library('numbertowords');
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();


        $v_details = $CI->Accounts_model->get_v_details($v_no);

        $tot_cr = array_sum(array_column($v_details, 'Credit'));
        $tot_dr = array_sum(array_column($v_details, 'Debit'));

        $tot_dr = number_format($tot_dr, 2, '.', '');
        $tot_cr = number_format($tot_cr, 2, '.', '');

        $company_info = $CI->Invoices->retrieve_company();

        // echo '<pre>';
        // print_r('');
        // exit;

        $pay_to = $_SESSION['pay_to'];

        $total_amnt = ($v_details[0]['Vtype'] == "DV") ? $tot_dr : $tot_cr;
        $inwords = $CI->numbertowords->convert_number($total_amnt);

        $count = 0;
        foreach ($v_details as $v) {
            if ($v['Vtype'] == "DV" && $v['Debit'] > 0) {
                $count++;
            } elseif ($v['Vtype'] == "CV" && $v['Credit'] > 0) {
                $count++;
            }
        }

        $data = array(
            'title'     => 'Voucher Print',
            'pay_to'    => $pay_to,
            'company_info'      => $company_info,
            'currency_det'  => $currency_details,
            'v_details'     => $v_details,
            'v_date'          => $v_details[0]['VDate'],
            'v_type'        => $v_details[0]['Vtype'],
            'v_no' => $v_no,
            'num_rows'  => $count + 1,
            'total_amnt'    => $total_amnt,
            'inwords'       => $inwords,
            'link'          => ($v_details[0]['Vtype'] == 'DV') ? "debit_voucher" : "credit_voucher",
        );

        $view = $CI->parser->parse('newaccount/voucher_print', $data, true);
        $this->template->full_admin_html_view($view);
    }


    // Update Debit voucher
    public function update_debit_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->update_debitvoucher()) {
                $this->session->set_flashdata('message', display('update_successfully'));
                redirect('accounts/aprove_v/');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/aprove_v");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/accounts/aprove_v");
        }
    }

    //Credit voucher
    public function credit_voucher()
    {
        $CI = &get_instance();

        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $bank_list        = $this->Web_settings->bank_list();
        $card_list = $CI->Settings->get_real_card_data();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $data = array(
            'bank_list'     => $bank_list,
            'card_list'     => $card_list,
            'bkash_list'    => $bkash_list,
            'nagad_list'    => $nagad_list
        );


        $data['title'] = display('credit_voucher');
        $data['acc'] = $this->accounts_model->cr_transacc();
        $data['voucher_no'] = $this->accounts_model->crVno();
        $data['crcc'] = $this->accounts_model->Cracc();
        $content = $this->parser->parse('newaccount/credit_voucher', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function money_reciept()
    {
        $CI = &get_instance();
        $CI->load->model('Customers');
        $CI->load->model('Web_settings');

        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $data['title'] = 'Money Receipt';
        $data['customer'] = $this->Customers->customer_list_ledger_cheque();
        $data['acc'] = $this->accounts_model->Transacc();
        $data['voucher_no'] = $this->accounts_model->mr_no();
        $data['crcc'] = $this->accounts_model->Cracc();
        $data['bkash_list'] = $bkash_list;
        $data['nagad_list'] = $nagad_list;
        $content = $this->parser->parse('newaccount/money_reciept', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function add_daily_closing()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $logged_in_outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];


        //        $CI = & get_instance();
        //        $CI->load->model('Accounts_model');

        $closedata = $this->db->select('*')->from('daily_closing')
            ->where('date', date('Y-m-d'))
            ->where('outlet_id', $logged_in_outlet_id)
            ->get()->num_rows();


        if ($closedata > 0) {
            $this->session->set_userdata(array('error_message' => 'Already Closed Today'));
            redirect(base_url('Admin_dashboard/closing'));
            exit;
        }


        $todays_date = date("Y-m-d");
        $last_day_closing = $this->input->post('last_day_closing', TRUE);
        $cash_in = $this->input->post('cash_in', TRUE);
        $cash_out = $this->input->post('cash_out', TRUE);
        $cash_in_hand = $this->input->post('cash_in_hand', TRUE);

        //        $data = array(
        //            'closing_id'        =>  $this->generator(15),
        //            'last_day_closing'  =>  str_replace(',', '',$last_day_closing),
        //            'cash_in'           =>  str_replace(',', '', $cash_in),
        //            'cash_out'          =>  str_replace(',', '', $cash_out),
        //            'date'              =>  $todays_date,
        //            'amount'            =>  str_replace(',', '', $cash_in_hand),
        //            'status'            =>  1
        //        );
        $data['closing_id'] = mt_rand();
        $data['last_day_closing'] = str_replace(',', '', $last_day_closing);
        $data['cash_in'] =  str_replace(',', '', $cash_in);
        $data['cash_out'] = str_replace(',', '', $cash_out);
        $data['date'] = $todays_date;
        $data['outlet_id'] = $logged_in_outlet_id;
        $data['amount'] = str_replace(',', '', $cash_in_hand);
        $data['status'] = 1;


        // echo '<pre>';print_r($data);exit();
        $this->db->insert('daily_closing', $data);
        //$invoice_id = $this->accounts_model->daily_closing_entry($data);


        $this->session->set_userdata(array('message' => display('successfully_added')));
        redirect(base_url('Admin_dashboard/closing_report'));
        exit;
    }

    //Create Credit Voucher
    public function create_credit_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        $_SESSION['pay_to'] = $this->input->post('pay_to', TRUE);
        if ($this->form_validation->run()) {
            if ($this->accounts_model->insert_creditvoucher()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect("accounts/print_voucher/" . addslashes(trim($this->input->post('txtVNo', TRUE))) . "/");
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            // redirect("accounts/money_reciept");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/money_reciept");
        }
    }
    public function create_money_receipt()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        $id = $this->input->post('txtCode', TRUE);
        $coaid =  addslashes(trim($this->input->post('txtVNo', TRUE)));
        if ($this->form_validation->run()) {
            if ($this->accounts_model->insert_moneyrecipt()) {
                $this->session->set_flashdata('message', display('save_successfully'));



                redirect('accounts/money_receipt_print/' . $coaid . '/' . $id);
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/money_reciept");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/money_reciept");
        }
    }

    public function money_receipt_print($coaid, $id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('laccounts');
        $content = $CI->laccounts->money_receipt_html_data($coaid, $id);
        $this->template->full_admin_html_view($content);
    }
    // Contra Voucher form
    public function contra_voucher()
    {
        $data['title'] = display('contra_voucher');
        $data['acc'] = $this->accounts_model->ContV_transacc();
        $data['voucher_no'] = $this->accounts_model->contra();
        $content = $this->parser->parse('newaccount/contra_voucher', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Create Contra Voucher
    public function create_contra_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->insert_contravoucher()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect('accounts/contra_voucher/');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/contra_voucher");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/contra_voucher");
        }
    }
    // Journal voucher
    public function journal_voucher()
    {
        $data['title'] = display('journal_voucher');
        $data['acc'] = $this->accounts_model->JV_transacc();
        $data['voucher_no'] = $this->accounts_model->journal();
        $content = $this->parser->parse('newaccount/journal_voucher', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Create Journal Voucher
    public function create_journal_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->insert_journalvoucher()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect('accounts/journal_voucher/');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/journal_voucher");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/journal_voucher");
        }
    }

    public function update_journal_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->update_journalvoucher()) {
                $this->session->set_flashdata('message', display('successfully_updated'));
                redirect('accounts/aprove_v');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/aprove_v");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/aprove_v");
        }
    }

    public function update_contra_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->update_contravoucher()) {
                $this->session->set_flashdata('message', display('successfully_updated'));
                redirect('accounts/aprove_v');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/aprove_v");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/aprove_v");
        }
    }
    //Aprove voucher
    public function aprove_v()
    {
        $data['title'] = display('voucher_approve');
        $data['aprrove'] = $this->accounts_model->approve_voucher();
        $content = $this->parser->parse('newaccount/voucher_approve', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function approved_voucher()
    {
        $data['title'] = "Approved Vouchers";
        $data['aprrove'] = $this->accounts_model->get_approved_voucher();
        $content = $this->parser->parse('newaccount/approved_voucher_view', $data, true);
        $this->template->full_admin_html_view($content);
    }
    // isApprove
    public function isactive($id = null, $action = null)
    {
        $action = ($action == 'active' ? 1 : 0);
        $postData = array(
            'VNo'     => $id,
            'IsAppove' => $action
        );

        if ($this->accounts_model->approved($postData)) {
            $this->session->set_flashdata('message', display('successfully_approved'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function voucher_delete($voucher)
    {
        if ($this->accounts_model->delete_voucher($voucher)) {
            $this->session->set_flashdata('message', display('successfully_delete'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    //Update voucher
    public function voucher_update($id = null)
    {
        $vtype = $this->db->select('*')
            ->from('acc_transaction')
            ->where('VNo', $id)
            ->get()
            ->result_array();

        if ($vtype[0]['Vtype'] == "DV") {
            $data['title'] = display('update_debit_voucher');
            $data['dbvoucher_info'] = $this->accounts_model->dbvoucher_updata($id);
            $data['credit_info'] = $this->accounts_model->crvoucher_updata($id);
            $data['acc'] = $this->accounts_model->Transacc();
            $page =  'newaccount/update_dbt_crtvoucher';
        }

        if ($vtype[0]['Vtype'] == "JV") {
            $data['title'] = 'Update' . ' ' . display('journal_voucher');
            $data['acc'] = $this->accounts_model->JV_transacc();
            $data['voucher_info'] = $this->accounts_model->journal_updata($id);
            $page =  'newaccount/update_journal_voucher';
        }


        if ($vtype[0]['Vtype'] == "Contra") {
            $data['title'] = 'Update' . ' ' . display('contra_voucher');
            $data['acc'] = $this->accounts_model->ContV_transacc();
            $data['voucher_info'] = $this->accounts_model->journal_updata($id);
            $page =  'newaccount/update_contra_voucher';
        }

        if ($vtype[0]['Vtype'] == "CV") {
            $data['title'] = display('update_credit_voucher');
            $data['crvoucher_info'] = $this->accounts_model->crdtvoucher_updata($id);
            $data['debit_info'] = $this->accounts_model->debitvoucher_updata($id);
            $data['acc'] = $this->accounts_model->cr_transacc();
            $page =  'newaccount/update_credit_bdtvoucher';
        }
        $data['crcc'] = $this->accounts_model->Cracc();
        $content = $this->parser->parse($page, $data, true);
        $this->template->full_admin_html_view($content);
    }
    // update credit voucher
    public function update_credit_voucher()
    {
        $this->form_validation->set_rules('cmbDebit', display('cmbDebit'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->update_creditvoucher()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect('accounts/aprove_v/');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/aprove_v");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/aprove_v");
        }
    }

    //Trial Balannce
    public function trial_balance()
    {
        $data['title']  = display('trial_balance');
        $content = $this->parser->parse('newaccount/trial_balance', $data, true);
        $this->template->full_admin_html_view($content);
    }
    //Trial Balance Report
    public function trial_balance_report()
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['software_info'] = $CI->Accounts_model->software_setting_info();
        $dtpFromDate     = $this->input->post('dtpFromDate', TRUE);
        // $dtpToDate       = $this->input->post('dtpToDate',TRUE);
        $dtpToDate       = $today = date("F j, Y");
        // $chkWithOpening  = $this->input->post('chkWithOpening',TRUE);

        $results         = $this->accounts_model->trial_balance_report();


        //  echo '<pre>';print_r($results);exit();

        //        if ($results['WithOpening']) {
        //            $data['oResultTr']    = $results['oResultTr'];
        //            $data['oResultInEx']  = $results['oResultInEx'];
        //            $data['dtpFromDate']  = $dtpFromDate;
        //            $data['dtpToDate']    = $dtpToDate;
        //
        //            // PDF Generator
        //            $this->load->library('pdfgenerator');
        //            $dompdf = new DOMPDF();
        //            $page = $this->load->view('newaccount/trial_balance_with_opening_pdf',$data,true);
        //            $dompdf->load_html($page);
        //            $dompdf->render();
        //            $output = $dompdf->output();
        //            file_put_contents('assets/data/pdf/Trial Balance With Opening As On '.$dtpFromDate.' To '.$dtpToDate.'.pdf', $output);
        //
        //
        //            $data['pdf']    = 'assets/data/pdf/Trial Balance With Opening As On '.$dtpFromDate.' To '.$dtpToDate.'.pdf';
        //            $data['title']  = display('trial_balance_report');
        //         //  echo '<pre>';print_r($data);exit();
        //            $content = $this->parser->parse('newaccount/trial_balance_with_opening', $data, true);
        //            $this->template->full_admin_html_view($content);
        //        }else{

        $data['oResultTr']    = $results['oResultTr'];
        $data['oResultInEx']  = $results['oResultInEx'];
        //  $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;

        // PDF Generator
        $this->load->library('pdfgenerator');
        $dompdf = new DOMPDF();
        $page = $this->load->view('newaccount/trial_balance_without_opening_pdf', $data, true);
        $dompdf->load_html($page);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/Trial Balance As On till' . $dtpToDate . '.pdf', $output);
        $data['pdf']    = 'assets/data/pdf/Trial Balance As On till ' . $dtpToDate . '.pdf';


        $data['title']  = display('trial_balance_report');
        // echo '<pre>';print_r($data);exit();
        // $content = $this->parser->parse('newaccount/trial_balance_without_opening', $data, true);
        $content = $this->parser->parse('newaccount/trial_balance_without_opening', $data, true);
        $this->template->full_admin_html_view($content);
        // }

    }



    public function vouchar_cash($date)
    {
        $vouchar_view = $this->accounts_model->get_vouchar_view($date);
        $data = array(
            'vouchar_view' => $vouchar_view,
        );

        $data['title'] = display('accounts_form');
        $content = $this->parser->parse('newaccount/vouchar_cash', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function general_ledger()
    {
        $CI = &get_instance();

        $general_ledger = $this->accounts_model->get_general_ledger();
        $data = array(
            'general_ledger' => $general_ledger,
        );

        $CI->load->model('Warehouse');
        // $CI->load->model('Invoices');
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();
        $data['first_outlet'] = $outlet_user;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;

        $data['title'] = display('general_ledger');
        $content = $this->parser->parse('newaccount/general_ledger', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function general_led($Headid = NULL)
    {
        $Headid = $this->input->post('Headid', TRUE);
        $HeadName = $this->accounts_model->general_led_get($Headid);
        echo  "<option>Transaction Head</option>"; // Always keep this as Transaction Head. Else, you will regret😈
        $html = "";
        foreach ($HeadName as $data) {
            $html .= "<option value='$data->HeadCode'>$data->HeadName</option>";
        }
        echo $html;
    }
    //      working
    public function voucher_report_serach($vouchar = NULL)
    {
        echo $vouchar = $this->input->post('vouchar', TRUE);

        $voucher_report_serach = $this->accounts_model->voucher_report_serach($vouchar);

        if ($voucher_report_serach->Amount == '') {
            $pay = '0.00';
        } else {
            $pay = $voucher_report_serach->Amount;
        }
        $baseurl = base_url() . 'accounts/vouchar_cash/' . $vouchar;
        $html = "";
        $html .= "<td>
                   <a href=\"$baseurl\">CV-BAC-$vouchar</a>
                 </td>
                 <td>Aggregated Cash Credit Voucher of $vouchar</td>
                 <td>$pay</td>
                 <td align=\"center\">$vouchar</td>";
        echo $html;
    }
    //general ledger working
    public function accounts_report_search()
    {
        // echo '<pre>';
        // print_r($_POST);
        // exit();
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $CI->load->model('Warehouse');
        $outlet = $CI->Warehouse->get_outlet_user();
        $cmbGLCode   = $this->input->post('cmbGLCode', TRUE);
        $cmbCode     = $this->input->post('cmbCode', TRUE);
        $dtpFromDate = $this->input->post('dtpFromDate', TRUE);
        $dtpToDate   = $this->input->post('dtpToDate', TRUE);
        $outlet_id = $this->input->post('outlet', TRUE);

        if (!$outlet_id) {
            $outlet_id = $outlet[0]['outlet_id'];
        }

        $chkIsTransction = $this->input->post('chkIsTransction', TRUE);
        $HeadName    = $this->accounts_model->general_led_report_headname($cmbGLCode);
        $HeadName2   = $this->accounts_model->general_led_report_headname2($cmbGLCode, $cmbCode, $dtpFromDate, $dtpToDate, $chkIsTransction, $outlet_id);
        $pre_balance = $this->accounts_model->general_led_report_prebalance($cmbCode, $dtpFromDate, $outlet_id, $cmbGLCode);

        $data = array(
            'dtpFromDate' => $dtpFromDate,
            'dtpToDate'   => $dtpToDate,
            'HeadName'    => $HeadName,
            'HeadName2'   => $HeadName2,
            'prebalance'  =>  $pre_balance,
            'chkIsTransction' => $chkIsTransction,

        );
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['software_info'] = $CI->Accounts_model->software_setting_info();

        if ($cmbCode == "Transaction Head")
            $cmbCode = $cmbGLCode;
        $data['ledger'] = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode', $cmbCode)
            ->get()
            ->result_array();
        $data['title'] = display('general_ledger_report');

        // echo '<pre>';
        // print_r($data);
        // exit();
        $content = $this->parser->parse('newaccount/general_ledger_report', $data, true);
        $this->template->full_admin_html_view($content);
    }


    public function cash_book()
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $CI->load->model('Warehouse');
        // $CI->load->model('Invoices');
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();

        $data['title'] = display('cash_book');
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['first_outlet'] = $outlet_user;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;
        $data['software_info'] = $CI->Accounts_model->software_setting_info();

        $oneMnthAgo = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
        $today = date("Y-m-d");


        $_POST['btnSave'] = isset($_POST['btnSave']) ? $_POST['btnSave'] : "yes";
        $_POST['txtCode'] = "1020101";
        $_POST['txtName'] = "Cash In Hand";
        $_POST['dtpFromDate'] = isset($_POST['dtpFromDate']) ? $_POST['dtpFromDate'] : $oneMnthAgo;
        $_POST['dtpToDate'] = isset($_POST['dtpToDate']) ? $_POST['dtpToDate'] : $today;

        $_POST['outlet'] = isset($_POST['outlet']) ?
            $_POST['outlet'] : ($outlet_user
                ? $outlet_list[0]['outlet'] : 1);

        // echo '<pre>';
        // print_r($data);
        // exit();

        $content = $this->parser->parse('newaccount/cash_book', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function bank_book()
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $CI->load->model('Warehouse');
        // $CI->load->model('Invoices');
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();
        $data['first_outlet'] = $outlet_user;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;
        $data['title'] = display('bank_book');
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['software_info'] = $CI->Accounts_model->software_setting_info();
        $content = $this->parser->parse('newaccount/bank_book', $data, true);
        $this->template->full_admin_html_view($content);
    }
    // Inventory Report
    public function inventory_ledger()
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $CI->load->model('Warehouse');
        // $CI->load->model('Invoices');
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();
        $data['first_outlet'] = $outlet_user;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['software_info'] = $CI->Accounts_model->software_setting_info();
        $data['title'] = display('Inventory_ledger');
        $content = $this->parser->parse('newaccount/inventory_ledger', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function voucher_report()
    {
        $get_cash = $this->accounts_model->get_cash();
        $get_vouchar = $this->accounts_model->get_vouchar();
        $data = array(
            'get_cash' => $get_cash,
            'get_vouchar' => $get_vouchar,
        );
        $data['title']  = display('accounts_form');
        $content = $this->parser->parse('newaccount/coa', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function coa_print()
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['software_info'] = $CI->Accounts_model->software_setting_info();
        $data['title'] = display('accounts_form');
        $content = $this->parser->parse('newaccount/coa_print', $data, true);
        $this->template->full_admin_html_view($content);
    }
    //Profit loss report page
    public function profit_loss_report()
    {
        $data['title'] = display('profit_loss_report');
        $content = $this->parser->parse('newaccount/profit_loss_report', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function balance_sheet_report()
    {
        $data['title'] = 'Balance Sheet Report';
        $content = $this->parser->parse('newaccount/balance_sheet_report', $data, true);
        $this->template->full_admin_html_view($content);
    }
    //Profit loss serch result
    //Base project profit loss report

    //    public function profit_loss_report_search(){
    //        $dtpFromDate = $this->input->post('dtpFromDate',TRUE);
    //        $dtpToDate   = $this->input->post('dtpToDate',TRUE);
    //        $today   = date('Y-m-d');
    //
    //        $get_profit  = $this->accounts_model->profit_loss_serach();
    //
    //        $data['oResultAsset'] = $get_profit['oResultAsset'];
    //        $data['oResultLiability']  = $get_profit['oResultLiability'];
    //        $data['dtpFromDate']  = $dtpFromDate;
    //        $data['dtpToDate']    = $dtpToDate;
    //        $data['today']    = $today;
    //        $data['pdf']    = 'assets/data/pdf/Statement of Comprehensive Income Till '.$today.'.pdf';
    //        $data['title']  = display('profit_loss_report');
    //        $content = $this->parser->parse('newaccount/profit_loss', $data, true);
    //        $this->template->full_admin_html_view($content);
    //    }


    public function balance_sheet_report_search_new()
    {
        //        echo '<pre>';print_r($_POST);
        //        echo '<pre>';print_r($_GET);
        //        exit();

        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Rqsn');
        $outlet_text = (!empty($this->input->post('outlet_text', TRUE)) ? $this->input->post('outlet_text', TRUE) : 'Consolidated');
        $dtpFromDate = (!empty($this->input->post('dtpFromDate', TRUE)) ? $this->input->post('dtpFromDate', TRUE) : date('Y-m-d'));

        $dtpToDate = (!empty($this->input->post('dtpToDate', TRUE)) ? $this->input->post('dtpToDate', TRUE) : date('Y-m-d'));



        $today   = date('Y-m-d');

        $outlet_id = $this->input->post('outlet');
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();

        $get_profit  = $this->accounts_model->balance_sheet($outlet_id, $dtpFromDate, $dtpToDate);

        if (!$outlet_id) {
            $outlet_id = $outlet_user[0]['outlet_id'];
        }


        if ($outlet_id) {
            $closing = $this->Rqsn->outlet_stock(null, null, null, $dtpFromDate, $dtpToDate);
            $closing_finished = $closing['closing_finished'];
            $closing_raw = $closing['closing_raw'];
            $closing_tools = $closing['closing_tools'];
        } else {
            $closing = $this->Reports->getCheckList(null, null, null, $dtpFromDate, $dtpToDate);
            $closing_finished = $closing['closing_finished'];
            $closing_raw = $closing['closing_raw'];
            $closing_tools = $closing['closing_tools'];
        }

        $closing_inventory = $closing_finished + $closing_raw + $closing_tools;


        if ($outlet_id) {
            $opening_inventory = $this->Rqsn->outlet_stock(null, null, null, $dtpFromDate, $dtpToDate)['opening_finished'];
        } else {
            $opening_inventory = $this->Reports->getCheckList(null, null, null, $dtpFromDate, $dtpToDate)['opening_finished'];
        }
        //$postData = $this->input->post();

        $data['emp_led_c']  =    $get_profit['emp_led_c'];
        $data['acc_rcv_c']  =    $get_profit['acc_rcv_c'];
        $data['cash_eq_c']  =    $get_profit['cash_eq_c'];
        $data['cash_hand_c']  =    $get_profit['cash_hand_c'];
        $data['cash_bkash_c']  =    $get_profit['cash_bkash_c'];
        $data['cash_nagad_c']  =    $get_profit['cash_nagad_c'];
        $data['cash_bank_c']  =    $get_profit['cash_bank_c'];
        $data['outlet'] = $outlet_user;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;
        $data['oResultAsset'] = $get_profit['oResultAsset'];
        $data['oResultLiability']  = $get_profit['oResultLiability'];
        $data['product_sale']  = $get_profit['product_sale'];
        $data['opening_inventory']  = $get_profit['opening_inventory'];
        $data['product_purchase']  = $get_profit['product_purchase'];
        $data['closing_inventory']  = $closing_inventory;
        $data['closing_finished']  = $closing_finished;
        $data['closing_raw']  = $closing_raw;
        $data['closing_tools']  = $closing_tools;
        $data['service_income']  = $get_profit['service_income'];
        $data['direct_expense']  = $get_profit['direct_expense'];
        $data['indirect_expense']  = $get_profit['indirect_expense'];
        $data['indirect_income']  = $get_profit['indirect_income'];
        $data['sale_return']  = $get_profit['sale_return'];
        $data['expense']  = $get_profit['expense'];
        $data['indirect_expense_c']  = $get_profit['indirect_expense_c'];
        $data['indirect_income_c']  = $get_profit['indirect_income_c'];
        $data['goods_sold']  = $get_profit['opening_inventory'] + $get_profit['product_purchase'] + $closing_inventory;
        $data['total_i']  = ($get_profit['opening_inventory'] + $get_profit['product_purchase'] + $data['direct_expense']) - $data['closing_inventory'];

        //        $data['total_sale']  = $get_profit['product_sale'] - $get_profit['sale_return'] + $get_profit['service_income'];
        //        $data['gross_profit']  =    $data['total_sale'] -  $data['total_i'];
        //

        $data['capital']  =    $get_profit['capital'];
        $data['current_liabilities']  =    $get_profit['current_liabilities'];
        $data['acc_pay_c']  =    $get_profit['acc_pay_c'];
        $data['non_current_liabilities']  =    $get_profit['non_current_liabilities'];
        $data['non_current_liabilities_c']  =    $get_profit['non_current_liabilities_c'];
        $data['fixed_assets']  =    $get_profit['fixed_assets'];
        $data['fixed_assets_c']  =    $get_profit['fixed_assets_c'];
        $data['current_assets']  =    $get_profit['current_assets'] + $data['closing_inventory'];
        $data['current_assets_c']  =    $get_profit['current_assets_c'];
        $data['acc_rcv']  =    $get_profit['acc_rcv'];
        $data['acc_pay']  =    $get_profit['acc_pay'];
        $data['emp_led']  =    $get_profit['emp_led'];

        $data['emp_led_c']  =    $get_profit['emp_led_c'];
        $data['cash_eq']  =    $get_profit['cash_eq'];
        $data['cash_hand']  =    $get_profit['cash_hand'];
        $data['cash_bkash']  =    $get_profit['cash_bkash'];

        $data['cash_nagad']  =    $get_profit['cash_nagad'];
        $data['cash_bank']  =    $get_profit['cash_bank'];;
        $data['right_total']  =    $data['current_assets'] +  $get_profit['fixed_assets'];

        ///Net Profit
        $data['opp']  =  $get_profit['production_expense'] + $opening_inventory + $get_profit['product_purchase'];
        $data['pmo']  = $data['opp'] - $get_profit['purchase_return'];
        $data['dmo']  = $data['pmo'] - $get_profit['purchase_discount'];
        $data['cogs']  = $data['dmo'] - $closing_finished;
        $data['sme']  =    $data['product_sale'] -  $get_profit['sale_return'];
        $data['net_sales']  =   $data['sme']  -  $get_profit['sales_discount'];
        $data['total_sale']  = $data['net_sales']  + $get_profit['service_income'];
        $data['net_profit']  =    $data['total_sale'] - $data['cogs'];
        //End Net Profit
        $data['left_total']  =    $get_profit['capital'] +  $get_profit['current_liabilities'] + $get_profit['non_current_liabilities'] + $data['net_profit'];

        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;
        $data['outlet_text']    = $outlet_text;
        $data['today']    = $today;
        $data['pdf']    = 'assets/data/pdf/Statement of Comprehensive Income Till ' . $today . '.pdf';
        $data['title']  = 'Balance Sheet Report';

        //echo '<pre>';print_r( $data['emp_led_c']);
        //  echo '<pre>';print_r( $data);exit();
        //   echo '<pre>';print_r( $data);exit();

        $content = $this->parser->parse('newaccount/balance_sheet_new', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function profit_loss_report_search()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Rqsn');
        $CI->load->model('Warehouse');
        $outlet_text = (!empty($this->input->post('outlet_text', TRUE)) ? $this->input->post('outlet_text', TRUE) : 'Consolidated');
        $outlet_id = $this->input->post('outlet');
        $dtpFromDate = (!empty($this->input->post('dtpFromDate', TRUE)) ? $this->input->post('dtpFromDate', TRUE) : date('Y-m-d'));
        $dtpToDate = (!empty($this->input->post('dtpToDate', TRUE)) ? $this->input->post('dtpToDate', TRUE) : date('Y-m-d'));

        $today   = date('Y-m-d');

        $get_profit  = $this->accounts_model->profit_loss_serach($outlet_id, $dtpFromDate, $dtpToDate);

        $outlet_user        = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();

        if (!$outlet_id) {
            $outlet_id = $outlet_user[0]['outlet_id'];
        }
        // $postData = $this->input->post();
        if ($outlet_id) {
            $closing_inventory = $this->Rqsn->outlet_stock(null, null, null, $dtpFromDate, $dtpToDate)['closing_finished'];
        } else {
            $closing_inventory = $this->Reports->getCheckList(null, null, null, $dtpFromDate, $dtpToDate)['closing_finished'];
        }
        if ($outlet_id) {
            $opening_inventory = $this->Rqsn->outlet_stock(null, null, null, $dtpFromDate, $dtpToDate)['opening_finished'];
        } else {
            $opening_inventory = $this->Reports->getCheckList(null, null, null, $dtpFromDate, $dtpToDate)['opening_finished'];
        }

        //  echo '<pre>';print_r($get_profit['expense']);exit();


        $data['first_outlet'] = $outlet_user;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;
        $data['oResultAsset'] = $get_profit['oResultAsset'];
        $data['oResultLiability']  = $get_profit['oResultLiability'];
        $data['product_sale']  = $get_profit['product_sale'];
        $data['purchase_discount']  = $get_profit['purchase_discount'];
        $data['opening_inventory']  = $opening_inventory;
        $data['purchase_return']  = $get_profit['purchase_return'];
        $data['production_expense']  = $get_profit['production_expense'];
        $data['product_purchase']  = $get_profit['product_purchase'];
        $data['sales_discount']  = $get_profit['sales_discount'];
        $data['opp']  =  $get_profit['production_expense'] + $opening_inventory + $get_profit['product_purchase'];
        $data['pmo']  = $data['opp'] - $get_profit['purchase_return'];
        $data['dmo']  = $data['pmo'] - $get_profit['purchase_discount'];
        $data['cogs']  = $data['dmo'] - $closing_inventory;

        $data['abc']  = $get_profit['product_purchase'] + $data['opening_inventory'] + $get_profit['direct_expense'];
        $data['closing_inventory']  = $closing_inventory;
        $data['service_income']  = $get_profit['service_income'];
        $data['direct_expense']  = $get_profit['direct_expense'];
        $data['indirect_expense']  = $get_profit['indirect_expense'];
        $data['indirect_income']  = $get_profit['indirect_income'];
        $data['sale_return']  = $get_profit['sale_return'];
        $data['expense']  = $get_profit['expense'];
        $data['indirect_expense_c']  = $get_profit['indirect_expense_c'];
        $data['indirect_income_c']  = $get_profit['indirect_income_c'];
        $data['goods_sold']  = $data['opening_inventory'] + $get_profit['product_purchase'] + $closing_inventory;

        $data['sme']  =    $data['product_sale'] -  $get_profit['sale_return'];
        $data['net_sales']  =   $data['sme']  -  $get_profit['sales_discount'];
        $data['total_sale']  = $data['net_sales']  + $get_profit['service_income'];
        $data['gross_profit']  =    $data['total_sale'] -  $data['cogs'];

        $data['total_i']  = $data['cogs'] + $data['gross_profit'];

        //        echo '<pre>';print_r(    $data['total_i'] );exit();



        $data['net_profit']  =    $data['total_sale'] - $data['cogs'];
        $data['left_total']  =    $data['gross_profit'] +  $data['total_sale'];
        $data['right_total']  =    $data['net_profit'] +  $data['total_i'];
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;
        $data['outlet_text']    = $outlet_text;
        $data['today']    = $today;
        $data['pdf']    = 'assets/data/pdf/Statement of Comprehensive Income Till ' . $today . '.pdf';
        $data['title']  = display('profit_loss_report');


        //echo '<pre>';print_r( $data);exit();
        $content = $this->parser->parse('newaccount/profit_loss', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function balance_sheet_report_search()
    {



        $dtpFromDate = (!empty($this->input->post('dtpFromDate', TRUE)) ? $this->input->post('dtpFromDate', TRUE) : date('Y-m-d'));

        $dtpToDate = (!empty($this->input->post('dtpToDate', TRUE)) ? $this->input->post('dtpToDate', TRUE) : date('Y-m-d'));
        $get_profit  = $this->accounts_model->balance_sheet_search();
        $data['oResultAsset'] = $get_profit['oResultAsset'];
        $data['oResultLiability']  = $get_profit['oResultLiability'];
        $data['oResultIncome']  = $get_profit['oResultIncome'];
        $data['oResultExpence']  = $get_profit['oResultExpence'];
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;
        $data['pdf']    = 'assets/data/pdf/Statement of Comprehensive Income From ' . $dtpFromDate . ' To ' . $dtpToDate . '.pdf';
        $data['title']  = 'Balance Sheet Report';

        $content = $this->parser->parse('newaccount/balance_sheet_report_search', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function trial_balance_new()
    {
        $CI = &get_instance();

        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Rqsn');

        $outlet_id = $this->input->post('outlet', true);
        $outlet_user        = $CI->Warehouse->get_outlet_user();

        if (!$outlet_id) {
            if ($outlet_user) {
                $outlet_id = $outlet_user[0]['outlet_id'];
            } else {
                $outlet_id = 1;
            }
        }
        $outlet_text = (!empty($this->input->post('outlet_text', TRUE)) ? $this->input->post('outlet_text', TRUE) : 'Consolidated');
        $dtpFromDate = (!empty($this->input->post('dtpFromDate', TRUE)) ? $this->input->post('dtpFromDate', TRUE) : date('Y-m-d'));
        $dtpToDate = (!empty($this->input->post('dtpToDate', TRUE)) ? $this->input->post('dtpToDate', TRUE) : date('Y-m-d'));
        $today   = date('Y-m-d');
        $get_profit  = $this->accounts_model->balance_sheet_search($outlet_id);

        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();

        if ($outlet_id) {
            $opening = $CI->Rqsn->outlet_stock(null, null, null, $dtpFromDate, $dtpToDate);
            $opening_finished = $opening['opening_finished'];
            $opening_raw = $opening['opening_finished'];
            $opening_tools = $opening['opening_finished'];
        } else {
            $opening = $CI->Reports->getCheckList(null, null, null, $dtpFromDate, $dtpToDate);
            $opening_finished = $opening['opening_finished'];
            $opening_raw = $opening['opening_finished'];
            $opening_tools = $opening['opening_finished'];
        }

        //   echo '<pre>';print_r($CI->Reports->getCheckList(null, null, null,$dtpFromDate,$dtpToDate));exit();
        $data['opening_finished'] =  $opening_finished;
        $data['opening_raw'] =  $opening_raw;
        $data['opening_tools'] =  $opening_tools;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;
        $data['id_out'] = $outlet_id;
        $data['oResultAsset'] = $get_profit['oResultAsset'];
        $data['oResultLiability']  = $get_profit['oResultLiability'];
        $data['oResultIncome']  = $get_profit['oResultIncome'];
        $data['oResultExpence']  = $get_profit['oResultExpence'];
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;
        $data['outlet_text']    = $outlet_text;
        $data['total']    = $get_profit['total'];
        $data['today']    = $today;
        $data['pdf']    = 'assets/data/pdf/Statement of Comprehensive Income till ' . $today . 'pdf';
        $data['title']  = 'Trial Balance Report';
        //    echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('newaccount/trial_new', $data, true);

        $this->template->full_admin_html_view($content);
    }
    //Cash flow page
    public function cash_flow_report()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $this->input->post('outlet');
        $outlet_user        = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->central_warehouse();
        $outlet_list = $CI->Warehouse->branch_list_product();

        $data['first_outlet'] = $outlet_user;
        $data['cw'] = $cw;
        $data['outlet_list'] = $outlet_list;
        $data['title']  = display('cash_flow_report');
        $content = $this->parser->parse('newaccount/cash_flow_report', $data, true);
        $this->template->full_admin_html_view($content);
    }
    //Cash flow report search
    public function cash_flow_report_search()
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['software_info'] = $CI->Accounts_model->software_setting_info();
        $dtpFromDate          = $this->input->post('dtpFromDate', TRUE);
        $dtpToDate            = $this->input->post('dtpToDate', TRUE);
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;

        // PDF Generator
        $this->load->library('pdfgenerator');
        $dompdf = new DOMPDF();
        $page = $this->load->view('newaccount/cash_flow_report_search_pdf', $data, true);
        $dompdf->load_html($page);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/Cash Flow Statement ' . $dtpFromDate . ' To ' . $dtpToDate . '.pdf', $output);

        $data['pdf']    = 'assets/data/pdf/Cash Flow Statement ' . $dtpFromDate . ' To ' . $dtpToDate . '.pdf';
        $data['title']  = display('cash_flow_report');
        $content = $this->parser->parse('newaccount/cash_flow_report_search', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Supplier payment information
    public function supplier_payment()
    {
        $get_supplier = $this->accounts_model->get_supplier();
        $bank_list   = $this->Web_settings->bank_list();
        $bkash_list        = $this->Web_settings->bkash_list();
        $nagad_list        = $this->Web_settings->nagad_list();

        $data = array(
            'supplier_list' => $get_supplier,
            'bank_list'     => $bank_list,
            'bkash_list'    => $bkash_list,
            'nagad_list'    => $nagad_list

        );
        $data['voucher_no'] = $this->accounts_model->Spayment();
        $data['title']  = display('supplier_payment_form');
        $content = $this->parser->parse('newaccount/supplier_payment_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //supplier payment submit
    public function create_supplier_payment()
    {
        $this->form_validation->set_rules('txtCode', display('txtCode'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->supplier_payment_insert()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect('accounts/supplier_payment/');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/supplier_payment");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/supplier_payment");
        }
    }
    public function supplier_paymentreceipt($supplier_id, $voucher_no, $coaid)
    {
        $this->load->model('Purchases');
        $this->load->model('Web_settings');
        $data['supplier_info'] = $this->accounts_model->supplierinfo($supplier_id);
        $data['payment_info']  = $this->accounts_model->supplierpaymentinfo($voucher_no, $coaid);
        $currency_details      = $this->Web_settings->retrieve_setting_editdata();
        $company_info          = $this->Purchases->retrieve_company();
        $data['company_info']  = $company_info;
        $data['currency']      = $currency_details[0]['currency'];
        $data['position']      = $currency_details[0]['currency_position'];
        $data['title']         = display('supplier_payment_form');
        $content = $this->parser->parse('newaccount/supplier_payment_receipt', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Customer Receive
    public function customer_receive()
    {
        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $get_customer = $this->accounts_model->get_customer();
        $bank_list        = $this->Web_settings->bank_list();
        $card_list = $CI->Settings->get_real_card_data();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $data = array(
            'customer_list' => $get_customer,
            'bank_list'     => $bank_list,
            'card_list'     => $card_list,
            'bkash_list'    => $bkash_list,
            'nagad_list'    => $nagad_list
        );
        $data['voucher_no'] = $this->accounts_model->Creceive();
        $data['title']      = display('customer_receive_form');
        $content = $this->parser->parse('newaccount/customer_receive_form', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function customer_headcode($id)
    {
        $customer_info = $this->db->select('customer_name')->from('customer_information')->where('customer_id', $id)->get()->row();
        $head_name = $id . '-' . $customer_info->customer_name;
        $customerhcode = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadName', $head_name)
            ->get()
            ->row();
        $code = $customerhcode->HeadCode;
        echo json_encode($code);
    }


    public function create_customer_receive()
    {
        $this->form_validation->set_rules('txtCode', display('txtCode'), 'max_length[100]');
        if ($this->form_validation->run()) {
            if ($this->accounts_model->customer_receive_insert()) {
                $this->session->set_flashdata('message', display('save_successfully'));
                redirect('accounts/customer_receive/');
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
            redirect("accounts/customer_receive");
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
            redirect("accounts/customer_receive");
        }
    }


    public function customer_receipt($customer_id, $voucher_no, $coaid)
    {
        $this->load->model('Purchases');
        $this->load->model('Web_settings');
        $data['customer_info'] = $this->accounts_model->custoinfo($customer_id);
        $data['payment_info']  = $this->accounts_model->customerreceiptinfo($voucher_no, $coaid);
        $currency_details      = $this->Web_settings->retrieve_setting_editdata();
        $company_info          = $this->Purchases->retrieve_company();
        $data['company_info']  = $company_info;
        $data['currency']      = $currency_details[0]['currency'];
        $data['position']      = $currency_details[0]['currency_position'];
        $data['title']         = display('supplier_payment_form');
        $content = $this->parser->parse('newaccount/customer_payment_receipt', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function opening_inventory()
    {
        $query = $this->db->select('*, b.supplier_price')
            ->from('product_information a')
            ->join('supplier_product b', 'b.product_id = a.product_id')
            ->join('product_category x', 'x.category_id = a.category_id', 'left')
            ->join('product_type d', 'd.ptype_id = a.ptype_id', 'left')
            ->join('color_list f', 'f.color_id = a.color', 'left')
            ->join('size_list s', 's.size_id = a.size', 'left')
            ->order_by('a.id')
            ->get();

        $res = $query->result_array();

        $sl = 1;
        foreach ($res as $k => $v) {
            $res[$k]['sl']  = $sl;
            $sl++;
        }

        $acc = $this->accounts_model->Transacc();

        $data = array(
            'title'     => 'Opening Inventory Entry',
            'product_list'  => $res,
            'acc'       => $acc
        );

        // print_r($data);
        // exit();

        $view = $this->parser->parse('accounts/opening_inventory_form', $data, true);
        $this->template->full_admin_html_view($view);
    }

    public function save_opening_inventory()
    {



        $all_qty = $this->input->post('qty', TRUE);
        $all_pr = $this->input->post('product_id', TRUE);


        for ($i = 0; $i < count($all_pr); $i++) {

            $db_products = $this->db->select('*')->from('opening_inventory')->where('product_id', $all_pr[$i])->get();
            if ($db_products->num_rows() > 0) {
                $res = $db_products->result_array();
                $data = array(
                    'stock_qty'   => (int)$all_qty[$i] + (int)$res[0]['stock_qty']
                );

                $this->db->where('product_id', $all_pr[$i]);
                $this->db->update('opening_inventory', $data);
            } else {
                $data = array(
                    'product_id' => $all_pr[$i],
                    'stock_qty'   => $all_qty[$i]
                );

                $this->db->insert('opening_inventory', $data);
            }
        }

        $amount = $this->input->post('grand_total', TRUE);
        $createdate = date('Y-m-d H:i:s');
        $opendr = array(
            'VNo'            =>  '',
            'Vtype'          =>  '',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  10205,
            'Narration'      =>  'Opening Inventory Debit',
            'Debit'          =>  $amount,
            'Credit'         =>  0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => '',
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $opendr);

        $capcr = array(
            'VNo'            =>  '',
            'Vtype'          =>  '',
            'VDate'          =>  $createdate,
            'COAID'          =>  201,
            'Narration'      =>  'Capital Credit for opening inventory',
            'Debit'          =>  0,
            'Credit'         =>  $amount, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => '',
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $capcr);

        redirect(base_url('Creport'));
    }

    public function fund_transfer()
    {
        $CI = &get_instance();

        $CI->load->model('warehouse');
        $CI->load->model('accounts_model');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');


        $bank_list        = $this->Web_settings->bank_list();
        $card_list = $CI->Settings->get_real_card_data();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $rocket_list        = $CI->Web_settings->rocket_list();
        $is_outlet = $CI->warehouse->get_outlet_user();
        $outlet_list = $CI->warehouse->get_all_outlet();
        $cw = $CI->warehouse->central_warehouse();



        $data = array(
            'title'         => 'Fund Transfer',
            'is_outlet'     => $is_outlet,
            'cw'            => $cw,
            'outlet_list'   => $outlet_list,
            'bank_list'     => $bank_list,
            'card_list'     => $card_list,
            'bkash_list'    => $bkash_list,
            'nagad_list'    => $nagad_list,
            'rocket_list'    => $rocket_list
        );
        // echo "<pre>";
        // print_r($data);
        // exit();
        $content = $this->parser->parse('newaccount/fund_transfer_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function outlet_payments()
    {
        $CI = &get_instance();
        $outlet_id = $this->input->post('outlet_id', TRUE);

        $CI->load->model('Web_settings');
        $CI->load->model('Settings');

        $bank_list        = $CI->Web_settings->outletwise_bank_list($outlet_id);
        $bkash_list        = $CI->Web_settings->outletwise_bkash_list($outlet_id);
        $nagad_list        = $CI->Web_settings->outletwise_nagad_list($outlet_id);
        $rocket_list        = $CI->Web_settings->outletwise_rocket_list($outlet_id);
        $card_list = $CI->Settings->get_real_card_data();


        $html = '';

        $html .= '                        <div class="form-group row">
        <label for="to_acc" class="col-sm-2 col-form-label">To (Ac.)</label>
        <div class="col-sm-4">
            <select name="to_acc" id="to_acc" class="form-control" onchange="bank_paymet_to(this.value, 1)" required>
                <option value="1">Cash</option>
                <option value="4">Bank</option>
                <option value="3">Bkash</option>
                <option value="5">Nagad</option>
                <option value="7">Rocket</option>
            </select>
        </div>
    </div>

    <div class="col-sm-4" id="bank_div_1_to" style="display:none;">
        <div class="form-group row">
            <label for="bank" class="col-sm-3 col-form-label">' .
            display('bank')
            . '<i class="text-danger">*</i></label>
            <div class="col-sm-7">

                <input type="text" name="bank_id_to" class="form-control" id="bank_id_1_to" placeholder="Bank">

            </div>

            <div class="col-sm-1">
                <a href="#" class="client-add-btn btn btn-sm btn-info" aria-hidden="true" data-toggle="modal" data-target="#cheque_info"><i class="fa fa-file m-r-2"></i></a>
            </div>
        </div>

    </div>

    <div class="" id="bank_div_m_1_to" style="display:none;">
        <div class="form-group row">
            <label for="bank" class="col-sm-2 col-form-label">' . display('bank') . ' <i class="text-danger">*</i></label>
            <div class="col-sm-4">
                <select name="bank_id_m_to" class="form-control bankpayment" id="bank_id_m_1_to">
                    <option value="">Select One</option>';
        foreach ($bank_list as $bank) {
            $html .= '<option value="' . html_escape($bank['bank_id']) . '">' . html_escape($bank['bank_name']) . '(' . html_escape($bank['ac_number']) . ')' . '</option>';
        }
        $html .= '</select>


            </div>


        </div>
    </div>



    <div class="" style="display: none" id="bkash_div_1_to">

        <div class="form-group row">
            <label for="bkash" class="col-sm-2 col-form-label">Bkash Number <i class="text-danger">*</i></label>
            <div class="col-sm-4">
                <select name="bkash_id_to" class="form-control bankpayment" id="bkash_id_1_to">
                    <option value="">Select One</option>';
        foreach ($bkash_list as $bkash) {
            $html .= '<option value="' . html_escape($bkash['bkash_id']) . '">' . html_escape($bkash['bkash_no']) . ' (' . html_escape($bkash['ac_name']) . ')</option>';
        }
        $html .= '</select>
            </div>

        </div>
    </div>

    <div class="" style="display: none" id="nagad_div_1_to">
        <div class="form-group row">
            <label for="nagad" class="col-sm-2 col-form-label">Nagad Number <i class="text-danger">*</i></label>
            <div class="col-sm-4">
                <select name="nagad_id_to" class="form-control bankpayment" id="nagad_id_1_to">
                    <option value="">Select One</option>';
        if ($nagad_list) {
            foreach ($nagad_list as $nagad) {
                $html .= '<option value="' . html_escape($nagad['nagad_id']) . '">' . html_escape($nagad['nagad_no']) . ' (' . html_escape($nagad['ac_name']) . ')</option>';
            }
        }
        $html .= '</select>

            </div>


        </div>
    </div>
    <div class="" style="display: none" id="rocket_div_1_to">
        <div class="form-group row">
            <label for="rocket" class="col-sm-2 col-form-label">Rocket Number <i class="text-danger">*</i></label>
            <div class="col-sm-4">
                <select name="rocket_id_to" class="form-control bankpayment" id="rocket_id_1_to">
                    <option value="">Select One</option>';
        if ($rocket_list) {
            foreach ($rocket_list as $rocket) {
                $html .= '<option value="' . html_escape($rocket['rocket_id']) . '">' . html_escape($rocket['rocket_no']) . ' (' . html_escape($rocket['ac_name']) . ')</option>';
            }
        }
        $html .= '</select>

            </div>


        </div>
    </div>

    <div class="" style="display: none" id="card_div_1">
        <div class="form-group row">
            <label for="card" class="col-sm-5 col-form-label">Card Type <i class="text-danger">*</i></label>
            <div class="col-sm-7">
                <select name="card_id" class="form-control bankpayment" id="card_id_1_to" onchange="card_charge()">
                    <option value="">Select One</option>';
        foreach ($card_list as $card) {
            $html .= '<option value="' . html_escape($card['card_no_id']) . '">' . $card['card_no'] . ' (' . $card['card_name'] . ')</option>';
        }
        $html .= '</select>


            </div>


        </div>
    </div>';

        echo $html;
    }

    public function submit_fund_transfer()
    {
        // echo "<pre>";
        // print_r($_POST);
        // exit();
        $CI = &get_instance();

        $CI->load->model('warehouse');

        $date = $this->input->post('date', TRUE);
        $voucher_no       = mt_rand();
        $createdate      = date('Y-m-d H:i:s');
        $CreateBy        = $this->session->userdata('user_id');

        $from_pay_type = $this->input->post('from_acc', TRUE);
        $to_pay_type = $this->input->post('to_acc', TRUE);

        $to_outlet_id = $this->input->post('transfer_to', TRUE);
        $amount = $this->input->post('amount', TRUE);

        $logged_in_outlet = $CI->warehouse->outlet_or_cw_logged_in();
        $transfer_outlet = $CI->warehouse->get_outlet_or_cw_info($to_outlet_id);

        $to_outlet_user = '';

        if ($to_outlet_id == "HK7TGDT69VFMXB7") {
            $to_outlet_user = "HLJq42qHAlAHg4T";
        } else {
            $q = $this->db->select('user_id')->from('outlet_warehouse')
                ->where('outlet_id', $to_outlet_id)
                ->get()->result_array();

            $to_outlet_user = $q[0]['user_id'];
        }

        $Vtype = "Fund Transfer";

        $bkash_id = $this->input->post('bkash_id', TRUE);

        $nagad_id = $this->input->post('nagad_id', TRUE);

        $rocket_id = $this->input->post('rocket_id', TRUE);

        $bank_id = $this->input->post('bank_id_m', TRUE);
        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }

        $fromtransferdr = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  1020106,
            'Narration'      =>  'Fund Transfer From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  $amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  1020101,
            'Narration'      =>  'Fund Transfer in Cash From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );
        $bankc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Fund Transfer in Bank From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
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
            'VDate'          =>  $date,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  'Fund Transfer in Bkash From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,

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
            'VDate'          =>  $date,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  'Fund Transfer in Nagad From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );

        //Rocket Added
        if (!empty($rocket_id)) {
            $rocketname = $this->db->select('rocket_no')->from('rocket_add')->where('rocket_id', $rocket_id)->get()->row()->rocket_no;

            $rocketcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $rocketname)->get()->row()->HeadCode;
        } else {
            $rocketcoaid = '';
        }

        $rocketc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  $rocketcoaid,
            'Narration'      =>  'Fund Transfer in Rocket From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );

        $this->db->insert('acc_transaction', $fromtransferdr);
        if ($from_pay_type == 4) {
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($from_pay_type == 1) {
            $this->db->insert('acc_transaction', $cc);
        }
        if ($from_pay_type == 3) {
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($from_pay_type == 5) {
            $this->db->insert('acc_transaction', $nagadc);
        }
        if ($from_pay_type == 7) {
            $this->db->insert('acc_transaction', $rocketc);
        }

        // transfer acc
        $bkash_id = $this->input->post('bkash_id_to', TRUE);
        $nagad_id = $this->input->post('nagad_id_to', TRUE);
        $rocket_id = $this->input->post('rocket_id_to', TRUE);

        $bank_id = $this->input->post('bank_id_m_to', TRUE);
        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }

        $toTransferCr = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  1020106,
            'Narration'      =>  'Fund Transfer From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $to_outlet_user,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        $cc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  1020101,
            'Narration'      =>  'Fund Transfer in Cash From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  $amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $to_outlet_user,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );
        $bankc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  $bankcoaid,
            'Narration'      =>  'Fund Transfer in Bank From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  $amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $to_outlet_user,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
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
            'VDate'          =>  $date,
            'COAID'          =>  $bkashcoaid,
            'Narration'      =>  'Fund Transfer in Bkash From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  $amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $to_outlet_user,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,

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
            'VDate'          =>  $date,
            'COAID'          =>  $nagadcoaid,
            'Narration'      =>  'Fund Transfer in Nagad From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  $amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $to_outlet_user,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );

        //Rocket Added
        if (!empty($rocket_id)) {
            $rocketname = $this->db->select('rocket_no')->from('rocket_add')->where('rocket_id', $rocket_id)->get()->row()->rocket_no;

            $rocketcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $rocketname)->get()->row()->HeadCode;
        } else {
            $rocketcoaid = '';
        }

        $rocketc = array(
            'VNo'            =>  $voucher_no,
            'Vtype'          =>  $Vtype,
            'VDate'          =>  $date,
            'COAID'          =>  $rocketcoaid,
            'Narration'      =>  'Fund Transfer in Rocket From  ' . $logged_in_outlet[0]['outlet_name'] . ' to ' . $transfer_outlet[0]['outlet_name'],
            'Debit'          =>  0,
            'Credit'         =>  $amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $CreateBy,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1,
        );

        $this->db->insert('acc_transaction', $toTransferCr);
        if ($to_pay_type == 4) {
            $this->db->insert('acc_transaction', $bankc);
        }
        if ($to_pay_type == 1) {
            $this->db->insert('acc_transaction', $cc);
        }
        if ($to_pay_type == 3) {
            $this->db->insert('acc_transaction', $bkashc);
        }
        if ($to_pay_type == 5) {
            $this->db->insert('acc_transaction', $nagadc);
        }
        if ($from_pay_type == 7) {
            $this->db->insert('acc_transaction', $rocketc);
        }

        $this->session->set_flashdata('message', display('save_successfully'));
        redirect('accounts/fund_transfer/');
    }


    public function expense_report()
    {
        $this->load->model('Warehouse');
        $this->load->model('Reports');
        $this->load->model('Web_settings');

        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $company_info = $this->Reports->retrieve_company();

        $outlet_list = $this->Warehouse->get_outlet_user();
        $cw = $this->Warehouse->cw_and_outlet_merged();

        $this->load->model('Accounts_model');
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);

        $outlet_id = $this->input->post('outlet_id', TRUE);
        // echo '<pre>';
        // print_r($from_date);
        // print_r($to_date);
        // print_r($outlet_id);

        if (!$outlet_id) {
            $outlet_id = ($outlet_list ? $outlet_list[0]['outlet_id'] : null);
        }

        $exp_details = $this->Accounts_model->get_all_expense($from_date, $to_date, $outlet_id);
        $total_dr = 0;

        if ($exp_details) {
            $sl = 0;
            foreach ($exp_details as $k => $v) {
                $sl++;
                $exp_details[$k]['sl'] = $sl;
                $total_dr += $exp_details[$k]['tot_dr'];
            }
        }

        $data = array(
            'title'     => "Expense Report",
            'exp_details'   => $exp_details,
            'outlet_list' => $outlet_list,
            'total_dr'      => $total_dr,
            'cw' => $cw,
            'outlet_id'     => $outlet_id,
            'company_info' => $company_info,
            'software_info' => $currency_details,
            'company' => $company_info,
            'from_date' => isset($from_date) && $from_date != '' ? $from_date : date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month")),
            'to_date'   => isset($to_date) && $to_date != '' ? $to_date : date("Y-m-d"),
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $reportList = $this->parser->parse('report/expense_report', $data, true);

        $this->template->full_admin_html_view($reportList);
    }

    public function filter_head_to_gl($outlet_id, $HeadCode)
    {
        $CI = &get_instance();
        $CI->load->model('Accounts_model');

        $isGL = $CI->Accounts_model->checkIsGL($HeadCode);
        $today = date("Y-m-d");

        if ($isGL) {
            $cmbGLCode = $HeadCode;
            $cmbCode = "Transaction Head";
        } else {
            $cmbGLCode = $CI->Accounts_model->getHeadCode($HeadCode);
            $cmbCode = $HeadCode;
        }

        $data = array(
            'cmbGLCode' => $cmbGLCode,
            'cmbCode'   => $cmbCode,
            'dtpToDate' => $today,
            'outlet_id' => $outlet_id,
        );

        $content = $this->parser->parse('newaccount/trial_to_gl_redirect_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function cost_sheet()
    {
        $this->load->model('Accounts_model');
        $cost_of_good_manufactured = $this->Accounts_model->cost_of_good_manufactured();


        $data = array(
            'title'     => "Cost Sheet",
            'raw_mat_purchase'  => $cost_of_good_manufactured['raw_mat_purchase'],
            'tools_purchase'  => $cost_of_good_manufactured['tools_purchase'],
            'raw_opening_inventory' => $cost_of_good_manufactured['raw_opening_inventory'],
            'tool_opening_inventory' => $cost_of_good_manufactured['tool_opening_inventory'],
            'raw_closing_stock'     => $cost_of_good_manufactured['raw_closing_stock'],
            'tools_closing_stock'     => $cost_of_good_manufactured['tools_closing_stock'],
            'total_raw_in'         => $cost_of_good_manufactured['total_raw_in'],
            'total_tools_in'         => $cost_of_good_manufactured['total_tools_in'],
            'total_raw_consumed'  => $cost_of_good_manufactured['total_raw_consumed'],
            'total_tools_consumed'  => $cost_of_good_manufactured['total_tools_consumed'],
            'production_exp'        => $cost_of_good_manufactured['production_exp'],
            'total_production_exp'  => $cost_of_good_manufactured['total_production_exp'],
            'prime_cost'            => $cost_of_good_manufactured['prime_cost'],
            'factory_exp'           => $cost_of_good_manufactured['factory_exp'],
            'total_factory_op_exp'  => $cost_of_good_manufactured['total_factory_op_exp'],
            'cost_of_goods_mfd'     => $cost_of_good_manufactured['cost_of_goods_mfd'],
        );

        $data['company'] = $this->Invoices->retrieve_company();
        $data['software_info'] = $this->Accounts_model->software_setting_info();


        // echo '<pre>';
        // print_r($this);
        // exit();

        $content = $this->parser->parse('newaccount/cost_sheet_report', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function profit_and_loss()
    {
        $this->load->model('accounts_model');
        $this->load->model('invoices');
        $this->load->model('purchases');
        $this->load->model('reports');
        $this->load->model('service');

        $data = array();

        $content = $this->parser->parse('newaccount/profit_and_loss_report', $data, true);
        $this->template->full_admin_html_view($content);
    }
}
