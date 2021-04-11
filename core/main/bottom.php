<!--
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
-->
<?php
@require_once("get_static_data.php")
?>
<footer>
    <div class="footer-container">
        <div class="col-1">
            <h3>Linki</h3>
            <div class="footer-contact">
                <div class="contact-col-1">
                    <h3>Facebook</h3>
                </div>
                <div class="contact-col-1">
                <h3>Instagram</h3>
                </div>
            </div>
            <div class="footer-contact">
                <div class="contact-col-1">
                    <h3>Linkedin</h3>
                </div>
                <div class="contact-col-1">
                <h3>Twitter</h3>
                </div>
            </div>
        </div>
        <div class="col-2">
            <h2>Projekt na cele szkolne</h2>
            <h3>Jakub Lemiesiewicz IV D</h3>
            <p>Zespół Szkół Komunikacji im. Hipolita Cegielskiego</p>
        </div>
        <div class="col-3">
            <h2>Kontakt</h2>
            <div class="footer-contact">
                <div class="contact-col-1">
                    <h3>Nr telefonu</h3>
                </div>
                <div class="contact-col-2">
                    <p><?php echo get_value_by_key("phone_number"); ?></p>
                </div>
            </div>
            <div class="footer-contact">
                <div class="contact-col-1">
                    <h3>Adres email</h3>
                </div>
                <div class="contact-col-2">
                    <p><?php echo get_value_by_key("email"); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    // TODO WSP-52
    let body = document.body;
    let html = document.documentElement;

    let height = Math.max(
        body.scrollHeight,
        body.offsetHeight, 
        html.clientHeight,
        html.scrollHeight,
        html.offsetHeight
    );
    if(height < 1000) {
        document.getElementsByTagName("footer")[0].style.position = "absolute";
    }
</script>

<script>
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
</script>
<div id="fixedContainer"><img width="80" height="80" src="/wholesaler-school-project/core/main/files/photos/disability.jpg" onclick="ability_switch()">
