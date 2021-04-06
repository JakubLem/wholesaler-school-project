<script>
function ability_switch() {
    console.log(ABILITY_CHECKER);
    if(ABILITY_CHECKER == 1){
        console.log("XD");
        document.body.classList.remove("ability-class-on");
        <?php
            $_SESSION['ability_checker'] = 0;
        ?>
    } else {
        document.body.classList.add("ability-class-on");
        <?php
            $_SESSION['ability_checker'] = 1;
        ?>
    }
}
</script>

<div id="fixedContainer"><img width="80" height="80" src="/wholesaler-school-project/core/main/files/photos/disability.jpg" onclick="ability_switch()">
</body>
</html>
<?php
@include_once(__DIR__. '/bottom.php');
unset($GLOBALS['database']);
?>
