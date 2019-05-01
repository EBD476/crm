<?php

require("phpMQTT.php");

$server = "195.248.241.187";     // change if necessary
$port = 4776;                     // change if necessary
$username = "";                   // set your username
$password = "";                   // set your password
$client_id = "690a8aa4-bb64-486a-a746-bfbfc0a38713"; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	$mqtt->publish("bluerhinos/phpMQTT/examples/publishtest", "Hello World! at " . date("r"), 0);
	$mqtt->close();
} else {
    echo "Time out!\n";
}
