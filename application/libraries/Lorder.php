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

    public function order_status()
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

        $productList = $CI->parser->parse('order/order_status', $data, true);
        return $productList;
    }


}
