<?php require_once './encode.php'; 
session_start();
$_SESSION['shorui[]']= array();                //$_SESSION['animal']を初期化
if (isset($_POST['houkai_bef']) === TRUE) { $_SESSION['houkai_bef'] = $_POST['houkai_bef']; }
if (isset($_POST['houkai_aft']) === TRUE) { $_SESSION['houkai_aft'] = $_POST['houkai_aft']; }
if (isset($_POST['shorui']) === TRUE) { $_SESSION['shorui[]'] = $_POST['shorui']; }

$errors=array(); //エラー処理
$opts = array('特住','歴住','再住','前住','住持','東堂','西堂','塔司','座元','首座','蔵主','侍者','沙弥');  //エラー処理
if (isset($_SESSION['houkai_bef'])) {
  foreach ($opts as $hoka) {
    if (!in_array($_SESSION['houkai_bef'], $opts)) {
      $errors[] = '現在の法階をを決められた選択肢の中から選択してください。';
      break;}
  }
}else{
  $errors[] = '現在の法階をを決められた選択肢の中から選択してください。';
}

if (isset($_SESSION['houkai_aft'])) {
  foreach ($opts as $hoka) {
    if (!in_array($_SESSION['houkai_aft'], $opts)) {
      $errors[] = '昇進後の法階をを決められた選択肢の中から選択してください。';
      break;}
  }
}else{
  $errors[] = '昇進後の法階をを決められた選択肢の中から選択してください。';
}
for($i =0;$i < count($opts);$i++){
  if($opts[$i] == $_SESSION['houkai_bef']) $be=$i;
   //print('$be');
 }
for($i =0;$i < count($opts);$i++){
  if($opts[$i] == $_SESSION['houkai_aft']) $af=$i;
  //print('$af');
  
}
if($be <= $af){$errors[] = '入力に間違いがあります。';}  

if (count($errors) > 0) {
  die(implode('<br />', $errors).
    '<br />[<a href="houkai20.php">戻る</a>]');
}
$shorui2 = array(
    array('証明書','1000'),
    array('副申下付証明書','1000'),
);

$houkai2 = array(
    array('特住','0', '7000', '東京都東京市東町1-1-1'),
    array('歴住','2000000', '7000', '東京都東京市東町1-1-1'),
    array('再住','1000000', '4000', '東京都東京市東町1-1-1'),
    array('前住','500000', '2500', '東京都東京市東町1-1-1'),
    array('住持','250000', '2000', '東京都東京市東町1-1-1'),
    array('東堂','100000', '1200', '東京都東京市東町1-1-1'),
    array('西堂','70000', '1000', '東京都東京市東町1-1-1'),
    array('塔司','50000', '800', '東京都東京市東町1-1-1'),
    array('座元','30000', '600', '東京都東京市東町1-1-1'),
    array('首座','10000', '400', '東京都東京市東町1-1-1'),
    array('蔵主','5000', '300', '東京都東京市東町1-1-1'),
    array('侍者','2000', '200', '東京都東京市東町1-1-1'),
    array('沙弥','1000', '200', '東京都東京市東町1-1-1'),
);                          //13階級
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>手続き</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
<h3>手続き明細</h3>

<div>
<?php                               
  $houkai_gizai = 0;                 //初期化
  $kousi = 0;
  $zogen = 8;
  $shoumei = 0;
                                       //該当法階の決定
  for ($i =0;$i < count($houkai2);$i++){ 
    
    if($_POST['houkai_bef']==$houkai2[$i][0]){//現在の法階
      $start=$i;
    }
    if($_POST['houkai_aft']==$houkai2[$i][0]){//昇進後の法階
      $end=$i;
    }
  }                                            //法階昇進のタイトル表示
  print('<'.$houkai2[$start][0].' から '.$houkai2[$end][0].'> の法階昇進');
  print('<br>');

  for($j=$end;$j < $start;$j++){         //法階義財合計算出
     $houkai_gizai += (int)$houkai2[$j][1];
     $kousi += (int)$houkai2[$j][2];
     print('<li>法階義財('.$houkai2[$j][0].') : '.(int)$houkai2[$j][1].'</li>');
     print('<li>毎歳香資('.$houkai2[$j][0].') : '.(int)$houkai2[$j][2].'</li>');
     
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
?>
</div>
<div>
<?php                            
                                 //提出書類
  print('<dt><br>提出書類</dt>');
  if($start > $zogen)print('<dd>法階稟承請願書</dd>');
  if($start > $zogen && $zogen >= $end){
    print('<dd>座元職請願書</dd>');
  }
  if($start <= $zogen)print('<dd>法階昇進請願書</dd>');
 
?>
</div>                                       
<input type="button" value="前へ" onclick="location.href='houkai20.php'";/>

</body>
</html>