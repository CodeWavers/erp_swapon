<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lbrand {

    //Retrieve  category List	
    public function category_list() {
        $CI = & get_instance();
        $CI->load->model('Brands');
        $category_list = $CI->Brands->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => "Manage Brand",
            'category_list' => $category_list,
        );
        $categoryList = $CI->parser->parse('brand/brand', $data, true);
        return $categoryList;
    }

    //Sub Category Add
    public function category_add_form() {
        $CI = & get_instance();
        $CI->load->model('Brands');
         $category_list = $CI->Brands->category_list();  //It will get only Credit categorys
        $i = 0;
        $total = 0;
        if (!empty($category_list)) {
            foreach ($category_list as $k => $v) {
                $i++;
                $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
            }
        }
        $data = array(
            'title'         => 'Brand',
            'category_list' => $category_list,
        );
        $categoryForm = $CI->parser->parse('brand/add_brand', $data, true);
        return $categoryForm;
    }

    //category Edit Data
    public function category_edit_data($brand_id) {
        $CI = & get_instance();
        $CI->load->model('Brands');
        $category_detail = $CI->Brands->retrieve_category_editdata($brand_id);

        $data = array(
            'title'         => "Brand Edit",
            'brand_id'   => $category_detail[0]['brand_id'],
            'brand_name' => $category_detail[0]['brand_name'],
            'status'        => $category_detail[0]['status']
        );
        $chapterList = $CI->parser->parse('brand/edit_brand_form', $data, true);
        return $chapterList;
    }

}

?>