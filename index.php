<?php
include("config.php");
include("function.php");
?>
<html>
<head>
	<title>myComix</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="data:data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMAAAADACAIAAADdvvtQAAAACXBIWXMAAAsTAAALEwEAmpwYAAAHOGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wOC0xOVQwMToxMDowMyswOTowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDktMDhUMTY6MTg6NTErMDk6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDktMDhUMTY6MTg6NTErMDk6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OWNmY2M3ZWMtOWJlMi1kODQ3LTg1MmYtYmNlZTc2N2RkZmYxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdlMzQ3YzMwLWI0YWUtNjY0ZS05MjA0LTcwODNmNzVhZWRmNSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjdlMzQ3YzMwLWI0YWUtNjY0ZS05MjA0LTcwODNmNzVhZWRmNSI+IDxwaG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDxyZGY6QmFnPiA8cmRmOmxpPnhtcC5kaWQ6N2UzNDdjMzAtYjRhZS02NjRlLTkyMDQtNzA4M2Y3NWFlZGY1PC9yZGY6bGk+IDwvcmRmOkJhZz4gPC9waG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6N2UzNDdjMzAtYjRhZS02NjRlLTkyMDQtNzA4M2Y3NWFlZGY1IiBzdEV2dDp3aGVuPSIyMDIwLTA4LTE5VDAxOjEwOjAzKzA5OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDphNDQ2OTM5YS00NGZkLTViNDEtOWQ3NC05MDg3N2E5OGY3ZjIiIHN0RXZ0OndoZW49IjIwMjAtMDktMDVUMTk6MDQ6MzQrMDk6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjljZmNjN2VjLTliZTItZDg0Ny04NTJmLWJjZWU3NjdkZGZmMSIgc3RFdnQ6d2hlbj0iMjAyMC0wOS0wOFQxNjoxODo1MSswOTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIg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">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Gugi&family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
	<style type="text/css">
		body {
			padding-bottom: 3em;
			font-family: 'Nanum Gothic', sans-serif;
			font-size: smaller;
		}
		a:link {text-decoration: none;}
		a:visited {text-decoration: none;}
		a:active {text-decoration: none;}
		a:hover {text-decoration: none;}
		.user-dropdown {
			font-size: 0.8em;
		}
		.dropdown-menu{
			max-height: 300px;
			overflow-y: auto;
		}
	</style>
</head>
<body>
<div class="container-fluid" >

<?php

