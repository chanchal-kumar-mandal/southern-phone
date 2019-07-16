<?php
include_once('call_api.php');

function getVehiclesFilms($filmsUrlArray){
	$filmsArray = array();
	foreach ($filmsUrlArray as $key => $value) {
		$filmsArray[] =  json_decode(callAPI('GET', $value, false), true)['title'];
	}
	return implode(', ', $filmsArray);
}

// List the name of all vehicles that can have more than 15 characters
echo "<h2> List the name of all vehicles that can have more than 15 characters:-</h2>";
echo '<table border="1"><tbody><tr><th>Vehicle</th><th>Film(s)</th></tr>';

function callSwapiVehicles($url){
   	$getVehiclesData = callAPI('GET', $url, false);
	$responseVehicles = json_decode($getVehiclesData, true);
	$dataVehicles = $responseVehicles['results'];
	foreach ($dataVehicles as $key => $value) {
		if (strlen($value['name']) > 15) {
			echo '<tr><td>' . $value['name'] . '</td><td>' . getVehiclesFilms($value['films']) . '</td></tr>';
		}
	}
	if (!is_null($responseVehicles['next'])) {
		callSwapiVehicles($responseVehicles['next']);
	}
	echo '</tbody></table>';
}

// Fetching vehicles records
callSwapiVehicles('https://swapi.co/api/vehicles/');
?>