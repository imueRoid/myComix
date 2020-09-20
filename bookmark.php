<?php
include("config.php");
include("function.php");

$getfile = decode_url($_GET['file']);
$bookmark_arr = array();
if(is_file($bookmark_file) === true){
	$bookmark_arr = json_decode(file_get_contents($bookmark_file), true);
	if(count($bookmark_arr) > 10) {
		array_shift($bookmark_arr);		
	}
}

if($_GET['mode'] == "delete"){
	unset($bookmark_arr[$getfile]);
	$json_output = json_encode($bookmark_arr, JSON_UNESCAPED_UNICODE);
	file_put_contents($bookmark_file, $json_output);
	$prevPage = $_SERVER["HTTP_REFERER"];
	header("location:".$prevPage);
} else {
	$bookmark_arr[$getfile]['bookmark'] = $_GET['bookmark'];
	$bookmark_arr[$getfile]['viewer'] = $_GET['viewer'];
	$bookmark_arr[$getfile]['page_order'] = $_GET['page_order'];
	$json_output = json_encode($bookmark_arr, JSON_UNESCAPED_UNICODE);
	file_put_contents($bookmark_file, $json_output);
	echo "#".str_replace("image", "",$_GET['bookmark'])."-OK";
}
?>