if($_GET['dir'] != null){
	$getdir = decode_url($_GET['dir']);
	$dir = $base_dir.$getdir;
	$is_remote = dir_check($getdir);
} else {
	$dir = $base_dir;
}
$iterator = new DirectoryIterator($dir);
$dircounter = 0;
$titlecounter = 0;
$filecounter = 0;
$file_list = array();
$jpgcounter = 0;
$jpg_list = array();
$jpg_folder = array();
$dir_list = array();
$title_list = array();
$dirinfo = array();
if(str_replace("/", "", $base_dir) == str_replace("/", "", $dir)){
	$is_root = true;
}
foreach ($iterator as $fileinfo) {
	$fileis_remote = "c";
	if($is_root == true) {
		$getmodefile = $base_dir."/".$fileinfo->getFilename().".json";
		if(is_file($getmodefile) == true) {
			$dirmode_arr = array();
			$dirmode_arr = json_decode(file_get_contents($getmodefile), true);
			if($dirmode_arr[$_SESSION["user_group"]] !== 1) {
				continue;
			} elseif($dirmode_arr['remote'] == "y"){
				$fileis_remote = "y";
			}
		}
	}
    if (!$fileinfo->isDot() && $fileinfo != "@eaDir" && $fileinfo->isDir()) {
		if(strpos($dir, "rclone_") !== false || $is_remote == "y" || strpos($fileinfo->getFilename(), "rclone_") !== false || $fileis_remote == "y") {
			$dir_list[$dircounter] = $fileinfo->getFilename();
			$dirinfo[$fileinfo->getFilename()] = "remote";
			$dircounter++;
		} else {
			$sub_iterator = new DirectoryIterator($dir."/".$fileinfo->getFilename());
			$sub_dircounter = 0;
			$subdir_list = array();
			$jpg_c = 0;
			$jpg_folder[$fileinfo->getFilename()] = array();
			foreach ($sub_iterator as $subfileinfo) {
				if (!$subfileinfo->isDot() && $subfileinfo != "@eaDir") {
						if($subfileinfo->isDir() == true) {	
							$jpg_c = 0;
							$sub_dircounter++;
							break;
						} elseif(strpos(strtolower($subfileinfo->getFilename()),".jpg") !== false || strpos(strtolower($subfileinfo->getFilename()),".png") !== false) {
							$jpg_folder[$fileinfo->getFilename()][$jpg_c] = $subfileinfo->getFilename();
							$jpg_c++;
						}
				}
			}
			if($sub_dircounter>0){
				$dir_list[$dircounter] = $fileinfo->getFilename();
				$dircounter++;
			} else {
				if(count($jpg_folder[$fileinfo->getFilename()]) > 5){
					$file_list[$filecounter] = $fileinfo->getFilename()."_imgfolder";
					$filecounter++;
				} else {
					unset($jpg_folder[$fileinfo->getFilename()]);
					$title_list[$titlecounter] = $fileinfo->getFilename();
					$titlecounter++;
				}
			}
			unset($subdir_list);
		}
		
		
		
		
    }
    if ($fileinfo->isFile()) {
		if(strpos($fileinfo, ".json") !== false){
		} else {
			if(strpos(strtolower($fileinfo), ".zip") !== false || strpos(strtolower($fileinfo), ".cbz") !== false) {
				$file_list[$filecounter] = $fileinfo->getFilename();
				$filecounter++;
			} elseif(strpos(strtolower($fileinfo), ".jpg") !== false || strpos(strtolower($fileinfo), ".jpeg") !== false || strpos(strtolower($fileinfo), ".png") !== false) {
				$jpg_list[$jpgcounter] = $fileinfo->getFilename();
				$jpgcounter++;
			}
		}
    }
}

sort($jpg_list, SORT_NATURAL);
sort($dir_list, SORT_NATURAL);
sort($title_list, SORT_NATURAL);
$file_list = n_sort($file_list);

$maxlist = count($file_list) + count($title_list) + count($dir_list);
$startview = 0;
if(!$_GET['page']){
	$paging = 0; //현재 보여주는 페이지
}  else {
    $paging = (int)$_GET['page'];
}

$startview = $paging*$maxview;
$endview = $startview+$maxview;
if($endview >= $maxlist){
	$endview = $maxlist;
}
$updir = "";
?>
	<div>
	<br>
	<table class="table table-borderless m-0 p-0" width="100%">
	<tr>
	<td class="m-0 p-0 align-middle" align="left">
		<div style="font-family: 'Gugi'; font-size:2.5em;" onclick="location.replace('index.php')">마이코믹스</div>
	</td>
	<td class="m-0 p-0 align-middle" align="right">	
<?php
$bookmark_arr = array();
$bookmark_title = array();
$bookmark_mark = array();

