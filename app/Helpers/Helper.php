<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Menu;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }



     public static function randomString($length = 10) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }





}
