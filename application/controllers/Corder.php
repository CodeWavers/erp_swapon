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
    public function number_generator()
    {
        $this->db->select_max('invoice', 'invoice_no');
        $query = $this->db->get('invoice');
        $result = $query->result_array();
        $invoice_no = $result[0]['invoice_no'];
        if ($invoice_no != '') {
            $invoice_no = $invoice_no + 1;
        } else {
            $invoice_no = 1000;
        }
        return $invoice_no;
    }

    public function order_invoice(){

        //echo '<pre>';print_r($_POST);exit();
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Web_settings');
        $CI->load->model('Settings');
        $CI->load->model('Products');
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $invoice_id = $this->input->post('order_id', TRUE);
//        $invoice_id = strtoupper($invoice_id);
        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');
        //$quantity = $this->input->post('product_quantity', TRUE);
        $invoice_no_generated = $this->number_generator();

        $Vdate = $this->input->post('invoice_date', TRUE);
        //$customer_id = $this->input->post('customer_id', TRUE);


        $pay_type = $this->input->post('type', TRUE);
//        $p_amount = $this->input->post('p_amount', TRUE);
        // echo '<pre>'; print_r(count($pay_type)); exit();

        $datainv = array(
            'invoice_id'      => $invoice_id,
//            'customer_id'     => $customer_id,
//            'agg_id'     =>  (!empty($agg_id) ? $agg_id : NULL),
            'date'            => (!empty($this->input->post('invoice_date', TRUE)) ? $this->input->post('invoice_date', TRUE) : date('Y-m-d')),
            'total_amount'    => $this->input->post('grand_total', TRUE),
//            'total_tax'       => $this->input->post('total_tax', TRUE),
//            'customer_name_two'       => $this->input->post('customer_name_two', TRUE),
//            'customer_mobile_two'       => $this->input->post('customer_mobile_two', TRUE),
            'invoice'         => $invoice_no_generated,
//            'invoice_details' => (!empty($this->input->post('inva_details', TRUE)) ? $this->input->post('inva_details', TRUE) : ''),
//            'invoice_discount' => $this->input->post('invoice_discount', TRUE),
            'total_discount'  => $this->input->post('discount', TRUE),
            'paid_amount'     => $this->input->post('paid_amount', TRUE),
            'due_amount'      => $this->input->post('due_amount', TRUE),
//            'prevous_due'     => $this->input->post('previous', TRUE),
            'shipping_cost'   => $this->input->post('shipping_cost', TRUE),
            'outlet_id'       =>  'OpSoxJvBbbS8Rws',
//            'condition_cost'   => $this->input->post('condition_cost', TRUE),
//            'commission'   => $this->input->post('commission', TRUE),
            'sale_type'   => 2,
//            'courier_condtion'   => $this->input->post('courier_condtion', TRUE),
            'sales_by'        => $createby,
            'status'          => 2,
            // 'payment_type'    =>  $this->input->post('paytype',TRUE),
//            'delivery_type'    =>  $delivery_type,
            // 'bank_id'         => (!empty($this->input->post('bank_id', TRUE)) ? $this->input->post('bank_id', TRUE) : null),
            // 'bkash_id'         => (!empty($this->input->post('bkash_id', TRUE)) ? $this->input->post('bkash_id', TRUE) : null),
            // 'nagad_id'         => (!empty($this->input->post('nagad_id', TRUE)) ? $this->input->post('nagad_id', TRUE) : null),
//            'courier_status'      => 1,

        );


        // echo '<pre>'; print_r($datainv); exit();
        $this->db->insert('invoice', $datainv);

        $quantity                = $this->input->post('quantity', TRUE);
        $rate                = $this->input->post('price', TRUE);
        $p_id                = $this->input->post('product_id', TRUE);
        $total_amount        = $this->input->post('total_price', TRUE);
       // $discount_rate       = $this->input->post('discount_amount', TRUE);
      // $discount_per        = $this->input->post('discount', TRUE);
      // $commission_per        = $this->input->post('comm', TRUE);
        // $tax_amount          = $this->input->post('tax',TRUE);
       // $invoice_description = $this->input->post('desc', TRUE);
       // $serial_n            = $this->input->post('serial_no', TRUE);
        // $warehouse           =$this->input->post('warehouse',TRUE);
      //  $warrenty            = $this->input->post('warrenty_date', TRUE);
        // $expiry            = $this->input->post('expiry_date', TRUE);


        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            // $war=$warehouse[$i];
            // $warrenty_date = $warrenty[$i];
            // $expiry_date = $expiry[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $total_amount[$i];
            $supplier_rate = $this->supplier_price($product_id);
           // $discount = is_numeric($product_quantity) * is_numeric($product_rate) * is_numeric($disper) / 100;
            // $tax = $tax_amount[$i];
            // $description = $invoice_description[$i];

            $data1 = array(
                'invoice_details_id' => date('Ymdhs'),
                'invoice_id'         => $invoice_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'description'        => 'Order Sales',
                // 'tax'                => $tax,
                'supplier_rate'      => $supplier_rate,
                'total_price'        => $total_price,
                'status'             => 2
            );


            if (!empty($quantity)) {
                //echo '<pre>';print_r($data1);exit();
                $this->db->insert('invoice_details', $data1);
                //$this->db->insert('product_purchase_details', $data2);
                // $this->db->insert('product_purchase_details', $data2);
            }
        }
    }

    public function supplier_price($product_id)
    {
        $this->db->select('supplier_price');
        $this->db->from('supplier_product');
        $this->db->where(array('product_id' => $product_id));
        $supplier_product = $this->db->get()->row();


        $this->db->select('Avg(rate) as supplier_price');
        $this->db->from('product_purchase_details');
        $this->db->where(array('product_id' => $product_id));
        $purchasedetails = $this->db->get()->row();
        $price = (!empty($purchasedetails->supplier_price) ? $purchasedetails->supplier_price : $supplier_product->supplier_price);

        return (!empty($price) ? $price : 0);
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
