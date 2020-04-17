<?php

function db_connect() {
    // Get configuration file for database information
    $configuration = parse_ini_file("/home/cosc2206/realm.ini", true)["database"];
    $driver   = $configuration["driver"];
    $hostname = $configuration["hostname"];
    $username = $configuration["username"];
    $password = $configuration["password"];
    $database = $configuration["database"];

    $connection;

    try {
        // MySQL with PDO_MYSQL
        $connection = new PDO("$driver:host=$hostname;dbname=$database", $username, $password);
        // Ensure that special characters are visible
        $connection->query('SET NAMES utf8');
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    return $connection;
}

function db_close($connection) {
    $connection = null;
}

function get_departments($language) {
    // Remove tags of HTML and PHP
    $language = strip_tags($language);

    $connection = db_connect();

    $query = "SELECT Department.id, Department.name FROM Department INNER JOIN Language ON Department.language_id=Language.id WHERE shortcode='" . $language . "' ORDER BY name ASC;";
    $statement = $connection->query($query);
    $departments = $statement->fetchAll(PDO::FETCH_OBJ);

    db_close($connection);

    return $departments;

}

function get_languages() {
    $connection = db_connect();

    $query = "SELECT shortcode, name FROM Language;";
    $statement = $connection->query($query);
    $languages = $statement->fetchAll(PDO::FETCH_OBJ);

    db_close($connection);

    return $languages;

}

function get_language_id($language) {
    // Remove tags of HTML and PHP
    $language = strip_tags($language);

    $connection = db_connect();

    $query = "SELECT id FROM Language WHERE shortcode='$language';";
    $statement = $connection->query($query);
    $result = $statement->fetch(PDO::FETCH_OBJ);

    db_close($connection);

    return $result->id;
}

function add_project($language, $title, $researcher, $department, $call_to_action) {
    // Remove tags of HTML and PHP
    $language = strip_tags($language);
    $title = strip_tags($title);
    $researcher = strip_tags($researcher);
    $department = strip_tags($department);
    $call_to_action = strip_tags($call_to_action);

    $connection = db_connect();
    
    // The form provides the shortcode, we need the language id
    $language = get_language_id($language);

    $query = "INSERT INTO Project (language_id, title, researcher, department_id, call_to_action) VALUES ($language, '$title', '$researcher', $department, '$call_to_action');";
    $statement = $connection->prepare($query);
    $statement->execute();

    db_close($connection);

    return true;
}

function delete_project($id) {
    // Remove tags of HTML and PHP
    $id = strip_tags($id);

    $connection = db_connect();

    $query = "DELETE FROM Project WHERE id=$id;";
    $statement = $connection->prepare($query);
    $statement->execute();

    db_close($connection);

    return true;
}

function get_projects($language, $department) {
    // Remove tags of HTML and PHP
    $language = strip_tags($language);
    $department = strip_tags($department);

    $connection = db_connect();

    $filters = generate_filter_string($language, $department);

    $query = "SELECT distinct Project.id, Language.name AS language, title, Department.name AS department, researcher, call_to_action FROM Project INNER JOIN Language ON Language.id=Project.language_id INNER JOIN Department ON Department.id=Project.department_id AND Department.language_id=Language.id $filters ORDER BY Project.id DESC;";

    $statement = $connection->query($query);

    $projects = array();

    while($project = $statement->fetch(PDO::FETCH_OBJ)) {
        $project = new Project($project->id, $project->title, $project->department, $project->researcher, $project->call_to_action);
        array_push($projects, $project);
    }

    db_close($connection);

    return $projects;
}

function generate_filter_string($language, $department) {
    // Remove tags of HTML and PHP
    $language = strip_tags($language);
    $department = strip_tags($department);

    $filters = "";

    // Format the filters so that it is valid SQL
    if (!empty($language) || !empty($department)) {
        $filters .= " WHERE";

        // Add the language condition
        if (!empty($language))
            $filters .= " Language.shortcode='$language'";

        // Determine whether the department is set to a valid value
        if (!empty($department) && $department != -1) {
            // Add the AND keyword if the language is also set
            if (!empty($language))
                $filters .= " AND";

            $filters .= " Department.id='$department'";
        }

    }

    return $filters;
}

?>
