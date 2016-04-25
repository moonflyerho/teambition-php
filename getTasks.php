<?php
session_start();
include 'config.php';

$params = array(
    'access_token' => $_SESSION['accessToken']
);

$url = $api_domain . '/api/projects/' . $_GET['project_id'] . '/tasks?'.http_build_query($params);

$result = file_get_contents($url);

// echo 'Result :' . $result . '<br /> <br />';
$jsonResult = json_decode($result);
foreach ( $jsonResult as $task ) {
	echo "<a href='getTask.php?task_id=" . $task->_id . "'>" . $task->content ." | " . $task->_tasklistId . "</a><br/>";
}
?>