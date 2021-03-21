<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ReportA {
    
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getData(int $min, int $max, int $count): ? array
    {
          
        $response = $this->client->request(
            'GET',
            "http://www.randomnumberapi.com/api/v1.0/random?min= {$min} &max= {$max} &count= {$count} "
        );
        
        $content = $response->getContent();
        $content = json_decode($content);
      
        return $content;
    }
}