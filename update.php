<?php
include("config.php");
include("function.php");

$version = json_decode(file_get_contents("version.json"), true);
$server_version =  json_decode(file_get_contents("https://raw.githubusercontent.com/imueRoid/myComix/master/version.json"), true); 

#if($server_version['index'] > $version['index'] || $server_version['viewer'] > $version['viewer']) {
	echo "업데이트파일을 가져옵니다.<br><br>";

	$new_file = file_get_contents("https://github.com/imueRoid/myComix/archive/master.zip");

	if($new_file === false) {
		echo "업데이트파일을 가져오는데 실패했습니다.<br>";
		echo "잠시 후 다시 시도해주세요.<br>";
	} else {
		echo "업데이트 파일<br> 용량: ".strlen($new_file)."byte, hash: ".hash("sha256", $$new_file)."<br>";
		$write_file = file_put_contents("./update.zip", $new_file);
		echo "기록한 파일<br> 용량: ".$write_file."byte, hash: ".hash("sha256", file_get_contents("./update.zip"))."<br>";
		if($write_file != strlen($new_file) || hash("sha256", file_get_contents("./update.zip")) != hash("sha256", $$new_file))  {
			echo "업데이트파일을 서버에 기록하는데 실패했습니다.<br>";
			echo "잠시 후 다시 시도해주세요.<br>";
		} else {
			$zip = new ZipArchive;
			if ($zip->open('update.zip') === TRUE) {
				for($i = 1; $i < $zip->numFiles; $i++) {
					$file_name = str_replace($zip->getNameIndex(0), "", $zip->getNameIndex($i));
					if(is_file("config.php") && $file_name == "config.php") {
						echo "config.php 파일은 교체하지 않습니다.<br>";
					} else {
						$update_temp = $zip->getFromIndex($i);
						echo $file_name."파일 해시: ".hash("sha256", $update_temp).", ";
						$write_file = file_put_contents($file_name, $update_temp);
						echo "기록한 파일 용량: ".hash("sha256", file_get_contents($file_name));
						
						if(hash("sha256", file_get_contents($file_name)) == hash("sha256", $update_temp)){
							echo " -------------- OK <br>";
						}
					}
				}
					$zip->close();
					unlink("update.zip");
			} else {
				echo '업데이트 파일의 압축해제에 실패했습니다. 잠시 후 다시 시도해주세요.<br>';
			}
		}
	}
	
		
#} if($server_version['index'] < $version['index'] && $server_version['viewer'] < $version['viewer']) {
#	echo "업데이트가 필요하지 않습니다.<br>";
#}
echo "<br><br><a href=index.php>홈으로 돌아갑니다.</a>"
?>