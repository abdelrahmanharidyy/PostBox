<?php
include 'db.php';

if (isset($_POST['post_id'])) {
    $post_id = (int)$_POST['post_id'];
    $conn->query("UPDATE posts SET upvotes = upvotes + 1 WHERE id = $post_id");

    $result = $conn->query("SELECT upvotes FROM posts WHERE id = $post_id");
    $row = $result->fetch_assoc();
    echo $row['upvotes'];
}
?>
