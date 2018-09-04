<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use DateTime;

class functions{

    public static function mask($val, $mask){
        $maskared = '';
        $k = 0;

        for($i = 0; $i<=strlen($mask)-1; $i++){
            if($mask[$i] == '#'){
                if(isset($val[$k]))
                    $maskared .= $val[$k++];
            } else{
                    if(isset($mask[$i]))
                        $maskared .= $mask[$i];
                }
            }

        return $maskared;
    }

    public static function telephone($number){

        $number="(".substr($number,0,2).") ".substr($number,2,-4)." - ".substr($number,-4);
        
        return $number;
    }

    public static function calc_price($qtd, $value){
        
        $result = $qtd * $value;
        
        return $result;
    } 

    public static function calc_age($dtemployed){
        $date = new DateTime( "$dtemployed" ); 
        $interval = $date->diff( new DateTime() );
        
        return $interval->y;
    }

    public static function calc_commission($age, $type, $value){
        
        if ($age < 5){
            switch ($type){
                case 'P':
                    $percent = 0.10;
                    break;
                case 'S':
                    $percent = 0.20;
                    break;
            }
        }else{
            $percent = 0.30;
        }

        $commission = $value * $percent;

        return $commission;
    }

}
