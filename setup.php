#!/usr/bin/php
<?php
print "Welcome Research Realm!\n\n";
$config = parse_ini_file("realm.ini", true);

// Prepare the database
$hostname = "{$config["mysql"]["hostname"]}:{$config["mysql"]["port"]}";
$username = $config["mysql"]["username"];
$password = $config["mysql"]["password"];
$database = $config["mysql"]["database"];

// Hide PHP errors to provide a better flow
$previousErrorLevel = error_reporting();
error_reporting(0);

$connection = new mysqli($hostname, $username, $password);

if ($connection->connect_error)
    die("There was an issue in connecting to the database, here are some details:\n\t" . 
            $connection->connect_error . "\nPlease check your settings in the realm.ini\n");

// Restore previous error state
error_reporting($previousErrorLevel);

$commands = file_get_contents("realm.sql");
$connection->multi_query($commands);

$connection->close();
?>