if (isset($_POST['soudoureki']) === TRUE) { $_SESSION['soudoureki'] = $_POST['soudoureki']; }

if (($_SESSION['soudoureki']=='') ){              //僧堂歴エラー処理、セット
  $errors[] = '僧堂歴を決められた選択肢の中から選択してください。';
  }else{
  for ($i =0;$i < count($soudoureki);$i++){ 
    
    if($_SESSION['soudoureki']==$soudoureki[$i][0]){     
      $sou_soudou = $soudoureki[$i][1];
    }
  }  

}

function soudou_check($houkai_aft,$soudou){
        switch ($soudou){
            case 2.5:
                switch ($houkai_aft){
                    case '特住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '歴住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '再住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '前住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '住持':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    
                } ;break;
            case 2:
                switch ($houkai_aft){
                    case '特住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '歴住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '再住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '前住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '住持':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '東堂':  
                        print('西堂職稟承後３年の必要があります。<br>');break;
                  };break;
            case 1.5:
                switch ($houkai_aft){
                    case '特住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '歴住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '再住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '前住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '住持':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '東堂':  
                        print('西堂職稟承後３年の必要があります。<br>');break;
                    case '西堂':  
                        print('塔司職稟承後１年の必要があります。<br>');break;
                  };break;
            case 1:
                switch ($houkai_aft){
                    case '特住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '歴住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '再住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '前住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '住持':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '東堂':  
                        print('西堂職稟承後３年の必要があります。<br>');break;
                    case '西堂':  
                        print('塔司職稟承後１年の必要があります。<br>');break;
                    case '塔司':  
                        print('座元職稟承後１年の必要があります。<br>');break;
                  };break;
            case 0.5:
                switch ($houkai_aft){
                    case '特住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '歴住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '再住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '前住':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '住持':  
                        print('東堂職稟承後５年の必要があります。<br>');break;
                    case '東堂':  
                        print('西堂職稟承後３年の必要があります。<br>');break;
                    case '西堂':  
                        print('塔司職稟承後１年の必要があります。<br>');break;
                    case '塔司':  
                        print('座元職稟承後１年の必要があります。<br>');break;
                    case '座元':  
                        print('首座職稟承後１年の必要があります。<br>');break;
                  };break;

            }
    }