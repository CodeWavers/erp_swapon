<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Csms extends CI_Controller {
	
	public $company_id;
	function __construct() {
        parent::__construct(); 
        $this->db->query('SET SESSION sql_mode = ""');
		$this->load->library('auth');
		$this->auth->check_admin_auth();
		$this->load->library('session');
		$this->load->model('Web_settings');
		
		
    }

  
	#===========Purchase search============#
	public function configure()
	{
		$data['configdata'] = $this->db->select('*')->from('sms_settings')->get()->result_array();
		$data['title'] = 'sms configuration';
		$content = $this->parser->parse('sms/configure_form',$data,true);
		$this->template->full_admin_html_view($content);
	}
	public function sms_view()
	{
		$data['configdata'] = $this->db->select('*')->from('sms_settings')->get()->result_array();
		$data['title'] = 'Send SMS';
		$content = $this->parser->parse('sms/send_sms',$data,true);
		$this->template->full_admin_html_view($content);
	}

	public function send_sms(){
	    $api_key=$this->input->post('api_key',true);
	    $from=$this->input->post('from',true);
	    $to=$this->input->post('to',true);
	    $msg=$this->input->post('message',true);
        $url = "http://go.smsbd.pro/smsapi";
        $data = [
            "api_key" =>$api_key,
            "type" => "text/unicode",
            "contacts" => $to,
            "senderid" => $from,
            "msg" => $msg,
        ];
        $inserted_data=array(
            "to" => $to,
            "from" => $from,
            "message" => $msg,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        if($response == false ) {
            $this->session->set_userdata(array('error_message'=>'Something went wrong'));
            redirect('Csms/sms_view');
        } else {
            $this->session->set_userdata(array('message'=>'Successfully send SMS'));
            $this->db->insert('sent_sms',$inserted_data);
            redirect('Csms/sms_view');

        }
        curl_close($ch);
        return $response;
    }

	public function auto_sms(){
       $customer_mobile= $this->db->select('customer_mobile')->from('customer_information')->get()->result_array();
        $present_day=date('Y-m-d');
       $tommorrow=date('Y-m-d',strtotime(' +1 day'));
       $next_day=date('Y-m-d',strtotime(' +2 day'));


       $interval= "(c.cheque_date BETWEEN '$present_day' AND '$next_day')";
        //$interval="SELECT cheque_date FROM cus_cheque BETWEEN $present_day AND $next_day";

        $this->db->select("c.cheque_date,c.invoice_id,a.customer_id,a.due_amount,a.total_amount,a.paid_amount,b.customer_mobile,b.customer_name");
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
        $this->db->join('cus_cheque c', 'c.invoice_id = a.invoice_id','left');
        $this->db->where('a.due_amount >',0);
        $this->db->where($interval);
      //  $this->db->where('c.cheque_date',$present_day);
     //   $this->db->or_where('c.cheque_date',$tommorrow);
       // $this->db->where('c.cheque_date',$present_day);
       // $this->db->order_by('c.cheque_date');
        //$this->db->group_by('a.customer_id');



        $records = $this->db->get()->result();
      //  echo '<pre>';print_r($records);exit();
//        foreach ($records->result() as $row) {
//
//            $json_customer[] = array('to' => $row->customer_mobile, 'message' =>"Hello $row->customer_name,\nInvoice ID: $row->invoice_id,\nYour Total Bill:$row->total_amount,\nPaid Bill:$row->paid_amount,\nDue Bill:$row->due_amount,\nNext Payment Date:$row->cheque_date,\n\nFrom GMEBD,\nThank You");
//        }
//
//
//
//        $url = "http://go.smsbd.pro/smsapimany";
//        $data = [
//            "api_key" => "C20047385da5a06aec2c21.99251389",
//            "senderid" => "8809601000500",
//            "messages" => json_encode($json_customer)
//        ];
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//
//        return $response;

        echo '<pre>';print_r($records);

    }
	public function add_update_configure(){
       
      $id = $this->input->post('id');
		$data=array(
				'api_key' 	  => $this->input->post('api_key',true),
				'api_secret'  => $this->input->post('api_secret',true),
				'from'        => $this->input->post('from',true),
				'isinvoice'   => $this->input->post('isinvoice',true),
				'isservice'   => $this->input->post('isservice',true),
				'isreceive'   => $this->input->post('isreceive',true),

				);

	if(!empty($id)){
           $this->db->where('id', $id);
			$this->db->update('sms_settings',$data);
	}else{
      $this->db->insert('sms_settings',$data);
	}
	$this->session->set_userdata(array('message'=>display('successfully_updated')));
	redirect('Csms/configure');
 }
	
}