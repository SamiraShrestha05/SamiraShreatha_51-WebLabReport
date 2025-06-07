<!DOCTYPE html>
<html>
<head>
    <title>Interest Calculator</title>
</head>
<body>
    <h2>Interest Calculator</h2>
    <form method="post">
        <label for="principal">Principal:</label>
        <input type="text" name="principal" required><br><br>

        <label for="rate">Rate (% per annum):</label>
        <input type="text" name="rate" required><br><br>

        <label for="time">Time (in years):</label>
        <input type="text" name="time" required><br><br>

        <input type="submit" name="calculate" value="Calculate">
        
    </form>

    
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $principal = $_POST["principal"];
        $rate = $_POST["rate"];
        $time = $_POST["time"];

        if (isset($_POST["calculate"])) {

            $simpleInterest = ($principal * $rate * $time) / 100;
            echo "<h3>Simple Interest: " . number_format($simpleInterest, 2) . "</h3>";
            $compoundInterest = $principal * (pow((1 + $rate / 100), $time) - 1);
            echo "<h3>Compound Interest: " . number_format($compoundInterest, 2) . "</h3>";
        }
    }
    ?>