stop
</body>
</html>
<?php

echo "ddd";
$db->check_valid();


@include_once(__DIR__. '/bottom.php');

$db->close_connection();

unset($db);

echo "144";
?>
