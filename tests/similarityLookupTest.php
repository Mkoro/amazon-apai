<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Edwinmugendi\Amazon\Apai;

$apai = new Apai();
//Set configs
$apai->setConfig('ApiKey', 'XXXX');
$apai->setConfig('ApiSecret', 'XXXX');
$apai->setConfig('AssociativeTag', 'XXXX');
$apai->setConfig('EndPoint', 'webservices.amazon.de');

//Reset parameters first. This is important if you are looping through items
$apai->resetParam();

//Set parameters
$apai->setParam('ItemId', 'ASIN1,ASIN2,ASIN3');
$apai->setParam('SimilarityType', 'Random');

$verbose = true; //Print url sent to Amazon and the results from Amazon

$response = $apai->similarityLookup($verbose);

//Response
var_dump($response);

if ($response['status']) {
    $item_lookup_xml = new \SimpleXMLElement($response['response']);
} else {
    echo $response['response'];
}//E# if else statement