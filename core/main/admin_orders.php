<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$GLOBALS['header'] = 2;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');
if(isset($_SESSION['admin-login'])){
    include_once(__DIR__.'/forms/classes/Order.php');
    @require_once(__DIR__.'/functions/functions.php');
    $orders = get_all_orders();
    ?>  
        <table class="products-table">
                <thead>
                    <tr>
                        <?php
                            $header = array(
                                "Identyfikator zamówienia",
                                "Identyfikator zamawiającego",
                                "Imię zamawiającego",
                                "Nazwisko zamawiającego",
                                "Adres e-mail",
                                "Liczba produktów",
                                "Łączny koszt",
                                "Status",
                                "Pokaż szczegóły",
                                "Zmień status"
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
                            $user = $order->get_user();
                            echo "<tr>";
                            echo '<th class="value-name">'.$order->identifier."</th>";
                            echo '<th class="value">'.$order->user_id."</th>";
                            echo '<th class="value">'.$user->user_name."</th>";
                            echo '<th class="value">'.$user->user_surname."</th>";
                            echo '<th class="value">'.$user->user_email."</th>";
                            echo '<th class="value">'.count($order->ordered_products)."</th>";
                            echo '<th class="value">'.price_view($order->order_sum_cost)."</th>";
                            echo '<th class="value">'.$order->status."</th>";
                            echo '<th class="value"><a href="order.php?order_id='.$order->identifier.'">Pokaż szczegóły</a></th>';
                            echo '<th class="value"><a href="edit_status.php?order_id='.$order->identifier.'">Edycja</a></th>';
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