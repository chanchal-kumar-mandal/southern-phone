<?php
include_once('Database/database_connection.php');
include_once('log_create.php');
$pdo = databaseConnection();

// Check request from
if (isset($_POST['add_character']) && $_POST['add_character'] == 'addCharacter') {
	addCharacter($pdo, $_POST);
} else{
	getCharacters($pdo);
}


function getCharacters($pdo)
{
	$stmt = $pdo->prepare("SELECT * FROM characters"); 
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
	  	// fetch all rows into an array.
		$rows = $stmt->fetchAll();
		$htmlContent = '<table border="1"><tbody><tr><th>Id</th><th>Name</th><th>Height</th><th>Mass</th><th>Hair Color</th><th>Skin Color</th><th>Eye Color</th><th>Birth Year</th><th>Gender</th><th>Homeworld Name</th><th>Species Name</th></tr>';
	    foreach ($rows as $rs) 
	    {
	        $htmlContent .= '<tr><td>' . $rs['id'] . '</td><td>' . $rs['name'] . '</td><td>' . $rs['height'] . '</td><td>' . $rs['mass'] . '</td><td>' . $rs['hair_color'] . '</td><td>' . $rs['skin_color'] . '</td><td>' . $rs['eye_color'] . '</td><td>' . $rs['birth_year'] . '</td><td>' . $rs['gender'] . '</td><td>' . $rs['homeworld_name'] . '</td><td>' . $rs['species_name'] . '</td></tr>';
	    }
	    $htmlContent .= '</tbody></table>';
	} else {
	   $htmlContent = '<tr><td colspan="11">No character found.</td></tr>';
	}

	$response = json_encode($htmlContent);

	// Create log
    $logMessage = 'Occurence: {"time": ' . date("Y-m-d h:i:sa e") . '}' . PHP_EOL . 'Request: {"method": GET, "url": ' . $_SERVER['PHP_SELF'] . ', "function": getCharacters}' . PHP_EOL . 'Response: ' . $response . PHP_EOL;
    logCreate($logMessage);

	echo $response;
}

function addCharacter($pdo, $POST)
{	
	$name = $POST['name'];
	$height = $POST['height'];
	$mass = $POST['mass'];
	$hair_color = $POST['hair_color'];
	$skin_color = $POST['skin_color'];
	$eye_color = $POST['eye_color'];
	$birth_year = $POST['birth_year'];
	$gender = $POST['gender'];
	$homeworld_name = $POST['homeworld_name'];
	$species_name = $POST['species_name'];

	if (!empty($name) && !empty($height) && !empty($mass) && !empty($hair_color) && !empty($skin_color) && !empty($eye_color) && !empty($birth_year) && !empty($gender) && !empty($homeworld_name) && !empty($species_name)) {

		try { 
	        // Used PDO prepared statement to prevent mysql injection
			$sql = "INSERT INTO characters (name, height, mass, hair_color, skin_color, eye_color, birth_year, gender, homeworld_name, species_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $pdo->prepare($sql);
			$response = $stmt->execute([$name, $height, $mass, $hair_color, $skin_color, $eye_color, $birth_year, $gender, $homeworld_name, $species_name]); 
	    } catch(PDOExecption $e) { 
	        $response = $e->getMessage(); 
	    } 
	} else {
	    echo json_encode(array('success' => 0));
	    $response = "Error in form data."; 
	}

	// Create log
    $logMessage = 'Occurence: {"time": ' . date("Y-m-d h:i:sa e") . '}' . PHP_EOL . 'Request: {"method": POST, "url": ' . $_SERVER['PHP_SELF'] .', "function": addCharacter, "data": '. json_encode($POST) . '}' . PHP_EOL . 'Response: ' . $response . PHP_EOL;
    logCreate($logMessage);

    // Send response
    if ($response) {
    	echo json_encode(array('success' => 1));
    } else {
    	echo json_encode(array('success' => 0));
    }
}
?>