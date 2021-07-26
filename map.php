<!DOCTYPE html>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
$("#schedule").load("/cando/schedule.php");
})
</script>
<style type="text/css">
@font-face {
  font-family: "inscrutable";
  src: url(/font/inscrutable.otf);
}
@font-face {
  font-family: "Orchard";
  src: url(/font/Orchard-Linear.otf);
}
.hold:before,
.center b,
#year,
#marquee {
  font-family:"Orchard";
}
.bg_fff,
.bg_font {
  font-family:"inscrutable";
}
#sign  {
  width:100%; height:23rem;
  border:none;
  overflow:hidden;
}
#marquee span {
  pointer-events: none;
}
#howtocoding, #workshop
{overflow:auto; height:23rem;}

#howtocoding #introduce
{zoom:0.75;}
hr {clear: both; border: none;}
</style>
<link rel="stylesheet" type="text/css" href="/css/map.css" />
<link rel="stylesheet" type="text/css" href="/css/top.css" />
<link rel="stylesheet" type="text/css" href="/css/popup.css" />
<title>Can ☆ Do | 大 chotto crazy</title>
</head>
<body>
<div id="full" class="no_print">
<h2 id="marquee">
<span>We Can ☆ Do Chotto Crazy, Everytime, Everywhere</span>
</h2>
</div>
<div id="full">
<div id="normal">
<a id="link" href="/cando/goout/" target="_blank" rel="noopener noreferrer"></a>
<iframe id="sign" src="http://goout.pe.hu/"></iframe>
</div>

<div id="normal">
  <div id="wide">
  <p id="logo" class="center">
  <span class="message">限定開催</span>
  </p>
  <div id="logo" class="center">
  <b class="on">More Info Soon</b>
  </div>
  </div>
  <div id="wide">
  <div id="about" class="center">
  <p>More Info Soon</p>
  </div>
  <span class="bg_fff">We Can ☆ Do chotto crazy</span>
  </div>
</div>
<div id="main">
<div id="schedule"></div>
</div>
</div>
</body>
</html>
