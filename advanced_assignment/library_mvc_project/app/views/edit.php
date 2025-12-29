<h2>Edit Book</h2>

<form method="post"
      action="index.php?action=update"
      enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $book['id'] ?>">
    <input type="hidden" name="old_image" value="<?= $book['image'] ?>">

    <input type="text" name="name" value="<?= $book['name'] ?>" required>
    <input type="text" name="author" value="<?= $book['author'] ?>" required>

    <br><br>
    <img src="public/uploads/<?= $book['image'] ?>" width="80"><br>
    <input type="file" name="image">

    <br><br>
    <button type="submit">Update</button>
</form>
