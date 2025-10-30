<?php

// This line brings in the $pdo variable from your dbconfig.php
require 'dbconfig.php';

// This is the SQL query to get everything from your table
$sql = "SELECT * FROM grocery_items";

// query() is a simple way to run a 'SELECT' query and get the results
$stmt = $pdo->query($sql);

// fetchAll() gets all rows from the result and puts them into an array.
// PDO::FETCH_ASSOC makes it an associative array (using column names as keys).
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

// The <pre> tag makes the array output clean and readable.
echo "<pre>";
print_r($items); // print_r() displays the contents of an array.
echo "</pre>";

?>