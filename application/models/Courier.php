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
        $query = $this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='3' And HeadCode LIKE '40401%'");
        return $query->row();
    }

}
