<?php
include("config.php");
if($_GET['file']){
	$getfile = str_replace("{plus}", "+", urldecode($_GET['file']));
	$base_file = $base_dir.$getfile;
} else {
	echo "정보가 없습니다.";
	die(header("Location: ./"));
}

$base_title = explode("/", $base_file);
$title = $base_title[(count($base_title)-1)];
$base_folder = str_replace($title, "", $base_file);
$link_dir = str_replace("/".$title, "", $getfile);

if(strpos($base_file, "zip") !== false || strpos($base_file, "cbz") !== false) {
	$type = "zip";
} else {
	  die("이 파일은 처리하지 않습니다.");
}

$page = ceil(($now+1)/$maxview)-1;  //현재페이지

						if(strpos($base_file, ".zip")){
							$json_file = str_replace(".zip", "", $base_file).".json";
						} elseif(strpos($base_file, ".cbz")){
							$json_file = str_replace(".cbz", "", $base_file).".json";
						}

						$pageorder = json_decode(file_get_contents($json_file), true);
						if($_GET['pageorder'] !== null){
							$newpageorder = $_GET['pageorder'];
							$pageorder['page_order'] = (string)$newpageorder;
							$cache_output = json_encode($pageorder, JSON_UNESCAPED_UNICODE);
							file_put_contents($json_file, $cache_output);
						}

?>
<!DOCTYPE html>
<html lang="ko">
   <head>
      <title>myComix - <?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Gugi&family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
	<style type="text/css">
		body {
			font-family: 'Nanum Gothic', sans-serif;
			font-size: smaller;
		}
		a:link {text-decoration: none;}
		a:visited {text-decoration: none;}
		a:active {text-decoration: none;}
		a:hover {text-decoration: none;}
	</style>
   </head>
<script type="text/javascript">
$(document).ready(function(){
    if ($('.navbar').length > 0) {
         var last_scroll_top = 0;
        $(window).on('scroll', function() {
            scroll_top = $(this).scrollTop();
            if(scroll_top < last_scroll_top) {
                $('.navbar').fadeIn();
            }
            else {
                $('.navbar').fadeOut();
            }
            last_scroll_top = scroll_top;
        });
    }
});
function hidenav() {
	$('.navbar').fadeToggle();
}; 
</script>
   <body>
   <div>

<nav class="navbar navbar-light fixed-top bg-white p-1 m-0">
<span class="text-nowrap">
<a OnClick="location.href='./index.php?dir=<?php echo urlencode(str_replace("+", "{plus}", $link_dir)); ?>&page=<?php echo $page; ?>'"><font style="font-family: 'Gugi'; font-size: 2em;">마이코믹스</font></a><br><?php echo $title; ?>			
</span>
</nav>
</div>
<?php
		$files = scandir($base_folder);
		sort($files,SORT_NATURAL);

		foreach ($files as $file) {
			if(strpos($file, "json") !== false){
			} elseif (strpos($file, "zip") !== false || strpos($file, "cbz") !== false || strpos($file, "rar") !== false || strpos($file, "cbr") !== false) {
				$totalfile[] = $file;
			}
		}

		$now = array_search ($title, $totalfile);

		$next = $now + 1;
		$pre = $now - 1;
?>

<div>
<nav class="navbar navbar-light fixed-bottom bg-white ">
<div class="btn-group justify-content-center" style="width:60%" style="font-family: 'Gugi';">
<?php
         if ($now == '0') {
			 ?>
<button type="button" class="btn btn-outline-light btn-sm mr-1">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-skip-backward-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V4a.5.5 0 0 0-.5-.5z"/>
  <path d="M.904 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.692-1.01-1.233-.696L.904 7.304a.802.802 0 0 0 0 1.393z"/>
  <path d="M8.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L8.404 7.304a.802.802 0 0 0 0 1.393z"/>
</svg> 이전</button>
			 <?php
         } else {
			 ?>
<button type="button" class="btn btn-outline-secondary btn-sm mr-1" OnClick="location.replace('./viewer.php?file=<?php echo urlencode(str_replace("+", "{plus}", $link_dir."/".$totalfile[$pre])); ?>')">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-skip-backward-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M.5 3.5A.5.5 0 0 0 0 4v8a.5.5 0 0 0 1 0V4a.5.5 0 0 0-.5-.5z"/>
  <path d="M.904 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.692-1.01-1.233-.696L.904 7.304a.802.802 0 0 0 0 1.393z"/>
  <path d="M8.404 8.697l6.363 3.692c.54.313 1.233-.066 1.233-.697V4.308c0-.63-.693-1.01-1.233-.696L8.404 7.304a.802.802 0 0 0 0 1.393z"/>
</svg> 이전</button>
			 <?php
         }
?>
<!-- 리스트로 돌아가기 시작 -->
<?php
?>
<button type="button" class="btn btn-outline-secondary btn-sm mr-1" OnClick="location.replace('./index.php?dir=<?php echo urlencode(str_replace("+", "{plus}", $link_dir)); ?>&page=<?php echo $page; ?>')">
<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg> 목록
</button>
<?php


