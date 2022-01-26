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


}
