<?php
$server = file_get_contents("server_name.txt");
if (isset($_POST["action"])) {
    $action = $_POST["action"];
    if ($action == "parse") {
        header("Content-type: text/plain; charset=utf-8");
        $data = http_build_query(array("input" => $_POST["input"]));
    } elseif ($action == "download") {
        $format = $_POST["format"];
        header('Content-description: File Transfer');
        header("Content-disposition: attachment; filename=\"out.$format\"");
        header("Content-type: application/octet-stream");
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        $action = "parse";
        $data = http_build_query(array("input" => $_POST["xml"], "format" => $format));
    }
} else {
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
echo file_get_contents("http://$server/$action", false, $context);
?>
