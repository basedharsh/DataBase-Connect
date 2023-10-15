<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $errors = [];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password (at least one special character)
    if (!preg_match("/[!@#\$%^&*(),.?\":{}|<>]/", $password)) {
        $errors[] = "Password must contain at least one special character.";
    }

    if (empty($errors)) {
        // Redirect to a success page or display data here
        echo "<h1>Form Submitted Successfully!</h1>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Password: $password</p>";
    } else {
        // Display validation errors
        echo "<h1>Validation Errors:</h1>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo '<a href="index.php">Go Back</a>';
    }
} else {
    // Handle non-POST requests if needed
    echo "Invalid Request";
}
?>



