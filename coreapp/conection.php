<?php
$DB_HOST= "localhost";
$DB_USER= "root";
$DB_PASS= "admin";
$DB_NAME= "dbarp";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, 3306);

if ($mysqli->connect_errno) {
    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//echo $mysqli->host_info . "\n Conection.php";

mysqli_report(MYSQLI_REPORT_ERROR);
?>