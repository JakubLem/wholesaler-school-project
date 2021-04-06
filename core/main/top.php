</head>
<body>
<?php

@include_once('connect_db.php');

@include_once(__DIR__. '/header.php');
if(!isset($_SESSION['ability_checker'])) {
    $_SESSION['ability_checker'] = 0;
}
?>

<script>
    let ABILITY_CHECKER = <?php echo $_SESSION['ability_checker']; ?> ;
</script>