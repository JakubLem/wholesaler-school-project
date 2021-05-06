<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$GLOBALS['header'] = 4;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/contact.css">
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once(__DIR__. '/top.php');
?>
<script>
    let old_class_name = "register-form-form";
    let new_class_name = "register-form-form-invalid";
</script>
<script src="scripts/red_form.js"></script>
<form name="contact-form" class="register-form-form-parent" action="forms/contact_message.php" method="post" onsubmit="return contact_validate()">
    <input class="register-form-form" type="text" id="user_email" name="user_email" placeholder="Adres email">
    <input class="register-form-form" type="text" id="title" name="title" placeholder="Temat">
    <textarea class="message-register-form-form" id="message" name="message" placeholder="Treść wiadomości"></textarea>
    <input class="register-form-form" type="submit" value="Wyślij">
    <p id="contact_error_response"></p>
</form>
<script src="scripts/validators/functions.js"></script>
<script src="scripts/validators/contact.js"></script>
<?php
if(isset($_SESSION['contact_message'])){
    ?>
        <div class="register_ok">
            <h2>Wysłano wiadomość!</h2>
        </div>
    <?php
    unset($_SESSION['contact_message']);
}
@include_once(__DIR__. '/stop.php');
?>
