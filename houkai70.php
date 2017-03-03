<?php

 class Temple{
    
    private $houkai_bef = '';
    private $houkai_gizai;
    private $kousi;
    private $soudoureki;
    private $age;
    private $juushoku;
    private $shorui;   


    public function __construct($houkai_bef,$houkai_aft,$soudoureki) {
        $this->houkai_bef = $houkai_bef;
        $this->houkai_aft = $houkai_aft;
        //$this->houkai_gizai = $houkai_gizai;
        $this->soudoureki = $soudoureki;
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
 }


    ?>