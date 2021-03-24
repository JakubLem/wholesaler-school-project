function switch_account_view(id) {
    let containers = Array.prototype.slice.call(
        document.getElementsByClassName("center-container")[0].children
    );

    let main_id = "center-container-" + String(id).split('-')[String(id).split('-').length-1];

    containers.forEach(element => {
        if(element.id == main_id) {
            console.log("popranwe");
            element.classList.remove("center-container-off");
            element.classList.add("center-container-on");
        } else {
            element.classList.remove("center-container-on");
            element.classList.add("center-container-off");
            console.log(element);
        }
    });
}