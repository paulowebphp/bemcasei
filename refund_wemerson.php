<?php

$request = new HttpRequest();
$request->setUrl('https://api.moip.com.br/v2/transfers');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'cache-control' => 'no-cache',
  'Connection' => 'keep-alive',
  'Cookie' => 'visid_incap_1716896=aFGxvyHSQsmXJE++7NW8pK4hwlwAAAAAQUIPAAAAAADPDXb78/RoVJig/jQaGvEb; nlbi_1716896=HyUNGtR2zDYOkClPbK/RKQAAAAARt4z+ZPnAfvgrEQpNKDXb; visid_incap_1410616=LmagpYKsQA6aak+aLqU6J5Hi1VwAAAAAQUIPAAAAAADjWShtlKsc+UEogn/fo5/G; nlbi_1410616=UW5DK8z9UDCJ7PPbVa7clAAAAAC/fsxkIyBBTaVdHkXA+uuD; rack.session=BAh7B0kiD3Nlc3Npb25faWQGOgZFVEkiRTJiOTE4MWNhYmQ3ZjdhMjFjYzc2%0ANDExMGE4MGM5Zjc3ZTZmNDgxM2FmNGY0NzAxODBiZTZiZDc5NWFkNjEyMDgG%0AOwBGSSIJaW5pdAY7AEZU%0A--cbc157b911899cb2b1f4e3fb825d1ec99c1307fe',
  'Content-Length' => '153',
  'Accept-Encoding' => 'gzip, deflate',
  'Host' => 'api.moip.com.br',
  'Postman-Token' => '5fb8e074-f8d6-4c13-b978-887bbbfc66ed,f960df58-ae28-4e07-ac01-b210016975ac',
  'Cache-Control' => 'no-cache',
  'Accept' => '*/*',
  'User-Agent' => 'PostmanRuntime/7.17.1',
  'Authorization' => 'Bearer 3e2210bcc9f140188e4c28981525a0c8_v2',
  'Content-Type' => 'application/json'
));

$request->setBody('{  
   "amount":"500",
   "transferInstrument":{  
      "method":"MOIP_ACCOUNT",
      "moipAccount":{  
         "id":"MPA-C855DA2FD924"
      }
   }
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}