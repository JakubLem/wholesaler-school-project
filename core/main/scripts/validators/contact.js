function contact_validate() {
    let form = document.forms["contact-form"];
    let user_email = {'name': 'user_email', 'value': form['user_email'].value};
    let title = {'name': 'title', 'value': form['title'].value};
    let message = {'name': 'message', 'value': form['message'].value};

    let array = new Array(
        user_email,
        title,
        message
    );

    let response = null_values(array);
    if(response.length != 0) {
        make_inputs_red(
            response,
            "contact_error_response",
            "Musisz uzupełnić wszystkie pola w formularzu!"
        );
        return false;
    } else {
        return true;
    }
}