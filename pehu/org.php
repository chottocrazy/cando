<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$more = (string)filter_input(INPUT_POST, 'more');

$fp = fopen('org.csv', 'a+b');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    flock($fp, LOCK_EX);
    fputcsv($fp, [$how, $what, $date, $info, $more]);
    rewind($fp);
}

flock($fp, LOCK_SH);
while ($row = fgetcsv($fp)) {
    $rows[] = $row;
}
flock($fp, LOCK_UN);
fclose($fp);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>FREE TIME</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="何か する時間">

<link rel="stylesheet" href="http://creative-community.pe.hu/freetime/org.css"/>
<link rel="stylesheet" href="/font/fontmotion.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://creative-community.pe.hu/freetime/ityped.js"></script>

<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>

<style>

.freetime:before {
  content:"FREE TIME";
  font-size: 200%;
  color: #fff;
  text-shadow: 0 0 1vw red;
  text-align: center;
  position:absolute;
  z-index:0;
  top: 50%; left: 50%;
  -webkit-transform:translate(-50%,-50%);
  transform:translate(-50%,-50%);
  width:125%;
  animation:2.5s linear infinite fontmotion;
}

</style>
</head>

<body>

<div id="cover">
<form id="information">
<div class="menu">
<label class="freetime" for="how"></label>
<input type="checkbox" id="how" />
<ul class="search-box how" id="click">
<li>
<input type="radio" name="how" value="create" id="create">
<label for="create" class="label">作る 壊す</label></li>
<li>
<input type="radio" name="how" value="communication" id="communication">
<label for="communication" class="label">書く 読む 話す</label></li>
<li>
<input type="radio" name="how" value="image" id="image">
<label for="image" class="label">撮影する 見る</label></li>
<li>
<input type="radio" name="how" value="music" id="music">
<label for="music" class="label">音を出す 聞く</label></li>
<li>
<input type="radio" name="how" value="research" id="research">
<label for="research" class="label">知る 調べる</label></li>
<li>
<input type="radio" name="how" value="food" id="food">
<label for="food" class="label">料理する 飲む</label></li>
<li>
<input type="radio" name="how" value="try" id="try">
<label for="try" class="label">練習 挑戦</label></li>
</ul>
</div>
<div class="reset">
<input type="reset" name="reset" value="全部見る" class="reset-button">
</div>
</form>
</div>

</body>
</html>
