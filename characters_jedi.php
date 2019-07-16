<?php
include_once('call_api.php');

// Fetching films records
$getFilmsData = callAPI('GET', 'https://swapi.co/api/films/', false);
$responseFilms = json_decode($getFilmsData, true);
$dataFilms = $responseFilms['results'];
$filmTitle = 'Return of the Jedi';

// Collect url for title 'Return Of The Jedi'
$urlTitle = '';
foreach ($dataFilms as $key => $value) {
	if ($value['title'] == $filmTitle) {
		$urlTitle = $value['url'];
		break;
	}
}

// Lists all character names in the film 'Return Of The Jedi'
echo "<h2> Lists all character names in the film 'Return Of The Jedi':-</h2>";
echo '<table border="1"><tbody><tr><th>People</th></tr>';

function callSwapiPeople($url, $urlTitle){
   	$getPeopleData = callAPI('GET', $url, false);
	$responsePeople = json_decode($getPeopleData, true);
	$dataPeople = $responsePeople['results'];
	foreach ($dataPeople as $key => $value) {
		if (in_array($urlTitle, $value['films'])) {
			echo '<tr><td>' . $value['name'] . '</td></tr>';
		}
	}

	if (!is_null($responsePeople['next'])) {
		callSwapiPeople($responsePeople['next'], $urlTitle);
	}
	echo '</tbody></table>';
}

// Fetching people records
callSwapiPeople('https://swapi.co/api/people/', $urlTitle);
?>