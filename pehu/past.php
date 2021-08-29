<?php
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
$how = (string)filter_input(INPUT_POST, 'how');
$what = (string)filter_input(INPUT_POST, 'what');
$date = (string)filter_input(INPUT_POST, 'date');
$info = (string)filter_input(INPUT_POST, 'info');
$more = (string)filter_input(INPUT_POST, 'more');

$fp = fopen('past.csv', 'a+b');
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
<title>FREE TIME | 大 chotto crazy 2021</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="何かした時間">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="http://creative-community.pe.hu/freetime/org.js"></script>
<link rel="stylesheet" href="http://creative-community.pe.hu/freetime/org.css"/>
</head>
<body>

<div class="list">
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
