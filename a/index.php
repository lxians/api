<?php
header('Access-Control-Allow-Origin:*');
header('content-type:application/json;charset=utf8');
require 'api.php';
echo getUrl();
    function getUrl(){
        $data = \Dahai::qsy($_GET['url']);
		return  $data;
    }

?>