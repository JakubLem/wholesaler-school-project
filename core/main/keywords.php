<?php

if(isset($GLOBALS['header'])) {
    $key_words = "wholesaler, hurtownia, ";
    switch ($GLOBALS['header']) {
        case 1:
            $key_words .= "o nas";
            break;

        case 2:
            $key_words .= "produkty";
            break;

        case 3:
            $key_words .= "transport, dostawy";
            break;

        case 4:
            $key_words .= "kontakt";
            break;

        case 5:
            $key_words .= "konto";
            break;
            
        default:
            break;
    }

    ?>
        <meta name="keywords" content="<?php echo $key_words; ?>">
        <meta name="author" content="Jakub Lemiesiewicz">
    <?php
}
?>
