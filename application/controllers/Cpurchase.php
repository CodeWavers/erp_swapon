<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cpurchase extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
    }

    public function index()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_add_form();
        $this->template->full_admin_html_view($content);
    }

    public function previous_stock()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->previous_stock_form();
        $this->template->full_admin_html_view($content);
    }

    //Manage purchase
    public function manage_purchase()
    {
        $this->load->library('lpurchase');
        $content = $this->lpurchase->purchase_list();
        $this->template->full_admin_html_view($content);
    }



    public function CheckPurchaseList()
    {
        // GET data
        $this->load->model('Purchases');
        $postData = $this->input->post();
        $data = $this->Purchases->getPurchaseList($postData);
        echo json_encode($data);
    }
    // search purchase by supplier
    public function purchase_search()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Purchases');
        $supplier_id = $this->input->get('supplier_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cpurchase/purchase_search/');
        $config["total_rows"] = $this->Purchases->count_purchase_seach($supplier_id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET);
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
        $content = $this->lpurchase->purchase_search_supplier($supplier_id, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    //purchase list by invoice no
    public function purchase_info_id()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Purchases');
        $invoice_no = $this->input->post('invoice_no', TRUE);
        $content = $this->lpurchase->purchase_list_invoice_no($invoice_no);
        $this->template->full_admin_html_view($content);
    }

    //Insert purchase
    public function insert_purchase()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $CI->Purchases->purchase_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-purchase'])) {
            redirect(base_url('Cpurchase/manage_purchase'));
            exit;
        } elseif (isset($_POST['add-purchase-another'])) {
            redirect(base_url('Cpurchase'));
            exit;
        }
    }

    public function insert_previous_purchase()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $CI->Purchases->previous_purchase_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-purchase'])) {
            redirect(base_url('Cpurchase/manage_purchase'));
            exit;
        } elseif (isset($_POST['add-purchase-another'])) {
            redirect(base_url('Cpurchase/previous_stock'));
            exit;
        }
    }

    //purchase Update Form
    public function purchase_update_form($purchase_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

    // purchase Update
    public function purchase_update()
    {

        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $CI->Purchases->update_purchase();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cpurchase/manage_purchase'));
        exit;
    }

    //Purchase item by search
    public function purchase_item_by_search()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $supplier_id = $this->input->post('supplier_id', TRUE);
        $content = $CI->lpurchase->purchase_by_search($supplier_id);
        $this->template->full_admin_html_view($content);
    }

    //Product search by supplier id
    public function product_search_by_supplier()
    {


        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Suppliers');
        $product_status = $this->input->post('product_status', TRUE);
        $product_name = $this->input->post('product_name', TRUE);
        $cat_id = $this->input->post('cat_id', TRUE);
        $product_info = $CI->Suppliers->product_search_item($product_name,$product_status,$cat_id);
        if (!empty($product_info)) {
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label' => $value['product_name'] . '(' . $value['product_model'] . ')' . '(' . $value['color_name'] . ')' . '(' . $value['size_name'] . ')', 'value' => $value['product_id']);
            }
        } else {
            $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    //Retrive right now inserted data to cretae html
    public function purchase_details_data($purchase_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_details_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

    public function delete_purchase($purchase_id = null)
    {
        $this->load->model('Purchases');
        if ($this->Purchases->purchase_delete($purchase_id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect(base_url('Cpurchase/manage_purchase'));
    }

    // purchase info date to date
    public function manage_purchase_date_to_date()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Purchases');
        $start = $this->input->post('from_date', TRUE);
        $end = $this->input->post('to_date', TRUE);

        $content = $this->lpurchase->purchase_list_date_to_date($start, $end);
        $this->template->full_admin_html_view($content);
    }
    //purchase pdf download
    public function purchase_downloadpdf()
    {
        $CI = &get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator');
        $purchase_list = $CI->Purchases->pdf_purchase_list();
        if (!empty($purchase_list)) {
            $i = 0;
            if (!empty($purchase_list)) {
                foreach ($purchase_list as $k => $v) {
                    $i++;
                    $purchase_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_purchase'),
            'purchase_list' => $purchase_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
            'company_info'  => $company_info
        );
        $this->load->helper('download');
        $content = $this->parser->parse('purchase/purchase_list_pdf', $data, true);
        $time = date('Ymdhi');
        $dompdf = new DOMPDF();
        $dompdf->load_html($content);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/' . 'purchase' . $time . '.pdf', $output);
        $file_path = 'assets/data/pdf/' . 'purchase' . $time . '.pdf';
        $file_name = 'purchase' . $time . '.pdf';
        force_download(FCPATH . 'assets/data/pdf/' . $file_name, null);
    }

    public function purchase_order()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_order_add_form();
        $this->template->full_admin_html_view($content);
    }

    public function po_search_by_supplier()
    {


        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Suppliers');
        $supplier_id = $this->input->post('supplier_id', TRUE);
        $product_name = $this->input->post('product_name', TRUE);
        $product_info = $CI->Suppliers->po_search_item($supplier_id, $product_name);
        //  echo '<pre>';print_r($product_info);
        if (!empty($product_info)) {
            $list[''] = '';
            foreach ($product_info as $value) {
                $json_product[] = array('label' => $value['rqsn_detail_id'], 'value' => $value['product_id']);
            }
        } else {
            $json_product[] = 'No Purchase Order Found';
        }
        echo json_encode($json_product);
    }



    public function retrieve_po_data()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Rqsn');
        $product_id  = $this->input->post('product_id', TRUE);
        $supplier_id = $this->input->post('supplier_id', TRUE);

        $product_info = $CI->Rqsn->get_po_details($product_id, $supplier_id);

        echo json_encode($product_info);
    }

    public function get_purchase_details()
    {

        $po_id = $this->input->post('po_id', TRUE);

        $this->load->model("Purchases");
        $this->load->model("Products");
        $this->load->model("Suppliers");
        //   $product_id=$_POST["product_id"];
        $cart_list = $this->Purchases->purchase_details($po_id);
        $supp_id = $this->input->post('supp_id', TRUE);
        // $grand_total = array_sum(array_column($cart_list, 'total_amount'));
        // $total = array_sum(array_column($cart_list, 'total'));
        $op = '';
        $op .= '
            <div class="table-responsive">
            <table class="table table-bordered table-hover" id="purchaseTable">
                <thead>
                     <tr>
                        <th class="text-center" width="4%">SN</th>
                        <th class="text-center" width="8%">Product Name</th>
                        <th class="text-center">Current Stock</th>
                        <th class="text-center">Order Quantity</th>
                        <th class="text-center">Damaged Quantity</th>
                        <th class="text-center">Warranty</th>
                        <th class="text-right">Price</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>
                <tbody id="addPurchaseItem">';


        $count = 0;
        foreach ($cart_list as $items) {


            // echo '<pre>'; print_r($items['additional_cost']); exit();
            // $tot = "";

            // if ($items['total_amount']) {
            //     $tot = $items['total_amount'];
            // }

            $add_cost = "00";

            // if ($items['additional_cost']) {
            //     $add_cost = $items['additional_cost'];
            // }


            $product_id = $items['product_id'];
            $supplier_product = $this->Suppliers->supplier_product_info($supp_id, $product_id);
            // $product_info = $this->Products->retrieve_product_full_data($product_id)[0];
            // $supplier_list = $this->Suppliers->supplier_list_by_id($product_id);
            // echo '<pre>'; print_r($items['warrenty_date']); exit();
            $count++;
            $op .= '
                        <tr>
                        <td class="wt"> ' . $count . '</td>
                        <td class="span3 supplier">
                            <span>' . $items['product_name'] . ' (' . $items['product_model'] . ') ' . ' (' . $items['size_name'] . ') ' . ' (' . $items['color_name'] . ') ' . '</span>
                            <input type="hidden" name="product_id[]" id="product_id_' . $count . '" value="' . $items['product_id'] . '">
                            <input type="hidden" class="sl" value="' . $count . '">
                            <input type="hidden" id="product_name_' . $count . '" value="' . $items['product_name'] . '">
                            <input type="hidden" name="rqsn_detail_id[]" value="' . $items['rqsn_detail_id'] . '">
                        </td>
                            <td class="wt">
                                <input type="text"  id="available_quantity' . $count . '" class="form-control text-right stock_ctn' . $count . '" placeholder="0.00" readonly/>
                            </td>
                            <td class="test">
                                <input type="text" name="order_quantity[]" required="" id="order_quantity_' . $count . '" class="form-control product_rate' . $count . ' text-right" value="' . $items['quantity'] . '" min="0" tabindex="7" readonly/>
                            </td>

                            <td class="text-right">
                                <input type="text" name="damaged_qty[]" id="damaged_' . $count . '" min="0" class="form-control text-right store_cal_1" placeholder="0.00" value="" tabindex="6" />
                            </td>

                                <td class="text-right">
                                    <input type="date" name="warrenty_date[]" id="warrenty_date_' . $count . '" class="form-control text-right" value="' . ($items['warrenty_date'] ? $items['warrenty_date'] : "") . '"  tabindex="6"/>
                                </td>

                                <td class="test">
                                    <input type="text" name="rate[]" required="" onkeyup="calculate_store(' . $count . ');" onchange="calculate_store(' . $count . ');" id="product_rate_' . $count . '" class="form-control product_rate' . $count . ' text-right" placeholder="0.00" value="' . ($supplier_product[0]['supplier_price'] ? $supplier_product[0]['supplier_price'] : '0.00') . '" min="0" tabindex="7" readonly/>
                                </td>

                                <td class="text-left">
                                    <input type="text" class="form-control row_total text-right" name="row_total[]" value="' . $items['quantity'] * $supplier_product[0]['supplier_price'] . '" id = "total_price_' . $count . '" class="total_price" readonly>
                                </td>

                        </tr>
                        ';
        }
        $op .= '
            </tbody>
            <tfoot>
                                    <tr>

                                        <td class="text-right" colspan="7"><b>Total</td>
                                        <td class="text-right">
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" />
                                        </td>

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="' . base_url() . '"/></td>
                                    </tr>
                                        <tr>

                                        <td class="text-right" colspan="7"><b>Discounts:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="discount" class="text-right form-control discount" onkeyup="calculate_store(1)" name="discount" placeholder="0.00" value="" />
                                        </td>

                                    </tr>

                                        <tr>

                                        <td class="text-right" colspan="7"><b>Grand Total:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                    </tr>
                                         <tr>

                                        <td class="text-right" colspan="7"><b>Paid Amount:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="" readonly/>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="text-right" colspan="7"><b>Due Amount:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly" />
                                        </td>
                                    </tr>
                                </tfoot>
        </table>
                            ';

        if ($count == 0) {
            $op = '<h3 align="center">Purchase Order is empty</h3>';
        }

        echo $op;
    }

    public function save_purchase()
    {
        $this->load->model('Rqsn');
        $this->Rqsn->purchase_order_entry();

        redirect(base_url('Cpurchase/purchase_order'));
    }
}
