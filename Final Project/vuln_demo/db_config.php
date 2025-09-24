<?php
$DB_HOST = '127.0.0.1';
$DB_NAME = 'vuln_demo';
$DB_USER = 'root';
$DB_PASS = '';

function get_db_conn() {
    global $DB_HOST, $DB_USER, $DB_PASS, $DB_NAME;
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($conn->connect_error) {
        die('DB connect error: ' . $conn->connect_error);
    }
    return $conn;
}
?>
