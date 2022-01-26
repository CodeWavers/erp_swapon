<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://swaponsworld.com/api/v1/brands/store',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('name' => 'Test Brand','meta_title' => 'Tetst Meta','meta_description' => 'abcd','slug' => 'xyz','logo'=> new CURLFILE('/C:/Users/Arman/Pictures/a.PNG')),

));


$response = curl_exec($curl);

curl_close($curl);
echo $response;
