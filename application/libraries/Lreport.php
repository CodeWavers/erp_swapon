<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lreport extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function wastage_dec() {
        $CI = & get_instance();
        $CI->load->model('Rqsn');
        $CI->load->model('Web_settings');
        $CI->load->model('warehouse');

        $outlet_id=$this->warehouse->get_outlet_user()[0]['outlet_id'];

        $data = array(
            'title'         => "Wastage Declaration",
            "outlet_id" => $outlet_id,

        );
       // echo '<pre'; print_r($data);exit();

        //    die();
        $invoiceForm = $CI->parser->parse('wastage/wastage_dec', $data, true);
        return $invoiceForm;
    }

    // Retrieve All Stock Report
    public function stock_report($limit, $page, $links)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $stok_report = $CI->Reports->stock_report($limit, $page);

        if (!empty($stok_report)) {
            $i = $page;
            foreach ($stok_report as $k => $v) {
                $i++;
                $stok_report[$k]['sl'] = $i;
            }
            foreach ($stok_report as $k => $v) {
                $i++;
                $stok_report[$k]['stok_quantity'] = $stok_report[$k]['totalBuyQnty'] - $stok_report[$k]['totalSalesQnty'];
                $stok_report[$k]['totalSalesCtn'] = $stok_report[$k]['totalSalesQnty'] / $stok_report[$k]['cartoon_quantity'];
                $stok_report[$k]['totalPrhcsCtn'] = $stok_report[$k]['totalBuyQnty'] / $stok_report[$k]['cartoon_quantity'];

                $stok_report[$k]['stok_quantity_cartoon'] = $stok_report[$k]['stok_quantity'] / $stok_report[$k]['cartoon_quantity'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title' => display('stock_list'),
            'stok_report' => $stok_report,
            'links' => $links,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );
        $reportList = $CI->parser->parse('report/stock_report', $data, true);
        return $reportList;
    }

    //Out of stock
    public function out_of_stock()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $out_of_stock = $CI->Reports->out_of_stock();

        if (!empty($out_of_stock)) {
            $i = 0;
            foreach ($out_of_stock as $k => $v) {
                $i++;
                $out_of_stock[$k]['sl'] = $i;
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title' => display('out_of_stock'),
            'out_of_stock' => $out_of_stock,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );
        // echo '<pre>';print_r($data);exit();
        $reportList = $CI->parser->parse('report/out_of_stock', $data, true);
        return $reportList;
    }



    public function birthday_noti()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $birthday = $CI->Reports->birthday_noti();
        //$count=$CI->Reports->birthday_noti_count();

        if (!empty($birthday)) {
            $i = 0;
            foreach ($birthday as $k => $v) {
                $i++;
                $birthday[$k]['sl'] = $i;
            }
        }
        // $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title' => "Today's Birthday",
            'birthday' => $birthday,
            //'count'=>$count

        );
        // echo '<pre>';print_r($data);exit();
        $reportList = $CI->parser->parse('report/birthday_noti', $data, true);
        return $reportList;
    }

    // Retrieve Single Item Stock Stock Report
    public function stock_report_single_item()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Products');
        $CI->load->model('categories');
        $data['title'] = 'Stock Report';

        $cat_list = $CI->categories->cates();
        $sku_list = $this->Products->sku_list();
        $company_info = $CI->Reports->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency'] = $currency_details[0]['currency'];
        $data['totalnumber'] = $CI->Reports->totalnumberof_product();
        $data['company_info'] = $company_info;
        $data['pr_status'] = 1;
        $data['cat_list'] = $cat_list;
        $data['sku_list'] = $sku_list;
        $data['heading_text'] = "Stock Report";
        $reportList = $CI->parser->parse('report/stock_report', $data, true);
        return $reportList;
    }

    public function stock_report_raw()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $data['title'] = "Raw Materials Stock Report";
        $company_info = $CI->Reports->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency'] = $currency_details[0]['currency'];
        $data['totalnumber'] = $CI->Reports->totalnumberof_product();
        $data['company_info'] = $company_info;
        $data['pr_status'] = 2;
        $data['heading_text'] = "Raw Materials Stock Report";
        $reportList = $CI->parser->parse('report/stock_report', $data, true);
        return $reportList;
    }

    public function stock_report_tools()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $data['title'] = 'stock';
        $company_info = $CI->Reports->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency'] = $currency_details[0]['currency'];
        $data['totalnumber'] = $CI->Reports->totalnumberof_product();
        $data['company_info'] = $company_info;
        $data['pr_status'] = 3;
        $data['heading_text'] = "Tools Stock Report";
        $reportList = $CI->parser->parse('report/stock_report', $data, true);
        return $reportList;
    }


    /// supplier wise stock report
    public function stock_supplierwise()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $data['title'] = 'stock';
        $company_info = $CI->Reports->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency'] = $currency_details[0]['currency'];
        $data['totalnumber'] = $CI->Reports->totalnumberof_product();
        $data['company_info'] = $company_info;
        $reportList = $CI->parser->parse('report/supplierwise_stock', $data, true);
        return $reportList;
    }

    // Retrieve Single Item Stock Stock Report
    public function stock_report_supplier_wise($product_id, $supplier_id, $date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Suppliers');
        $CI->load->library('occational');
        $stok_report = $CI->Reports->stock_report_supplier_bydate($product_id, $supplier_id, $date, $per_page, $page);
        $supplier_list = $CI->Suppliers->supplier_list_report();
        $supplier_info = $CI->Suppliers->retrieve_supplier_editdata($supplier_id);

        $sub_total_in = 0;
        $sub_total_out = 0;
        $sub_total_stock = 0;
        $sub_total_stoksale = 0;
        if (!empty($stok_report)) {
            $i = $page;
            foreach ($stok_report as $k => $v) {
                $i++;
                $stok_report[$k]['sl'] = $i;

                $stok_report[$k]['stok_quantity_cartoon'] = ($stok_report[$k]['totalPurchaseQnty'] - $stok_report[$k]['totalSalesQnty']);

                $stok_report[$k]['SubTotalOut'] = ($sub_total_out + $stok_report[$k]['totalSalesQnty']);
                $sub_total_out = $stok_report[$k]['SubTotalOut'];
                $stok_report[$k]['SubTotalIn'] = ($sub_total_in + $stok_report[$k]['totalPurchaseQnty']);
                $sub_total_in = $stok_report[$k]['SubTotalIn'];
                $stok_report[$k]['total_sale_price'] = $stok_report[$k]['stok_quantity_cartoon'] * $stok_report[$k]['price'];
                $stok_report[$k]['SubTotalStock'] = ($sub_total_stock + $stok_report[$k]['stok_quantity_cartoon']);
                $sub_total_stoksale += $stok_report[$k]['total_sale_price'];
                $sub_total_stock = $stok_report[$k]['SubTotalStock'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('stock_report_supplier_wise'),
            'stok_report' => $stok_report,
            'product_model' => $stok_report[0]['product_model'],
            'links' => $links,
            'date' => $date,
            'sub_total_in' => number_format($sub_total_in, 2, '.', ','),
            'sub_total_out' => number_format($sub_total_out, 2, '.', ','),
            'sub_total_stock' => number_format($sub_total_stock, 2, '.', ','),
            'supplier_list' => $supplier_list,
            'supplier_info' => $supplier_info,
            'company_info' => $company_info,
            'stock_sale' => number_format($sub_total_stoksale, 2, '.', ','),
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company' => $company_info,
        );

        $reportList = $CI->parser->parse('report/stock_report_supplier_wise', $data, true);
        return $reportList;
    }

    // product wise stock report
    public function stock_report_product_date_date_wise($from_date, $to_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Suppliers');
        $CI->load->library('occational');
        $stok_report = $CI->Reports->stock_report_product_date_date($from_date, $to_date, $per_page, $page);
        $supplier_list = $CI->Suppliers->supplier_list_report();
        $sub_total_in = 0;
        $sub_total_out = 0;
        $sub_total_stock = 0;

        if (!empty($stok_report)) {
            $i = $page;
            foreach ($stok_report as $k => $v) {
                $i++;
                $stok_report[$k]['sl'] = $i;
                $stok_report[$k]['stok_quantity_cartoon'] = ($stok_report[$k]['totalPurchaseQnty'] - $stok_report[$k]['totalSalesQnty']);
                $stok_report[$k]['SubTotalOut'] = ($sub_total_out + $stok_report[$k]['totalSalesQnty']);
                $sub_total_out = $stok_report[$k]['SubTotalOut'];
                $stok_report[$k]['SubTotalIn'] = ($sub_total_in + $stok_report[$k]['totalPurchaseQnty']);
                $sub_total_in = $stok_report[$k]['SubTotalIn'];
                $stok_report[$k]['total_sale_price'] = $stok_report[$k]['stok_quantity_cartoon'] * $stok_report[$k]['price'];
                $stok_report[$k]['SubTotalStock'] = ($sub_total_stock + $stok_report[$k]['stok_quantity_cartoon']);
                $sub_total_stock = $stok_report[$k]['SubTotalStock'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('stock_report_supplier_wise'),
            'stok_report' => $stok_report,
            'product_model' => $stok_report[0]['product_model'],
            'links' => $links,
            'start_date' => $from_date,
            'end_date' => $to_date,
            'sub_total_in' => number_format($sub_total_in, 2, '.', ','),
            'sub_total_out' => number_format($sub_total_out, 2, '.', ','),
            'sub_total_stock' => number_format($sub_total_stock, 2, '.', ','),
            'supplier_list' => $supplier_list,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company' => $company_info,
        );

        $reportList = $CI->parser->parse('report/productwise_stockreport_datebetween', $data, true);
        return $reportList;
    }

    // Retrieve Single Item Stock Stock Report
    public function stock_report_product_wise($supplier_id = null, $from_date = null, $to_date = null, $links = null, $per_page = null, $page = null)
    {

        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Suppliers');
        $CI->load->library('occational');
        $stok_report = $CI->Reports->stock_report_product_bydate($supplier_id, $from_date, $to_date, $per_page, $page);


        $supplier_list = $CI->Suppliers->supplier_list_report();
        $supplier_info = $CI->Suppliers->retrieve_supplier_editdata($supplier_id);


        $sub_total_in = 0;
        $sub_total_out = 0;
        $sub_total_stock = 0;
        $sub_total_in_qnty = 0;
        $sub_total_out_qnty = 0;
        $sub_total_stoksale = 0;
        $stok_quantity_cartoon = 0;


        if (!empty($stok_report)) {

            $i = $page;
            foreach ($stok_report as $k => $v) {
                $i++;
                $stok_report[$k]['sl'] = $i;
            }

            foreach ($stok_report as $k => $v) {
                $i++;

                $stok_report[$k]['stok_quantity_cartoon'] = ($stok_report[$k]['totalPurchaseQnty'] - $stok_report[$k]['totalSalesQnty']);

                $stok_report[$k]['SubTotalOut'] = ($sub_total_out + $stok_report[$k]['totalSalesQnty']);
                $sub_total_out = $stok_report[$k]['SubTotalOut'];


                $stok_report[$k]['SubTotalIn'] = ($sub_total_in + $stok_report[$k]['totalPurchaseQnty']);
                $sub_total_in = $stok_report[$k]['SubTotalIn'];

                $stok_report[$k]['SubTotalStock'] = ($sub_total_stock + $stok_report[$k]['stok_quantity_cartoon']);
                $sub_total_stock = $stok_report[$k]['SubTotalStock'];

                $stok_report[$k]['SubTotalinQnty'] = ($sub_total_in_qnty + $stok_report[$k]['totalPurchaseQnty']);
                $sub_total_in_qnty = $stok_report[$k]['SubTotalinQnty'];
                $stok_report[$k]['total_sale_price'] = $stok_report[$k]['stok_quantity_cartoon'] * $stok_report[$k]['price'];
                $stok_report[$k]['SubTotaloutQnty'] = ($sub_total_out_qnty + $stok_report[$k]['totalSalesQnty']);
                $sub_total_stoksale += $stok_report[$k]['total_sale_price'];
                $sub_total_out_qnty = $stok_report[$k]['SubTotaloutQnty'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('stock_report_product_wise'),
            'stok_report' => $stok_report,
            'product_model' => $stok_report[0]['product_model'],
            'links' => $links,
            'date' => $to_date,
            'sub_total_in' => number_format($sub_total_in, 2, '.', ','),
            'sub_total_out' => number_format($sub_total_out, 2, '.', ','),
            'sub_total_stock' => number_format($sub_total_stock, 2, '.', ','),
            'SubTotalinQnty' => number_format($sub_total_in_qnty, 2, '.', ','),
            'SubTotaloutQnty' => number_format($sub_total_out_qnty, 2, '.', ','),
            'supplier_list' => $supplier_list,
            'supplier_info' => $supplier_info,
            'company_info' => $company_info,
            'product_id' => $product_id,
            'supplier_id' => $supplier_id,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'stock_sale' => number_format($sub_total_stoksale, 2, '.', ','),
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company' => $company_info,
        );

        $reportList = $CI->parser->parse('report/stock_report_product_wise', $data, true);
        return $reportList;
    }

    // Retrieve daily Report
    public function retrieve_all_reports($per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $logged_in_outlet = $CI->Warehouse->outlet_or_cw_logged_in();
        $cw = $CI->Warehouse->branch_list_product();
        $real_cw = $CI->Warehouse->central_warehouse();

        $outlet_id = $this->input->post('outlet_id');



        if (!$outlet_id) {
            $outlet_id = $logged_in_outlet[0]['outlet_id'];
        }

        // print_r($outlet_id);
        // exit();

        $sales_report = $CI->Reports->todays_sales_report($per_page, $page, $outlet_id);
        $sales_amount = 0;
        if (!empty($sales_report)) {
            $i = 0;
            foreach ($sales_report as $k => $v) {
                $i++;
                $sales_report[$k]['sl'] = $i;
                $sales_report[$k]['sales_date'] = $CI->occational->dateConvert($sales_report[$k]['date']);
                $sales_amount = $sales_amount + $sales_report[$k]['total_amount'];
            }
        }

        $purchase_report = $CI->Reports->todays_purchase_report($per_page, $page, $outlet_id);
        $purchase_amount = 0;
        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('todays_report'),
            'sales_report' => $sales_report,
            'sales_amount' => number_format($sales_amount, 2, '.', ','),
            'purchase_amount' => number_format($purchase_amount, 2, '.', ','),
            'purchase_report' => $purchase_report,
            'date' => $today = date('Y-m-d'),
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'real_cw'            => $real_cw,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company' => $company_info,
        );

        // report/all_report
        $reportList = $CI->parser->parse('report/all_report', $data, true);
        return $reportList;
    }

    // Retrieve todays_sales_report
    public function todays_sales_report($links = null, $per_page = null, $page = null)
    {

        $user_id = $this->session->userdata('user_id');
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $sales_report = $CI->Reports->todays_sales_report(null, null, $outlet_id);
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        $sales_amount = 0;
        // if (!empty($sales_report)) {
        //     $i = 0;
        //     foreach ($sales_report as $k => $v) {
        //         $i++;
        //         $sales_report[$k]['sl'] = $i;
        //         $sales_report[$k]['sales_date'] = $CI->occational->dateConvert($sales_report[$k]['date']);
        //         $sales_amount = $sales_amount + $sales_report[$k]['total_amount'];
        //     }
        // }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('todays_sales_report'),
            'sales_amount' => number_format($sales_amount, 2, '.', ','),
            'sales_report' => $sales_report,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );

        //echo '<pre>';print_r($outlet_list);exit();
        $reportList = $CI->parser->parse('report/sales_report', $data, true);
        return $reportList;
    }

    //======================= user sales report ================================
    public function user_sales_report($links = null, $per_page = null, $page = null, $from_date, $to_date, $user_id)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $sales_report = $CI->Reports->user_sales_report(null, null, $from_date, $to_date, $user_id);
        $sales_amount = 0;
        if (!empty($sales_report)) {
            $i = 0;
            foreach ($sales_report as $k => $v) {
                $i++;
                $sales_report[$k]['sl'] = $i;

                $sales_amount += $sales_report[$k]['amount'];
            }
        }
        $user_list = $CI->Reports->userList();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('user_sales_report'),
            'sales_amount' => number_format($sales_amount, 2, '.', ','),
            'sales_report' => $sales_report,
            'company_info' => $company_info,
            'from' => $CI->occational->dateConvert($from_date),
            'to' => $CI->occational->dateConvert($to_date),
            'currency' => $currency_details[0]['currency'],
            'user_list' => $user_list,
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/user_wise_sales_report', $data, true);
        return $reportList;
    }

    public function retrieve_dateWise_SalesReports($outlet_id, $from_date, $to_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $sales_report = $CI->Reports->retrieve_dateWise_SalesReports($outlet_id, $from_date, $to_date);
        $sales_amount = 0;
        // if (!empty($sales_report)) {
        //     $i = 0;
        //     foreach ($sales_report as $k => $v) {
        //         $i++;
        //         $sales_report[$k]['sl'] = $i;
        //         $sales_report[$k]['sales_date'] = $CI->occational->dateConvert($sales_report[$k]['date']);
        //         $sales_amount = $sales_amount + $sales_report[$k]['total_amount'];
        //     }
        // }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('sales_report'),
            'sales_amount' => $sales_amount,
            'sales_report' => $sales_report,
            'company_info' => $company_info,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );



    //    echo '<pre>';print_r($data);exit();
        $reportList = $CI->parser->parse('report/sales_report', $data, true);
        return $reportList;
    }

    // ======================= Due Report start ===============================
    public function retrieve_dateWise_DueReports($from_date, $to_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $outlet_id = $this->input->get('outlet_id');
        $sales_report = $CI->Reports->retrieve_dateWise_DueReports($from_date, $to_date, $per_page, $page, $outlet_id);
        $sales_amount = 0;
        if (!empty($sales_report)) {
            $i = 0;
            foreach ($sales_report as $k => $v) {
                $i++;
                $sales_report[$k]['sl'] = $i;
                $sales_report[$k]['sales_date'] = $CI->occational->dateConvert($sales_report[$k]['date']);
                $sales_amount = $sales_amount + $sales_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('due_report'),
            'sales_amount' => $sales_amount,
            'sales_report' => $sales_report,
            'company_info' => $company_info,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/due_report', $data, true);
        return $reportList;
    }
    // ======================= Due Report end =================================
    // Retrieve todays_purchase_report
    public function todays_purchase_report($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_report = $CI->Reports->todays_purchase_report();
        $purchase_amount = 0;

        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('todays_purchase_report'),
            'purchase_amount' => number_format($purchase_amount, 2, '.', ','),
            'purchase_report' => $purchase_report,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_report', $data, true);
        return $reportList;
    }

    public function purchase_warrenty_report($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_report = $CI->Reports->purchase_warrenty_report($per_page, $page);
        $purchase_amount = 0;

        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('todays_purchase_report'),
            'purchase_amount' => number_format($purchase_amount, 2, '.', ','),
            'purchase_report' => $purchase_report,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_warrenty_report', $data, true);
        return $reportList;
    }

    public function purchase_expiry_report($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_report = $CI->Reports->purchase_expiry_report($per_page, $page);
        $purchase_amount = 0;

        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => 'Purchase Expiry Date',
            'purchase_amount' => number_format($purchase_amount, 2, '.', ','),
            'purchase_report' => $purchase_report,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_expiry_report', $data, true);
        return $reportList;
    }

    public function purchase_cheque_report($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_report = $CI->Reports->purchase_cheque_report($per_page, $page);
        $purchase_amount = 0;

        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => 'Purchase Cheque Report',
            'purchase_amount' => number_format($purchase_amount, 2, '.', ','),
            'purchase_report' => $purchase_report,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_cheque_report', $data, true);
        return $reportList;
    }

    //    ========== its for purchase_report_category_wise ===========
    public function purchase_report_category_wise($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $purchase_report_category_wise = $CI->Reports->purchase_report_category_wise();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => display('category_wise_purchase_report'),
            'category_list' => $category_list,
            'purchase_report_category_wise' => $purchase_report_category_wise,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_report_category_wise', $data, true);
        return $reportList;
    }
    public function purchase_warrenty_report_category_wise($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $purchase_warrenty_report_category_wise = $CI->Reports->purchase_warrenty_report_category_wise($per_page, $page);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => 'Category Wise Warrenty Report',
            'category_list' => $category_list,
            'purchase_warrenty_report_category_wise' => $purchase_warrenty_report_category_wise,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_warrenty_report_category_wise', $data, true);
        return $reportList;
    }
    public function purchase_expired_report_category_wise($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $purchase_expired_report_category_wise = $CI->Reports->purchase_expired_report_category_wise($per_page, $page);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title' => 'Category Wise Expired Report',
            'category_list' => $category_list,
            'purchase_expired_report_category_wise' => $purchase_expired_report_category_wise,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_expired_report_category_wise', $data, true);
        return $reportList;
    }
    public function purchase_report_shelf_wise($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $CI->load->model('Products');
        $category_list = $CI->Categories->category_list_product();
        $product_list = $CI->Reports->product_list();

        $purchase_report_category_wise = $CI->Reports->purchase_report_shelf_wise($per_page, $page);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();


        $data = array(
            'title' => 'Shelf Wise Purchase Report',
            'category_list' => $category_list,
            'product_list' => $product_list,
            'purchase_report_category_wise' => $purchase_report_category_wise,
            //'available_quantity' => $available_quantity,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_report_shelf_wise', $data, true);
        return $reportList;
    }
    public function supplier_payment_report($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $CI->load->model('Products');
        $category_list = $CI->Categories->category_list_product();
        $product_list = $CI->Reports->product_list();

        $purchase_report_category_wise = $CI->Reports->supplier_payment_report($per_page, $page);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();


        $data = array(
            'title' => 'Supplier Payment Report',
            'category_list' => $category_list,
            'product_list' => $product_list,
            'purchase_report_category_wise' => $purchase_report_category_wise,
            //'available_quantity' => $available_quantity,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/supplier_payment_report', $data, true);
        return $reportList;
    }

    public function customer_recieve_report($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $CI->load->model('Products');
        $category_list = $CI->Categories->category_list_product();
        $product_list = $CI->Reports->product_list();

        $purchase_report_category_wise = $CI->Reports->customer_recieve_report($per_page, $page);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();


        $data = array(
            'title' => 'Customer Recieve Report',
            'category_list' => $category_list,
            'product_list' => $product_list,
            'purchase_report_category_wise' => $purchase_report_category_wise,
            //'available_quantity' => $available_quantity,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'links' => $links,
            'software_info' => $currency_details,
            'company' => $company_info,
        );
        $reportList = $CI->parser->parse('report/customer_recieve_report', $data, true);
        return $reportList;
    }

    public function filter_purchase_report_category_wise($category = null, $from_date = null, $to_date = null, $links = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $filter_purchase_report_category_wise = $CI->Reports->filter_purchase_report_category_wise($category, $from_date, $to_date);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'             => display('category_wise_purchase_report'),
            'category_list'     => $category_list,
            'from_date'         => $from_date,
            'to_date'           => $to_date,
            'purchase_report_category_wise' => $filter_purchase_report_category_wise,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'links'             => $links,
            'software_info'     => $currency_details,
            'company'           => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_report_category_wise', $data, true);
        return $reportList;
    }
    public function filter_purchase_warrenty_report_category_wise($category = null, $from_date = null, $to_date = null, $links = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $filter_purchase_warrenty_report_category_wise = $CI->Reports->filter_purchase_warrenty_report_category_wise($category, $from_date, $to_date);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'             => 'Warrenty wise category report',
            'category_list'     => $category_list,
            'from_date'         => $from_date,
            'to_date'           => $to_date,
            'purchase_warrenty_report_category_wise' => $filter_purchase_warrenty_report_category_wise,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'links'             => $links,
            'software_info'     => $currency_details,
            'company'           => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_warrenty_report_category_wise', $data, true);
        return $reportList;
    }
    public function filter_purchase_expired_report_category_wise($category = null, $from_date = null, $to_date = null, $links = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $filter_purchase_expired_report_category_wise = $CI->Reports->filter_purchase_expired_report_category_wise($category, $from_date, $to_date);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'             => 'Expired wise category report',
            'category_list'     => $category_list,
            'from_date'         => $from_date,
            'to_date'           => $to_date,
            'purchase_expired_report_category_wise' => $filter_purchase_expired_report_category_wise,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'links'             => $links,
            'software_info'     => $currency_details,
            'company'           => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_expired_report_category_wise', $data, true);
        return $reportList;
    }
    public function filter_purchase_report_shelf_wise($product = null, $category = null, $from_date = null, $to_date = null, $links = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $CI->load->model('Products');
        $category_list = $CI->Categories->category_list_product();
        $product_list = $CI->Reports->product_list();

        $filter_purchase_report_category_wise = $CI->Reports->filter_purchase_report_shelf_wise($product, $category, $from_date, $to_date);
        //        $data1 = $this->db->query("SELECT SUM(product_purchase_details.quantity) as quantity,SUM(product_purchase_details.total_amount) as total_amount,product_purchase_details.shelf_id,product_information.product_name,product_model,price,product_category.category_name FROM product_purchase_details
        // JOIN product_information  ON product_purchase_details.product_id= product_information.product_id
        // JOIN product_category ON product_information.category_id=product_category.category_id
        // WHERE product_purchase_details.shelf_id=$category AND product_purchase_details.product_id=$product
        //")->result();
        // echo "<pre>";print_r($data1);exit();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        // echo "<pre>";print_r($data1);exit();

        $data = array(
            'title'             => "Shelf Wise Purchase Report",
            'product_list'     => $product_list,
            //'product_id'     => $product,
            'from_date'         => $from_date,
            'to_date'           => $to_date,
            'purchase_report_category_wise' => $filter_purchase_report_category_wise,
            //  'available_quantity' => $available_quantity,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'links'             => $links,
            'software_info'     => $currency_details,
            'company'           => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_report_shelf_wise', $data, true);
        return $reportList;
    }
    public function filter_sp_report_date_wise($from_date = null, $to_date = null, $links = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $CI->load->model('Products');


        $filter_purchase_report_category_wise = $CI->Reports->filter_sp_report_date_wise($from_date, $to_date);
        //        $data1 = $this->db->query("SELECT SUM(product_purchase_details.quantity) as quantity,SUM(product_purchase_details.total_amount) as total_amount,product_purchase_details.shelf_id,product_information.product_name,product_model,price,product_category.category_name FROM product_purchase_details
        // JOIN product_information  ON product_purchase_details.product_id= product_information.product_id
        // JOIN product_category ON product_information.category_id=product_category.category_id
        // WHERE product_purchase_details.shelf_id=$category AND product_purchase_details.product_id=$product
        //")->result();
        // echo "<pre>";print_r($data1);exit();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        // echo "<pre>";print_r($data1);exit();

        $data = array(
            'title'             => "Supplier Payment Date Wise Purchase Report",

            //'product_id'     => $product,
            'from_date'         => $from_date,
            'to_date'           => $to_date,
            'purchase_report_category_wise' => $filter_purchase_report_category_wise,
            //  'available_quantity' => $available_quantity,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'links'             => $links,
            'software_info'     => $currency_details,
            'company'           => $company_info,
        );
        $reportList = $CI->parser->parse('report/supplier_payment_report', $data, true);
        return $reportList;
    }
    public function filter_cr_report_date_wise($from_date = null, $to_date = null, $links = null)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $CI->load->model('Products');


        $filter_purchase_report_category_wise = $CI->Reports->filter_cr_report_date_wise($from_date, $to_date);
        //        $data1 = $this->db->query("SELECT SUM(product_purchase_details.quantity) as quantity,SUM(product_purchase_details.total_amount) as total_amount,product_purchase_details.shelf_id,product_information.product_name,product_model,price,product_category.category_name FROM product_purchase_details
        // JOIN product_information  ON product_purchase_details.product_id= product_information.product_id
        // JOIN product_category ON product_information.category_id=product_category.category_id
        // WHERE product_purchase_details.shelf_id=$category AND product_purchase_details.product_id=$product
        //")->result();
        // echo "<pre>";print_r($data1);exit();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        // echo "<pre>";print_r($data1);exit();

        $data = array(
            'title'             => "Customer Recieve Date Wise Purchase Report",

            //'product_id'     => $product,
            'from_date'         => $from_date,
            'to_date'           => $to_date,
            'purchase_report_category_wise' => $filter_purchase_report_category_wise,
            //  'available_quantity' => $available_quantity,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
            'links'             => $links,
            'software_info'     => $currency_details,
            'company'           => $company_info,
        );
        $reportList = $CI->parser->parse('report/customer_recieve_report', $data, true);
        return $reportList;
    }


    //    ========== its for sales_report_category_wise ===========
    public function sales_report_category_wise($links = null, $per_page = null, $page = null)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $sales_report_category_wise = $CI->Reports->sales_report_category_wise();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        $data = array(
            'title'                      => display('category_wise_purchase_report'),
            'category_list'              => $category_list,
            'sales_report_category_wise' => $sales_report_category_wise,
            'company_info'               => $company_info,
            'currency'                   => $currency_details[0]['currency'],
            'position'                   => $currency_details[0]['currency_position'],
            'links'                      => $links,
            'software_info'              => $currency_details,
            'company'                    => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,

        );
        $reportList = $CI->parser->parse('report/sales_report_category_wise', $data, true);
        return $reportList;
    }

    //    ========== Variance Report ===========
    public function variance_report($links = null, $per_page = null, $page = null,$category=null,$product_id=null,$from_date= null,$to_date=null)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->cates();
        $category_name = $CI->Categories->cates_by_id($category);
        $product_list = $CI->Reports->product_list();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $response=$CI->Reports->stock_taking_details($category,$product_id,$from_date,$to_date);
        $cw = $CI->Warehouse->branch_list_product();
        $data = array(
            'title'                      => "Variance_report",
            'category_list'              => $category_list,
            'product_list'              => $product_list,
            'response' => $response,
            'company_info'               => $company_info,
            'currency'                   => $currency_details[0]['currency'],
            'position'                   => $currency_details[0]['currency_position'],
            'links'                      => $links,
            'software_info'              => $currency_details,
            'company'                    => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'product_id' => $product_id,
            'category_name' => $category_name->name,
            'category_id' => $category_name->id,

        );

        //echo '<pre>';print_r($response);exit();
        $reportList = $CI->parser->parse('report/variance_report', $data, true);
        return $reportList;
    }

    public function stock_taking_print($id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Invoices');
        $company_info = $CI->Invoices->retrieve_company();
        $redirect_url = $_SESSION['redirect_uri'];

        $res = $CI->Reports->stock_taking_details_by_id($id);

        //  echo '<pre>';print_r($res);exit();

        $sl = 1;
        foreach ($res as $k => $v) {
            $res[$k]['sl']  = $sl;
            $sl++;
        }

        $data = array(
            'title'     => 'Print Stock Taking',
            'product_list'  => $res,
            'date'  => $CI->occational->dateConvert($res[0]['date']),
            'stid'  => $res[0]['stid_no'],
            'company_info'  => $company_info,
            'access'  => 'view',


        );




            $chapterList = $CI->parser->parse('report/stock_taking_print', $data, true);

        return $chapterList;
    }

    //    ============== its for filter_sales_report_category_wise============
    public function filter_sales_report_category_wise($outlet_id = null, $category = null, $from_date = null, $to_date = null, $links = null)
    {
        $CI = &get_instance();

        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Categories');
        $category_list = $CI->Categories->category_list_product();
        $filter_sales_report_category_wise = $CI->Reports->filter_sales_report_category_wise($outlet_id, $category, $from_date, $to_date);
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'                      => display('category_wise_purchase_report'),
            'category_list'              => $category_list,
            'from_date'                  => $from_date,
            'to_date'                    => $to_date,
            'sales_report_category_wise' => $filter_sales_report_category_wise,
            'company_info'               => $company_info,
            'currency'                   => $currency_details[0]['currency'],
            'position'                   => $currency_details[0]['currency_position'],
            'links'                      => $links,
            'software_info'             => $currency_details,
            'company'                    => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
        );

        $reportList = $CI->parser->parse('report/sales_report_category_wise', $data, true);
        return $reportList;
    }









    //Retrive date wise purchase report
    public function retrieve_dateWise_PurchaseReports($start_date, $end_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_report = $CI->Reports->retrieve_dateWise_PurchaseReports($start_date, $end_date);
        $purchase_amount = 0;
        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'           => display('purchase_report'),
            'purchase_amount' => number_format($purchase_amount, 2),
            'purchase_report' => $purchase_report,
            'company_info'    => $company_info,
            'from_date'       => $start_date,
            'to_date'         => $end_date,
            'currency'        => $currency_details[0]['currency'],
            'position'        => $currency_details[0]['currency_position'],
            'links'           => $links,
            'software_info'  => $currency_details,
            'company'         => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_report', $data, true);
        return $reportList;
    }
    public function retrieve_expiry_dateWise_PurchaseReports($start_date, $end_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_report = $CI->Reports->retrieve_expiry_dateWise_PurchaseReports($start_date, $end_date, $per_page, $page);
        $purchase_amount = 0;
        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'           => display('purchase_report'),
            'purchase_amount' => number_format($purchase_amount, 2),
            'purchase_report' => $purchase_report,
            'company_info'    => $company_info,
            'from_date'       => $start_date,
            'to_date'         => $end_date,
            'currency'        => $currency_details[0]['currency'],
            'position'        => $currency_details[0]['currency_position'],
            'links'           => $links,
            'software_info'  => $currency_details,
            'company'         => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_expiry_report', $data, true);
        return $reportList;
    }
    public function retrieve_cheque_dateWise_PurchaseReports($start_date, $end_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');


        $purchase_report = $CI->Reports->retrieve_cheque_dateWise_PurchaseReports($start_date, $end_date, $per_page, $page);
        $purchase_amount = 0;
        if (!empty($purchase_report)) {
            $i = 0;
            foreach ($purchase_report as $k => $v) {
                $i++;
                $purchase_report[$k]['sl'] = $i;
                $purchase_report[$k]['prchse_date'] = $CI->occational->dateConvert($purchase_report[$k]['purchase_date']);
                $purchase_amount = $purchase_amount + $purchase_report[$k]['grand_total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'           => 'Purchase Cheque Report',
            'purchase_amount' => number_format($purchase_amount, 2),
            'purchase_report' => $purchase_report,
            'company_info'    => $company_info,
            'from_date'       => $start_date,
            'to_date'         => $end_date,
            'currency'        => $currency_details[0]['currency'],
            'position'        => $currency_details[0]['currency_position'],
            'links'           => $links,
            'software_info'  => $currency_details,
            'company'         => $company_info,
        );
        $reportList = $CI->parser->parse('report/purchase_cheque_report', $data, true);
        return $reportList;
    }

    //Product report sales wise
    public function get_products_report_sales_view($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Categories');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_product_sales_report();
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $category_list = $CI->Categories->cates();

        $cw = $CI->Warehouse->branch_list_product();

        $product_list = $CI->Reports->product_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => display('sales_report_product_wise'),
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'category_list'   => $category_list,
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_report', $data, true);
        return $reportList;
    }
    public function get_products_report_pre_sales_view($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Categories');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_product_pre_sales_report();
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $category_list = $CI->Categories->cates();

        $cw = $CI->Warehouse->branch_list_product();

        $product_list = $CI->Reports->product_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Pre Sale Stock Check',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'category_list'   => $category_list,
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_report_pre_sale', $data, true);
        return $reportList;
    }
    public function get_products_report_purchase_view($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $product_report = $CI->Reports->retrieve_product_sales_report($per_page, $page);
       // echo '<pre>';print_r($product_report);exit();

        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $product_list = $CI->Reports->product_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Purchase Report Product Wise',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_report_purchase', $data, true);
        return $reportList;
    }
    public function get_products_report_produce_view($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $product_report = $CI->Reports->retrieve_product_sales_report($per_page, $page);
       // echo '<pre>';print_r($product_report);exit();

        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $product_list = $CI->Reports->product_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Production Report Product Wise',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_report_production', $data, true);
        return $reportList;
    }
    public function get_products_id_report_sales_view($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_product_sales_report($per_page, $page);
        $product_list = $CI->Reports->customer_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => display('sales_report_product_wise'),
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_id_report', $data, true);
        return $reportList;
    }
    public function get_products_id_report_purchase_view($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_product_purchase_report($per_page, $page);
        //echo '<pre>';print_r($product_report);exit();
        $product_list = $CI->Reports->customer_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['purchase_date'] = $CI->occational->dateConvert($product_report[$k]['purchase_date']);
                $sub_total = $sub_total + $product_report[$k]['grand_total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Purchase Product Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_id_report_purchase', $data, true);
        return $reportList;
    }
    public function supplier_report($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->supplier_report($per_page, $page);
        // echo '<pre>';print_r($product_report);
        $product_list = $CI->Reports->supplier_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Supplier Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'supplier_id' => '',
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );

        $reportList = $CI->parser->parse('report/supplier_report', $data, true);
        return $reportList;
    }
    public function reorder_report($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->reorder_report($per_page, $page);
        //        $stockin = $this->db->select('sum(quantity) as totalSalesQnty')->from('invoice_details')->where('product_id',$product_report->product_id)->get()->row();
        //        $stockout = $this->db->select('sum(qty) as totalPurchaseQnty')->from('product_purchase_details')->where('product_id',$product_report->product_id)->get()->row();
        //$stock =  (!empty($product_report->totalBuyQnty)?$product_report->totalBuyQnty:0)-(!empty($product_report->totalSalesQnty)?$product_report->totalSalesQnty:0);

        // $stock=$product_report->totalBuyQnty;
        //echo '<pre>';print_r($product_report);exit();
        $product_list = $CI->Reports->supplier_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Re-order level Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'supplier_id' => '',
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );

        $reportList = $CI->parser->parse('report/reorder_report', $data, true);
        return $reportList;
    }

    public function get_products_report_sales_warrenty($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_sales_warrenty_reports($per_page, $page);
        $product_list = $CI->Reports->product_list();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Sales Warrenty Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/sales_warrenty_report', $data, true);
        return $reportList;
    }
    public function get_products_report_sales_cheque($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Customers');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $customer = $CI->Customers->customer_list_ledger_cheque();
        $product_report = $CI->Reports->retrieve_sales_cheque_reports($per_page, $page);
        $product_list = $CI->Reports->product_list();
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $bank_list        = $CI->Web_settings->bank_list();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $data = array(
            'title'          => 'Sales Cheque Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'links'          => $links,
            'product_list'   => $product_list,
            'customer_name'  => '',
            'address'        => '',
            'customer'       => $customer,
            'customer_id'    => '',
            'product_id'     => '',
            'from_date'      => '',
            'to_date'        => '',
            'bank_list'        => $bank_list,
            'bkash_list'        => $bkash_list,
            'nagad_list'        => $nagad_list,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'        => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,

        );
        // echo '<pre>';
        // print_r($data); exit();
        $reportList = $CI->parser->parse('report/sales_cheque_report', $data, true);
        return $reportList;
    }


    //Get Product Report Search
    public function get_products_search_report($outlet_id, $from_date, $to_date, $product_id,$cat_id, $links, $per_page, $page)
    {
        if ($outlet_id == 1) {
            $outlet_id = null;
        }
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->model('Categories');
        $CI->load->library('occational');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $category_list = $CI->Categories->cates();

        $cw = $CI->Warehouse->branch_list_product();
        $product_report = $CI->Reports->retrieve_product_search_sales_report($outlet_id, $from_date, $to_date, $product_id,$cat_id);
        $product_list = $CI->Reports->product_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => display('sales_report_product_wise'),
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'category_list'   => $category_list,
            'product_id'     => $product_id,
            'cat_id'     => $cat_id,
            'from_date'      => $from_date,
            'to_date'        => $to_date,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
        );

     //   echo '<pre>';print_r($product_report);exit();
        $reportList = $CI->parser->parse('report/product_report', $data, true);
        return $reportList;
    }
    public function get_products_pre_sale_search_report($outlet_id, $from_date, $to_date, $product_id,$cat_id, $links, $per_page, $page)
    {
        if ($outlet_id == 1) {
            $outlet_id = null;
        }
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->model('Categories');
        $CI->load->library('occational');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $category_list = $CI->Categories->cates();

        $cw = $CI->Warehouse->branch_list_product();
        $product_report = $CI->Reports->retrieve_product_search_pre_sales_report($outlet_id, $from_date, $to_date, $product_id,$cat_id);
        $product_list = $CI->Reports->product_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Pre Sale Stock',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'category_list'   => $category_list,
            'product_id'     => $product_id,
            'cat_id'     => $cat_id,
            'from_date'      => $from_date,
            'to_date'        => $to_date,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
        );

     //   echo '<pre>';print_r($product_report);exit();
        $reportList = $CI->parser->parse('report/product_report_pre_sale', $data, true);
        return $reportList;
    }
    public function get_products_purchase_search_report($outlet_id, $from_date, $to_date, $product_id, $links, $per_page, $page)
    {
        if ($outlet_id == 1) {
            $outlet_id = null;
        }
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        $product_report = $CI->Reports->retrieve_product_search_purchase_report($outlet_id, $from_date, $to_date, $product_id);
        $product_list = $CI->Reports->product_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['purchase_date'] = $CI->occational->dateConvert($product_report[$k]['purchase_date']);
                $sub_total = $sub_total + $product_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Purchase Report Product Wise',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'product_id'     => $product_id,
            'from_date'      => $from_date,
            'to_date'        => $to_date,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
        );

       // echo '<pre>';print_r($product_report);exit();
        $reportList = $CI->parser->parse('report/product_report_purchase', $data, true);
        return $reportList;
    }
    public function get_products_produce_search_report($outlet_id, $from_date, $to_date, $product_id, $links, $per_page, $page)
    {
        if ($outlet_id == 1) {
            $outlet_id = null;
        }
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        $product_report = $CI->Reports->retrieve_product_search_produce_report($outlet_id, $from_date, $to_date, $product_id);
        $product_list = $CI->Reports->product_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Production Report Product Wise',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'product_id'     => $product_id,
            'from_date'      => $from_date,
            'to_date'        => $to_date,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
        );

       // echo '<pre>';print_r($product_report);exit();
        $reportList = $CI->parser->parse('report/product_report_production', $data, true);
        return $reportList;
    }
    public function get_products_id_search_report($customer_id, $product_id, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_product_id_search_sales_report($customer_id, $product_id, $per_page, $page);
        $product_list = $CI->Reports->product_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Sales Report Barcode Wise',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'product_id'     => $product_id,
            'customer_id'    => $customer_id,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_id_report', $data, true);
        return $reportList;
    }
    public function get_supplier_id_search_report($supplier_id, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_supplier_id_report($supplier_id, $per_page, $page);
        $product_list = $CI->Reports->customer_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Supplier Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'supplier_id'     => $supplier_id,
            //'customer_id'     => $customer_id,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/supplier_report', $data, true);
        return $reportList;
    }
    public function get_purchase_product_id_search_report($supplier_id, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_purchase_product_id_report($supplier_id, $per_page, $page);
        $product_list = $CI->Reports->customer_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Product Purchase  Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'supplier_id'     => $supplier_id,
            //'customer_id'     => $customer_id,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_id_report_purchase', $data, true);
        return $reportList;
    }
    public function get_sales_product_id_search_report($customer_id, $supplier_id, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_sales_product_id_report($customer_id, $supplier_id, $per_page, $page);
        $product_list = $CI->Reports->customer_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Product Purchase  Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'customer_id'     => $customer_id,
            'supplier_id'     => $supplier_id,

            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/product_id_report', $data, true);
        return $reportList;
    }
    public function reorder_search_report($supplier_id, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_reorder_report($supplier_id, $per_page, $page);
        $product_list = $CI->Reports->customer_list();
        //echo '<pre>';print_r($product_report);exit();
        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Re-order level report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'supplier_id'     => $supplier_id,
            //'customer_id'     => $customer_id,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/reorder_report', $data, true);
        return $reportList;
    }

    public function get_products_search_sales_warrenty_report($from_date, $to_date, $product_id, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $product_report = $CI->Reports->retrieve_product_search_sales_warrenty_report($from_date, $to_date, $product_id, $per_page, $page);
        $product_list = $CI->Reports->product_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => display('sales_report_product_wise'),
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,
            'product_id'     => $product_id,
            'from_date'      => $from_date,
            'to_date'        => $to_date,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
        );
        $reportList = $CI->parser->parse('report/sales_warrenty_report', $data, true);
        return $reportList;
    }
    public function get_products_search_sales_cheque_report($from_date, $to_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Customers');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $customer = $CI->Customers->customer_list_ledger_cheque();
        $product_report = $CI->Reports->retrieve_product_search_sales_cheque_report($from_date, $to_date, $per_page, $page);
        $product_list = $CI->Reports->product_list();

        if (!empty($product_report)) {
            $i = 0;
            foreach ($product_report as $k => $v) {
                $i++;
                $product_report[$k]['sl'] = $i;
            }
        }
        $sub_total = 0;
        if (!empty($product_report)) {
            foreach ($product_report as $k => $v) {
                $product_report[$k]['sales_date'] = $CI->occational->dateConvert($product_report[$k]['date']);
                $sub_total = $sub_total + $product_report[$k]['total_price'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'          => 'Sales Cheque Report',
            'sub_total'      => number_format($sub_total, 2, '.', ','),
            'product_report' => $product_report,
            'product_list'   => $product_list,

            'customer_name'  => '',
            'address'        => '',
            'customer'       => $customer,
            'customer_id'    => '',
            // 'product_id'     => $product_id,
            'from_date'      => $from_date,
            'to_date'        => $to_date,
            'links'          => $links,
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'position'       => $currency_details[0]['currency_position'],
            'software_info'  => $currency_details,
            'company'        => $company_info,
        );
        echo '<pre>';
        print_r($data);
        exit();
        $reportList = $CI->parser->parse('report/sales_cheque_report', $data, true);
        return $reportList;
    }


    //Total profit report
    public function total_profit_report($links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $total_profit_report = $CI->Reports->total_profit_report();
        $total_profit_report_no_limit = $CI->Reports->total_profit_report();


        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        $profit_ammount = 0;
        $SubTotalSupAmnt = 0;
        $SubTotalSaleAmnt = 0;
        if (!empty($total_profit_report_no_limit)) {
            $i = 0;
            foreach ($total_profit_report_no_limit as $k => $v) {
                $profit_ammount = $profit_ammount + $total_profit_report_no_limit[$k]['total_profit'];
                $SubTotalSupAmnt = $SubTotalSupAmnt + $total_profit_report_no_limit[$k]['total_supplier_rate'];
                $SubTotalSaleAmnt = $SubTotalSaleAmnt + $total_profit_report_no_limit[$k]['total_sale'];
            }
        }

        if (!empty($total_profit_report)) {
            $i = 0;
            foreach ($total_profit_report as $k => $v) {
                $total_profit_report[$k]['sl'] = $i;
                $total_profit_report[$k]['prchse_date'] = $CI->occational->dateConvert($total_profit_report[$k]['date']);
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'               => display('profit_report'),
            'profit_ammount'      => number_format($profit_ammount, 2, '.', ','),
            'total_profit_report' => $total_profit_report,
            'SubTotalSupAmnt'     => number_format($SubTotalSupAmnt, 2, '.', ','),
            'SubTotalSaleAmnt'    => number_format($SubTotalSaleAmnt, 2, '.', ','),
            'links'               => $links,
            'company'             => $company_info,
            'software_info'       => $currency_details,
            'currency'            => $currency_details[0]['currency'],
            'position'            => $currency_details[0]['currency_position'],
            'outlet_list' => $outlet_list,
            'cw' => $cw,

        );
        $reportList = $CI->parser->parse('report/profit_report', $data, true);
        return $reportList;
    }

    //Retrive date wise total profit report
    public function retrieve_dateWise_profit_report($outlet_id, $start_date, $end_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $total_profit_report = $CI->Reports->retrieve_dateWise_profit_report($outlet_id, $start_date, $end_date);
        $total_profit_report_no_limit = $CI->Reports->retrieve_dateWise_profit_report($outlet_id, $start_date, $end_date);

        $outlet_list = $CI->Warehouse->get_outlet_user();

        $cw = $CI->Warehouse->branch_list_product();
        $profit_ammount = 0;
        $SubTotalSupAmnt = 0;
        $SubTotalSaleAmnt = 0;
        if (!empty($total_profit_report)) {
            $i = 0;
            foreach ($total_profit_report as $k => $v) {
                $total_profit_report[$k]['sl'] = $i;
                $total_profit_report[$k]['prchse_date'] = $CI->occational->dateConvert($total_profit_report[$k]['date']);
            }
        }

        if (!empty($total_profit_report_no_limit)) {
            $i = 0;
            foreach ($total_profit_report_no_limit as $k => $v) {
                $profit_ammount = $profit_ammount + $total_profit_report_no_limit[$k]['total_profit'];
                $SubTotalSupAmnt = $SubTotalSupAmnt + $total_profit_report_no_limit[$k]['total_supplier_rate'];
                $SubTotalSaleAmnt = $SubTotalSaleAmnt + $total_profit_report_no_limit[$k]['total_sale'];
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'              => display('profit_report'),
            'profit_ammount'     => number_format($profit_ammount, 2, '.', ','),
            'total_profit_report' => $total_profit_report,
            'SubTotalSupAmnt'    => number_format($SubTotalSupAmnt, 2, '.', ','),
            'SubTotalSaleAmnt'   => number_format($SubTotalSaleAmnt, 2, '.', ','),
            'links'              => $links,
            'company_info'       => $company_info,
            'company'             => $company_info,
            'software_info'       => $currency_details,
            'currency'           => $currency_details[0]['currency'],
            'position'           => $currency_details[0]['currency_position'],
            'outlet_list' => $outlet_list,
            'cw' => $cw,
        );
        $reportList = $CI->parser->parse('report/profit_report', $data, true);
        return $reportList;
    }
    // ==================================== Shippin cost report ===================
    public function retrieve_dateWise_shippingcost($from_date, $to_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');

        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $outlet_id = $outlet_list[0]['outlet_id'];
        if (!$outlet_id) {
            $outlet_id = $this->input->get('outlet_id');
        }
        $sales_report = $CI->Reports->retrieve_dateWise_Shippingcost($from_date, $to_date, $outlet_id);
        $sales_amount = 0;
        
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'        => display('shipping_cost_report'),
            'sales_amount' => $sales_amount,
            'sales_report' => $sales_report,
            'company_info' => $company_info,
            'from_date'    => $from_date,
            'to_date'      => $to_date,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'currency'     => $currency_details[0]['currency'],
            'position'     => $currency_details[0]['currency_position'],
            'links'        => $links,
            'software_info' => $currency_details,
            'company'       => $company_info,
        );
        $reportList = $CI->parser->parse('report/shippincost_report', $data, true);
        return $reportList;
    }
    //Daily Summary Report
    public function daily_summary_report($from_date)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_id = null;
        $outlet_list = $CI->Warehouse->get_outlet_user();
        
        if($outlet_list)
        {
            $outlet_id = $outlet_list[0]['outlet_id'];
        }
        
        $cw = $CI->Warehouse->branch_list_product();
        $sales_report = $CI->Reports->daily_summary_report($from_date, $outlet_id);
       
        
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'        => display('shipping_cost_report'),
            'sales_report' => $sales_report,
            'company_info' => $company_info,
            'from_date'    => $from_date,
            'cw' => $cw,
            'outlet_list' => $outlet_list,
            'currency'     => $currency_details[0]['currency'],
            'position'     => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'       => $company_info,
        );
        // echo "<pre>";
        // print_r($data);
        // exit();
        $reportList = $CI->parser->parse('report/daily_summary_report', $data, true);
        return $reportList;
    }
    //sales return report
    public function sales_return_data($links, $perpage, $page, $start, $end)
    {

        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $outlet_id = $this->input->post('outlet_id');


        $return_list = $CI->Reports->sales_return_list(null, null, $start, $end, $outlet_id);
        if (!empty($return_list)) {
            foreach ($return_list as $k => $v) {
                $return_list[$k]['final_date'] = $CI->occational->dateConvert($return_list[$k]['date_return']);
            }
            $i = 0;
            if (!empty($return_list)) {
                foreach ($return_list as $k => $v) {
                    $i++;
                    $return_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'      => display('invoice_return'),
            'return_list' => $return_list,
            'company'    => $company_info,
            'links'      => $links,
            'from_date'  => $start,
            'to_date'    => $end,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'software_info' => $currency_details,
            'currency'   => $currency_details[0]['currency'],
            'position'   => $currency_details[0]['currency_position'],
        );
        $returnList = $CI->parser->parse('report/sales_return', $data, true);
        return $returnList;
    }
    // supplier return report
    public function supplier_return_data($links, $perpage, $page, $start, $end)
    {

        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('Warehouse');
        $outlet_list = $CI->Warehouse->get_outlet_user();
        $cw = $CI->Warehouse->branch_list_product();
        $outlet_id = $this->input->get('outlet_id');


        $return_list = $CI->Reports->supplier_return(null, null, $start, $end, $outlet_id);
        if (!empty($return_list)) {
            foreach ($return_list as $k => $v) {
                $return_list[$k]['final_date'] = $CI->occational->dateConvert($return_list[$k]['date_return']);
            }
            $i = 0;
            if (!empty($return_list)) {
                foreach ($return_list as $k => $v) {
                    $i++;
                    $return_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'       => display('supplier_return'),
            'return_list' => $return_list,
            'company'    => $company_info,
            'start_date'  => $start,
            'end_date'    => $end,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'links'       => $links,
            'software_info' => $currency_details,
            'currency'    => $currency_details[0]['currency'],
            'position'    => $currency_details[0]['currency_position'],
        );
        $returnList = $CI->parser->parse('report/supplier_return', $data, true);
        return $returnList;
    }

    // Tax report
    public function retrieve_dateWise_tax($from_date, $to_date, $links, $per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $sales_report = $CI->Reports->retrieve_dateWise_tax($from_date, $to_date, $per_page, $page);
        $sales_amount = 0;
        if (!empty($sales_report)) {
            $i = 0;
            foreach ($sales_report as $k => $v) {
                $i++;
                $sales_report[$k]['sl']         = $i;
                $sales_report[$k]['sales_date'] = $CI->occational->dateConvert($sales_report[$k]['date']);
                $sales_amount = $sales_amount + $sales_report[$k]['total_amount'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'        => display('tax_report'),
            'sales_amount' => $sales_amount,
            'sales_report' => $sales_report,
            'company_info' => $company_info,
            'from_date'    => $from_date,
            'to_date'      => $to_date,
            'currency'     => $currency_details[0]['currency'],
            'position'     => $currency_details[0]['currency_position'],
            'links'        => $links,
            'software_info' => $currency_details,
            'company'      => $company_info,
        );
        $reportList = $CI->parser->parse('report/tax_report', $data, true);
        return $reportList;
    }


    //money receipt report
    public function retrieve_money_receipt()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $mr_data = $CI->Reports->retrieve_money_receipt();
        if (!empty($mr_data)) {
            $i = 0;
            foreach ($mr_data as $k => $v) {
                $i++;
                $mr_data[$k]['date'] = $CI->occational->dateConvert($mr_data[$k]['date']);
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'        => "Money Receipt Report",
            'all_data'     => $mr_data,
            'currency'     => $currency_details[0]['currency'],
            'software_info' => $currency_details,
            'company'      => $company_info,
        );

        //echo '<pre>';print_r($data);exit();

        $reportList = $CI->parser->parse('report/money_receipt_report', $data, true);
        return $reportList;
    }

    public function retrieve_dateWise_money_receipt($from_date, $to_date)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $mr_data = $CI->Reports->retrieve_dateWise_money_receipt($from_date, $to_date);
        if (!empty($mr_data)) {
            $i = 0;
            foreach ($mr_data as $k => $v) {
                $i++;
                $mr_data[$k]['date'] = $CI->occational->dateConvert($mr_data[$k]['date']);
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Reports->retrieve_company();
        $data = array(
            'title'        => "Money Receipt Report",
            'all_data'     => $mr_data,
            'from_date'    => $from_date,
            'to_date'      => $to_date,
            'currency'     => $currency_details[0]['currency'],
            'position'     => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company'      => $company_info,
        );

        $reportList = $CI->parser->parse('report/money_receipt_report', $data, true);
        return $reportList;
    }
}
