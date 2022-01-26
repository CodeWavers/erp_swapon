<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lcourier {

    //Retrieve  category List	
    public function category_list() {
        $CI = & get_instance();
        $CI->load->model('Courier');
        $category_list = $CI->Courier->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Manage Courier',
            'category_list' => $category_list,
        );
        $categoryList = $CI->parser->parse('courier/courier', $data, true);
        return $categoryList;
    }

    //Sub Category Add
    public function category_add_form() {
        $CI = & get_instance();
        $CI->load->model('Courier');
         $category_list = $CI->Courier->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Courier',
            'category_list' => $category_list,
        );
        $categoryForm = $CI->parser->parse('courier/add_courier_form', $data, true);
        return $categoryForm;
    }

    //category Edit Data
    public function category_edit_data($courier_id) {
        $CI = & get_instance();
        $CI->load->model('Courier');
        $category_detail = $CI->Courier->retrieve_category_editdata($courier_id);

        $data = array(
            'title'         =>'Courier Name Edit',
            'courier_id'   => $category_detail[0]['courier_id'],
            'courier_name' => $category_detail[0]['courier_name'],
            'status'        => $category_detail[0]['status']
        );


      //  echo '<pre>';print_r($data);exit();
        $chapterList = $CI->parser->parse('courier/edit_courier_form', $data, true);
        return $chapterList;
    }




    //Retrieve  category List
    public function branch_list() {
        $CI = & get_instance();
        $CI->load->model('Courier');
        $category_list = $CI->Courier->branch_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Manage Courier',
            'category_list' => $category_list,
        );

        $categoryList = $CI->parser->parse('courier/branch', $data, true);
        return $categoryList;
    }

    //Sub Category Add
    public function branch_add_form() {
        $CI = & get_instance();
        $CI->load->model('Courier');
        $courier_list = $CI->Courier->get_courier_list();
        $category_list = $CI->Courier->branch_list();
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Courier',
            'category_list' => $category_list,
            'courier_list' => $courier_list,
        );
        //echo '<pre>';print_r($data);exit();
        $categoryForm = $CI->parser->parse('courier/add_branch_form', $data, true);
        return $categoryForm;
    }

    //category Edit Data
    public function branch_edit_data($courier_id) {
        $CI = & get_instance();
        $CI->load->model('Courier');
        $courier_list= $CI->Courier->get_courier_list();
        $category_detail = $CI->Courier->retrieve_branch_editdata($courier_id);

        $data = array(
            'title'         =>'Branch Name Edit',
            'branch_id'   => $category_detail[0]['branch_id'],
            'branch_name' => $category_detail[0]['branch_name'],
           // 'courier_name' => $category_detail[0]['courier_name'],
            //'courier_list'=>$courier_list,
            'status'        => $category_detail[0]['status']
        );


        //  echo '<pre>';print_r($data);exit();
        $chapterList = $CI->parser->parse('courier/edit_branch_form', $data, true);
        return $chapterList;
    }

}

?>