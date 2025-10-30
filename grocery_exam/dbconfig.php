<?php

// --- Database Credentials ---
// Set the variables for our database connection
$host = 'localhost';        
$dbname = 'grocery';        
$username = 'root';         
$password = '';             

try {
    // This is the line that actually tries to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // This tells PDO to throw an "exception" (a detailed error) if something goes wrong.
    // This is extremely helpful for debugging!
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    // If the 'try' block fails, the 'catch' block will run.
    // It prints a user-friendly error message instead of crashing the script.
    die("Connection failed: " . $e->getMessage());
}
?>