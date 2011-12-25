#!/usr/bin/php5

<?php

### script to make all photos private (e.g. if you accidentally upload some 

###
### assumes you've exported your credentials into the environment variables noted
###
$consumerKey = getenv('consumerKey');
$consumerSecret = getenv('consumerSecret');
$token = getenv('token');
$tokenSecret = getenv('tokenSecret');

###
### change value to your own openphoto hostname
###

$host = 'kkweng.openphoto.me';

###
### to list all photos set pageSize to zero
###

$endpoint = '/photos/pageSize-0/list.json';

include 'OpenPhotoOAuth.php';
$client = new OpenPhotoOAuth($host, $consumerKey, $consumerSecret, $token, $tokenSecret);

$allPhotos = json_decode($client->get($endpoint));

if (!$allPhotos->result) {
	echo "Error: " . $allPhotos->message . "\n";
	exit(2);
}

foreach ($allPhotos->result as $myres) {
	$myID = $myres->id;
	$endpoint = "/photo/" . $myID . "/update.json";
	$resp = json_decode($client->post($endpoint, array('permission' => '0')));
	echo "photo<$myID>: code<" . $resp->code . "> message <" . $resp->message . ">\n";
}

?>
