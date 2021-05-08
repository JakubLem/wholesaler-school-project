<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$html_header = array(
    'Logowanie',
    'Wróć na stronę sklepu',
);

?>

<div class="header sticky">
    <a id="identifier-header-1" href="/wholesaler-school-project/core/main/admin.php" class="active"><?php echo $html_header[0]; ?></a>
    <a id="identifier-header-2" href="/wholesaler-school-project/core/main/main_page.php"><?php echo $html_header[1]; ?></a>
</div>
<div class="header-skip"></div>

<script src="scripts/header.js"></script>

<script>
    let header_id = <?php echo $GLOBALS['header']; ?>;
    let header_len = <?php echo count($html_header); ?>;
    set_header(header_id, header_len);
</script>
