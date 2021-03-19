# users

```sql

```

# address

```sql
CREATE TABLE `bazaprojektphp`.`address` ( `address_id` INT NOT NULL AUTO_INCREMENT , `address_city` VARCHAR(100) NOT NULL , `address_address` VARCHAR(200) NOT NULL , `address_postal_code` VARCHAR(100) NOT NULL , `address_country` VARCHAR(100) NOT NULL , PRIMARY KEY (`address_id`)) ENGINE = InnoDB;
```


# manufacturers

```sql
INSERT INTO manufacturers (manufacturer_name) VALUES ('testowa')
INSERT INTO manufacturers (manufacturer_name) VALUES ('Samsung')
INSERT INTO manufacturers (manufacturer_name) VALUES ('Nokia')
```

# products

```sql
CREATE TABLE `bazaprojektphp`.`products` ( `product_id` INT NOT NULL AUTO_INCREMENT , `product_name` VARCHAR(100) NOT NULL , `product_quntity` INT NOT NULL , `product_display_price` FLOAT NOT NULL , `product_netto_price` FLOAT NOT NULL , `product_manufacturer_id` INT NOT NULL , PRIMARY KEY (`product_id`)) ENGINE = InnoDB;
```


```sql
INSERT INTO products (product_name, product_quantity, product_display_price, product_netto_price, product_manufacturer_id) VALUES ('Telefon', 100, 55.99, 55.99, 1)

INSERT INTO products (product_name, product_quantity, product_display_price, product_netto_price, product_manufacturer_id) VALUES ('Bateria testowa', 100, 49.99, 49.99, 2)

INSERT INTO products (product_name, product_quantity, product_display_price, product_netto_price, product_manufacturer_id) VALUES ('Obudowa', 100, 149.99, 149.99, 1)

```