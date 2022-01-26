<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chrm extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('session');
        $this->load->model('Hrm_model');
        $this->auth->check_admin_auth();
    }

    //Designation form
    public function add_designation() {
    $data['title'] = display('add_designation');
    $content = $this->parser->parse('hr/employee_type', $data, true);
    $this->template->full_admin_html_view($content);
    }
    // create designation
    public function create_designation(){
    $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
    $this->form_validation->set_rules('details',display('details'),'max_length[250]');
        #-------------------------------#
        if ($this->form_validation->run()) {
            $postData = [
                'id'            => $this->input->post('id',true),
                'designation'   => $this->input->post('designation',true),
                'details'       => $this->input->post('details',true),
            ];   
           if(empty($this->input->post('id',true))){
            if ($this->Hrm_model->create_designation($postData)) { 
                $this->session->set_flashdata('message', display('save_successfully'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
        }else{
             if ($this->Hrm_model->update_designation($postData)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
           
        }
  redirect("Chrm/manage_designation");
        }
         redirect("Chrm/add_designation");
    }


    //Manage designation
    public function manage_designation() {
        $this->load->model('Hrm_model');
     $data['title']            = display('manage_designation');
     $data['designation_list'] = $this->Hrm_model->designation_list();
     $content                  = $this->parser->parse('hr/designation_list', $data, true);
    $this->template->full_admin_html_view($content);
    }

    //designation Update Form
    public function designation_update_form($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('designation_update_form');
     $data['designation_data'] = $this->Hrm_model->designation_editdata($id);
     $content                  = $this->parser->parse('hr/employee_type', $data, true);
     $this->template->full_admin_html_view($content);
    }

    // designation delete
    public function designation_delete($id) {
    $this->load->model('Hrm_model');
    $this->Hrm_model->delete_designation($id);
    $this->session->set_userdata(array('message' => display('successfully_delete')));
     redirect("Chrm/manage_designation");
    }
    // ================== Employee part =============================
    public function add_employee() {
    $this->auth->check_admin_auth();
    $this->load->model('Hrm_model');
    $data['title'] = display('add_employee');
    $data['desig'] = $this->Hrm_model->designation_dropdown();
    $content = $this->parser->parse('hr/employee_form', $data, true);
    $this->template->full_admin_html_view($content);
    }
    // create employee
    public function create_employee(){

      //  echo "Ok";exit();

        $this->load->model('Hrm_model');

     $this->form_validation->set_rules('first_name',display('first_name'),'required|max_length[100]');
      $this->form_validation->set_rules('last_name',display('last_name'),'required|max_length[100]');
      $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
    $this->form_validation->set_rules('phone',display('phone'),'max_length[20]');
     $this->form_validation->set_rules('hrate',display('salary'),'max_length[20]');
        #-------------------------------#

      //  echo "Ok";exit();
//        $employee_id=$this->generator(10);
//        $employee_id = strtoupper($employee_id);

        //if ($this->form_validation->run()) {

            if ($_FILES['image']['name']) {
                $config['upload_path'] = './my-assets/image/employee/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
                $config['max_size'] = "*";
                $config['max_width'] = "*";
                $config['max_height'] = "*";
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                    redirect(base_url('Chrm/add_employee'));
                } else {
                    $image = $this->upload->data();
                    $image_url = base_url() . "my-assets/image/employee/" . $image['file_name'];
                }
            }
            if ($_FILES['nominee_image']['name']) {
                $config['upload_path'] = './my-assets/image/employee/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
                $config['max_size'] = "*";
                $config['max_width'] = "*";
                $config['max_height'] = "*";
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('nominee_image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                    redirect(base_url('Chrm/add_employee'));
                } else {
                    $nominee_image = $this->upload->data();
                    $nominee_image_url = base_url() . "my-assets/image/employee/" . $nominee_image['file_name'];
                }
            }

            if ($_FILES['gua_image']['name']) {
                $config['upload_path'] = './my-assets/image/employee/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
                $config['max_size'] = "*";
                $config['max_width'] = "*";
                $config['max_height'] = "*";
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gua_image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                    redirect(base_url('Chrm/add_employee'));
                } else {
                    $gua_image = $this->upload->data();
                    $gua_image_url = base_url() . "my-assets/image/employee/" . $gua_image['file_name'];
                }
            }

        if ($_FILES['fam_image']['name']) {
            $config['upload_path'] = './my-assets/image/employee/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = "*";
            $config['max_width'] = "*";
            $config['max_height'] = "*";
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fam_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Chrm/add_employee'));
            } else {
                $fam_image = $this->upload->data();
                $fam_image_url = base_url() . "my-assets/image/employee/" . $fam_image['file_name'];
            }
        }

             $employee_id=$this->input->post('employee_id',true);
            $postData = [
                'employee_id' => $employee_id,
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'designation' => $this->input->post('designation', true),
                'phone' => $this->input->post('phone', true),
                'image' => (!empty($image_url) ? $image_url : ''),
                'rate_type' => $this->input->post('rate_type', true),
                'email' => $this->input->post('email', true),
                'hrate' => $this->input->post('hrate', true),
                'address_line_1' => $this->input->post('address_line_1', true),
                'address_line_2' => $this->input->post('address_line_2', true),
                'blood_group' => $this->input->post('blood_group', true),
                'country' => $this->input->post('country', true),
                'city' => $this->input->post('city', true),
                'zip' => $this->input->post('zip', true),
                'dob' => $this->input->post('dob', true),


                'department' => $this->input->post('department', true),
                //  'experience'           => $this->input->post('experience',true),
                'age' => $this->input->post('age', true),
                'training' => $this->input->post('training', true),
              //  'special_training' => $this->input->post('special_training', true),

                'father_name' => $this->input->post('father_name', true),
                'mother_name' => $this->input->post('mother_name', true),
                'nid_number' => $this->input->post('nid_number', true),

                'nominee_name' => $this->input->post('nominee_name', true),
                'nominee_nid' => $this->input->post('nominee_nid', true),
                'nominee_image' => (!empty($nominee_image_url) ? $nominee_image_url : ''),
                'nominee_phone' => $this->input->post('nominee_phone', true),

                'gua_name' => $this->input->post('gua_name', true),
                'gua_nid' => $this->input->post('gua_nid', true),
                'gua_profession' => $this->input->post('gua_profession', true),
                'gua_image' => (!empty($gua_image_url) ? $gua_image_url : ''),
                'gua_phone' => $this->input->post('gua_phone', true),

                'fam_name' => $this->input->post('fam_name', true),
                'fam_nid' => $this->input->post('fam_nid', true),
                'fam_profession' => $this->input->post('fam_profession', true),
                'fam_relation' => $this->input->post('fam_relation', true),
                'fam_image' => (!empty($fam_image_url) ? $fam_image_url : ''),
                'fam_phone' => $this->input->post('fam_phone', true),

                'dar' => $this->input->post('dar', true),
            ];

          //  echo '<pre>';print_r($postData);exit();


            $degree = $this->input->post('degree', true);
            $ins = $this->input->post('inst', true);
            $subject = $this->input->post('subject', true);
            $passing_year = $this->input->post('year', true);
            $result = $this->input->post('result', true);
            $company = $this->input->post('company', true);
            $desig = $this->input->post('des', true);
            $duration = $this->input->post('duration', true);
            $tr_centre = $this->input->post('tr_centre', true);
            $tr_name = $this->input->post('tr_name', true);
            $tr_duration = $this->input->post('tr_duration', true);



            if ($this->Hrm_model->create_employee($postData)) {

                if (!empty($degree)) {
                    foreach ($degree as $key => $value) {

                        $data['degree'] = $value;
                        $data['employee_id'] = $employee_id;

                        $data['institution'] = $ins[$key];
                        $data['subject'] = $subject[$key];
                        $data['passing_year'] = $passing_year[$key];
                        $data['result'] = $result[$key];
//                        echo '<pre>';
//                        print_r($data);
                        if (!empty($data)) {
                            $this->db->insert('employee_academic', $data);
                        }
                    }

                }

                if (!empty($company)) {
                    foreach ($company as $key => $value) {

                        $data2['company'] = $value;
                        $data2['employee_id'] = $employee_id;

                        $data2['des'] = $desig[$key];
                        $data2['duration'] = $duration[$key];

                        //  echo '<pre>';print_r($data2);exit();
                        if (!empty($data2)) {
                            $this->db->insert('employee_ex', $data2);
                        }
                    }

                }
                if (!empty($tr_centre)) {
                    foreach ($tr_centre as $key => $value) {

                        $data3['tr_centre'] = $value;
                        $data3['employee_id'] = $employee_id;

                        $data3['tr_name'] = $tr_name[$key];
                        $data3['tr_duration'] = $tr_duration[$key];

                        //  echo '<pre>';print_r($data2);exit();
                        if (!empty($data3)) {
                            $this->db->insert('employee_tr', $data3);
                        }
                    }

                }

                $this->session->set_flashdata('message', display('save_successfully'));
                redirect("Chrm/manage_employee");
            } else {
                $this->session->set_flashdata('error_message', display('please_try_again'));
                redirect("Chrm/manage_employee");
            }
      //  }
//               else {
//                $this->session->set_flashdata('error_message',  display('please_try_again'));
//                 redirect("Chrm/add_employee");
//            }
    }
    // Manage employee
    public function manage_employee() {
    $this->load->model('Hrm_model');
     $data['title']            = display('manage_employee');
     $data['employee_list']    = $this->Hrm_model->employee_list();
     $content                  = $this->parser->parse('hr/employee_list', $data, true);
    $this->template->full_admin_html_view($content);
    }
    // Employee Update form
   public function employee_update_form($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('employee_update');
     $data['employee_data']    = $this->Hrm_model->employee_editdata($id);
     $data['tr_data']    = $this->Hrm_model->tr_editdata($id);
     $data['ac_data']    = $this->Hrm_model->ac_editdata($id);
     $data['ex_data']    = $this->Hrm_model->ex_editdata($id);
     $data['desig']            = $this->Hrm_model->designation_dropdown();

  //   echo '<pre>';print_r($data);exit();
     $content                  = $this->parser->parse('hr/employee_updateform', $data, true);
     $this->template->full_admin_html_view($content);
    }
    // Update employee
    public function update_employee(){
        $this->load->model('Hrm_model');

         if ($_FILES['image']['name']) {
            $config['upload_path'] = './my-assets/image/employee/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = "*";
            $config['max_width'] = "*";
            $config['max_height'] = "*";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Chrm/add_employee'));
            } else {
                $image = $this->upload->data();
                $image_url = base_url() . "my-assets/image/employee/" . $image['file_name'];
            }
        }
        if ($_FILES['nominee_image']['name']) {
            $config['upload_path'] = './my-assets/image/employee/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = "*";
            $config['max_width'] = "*";
            $config['max_height'] = "*";
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('nominee_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Chrm/add_employee'));
            } else {
                $nominee_image = $this->upload->data();
                $nominee_image_url = base_url() . "my-assets/image/employee/" . $nominee_image['file_name'];
            }
        }

        if ($_FILES['gua_image']['name']) {
            $config['upload_path'] = './my-assets/image/employee/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = "*";
            $config['max_width'] = "*";
            $config['max_height'] = "*";
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gua_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Chrm/add_employee'));
            } else {
                $gua_image = $this->upload->data();
                $gua_image_url = base_url() . "my-assets/image/employee/" . $gua_image['file_name'];
            }
        }
        if ($_FILES['fam_image']['name']) {
            $config['upload_path'] = './my-assets/image/employee/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = "*";
            $config['max_width'] = "*";
            $config['max_height'] = "*";
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fam_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Chrm/add_employee'));
            } else {
                $fam_image = $this->upload->data();
                $fam_image_url = base_url() . "my-assets/image/employee/" . $fam_image['file_name'];
            }
        }


        $headname = $this->input->post('id',true).'-'.$this->input->post('old_first_name',true).''.$this->input->post('old_last_name',true);
        $employee_id=$this->input->post('employee_id',true);

        $postData = [
                   'employee_id'=>$employee_id,
                'id'            => $this->input->post('id',true),
                'first_name'    => $this->input->post('first_name',true),
                'last_name'     => $this->input->post('last_name',true),
                'designation'   => $this->input->post('designation',true),
                'phone'         => $this->input->post('phone',true),
                'image'         => (!empty($image_url) ? $image_url :$this->input->post('old_image',true)),
                'rate_type'     => $this->input->post('rate_type',true),
                'email'         => $this->input->post('email',true),
                'hrate'         => $this->input->post('hrate',true),
                'address_line_1'=> $this->input->post('address_line_1',true),
                'address_line_2'=> $this->input->post('address_line_2',true),
                'blood_group'   => $this->input->post('blood_group',true),
                'country'       => $this->input->post('country',true),
                'city'          => $this->input->post('city',true),
                'zip'           => $this->input->post('zip',true),
                'dob'           => $this->input->post('dob',true),

             'department' => $this->input->post('department', true),
             //  'experience'           => $this->input->post('experience',true),
             'age' => $this->input->post('age', true),
             'training' => $this->input->post('training', true),
             //  'special_training' => $this->input->post('special_training', true),

             'father_name' => $this->input->post('father_name', true),
             'mother_name' => $this->input->post('mother_name', true),
             'nid_number' => $this->input->post('nid_number', true),

             'nominee_name' => $this->input->post('nominee_name', true),
             'nominee_nid' => $this->input->post('nominee_nid', true),
             'nominee_image' => (!empty($nominee_image_url) ? $nominee_image_url :$this->input->post('old_nominee__image',true)),
             'nominee_phone' => $this->input->post('nominee_phone', true),

             'gua_name' => $this->input->post('gua_name', true),
             'gua_nid' => $this->input->post('gua_nid', true),
             'gua_profession' => $this->input->post('gua_profession', true),
             'gua_image' => (!empty($gua_image_url) ? $gua_image_url :$this->input->post('old_gua_image',true)),
             'gua_phone' => $this->input->post('gua_phone', true),

             'fam_name' => $this->input->post('fam_name', true),
             'fam_nid' => $this->input->post('fam_nid', true),
             'fam_profession' => $this->input->post('fam_profession', true),
             'fam_relation' => $this->input->post('fam_relation', true),
             'fam_image' => (!empty($fam_image_url) ? $fam_image_url :$this->input->post('old_fam_image',true)),
             'fam_phone' => $this->input->post('fam_phone', true),

             'dar' => $this->input->post('dar', true),
            ];
       // $ac_id = $this->input->post('ac_id', true);
        $degree = $this->input->post('degree', true);
        $ins = $this->input->post('inst', true);
        $subject = $this->input->post('subject', true);
        $passing_year = $this->input->post('year', true);
        $result = $this->input->post('result', true);
        $this->db->where('employee_id', $employee_id);
        $this->db->delete('employee_academic');


       // $ex_id = $this->input->post('ex_id', true);
        $company = $this->input->post('company', true);
        $desig = $this->input->post('des', true);
        $duration = $this->input->post('duration', true);
        $this->db->where('employee_id', $employee_id);
        $this->db->delete('employee_ex');

       // $tr_id = $this->input->post('tr_id', true);
        $tr_centre = $this->input->post('tr_centre', true);
        $tr_name = $this->input->post('tr_name', true);
        $tr_duration = $this->input->post('tr_duration', true);
        $this->db->where('employee_id', $employee_id);
        $this->db->delete('employee_tr');



             if ($this->Hrm_model->update_employee($postData,$headname)) {

                 if (!empty($degree)) {
                     foreach ($degree as $key => $value) {

                         $data['degree'] = $value;
                         $data['employee_id'] = $employee_id;

                         $data['institution'] = $ins[$key];
                       //  $data['ac_id'] = $ac_id[$key];
                         $data['subject'] = $subject[$key];
                         $data['passing_year'] = $passing_year[$key];
                         $data['result'] = $result[$key];
//                        echo '<pre>';
//                        print_r($data);
                         if (!empty($data)) {
                            // $this->db->where('ac_id',$ac_id);
                             $this->db->insert('employee_academic', $data);
                         }
                     }

                 }

                 if (!empty($company)) {
                     foreach ($company as $key => $value) {

                         $data2['company'] = $value;
                         $data2['employee_id'] = $employee_id;

                         $data2['des'] = $desig[$key];
                         $data2['duration'] = $duration[$key];

                         //  echo '<pre>';print_r($data2);exit();
                         if (!empty($data2)) {
                             //$this->db->where('ex_id',$ex_id);
                             $this->db->insert('employee_ex', $data2);
                         }
                     }

                 }
                 if (!empty($tr_centre)) {
                     foreach ($tr_centre as $key => $value) {

                         $data3['tr_centre'] = $value;
                         $data3['employee_id'] = $employee_id;

                         $data3['tr_name'] = $tr_name[$key];
                         $data3['tr_duration'] = $tr_duration[$key];

                         //  echo '<pre>';print_r($data2);exit();
                         if (!empty($data3)) {
                            // $this->db->where('tr_id',$tr_id);
                             $this->db->insert('employee_tr', $data3);
                         }
                     }

                 }


                 $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
             redirect("Chrm/manage_employee");
    }
    // delete employee
    public function employee_delete($id) {
    $this->load->model('Hrm_model');
    $this->Hrm_model->delete_employee($id);
    $this->session->set_userdata(array('message' => display('successfully_delete')));
   redirect("Chrm/manage_employee");
    }


    public function employee_details($id) {
    $this->load->model('Hrm_model');
     $data['title']            = 'Employee Details';
        $data['tr_data']    = $this->Hrm_model->tr_editdata($id);
        $data['ac_data']    = $this->Hrm_model->ac_editdata($id);
        $data['ex_data']    = $this->Hrm_model->ex_editdata($id);
     $data['row']              = $this->Hrm_model->employee_details($id);

    // echo '<pre>';print_r($data);exit();
     $content                  = $this->parser->parse('hr/resumepdf', $data, true);
     $this->template->full_admin_html_view($content);
    }
}
