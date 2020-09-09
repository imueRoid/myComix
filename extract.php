<?php
include("config.php");
if($_GET['file'] && $_GET['imgfile']){
	$getfile = str_replace("{plus}", "+", urldecode($_GET['file']));
	$imgfile = str_replace("{plus}", "+", urldecode($_GET['imgfile']));
	$base_file = $base_dir.$getfile;
} else {
	echo "정보가 없습니다.";
	die(header("Location: ./"));
}

if($_GET['filetype'] == "images") {
	header('Content-Type: image/jpeg');
	if($_GET['order'] == null){
		echo file_get_contents($imgfile);
	} elseif($_GET['order'] == "right"){
		$size = getimagesizefromstring(file_get_contents($imgfile));
		if($size[0]/$size[1] < 1){
			echo base64_decode($null_image);
		} else {
			$new_x = $size[0]/2;
			$originimage = imagecreatefromstring(file_get_contents($imgfile));
			$cropimage_r = imagecrop($originimage, ['x' => $new_x, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
			imagedestroy($originimage);
			imagejpeg($cropimage_r);
			imagedestroy($cropimage_r);
		}
	} elseif($_GET['order'] == "left"){
		$size = getimagesizefromstring(file_get_contents($imgfile));
		if($size[0]/$size[1] < 1){
			echo file_get_contents($imgfile);
		} else {
			$new_x = $size[0]/2;
			$originimage = imagecreatefromstring(file_get_contents($imgfile));
			$cropimage_l = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
			imagejpeg($cropimage_l);
			imagedestroy($cropimage_l);
		}
	}
} else {
	$base_title = explode("/", $base_file);
	$title = $base_title[(count($base_title)-1)];
	$base_folder = str_replace($title, "", $base_file);
	$link_dir = str_replace("/".$title, "", $getfile);

	$list = array();
	$zip = new ZipArchive;
	$zip->open($base_file);
	header('Content-Type: image/jpeg');
	if($_GET['order'] == null){
		echo $zip->getFromName($imgfile);
	} elseif($_GET['order'] == "right"){
		$size = getimagesizefromstring($zip->getFromName($imgfile));
		if($size[0]/$size[1] < 1){
			echo base64_decode($null_image);
		} else {
			$new_x = $size[0]/2;
			$originimage = imagecreatefromstring($zip->getFromName($imgfile));
			$cropimage_r = imagecrop($originimage, ['x' => $new_x, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
			imagedestroy($originimage);
			imagejpeg($cropimage_r);
			imagedestroy($cropimage_r);
		}
	} elseif($_GET['order'] == "left"){
		$size = getimagesizefromstring($zip->getFromName($imgfile));
		if($size[0]/$size[1] < 1){
			echo $zip->getFromName($imgfile);
		} else {
			$new_x = $size[0]/2;
			$originimage = imagecreatefromstring($zip->getFromName($imgfile));
			$cropimage_l = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
			imagedestroy($originimage);
			imagejpeg($cropimage_l);
			imagedestroy($cropimage_l);
		}
	}
	$zip->close();
}

?>