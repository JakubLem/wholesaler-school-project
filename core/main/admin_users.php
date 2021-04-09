<?php
$GLOBALS['header'] = 3;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');
if(isset($_SESSION['admin-login'])){
    // TODO
    include_once(__DIR__.'/forms/classes/User.php');
    $users = get_all_users();
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
                        foreach ($users as &$user) {
                            echo "<tr>";
                            echo '<th class="value-name">'.$user->identifier."</th>";
                            echo '<th class="value">'.$user->user_name."</th>";
                            echo '<th class="value">'.$user->user_surname."</th>";
                            echo '<th class="value">'.$user->user_email."</th>";
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
