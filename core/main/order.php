<?php
$GLOBALS['header'] = 5;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<?php
@include_once(__DIR__. '/top.php');
@include_once(__DIR__.'/forms/classes/Order.php');
@include_once(__DIR__.'/forms/classes/OrderedProduct.php');

if(isset($_GET['order_id'])){
    if(order_user_check($_SESSION['user_identifier'], $_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $ordered_products = get_ordered_producs_by_order_id($order_id);
        ?>
            <table class="products-table">
                <thead>
                    <tr>
                        <?php
                            $header = array(
                                "Nazwa produktu",
                                "Cena produktu",
                                "Liczba kupionych",
                                "Cena łącznie",
                                "Pokaż produkt"
                            );
                            foreach ($header as &$col_name) {
                                echo '<th class="head-row">'.$col_name.'</th>';
                            }
                        ?>
                    <tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($ordered_products as &$product) {
                            echo "<tr>";
                            echo '<th class="value-name">'.$product->product_name."</th>";
                            echo '<th class="value">'.$product->product_price."</th>";
                            echo '<th class="value">'.$product->ordered_quantity."</th>";
                            echo '<th class="value">'.$product->product_price*$product->ordered_quantity."</th>";
                            echo '<th class="value"><a href="show_product.php?product_name='.$product->product_name.'">Pokaż produkt</a></th>';
                            echo "</tr>";
                            // TODO WSP-25 create custom listing quantity
                        }
                    ?>
                </tbody>
            </table>
        <?php
    }
}


?>