if(is_file($bookmark_file) === true){
	$bookmark_arr = json_decode(file_get_contents($bookmark_file), true);
	$bookmark_title = array_keys($bookmark_arr);
	$bookmark_mark = array_values($bookmark_arr);
	if(count($bookmark_arr)>0){
?>
	<div class="dropdown">
	<button class="dropdown-toggle btn btn-sm m-0 p-0" role="button" data-toggle="dropdown"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-bookmark-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4zm6.854 5.854a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
	</svg></button>
		<div class="dropdown-menu dropdown-menu-right" >
<?php
for($count=0;$count < count($bookmark_arr); $count++){
	$title_temp = explode("/", $bookmark_title[$count]);
?>
	<div  class="dropdown-item m-0 p-1">
	<button class="btn btn-sm m-0 p-0" onclick="location.replace('bookmark.php?mode=delete&file=<?php echo encode_url($bookmark_title[$count]); ?>');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square ml-2 mr-1 p-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg></button>
<?php
	if(!is_array($bookmark_mark[$count])){
?>
	<button class="user-dropdown btn btn-sm m-0 p-0 d-inline-block text-truncate text-nowrap" style="max-width:290px;" onclick="location.href='./viewer.php?file=<?php echo encode_url($bookmark_title[$count]); ?>#<?php echo $bookmark_mark[$count]; ?>'"><?php echo cut_title($title_temp[count($title_temp) - 1]); ?></button>
<?php
	} else {
?>
	<button class="user-dropdown btn btn-sm m-0 p-0 d-inline-block text-truncate text-nowrap" style="max-width:290px;" onclick="location.href='./viewer.php?mode=<?php echo $bookmark_mark[$count]['viewer']; ?>&page_order=<?php echo $bookmark_mark[$count]['page_order']; ?>&file=<?php echo encode_url($bookmark_title[$count]); ?>#<?php echo $bookmark_mark[$count]['bookmark']; ?>'"><?php echo cut_title($title_temp[count($title_temp) - 1]); ?></button>
<?php
	}
?>
	</div>
<?php
}
?>
		</div>
	</div>
<?php
	}
}
?>
	</td>
	<tr>
	<td colspan="2" class="m-0 p-0" align="left">
	<span class="badge badge-light badge-sm" style="font-family: 'Nanum Gothic', sans-serif;">
	[ <?php echo $_SESSION["user_id"];?> ]로 로그인되었습니다.</span>
	<?php if($_SESSION["user_group"] == "admin") { echo "<a class=\"badge badge-danger badge-sm\" href=admin.php>관리자페이지</a>"; }?> <a class="badge badge-danger badge-sm" href="login.php?mode=logout">로그아웃</a>
	</a>
	<h6 style="font-family: 'Nanum Gothic', sans-serif;"><br><br>[<?php echo $getdir;?>]</h6>
	</td>
	</tr>
	</table>
	<br>
	</div>
<div class="grid">
<div class="row row-cols-1 row-cols-md-2">

	<?php
	if($is_root == true) {
	} else {
		$nowdirarr = explode("/", $getdir);
		$temp = count($nowdirarr);
			for($i = 1;$i<$temp-1;$i++) {
				$updir = $updir."/".$nowdirarr[$i];
			}
	?>	

			<a href='index.php?dir=<?php echo encode_url($updir);?>'>
			<div class="card bg-primary m-1 p-0">
						<div class="card-body text-white m-1 p-1">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-90deg-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
					</svg> 상위폴더로
						</div>
						</div>
						</a>
	<?php
	}
	$dir_start = $startview;
	if(count($dir_list) > 0){
		for($i=$dir_start;$i<$endview;$i++) {
			$startview = $i;
			$fileinfo = $dir_list[$i];
			$dirs = str_replace($base_dir."/", "", $dir);
			if($i >= count($dir_list)){
				break;
			}

	?>	
			 
	<a href='index.php?dir=<?php echo encode_url($getdir."/".$fileinfo);?>'>
    <div class="card border-secondary m-1 p-0">
				<div class="card-body text-secondary m-1 p-1">
				
<?php
if($dirinfo[$fileinfo] == "remote"){
?>	
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hdd-network-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5.5v3A1.5 1.5 0 0 0 6 11.5H.5a.5.5 0 0 0 0 1H6A1.5 1.5 0 0 0 7.5 14h1a1.5 1.5 0 0 0 1.5-1.5h5.5a.5.5 0 0 0 0-1H10A1.5 1.5 0 0 0 8.5 10V7H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
					</svg> <?php echo str_replace("rclone_", "", $fileinfo); ?>
<?php
} else {
?>	
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
					</svg> <?php echo $fileinfo;?>
<?php
}
?>
				</div>
			</div>
				</a>
	<?php
		}
	}

	$title_start = $startview;
	if(count($title_list) > 0){
		for($i=$title_start;$i<$endview;$i++) {
			$startview = $i;
			$fileinfo = $title_list[$i-count($dir_list)];
			$dirs = str_replace($base_dir."/", "", $dir);
			if($i >= (count($title_list)+count($dir_list))){
				break;
			}
	?>	
	<a href='index.php?dir=<?php echo encode_url($getdir."/".$fileinfo); ?>'>			 
    <div class="card text-white bg-secondary m-1 p-0">
				<div class="card-body m-1 p-1">
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 2.828v9.923c.918-.35 2.107-.692 3.287-.81 1.094-.111 2.278-.039 3.213.492V2.687c-.654-.689-1.782-.886-3.112-.752-1.234.124-2.503.523-3.388.893zm7.5-.141v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg> <?php echo $fileinfo;?>
				</div>
			</div>
				</a>
	<?php
		}
	}

	?>	
	</div>
	</div>
	<br><br>


