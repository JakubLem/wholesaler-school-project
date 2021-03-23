<?php
$GLOBALS['header'] = 4;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/contact.css">
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once(__DIR__. '/top.php');
?>
<form class="register-form-form-parent" action="forms/contact_message.php" method="post">
    <input class="register-form-form" type="text" name="user_email" placeholder="Adres email">
    <input class="register-form-form" type="text" name="title" placeholder="Temat">
    <textarea class="message-register-form-form" type="" name="message" placeholder="Treść wiadomości"></textarea>
    <input class="register-form-form" type="submit" value="Wyślij">
</form>
<?php
@include_once(__DIR__. '/stop.php');
?>
