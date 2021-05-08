// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
function register_validate() {
    let form = document.forms["register-form"];
    let user_name = {'name': 'user_name', 'value': form['user_name'].value};
    let user_surname = {'name': 'user_surname', 'value': form['user_surname'].value};
    let user_email = {'name': 'user_email', 'value': form['user_email'].value};
    let address_address = {'name': 'address_address', 'value': form['address_address'].value};
    let address_postal_code = {'name': 'address_postal_code', 'value': form['address_postal_code'].value};
    let address_city = {'name': 'address_city', 'value': form['address_city'].value};
    let address_country = {'name': 'address_country', 'value': form['address_country'].value};
    let user_firm_nip = {'name': 'user_firm_nip', 'value': form['user_firm_nip'].value};

    let array = new Array(
        user_name,
        user_surname,
        user_email,
        address_address,
        address_postal_code,
        address_city,
        address_country,
        user_firm_nip
    );

    let response = null_values(array);
    if(response.length != 0) {
        make_inputs_red(
            response,
            "register_error_response",
            "Musisz uzupełnić wszystkie pola w formularzu!"
        );
        return false;
    } else {
        return true;
    }
}
