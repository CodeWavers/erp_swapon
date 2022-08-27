<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->template->current_menu = 'home';
        $this->load->model('Web_settings');
        $this->load->model('Reports');
    }

    public function index()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();

        $CI->load->model('Customers');
        $CI->load->model('Products');
        $CI->load->model('Suppliers');
        $CI->load->model('Invoices');
        $CI->load->model('Purchases');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $total_customer = $CI->Customers->count_customer();
        $total_product = $CI->Products->count_product();
        $total_suppliers = $CI->Suppliers->count_supplier();
        $total_sales = $CI->Invoices->count_invoice();
        $total_purchase = $CI->Purchases->count_purchase();
        $todays_sales_report = $CI->Invoices->todays_sales_report();
        $monthly_sales_report = $CI->Reports->monthly_sales_report();
        $sales_report = $CI->Reports->todays_total_sales_report();
        $salesamount = $CI->Reports->todays_total_sales_amount();
        $purchase_report = $CI->Reports->todays_total_purchase_report();
        $todays_sale_product = $CI->Reports->todays_sale_product();
        $total_profit = ($sales_report[0]['total_sale'] - $sales_report[0]['total_supplier_rate']);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $best_sales_product = $CI->Invoices->best_sales_products();
        $tlvmonth = '';
        $month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        for ($i = 0; $i <= 11; $i++) {
            $tlvmonth .= $month[$i] . ',';
        }

        $currentyearsale = '';
        for ($i = 1; $i <= 12; $i++) {
            $sold = $CI->Reports->yearly_invoice_report($i);
            if (!empty($sold)) {
                $currentyearsale .= $sold->total_sale . ",";
            } else {
                $currentyearsale .= ",";
            }
        }

        $currentyearpurchase = '';
        for ($i = 1; $i <= 12; $i++) {
            $purchase = $CI->Reports->yearly_purchase_report($i);
            if (!empty($purchase)) {
                $currentyearpurchase .= $purchase->total_purchase . ",";
            } else {
                $currentyearpurchase .= ",";
            }
        }


        $chart_label = $chart_data = '';
        if (!empty($best_sales_product))
            for ($i = 0; $i < 12; $i++) {
                $chart_label .= (!empty($best_sales_product[$i]) ? $best_sales_product[$i]->product_name . ', ' : null);
                $chart_data .= (!empty($best_sales_product[$i]) ? $best_sales_product[$i]->quantity . ', ' : null);
            }
        $data = array(
            'title' => display('dashboard'),
            'total_customer' => $total_customer,
            'total_product' => $total_product,
            'total_suppliers' => $total_suppliers,
            'tlvmonthsale' => $currentyearsale,
            'tlvmonthpurchase' => $currentyearpurchase,
            'month' => $tlvmonth,
            'total_sales' => $total_sales,
            'total_purchase' => $total_purchase,
            'todays_sales_report' => $todays_sales_report,
            'chart_label' => $chart_label,
            'chart_data' => $chart_data,
            'purchase_amount' => number_format($sales_report[0]['total_supplier_rate'], 2, '.', ','),
            'sales_amount' => number_format($salesamount[0]['total_amount'], 2, '.', ','),
            'todays_sale_product' => $todays_sale_product,
            'todays_total_purchase' => number_format($purchase_report[0]['ttl_purchase_amount'], 2, '.', ','),
            'total_profit' => number_format($total_profit, 2, '.', ','),
            'monthly_sales_report' => $monthly_sales_report,
            'best_sales_product' => $best_sales_product,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );

        $content = $CI->parser->parse('include/admin_home', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //    ============ its for see_all_best_sales =============
    public function see_all_best_sales()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $CI->load->model('Customers');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $company_info = $CI->Customers->retrieve_company();
        $best_saler_product_list = $CI->Invoices->best_saler_product_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title' => display('dashboard'),
            'best_saler_product_list' => $best_saler_product_list,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
        );

        $content = $CI->parser->parse('report/best_saler_product_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //    ============ its for todays_customer_receipt =============
    public function todays_customer_receipt()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $today = date('Y-m-d');

        $company_info = $CI->Customers->retrieve_company();
        $all_customer = $this->db->select('*')->from('customer_information')->get()->result();
        $todays_customer_receipt = $CI->Invoices->todays_customer_receipt($today);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title' => "Received From Customer",
            'all_customer' => $all_customer,
            'todays_customer_receipt' => $todays_customer_receipt,
            'today' => $today,
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'customer_info' => '',
            'company' => $company_info,
        );

        $content = $CI->parser->parse('report/todays_customer_receipt', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //    ============ its for todays_customer_receipt =============
    public function filter_customer_wise_receipt()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $customer_id = $this->input->post('customer_id', TRUE);
        $district = $this->input->post('district', TRUE);
        $from_date = $this->input->post('from_date', TRUE);
        $today = date('Y-m-d');

        $company_info = $CI->Customers->retrieve_company();
        $all_customer = $this->db->select('*')->from('customer_information')->get()->result();
        $filter_customer_wise_receipt = $CI->Invoices->filter_customer_wise_receipt($customer_id, $district, $from_date);
        $todays_customer_receipt = $CI->Invoices->todays_customer_receipt($today);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();


        $data = array(
            'title' => "Received From Customer",
            'all_customer' => $all_customer,
            'todays_customer_receipt' => $filter_customer_wise_receipt,
            'today' => $today,
            'customer_info' => $CI->Invoices->customerinfo_rpt($customer_id),
            'company_info' => $company_info,
            'currency' => $currency_details[0]['currency'],
            'position' => $currency_details[0]['currency_position'],
            'software_info' => $currency_details,
            'company' => $company_info,
        );

        $content = $CI->parser->parse('report/todays_customer_receipt', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Today All Report
    public function all_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $user_type = $this->session->userdata('user_type');
        $content = $CI->lreport->retrieve_all_reports();
        $this->template->full_admin_html_view($content);
    }

    #==============Todays_sales_report============#

    public function todays_sales_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/todays_sales_report/');
        $config["total_rows"] = $this->Reports->todays_sales_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #

        $content = $CI->lreport->todays_sales_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }
    // ========================= User Sales Report ==================

    #==============Todays_sales_report============#

    public function user_sales_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $user_id = (!empty($this->input->get('user_id')) ? $this->input->get('user_id') : '');
        $star_date = (!empty($this->input->get('from_date')) ? $this->input->get('from_date') : date('Y-m-d'));
        $end_date = (!empty($this->input->get('to_date')) ? $this->input->get('to_date') : date('Y-m-d'));
        $this->auth->check_admin_auth();
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/user_sales_report/');
        $config["total_rows"] = $this->Reports->user_sales_count($star_date, $end_date, $user_id);
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #

        $content = $CI->lreport->user_sales_report($links, $config["per_page"], $page, $star_date, $end_date, $user_id);
        $this->template->full_admin_html_view($content);
    }

    #================todays_purchase_report========#

    public function todays_purchase_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/todays_purchase_report/');
        $config["total_rows"] = $this->Reports->todays_sales_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #

        $content = $CI->lreport->todays_purchase_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function purchase_warrenty_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_warrenty_report/');
        $config["total_rows"] = $this->Reports->purchase_warrenty_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #

        $content = $CI->lreport->purchase_warrenty_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function purchase_expiry_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_expiry_report/');
        $config["total_rows"] = $this->Reports->purchase_expiry_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #

        $content = $CI->lreport->purchase_expiry_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function purchase_cheque_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_cheque_report/');
        $config["total_rows"] = $this->Reports->purchase_cheque_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #

        $content = $CI->lreport->purchase_cheque_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #============ Purchase_cheque_report datatable=======================#

    public function get_purchase_cheque()
    {

        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        // $from_date  = $this->input->get('from_date');
        // $to_date    = $this->input->get('to_date');
        // $product_id = $this->input->get('product_id');
        // $columns = array(0 =>'holiday',1=> 'details',2=> 'ground_id',3=> 'status',4=> 'action'
        // );
        $totalData = $this->Reports->purchase_cheque_report_count();
        // $limit = $this->input('length');
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select("a.*,b.*,c.*,d.*,e.*");
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->join('bank_add e', 'e.bank_id = a.bank_id');
        $this->db->join('product_purchase_details c', 'c.purchase_id = a.purchase_id');
        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->where('payment_type', 2);
        $this->db->where('a.status', 2);
        $this->db->order_by('a.purchase_id', 'desc');
        // $this->db->limit($per_page, $page);
        $query = $this->db->get();
        // $query = $this->db->get('product_purchase');
        //echo "<pre>";print_r($query);exit();

        $data = array();


        foreach ($query->result() as $r) {

            $nestedData['id'] = $r->id;
            $nestedData['purchase_id'] = $r->purchase_id;
            $nestedData['supplier_name'] = $r->supplier_name;
            $nestedData['bank_id'] = $r->bank_name;
            $nestedData['cheque_no'] = $r->cheque_no;

            if ($r->status == 2) {
                $r->status = 'Paid';
            } else {
                $r->status = '<div style="color: red"><b>Pending</b></div>';
            }
            $nestedData['status'] = $r->status;
            $nestedData['cheque_date'] = $r->cheque_date;
            $nestedData['action'] = '<a href="javascript:;" class="glyphicon glyphicon-edit date-edit" data="' . $r->purchase_id . '" style="font-size:24px; color: #1bc9f5"></a>';
            $data[] = $nestedData;


            // $data[] = array(
            //      $r->invoice_id,
            //      $r->customer_name,
            //      $r->bank_id,
            //      $r->cheque_no,
            //      $r->status,
            //      $r->cheque_date


            // );
        }


        $result = array(
            "draw" => $draw,
            "recordsTotal" => $totalData,
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );


        echo json_encode($result);
        exit();
    }

    #===============getting purchase cheque date from model==============#

    public function get_purchase_cheque_date()
    {
        $result = $this->Reports->get_puchase_cheque_data();
        echo json_encode($result);
    }

    #===============Update purchase cheque date =========================#

    public function purchase_cheque_date_update()
    {
        $cheque_data = $this->Reports->update_purchase_data();
        $data['result'] = $cheque_data['result'];
        $data['dd'] = $cheque_data['dd'];
        $data['ddd'] = $cheque_data['ddd'];
        echo json_encode($data);
    }

    #=============Total purchase_report_category_wise ===================#

    public function purchase_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_report_category_wise/');
        $config["total_rows"] = $this->Reports->purchase_report_category_wise_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->purchase_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function purchase_warrenty_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_warrenty_report_category_wise/');
        $config["total_rows"] = $this->Reports->purchase_report_category_wise_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->purchase_warrenty_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function purchase_expired_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_expired_report_category_wise/');
        $config["total_rows"] = $this->Reports->purchase_report_category_wise_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->purchase_expired_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function purchase_report_shelf_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #F
        $config["base_url"] = base_url('Admin_dashboard/purchase_report_shelf_wise/');
        $config["total_rows"] = $this->Reports->purchase_report_shelf_wise_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->purchase_report_shelf_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function supplier_payment_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #F
        $config["base_url"] = base_url('Admin_dashboard/supplier_payment_report/');
        $config["total_rows"] = $this->Reports->supplier_payment_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->supplier_payment_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function customer_recieve_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #F
        $config["base_url"] = base_url('Admin_dashboard/customer_recieve_report/');
        $config["total_rows"] = $this->Reports->customer_recieve_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->customer_recieve_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }


    //    ========= its for filter_purchase_report_category_wise ==============
    public function filter_purchase_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $category = $this->input->post('category', TRUE);
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $content = $this->lreport->filter_purchase_report_category_wise($category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    public function filter_purchase_warrenty_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $category = $this->input->post('category', TRUE);
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $content = $this->lreport->filter_purchase_warrenty_report_category_wise($category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    public function filter_purchase_expired_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $category = $this->input->post('category', TRUE);
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $content = $this->lreport->filter_purchase_expired_report_category_wise($category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    public function filter_purchase_report_shelf_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $product = $this->input->post('product_id', TRUE);
        $category = $this->input->post('shelf_id', TRUE);

        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $content = $this->lreport->filter_purchase_report_shelf_wise($product, $category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    public function filter_sp_report_date_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');


        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $content = $this->lreport->filter_sp_report_date_wise($from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    public function filter_cr_report_date_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');


        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $content = $this->lreport->filter_cr_report_date_wise($from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    //    ============== sales report category wise =================
    public function sales_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/sales_report_category_wise/');
        $config["total_rows"] = $this->Reports->sales_report_category_wise_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->sales_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    //    ============== Varience Report =================
    public function variance_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $product_id = $this->input->post('product_id');
        $category = $this->input->post('category');

        //echo $from_date;exit();
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/variance_report/');
        $config["total_rows"] = $this->Reports->sales_report_category_wise_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        #

        $content = $CI->lreport->variance_report($links, $config["per_page"], $page,$category,$product_id,$from_date,$to_date);
        $this->template->full_admin_html_view($content);
    }

    //    ========= its for filter_sales_report_category_wise ==============
    public function filter_sales_report_category_wise()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $category = $this->input->post('category', TRUE);
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $outlet_id = $this->input->get('outlet_id');
        $content = $this->lreport->filter_sales_report_category_wise($outlet_id, $category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }



    #=============Total profit report===================#

    public function total_profit_report()
    {
        $CI = &get_instance();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/total_profit_report/');
        $config["total_rows"] = $this->Reports->total_profit_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->total_profit_report($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #============Date wise sales report==============#

    public function retrieve_dateWise_SalesReports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $outlet_id = $this->input->get('outlet_id');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        } else {
            $perpagdata = 50;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_SalesReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_SalesReports($outlet_id, $from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }


    // ===================== Due Report Start=============================

    public function retrieve_dateWise_DueReports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date = (!empty($this->input->get('from_date')) ? $this->input->get('from_date') : date('Y-m-d'));
        $to_date = (!empty($this->input->get('to_date')) ? $this->input->get('to_date') : date('Y-m-d'));
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        } else {
            $perpagdata = 50;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_DueReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_DueReports($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }
    // ====================  Due Report End ============================
    #==============Date wise purchase report=============#

    public function retrieve_dateWise_PurchaseReports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $start_date = $this->input->get('from_date');
        $end_date = $this->input->get('to_date');
        #exit;
        #pagination starts
        #
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_dateWise_PurchaseReports($start_date, $end_date);
        } else {
            $perpagdata = 25;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_PurchaseReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_PurchaseReports($start_date, $end_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        $content = $CI->lreport->retrieve_dateWise_PurchaseReports($start_date, $end_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function retrieve_warrenty_dateWise_PurchaseReports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $start_date = $this->input->get('from_date');
        $end_date = $this->input->get('to_date');
        #exit;
        #pagination starts
        #
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_warrenty_dateWise_PurchaseReports($start_date, $end_date);
        } else {
            $perpagdata = 25;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_warrenty_dateWise_PurchaseReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_warrenty_dateWise_PurchaseReports($start_date, $end_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        $content = $CI->lreport->retrieve_warrenty_dateWise_PurchaseReports($start_date, $end_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function retrieve_expiry_dateWise_PurchaseReports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $start_date = $this->input->get('from_date');
        $end_date = $this->input->get('to_date');
        #exit;
        #pagination starts
        #
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_warrenty_dateWise_PurchaseReports($start_date, $end_date);
        } else {
            $perpagdata = 25;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_expiry_dateWise_PurchaseReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_expiry_dateWise_PurchaseReports($start_date, $end_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        $content = $CI->lreport->retrieve_expiry_dateWise_PurchaseReports($start_date, $end_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    public function retrieve_cheque_dateWise_PurchaseReports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $start_date = $this->input->get('from_date');
        $end_date = $this->input->get('to_date');
        #exit;
        #pagination starts
        #
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_cheque_dateWise_PurchaseReports($start_date, $end_date);
        } else {
            $perpagdata = 25;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_cheque_dateWise_PurchaseReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_cheque_dateWise_PurchaseReports($start_date, $end_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        $content = $CI->lreport->retrieve_cheque_dateWise_PurchaseReports($start_date, $end_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #==============Product sales report date wise===========#

    public function product_sales_reports_date_wise()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();

        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_reports_date_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_report_sales_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }
    public function product_pre_sales_reports_date_wise()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();

        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_reports_date_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_report_pre_sales_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }
    public function product_purchase_reports_date_wise()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();

        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_purchase_reports_date_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_report_purchase_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }
    public function product_produce_reports_date_wise()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();

        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_produce_reports_date_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_report_produce_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function product_sales_reports_id_wise()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_reports_id_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_id_report_sales_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function product_purchase_reports_id_wise()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_purchase_reports_id_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_purchase_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_id_report_purchase_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function supplier_report()
    {

        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/supplier_report/');
        $config["total_rows"] = $this->Reports->supplier_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->supplier_report($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function reorder_report()
    {

        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/reorder_report/');
        $config["total_rows"] = $this->Reports->reorder_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->reorder_report($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function sales_warrenty_report()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/sales_warrenty_report/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_report_sales_warrenty($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function sales_cheque_report()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $CI->load->library('lreport');
        $CI->load->model('Reports');


        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/sales_cheque_report/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_cheque_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_report_sales_cheque($links, $config["per_page"], $page);


        $this->template->full_admin_html_view($content);
    }

    public function get_items()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        //        $draw = intval($this->input->get("draw"));
        //        $start = intval($this->input->get("start"));
        //        $length = intval($this->input->get("length"));
        $postData = $this->input->post();
        $data = $CI->Reports->getChequeList($postData);
        //
        //        $this->db->select("c.*,e.invoice_id,e.bank_id,e.payment_type,d.customer_name");
        //        $this->db->from('cus_cheque c');
        //        //$this->db->join('bank_add e', 'e.bank_id = c.bank_id');
        //        $this->db->join('invoice e', 'e.invoice_id = c.invoice_id');
        //        $this->db->join('customer_information d', 'd.customer_id = e.customer_id');
        //        $this->db->where('c.status', 2);
        //        $this->db->where('e.payment_type', 2);
        //        $this->db->order_by('c.cheque_date', 'desc');
        //        $query = $this->db->get();
        //        // $query = $this->db->get('invoice');
        //        //echo "<pre>";print_r($query);exit();
        //
        //        $data = array();
        //
        //
        //        foreach($query->result() as $r) {
        //
        //            $nestedData['invoice_id']=$r->invoice_id;
        //           // $nestedData['cheque_id']=$r->cheque_id;
        //            $nestedData['customer_name']=$r->customer_name;
        //            $nestedData['bank_id']=$r->bank_id;
        //            $nestedData['cheque_no']=$r->cheque_no;
        //
        //            if( $r->status==2){
        //                $status = '<div style="color: red"><b>Pending</b></div>';
        //            }
        //            $nestedData['status']=$status;
        //            $nestedData['cheque_date']=$r->cheque_date;
        //            $nestedData['action']='<div><a href="javascript:;" class="glyphicon glyphicon-edit date-edit" data="'.$r->cheque_id.'" style="font-size:22px; color: #1bc9f5"></a></div>';
        //            $data[] = $nestedData;
        //
        //            // $data[] = array(
        //            //      $r->invoice_id,
        //            //      $r->customer_name,
        //            //      $r->bank_id,
        //            //      $r->cheque_no,
        //            //      $r->status,
        //            //      $r->cheque_date
        //
        //
        //            // );
        //        }
        //
        //
        //        $result = array(
        //            "draw" => $draw,
        //
        //            "recordsTotal" => $query->num_rows(),
        //            "recordsFiltered" => $query->num_rows(),
        //            "data" => $data
        //        );


        echo json_encode($data);
        //
    }


    #===============Cheque date update====================#
    public function cheque_date_update()

    {

        $result = $this->Reports->get_data();

        $cheque_id = $this->input->get('cheque_id');
        $this->db->select('a.*,a.status as st,b.*, sum(x.amount) as total_paid');
        $this->db->from('cus_cheque a');
        $this->db->join('invoice b', 'b.invoice_id = a.invoice_id');
        $this->db->join('paid_amount x', 'x.invoice_id = a.invoice_id');
        $this->db->where('cheque_id', $cheque_id);
        $this->db->where('a.status', 2);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $total_paid = ($query->result_array())[0]['total_paid'];
        } else {
            $total_paid = 0;
        }

        $res = (array)$result;

        $res['total_paid'] = $total_paid;

        $new_res = (object)$res;


        echo json_encode($res);
    }

    //Cheque date after Editation

    public function clear_all_cache()
    {
        $CI = &get_instance();
        $path = $CI->config->item('cache_path');

        $cache_path = ($path == '') ? APPPATH . 'cache/' : $path;

        $handle = opendir($cache_path);
        while (($file = readdir($handle)) !== FALSE) {
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.php') {
                @unlink($cache_path . '/' . $file);
            }
        }
        closedir($handle);
        echo 'Cache Cleared';
    }

    public function cheque_date_editted()

    {

        $cheque_data = $this->Reports->update_data();

        // $data['result'] = $cheque_data['result'];
        $data['result'] = "";
        $data['cheque'] = $cheque_data['cheque'];
        $data['dd'] = $cheque_data['dd'];
        $data['ddd'] = $cheque_data['ddd'];
        echo json_encode($data);
    }

    #==============Date wise purchase report=============#

    public function retrieve_dateWise_profit_report()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');
        $start_date = $this->input->get('from_date');
        $end_date = $this->input->get('to_date');

        $outlet_id = $this->input->get('outlet_id');
        $outlet_list = $CI->Warehouse->get_outlet_user();

        $oneMnthAgo = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
        $today = date("Y-m-d");



        if (!$outlet_id) {
            if ($outlet_list) {
                $outlet_id = $outlet_list[0]['outlet_id'];
            } else {
                $outlet_id = 1;
            }
        }

        if (!isset($start_date)) {
            $start_date = $oneMnthAgo;
        }

        if (!isset($end_date)) {
            $end_date = $today;
        }
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_profit_report/');
        $config["total_rows"] = $this->Reports->retrieve_dateWise_profit_report_count($outlet_id, $start_date, $end_date);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->retrieve_dateWise_profit_report($outlet_id, $start_date, $end_date, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }


    #==============Product sales search reports============#

    public function product_sales_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product_id');
        $outlet_id = $this->input->get('outlet_id');
        $cat_id = $this->input->get('cat_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_sales_report_count($from_date, $to_date, $product_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_search_report($outlet_id, $from_date, $to_date, $product_id,$cat_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }
    public function product_pre_sales_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product_id');
        $outlet_id = $this->input->get('outlet_id');
        $cat_id = $this->input->get('cat_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_pre_sales_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_sales_report_count($from_date, $to_date, $product_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_pre_sale_search_report($outlet_id, $from_date, $to_date, $product_id,$cat_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }
    public function product_purchase_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product_id');
        $outlet_id = $this->input->get('outlet_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_purchase_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_purchase_report_count($from_date, $to_date, $product_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_purchase_search_report($outlet_id, $from_date, $to_date, $product_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }
    public function product_produce_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product_id');
        $outlet_id = $this->input->get('outlet_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_produce_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_purchase_report_count($from_date, $to_date, $product_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_produce_search_report($outlet_id, $from_date, $to_date, $product_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function product_id_sales_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        //        $from_date  = $this->input->get('from_date');
        //        $to_date    = $this->input->get('to_date');
        $customer_id = $this->input->get('customer_id');
        $product_id = $this->input->get('product_id');

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_id_sales_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_product_id_search_sales_report_count($customer_id, $product_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_id_search_report($from_date, $to_date, $product_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function supplier_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        //        $from_date  = $this->input->get('from_date');
        //        $to_date    = $this->input->get('to_date');
        $supplier_id = $this->input->get('supplier_id');
        //  $customer_id = $this->input->get('customer_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/supplier_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_supplier_id_count($supplier_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_supplier_id_search_report($supplier_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function product_id_purchase_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        //        $from_date  = $this->input->get('from_date');
        //        $to_date    = $this->input->get('to_date');
        $supplier_id = $this->input->get('product_id');
        //  $customer_id = $this->input->get('customer_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_id_purchase_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_purchase_product_id_count($supplier_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_purchase_product_id_search_report($supplier_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function product_id_saless_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        //        $from_date  = $this->input->get('from_date');
        //        $to_date    = $this->input->get('to_date');
        $customer_id = $this->input->get('customer_id');
        $supplier_id = $this->input->get('product_id');
        //  $customer_id = $this->input->get('customer_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_id_saless_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_sales_product_id_count($customer_id, $supplier_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_sales_product_id_search_report($customer_id, $supplier_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function reorder_search_reports()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        //        $from_date  = $this->input->get('from_date');
        //        $to_date    = $this->input->get('to_date');
        $supplier_id = $this->input->get('re_order_level');
        //  $customer_id = $this->input->get('customer_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/reorder_search_reports/');
        $config["total_rows"] = $this->Reports->reorder_count($supplier_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->reorder_search_report($supplier_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }


    public function product_sales_search_reports_warrenty()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_search_reports_warrenty/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_sales_warrenty_report_count($from_date, $to_date, $product_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_search_sales_warrenty_report($from_date, $to_date, $product_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    public function product_sales_search_reports_cheque()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $product_id = $this->input->get('product_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_search_reports_cheque/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_sales_cheque_report_count($from_date, $to_date);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->get_products_search_sales_cheque_report($from_date, $to_date, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #============User login=========#

    public function login()
    {
        if ($this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard', TRUE, 302);
        }
        $data['title'] = display('admin_login_area');
        $content = $this->parser->parse('user/admin_login_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

    #==============Valid user check=======#

    public function do_login()
    {
        $error = '';
        $setting_detail = $this->Web_settings->retrieve_setting_editdata();

        if ($setting_detail[0]['captcha'] == 0 && $setting_detail[0]['secret_key'] != null && $setting_detail[0]['site_key'] != null) {

            $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
            $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata(array('error_message' => display('please_enter_valid_captcha')));
                $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
            } else {
                $username = $this->input->post('username', TRUE);
                $password = $this->input->post('password', TRUE);
                if ($username == '' || $password == '' || $this->auth->login($username, $password) === FALSE) {
                    $error = display('wrong_username_or_password');
                }
                if ($error != '') {
                    $this->session->set_userdata(array('error_message' => $error));
                    $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
                } else {
                    $this->output->set_header("Location: " . base_url(), TRUE, 302);
                }
            }
        } else {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            if ($username == '' || $password == '' || $this->auth->login($username, $password) === FALSE) {
                $error = display('wrong_username_or_password');
            }
            if ($error != '') {
                $this->session->set_userdata(array('error_message' => $error));
                $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
            } else {

                // Remove Sql Mode Only full group by
                $sqlmode = $this->db->query('select @@sql_mode')->row_array();
                if (stristr(@$sqlmode['@@sql_mode'], 'ONLY_FULL_GROUP_BY')) {
                    $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
                    redirect(base_url());
                }

                $this->output->set_header("Location: " . base_url(), TRUE, 302);
            }
        }
    }

    //Valid captcha check
    function validate_captcha()
    {
        $setting_detail = $this->Web_settings->retrieve_setting_editdata();
        $captcha = $this->input->post('g-recaptcha-response', TRUE);
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $setting_detail[0]['secret_key'] . ".&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    #===============Logout=======#

    public function logout()
    {
        if ($this->auth->logout())
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
    }

    #=============Edit Profile======#

    public function edit_profile()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('luser');
        $content = $CI->luser->edit_profile_form();
        $this->template->full_admin_html_view($content);
    }

    #=============Update Profile========#

    public function update_profile()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Users');
        $this->Users->profile_update();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Admin_dashboard/edit_profile'));
    }

    #=============Change Password=========#

    public function change_password_form()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $content = $CI->parser->parse('user/change_password', array('title' => display('change_password')), true);
        $this->template->full_admin_html_view($content);
    }

    #============Change Password===========#

    public function change_password()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Users');

        $error = '';
        $email = $this->input->post('email', TRUE);
        $old_password = $this->input->post('old_password', TRUE);
        $new_password = $this->input->post('password', TRUE);
        $repassword = $this->input->post('repassword', TRUE);

        if ($email == '' || $old_password == '' || $new_password == '') {
            $error = display('blank_field_does_not_accept');
        } else if ($email != $this->session->userdata('user_email')) {
            $error = display('you_put_wrong_email_address');
        } else if (strlen($new_password) < 6) {
            $error = display('new_password_at_least_six_character');
        } else if ($new_password != $repassword) {
            $error = display('password_and_repassword_does_not_match');
        } else if ($CI->Users->change_password($email, $old_password, $new_password) === FALSE) {
            $error = display('you_are_not_authorised_person');
        }

        if ($error != '') {
            $this->session->set_userdata(array('error_message' => $error));
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/change_password_form', TRUE, 302);
        } else {
            $this->session->set_userdata(array('message' => display('successfully_changed_password')));
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/change_password_form', TRUE, 302);
        }
    }

    #==============Closing form==========#

    public function closing()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $data = array('title' => "Reports | Daily Closing");
        $data = $this->Reports->accounts_closing_data();
        $content = $this->parser->parse('accounts/closing_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //Closing report
    public function closing_report()
    {
        $CI = &get_instance();
        $CI->load->library('laccounts');
        $content = $this->laccounts->daily_closing_list();
        $this->template->full_admin_html_view($content);
    }

    // Date wise closing reports
    public function date_wise_closing_reports()
    {
        $CI = &get_instance();
        $CI->load->library('laccounts');
        $CI->load->model('Accounts');
        $from_date = $this->input->get('from_date');
        $to_date = $this->input->get('to_date');
        $outlet_id = $this->input->get('outlet_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/date_wise_closing_reports/');
        $config["total_rows"] = $this->Accounts->get_date_wise_closing_report_count($from_date, $to_date);
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #

        $content = $this->laccounts->get_date_wise_closing_reports($links, $config["per_page"], $page, $from_date, $to_date, $outlet_id);

        $this->template->full_admin_html_view($content);
    }

    //password recovery
    public function password_recovery()
    {
        $CI = &get_instance();
        $CI->load->model('Settings');
        $this->form_validation->set_rules('rec_email', display('email'), 'required|valid_email|max_length[100]|trim');
        $userData = array(
            'email' => $this->input->post('rec_email', TRUE)
        );
        if ($this->form_validation->run()) {
            $user = $this->Settings->password_recovery($userData);
            $ptoken = date('ymdhis');
            if ($user->num_rows() > 0) {
                $email = $user->row()->username;
                $precdat = array(
                    'username' => $email,
                    'security_code' => $ptoken,

                );

                $this->db->where('username', $email)
                    ->update('user_login', $precdat);
                $send_email = '';
                if (!empty($email)) {
                    $send_email = $this->setmail($email, $ptoken);
                }
                if ($send_email) {
                    $user_data['success'] = 'Check Your email';
                    $user_data['status'] = 1;
                } else {
                    $user_data['exception'] = 'Sorry Email Not Send';
                    $user_data['status'] = 0;
                }
            } else {
                $user_data['exception'] = 'Email Not found';
                $user_data['status'] = 0;
            }
        } else {
            $user_data['exception'] = 'please try again';
            $user_data['status'] = 0;
        }

        echo json_encode($user_data);
    }

    public function setmail($email, $ptoken)
    {
        $msg = "Click on this url for change your password :" . base_url() . 'Admin_dashboard/recovery_form/' . $ptoken;

        // send email
        mail($email, "passwordrecovery", $msg);
        return true;
    }

    public function recovery_form($token_id = null)
    {
        $CI = &get_instance();
        $CI->load->model('Settings');
        $tokeninfo = $this->Settings->token_matching($token_id);
        if ($tokeninfo->num_rows() > 0) {
            $data['token'] = $token_id;
            $data['title'] = display('recovery_form');
            $this->load->view('user/user_recovery_form', $data);
        } else {
            redirect(base_url('Admin_dashboard/login'));
        }
    }

    public function recovery_update()
    {
        $token = $this->input->post('token', TRUE);
        $newpassword = $this->input->post('newpassword', TRUE);
        $userdata = array(
            'password' => md5("gef" . $newpassword),
            'security_code' => '001'
        );
        $this->db->where('security_code', $token)
            ->update('user_login', $userdata);
        redirect(base_url('Admin_dashboard/login'));
    }

    // Shipping cost report
    public function retrieve_dateWise_Shippingcost()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date = (!empty($this->input->get('from_date')) ? $this->input->get('from_date') : date('Y-m-d'));
        $to_date = (!empty($this->input->get('to_date')) ? $this->input->get('to_date') : date('Y-m-d'));
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        } else {
            $perpagdata = 50;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_Shippingcost/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_shippingcost($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    //sales return list
    public function sales_return()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $start = (!empty($from_date) ? $from_date : date('Y-m-d'));
        $end = (!empty($to_date) ? $to_date : date('Y-m-d'));
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/sales_return/');
        $config["total_rows"] = $this->Reports->sales_return_count($start, $end);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->sales_return_data($links, $config["per_page"], $page, $start, $end);
        $this->template->full_admin_html_view($content);
    }

    // supplier return report
    public function supplier_return()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);
        $start = (!empty($from_date) ? $from_date : date('Y-m-d'));
        $end = (!empty($to_date) ? $to_date : date('Y-m-d'));
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/supplier_return/');
        $config["total_rows"] = $this->Reports->count_supplier_return($start, $end);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #
        $content = $this->lreport->supplier_return_data($links, $config["per_page"], $page, $start, $end);
        $this->template->full_admin_html_view($content);
    }

    //  TAX Report start
    public function retrieve_dateWise_tax()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date = (!empty($this->input->get('from_date')) ? $this->input->get('from_date') : date('Y-m-d'));
        $to_date = (!empty($this->input->get('to_date')) ? $this->input->get('to_date') : date('Y-m-d'));
        $alldata = $this->input->get('all');
        if (!empty($alldata)) {
            $perpagdata = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        } else {
            $perpagdata = 50;
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_tax/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_tax($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }


    //money receipt starts

    public function retrieve_money_receipt()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $content = $this->lreport->retrieve_money_receipt();
        $this->template->full_admin_html_view($content);
    }

    public function retrieve_dateWise_money_receipt()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');

        $from_date = (!empty($this->input->get('from_date')) ? $this->input->get('from_date') : date('Y-m-d'));
        $to_date = (!empty($this->input->get('to_date')) ? $this->input->get('to_date') : date('Y-m-d'));

        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_money_receipt/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $content = $CI->lreport->retrieve_dateWise_money_receipt($from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    public function sale_report_paytype_wise()
    {
        $CI = &get_instance();
        $CI->load->model('Reports');
        $CI->load->model('Warehouse');

        $outlet_list = $CI->Warehouse->get_outlet_user();
        // echo '<pre>';
        // print_r($outlet_list[0]['outlet_id']);
        // exit();
        $cw = $CI->Warehouse->branch_list_product();
        $outlet_id = $this->input->post('outlet_id', TRUE);

        if (!$outlet_id) {
            $outlet_id = $outlet_list[0]['outlet_id'];
        }

        $from_date = $this->input->post('from_date', TRUE);
        $to_date = $this->input->post('to_date', TRUE);


        $sales_data = $CI->Reports->get_sales_data_pay_wise($outlet_id, $from_date, $to_date);

        // echo '<pre>';
        // print_r($sales_data);
        // exit();

        // if (!$from_date && !$to_date) {
        //     $sales_data[0] = $sales_data;
        // }

        $day_total_due = array_sum(array_column($sales_data, 'total_due'));
        $day_total_cash = array_sum(array_column($sales_data, 'pay_type_cash'));
        $day_total_bkash = array_sum(array_column($sales_data, 'pay_type_bkash'));
        $day_total_nagad = array_sum(array_column($sales_data, 'pay_type_nagad'));
        $day_total_bank = array_sum(array_column($sales_data, 'pay_type_bank'));
        $day_total_card = array_sum(array_column($sales_data, 'pay_type_card'));


        $data = array(
            'title'    => 'Payment Type Wise Sales Report',
            'sales_data'    => $sales_data,
            'outlet_list' => $outlet_list,
            'cw' => $cw,
            'day_total_due'     => $day_total_due,
            'day_total_cash'     => $day_total_cash,
            'day_total_bkash'     => $day_total_bkash,
            'day_total_nagad'     => $day_total_nagad,
            'day_total_bank'     => $day_total_bank,
            'day_total_card'     => $day_total_card,

        );

        $view = $CI->parser->parse('report/paytype_wise_sales_report', $data, true);
        $this->template->full_admin_html_view($view);
    }

    public function data_clean()
    {
        $this->db->truncate('acc_transaction');
        $this->db->truncate('invoice');
        $this->db->truncate('invoice_details');
        $this->db->truncate('product_purchase');
        $this->db->truncate('product_purchase_details');
        $this->db->truncate('production_goods');
        $this->db->truncate('production_mix');
        $this->db->truncate('production_mix_details');
        $this->db->truncate('pr_rqsn');
        $this->db->truncate('pr_rqsn_details');
        $this->db->truncate('production_mix_details');
        $this->db->truncate('rqsn');
        $this->db->truncate('rqsn_details');
        $this->db->truncate('rqsn_return');
        $this->db->truncate('transfer_items');
        $this->db->truncate('transfer_item_details');
        $this->db->truncate('opening_inventory');

        echo 'Data has been cleaned';


    }
}
