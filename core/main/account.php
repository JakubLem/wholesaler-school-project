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
        @include_once(__DIR__. '/login_and_register.php');
        ?>
        <script>
            function catch_login_errors() {
                let response_code = String("<?php echo $_SESSION['response_code']; ?>");
                let login_error_response_text = "";
                let error_check = true;
                switch (response_code) {
                    case "invalid_email":
                        login_error_response_text = "Podałeś niepoprawny adres email!"
                        break;
                    case "null_email":
                        login_error_response_text = "Nie ma zarejestrowanego konta na podany adres email!"
                        break;

                    case "invalid_password":
                        login_error_response_text = "Podałeś niepoprawne hasło!"
                        break;
                
                    default:
                        error_check = false;
                        break;
                }

                if(error_check) {
                    document.getElementById("login_error_response").innerHTML = login_error_response_text;
                }
            }

            catch_login_errors();

        </script>
        <?php
    }
} else {
    @include_once(__DIR__. '/login_and_register.php');
}
@include_once(__DIR__. '/stop.php');
?>
