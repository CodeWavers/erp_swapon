<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lwarehouse {

    //Retrieve  category List
    public function category_list() {
        $CI = & get_instance();
        $CI->load->model('Warehouse');
        $category_list = $CI->Warehouse->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Manage Warehouse',
            'category_list' => $category_list,
        );
        $categoryList = $CI->parser->parse('warehouse/cw', $data, true);
        return $categoryList;
    }

    //Sub Category Add
    public function category_add_form() {
        $CI = & get_instance();
        $CI->load->model('Warehouse');
         $category_list = $CI->Warehouse->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Warehouse',
            'category_list' => $category_list,
        );
        $categoryForm = $CI->parser->parse('warehouse/add_cw_form', $data, true);
        return $categoryForm;
    }

    //category Edit Data
    public function category_edit_data($courier_id) {
        $CI = & get_instance();
        $CI->load->model('Warehouse');
        $category_detail = $CI->Warehouse->retrieve_category_editdata($courier_id);

        $data = array(
            'title'         =>'Warehouse Name Edit',
            'warehouse_id'   => $category_detail[0]['warehouse_id'],
            'central_warehouse' => $category_detail[0]['central_warehouse'],
            'status'        => $category_detail[0]['status']
        );


      //  echo '<pre>';print_r($data);exit();
        $chapterList = $CI->parser->parse('warehouse/edit_cw_form', $data, true);
        return $chapterList;
    }




    //Retrieve  category List
    public function branch_list() {
        $CI = & get_instance();
        $CI->load->model('Warehouse');
        $category_list = $CI->Warehouse->branch_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Manage Warehouse',
            'category_list' => $category_list,
        );

        $categoryList = $CI->parser->parse('warehouse/ow', $data, true);
        return $categoryList;
    }

    //Sub Category Add
    public function branch_add_form() {
        $CI = & get_instance();
        $CI->load->model('Warehouse');
        $CI->load->model('Customers');
        $warehouse_list = $CI->Warehouse->get_courier_list();
        $users_list = $CI->Warehouse->get_user_list();
        $customer_list = $CI->Customers->customer_list();
        $category_list = $CI->Warehouse->branch_list();
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Warehouse',
            'category_list' => $category_list,
            'warehouse_list' => $warehouse_list,
            'users_list' => $users_list,
            'customer_list' => $customer_list
        );
        //echo '<pre>';print_r($data);exit();
        $categoryForm = $CI->parser->parse('warehouse/add_ow_form', $data, true);
        return $categoryForm;
    }

    //category Edit Data
    public function branch_edit_data($courier_id) {
        $CI = & get_instance();
        $CI->load->model('Warehouse');
        $courier_list= $CI->Warehouse->get_courier_list();
        $user_list= $CI->Warehouse->get_user_list();
        $category_detail = $CI->Warehouse->retrieve_branch_editdata($courier_id);

        $data = array(
            'title'         =>'Branch Name Edit',
            'outlet_id'   => $category_detail[0]['outlet_id'],
            'outlet_name' => $category_detail[0]['outlet_name'],
            'user_id'   => $category_detail[0]['user_id'],
            'first_name' => $category_detail[0]['first_name'],
            'last_name' => $category_detail[0]['last_name'],
           // 'courier_name' => $category_detail[0]['courier_name'],
            'user_list'=>$user_list,
            'status'        => $category_detail[0]['status']
        );


        //  echo '<pre>';print_r($data);exit();
        $chapterList = $CI->parser->parse('warehouse/edit_ow_form', $data, true);
        return $chapterList;
    }

}

?>