<?php
// EXAMPLE CONFIG — copy this file to config.php and fill in your own values.
// config.php is excluded from version control via .gitignore and should
// NEVER be committed with real credentials.

$db_hostname = 'your-db-hostname';
$db_database = 'your-db-name';
$db_username = 'your-db-username';
$db_password = 'your-db-password';

$conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
