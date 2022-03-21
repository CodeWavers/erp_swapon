<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lrqsn
{



    public function stock_report_outlet_item()
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
        $CI->load->model('Reports');
        $CI->load->model('categories');
        $CI->load->model('Warehouse');

        $cat_list = $CI->categories->category_list(1);
        $outlet_list    = $CI->Warehouse->get_outlet_user();
        $cw_list    = $CI->Rqsn->cw_list();

        $cw = $CI->Warehouse->branch_list_product();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Outlet Stock",
            'outlet_list' => $outlet_list,
            'cw'    => $cw,
            'cat_list'  => $cat_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'currency' => $currency_details[0]['currency'],
            'totalnumber' => $CI->Reports->totalnumberof_product(),
            'taxes'         => $taxfield,
        );


        //        echo print_r($data);
        //        die();
        $invoiceForm = $CI->parser->parse('rqsn/outlet_stock', $data, true);
        return $invoiceForm;
    }

    public function rqsn_add_form()
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
        $outlet_list    = $CI->Rqsn->outlet_list();
        $outlet_list_to    = $CI->Rqsn->outlet_list_to();
        $cw_list    = $CI->Rqsn->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Requisition",
            'outlet_list' => $outlet_list,
            'outlet_list_to' => $outlet_list_to,
            'cw_list' => $cw_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('rqsn/rqsn_form', $data, true);
        return $invoiceForm;
    }
    public function pr_rqsn_add_form()
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
//        $outlet_list    = $CI->Rqsn->outlet_list();
//        $outlet_list_to    = $CI->Rqsn->outlet_list_to();
//        $cw_list    = $CI->Rqsn->cw_list();
        $role_list    = $CI->Rqsn->role_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Production Requisition",
