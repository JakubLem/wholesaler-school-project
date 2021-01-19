<?php

echo "bottom";


$db->make_query("SELECT * FROM olejki");
$result = $db->get_last_response();
while($row = $result->fetch_assoc()) {
    print_r($row);
    echo "<br>";
}


echo "bottom";