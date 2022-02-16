<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lproduct
{
    /*
     * * Retrieve  Quize List From DB
     */
    public function product_list()
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Web_settings');
        $company_info = $CI->Products->retrieve_company();
        $data['total_product']    = $CI->Products->count_product();
        $data['company_info']     = $company_info;
        $productList = $CI->parser->parse('product/product', $data, true);
        return $productList;
    }

    public function finished_product_list()
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Web_settings');
        $company_info = $CI->Products->retrieve_company();




//
        $url = "https://swaponsworld.com/api/v1/products/count_product";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $resp = curl_exec($curl);
        curl_close($curl);


        $data['total_product']    = $resp;
        $data['company_info']     = $company_info;
//        $data['records']     = $records;
//        echo '<pre>';print_r($data);exit();
        $productList = $CI->parser->parse('product/finished_product', $data, true);
        return $productList;
    }

    //Sub Category Add
    public function product_add_form()
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Suppliers');
        $CI->load->model('Categories');
        $CI->load->model('Brands');
        $CI->load->model('Ptype');
        $CI->load->model('Units');
        $supplier      = $CI->Suppliers->supplier_list("110", "0");
        $category_list = $CI->Categories->category_list_product();
        $brand_list = $CI->Brands->category_list_product();
        $ptype_list = $CI->Ptype->category_list_product();
        $unit_list     = $CI->Units->unit_list();

        $size_list = $CI->Products->get_size_list();
        $attribute = $CI->Products->get_atr_list();
        $color_list = $CI->Products->get_color_list();


        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $data = array(
            'title'        => display('add_product'),
            'supplier'     => $supplier,
            'category_list' => $category_list,
            'brand_list' => $brand_list,
            'ptype_list' => $ptype_list,
            'unit_list'    => $unit_list,
            'size_list'    => $size_list,
            'color_list'    => $color_list,
            'attribute'    => $attribute,
            'taxfield'     => $taxfield
        );
