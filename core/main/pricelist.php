<?php
$GLOBALS['header'] = 3;
@include_once(__DIR__. '/start.php');
@include_once(__DIR__. '/top.php');

// TODO 

$curl = curl_init();


curl_setopt($curl, CURLOPT_URL, "http://localhost:8000/api/graph/");


curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$output = curl_exec($curl);
// echo $output;

curl_close($curl);

require_once('functions/graphql.php');

$query = <<<'GRAPHQL'
query {
    pricelist (mainIdentifier: "mainwsppricelist"){
        mainIdentifier,
        options {
            maxWeight
            price
        }
    }
}
GRAPHQL;

print_r(graphql_query('http://localhost:8000/api/graph/', $query, [], null));

@include_once(__DIR__. '/stop.php');