<?php
session_start();
include 'config.php';

$params = array(
    'access_token' => $_SESSION['accessToken']
);

$task = array(
	"content" => "this is an new task",
	"_tasklistId" => "xxxxx"
);

$url = $api_domain . '/api/tasks?'.http_build_query($params);

// print_r($params);

$ch = curl_init();
$timeout = 5000;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($task));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);
curl_close($ch);

echo 'Result :' . $result . '<br /> <br />';
$jsonResult = json_decode($result);
?>