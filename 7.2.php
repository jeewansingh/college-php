<!DOCTYPE html>
<html>
<head>
    <title>Tax Calculator</title>
</head>
<body>

<h2>Tax Calculator</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Annual Income: <input type="number" step="0.01" name="income" required><br><br>
    Marital Status:
    <input type="radio" name="marital_status" value="married" required> Married
    <input type="radio" name="marital_status" value="unmarried"> Unmarried<br><br>
    Gender:
    <input type="radio" name="gender" value="male" required> Male
    <input type="radio" name="gender" value="female"> Female<br><br>
    <input type="submit" name="submit" value="Calculate">
</form>

<?php
if (isset($_POST['submit'])) {
    $income = $_POST['income'];
    $marital_status = $_POST['marital_status'];
    $gender = $_POST['gender'];

    // Apply tax discount for females
    $tax_discount = ($gender == 'female') ? 0.10 : 0;

    // Calculate tax based on income and marital status
    if ($marital_status == 'married') {
        if ($income <= 450000) {
            $tax = $income * 0.01 * (1 - $tax_discount);
        } elseif ($income <= 550000) {
            $tax = 4500 + (($income - 450000) * 0.11) * (1 - $tax_discount);
        } elseif ($income <= 750000) {
            $tax = 9000 + (($income - 550000) * 0.21) * (1 - $tax_discount);
        } elseif ($income <= 1300000) {
            $tax = 19500 + (($income - 750000) * 0.31) * (1 - $tax_discount);
        } else {
            $tax = 45250 + (($income - 1300000) * 0.36) * (1 - $tax_discount);
        }
    } else {
        if ($income <= 400000) {
            $tax = $income * 0.01 * (1 - $tax_discount);
        } elseif ($income <= 500000) {
            $tax = 4000 + (($income - 400000) * 0.11) * (1 - $tax_discount);
        } elseif ($income <= 750000) {
            $tax = 9000 + (($income - 500000) * 0.21) * (1 - $tax_discount);
        } elseif ($income <= 1300000) {
            $tax = 19500 + (($income - 750000) * 0.31) * (1 - $tax_discount);
        } else {
            $tax = 45250 + (($income - 1300000) * 0.36) * (1 - $tax_discount);
        }
    }

    // Display the result
    echo "<h3>Result:</h3>";
    echo "Annual Income: $income <br>";
    echo "Marital Status: $marital_status <br>";
    echo "Gender: $gender <br>";
    echo "Tax to Pay: $tax";
}
?>

</body>
</html>
