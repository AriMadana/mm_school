<?php
// Define variables
$verb = "GET";
$host = "https://api.awhere.com";
$uri  = "/v2/fields";

$access_token = "M0aGrSqgKbVVQ1i2vFHzbZG3x1VUqQRi" //You'll need to follow the example above to get an access token.

$http_headers = array("Authorization: Bearer ".$access_token);


// Set up the cURL request
$curl = curl_init($host.$uri);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $verb);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, true);


// Normally you should not use these cURL options. They disable the SSL Cert
// verification. But many local development environments are not built with
// the standard chain authority certificates, and so cannot verify the Cert.
// If you have troubles making cURL requests, you can uncomment the next two
// lines, but don't put them into production.

// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);



// This fires the cURL request
$response = curl_exec($curl);


if($response === false){
  // if the curl_exec() fails for reason, it means it could not even reach the aWhere server
  // and the function returns FALSE
  echo 'cURL Transport Error (HTTP request failed): '.curl_error($curl);
  die();
} else {
  // curl_getinfo() returns information about the HTTP transaction, used
  // mainly here for getting the status code.
  $info = curl_getinfo($curl);
  $httpStatusCode = $info['http_code'];

  //The cURL settings above will include the HTTP headers in the response
  //This next command explodes the headers into one variable and the actual API response in another
  list($responseHeaders, $responseBody) = explode("\r\n\r\n", $response, 2);

  //Finally, we use json_decode to transform the API response into a native PHP object.
  $result = json_decode($responseBody);
}
curl_close($curl);
?>
