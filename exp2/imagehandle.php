<!DOCTYPE html>
<html>
<head>
    <title>Image Upload and Display</title>
</head>
<body>
<h1>Image Upload and Display</h1>

<form action="display.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" id="image" accept="image/*" required>
    <input type="submit" value="Upload Image and Display">
</form>

</body>
</html>
