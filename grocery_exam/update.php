<?php

require 'dbconfig.php';

$new_price = 4.25;  // The new price we want to set
$item_name = 'Sourdough Bread'; // The item we want to update

try {
    // We'll update the 'price' column WHERE the 'name' matches.
    // Always use placeholders (?) in the WHERE clause.
    $sql = "UPDATE grocery_items SET price = ? WHERE name = ?";

    $stmt = $pdo->prepare($sql);
    
    // Pass the new data in an array.
    // The order MUST match the placeholders: [price, name]
    $stmt->execute([$new_price, $item_name]);

    // rowCount() checks how many rows were affected by the query.
    if ($stmt->rowCount() > 0) {
        echo "Record '$item_name' was updated successfully to $$new_price!";
    } else {
        echo "No record found with the name '$item_name'. No changes made.";
    }
    
    echo "<br><a href='http://localhost/phpmyadmin/sql.php?server=1&db=grocery&table=grocery_items&pos=0'>Click to view in phpMyAdmin</a>";

} catch (PDOException $e) {
    // Handle any errors
    die("Error updating record: " . $e->getMessage());
}

?>