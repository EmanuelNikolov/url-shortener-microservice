<?php
require_once __DIR__ . '/../../db_connect.php';

// Validate URL
$original = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

// Function to lookup if the URL exists
$lookup = function ($url): bool {
    $result = @get_headers($url);
    if (!$result) {
        return false;
    }
    return strpos($result[0], '404') ? false : true;
};

// If the first validation passed, above function will lookup the address else $isValid is false
$isValid = false;
if ($original) {
    $isValid = $lookup($original);
}

// Insert URL into database and record link or tell the user the URL is invalid
if ($isValid) {
    // Second row of this query allows lastInsertId() to work properly
    $stmt = $db->prepare("INSERT IGNORE INTO urls (url) VALUES (?) 
                                    ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id)");
    $stmt->execute([$original]);

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

// Tell browser to expect JSON file and finally send it
header('Content-type: application/json');
echo json_encode($result, JSON_UNESCAPED_SLASHES);