<?php
session_start();

$_SESSION['get'] = $_GET;

$redirctUrl = 'getAccessToken.php';
echo "<script language=\"javascript\">";
echo "location.href=\"$redirctUrl\"";
echo "</script>";

?>