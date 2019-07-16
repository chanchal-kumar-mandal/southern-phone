<a href="ChanchalMandal.html" title="ChanchalMandal">Home</a>
<?php
// increase execution time
ini_set('max_execution_time', '7200');
include_once('log_create.php');

// api call using curl
function callAPI($method, $url, $data){
   	$curl = curl_init();

   	switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   	}
   	// OPTIONS:
   	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   	curl_setopt($curl, CURLOPT_URL, $url);
   	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   	));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    curl_close($curl);

    // Create log
    $logMessage = 'Occurence: {"time": ' . date("Y-m-d h:i:sa e") . '}' . PHP_EOL . 'Request: {"method": ' . $method . ', "url": ' . $url . ', "data": '. $data . '}' . PHP_EOL . 'Response: ' . $result . PHP_EOL;
    logCreate($logMessage);
    return $result;
}
?>