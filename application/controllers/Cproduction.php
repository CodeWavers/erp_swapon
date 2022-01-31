<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cproduction extends CI_Controller
{

    public $menu;
    public $production_id;

    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lproduction');
        $this->load->library('session');
        $this->load->model('Production');
        $this->auth->check_admin_auth();
    }

    //Default loading for service system.
    public function index()
    {
        $content = $this->lproduction->rqsn_add_form();
        $this->template->full_admin_html_view($content);
    }
    public function autocompleteprsearch()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $product_name   = $this->input->post('product_name', TRUE);
        $product_info   = $CI->Production->autocompletprdata($product_name);

        if (!empty($product_info)) {
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label' => $value['product_name'], 'value' => $value['product_id']);
            }
        } else {
            $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    public function autocompleteproductsearch()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $product_name   = $this->input->post('product_name', TRUE);
        $product_info   = $CI->Production->autocompletproductdata($product_name);

        if (!empty($product_info)) {
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label' => $value['product_name'] . '(' . $value['product_model'] . ')', 'value' => $value['product_id']);
            }
        } else {
            $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    public function autocompleteproductsearchtransfer()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $product_name   = $this->input->post('product_name', TRUE);
        $product_info   = $CI->Production->autocompletproducttransfer($product_name);

        if (!empty($product_info)) {
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label' => $value['product_name'], 'value' => $value['product_id']);
            }
        } else {
            $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    public function autocompleteitemsearch()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $product_name   = $this->input->post('item_name', TRUE);
        $product_info   = $CI->Production->autocompletitemdata($product_name);

        if (!empty($product_info)) {
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label' => $value['product_name'], 'value' => $value['product_id']);
            }
        } else {
            $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    public function autocompletetoolssearch()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $product_name   = $this->input->post('item_name', TRUE);
        $product_info   = $CI->Production->autocomplettoolsdata($product_name);

        if (!empty($product_info)) {
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label' => $value['product_name'], 'value' => $value['product_id']);
            }
        } else {
            $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    public function retrieve_product_data_inv()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $product_id = $this->input->post('product_id', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);


        $product_info = $CI->Production->get_total_product_invoic($product_id, $customer_id);
        // echo '<pre>';
        // print_r($product_info);
        // exit();

        echo json_encode($product_info);
    }

    public function retrieve_product_data_production()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $product_id = $this->input->post('product_id', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);

        $all_pr_id = json_decode(stripslashes($this->input->post('all_pr_id', TRUE)));


        // echo '<pre>';

        // print_r($available_quantity);
        // exit();

        $this->db->select('SUM(a.quantity) as req_qty, c.product_name')
            ->from('production_mix_details a')
            ->join('production_mix b', 'b.production_id = a.production_id')
            ->group_start()
            ->where('b.product_id', $all_pr_id[0]);
        foreach ($all_pr_id as $k => $v) {
            // print_r($k);
            if ($k != 0) {
                $this->db->or_where('b.product_id', $v);
            }
        }

        $raw_list = $this->db->group_end()
            ->join('product_information c', 'c.product_id = a.item_id')
            ->group_by('a.item_id')
            ->where('c.finished_raw', 2)
            ->get()
            ->result_array();

        $this->db->select('SUM(a.quantity) as req_qty, c.product_name')
            ->from('production_mix_details a')
            ->join('production_mix b', 'b.production_id = a.production_id')
            ->group_start()
            ->where('b.product_id', $all_pr_id[0]);
        foreach ($all_pr_id as $k => $v) {
            // print_r($k);
            if ($k != 0) {
                $this->db->or_where('b.product_id', $v);
            }
        }

        $tools_list = $this->db->group_end()
            ->join('product_information c', 'c.product_id = a.item_id')
            ->group_by('a.item_id')
            ->where('c.finished_raw', 3)
            ->get()
            ->result_array();

        // echo '<pre>';

        // print_r($raw_list);
        // print_r($tools_list);
        // exit();

        $raw_html = '';
        $sl = 0;

        $raw_html .= '<h4>Materials:</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead>
                    <th>SL</th>
                    <th>Item Name</th>
                    <th>Quantity Per Item</th>
                </thead>
                <tbody>';

        foreach ($raw_list as $raw) {
            $sl++;
            $raw_html .= '<tr>
                    <td>' . $sl . '</td>
                    <td>' . $raw['product_name'] . '</td>
                    <td>' . $raw['req_qty'] . '</td>
                </tr>';
        }

        $raw_html .= '</tbody>
            </table>
        </div>';

        $tool_html = '';
        $sl = 0;

        $tool_html .= '<h4>Tools:</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-light">
                <thead>
                    <th>SL</th>
                    <th>Item Name</th>
                    <th>Quantity Per Item</th>
                </thead>
                <tbody>';

        foreach ($tools_list as $tool) {
            $sl++;
            $tool_html .= '<tr>
                            <td>' . $sl . '</td>
                            <td>' . $tool['product_name'] . '</td>
                            <td>' . $tool['req_qty'] . '</td>
                        </tr>';
        }

        $tool_html .= '</tbody>
            </table>
        </div>';

        $product_info = $CI->Production->get_total_product_production($product_id, $customer_id);

        $data = array(
            'product_info' => $product_info,
            'raw_html'     => $raw_html,
            'tool_html'     => $tool_html,
        );

        // print_r($data);
        // exit();

        echo json_encode($data);
    }
    public function retrieve_product_data_production_transfer()
    {

        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Reports');
        $user_id = $this->session->userdata('user_id');

        $outlet_id = $this->input->post('outlet_id', TRUE);
        $product_id = $this->input->post('product_id', TRUE);
        $customer_id = $this->input->post('customer_id', TRUE);



        $this->db->select('a.*');
        $this->db->from('product_information a');
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));
        $product_information = $this->db->get()->row();


        $available_quantity = $this->Reports->current_stock($product_id,1);

        $rqsn_quantity=$this->db->select('*')->from('pr_rqsn_details')->where('product_id',$product_id)->get()->row();
        $rcv_qty=$this->db->select('SUM(quantity) as rcv_qty')->from('production_goods')->where('product_id',$product_id)->get()->row()->rcv_qty;

        $qty= $rqsn_quantity->isrcv == 1 ? 0 : $rqsn_quantity->finished_qty;

        $quantity=$qty-$rcv_qty;


        $data2['supplier_price'] = 0;

        $data2['customer_id'] = $customer_id;
        $data2['stock']     = ($available_quantity ? $available_quantity : 0);
        $data2['quantity']     = ($quantity ? $quantity : 0);

        $data2['price']          = $product_information->price;
        $data2['supplier_id']    = '';


        $data2['unit']           = $product_information->unit;

        echo json_encode($data2) ;
    }




    public function production_mix()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduction');
        $content = $CI->lproduction->production_mix_form();
        $this->template->full_admin_html_view($content);
    }

    public function manage_production_mix()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Production');

        $production_mix_list = $CI->Production->get_prdoduction_mix_list();

        $data = [
            'title'     => 'Manage Production Mix',
            'mix_list'  => $production_mix_list,

        ];

        $view = $CI->parser->parse('production/manage_production_mix_form', $data, true);
        $this->template->full_admin_html_view($view);
    }

    public function edit_production_mix($production_mix_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Production');
        $production_mix_details = $CI->Production->get_prdocution_mix_details($production_mix_id);

        $raw_mat = [];
        $tools_list = [];

        foreach ($production_mix_details as $k => $v) {
            if ($production_mix_details[$k]['pr_status'] == 2) {
                array_push($raw_mat, $production_mix_details[$k]);
            } elseif ($production_mix_details[$k]['pr_status'] == 3) {
                array_push($tools_list, $production_mix_details[$k]);
            }
        }

        $raw_mat_total = array_sum(array_column($raw_mat, "rate"));
        $tools_total = array_sum(array_column($tools_list, "rate"));

        // echo '<pre>';
        // print_r($production_mix_details);
        // exit();
        $data = [
            "isedit" => 1,
            "raw_mat"  => $raw_mat,
            "raw_mat_total"     => number_format($raw_mat_total, 2, '.', ''),
            "tools_total"     => number_format($tools_total, 2, '.', ''),
            "tools_list"    => $tools_list,
            "base_pr_details" => $production_mix_details[0]['base_pr_details'],
            "base_pr_id"    => $production_mix_details[0]['product_id'],
            "base_date"     => $production_mix_details[0]['base_date'],
            "base_total"     => $production_mix_details[0]['base_total'],
            "base_grand_total"     => $production_mix_details[0]['base_grand_total'],
            "production_id"     => $production_mix_details[0]['base_mix_id'],
            "additional_charge" => $production_mix_details[0]['additional_charge'],
            "labour_charge" => $production_mix_details[0]['labour_charge'],
            "remark"     => $production_mix_details[0]['remark'],
        ];
        // print_r($data);
        // exit();

        $view = $CI->parser->parse('production/production_mix_form', $data, true);
        $this->template->full_admin_html_view($view);
    }

    public function update_mix()
    {
        // echo '<pre>';
        // print_r($_POST);
        // exit();
        $this->load->model('Web_settings');
        $production_id = $this->input->post('production_mix_id', true);

        //    echo "Ok";exit();

        //Data inserting into invoice table
        $datarq = array(
            'product_id'    => $this->input->post('product_id', true),
            'total'    => $this->input->post('total', true),
            'grand_total'    => $this->input->post('grand_total', true),
            'date'            => (!empty($this->input->post('invoice_date', true)) ? $this->input->post('invoice_date', true) : date('Y-m-d')),
            'remark'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Product Mix'),
            'additional_charge' => $this->input->post('charge', true),
            'labour_charge'     => $this->input->post('labor', true),
            'status'   => 1,
        );

        //  echo '<pre>';print_r($datarq);
        $this->db->where('production_id', $production_id);
        $this->db->update('production_mix', $datarq);

        $this->db->where('production_id', $production_id);
        $this->db->delete('production_mix_details');


        $quantity            = $this->input->post('product_quantity', true);
        $it_id             = $this->input->post('item_id', true);
        $unit             = $this->input->post('unit', true);
        $rate             = $this->input->post('qty_price', true);


        for ($i = 0, $n   = count($it_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $un  = $unit[$i];
            $item_id   = $it_id[$i];
            $qty_price = $rate[$i];


            $mix_details = array(
                'production_detail_id'     => mt_rand(),
                'production_id'     => $production_id,
                'item_id'         => $item_id,
                'quantity'                => $qty,
                'rate' => $qty_price,
                // 'finished_raw'      => 2,
                'unit'                => $un,
                'status'                => 1,

            );
            //  echo '<pre>';print_r($mix_details);exit();
            if (!empty($quantity)) {
                $this->db->insert('production_mix_details', $mix_details);
            }
        }

        $tools_quantity            = $this->input->post('tools_product_quantity', true);
        $tools_it_id             = $this->input->post('tools_id', true);
        $tools_unit             = $this->input->post('tools_unit', true);
        $tools_rate             = $this->input->post('tools_qty_price', true);


        for ($j = 0, $n = count($tools_it_id); $j < $n; $j++) {
            $qty  = $tools_quantity[$j];
            $un  = $tools_unit[$j];
            $item_id   = $tools_it_id[$j];
            $qty_price = $tools_rate[$j];


            $mix_details = array(
                'production_detail_id'     => mt_rand(),
                'production_id'     => $production_id,
                'item_id'         => $item_id,
                'quantity'                => $qty,
                'rate' => $qty_price,
                // 'finished_raw'      => 2,
                'unit'                => $un,
                'status'                => 1,

            );
            //  echo '<pre>';print_r($mix_details);exit();
            if (!empty($tools_quantity)) {
                $this->db->insert('production_mix_details', $mix_details);
            }
        }


        $this->session->set_userdata(array('message' => "Successfully Updated"));
        redirect(base_url('Cproduction/manage_production_mix'));
    }

    public function production()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduction');
        $content = $CI->lproduction->production_form();
        $this->template->full_admin_html_view($content);
    }

    public function transfer_production()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduction');
        $content = $CI->lproduction->transfer_production_form();
        $this->template->full_admin_html_view($content);
    }


    public function receive_production()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduction');
        $content = $CI->lproduction->rcv_production_form();
        $this->template->full_admin_html_view($content);
    }

    public function cw_purchase()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduction');
        $content = $CI->lproduction->purchase_rqsn_form();
        $this->template->full_admin_html_view($content);
    }

    public function insert_mix()
    {
        $CI = &get_instance();

        // echo "<pre>";
        // print_r($_POST);
        // exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Production');

        $rqsn = $CI->Production->mix_entry();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cproduction/production_mix'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Cproduction/production_mix'));
        }
    }
    public function manage_production()
    {

        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduction');
        $CI->load->model('Production');
        $content = $this->lproduction->production_list();
        $this->template->full_admin_html_view($content);
    }

    public function production_delete($production_id)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        // $check_calculation = $CI->Production->check_calculaton($production_id);
        // if($check_calculation > 0){
        //     $this->session->set_userdata(array('error_message' => display('you_cant_delete_this_product')));
        //     redirect(base_url('Cproduction/manage_production'));

        // }else{
        $result = $CI->Production->delete_production($production_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        redirect(base_url('Cproduction/manage_production'));
        // }
    }
    public function production_update_form($production_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduction');

        // echo '<pre>';
        // print_r(get_instance());
        // exit();

        $content = $CI->lproduction->production_edit_data($production_id);
        $this->template->full_admin_html_view($content);
    }
    public function production_update()
    {
        $this->load->model('Web_settings');
        $pro_id = $this->input->post('pro_id', true);;

        //    echo "Ok";exit();
        $exp_head = $this->input->post('expense_head', true);
        $exp_amount = $this->input->post('exp_amount', true);
        $exp_pay = $this->input->post('exp_payment', true);

        $bank_id = $this->input->post('exp_bank_id', TRUE);

        $base_no = $this->input->post('base_number', true);

        $datarq = array(
            'base_number'    => $base_no,
            'total'    => $this->input->post('total', true),
            'date'            => (!empty($this->input->post('date', true)) ? $this->input->post('date', true) : date('Y-m-d')),
            'remark'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Production Goods'),
            'status'   => 1,
        );

        //echo '<pre>';print_r($datarq);exit();
        $this->db->where('pro_id', $pro_id);
        $this->db->update('production', $datarq);

        $this->db->where('pro_id', $pro_id);
        $this->db->delete('production_goods');


        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $price_rate             = $this->input->post('qty_price', true);
        // $unit             = $this->input->post('unit',true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $price  = $price_rate[$i];
            $product_id   = $p_id[$i];
            $transfer_price =  $this->input->post('transfer_price', true);


            $goods_details = array(
                'pro_id'     => $pro_id,
                'production_goods_id'     => mt_rand(),
                'product_id'         => $product_id,
                'price'         => $price,
                'per_unit_cost'     => $this->input->post('per_item_extra_cost', true),
                'transfer_cost'     => $transfer_price,
                'quantity'                => $qty,
                'status'                => 1,

            );
            // echo '<pre>';print_r($mix_details);exit();
            if (!empty($quantity)) {
                $this->db->insert('production_goods', $goods_details);
            }

            $this->db->where('product_id', $product_id);
            $this->db->set('price', $transfer_price);
            $this->db->update('product_information');
        }

        $this->db->where('production_id', $pro_id);
        $this->db->delete('item_usage');

        $items = $this->db->select('*')
            ->from('production_mix a')
            ->join('production_mix_details b', 'a.production_id=b.production_id')
            ->where('a.product_id', $product_id)
            ->get()->result();

        foreach ($items as $i) {

            $usage_qty = ($i->quantity) * $qty;

            $data_items = array(
                'item_usage_id' => mt_rand(),
                'item_id' => $i->item_id,
                'usage_qty' => $usage_qty,

            );
            $this->db->insert('item_usage', $data_items);
        }

        $createdate = date('Y-m-d H:i:s');
        $createby = $this->session->userdata('user_id');

        $this->db->where('VNo', $base_no);
        $this->db->delete('acc_transaction');


        for ($i = 0; $i < count($exp_pay); $i++) {
            if ($exp_pay[$i] == 1) {

                $cc = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  1020101,
                    'Narration'      =>  'Cash out for Production - ' . $pro_id,
                    'Debit'          =>  0,
                    'Credit'         =>  $exp_amount[$i],
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,

                );

                $expdr = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  $exp_head[$i],
                    'Narration'      =>  'Expense debit for Production - ' . $pro_id,
                    'Debit'          =>  $exp_amount[$i],
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,
                );

                $this->db->insert('acc_transaction', $cc);
                $this->db->insert('acc_transaction', $expdr);
            }

            if ($exp_pay[$i] == 2) {
                if (!empty($bank_id)) {
                    $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                    $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                } else {
                    $bankcoaid = '';
                }

                $bankc = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  $bankcoaid,
                    'Narration'      =>  'Bank cash out for Production - ' . $pro_id,
                    'Debit'          =>  0,
                    'Credit'         =>  $exp_amount[$i],
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,
                );

                $expdr = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  $exp_head[$i],
                    'Narration'      =>  'Expense debit for Production - ' . $pro_id,
                    'Debit'          =>  $exp_amount[$i],
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,
                );

                $this->db->insert('acc_transaction', $bankc);
                $this->db->insert('acc_transaction', $expdr);
            }

            if ($exp_pay[$i] == 3) {

                $cc = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  1020101,
                    'Narration'      =>  'Cash out (TT) for Production - ' . $pro_id,
                    'Debit'          =>  0,
                    'Credit'         =>  $exp_amount[$i],
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,

                );

                $expdr = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  $exp_head[$i],
                    'Narration'      =>  'Expense debit for Production - ' . $pro_id,
                    'Debit'          =>  $exp_amount[$i],
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,
                );

                $this->db->insert('acc_transaction', $cc);
                $this->db->insert('acc_transaction', $expdr);
            }

            if ($exp_pay[$i] == 4) {
                if (!empty($bank_id)) {
                    $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                    $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                } else {
                    $bankcoaid = '';
                }

                $bankc = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  $bankcoaid,
                    'Narration'      =>  'Bank cash out (TT) for Production - ' . $pro_id,
                    'Debit'          =>  0,
                    'Credit'         =>  $exp_amount[$i],
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,
                );

                $expdr = array(
                    'VNo'            =>  $base_no,
                    'Vtype'          =>  'Production',
                    'VDate'          =>  $createdate,
                    'COAID'          =>  $exp_head[$i],
                    'Narration'      =>  'Expense debit for Production - ' . $pro_id,
                    'Debit'          =>  $exp_amount[$i],
                    'Credit'         =>  0,
                    'IsPosted'       =>  1,
                    'CreateBy'       =>  $createby,
                    'CreateDate'     =>  $createdate,
                    'IsAppove'       =>  1,
                );

                $this->db->insert('acc_transaction', $bankc);
                $this->db->insert('acc_transaction', $expdr);
            }
        }
        $this->session->set_userdata(array('message' => "Successfully Updated"));
        redirect(base_url('Cproduction/manage_production'));
    }
    public function CheckProductionList()
    {
        // GET data
        $this->load->model('Production');
        $postData = $this->input->post();
        $data = $this->Production->getProductionList($postData);
        echo json_encode($data);
    }
    public function production_details($production_id)
    {
        $this->product_id = $production_id;
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduction');
        $content = $CI->lproduction->production_details($production_id);
        $this->template->full_admin_html_view($content);
    }
    public function insert_goods()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Production');

        $rqsn = $CI->Production->goods_entry();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cproduction/receive_production'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Cproduction/receive_production'));
        }
    }
    public function rcv_goods()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Production');

        $rqsn = $CI->Production->rcv_goods_entry();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cproduction/receive_production'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Cproduction/receive_production'));
        }
    }

    public function transfer_item()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Production');

        $rqsn = $CI->Production->transfer_item();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cproduction/transfer_production'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Cproduction/transfer_production'));
        }
    }

    public function insert_rqsn_cw()
    {
        $CI = &get_instance();

        //echo "Ok";exit();

        $CI->auth->check_admin_auth();
        $CI->load->model('Production');

        $rqsn = $CI->Rqsn->rqsn_entry_cw();



        //   echo "ok";exit();

        if ($rqsn == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cproduction/cw_purchase'));
        } else {
            $this->session->set_userdata(array('error_message' => display('please_try_again')));
            redirect(base_url('Cproduction/cw_purchase'));
        }
    }

    //Aprove voucher
    public function aprove_rqsn()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $CI->load->model('Reports');
        $data['title'] = 'Approve Reacquisition';
        $data['t'] = $this->Rqsn->approve_rqsn();
        //$data['t'] = $this->Reports->getCheckList_rqsn();
        // $data = $this->Reports->getCheckLi st_rqsn();


        //  echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('production/rqsn_approve', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function aprove_rqsn_outlet()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $CI->load->model('Reports');
        $data['title'] = 'Approve Reacquisition';
        $data['t'] = $this->Rqsn->approve_rqsn_outlet();
        //$data['t'] = $this->Reports->getCheckList_rqsn();
        // $data = $this->Reports->getCheckLi st_rqsn();


        //  echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('production/outlet_rqsn_approve', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function aprove_chalan()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $data['title'] = 'Chalan Approve';
        $data['aprrove'] = $this->Rqsn->approve_chalan();

        // echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('production/approve_chalan', $data, true);
        $this->template->full_admin_html_view($content);
    }


    public function rqsn_list()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $data['title'] = 'Reacquisition List';
        $data['aprrove'] = $this->Rqsn->rqsn_list();

        //echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('production/rqsn_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function rqsn_list_outlet()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $data['title'] = 'Stock Transferred Outlet';
        $data['aprrove'] = $this->Rqsn->rqsn_list_outlet();

        //echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('production/rqsn_list_outlet', $data, true);
        $this->template->full_admin_html_view($content);
    }



    public function aprove_rqsn_purchase()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $data['title'] = 'Approve Reacquisition CW';
        $data['aprrove'] = $this->Rqsn->approve_rqsn_purchase();

        //echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('production/rqsn_approve_purchase', $data, true);
        $this->template->full_admin_html_view($content);
    }



    public function outlet_approve()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Production');
        $data['title'] = 'Outlet Approve';
        $data['t'] = $this->Rqsn->approve_outlet();

        //echo '<pre>';print_r($data);exit();
        $content = $this->parser->parse('production/rqsn_approve_outlet', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function isactive($id = null, $action = null, $value = null)
    {
        $CI = &get_instance();
        $CI->load->model('Production');
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
        $CI->load->model('Production');
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
        $CI->load->model('Production');
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
        $CI->load->model('Production');
        $action = ($action == 'active' ? 3 : 2);
        $postData = array(
            'rqsn_detail_id'     => $id,
            'status' => $action,
            'isrcv' => 1
        );

        //        print_r($postData);
        //        die();

        // echo '<script>alert("Welcome to Geeks for Geeks")</script>';

        if ($this->Rqsn->received($postData)) {
            $this->session->set_flashdata('message', display('successfully_approved'));
        } else {
            $this->session->set_flashdata('error_message', display('please_try_again'));
        }

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

        $content = $this->lproduction->stock_report_outlet_item();
        // echo 'Okay';die();
        $this->template->full_admin_html_view($content);
    }

    public function outlet_stock()
    {
        $this->load->model('Production');
        $postData = $this->input->post();
        $data = $this->Rqsn->outlet_stock($postData);
        echo json_encode($data);
    }
}
