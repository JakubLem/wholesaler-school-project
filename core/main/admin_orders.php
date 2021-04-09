<?php
$GLOBALS['header'] = 2;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');
if(isset($_SESSION['admin-login'])){
    @include_once(__DIR__.'/forms/classes/Order.php');
    $orders = get_all_orders();
    ?>  
        <table class="products-table">
                <thead>
                    <tr>
                        <?php
                            $header = array(
                                "Identyfikator zamówienia",
                                "Imię zamawiającego",
                                "Nazwisko zamawiającego",
                                "Adres e-mail",
                                "Liczba produktów",
                                "Łączny koszt",
                                "Pokaż szczegóły"
                            );
                            foreach ($header as &$col_name) {
                                echo '<th class="head-row">'.$col_name.'</th>';
                            }
                        ?>
                    <tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($orders as &$order) {
                            echo "<tr>";
                            echo '<th class="value-name">'.$order->identifier."</th>";
                            echo '<th class="value">'.$order->user_id."</th>";
                            echo '<th class="value">'.$order->identifier."</th>";
                            echo '<th class="value">'.$order->identifier."</th>";
                            echo '<th class="value"><a href="order.php?order_id='.$order->identifier.'">Pokaż szczegóły</a></th>';
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
    <?php
} else {
    header("Location: ./admin.php");
}
?>