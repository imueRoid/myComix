<h1 id="mycomix">myComix</h1>

<p><br></p>

<h2 id="phpcomicsviewer">PHP Comics Viewer</h2>

<p><br>
PHP7 이상 버전 및 php-zip, php-gd 설치된 웹서버 필요.</p>

<p>자신의 환경에 맞게 config.php 수정하라. 아래의 두가지 변수를 설정하면 된다.</p>

<pre style="background-color: #DDDDDD;"><code class="php language-php">$base_dir = "/myComix"; //만화가 있는 절대경로
$maxview = "18"; //한페이지에 보여줄 만화 갯수(폴더도 이 숫자만큼만 한 화면에서 보여진다)
</code></pre>

<p><code>$maxsize = "100";</code> 이 변수는 최신 업데이트에서는 사용하지 않는다.</p>

<p><br></p>

<hr />

<p><br></p>

<h2 id="">대표적인 문제</h2>

<p><br></p>

<ul>
<li>북마크나 썸네일 생성이 안되는 경우, 권한을 확인한다.</li>
</ul>

<p>폴더에 쓰기권한이 있어야 썸네일을 생성할 수 있다. 대부분의 경우 707 내지 777을 주어야한다. <br />
<code>chmod -R 777 /만화책폴더</code> <br />
<code>chmod -R 777 /myComix폴더</code> <br />
<br></p>

<ul>
<li>rclone 이용시 반응이 많이 느리다.</li>
</ul>

<p>하위폴더가 있는 폴더와 없는 폴더를 구분하기 위해 디렉토리확인이 잦기 때문. <br />
썸네일 생성시에도 매우 느린데, 이 문제는 썸네일을 한번만 만들고나면 해결된다. <br />
폴더 이름 앞에 "rclone_" 을 붙이거나, 관리자페이지에서 is_remote설정으로 썸네일 생성과 하위디렉토리 확인 예외설정이 가능하다. <br />
<br></p>

<ul>
<li>화면에 아무것도 뜨지 않는다.</li>
</ul>

<p>이는 대부분 권한이 없거나, PHP모듈이 설치되어있지 않아 발생한다. <br />
<code>php-zip</code>, <code>php-gd</code> 모듈이 로드되고 있는지 확인하라.</p>

<p><br></p>

<hr />

<p><br></p>

<h2 id="-1">업데이트 정보</h2>

<p><br></p>

<ul>
<li>index 0.404 </li>
</ul>

<p>
bookmark.json파일과 user.php 파일을 src 라는 하위폴더를 만들어 그 아래에 위치하도록 수정.<br>
깃허브에 파일 올리다가 실수하는 일이 없도록 수정했다. 사용자는 그냥 사용하면 저절로 폴더를 만들고 파일을 이동한다.
</p>


<p><br></p>

<ul>
<li>index 0.402 </li>
</ul>

<p>
보안 향상. 기존사용자는 업데이트를 위해 사용자그룹수정을 한번 실행하라.
</p>


<p><br></p>

<ul>
<li>index 0.4 </li>
</ul>

<p>
북마크 저장시 읽던 모드를 함께 저장하여 다른 사람이 읽기모드 바꿔도 무관하게 수정(기존 북마크는 이용가능)<br>
파일 정렬방식 다소 수정하여 띄어쓰기와 언더바 제거하고 정렬하도록 수정.
</p>

<p><br></p>

<ul>
<li>index 0.395 </li>
</ul>

<p>급작스런 버그수정 및 파일명에 띄어쓰기대신 언더바(_)가 있는 경우 띄어쓰기가 있는 파일보다 먼저 정렬되는 문제 수정</p>

<p><br></p>

<ul>
<li>index 0.393 </li>
</ul>

<p>북마크 처리방식 변경, 이제 북마크버튼 누르면 북마크되는 페이지가 표시된다.</p>

<p><br></p>
<ul>
<li>index 0.392 </li>
</ul>

