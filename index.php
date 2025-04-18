<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITI Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Post Page
    </h1>

    <form action="add_post.php" method="POST">
        <input type="text" name="title" placeholder="Post title" required>
        <textarea name="content" placeholder="Post content" required></textarea>
        <button type="submit">Add Post</button>
    </form>

    <div class="posts">
        <?php
        $sql = "SELECT * FROM posts ORDER BY created_at DESC";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()):
        ?>
            <div class="post">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
                
                <p>Upvotes: <span id="upvote-<?php echo $row['id']; ?>"><?php echo isset($row['upvotes']) ? $row['upvotes'] : 0; ?></span></p>
                <p>Downvotes: <span id="downvote-<?php echo $row['id']; ?>"><?php echo isset($row['downvotes']) ? $row['downvotes'] : 0; ?></span></p>

                <button onclick="vote(<?php echo $row['id']; ?>, 'upvote')">Upvote</button>
                <button onclick="vote(<?php echo $row['id']; ?>, 'downvote')">Downvote</button>

                <h3>Comments</h3>
                <form action="add_comment.php" method="POST">
                    <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="content" placeholder="Add a comment" required>
                    <button type="submit">Comment</button>
                </form>
                
                <?php
                $comment_sql = "SELECT * FROM comments WHERE post_id = " . $row['id'];
                $comment_result = $conn->query($comment_sql);
                while ($comment = $comment_result->fetch_assoc()):
                ?>
                    <p><?php echo htmlspecialchars($comment['content']); ?></p>
                <?php endwhile; ?>
            </div>
        <?php endwhile; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
