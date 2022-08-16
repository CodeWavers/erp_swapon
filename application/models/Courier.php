<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courier extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //customer List
    public function category_list()
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function category_list_product()
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function category_list_count()
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Category Search Item
    public function category_search_item($courier_id)
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->where('courier_id', $courier_id);
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count customer
    public function category_entry($data)
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->where('status', 1);
        $this->db->where('courier_name', $data['courier_name']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('courier_name', $data);
            return TRUE;
        }
    }

    //Retrieve customer Edit Data
    public function retrieve_category_editdata($courier_id)
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->where('courier_id', $courier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function courier_data($courier_id)
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->where('id', $courier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_category($data, $courier_id)
    {
        $this->db->where('courier_id', $courier_id);
        $this->db->update('courier_name', $data);
        return true;
    }

    // Delete customer Item
    public function delete_category($courier_id)
    {
        $this->db->where('courier_id', $courier_id);
        $this->db->delete('courier_name');
        return true;
    }

    //    public function branch_list() {
    //        $this->db->select('a.*,b.*');
    //        $this->db->from('branch_name a');
    //        $this->db->join('courier_name b ','b.courier_id = a.courier_id');
    //        // $this->db->join('product_purchase d', 'd.purchase_id = a.purchase_id');
    //        $this->db->where('status', 1);
    //        $query = $this->db->get();
    //        if ($query->num_rows() > 0) {
    //            return $query->result_array();
    //        }
    //        return false;
    //   }

    //customer List
    public function branch_list()
    {
        $this->db->select('a.*,b.*');
        $this->db->from('branch_name a');
        $this->db->join('courier_name b ', 'b.courier_id = a.courier_id', 'left');
        // $this->db->join('product_purchase d', 'd.purchase_id = a.purchase_id');
        $this->db->where('a.status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function branch_list_product()
    {
        $this->db->select('*');
        $this->db->from('branch_name');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function branch_list_count()
    {
        $this->db->select('*');
        $this->db->from('branch_name');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Category Search Item
    public function branch_search_item($courier_id)
    {
        $this->db->select('*');
        $this->db->from('branch_name');
        $this->db->where('branch_id', $courier_id);
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function branch_by_courier($id) {
        $this->db->select('*');
        $this->db->from('branch_name');
        $this->db->where('courier_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function charge_by_branch($id) {
        $this->db->select('*');
        $this->db->from('branch_name');
        $this->db->where('branch_id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count customer
    public function branch_entry($data)
    {
        $this->db->select('*');
        $this->db->from('branch_name');
        $this->db->where('status', 1);
        $this->db->where('branch_name', $data['branch_name']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('branch_name', $data);
            return TRUE;
        }
    }

    //Retrieve customer Edit Data
    public function retrieve_branch_editdata($courier_id)
    {
        $this->db->select('a.*');
        $this->db->from('branch_name a');
        // $this->db->join('courier_name b','b.courier_id=a.courier_id');
        $this->db->where('a.branch_id', $courier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_branch($data, $courier_id)
    {
        $this->db->where('branch_id', $courier_id);
        $this->db->update('branch_name', $data);
        return true;
    }

    // Delete customer Item
    public function delete_branch($courier_id)
    {
        $this->db->where('branch_id', $courier_id);
        $this->db->delete('branch_name');
        return true;
    }

    public function get_courier_list()
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->order_by('courier_name', 'asc');
        $this->db->where('status', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_branch_list()
    {
        $this->db->select('a.*,b.*');
        $this->db->from('branch_name a');
        $this->db->join('courier_name b', 'b.courier_id=a.courier_id');
        $this->db->where('a.status', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_receiver_list()
    {
        $query = $this->db->select('*')
            ->from('receiever_info')
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;
    }

    public function headcode()
    {
        $query = $this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='3' And HeadCode LIKE '10206%'");
        return $query->row();
    }

    public function count_courier_ledger()
    {
        $this->db->select('a.*,b.HeadName');
        $this->db->from('acc_transaction a');
        $this->db->join('acc_coa b', 'a.COAID=b.HeadCode');
        $this->db->where('b.PHeadName', 'Customer Receivable');
        $this->db->where('a.IsAppove', 1);
        $this->db->order_by('a.VDate', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    public function courier_list_ledger()
    {
        $this->db->select('*');
        $this->db->from('courier_name');
        $this->db->order_by('courier_name', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function courier_product_buy($per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('a.*,b.HeadName');
        $this->db->from('acc_transaction a');
        $this->db->join('acc_coa b', 'a.COAID=b.HeadCode');
        $this->db->join('invoice i', 'i.invoice_id=a.VNo');
        $this->db->where('b.PHeadName', 'Courier Ledger');
        $this->db->where('a.IsAppove', 1);
//        $this->db->where('i.outlet_id', $outlet_id);
        $this->db->order_by('a.VDate', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function courierledger_searchdata($customer_id, $start, $end)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
//        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('a.*,b.HeadName');
        $this->db->from('acc_transaction a');
        $this->db->join('acc_coa b', 'a.COAID=b.HeadCode');
        $this->db->join('invoice i', 'i.invoice_id=a.VNo');
//        $this->db->where('i.outlet_id', $outlet_id);
        $this->db->where(array('b.courier_id' => $customer_id, 'a.VDate >=' => $start, 'a.VDate <=' => $end));
        $this->db->where('a.IsAppove', 1);
        $this->db->order_by('a.VDate', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_invoice_data()
    {
        $this->db->select('a.*, b.*, c.courier_name,c.id as c_id,d.branch_name');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
        $this->db->join('courier_name c', 'c.courier_id = a.courier_id','left');
        $this->db->join('branch_name d', 'd.branch_id = a.branch_id','left');
        $this->db->where('a.delivery_type','2');
        $this->db->order_by('a.invoice','desc');
//        $this->db->where('a.courier_paid',0);



        // $this->db->join('supplier_information d', 'd.supplier_id = b.supplier_id');

        $query = $this->db->get();

        // echo '<pre>'; print_r($query->result_array()); die();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;


    }




}
