<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>API</h2>
    <form class="form-inline" action="" method="POST">
        <div class="form-group">
            <label for="name">Search User:</label>
            <input type="text" name="search" class="form-control" placeholder="Search User" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Find</button>
    </form>
    <?php
	$appdir = $_SERVER['HTTP_HOST']."/".explode("/",substr($_SERVER['PHP_SELF'],1 ))[0];
    $search = (isset($_POST['search']))?$_POST['search']:'all';
    // $data = array( 'name' => $_POST['name']);
    $url = "http://".$appdir."/pathto/php-curl-rest-api/api/".$search;
    $client = curl_init();
    curl_setopt($client, CURLOPT_URL, $url);
    //curl_setopt($client, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($client, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
    curl_setopt($client, CURLOPT_UNRESTRICTED_AUTH, true);
    curl_setopt($client, CURLOPT_USERPWD, ":");
    //curl_setopt($client, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($client);

    $result = json_decode($response, true);
    foreach ($result['data'] as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            echo $key2.": ".$value2."<br>";
        }
        echo "<br>";
    }
    ?>
</div>
</body>
</html>
