<?php

function db_connect() {
    $host_name = 'localhost';
    $user_name = 'realm';
    $password  = 'research';
    $db_name = 'research_realm';
    $conn = new mysqli( $host_name, $user_name, $password, $db_name );
    if ( $conn->connect_error ) {
        die( 'Connection failed: ' . $conn->connect_error );
    }
    // For French
    $charset = $conn->set_charset( 'utf8' );
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