<p>폴더이름에 "."이 있어도 권한설정 가능</p>

<p><br></p>
<ul>
<li>index 0.39 </li>
</ul>

<p>로그인처리 세션으로 변경, 그 밖의 소소한 수정.</p>

<p><br></p>

<ul>
<li>index 0.36 </li>
</ul>

<p>admin페이지에서 버전업 정보를 읽을 수 있도록 함. admin페이지 변경.</p>

<p><br></p>

<ul>
<li>index 0.35 </li>
</ul>

<p>페이지이동 PC에서 드롭다운되던 것 위로 드롭업되도록 수정, 관리자페이지에서 폴더를 리모트지정할 수 있도록 수정</p>

<p><br></p>

<ul>
<li>index 0.33, viewer 0.25 </li>
</ul>

<p>~~~ 10화, ~~~ 10-2화 정렬 수정</p>

<p><br></p>

<ul>
<li>index 0.3  </li>
</ul>

<p>사용자별 디렉토리 권한이 추가되었다. <br />
base_dir 바로 아래쪽에 있는 디렉토리에 대하여만 설정이 가능하며, 디렉토리 이름에 "."이 있는 경우 설정하지 못하니 주의하라.</p>

<p><br></p>

<ul>
<li>index 0.2 viewer 0.21  </li>
</ul>

<p>로그인 기능, 사용자 추가기능을 추가했다. 북마크는 사용자별로 관리된다. <br />
그 외에도 소소한 수정이 있었다. <br />
앞으로 계획된 업데이트는 사용자그룹별 폴더 읽기 권한이다. 얼추 계획된 개발이 끝나간다.</p>

<p><br></p>

<ul>
<li>index 0.18 viewer 0.2  </li>
</ul>

<p>파일 이름의 |, ? 특수문자를 시놀로지에서 옮기거나 복사할 때 urlencode되어 myComix가 인식하지 못하는 문제 수정. <br />
겸사겸사 config.php 파일 내의 함수 등등을 function.php라는 새 파일을 만들어 빼냈다. <br />
오작동하는 경우, config.php 파일 내부를 아래의 정보만 남겨두면 된다.</p>

<pre><code class="php language-php">&lt;?php
$base_dir = "/myComix"; //만화가 있는 절대경로
$maxview = "18"; //한페이지에 보여줄 만화 갯수
?&gt;
</code></pre>

<p><br></p>

<ul>
<li>viewer 0.193  </li>
</ul>

<p>압축파일이 아닌 경우, 북마크가 제대로 동작하지 않던 문제 수정  </p>

<p><br></p>

<ul>
<li>index 0.172  </li>
</ul>

<p>사소한 버그 수정  </p>

<p><br></p>

<ul>
<li>index 0.171, viewer 0.192  </li>
</ul>

<p>논리연산자가 제대로 작동하지 않는 문제 수정  </p>

<p><br></p>

<ul>
<li>viewer 0.191  </li>
</ul>

<p>북마크개발 중 lightgallery.min.js 파일을 불러오는 경로 수정했던 것을 되돌리지 않아 갤러리 모드가 정상동작하지 않던 문제 수정.  </p>

<p><br></p>

<ul>
<li>index 0.15  </li>
</ul>

<p>폴더 맨 앞에 "rclone_"을 붙여 Rclone 폴더임을 알릴 수 있다. <br />
rclone 폴더로 지정하는 경우 1. 썸네일을 생성하지 않고,  2. 하위 디렉토리가 있는지 검색하지 않는다. <br />
썸네일을 일괄 생성하지 않으나 뷰어에서 따로 썸네일 및 파일정보를 생성하므로, 일단 만화를 읽고나면 이후엔 생성된 썸네일을 읽어온다. <br />
이번 패치는 rclone 속도가 개인 NAS에 비해 매우 느려 사용에 불편함을 개선하기 위한 것이다.</p>
