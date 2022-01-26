<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ptype extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //customer List
    public function category_list($pr_status = null)
    {
        $this->db->select('*');
        $this->db->from('product_type');
        $this->db->where('status', 1);

        if ($pr_status) {
            $this->db->where('finished_raw', $pr_status);
        }

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
        $this->db->from('product_type');
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
        $this->db->from('product_type');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Category Search Item
    public function category_search_item($ptype_id)
    {
        $this->db->select('*');
        $this->db->from('product_type');
        $this->db->where('ptype_id ', $ptype_id);
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
        $this->db->from('product_type');
        $this->db->where('status', 1);
        $this->db->where('ptype_name', $data['ptype_name']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('product_type', $data);
            return TRUE;
        }
    }

    //Retrieve customer Edit Data
    public function retrieve_category_editdata($ptype_id)
    {
        $this->db->select('*');
        $this->db->from('product_type');
        $this->db->where('ptype_id', $ptype_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_category($data, $ptype_id)
    {
        $this->db->where('ptype_id', $ptype_id);
        $this->db->update('product_type', $data);
        return true;
    }

    // Delete customer Item
    public function delete_category($ptype_id)
    {
        $this->db->where('ptype_id', $ptype_id);
        $this->db->delete('product_type');
        return true;
    }
}
