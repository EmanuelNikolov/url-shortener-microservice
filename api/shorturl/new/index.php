<?php

$original = $_POST['original'];

$dsn = 'mysql:dbname=url-shortener-microservice;host=localhost';
$user = 'root';
$pass = '';

$db = new PDO($dsn,
  $user,
  $pass,
  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$short = null;

$result = [
  'original_url' => $original,
  'short_url' => $short,
];

header('Content-type: application/json');
echo json_encode($result, JSON_UNESCAPED_SLASHES);