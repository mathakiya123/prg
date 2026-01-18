<h2>Comments</h2>
<a href="index.php?action=create">Add Comment</a><hr>
<?php while($row = $comments->fetch_assoc()): ?>
<p>
<b><?= $row['name'] ?></b><br>
<?= $row['comment'] ?><br>
<a href="index.php?action=edit&id=<?= $row['id'] ?>">Edit</a> |
<a href="index.php?action=delete&id=<?= $row['id'] ?>">Delete</a>
</p><hr>
<?php endwhile; ?>
