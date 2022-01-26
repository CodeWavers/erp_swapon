<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lptype {

    //Retrieve  category List
    public function category_list() {
        $CI = & get_instance();
        $CI->load->model('Ptype');
        $category_list = $CI->Ptype->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => "Manage Product Type",
            'category_list' => $category_list,
        );
        $categoryList = $CI->parser->parse('product_type/ptype', $data, true);
        return $categoryList;
    }

    //Sub Category Add
    public function category_add_form() {
        $CI = & get_instance();
        $CI->load->model('Ptype');
         $category_list = $CI->Ptype->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => "Product Type",
            'category_list' => $category_list,
        );
        $categoryForm = $CI->parser->parse('product_type/add_ptype', $data, true);
        return $categoryForm;
    }

    //category Edit Data
    public function category_edit_data($ptype_id) {
        $CI = & get_instance();
        $CI->load->model('Ptype');
        $category_detail = $CI->Ptype->retrieve_category_editdata($ptype_id);

        $data = array(
            'title'         => "Product Type Edit",
            'ptype_id'   => $category_detail[0]['ptype_id'],
            'ptype_name' => $category_detail[0]['ptype_name'],
            'product_status' => $category_detail[0]['finished_raw'],
            'status'        => $category_detail[0]['status']
        );
        $chapterList = $CI->parser->parse('product_type/edit_ptype_form', $data, true);
        return $chapterList;
    }

}