<div class="grid">
<div class="row row-cols-2 row-cols-md-4">
	<?php
	if(count($file_list) > 0 && $endview > $startview){
		for($i=$startview;$i<$endview;$i++) {
			if($i>$endview) {
				break;
			}
			
					$fileinfo = $file_list[$i-count($dir_list)-count($title_list)];
					$zip_file = $dir."/".$fileinfo;
	if(is_dir(str_replace("_imgfolder","", $zip_file)) == true){
		$zip_file = str_replace("_imgfolder","", $zip_file);
		$configfile = $zip_file."/image_files.json";
					if(is_File($configfile) === false){
						$jpg_cover = file_get_contents($zip_file."/".$jpg_folder[$fileinfo][0]);
						$size = getimagesizefromstring($jpg_cover);
						if($size[0] > $size[1]) {
							$x_point = ($size[0]/2) - $size[1];
							$originimage = imagecreatefromstring($jpg_cover);
								if($x_point > 0){
									$cropimage = imagecrop($originimage, ['x' => $x_point, 'y' => 0, 'width' => $size[1], 'height' => $size[1]]);
								} else {
									$cropimage = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $size[1], 'height' => $size[1]]);
								}
							$originimage = $cropimage;
							$cropimage = imagecreatetruecolor(400, 400);
							imagecopyresampled($cropimage, $originimage, 0, 0, 0, 0, 400, 400, $size[1], $size[1]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage, null, 75 );
							imagedestroy($cropimage);
							$cropimage = ob_get_contents();
							ob_end_clean();

						} else {
							$originimage = imagecreatefromstring($jpg_cover);
							$y_point = ($size[1] - $size[0])/2;
							$cropimage = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $size[0], 'height' => $size[0]]);
							$originimage = $cropimage;
							$cropimage = imagecreatetruecolor(400, 400);
							imagecopyresampled($cropimage, $originimage, 0, 0, 0, 0, 400, 400, $size[0], $size[0]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage, null, 75 );
							imagedestroy($cropimage);
							$cropimage = ob_get_contents();
							ob_end_clean();
						}
						$cache_data = array();
						$cache_data['totalpage'] = $jpgcounter;
						$cache_data['page_order'] = "0";
						$cache_data['viewer'] = "toon";
						$cache_data['thumbnail'] = base64_encode($cropimage);
						$cache_output = json_encode($cache_data, JSON_UNESCAPED_UNICODE);
						file_put_contents($configfile, $cache_output);
					}
					$json_data = json_decode(file_get_contents($configfile), true);
					$img_output = $json_data['thumbnail'];
					$totalpage = $json_data['totalpage'];
					$pageorder = $json_data['page_order'];
					if((int)$json_data['page_order'] == 0) {
						$pageorder = "[ - ]";
					} elseif((int)$json_data['page_order'] == 1) {
						$pageorder = "[1|2]";
					} elseif((int)$json_data['page_order'] == 2) {
						$pageorder = "[2|1]";
					}
					if($json_data['viewer'] !== null){
						$viewer = $json_data['viewer'];
					} else {
						$json_data['viewer'] = "toon";
						$json_output = json_encode($json_data, JSON_UNESCAPED_UNICODE);
						file_put_contents($configfile, $json_output);
						$viewer = $json_data['viewer'];
					}
						
						
						
						
		?>
				<a href='viewer.php?filetype=images&mode=<?php echo $viewer; ?>&file=<?php echo encode_url($getdir."/".str_replace("_imgfolder","", $fileinfo));?>'>
				  <div class="col mb-3">
					<div class="card text-black m-0 p-1">
						<img src="data:<?php echo mime_type("jpg").";base64,".$img_output; ?>" class="rounded card-img-top card-img" alt="thumbnail">
									<div class="card-img-overlay m-1 p-0">
									<span class="badge badge-pill badge-success"><?php echo $totalpage; ?>p</span>
									<span class="badge badge-pill badge-success"><?php echo $pageorder; ?></span>
									<span class="badge badge-pill badge-success"><?php echo $viewer; ?></span>
									</div>
						<div class="card-body m-0 p-0 text-center text-nowrap" style="text-overflow: ellipsis; overflow: hidden;">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12 16a2 2 0 0 0 2-2V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8zM3 2a1 1 0 0 1 1-1h5.5v2A1.5 1.5 0 0 0 11 4.5h2V10l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12V2z"/>
  <path fill-rule="evenodd" d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
