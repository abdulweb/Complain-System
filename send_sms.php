<?php


//$email = urlencode(addslashes(‘datsammy@gmail.com’));
$password = urlencode("odessey23");
//$type = ‘0’;
//$dlr = ‘0’;
//$destination = urlencode(‘$phone’);
//$sender = urlencode(‘UDUS’);
$message =urlencode("Your complaint has been attended too");

$url = "http://smsgator.com/bulksms?email=datsammy@gmail.com&password=".$password."&type=0&dlr=0&destination=".$phone."&sender=UDUS&message=".$message."&;";

$req = curl_init();
curl_setopt($req, CURLOPT_URL,$url);
curl_exec($req);

$file_name='sms_report.txt';

$current = file_get_contents($url);

// Append to the existing file
$current.= $current;
$current.= "\n";
// Write the contents back to the file

file_put_contents($file_name, $current);

//echo $response;





?>