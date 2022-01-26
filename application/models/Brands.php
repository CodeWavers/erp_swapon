<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brands extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //customer List
    public function category_list() {
        $this->db->select('*');
        $this->db->from('product_brand');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function category_list_product() {
        $this->db->select('*');
        $this->db->from('product_brand');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //customer List
    public function category_list_count() {
        $this->db->select('*');
        $this->db->from('product_brand');
        $this->db->where('status', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Category Search Item
    public function category_search_item($brand_id) {
        $this->db->select('*');
        $this->db->from('product_brand');
        $this->db->where('brand_id ', $brand_id );
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count customer
    public function category_entry($data) {
        $this->db->select('*');
        $this->db->from('product_brand');
        $this->db->where('status', 1);
        $this->db->where('brand_name', $data['brand_name']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('product_brand', $data);
            return TRUE;
        }
    }

    //Retrieve customer Edit Data
    public function retrieve_category_editdata($brand_id) {
        $this->db->select('*');
        $this->db->from('product_brand');
        $this->db->where('brand_id', $brand_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_category($data, $brand_id) {
        $this->db->where('brand_id', $brand_id);
        $this->db->update('product_brand', $data);
        return true;
    }

    // Delete customer Item
    public function delete_category($brand_id) {
        $this->db->where('brand_id', $brand_id);
        $this->db->delete('product_brand');
        return true;
    }

}
