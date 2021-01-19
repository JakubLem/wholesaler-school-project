# Korzystanie z bazy danych:


- Tworzenie obiektu bazy danych:
```php
$dbsname = $_ENV["DATABASE_NAME"];
$dbusername = $_ENV["DBUSERNAME"];
$dbpassword = $_ENV["DBPASSWORD"];
$dbname = $_ENV["DBNAME"];
$db = new MyDatabase($dbsname, $dbusername, $dbpassword, $dbname);
```

- Wykonywanie zapytań:
```php
$db->get_connection();

$db->make_query("SELECT * FROM olejki");
$result = $db->get_last_response();
while($row = $result->fetch_assoc()) {
    print_r($row);
    echo "<br>";
}

$db->close_connection();
```
