<?php

set_exception_handler(function ($e) {
    echo "Database error. Maybe check config.ini?";
    error_log($e->getMessage());
    exit();
});

$dbCreds = parse_ini_file(__DIR__ . "/../config/db_config.ini");
$dsn = "{$dbCreds['type']}:host={$dbCreds['host']};dbname={$dbCreds['name']}";
$user = $dbCreds['user'];
$pass = $dbCreds['pass'];
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$db = new PDO($dsn, $user, $pass, $options);