<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_settings extends CI_Model
{

    private $table = "language";
    private $phrase = "phrase";

    public function __construct()
    {
        parent::__construct();
    }

    //Retrieve Setting Edit Data
    public function retrieve_setting_editdata()
    {
        $this->db->select('*');
        $this->db->from('web_setting');
        $this->db->where('setting_id', 1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_setting($data)
    {
        $this->db->where('setting_id', 1);
        $this->db->update('web_setting', $data);
        return true;
    }

    public function app_settingsdata()
    {
        return $result = $this->db->select('*')
            ->from('app_setting')
            ->get()
            ->result_array();
    }

    public function languages()
    {
        if ($this->db->table_exists($this->table)) {

            $fields = $this->db->field_data($this->table);

            $i = 1;
            foreach ($fields as $field) {
                if ($i++ > 2)
                    $result[$field->name] = ucfirst($field->name);
            }

            if (!empty($result))
                return $result;
        } else {
            return false;
        }
    }

    // currency list
    public function currency_list()
    {
        $this->db->select('*');
        $this->db->from('currency_tbl');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
    // Bank list
    public function bank_list()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('*');
        $this->db->from('bank_add');
        // $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function outletwise_bank_list($outlet_id)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');

        $this->db->select('*');
        $this->db->from('bank_add');
        $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function bkash_list()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('*');
        $this->db->from('bkash_add');
        // $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function outletwise_bkash_list($outlet_id)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');

        $this->db->select('*');
        $this->db->from('bkash_add');
        $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function nagad_list()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('*');
        $this->db->from('nagad_add');
        // $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function rocket_list()
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');
        $outlet_id = $CI->Warehouse->outlet_or_cw_logged_in()[0]['outlet_id'];

        $this->db->select('*');
        $this->db->from('rocket_add');
        // $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function outletwise_nagad_list($outlet_id)
    {
        $CI = &get_instance();
        $CI->load->model('Warehouse');

        $this->db->select('*');
        $this->db->from('nagad_add');
        $this->db->where('outlet_id', $outlet_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
}
