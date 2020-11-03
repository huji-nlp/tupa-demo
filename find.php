<?php
error_reporting(~0);
ini_set('display_errors', 1);
$server = file_get_contents("find_server_name.txt");
header("Content-type: text/plain; charset=utf-8");
$data = http_build_query(array("pid" => $_POST["pid"], "text" => $_POST["text"],
    "ftag" => $_POST["ftag"], "dep" => $_POST["dep"], "nocase" => isset($_POST["nocase"]) ? $_POST["nocase"] : false));
$options = array(
    "http" => array(
        "header"  => "Content-type: application/x-www-form-urlencoded\r\n",
        "method"  => "POST",
        "content" => $data
    )
);
$context = stream_context_create($options);
echo file_get_contents("http://$server", false, $context);
?>
