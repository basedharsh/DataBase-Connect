<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fileToUpload"])) {
        $targetDirectory = "uploads/"; // Directory where files will be stored
        $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;

        // Check if the file already exists
        if (file_exists($targetFile)) {
            echo "File already exists. Please choose a different name.";
            $uploadOk = 0;
        }

        if ($_FILES["fileToUpload"]["size"] > 5000000) {
            echo "File is too large. Please upload a smaller file.";
            $uploadOk = 0;
        }

        $allowedExtensions = array("jpg", "jpeg", "png", "gif", "pdf");
        $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "File was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                echo "Error uploading file.";
            }
        }
    }
}
?>
