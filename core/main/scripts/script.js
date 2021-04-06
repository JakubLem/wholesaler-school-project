function ability_switch() {
    console.log(ABILITY_CHECKER);
    if(ABILITY_CHECKER){
        document.body.classList.remove("ability-class-on");
        
        ABILITY_CHECKER = false;
    } else {
        document.body.classList.add("ability-class-on");
        ABILITY_CHECKER = true;
    }
}
