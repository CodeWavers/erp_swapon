<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laccounts extends CI_Model
{

    //Retrieve  daily closing List
    public function daily_closing_list($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Accounts');
        $CI->load->model('Web_settings');
        $CI->load->model('Reports');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $real_cw = $CI->Warehouse->central_warehouse();
        $outlet_id = $this->input->get('outlet_id');

        if (!isset($outlet_id)) {
            $outlet_id = $outlet_list[0]['outlet_id'];
        }

        $daily_closing_data = $CI->Accounts->get_closing_report($per_page, $page, $outlet_id);

        $i = 0;
        if (!empty($daily_closing_data)) {
            foreach ($daily_closing_data as $k => $v) {
                $daily_closing_data[$k]['final_date'] = $CI->occational->dateConvert($daily_closing_data[$k]['date']);
            }
            foreach ($daily_closing_data as $k => $v) {
                $i++;
                $daily_closing_data[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'              => display('closing_report'),
            'daily_closing_data' => $daily_closing_data,
            'currency'           => $currency_details[0]['currency'],
            'position'           => $currency_details[0]['currency_position'],
            'outlet_list'        => $outlet_list,
            'cw'                 => $cw,
            'real_cw'            => $real_cw,
            'company_info'       => $company_info,
            'links'              => $links,
            'software_info'      => $currency_details,
            'company'            => $company_info,
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $reportList = $CI->parser->parse('accounts/closing_report', $data, true);
        return $reportList;
    }

    //Retrieve  Customer List
    public function get_date_wise_closing_reports($links = null, $per_page = null, $page = null, $from_date, $to_date, $outlet_id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Accounts');
        $CI->load->model('Reports');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $real_cw = $CI->Warehouse->central_warehouse();

        $daily_closing_data = $CI->Accounts->get_date_wise_closing_report($per_page, $page, $from_date, $to_date, $outlet_id);

        $i = 0;
        if (!empty($daily_closing_data)) {
            foreach ($daily_closing_data as $k => $v) {
                $daily_closing_data[$k]['final_date'] = $CI->occational->dateConvert($daily_closing_data[$k]['date']);
            }

            foreach ($daily_closing_data as $k => $v) {
                $i++;
                $daily_closing_data[$k]['sl'] = $i;
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'              => display('closing_report'),
            'company_info'       => $company_info,
            'daily_closing_data' => $daily_closing_data,
            'from_date'          => $from_date,
            'to_date'            => $to_date,
            'outlet_list'        => $outlet_list,
            'cw'                 => $cw,
            'real_cw'            => $real_cw,
            'currency'           => $currency_details[0]['currency'],
            'position'           => $currency_details[0]['currency_position'],
            'links'              => $links,
            'software_info'      => $currency_details,
            'company'            => $company_info,
        );
        $reportList = $CI->parser->parse('accounts/closing_report', $data, true);
        return $reportList;
    }


    public function money_receipt_html_data($coaid, $id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Accounts_model');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $this->load->library('session');

        $user_id = $this->session->userdata('user_id');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();


        $mr_detail = $CI->Accounts_model->retrieve_mr_html_data($coaid, $id, $user_id);


        $cod = $mr_detail['data'][0]['Credit'];

        $credit_inword = $CI->numbertowords->convert_number($cod);

        // $sumDebit=$this->db->select('SUM(Debit)')->from('acc_transaction')->where('COAID',102030000001)->get()->result_array();

        $company_info = $CI->Invoices->retrieve_company();

        $data = array(

            'company_info' => $company_info,
            'mr_detail' => $mr_detail,
            'credit_inword' => $credit_inword,
            'currency'         => $currency_details[0]['currency'],
            'cheque_no' => $mr_detail['data'][0]['cheque_no'],
            'bkash_no' => $mr_detail['data'][0]['bkash_id'],
            'nagad_no' => $mr_detail['data'][0]['nagad_id'],
            'pay_type' => $mr_detail['data'][0]['pay_type'],
            //'user'=>$user
            //  'cod'=>$sumDebit
        );



        //echo '<pre>';print_r($data);exit();
        $chapterList = $CI->parser->parse('newaccount/mr_html', $data, true);
        return $chapterList;
    }
}
