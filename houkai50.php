<?php require_once './encode.php'; 
require_once './houkai70.php'; 
session_start();
               //$_SESSION['animal']を初期化
if (isset($_POST['houkai_bef']) === TRUE) { $_SESSION['houkai_bef'] = $_POST['houkai_bef']; }
if (isset($_POST['houkai_aft']) === TRUE) { $_SESSION['houkai_aft'] = $_POST['houkai_aft']; }
if (isset($_POST['shorui']) === TRUE) { $_SESSION['shorui[]'] = $_POST['shorui']; }
if (isset($_POST['soudoureki']) === TRUE) { $_SESSION['soudoureki'] = $_POST['soudoureki']; }
if (isset($_POST['age']) === TRUE) { $_SESSION['age'] = $_POST['age']; }


$errors=array();                                     //エラー処理
$opts = array('特住','歴住','再住','前住','住持','東堂','西堂','塔司','座元','首座','蔵主','侍者','沙弥');  //エラー処理

if (isset($_SESSION['houkai_bef'])) {               //現在法階エラー処理
  foreach ($opts as $hoka) {
    if (!in_array($_SESSION['houkai_bef'], $opts)) {
      $errors[] = '現在の法階をを決められた選択肢の中から選択してください。';
      break;}
    }
    }else{
      $errors[] = '現在の法階を決められた選択肢の中から選択してください。';
}

if (isset($_SESSION['houkai_aft'])) {               //昇進後法階エラー処理
  foreach ($opts as $hoka) {
    if (!in_array($_SESSION['houkai_aft'], $opts)) {
      $errors[] = '昇進後の法階をを決められた選択肢の中から選択してください。';
      break;}
    }
    }else{
      $errors[] = '昇進後を決められた選択肢の中から選択してください。';
}

if (($_SESSION['age']=='') ){              //年齢エラー処理、セット
  $errors[] = '年齢を決められた選択肢の中から選択してください。';
  }else{
  for ($i =0;$i < count($age);$i++){ 
    
    if($_SESSION['age']==$age[$i][0]){     
      $sou_age = $age[$i][1];
    }
  }
}
if (($_SESSION['soudoureki']=='') ){              //僧堂歴エラー処理、セット
  $errors[] = '僧堂歴を決められた選択肢の中から選択してください。';
  }else{
  for ($i =0;$i < count($soudoureki);$i++){ 
    
    if($_SESSION['soudoureki']==$soudoureki[$i][0]){     
      $sou_soudou = $soudoureki[$i][1];
    }
  }  

}

for($i =0;$i < count($opts);$i++){
  if($opts[$i] == $_SESSION['houkai_bef']) $be=$i;
   //print('$be');
 }
for($i =0;$i < count($opts);$i++){
  if($opts[$i] == $_SESSION['houkai_aft']) $af=$i;
  //print('$af');
  
}
if($be <= $af){$errors[] = '法階の入力に間違いがあります。';}  //法階昇進の順序チェック

if (count($errors) > 0) {
  die(implode('<br />', $errors).
    '<br />[<a href="houkai40.php">戻る</a>]');
}
?>

<?php
                                                        //オブジェクト作成
$temple = new Temple($_SESSION['houkai_bef'],$_SESSION['houkai_aft'],
$sou_soudou ,$sou_age)


?>
<html>                                                 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<header>
    <h1>手続きサポートサイト50</h1>

<?php    
                          
                                 //提出書類
  print('<dt><br>提出書類</dt>');
  print($temple->get_houkai_bef().'<br>');
  print($temple->get_houkai_aft().'<br>');
  
  print($temple->get_age().'<br>');
  print($temple->get_soudoureki().'<br>');
  
?>
</header>
<body>


<input type="button" value="前へ" onclick="location.href='houkai40.php'";/>
<input type="submit" value="次へ" onclick="location.href='houkai60.php'";/>

</body>
</html>