<?php
include("config.php");
if($_GET['file'] && $_GET['file']){
	$getfile = str_replace("{plus}", "+", urldecode($_GET['file']));
	$imgfile = str_replace("{plus}", "+", urldecode($_GET['imgfile']));
	$base_file = $base_dir.$getfile;
} else {
	echo "정보가 없습니다.";
	die(header("Location: ./"));
}

$base_title = explode("/", $base_file);
$title = $base_title[(count($base_title)-1)];
$base_folder = str_replace($title, "", $base_file);
$link_dir = str_replace("/".$title, "", $getfile);

$list = array();
$zip = new ZipArchive;
$zip->open($base_file);
header('Content-Type: image/jpeg');
echo $zip->getFromName($imgfile);
$zip->close();
?>