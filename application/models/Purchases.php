<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Purchases extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //Count purchase
    public function count_purchase()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = ($CI->Warehouse->get_outlet_user()) ? $CI->Warehouse->get_outlet_user()[0]['outlet_id'] : null;
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->where('a.outlet_id', $outlet_id);
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }


    public function getPurchaseList($postData = null)
    {
        $this->load->library('occational');
        $this->load->model('Web_settings');
        $this->load->model('Warehouse');
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $response = array();
        $fromdate = $this->input->post('fromdate');
        $todate   = $this->input->post('todate');
        if (!empty($fromdate)) {
            $datbetween = "(a.purchase_date BETWEEN '$fromdate' AND '$todate')";
        } else {
            $datbetween = "";
        }
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (b.supplier_name like '%" . $searchValue . "%' or c.outlet_name like '%" . $searchValue . "%' or a.purchase_id like '%" . $searchValue . "%' or a.purchase_date like'%" . $searchValue . "%')";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id', 'left');
        $this->db->join('outlet_warehouse c', 'c.outlet_id = a.outlet_id');
        if (!empty($fromdate) && !empty($todate)) {
            $this->db->where($datbetween);
        }
        if ($searchValue != '')
            $this->db->where($searchQuery);

        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id', 'left');
        $this->db->join('outlet_warehouse c', 'c.outlet_id = a.outlet_id', 'left');
        if (!empty($fromdate) && !empty($todate)) {
            $this->db->where($datbetween);
        }
        if ($searchValue != '')
            $this->db->where($searchQuery);

        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('a.*,b.supplier_name, c.*');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id', 'left');
        $this->db->join('outlet_warehouse c', 'c.outlet_id = a.outlet_id', 'left');

        if (!empty($fromdate) && !empty($todate)) {
            $this->db->where($datbetween);
        }
        if ($searchValue != '')
            $this->db->where($searchQuery);

        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();
        $data = array();
        $sl = 1;
        foreach ($records as $record) {
            $button = '';
            $base_url = base_url();
            $jsaction = "return confirm('Are You Sure ?')";

            $button .= '  <a href="' . $base_url . 'Cpurchase/purchase_details_data/' . $record->purchase_id . '" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="' . display('purchase_details') . '"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
            if ($this->permission1->method('manage_purchase', 'update')->access()) {
                $button .= ' <a href="' . $base_url . 'Cpurchase/purchase_update_form/' . $record->purchase_id . '" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="' . display('update') . '"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
            }



            $purchase_ids = '<a href="' . $base_url . 'Cpurchase/purchase_details_data/' . $record->purchase_id . '">' . $record->purchase_id . '</a>';
            $outlet = ($this->Warehouse->branch_search_item($record->outlet_id)) ? $this->Warehouse->branch_search_item($record->outlet_id)[0]['outlet_name'] : '';
            // print_r($record->outlet_id);exit();
            $data[] = array(
                'sl'               => $sl,
                'chalan_no'        => $record->chalan_no,
                'purchase_id'      => $purchase_ids,
                'outlet_name'      => $outlet,
                'supplier_name'    => $record->supplier_name,
                'purchase_date'    => $this->occational->dateConvert($record->purchase_date),
                'total_amount'     => $record->grand_total_amount,
                'button'           => $button,

            );
            $sl++;
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
        );

        return $response;
    }




    //purchase List
    public function purchase_list($per_page, $page)
    {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // purchase search by suppplier
    public function purchase_search($supplier_id, $per_page, $page)
    {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.supplier_id', $supplier_id);
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // purchase search count
    public function count_purchase_seach($supplier_id)
    {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.supplier_id', $supplier_id);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //purchase info by invoice id
    public function purchase_list_invoice_id($invoice_no)
    {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.chalan_no', $invoice_no);
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Select All Supplier List
    public function select_all_supplier()
    {
        $query = $this->db->select('*')
            ->from('supplier_information')
            ->where('status', '1')
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //purchase Search  List
    public function purchase_by_search($supplier_id)
    {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('b.supplier_id', $supplier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count purchase
    public function purchase_entry()
    {
        $purchase_id = date('YmdHis');

        $p_id = $this->input->post('product_id', TRUE);
        $supplier_id = $this->input->post('supplier_id', TRUE);
        $supinfo = $this->db->select('*')->from('supplier_information')->where('supplier_id', $supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id . '-' . $supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName', $sup_head)->get()->row();
        $receive_by = $this->session->userdata('user_id');
        $receive_date = date('Y-m-d');
        $createdate = date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount', TRUE);
        $due_amount = $this->input->post('due_amount', TRUE);
        $discount = $this->input->post('discount', TRUE);
        $bank_id = $this->input->post('bank_id', TRUE);
        $createby = $this->session->userdata('user_id');
        $VDate = $this->input->post('purchase_date', TRUE);

        //supplier & product id relation ship checker.
//        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
//            $product_id = $p_id[$i];
//            $value = $this->product_supplier_check($product_id, $supplier_id);
//            if ($value == 0) {
//                $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
//                redirect(base_url('Cpurchase'));
//                exit();
//            }
//        }

        if ($this->input->post('paid_amount') <= 0) {

            $data = array(
                'purchase_id'        => $purchase_id,
                'supplier_id'        => $this->input->post('supplier_id', TRUE),
                'grand_total_amount' => $this->input->post('grand_total_price', TRUE),
                'total_discount'     => $this->input->post('discount', TRUE),
                'purchase_date'      => $this->input->post('purchase_date', TRUE),
                'purchase_details'   => $this->input->post('purchase_details', TRUE),
                'paid_amount'        => $paid_amount,
                'due_amount'         => $due_amount,
                'status'             => 2,
                'outlet_id'       =>  $this->input->post('outlet_name', TRUE),
                'isFinal'          => 2
            );

            // echo '<pre>';
            // print_r($data);
            // exit;

            $this->db->insert('product_purchase', $data);
        } else {
            $data = array(
                'purchase_id'        => $purchase_id,
                'supplier_id'        => $this->input->post('supplier_id', TRUE),
                'grand_total_amount' => $this->input->post('grand_total_price', TRUE),
                'total_discount'     => $this->input->post('discount', TRUE),
                'purchase_date'      => $this->input->post('purchase_date', TRUE),
                'purchase_details'   => $this->input->post('purchase_details', TRUE),
                'paid_amount'        => $paid_amount,
                'due_amount'         => $due_amount,
                'status'             => 1,
                'outlet_id'       =>  $this->input->post('outlet_name', TRUE),
                'isFinal'          => 2
            );

            $this->db->insert('product_purchase', $data);
        }
        //Supplier Credit

        ///Inventory Debit
        $coscr = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory Debit For Supplier ' . $supinfo->supplier_name,
            'Debit'          =>  $this->input->post('grand_total_price', TRUE),
            'Credit'         =>  0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $receive_by,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );

        // Expense for company
        $expense = array(
            'VNo'            => $purchase_id,
            'Vtype'          => 'Purchase',
            'VDate'          => $this->input->post('purchase_date', TRUE),
            'COAID'          => 402,
            'Narration'      => 'Company Debit For  ' . $supinfo->supplier_name,
            'Debit'          => $this->input->post('grand_total_price', TRUE),
            'Credit'         => 0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $receive_by,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $cashinhand = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand For Supplier ' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $paid_amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $receive_by,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );



        $purchasecoatran = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  $sup_coa->HeadCode,
            'Narration'      =>  'Supplier .' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $this->input->post('grand_total_price', TRUE),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $receive_by,
            'CreateDate'     =>  $receive_date,
            'IsAppove'       =>  1
        );

        $this->db->insert('acc_transaction', $coscr);
        $this->db->insert('acc_transaction', $purchasecoatran);
        $this->db->insert('acc_transaction', $expense);

        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $tt_id = $this->input->post('tt_id', TRUE);
        $tt_bank_id = $this->input->post('tt_bank', TRUE);
        $lc_no = $this->input->post('lc', TRUE);
        $bank_count = 0;
        $bkash_count = 0;
        $nagad_count = 0;
        $tt_cash_count = 0;
        $tt_bank_count = 0;
        $tt_id_count = 0;
        $pay_type = $this->input->post('paytype', TRUE);
        $paid = $this->input->post('p_amount', TRUE);
        // echo "<pre>";print_r($paid);
        if (!empty($paid)) {
            for ($i = 0; $i < count($pay_type); $i++) {



                if ($pay_type[$i] == 1) {
                    $cc = array(

                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  1020101,
                        'Narration'      =>  'Cash in Hand for Purchase ID - ' . $purchase_id,
                        'Credit'         =>  $paid[$i],
                        'Debit'          =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );
                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => ''
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (cash in hand) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('purchase_payment', $data);
                        $this->db->insert('acc_transaction', $cc);
                    }
                }
                if ($pay_type[$i] == 4) {

                    // print_r($bank_id . " no\n");
                    if (!empty($bank_id)) {
                        $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                        $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                    } else {
                        $bankcoaid = '';
                    }

                    $bankc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Credit for company in bank for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at bank) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $bankc);
                        $this->db->insert('purchase_payment', $data);
                    }

                    $bank_count++;
                }
                if ($pay_type[$i] == 3) {

                    if (!empty($bkash_id)) {
                        $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id[$i])->get()->row()->bkash_no;

                        $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
                    } else {
                        $bkashcoaid = '';
                    }
                    $bkashc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $bkashcoaid,
                        'Narration'      =>  'Credit for company in bkash for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bkashname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at bKash) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $bkashc);
                        $this->db->insert('purchase_payment', $data);
                    }

                    $bkash_count++;
                }
                if ($pay_type[$i] == 5) {
                    if (!empty($nagad_id)) {
                        $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id[$i])->get()->row()->nagad_no;

                        $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
                    } else {
                        $nagadcoaid = '';
                    }

                    $nagadc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $nagadcoaid,
                        'Narration'      =>  'Credit for company in nagad for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $nagadname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at Nagad) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $nagadc);
                        $this->db->insert('purchase_payment', $data);
                    }
                    $nagad_count++;
                }

                if ($pay_type[$i] == 6) {
                    // for ($j = 0; $j < count($tt_id); $j++) {
                    if ($tt_id[$i] == 1) {
                        if (!empty($tt_bank_id)) {
                            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $tt_bank_id[$i])->get()->row()->bank_name;

                            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                        } else {
                            $bankcoaid = '';
                        }

                        $bankc = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $VDate,
                            'COAID'          =>  $bankcoaid,
                            'Narration'      =>  'Credit for company in bank (TT) for Purchase ID - ' . $purchase_id,
                            'Credit'         =>  $paid[$i],
                            'Debit'          =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $createby,
                            'CreateDate'     =>  $createdate,
                            'IsAppove'       =>  1,

                        );
                        // echo '<pre>';
                        // print_r($bankc);

                        $data = array(
                            'purchase_id'    => $purchase_id,
                            'pay_type'      => $pay_type[$i],
                            'pay_subtype'   => $tt_id[$i],
                            'amount'        => $paid[$i],
                            'account'       => $bankname
                        );


                        $supplierdebit = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $this->input->post('purchase_date', TRUE),
                            'COAID'          =>  $sup_coa->HeadCode,
                            'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' Cash at bank (TT) for Purchase Id - ' . $purchase_id,
                            'Debit'          =>  $paid[$i],
                            'Credit'         =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $receive_by,
                            'CreateDate'     =>  $receive_date,
                            'IsAppove'       =>  1
                        );
                        if ($paid[$i] > 0) {
                            $this->db->insert('acc_transaction', $supplierdebit);
                            $this->db->insert('acc_transaction', $bankc);
                            $this->db->insert('purchase_payment', $data);
                        }
                        $tt_bank_count++;
                    }
                    if ($tt_id[$i] == 2) {
                        $cc = array(

                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $VDate,
                            'COAID'          =>  1020101,
                            'Narration'      =>  'Cash in Hand (TT) for Purchase ID - ' . $purchase_id,
                            'Credit'         =>  $paid[$i],
                            'Debit'          =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $createby,
                            'CreateDate'     =>  $createdate,
                            'IsAppove'       =>  1,

                        );

                        $data = array(
                            'purchase_id'    => $purchase_id,
                            'pay_type'      => $pay_type[$i],
                            'pay_subtype'   => $tt_id[$i],
                            'amount'        => $paid[$i],
                            'account'       => ''
                        );

                        $supplierdebit = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $this->input->post('purchase_date', TRUE),
                            'COAID'          =>  $sup_coa->HeadCode,
                            'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' Cash in hand (TT) for Purchase Id - ' . $purchase_id,
                            'Debit'          =>  $paid[$i],
                            'Credit'         =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $receive_by,
                            'CreateDate'     =>  $receive_date,
                            'IsAppove'       =>  1
                        );

                        if ($paid[$i] > 0) {
                            $this->db->insert('acc_transaction', $supplierdebit);
                            $this->db->insert('acc_transaction', $cc);
                            $this->db->insert('purchase_payment', $data);
                        }
                    }
                }

                if ($pay_type[$i] == 7) {

                    $lc_liablities = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  503,
                        'Narration'      =>  'LC Liabilities Credit for purchase no. ' . $purchase_id . ', LC No. ' . $lc_no[$i],
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );
                    $this->db->insert('acc_transaction', $lc_liablities);


                    $data = array(
                        'lc_no'   => $lc_no[$i],
                        'purchase_id'   => $purchase_id,
                        'amount'        => $paid[$i],
                        'status'        => 1,
                    );

                    $this->db->insert('lc_list', $data);

                    /** Accounts (later) */
                }
            }
        }




        $rate = $this->input->post('product_rate', TRUE);
        $quantity = $this->input->post('product_quantity', TRUE);
        $warrenty = $this->input->post('warrenty_date', TRUE);
        $expired = $this->input->post('expired_date', TRUE);
        $t_price = $this->input->post('total_price', TRUE);
        $discount = $this->input->post('discount', TRUE);
        $damaged_qty = $this->input->post('damaged_qty', TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $warrenty_date = $warrenty[$i];
            $expired_date = $expired[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];

            $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'qty'           => $product_quantity,
                'damaged_qty'   => $damaged_qty[$i],
                'warrenty_date'      => $warrenty_date,
                'expired_date'       => $expired_date,
                'rate'               => $product_rate,
                'total_amount'       => $total_price,
                'status'             => 2
            );

            if (!empty($quantity)) {
                $this->db->insert('product_purchase_details', $data1);
            }
        }

        return true;
    }

    public function previous_purchase_entry()
    {
        $purchase_id = date('YmdHis');


        $p_id = $this->input->post('product_id', TRUE);
        $supplier_id = $this->input->post('supplier_id', TRUE);
        $supinfo = $this->db->select('*')->from('supplier_information')->where('supplier_id', $supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id . '-' . $supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName', $sup_head)->get()->row();
        $receive_by = $this->session->userdata('user_id');
        $receive_date = date('Y-m-d');
        $createdate = date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount', TRUE);
        $due_amount = $this->input->post('due_amount', TRUE);
        $discount = $this->input->post('discount', TRUE);
        $bank_id = $this->input->post('bank_id', TRUE);
        if (!empty($bank_id)) {
            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        } else {
            $bankcoaid = '';
        }

        //supplier & product id relation ship checker.
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_id = $p_id[$i];
            $value = $this->product_supplier_check($product_id, $supplier_id);
            if ($value == 0) {
                $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
                redirect(base_url('Cpurchase'));
                exit();
            }
        }



        $data = array(
            'purchase_id'        => $purchase_id,
            // 'chalan_no'          => $this->input->post('chalan_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id', TRUE),
            'grand_total_amount' => $this->input->post('grand_total_price', TRUE),
            'total_discount'     => $this->input->post('discount', TRUE),
            'purchase_date'      => $this->input->post('purchase_date', TRUE),
            // 'cheque_date'      => $this->input->post('cheque_date',TRUE),
            'purchase_details'   => $this->input->post('purchase_details', TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
            'status'             => 3,
            // 'bank_id'            =>  $this->input->post('bank_id',TRUE),
            //'cheque_no'            =>  $this->input->post('cheque_no',TRUE),
            //'payment_type'       =>  $this->input->post('paytype',TRUE),
        );


        $this->db->insert('product_purchase', $data);
        $coscr = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  10205,
            'Narration'      =>  'Opening Inventory Debit For Supplier ' . $supinfo->supplier_name,
            'Debit'          =>  $this->input->post('grand_total_price', TRUE),
            'Credit'         =>  0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $receive_by,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        $this->db->insert('acc_transaction', $coscr);

        $rate = $this->input->post('product_rate', TRUE);
        $quantity = $this->input->post('product_quantity', TRUE);
        $lot = $this->input->post('lot_number', TRUE);
        $sn = $this->input->post('sn', TRUE);
        $origin = $this->input->post('origin', TRUE);
        // $warehouse = $this->input->post('warehouse',TRUE);
        $warrenty = $this->input->post('warrenty_date', TRUE);
        $expired = $this->input->post('expired_date', TRUE);
        $t_price = $this->input->post('total_price', TRUE);
        $discount = $this->input->post('discount', TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $lot_number = $lot[$i];
            $sn_number = $sn[$i];
            $origin_t = $origin[$i];
            // $war = $warehouse[$i];
            $warrenty_date = $warrenty[$i];
            $expired_date = $expired[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $disc = $discount[$i];

            $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'sn'           => $sn_number,
                'qty'           => $product_quantity,
                'lot_number'         => $lot_number,
                'origin'             => $origin_t,
                // 'warehouse'          => $war,
                'warrenty_date'      => $warrenty_date,
                'expired_date'       => $expired_date,
                'rate'               => $product_rate,
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'status'             => 1
            );

            if (!empty($quantity)) {
                $this->db->insert('product_purchase_details', $data1);
            }
        }

        return true;
    }

    //Retrieve purchase Edit Data
    public function retrieve_purchase_editdata($purchase_id)
    {
        $this->db->select(
                        'a.*,
						b.*,
						c.product_id,
						c.product_name,
						c.product_model,
						d.supplier_id,
						d.supplier_name,
                        k.color_name,
                        l.size_name,
						d.supplier_name,
                        '
        );
        $this->db->from('product_purchase a');
        $this->db->join('product_purchase_details b', 'b.purchase_id =a.purchase_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
        $this->db->join('supplier_information d', 'd.supplier_id = a.supplier_id');
        $this->db->join('color_list k', 'k.color_id = c.color', 'left');
        $this->db->join('size_list l', 'l.size_id = c.size', 'left');
        $this->db->where('a.purchase_id', $purchase_id);
        $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
        // echo "<pre>";print_r($query->result_array());exit();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }

    //Retrieve company Edit Data
    public function retrieve_company()
    {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_purchase()
    {
        $purchase_id  = $this->input->post('purchase_id', TRUE);
        $paid_amount  = $this->input->post('paid_amount', TRUE);
        $due_amount   = $this->input->post('due_amount', TRUE);
        // $bank_id      = $this->input->post('bank_id', TRUE);
        // if (!empty($bank_id)) {
        //     $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id)->get()->row()->bank_name;

        //     $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
        // }
        $p_id = $this->input->post('product_id', TRUE);
        $supplier_id = $this->input->post('supplier_id', TRUE);
        $supinfo = $this->db->select('*')->from('supplier_information')->where('supplier_id', $supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id . '-' . $supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName', $sup_head)->get()->row();
        $receive_by = $this->session->userdata('user_id');
        $createby = $this->session->userdata('user_id');
        $receive_date = date('Y-m-d');
        $createdate = date('Y-m-d H:i:s');
        $VDate = $this->input->post('purchase_date', TRUE);


        $data = array(
            'purchase_id'        => $purchase_id,
            // 'chalan_no'          => $this->input->post('chalan_no', TRUE),
            'supplier_id'        => $this->input->post('supplier_id', TRUE),
            'grand_total_amount' => $this->input->post('grand_total_price', TRUE),
            'total_discount'     => $this->input->post('discount', TRUE),
            'purchase_date'      => $this->input->post('purchase_date', TRUE),
            'purchase_details'   => $this->input->post('purchase_details', TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
            // 'bank_id'           =>  $this->input->post('bank_id', TRUE),
            // 'payment_type'       =>  $this->input->post('paytype', TRUE),
        );
        $cashinhand = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  1020101,
            'Narration'      =>  'Cash in Hand For Supplier ' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $paid_amount,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $receive_by,
            'CreateDate'     =>  $createdate,
            'IsAppove'       =>  1
        );

        $purchasecoatran = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  $sup_coa->HeadCode,
            'Narration'      =>  'Supplier -' . $supinfo->supplier_name,
            'Debit'          =>  0,
            'Credit'         =>  $this->input->post('grand_total_price', TRUE),
            'IsPosted'       =>  1,
            'CreateBy'       =>  $receive_by,
            'CreateDate'     =>  $receive_date,
            'IsAppove'       =>  1
        );
        ///Inventory credit
        $coscr = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  10204,
            'Narration'      =>  'Inventory Debit Supplier ' . $supinfo->supplier_name,
            'Debit'          =>  $this->input->post('grand_total_price', TRUE),
            'Credit'         =>  0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $receive_by,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );
        // Expense for company
        $expense = array(
            'VNo'            => $purchase_id,
            'Vtype'          => 'Purchase',
            'VDate'          => $this->input->post('purchase_date', TRUE),
            'COAID'          => 402,
            'Narration'      => 'Company Credit For Supplier' . $supinfo->supplier_name,
            'Debit'          => $this->input->post('grand_total_price', TRUE),
            'Credit'         => 0, //purchase price asbe
            'IsPosted'       => 1,
            'CreateBy'       => $receive_by,
            'CreateDate'     => $createdate,
            'IsAppove'       => 1
        );

        $supplier_debit = array(
            'VNo'            =>  $purchase_id,
            'Vtype'          =>  'Purchase',
            'VDate'          =>  $this->input->post('purchase_date', TRUE),
            'COAID'          =>  $sup_coa->HeadCode,
            'Narration'      =>  'Supplier . ' . $supinfo->supplier_name,
            'Debit'          =>  $paid_amount,
            'Credit'         =>  0,
            'IsPosted'       =>  1,
            'CreateBy'       =>  $receive_by,
            'CreateDate'     =>  $receive_date,
            'IsAppove'       =>  1
        );

        if ($purchase_id != '') {
            $this->db->where('purchase_id', $purchase_id);
            $this->db->update('product_purchase', $data);

            //account transaction delete
            $this->db->where('VNo', $purchase_id);
            $this->db->delete('acc_transaction');

            //Purchase payment delete
            $this->db->where('purchase_id', $purchase_id);
            $this->db->delete('purchase_payment');


            //supplier ledger update
            $this->db->where('purchase_id', $purchase_id);
            $this->db->delete('product_purchase_details');
        }

        $this->db->insert('acc_transaction', $coscr);
        $this->db->insert('acc_transaction', $purchasecoatran);
        $this->db->insert('acc_transaction', $expense);
        $rate = $this->input->post('product_rate', TRUE);
        $quantity = $this->input->post('product_quantity', TRUE);
        $warrenty = $this->input->post('warrenty_date', TRUE);
        $expired = $this->input->post('expired_date', TRUE);
        $t_price = $this->input->post('total_price', TRUE);
        $discount = $this->input->post('discount', TRUE);
        $damaged_qty = $this->input->post('damaged_qty', TRUE);
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('product_purchase_details');
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $warrenty_date = $warrenty[$i];
            $expired_date = $expired[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $disc = $discount[$i];

            $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'qty'           => $product_quantity,
                'damaged_qty'   => $damaged_qty[$i],
                'warrenty_date'      => $warrenty_date,
                'expired_date'       => $expired_date,
                'rate'               => $product_rate,
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'status'             => 1
            );


            if ((isset($quantity))) {

                $this->db->insert('product_purchase_details', $data1);
            }
        }
        $pay_row = $this->input->post('row_id', true);
        $pay_amount = $this->input->post('pay_amount', true);

        // for ($i = 0; $i < count($pay_row); $i++) {
        //     $this->db->where('id', $pay_row[$i]);
        //     $this->db->set('amount', $pay_amount[$i]);
        //     $this->db->update('purchase_payment');
        // }

        $bank_id = $this->input->post('bank_id_m', TRUE);
        $bkash_id = $this->input->post('bkash_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $nagad_id = $this->input->post('nagad_id', TRUE);
        $tt_id = $this->input->post('tt_id', TRUE);
        $tt_bank_id = $this->input->post('tt_bank', TRUE);

        $pay_type = $this->input->post('paytype', TRUE);
        $paid = $this->input->post('p_amount', TRUE);
        $lc_no = $this->input->post('lc', TRUE);
        $bank_count = 0;
        $bkash_count = 0;
        $nagad_count = 0;
        $tt_cash_count = 0;
        $tt_bank_count = 0;
        $tt_id_count = 0;
        if (!empty($paid)) {
            for ($i = 0; $i < count($pay_type); $i++) {



                if ($pay_type[$i] == 1) {
                    $cc = array(

                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  1020101,
                        'Narration'      =>  'Cash in Hand for Purchase ID - ' . $purchase_id,
                        'Credit'         =>  $paid[$i],
                        'Debit'          =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );
                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => ''
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (cash in hand) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('purchase_payment', $data);
                        $this->db->insert('acc_transaction', $cc);
                    }
                }
                if ($pay_type[$i] == 4) {

                    // print_r($bank_id . " no\n");
                    if (!empty($bank_id)) {
                        $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $bank_id[$i])->get()->row()->bank_name;

                        $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                    } else {
                        $bankcoaid = '';
                    }

                    $bankc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $bankcoaid,
                        'Narration'      =>  'Credit for company in bank for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bankname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at bank) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $bankc);
                        $this->db->insert('purchase_payment', $data);
                    }

                    $bank_count++;
                }
                if ($pay_type[$i] == 3) {

                    if (!empty($bkash_id)) {
                        $bkashname = $this->db->select('bkash_no')->from('bkash_add')->where('bkash_id', $bkash_id[$i])->get()->row()->bkash_no;

                        $bkashcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'BK - ' . $bkashname)->get()->row()->HeadCode;
                    } else {
                        $bkashcoaid = '';
                    }
                    $bkashc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $bkashcoaid,
                        'Narration'      =>  'Credit for company in bkash for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $bkashname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at bKash) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $bkashc);
                        $this->db->insert('purchase_payment', $data);
                    }

                    $bkash_count++;
                }
                if ($pay_type[$i] == 5) {
                    if (!empty($nagad_id)) {
                        $nagadname = $this->db->select('nagad_no')->from('nagad_add')->where('nagad_id', $nagad_id[$i])->get()->row()->nagad_no;

                        $nagadcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', 'NG - ' . $nagadname)->get()->row()->HeadCode;
                    } else {
                        $nagadcoaid = '';
                    }

                    $nagadc = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $VDate,
                        'COAID'          =>  $nagadcoaid,
                        'Narration'      =>  'Credit for company in nagad for Purchase ID - ' . $purchase_id,
                        'Credit'          =>  $paid[$i],
                        'Debit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $createby,
                        'CreateDate'     =>  $createdate,
                        'IsAppove'       =>  1,

                    );

                    $data = array(
                        'purchase_id'    => $purchase_id,
                        'pay_type'      => $pay_type[$i],
                        'amount'        => $paid[$i],
                        'account'       => $nagadname
                    );


                    $supplierdebit = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  $sup_coa->HeadCode,
                        'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' (Cash at Nagad) for Purchase Id - ' . $purchase_id,
                        'Debit'          =>  $paid[$i],
                        'Credit'         =>  0,
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );

                    if ($paid[$i] > 0) {
                        $this->db->insert('acc_transaction', $supplierdebit);
                        $this->db->insert('acc_transaction', $nagadc);
                        $this->db->insert('purchase_payment', $data);
                    }
                    $nagad_count++;
                }

                if ($pay_type[$i] == 6) {
                    // for ($j = 0; $j < count($tt_id); $j++) {
                    if ($tt_id[$i] == 1) {
                        if (!empty($tt_bank_id)) {
                            $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id', $tt_bank_id[$i])->get()->row()->bank_name;

                            $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName', $bankname)->get()->row()->HeadCode;
                        } else {
                            $bankcoaid = '';
                        }

                        $bankc = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $VDate,
                            'COAID'          =>  $bankcoaid,
                            'Narration'      =>  'Credit for company in bank (TT) for Purchase ID - ' . $purchase_id,
                            'Credit'         =>  $paid[$i],
                            'Debit'          =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $createby,
                            'CreateDate'     =>  $createdate,
                            'IsAppove'       =>  1,

                        );
                        // echo '<pre>';
                        // print_r($bankc);

                        $data = array(
                            'purchase_id'    => $purchase_id,
                            'pay_type'      => $pay_type[$i],
                            'pay_subtype'   => $tt_id[$i],
                            'amount'        => $paid[$i],
                            'account'       => $bankname
                        );


                        $supplierdebit = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $this->input->post('purchase_date', TRUE),
                            'COAID'          =>  $sup_coa->HeadCode,
                            'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' Cash at bank (TT) for Purchase Id - ' . $purchase_id,
                            'Debit'          =>  $paid[$i],
                            'Credit'         =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $receive_by,
                            'CreateDate'     =>  $receive_date,
                            'IsAppove'       =>  1
                        );
                        if ($paid[$i] > 0) {
                            $this->db->insert('acc_transaction', $supplierdebit);
                            $this->db->insert('acc_transaction', $bankc);
                            $this->db->insert('purchase_payment', $data);
                        }
                        $tt_bank_count++;
                    }
                    if ($tt_id[$i] == 2) {
                        $cc = array(

                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $VDate,
                            'COAID'          =>  1020101,
                            'Narration'      =>  'Cash in Hand (TT) for Purchase ID - ' . $purchase_id,
                            'Credit'         =>  $paid[$i],
                            'Debit'          =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $createby,
                            'CreateDate'     =>  $createdate,
                            'IsAppove'       =>  1,

                        );

                        $data = array(
                            'purchase_id'    => $purchase_id,
                            'pay_type'      => $pay_type[$i],
                            'pay_subtype'   => $tt_id[$i],
                            'amount'        => $paid[$i],
                            'account'       => ''
                        );

                        $supplierdebit = array(
                            'VNo'            =>  $purchase_id,
                            'Vtype'          =>  'Purchase',
                            'VDate'          =>  $this->input->post('purchase_date', TRUE),
                            'COAID'          =>  $sup_coa->HeadCode,
                            'Narration'      =>  'Supplier .' . $supinfo->supplier_name . ' Cash in hand (TT) for Purchase Id - ' . $purchase_id,
                            'Debit'          =>  $paid[$i],
                            'Credit'         =>  0,
                            'IsPosted'       =>  1,
                            'CreateBy'       =>  $receive_by,
                            'CreateDate'     =>  $receive_date,
                            'IsAppove'       =>  1
                        );

                        if ($paid[$i] > 0) {
                            $this->db->insert('acc_transaction', $supplierdebit);
                            $this->db->insert('acc_transaction', $cc);
                            $this->db->insert('purchase_payment', $data);
                        }
                    }
                }

                if ($pay_type[$i] == 7) {

                    $lc_liablities = array(
                        'VNo'            =>  $purchase_id,
                        'Vtype'          =>  'Purchase',
                        'VDate'          =>  $this->input->post('purchase_date', TRUE),
                        'COAID'          =>  503,
                        'Narration'      =>  'LC Liabilities Credit for purchase no. ' . $purchase_id . ', LC No. ' . $lc_no[$i],
                        'Debit'          =>  0,
                        'Credit'         =>  $paid[$i],
                        'IsPosted'       =>  1,
                        'CreateBy'       =>  $receive_by,
                        'CreateDate'     =>  $receive_date,
                        'IsAppove'       =>  1
                    );
                    $this->db->insert('acc_transaction', $lc_liablities);


                    $data = array(
                        'lc_no'   => $lc_no[$i],
                        'purchase_id'   => $purchase_id,
                        'amount'        => $paid[$i],
                        'status'        => 1,
                    );

                    $this->db->insert('lc_list', $data);

                    /** Accounts (later) */
                }
            }
        }
        //echo "<pre>";print_r($data1);exit();
        return true;
    }

    // Delete purchase Item

    public function purchase_search_list($cat_id, $company_id)
    {
        $this->db->select('a.*,b.sub_category_name,c.category_name');
        $this->db->from('purchases a');
        $this->db->join('purchase_sub_category b', 'b.sub_category_id = a.sub_category_id');
        $this->db->join('purchase_category c', 'c.category_id = b.category_id');
        $this->db->where('a.sister_company_id', $company_id);
        $this->db->where('c.category_id', $cat_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve purchase_details_data
    public function purchase_details_data($purchase_id)
    {
        $this->db->select('a.*,b.*,c.*,e.purchase_details,d.product_id,d.product_name,d.product_model,sz.size_name,cl.color_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->join('product_purchase_details c', 'c.purchase_id = a.purchase_id');
        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->join('size_list sz', 'd.size=sz.size_id', 'left');
        $this->db->join('color_list cl', 'd.color=cl.color_id', 'left');
        $this->db->join('product_purchase e', 'e.purchase_id = c.purchase_id');
        $this->db->where('a.purchase_id', $purchase_id);
        $this->db->group_by('d.product_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //This function will check the product & supplier relationship.
    public function product_supplier_check($product_id, $supplier_id)
    {
        $this->db->select('*');
        $this->db->from('supplier_product');
        $this->db->where('product_id', $product_id);
        $this->db->where('supplier_id', $supplier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return 0;
    }

    //This function is used to Generate Key
    public function generator($lenth)
    {
        $number = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "N", "M", "O", "P", "Q", "R", "S", "U", "V", "T", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 61);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }
        return $con;
    }

    public function purchase_delete($purchase_id = null)
    {
        //Delete product_purchase table
        $this->db->where('VNo', $purchase_id);
        $this->db->delete('acc_transaction');
        //Delete acc transaction
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('product_purchase');
        //Delete product_purchase_details table
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('product_purchase_details');
        return true;
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    //purchase list date to date
    public function purchase_list_date_to_date($start, $end)
    {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->where('a.purchase_date >=', $start);
        $this->db->where('a.purchase_date <=', $end);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // purchase list for pdf
    public function pdf_purchase_list()
    {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->order_by('a.purchase_date', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // csv upload purchase list
    public function purchase_csv_file()
    {
        $query = $this->db->select('a.chalan_no,a.purchase_id,b.supplier_name,a.purchase_date,a.grand_total_amount')
            ->from('product_purchase a')
            ->join('supplier_information b', 'b.supplier_id = a.supplier_id', 'left')
            ->order_by('a.purchase_date', 'desc')
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function number_generator()
    {
        $this->db->select('purchase_order_no')->order_by('purchase_order_no', 'desc');
        $query = $this->db->get('rqsn');
        $result = $query->result_array();
        $order_no = substr($result[0]['purchase_order_no'], -4);
        if ($order_no != '') {
            $order_no = $order_no + 1;
        } else {
            $order_no = 1000;
        }
        return 'PO' . $order_no;
    }

    public function po_list()
    {
        $this->db->select('purchase_order_no, rqsn_id');
        $this->db->from('rqsn');
        $this->db->where('status', 4);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function purchase_details($rqsn_id)
    {
        $this->db->select('*')
            ->from('rqsn a')
            ->join('rqsn_details b', 'b.rqsn_id = a.rqsn_id')
            ->join('product_information c', 'c.product_id = b.product_id')
            ->join('size_list m', 'c.size = m.size_id', 'left')
            ->join('color_list n', 'c.color = n.color_id', 'left')
            ->where('a.rqsn_id', $rqsn_id);
        // ->where('a.status', 4);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function payment_details($purchase_id)
    {
        $this->db->select('*')
            ->from('purchase_payment')
            ->where('purchase_id', $purchase_id);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_purchase_product_details($purchase_id)
    {
        $res = $this->db->select('sum(p.qty) as p_qty, b.*, x.category_name, d.ptype_name')
            ->from('product_purchase a')
            ->where('a.purchase_id', $purchase_id)
            ->join('product_purchase_details p', 'p.purchase_id = a.purchase_id', 'left')
            ->join('product_information b', 'b.product_id = p.product_id', 'left')
            ->join('product_category x', 'x.category_id = b.category_id', 'left')
            ->join('product_type d', 'd.ptype_id = b.ptype_id', 'left')
            ->group_by('p.product_id')
            ->get();

        if ($res->num_rows() > 0) {
            return $res->result_array();
        }

        return false;
    }

    public function get_pr_qty($product_id)
    {
        $res = $this->db->select('stock_qty as pr_qty')
            ->from('opening_inventory')
            // ->group_by('product_id')
            ->where('product_id', $product_id)
            ->get();

        return $res->result_array();
    }

    public function get_total_purchase_amount($pr_status = null)
    {
        $this->db->select('SUM(a.total_amount) as all_total')
            ->from('product_purchase_details a')
            ->join('product_information p', 'a.product_id = p.product_id');

        if ($pr_status) {
            $this->db->where('p.finished_raw', $pr_status);
        }

        $q = $this->db->get()->result_array();

        return $q;
    }

    public function get_opening_stock_value($pr_status = null)
    {
        $this->db->select('SUM(a.stock_qty * s.supplier_price) as all_open_total')
            ->from('opening_inventory a')
            ->join('product_information p', 'a.product_id = p.product_id', 'left')
            ->join('supplier_product s', 'a.product_id = s.product_id', 'left');

        if ($pr_status) {
            $this->db->where('p.finished_raw', $pr_status);
        }

        $q = $this->db->get()->result_array();

        return $q;
    }
}
