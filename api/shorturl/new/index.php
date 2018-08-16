<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/api/db_connect.php";

$original = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

if ($original) {
    $stmt = $db->prepare("INSERT INTO urls (url) VALUES (?)");
    if (!$stmt->execute([$original])) {
        throw new Exception('Database insertion failed :(');
    };

    $short = $db->lastInsertId();

    $result = [
      'original_url' => $original,
      'short_url' => $short,
    ];
} else {
    $result = [
      'error' => 'invalid URL',
    ];
}

header('Content-type: application/json');
echo json_encode($result, JSON_UNESCAPED_SLASHES);