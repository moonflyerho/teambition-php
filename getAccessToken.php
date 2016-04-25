<?php
session_start();
include 'config.php';


$params = array(
    'client_id' => $appKey,
    'client_secret' => $appSecret,
    'code' => $_SESSION['get']['code'],
    'grant_type' => 'code'
);

$url = $auth_domain . '/oauth2/access_token';

$ch = curl_init();
$timeout = 5000;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);
curl_close($ch);

// echo 'Result :' . $result . '<br /> <br />';
$jsonResult = json_decode($result);
$_SESSION['accessToken'] = $jsonResult->access_token;
?>