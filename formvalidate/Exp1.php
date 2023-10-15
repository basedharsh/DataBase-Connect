<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Program</h1>

        <?php
        // Data Types
     
echo "Welcome to the world of PHP.<br>";


        $integerVar = 42;
        $floatVar = 3.14;
        $stringVar = "Hello, World!";
        $boolVar = true;
        $arrayVar = [1, 2, 3, 4, 5];
        $nullVar = null;

        // String Functions
        $length = strlen($stringVar);
        $uppercase = strtoupper($stringVar);
        $lowercase = strtolower($stringVar);
        $substring = substr($stringVar, 0, 5);
        $replace = str_replace("World", "PHP", $stringVar);

        // Date and Time Functions
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        $timestamp = time();

        // Math Functions
        $number1 = 10;
        $number2 = 5;
        $sum = $number1 + $number2;
        $diff = $number1 - $number2;
        $product = $number1 * $number2;
        $quotient = $number1 / $number2;
        $power = pow($number1, 2);
        $squareRoot = sqrt($number1);

        echo "Integer: $integerVar<br>";
        echo "Float: $floatVar<br>";
        echo "String: $stringVar<br>";
        echo "Boolean: " . ($boolVar ? "true" : "false") . "<br>";
        echo "Array: " . implode(", ", $arrayVar) . "<br>";
        echo "Null: $nullVar<br><br>";

        echo "String Length: $length<br>";
        echo "Uppercase: $uppercase<br>";
        echo "Lowercase: $lowercase<br>";
        echo "Substring: $substring<br>";
        echo "Replaced String: $replace<br><br>";

        echo "Current Date: $currentDate<br>";
        echo "Current Time: $currentTime<br>";
        echo "Timestamp: $timestamp<br><br>";

        echo "Sum: $sum<br>";
        echo "Difference: $diff<br>";
        echo "Product: $product<br>";
        echo "Quotient: $quotient<br>";
        echo "Power: $power<br>";
        echo "Square Root: $squareRoot<br>";
        ?>
    </div>
</body>
</html>
