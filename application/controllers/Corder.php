<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Corder extends CI_Controller
{

    public $order_id;

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->model('Suppliers');
        $this->load->library('auth');
    }

    //Index page load
    public function index()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lorder');
        $CI->load->model('Products');



       // die();
        $content = $this->lorder->order_list();
        $this->template->full_admin_html_view($content);
    }
    public function order_status_form($id)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lorder');
        $CI->load->model('Products');

        $content = $this->lorder->order_status($id);
        $this->template->full_admin_html_view($content);
    }

    public function CheckOrderList()
    {
        // GET data
        $this->load->model('Order');
        $postData = $this->input->post();
        $data = $this->Order->getOrderList($postData);
        echo json_encode($data);
    }

    public function update_order($id){




        $ch = curl_init();

        $url=api_url().'order/update_order/'.$id;


        $data=array(

          'id' => $id
        );
//        echo $url;
//
//        die();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// In real life you should use something like:
//        curl_setopt($ch, CURLOPT_POSTFIELDS,
//                 http_build_query($data));

// Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);

// Further processing ...
        if ($server_output == "OK") {


        } else {



        }


    }

    public function invoice_inserted_data($invoice_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lorder');
        $content = $CI->lorder->invoice_html_data_manual($invoice_id);
        $this->template->full_admin_html_view($content);
    }
    public function print_order()
    {



        if(isset($_POST['submit'])){

            if(!empty($_POST['select_check'])) {



                foreach($_POST['select_check'] as $value){

                    $data['id'][] =  $value;

                }

            }

        }
//        echo '<pre>';print_r($data);
//        exit();
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lorder');
        $content = $CI->lorder->invoice_html_data_all(json_encode($_POST['select_check']));
        $this->template->full_admin_html_view($content);
    }


}
