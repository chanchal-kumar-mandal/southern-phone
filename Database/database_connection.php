<?php
function databaseConnection()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ChanchalMandal_Characters";

	// Create connection
	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $conn;
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
	// $conn = null;
}
?>