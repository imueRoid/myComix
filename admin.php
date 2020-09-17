<?php
include("config.php");
include("function.php");

if($user_group == "admin"){
	


if($_POST['mode'] == "mode_change"){
$iterator = new DirectoryIterator($base_dir);
	foreach ($iterator as $fileinfo) {
		$dir_list = array();
		if (!$fileinfo->isDot() && $fileinfo != "@eaDir" && $fileinfo->isDir()) {
			if((int)$_POST[$fileinfo->getFilename()."_group1"] == 1){
				$group1_value = 1;
			} else {
				$group1_value = 0;
			}
			if((int)$_POST[$fileinfo->getFilename()."_group2"] == 1){
				$group2_value = 1;
			} else {
				$group2_value = 0;
			}
			
			$mode_arr = json_decode(file_get_contents($getfile), true);
			
			$dir_write['admin'] = 1;
			$dir_write['group1'] = $group1_value;
			$dir_write['group2'] = $group2_value;
			$dir_file = $base_dir."/".$fileinfo->getFilename().".json";
			$json_output = json_encode($dir_write, JSON_UNESCAPED_UNICODE);
			file_put_contents($dir_file, $json_output);
		} else {
			continue;
		}
		unset($dir_list);
	}
} elseif($_POST['mode'] == "group_change"){
	$user_file = "user.php";
	$user_arr = array();
	$user_list = array();
	$user_arr = json_decode(file_get_contents($user_file), true);
	$user_count = 0;
	$user_id_arr = array_keys($user_arr);
	foreach($user_arr as $user_list_tmp){
		if($_POST[$user_id_arr[$user_count]."_group"] == "delete"){
			unset($user_arr[$user_id_arr[$user_count]]);
		} else {
			$user_arr[$user_id_arr[$user_count]]['group'] = $_POST[$user_id_arr[$user_count]."_group"];
		}
		$user_count++;
	}
	$json_output = json_encode($user_arr, JSON_UNESCAPED_UNICODE);
	file_put_contents($user_file, $json_output);
}	
	
	

?>
<html>
<head>
	<title>myComix</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="data:data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMAAAADACAIAAADdvvtQAAAACXBIWXMAAAsTAAALEwEAmpwYAAAHOGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wOC0xOVQwMToxMDowMyswOTowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDktMDhUMTY6MTg6NTErMDk6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDktMDhUMTY6MTg6NTErMDk6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OWNmY2M3ZWMtOWJlMi1kODQ3LTg1MmYtYmNlZTc2N2RkZmYxIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjdlMzQ3YzMwLWI0YWUtNjY0ZS05MjA0LTcwODNmNzVhZWRmNSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjdlMzQ3YzMwLWI0YWUtNjY0ZS05MjA0LTcwODNmNzVhZWRmNSI+IDxwaG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDxyZGY6QmFnPiA8cmRmOmxpPnhtcC5kaWQ6N2UzNDdjMzAtYjRhZS02NjRlLTkyMDQtNzA4M2Y3NWFlZGY1PC9yZGY6bGk+IDwvcmRmOkJhZz4gPC9waG90b3Nob3A6RG9jdW1lbnRBbmNlc3RvcnM+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6N2UzNDdjMzAtYjRhZS02NjRlLTkyMDQtNzA4M2Y3NWFlZGY1IiBzdEV2dDp3aGVuPSIyMDIwLTA4LTE5VDAxOjEwOjAzKzA5OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDphNDQ2OTM5YS00NGZkLTViNDEtOWQ3NC05MDg3N2E5OGY3ZjIiIHN0RXZ0OndoZW49IjIwMjAtMDktMDVUMTk6MDQ6MzQrMDk6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjljZmNjN2VjLTliZTItZDg0Ny04NTJmLWJjZWU3NjdkZGZmMSIgc3RFdnQ6d2hlbj0iMjAyMC0wOS0wOFQxNjoxODo1MSswOTowMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8L3JkZjpTZXE+IDwveG1wTU06SGlzdG9yeT4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5XVQjsAAAID0lEQVR42u3dz2sdVRTA8fwTgmsFtxrNQiiBQvAHdFFFEFxUdCP1J4juajZ113ZhXFjRol0UdOHCLnzBgEKggqC4MEmpLhOti7pIVu9BfjwPjH0Mc+69c+femXkzd76Hu7HmTSYzn3fvub9mFqYEERELXAICQASACAARACIIABFtAnrowQeSKYW/LaU/rbMFQBQAAQhAAAIQgACk7kHHoxIgekxNXHMAEQACEIAABCAAAQhABIAABCAAAQhAAAIQASAAAQhAAAIQgABEAIgAEIAABCAAAQhAACIABCAAAQhAAAIQgAgAAQhAAAIQgAAEIAJAAAIQgAAEIAABiAAQgAAEIAABCEAAAhCACAABCEAAAhCAAAQgAkAAAhCAAAQgAAGIABCAAAQgAAEIQAAiAAQgAAGoJ4B45SWFd6YCCEAAAhCAAAQgShkguhVETACIABABIKKvgEgDSfPphQEIQAACEAVAFADFAaJbwYKTAa0HAhCAAAQgAkAAAhCAAAQgAAGIABABIAABCEAAAtDQ47lnn75+7fM7t2+Px2P9f3/79Ze1K5cBRMTGP3fvnn/1ZQARg2uUAUQAiAAQAaCk4uBg/4vPPn3tlXMvPX/2o8uX5D9rOeze7u7PP90KO5p89uLqBTkfOatvvv4KQHWG3BW5zWHFeDPkJuUvi9y2GDTyW86snC5c6qoOHn3k4fzH5ZgAmtb1tY5c2CuVjfsyBV8ZOXLhxhfK8tLizvaWzzek8MEY0wAq3qRIQPpm1ALo/Xfe8jyB0qoIQA2GXMoW9ks0pycrQgRAAAqvFKWlcyTXAGoVkHz73Ylzo4AkJ9N5j/yLtFMZkaw/pX+FnDaAOgHI3Rz4+IgBpBsvY+0invRvEVsAGjQgY5fQdj66HrJVQgAaCiB/E9lwpW7sjJkQgIYCaHlpsdLJ6PbO2KUH0CAA7Wxv6XFC90c21kd6hBpAAwWke++O9sv2u6RRA1CCgKR2KRSdrHi2R6Xnr/tiAOo9IJ3c6BnNgDMxstOfAlDvAdlK3pBG5rNyQw9s6noLQMkCyqfJYZmTBqSXagAoWUD5zwIIQJUBXVy9ACAAlQMyrgsrjNkACEAVuvF6JSFJNICi6hK68QCKAsRAIoCiADGVAaAoQEymAigK0JTlHACKBMSCMgBFAWJJ6yAAFRoanbfWu6hefh2L6vsESPJQ24aezJbcvFnbkW24qRGQY1vP7AeMW4vY1tMVQJ779+RG2r7xbCwcEKDCkzQiNxHXAmjK1uYehTGZmDugKQ9X6EsYO8NhLUW9gKamiVIe79LFyNJSn+JT/dQIaHp/J7weYKz0gCkA9SxqBFRwIMWWuQMIQE0FgAAEIAABCECeobt18z0fvVAEQJ2OwlByfuvFvKIw4L6xPgJQp0O+9FmnyWecprWGLLgfByCii9khgAgApRVNvBNj1hwHv6kjfUCSVAa/LsNWHNdabm3wYR3TKXpeL/6dGIU53eWlxZgUKtm5sPhnjetyZuW0Tx8toLS28tA4myt/V3A9lOzbepoAZLvTVVcg+bzepQlAes9QpQ1rAKqhGO90/GFtLGoEJHmPe5VLWOOYJqBKS4IqFeNV7j4guSDGZ/IF7LweShItX7j4rFkvr/YE5D6sXprYNCDPdeLyras6TEo3vlrK6QmoagvbKCDjUlqxYvx345YjAA0XkHGF+Kym0W/edHQ2ATQ4QHrSvpDr2HIj/04ZgJIFZNzQqJcS2Hpnngk1gNIEJFWLsXkyPizGthEqYMMTgBIBZEyQHSPOxhFqqZlKZznSBCSXTy50fNH5QS8A2TS4u+jG8fTSWQ52pjYykDhHQMHtUaVWL2VApbs/EwZky4htc22eebdjluPdN14HUCKA4vvkU/s0oq1TdmtzMzVAtq9R8oDiRwV9xh4LMZlM0lwPNFtxF1N0X6azgIxvnq86L1E6+2E82tlnnhpiN16QbayPJDlwZJc96sbXMjNaWp8Zc6kPVz8YHKDC0ipbPd9rQJELqI0ZFYD+D88HcTYESK+4te1U9AdUSFzil07rPp1tTMjVhPWinHriscPDwx4Byu539v3OllXYMpVKW5jlT5D/Kwd0bJw92N/XZ3vt6icOQ+JGTtW2p6Akie6Rob/2dnsEKDgXidnCPB6PbRdwe+v3sGOWdOP7Vb67+e3fe3tHR0cpAcqqFkk+hE7M/pvj42NJVhxFKqeAw5YMJCbmpjVAUm3k59R0myIgYibpHK1em3Hj+pclUxmJtVytAXL3iWqZrQveiFNjvai7aQvTYUS9gHwGvvNTkvH7yGzvEZt7ACgEkM8DoPMfrGu2zvMRswDqOiD5rLsSKkwC2BZOAGiggDITjjk1nfC6f95Yqr67DkAh01v13gx/QPNFH8AxrJROrvWjF7Zy6kljHRCzisMISD92Y16PInQDqvSCoibazXMvvtCnbvzVj9dK50druS6CcpYgu6cI5guozYtvrIPXrlzqE6DvRyOf2qJS6cK4HIBaKu+9/abPvKN/ca8b7z4gnydvNPqAm9mKjt6MRBsvcfY8jZanBf78485kMin9MZ+fCQaUzcO3UGzXaraig42FleP+4tHHsynJuQ89tB/5FR0ACgTUwhXrLKD8ig4AAahy5Fd0AMgaJycn/967t/njDwDKR2FFB4Aq1zGtXTE9h9+FoQeeztEbQDvbW7NKSPrtdT21HkBDAdSLiwMgAAEIQAACEIAABCAAAQhAAAIQgAAEIAABCEAAAhCAANThi/MfeV3rYjpyzDMAAAAASUVORK5CYII=">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Gugi&family=Nanum+Gothic:wght@400;700&display=swap" rel="stylesheet">
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
<body class="text-center">
<br><div style="font-family: 'Gugi'; font-size:2.5em;" onclick="location.href='index.php'">마이코믹스</div><br>

<a href='login.php?mode=adduser'>
	<div class="card bg-primary m-2 p-0">
	<div class="card-body text-white m-1 p-1">
	<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
	</svg> 사용자 추가
	</div>
	</div>
</a>
<br>
<a href='#group'>
	<div class="card bg-primary m-2 p-0">
	<div class="card-body text-white m-1 p-1">
	<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
	</svg> 사용자그룹관리
	</div>
	</div>
</a>
<br>
<a href='#folder'>
	<div class="card bg-primary m-2 p-0">
	<div class="card-body text-white m-1 p-1">
	<svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
	</svg> 폴더권한관리
	</div>
	</div>
</a>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<div class="card m-2 p-0" id="group">
	<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="form-group card-header bg-primary text-white m-0 p-2">사용자 그룹 관리</div>
	<ul class="list-group list-group-flush">
<?php
$user_file = "user.php";
$user_arr = array();
$user_list = array();
$user_arr = json_decode(file_get_contents($user_file), true);
$user_count = 0;
$user_id_arr = array_keys($user_arr);
$user_group_arr = array_values($user_arr);
foreach($user_arr as $user_list_tmp){
$user_list[$user_count]['id'] = $user_id_arr[$user_count];
$user_list[$user_count]['group'] = $user_group_arr[$user_count]['group'];
$user_count++;
}

foreach ($user_list as $user){
?>
		<li class="list-group-item">
						<h6 class="mb-2 p-0"><div class="form-check form-check-inline">
						  <span class="badge badge-dark"><?php echo $user['id']; ?></span>
						</div></h6>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" id="<?php echo $user['id']; ?>_inlineCheckbox1" name="<?php echo $user['id']; ?>_group" value="admin" <?php if($user['group']== "admin"){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $user['id']; ?>_inlineCheckbox1">admin</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" id="<?php echo $user['id']; ?>_inlineCheckbox2" name="<?php echo $user['id']; ?>_group" value="group1" <?php if($user['group']== "group1"){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $user['id']; ?>_inlineCheckbox2">group1</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" id="<?php echo $user['id']; ?>_inlineCheckbox3" name="<?php echo $user['id']; ?>_group" value="group2" <?php if($user['group']=="group2"){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $user['id']; ?>_inlineCheckbox3">group2</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" id="<?php echo $user['id']; ?>_inlineCheckbox4" name="<?php echo $user['id']; ?>_group" value="delete">
						  <label class="form-check-label" for="<?php echo $user['id']; ?>_inlineCheckbox4">삭제</label>
						</div>
		</li>
<?php
}
?>
		<li class="m-0 p-0 list-group-item bg-success">
			<input type="hidden" name="mode" value="group_change">
			<button class="btn m-0 p-1 btn-success btn-block btn-sm" type="submit">사용자 수정</button>
		</li>
	</ul>
	</form>
</div>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<div class="card m-2 p-0" id="folder">
	<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="form-group card-header bg-success text-white m-0 p-2">폴더 권한 관리</div>
	<ul class="list-group list-group-flush">
<?php
$iterator = new DirectoryIterator($base_dir);
$dir_list = array();
foreach ($iterator as $fileinfo) {
    if (!$fileinfo->isDot() && $fileinfo != "@eaDir" && $fileinfo->isDir()) {
		$dir_list[$dircounter]['dir_name'] = $fileinfo->getFilename();
		if(is_file($base_dir."/".$fileinfo->getFilename().".json") == true) {
			$getfile = $base_dir."/".$fileinfo->getFilename().".json";
			$mode_arr = array();
			$mode_arr = json_decode(file_get_contents($getfile), true);
			$dir_list[$dircounter]['admin'] = $mode_arr['admin'];
			$dir_list[$dircounter]['group1'] = $mode_arr['group1'];
			$dir_list[$dircounter]['group2'] = $mode_arr['group2'];
		} else {
			$dir_list[$dircounter]['admin'] = 1;
			$dir_list[$dircounter]['group1'] = 1;
			$dir_list[$dircounter]['group2'] = 1;
		}
		$dircounter++;
	} else {
		continue;
    }
}

foreach ($dir_list as $dir_mode){
?>
		<li class="list-group-item">
						<h6 class="mb-2 p-0"><div class="form-check form-check-inline">
						  <span class="badge badge-dark"><?php echo $dir_mode['dir_name']; ?></span>
						</div></h6>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox1" name="<?php echo $dir_mode['dir_name']; ?>_group1" value="1" <?php if($dir_mode['group1']==1){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox1">group1</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox2" name="<?php echo $dir_mode['dir_name']; ?>_group2" value="1" <?php if($dir_mode['group2']==1){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox2">group2</label>
						</div>
		</li>
<?php
}
?>
		<li class="m-0 p-0 list-group-item bg-success">
			<input type="hidden" name="mode" value="mode_change">
			<button class="m-0 p-1 btn btn-success btn-block btn-sm" type="submit">권한 수정</button>
		</li>
	</ul>
	</form>
</div>
<br>
<br>
<br>
<br>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
</body>
</html>
<?php
} else {
	echo "현재 로그인한 사용자는 관리자가 아닙니다. 3초후 초기화면으로 돌아갑니다.";
	echo("<meta http-equiv=\"refresh\" content=\"3; url=index.php\">"); 
}
?>