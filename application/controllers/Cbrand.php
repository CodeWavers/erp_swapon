<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cbrand extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('lbrand');
        $this->load->library('session');
        $this->load->model('Brands');
        $this->auth->check_admin_auth();
    }

    //Default loading for Category system.
    public function index() {
        $content = $this->lbrand->category_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Manage category form
    public function manage_category() {
        $content = $this->lbrand->category_list();
        $this->template->full_admin_html_view($content);
        
    }

    //Insert category and upload
    public function insert_brand() {
        $brand_id = $this->auth->generator(15);

        $brand_name=$this->input->post('brand_name',TRUE);
        $meta_title=$this->input->post('meta_title',TRUE);
        $des=$this->input->post('des',TRUE);

        if ($_FILES['image']['name']) {
            //Chapter chapter add start
            $config['upload_path']   = './my-assets/image/brand/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cbrand'));
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

        $data = array(
            'brand_id'   => $brand_id,
            'meta_title' => $meta_title,
            'brand_name' => $brand_name,
            'meta_description' =>$des,
            'logo' => (!empty($image_url) ? $image_url : base_url('my-assets/image/product.png')),
            'status'        => 1
        );

        $result = $this->Brands->category_entry($data);



        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            
                redirect(base_url('Cbrand'));
            
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Cbrand'));
        }
    }

    //Category Update Form
    public function category_update_form($brand_id) {
        $content = $this->lbrand->category_edit_data($brand_id);
        $this->template->full_admin_html_view($content);
    }

    // Category Update
    public function category_update() {
        $this->load->model('Brands');
        $brand_id = $this->input->post('brand_id',TRUE);
        $data = array(
            'brand_name' => $this->input->post('brand_name',TRUE),
            'status'        => 1,
        );

        $this->Brands->update_category($data, $brand_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cbrand'));
    }

    // Category delete
    public function category_delete($brand_id) {
        $this->load->model('Brands');
        $this->Brands->delete_category($brand_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
         redirect(base_url('Cbrand'));
    }
    //csv upload
        function uploadCsv_category()
    {
          $filename = $_FILES['upload_csv_file']['name'];  
        $ext = end(explode('.', $filename));
        $ext = substr(strrchr($filename, '.'), 1);
        if($ext == 'csv'){
        $count=0;
        $fp = fopen($_FILES['upload_csv_file']['tmp_name'],'r') or die("can't open file");

        if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE)
        {
  
         while($csv_line = fgetcsv($fp,1024)){
                //keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {                  
                   $insert_csv = array();
                   $insert_csv['brand_name'] = (!empty($csv_line[0])?$csv_line[0]:null);
                }
             
                $categorydata = array(
                    'brand_id'      => $this->auth->generator(15),
                    'brand_name'    => $insert_csv['brand_name'],
                    'status'           => 1
                );


                if ($count > 0) {
                    $this->db->insert('product_brand',$categorydata);
                    }  
                $count++; 
            }
            
        }              
        $this->session->set_userdata(array('message'=>display('successfully_added')));
        redirect(base_url('Cbrand'));
         }else{
        $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
        redirect(base_url('Cbrand'));
    }
    
    }
    // category pdf download
        public function category_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Brands');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator'); 
        $category_list = $CI->Brands->category_list();
        if (!empty($category_list)) {
            $i = 0;
            if (!empty($category_list)) {
                foreach ($category_list as $k => $v) {
                    $i++;
                    $category_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_category'),
            'category_list' => $category_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
             'company_info'  => $company_info
        );
            $this->load->helper('download');
            $content = $this->parser->parse('brand/brand_list_pdf', $data, true);
            $time = date('Ymdhi');
            $dompdf = new DOMPDF();
            $dompdf->load_html($content);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/'.'brand'.$time.'.pdf', $output);
            $file_path = 'assets/data/pdf/'.'category'.$time.'.pdf';
           $file_name = 'brand'.$time.'.pdf';
            force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }

}
