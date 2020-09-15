# myComix
<br>

## PHP Comics Viewer
<br>
PHP7 이상 버전 및 php-zip, php-gd 설치된 웹서버 필요.  
도커와 도커컴포즈를 이용할 수 있는 환경이라면 아래의 yml 파일을 참조하라.  
도커컴포즈는 띄어쓰기에 민감하다. 아래의 내용을 docker-compose.yml로 저장한 후,  
docker-compose.yml파일이 있는 디렉토리에서 `docker-compose pull && docker-compose up -d` 명령어를 실행하라. 
 

```docker-compose.yml
version: '3'

services:
  NGINX:
    container_name: NGINX
    image: webdevops/php-nginx:7.4-alpine
    restart: always
    network_mode: "bridge"
    ports:
      - "외부에서접속할포트:80"
    environment:
      PHP_MEMORY_LIMIT: "256M"
      PHP_POST_MAX_SIZE: "100M"
      PHP_UPLOAD_MAX_FILESIZE: "100M"
      FPM_REQUEST_TERMINATE_TIMEOUT: "600"
      PHP_MAX_EXECUTION_TIME: "600"
    volumes:
      - /etc/localtime:/etc/localtime:ro
      - /시놀로지의 마이코믹스폴더경로:/app
      - /시놀로지의 만화책폴더 경로:/myComix
```

자신의 환경에 맞게 config.php 수정하라. 아래의 두가지 변수를 설정하면 된다.

```php
$base_dir = "/myComix"; //만화가 있는 절대경로
$maxview = "18"; //한페이지에 보여줄 만화 갯수(폴더도 이 숫자만큼만 한 화면에서 보여진다)
```

`$maxsize = "100";` 이 변수는 최신 업데이트에서는 사용하지 않는다.


<br>

***
<br>

## 대표적인 문제
<br>

- 북마크나 썸네일 생성이 안되는 경우, 권한을 확인한다.

폴더에 쓰기권한이 있어야 썸네일을 생성할 수 있다. 대부분의 경우 707 내지 777을 주어야한다.  
`chmod -R 777 /만화책폴더`  
`chmod -R 777 /myComix폴더`  
<br>

- rclone 이용시 반응이 많이 느리다.

하위폴더가 있는 폴더와 없는 폴더를 구분하기 위해 디렉토리확인이 잦기 때문.  
썸네일 생성시에도 매우 느린데, 이 문제는 썸네일을 한번만 만들고나면 해결된다.  
폴더 이름 앞에 "rclone_" 을 붙여 썸네일 생성과 하위디렉토리 확인 예외설정이 가능하다.  
<br>

- 화면에 아무것도 뜨지 않는다.

이는 대부분 권한이 없거나, PHP모듈이 설치되어있지 않아 발생한다.  
`php-zip`, `php-gd` 모듈이 로드되고 있는지 확인하라.
  

<br>

***
<br>

## 업데이트 정보
<br>

- viewer 0.193  

압축파일이 아닌 경우, 북마크가 제대로 동작하지 않던 문제 수정  
  
<br>

- index 0.172  

사소한 버그 수정  
  
<br>

- index 0.171, viewer 0.192  

논리연산자가 제대로 작동하지 않는 문제 수정  
  
<br>

- viewer 0.191  

북마크개발 중 lightgallery.min.js 파일을 불러오는 경로 수정했던 것을 되돌리지 않아 갤러리 모드가 정상동작하지 않던 문제 수정.  
  
<br>

- index 0.15  

폴더 맨 앞에 "rclone_"을 붙여 Rclone 폴더임을 알릴 수 있다.  
rclone 폴더로 지정하는 경우 1. 썸네일을 생성하지 않고,  2. 하위 디렉토리가 있는지 검색하지 않는다.  
썸네일을 일괄 생성하지 않으나 뷰어에서 따로 썸네일 및 파일정보를 생성하므로, 일단 만화를 읽고나면 이후엔 생성된 썸네일을 읽어온다.  
이번 패치는 rclone 속도가 개인 NAS에 비해 매우 느려 사용에 불편함을 개선하기 위한 것이다.
