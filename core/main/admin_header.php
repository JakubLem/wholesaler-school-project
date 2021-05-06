<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$html_header = array(
    'Dodaj administratora',
    'Zamówienia',
    'Użytkownicy',
    'Administratorzy',
    'Wróć na stronę sklepu',
    'Wyloguj'
);

?>

<div class="header sticky">
    <a id="identifier-header-1" href="/wholesaler-school-project/core/main/admin_add_admin.php" class="active"><?php echo $html_header[0]; ?></a>
    <a id="identifier-header-2" href="/wholesaler-school-project/core/main/admin_orders.php"><?php echo $html_header[1]; ?></a>
    <a id="identifier-header-3" href="/wholesaler-school-project/core/main/admin_users.php"><?php echo $html_header[2]; ?></a>
    <a id="identifier-header-4" href="/wholesaler-school-project/core/main/admin_admins.php"><?php echo $html_header[3]; ?></a>
    <a id="identifier-header-5" href="/wholesaler-school-project/core/main/main_page.php"><?php echo $html_header[4]; ?></a>
    <?php
        if(isset($_SESSION['admin-login'])) {
            if($_SESSION['admin-login'] == "OK") {
                ?>
                    <a id="identifier-header-logout" style="float: right;" href="/wholesaler-school-project/core/main/logout.php" ><?php echo $html_header[5]; ?></a>
                <?php
            }
        }
    ?>
</div>
<div class="header-skip"></div>

<script src="scripts/header.js"></script>

<script>
    let header_id = <?php echo $GLOBALS['header']; ?>;
    let header_len = <?php echo count($html_header); ?>;
    set_header(header_id, header_len);
</script>