//            'outlet_list' => $outlet_list,
//            'outlet_list_to' => $outlet_list_to,
//            'cw_list' => $cw_list,
            'role_list' => $role_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('rqsn/pr_rqsn_form', $data, true);
        return $invoiceForm;
    }
    public function transfer_add_form()
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
        $outlet_list    = $CI->Rqsn->outlet_list();
        $outlet_list_to    = $CI->Rqsn->outlet_list_to();
        $cw_list    = $CI->Rqsn->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Transfer Form",
            'outlet_list' => $outlet_list,
            'outlet_list_to' => $outlet_list_to,
            'cw_list' => $cw_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('rqsn/transfer_form', $data, true);
        return $invoiceForm;
    }

    public function purchase_rqsn_form()
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
        $CI->load->model('Purchases');
        $outlet_list    = $CI->Rqsn->outlet_list();
        $cw_list    = $CI->Rqsn->cw_list();
        $po_no = $CI->Purchases->number_generator();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Central Warehouse Requisition",
            'outlet_list' => $outlet_list,
            'cw_list' => $cw_list,
            'po_no'    => $po_no,
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('rqsn/cw_purchase', $data, true);
        return $invoiceForm;
    }

    // public function purchase_rqsn_form_reserved()
    // {
    //     $CI = &get_instance();
    //     $CI->load->model('Purchases');
    //     $CI->load->model('Web_settings');
    //     $CI->load->model('Warehouse');
    //     $CI->load->model('Settings');
    //     $CI->load->model('Courier');

    //     $cw_list    = $CI->Rqsn->cw_list();
    //     $all_supplier = $CI->Purchases->select_all_supplier();
    //     $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    //     $bank_list        = $CI->Web_settings->bank_list();
    //     $outlet_list = $CI->Warehouse->branch_list_product();
    //     $po_no = $CI->Purchases->number_generator();

    //     $card_list = $CI->Settings->read_all_card();
    //     $bank_list          = $CI->Web_settings->bank_list();
    //     $bkash_list        = $CI->Web_settings->bkash_list();
    //     $nagad_list        = $CI->Web_settings->nagad_list();
    //     $branch_list        = $CI->Courier->get_branch_list();
    //     $data = array(
    //         'title'         => 'Add requisition',
    //         'all_supplier'  => $all_supplier,
    //         'cw'            => $cw_list[0],
    //         'invoice_no'    => $CI->auth->generator(10),
    //         'discount_type' => $currency_details[0]['discount_type'],
    //         'po_no'         => $po_no,
    //         'bank_list'     => $bank_list,
    //         'outlet_list'   => $outlet_list,
    //         'card_list'     => $card_list,
    //         'bank_list'     => $bank_list,
    //         'bkash_list'     => $bkash_list,
    //         'nagad_list'     => $nagad_list,
    //         'branch_list'     => $branch_list,
    //     );

    //     // echo '<pre'; print_r($cw_list);exit();
    //     //    die();
    //     $invoiceForm = $CI->parser->parse('rqsn/cw_purchase', $data, true);
    //     return $invoiceForm;
    // }

    public function rqsn_report_form()
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Warehouse');
        $rqsn_list = $CI->Rqsn->get_purhcase_rqsn();
        $new_rq = [];
        $sl = 1;
        foreach ($rqsn_list as $rq) {
            // echo '<pre>';
            // $rq['haha'] = 'aaha';
            // print_r($rq);
            $rq['sl'] = $sl;
            $rq['from'] = $rq['central_warehouse'];
            $rq['to']   = 'Purchase';

            switch ($rq['st']) {
                case '1':
                    $rq['st'] = 'Pending for approval';
                    break;
                case '4':
                    $rq['st'] = 'Approved for purchase';
                    break;
                case '5':
                    $rq['st'] = 'Purchased';
                    break;
            }

            $new_rq[] = $rq;
            $sl++;
        }

        $data = array(
            'title'     => 'Requsition Report',
            'rqsn_list' => $new_rq
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $view = $CI->parser->parse('rqsn/rqsn_report_form', $data, true);
        return $view;
    }

    public function view_purchase_rqsn_form($rqsn_id)
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');

        $rqsn_details = $CI->Rqsn->get_rqsn_details($rqsn_id);

        $sl = 1;
        foreach ($rqsn_details as $k => $v) {
            $rqsn_details[$k]['sl'] = $sl;
            $sl++;
        }

        $data = array(
            'title'     => 'Purchase Requsition Details',
            'rqsn_details' => $rqsn_details,
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $view = $CI->parser->parse('rqsn/view_purchase_rqsn_form', $data, true);
        return $view;
    }

    public function outlet_rqsn_report_form()
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Warehouse');
        $rqsn_list = $CI->Rqsn->get_outlet_rqsn();
        $new_rq = [];
        $sl = 1;
        foreach ($rqsn_list as $rq) {
            // echo '<pre>';
            // $rq['haha'] = 'aaha';
            // print_r($rq);
            $rq['sl'] = $sl;
            $rq['from'] = $rq['outlet_name'];
            $rq['to']   = ($CI->db->select('central_warehouse')->from('central_warehouse')->get()->result_array())[0]['central_warehouse'];


            $new_rq[] = $rq;
            $sl++;
        }

        $data = array(
            'title'     => 'Requsition Report',
            'rqsn_list' => $new_rq
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $view = $CI->parser->parse('rqsn/outlet_rqsn_report_form', $data, true);
        return $view;
    }

    public function view_outlet_rqsn_form($rqsn_id)
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');

        $rqsn_details = $CI->Rqsn->get_outlet_rqsn_details($rqsn_id);

        $sl = 1;
        foreach ($rqsn_details as $k => $v) {
            $rqsn_details[$k]['sl'] = $sl;
            if ($rqsn_details[$k]['item_status'] == 1) {
                $rqsn_details[$k]['status'] = 'Pending for approval';
            } elseif ($rqsn_details[$k]['item_status'] == 2) {
                $rqsn_details[$k]['status'] = 'Approved (Not received yet)';
            } else {
                $rqsn_details[$k]['status'] = 'Recieved by outlet';
            }
            $sl++;
        }

        $data = array(
            'title'     => 'Purchase Requsition Details',
            'rqsn_details' => $rqsn_details,
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $view = $CI->parser->parse('rqsn/view_outlet_rqsn_form', $data, true);
        return $view;
    }

    public function production_list_from_rqsn()
    {
        $CI = & get_instance();
        $CI->load->model('Rqsn');

        $rqsn_list = $CI->Rqsn->get_rqsn_approved_list();


        $i = 0;
        foreach ($rqsn_list as $k => $v) {
            $i++;
            $rqsn_list[$k]['sl'] = $i + $CI->uri->segment(3);
        }

        $data = array(
            'title'     => 'Production List',
            'pur_list'  => $rqsn_list
        );
        // echo '<pre>'; print_r($data); die();

        return $CI->parser->parse('production/production_list_form', $data, true);

    }
    public function item_list_finalize()
    {
        $CI = & get_instance();
        $CI->load->model('Rqsn');

        $rqsn_list = $CI->Rqsn->get_item_list_finalize();


        $i = 0;
        foreach ($rqsn_list as $k => $v) {
            $i++;
            $rqsn_list[$k]['sl'] = $i + $CI->uri->segment(3);
        }

        $data = array(
            'title'     => 'Item Finalize ',
            'pur_list'  => $rqsn_list
        );
        // echo '<pre>'; print_r($data); die();

        return $CI->parser->parse('production/item_finalize', $data, true);

    }
}
