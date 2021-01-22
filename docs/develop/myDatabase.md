# Korzystanie z bazy danych:

- Wykonywanie zapytań:
```php
$sqlTypes = [];
$query = 'SELECT * FROM olejki';
$result = $GLOBALS['database']->make_query($query, []);

foreach($result as $row) {
    print_r($row);
}

```