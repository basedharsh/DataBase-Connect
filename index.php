<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="send_email.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="number">Number:</label>
        <input type="text" name="number" required><br><br>

        <label for="paragraph">Paragraph:</label>
        <textarea name="paragraph" required></textarea><br><br> <!-- Textarea input for a paragraph -->

        <input type="submit" value="Send Email">
    </form>
</body>
</html>