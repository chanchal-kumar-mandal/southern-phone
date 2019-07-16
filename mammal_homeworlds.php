<?php
include_once('call_api.php');

// Collect url for title 'Return Of The Jedi'
$mamalUrlArray = array();
function callSwapiSpecies($url){
	global $mamalUrlArray;
   	$getSpeciesData = callAPI('GET', $url, false);
	$responseSpecies = json_decode($getSpeciesData, true);
	$dataSpecies = $responseSpecies['results'];

	$classificationName = 'mammal';
	foreach ($dataSpecies as $key => $value) {
		if ($value['classification'] == $classificationName) {
			// $mamalUrlArray[] = $value['url'];
			array_push($mamalUrlArray, $value['url']);
		}
	}
	if (!is_null($responseSpecies['next'])) {
		callSwapiSpecies($responseSpecies['next']);
	}
}

// Fetching species records
callSwapiSpecies('https://swapi.co/api/species/');

// Lists all character names in the film 'Return Of The Jedi'
echo "<h2> Lists all characters that are 'mammals' (species) in all Star Wars films:-</h2>";
echo '<table border="1"><tbody><tr><th>People</th><th>Planet</th></tr>';

function callSwapiPeople($url, $mamalUrlArray){
   	$getPeopleData = callAPI('GET', $url, false);
	$responsePeople = json_decode($getPeopleData, true);
	$dataPeople = $responsePeople['results'];
	foreach ($dataPeople as $key => $value) {
		if (!empty($value['species']) && in_array($value['species'][0], $mamalUrlArray)) {
			echo '<tr><td>' . $value['name'] . '</td><td>' .json_decode(callAPI('GET', $value['homeworld'], false), true)['name'] . '</td></tr>';
		}
	}
	if (!is_null($responsePeople['next'])) {
		callSwapiPeople($responsePeople['next'], $mamalUrlArray);
	}
	echo '</tbody></table>';
}

// Fetching people records
callSwapiPeople('https://swapi.co/api/people/', $mamalUrlArray);
?>