<?php
function logCreate($logMessage)
{  
    $logFilename = "ChanchalMandal.log";
    // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
    file_put_contents($logFilename, $logMessage . "\n", FILE_APPEND);
}
?>