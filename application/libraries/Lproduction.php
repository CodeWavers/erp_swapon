<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lproduction
{

    public function production_list()
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->model('Web_settings');
        $company_info = $CI->Production->retrieve_company();
        $production_list = $CI->Production->get_production_list();

        $data['total_production']    = $CI->Production->count_production();
        $data['title']      = "Manage Production";
        $data['production_list'] = $production_list;
        $data['company_info']     = $company_info;
        $productionList = $CI->parser->parse('production/production', $data, true);
        return $productionList;
    }


    public function stock_report_outlet_item()
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->model('Web_settings');
        $CI->load->model('Reports');
        $outlet_list    = $CI->Rqsn->outlet_list();
        $cw_list    = $CI->Rqsn->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Reacquisition",
            'outlet_list' => $outlet_list,
            'cw_list' => $cw_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'currency' => $currency_details[0]['currency'],
            'totalnumber' => $CI->Reports->totalnumberof_product(),
            'taxes'         => $taxfield,
        );


        //        echo print_r($data);
        //        die();
        $invoiceForm = $CI->parser->parse('production/outlet_stock', $data, true);
        return $invoiceForm;
    }

    public function production_mix_form()
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->model('Web_settings');
        //  $outlet_list    = $CI->Production->outlet_list();
        //  $outlet_list_to    = $CI->Production->outlet_list_to();
        //  $cw_list    = $CI->Production->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Production",
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('production/production_mix_form', $data, true);
        return $invoiceForm;
    }
    // public function production_edit_data($production_id)
    // {
    //     $CI = &get_instance();
    //     $CI->load->model('Production');
    //     // $CI->load->model('Suppliers');
    //     // $CI->load->model('Categories');
    //     // $CI->load->model('Brands');
    //     // $CI->load->model('Ptype');
    //     // $CI->load->model('Units');

    //     $production_mix = $CI->Production->retrieve_production_editdata($production_id);
    //     $product_info = $CI->Production->product_info_editdata($production_id);
    //     $production_mix_detail = $CI->Production->production_mix_details_editdata($production_id);
    //     @$total = $production_mix[0]['total'];
    //     @$grand_total = $production_mix[0]['grand_total'];
    //     @$product_name = $product_info[0]['product_name'];
    //     @$item_name = $production_mix_detail[0]['product_name'];
    //     @$multiplier = $product_info[0]['multiplier'];
    //     @$price = $product_info[0]['price'];
    //     @$quantity = $production_mix_detail[0]['quantity'];
    //     @$rate = $production_mix_detail[0]['rate'];
    //     @$unit = $production_mix_detail[0]['trans_unit'];
    //     // @$product_id = $production_mix_detail[0]['product_id'];
    //     // print_r(@$product_id]);
    //     // exit();
    //     $available_quantity = $CI->Production->product_editdata($production_mix_detail[0]['product_id']);
    //     // print_r($available_quantity);
    //     // exit();
    //     // @$available_quantity = $purchase_details[0]['available_quantity'];
    //     // @$ptype_id = $product_detail[0]['ptype_id'];
    //     // $supplier_list = $CI->Suppliers->supplier_list();
    //     // $supplier_selected = $CI->Products->supplier_selected($product_id);

    //     // $category_list = $CI->Categories->category_list_product();
    //     // $brand_list = $CI->Brands->category_list_product();
    //     // $ptype_list = $CI->Ptype->category_list_product();
    //     // $unit_list = $CI->Units->unit_list();
    //     // $category_selected = $CI->Categories->category_search_item($category_id);
    //     // $brand_selected = $CI->Brands->category_search_item($brand_id);
    //     // $ptype_selected = $CI->Ptype->category_search_item($ptype_id);



    //     //  $taxfield = $CI->db->select('tax_name,default_value')
    //     // ->from('tax_settings')
    //     // ->get()
    //     // ->result_array();
    //     //  $i = 0;
    //     // foreach ($taxfield as $taxs) {

    //     //   $tax = 'tax'.$i;
    //     //   $data[$tax] = $product_detail[0][$tax] * 100;
    //     //   $i++;
    //     // }

    //     $data['title']            = "Edit_your_production";
    //     $data['production_id']       = $production_mix[0]['production_id'];
    //     $data['total']       = $production_mix[0]['total'];
    //     $data['grand_total']       = $production_mix[0]['grand_total'];
    //     $data['product_name']       = $product_info[0]['product_name'];
    //     $data['multiplier']       = $product_info[0]['multiplier'];
    //     $data['price']       = $product_info[0]['price'];
    //     $data['item_name']       = $production_mix_detail[0]['product_name'];
    //     $data['quantity']       = $production_mix_detail[0]['quantity'];
    //     $data['rate']       = $production_mix_detail[0]['rate'];
    //     $data['unit']       = $production_mix_detail[0]['trans_unit'];
    //     $data['stock']       = $available_quantity;
    //     // $data['product_id_two']       = $product_detail[0]['product_id_two'];
    //     // $data['product_name']     = $product_detail[0]['product_name'];
    //     // $data['price']            = $product_detail[0]['price'];
    //     // $data['re_order_level']   = $product_detail[0]['re_order_level'];
    //     // $data['serial_no']        = $product_detail[0]['serial_no'];
    //     // $data['product_model']    = $product_detail[0]['product_model'];
    //     // $data['product_details']  = $product_detail[0]['product_details'];
    //     // $data['pr_details']       = $product_detail;
    //     // $data['image']            = $product_detail[0]['image'];
    //     // $data['unit']             = $product_detail[0]['unit'];
    //     // $data['trans_unit']     = $product_detail[0]['trans_unit'];
    //     // print_r($data['trans_unit'] );
    //     // $data['supplier_list']    = $supplier_list;
    //     // $data['supplier_selected']= $supplier_selected;
    //     // $data['unit_list']        = $unit_list;
    //     // $data['category_list']    = $category_list;
    //     // $data['brand_list']    = $brand_list;
    //     // $data['ptype_list']    = $ptype_list;
    //     // $data['category_selected']= $category_selected;
    //     // $data['brand_selected']= $brand_selected;
    //     // $data['ptype_selected']= $ptype_selected;
    //     // $data['tax_selecete']     = $product_detail[0]['tax'] * 100;
    //     // $data['supplier_product_data'] = $supplier_product_detail;
    //     // $data['taxfield']         = $taxfield;
    //     // print_r($data);
    //     // exit();
    //     $chapterList = $CI->parser->parse('production/edit_production_form', $data, true);

    //     return $chapterList;
    // }

    public function production_edit_data($production_id)
    {
        $CI = &get_instance();
        $CI->load->model('production');
        $CI->load->model('Accounts');
        $CI->load->model('Web_settings');
        $bank_list          = $CI->Web_settings->bank_list();
        $pro_expenses = $CI->Accounts->get_data_by_headcode(40105);


        $pro_details = $CI->production->get_production_details();
        $data = array(
            'title'         => "Production",
            'pro_expenses'  => $pro_expenses,
            'base_no'       => $pro_details[0]['base_number'],
            'pro_id'        => $pro_details[0]['pro_id'],
            'base_date'       => $pro_details[0]['date'],
            'pr_details'       => $pro_details[0]['pr_details'],
            'pr_qty'       => $pro_details[0]['quantity'],
            'pr_id'       => $pro_details[0]['product_id'],
            'pr_unit'       => $pro_details[0]['pr_unit'],
            'pr_stock'       => $pro_details[0]['pr_stock'],
            'transfer_cost'       => $pro_details[0]['transfer_cost'],
            'per_unit_cost'       => $pro_details[0]['per_unit_cost'],
            'pr_total_price'       => $pro_details[0]['price'],
            'pr_per_price'       => $pro_details[0]['price'] / $pro_details[0]['quantity'],
            'remark'       => $pro_details[0]['remark'],
            'bank_list'     => $bank_list,
            "isedit"        => 1

        );

        // echo '<pre>';
        // print_r($data);
        // exit();


        $chapterList = $CI->parser->parse('production/production_form', $data, true);
        return $chapterList;
    }

    public function production_form()
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->model('Accounts');
        $CI->load->model('Web_settings');

        $bank_list          = $CI->Web_settings->bank_list();

        $pro_expenses = $CI->Accounts->get_data_by_headcode(40105);

        $base_no = 'PR-' . date('YmdHis');

        //  $outlet_list    = $CI->Production->outlet_list();
        //  $outlet_list_to    = $CI->Production->outlet_list_to();
        //  $cw_list    = $CI->Production->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Production",
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'pro_expenses'  => $pro_expenses,
            'base_no'       => $base_no,
            'bank_list'     => $bank_list,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('production/production_form', $data, true);
        return $invoiceForm;
    }
    public function transfer_production_form()
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->model('Accounts');
        $CI->load->model('Web_settings');

        $bank_list          = $CI->Web_settings->bank_list();

        $pro_expenses = $CI->Accounts->get_data_by_headcode(40105);

        $base_no = 'PR-' . date('YmdHis');

        //  $outlet_list    = $CI->Production->outlet_list();
        //  $outlet_list_to    = $CI->Production->outlet_list_to();
        //  $cw_list    = $CI->Production->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Transfer To Production",
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'pro_expenses'  => $pro_expenses,
            'base_no'       => $base_no,
            'bank_list'     => $bank_list,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('production/transfer_production_form', $data, true);
        return $invoiceForm;
    }
    public function rcv_production_form()
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->model('Reports');
        $CI->load->model('Accounts');
        $CI->load->model('Web_settings');

        $bank_list          = $CI->Web_settings->bank_list();
        $product_list = $CI->Production->get_receive_product();

        $pro_expenses = $CI->Accounts->get_data_by_headcode(40105);

        $base_no = 'PR-' . date('YmdHis');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();



        if (!empty($product_list)) {
            foreach ($product_list as $k => $v) {
                $product_id=$product_list[$k]['product_id'];

                $product_list[$k]['stock'] = $CI->Reports->current_stock($product_id,1);

                $rqsn_quantity=$CI->db->select('*')->from('pr_rqsn_details')->where('product_id',$product_id)->get()->row();
                $rcv_qty=$CI->db->select('SUM(rcv_qty) as rc_qty')->from('production_goods')->where('product_id',$product_id)->get()->row();

                if (!empty($rqsn_quantity)){
                    $product_list[$k]['quantity']=$rqsn_quantity->finished_qty-$rcv_qty->rc_qty;
                    $product_list[$k]['rc_qty']=$rcv_qty->rc_qty;
                    $product_list[$k]['row_total']=$rcv_qty->rc_qty*$product_list[$k]['production_cost'];

//                    if ($product_list[$k]['rc_qty'] > 0){
//                        $product =array_slice($product_list,2);
//                    }

                }

            }
        }


            $data = array(
            'title'         => "Receive Production",
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'pro_expenses'  => $pro_expenses,
            'base_no'       => $base_no,
            'bank_list'     => $bank_list,
            'product_list'     => $product_list,
        );

       // echo '<pre>'; print_r($product_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('production/rcv_production_form', $data, true);
        return $invoiceForm;
    }
    public function production_details($product_id)
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->library('occational');
        $CI->load->model('Web_settings');
        $details_info = $CI->Products->production_details_info($product_id);
        // $purchaseData = $CI->Products->product_purchase_info($product_id);

        // $totalPurchase = 0;
        // $totalPrcsAmnt = 0;

        // if (!empty($purchaseData)) {
        //     foreach ($purchaseData as $k => $v) {
        //         $purchaseData[$k]['final_date'] = $CI->occational->dateConvert($purchaseData[$k]['purchase_date']);
        //         $totalPrcsAmnt = ($totalPrcsAmnt + $purchaseData[$k]['total_amount']);
        //         $totalPurchase = ($totalPurchase + $purchaseData[$k]['quantity']);
        //     }
        // }

        // $salesData = $CI->Products->invoice_data($product_id);

        // $totalSales = 0;
        // $totaSalesAmt = 0;
        // if (!empty($salesData)) {
        //     foreach ($salesData as $k => $v) {
        //         $salesData[$k]['final_date'] = $CI->occational->dateConvert($salesData[$k]['date']);
        //         $totalSales = ($totalSales + $salesData[$k]['quantity']);
        //         $totaSalesAmt = ($totaSalesAmt + $salesData[$k]['total_amount']);
        //     }
        // }

        // $stock = ($totalPurchase - $totalSales);
        // $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            // 'title'               => display('product_report'),
            'product_name'        => $details_info[0]['product_name'],
            // 'product_model'       => $details_info[0]['product_model'],
            // 'price'               => $details_info[0]['price'],
            // 'purchaseTotalAmount' => number_format($totalPrcsAmnt, 2, '.', ','),
            // 'salesTotalAmount'    => number_format($totaSalesAmt, 2, '.', ','),
            // 'img'                 => $details_info[0]['image'],
            // 'total_purchase'      => $totalPurchase,
            // 'total_sales'         => $totalSales,
            // 'purchaseData'        => $purchaseData,
            // 'salesData'           => $salesData,
            // 'stock'               => $stock,
            // 'product_statement'   => 'Cproduct/product_sales_supplier_rate/' . $product_id,
            // 'currency'            => $currency_details[0]['currency'],
            // 'position'            => $currency_details[0]['currency_position'],
        );

        $productionList = $CI->parser->parse('product/product_details', $data, true);
        return $productionList;
    }
    public function purchase_rqsn_form()
    {
        $CI = &get_instance();
        $CI->load->model('Production');
        $CI->load->model('Web_settings');
        $outlet_list    = $CI->Rqsn->outlet_list();
        $cw_list    = $CI->Rqsn->cw_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'         => "Central Warehouse Reacquisition",
            'outlet_list' => $outlet_list,
            'cw_list' => $cw_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
        );

        // echo '<pre'; print_r($cw_list);exit();
        //    die();
        $invoiceForm = $CI->parser->parse('production/cw_purchase', $data, true);
        return $invoiceForm;
    }
}
