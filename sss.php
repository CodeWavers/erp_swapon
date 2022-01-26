<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gmebdonl_erp";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$present_day=date('Y-m-d');
$tommorrow=date('Y-m-d',strtotime(' +1 day'));
$next_day=date('Y-m-d',strtotime(' +2 day'));
//$interval="SELECT cheque_date FROM cus_cheque BETWEEN $present_day AND $next_day";
//$int=$conn->query($interval)->fetch_all();
$sql = "SELECT invoice.invoice_id,invoice.paid_amount,invoice.due_amount,invoice.total_amount,invoice.customer_id, customer_information.customer_name,cus_cheque.cheque_date,customer_information.customer_mobile
FROM invoice
JOIN customer_information
ON invoice.customer_id=customer_information.customer_id
JOIN cus_cheque
ON invoice.invoice_id=cus_cheque.invoice_id
WHERE invoice.due_amount>0 AND  cus_cheque.cheque_date BETWEEN '$present_day' AND '$next_day'";
$result = $conn->query($sql);



//echo print_r($result);
foreach ($result->fetch_array() as $row) {
    $json['response'] = array(
        'status'       => 'ok',
        'records' => $row["cheque_date"],
    );

}

echo json_encode($json,JSON_UNESCAPED_UNICODE);
//foreach ($result->fetch_array() as $row) {
//
//    $json_customer[] = array('to => '.$row["customer_mobile"], 'message => Hello'. $row["customer_name"].',\nInvoice ID: '.$row["invoice_id"].',\nYour Total Bill:'.$row["total_amount"].',\nPaid Bill:'.$row["paid_amount"].',\nDue Bill:'.$row["due_amount"].',\nNext Payment Date:'.$row["cheque_date"].',\n\nFrom GMEBD,\nThank You');
//}
//echo '<pre>';print_r($json_customer);exit();


$conn->close();

?>