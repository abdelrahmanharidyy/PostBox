<?php
include 'db.php';

if (isset($_POST['post_id'])) {
    $post_id = (int)$_POST['post_id'];
    $conn->query("UPDATE posts SET downvotes = downvotes + 1 WHERE id = $post_id");

    $result = $conn->query("SELECT downvotes FROM posts WHERE id = $post_id");
    $row = $result->fetch_assoc();
    echo $row['downvotes'];
}
?>
