<form class="register-form-form-parent" action="forms/user_create_form.php" method="post">
    <input class="register-form-form" id="user_name" type="text" name="user_name" placeholder="Imię" value="" onclick="reset_input(id)">
    <input class="register-form-form" id="user_surname" type="text" name="user_surname" placeholder="Nazwisko" value="" onclick="reset_input(id)">
    <input class="register-form-form" id="user_email" type="text" name="user_email" placeholder="Adres email" onclick="reset_input(id)">
    <input class="register-form-form" id="user_password_1" type="password" name="user_password_1" placeholder="Hasło" onclick="reset_input(id)">
    <input class="register-form-form" id="user_password_2" type="password" name="user_password_2" placeholder="Potwierdź hasło" onclick="reset_input(id)">
    <input class="register-form-form" id="address_address" type="text" name="address_address" placeholder="Ulica/osiedle" onclick="reset_input(id)">
    <input class="register-form-form" id="address_postal_code" type="text" name="address_postal_code" placeholder="Kod pocztowy" onclick="reset_input(id)">
    <input class="register-form-form" id="address_city" type="text" name="address_city" placeholder="Miasto" onclick="reset_input(id)">
    <input class="register-form-form" id="address_country" type="text" name="address_country" placeholder="Kraj" value="Polska" onclick="reset_input(id)">
    <input class="register-form-form" id="user_firm_nip" type="text" name="user_firm_nip" placeholder="NIP firmy" onclick="reset_input(id)">
    <input class="register-form-form" type="submit" value="Rejestrajca">
    <p id="register_error_response"></p>
<form>
