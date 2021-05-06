<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$GLOBALS['header'] = 4;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');
if(isset($_SESSION['admin-login'])){
    @include_once(__DIR__.'/forms/classes/Admin.php');
    $admins = get_all_admins();
    ?>  
        <table class="products-table">
                <thead>
                    <tr>
                        <?php
                            $header = array(
                                "Identyfikator",
                                "Imię",
                                "Nazwisko",
                                "Adres e-mail"
                            );
                            foreach ($header as &$col_name) {
                                echo '<th class="head-row">'.$col_name.'</th>';
                            }
                        ?>
                    <tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($admins as &$admin) {
                            echo "<tr>";
                            echo '<th class="value-name">'.$admin->identifier."</th>";
                            echo '<th class="value">'.$admin->admin_name."</th>";
                            echo '<th class="value">'.$admin->admin_surname."</th>";
                            echo '<th class="value">'.$admin->admin_email."</th>";
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
