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
    public function order_status_form()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lorder');
        $CI->load->model('Products');

        $content = $this->lorder->order_status();
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


}
