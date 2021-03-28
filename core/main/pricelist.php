<?php
$GLOBALS['header'] = 3;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/pricelist.css">
<?php
@include_once(__DIR__. '/top.php');

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost:8000/api/graph/");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($curl);

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

$options_data = (graphql_query('http://localhost:8000/api/graph/', $query, [], null));
@include_once(__DIR__.'/forms/classes/Option.php');
$options = get_all_price_list_options($options_data);

if(count($options) == 0) {
    // TODO WSP-43 validation
} else {
    ?>
        <div class="price-list-header"><h1>Cennik transportu</h1></div>
        <div class="price-list-option">
            <div class="max_weight">WAGA DO</div>
            <div class="price">CENA</div>
        </div>

    <?php
        foreach ($options as &$option) {
            echo '<div class="price-list-option">';
            echo '<div class="max_weight">'.$option->max_weight.'</div>';
            echo '<div class="price">'.$option->price.'</div>';
            echo '</div>';
        }
}

@include_once(__DIR__. '/stop.php');
