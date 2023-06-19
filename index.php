<?php

require_once "guzzle.php";

$baseUrl = 'https://reqres.in/api/';
$api = new GuzzleHttp($baseUrl);

echo '========= GET Request ===========================<br>';
function getReq($api){

  $options = [
    'query' => [
      'page' => '2',
    ]
  ];
  
  $res = $api->sendRequest('GET','users',$options);
  echo '<pre>';
  print_r($res);
}

//  getReq($api);

echo '========= POST Request ===========================<br>';

function postReq($api){

  $options = [
    // "headers" => [
    //   "Authorization" => "Bearer TOKEN_VALUE"
    // ],
    'json' => [
      'name' => 'Rajeesh',
      'job' => 'Developer'
    ],
    //another way to pass data
    // 'form_params' => [
    //   'foo' => 'bar',
    //   'baz' => ['hi', 'there!']
    // ]

  ];
  
  $res = $api->sendRequest('POST','users',$options);
  echo '<pre>';
  print_r($res);
}

// postReq($api);

