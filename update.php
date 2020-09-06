<?php
$version = json_decode(file_get_contents("version.json"), true);
$server_version =  json_decode(file_get_contents("https://raw.githubusercontent.com/imueRoid/myComix/master/version.json"), true); 

if($server_version['index'] > $version['index']) {
$new_index = file_get_contents("https://raw.githubusercontent.com/imueRoid/myComix/master/index.php");
	if(!unlink("./index.php")){
		echo "기존 index.php 파일의 삭제에 실패했습니다. 권한을 확인해주세요.<br>";
	} else {
		file_put_contents("./index.php", $new_index);
		echo $version['index']."에서 ".$server_version['index']."로 프로그램(index.php)의 업데이트가 완료되었습니다.";
	}
$newversion_json =  file_get_contents("https://raw.githubusercontent.com/imueRoid/myComix/master/version.json"); 
	if(!unlink("./version.json")){
		echo "기존 config.json 파일의 삭제에 실패했습니다. 권한을 확인해주세요.<br>";
	} else {
		file_put_contents("./version.json", $newversion_json);
		echo "인덱스 버전".$version['index']."에서 ".$server_version['index']."로 업데이트가 완료되었습니다.";
	}
}

if($server_version['viewer'] > $version['viewer']) {
$new_viewer = file_get_contents("https://raw.githubusercontent.com/imueRoid/myComix/master/viewer.php");
	if(!unlink("./viewer.php")){
		echo "기존 viewer.php 파일의 삭제에 실패했습니다. 권한을 확인해주세요.";
	} else {
		file_put_contents("./index.php", $new_viewer);
		echo $version['viewer']."에서 ".$server_version['viewer']."로 프로그램(viewer.php)의 업데이트가 완료되었습니다.";
	}
$newversion_json =  file_get_contents("https://raw.githubusercontent.com/imueRoid/myComix/master/version.json"); 
	if(!unlink("./version.json")){
		echo "기존 config.json 파일의 삭제에 실패했습니다. 권한을 확인해주세요.";
	} else {
		file_put_contents("./version.json", $newversion_json);
		echo "뷰어 버전".$version['viewer']."에서 ".$server_version['viewer']."로 업데이트가 완료되었습니다.";
	}
}

echo "<a href=index.php>홈으로 돌아갑니다.</a>"
?>