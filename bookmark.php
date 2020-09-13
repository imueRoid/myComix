<?php
include("config.php");
$getfile = str_replace("{plus}", "+", urldecode($_GET['file']));
$bookmark_file = "admin_bookmark.json";
$bookmark_arr = array();
if(is_file($bookmark_file) === true){
	$bookmark_arr = json_decode(file_get_contents($bookmark_file), true);
	if(count($bookmark_arr) > 10) {
		array_shift($bookmark_arr);		
	}
}

$bookmark_arr[$getfile] = $_GET['bookmark'];

$json_output = json_encode($bookmark_arr, JSON_UNESCAPED_UNICODE);

file_put_contents($bookmark_file, $json_output);

echo base64_decode($null_image);
?>