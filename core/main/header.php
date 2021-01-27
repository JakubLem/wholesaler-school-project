<?php

$html_header = array(
    'Strona główna',
    'Nasze towary',
    'Ceny i koszty dostaw',
    'Kontakt',
    'Konto'
);

?>

<div class="header">
    <a id="identifier-header-1" href="/wholesaler-school-project/core/main/main_page.php" class="active"><?php echo $html_header[0]; ?></a>
    <a id="identifier-header-2" href="/wholesaler-school-project/core/main/products.php"><?php echo $html_header[1]; ?></a>
    <a id="identifier-header-3" href="/wholesaler-school-project/core/main/pricelist.php" ><?php echo $html_header[2]; ?></a>
    <a id="identifier-header-4" href="/wholesaler-school-project/core/main/contact.php" ><?php echo $html_header[3]; ?></a>
    <a id="identifier-header-5" href="/wholesaler-school-project/core/main/account.php" ><?php echo $html_header[4]; ?></a>
</div>

<script src="scripts/header.js"></script>

<script>
    let header_id = <?php echo $GLOBALS['header']; ?>;
    let header_len = <?php echo count($html_header); ?>;
    set_header(header_id, header_len);
</script>
<?php
$query = 'SELECT * FROM users';
$result = $GLOBALS['database']->make_query($query, []);

foreach($result as $row) {
    print_r($row);
}
?>