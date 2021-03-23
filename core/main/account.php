<?php
$GLOBALS['header'] = 5;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<script>
let old_class_name = "register-form-form";
let new_class_name = "register-form-form-invalid";
</script>
<script src="scripts/red_form.js"></script>

<?php
@include_once(__DIR__. '/top.php');

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
        if($_SESSION['response_code'] == 'null_values') {
            @include_once(__DIR__. '/login_and_register.php');
        ?>
        <script>
            let identifiers = new Array();
            <?php
                foreach ($_SESSION['null_array'] as &$value) {
                    ?>
                        identifiers.push(String("<?php echo $value; ?>"));
                    <?php
                }
            ?>
            make_inputs_red(
                identifiers,
                "register_error_response"
            );
        </script>

        <?php
        }
    }
    unset($_SESSION['register_ok']);
} else if(isset($_SESSION['login'])) {
    if($_SESSION['login'] == "OK") {
        ?>
            <div class="hello-div">
                <p class="hello">Witaj <?php echo $_SESSION['user_name'] ?>!</p>
            </div>
        <?php
        @include_once(__DIR__.'/forms/classes/Cart.php');
        $_SESSION['cart'] = get_product_identifiers_from_user_cart($_SESSION['user_identifier']);

        ?>
            <div class="grid-container">
                <div class="center-container">

                </div>
                <div class="data">
                    <p>Dane konta</p>
                </div>
                <div class="orders">
                    Twoje zamówienia
                </div>
                <div class="cart">
                    Twój koszyk
                </div>
            </div>
        <?php


    } else if($_SESSION['login'] == "INVALID") {
        @include_once(__DIR__. '/login_and_register.php');
        ?>
        <script src="scripts/account_login.js"></script>
        <script>
            catch_login_errors(String("<?php echo $_SESSION['response_code']; ?>"));
        </script>
        <?php
    }
} else {
    @include_once(__DIR__. '/login_and_register.php');
    if(isset($_SESSION['response_code'])){
        if($_SESSION['response_code'] == 'EMAIL_EXISTS') {
        ?>
            <script>
                let register_false_obj = document.getElementById("register_error_response");
                register_false_obj.innerHTML = "Jest już konto zarejestrowane na podany adres e-mail!";
            </script>
        <?php
        }
    }
    
}
@include_once(__DIR__. '/stop.php');
?>
