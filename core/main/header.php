<?php

$html_header = array(
    'Strona główna',
    'Nasze towary',
    'Ceny i koszty dostaw',
    'Kontakt',
    'Konto',
    'Wyloguj'
);

?>

<div class="header">
    <a id="identifier-header-1" href="/wholesaler-school-project/core/main/main_page.php" class="active"><?php echo $html_header[0]; ?></a>
    <a id="identifier-header-2" href="/wholesaler-school-project/core/main/products.php"><?php echo $html_header[1]; ?></a>
    <a id="identifier-header-3" href="/wholesaler-school-project/core/main/pricelist.php" ><?php echo $html_header[2]; ?></a>
    <a id="identifier-header-4" href="/wholesaler-school-project/core/main/contact.php" ><?php echo $html_header[3]; ?></a>
    <?php
        if(isset($_SESSION['login'])) {
            if($_SESSION['login'] == "OK") {
                ?>
                    <a id="identifier-header-logout" style="float: right;" href="/wholesaler-school-project/core/main/logout.php" ><?php echo $html_header[5]; ?></a>
                <?php
            }
        }
    ?>
    <a id="identifier-header-5" href="/wholesaler-school-project/core/main/account.php" ><?php echo $html_header[4]; ?></a>
</div>

<script src="scripts/header.js"></script>

<script>
    let header_id = <?php echo $GLOBALS['header']; ?>;
    let header_len = <?php echo count($html_header); ?>;
    set_header(header_id, header_len);
</script>
