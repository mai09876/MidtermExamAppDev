<?php

require 'dbconfig.php';

// We'll delete the item we just added, which has ID = 7
$id_to_delete = 7;

try {
    // Always use a prepared statement with a placeholder (?) for 'WHERE' clauses
    $sql = "DELETE FROM grocery_items WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    
    // Pass the ID to delete in the execute array.
    $stmt->execute([$id_to_delete]);

    echo "Record with ID $id_to_delete was deleted successfully!";
    echo "<br><a href='http://localhost/phpmyadmin/sql.php?server=1&db=grocery&table=grocery_items&pos=0'>Click to view in phpMyAdmin</a>";

} catch (PDOException $e) {
    // Handle any errors
    die("Error deleting record: " . $e->getMessage());
}

?>