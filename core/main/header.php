<div class="header">
    <a id="identifier-header-1" href="/wholesaler-school-project/core/main/main_page.php" class="active">Strona główna</a>
    <a id="identifier-header-2" href="/wholesaler-school-project/core/main/products.php">Nasze towary</a>
    <a id="identifier-header-3" >Kontakt</a>
</div>

<script src="scripts/header.js"></script>

<script>
    let header_id = <?php echo $GLOBALS['header'] ?>;
    set_header(header_id);
</script>