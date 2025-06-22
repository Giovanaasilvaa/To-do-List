<?php
// Database connection settings
$host = 'localhost';        // Database server address
$db   = 'todo_list';        // Database name
$user = 'root';             // Database username
$pass = '';                 // Database password (empty here)
$charset = 'utf8mb4';       // Character set for encoding (supports emojis and special characters)

// Data Source Name (DSN) string for PDO connection
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Create a new PDO instance to connect to the database
    $conn = new PDO($dsn, $user, $pass);
    
    // Set the PDO error mode to Exception for better error handling
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // If the connection fails, display the error message and exit the script
    echo "Connection error: " . $e->getMessage();
    exit();
}
?>
