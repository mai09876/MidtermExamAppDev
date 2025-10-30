<?php

require 'dbconfig.php';

// We will get just ONE item. Let's get the item with id = 3 (Dozen Eggs)
// We use a placeholder (?) to make the query safer.
$sql = "SELECT * FROM grocery_items WHERE id = ?";

// Prepare the statement
$stmt = $pdo->prepare($sql);

// Execute the statement, passing the ID we want (3) in an array
$stmt->execute([3]); 

// fetch() gets the *next available row* from the result.
// Since we only selected one, it gets that one.
$item = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($item); // This will print the array for just one item
echo "</pre>";

?>