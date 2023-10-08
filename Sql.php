<!DOCTYPE html>
<html>
<head>
<style>
  table {
    width: 300px;
    border: solid 1px black;
    margin-bottom: 20px;
  }
  th, td {
    width: 100px;
    border: 1px solid black;
    padding: 5px;
  }
  h2 {
    margin-top: 20px;
  }
  form {
    display: inline-block;
    vertical-align: top;
    margin-right: 20px;
  }
  label, input {
    display: block;
    margin-bottom: 10px;
  }
</style>
</head>
<body>

<table>
  <tr><th>Name</th><th>Roll No</th><th>Marks</th></tr>

<?php
class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }
  function current() {
    return "<td>" . parent::current(). "</td>";
  }
  function beginChildren() {
    echo "<tr>";
  }
  function endChildren() {
    echo "</tr>\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "result";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // INSERT data
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["insert"])) {
    $name = $_POST["name"];
    $rollNo = $_POST["roll_no"];
    $marks = $_POST["marks"];

    $stmt = $conn->prepare("INSERT INTO student (name, roll_no, marks) VALUES (:name, :roll_no, :marks)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':roll_no', $rollNo);
    $stmt->bindParam(':marks', $marks);
    $stmt->execute();
  }

  // UPDATE data
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $rollNo = $_POST["roll_no"];
    $newName = $_POST["new_name"];
    $newRollNo = $_POST["new_roll_no"];
    $newMarks = $_POST["new_marks"];

    $stmt = $conn->prepare("UPDATE student SET name = :new_name, roll_no = :new_roll_no, marks = :new_marks WHERE roll_no = :roll_no");
    $stmt->bindParam(':roll_no', $rollNo);
    $stmt->bindParam(':new_name', $newName);
    $stmt->bindParam(':new_roll_no', $newRollNo);
    $stmt->bindParam(':new_marks', $newMarks);
    $stmt->execute();
  }

  // SELECT data
  $stmt = $conn->prepare("SELECT * FROM student");
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;
?>

</table>

<h2>Insert Data</h2>
<form method="POST">
  <label for="name">Name:</label>
  <input type="text" name="name" required>
  <label for="roll_no">Roll No:</label>
  <input type="text" name="roll_no" required>
  <label for="marks">Marks:</label>
  <input type="text" name="marks" required>
  <input type="submit" name="insert" value="Insert">
</form>

<h2>Update Data</h2>
<form method="POST">
  <label for="roll_no">Roll No to Update:</label>
  <input type="text" name="roll_no" required>
  <label for="new_name">New Name:</label>
  <input type="text" name="new_name" required>
  <label for="new_roll_no">New Roll No:</label>
  <input type="text" name="new_roll_no" required>
  <label for="new_marks">New Marks:</label>
  <input type="text" name="new_marks" required>
  <input type="submit" name="update" value="Update">
</form>

</body>
</html>
