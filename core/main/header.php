<div class="header">
    <a id="identifier-header-1" href="/wholesaler-school-project/core/main/main_page.php" class="active" onclick="header(1)">Strona główna</a>
    <a id="identifier-header-2" href="/wholesaler-school-project/core/main/products.php">Nasze towary</a>
    <a id="identifier-header-3" >Kontakt</a>
</div>

<script>
let header_id = 'identifier-header-'+<?php echo $GLOBALS['header'] ?>;
let element = document.getElementById(header_id);
element.classList.add("active");
</script>