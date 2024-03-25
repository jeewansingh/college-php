<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest Calculator</title>
</head>
<body>

<h2>Simple Interest Calculator</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Principal Amount: <input type="number" step="0.01" name="principal" required><br><br>
    Interest Rate (in %): <input type="number" step="0.01" name="rate" required><br><br>
    Time Period (in years): <input type="number" step="0.01" name="time" required><br><br>
    <input type="submit" name="submit" value="Calculate">
</form>

<?php
if (isset($_POST['submit'])) {
    $principal = $_POST['principal'];
    $rate = $_POST['rate'] / 100; // Convert percentage to decimal
    $time = $_POST['time'];

    // Calculate simple interest
    $simple_interest = ($principal * $rate * $time);

    // Display the result
    echo "<h3>Result:</h3>";
    echo "Principal Amount: $principal <br>";
    echo "Interest Rate: " . ($_POST['rate']) . "% <br>";
    echo "Time Period: $time years <br>";
    echo "Simple Interest: $simple_interest";
}
?>

</body>
</html>
