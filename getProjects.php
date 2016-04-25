<?php
session_start();
include 'config.php';

$params = array(
    'access_token' => $_SESSION['accessToken']
);

$url = $api_domain . '/api/projects/?'.http_build_query($params);

$result = file_get_contents($url);

// echo 'Result :' . $result . '<br /> <br />';
$jsonResult = json_decode($result);
foreach ( $jsonResult as $project ) {
	echo "<a href='?project_id=" . $project->_id . "'>" . $project->name ."</a>";
}
?>