?>
<!-- 리스트로 돌아가기 끝 -->
<?php
         if (count($totalfile) == $next) {
			 ?>
<button type="button" class="btn btn-outline-light btn-sm">
다음 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-skip-forward-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.596 8.697l-6.363 3.692C.693 12.702 0 12.322 0 11.692V4.308c0-.63.693-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
  <path d="M15.096 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.693-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
</svg></button>
			 <?php
         } else {
			 ?>
<button type="button" class="btn btn-outline-secondary btn-sm" OnClick="location.replace('./viewer.php?file=<?php echo urlencode(str_replace("+", "{plus}", $link_dir."/".$totalfile[$next])); ?>')"> 
다음 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-skip-forward-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15.5 3.5a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0V4a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.596 8.697l-6.363 3.692C.693 12.702 0 12.322 0 11.692V4.308c0-.63.693-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
  <path d="M15.096 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.693-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
</svg></button>
			 <?php
		 }
         ?>		 
		 </div>
<div class="btn-group btn-group-toggle" style="width:35%;" data-toggle="buttons">
  <label class="btn btn<?php
  if($pageorder['page_order'] == "0"){
  } else {
	  echo "-outline";
  }
  ?>-secondary btn-sm">
    <input type="radio" name="options" id="option1" OnClick="location.replace('./viewer.php?file=<?php echo urlencode(str_replace("+", "{plus}", $link_dir."/".$totalfile[$now])); ?>&pageorder=0')"> - 
  </label>
  <label class="btn btn<?php
  if($pageorder['page_order'] == "1"){
  } else {
	  echo "-outline";
  }
  ?>-secondary btn-sm">
    <input type="radio" name="options" id="option2" OnClick="location.replace('./viewer.php?file=<?php echo urlencode(str_replace("+", "{plus}", $link_dir."/".$totalfile[$now])); ?>&pageorder=1')">1|2
  </label>
  <label class="btn btn<?php
  if($pageorder['page_order'] == "2"){
  } else {
	  echo "-outline";
  }
  ?>-secondary btn-sm">
    <input type="radio" name="options" id="option3" OnClick="location.replace('./viewer.php?file=<?php echo urlencode(str_replace("+", "{plus}", $link_dir."/".$totalfile[$now])); ?>&pageorder=2')">2|1
  </label>
</nav>
</div>
<div class="container-fluid m-0 p-0" onclick="hidenav();">
            <p align='center'>
              <?php
			  $loaded = 0;
					if ($type == "zip") {
						$list = array();
						$zip = new ZipArchive;
						if ($zip->open($base_file) == TRUE) {
							for ($i = 0; $i < $zip->numFiles; $i++) {
								$list[$i] = $zip->getNameIndex($i);
							}
						}
						$total = count($list);
						sort($list,SORT_NATURAL);
						foreach($list as $imgfile){
						if($pageorder['page_order'] == "0" || $pageorder['page_order'] == null) {
							$filesize_mb = filesize($base_file)/1048576;
							if($filesize_mb > (int)$maxsize) {
								echo "<img class='lazyload img-fluid' alt='".$imgfile."' src='extract.php?file=".urlencode(str_replace("+", "{plus}", $_GET['file']))."&imgfile=".urlencode(str_replace("+", "{plus}", $imgfile))."' /><br>";
							} else {
								echo "<img class='lazyload img-fluid' alt='".$imgfile."' src='data:".mime_type($imgfile).";base64,".base64_encode($zip->getFromName($imgfile))."' /><br>";
							}
							$loaded++;
						} elseif($pageorder['page_order'] == "1") {
							$size = getimagesizefromstring($zip->getFromName($imgfile));
							$new_x = $size[0]/2;
							$originimage = imagecreatefromstring($zip->getFromName($imgfile));
							$cropimage_l = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
							$cropimage_r = imagecrop($originimage, ['x' => $new_x, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage_l, null);
							imagedestroy($cropimage_l);
							$cropimage_l = ob_get_contents();
							ob_end_clean();
							ob_start();
							imagejpeg($cropimage_r, null);
							imagedestroy($cropimage_r);
							$cropimage_r = ob_get_contents();
							ob_end_clean();
							echo "<img class='lazyload img-fluid' alt='".$imgfile."' src='data:".mime_type($imgfile).";base64,".base64_encode($cropimage_l)."' /><br>";
							echo "<img class='lazyload img-fluid' alt='".$imgfile."' src='data:".mime_type($imgfile).";base64,".base64_encode($cropimage_r)."' /><br>";
							$loaded++;
						} elseif($pageorder['page_order'] == "2") {
							$size = getimagesizefromstring($zip->getFromName($imgfile));
							$new_x = $size[0]/2;
							$originimage = imagecreatefromstring($zip->getFromName($imgfile));
							$cropimage_l = imagecrop($originimage, ['x' => 0, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
							$cropimage_r = imagecrop($originimage, ['x' => $new_x, 'y' => 0, 'width' => $new_x, 'height' => $size[1]]);
							imagedestroy($originimage);
							ob_start();
							imagejpeg($cropimage_l, null);
							imagedestroy($cropimage_l);
							$cropimage_l = ob_get_contents();
							ob_end_clean();
							ob_start();
							imagejpeg($cropimage_r, null);
							imagedestroy($cropimage_r);
							$cropimage_r = ob_get_contents();
							ob_end_clean();
							echo "<img class='lazyload img-fluid' alt='".$imgfile."' src='data:".mime_type($imgfile).";base64,".base64_encode($cropimage_r)."' /><br>";
							echo "<img class='lazyload img-fluid' alt='".$imgfile."' src='data:".mime_type($imgfile).";base64,".base64_encode($cropimage_l)."' /><br>";
							$loaded++;
						}
						}
						$zip->close();
						$countloaded++;
					}
					
					if($loaded < $total){
						echo "모든 파일 로딩에 실패했습니다.";
					}
               ?>
            </p>
</div>

</body>
</html>
