<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Service\ReportA;
use App\Service\ReportB;
use App\Service\RulesFilter;
use App\Service\Utils;


class ReportController extends AbstractController
{
    
    public function __construct(Utils $utils, ReportA $reportA, ReportB $reportB, RulesFilter $rulesFilter)
    {
        $this->utils = $utils;
        $this->reportA = $reportA;
        $this->reportB = $reportB;
        $this->rulesFilter = $rulesFilter;
    }
    
    /**
     * @Route("/reports", name="reports")
     */
    public function index(Request $request)
    {
       
        $min=$request->query->get('min');
        $max=$request->query->get('max');
        $count=$request->query->get('count');
        $minStr=$request->query->get('minstr');
        $maxStr=$request->query->get('maxstr');
              
        $dataA= $this->reportA->getData($min,$max,$count);
        $dataB= $this->reportB->getData($minStr,$maxStr,$count);
        
        $filteredData = $this->rulesFilter->filterData($dataA, $dataB);
       
        $this->utils->saveCSVfile($filteredData,'wyniki.csv');
        
        $response = new Response(null);
        
        return $response;
    }
}
