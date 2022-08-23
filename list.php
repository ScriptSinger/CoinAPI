<?php
header("Cache-control: public");
header("Cache-control: max-age=60");
include_once('lib/curl.php');
$parameters = [
    'limit' => '10',
    'convert' => 'USD,RUB'
];
$qs = http_build_query($parameters);
$c = Curl::app('https://sandbox-api.coinmarketcap.com')
    // $c = Curl::app('https://pro-api.coinmarketcap.com')
    ->add_headers([
        'X-CMC_PRO_API_KEY: 9d7c1d9f-844e-4cdb-8e9f-07646dd969e0',
        'Accept: application/json; charset=utf-8',
    ]);

$data = $c->request("v1/cryptocurrency/listings/latest?$qs");
$response = json_decode($data['html'], 1);
include "view.php";
