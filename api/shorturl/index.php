<?php
require_once __DIR__ . "/../db_connect.php";

$param = urldecode(basename($_SERVER['REQUEST_URI']));

if ($param != "shorturl") {
    $stmt = $db->prepare("SELECT url FROM urls WHERE id = ?");
    $stmt->execute([$param]);
    if ($stmt->rowCount() > 0) {
        $url = $stmt->fetch(PDO::FETCH_ASSOC)["url"];
    } else {
        echo "Short URL specified does not exist in our database. Maybe go and add one? :)";
        exit();
    }
} else {
    echo "You must enter a short URL.";
    exit();
}

header("Location: {$url}");
exit();