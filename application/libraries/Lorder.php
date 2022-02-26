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





        $url = "http://dev.swaponsworld.com/api/v1/products/count_product";

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
        $CI->load->model('Web_settings');
        $company_info = $CI->Products->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();



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

//        $shipping_id=$response[0]->shipping_method;
//        $url = api_url()."order/shipping_method/$shipping_id";
//
//        $curl = curl_init($url);
//        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
////for debug only!
//        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//
//        $shipping_method = curl_exec($curl);
//        curl_close($curl);






       // $order_details=$response[0]->order_details;
        $shipping_address=json_decode($response[0]->shipping_address);

      //  echo '<pre>';print_r($response[0]->delivery_status);exit();


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
        $data['order']    = $response;
        $data['company_info']     = $company_info;
        $data['currency']         = $currency_details[0]['currency'];

        //echo '<pre>';print_r($data);exit();
        $productList = $CI->parser->parse('order/order_status', $data, true);
        return $productList;
    }


}
