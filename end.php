<?php
$link = $_GET['url'];

$get1 = file_get_contents("https://amir.s2.robotapi.xyz/instaapi/v1/io.php?url=$link");
$api1 = json_decode($get1, true);
$id = $api1["job_id"];
file_put_contents("id.txt", "$id");
$send = file_get_contents("id.txt");

if (empty($send)) {
 die("error");
}
echo $send;
$url = "https://amir.s2.robotapi.xyz/instaapi/v1/ip.php?url=$send";
$result = file_get_contents($url);
$api2 = json_decode($result,true);



http_response_code(200);
header('Content-type: application/json; charset=utf-8');
echo json_encode($api2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents("id.txt", "");

?>