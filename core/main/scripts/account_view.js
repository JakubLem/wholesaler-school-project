// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
function switch_account_view(id) {
    let containers = Array.prototype.slice.call(
        document.getElementsByClassName("center-container")[0].children
    );

    let main_id = "center-container-" + String(id).split('-')[String(id).split('-').length-1];

    containers.forEach(element => {
        if(element.id == main_id) {
            element.classList.remove("center-container-off");
            element.classList.add("center-container-on");
        } else {
            element.classList.remove("center-container-on");
            element.classList.add("center-container-off");
        }
    });
}