<?php 
session_start();
               //$_SESSION['animal']を初期化
if (isset($_POST['houkai_bef']) === TRUE) { $_SESSION['houkai_bef'] = $_POST['houkai_bef']; }
if (isset($_POST['houkai_aft']) === TRUE) { $_SESSION['houkai_aft'] = $_POST['houkai_aft']; }
if (isset($_POST['shorui']) === TRUE) { $_SESSION['shorui[]'] = $_POST['shorui']; }
if (isset($_POST['soudoureki']) === TRUE) { $_SESSION['soudoureki'] = $_POST['soudoureki']; }
if (isset($_POST['age']) === TRUE) { $_SESSION['age'] = $_POST['age']; }

?>

<?php




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
                                 //提出書類
  print('<dt><br>提出書類</dt>');
  

?>
</header>
<body>


<input type="button" value="前へ" onclick="location.href='houkai50.php'";/>
<input type="submit" value="次へ" onclick="location.href='houkai60.php'";/>

</body>
</html>