</svg> <?php echo str_replace("_imgfolder","", $fileinfo);
$fileinfo; ?>
						</div>
					</div>
				  </div>
				</a>
						<?php
	} elseif(is_File($zip_file) == true){
						if(strpos(strtolower($zip_file), ".zip") !== false){
							$configfile = substr($zip_file, 0, strpos(strtolower($zip_file), ".zip")).".json";
						} elseif(strpos(strtolower($zip_file), ".cbz") !== false){
							$configfile = substr($zip_file, 0, strpos(strtolower($zip_file), ".cbz")).".json";
						}
	if($is_remote == "y") {
		if(is_File($configfile) === false){
			$img_output = $null_image;
			$totalpage = "nodata-";
			$pageorder = "[ - ]";
			$viewer = "toon";
		} else {
			$json_data = json_decode(file_get_contents($configfile), true);
			$img_output = $json_data['thumbnail'];
			$totalpage = $json_data['totalpage'];
			$pageorder = $json_data['page_order'];
				if((int)$json_data['page_order'] == 0) {
					$pageorder = "[ - ]";
				} elseif((int)$json_data['page_order'] == 1) {
					$pageorder = "[1|2]";
				} elseif((int)$json_data['page_order'] == 2) {
					$pageorder = "[2|1]";
				}
			if($json_data['viewer'] !== null){
				$viewer = $json_data['viewer'];
			} else {
				$json_data['viewer'] = "toon";
				$json_output = json_encode($json_data, JSON_UNESCAPED_UNICODE);
				file_put_contents($configfile, $json_output);
				$viewer = $json_data['viewer'];
			}		
		}
	} else {
			if(is_File($configfile) === false){
					$zip = new ZipArchive;
					if ($zip->open($zip_file) == TRUE) {
						$thumbnail_index = 0;
						for ($findthumb = 0; $findthumb < $zip->numFiles; $findthumb++) {
							$find_img = $zip->getNameIndex($findthumb);
							if(!strpos(strtolower($find_img), ".jpg") && !strpos(strtolower($find_img), ".jpeg") && !strpos(strtolower($find_img), ".png")){
								continue;
							} elseif (strpos(strtolower($find_img), ".jpg") !== false || strpos(strtolower($find_img), ".jpeg") !== false || strpos(strtolower($find_img), ".png") !== false) {
								$thumbnail_index = $findthumb;
								break;
							}
						}						
						
						$size = getimagesizefromstring($zip->getFromIndex($thumbnail_index));
						if($size[0] > $size[1]) {
							$x_point = ($size[0]/2) - $size[1];
							$originimage = imagecreatefromstring($zip->getFromIndex($thumbnail_index));
								if($x_point > 0){
									$cropimage = imagecrop($originimage, ['x' => $x_point, 'y' => 0, 'width' => $size[1], 'height' => $size[1]]);
								} else {
									$cropimage = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $size[1], 'height' => $size[1]]);
								}
							$originimage = $cropimage;
							$cropimage = imagecreatetruecolor(400, 400);
							imagecopyresampled($cropimage, $originimage, 0, 0, 0, 0, 400, 400, $size[1], $size[1]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage, null, 75 );
							imagedestroy($cropimage);
							$cropimage = ob_get_contents();
							ob_end_clean();

						} else {
							$originimage = imagecreatefromstring($zip->getFromIndex($thumbnail_index));
							$y_point = ($size[1] - $size[0])/2;
							$cropimage = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $size[0], 'height' => $size[0]]);
							$originimage = $cropimage;
							$cropimage = imagecreatetruecolor(400, 400);
							imagecopyresampled($cropimage, $originimage, 0, 0, 0, 0, 400, 400, $size[0], $size[0]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage, null, 75 );
							imagedestroy($cropimage);
							$cropimage = ob_get_contents();
							ob_end_clean();
						}
					}
					$cache_data = array();
					$cache_data['totalpage'] = $zip->numFiles;
					$cache_data['page_order'] = "0";
					$cache_data['viewer'] = "toon";
					$cache_data['thumbnail'] = base64_encode($cropimage);
					$zip->close();
					$cache_output = json_encode($cache_data, JSON_UNESCAPED_UNICODE);
					file_put_contents($configfile, $cache_output);
			}
			$json_data = json_decode(file_get_contents($configfile), true);
			$img_output = $json_data['thumbnail'];
			$totalpage = $json_data['totalpage'];
			$pageorder = $json_data['page_order'];
				if((int)$json_data['page_order'] == 0) {
					$pageorder = "[ - ]";
				} elseif((int)$json_data['page_order'] == 1) {
					$pageorder = "[1|2]";
				} elseif((int)$json_data['page_order'] == 2) {
					$pageorder = "[2|1]";
				}
			if($json_data['viewer'] !== null){
				$viewer = $json_data['viewer'];
			} else {
				$json_data['viewer'] = "toon";
				$json_output = json_encode($json_data, JSON_UNESCAPED_UNICODE);
				file_put_contents($configfile, $json_output);
				$viewer = $json_data['viewer'];
			}
	}

			if(strpos($nowdirarr[count($nowdirarr)-1],"] ") !== false){
				$dir_s = preg_replace("/\[[^]]*\]/","",$nowdirarr[count($nowdirarr)-1]);
				$t = str_replace($dir_s,"", $nowdirarr[count($nowdirarr)-1]);
				$dir_s = str_replace($t." ","", $nowdirarr[count($nowdirarr)-1]);
			} else {
				$dir_s = preg_replace("/\[[^]]*\]/","",$nowdirarr[count($nowdirarr)-1]);
			}
			$title_s = cut_title($fileinfo);
		?>
				<a href='viewer.php?mode=<?php echo $viewer; ?>&file=<?php echo encode_url($getdir."/".$fileinfo);?>'>
				  <div class="col mb-3">
					<div class="card text-black m-0 p-1">
						<img src="data:<?php echo mime_type("jpg").";base64,".$img_output; ?>" class="rounded card-img-top card-img" alt="thumbnail">
									<div class="card-img-overlay m-1 p-0">
									<span class="badge badge-pill badge-success"><?php echo $totalpage; ?>p</span>
									<span class="badge badge-pill badge-success"><?php echo $pageorder; ?></span>
									<span class="badge badge-pill badge-success"><?php echo $viewer; ?></span>
									</div>
						<div class="card-body m-0 p-0 text-center text-nowrap" style="text-overflow: ellipsis; overflow: hidden;">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-zip-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM5.5 3V2h-1V1H6v1h1v1H6v1h1v1H6v1h1v1H5.5V6h-1V5h1V4h-1V3h1zm0 4.5a1 1 0 0 0-1 1v.938l-.4 1.599a1 1 0 0 0 .416 1.074l.93.62a1 1 0 0 0 1.109 0l.93-.62a1 1 0 0 0 .415-1.074l-.4-1.599V8.5a1 1 0 0 0-1-1h-1zm0 1.938V8.5h1v.938a1 1 0 0 0 .03.243l.4 1.598-.93.62-.93-.62.4-1.598a1 1 0 0 0 .03-.243z"/>
				</svg> <?php echo $title_s;?>
						</div>
					</div>
				  </div>
				</a>
						<?php
		}
		}
	} else {
	}
	if($maxlist == 0 && $jpgcounter > 0){
					$configfile = $dir."/image_files.json";
					if(is_File($configfile) === false){
						$jpg_cover = file_get_contents($dir."/".$jpg_list[0]);
						$size = getimagesizefromstring($jpg_cover);
						if($size[0] > $size[1]) {
							$x_point = ($size[0]/2) - $size[1];
							$originimage = imagecreatefromstring($jpg_cover);
								if($x_point > 0){
									$cropimage = imagecrop($originimage, ['x' => $x_point, 'y' => 0, 'width' => $size[1], 'height' => $size[1]]);
								} else {
									$cropimage = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $size[1], 'height' => $size[1]]);
								}
							$originimage = $cropimage;
							$cropimage = imagecreatetruecolor(400, 400);
							imagecopyresampled($cropimage, $originimage, 0, 0, 0, 0, 400, 400, $size[1], $size[1]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage, null, 75 );
							imagedestroy($cropimage);
							$cropimage = ob_get_contents();
							ob_end_clean();

						} else {
							$originimage = imagecreatefromstring($jpg_cover);
							$y_point = ($size[1] - $size[0])/2;
							$cropimage = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $size[0], 'height' => $size[0]]);
							$originimage = $cropimage;
							$cropimage = imagecreatetruecolor(400, 400);
							imagecopyresampled($cropimage, $originimage, 0, 0, 0, 0, 400, 400, $size[0], $size[0]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage, null, 75 );
							imagedestroy($cropimage);
							$cropimage = ob_get_contents();
							ob_end_clean();
						}
						$cache_data = array();
						$cache_data['totalpage'] = $jpgcounter;
						$cache_data['page_order'] = "0";
						$cache_data['viewer'] = "toon";
						$cache_data['thumbnail'] = base64_encode($cropimage);
						$cache_output = json_encode($cache_data, JSON_UNESCAPED_UNICODE);
						file_put_contents($configfile, $cache_output);
					}
					$json_data = json_decode(file_get_contents($configfile), true);
					$img_output = $json_data['thumbnail'];
					$totalpage = $json_data['totalpage'];
					$pageorder = $json_data['page_order'];
					if((int)$json_data['page_order'] == 0) {
						$pageorder = "[ - ]";
					} elseif((int)$json_data['page_order'] == 1) {
						$pageorder = "[1|2]";
					} elseif((int)$json_data['page_order'] == 2) {
						$pageorder = "[2|1]";
					}
					if($json_data['viewer'] !== null){
						$viewer = $json_data['viewer'];
					} else {
						$json_data['viewer'] = "toon";
						$json_output = json_encode($json_data, JSON_UNESCAPED_UNICODE);
						file_put_contents($configfile, $json_output);
						$viewer = $json_data['viewer'];
					}
						
						
						
						
		?>
				<a href='viewer.php?filetype=images&mode=<?php echo $viewer; ?>&file=<?php echo encode_url($getdir);?>'>
				  <div class="col mb-3">
					<div class="card text-black m-0 p-1">
						<img src="data:<?php echo mime_type("jpg").";base64,".$img_output; ?>" class="rounded card-img-top card-img" alt="thumbnail">
									<div class="card-img-overlay m-1 p-0">
									<span class="badge badge-pill badge-success"><?php echo $totalpage; ?>p</span>
									<span class="badge badge-pill badge-success"><?php echo $pageorder; ?></span>
									<span class="badge badge-pill badge-success"><?php echo $viewer; ?></span>
									</div>
						<div class="card-body m-0 p-0 text-center text-nowrap" style="text-overflow: ellipsis; overflow: hidden;">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12 16a2 2 0 0 0 2-2V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8zM3 2a1 1 0 0 1 1-1h5.5v2A1.5 1.5 0 0 0 11 4.5h2V10l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12V2z"/>
  <path fill-rule="evenodd" d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
