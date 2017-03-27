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

  print('<dt><br>住職義財　　　　：'.$gizai);   
  print('<dt>法脈相承式経営料 : 85000');   //法脈相承式経営料
  print('<dt>合計　　　　　　 : '.($gizai + 85000));   
  print('<br><br>');

    ?>
<input type="button" value="前へ" onclick="location.href='houkai40.php'";/>

</body>
</html>