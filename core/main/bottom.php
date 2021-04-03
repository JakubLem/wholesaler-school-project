<footer>
    <div class="footer-container">
        <div class="col-1">
            <h3>Linki</h3>
            <div class="footer-contact">
                <div class="contact-col-1">
                    <h3>Facebook:</h3>
                </div>
                <div class="contact-col-2">
                    <p>photo</p>
                </div>
            </div>
            <div class="footer-contact">
                <div class="contact-col-1">
                    <h3>Linkedin</h3>
                </div>
                <div class="contact-col-2">
                    <p>photo</p>
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
                    <p>999 999 999</p>
                </div>
            </div>
            <div class="footer-contact">
                <div class="contact-col-1">
                    <h3>Adres email</h3>
                </div>
                <div class="contact-col-2">
                    <p>someemail@email.com</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script>
    // TODO WSP-52
    let body = document.body,
        html = document.documentElement;

    let height = Math.max( body.scrollHeight, body.offsetHeight, 
                        html.clientHeight, html.scrollHeight, html.offsetHeight );
    if(height < 1000) {
        document.getElementsByTagName("footer")[0].style.position = "absolute";
    }
</script>