</svg> 이미지파일보기
						</div>
					</div>
				  </div>
				</a>
						<?php



				}
		?>
	</div>
</div>
<br>
<nav class="navbar  navbar-light bg-white m-0 p-2 " aria-label="Page navigation">
<table width="100%">
<tr><td align="center">

<button class="btn btn-sm btn-light p-1">
	<?php
		if($server_version['index'] > $version['index']) {
			echo "<a href='update.php' class='m-1 badge badge-sm badge-danger'>새버전(".$server_version['index'].")이 있습니다. 업데이트합니다.</a><br>";
		}
		echo "<span class=badge>현재버전 {".$version['index']."}</span>";
		?>
</button>
</td></tr><tr>
<td width="100%" class="p-2" align="center">
  <div class="pagination pagination-sm justify-content-center pagination-outline-primary">
    <div class="page-item <?php if($dir == $base_dir) { echo "disabled"; } ?>">
      <button class="page-link" onclick="location.replace('index.php?dir=<?php echo encode_url($updir);?>')" tabindex="-1" aria-disabled="true">상위폴더로</button>
    </div>
    <div class="page-item <?php if($paging == 0) { echo "disabled"; } ?>">
	</div>
    <div class="page-item <?php if($paging == 0) { echo "disabled"; } ?>">
      <button class="page-link" onclick="location.replace('./index.php?dir=<?php echo encode_url($getdir); ?>&page=<?php echo (int)$_GET['page']-1; ?>')" tabindex="-1" aria-disabled="true">Previous</button>
    </div>
				<div class="nav-bar dropdown dropup">
					<button class="page-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown">
					<?php echo (int)$_GET['page']+1; ?>/<?php 
						echo ceil($maxlist/$maxview);					
					?>
					</button>

					<div class="dropdown-menu-right dropdown-menu m-0 p-0">
<?php	
					$pagingcount = 0;
				while($pagingcount<($maxlist/$maxview)){
			?>
					<button onclick="location.replace('./index.php?dir=<?php echo encode_url($getdir); ?>&page=<?php echo $pagingcount; ?>')" class="btn btn-sm dropdown-item m-0 p-1">[<?php echo $pagingcount+1; ?>페이지]</button>
			<?php
				$pagingcount++;
				}

	?>
					</div>
				</div>
	    <div class="page-item <?php if(($maxview*($paging+1))>=$maxlist) { echo "disabled"; } ?>">
      <button class="page-link" onclick="location.replace('./index.php?dir=<?php echo encode_url($getdir); ?>&page=<?php echo (int)$_GET['page']+1; ?>')">Next</button>
    </div>
	</div>
</td></tr>
</table>
</nav>
</body>
</html>