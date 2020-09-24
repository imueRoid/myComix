<?php
include("config.php");
include("function.php");

$getfile = decode_url($_GET['file']);
	if($max_bookmark == null){
		$max_bookmark = 10;
	}
	if($max_autosave == null){
		$max_autosave = 3;
	}

if($_GET['mode'] == "delete_bookmark"){
	$bookmark_arr = array();
	$bookmark_arr = json_decode(file_get_contents($bookmark_file), true);
	unset($bookmark_arr[$getfile]);
	$json_output = json_encode($bookmark_arr, JSON_UNESCAPED_UNICODE);
	file_put_contents($bookmark_file, $json_output);
	$prevPage = $_SERVER["HTTP_REFERER"];
	header("location:".$prevPage);
} elseif($_GET['mode'] == "delete_autosave"){
	$autosave_arr = array();
	$autosave_arr = json_decode(file_get_contents($autosave_file), true);
	unset($autosave_arr[$getfile]);
	$json_output = json_encode($autosave_arr, JSON_UNESCAPED_UNICODE);
	file_put_contents($autosave_file, $json_output);
	$prevPage = $_SERVER["HTTP_REFERER"];
	header("location:".$prevPage);
} elseif($_GET['mode'] == "autosave"){
	$autosave_arr = array();
	if(is_file($autosave_file) === true){
		$autosave_arr = json_decode(file_get_contents($autosave_file), true);
		if(count($autosave_arr) > (int)$max_autosave) {
			array_shift($autosave_arr);		
		}
	}
	$autosave_arr[$getfile]['bookmark'] = $_GET['bookmark'];
	$autosave_arr[$getfile]['viewer'] = $_GET['viewer'];
	$autosave_arr[$getfile]['page_order'] = $_GET['page_order'];
	$json_output = json_encode($autosave_arr, JSON_UNESCAPED_UNICODE);
	file_put_contents($autosave_file, $json_output);
} else {
	$bookmark_arr = array();
	if(is_file($bookmark_file) === true){
		$bookmark_arr = json_decode(file_get_contents($bookmark_file), true);
		if(count($bookmark_arr) > (int)$max_bookmark) {
			array_shift($bookmark_arr);		
		}
	}
	$bookmark_arr[$getfile]['bookmark'] = $_GET['bookmark'];
	$bookmark_arr[$getfile]['viewer'] = $_GET['viewer'];
	$bookmark_arr[$getfile]['page_order'] = $_GET['page_order'];
	$json_output = json_encode($bookmark_arr, JSON_UNESCAPED_UNICODE);
	file_put_contents($bookmark_file, $json_output);
	echo "#".str_replace("image", "",$_GET['bookmark'])."-OK";
}
?>