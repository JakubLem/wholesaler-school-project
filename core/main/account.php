<?php
$GLOBALS['header'] = 5;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once(__DIR__. '/top.php');
print_r($_SESSION);
if(isset($_SESSION['register_ok'])) {
    if($_SESSION['register_ok'] == "OK") {
        ?>
            <div class="register_ok">
                <h2>Poprawnie utworzono konto!</h2>
                <h3>Możesz się teraz zalogować!</h3>
                <div class="login-register-form-master">
                    <div class="login-register-form-slave">
                        <div class="login-form">
                            <?php
                                @include_once(__DIR__. '/login.php');
                            ?>
                        </div>
                    </div>
                </div>
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
