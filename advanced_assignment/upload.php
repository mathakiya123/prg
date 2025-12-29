<!DOCTYPE html>
<html>
<head>
    <title>Simple File Upload</title>
</head>
<body>

<h2>Upload File</h2>

<form action="upload_action.php" method="post" enctype="multipart/form-data">
    <input type="file" name="myfile" required>
    <br><br>
    <button type="submit" name="upload">Upload</button>
</form>

</body>
</html>
