<?php
include 'db.php';

$post_id = $_GET['post_id'];
$sql = "SELECT * FROM comments WHERE post_id = $post_id";
$result = $conn->query($sql);
while ($comment = $result->fetch_assoc()):
    echo "<p>" . htmlspecialchars($comment['content']) . "</p>";
endwhile;
?>
