<?php

set_exception_handler(function (Exception $e) {
    echo "Database error. Maybe check db_config.ini?";
    error_log($e->getMessage());
});

$dbCreds = parse_ini_file("../db_config/db_config.ini");
$dsn = "{$dbCreds['type']}:host={$dbCreds['host']};dbname={$dbCreds['name']}";
$user = $dbCreds['user'];
$pass = $dbCreds['pass'];

$db = new PDO($dsn, $user, $pass);