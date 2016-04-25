<?php
include 'config.php';

$redirectUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/creatAuth.php';
$params = array(
    'client_id' => $appKey,
    'redirect_uri' => $redirectUrl
);

$get_code_url = $auth_domain."/oauth2/authorize?" . http_build_query($params);


echo "<script language=\"javascript\">";
echo "location.href=\"$get_code_url\"";
echo "</script>";

?>