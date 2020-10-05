<?php
include("config.php");
include("function.php");

if($_SESSION["user_group"] == "admin"){
	


if($_POST['mode'] == "mode_change"){
$iterator = new DirectoryIterator($base_dir);
	foreach ($iterator as $fileinfo) {
		$dir_list = array();
		if (!$fileinfo->isDot() && $fileinfo != "@eaDir" && $fileinfo->isDir()) {
			if((int)$_POST[encode_url($fileinfo->getFilename())."_group1"] == 1){
				$group1_value = 1;
			} else {
				$group1_value = 0;
			}
			if((int)$_POST[encode_url($fileinfo->getFilename())."_group2"] == 1){
				$group2_value = 1;
			} else {
				$group2_value = 0;
			}
			if($_POST[encode_url($fileinfo->getFilename())."_remote"] == "y"){
				$remote_value = "y";
			} else {
				$remote_value = "n";
			}
			if($_POST[encode_url($fileinfo->getFilename())."_checknew"] == "y"){
				$checknew_value = "y";
			} else {
				$checknew_value = "n";
			}
			
			$mode_arr = json_decode(file_get_contents($getfile), true);
			
			$dir_write['admin'] = 1;
			$dir_write['group1'] = $group1_value;
			$dir_write['group2'] = $group2_value;
			$dir_write['remote'] = $remote_value;
			$dir_write['checknew'] = $checknew_value;
			$dir_file = $base_dir."/".$fileinfo->getFilename().".json";
			$json_output = json_encode($dir_write, JSON_UNESCAPED_UNICODE);
			file_put_contents($dir_file, $json_output);
		} else {
			continue;
		}
		unset($dir_list);
	}
	$prevPage = $_SERVER["HTTP_REFERER"];
	header("location:".$prevPage);
} elseif($_POST['mode'] == "group_change"){
	$user_file = "./src/user.php";
	$user_arr = array();
	$user_list = array();
	$user_arr = json_decode(str_replace(" ?>", "", str_replace("<?php ", "", file_get_contents($user_file))), true);
	$user_count = 0;
	$user_id_arr = array_keys($user_arr);
	foreach($user_arr as $user_list_tmp){
		if($_POST[$user_id_arr[$user_count]."_group"] == "delete"){
			unset($user_arr[$user_id_arr[$user_count]]);
			unlink("./src/".$user_id_arr[$user_count]."_bookmark.json");
		} else {
			$user_arr[$user_id_arr[$user_count]]['group'] = $_POST[$user_id_arr[$user_count]."_group"];
		}
		$user_count++;
	}
	$json_output = json_encode($user_arr, JSON_UNESCAPED_UNICODE);
	$json_output = "<?php ".$json_output." ?>";
	file_put_contents($user_file, $json_output);
	$prevPage = $_SERVER["HTTP_REFERER"];
	header("location:".$prevPage);
} elseif($_POST['mode'] == "config_change"){
	$config_output = "<?php\n\$base_dir = \"".$_POST['base_dir']."\";\n\$maxview = \"".$_POST['maxview']."\";\n\$max_autosave = \"".$_POST['max_autosave']."\";\n\$max_bookmark = \"".$_POST['max_bookmark']."\";\n\$use_cover = \"".$_POST['use_cover']."\";\n\$use_listcover = \"".$_POST['use_listcover']."\";\n?>";
	file_put_contents("config.php", $config_output);
	echo "<h1>config파일이 수정되었습니다. 3초 후 새로고침합니다.</h1>";	
	echo("<meta http-equiv=\"refresh\" content=\"3; url=".$_SERVER["PHP_SELF"]."\">"); 
} else {
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
<ul class="nav nav-tabs">
  <li class="nav-item m-0 p-0">
    <a class="nav-link active"  data-toggle="tab" href="#link"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-link-45deg" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M4.715 6.542L3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.001 1.001 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
  <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 0 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 0 0-4.243-4.243L6.586 4.672z"/>
</svg> 링크</a>
  </li>
  <li class="nav-item m-0 p-0">
    <a class="nav-link"  data-toggle="tab" href="#config"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg> 설정</a>
  </li>
  </li>
  <li class="nav-item m-0 p-0">
    <a class="nav-link"  data-toggle="tab" href="#group"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
</svg> 사용자</a>
  </li>
  <li class="nav-item m-0 p-0">
    <a class="nav-link"  data-toggle="tab" href="#folder"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
  <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg> 폴더</a>
  </li>
</ul>
<br>
<div class="tab-content">

<div class="tab-pane fade show active" id="link">
<a href='login.php?mode=adduser'>
	<div class="card bg-success m-2 p-0">
	<div class="card-body text-white m-1 p-1">
	<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
	</svg> 사용자 추가
	</div>
	</div>
</a>
<br>
<a href='update.php'>
	<div class="card bg-success m-2 p-0">
	<div class="card-body text-white m-1 p-1">
	<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-lightning" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
</svg> 업데이트실행
	</div>
	</div>
</a>
<br>
<div class="card bg-outline-success m-2 p-0">
<div class="card-header">README.md</div>
<div class="card-body p-2 text-left">
<?php
$readme = file_get_contents("README.md");
echo substr($readme, strpos($readme, "<h2 id=\"-1\">업데이트 정보</h2>"));
?>
</div>
</div>

</div>

<div class="tab-pane fade show" id="config">
<div class="card m-2 p-0">
	<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="form-group card-header bg-success text-white m-0 p-2">	<svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
  <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
</svg> 설정 변경
</div>
<?php
	if($max_bookmark == null){
		$max_bookmark = 10;
	}
	if($max_autosave == null){
		$max_autosave = 3;
	}
?>
	<ul class="list-group list-group-flush">
		<li class="list-group-item">
		<table width="100%">
		<tr class="border-bottom border-light">
		<td class="m-1 p-1 text-right">base_dir</td>
		<td class="m-1 p-1 text-left"><input type="text" name="base_dir" class="form-control mb-1 pb-2" placeholder="<?php echo $base_dir; ?>" value="<?php echo $base_dir; ?>" required autofocus></td>
		</tr>
		<tr class="border-bottom border-light">
		<td class="m-1 p-1 text-right">maxview</td>
		<td class="m-1 p-1 text-left"><input type="number" name="maxview" class="form-control mb-2 pb-2" placeholder="<?php echo $maxview; ?>" value="<?php echo $maxview; ?>" required></td>
		</tr>
		<tr class="border-bottom border-light">
		<td class="m-1 p-1 text-right">최대자동저장</td>
		<td class="m-1 p-1 text-left"><input type="number" name="max_autosave" class="form-control mb-2 pb-2" placeholder="<?php echo $max_autosave; ?>" value="<?php echo $max_autosave; ?>" required></td>
		</tr>
		<tr class="border-bottom border-light">
		<td class="m-1 p-1 text-right">최대북마크</td>
		<td class="m-1 p-1 text-left"><input type="number" name="max_bookmark" class="form-control mb-2 pb-2" placeholder="<?php echo $max_bookmark; ?>" value="<?php echo $max_bookmark; ?>" required></td>
		</tr>
		<tr class="border-bottom border-light">
		<td class="m-1 p-1 text-right">폴더커버</td>
		<td class="m-1 p-1 text-left">
			<div class="form-check form-check-inline ml-2">
				<input class="form-check-input" type="radio" id="use_cover_inlineCheckbox1" name="use_cover" value="y" <?php if($use_cover == "y"){ echo "checked"; } ?>>
				<label class="form-check-label" for="use_cover_inlineCheckbox1">사용</label>
			</div>
			<div class="form-check form-check-inline ml-2">
				<input class="form-check-input" type="radio" id="use_cover_inlineCheckbox2" name="use_cover" value="n" <?php if($use_cover == "n"){ echo "checked"; } ?>>
				<label class="form-check-label" for="use_cover_inlineCheckbox2">사용안함</label>		
			</div>
		</td>
		</tr>
		<tr>
		<td class="m-1 p-1 text-right">리스트커버</td>
		<td class="m-1 p-1 text-left">
			<div class="form-check form-check-inline ml-2">
				<input class="form-check-input" type="radio" id="use_listcover_inlineCheckbox1" name="use_listcover" value="y" <?php if($use_listcover == "y"){ echo "checked"; } ?>>
				<label class="form-check-label" for="use_listcover_inlineCheckbox1">사용</label>
			</div>
			<div class="form-check form-check-inline ml-2">
				<input class="form-check-input" type="radio" id="use_listcover_inlineCheckbox2" name="use_listcover" value="n" <?php if($use_listcover == "n"){ echo "checked"; } ?>>
				<label class="form-check-label" for="use_listcover_inlineCheckbox2">사용안함</label>		
			</div>
		</td>
		</tr>
		</table>
		</li>
		<li class="m-0 p-0 list-group-item">
			<input type="hidden" name="mode" value="config_change">
			<button class="btn m-0 p-1 btn-success btn-block btn-sm" type="submit">설정변경</button>
		</li>
	</ul>
</form>
</div>
</div>


<div class="tab-pane fade show" id="group">
<div class="card m-2 p-0">
	<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="form-group card-header bg-success text-white m-0 p-2"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
</svg> 유저그룹관리</div>
	<ul class="list-group list-group-flush">
<?php
$user_file = "./src/user.php";
$user_arr = array();
$user_list = array();
$user_arr = json_decode(str_replace(" ?>", "", str_replace("<?php ", "", file_get_contents($user_file))), true);
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
		<li class="m-0 p-0 list-group-item">
			<input type="hidden" name="mode" value="group_change">
			<button class="btn m-0 p-1 btn-success btn-block btn-sm" type="submit">유저그룹수정</button>
		</li>
	</ul>
	</form>
</div>
</div>
<div class="tab-pane fade show" id="folder">
<div class="card m-2 p-0">
	<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
	<div class="form-group card-header bg-success text-white m-0 p-2"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-folder-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M9.828 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91H9v1H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181L15.546 8H14.54l.265-2.91A1 1 0 0 0 13.81 4H9.828zm-2.95-1.707L7.587 3H2.19c-.24 0-.47.042-.684.12L1.5 2.98a1 1 0 0 1 1-.98h3.672a1 1 0 0 1 .707.293z"/>
  <path fill-rule="evenodd" d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z"/>
</svg> 폴더권한관리</div>
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
			$dir_list[$dircounter]['remote'] = $mode_arr['remote'];
			$dir_list[$dircounter]['checknew'] = $mode_arr['checknew'];
		} else {
			$dir_list[$dircounter]['admin'] = 1;
			$dir_list[$dircounter]['group1'] = 1;
			$dir_list[$dircounter]['group2'] = 1;
			$dir_list[$dircounter]['remote'] = "n";
			$dir_list[$dircounter]['checknew'] = "y";
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
						  <input class="form-check-input" type="checkbox" id="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox1" name="<?php echo encode_url($dir_mode['dir_name']); ?>_group1" value="1" <?php if($dir_mode['group1']==1){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox1">group1</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox2" name="<?php echo encode_url($dir_mode['dir_name']); ?>_group2" value="1" <?php if($dir_mode['group2']==1){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox2">group2</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox3" name="<?php echo encode_url($dir_mode['dir_name']); ?>_remote" value="y" <?php if($dir_mode['remote']=="y"){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox3">remote</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" id="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox4" name="<?php echo encode_url($dir_mode['dir_name']); ?>_checknew" value="y" <?php if($dir_mode['checknew']=="y"){ echo "checked"; } ?>>
						  <label class="form-check-label" for="<?php echo $dir_mode['dir_name']; ?>_inlineCheckbox4">chk_new</label>
						</div>
		</li>
<?php
}
?>
		<li class="m-0 p-0 list-group-item">
			<input type="hidden" name="mode" value="mode_change">
			<button class="m-0 p-1 btn btn-success btn-block btn-sm" type="submit">폴더권한수정</button>
		</li>
	</ul>
	</form>
</div>
</div>
</body>
</html>
<?php
}
} else {
	echo "현재 로그인한 사용자는 관리자가 아닙니다. 3초후 초기화면으로 돌아갑니다.";
	echo("<meta http-equiv=\"refresh\" content=\"3; url=index.php\">"); 
}
?>