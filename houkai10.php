<?php
session_start();
$menus = array('法階昇進関係','住職請願関係','その他');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<header>
    <h1>手続きサポートサイト</h1>
    <h2>good</h2>
</header>
<body>
<div id="sub_tittle">
  <?php print('<br>');?>
  <h1>**メニューから選択してください**</h1>
</div>
<form action="houkai20.php" method="post">
  <div class="container">
    <?php
  foreach ($menus as $menu ){
    print('<label>');
    print('<input type="radio" name="menu" value="'.$menu.'"');
   // print('<li>'.$menu.'</li><br />');
    if ($menu === $_SESSION['menu']) { print(' checked');}
    print(' />');
    print($menu.'</label><br />');
  }
?>
  </div>
   <?php print('<br />')?>
  <input type="submit" value="次へ" />
</form>
 
 <div id="branding">
<p>手続きサポートサイト</p>
</div>

<div class="box">
</div>

<span class="red">文字よ青くなれ</span>
</body>
</html>