<?php require_once './encode.php'; 
require_once './houkai70.php'; 
session_start();
               //$_SESSION['animal']を初期化
//if (isset($_POST['houkai_bef']) === TRUE) { $_SESSION['houkai_bef'] = $_POST['houkai_bef']; }
//if (isset($_POST['houkai_aft']) === TRUE) { $_SESSION['houkai_aft'] = $_POST['houkai_aft']; }
//if (isset($_POST['shorui']) === TRUE) { $_SESSION['shorui[]'] = $_POST['shorui']; }
//if (isset($_POST['soudoureki']) === TRUE) { $_SESSION['soudoureki'] = $_POST['soudoureki']; }
//if (isset($_POST['age']) === TRUE) { $_SESSION['age'] = $_POST['age']; }
if (isset($_POST['jihan']) === TRUE) { $_SESSION['jihan'] = $_POST['jihan']; }
if (isset($_POST['jushoku']) === TRUE) { $_SESSION['jushoku2'] = $_POST['jushoku']; }
if (isset($_POST['tera']) === TRUE) { $_SESSION['tera'] = $_POST['tera']; }

$errors=array();                                     //エラー処理
$opts = array('住職請願','副住職請願');
$opts2 = array('特例地','別格地','準別格地','1等地','2等地','3等地','4等地','5等地','6等地','7等地');

if (($_SESSION['jihan']=='') ){              //年齢エラー処理、セット
  $errors[] = '寺班を決められた選択肢の中から選択してください。';
  }
if (($_SESSION['tera']=='') ){              //年齢エラー処理、セット
  $errors[] = '住職。副住職請願を決められた選択肢の中から選択してください。';
  }
if (count($errors) > 0) {
  die(implode('<br />', $errors).
    '<br />[<a href="houkai40.php">戻る</a>]');
}
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<header>
    <h1>手続きサポートサイト60</h1>

<?php                            
  
  ?>
</header>
<body>
    <?php
  print('<dt><br>手続き : '.$_SESSION['tera']);   //提出書類
  print('<dt>寺班 　: '.$_SESSION['jihan']);
  
  for ($i =0;$i < count($jihan);$i++){    //寺班を調べる
    
    if($_SESSION['jihan'] ==$jihan[$i][0]){
      $gizai=$jihan[$i][1];
    }
  } 

  for ($i =0;$i < count($tera);$i++){    //住職か副住職かを調べる
    
    if($_SESSION['tera'] ==$tera[$i][0]){
      $seigan=$i;
     }
  } 
  if($seigan == 1){$gizai = $gizai / 2 ;}  //副住職なら半分
  print('<br><br>');
  print('<br>*********************</br>');

 // print('<dt><br>住職義財　　　　：'.$gizai);   
  //print('<dt>法脈相承式経営料 : 85000');   //法脈相承式経営料
  //print('<dt>合計　　　　　　 : '.($gizai + 85000));   
  print('<br><br>');

  print('<li> 住職義財　　　　 : '.$gizai.'</li>');
  print('<li>法脈相承式経営料 : '.'85000</li>');
  print('<br><li>法階義財合計　　 : '.$_SESSION['houkai'].'</li>');
  print('<li>毎歳香資合計 　　: '.$_SESSION['maisai'].'</li>');
  print('<li>証明書類合計 　　: '.$_SESSION['shoumei'].'</li>');
  print('<li>　　　　合計 　　: '.($_SESSION['houkai'] + $_SESSION['maisai'] + 
  $_SESSION['shoumei'] + $gizai + 85000).'</li>');
  
  print('<br>');
   ?>
  
<input type="button" value="前へ" onclick="location.href='houkai40.php'";/>
 <div id="branding">
    <p>手続きサポートサイト</p>
</div>
<div class="red">宗務本院</div>
</body>
</html>