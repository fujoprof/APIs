<?php

$url = 'http://10.16.192.9/webservice/rest/server.php';
$token = 'd3442f226d9a7e989bac39da12b6873c';
$functionname = 'core_user_create_users';

$userdata = array(
    'username' => 'test.user34',
    'password' => 'Mocu@2025',
    'firstname' => 'Allah',
    'middlename' => 'Fujo',
    'lastname' => 'Akbar',
    'email' => 'allahakibar34@gmail.com',
    'phone1' => '+255716961807'
);

$post = array('wstoken' => $token, 'wsfunction' => $functionname, 'moodlewsrestformat' => 'xml', 'users' => array($userdata));

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


//... your previous code here...

$response = curl_exec($ch);
curl_close($ch);

// Load the XML response into a SimpleXML object
$xml = simplexml_load_string($response);

// Extract the user ID and username
if($xml ===  false){
    echo "Failed loading XML\n";
    foreach(libxml_get_errors() as $error) {
        echo "\t", $error->message;
    }
} else {
    $userId = (string)$xml->MULTIPLE->SINGLE->KEY[0]->VALUE;
    $username = (string)$xml->MULTIPLE->SINGLE->KEY[1]->VALUE;

    echo "User ID: " . $userId . "\n";
    echo "Username: " . $username . "\n";
}

?>

