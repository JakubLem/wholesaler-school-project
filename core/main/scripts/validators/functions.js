function null_values(array) {
    let invalid_keys = new Array();
    array.forEach(element => {
        if(element['value'] == "") {
            invalid_keys.push(element['name']);
        }
    });
    return invalid_keys;
}
