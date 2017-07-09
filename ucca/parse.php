<?php
$server = file_get_contents("server_name.txt");
$url = "http://$server/parse";
$data = array("input" => $_POST["input"]);

$options = array(
    "http" => array(
        "header"  => "Content-type: application/x-www-form-urlencoded\r\n",
        "method"  => "POST",
        "content" => http_build_query($data)
    )
);
$context = stream_context_create($options);
header('Content-type: application/xml; charset=utf-8');
$xml = simplexml_load_string(file_get_contents($url, false, $context));
$dom = dom_import_simplexml($xml);
echo $dom->ownerDocument->saveXML($dom->ownerDocument->documentElement);
?>
