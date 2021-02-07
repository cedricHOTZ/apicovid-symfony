<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

//Appel à l'api
class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function getFranceData(): array
    {
       
        $response = $this->client->request(
            'GET',
            'https://coronavirusapi-france.now.sh/FranceLiveGlobalData'
        );
        return $response->toArray();
        
    }
    //récupère tous les départements
    public function getAllData(): array
    {       
        return $this->getApi('AllLiveData');
        
    }

    public function getApi($var)
    {
       
        $response = $this->client->request(
            'GET',
            'https://coronavirusapi-france.now.sh/' . $var
        );
        return $response->toArray();
        
    }
} 