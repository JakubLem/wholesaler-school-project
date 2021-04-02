


function reset_input(identifier) {
    document.getElementById(identifier).classList.remove(new_class_name);
    document.getElementById(identifier).classList.add(old_class_name);
}

function make_inputs_red(identifiers, pid, response_code) {
    identifiers.forEach(id => {
        document.getElementById(id).classList.remove(old_class_name);
        document.getElementById(id).classList.add(new_class_name);
    });
    document.getElementById(pid).innerHTML = response_code;
}
