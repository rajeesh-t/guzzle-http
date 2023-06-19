<?php
require_once "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class GuzzleHttp{

  private $guzzleClient;  
  private $response;

  function __construct($baseUrl){
    $this->response = [];
    $this->guzzleClient = new Client([
      // Base URI is used with relative requests
      'base_uri' => $baseUrl,
  ]);    
  }

  function sendRequest($type,$endPoint,$options=[]){

    try{
      $response = $this->guzzleClient->request($type, $endPoint, $options);
    }
    catch (RequestException $e){

      $this->response = array(
                            'success' => 0,
                            'message' => $e->getResponse()->getBody()->getContents(),
                            'data'    => '',
                            'code'    => $e->getResponse()->getStatusCode()  
                        );         
    }
    catch (Exception $e) {
      // There was another exception. 
      $this->response = array(
        'success' => 0,
        'message' => $e->getMessage(),
        'data'    => '',
        'code'    => ''  
      );            
    }    

    if(isset($response)){
      
        $this->response = array(
          'success' => 1,
          'message' => '',
          'data'    => json_decode($response->getBody()),
          'code'    => $response->getStatusCode()  
        );        
    }
    return $this->response;
  }

}
