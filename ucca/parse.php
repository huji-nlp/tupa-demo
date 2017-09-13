<?php
$server = file_get_contents("server_name.txt");
if(isset($_POST["action"])){
    $action = $_POST["action"];
    $data = http_build_query(array("input" => $_POST["input"]));
}else{
    $action = "visualize";
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
echo file_get_contents("http://$server/$action", false, $context);
?>
