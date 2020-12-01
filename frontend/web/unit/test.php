<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace test;
include_once 'calculator.php';

/**
 * Description of test
 *
 * @author Дмитрий
 */
class Calculatortest {
   public function __construct() {
       self::testAddCorrect();
   }

   public static function testAddCorrect()
    {
        echo 'Running'. __METHOD__ .'<br>';
        $result = Calculator::add(10, 5);
        if($result===15)
        {
            echo'Норм';
        }
        else{
            echo 'Faild : expectd (integer) 15. Result ('. gettype($result),") $result";
        }
        echo '<hr>';
    }
    
}
 new Calculatortest();