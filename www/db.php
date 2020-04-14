<?php

function db_connect() {
    $config = parse_ini_file("../realm.ini", true);

    // Prepare the database
    $hostname = "{$config["mysql"]["hostname"]}:{$config["mysql"]["port"]}";
    $username = $config["mysql"]["username"];
    $password = $config["mysql"]["password"];
    $database = $config["mysql"]["database"];

    $conn = new mysqli($hostname, $username, $password, $database);
    
    if ($conn->connect_error) {
        die( 'Connection failed: ' . $conn->connect_error );
    }
    return $conn;
}

function db_close( $conn ) {
    $conn->close();
}

function get_project( $conn, $id ) {
    $query = 'SELECT * FROM project WHERE id=' . $id;
    $result = $conn->query( $query );
    return $result->fetch_assoc();
}

function get_projects( $conn ) {
    $query = 'SELECT * FROM project';
    $result = $conn->query( $query );
    return $result;
}

function get_projects_by_department( $conn, $department ) {
    $query = 'SELECT * FROM project WHERE department=\'" . $department . "\'';
    $result = $conn->query( $query );
    return $result;
}
?>
