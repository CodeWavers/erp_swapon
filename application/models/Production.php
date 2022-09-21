<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Production extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lproduction');
        $this->load->library('Smsgateway');
        $this->load->library('session');
        $this->load->model('Service');
        $this->auth->check_admin_auth();
    }

    public function count_production()
    {
        return $this->db->count_all("production_mix");
    }
    public function retrieve_production_editdata($production_id)
    {
        $this->db->select('*');
        $this->db->from('production_mix');
        $this->db->where('production_id', $production_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function getProductionList($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        # Search
        // $searchQuery = "";
        // if($searchValue != ''){
        //    $searchQuery = " (d.product_name like '%".$searchValue."%' or a.quantity like '%".$searchValue."%' or a.rate like'%".$searchValue."%' or a.unit like'%".$searchValue."%' or x.total like'%".$searchValue."%' or x.grand_total like'%".$searchValue."%') ";
        // }
        # Search
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " ( a.quantity like '%" . $searchValue . "%' or a.rate like'%" . $searchValue . "%' or a.unit like'%" . $searchValue . "%' or x.total like'%" . $searchValue . "%' or x.grand_total like'%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('production_mix x');
        // $this->db->join('supplier_product c','c.product_id = a.product_id','left');
        $this->db->join('production_mix_details a', 'a.production_id = x.production_id', 'left');
        // $this->db->join('product_information d','d.product_id = a.item_id','left');
        // $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
        if ($searchValue != '')
            $this->db->where($searchQuery);
        $records = $this->db->get()->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('production_mix x');
        // $this->db->join('supplier_product c','c.product_id = a.product_id','left');
        $this->db->join('production_mix_details a', 'a.production_id = x.production_id', 'left');
        // $this->db->join('product_information d','d.product_id = a.item_id','left');
        // $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
        if ($searchValue != '')
            $this->db->where($searchQuery);
        $records = $this->db->get()->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        // $this->db->select("a.*,
        //        a.product_name,
        //        a.product_id,
        //        a.product_model,
        //        a.image,
        //        c.supplier_price,
        //        c.supplier_id,
        //        m.supplier_name,
        //      x.category_name,
        //      d.ptype_name
        //        ");
        $this->db->select("a.*,
                    x.*,
                    d.*
                ");
        $this->db->from('production_mix x');
        // $this->db->join('supplier_product c','c.product_id = a.product_id','left');
        $this->db->join('production_mix_details a', 'a.production_id = x.production_id', 'left');
        $this->db->join('product_information d', 'd.product_id = a.item_id', 'left');
        // $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
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
            // $image = '<img src="'.$record->image.'" class="img img-responsive" height="50" width="50">';
            if ($this->permission1->method('manage_production', 'delete')->access()) {

                $button .= '<a href="' . $base_url . 'Cproduction/production_delete/' . $record->production_id . '" class="btn btn-xs btn-danger "  onclick="' . $jsaction . '"><i class="fa fa-trash"></i></a>';
            }

            $button .= '  <a href="' . $base_url . 'Cqrcode/qrgenerator_production/' . $record->production_id . '" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="left" title="' . display('qr_code') . '"><i class="fa fa-qrcode" aria-hidden="true"></i></a>';

            $button .= '  <a href="' . $base_url . 'Cbarcode/barcode_print_production/' . $record->production_id . '" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="left" title="' . display('barcode') . '"><i class="fa fa-barcode" aria-hidden="true"></i></a>';
            if ($this->permission1->method('manage_production', 'update')->access()) {
                $button .= ' <a href="' . $base_url . 'Cproduction/production_update_form/' . $record->production_id . '" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="' . display('update') . '"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
            }

            $product_name = '<a href="' . $base_url . 'Cproduction/production_details/' . $record->production_id . '">' . $record->product_name . '</a>';
            // $supplier = '<a href="'.$base_url.'Csupplier/supplier_ledger_info/'.$record->supplier_id.'">'.$record->supplier_name.'</a>';

            $data[] = array(
                'sl'               => $sl,
                'product_name'     => $product_name,
                'quantity'    => $record->quantity,
                'rate'    => $record->rate,
                'unit'    => $record->unit,
                // 'supplier_name'    =>$supplier,
                'total'            => $record->total,
                'grand_total'       => $record->grand_total,
                // 'image'            =>$image,
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
    public function production_mix_details_editdata($production_id)
    {
        $this->db->select('a.*,b.*,c.*');
        $this->db->from('production_mix a');
        $this->db->join('production_mix_details b', 'b.production_id=a.production_id');
        $this->db->join('product_information c', 'c.product_id=b.item_id');
        $this->db->where('a.production_id', $production_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function product_editdata($product_id)
    {
        $this->db->select('a.*,SUM(a.qty) as total_purchase');
        $this->db->from('product_purchase_details a');
        $this->db->where('a.product_id', $product_id);
        $total_purchase = $this->db->get()->row();
        $this->db->select('SUM(b.quantity) as total_sale');
        $this->db->from('invoice_details b');
        $this->db->where('b.product_id', $product_id);
        $total_sale = $this->db->get()->row();
        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);
        // $query = $this->db->get();
        // if ($query->num_rows() > 0) {
        //     return $query->result_array();
        // }
        // print_r($available_quantity);
        // exit();
        $data['available_quantity']  = $available_quantity;
        return  $data;
        // $this->db->select('a.*,SUM(a.qty) as total_purchase');
        // $this->db->from('product_purchase_details a');
        // $this->db->where('a.product_id', $product_id);
        // $total_purchase = $this->db->get()->row();

        // $this->db->select('SUM(b.quantity) as total_sale');
        // $this->db->from('invoice_details b');
        // $this->db->where('b.product_id', $product_id);
        // $total_sale = $this->db->get()->row();

        // $this->db->select('a.*');
        // $this->db->from('product_information a');
        // //   $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        // //  $this->db->join('product_purchase_details c', 'a.product_id=c.product_id');
        // $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));
        // $product_information = $this->db->get()->row();


        // $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);
    }
    public function product_info_editdata($production_id)
    {
        $this->db->select('a.*,b.*');
        $this->db->from('production_mix a');
        $this->db->join('product_information b', 'b.product_id=a.product_id');
        $this->db->where('a.production_id', $production_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function production_details_info($product_id)
    {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function check_calculaton($production_id)
    {
        $this->db->select('*');
        $this->db->from('production_mix');
        $this->db->where('production_id', $production_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function delete_production($production_id)
    {


        $this->db->where('production_id', $production_id);
        $this->db->delete('production_mix');
        $this->db->where('production_id', $production_id);
        $this->db->delete('production_mix_details');
        return true;
    }
    // outlet list
    public function outlet_list()
    {
        $user_id = $this->session->userdata('user_id');
        return $list = $this->db->select('*')
            ->from('outlet_warehouse')
            ->where('outlet_warehouse.user_id', $user_id)
            ->get()->result_array();
    }
    public function outlet_list_to()
    {
        $user_id = $this->session->userdata('user_id');
        return $list = $this->db->select('*')
            ->from('outlet_warehouse')
            //->where('outlet_warehouse.user_id',$user_id)
            ->get()->result_array();
    }

    public function autocompletproducttransfer($product_name)
    {
        $query = $this->db->select('*')
            ->from('product_information')
            //  ->join('product_category','product_information.category_id=product_category.category_id')
            ->where('finished_raw', 2)
            ->or_where('finished_raw', 3)
            //            ->like('product_name', $product_name, 'both')
            //            ->or_like('product_model', $product_name, 'both')
            ->order_by('product_name', 'asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function autocompletproductdata($product_name)
    {
        $this->db->select('*')
            ->from('product_information');


        $this->db->where('product_information.finished_raw', 1);


        $query =  $this->db->group_start()
            ->like('product_name', $product_name, 'both')
            ->or_like('sku', $product_name, 'both')
            ->group_end()
            ->order_by('product_name', 'asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function autocompletitemdata($product_name)
    {
        $query = $this->db->select('*')
            ->from('product_information')
            //  ->join('product_category','product_information.category_id=product_category.category_id')
            ->where('finished_raw', 2)
            //            ->like('product_name', $product_name, 'both')
            //            ->or_like('product_model', $product_name, 'both')
            ->order_by('product_name', 'asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function autocomplettoolsdata($product_name)
    {
        $query = $this->db->select('*')
            ->from('product_information')
            //  ->join('product_category','product_information.category_id=product_category.category_id')
            ->where('finished_raw', 3)
            //            ->like('product_name', $product_name, 'both')
            //            ->or_like('product_model', $product_name, 'both')
            ->order_by('product_name', 'asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
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

    public function autocompletprdata($product_name)
    {
        $query = $this->db->select('a.*,b.*')
            ->from('production_mix a')
            ->join('product_information b', 'a.product_id=b.product_id')
            //    ->where('ptype_id', 'CTD21CS566CCR52')
            //            ->like('product_name', $product_name, 'both')
            //            ->or_like('product_model', $product_name, 'both')
            ->group_by('b.product_id')
            ->order_by('b.product_name', 'asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    public function get_total_product_invoic($product_id, $customer_id = null)
    {
        $this->load->model('reports');
        $this->db->select('a.*,SUM(a.qty) as total_purchase,avg(rate) as a_rate');
        $this->db->from('product_purchase_details a');
        $this->db->where('a.product_id', $product_id);
        $total_purchase = $this->db->get()->row();

        $this->db->select('a.*');
        $this->db->from('product_information a');
        //   $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        //  $this->db->join('product_purchase_details c', 'a.product_id=c.product_id');
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));
        $product_information = $this->db->get()->row();


        $available_quantity = $this->reports->current_stock($product_id,1);

        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $taxfield = '';
        $taxvar = [];
        for ($i = 0; $i < $num_column; $i++) {
            $taxfield = 'tax' . $i;
            $data2[$taxfield] = $product_information->$taxfield;
            $taxvar[$i]       = $product_information->$taxfield;
            $data2['taxdta']  = $taxvar;
        }

        // $content =explode(',', $product_information->sn);

        //




        $data2['total_product']  = $available_quantity;
        $data2['product_id']  = $product_id;
        // $data2['supplier_price'] = $product_information->supplier_price;

        $data2['trans_unit']           = $product_information->trxn_unit;
        $data2['multiplier']           = $product_information->unit_multiplier;
        $data2['price']           = $total_purchase->a_rate;
        $data2['tax']            = $product_information->tax;

        $data2['discount_type']  = $currency_details[0]['discount_type'];
        $data2['txnmber']        = $num_column;

        //   echo "<pre>";print_r($data2);exit();
        return $data2;
    }
    public function get_total_product_production($product_id, $customer_id)
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');

        $this->db->select('a.*,SUM(a.quantity) as total_production');
        $this->db->from('production_goods a');
        $this->db->where('a.product_id', $product_id);
        $total_purchase = $this->db->get()->row();

        $this->db->select('SUM(b.quantity) as total_sale');
        $this->db->from('invoice_details b');
        $this->db->where('b.product_id', $product_id);
        $total_sale = $this->db->get()->row();

        $this->db->select('avg(grand_total) as price');
        $this->db->from('production_mix');
        $this->db->where('product_id', $product_id);
        $price = $this->db->get()->row();

        $this->db->select('a.*');
        $this->db->from('product_information a');
        //   $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        //  $this->db->join('product_purchase_details c', 'a.product_id=c.product_id');
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));
        $product_information = $this->db->get()->row();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        $taxfield = '';
        $taxvar = [];
        for ($i = 0; $i < $num_column; $i++) {
            $taxfield = 'tax' . $i;
            $data2[$taxfield] = $product_information->$taxfield;
            $taxvar[$i]       = $product_information->$taxfield;
            $data2['taxdta']  = $taxvar;
        }

        // $content =explode(',', $product_information->sn);

        //



        $available_quantity = $CI->Reports->getCheckList(null, $product_id)['central_stock'];
        $data2['total_product']  = $available_quantity;
        $data2['product_id']  = $product_id;
        // $data2['supplier_price'] = $product_information->supplier_price;

        $data2['unit']           = $product_information->unit;
        $data2['tax']            = $product_information->tax;
        $data2['price']            = $price->price;

        $data2['discount_type']  = $currency_details[0]['discount_type'];
        $data2['txnmber']        = $num_column;

        //   echo "<pre>";print_r($data2);exit();
        return $data2;
    }

    public function get_receive_product(){

        return  $this->db->select('a.*,b.product_name,b.sku,b.unit,c.production_cost')
            ->from('pr_rqsn_details a ')
            ->join('product_information b','a.product_id=b.product_id','left')
            ->join('production_cost c','a.product_id=c.product_id','left')
            ->get()->result_array();
    }

    // outlet list
    public function cw_list()
    {
        return  $this->db->select('*')
            ->from('central_warehouse a')
            // ->join('outlet_warehouse b','a.warehouse_id=b.warehouse_id')
            ->get()->result_array();
    }
    public function get_po_details($product_id, $supplier_id)
    {
        //        $this->db->select('SUM(a.quantity) as total_purchase,b.*');
        //        $this->db->from('product_purchase_details a');
        //        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        //        $this->db->where('a.product_id', $product_id);
        //        $this->db->where('b.supplier_id', $supplier_id);
        //        $total_purchase = $this->db->get()->row();
        //
        //        $this->db->select('SUM(b.quantity) as total_sale');
        //        $this->db->from('invoice_details b');
        //        $this->db->where('b.product_id', $product_id);
        //        $total_sale = $this->db->get()->row();

        $this->db->select('a.*,b.*,c.*');
        $this->db->from('product_information a');
        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->join('rqsn_details c', 'c.product_id=a.product_id');
        $this->db->where(array('c.rqsn_detail_id' => $product_id, 'c.status' => 4));
        $this->db->where('b.supplier_id', $supplier_id);
        //  $this->db->where('c.status', 4);
        $product_information = $this->db->get()->row();

        //  $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);

        $total_price = ($product_information->a_qty) * ($product_information->supplier_price);

        $CI = &get_instance();
        $CI->load->model('Web_settings');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data2 = array(
            'product_name'  => $product_information->product_name,
            'p_id'  => $product_information->product_id,
            'quantity'  => $product_information->a_qty,
            'supplier_price' => $product_information->supplier_price,
            'total_price' => $total_price,
            'price'          => $product_information->price,
            'supplier_id'    => $product_information->supplier_id,
            'unit'           => $product_information->unit,
            'tax'            => $product_information->tax,
            'discount_type'  => $currency_details[0]['discount_type'],
        );

        return $data2;
    }
    public function mix_entry()
    {
        // exit();
        $this->load->model('Web_settings');
        $production_id = mt_rand();

        //    echo "Ok";exit();

        //Data inserting into invoice table
        $datarq = array(
            'production_id'     => $production_id,
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
        $this->db->insert('production_mix', $datarq);


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



        return $production_id;
    }

    public function goods_entry()
    {
        $this->load->model('Web_settings');
        $pro_id = mt_rand();

        //    echo "Ok";exit();
        $exp_head = $this->input->post('expense_head', true);
        $exp_amount = $this->input->post('exp_amount', true);
        $exp_pay = $this->input->post('exp_payment', true);

        $bank_id = $this->input->post('exp_bank_id', TRUE);

        $base_no = $this->input->post('base_number', true);

        $datarq = array(
            'pro_id'     => $pro_id,
            'base_number'    => $base_no,
            'total'    => $this->input->post('total', true),
            'date'            => (!empty($this->input->post('date', true)) ? $this->input->post('date', true) : date('Y-m-d')),
            'remark'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Production Goods'),
            'status'   => 1,
        );

        //echo '<pre>';print_r($datarq);exit();
        $this->db->insert('production', $datarq);


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
//
//            $this->db->where('product_id', $product_id);
//            $this->db->set('price', $transfer_price);
//            $this->db->update('product_information');
        }
//
//        $items = $this->db->select('*')
//            ->from('production_mix a')
//            ->join('production_mix_details b', 'a.production_id=b.production_id')
//            ->where('a.product_id', $product_id)
//            ->get()->result();
//
//        foreach ($items as $i) {
//
//            $usage_qty = ($i->quantity) * $qty;
//
//            $data_items = array(
//                'production_id' => $pro_id,
//                'item_usage_id' => mt_rand(),
//                'item_id' => $i->item_id,
//                'usage_qty' => $usage_qty,
//
//            );
//            $this->db->insert('item_usage', $data_items);
//        }

        $createdate = date('Y-m-d H:i:s');
        $createby = $this->session->userdata('user_id');



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

        //  echo '<pre>';print_r($data_items);exit();

        return $pro_id;
    }
    public function rcv_goods_entry()
    {
        $this->load->model('Web_settings');
        $pro_id = mt_rand();

        //    echo "Ok";exit();
        $exp_head = $this->input->post('expense_head', true);
        $exp_amount = $this->input->post('exp_amount', true);
        $exp_pay = $this->input->post('exp_payment', true);

        $bank_id = $this->input->post('exp_bank_id', TRUE);

        $base_no = $this->input->post('base_number', true);

        $datarq = array(
            'pro_id'     => $pro_id,
            'base_number'    => $base_no,
            'total'    => $this->input->post('total', true),
            'date'            => (!empty($this->input->post('date', true)) ? $this->input->post('date', true) : date('Y-m-d')),
            'remark'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Production Goods'),
            'status'   => 1,
        );

        //echo '<pre>';print_r($datarq);exit();
        $this->db->insert('production', $datarq);


        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $price_rate             = $this->input->post('qty_price', true);
        $rcv_qty             = $this->input->post('rcv_qty', true);
        // $unit             = $this->input->post('unit',true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $price  = $price_rate[$i];
            $product_id   = $p_id[$i];
            $r_q   = $rcv_qty[$i];
            $transfer_price =  $this->input->post('transfer_price', true);


            $goods_details = array(
                'pro_id'     => $pro_id,
                'production_goods_id'     => mt_rand(),
                'product_id'         => $product_id,
                'price'         => $price,
                'per_unit_cost'     => $this->input->post('per_item_extra_cost', true),
                'transfer_cost'     => $transfer_price,
                'quantity'                => $qty,
                'rcv_qty'                => $r_q,
                'status'                => 1,

            );
            // echo '<pre>';print_r($mix_details);exit();
            if (!empty($quantity)) {
                $this->db->insert('production_goods', $goods_details);

                $this->db->set('isrcv', 1);
                $this->db->where('product_id', $product_id);
                $this->db->update('pr_rqsn_details');
            }

            $this->db->set('isrcv', 1);
            $this->db->where('product_id', $product_id);
            $this->db->update('pr_rqsn_details');
//
//            $this->db->where('product_id', $product_id);
//            $this->db->set('price', $transfer_price);
//            $this->db->update('product_information');
        }
//
//        $items = $this->db->select('*')
//            ->from('production_mix a')
//            ->join('production_mix_details b', 'a.production_id=b.production_id')
//            ->where('a.product_id', $product_id)
//            ->get()->result();
//
//        foreach ($items as $i) {
//
//            $usage_qty = ($i->quantity) * $qty;
//
//            $data_items = array(
//                'production_id' => $pro_id,
//                'item_usage_id' => mt_rand(),
//                'item_id' => $i->item_id,
//                'usage_qty' => $usage_qty,
//
//            );
//            $this->db->insert('item_usage', $data_items);
//        }

        $createdate = date('Y-m-d H:i:s');
        $createby = $this->session->userdata('user_id');



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

        //  echo '<pre>';print_r($data_items);exit();

        return $pro_id;
    }

    public function transfer_item()
    {
        $this->load->model('Web_settings');
        $pro_id = mt_rand();



        $production_number = $this->input->post('production_number', true);

        $datarq = array(
            'pro_id'     => $pro_id,
            'production_number'    => $production_number,
            'total'    => $this->input->post('total', true),
            'date'            => (!empty($this->input->post('date', true)) ? $this->input->post('date', true) : date('Y-m-d')),
            'remark'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Production Goods'),
            'status'   => 1,
        );

        //echo '<pre>';print_r($datarq);exit();
        $this->db->insert('transfer_items', $datarq);


        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $price_rate             = $this->input->post('qty_price', true);
        // $unit             = $this->input->post('unit',true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $price  = $price_rate[$i];
            $product_id   = $p_id[$i];



            $goods_details = array(
                'pro_id'     => $pro_id,
                'transfer_item_id'     => mt_rand(),
                'product_id'         => $product_id,
                'price'         => $price,
                'quantity'                => $qty,
                'status'                => 1,

            );
            // echo '<pre>';print_r($mix_details);exit();
            if (!empty($quantity)) {
                $this->db->insert('transfer_item_details', $goods_details);
            }


        }



        //  echo '<pre>';print_r($data_items);exit();

        return $pro_id;
    }

    public function rqsn_entry_cw()
    {
        $this->load->model('Web_settings');
        $rqsn_id = mt_rand();

        //    echo "Ok";exit();

        //Data inserting into invoice table
        $datarq = array(
            'rqsn_id'     => $rqsn_id,
            'date'            => (!empty($this->input->post('invoice_date', true)) ? $this->input->post('invoice_date', true) : date('Y-m-d')),
            'details'         => (!empty($this->input->post('inva_details', true)) ? $this->input->post('inva_details', true) : 'Reacquisition'),
            'from_id' => $this->input->post('from_id', true),
            'to_id'  => $this->input->post('to_id', true),
            'status'   => 1,
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

        $this->db->insert('production', $datarq);


        $quantity            = $this->input->post('product_quantity', true);
        $p_id             = $this->input->post('product_id', true);
        $unit             = $this->input->post('unit', true);


        for ($i = 0, $n   = count($p_id); $i < $n; $i++) {
            $qty  = $quantity[$i];
            $un  = $unit[$i];
            $product_id   = $p_id[$i];


            $rqsn_details = array(
                'rqsn_detail_id'     => 'PO' . mt_rand(),
                'rqsn_id'     => $rqsn_id,
                'product_id'         => $product_id,
                'quantity'                => $qty,
                'unit'                => $un,
                'status'                => 1,

            );
            if (!empty($quantity)) {
                $this->db->insert('rqsn_details', $rqsn_details);
            }
        }

        return $rqsn_id;
    }


    public function approve_rqsn_count()
    {
        $query = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('a.to_id', 'HK7TGDT69VFMXB7')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return $query;
    }



    public function approve_rqsn()
    {

        ## Fetch records
        $records = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('a.to_id', 'HK7TGDT69VFMXB7')
            ->get()
            ->result();

        // $data = array();

        $sl = 1;





        foreach ($records as $record) {
            $stockin = $this->db->select('sum(quantity) as totalSalesQnty')->from('invoice_details')->where('product_id', $record->product_id)->get()->row();
            // $stock_r = $this->db->select('sum(a_qty) as totalQty')->from('rqsn_details')->where('product_id',$record->product_id)->where('status',2)->get()->row();
            $warrenty_stock = $this->db->select('sum(ret_qty) as totalWarrentyQnty')->from('warrenty_return')->where('product_id', $record->product_id)->get()->row();
            //$wastage_stock = $this->db->select('sum(ret_qty) as totalWastageQnty')->from('warrenty_return')->where('product_id',$record->product_id,'usablity',3)->get()->row();
            $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,Avg(rate) as purchaseprice')->from('product_purchase_details')->where('product_id', $record->product_id)->get()->row();

            $stock_r = $this->db->select('sum(a.a_qty) as totalQty')
                ->from('rqsn_details a')
                ->join('production b', 'a.rqsn_id=b.rqsn_id')
                ->where('a.product_id', $record->product_id)
                //  ->where('b.to_id','HK7TGDT69VFMXB7')
                ->where('a.iscw', 1)->get()->row();

            //   $out_qty=(!empty($stockin->totalSalesQnty)?$stockin->totalSalesQnty:0)+(!empty($stock_r->totalQty)?$stock_r->totalQty:0);
            $sprice = (!empty($record->price) ? $record->price : 0);
            $pprice = (!empty($stockout->purchaseprice) ? sprintf('%0.2f', $stockout->purchaseprice) : 0);
            $stock =  (!empty($stockout->totalPurchaseQnty) ? $stockout->totalPurchaseQnty : 0) - ((!empty($stockin->totalSalesQnty) ? $stockin->totalSalesQnty : 0) + (!empty($stock_r->totalQty) ? $stock_r->totalQty : 0));
            $newStock = (!empty($warrenty_stock->totalWarrentyQnty) ? $warrenty_stock->totalWarrentyQnty : 0);
            $qty = $stock - $newStock;
            $t = (!empty($qty) ? $qty : 0);

            //           if($qty<0){
            //               $qty=0;
            //           }else{
            //               $qty=$t;
            //           }

            $data[] = array(

                // 'cw_id'=>$record->to_id,

                'outlet_name' => $record->outlet_name,
                'date' => $record->date,
                'product_name' => $record->product_name,
                'quantity' => $record->quantity,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id,
                'stok_quantity' => sprintf('%0.2f', $t),

            );
        }

        ## Response


        return $data;
    }

    public function approve_rqsn_outlet_count()
    {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.to_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('c.user_id', $user_id)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return $query;
    }

    public function approve_rqsn_outlet()
    {

        ## Fetch records

        $user_id = $this->session->userdata('user_id');
        $records = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.to_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('c.user_id', $user_id)
            ->get()
            ->result();

        // $data = array();

        $sl = 1;





        foreach ($records as $record) {
            $stockin = $this->db->select('sum(quantity) as totalSalesQnty')->from('invoice_details')->where('product_id', $record->product_id)->get()->row();
            $warrenty_stock = $this->db->select('sum(ret_qty) as totalWarrentyQnty')->from('warrenty_return')->where('product_id', $record->product_id)->get()->row();
            //$wastage_stock = $this->db->select('sum(ret_qty) as totalWastageQnty')->from('warrenty_return')->where('product_id',$record->product_id,'usablity',3)->get()->row();
            $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,Avg(rate) as purchaseprice')->from('product_purchase_details')->where('product_id', $record->product_id)->get()->row();

            $outlet_name = $this->db->select('outlet_name')->from('outlet_warehouse')->where('outlet_id', $record->from_id)->get()->row();

            $this->db->select('a.*,c.*,d.*,SUM(a.a_qty) as total_purchase');
            $this->db->from('rqsn_details a');
            $this->db->join('production c', 'a.rqsn_id=c.rqsn_id');
            $this->db->join('outlet_warehouse d', 'c.from_id=d.outlet_id');
            $this->db->where('a.product_id', $record->product_id);
            $this->db->where('d.user_id', $user_id);
            $total_purchase = $this->db->get()->row();

            $this->db->select('SUM(b.quantity) as total_sale');
            $this->db->from('invoice_details b');
            $this->db->join('invoice d', 'd.invoice_id=b.invoice_id');
            //  $this->db->join('outlet_warehouse c','c.outlet_id=d.sales_by');
            $this->db->where('b.product_id', $record->product_id);
            $this->db->where('d.sales_by', $user_id);
            $total_sale = $this->db->get()->row();
            $stock_r = $this->db->select('a.*,c.*,b.*,sum(a.a_qty) as totalQty')
                ->from('rqsn_details a')
                ->join('production c', 'a.rqsn_id=c.rqsn_id')
                ->join('outlet_warehouse b', 'b.outlet_id=c.to_id')
                ->where('a.product_id', $record->product_id)
                ->where('b.outlet_id', $record->to_id)
                ->get()->row();


            $out_qty = (!empty($total_sale->total_sale) ? $total_sale->total_sale : 0) + (!empty($stock_r->totalQty) ? $stock_r->totalQty : 0);
            //  $out_qty=(!empty($stockin->totalSalesQnty)?$stockin->totalSalesQnty:0)+(!empty($stock_r->totalQty)?$stock_r->totalQty:0);
            //  $sprice = (!empty($record->price)?$record->price:0);
            // $pprice = (!empty($stockout->purchaseprice)?sprintf('%0.2f',$stockout->purchaseprice):0);
            // $stock =  (!empty($stockout->totalPurchaseQnty)?$stockout->totalPurchaseQnty:0)-$out_qty;
            $stock =  (!empty($total_purchase->total_purchase) ? $total_purchase->total_purchase : 0) - $out_qty;
            // $newStock=(!empty($warrenty_stock->totalWarrentyQnty)?$warrenty_stock->totalWarrentyQnty:0);



            $data[] = array(

                'outlet_name' => $outlet_name->outlet_name,
                'date' => $record->date,
                'product_name' => $record->product_name,
                'quantity' => $record->quantity,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id,
                'stok_quantity' => sprintf('%0.2f', $stock),

            );
        }

        ## Response


        return $data;
    }

    public function approve_chalan()
    {
        // $values = array("DV", "CV", "JV","Contra");

        return $approveinfo = $this->db->select('*')
            ->from('product_purchase_details a')
            //->join('rqsn_details b','a.rqsn_id=b.rqsn_id')
            ->join('product_purchase c', 'c.purchase_id=a.purchase_id')
            ->join('product_information d', 'd.product_id=a.product_id')
            ->where('a.status', 2)
            ->get()
            ->result();
    }


    public function rqsn_list()
    {
        // $values = array("DV", "CV", "JV","Contra");

        return $approveinfo = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 3)
            ->where('b.isaprv', 1)
            ->where('b.isrcv', 1)
            ->where('b.iscw', 1)
            ->where('a.to_id', 'HK7TGDT69VFMXB7')
            ->get()
            ->result();
    }

    public function rqsn_list_outlet()
    {
        $user_id = $this->session->userdata('user_id');
        $approveinfo = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.to_id')
            //  ->join('central_warehouse e','e.warehouse_id=a.to_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 3)
            ->where('b.isrcv', 1)
            ->where('b.iscw', 1)
            ->where('c.user_id', $user_id)
            ->get()
            ->result();



        foreach ($approveinfo as $record) {

            //            $cw=$this->db->select('*')
            //                ->from('production a')
            //                ->join('central_warehouse b','a.to_id=b.warehouse_id')
            //                ->where('a.to_id',$record->to_id)
            //                ->get()
            //                ->row();

            $from = $this->db->select('*')
                ->from('production a')
                ->join('outlet_warehouse b', 'a.from_id=b.outlet_id')
                ->join('central_warehouse e', 'e.warehouse_id=b.warehouse_id')
                ->where('a.from_id', $record->from_id)
                ->get()
                ->row();

            $to = $this->db->select('*')
                ->from('production a')
                ->join('outlet_warehouse b', 'a.to_id=b.outlet_id')
                ->where('a.to_id', $record->to_id)
                ->get()
                ->row();

            $data[] = array(
                // 'cw'=>$cw->central_warehouse,
                'from_id' => $record->from_id,
                'to_id' => $record->to_id,
                'rqsn_id' => $record->rqsn_id,

                'from' => $to->outlet_name,
                'to' => $from->outlet_name,
                'date' => $record->date,
                'product_name' => $record->product_name,
                'a_qty' => $record->a_qty,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id


            );
        }



        return $data;
    }


    public function approve_rqsn_purchase()
    {
        // $values = array("DV", "CV", "JV","Contra");

        return $approveinfo = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            //->join('outlet_warehouse c','c.outlet_id=a.from_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 1)
            ->where('a.to_id', 3)
            ->get()
            ->result();
    }
    public function approve_outlet()
    {
        // $values = array("DV", "CV", "JV","Contra");
        $user_id = $this->session->userdata('user_id');
        $approveinfo = $this->db->select('*')
            ->from('production a')
            ->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id')
            ->join('outlet_warehouse c', 'c.outlet_id=a.from_id')
            //  ->join('central_warehouse e','e.warehouse_id=a.to_id')
            ->join('product_information d', 'd.product_id=b.product_id')
            ->where('b.status', 2)
            // ->where('b.isaprv',1)
            ->where('c.user_id', $user_id)
            ->get()
            ->result();



        foreach ($approveinfo as $record) {

            $cw = $this->db->select('*')
                ->from('production a')
                ->join('central_warehouse b', 'a.to_id=b.warehouse_id')
                ->where('a.to_id', $record->to_id)
                ->get()
                ->row();

            $from = $this->db->select('*')
                ->from('production a')
                ->join('outlet_warehouse b', 'a.from_id=b.outlet_id')
                ->join('central_warehouse e', 'e.warehouse_id=b.warehouse_id')
                ->where('a.from_id', $record->from_id)
                ->get()
                ->row();

            $to = $this->db->select('*')
                ->from('production a')
                ->join('outlet_warehouse b', 'a.to_id=b.outlet_id')
                ->where('a.to_id', $record->to_id)
                ->get()
                ->row();

            $data[] = array(
                'cw' => $cw->central_warehouse,
                'from_id' => $record->from_id,
                'to_id' => $record->to_id,

                'from' => $to->outlet_name,
                'to' => $from->outlet_name,
                'date' => $record->date,
                'product_name' => $record->product_name,
                'a_qty' => $record->a_qty,
                'unit' => $record->unit,
                'details' => $record->details,
                'rqsn_detail_id' => $record->rqsn_detail_id


            );
        }



        return $data;
    }

    public function approved($data = [])
    {
        return $this->db->where('rqsn_detail_id', $data['rqsn_detail_id'])
            ->update('rqsn_details', $data);
    }

    public function chalan_received($data = [])
    {
        return $this->db->where('chalan_id', $data['chalan_id'])
            ->update('product_purchase_details', $data);
    }

    public function received($data = [])
    {
        return $this->db->where('rqsn_detail_id', $data['rqsn_detail_id'])
            ->update('rqsn_details', $data);
    }

    public function delete_rqsn($rqsn_id)
    {
        $this->db->where('rqsn_detail_id', $rqsn_id)
            ->delete('rqsn_details');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

    public function r_delete_rqsn($rqsn_id)
    {
        $this->db->where('rqsn_id', $rqsn_id)
            ->delete('production');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }



    public function retrieve_rqsn_editdata($req_id)
    {
        $this->db->select('a.*,b.*,c.*,d.*');
        $this->db->from('production a');
        //    $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->join('rqsn_details b', 'b.rqsn_id = a.rqsn_id');
        $this->db->join('outlet_warehouse d', 'd.outlet_id = a.from_id');
        //
        $this->db->join('product_information c', 'c.product_id = b.product_id');
        $this->db->where('a.rqsn_id', $req_id);
        $this->db->group_by('c.product_id');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function outlet_stock($postData = null)
    {
        $response = array();
        $user_id = $this->session->userdata('user_id');
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
            $searchQuery = " (d.product_name like '%" . $searchValue . "%' or d.product_model like '%" . $searchValue . "%') ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('product_information d');
        if ($searchValue != '') {
            $this->db->where($searchQuery);
        }
        $this->db->group_by('d.product_id');
        $records = $this->db->get()->num_rows();
        $totalRecords = $records;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('product_information d');
        if ($searchValue != '') {
            $this->db->where($searchQuery);
        }
        $this->db->group_by('d.product_id');
        $records = $this->db->get()->num_rows();
        $totalRecordwithFilter = $records;

        $user_id = $this->session->userdata('user_id');

        ## Fetch records
        $this->db->select("*");
        $this->db->from('production a');
        $this->db->join('rqsn_details b', 'a.rqsn_id=b.rqsn_id');
        $this->db->join('outlet_warehouse c', 'c.outlet_id=a.to_id');
        $this->db->join('product_information d', 'd.product_id=b.product_id');
        $this->db->where('b.status', 3);
        $this->db->or_where('b.status', 2);
        // $this->db->where('b.isrcv',1);
        //$this->db->where('b.isaprv',1);
        $this->db->where('c.user_id', $user_id);
        if ($searchValue != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->group_by('d.product_id');
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get()->result();
        $data = array();

        $sl = 1;





        foreach ($records as $record) {

            $stockin = $this->db->select('sum(a.quantity) as totalSalesQnty')
                ->from('invoice_details a')
                ->join('invoice d', 'd.invoice_id=a.invoice_id')
                // ->join('outlet_warehouse c','c.outlet_id=d.sales_by')
                ->where('a.product_id', $record->product_id)
                ->where('d.sales_by', $user_id)
                ->get()->row();
            $warrenty_stock = $this->db->select('sum(ret_qty) as totalWarrentyQnty')->from('warrenty_return')->where('product_id', $record->product_id)->get()->row();

            //$wastage_stock = $this->db->select('sum(ret_qty) as totalWastageQnty')->from('warrenty_return')->where('product_id',$record->product_id,'usablity',3)->get()->row();
            $stockout = $this->db->select('sum(qty) as totalPurchaseQnty,Avg(rate) as purchaseprice')->from('product_purchase_details')->where('product_id', $record->product_id)->get()->row();


            $sprice = (!empty($record->price) ? $record->price : 0);
            $pprice = (!empty($stockout->purchaseprice) ? sprintf('%0.2f', $stockout->purchaseprice) : 0);
            $stock =  (!empty($stockout->totalPurchaseQnty) ? $stockout->totalPurchaseQnty : 0) - (!empty($stockin->totalSalesQnty) ? $stockin->totalSalesQnty : 0);
            //  $newStock=(!empty($warrenty_stock->totalWarrentyQnty)?$warrenty_stock->totalWarrentyQnty:0);

            $to_id = $this->db->select('a.to_id')
                ->from('production a')
                ->join('outlet_warehouse b', 'b.outlet_id=a.to_id')
                ->where('b.user_id', $user_id)
                ->get()->row();

            $tr_qty = $this->db->select('c.*,sum(a.a_qty) as totalTrQty')
                ->from('rqsn_details a')
                ->join('production c', 'a.rqsn_id=c.rqsn_id')
                // ->join('outlet_warehouse b', 'b.outlet_id=c.from_id')
                ->where('a.product_id', $record->product_id)
                ->where('c.to_id', $to_id->to_id)
                ->where('a.isaprv', 1)
                //->where('isrcv',1)
                ->get()->row();

            $return_given = $this->db->select('sum(a.ret_qty) as totalReturnQnty')
                ->from('rqsn_return a')
                // ->join('production c', 'a.rqsn_id=c.rqsn_id')
                ->join('outlet_warehouse b', 'b.outlet_id=a.from_id')
                ->where('a.product_id', $record->product_id)
                ->where('b.user_id', $user_id)
                //->where('a.isaprv',1)
                //->where('isrcv',1)
                ->get()->row();



            //$return_given = $this->db->select('sum(ret_qty) as totalReturnQnty')->from('rqsn_return')->where('product_id',$record->product_id)->where('from_id', $to_id->to_id)->get()->row();




            $this->db->select('a.*,c.*,d.*,SUM(a.a_qty) as total_purchase');
            $this->db->from('rqsn_details a');
            $this->db->join('production c', 'a.rqsn_id=c.rqsn_id');
            $this->db->join('outlet_warehouse d', 'c.from_id=d.outlet_id');
            $this->db->where('a.product_id', $record->product_id);
            $this->db->where('d.user_id', $user_id);
            $this->db->where('a.isaprv', 1);
            $this->db->where('a.isrcv', 1);
            $total_purchase = $this->db->get()->row();

            $this->db->select('SUM(b.quantity) as total_sale');
            $this->db->from('invoice_details b');
            $this->db->join('invoice d', 'd.invoice_id=b.invoice_id');
            //  $this->db->join('outlet_warehouse c','c.outlet_id=d.sales_by');
            $this->db->where('b.product_id', $record->product_id);
            $this->db->where('d.sales_by', $user_id);
            $total_sale = $this->db->get()->row();

            $out_qty = (!empty($total_sale->total_sale) ? $total_sale->total_sale : 0) + (!empty($tr_qty->totalTrQty) ? $tr_qty->totalTrQty : 0);
            $stock =  (!empty($total_purchase->total_purchase) ? $total_purchase->total_purchase : 0) - $out_qty;

            $data[] = array(
                'sl'            =>   $sl,
                'product_name'  =>  $record->product_name,
                'product_model' =>  $record->product_model,
                'sales_price'   =>  sprintf('%0.2f', $sprice),
                'purchase_p'    =>  $pprice,
                'totalPurchaseQnty' => sprintf('%0.2f', $total_purchase->total_purchase),
                'totalSalesQnty' => sprintf('%0.2f', $tr_qty->totalTrQty),
                //'warrenty_stock'=>  $warrenty_stock->totalWarrentyQnty,
                //'wastage_stock'=>  $wastage_stock->totalWastageQnty,
                'dispatch' => $total_sale->total_sale,
                'return_given' => sprintf('%0.2f', $return_given->totalReturnQnty),
                'stok_quantity' => sprintf('%0.2f', $stock),
                'total_sale_price' => ($stock) * $sprice,
                'purchase_total' => ($stock) * $pprice,

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



    // customer information
    public function customer_info($customer_id)
    {
        return $this->db->select('*')
            ->from('customer_information')
            ->where('customer_id', $customer_id)
            ->get()
            ->row();
    }




    public function employees()
    {
        $this->db->select('*');
        $this->db->from('employee_history');
        $query = $this->db->get();
        $data = $query->result();

        $list[''] = 'Select Employee';
        if (!empty($data)) {
            foreach ($data as $value) {
                $list[$value->id] = $value->first_name . ' ' . $value->last_name;
            }
        }
        return $list;
    }

    public function get_prdoduction_mix_list()
    {
        $this->load->model('products');
        $det = $this->db->select('*,')
            ->from('production_mix a')
            ->join('production_mix_details b', 'a.production_id = b.production_id')
            ->group_by('a.production_id')
            ->get();

        if ($det->num_rows() < 1) {
            return false;
        }

        $pr_det = $det->result_array();
        // echo '<pre>';


        foreach ($pr_det as $k => $v) {
            $pr_id = $pr_det[$k]['product_id'];

            $pr_all_details = $this->products->get_single_pr_details($pr_id)[0];

            // print_r($pr_all_details);


            $pr_det[$k]['pr_details'] = $pr_all_details['product_name'] . '(' . $pr_all_details['product_model'] . ')' . '(' . $pr_all_details['color_name'] . ')' . '(' . $pr_all_details['size_name'] . ')' . '(' . $pr_all_details['category_name'] . ')';
        }

        // print_r($pr_det);

        return $pr_det;
    }

    public function get_prdocution_mix_details($production_mix_id)
    {
        $this->load->model('products');
        $this->load->model('reports');


        $query = $this->db->select('*,sum(a.quantity) as item_qty')
            ->from('production_mix_details a')
            ->where('a.production_id', $production_mix_id)
            ->group_by('a.item_id')
            ->get()
            ->result_array();

        $q2 = $this->db->select('product_id,
                                remark,
                                id as base_id,
                                production_id as base_mix_id,
                                total as base_total,
                                grand_total as base_grand_total,
                                date as base_date,
                                additional_charge,
                                labour_charge')
            ->from('production_mix')
            ->where('production_id', $production_mix_id)
            ->get()
            ->result_array();

        // echo '<pre>';
        // print_r($query);
        // exit();


        $base_pr_id = $q2[0]['product_id'];

        foreach ($query as $k => $v) {
            $pr_id = $query[$k]['item_id'];

            $base_pr_all_details = $this->products->get_single_pr_details($base_pr_id)[0];

            $pr_all_details = $this->products->get_single_pr_details($pr_id)[0];

            $item_s_details = $this->get_total_product_invoic($pr_id);

            // print_r($pr_all_details);

            $item_stock = $this->reports->getCheckList(null, $pr_id);

            $query[$k]['item_stock']  = $item_stock["central_stock"];
            $query[$k]['pr_status'] = $pr_all_details['pr_status'];
            $query[$k]['item_price'] = $item_s_details['price'];
            $query[$k]['multiplier'] = $item_s_details['multiplier'];
            $query[$k]['item_unit'] = $item_s_details['trans_unit'];

            $query[$k]['pr_details'] = html_escape($pr_all_details['product_name'] . '(' . $pr_all_details['product_model'] . ')' . '(' . $pr_all_details['color_name'] . ')' . '(' . $pr_all_details['size_name'] . ')' . '(' . $pr_all_details['category_name'] . ')');
            $query[$k]['base_pr_details'] = html_escape($base_pr_all_details['product_name'] . '(' . $base_pr_all_details['product_model'] . ')' . '(' . $base_pr_all_details['color_name'] . ')' . '(' . $base_pr_all_details['size_name'] . ')' . '(' . $base_pr_all_details['category_name'] . ')');

            foreach ($q2[0] as $k_2 => $v_2) {
                $query[$k][$k_2] = $v_2;
            }
        }
        // print_r($query);
        // exit();

        return $query;
    }

    public function get_production_list()
    {
        $this->load->model('products');

        $query = $this->db->select('*')
            ->from('production a')
            ->join('production_goods b', 'b.pro_id = a.pro_id')
            ->get()
            ->result_array();

        // echo '<pre>';
        // print_r($query);
        // exit();


        foreach ($query as $k => $v) {
            $pr_id = $query[$k]['product_id'];
            $pr_all_details = $this->products->get_single_pr_details($pr_id)[0];
            $query[$k]['pr_details'] = html_escape($pr_all_details['product_name'] . '(' . $pr_all_details['product_model'] . ')' . '(' . $pr_all_details['color_name'] . ')' . '(' . $pr_all_details['size_name'] . ')' . '(' . $pr_all_details['category_name'] . ')');
        }

        // print_r($query);
        // exit();

        return $query;
    }

    public function get_production_details()
    {
        $this->load->model('products');
        $this->load->model('reports');

        $query = $this->db->select('*')
            ->from('production a')
            ->join('production_goods b', 'b.pro_id = a.pro_id')
            ->get()
            ->result_array();

        foreach ($query as $k => $v) {
            $pr_id = $query[$k]['product_id'];
            $pr_all_details = $this->products->get_single_pr_details($pr_id)[0];

            $item_stock = $this->reports->getCheckList(null, $pr_id);


            $query[$k]['pr_stock']    = $item_stock['central_stock'];
            $query[$k]['pr_unit']    = $pr_all_details['trxn_unit'];
            $query[$k]['pr_details'] = html_escape($pr_all_details['product_name'] . '(' . $pr_all_details['product_model'] . ')' . '(' . $pr_all_details['color_name'] . ')' . '(' . $pr_all_details['size_name'] . ')' . '(' . $pr_all_details['category_name'] . ')');
        }


        // echo '<pre>';
        // print_r($query);
        // exit();

        return $query;
    }
}
