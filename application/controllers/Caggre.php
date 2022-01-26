<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Caggre extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('laggre');
        $this->load->library('session');
        $this->load->model('Aggre');
        $this->auth->check_admin_auth();
    }

    //Default loading for aggre system.
    public function index() {
        $content = $this->laggre->aggre_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Manage aggre form
    public function manage_aggre() {
        $content = $this->laggre->aggre_list();
        $this->template->full_admin_html_view($content);
        
    }

    //Insert aggre and upload
    public function insert_aggre() {
        $aggre_id = $this->auth->generator(15);

        $aggre_name=$this->input->post('aggre_name',TRUE);


        if ($_FILES['image']['name']) {
            //Chapter chapter add start
            $config['upload_path']   = './my-assets/image/aggre/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Caggre'));
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
            'aggre_id'   => $aggre_id,
            'aggre_name' => $aggre_name,
            'logo' => (!empty($image_url) ? $image_url : base_url('my-assets/image/product.png')),
            'status'        => 1
        );

        $result = $this->Aggre->aggre_entry($data);

        $agg_id = $this->db->insert_id();
        //Customer  basic information adding.
        $coa = $this->Aggre->headcode();
        if ($coa->HeadCode != NULL) {
            $headcode = $coa->HeadCode + 1;
        } else {
            $headcode = "102030300001";
        }
        $c_acc = $agg_id . '-' . $aggre_name;
        $createby = $this->session->userdata('user_id');
        $createdate = date('Y-m-d H:i:s');


        $agg_coa = [
            'HeadCode'         => $headcode,
            'HeadName'         => $c_acc,
            'PHeadName'        => 'Aggregators Receivable',
            'HeadLevel'        => '4',
            'IsActive'         => '1',
            'IsTransaction'    => '0',
            'IsGL'             => '0',
            'HeadType'         => 'A',
            'IsBudget'         => '0',
            'IsDepreciation'   => '0',
            'customer_id'      => $agg_id,
            'DepreciationRate' => '0',
            'CreateBy'         => $createby,
            'CreateDate'       => $createdate,
        ];
        $this->db->insert('acc_coa', $agg_coa);


        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            
                redirect(base_url('Caggre'));
            
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Caggre'));
        }
    }

    //aggre Update Form
    public function aggre_update_form($aggre_id) {
        $content = $this->laggre->aggre_edit_data($aggre_id);
        $this->template->full_admin_html_view($content);
    }

    // aggre Update
    public function aggre_update() {
        $this->load->model('Aggre');
        $aggre_id = $this->input->post('aggre_id',TRUE);
        $data = array(
            'aggre_name' => $this->input->post('aggre_name',TRUE),
            'status'        => 1,
        );

        $this->Aggre->update_aggre($data, $aggre_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Caggre'));
    }

    // aggre delete
    public function aggre_delete($aggre_id) {
        $this->load->model('Aggre');
        $this->Aggre->delete_aggre($aggre_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
         redirect(base_url('Caggre'));
    }
    //csv upload
        function uploadCsv_aggre()
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
                   $insert_csv['aggre_name'] = (!empty($csv_line[0])?$csv_line[0]:null);
                }
             
                $aggredata = array(
                    'aggre_id'      => $this->auth->generator(15),
                    'aggre_name'    => $insert_csv['aggre_name'],
                    'status'           => 1
                );


                if ($count > 0) {
                    $this->db->insert('aggre_list',$aggredata);
                    }  
                $count++; 
            }
            
        }              
        $this->session->set_userdata(array('message'=>display('successfully_added')));
        redirect(base_url('Caggre'));
         }else{
        $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
        redirect(base_url('Caggre'));
    }
    
    }
    // aggre pdf download
        public function aggre_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Aggre');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator'); 
        $aggre_list = $CI->Aggre->aggre_list();
        if (!empty($aggre_list)) {
            $i = 0;
            if (!empty($aggre_list)) {
                foreach ($aggre_list as $k => $v) {
                    $i++;
                    $aggre_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_aggre'),
            'aggre_list' => $aggre_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
             'company_info'  => $company_info
        );
            $this->load->helper('download');
            $content = $this->parser->parse('aggre/aggre_list_pdf', $data, true);
            $time = date('Ymdhi');
            $dompdf = new DOMPDF();
            $dompdf->load_html($content);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/'.'aggre'.$time.'.pdf', $output);
            $file_path = 'assets/data/pdf/'.'aggre'.$time.'.pdf';
           $file_name = 'aggre'.$time.'.pdf';
            force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }

}
