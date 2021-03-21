<?php

namespace App\Service;


class ReportB {
    
    
    public function getData(int $min, int $max, int $count): ? array
    {
        $data = Array();
        $string = '';
        
        $charArray = array_merge(range('a','z'),range('A','Z'),range(0,9));
        $string= implode($charArray);
        
        for ($i = 0; $i < $count; $i++) {
            
            $strLen = rand($min,$max);
            $str='';
            
            for ($x = 0; $x < $strLen; $x++) {
                
                $char=substr(str_shuffle($string),0,1);
                $str = $str . $char;
            }
            
            $data[$i] = $str;
        }
        
        return $data;
    }
}