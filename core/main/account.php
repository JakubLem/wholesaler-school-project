<?php
$GLOBALS['header'] = 5;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once(__DIR__. '/top.php');
print_r($_SESSION);
if(isset($_SESSION['register_ok'])) {
    echo "UDALO SIE";
    if($_SESSION['register_ok'] == "OK") {
        echo "UDALO SIE 2";
        ?>
            <div class="register_ok">
                <h2>Poprawnie utworzono konto!</h2>
            </div>
        <?php
    } else {
        ?>
        <div class="register_false">
            <h2>Nie udało się utworzyć konta!</h2>
        </div>
        <?php
    }
    unset($_SESSION['register_ok']);
} else if(isset($_SESSION['login'])) {
    echo "zalogowano";
} else {
    ?>
        <div class="login-register-form-master">
            <div class="login-register-form-slave">
                <div class="login-form">
                    <?php
                        @include_once(__DIR__. '/login.php');
                    ?>
                </div>
                <div class="register-form">
                    <?php
                        @include_once(__DIR__. '/register.php');
                    ?>
                </div>
            </div>
        </div>
    <?php
}





@include_once(__DIR__. '/stop.php');
?>
