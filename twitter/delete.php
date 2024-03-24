<?php
$tweet_id = $_GET['id'];
require 'database.php';
$requeteDelete = $database->prepare('DELETE FROM tweet WHERE tweet_id = :tweet_id');
$requeteDelete->bindParam(':tweet_id', $tweet_id);
if ($requeteDelete->execute()) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>