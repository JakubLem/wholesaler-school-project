<?php
$GLOBALS['header'] = 2;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<?php
@include_once(__DIR__. '/top.php');
echo "XD";

require_once('forms/classes/Product.php');
$products = get_all_products();
print_r($products);

$header = array(
    "Nazwa produktu",
    "Producent",
    "Stan magazynowy",
    "Cena promocyjna NETTO",
    "Cena główna NETTO"
);

?>

<hr><br>
<table>
    <thead>
        <tr>
            <?php
                foreach ($header as &$col_name) {
                    echo "<th>".$col_name."</th>";
                }
            ?>
        <tr>
    <thead>
        <?php
            foreach ($products as &$product) {
                echo "<tr>";
                $product_list_format = $product->list_format();
                // TODO WSP-24 create product.php relation view
                echo "<th>".$product->product_name."</th>";
                foreach ($product_list_format as &$value) {
                    echo "<th>".$value."</th>";
                }
                echo "<th>Dodaj do koszyka</th>";
                echo "</tr>";
                // TODO WSP-25 create custom listing quantity
            }
        ?>
</table>
<?php






@include_once(__DIR__. '/stop.php');