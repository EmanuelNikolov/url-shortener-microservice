<?php

$original = $_POST['original'];

$short = null; // TODO: Implement database insertion

$result = [
  'original_url' => $original,
  'short_url' => $short,
];

header('Content-type: application/json');
echo json_encode($result, JSON_UNESCAPED_SLASHES);