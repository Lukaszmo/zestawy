<?php

namespace App\Service;

use App\Service\ReportA;
use App\Service\ReportB;


class RulesFilter {
    
    public function filterData(array $dataA, array $dataB): ? array
    {
        $result = Array();
        
        foreach($dataA as $key => $value) {
            
            $resultX = $this->ruleX($value,$dataB[$key]);
            $resultY = $this->ruleY($value,$dataB[$key]);
            $resultZ = $this->ruleZ($value,$dataB[$key]);
            
            $resultLine = 'Zestaw: '. $value .', '. $dataB[$key];
            $resultLine = $resultLine.', Rule X: ' .$resultX. ', Rule Y: '.$resultY. ', Rule Z: '.$resultZ;
            
            $result[$key] = $resultLine;
        }
        
        return $result;
    }
    
    private function ruleX(int $a, string $b): ?int
    {
        if (strlen($b)<$a) return 1;
        
        return 2;
    }
    
    private function ruleY(int $a, string $b): ?int
    {
        $counter=0;
        
        for ($i = 0; $i < strlen($b); $i++) {
            
            $char=$b[$i];
            if (preg_match('/^[0-9 +-]+$/', $char)) { $counter++; }
        }
        
        if ($counter>$a) return 1;
        
        return 2;
    }
    
    private function ruleZ(int $a, string $b)
    {
        if ($a<15) return 3;
        if ($a>37) return 7;
        
        return;
    }
    
}