<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccategory extends CI_Controller
{

    public $menu;

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('lcategory');
        $this->load->library('session');
        $this->load->model('Categories');
        $this->auth->check_admin_auth();
    }

    //Default loading for Category system.
    public function index()
    {
        $content = $this->lcategory->category_add_form();
        $this->template->full_admin_html_view($content);
    }

    public function insert_cats_ecom()
    {

        $url = api_url()."categories/cats";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);

        $records=json_decode($resp);

        $data=array();
        foreach ($records as $r){

            $data=array(

                'id'   => $r->id,
                'name'   => $r->name,
                'parent_id'   => $r->parent_id,
                'commision_rate'   => $r->commision_rate,
                'banner'   => $r->banner,
                'icon'  => $r->icon,
                'details' => $r->details,
                'featured' => $r->featured,
                'top' => $r->top,
                'digital' => $r->digital,
                'slug' => $r->slug,
                'meta_title' => $r->meta_title,
                'meta_description' => $r->meta_description,
                'creator' => $r->creator,
                'status' => $r->status,
                'created_at' => $r->created_at,
                'updated_at' => $r->updated_at,

            );

            $check_cats = $this->db->select('id')->from('cats')->where(array('id' =>$r->id))->get()->row();
            if (!empty($check_cats)) {
                $this->db->where(array('id' =>$r->id));
                $result = $this->db->update('cats', $data);

            }else{
                $result = $this->db->insert('cats', $data);

            }




        }

        $this->session->set_userdata(array('message' => 'Synchronized Successfully'));
        redirect(base_url('Ccategory'));

    }


    public function getItem()
    {
        $data = [];
        $parent_key = '0';
        $row = $this->db->select('id,name')->from('cats')->get()->num_rows();



        if($row > 0)
        {
            $data = $this->membersTree($parent_key);
        }else{
            $data=["id"=>"0","name"=>"No Category present in list","text"=>"No Category is present in list","nodes"=>[]];
        }

        echo json_encode(array_values($data));
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function membersTree($parent_key)
    {
        $row1 = [];
        $row = $this->db->select('*')->from('cats')->where('parent_id',$parent_key)->get()->result_array();

        foreach($row as $key => $value)
        {
            $id = $value['id'];
            $row1[$key]['id'] = $value['id'];
            $row1[$key]['name'] = $value['name'];
            $row1[$key]['text'] = $value['name'];
            $row1[$key]['nodes'] = array_values($this->membersTree($value['id']));
        }

        return $row1;
    }

    //Manage category form
    public function manage_category()
    {
        $content = $this->lcategory->category_list();
        $this->template->full_admin_html_view($content);
    }

    //Insert category and upload
    public function insert_category()
    {
        if ($_FILES['banner']['name']) {
            //Chapter chapter add start
            $config['upload_path']   = './my-assets/image/category/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('banner')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Ccategory'));
            } else {

                $imgdata = $this->upload->data();
                $banner = $config['upload_path'] . $imgdata['file_name'];
                $config['image_library']  = 'gd2';
                $config['source_image']   = $banner;
                $config['create_thumb']   = false;
                $config['maintain_ratio'] = TRUE;
                $config['width']          = 100;
                $config['height']         = 100;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $banner_url = base_url() . $banner;
            }
        }
        if ($_FILES['icon']['name']) {
            //Chapter chapter add start
            $config['upload_path']   = './my-assets/image/category/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('icon')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Ccategory'));
            } else {

                $icondata = $this->upload->data();
                $icon = $config['upload_path'] . $icondata['file_name'];
                $config['image_library']  = 'gd2';
                $config['source_image']   = $icon;
                $config['create_thumb']   = false;
                $config['maintain_ratio'] = TRUE;
                $config['width']          = 100;
                $config['height']         = 100;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $icon_url = base_url() . $icon;
            }
        }

        $data = array(
            'name' => $this->input->post('name', TRUE),
            'status' => $this->input->post('status', TRUE),
            'parent_id' => $this->input->post('parent_id', TRUE),
            'digital' => $this->input->post('digital', TRUE),
            'banner' => (!empty($banner_url) ? $banner_url : base_url('my-assets/image/product.png')),
            'icon' => (!empty($icon_url) ? $icon_url : base_url('my-assets/image/product.png')),
            'details' => $this->input->post('details', TRUE),
            'meta_title'  => $this->input->post('meta_title', TRUE),
            'meta_description'  => $this->input->post('meta_description', TRUE),


        );

        $result = $this->Categories->category_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));

            redirect(base_url('Ccategory'));
        } else {
            $this->session->set_userdata(array('error_message' => 'Something went wrong'));
            redirect(base_url('Ccategory'));
        }
    }

    //Category Update Form
    public function category_update_form($category_id)
    {
        $content = $this->lcategory->category_edit_data($category_id);
        $this->template->full_admin_html_view($content);
    }

    // Category Update
    public function category_update()
    {
        $this->load->model('Categories');
        $category_id = $this->input->post('category_id', TRUE);
        $data = array(
            'category_name' => $this->input->post('category_name', TRUE),
            'finished_raw'  => $this->input->post('product_status', TRUE),
            'status'        => 1,
        );

        $this->Categories->update_category($data, $category_id);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Ccategory'));
    }

    // Category delete
    public function category_delete($category_id)
    {
        $this->load->model('Categories');
        $this->Categories->delete_category($category_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
        redirect(base_url('Ccategory'));
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
                        $insert_csv['category_name'] = (!empty($csv_line[0]) ? $csv_line[0] : null);
                    }

                    $categorydata = array(
                        'category_id'      => $this->auth->generator(15),
                        'category_name'    => $insert_csv['category_name'],
                        'status'           => 1
                    );


                    if ($count > 0) {
                        $this->db->insert('product_category', $categorydata);
                    }
                    $count++;
                }
            }
            $this->session->set_userdata(array('message' => display('successfully_added')));
            redirect(base_url('Ccategory'));
        } else {
            $this->session->set_userdata(array('error_message' => 'Please Import Only Csv File'));
            redirect(base_url('Ccategory'));
        }
    }
    // category pdf download
    public function category_downloadpdf()
    {
        $CI = &get_instance();
        $CI->load->model('Categories');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator');
        $category_list = $CI->Categories->category_list();
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
        file_put_contents('assets/data/pdf/' . 'category' . $time . '.pdf', $output);
        $file_path = 'assets/data/pdf/' . 'category' . $time . '.pdf';
        $file_name = 'category' . $time . '.pdf';
        force_download(FCPATH . 'assets/data/pdf/' . $file_name, null);
    }
}
