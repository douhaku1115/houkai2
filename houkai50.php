<?php require_once './encode.php'; 
require_once './houkai70.php'; 
session_start();
               //$_SESSION['animal']を初期化
if (isset($_POST['houkai_bef']) === TRUE) { $_SESSION['houkai_bef'] = $_POST['houkai_bef']; }
if (isset($_POST['houkai_aft']) === TRUE) { $_SESSION['houkai_aft'] = $_POST['houkai_aft']; }
if (isset($_POST['shorui']) === TRUE) { $_SESSION['shorui[]'] = $_POST['shorui']; }

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
$sou_age)


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
  print('<dt><br>入力情報</dt><br>');
  print('現法階　 : '.$temple->get_houkai_bef().'<br>');
  print('昇進法階 : '.$temple->get_houkai_aft().'<br>');
  print('年齢　　 : '.$temple->get_age().'<br>');
  $temple->age_check($temple->get_houkai_aft(),$sou_age);
   
?>
</header>
<body>
  <h3>手続き明細</h3>

<div>
<?php                               
  $houkai_gizai = 0;                 //初期化
  $kousi = 0;
  $zogen = 8;
  $shoumei = 0;
                                       //該当法階の決定
  for ($i =0;$i < count($houkai);$i++){ 
    
    if($_POST['houkai_bef']==$houkai[$i][0]){//現在の法階を調べる
      $start=$i;
    }
    if($_POST['houkai_aft']==$houkai[$i][0]){//昇進後の法階
      $end=$i;
    }
  }                                            //法階昇進のタイトル表示
  print('<'.$houkai[$start][0].' から '.$houkai[$end][0].'> の法階昇進');
  print('<br>');

  for($j=$end;$j < $start;$j++){         //法階義財合計算出
     $houkai_gizai += (int)$houkai[$j][1];
     $kousi += (int)$houkai[$j][2];
     print('<li>法階義財('.$houkai[$j][0].') : '.(int)$houkai[$j][1].'</li>');
     print('<li>毎歳香資('.$houkai[$j][0].') : '.(int)$houkai[$j][2].'</li>');
     
  }
                                              //必要書類表示
  if (isset($_SESSION['shorui[]'])) {
   foreach ($_SESSION['shorui[]'] as $sho2) {
     
      if($sho2===$shorui2[0][0]){
        print('<li>必要書類('.$shorui2[0][0].') :'.$shorui2[0][1]);
        $shoumei += $shorui2[0][1];        //必要書類料加算
      }
      if($sho2===$shorui2[1][0]){
        print('<li>必要書類('.$shorui2[1][0].') :'.$shorui2[1][1]);
       $shoumei += $shorui2[1][1];
      }
   }
  }   
    print('<br>');
    print('<br><li>法階義財合計 : '.$houkai_gizai.'</li>');
    print('<li>毎歳香資合計 : '.$kousi.'</li>');
    print('<li>証明書類合計 : '.$shoumei.'</li>');
    print('<li>　　　　合計 : '.($kousi + $houkai_gizai + $shoumei).'</li>');

    $_SESSION['maisai'] = $kousi;      //セッションに代入
    $_SESSION['shoumei'] = $shoumei; 
    $_SESSION['houkai'] = $houkai_gizai;
?>
</div>
<form action="houkai60.php" method="post">
<div>
<?php         

                     
                                 //提出書類
  print('<dt><br>提出書類</dt>');
  if($start > $zogen)print('<dd>法階稟承請願書</dd>');
  if($start <= $zogen)print('<dd>法階昇進請願書</dd>');
  if($start > $zogen && $zogen >= $end){
    print('<dd>座元職請願書</dd>');
    

    print('<br><dt>住職。副住職請願の手続きが必要です。</dt>'); //住職。副住職請願の手続き
    print('<dt>いずれかをチェックして下さい。</dt>');       
    print('<br>');
    
     
   for ($i =0;$i < count($tera);$i++){  
   print('<dd><input type="radio" name="tera" value="'.$tera[$i][0].'"');
   if ($tera[$i][0] === $_SESSION['tera']) { print(' checked');}
   print(' />');
   print($tera[$i][0].'</label>');

  } 

  print('<br>');
  print('<br><dt>寺班を入力してください。</dt>');       //寺班の入力
  print('<br>');
  for ($i =0;$i < count($jihan);$i++){  
    print('<input type="radio" name="jihan" value="'.$jihan[$i][0].'"');
    if ($jihan[$i][0] === $_SESSION['jihan']) { print(' checked');}
    print(' />');
    print($jihan[$i][0].'</label>');

  }
    }
 ?>
</div>  

<input type="button" value="前へ" onclick="location.href='houkai40.php'";/> 
<?php 
 if($start > $zogen && $zogen >= $end){    //座元職請願書チェック
 echo '<input type="button" value="次へ" onclick="location.href=\'houkai60.php\'";/>';
 //<input type="submit" value="次へ" onclick="location.href='houkai60.php'";/>
 }
 ?>                                

  


</body>
</html>