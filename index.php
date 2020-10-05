<?php
include("config.php");
include("function.php");
?>
<html>
<head>
	<title>myComix</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="data:data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMAAAADACAIAAADdvvtQAAAACXBIWXMAAAsTAAALEwEAmpwYAAAHOGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wOC0xOVQwMToxMDowMyswOTowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDktMDhUMTY6MTg6NTErMDk6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDktMDhUMTY6MTg6NTErMDk6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OWNmY2M3ZWMtOWJlMi1kODQ3LTg1MmYtYmNlZTc2N2RkZmYxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdlMzQ3YzMwLWI0YWUtNjY0ZS05MjA0LTcwODNmNzVhZWRmNSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjdlMzQ3YzMwLWI0YWUtNjY0ZS05MjA0LTcwODNmNzVhZWRmNSI+IDxwaG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDxyZGY6QmFnPiA8cmRmOmxpPnhtcC5kaWQ6N2UzNDdjMzAtYjRhZS02NjRlLTkyMDQtNzA4M2Y3NWFlZGY1PC9yZGY6bGk+IDwvcmRmOkJhZz4gPC9waG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6N2UzNDdjMzAtYjRhZS02NjRlLTkyMDQtNzA4M2Y3NWFlZGY1IiBzdEV2dDp3aGVuPSIyMDIwLTA4LTE5VDAxOjEwOjAzKzA5OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDphNDQ2OTM5YS00NGZkLTViNDEtOWQ3NC05MDg3N2E5OGY3ZjIiIHN0RXZ0OndoZW49IjIwMjAtMDktMDVUMTk6MDQ6MzQrMDk6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjljZmNjN2VjLTliZTItZDg0Ny04NTJmLWJjZWU3NjdkZGZmMSIgc3RFdnQ6d2hlbj0iMjAyMC0wOS0wOFQxNjoxODo1MSswOTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5XVQjsAAAID0lEQVR42u3dz2sdVRTA8fwTgmsFtxrNQiiBQvAHdFFFEFxUdCP1J4juajZ113ZhXFjRol0UdOHCLnzBgEKggqC4MEmpLhOti7pIVu9BfjwPjH0Mc+69c+femXkzd76Hu7HmTSYzn3fvub9mFqYEERELXAICQASACAARACIIABFtAnrowQeSKYW/LaU/rbMFQBQAAQhAAAIQgACk7kHHoxIgekxNXHMAEQACEIAABCAAAQhABIAABCAAAQhAAAIQASAAAQhAAAIQgABEAIgAEIAABCAAAQhAACIABCAAAQhAAAIQgAgAAQhAAAIQgAAEIAJAAAIQgAAEIAABiAAQgAAEIAABCEAAAhCACAABCEAAAhCAAAQgAkAAAhCAAAQgAAGIABCAAAQgAAEIQAAiAAQgAAGoJ4B45SWFd6YCCEAAAhCAAAQgShkguhVETACIABABIKKvgEgDSfPphQEIQAACEAVAFADFAaJbwYKTAa0HAhCAAAQgAkAAAhCAAAQgAAGIABABIAABCEAAAtDQ47lnn75+7fM7t2+Px2P9f3/79Ze1K5cBRMTGP3fvnn/1ZQARg2uUAUQAiAAQAaCk4uBg/4vPPn3tlXMvPX/2o8uX5D9rOeze7u7PP90KO5p89uLqBTkfOatvvv4KQHWG3BW5zWHFeDPkJuUvi9y2GDTyW86snC5c6qoOHn3k4fzH5ZgAmtb1tY5c2CuVjfsyBV8ZOXLhxhfK8tLizvaWzzek8MEY0wAq3qRIQPpm1ALo/Xfe8jyB0qoIQA2GXMoW9ks0pycrQgRAAAqvFKWlcyTXAGoVkHz73Ylzo4AkJ9N5j/yLtFMZkaw/pX+FnDaAOgHI3Rz4+IgBpBsvY+0invRvEVsAGjQgY5fQdj66HrJVQgAaCiB/E9lwpW7sjJkQgIYCaHlpsdLJ6PbO2KUH0CAA7Wxv6XFC90c21kd6hBpAAwWke++O9sv2u6RRA1CCgKR2KRSdrHi2R6Xnr/tiAOo9IJ3c6BnNgDMxstOfAlDvAdlK3pBG5rNyQw9s6noLQMkCyqfJYZmTBqSXagAoWUD5zwIIQJUBXVy9ACAAlQMyrgsrjNkACEAVuvF6JSFJNICi6hK68QCKAsRAIoCiADGVAaAoQEymAigK0JTlHACKBMSCMgBFAWJJ6yAAFRoanbfWu6hefh2L6vsESPJQ24aezJbcvFnbkW24qRGQY1vP7AeMW4vY1tMVQJ779+RG2r7xbCwcEKDCkzQiNxHXAmjK1uYehTGZmDugKQ9X6EsYO8NhLUW9gKamiVIe79LFyNJSn+JT/dQIaHp/J7weYKz0gCkA9SxqBFRwIMWWuQMIQE0FgAAEIAABCECeobt18z0fvVAEQJ2OwlByfuvFvKIw4L6xPgJQp0O+9FmnyWecprWGLLgfByCii9khgAgApRVNvBNj1hwHv6kjfUCSVAa/LsNWHNdabm3wYR3TKXpeL/6dGIU53eWlxZgUKtm5sPhnjetyZuW0Tx8toLS28tA4myt/V3A9lOzbepoAZLvTVVcg+bzepQlAes9QpQ1rAKqhGO90/GFtLGoEJHmPe5VLWOOYJqBKS4IqFeNV7j4guSDGZ/IF7LweShItX7j4rFkvr/YE5D6sXprYNCDPdeLyras6TEo3vlrK6QmoagvbKCDjUlqxYvx345YjAA0XkHGF+Kym0W/edHQ2ATQ4QHrSvpDr2HIj/04ZgJIFZNzQqJcS2Hpnngk1gNIEJFWLsXkyPizGthEqYMMTgBIBZEyQHSPOxhFqqZlKZznSBCSXTy50fNH5QS8A2TS4u+jG8fTSWQ52pjYykDhHQMHtUaVWL2VApbs/EwZky4htc22eebdjluPdN14HUCKA4vvkU/s0oq1TdmtzMzVAtq9R8oDiRwV9xh4LMZlM0lwPNFtxF1N0X6azgIxvnq86L1E6+2E82tlnnhpiN16QbayPJDlwZJc96sbXMjNaWp8Zc6kPVz8YHKDC0ipbPd9rQJELqI0ZFYD+D88HcTYESK+4te1U9AdUSFzil07rPp1tTMjVhPWinHriscPDwx4Byu539v3OllXYMpVKW5jlT5D/Kwd0bJw92N/XZ3vt6icOQ+JGTtW2p6Akie6Rob/2dnsEKDgXidnCPB6PbRdwe+v3sGOWdOP7Vb67+e3fe3tHR0cpAcqqFkk+hE7M/pvj42NJVhxFKqeAw5YMJCbmpjVAUm3k59R0myIgYibpHK1em3Hj+pclUxmJtVytAXL3iWqZrQveiFNjvai7aQvTYUS9gHwGvvNTkvH7yGzvEZt7ACgEkM8DoPMfrGu2zvMRswDqOiD5rLsSKkwC2BZOAGiggDITjjk1nfC6f95Yqr67DkAh01v13gx/QPNFH8AxrJROrvWjF7Zy6kljHRCzisMISD92Y16PInQDqvSCoibazXMvvtCnbvzVj9dK50druS6CcpYgu6cI5guozYtvrIPXrlzqE6DvRyOf2qJS6cK4HIBaKu+9/abPvKN/ca8b7z4gnydvNPqAm9mKjt6MRBsvcfY8jZanBf78485kMin9MZ+fCQaUzcO3UGzXaraig42FleP+4tHHsynJuQ89tB/5FR0ACgTUwhXrLKD8ig4AAahy5Fd0AMgaJycn/967t/njDwDKR2FFB4Aq1zGtXTE9h9+FoQeeztEbQDvbW7NKSPrtdT21HkBDAdSLiwMgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAANThi/MfeV3rYjpyzDMAAAAASUVORK5CYII=">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Gugi&family=Nanum+Gothic:wght@400;700&display=swap">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
		.dropdown-menu{
			max-height: 300px;
			overflow-y: auto;
		}
	</style>
	<script type="text/javascript">
		function bookmark_toggle() {
			$('.collapse').fadeToggle();
			document.getElementById("info").value = "";
		};
