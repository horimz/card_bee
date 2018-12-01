<?php

require_once('db_credentials.php');

/* MySQL */

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
}

function db_disconnect($connection) {
    if(isset($connection)) {
        mysqli_close($connection);
    }
}

function db_escape($connection, $string) {
    return mysqli_real_escape_string($connection, $string);
}

function confirm_db_connect() {
    if(mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

function confirm_result_set($result_set) {
    if (!$result_set) {
        exit("Database query failed.");
    }
}

/* Oracle */

function oci_db_connect() {
    $connection = OCILogon(USER, PASS, SERVER);
    confirm_oci_db_connect($connection);
    return $connection;
}

function oci_db_disconnect($connection) {
    if(isset($connection)) {
        OCILogoff($connection);
    }
}

// function oci_db_escape($connection, $string) {
//     return mysqli_real_escape_string($connection, $string);
// }

function confirm_oci_db_connect($connection) {
    if(!$connection) {
        $msg = "Database connection failed: ";
        exit($msg);
    }
}

function confirm_oci_db_result_set($result_set) {
    if (!$result_set) {
        exit("Database query failed.");
    }
}

?>
