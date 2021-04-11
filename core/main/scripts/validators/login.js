// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
function login_validate() {
    let form = document.forms["login-form"];
    let user_email = {'name': 'login_user_email', 'value': form['login_user_email'].value};
    let user_password = {'name': 'login_user_password', 'value': form['login_user_password'].value};

    let array = new Array(
        user_email,
        user_password
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
