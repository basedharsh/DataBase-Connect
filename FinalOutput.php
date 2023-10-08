<!DOCTYPE html>
<html>
<head>
<style>
  .container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr;
  }
  .block1, .block2, .block3, .block4 {
    border: 1px solid black;
    padding: 20px;
  }
  table {
    width: 100%;
    border: solid 1px black;
  }
  th, td {
    border: 1px solid black;
    padding: 5px;
  }
  h2 {
    margin-top: 20px;
  }
  form {
    display: block;
    margin-bottom: 20px;
  }
  label, input {
    display: block;
    margin-bottom: 10px;
  }
</style>
</head>
<body>

<div class="container">
<div class="block1">
  <div class="form-container">
    <div>
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
    </div>

    <div>
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
    </div>

    <div>
      <h2>Delete Data</h2>
      <form method="POST">
        <label for="delete_roll_no">Roll No to Delete:</label>
        <input type="text" name="delete_roll_no" required>
        <input type="submit" name="delete" value="Delete">
      </form>
    </div>
  </div>
</div>
<div class="block2">
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

  // DELETE data
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $deleteRollNo = $_POST["delete_roll_no"];

    $stmt = $conn->prepare("DELETE FROM student WHERE roll_no = :delete_roll_no");
    $stmt->bindParam(':delete_roll_no', $deleteRollNo);
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
</div>

<div class="block3">
  <button onclick="displayPara(1)">MySql</button>
  <button onclick="displayPara(2)">MariaDb</button>
  <button onclick="displayPara(3)">Sql Lite</button>
  <button onclick="displayPara(4)">PgSQL</button>
  <button onclick="displayPara(5)">Firebase</button>
</div>

<div class="block4" id="paraContainer">
 
</div>

</div>
<script>
  function displayPara(num) {
  const paraContainer = document.getElementById("paraContainer");
  let paraText = "";

  switch (num) {
    case 1:
      paraText = `<pre><code>try {
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

  // DELETE data
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $deleteRollNo = $_POST["delete_roll_no"];

    $stmt = $conn->prepare("DELETE FROM student WHERE roll_no = :delete_roll_no");
    $stmt->bindParam(':delete_roll_no', $deleteRollNo);
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
}</code></pre>`;
      break;
    case 2:
      paraText = `<pre><code> 
      
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


      
      
      
      </code></pre>`;
      break;
    case 3:
      paraText = `<pre><code>
      $dbname = "result";

try {
    $conn = new PDO("sqlite:$dbname");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
      
      
      </code></pre>`;
      break;
    case 4:
      paraText = `<pre><code>
      $host = "localhost";
$dbname = "result";
$username = "your_username_here";
$password = "your_password_here";

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
      </code></pre>`;
      break;
    case 5:
      paraText = `<pre><code>
      require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
$factory = (new Factory())-> withProjectId('database-a818f')
->withServiceAccount('c:/xampp/htdocs/Harsh/MultipleDb/database-a818f-firebase-adminsdk-xjo10-8d9bf0776b.json')
->withDatabaseUri('https://database-a818f-default-rtdb.firebaseio.com/');


$database = $factory->createDatabase();
      
      </code></pre>`;
      break;
    default:
      paraText = "Invalid button.";
  }

  paraContainer.innerHTML = `<p>${paraText}</p>`;
}

</script>

</body>
</html>