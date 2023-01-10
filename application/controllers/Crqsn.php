<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Crqsn extends CI_Controller
{

    public $menu;

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lrqsn');
        $this->load->library('session');
        $this->load->model('Rqsn');
        $this->auth->check_admin_auth();
    }

    //Default loading for service system.
    public function index()
    {
        $content = $this->lrqsn->rqsn_add_form();
        $this->template->full_admin_html_view($content);
    }



    public function rqsn_form()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lrqsn');
        $content = $CI->lrqsn->rqsn_add_form();
        $this->template->full_admin_html_view($content);
    }

    public function pr_rqsn_form()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lrqsn');
        $content = $CI->lrqsn->pr_rqsn_add_form();
        $this->template->full_admin_html_view($content);
    }

    public function transfer_form()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lrqsn');
        $content = $CI->lrqsn->transfer_add_form();
        $this->template->full_admin_html_view($content);
    }

    public function return_products()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lrqsn');
        $content = $CI->lrqsn->return_products_form();
        $this->template->full_admin_html_view($content);
    }

    public function cw_purchase()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lrqsn');
        $content = $CI->lrqsn->purchase_rqsn_form();
        $this->template->full_admin_html_view($content);
    }

    public function insert_rqsn()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Rqsn');

        $rqsn = $CI->Rqsn->rqsn_entry();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Crqsn/rqsn_form'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Crqsn/rqsn_form'));
        }
    }
    public function insert_transfer()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Rqsn');

        $rqsn = $CI->Rqsn->transfer_entry();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Crqsn/transfer_form'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Crqsn/transfer_form'));
        }
    }

    public function insert_rqsn_pr()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Rqsn');

        $rqsn = $CI->Rqsn->pr_rqsn_entry();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Crqsn/pr_rqsn_form'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Crqsn/pr_rqsn_form'));
        }
    }

    public function insert_rqsn_cw()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Rqsn');

        $rqsn = $CI->Rqsn->rqsn_entry_cw();



        // echo "ok";
        // exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Crqsn/cw_purchase'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Crqsn/cw_purchase'));
        }
    }

    //Aprove voucher
    public function aprove_rqsn()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $CI->load->model('Reports');
        $data['title'] = 'Approve Requisition';
        $data['t'] = $this->Rqsn->approve_rqsn();
        //$data['t'] = $this->Reports->getCheckList_rqsn();
        // $data = $this->Reports->getCheckLi st_rqsn();


        //  echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('rqsn/rqsn_approve', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function aprove_rqsn_outlet()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $CI->load->model('Reports');
        $data['title'] = 'Approve Requisition';
        $data['t'] = $this->Rqsn->approve_rqsn_outlet();
        //$data['t'] = $this->Reports->getCheckList_rqsn();
        // $data = $this->Reports->getCheckLi st_rqsn();


        //  echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('rqsn/outlet_rqsn_approve', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function admin_approve_rqsn_cw($rqsn_id)
    {
        $CI = &get_instance();
        $CI->load->model('Invoices');
        $this->auth->check_admin_auth();

        $invoice_id = $CI->Invoices->generator(10);


        $datarq = array(


            'purchase_id'    => $invoice_id,
            'supplier_id'   => $this->input->post('supplier_id', true),
            // 'total' => $this->input->post('total', true),
            'purchase_date' => date('Y-m-d'),
            'total_discount' => $this->input->post('discount', true),
            'grand_total_amount' => $this->input->post('grand_total_price', true),
            'paid_amount' => $this->input->post('paid_amount', true),
            'due_amount' => $this->input->post('due_amount', true),
        );
        //        $datarq = array(
        //            'rqsn_id'     => 1,
        //            'date'            => '22/1/2012',
        //            'details'         => 'Regs',
        //            'from_id'=> 'abc',
        //            'to_id'  =>'765t',
        //            'status'   => 1,
        //        );

        //  echo '<pre>';print_r($datarq);exit();
        // $this->db->insert('product_purchase', $datarq);


        $this->db->set('status', 4);
        $this->db->where('rqsn_id', $rqsn_id);
        $this->db->update('rqsn');


        // $price             = $this->input->post('product_rate', true);
        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        // $unit             = $this->input->post('unit', true);
        $stock             = $this->input->post('stock', true);
        $warrenty_date             = $this->input->post('warrenty_date', true);
        $expiry_date             = $this->input->post('expired_date', true);
        $item_total             = $this->input->post('total_price', true);
        $rqsn_details_id             = $this->input->post('rqsn_detail_id', true);
        // $unit             = $this->input->post('unit', true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            // $un  = $unit[$i];
            $product_id   = $p_id[$i];
            // $rate = $price[$i];
            // $stk = $stock[$i];
            // $item_warr = $warrenty_date[$i];
            // $item_expr = $expiry_date[$i];
            $per_item_total = $item_total[$i];
            $item_rqsn_details_id = $rqsn_details_id[$i];



            $rqsn_details = array(
                // 'rqsn_id'           => $rqsn_id,
                // 'purchase_detail_id'      =>  $CI->Invoices->generator(15),
                // 'rqsn_details_id'          =>  $item_rqsn_details_id,
                'product_id'             => $product_id,
                'quantity'                => $qty,
                // 'rate'                => $rate,
                // 'item_total'          => $per_item_total,
                // 'warrenty_date'          => $item_warr,
                // 'expired_date'           => $item_expr,
                // 'unit'                => $un,
                'status'                => 1,

            );
            if (!empty($quantity)) {
                $this->db->where('rqsn_detail_id', $item_rqsn_details_id);
                $this->db->insert('rqsn_details', $rqsn_details);
            }
        }

        redirect(base_url('Crqsn/aprove_rqsn_purchase'));
    }


    public function product_is_received($rqsn_detail_id)
    {
        $this->db->where('rqsn_detail_id', $rqsn_detail_id);
        $this->db->set('status', 3);
        $this->db->update('rqsn_details');

        $this->db->where('rqsn_details_id', $rqsn_detail_id);
        $this->db->set('status', 2);
        $this->db->update('product_purchase_details');

        redirect(base_url('Crqsn/aprove_chalan'));
    }

    public function aprove_chalan()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $data['title'] = 'Chalan Approve';
        $data['aprrove'] = $this->Rqsn->approve_chalan();

        // echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('rqsn/approve_chalan', $data, true);
        $this->template->full_admin_html_view($content);
    }


    public function rqsn_list()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $data['title'] = 'Requisition List';
        $data['aprrove'] = $this->Rqsn->rqsn_list();

        //echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('rqsn/rqsn_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function rqsn_list_outlet()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $data['title'] = 'Stock Transferred Outlet';
        $data['aprrove'] = $this->Rqsn->rqsn_list_outlet();

        //echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('rqsn/rqsn_list_outlet', $data, true);
        $this->template->full_admin_html_view($content);
    }



    public function aprove_rqsn_purchase()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $data['title'] = 'Approve Requisition CW';
        $data['aprrove'] = $this->Rqsn->approve_rqsn_purchase();

        //echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('rqsn/rqsn_approve_purchase', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function rqsn_approval_edit($rqsn_id)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();

        $CI->load->model('Rqsn');

        $info =  $CI->Rqsn->rqsn_approval_edit_data($rqsn_id);

        $i = 0;
        foreach ($info as $k => $v) {
            $i++;
            $info[$k]['sl'] = $i;
        }

        // echo '<pre>';
        // var_dump($info);
        // exit();

        $data = array(
            'title'   => 'View Requisition',
            'info'     => $info
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $content = $this->parser->parse('rqsn/rqsn_approval_edit', $data, true);
        $this->template->full_admin_html_view($content);
    }



    public function outlet_approve()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $data['title'] = 'Outlet Approve';
        $data['t'] = $this->Rqsn->approve_outlet();


        $content = $this->parser->parse('rqsn/rqsn_approve_outlet', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function return_rcv()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $data['title'] = 'Return Receive';
        $data['t'] = $this->Rqsn->return_rcv();


        $content = $this->parser->parse('rqsn/return_rcv', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function isactive($id = null, $action = null, $value = null)
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $action = ($action == 'active' ? 2 : 1);
        $postData = array(
            'rqsn_detail_id'     => $id,
            'a_qty' => $value,
            'status' => $action,
            'isaprv' => 1,
            'iscw' => 1
        );

        //        print_r($postData);
        //        die();

        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';

        if ($this->Rqsn->approved($postData)) {
            $this->session->set_flashdata('message', display('successfully_approved'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function ischalan($id = null, $action = null, $value = null)
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $action = ($action == 'active' ? 1 : 2);
        $expiry_date = date('Y-m-d', strtotime(' +7 day'));
        $postData = array(
            'chalan_id'     => $id,
            'barcode' => $value,
            'expired_date' => $expiry_date,
            'status' => $action
        );

        //        print_r($postData);
        //        die();

        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';

        if ($this->Rqsn->chalan_received($postData)) {
            $this->session->set_flashdata('message', display('successfully_approved'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function isapporve_purchase($id = null, $action = null, $value = null)
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $action = ($action == 'active' ? 4 : 1);
        $postData = array(
            'rqsn_detail_id'     => $id,
            'a_qty' => $value,
            'status' => $action
        );

        //        print_r($postData);
        //        die();

        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';

        if ($this->Rqsn->approved($postData)) {
            $this->session->set_flashdata('message', display('successfully_approved'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function rqsn_delete($rqsn_id)
    {
        if ($this->Rqsn->delete_rqsn($rqsn_id)) {
            $this->session->set_flashdata('message', display('successfully_delete'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    public function r_rqsn_delete($rqsn_id)
    {
        if ($this->Rqsn->r_delete_rqsn($rqsn_id)) {
            $this->session->set_flashdata('message', display('successfully_delete'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    public function isreceive($id = null, $action = null)
    {
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $user_id = $this->session->userdata('user_id');
        $Vdate=date('Y-m-d');
        $action = ($action == 'active' ? 3 : 2);
        $postData = array(
            'rqsn_detail_id'     => $id,
            'status' => $action,
            'isrcv' => 1
        );

        $item_total=$this->db->select('item_total')->from('rqsn_details')->where('rqsn_detail_id',$id)->get()->row()->item_total;

        //        print_r($postData);
        //        die();
        //Income Credit

        if ($item_total > 0){


        $incCr = array(
            'VNo'            =>  $id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  306,
            'Narration'      =>  'Income For ID -  ' . $id ,
            'Credit'          =>  (!empty($item_total) ? $item_total: 0),
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $incCr);
             //Current Asset Receivable
        $curDr = array(
            'VNo'            =>  $id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  1020303,
            'Narration'      =>  'Receivable For ID -  ' . $id ,
            'Credit'          =>  0,
            'Debit'         =>  (!empty($item_total) ? $item_total: 0),
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $curDr);
        //Current Liabilties Payable
        $curLCr = array(
            'VNo'            =>  $id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  50201,
            'Narration'      =>  'Payable For  ID -  '  . $id,
            'Credit'          =>  (!empty($item_total) ? $item_total: 0),
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $curLCr);
        //Expense Debit
        $exDr = array(
            'VNo'            =>  $id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  408,
            'Narration'      =>  'Expense For ID -  ' . $id,
            'Credit'          => 0,
            'Debit'         =>  (!empty($item_total) ? $item_total: 0),
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $exDr);
        }

        if ($this->Rqsn->received($postData)) {
            $this->session->set_flashdata('message', display('successfully_approved'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function isreceiveall()
    {
        
        $rqsn_ids = $this->input->post('rqsn_ids', true);
        // echo "<pre>";
        // print_r($rqsn_ids);
        // exit();
        $CI = &get_instance();
        $CI->load->model('Rqsn');
        $user_id = $this->session->userdata('user_id');
        $Vdate=date('Y-m-d');
        // $action = ($action == 'active' ? 3 : 2);
        $action = 3;
        foreach ($rqsn_ids as $rqsn_id) {
        $postData = array(
            'rqsn_detail_id'     => $rqsn_id,
            'status' => $action,
            'isrcv' => 1
        );

        $item_total=$this->db->select('item_total')->from('rqsn_details')->where('rqsn_detail_id',$rqsn_id)->get()->row()->item_total;
        //Income Credit
        // echo "<pre>";
        // print_r($item_total);
        // exit();
        if ($item_total > 0){


        $incCr = array(
            'VNo'            =>  $rqsn_id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  306,
            'Narration'      =>  'Income For ID -  ' . $rqsn_id ,
            'Credit'          =>  (!empty($item_total) ? $item_total: 0),
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $incCr);
             //Current Asset Receivable
        $curDr = array(
            'VNo'            =>  $rqsn_id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  1020303,
            'Narration'      =>  'Receivable For ID -  ' . $rqsn_id ,
            'Credit'          =>  0,
            'Debit'         =>  (!empty($item_total) ? $item_total: 0),
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $curDr);
        //Current Liabilties Payable
        $curLCr = array(
            'VNo'            =>  $rqsn_id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  50201,
            'Narration'      =>  'Payable For  ID -  '  . $rqsn_id,
            'Credit'          =>  (!empty($item_total) ? $item_total: 0),
            'Debit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $curLCr);
        //Expense Debit
        $exDr = array(
            'VNo'            =>  $rqsn_id,
            'Vtype'          =>  'RQSN',
            'VDate'          =>  $Vdate,
            'COAID'          =>  408,
            'Narration'      =>  'Expense For ID -  ' . $rqsn_id,
            'Credit'          => 0,
            'Debit'         =>  (!empty($item_total) ? $item_total: 0),
            'IsPosted'       =>  1,
            'CreateBy'       => $user_id,
            'CreateDate'     => $Vdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $exDr);
        }


        $this->db->where('rqsn_detail_id', $rqsn_id)
            ->update('rqsn_details', $postData);
    }
    // echo true;

        // if ($this->Rqsn->received($postData)) {
            $this->session->set_flashdata('message', display('successfully_approved'));
            $data = [
                'result' => 1,
                'msg' => 'successfully_approved',
            ];
            echo json_encode($data);
    
           
        // } else {
            // $this->session->set_flashdata('error_message', display('please_try_again'));
        // }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function outlet_rqsn_delete($rqsn_id)
    {
        if ($this->Rqsn->delete_rqsn($rqsn_id)) {
            $this->session->set_flashdata('message', display('successfully_delete'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function stock()
    {

        //   echo 'Okay';die();

        $content = $this->lrqsn->stock_report_outlet_item();
        // echo 'Okay';die();
        $this->template->full_admin_html_view($content);
    }

    public function outlet_stock()
    {
        $this->load->model('Rqsn');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $value = $this->input->post('value');
        $postData = $this->input->post();
        $data = $this->Rqsn->outlet_stock($postData,null,$from_date,$to_date,$value);
        echo json_encode($data);
    }

    public function rqsn_report()
    {
        $CI = &get_instance();
        $CI->load->library('lrqsn');
        $content = $this->lrqsn->rqsn_report_form();
        $this->template->full_admin_html_view($content);
    }

    public function view_purchase_rqsn($rqsn_id)
    {
        $CI = &get_instance();
        $CI->load->library('lrqsn');
        $content = $this->lrqsn->view_purchase_rqsn_form($rqsn_id);
        $this->template->full_admin_html_view($content);
    }

    public function outlet_rqsn_report()
    {
        $CI = &get_instance();
        $CI->load->library('lrqsn');
        $content = $this->lrqsn->outlet_rqsn_report_form();
        $this->template->full_admin_html_view($content);
    }

    public function view_outlet_rqsn($rqsn_id)
    {
        $CI = &get_instance();
        $CI->load->library('lrqsn');
        $content = $this->lrqsn->view_outlet_rqsn_form($rqsn_id);
        $this->template->full_admin_html_view($content);
    }

    public function outlet_stock_entry()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Purchases');
        $outlet_list = $CI->Warehouse->branch_list_product();

        $query = $this->db->select('*')
            ->from('product_information a')
            ->join('product_category x', 'x.category_id = a.category_id', 'left')
            ->join('product_type d', 'd.ptype_id = a.ptype_id', 'left')
            ->join('color_list f', 'f.color_id = a.color', 'left')
            ->join('size_list s', 's.size_id = a.size', 'left')
            ->get();

        $res = $query->result_array();

        $sl = 1;
        foreach ($res as $k => $v) {
            $res[$k]['sl']  = $sl;
            $res[$k]['pr_qty'] = $CI->Purchases->get_pr_qty($res[$k]['product_id'])[0]['pr_qty'];
            $sl++;
        }

        $data = array(
            'title'     => 'Outlet Stock Entry',
            'product_list'  => $res,
            'outlet_lis'    => $outlet_list,
        );

        // echo '<pre>';
        // print_r($data);
        // exit();

        $view = $this->parser->parse('rqsn/outlet_stock_entry_form', $data, true);
        $this->template->full_admin_html_view($view);
    }

    public function save_outlet_stock()
    {
        $rqsn_id = mt_rand();

        $date = date('Y-m-d');

        $data1 = array(
            'rqsn_id'   => $rqsn_id,
            'from_id'      => $this->input->post('outlet_id', TRUE),
            'to_id'        => 'HK7TGDT69VFMXB7',
            'date'      => $date,
            'details'   => 'Outlet Opening Inventory',
            'status'    => 1
        );

        $this->db->insert('rqsn', $data1);

        $product_id = $this->input->post('product_id', TRUE);
        $quantity = $this->input->post('qty', TRUE);

        for ($i = 0; $i < count($product_id); $i++) {
            $pr_id = $product_id[$i];
            $qty = $quantity[$i];

            $data2 = array(
                'rqsn_detail_id'    => mt_rand(),
                'rqsn_id'           => $rqsn_id,
                'product_id'        => $pr_id,
                'quantity'          => $qty,
                'a_qty'             => $qty,
                'status'            => 3,
                'isaprv'            => 1,
                'isrcv'             => 1,
                'iscw'              => 1
            );

            if (!empty($qty)) {
                $this->db->insert('rqsn_details', $data2);
            }
        }

        redirect(base_url('Creport'));
    }


    public function production_list()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lrqsn');
        $content = $CI->lrqsn->production_list_from_rqsn();
        $this->template->full_admin_html_view($content);
    }

    public function item_finalize()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lrqsn');
        $content = $CI->lrqsn->item_list_finalize();
        $this->template->full_admin_html_view($content);
    }

    public function update_pr_rqsn()
    {
        $product_id=$_POST["product_id"];
        $rq_d_id=$_POST["rq_d_id"];

        $exist_fq = $this->db->select('finished_qty')->from('pr_rqsn_details')->where('product_id',$product_id)->get()->row();


        $data = array(
            "cutting"  => $_POST["cutting"],
            "printing"  => $_POST["printing"],
            "sewing"  => $_POST["sewing"],
            "finishing"  => $_POST["finishing"],
            "finished_qty"  => $_POST["finishing"]+$exist_fq,
            "last_updated"  => date('Y-m-d'),
            "isrcv"  => '',
        );


        $this->db->where('product_id', $product_id);
        $this->db->update('pr_rqsn_details',$data);

        //            $sq = "UPDATE rqsn_details
        //            SET purchase_status = 2
        //            WHERE rqsn_detail_id = ".$product_id.";";
        //
        //            $this->db->query($sq);



        json_encode($data);
    }

    public function update_item_finalize()
    {
        $product_id=$_POST["product_id"];
        $variation=$_POST["variation"];

        $data = array(
            "quantity"  => $_POST["quantity"],
            "last_updated"  => date('Y-m-d'),
            "isaprv"  => '1',
        );


        $this->db->where(array('product_id'=> $product_id));
        $this->db->update('pr_rqsn_details',$data);

        //            $sq = "UPDATE rqsn_details
        //            SET purchase_status = 2
        //            WHERE rqsn_detail_id = ".$product_id.";";
        //
        //            $this->db->query($sq);



        json_encode($data);
    }

}
