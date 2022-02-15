<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cproduct extends CI_Controller
{

    public $product_id;

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->model('Suppliers');
        $this->load->library('auth');
    }

    //Index page load
    public function index()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Insert Product and uload
    public function insert_product()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');
        $product_id = (!empty($this->input->post('product_id',TRUE))?$this->input->post('product_id',TRUE):$this->generator(8));
        $check_product = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->num_rows();
        if($check_product > 0){
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            redirect(base_url('Cproduct'));

        }
        $product_id_two = $this->input->post('$product_id_two', TRUE);

        $product_model = $this->input->post('model', TRUE);
        $product_code = $this->input->post('product_code', TRUE);


        $pr_code_list = $CI->Products->all_product_code();




        if ($_FILES['thumbnail_img']['name']) {
            //Chapter chapter add start
            $config['upload_path']   = './my-assets/image/product/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumbnail_img')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cproduct'));
            } else {

                $imgdata = $this->upload->data();
                $image = $config['upload_path'] . $imgdata['file_name'];
                $config['image_library']  = 'gd2';
                $config['source_image']   = $image;
                $config['create_thumb']   = false;
                $config['maintain_ratio'] = TRUE;
                $config['width']          = 100;
                $config['height']         = 100;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $image_url = base_url() . $image;
            }
        }

        $price = $this->input->post('sell_price', TRUE);

        $tax_percentage = $this->input->post('tax', TRUE);
        $tax = $tax_percentage / 100;

        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        if ($num_column > 0) {
            $taxfield = [];
            for ($i = 0; $i < $num_column; $i++) {
                $taxfield[$i] = 'tax' . $i;
            }
            foreach ($taxfield as $key => $value) {
                $data[$value] = $this->input->post($value) / 100;
            }
        }

        $category_id=$this->input->post('category_id', TRUE);
        $size_id=$this->input->post('product_size', TRUE);
        $color=$this->input->post('color', TRUE);

        if($category_id){
            $catsdata=implode(",",$category_id);
        }
        else {
            $catsdata = json_encode([]);
        }

        if($size_id){
            $sizedata=implode(",",$size_id);
        }
        else {
            $sizedata = json_encode([]);
        }
        if($color){
            $colordata=implode(",",$color);
        }
        else {
            $colordata = json_encode([]);
        }

        $data2['product_id']   = $product_id;
        $data2['category_id']  = $catsdata;
        $data2['brand_id']  = $this->input->post('brand_id',TRUE);
        $data2['product_name'] = $this->input->post('product_name',TRUE);
        $data2['finished_raw']  = $this->input->post('product_status', TRUE);
        $data2['price']        = $price;
        $data2['unit']         = $this->input->post('unit',TRUE);
        $data2['tax']          = 0;
        $data2['product_details'] = $this->input->post('description',TRUE);
        $data2['image']        = (!empty($image_url) ? $image_url : base_url('my-assets/image/product.png'));
        $data2['status']       = 1;



        $data['barcode']   = $product_id;
        $data['name'] = $this->input->post('product_name', TRUE);
        $data['added_by'] = 'ERP';
        $data['cats']  = $catsdata;
        $data['brand_id']  = $this->input->post('brand_id', TRUE);
        $data['video_provider']  = $this->input->post('video_provider', TRUE);
        $data['video_link']  = $this->input->post('video_link', TRUE);
        $data['tags']  = $this->input->post('tags', TRUE);
        $data['sku']  = $this->input->post('sku', TRUE);
        $data['description']  = $this->input->post('description', TRUE);
        $data['product_summary']  = $this->input->post('summery', TRUE);
        $data['information']  = $this->input->post('additional_information', TRUE);
       $data['tc']  = $this->input->post('additional_terms', TRUE);
        $data['variations']  = $sizedata;
        $data['colors']  = $colordata;
        $data['product_status']  = $this->input->post('product_status', TRUE);
        $data['unit']         = $this->input->post('unit', TRUE);
        $data['min_qty']         = $this->input->post('min_qty', TRUE);
        $data['tax']          = 0;
        $data['unit_price']        = $price;
        $data['refundable'] = $this->input->post('refund', TRUE);
        $data['thumbnail_img']        = (!empty($image_url) ? $image_url : base_url('my-assets/image/product.png'));

        //echo '<pre>';print_r($data);exit();

        $result = $CI->lproduct->insert_product($data,$data2);







        if ($result == 1) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            if (isset($_POST['add-product'])) {
                redirect(base_url('Cproduct/manage_product'));
                exit;
            } elseif (isset($_POST['add-product-another'])) {
                redirect(base_url('Cproduct'));
                exit;
            }
        } else {
            $this->session->set_userdata(array('error_message' => display('product_model_already_exist')));
            redirect(base_url('Cproduct'));
        }
    }

    //Product Update Form
    public function product_update_form($product_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_edit_data($product_id);
        $this->template->full_admin_html_view($content);
    }

    // Product Update
    public function product_update()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Products');

        // echo '<pre>';
        // print_r($_POST);
        // exit();

        $product_id = $this->input->post('product_id', TRUE);
        $product_id_two = $this->input->post('product_id_two', TRUE);
        $this->db->where('product_id', $product_id);
        $this->db->delete('supplier_product');
        $sup_price = $this->input->post('supplier_price', TRUE);
        $s_id = $this->input->post('supplier_id', TRUE);

        // $product_code = $this->input->post('product_code', TRUE);


        // $pr_code_list = $CI->Products->all_product_code();

        // foreach ($pr_code_list as $pc) {
        //     if ($pc['product_code'] == $product_code) {
        //         $this->session->set_userdata(array('error_message' => 'Product code already exists. Try again.'));
        //         redirect(base_url('Cproduct'));
        //     }
        // }

        for ($i = 0, $n = count($s_id); $i < $n; $i++) {
            $supplier_price = $sup_price[$i];
            $supp_id = $s_id[$i];

            $supp_prd = array(
                'product_id'     => $product_id,
                // 'product_id_two'     => $product_id_two,
                'supplier_id'    => $supp_id,
                'supplier_price' => $supplier_price
            );

            $this->db->insert('supplier_product', $supp_prd);
        }
        // configure for upload
        $config = array(
            'upload_path'   => "./my-assets/image/product/",
            'allowed_types' => "png|jpg|jpeg|gif|bmp|tiff",
            'overwrite'     => TRUE,
            'encrypt_name' => TRUE,
            'max_size'      => '0',
        );
        $image_data = array();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
            $image_data = $this->upload->data();
            $image_name = base_url() . "my-assets/image/product/" . $image_data['file_name'];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_data['full_path'];
            $config['maintain_ratio'] = TRUE;
            $config['height'] = '100';
            $config['width'] = '100';
            $this->load->library('image_lib', $config);
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
        } else {
            $image_name = $this->input->post('old_image', TRUE);
        }


        $price = $this->input->post('sell_price', TRUE);

        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn) - 4;
        if ($num_column > 0) {
            $taxfield = [];
            for ($i = 0; $i < $num_column; $i++) {
                $taxfield[$i] = 'tax' . $i;
            }
            foreach ($taxfield as $key => $value) {
                $data[$value] = $this->input->post($value) / 100;
            }
        }
        $data['product_name']   = $this->input->post('product_name', TRUE);
        $data['category_id']    = $this->input->post('category_id', TRUE);
        $data['product_id']    = $this->input->post('product_id_two', TRUE);
        $data['brand_id']    = $this->input->post('brand_id', TRUE);
        $data['ptype_id']    = $this->input->post('ptype_id', TRUE);
        $data['price']          = $price ? $price : 0.00;
        $data['color']  = $this->input->post('color', TRUE);
        $data['size']  = $this->input->post('product_size', TRUE);
        $data['product_code']  = $this->input->post('product_code', TRUE);
        $data['serial_no']      = $this->input->post('serial_no', TRUE);
        $data['re_order_level']      = $this->input->post('re_order_level', TRUE);
        $data['product_model']  = $this->input->post('model', TRUE);
        $data['product_details'] = $this->input->post('description', TRUE);
        $data['unit']           = $this->input->post('unit', TRUE);
        $data['trxn_unit']           = $this->input->post('transaction_unit', TRUE);
        $data['unit_multiplier']           = $this->input->post('mult', TRUE);
        $data['finished_raw']           = $this->input->post('product_status', TRUE);
        $data['tax']            = 0;
        $data['image']          = $image_name;

        $result = $CI->Products->update_product($data, $product_id);
        if ($result == true) {
            $this->session->set_userdata(array('message' => display('successfully_updated')));
            redirect(base_url('Cproduct/manage_product'));
        } else {
            $this->session->set_userdata(array('error_message' => display('product_model_already_exist')));
            redirect(base_url('Cproduct/manage_product'));
        }
    }

    //Manage Product
    public function manage_product()
    {

        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');
        $content = $this->lproduct->product_list();
        $this->template->full_admin_html_view($content);
    }

    public function manage_finished_product()
    {

        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');
        $content = $this->lproduct->finished_product_list();
        $this->template->full_admin_html_view($content);
    }

    public function CheckProductList()
    {
        // GET data
        $this->load->model('Products');
        $postData = $this->input->post();
        $data = $this->Products->getProductList($postData);
        echo json_encode($data);
    }


    public function CheckFinishedProductList()
    {
        // GET data
        $this->load->model('Products');
        $postData = $this->input->post();
        $data = $this->Products->getFinishedProductList($postData);
        echo json_encode($data);
    }
    //Add Product CSV
    public function add_product_csv()
    {
        $CI = &get_instance();
        $data = array(
            'title' => display('add_product_csv')
        );
        $content = $CI->parser->parse('product/add_product_csv', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //CSV Upload File
    function uploadCsv()
    {
        $this->load->model('suppliers');
        $filename = $_FILES['upload_csv_file']['name'];
        $tmp = explode('.', $filename);
        $ext = end($tmp);
        $ext = substr(strrchr($filename, '.'), 1);
        $size_id = '';
        $color_id = '';
        if ($ext == 'csv') {
            $count = 0;
            $fp = fopen($_FILES['upload_csv_file']['tmp_name'], 'r') or die("can't open file");

            if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE) {

                while ($csv_line = fgetcsv($fp, 1024)) {
                    //keep this if condition if you want to remove the first row
                    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                        $insert_csv = array();
                        // print_r($csv_line[1]);
                        // exit();
                        $product_id = $this->generator(10);
                        $insert_csv['color_id']   = '';
                        $insert_csv['size_id']   = '';
                        $insert_csv['category_id']   = '';


                        $insert_csv['product_name']    = (!empty($csv_line[0]) ? $csv_line[0] : null);
                        $insert_csv['ptype_id']    = (!empty($csv_line[1]) ? $csv_line[1] : null);
                        $insert_csv['product_code']    = (!empty($csv_line[2]) ? $csv_line[2] : null);
                        $insert_csv['product_model']    = (!empty($csv_line[3]) ? $csv_line[3] : null);
                        $insert_csv['color_id']   = (!empty($csv_line[4]) ? $csv_line[4] : null);
                        $insert_csv['size_id']   = (!empty($csv_line[5]) ? $csv_line[5] : null);
                        // $insert_csv['quantity']   = (!empty($csv_line[6]) ? $csv_line[6] : null);
                        $insert_csv['unit']    = (!empty($csv_line[6]) ? $csv_line[6] : null);
                        $insert_csv['trxn_unit']    = (!empty($csv_line[7]) ? $csv_line[7] : null);
                        $insert_csv['unit_multiplier']    = (!empty($csv_line[8]) ? $csv_line[8] : null);
                        $insert_csv['category_id']  = (!empty($csv_line[9]) ? $csv_line[9] : null);
                        $insert_csv['supplier_id']    = (!empty($csv_line[10]) ? $csv_line[10] : null);
                        $insert_csv['supplier_price']    = (!empty($csv_line[11]) ? $csv_line[11] : null);
                        $insert_csv['price']    = (!empty($csv_line[12]) ? $csv_line[12] : null);
                        $insert_csv['finished_raw']    = (!empty($csv_line[13]) ? $csv_line[13] : 0);
                        // // $insert_csv['re_order_level']    = (!empty($csv_line[10])?$csv_line[10]:null);
                        // $insert_csv['price']          = (!empty($csv_line[10]) ? $csv_line[10] : null);
                        // $insert_csv['supplier_price'] = (!empty($csv_line[11]) ? $csv_line[11] : null);

                    }
                    $check_supplier = $this->db->select('*')->from('supplier_information')->where('supplier_name', $insert_csv['supplier_id'])->get()->row();
                    if (!empty($check_supplier)) {
                        $supplier_id = $check_supplier->supplier_id;
                    } else {
                        $supplierinfo = array(
                            'supplier_name' => $insert_csv['supplier_id'],
                            'address'           => '',
                            'mobile'            => '',
                            'details'           => '',
                            'status'            => 1
                        );
                        if ($count > 0) {
                            $this->db->insert('supplier_information', $supplierinfo);
                        }
                        $supplier_id = $this->db->insert_id();
                        $coa = $this->suppliers->headcode();
                        if ($coa->HeadCode != NULL) {
                            $headcode = $coa->HeadCode + 1;
                        } else {
                            $headcode = "502020001";
                        }
                        $c_acc = $supplier_id . '-' . $insert_csv['supplier_id'];
                        $createby = $this->session->userdata('user_id');
                        $createdate = date('Y-m-d H:i:s');


                        $supplier_coa = [
                            'HeadCode'         => $headcode,
                            'HeadName'         => $c_acc,
                            'PHeadName'        => 'Account Payable',
                            'HeadLevel'        => '3',
                            'IsActive'         => '1',
                            'IsTransaction'    => '1',
                            'IsGL'             => '0',
                            'HeadType'         => 'L',
                            'IsBudget'         => '0',
                            'IsDepreciation'   => '0',
                            'supplier_id'      => $supplier_id,
                            'DepreciationRate' => '0',
                            'CreateBy'         => $createby,
                            'CreateDate'       => $createdate,
                        ];

                        if ($count > 0) {
                            $this->db->insert('acc_coa', $supplier_coa);
                        }
                    }

                    $category_id = null;

                    $check_category = $this->db->select('*')->from('product_category')->where('category_name', $insert_csv['category_id'])->get()->row();
                    if (!empty($check_category)) {
                        $category_id = $check_category->category_id;
                    } else {
                        $category_id = $this->auth->generator(15);
                        $categorydata = array(
                            'category_id' => $category_id,
                            'category_name' => $insert_csv['category_id'],
                            'status' => 1
                        );
                        if ($count > 0) {
                            $this->db->insert('product_category', $categorydata);
                        }
                    }

                    $color_id = null;
                    if (!empty(($insert_csv['color_id']))) {
                        $check_color = $this->db->select('*')->from('color_list')->where('color_name', $insert_csv['color_id'])->get()->row();
                        if (!empty($check_color)) {
                            $color_id = $check_color->color_id;
                        } else {
                            $color_id = $this->auth->generator(15);
                            $categorydata = array(
                                'color_id' => $color_id,
                                'color_name' => $insert_csv['color_id'],
                                'status' => 1
                            );
                            if ($count > 0) {
                                $this->db->insert('color_list', $categorydata);
                            }
                        }
                    }

                    $size_id = null;
                    if (!empty($insert_csv['size_id'])) {
                        $check_size = $this->db->select('*')->from('size_list')->where('size_name', $insert_csv['size_id'])->get()->row();
                        if (!empty($check_size)) {
                            $size_id = $check_size->size_id;
                        } else {
                            $size_id = $this->auth->generator(15);
                            $categorydata = array(
                                'size_id' => $size_id,
                                'size_name' => $insert_csv['size_id'],
                                'status' => 1
                            );
                            if ($count > 0) {
                                $this->db->insert('size_list', $categorydata);
                            }
                        }
                    }

                    $check_ptype = $this->db->select('*')->from('product_type')->where('ptype_name', $insert_csv['ptype_id'])->get()->row();

                    if (!empty($check_ptype)) {

                        $ptype_id = $check_ptype->ptype_id;
                    } else {
                        $ptype_id = $this->auth->generator(15);
                        $ptypedata = array(
                            'ptype_id' => $ptype_id,
                            'ptype_name' => $insert_csv['ptype_id'],
                            'status' => 1
                        );
                        if ($count > 0) {

                            $this->db->insert('product_type', $ptypedata);
                        }
                    }




                    // $check_brand = $this->db->select('*')->from('product_brand')->where('brand_name', $insert_csv['brand_id'])->get()->row();
                    // if (!empty($check_brand)) {
                    //     $brand_id = $check_brand->brand_id;
                    // } else {
                    //     $brand_id = $this->auth->generator(15);
                    //     $branddata = array(
                    //         'brand_id' => $brand_id,
                    //         'brand_name' => $insert_csv['brand_id'],
                    //         'status' => 1
                    //     );
                    //     if ($count > 0) {
                    //         $this->db->insert('product_brand', $branddata);
                    //     }
                    // }

                    $data = array(
                        'product_id'    => $product_id,
                        //'product_id'    => $insert_csv['product_id'],
                        'category_id'   => $category_id,
                        // 'brand_id'      => $brand_id,
                        'ptype_id'      => $ptype_id,
                        'product_name'  => $insert_csv['product_name'],
                        // 'product_id_two' => $insert_csv['product_id_two'],
                        'product_model' => $insert_csv['product_model'],
                        'price'         => $insert_csv['price'],
                        'product_code'         => $insert_csv['product_code'],
                        'size'         => $size_id,
                        'color'         => $color_id,
                        // 're_order_level'=> $insert_csv['re_order_level'],
                        'unit'          => $insert_csv['unit'],
                        'trxn_unit'           => $insert_csv['trxn_unit'],
                        'unit_multiplier'           => $insert_csv['unit_multiplier'],
                        'finished_raw'           => $insert_csv['finished_raw'],
                        'tax'           => '',
                        'product_details' => 'Csv Product',
                        'image'         => base_url('my-assets/image/product.png'),
                        'status'        => 1
                    );

                    if ($count > 0) {

                        $result = $this->db->select('*')
                            ->from('product_information')
                            ->where('product_name', $data['product_name'])
                            ->where('product_model', $data['product_model'])
                            ->where('ptype_id', $ptype_id)
                            ->where('category_id', $category_id)
                            ->where('size', $insert_csv['size_id'])
                            ->where('color',  $insert_csv['color_id'])
                            // ->where('brand_id', $brand_id)
                            ->where('ptype_id', $ptype_id)
                            ->get()
                            ->row();
                        if (empty($result)) {
                            $this->db->insert('product_information', $data);
                            $product_id = $product_id;
                        } else {
                            $product_id = $result->product_id;
                            $udata = array(
                                'product_id'     => $result->product_id,
                                // 'product_id_two'     => $insert_csv['product_id_two'],
                                'category_id'    => $category_id,
                                // 'brand_id'    => $brand_id,
                                'ptype_id'    => $ptype_id,
                                'product_name'   => $result->product_name,
                                'product_model'  => $insert_csv['product_model'],
                                'price'          => $insert_csv['price'],
                                'product_code'         => $insert_csv['product_code'],
                                'size'         => $insert_csv['size_id'],
                                'color'         => $insert_csv['color_id'],
                                'unit'           => $insert_csv['unit'],
                                'trxn_unit'           => $insert_csv['trxn_unit'],
                                'unit_multiplier'           => $insert_csv['unit_multiplier'],
                                'finished_raw'           => $insert_csv['finished_raw'],

                                //  're_order_level' => $insert_csv['re_order_level'],
                                'tax'            => '',
                                'product_details' => 'Csv Uploaded Product',
                                'image'         => base_url('my-assets/image/product.png'),
                                'status'        => 1
                            );
                            $this->db->where('product_id', $result->product_id);
                            $this->db->update('product_information', $udata);
                        }

                        $supp_prd = array(
                            //'product_id'     => $insert_csv['product_id'],
                            'product_id' => $product_id,
                            'supplier_id'    => $supplier_id,
                            // 'product_id_two' => $insert_csv['product_id_two'],
                            'supplier_price' => $insert_csv['supplier_price'],
                            'products_model' => $insert_csv['product_model'],
                        );

                        // $splprd = $this->db->select('*')
                        //      ->from('supplier_product')
                        //      ->where('supplier_id', $supplier_id)
                        //      ->where('product_id', $product_id)
                        //      ->get()
                        //      ->num_rows();
                        $this->db->insert('supplier_product', $supp_prd);
                        // if (!empty($splprd)) {

                        // }else{
                        //     $supp_prd = array(
                        //         'supplier_id'    => $supplier_id,
                        //         'supplier_price' => $insert_csv['supplier_price'],
                        //         'products_model' => $insert_csv['product_model']
                        //     );
                        //     $this->db->where('product_id', $product_id);
                        //     $this->db->where('supplier_id', $supplier_id);
                        //     $this->db->update('supplier_product', $supp_prd);
                        // }
                        $data_service = array(

                            'service_name' => $insert_csv['product_name'],
                            // 'description' =>$this->input->post('description',TRUE)


                        );


                        $this->db->insert('product_service', $data_service);
                    }
                    $count++;
                }
            }

            $this->db->select('*');
            $this->db->from('product_information');
            $this->db->where('status', 1);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
            }
            $cache_file = './my-assets/js/admin_js/json/product.json';
            $productList = json_encode($json_product);
            file_put_contents($cache_file, $productList);
            fclose($fp) or die("can't close file");
            $this->session->set_userdata(array('message' => display('successfully_added')));
            redirect(base_url('Cproduct/manage_product'));
        } else {
            $this->session->set_userdata(array('error_message' => 'Please Import Only Csv File'));
            redirect(base_url('Cproduct/manage_product'));
        }
    }



    //Add supplier by ajax
    public function add_supplier()
    {
        $this->load->model('Suppliers');

        $data = array(
            'supplier_id'   => $this->auth->generator(20),
            'supplier_name' => $this->input->post('supplier_name', TRUE),
            'address'       => $this->input->post('address', TRUE),
            'mobile'        => $this->input->post('mobile', TRUE),
            'details'       => $this->input->post('details', TRUE),
            'status'        => 1
        );

        $supplier = $this->Suppliers->supplier_entry($data);

        if ($supplier == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            echo TRUE;
        } else {
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            echo FALSE;
        }
    }

    // Insert category by ajax
    public function insert_category()
    {
        $this->load->model('Categories');

        $category_id = $this->auth->generator(15);
        $brand_id = $this->auth->generator(15);
        $ptype_id = $this->auth->generator(15);

        //Customer  basic information adding.
        $data = array(
            'category_id'   => $category_id,
            'category_name' => $this->input->post('category_name', TRUE),
            'status'        => 1
        );

        $result = $this->Categories->category_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            echo TRUE;
        } else {
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            echo FALSE;
        }
    }
    public function insert_brand()
    {
        $this->load->model('Brands');


        $brand_id = $this->auth->generator(15);


        //Customer  basic information adding.
        $data = array(
            'brand_id'   => $brand_id,
            'brand_name' => $this->input->post('brand_name', TRUE),
            'status'        => 1
        );

        $result = $this->Brands->category_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            echo TRUE;
        } else {
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            echo FALSE;
        }
    }
    public function insert_ptype()
    {
        $this->load->model('Ptype');


        $ptype_id = $this->auth->generator(15);


        //Customer  basic information adding.
        $data = array(
            'ptype_id'   => $ptype_id,
            'ptype_name' => $this->input->post('ptype_name', TRUE),
            'status'        => 1
        );

        $result = $this->Ptype->category_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            echo TRUE;
        } else {
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            echo FALSE;
        }
    }

    // product_delete
    public function product_delete($product_id)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Products');
        $check_calculation = $CI->Products->check_calculaton($product_id);
        if ($check_calculation > 0) {
            $this->session->set_userdata(array('error_message' => display('you_cant_delete_this_product')));
            redirect(base_url('Cproduct/manage_product'));
        } else {
            $result = $CI->Products->delete_product($product_id);
            $this->session->set_userdata(array('message' => display('successfully_delete')));
            redirect(base_url('Cproduct/manage_product'));
        }
    }

    //Retrieve Single Item  By Search
    public function product_by_search()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $product_id = $this->input->post('product_id', TRUE);

        $content = $CI->lproduct->product_search_list($product_id);
        $this->template->full_admin_html_view($content);
    }

    //Retrieve Single Item  By Search
    public function product_details($product_id)
    {
        $this->product_id = $product_id;
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_details($product_id);
        $this->template->full_admin_html_view($content);
    }

    //Retrieve Single Item  By Search
    public function product_sales_supplier_rate($product_id = null, $startdate = null, $enddate = null)
    {
        if ($startdate == null) {
            $startdate = date('Y-m-d', strtotime('-30 days'));
        }
        if ($enddate == null) {
            $enddate = date('Y-m-d');
        }
        $product_id_input = $this->input->post('product_id', TRUE);
        if (!empty($product_id_input)) {
            $product_id = $this->input->post('product_id', TRUE);
            $startdate  = $this->input->post('from_date', TRUE);
            $enddate    = $this->input->post('to_date', TRUE);
        }

        $this->product_id = $product_id;

        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_sales_supplier_rate($product_id, $startdate, $enddate);
        $this->template->full_admin_html_view($content);
    }

    //This function is used to Generate Key
    public function generator($lenth)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Products');

        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 8);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }

        $result = $this->Products->product_id_check($con);

        if ($result === true) {
            $this->generator(8);
        } else {
            return $con;
        }
    }

    //Export CSV
    public function exportCSV()
    {
        // file name
        $this->load->model('Products');
        $filename = 'product_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data
        $usersData = $this->Products->product_csv_file();

        // file creation
        $file = fopen('php://output', 'w');

        $header = array('product_id', 'supplier_id', 'category_id', 'brand_id', 'ptype_id', 'product_name', 'price', 'supplier_price', 'unit', 'tax', 'product_model', 'product_details', 'image', 'status');
        fputcsv($file, $header);
        foreach ($usersData as $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    // product pdf download
    public function product_downloadpdf()
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('pdfgenerator');
        $product_list = $CI->Products->product_list_pdf();
        if (!empty($product_list)) {
            $i = 0;
            if (!empty($product_list)) {
                foreach ($product_list as $k => $v) {
                    $i++;
                    $product_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_product'),
            'product_list'  => $product_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
            'company_info'  => $company_info
        );
        $this->load->helper('download');
        $content = $this->parser->parse('product/product_list_pdf', $data, true);
        $time = date('Ymdhi');
        $dompdf = new DOMPDF();
        $dompdf->load_html($content);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/' . 'product' . $time . '.pdf', $output);
        $file_path = 'assets/data/pdf/' . 'product' . $time . '.pdf';
        $file_name = 'product' . $time . '.pdf';
        force_download(FCPATH . 'assets/data/pdf/' . $file_name, null);
    }


    public function validate_pr_code()
    {
        $CI = &get_instance();
        $CI->load->model('Products');


        $product_code = $this->input->post('pr_code', TRUE);
        // print_r($product_code); exit();

        $pr_code_list = $CI->Products->all_product_code();
        $data = array();
        //  exit();
        foreach ($pr_code_list as $pc) {
            // print_r($pc['product_code']);
            if ($pc['product_code'] == $product_code) {
                $data['found'] = true;
                break;
            }
        }

        echo json_encode($data);
    }

    public function attributes()
    {
        $CI = &get_instance();
        $CI->load->library('lproduct');

        $content = $CI->lproduct->size_home();
        $this->template->full_admin_html_view($content);
    }

    public function insert_attr()
    {

        $this->load->model('Products');

        $size_id = $this->auth->generator(15);

        $data = array(

            'name' => $this->input->post('category_name', TRUE),

        );

        $result = $this->Products->attr_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cproduct/attributes'));
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Cproduct/attributes'));
        }
    }

    public function attr_update_form($size_id)
    {
        $this->load->library('lproduct');
        $content = $this->lproduct->attr_edit_data($size_id);
        $this->template->full_admin_html_view($content);
    }

    public function delete_attr($size_id)
    {
        $this->db->where('id', $size_id);
        $this->db->delete('attributes');
        redirect(base_url('Cproduct/attributes'));
    }

    public function attr_update()
    {
        $this->load->model('Products');
        $size_id = $this->input->post('category_id', TRUE);
        $data = array(
            'name' => $this->input->post('category_name', TRUE),

        );

        $this->Products->update_attr($data, $size_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cproduct/attributes'));
    }

    function uploadCsv_size()
    {
        $filename = $_FILES['upload_csv_file']['name'];
        $ext = end(explode('.', $filename));
        $ext = substr(strrchr($filename, '.'), 1);
        if ($ext == 'csv') {
            $count = 0;
            $fp = fopen($_FILES['upload_csv_file']['tmp_name'], 'r') or die("can't open file");

            if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE) {

                while ($csv_line = fgetcsv($fp, 1024)) {
                    //keep this if condition if you want to remove the first row
                    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                        $insert_csv = array();
                        $insert_csv['size_name'] = (!empty($csv_line[0]) ? $csv_line[0] : null);
                    }

                    $categorydata = array(
                        'size_id'      => $this->auth->generator(15),
                        'size_name'    => $insert_csv['size_name'],
                        'status'           => 1
                    );


                    if ($count > 0) {
                        $this->db->insert('size_list', $categorydata);
                    }
                    $count++;
                }
            }
            $this->session->set_userdata(array('message' => display('successfully_added')));
            redirect(base_url('Cproduct/size'));
        } else {
            $this->session->set_userdata(array('error_message' => 'Please Import Only Csv File'));
            redirect(base_url('Cproduct/size'));
        }
    }

    public function color()
    {
        $CI = &get_instance();
        $CI->load->library('lproduct');

        $content = $CI->lproduct->color_home();
        $this->template->full_admin_html_view($content);
    }

    public function insert_color()
    {

        $this->load->model('Products');

        $color_id = $this->auth->generator(15);

        $data = array(
            'color_id'   => $color_id,
            'color_name' => $this->input->post('category_name', TRUE),
            'status'        => 1
        );

        $result = $this->Products->color_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cproduct/color'));
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Cproduct/color'));
        }
    }

    public function color_update_form($color_id)
    {
        $this->load->library('lproduct');
        $content = $this->lproduct->color_edit_data($color_id);
        $this->template->full_admin_html_view($content);
    }

    public function delete_color($color_id)
    {
        $this->db->where('color_id', $color_id);
        $this->db->delete('color_list');
        redirect(base_url('Cproduct/color'));
    }

    public function color_update()
    {
        $this->load->model('Products');
        $color_id = $this->input->post('category_id', TRUE);
        $data = array(
            'color_name' => $this->input->post('category_name', TRUE),
            'status'        => 1,
        );

        $this->Products->update_color($data, $color_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cproduct/color'));
    }

    function uploadCsv_color()
    {
        $filename = $_FILES['upload_csv_file']['name'];
        $ext = end(explode('.', $filename));
        $ext = substr(strrchr($filename, '.'), 1);
        if ($ext == 'csv') {
            $count = 0;
            $fp = fopen($_FILES['upload_csv_file']['tmp_name'], 'r') or die("can't open file");

            if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE) {

                while ($csv_line = fgetcsv($fp, 1024)) {
                    //keep this if condition if you want to remove the first row
                    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                        $insert_csv = array();
                        $insert_csv['color_name'] = (!empty($csv_line[0]) ? $csv_line[0] : null);
                    }

                    $categorydata = array(
                        'color_id'      => $this->auth->generator(15),
                        'color_name'    => $insert_csv['color_name'],
                        'status'           => 1
                    );


                    if ($count > 0) {
                        $this->db->insert('color_list', $categorydata);
                    }
                    $count++;
                }
            }
            $this->session->set_userdata(array('message' => display('successfully_added')));
            redirect(base_url('Cproduct/color'));
        } else {
            $this->session->set_userdata(array('error_message' => 'Please Import Only Csv File'));
            redirect(base_url('Cproduct/color'));
        }
    }

    public function get_statuswise_category($status)
    {
        $this->load->model('categories');
        $cat_list = $this->categories->category_list($status);

        $html = "<option value=''></option>";

        foreach ($cat_list as $ct) {
            $html .= '<option value="' . $ct['id'] . '">' . $ct['category_name'] . '</option>';
        }

        echo $html;
    }

    public function get_statuswise_ptype($status)
    {
        $this->load->model('ptype');
        $cat_list = $this->ptype->category_list($status);

        $html = "<option value=''></option>";

        foreach ($cat_list as $ct) {
            $html .= '<option value="' . $ct['ptype_id'] . '">' . $ct['ptype_name'] . '</option>';
        }

        echo $html;
    }
}
