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
    if($_SESSION['login'] == "OK") {
        echo "Witaj ".$_SESSION['user_name']."!";
    } else if($_SESSION['login'] == "INVALID") {
        if($_SESSION['response_code'] == "invalid_email") {
            echo "invalid email";
        } else if($_SESSION['response_code'] == "null_email") {
            echo "null_email";
        } else if($_SESSION['response_code'] == "invalid_password") {
            echo "invalid password";
        }
        @include_once(__DIR__. '/login_and_register.php');
    }
} else {
    @include_once(__DIR__. '/login_and_register.php');
}
@include_once(__DIR__. '/stop.php');
?>

