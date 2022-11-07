<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aggre extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //customer List
    public function aggre_list() {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function aggre_list_product() {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function aggre_list_count() {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //aggre Search Item
    public function aggre_search_item($aggre_id) {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->where('aggre_id ', $aggre_id );
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count customer
    public function aggre_entry($data) {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->where('status', 1);
        $this->db->where('aggre_name', $data['aggre_name']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('aggre_list', $data);
            return TRUE;
        }
    }

    //Retrieve customer Edit Data
    public function retrieve_aggre_editdata($aggre_id) {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->where('aggre_id', $aggre_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_aggre($data, $aggre_id) {
        $this->db->where('aggre_id', $aggre_id);
        $this->db->update('aggre_list', $data);
        return true;
    }

    // Delete customer Item
    public function delete_aggre($aggre_id) {
        $this->db->where('aggre_id', $aggre_id);
        $this->db->delete('aggre_list');
        return true;
    }

    public function headcode()
    {
        $query = $this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '1020303%'");
        return $query->row();
    }


    public function count_aggre_ledger()
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
    public function aggre_personal_data($customer_id)
    {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->where('id', $customer_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function aggre_buy($per_page, $page)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('a.*,b.HeadName');
        $this->db->from('acc_transaction a');
        $this->db->join('acc_coa b', 'a.COAID=b.HeadCode');
        $this->db->join('invoice i', 'i.invoice_id=a.VNo');
        $this->db->where('b.PHeadName', 'Aggregators Receivable');
        $this->db->where('a.IsAppove', 1);
        $this->db->where('i.outlet_id', $outlet_id);
        $this->db->order_by('a.VDate', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function aggre_buy_by_date($customer_id, $start,$end)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('a.*,b.HeadName');
        $this->db->from('acc_transaction a');
        $this->db->join('acc_coa b', 'a.COAID=b.HeadCode');
        $this->db->join('invoice i', 'i.invoice_id=a.VNo');
        $this->db->where('b.PHeadName', 'Aggregators Receivable');
        $this->db->where(array('b.aggre_id' => $customer_id, 'a.VDate >=' => $start, 'a.VDate <=' => $end));
        $this->db->where('a.IsAppove', 1);
        $this->db->where('i.outlet_id', $outlet_id);
        $this->db->order_by('a.VDate', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function aggre_list_ledger()
    {
        $this->db->select('*');
        $this->db->from('aggre_list');
        $this->db->order_by('aggre_name', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }



}
