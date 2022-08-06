<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lorder
{
    /*
     * * Retrieve  Quize List From DB
     */


    public function order_list()
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Web_settings');
        $company_info = $CI->Products->retrieve_company();


        $url = api_url()."products/count_product";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);


        $data['total_product']    = $resp;
        $data['company_info']     = $company_info;
//        $data['records']     = $records;
//        echo '<pre>';print_r($data);exit();
        $productList = $CI->parser->parse('order/order_table', $data, true);
        return $productList;
    }

    public function order_status($id)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Reports');
        $CI->load->model('Courier');
        $company_info = $CI->Products->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $invoice_details = $CI->Invoices->retrieve_invoice_order_data($id);


        $bank_list          = $CI->Web_settings->bank_list();
        $bkash_list        = $CI->Web_settings->bkash_list();
        $nagad_list        = $CI->Web_settings->nagad_list();
        $courier_list        = $CI->Courier->get_courier_list();
        $branch_list        = $CI->Courier->get_branch_list();

        $url = api_url()."order/show/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $response=json_decode($resp);

        $url = api_url()."order/show_details/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $order_details=json_decode($resp);

        $url = api_url()."order/offline_payment/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $offline_payment=json_decode($resp);

        $url = api_url()."order/change_log/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $change_log=json_decode($resp);

        $sid=$response[0]->shipping_method;
        $url = api_url()."order/shipping_method/$sid";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $shipping_method=json_decode($resp);






       // $order_details=$response[0]->order_details;
        $shipping_address=json_decode($response[0]->shipping_address);

      //  echo '<pre>';print_r($response[0]->delivery_status);exit();

       // echo '<pre>';print_r($offline_payment);exit();
//        $data['payment_status']    = $order_details[0]->payment_status;
//        $data['delivery_status']    = $order_details[0]->delivery_status;
        $data['customer_name']    = $shipping_address->name;
        $data['email']    = $shipping_address->email;
        $data['phone']    = $shipping_address->phone;
        $data['address']    = $shipping_address->address;
        $data['thana']    = $shipping_address->thana;
        $data['division']    = $shipping_address->division;
        $data['district']    = $shipping_address->district;
        $data['country']    = $shipping_address->country;
        $data['postal_code']    = $shipping_address->postal_code;
        $data['order']    = $response;
        $data['order_details']    = $order_details;
        $data['offline_payment']    = $offline_payment;
        $data['change_log']    = $change_log;
        $data['order_id']    = $id;
        $data['shipping_method']    = $shipping_method;
        $data['company_info']     = $company_info;
        $data['bank_list']     = $bank_list;
        $data['bkash_list']     = $bkash_list;
        $data['nagad_list']     = $nagad_list;
        $data['courier_list']     = $courier_list;
        $data['branch_list']     = $branch_list;
        $data['invoice_details']     = $invoice_details;
        $data['currency']         = $currency_details[0]['currency'];

      //  echo '<pre>';print_r($invoice_details[0]['courier_name']);exit();
        $productList = $CI->parser->parse('order/order_status', $data, true);
        return $productList;
    }

    public function invoice_html_data_manual($id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $CI->load->model('Warehouse');

        $redirect_url = $_SESSION['redirect_uri'];


        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        // $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];

        $url = api_url()."order/show/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $response=json_decode($resp);

        $url = api_url()."order/show_details/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $order_details=json_decode($resp);
        $shipping_address=json_decode($response[0]->shipping_address);

        $sid=$response[0]->shipping_method;
        $url = api_url()."order/shipping_method/$sid";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $shipping_method = curl_exec($curl);
        curl_close($curl);



        $url = api_url()."order/offline_payment/$id";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $offline_payment=json_decode($resp);

        $data['customer_name']    = $shipping_address->name;
        $data['email']    = $shipping_address->email;
        $data['phone']    = $shipping_address->phone;
        $data['address']    = $shipping_address->address;
        $data['thana']    = $shipping_address->thana;
        $data['division']    = $shipping_address->division;
        $data['district']    = $shipping_address->district;
        $data['country']    = $shipping_address->country;
        $data['postal_code']    = $shipping_address->postal_code;
        $data['order']    = $response;
        $data['order_details']    = $order_details;
        $data['offline_payment']    = $offline_payment;
        $data['order_id']    = $id;
        $data['shipping_method']    = $shipping_method;
        $data['company_info']     = $company_info;
        $data['currency']         = $currency_details[0]['currency'];

        // echo '<pre>';
        // print_r($data);
        // exit();
      //  echo '<pre>';print_r($shipping_method);exit();

        $chapterList = $CI->parser->parse('order/invoice_html_manual', $data, true);

//        $chapterList = $CI->parser->parse('invoice/invoice_html_manual', $data, true);
        return $chapterList;
    }
    public function invoice_html_data_all($c_data)
    {


        $CI = &get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $CI->load->model('Warehouse');

//        $redirect_url = $_SESSION['redirect_uri'];


        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        // $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];

        $url = api_url()."order/show_all/$c_data";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $response=json_decode($resp);


        $data['order']    = $response;
        $data['company_info']     = $company_info;
        $data['currency']         = $currency_details[0]['currency'];

        // echo '<pre>';
        // print_r($data);
        // exit();
     //  echo '<pre>';print_r($data);exit();

        $chapterList = $CI->parser->parse('order/invoice_html_manual_all', $data, true);

        return $chapterList;
    }


}
