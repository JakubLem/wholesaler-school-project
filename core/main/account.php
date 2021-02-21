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
        <div class="register_false">
            <h2>Nie udało się utworzyć konta!</h2>
        </div>

        <?php
        }
    }
    unset($_SESSION['register_ok']);
} else if(isset($_SESSION['login'])) {
    if($_SESSION['login'] == "OK") {
        echo "Witaj ".$_SESSION['user_name']."!";
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
}
@include_once(__DIR__. '/stop.php');
?>
