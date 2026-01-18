<h2>Edit Comment</h2>
<form method="post" action="index.php?action=update">
<input type="hidden" name="id" value="<?= $comment['id'] ?>">
Name: <input type="text" name="name" value="<?= $comment['name'] ?>"><br><br>
Comment: <textarea name="comment"><?= $comment['comment'] ?></textarea><br><br>
<button type="submit">Update</button>
</form>
