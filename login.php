<?php
session_start(["cache_expire"=> 43200, "gc_maxlifetime"=> 43200]);

if($_POST['mode'] == "make_id"){
if(is_dir("./src") === false){	
	if (!mkdir("./src", 0777, true)) {
		echo "<h1> src폴더 생성에 실패했습니다. 권한을 모두 777로 주었는지 확인하세요.</h1><br>";
	}
}
	$user_file = "./src/user.php";
	$user_arr = array();
	if(is_file($user_file) === true){
		$user_arr = json_decode(str_replace(" ?>", "", str_replace("<?php ", "", file_get_contents($user_file))), true);
	}
	$user_arr[$_POST['id']]['pass'] = password_hash(hash("sha256", $_POST['pass']), PASSWORD_DEFAULT);
	$user_arr[$_POST['id']]['group'] = $_POST['group'];
	$json_output = json_encode($user_arr, JSON_UNESCAPED_UNICODE);
	$json_output = "<?php ".$json_output." ?>";
	file_put_contents($user_file, $json_output);
	
	echo $_POST['id']." / ".$_POST['group']."생성에 성공했습니다.<br> 3초후 이전화면으로 돌아갑니다.";
	$prevPage = $_SERVER["HTTP_REFERER"];
	echo("<meta http-equiv=\"refresh\" content=\"3; url=".$prevPage."\">"); 
} elseif($_POST['mode'] == "login"){
	$user_file = "./src/user.php";
	$user_arr = array();
	$user_arr = json_decode(str_replace(" ?>", "", str_replace("<?php ", "", file_get_contents($user_file))), true);
	if (password_verify(hash("sha256", $_POST['pass']), $user_arr[$_POST['id']]['pass']) == true) {
		//login ok, make session
		$_SESSION["user_id"] = $_POST['id'];
		$_SESSION["user_pass"] = hash("sha256", $_POST['pass']);
		$_SESSION["user_group"] = $user_arr[$_POST['id']]['group'];
		header("location:index.php");
	} else {
		$prevPage = $_SERVER["HTTP_REFERER"];
		header("location:".$prevPage);
	}
} elseif($_GET['mode'] == "logout"){
	session_destroy();
	header("location:login.php");
} else {
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
<?php

if(is_file('./src/user.php') !== false) {
	if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_pass']) || !isset($_SESSION['user_group'])) { 
?>
<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="card" style="position: absolute; top:50%; left:50%; width:320px; margin-left:-160px; margin-top:-200px;">
		<div class="card-header" onclick="location.replace('index.php');"><h2 style="font-family: 'Gugi';">마이코믹스</h2></div>
		<br>
		<div class="form-group card-body align-middle">
			<input type="text" name="id" class="form-control mb-1 pb-2" placeholder="ID" required autofocus>
			<input type="password" name="pass" class="form-control mb-2 pb-2" placeholder="Password" required>
			<input type="hidden" name="mode" value="login">
		</div>
		<div class="card-footer">
		<button class="btn btn-primary btn-block" type="submit">Log-in</button>
		</div>
	</div>
</form>
<?php
	} else {

	if($_GET['mode'] == "adduser" && $_SESSION["user_group"] == "admin") {
?>
<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="card" style="position: absolute; top:50%; left:50%; width:320px; margin-left:-160px; margin-top:-200px;">
		<div class="card-header" onclick="location.replace('index.php');"><h2 style="font-family: 'Gugi';">마이코믹스</h2></div>
		<br>아이디가 있는 경우, 패스워드와 그룹 변경됨.
		<div class="form-group card-body align-middle">
			<input type="text" name="id" class="form-control mb-1 pb-2" placeholder="USER_ID" required autofocus>
			<input type="password" name="pass" class="form-control mb-2 pb-2" placeholder="USER_Password" required>
			<br>
				<div class="custom-control custom-radio custom-control-inline">
				  <input type="radio" class="custom-control-input" id="defaultInline1" name="group" value="admin" required>
				  <label class="custom-control-label" for="defaultInline1">관리자</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input type="radio" class="custom-control-input" id="defaultInline2" name="group" value="group1" required>
				  <label class="custom-control-label" for="defaultInline2">1그룹</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input type="radio" class="custom-control-input" id="defaultInline3" name="group" value="group2" required>
				  <label class="custom-control-label" for="defaultInline3">2그룹</label>
				</div>
			<input type="hidden" name="mode" value="make_id">
		</div>
		<div class="card-footer">
		<button class="btn btn-primary btn-block" type="submit">사용자아이디생성</button>
		</div>
	</div>
</form>


<?php
	} else {
		echo("<script>location.replace('index.php');</script>"); 
	}
	}
} else {
//관리자 아이디 만드는 화면
?>
<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="card" style="position: absolute; top:50%; left:50%; width:320px; margin-left:-160px; margin-top:-200px;">
		<div class="card-header" onclick="location.replace('index.php');"><h2 style="font-family: 'Gugi';">마이코믹스</h2></div>
		<br>최초로 관리자 아이디를 생성합니다.
		<div class="form-group card-body align-middle">
			<input type="text" name="id" class="form-control mb-1 pb-2" placeholder="Admin_ID" required autofocus>
			<input type="password" name="pass" class="form-control mb-2 pb-2" placeholder="Admin_Password" required>
			<input type="hidden" name="group" value="admin">
			<input type="hidden" name="mode" value="make_id">
		</div>
		<div class="card-footer">
		<button class="btn btn-primary btn-block" type="submit">관리자 아이디 생성</button>
		</div>
	</div>
</form>
<?php
}
?>
</body>
</html>
<?php
}
?>
