$name = "pen";
$url = "http://localhost/nottinghamintranet/common/fap/api/".$name;

$client = curl_init();
curl_setopt($client, CURLOPT_URL, $url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
curl_setopt($client, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
curl_setopt($client, CURLOPT_UNRESTRICTED_AUTH, true);
curl_setopt($client, CURLOPT_USERPWD, ":");
$response = curl_exec($client);

$result = json_decode($response);

echo $result->data; 
