<!DOCTYPE html>
<html>
<head>
    <title>Array Manipulation in PHP</title>
</head>
<body>
<h1>Array Manipulation in PHP</h1>
<h2>Indexed Array</h2>
<?php
$fruits = array("Apple", "Banana", "Cherry", "Date", "Fig");
echo "Fruits: ";
echo implode(", ", $fruits);
?>
<h2>Associative Array</h2>
<?php
$student = array("Name" => "John", "Age" => 25, "Grade" => "A");
echo "Student: ";
echo implode(", ", $student);
?>
<h2>Multidimensional Array</h2>
<?php
$employees = array(
    array("Name" => "Alice", "Age" => 30, "Department" => "HR"),
    array("Name" => "Bob", "Age" => 28, "Department" => "IT"),
    array("Name" => "Charlie", "Age" => 35, "Department" => "Finance")
);
echo "Employees: ";
foreach ($employees as $employee) {
    echo implode(", ", $employee) . "<br>";
}
?>
<h2>Count and Combine Items</h2>
<?php
$fruitsCount = count($fruits);
echo "Number of fruits: $fruitsCount<br>";

$combinedArray = array_merge($fruits, $student, ...$employees);
echo "Combined Items: ";
echo implode(", ", $combinedArray);
?>
<h2>Sort</h2>
<?php
sort($fruits);  // Normal  sort
echo "Fruits (Sorted): ";
echo implode(", ", $fruits);
?>
<h2>Reverse Sort</h2>
<?php
rsort($fruits);  // Reverse  sort
echo "Fruits (Reverse Sorted): ";
echo implode(", ", $fruits);
?>
</body>
</html>
