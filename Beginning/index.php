<?php
require 'functions.php';
//require 'router.php';
require 'Database.php';

$config = require 'config.php';
$db = new Database($config['database']);

$id = $_GET['id'];
// $query = "select * from products where id = {$id}"; //This inline solution would let our code able to suffer MySqlInjection
$query = "select * from products where id = :id"; 

$products = $db->query($query, [':id'=>$id])->fetch();
dd($id);
foreach ($products as $product) {
    echo "<li>{$product['product_title']}</li>";
    echo "<li>{$product['product_description']}</li>";
    echo "<li>\${$product['product_price']}</li>";
    echo "</br>";
}
?>