// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
function change_password_validate() {
    let form = document.forms["edit-password-form"];
    let user_old_password = {'name': 'user_old_password', 'value': form['user_old_password'].value};
    let user_new_password = {'name': 'user_new_password', 'value': form['user_new_password'].value};
    let user_new_password_re = {'name': 'user_new_password_re', 'value': form['user_new_password_re'].value};

    let array = new Array(
        user_old_password,
        user_new_password,
        user_new_password_re
    );

    let response = null_values(array);
    if(response.length != 0) {
        make_inputs_red(
            response,
            "login_error_response",
            "Musisz uzupełnić wszystkie pola w formularzu!"
        );
        return false;
    } else {
        return true;

        // TODO
        // if(!validateEmail(user_email)) {
        //     make_inputs_red(
        //         ['login_user_email'],
        //         "login_error_response",
        //         "Niepoprawny format adresu e-mail!"
        //     );
        //     return false;
        // }
        // return true;
    }
}
