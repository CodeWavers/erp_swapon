<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cptype extends CI_Controller
{

    public $menu;

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('lptype');
        $this->load->library('session');
        $this->load->model('Ptype');
        $this->auth->check_admin_auth();
    }

    //Default loading for Category system.
    public function index()
    {
        $content = $this->lptype->category_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Manage category form
    public function manage_category()
    {
        $content = $this->lptype->category_list();
        $this->template->full_admin_html_view($content);
    }

    //Insert category and upload
    public function insert_category()
    {
        $ptype_id = $this->auth->generator(15);

        $data = array(
            'ptype_id'   => $ptype_id,
            'ptype_name' => $this->input->post('ptype_name', TRUE),
            'finished_raw'  => $this->input->post('product_status', TRUE),
            'status'        => 1
        );

        $result = $this->Ptype->category_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Cptype'));
        } else {
            $this->session->set_userdata(array('error_message' => display('already_inserted')));
            redirect(base_url('Cptype'));
        }
    }

    //Category Update Form
    public function category_update_form($ptype_id)
    {
        $content = $this->lptype->category_edit_data($ptype_id);
        $this->template->full_admin_html_view($content);
    }

    // Category Update
    public function category_update()
    {
        $this->load->model('Ptype');
        $ptype_id = $this->input->post('ptype_id', TRUE);
        $data = array(
            'ptype_name' => $this->input->post('ptype_name', TRUE),
            'finished_raw'  => $this->input->post('product_status', TRUE),
            'status'        => 1,
        );

        $this->Ptype->update_category($data, $ptype_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cptype'));
    }

    // Category delete
    public function category_delete($ptype_id)
    {
        $this->load->model('Ptype');
        $this->Ptype->delete_category($ptype_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        redirect(base_url('Cptype'));
    }
    //csv upload
    function uploadCsv_category()
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
                        $insert_csv['ptype_name'] = (!empty($csv_line[0]) ? $csv_line[0] : null);
                    }

                    $categorydata = array(
                        'ptype_id'      => $this->auth->generator(15),
                        'ptype_name'    => $insert_csv['ptype_name'],
                        'status'           => 1
                    );


                    if ($count > 0) {
                        $this->db->insert('product_type', $categorydata);
                    }
                    $count++;
                }
            }
            $this->session->set_userdata(array('message' => display('successfully_added')));
            redirect(base_url('Cptype'));
        } else {
            $this->session->set_userdata(array('error_message' => 'Please Import Only Csv File'));
            redirect(base_url('Cptype'));
        }
    }
    // category pdf download
    public function category_downloadpdf()
    {
        $CI = &get_instance();
        $CI->load->model('Ptype');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator');
        $category_list = $CI->Ptype->category_list();
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
        $content = $this->parser->parse('product_type/ptype_list_pdf', $data, true);
        $time = date('Ymdhi');
        $dompdf = new DOMPDF();
        $dompdf->load_html($content);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/' . 'ptype' . $time . '.pdf', $output);
        $file_path = 'assets/data/pdf/' . 'ptype' . $time . '.pdf';
        $file_name = 'ptype' . $time . '.pdf';
        force_download(FCPATH . 'assets/data/pdf/' . $file_name, null);
    }
}
