function null_values(array) {
    let invalid_keys = new Array();
    array.forEach(element => {
        if(element['value'] == "") {
            invalid_keys.push(element['name']);
        }
    });
    return invalid_keys;
}


function validateEmail(mail) {
    // TODO
    let regcheck = new RegExp("[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:.[a-zA-Z0-9-]+)");
    if(regcheck.test(mail)){
        return true;
    } else {
        return false
    }
}
