<?php
$url = "http://trurl:5001/visualize";
$data = file_get_contents('php://input');

$options = array(
    "http" => array(
        "header"  => "Content-type: application/x-www-form-urlencoded\r\n",
        "method"  => "POST",
        "content" => $data
    )
);
$context = stream_context_create($options);
header("Content-Type: text/plain");
echo file_get_contents($url, false, $context);
?>
