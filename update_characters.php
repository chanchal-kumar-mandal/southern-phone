<a href="ChanchalMandal.html" title="ChanchalMandal">Home</a>
<a href="import_characters.php" title="Characters" class="btn btn-primary">Characters</a><br>

<?php
include_once('Database/database_connection.php');
include_once('log_create.php');
$pdo = databaseConnection();

$response = '';
try { 
    $stmt = $pdo->prepare("SELECT c.* FROM `characterupdates` cu inner join characters c on c.id = cu.id"); 
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
	  	// fetch all rows into an array.
		$rows = $stmt->fetchAll();
		$rowCount = $stmt->rowCount();
		// collect orginal data for log
		$response = 'Original Data: ' . json_encode($rows);

		// Update characters data
	    $stmt = $pdo->prepare("UPDATE characters c
		INNER JOIN characterupdates cu ON (c.id = cu.id)
		SET c.name = cu.name, c.height = cu.height, c.mass = cu.mass, c.hair_color = cu.hair_color, c.skin_color = cu.skin_color, c.eye_color = cu.eye_color, c.birth_year = cu.birth_year, c.gender = cu.gender, c.homeworld_name = cu.homeworld_name, c.species_name = cu.species_name"); 
		$result = $stmt->execute();
		if ($result) {
			echo $rowCount . ' character(s) updated.';
		} else{
			$response = 'No character updated.';
		}
	} else {
	   $response = 'No data found to update.';
	}
} catch(PDOExecption $e) { 
    $response = $e->getMessage(); 
}

// Create log for original data
$logMessage = 'Occurence: {"time": ' . date("Y-m-d h:i:sa e") . '}' . PHP_EOL . 'Request: {"url": ' . $_SERVER['PHP_SELF'] .'}' . PHP_EOL . 'Response: ' . $response . PHP_EOL;
logCreate($logMessage);
?>