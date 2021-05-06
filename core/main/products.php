<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$GLOBALS['header'] = 2;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<?php
@include_once(__DIR__. '/top.php');

require_once('forms/classes/Product.php');

$search_param = "";
if(isset($_SESSION['search_param'])){
    $search_param = $_SESSION['search_param'];
}

$products = get_all_products($search_param);
unset($_SESSION['search_param']);

$header = array(
    "Nazwa produktu",
    "Producent",
    "Stan magazynowy",
    "Cena promocyjna NETTO",
    "Cena główna NETTO",
    "Kup"
);

?>

<br><br><br><br>

<div class="search-location">
    <div class="wrap">
        <form class="search" action="./search_products.php" method="post">
            <input type="text" name="search_param" class="search-term" placeholder="Czego szukasz?">
            <button type="submit" class="search-button">
                🔎
            </button>
        </form>
    </div>
</div>



<table class="products-table">
    <thead>
        <tr>
            <?php
                foreach ($header as &$col_name) {
                    echo '<th class="head-row">'.$col_name.'</th>';
                }
            ?>
        <tr>
    </thead>
    <tbody>
        <?php
            foreach ($products as &$product) {
                echo "<tr>";
                $product_list_format = $product->list_format();
                // TODO WSP-24 create product.php relation view
                echo '<th class="value-name">'.$product->product_name."</th>";
                foreach ($product_list_format as &$value) {
                    echo '<th class="value">'.$value."</th>";
                }
                if(isset($_SESSION['login'])) {
                    if($_SESSION['login'] == "OK") {
                        echo '<th class="buy"><a class="add-cart-link" href="buy.php?id='.$product->identifier.'">🛒</a></th>';
                    }
                }
                echo "</tr>";
                // TODO WSP-25 create custom listing quantity
            }
        ?>
    </tbody>
</table>
<?php






@include_once(__DIR__. '/stop.php');