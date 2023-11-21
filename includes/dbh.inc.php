<!-- Establishes connection to database -->

<?php
$host = 'localhost';
$dbname = 'madrabbit';
$dbusername = 'madrabbit';
$dbpassword = 'password';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname;", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

/* $dbconn = pg_connect("host=localhost dbname=madrabbit user=madrabbit password=password")
    or die('Could not connect: ' . pg_last_error());
 */