<?php
    $houkai = array(
    array('特住','0', '7,000'),
    array('歴住','2,000,000', '7,000'),
    array('再住','1,000,000', '4,000'),
    array('前住','500,000', '2,500'),
    array('住持','250,000', '2,000'),
    array('東堂','100,000', '1,200'),
    array('西堂','70,000', '1,000'),
    array('塔司','50,000', '800'),
    array('座元','30,000', '600'),
    array('首座','10,000', '400'),
    array('蔵主','5,000', '300'),
    array('侍者','2,000', '200'),
    array('沙弥','1,000', '200'),
    );
    $shorui = array('証明書','副申下付証明書');
    $age = array(
        array('満27歳以上','27'),
        array('満25歳以上で住職を請願する者、及び満20歳以上で副住職を請願する者','25'),
        array('満8歳以上','8'),
        array('満5歳以上','5'),
        );



    $soudoureki = array(
        array('3年以上','30'),
        array('2年6ケ月以上','25'),
        array('2年以上','20'),
        array('１年6ケ月以上','15'),
        array('１年以上','10'),
        array('6ケ月以上','5'),
        );
 
 class Temple{
    
    private $houkai_bef = '';
    private $houkai_gizai;
    private $kousi;
    private $soudoureki;
    private $age;
    private $juushoku;
    private $shorui;   


    public function __construct($houkai_bef,$houkai_aft,$soudoureki,$age) {
        $this->houkai_bef = $houkai_bef;
        $this->houkai_aft = $houkai_aft;
        //$this->houkai_gizai = $houkai_gizai;
        $this->soudoureki = $soudoureki;
        $this->age = $age;
    }
    function sethoukai($houkai) {
        $this->houkai = (string)filter_var($houkai);
    }
    function get_houkai_bef() {
        return $this->houkai_bef;
    } 
      function get_houkai_aft() {
        return $this->houkai_aft;
    } 
     function get_soudoureki() {
        return $this->soudoureki;
    } 
     function gethoukai_gizai() {
        return $this->houkai_gizai;
    }  
    function get_age() {
        return $this->age;
    } 
 }


    ?>

