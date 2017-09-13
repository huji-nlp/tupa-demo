<?php
$server = file_get_contents("server_name.txt");
$url = "http://$server/";
if(isset($_POST["input"])){
    $url .= "parse";
    $data = http_build_query(array("input" => $_POST["input"]));
}else{
    $url .= "visualize";
    $data = file_get_contents('php://input');
}

$options = array(
    "http" => array(
        "header"  => "Content-type: application/x-www-form-urlencoded\r\n",
        "method"  => "POST",
        "content" => $data
    )
);
$context = stream_context_create($options);
header("Content-type: text/plain; charset=utf-8");
echo file_get_contents($url, false, $context);
?>
