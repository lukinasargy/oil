<?php
// Required params
$token = 'ZTQ3MZHMYWQTZTKWNS00M2U0LWEYMDGTYJQ0NDAXODI3MMJH';
$stream_code = 'stream_code';

// Fields to send
$post_fields = [
    'stream_code'   => $stream_code,    // required
    'client'        => [
        'phone'     => $_POST['phone'], // required
        // 'name'      => $_POST['name'],
        // 'surname'   => $_POST['surname'],
        // 'email'     => $_POST['email'],
        // 'address'   => $_POST['address'],
        // 'ip'        => $_POST['ip'],
        // 'country'   => $_POST['country'],
        // 'city'      => $_POST['city'],
        // 'postcode'  => $_POST['postcode'],
    ],
//    'sub1'      => $_POST['sub1'],
//    'sub2'      => $_POST['sub2'],
//    'sub3'      => $_POST['sub3'],
//    'sub4'      => $_POST['sub4'],
//    'sub5'      => $_POST['sub5'],
];

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $token
];

if (function_exists('curl_version')) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://order.drcash.sh/v1/order");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_fields));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, true);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $body = substr($response, $header_size);

    curl_close ($ch);

    if ($httpcode !== 200) {
        echo 'Error: ' . $httpcode;
   