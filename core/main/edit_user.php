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
?>

<form name="register-form" class="register-form-form-parent" action="forms/user_edit_form.php" method="post" onsubmit="return register_validate()">
    <input class="register-form-form" id="user_name" type="text" name="user_name" placeholder="Imię" value="<?php echo $_SESSION['account_view']["Imię"];?>" onclick="reset_input(id)">
    <input class="register-form-form" id="user_surname" type="text" name="user_surname" placeholder="Nazwisko" value="<?php echo $_SESSION['account_view']["Nazwisko"];?>" onclick="reset_input(id)">
    <input class="register-form-form" id="user_email" type="text" name="user_email" placeholder="Adres email" value="<?php echo $_SESSION['account_view']["Adres e-mail"];?>" onclick="reset_input(id)">
    <input class="register-form-form" id="address_address" type="text" name="address_address" placeholder="Ulica/osiedle" value="<?php echo $_SESSION['account_view']["Adres"];?>" onclick="reset_input(id)">
    <input class="register-form-form" id="address_postal_code" type="text" name="address_postal_code" placeholder="Kod pocztowy" value="<?php echo $_SESSION['account_view']["Kod pocztowy"];?>" onclick="reset_input(id)">
    <input class="register-form-form" id="address_city" type="text" name="address_city" placeholder="Miasto" value="<?php echo $_SESSION['account_view']["Miasto"];?>" onclick="reset_input(id)">
    <input class="register-form-form" id="address_country" type="text" name="address_country" placeholder="Kraj" value="<?php echo $_SESSION['account_view']["Państwo"];?>" onclick="reset_input(id)">
    <input class="register-form-form" id="user_firm_nip" type="text" name="user_firm_nip" placeholder="NIP firmy" value="<?php echo $_SESSION['account_view']["Numer NIP firmy"];?>" onclick="reset_input(id)">
    <input class="register-form-form" type="submit" value="Edytuj dane">
    <div class="register_false">
        <p id="register_error_response"></p>
    </div>
<form>
<script src="scripts/validators/functions.js"></script>
<script src="scripts/validators/edit_user.js"></script>
