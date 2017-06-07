<?php

ini_set('display_errors', 1); error_reporting(-1);

$servername = "69.90.161.65";
$username = "thewh134_super";
$password = "Super01";
$dbname = "thewh134_sense";

$flag = "true";
$currentTable = "notification";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE $currentTable SET flag='$flag' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Notification sent";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>


