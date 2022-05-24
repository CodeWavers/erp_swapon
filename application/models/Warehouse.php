<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warehouse extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //customer List
    public function category_list()
    {
        $this->db->select('*');
        $this->db->from('central_warehouse');
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
        $this->db->from('central_warehouse');
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
        $this->db->from('central_warehouse');
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
        $this->db->from('central_warehouse');
        $this->db->where('warehouse_id', $courier_id);
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
        $this->db->from('central_warehouse');
        $this->db->where('status', 1);
        $this->db->where('central_warehouse', $data['central_warehouse']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('central_warehouse', $data);
            return TRUE;
        }
    }

    //Retrieve customer Edit Data
    public function retrieve_category_editdata($courier_id)
    {
        $this->db->select('*');
        $this->db->from('central_warehouse');
        $this->db->where('warehouse_id', $courier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_category($data, $courier_id)
    {
        $this->db->where('warehouse_id', $courier_id);
        $this->db->update('central_warehouse', $data);
        return true;
    }

    // Delete customer Item
    public function delete_category($courier_id)
    {
        $this->db->where('warehouse_id', $courier_id);
        $this->db->delete('central_warehouse');
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
        $this->db->select('a.*,b.*, d.*,a.outlet_id as out_id');
        $this->db->from('outlet_warehouse a');
        $this->db->join('central_warehouse b ', 'b.warehouse_id = a.warehouse_id', 'left');
        $this->db->join('users d', 'd.user_id = a.user_id');
        // $this->db->join('customer_information d','d.customer_id=a.customer_id');
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
        $user_id = $this->session->userdata('user_id');

        $this->db->select('*');
        $this->db->from('outlet_warehouse');
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
        $this->db->from('outlet_warehouse');
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
        $this->db->from('outlet_warehouse');
        $this->db->where('outlet_id', $courier_id);
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
        $this->db->from('outlet_warehouse');
        $this->db->where('status', 1);
        $this->db->where('outlet_name', $data['outlet_name']);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            $this->db->insert('outlet_warehouse', $data);
            return TRUE;
        }
    }

    //Retrieve customer Edit Data
    public function retrieve_branch_editdata($courier_id)
    {
        $this->db->select('a.*,b.*');
        $this->db->from('outlet_warehouse a');
        // $this->db->join('courier_name b','b.courier_id=a.courier_id');
        $this->db->join('users b', 'b.user_id=a.user_id');
        $this->db->where('a.outlet_id', $courier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_branch($data, $courier_id)
    {
        $this->db->where('outlet_id', $courier_id);
        $this->db->update('outlet_warehouse', $data);
        return true;
    }

    // Delete customer Item
    public function delete_branch($courier_id)
    {
        $this->db->where('outlet_id', $courier_id);
        $this->db->delete('outlet_warehouse');
        return true;
    }

    public function get_courier_list()
    {
        $this->db->select('*');
        $this->db->from('central_warehouse');
        $this->db->order_by('central_warehouse', 'asc');
        $this->db->where('status', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_user_list()
    {
        $this->db->select('*');
        $this->db->from('users');
        // $this->db->order_by('central_warehouse','asc');
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
        $this->db->from('outlet_warehouse a');
        $this->db->join('central_warehouse b', 'b.courier_id=a.courier_id');

        $this->db->where('a.status', 1);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function get_outlet_user()
    {
        $user_id = $this->session->userdata('user_id');

        $this->db->select('*');
        $this->db->from('outlet_warehouse');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;
    }

    public function central_warehouse()
    {
        $this->db->select('*');
        $this->db->from('central_warehouse');

        return $this->db->get()->result_array();
    }

    public function get_outlet_users($outlet_id)
    {
        $user_id = $this->session->userdata('user_id');

        $this->db->select('*');
        $this->db->from('outlet_warehouse a');
        $this->db->where('a.outlet_id', $outlet_id);
        $this->db->join('users b', 'b.user_id = a.user_id');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

        return false;
    }

    public function get_all_outlet()
    {
        $q = $this->db->select('*')
            ->from('outlet_warehouse')
            ->get()
            ->result_array();

        return $q;
    }

    public function cw_and_outlet_merged()
    {
        $outlet_list = $this->Warehouse->get_all_outlet();
        $central = $this->Warehouse->central_warehouse();

        foreach ($central as $k => $v) {
            $central[$k]['outlet_id'] = $central[$k]['warehouse_id'];
            $central[$k]['outlet_name'] = $central[$k]['central_warehouse'];
        }

        foreach ($outlet_list as $outlet) {
            array_push($central, $outlet);
        }

        // echo '<pre>';
        // print_r($central);
        // exit();

        return $central;
    }

    public function outlet_or_cw_logged_in()
    {
        $outlet = $this->get_outlet_user();

        if (!$outlet) {
            $outlet = $this->db->select('warehouse_id as outlet_id, central_warehouse as outlet_name')
                ->from('central_warehouse')
                ->get()
                ->result_array();
        }

        return $outlet;
    }

    public function get_outlet_or_cw_info($outlet_id)
    {
        if ($outlet_id == "HK7TGDT69VFMXB7") {
            $outlet = $this->db->select('warehouse_id as outlet_id, central_warehouse as outlet_name')
                ->from('central_warehouse')
                ->get()
                ->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('outlet_warehouse');
            $this->db->where('outlet_id', $outlet_id);
            $outlet = $this->db->get()->result_array();
        }

        return $outlet;
    }

    public function is_cw_logged_in()
    {
        $user_id = $this->session->userdata('user_id');

        $this->db->select('*');
        $this->db->from('outlet_warehouse');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return false;
        }

        return true;
    }

    public function get_outlet_by_user_id($user_id)
    {
        $this->db->select('*');
        $this->db->from('outlet_warehouse');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array()[0]['outlet_name'];
        }

        return $this->central_warehouse()[0]['central_warehouse'];
    }
}
