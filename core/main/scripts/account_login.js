// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
function catch_login_errors(response_code) {
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