//         echo '<pre>';
//         print_r($attribute);
//         exit();
        $productForm = $CI->parser->parse('product/add_product_form', $data, true);
        return $productForm;
    }

    public function insert_product($data,$data2)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $result = $CI->Products->product_entry($data,$data2);
        if ($result == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //Product Edit Data
    public function product_edit_data($product_id)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Suppliers');
        $CI->load->model('Categories');
        $CI->load->model('Brands');
        $CI->load->model('Ptype');
        $CI->load->model('Units');

        $product_detail = $CI->Products->retrieve_product_editdata($product_id);
        // echo '<pre>';
        // print_r($product_detail);
        // exit();
        $supplier_product_detail = $CI->Products->supplier_product_editdata($product_id);
        @$supplier_id = $product_detail[0]['supplier_id'];

        @$category_id = $product_detail[0]['category_id'];
        @$brand_id = $product_detail[0]['brand_id'];
        @$ptype_id = $product_detail[0]['ptype_id'];
        $supplier_list = $CI->Suppliers->supplier_list();
        $supplier_selected = $CI->Products->supplier_selected($product_id);

        $category_list = $CI->Categories->category_list_product();
        $brand_list = $CI->Brands->category_list_product();
        $ptype_list = $CI->Ptype->category_list_product();
        $unit_list = $CI->Units->unit_list();
        $category_selected = $CI->Categories->category_search_item($category_id);
        $brand_selected = $CI->Brands->category_search_item($brand_id);
        $ptype_selected = $CI->Ptype->category_search_item($ptype_id);

        $size_list = $CI->Products->get_size_list();
        // echo '<pre>';
        // print_r($size_list);
        // exit();
        $color_list = $CI->Products->get_color_list();



        $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
        $i = 0;
        foreach ($taxfield as $taxs) {

            $tax = 'tax' . $i;
            $data[$tax] = $product_detail[0][$tax] * 100;
            $i++;
        }
        


        $data['title']            = display('edit_your_product');
        $data['product_id']       = $product_detail[0]['product_id'];
        $data['product_id_two']       = $product_detail[0]['product_id_two'];
        $data['product_name']     = $product_detail[0]['product_name'];
        $data['price']            = $product_detail[0]['price'];
        $data['re_order_level']            = $product_detail[0]['re_order_level'];
        $data['serial_no']        = $product_detail[0]['serial_no'];
        $data['product_model']    = $product_detail[0]['product_model'];
        $data['product_details']  = $product_detail[0]['product_details'];
        $data['pr_details']       = $product_detail;
        $data['image']            = $product_detail[0]['image'];
        $data['unit']             = $product_detail[0]['unit'];
        $data['trxn_unit']             = $product_detail[0]['trxn_unit'];
        $data['multiplier']             = $product_detail[0]['unit_multiplier'];
        $data['product_code']             = $product_detail[0]['product_code'];
        $data['size']             = $product_detail[0]['size'];
        $data['color']             = $product_detail[0]['color'];
        $data['finished_raw']      = $product_detail[0]['finished_raw'];
        $data['supplier_list']    = $supplier_list;
        $data['supplier_selected'] = $supplier_selected;
        $data['unit_list']        = $unit_list;
        $data['category_list']    = $category_list;
        $data['brand_list']    = $brand_list;
        $data['ptype_list']    = $ptype_list;
        $data['size_list']    = $size_list;
        $data['color_list']    = $color_list;
        $data['category_selected'] = $category_selected;
        $data['brand_selected'] = $brand_selected;
        $data['ptype_selected'] = $ptype_selected;
        $data['tax_selecete']     = $product_detail[0]['tax'] * 100;
        $data['supplier_product_data'] = $supplier_product_detail;
        $data['taxfield']         = $taxfield;

        // echo '<pre>'; print_r($data); exit();
        $chapterList = $CI->parser->parse('product/edit_product_form', $data, true);

        return $chapterList;
    }

    //Search Product
    public function product_search_list($product_id)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Web_settings');
        $products_list = $CI->Products->product_search_item($product_id);
        $all_product_list = $CI->Products->all_product_list();

        $i = 0;
        if ($products_list) {
            foreach ($products_list as $k => $v) {
                $i++;
                $products_list[$k]['sl'] = $i;
                $products_list[$k]['serial'] = substr($products_list[$k]['serial_no'], 0, 20) . '...';
            }

            $currency_details = $CI->Web_settings->retrieve_setting_editdata();
            $data = array(
                'title'            => display('manage_product'),
                'products_list'    => $products_list,
                'all_product_list' => $all_product_list,
                'links'            => "",
                'currency'         => $currency_details[0]['currency'],
                'position'         => $currency_details[0]['currency_position'],
            );
            $productList = $CI->parser->parse('product/product', $data, true);
            return $productList;
        } else {
            redirect('Cproduct/manage_product');
        }
    }

    //Product Details
    public function product_details($product_id)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->library('occational');
        $CI->load->model('Web_settings');
        $details_info = $CI->Products->product_details_info($product_id);
        $purchaseData = $CI->Products->product_purchase_info($product_id);

        $totalPurchase = 0;
        $totalPrcsAmnt = 0;

        if (!empty($purchaseData)) {
            foreach ($purchaseData as $k => $v) {
                $purchaseData[$k]['final_date'] = $CI->occational->dateConvert($purchaseData[$k]['purchase_date']);
                $totalPrcsAmnt = ($totalPrcsAmnt + $purchaseData[$k]['total_amount']);
                $totalPurchase = ($totalPurchase + $purchaseData[$k]['quantity']);
            }
        }

        $salesData = $CI->Products->invoice_data($product_id);

        $totalSales = 0;
        $totaSalesAmt = 0;
        if (!empty($salesData)) {
            foreach ($salesData as $k => $v) {
                $salesData[$k]['final_date'] = $CI->occational->dateConvert($salesData[$k]['date']);
                $totalSales = ($totalSales + $salesData[$k]['quantity']);
                $totaSalesAmt = ($totaSalesAmt + $salesData[$k]['total_amount']);
            }
        }

        $stock = ($totalPurchase - $totalSales);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'               => display('product_report'),
            'product_name'        => $details_info[0]['product_name'],
            'product_model'       => $details_info[0]['product_model'],
            'price'               => $details_info[0]['price'],
            'purchaseTotalAmount' => number_format($totalPrcsAmnt, 2, '.', ','),
            'salesTotalAmount'    => number_format($totaSalesAmt, 2, '.', ','),
            'img'                 => $details_info[0]['image'],
            'total_purchase'      => $totalPurchase,
            'total_sales'         => $totalSales,
            'purchaseData'        => $purchaseData,
            'salesData'           => $salesData,
            'stock'               => $stock,
            'product_statement'   => 'Cproduct/product_sales_supplier_rate/' . $product_id,
            'currency'            => $currency_details[0]['currency'],
            'position'            => $currency_details[0]['currency_position'],
        );

        $productList = $CI->parser->parse('product/product_details', $data, true);
        return $productList;
    }

    //Product Details
    public function product_sales_supplier_rate($product_id, $startdate, $enddate)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        //Product Summary
        $details_info = $CI->Products->product_details_info($product_id);
        $opening_balance = $CI->Products->previous_stock_data($product_id, $startdate);
        $salesData = $CI->Products->invoice_data_supplier_rate($product_id, $startdate, $enddate);

        $stock = $opening_balance[0]['quantity'];
        $totalIn = 0;
        $totalOut = 0;
        $totalstock = 0;
        $gtotal_sell = 0;
        $gtotal_purchase = 0;

        if (!empty($salesData)) {
            foreach ($salesData as $k => $v) {
                $salesData[$k]['fdate'] = $CI->occational->dateConvert($salesData[$k]['date']);

                if ($salesData[$k]['account'] == "a") {
                    $salesData[$k]['in'] = round($salesData[$k]['quantity'], 0);
                    $salesData[$k]['total_purchase'] = $salesData[$k]['total_price'];
                    $salesData[$k]['total_sell'] = 0;
                    $salesData[$k]['out'] = 0;
                    $stock = $stock + $salesData[$k]['out'] + $salesData[$k]['in'];
                    $totalIn += $salesData[$k]['in'];

                    $gtotal_purchase += $salesData[$k]['total_purchase'];
                } else {
                    $salesData[$k]['out'] = round($salesData[$k]['quantity'], 0);
                    $salesData[$k]['in'] = 0;
                    $stock = $stock + $salesData[$k]['out'] + $salesData[$k]['in'];
                    $totalOut += $salesData[$k]['out'];

                    $salesData[$k]['total_purchase'] = 0;
                    $salesData[$k]['total_sell'] = $salesData[$k]['total_price'];
                    $gtotal_sell += $salesData[$k]['total_sell'];
                }
                $salesData[$k]['stock'] = $stock;

                $totalstock = $salesData[$k]['stock'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Products->retrieve_company();

        $data = array(
            'title'             => display('product_statement'),
            'product_id'        => $details_info[0]['product_id'],
            'product_name'      => $details_info[0]['product_name'],
            'product_model'     => $details_info[0]['product_model'],
            'startdate'         => $startdate,
            'enddate'           => $enddate,
            'price'             => $details_info[0]['price'],
            'totalIn'           => $totalIn,
            'totalOut'          => $totalOut,
            'totalstock'        => $totalstock,
            'gtotal_sell'       => number_format($gtotal_sell, 2, '.', ','),
            'gtotal_purchase'   => number_format($gtotal_purchase, 2, '.', ','),
            'opening_balance'   => round($opening_balance[0]['quantity'], 0),
            'salesData'         => $salesData,
            'company_info'      => $company_info,
            'currency'          => $currency_details[0]['currency'],
            'position'          => $currency_details[0]['currency_position'],
        );
        $productList = $CI->parser->parse('product/product_sales_supplier_rate', $data, true);
        return $productList;
    }

    public function size_home()
    {
        $CI = &get_instance();
        $CI->load->model('Products');

        $size_list = $CI->Products->get_size_list();

        $data = array(
            'title' => 'Product Attributes',
            'size_list' => $size_list
        );

        $view = $CI->parser->parse('product/size', $data, true);
        return $view;
    }

    public function attr_edit_data($size_id)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $category_detail = $CI->Products->retrieve_attr_editdata($size_id);

        $data = array(
            'title'         => 'Edit Attributes',
            'name'     => $category_detail[0]['name'],
            'id'     => $category_detail[0]['id'],

        );
        $view = $CI->parser->parse('product/edit_size_form', $data, true);
        return $view;
    }

    public function color_home()
    {
        $CI = &get_instance();
        $CI->load->model('Products');

        $color_list = $CI->Products->get_color_list();

        $data = array(
            'title' => 'Product color',
            'color_list' => $color_list
        );

        $view = $CI->parser->parse('product/color', $data, true);
        return $view;
    }

    public function color_edit_data($color_id)
    {
        $CI = &get_instance();
        $CI->load->model('Products');
        $category_detail = $CI->Products->retrieve_color_editdata($color_id);

        $data = array(
            'title'         => 'Edit color',
            'color_id'       => $category_detail[0]['color_id'],
            'color_name'     => $category_detail[0]['color_name'],
            'status'        => $category_detail[0]['status']
        );
        $view = $CI->parser->parse('product/edit_color_form', $data, true);
        return $view;
    }
}