</script>
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

if(is_dir($dir) == true){
	$iterator = new DirectoryIterator($dir);
	$dircounter = 0;
	$titlecounter = 0;
	$filecounter = 0;
	$file_list = array();
	$jpgcounter = 0;
	$jpg_list = array();
	$jpg_folder = array();
	$jpg_count = array();
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
							} elseif(strpos(strtolower($subfileinfo->getFilename()),".jpg") !== false || strpos(strtolower($subfileinfo->getFilename()),".png") !== false || strpos(strtolower($subfileinfo->getFilename()),".gif") !== false || strpos(strtolower($subfileinfo->getFilename()),".jpeg") !== false) {
								$jpg_folder[$fileinfo->getFilename()][$jpg_c] = $subfileinfo->getFilename();
								$jpg_count[$fileinfo->getFilename()] = $jpg_c;
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
		if ($fileinfo->isFile() && $fileinfo->getFilename() != "[cover].jpg") {
			if(strpos($fileinfo, ".json") !== false){
			} else {
				if(strpos(strtolower($fileinfo->getFilename()), ".zip") !== false || strpos(strtolower($fileinfo->getFilename()), ".cbz") !== false || strpos(strtolower($fileinfo->getFilename()), ".pdf") !== false) {
					$file_list[$filecounter] = $fileinfo->getFilename();
					$filecounter++;
				} elseif(strpos(strtolower($fileinfo->getFilename()), ".jpg") !== false || strpos(strtolower($fileinfo->getFilename()), ".jpeg") !== false || strpos(strtolower($fileinfo), ".png") !== false || strpos(strtolower($fileinfo), ".gif") !== false) {
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
} else {
	echo "설정된 dir이 없거나 읽을 수 없습니다. 다시 설정하세요.<br>"; 
}
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
$autosave_arr = array();
$autosave_title = array();
$autosave_mark = array();

if(is_file($bookmark_file) === true){
	$bookmark_arr = json_decode(file_get_contents($bookmark_file), true);
	$bookmark_title = array_keys($bookmark_arr);
	$bookmark_mark = array_values($bookmark_arr);
}
if(is_file($autosave_file) === true){
	$autosave_arr = json_decode(file_get_contents($autosave_file), true);
	$autosave_title = array_keys($autosave_arr);
	$autosave_mark = array_values($autosave_arr);
}
	if(count($bookmark_arr) > 0 || count($autosave_arr) > 0){
?>
		<button class="dropdown-toggle btn btn-sm m-0 p-0" onclick="bookmark_toggle();">
		<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-bookmark-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" d="M4 0a2 2 0 0 0-2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4zm6.854 5.854a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
		</svg>
		</button>
<?php
	}
?>
</td></tr></table>

<div class="collapse" width="100%" align="right">
<table class="mb-2 mt-2">
<?php
if(count($autosave_arr)>0){
for($count=0;$count < count($autosave_arr); $count++){
	$title_temp = explode("/", $autosave_title[$count]);
?>
	<tr class="border-bottom border-success"><td align=right>
	<button class="btn btn-sm m-0 p-0">
	<svg width="1em" height="1em" viewBox="0 0 18 18" class="bi bi-exclamation-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg></button>	<button class="btn btn-sm m-0 p-0" onclick="location.replace('bookmark.php?mode=delete_autosave&file=<?php echo encode_url($autosave_title[$count]); ?>');">
	<svg width="1em" height="1em" viewBox="0 0 18 18" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg></button></td>
<td>
	<button class="btn btn-sm mr-1 p-0 d-inline-block text-truncate text-nowrap" style="max-width:280px;" onclick="location.href='./viewer.php?mode=<?php echo $autosave_mark[$count]['viewer']; ?>&page_order=<?php echo $autosave_mark[$count]['page_order']; ?>&file=<?php echo encode_url($autosave_title[$count]); ?>#<?php echo $autosave_mark[$count]['bookmark']; ?>'"><?php echo cut_title($title_temp[count($title_temp) - 1]); ?></button></td></tr>
<?php
	}
	}

if(count($bookmark_arr)>0){
for($count=0;$count < count($bookmark_arr); $count++){
	$title_temp = explode("/", $bookmark_title[$count]);
?>
	<tr class="border-bottom border-light"><td align=right>
	<button class="btn btn-sm m-0 p-0" onclick="location.replace('bookmark.php?mode=delete_bookmark&file=<?php echo encode_url($bookmark_title[$count]); ?>');">
	<svg width="1em" height="1em" viewBox="0 0 18 18" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
</svg></button></td><td>
<?php
	if(!is_array($bookmark_mark[$count])){
?>
	<button class="btn btn-sm mr-1 p-0 d-inline-block text-truncate text-nowrap" style="max-width:280px;" onclick="location.href='./viewer.php?file=<?php echo encode_url($bookmark_title[$count]); ?>#<?php echo $bookmark_mark[$count]; ?>'"><?php echo cut_title($title_temp[count($title_temp) - 1]); ?></button></td></tr>
<?php
	} else {
?>
	<button class="btn btn-sm mr-1 p-0 d-inline-block text-truncate text-nowrap" style="max-width:280px;" onclick="location.href='./viewer.php?mode=<?php echo $bookmark_mark[$count]['viewer']; ?>&page_order=<?php echo $bookmark_mark[$count]['page_order']; ?>&file=<?php echo encode_url($bookmark_title[$count]); ?>#<?php echo $bookmark_mark[$count]['bookmark']; ?>'"><?php echo cut_title($title_temp[count($title_temp) - 1]); ?></button></td></tr>
<?php
	}
	}
}
?>
</table>
</div>

<table class="table table-borderless m-0 p-0" width="100%">
	<tr>
	<td class="m-0 p-0" align="left">
	<span class="badge badge-light badge-sm" style="font-family: 'Nanum Gothic', sans-serif;">
	[ <?php echo $_SESSION["user_id"];?> ]로 로그인되었습니다.</span>
	<?php if($_SESSION["user_group"] == "admin") { echo "<a class=\"badge badge-danger badge-sm\" href=admin.php>관리자페이지</a>"; }?> <a class="badge badge-danger badge-sm" href="login.php?mode=logout">로그아웃</a><br><br>
	</a>
	</td>
	</tr>

<?php
if ($use_cover == "y"){
	if(is_file($dir."/[cover].jpg") == true) {
		echo "<tr><td class=\"m-0 p-0\"><img class=\"border border-white rounded-lg mt-2 mb-2 p-0\" src=\"data:".mime_type("jpg").";base64,".base64_encode(file_get_contents($dir."/[cover].jpg"))."\" style=\"max-height:300px;max-width:90vw;object-fit:contain;\"></td></tr>";
	} else {
		echo "<tr><td class=\"m-0 p-0\"><img class=\"border border-white rounded-lg mt-2 mb-2 p-0\" src=\"data:".mime_type("jpg").";base64,".$null_image."\" style=\"max-height:300px;max-width:90vw;object-fit:contain;\"></td></tr>";
	}
}
?>
<tr><td class="m-0 p-0">
	<h6 style="font-family: 'Nanum Gothic', sans-serif;">[<?php echo $getdir;?>]</h6>
</td></tr>
<?php
		$recent = array();
		if(is_file($recent_file) == true){
			$recent = json_decode(file_get_contents($recent_file), true);
			if($recent[$getdir] != null){
?>
<tr><td class="m-0 p-0">
	<button class="btn btn-warning btn-sm" style="font-family: 'Nanum Gothic', sans-serif;" onclick="location.href='./viewer.php?file=<?php echo encode_url($getdir."/".$recent[$getdir]); ?>'">[<?php echo $recent[$getdir];?>]까지 읽음</button>
</td></tr>
<?php
			} else {
			}
		} else {
		}
?>
</table>
	<br>
	</div>
<div class="grid">
	<?php
	if($is_root == true) {
	} else {
		$nowdirarr = explode("/", $getdir);
		$temp = count($nowdirarr);
			for($i = 1;$i<$temp-1;$i++) {
				$updir = $updir."/".$nowdirarr[$i];
			}
	?>
<div class="row row-cols-2 row-cols-md-4">
			<a href='index.php?dir=<?php echo encode_url($updir);?>&page=<?php echo $_GET['uppage']; ?>'>
			<div class="card bg-primary m-1 p-0">
						<div class="card-body text-white m-1 p-1 align-middle">
						<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-arrow-90deg-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
					</svg> 상위폴더로
						</div>
						</div>
						</a>
</div>
	<?php
	}
if($use_listcover == "y"){
?>	
<div class="row row-cols-2 row-cols-md-4">
<?php
} else {
?>	
<div class="row row-cols-1 row-cols-md-2">
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
			 
	<a href='index.php?uppage=<?php echo $_GET['page']; ?>&dir=<?php echo encode_url($getdir."/".$fileinfo);?>'>
    <div class="card border-secondary m-1 p-0">
				<div class="card-body text-secondary m-1 p-1 d-inline-block text-truncate text-nowrap">
				
<?php
if($dirinfo[$fileinfo] == "remote"){
?>	
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hdd-network-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h5.5v3A1.5 1.5 0 0 0 6 11.5H.5a.5.5 0 0 0 0 1H6A1.5 1.5 0 0 0 7.5 14h1a1.5 1.5 0 0 0 1.5-1.5h5.5a.5.5 0 0 0 0-1H10A1.5 1.5 0 0 0 8.5 10V7H14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2 0a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
					</svg> <?php echo str_replace("rclone_", "", $fileinfo); ?>
<?php
} else {
if($use_listcover == "y"){
	if(is_file($dir."/".$fileinfo."/[cover].jpg") == true){
		echo "<img class=\"rounded-lg mb-2\" src=\"data:".mime_type("jpg").";base64,".base64_encode(file_get_contents($dir."/".$fileinfo."/[cover].jpg"))."\" style=\"height:120px;max-width:100%;min-width:100%;object-fit:contain;\"><br>";
	} else {
		echo "<img class=\"rounded-lg mb-2\" src=\"data:".mime_type("jpg").";base64,".$null_image."\" style=\"height:120px;max-width:100%;min-width:100%;object-fit:fill;\"><br>";
	}
}
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
	<a href='index.php?uppage=<?php echo $_GET['page']; ?>&dir=<?php echo encode_url($getdir."/".$fileinfo); ?>'>			 
    <div class="card bg-secondary text-white text-left m-1 p-0">
				<div class="card-body m-1 p-1 d-inline-block text-truncate text-nowrap">
<?php

if($use_listcover == "y"){
	if(is_file($dir."/".$fileinfo."/[cover].jpg") == true){
		echo "<img class=\"rounded-lg mb-2\" src=\"data:".mime_type("jpg").";base64,".base64_encode(file_get_contents($dir."/".$fileinfo."/[cover].jpg"))."\" style=\"height:120px;max-width:100%;min-width:100%;object-fit:contain;\"><br>";
	} else {
		echo "<img class=\"rounded-lg mb-2\" src=\"data:".mime_type("jpg").";base64,".$null_image."\" style=\"height:120px;max-width:100%;min-width:100%;object-fit:fill;\"><br>";
	}
}
?>
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
	if(strpos($zip_file, "_imgfolder") == true){
		$zip_file = str_replace("_imgfolder","", $zip_file);
		$configfile = $zip_file."/image_files.json";
					if(is_File($configfile) === false){
						$jpg_cover = file_get_contents($zip_file."/".$jpg_folder[str_replace("_imgfolder","", $fileinfo)][0]);
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
						$cache_data['totalpage'] = $jpg_count[str_replace("_imgfolder","", $fileinfo)];
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
						
			if(is_file($dir."/[cover].jpg") == false && $i == $startview){
				file_put_contents($dir."/[cover].jpg", base64_decode($img_output));
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
</svg> <?php echo cut_title(str_replace("_imgfolder","", $fileinfo)); ?>
						</div>
					</div>
				  </div>
				</a>
						<?php
	} elseif(strpos(strtolower($zip_file), ".pdf") == true){
		?>
				<a href='viewer.php?filetype=pdf&file=<?php echo encode_url($getdir."/".$fileinfo);?>'>
				  <div class="col mb-3">
					<div class="card text-black m-0 p-1">
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve">
<g>
	<path style="fill:#E9E9E0;" d="M36.985,0H7.963C7.155,0,6.5,0.655,6.5,1.926V55c0,0.345,0.655,1,1.463,1h40.074
		c0.808,0,1.463-0.655,1.463-1V12.978c0-0.696-0.093-0.92-0.257-1.085L37.607,0.257C37.442,0.093,37.218,0,36.985,0z"/>
	<polygon style="fill:#D9D7CA;" points="37.5,0.151 37.5,12 49.349,12 	"/>
	<path style="fill:#CC4B4C;" d="M19.514,33.324L19.514,33.324c-0.348,0-0.682-0.113-0.967-0.326
		c-1.041-0.781-1.181-1.65-1.115-2.242c0.182-1.628,2.195-3.332,5.985-5.068c1.504-3.296,2.935-7.357,3.788-10.75
		c-0.998-2.172-1.968-4.99-1.261-6.643c0.248-0.579,0.557-1.023,1.134-1.215c0.228-0.076,0.804-0.172,1.016-0.172
		c0.504,0,0.947,0.649,1.261,1.049c0.295,0.376,0.964,1.173-0.373,6.802c1.348,2.784,3.258,5.62,5.088,7.562
		c1.311-0.237,2.439-0.358,3.358-0.358c1.566,0,2.515,0.365,2.902,1.117c0.32,0.622,0.189,1.349-0.39,2.16
		c-0.557,0.779-1.325,1.191-2.22,1.191c-1.216,0-2.632-0.768-4.211-2.285c-2.837,0.593-6.15,1.651-8.828,2.822
		c-0.836,1.774-1.637,3.203-2.383,4.251C21.273,32.654,20.389,33.324,19.514,33.324z M22.176,28.198
		c-2.137,1.201-3.008,2.188-3.071,2.744c-0.01,0.092-0.037,0.334,0.431,0.692C19.685,31.587,20.555,31.19,22.176,28.198z
		 M35.813,23.756c0.815,0.627,1.014,0.944,1.547,0.944c0.234,0,0.901-0.01,1.21-0.441c0.149-0.209,0.207-0.343,0.23-0.415
		c-0.123-0.065-0.286-0.197-1.175-0.197C37.12,23.648,36.485,23.67,35.813,23.756z M28.343,17.174
		c-0.715,2.474-1.659,5.145-2.674,7.564c2.09-0.811,4.362-1.519,6.496-2.02C30.815,21.15,29.466,19.192,28.343,17.174z
		 M27.736,8.712c-0.098,0.033-1.33,1.757,0.096,3.216C28.781,9.813,27.779,8.698,27.736,8.712z"/>
	<path style="fill:#CC4B4C;" d="M48.037,56H7.963C7.155,56,6.5,55.345,6.5,54.537V39h43v15.537C49.5,55.345,48.845,56,48.037,56z"/>
	<g>
		<path style="fill:#FFFFFF;" d="M17.385,53h-1.641V42.924h2.898c0.428,0,0.852,0.068,1.271,0.205
			c0.419,0.137,0.795,0.342,1.128,0.615c0.333,0.273,0.602,0.604,0.807,0.991s0.308,0.822,0.308,1.306
			c0,0.511-0.087,0.973-0.26,1.388c-0.173,0.415-0.415,0.764-0.725,1.046c-0.31,0.282-0.684,0.501-1.121,0.656
			s-0.921,0.232-1.449,0.232h-1.217V53z M17.385,44.168v3.992h1.504c0.2,0,0.398-0.034,0.595-0.103
			c0.196-0.068,0.376-0.18,0.54-0.335c0.164-0.155,0.296-0.371,0.396-0.649c0.1-0.278,0.15-0.622,0.15-1.032
			c0-0.164-0.023-0.354-0.068-0.567c-0.046-0.214-0.139-0.419-0.28-0.615c-0.142-0.196-0.34-0.36-0.595-0.492
			c-0.255-0.132-0.593-0.198-1.012-0.198H17.385z"/>
		<path style="fill:#FFFFFF;" d="M32.219,47.682c0,0.829-0.089,1.538-0.267,2.126s-0.403,1.08-0.677,1.477s-0.581,0.709-0.923,0.937
			s-0.672,0.398-0.991,0.513c-0.319,0.114-0.611,0.187-0.875,0.219C28.222,52.984,28.026,53,27.898,53h-3.814V42.924h3.035
			c0.848,0,1.593,0.135,2.235,0.403s1.176,0.627,1.6,1.073s0.74,0.955,0.95,1.524C32.114,46.494,32.219,47.08,32.219,47.682z
			 M27.352,51.797c1.112,0,1.914-0.355,2.406-1.066s0.738-1.741,0.738-3.09c0-0.419-0.05-0.834-0.15-1.244
			c-0.101-0.41-0.294-0.781-0.581-1.114s-0.677-0.602-1.169-0.807s-1.13-0.308-1.914-0.308h-0.957v7.629H27.352z"/>
		<path style="fill:#FFFFFF;" d="M36.266,44.168v3.172h4.211v1.121h-4.211V53h-1.668V42.924H40.9v1.244H36.266z"/>
	</g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
									<div class="card-img-overlay m-1 p-0">
									<span class="badge badge-pill badge-success">PDF FILE</span>
									</div>
						<div class="card-body m-0 p-0 text-center text-nowrap" style="text-overflow: ellipsis; overflow: hidden;">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M12 16a2 2 0 0 0 2-2V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8zM3 2a1 1 0 0 1 1-1h5.5v2A1.5 1.5 0 0 0 11 4.5h2V10l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12V2z"/>
  <path fill-rule="evenodd" d="M6.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
</svg> <?php echo cut_title($fileinfo); ?>
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
						$find_img = array();
						$zip_numfile = $zip->numFiles;
						for ($findthumb = 0; $findthumb < $zip_numfile; $findthumb++) {
							$find_img[$findthumb] = $zip->getNameIndex($findthumb);
						}
						$find_img = n_sort($find_img);
						for ($findthumb = 0; $findthumb < $zip_numfile; $findthumb++) {
							if(!strpos(strtolower($find_img[$findthumb]), ".jpg") && !strpos(strtolower($find_img[$findthumb]), ".jpeg") && !strpos(strtolower($find_img[$findthumb]), ".png") && !strpos(strtolower($find_img[$findthumb]), ".gif")){
								continue;
							} elseif (strpos(strtolower($find_img[$findthumb]), ".jpg") !== false || strpos(strtolower($find_img[$findthumb]), ".jpeg") !== false || strpos(strtolower($find_img[$findthumb]), ".png") !== false || strpos(strtolower($find_img[$findthumb]), ".gif") !== false) {
								$thumbnail_index = $findthumb;
								break;
							}
						}						

						$size = getimagesizefromstring($zip->getFromName($find_img[$thumbnail_index]));
						if($size[0] > $size[1]) {
							$x_point = ($size[0]/2) - $size[1];
							$originimage = imagecreatefromstring($zip->getFromName($find_img[$thumbnail_index]));
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
							$originimage = imagecreatefromstring($zip->getFromName($find_img[$thumbnail_index]));
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
			if(is_file($dir."/[cover].jpg") == false && $i == $startview){
				file_put_contents($dir."/[cover].jpg", base64_decode($img_output));
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
      <button class="page-link" onclick="location.replace('index.php?dir=<?php echo encode_url($updir);?>&page=<?php echo $_GET['uppage']; ?>')" tabindex="-1" aria-disabled="true">상위폴더로</button>
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