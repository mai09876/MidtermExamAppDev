<?php

require 'dbconfig.php';

// These are the values we want to insert
$newName = 'Ground Coffee';
$newCategory = 'Pantry';
$newPrice = 7.99;
$newQuantity = 15;

try {
    // We use placeholders (?) instead of putting variables directly in the query.
    // This is a "prepared statement" and is a critical security practice.
    $sql = "INSERT INTO grocery_items (name, category, price, quantity) 
            VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    
    // We pass our variables in an array. The PDO driver safely
    // binds each value to its placeholder.
    // The order in the array MUST match the order of the placeholders.
    $stmt->execute([$newName, $newCategory, $newPrice, $newQuantity]);

    // getMessage() is not for errors here, it's just a string.
    echo "New record created successfully!";
    echo "<br><a href='http://localhost/phpmyadmin/sql.php?server=1&db=grocery&table=grocery_items&pos=0'>Click to view in phpMyAdmin</a>";


} catch (PDOException $e) {
    // Handle any errors that might occur during insertion
    die("Error inserting record: " . $e->getMessage());
}

?>