stop
</body>
</html>
<?php

$sqlTypes = [];
$query = 'SELECT * FROM olejki';
$result = $GLOBALS['database']->make_query($query, []);

foreach($result as $row) {
    print_r($row);
}

@include_once(__DIR__. '/bottom.php');
unset($GLOBALS['database']);
?>
