<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccourier extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('lcourier');
        $this->load->library('session');
        $this->load->model('Courier');
        $this->auth->check_admin_auth();
    }

    //Default loading for Category system.
    public function index() {
        $content = $this->lcourier->category_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Manage category form
    public function manage_category() {
        $content = $this->lcourier->category_list();
        $this->template->full_admin_html_view($content);
        
    }

    //Insert category and upload
    public function insert_category() {
        $courier_id = $this->auth->generator(15);

        $data = array(
            'courier_id'   => $courier_id,
            'courier_name' => $this->input->post('category_name',TRUE),
            'status'        => 1
        );

        $result = $this->Courier->category_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            
                redirect(base_url('Ccourier'));
            
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Ccourier'));
        }
    }

    //Category Update Form
    public function category_update_form($courier_id) {
        $content = $this->lcourier->category_edit_data($courier_id);
        $this->template->full_admin_html_view($content);
    }

    // Category Update
    public function category_update() {
        $this->load->model('Courier');
        $courier_id = $this->input->post('courier_id',TRUE);
        $data = array(
            'courier_name' => $this->input->post('category_name',TRUE),
            'status'        => 1,
        );



        $this->Courier->update_category($data, $courier_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Ccourier'));
    }

    // Category delete
    public function category_delete($courier_id) {
        $this->load->model('Courier');
        $this->Courier->delete_category($courier_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
         redirect(base_url('Ccourier'));
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
                   $insert_csv['category_name'] = (!empty($csv_line[0])?$csv_line[0]:null);
                }
             
                $categorydata = array(
                    'category_id'      => $this->auth->generator(15),
                    'courier_name'    => $insert_csv['category_name'],
                    'status'           => 1
                );


                if ($count > 0) {
                    $this->db->insert('product_category',$categorydata);
                    }  
                $count++; 
            }
            
        }              
        $this->session->set_userdata(array('message'=>display('successfully_added')));
        redirect(base_url('Ccategory'));
         }else{
        $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
        redirect(base_url('Ccategory'));
    }
    
    }
    // category pdf download
        public function category_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Courier');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator'); 
        $category_list = $CI->Courier->category_list();
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
            $content = $this->parser->parse('category/category_list_pdf', $data, true);
            $time = date('Ymdhi');
            $dompdf = new DOMPDF();
            $dompdf->load_html($content);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/'.'category'.$time.'.pdf', $output);
            $file_path = 'assets/data/pdf/'.'category'.$time.'.pdf';
           $file_name = 'category'.$time.'.pdf';
            force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }
    public function branch() {
        $content = $this->lcourier->branch_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Manage category form
    public function manage_branch() {
        $content = $this->lcourier->branch_list();
        $this->template->full_admin_html_view($content);

    }

    //Insert category and upload
    public function insert_branch() {
        $branch_id = $this->auth->generator(15);
        $courier_id = $this->input->post('courier_id',TRUE);

        $data = array(
            'branch_id'   => $branch_id,
            'courier_id'   => $courier_id,
            'branch_name' => $this->input->post('category_name',TRUE),
            'status'        => 1
        );

        $result = $this->Courier->branch_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Ccourier/branch'));

        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Ccourier/branch'));
        }
    }

    //Category Update Form
    public function branch_update_form($courier_id) {
        $content = $this->lcourier->branch_edit_data($courier_id);
        $this->template->full_admin_html_view($content);
    }

    // Category Update
    public function branch_update() {
        $this->load->model('Courier');
        $courier_id = $this->input->post('courier_id',TRUE);
        $data = array(
            'branch_name' => $this->input->post('category_name',TRUE),
            'status'        => 1,
        );



        $this->Courier->update_branch($data, $courier_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Ccourier/branch'));
    }

    // Category delete
    public function branch_delete($courier_id) {
        $this->load->model('Courier');
        $this->Courier->delete_branch($courier_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        redirect(base_url('Ccourier/branch'));
    }
    //csv upload
    function uploadCsv_branch()
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
                        $insert_csv['category_name'] = (!empty($csv_line[0])?$csv_line[0]:null);
                    }

                    $categorydata = array(
                        'category_id'      => $this->auth->generator(15),
                        'courier_name'    => $insert_csv['category_name'],
                        'status'           => 1
                    );


                    if ($count > 0) {
                        $this->db->insert('product_category',$categorydata);
                    }
                    $count++;
                }

            }
            $this->session->set_userdata(array('message'=>display('successfully_added')));
            redirect(base_url('Ccategory'));
        }else{
            $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
            redirect(base_url('Ccategory'));
        }

    }
    // category pdf download
    public function branch_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Courier');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator');
        $category_list = $CI->Courier->branch_list();
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
        $content = $this->parser->parse('category/category_list_pdf', $data, true);
        $time = date('Ymdhi');
        $dompdf = new DOMPDF();
        $dompdf->load_html($content);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/'.'category'.$time.'.pdf', $output);
        $file_path = 'assets/data/pdf/'.'category'.$time.'.pdf';
        $file_name = 'category'.$time.'.pdf';
        force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }

}




