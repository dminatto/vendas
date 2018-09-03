<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

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
}
