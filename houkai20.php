<?php
session_start();
if (isset($_POST['menu']) === TRUE) { $_SESSION['menu'] = $_POST['menu']; }

$errors=array(); //エラー処理
$opts = array('法階昇進関係','住職請願関係','その他');  //エラー処理
if (isset($_SESSION['menu'])) {
  foreach ($opts as $men) {
    if (!in_array($_SESSION['menu'], $opts)) {
      $errors[] = 'メニューを決められた選択肢の中から選択してください。';
      break;}
  }
}else{
  $errors[] = 'メニューを決められた選択肢の中から選択してください';
}

          
if (count($errors) > 0) {
  die(implode('<br />', $errors).
    '<br />[<a href="houkai10.php">戻る</a>]');
}
$houkai = array(
    array('特住','0', '7,000', '東京都東京市東町1-1-1'),
    array('歴住','2,000,000', '7,000', '東京都東京市東町1-1-1'),
    array('再住','1,000,000', '4,000', '東京都東京市東町1-1-1'),
    array('前住','500,000', '2,500', '東京都東京市東町1-1-1'),
    array('住持','250,000', '2,000', '東京都東京市東町1-1-1'),
    array('東堂','100,000', '1,200', '東京都東京市東町1-1-1'),
    array('西堂','70,000', '1,000', '東京都東京市東町1-1-1'),
    array('塔司','50,000', '800', '東京都東京市東町1-1-1'),
    array('座元','30,000', '600', '東京都東京市東町1-1-1'),
    array('首座','10,000', '400', '東京都東京市東町1-1-1'),
    array('蔵主','5,000', '300', '東京都東京市東町1-1-1'),
    array('侍者','2,000', '200', '東京都東京市東町1-1-1'),
    array('沙弥','1,000', '200', '東京都東京市東町1-1-1'),
);
$shorui = array('証明書','副申下付証明書');
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
   
<h4>メニュー　
<?php print htmlspecialchars($_SESSION['menu'], ENT_QUOTES, 'UTF-8'); ?>


<?php　　　　　　　　　　　　　　　　　　　　// メニューの仕分け
    switch ($_SESSION['menu']) {
      case '法階昇進請願' :
        print('現在の法階を入力してください。');
        break;
      case '住職請願関係' :
        print('現在使用できません');
        break;
      case 'その他' :
        print('現在使用できません');
        break;
      default :
        break;
    }
?>
</h4>
<form action="houkai30.php" method="post">
  <div>
<?php
  print('現在の法階を入力してください。');       //現在法階の入力
  print('<br><br>');
  for ($i =0;$i < count($houkai);$i++){  
    print('<input type="radio" name="houkai_bef" value="'.$houkai[$i][0].'"');
    if ($houkai[$i][0] === $_SESSION['houkai_bef']) { print(' checked');}
    print(' />');
    print($houkai[$i][0].'</label>');

  }
?>　　　　　　　　　　　　　　　　　　　

 <?php   
  print('<dt><br>昇進後の法階を入力してください。</dt><br>');//昇進後法階の入力
  
  for ($i =0;$i < count($houkai);$i++){
    print('<input type="radio" name="houkai_aft" value="'.$houkai[$i][0].'"');
    if ($houkai[$i][0] === $_SESSION['houkai_aft']) { print(' checked');}
    print(' />');
    print($houkai[$i][0].'</label>');
  }
  print('<br><br>');
?>

<?php   
  //$_SESSION['shorui[]']= array();                //$_SESSION['animal']を初期化
  print('<dt><br>必要書類にチェックを入力してください。</dt>');//必要書類の入力
  
  foreach ($shorui as $shor ){
    print('<dd><input type="checkbox" name="shorui[]" value="'.$shor.'"');
    if (isset($_SESSION['shorui[]']) === False){print('<br>');}
    else{
      foreach ($_SESSION['shorui[]'] as $sho){             //前の必要書類の表示
        if($shor === $sho){ print(' checked');}
      
     }
    }
    print(' />');
    print($shor.'</label><br>');
  }
  print('<br><br>');
?>
</div>
<input type="button" value="前へ" onclick="location.href='houkai10.php'";/>
<input type="submit" value="次へ"/>
</form>


</body>
</html>