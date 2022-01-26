<?php

$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$api_url = 'https://erp.gmebdonline.com/Api/auto_sms';

// Read JSON file
$json_data = file_get_contents($api_url,false, stream_context_create($arrContextOptions));

// Decode JSON data into PHP array
$response_data = json_decode($json_data);


$url = "http://go.smsbd.pro/smsapimany";
$data = [
    "api_key" => "C20047385da5a06aec2c21.99251389",
    "senderid" => "8809601000500",
    "messages" => json_encode($response_data)
];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);


return $response;




?>