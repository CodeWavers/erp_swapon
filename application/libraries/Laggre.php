<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laggre {

    //Retrieve  aggre List	
    public function aggre_list() {
        $CI = & get_instance();
        $CI->load->model('Aggre');
        $aggre_list = $CI->Aggre->aggre_list();  //It will get only Credit aggres
        $i = 0;
        $total = 0;
        if (!empty($aggre_list)) {
            foreach ($aggre_list as $k => $v) {
                $i++;
                $aggre_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => "Manage Aggre",
            'aggre_list' => $aggre_list,
        );
        $aggreList = $CI->parser->parse('Aggre/Aggre', $data, true);
        return $aggreList;
    }

    //Sub aggre Add
    public function aggre_add_form() {
        $CI = & get_instance();
        $CI->load->model('Aggre');
         $aggre_list = $CI->Aggre->aggre_list();  //It will get only Credit aggres
        $i = 0;
        $total = 0;
        if (!empty($aggre_list)) {
            foreach ($aggre_list as $k => $v) {
                $i++;
                $aggre_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Aggre',
            'aggre_list' => $aggre_list,
        );
        $aggreForm = $CI->parser->parse('Aggre/add_aggre', $data, true);
        return $aggreForm;
    }

    //aggre Edit Data
    public function aggre_edit_data($Aggre_id) {
        $CI = & get_instance();
        $CI->load->model('Aggre');
        $aggre_detail = $CI->Aggre->retrieve_aggre_editdata($Aggre_id);

        $data = array(
            'title'         => "Aggre Edit",
            'aggre_id'   => $aggre_detail[0]['aggre_id'],
            'aggre_name' => $aggre_detail[0]['aggre_name'],
            'status'        => $aggre_detail[0]['status']
        );
        $chapterList = $CI->parser->parse('Aggre/edit_aggre_form', $data, true);
        return $chapterList;
    }

    public function aggre_ledger_report($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Customers');
        $CI->load->model('Aggre');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $aggre = $CI->Aggre->aggre_list_ledger();
        $ledger   = $CI->Aggre->aggre_buy($per_page, $page);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(
            'title'          => 'Aggregators Ledger',
            'ledgers'        => $ledger,
            'customer_name'  => '',
            'address'        => '',
            'customer'       => $aggre,
            'customer_id'    => '',
            'start'          => '',
            'end'            => '',
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'links'          => $links,
        );

        $singlecustomerdetails = $CI->parser->parse('aggre/aggre_ledger_report', $data, true);
        return $singlecustomerdetails;
    }

}

?>