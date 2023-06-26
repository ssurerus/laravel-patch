<?php
require 'functions.php';
//require 'router.php';
require 'Database.php';

$config = require 'config.php';

$db = new Database($config['database']);
$products = $db->query("select * from products");

foreach ($products as $product) {
    echo "<li>{$product['product_title']}</li>";
    echo "<li>{$product['product_description']}</li>";
    echo "<li>\${$product['product_price']}</li>";
    echo "</br>";
}
?>