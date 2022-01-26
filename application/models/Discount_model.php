<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Discount_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
 public function customer_dropdown(){
        $this->db->select('*');
        $this->db->from('customer_information');
        $query=$this->db->get();
        $data=$query->result();
        $list[''] = display('select_option');
        if(!empty($data)){
            foreach ($data as  $value) {
                $list[$value->customer_id]=$value->customer_name;
            }
        }
        return $list;
    }

    public function autocompletcustomerdata($customer_name){
        $query=$this->db->select('*')
            ->from('customer_information')
            ->like('customer_name', $customer_name, 'both')
            ->order_by('customer_name','asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function autocompletcategorydata($category_name){
        $query=$this->db->select('*')
            ->from('product_category')
            ->like('category_name', $category_name, 'both')
            ->order_by('category_name','asc')
            ->limit(15)
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function category_dropdown()
    {
        $data = $this->db->select("*")
            ->from('product_category')
            ->get()
            ->result();

        $list = array('' => 'select_category');
        if (!empty($data)) {
            foreach($data as $value)
                $list[$value->category_id] = $value->category_name;
            return $list;
        } else {
            return false;
        }
    }

    public function create_discount($data){

       // echo '<pre>';print_r($data);exit();
    $this->db->insert('discount',$data);
    return true;
    }

        //Update Categories
    public function update_discount($data = []) {
        $this->db->where('discount_id', $data['discount_id']);
        $this->db->update('discount', $data);
        return true;
    }

    public function getDiscountList(){

        ## Fetch records
        $records= $this->db->select('*')
            ->from('discount a')
            ->join('customer_information c','c.customer_id=a.customer_id')
             ->join('product_category d','d.category_id=a.category_id')
            ->get()
            ->result();

        // $data = array();

        $sl =1;





        foreach($records as $record ){


            $data[] = array(

                // 'cw_id'=>$record->to_id,

                'category_name'=>$record->category_name,
                'discount'=>$record->discount_percentage,
                'customer_name'=>$record->customer_name,
                'discount_id'=>$record->discount_id,
                'customer_id_two'=>$record->customer_id_two,



            );

        }

        ## Response


        return $data;

    }
    public function discount_edit_data($id) {
        $this->db->select('*')
            ->from('discount a')
            ->join('product_category b','b.category_id=a.category_id')
            ->join('customer_information d','d.customer_id=a.customer_id')
            ->where('a.discount_id',$id);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }


    public function discount_delete($id){
        $this->db->where('discount_id', $id)
            ->delete('discount');
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

        public function get_items() {


        $this->db->select('a.*,b.*,c.*');
        $this->db->from('discount a');
        $this->db->join('customer_information b', 'a.customer=b.customer_id');
        $this->db->join('product_category c', 'a.category=c.category_id');
      
        $customers = $this->db->query("SELECT customer_name,customer_id FROM `customer_information`")->result();
        $categories= $this->db->query("SELECT category_id,category_name FROM `product_category`")->result();

        

        foreach ($customers as $customer) {
            $customer_id[] = $customer->customer_id;
            $customer_name[] = $customer->customer_name;

        }

        $html[] = "";
        if (empty($customer)) {
            $html .="No Customer Found !";
        }else{
            // Select option created for product
            $html .="<select name=\"customer[]\"   class=\"customer_1 form-control\" id=\"customer_1\">";
            $html .= "<option value=''>".display('select_one')."</option>";
            foreach ($customers as $customer) {
                $html .="<option value=".$customer->customer_id.">".$customer->customer_name."</option>";
            }
            $html .="</select>";
        }
        // foreach ($warehouse_information as $warehouse_information) {
        //     $warehouse[] = $warehouse_information->warehouse;

        // }
        // $whouse[]= "";
        // if (empty($warehouse)) {
        //     $whouse .="No warehouse Found !";
        // }else{
        //     // Select option created for product
        //     $whouse .="<select name=\"warehouse[]\"   class=\"warehouse_1 form-control\" id=\"warehouse_1\">";
        //     $whouse .= "<option value=''>".display('select_one')."</option>";
        //     foreach ($warehouse as $warehouse) {

        //         $whouse .="<option value=".$warehouse.">".$warehouse."</option>";

        //     }
        //     $whouse .="</select>";
        // }


      //   $data2['total_product']  = $available_quantity;
      //   $data2['supplier_price'] = $product_information->supplier_price;
      // //  $data2['warehouse']      = $product_information->warehouse;
      //   $data2['price']          = $product_information->price;
      //   $data2['supplier_id']    = $product_information->supplier_id;
       // $data2['warehouse']      = $whouse; 
       // $data2['warrenty_date']  = $product_information->warrenty_date;
       // $data2['expired_date']  = $product_information->expired_date;
        // $data2['unit']           = $product_information->unit;
        // $data2['tax']            = $product_information->tax;
        $data2['customer']         = $html;
        // $data2['discount_type']  = $currency_details[0]['discount_type'];
        // $data2['txnmber']        = $num_column;

        // echo "<pre>";print_r($data2);exit();
        return $data2;
    }


}
