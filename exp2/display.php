<!DOCTYPE html>
<html>
<head>
    <title>Image Display</title>
</head>
<body>
<h1>Uploaded Image</h1>

<?php
$uploadDirectory = "uploads/"; // Directory where uploaded images are stored

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];
    
   
    $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    if ($file["error"] === 0 && getimagesize($file["tmp_name"]) !== false && in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        $fileName = $uploadDirectory . basename($file["name"]);
        
       
        if (move_uploaded_file($file["tmp_name"], $fileName)) {
            echo "Image uploaded successfully. File name: " . $file["name"];
            
            
            echo '<img src="' . $fileName . '" alt="Uploaded Image">';
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Invalid image file. Supported formats: JPG, JPEG, PNG, GIF.";
    }
}
?>
</body>
</html>
