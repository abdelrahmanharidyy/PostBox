<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = (int)$_POST['post_id'];
    $content = $conn->real_escape_string($_POST['content']);

    $sql = "INSERT INTO comments (post_id, content) VALUES ($post_id, '$content')";
    $conn->query($sql);
}

header("Location: index.php");
?>
