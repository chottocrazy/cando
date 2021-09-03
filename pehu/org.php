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
<meta name="description" content="FREE TIME | 何かする時間">

<link rel="stylesheet" href="ityped.css"/>
<link rel="stylesheet" href="http://creative-community.pe.hu/freetime/open.css"/>
<link rel="stylesheet" href="http://creative-community.pe.hu/freetime/org.css"/>
<link rel="stylesheet" href="/font/fontmotion.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="http://creative-community.pe.hu/freetime/org.js"></script>

<script type="text/javascript">
$(function(){
$("#").load("");
})
</script>

<style>

</style>
  
</head>
<body>

<div id="cover_freetime">
<div class="content">
<span>何か</span>
<div id="index">
  <form id="information">
  <div class="menu">
  <label class="freetime" for="how"></label>
  <input type="checkbox" id="how" />
  <ul class="search-box how" id="click">
<li>
<input type="radio" name="how" value="create" id="create">
<label for="create" class="label">作った 壊した</label></li>
<li>
<input type="radio" name="how" value="image" id="image">
<label for="image" class="label">撮影した 見た</label></li>
<li>
<input type="radio" name="how" value="music" id="music">
<label for="music" class="label">音を出した 聞いた</label></li>
<li>
<input type="radio" name="how" value="communication" id="communication">
<label for="communication" class="label">書いた 読んだ</label></li>
<li>
<input type="radio" name="how" value="try" id="try">
<label for="try" class="label">練習した 挑戦した</label></li>
  </ul>
  </div>
  <div class="reset">
  <input type="reset" name="reset" value="全部見る" class="reset-button">
  </div>
  </form>
</div>
</div>
</div>

<div id="open">
<ul>
<?php if (!empty($rows)): ?>
<?php foreach ($rows as $row): ?>
<li class="list_item list_toggle" data-how="<?=h($row[0])?>">
<p class="what"><?=h($row[1])?></p>
<span class="date"><?=h($row[2])?></span>
<div class="info">
<span><?=h($row[3])?></span>
<a class="<?=h($row[4])?>" href="<?=h($row[4])?>" target="_blank"></a>
</div>
</li>
<?php endforeach; ?>
<?php else: ?>
<li class="list_item list_toggle" data-how="<?=h($row[0])?>">
<p class="what">プログラム名 row[1]</p>
<span class="date">0000.00.00 row[2]</span>
<div class="info">
<span>説明 row[3]</span>
<a class="<?=h($row[4])?>" href="<?=h($row[4])?>" target="_blank"></a>
</div>
</li>
<?php endif; ?>
</ul>
</div>

</body>
</html>
