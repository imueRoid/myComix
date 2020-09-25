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
} elseif($_GET['mode'] == "set_cover"){
	$getfile = decode_url($_GET['file']);
	$base_file = $base_dir.$getfile;
	$base_title = explode("/", $base_file);
	$title = $base_title[(count($base_title)-1)];
	$base_folder = str_replace($title, "", $base_file);
	$cover_file = $base_folder."[cover].jpg";		
	if(strpos(strtolower($base_file), ".zip") !== false || strpos(strtolower($base_file), ".cbz") !== false){
		$list = array();
		$zip = new ZipArchive;
		if ($zip->open($base_file) == TRUE) {
			for ($i = 0; $i < $zip->numFiles; $i++) {
				if(!strpos(strtolower($zip->getNameIndex($i)), ".jpg") && !strpos(strtolower($zip->getNameIndex($i)), ".jpeg") && !strpos(strtolower($zip->getNameIndex($i)), ".png") && !strpos(strtolower($zip->getNameIndex($i)), ".gif")){
					continue;
				} else {
					$list[$i] = $zip->getNameIndex($i);
				}
			}
			$list = n_sort($list);
			$cover_output = imagecreatefromstring($zip->getFromName($list[0]));
		}
	} else {
		$list = array();
		$counter = 0;
		$iterator = new DirectoryIterator($base_file);
		foreach ($iterator as $jpgfile) {
			if (strpos(strtolower($jpgfile), ".jpg") !== false || strpos(strtolower($jpgfile), ".jpeg") !== false || strpos(strtolower($jpgfile), ".png") !== false || strpos(strtolower($jpgfile), ".gif") !== false) {
				$list[$counter] = $base_file."/".$jpgfile;
				$counter++;
			}
		}
		$list = n_sort($list);
		$cover_output = imagecreatefromstring(file_get_contents($list[0]));
	}
	imagejpeg($cover_output, $cover_file);
	echo "설정됨";
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