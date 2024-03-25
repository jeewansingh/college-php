<?php

if (isset($_POST['submit'])){

        // username
    if (isset($_POST['username']) && !empty($_POST['username']) && trim($_POST['username'])){
        if (strlen($_POST['username']) < 8){
            $errusername = 'Username must be 8 character';
        } else {
            $username = $_POST['username'];
            echo "Username: " .$username;
        }
    } else {
        $errusername = 'Username Required!';
    }

    if(isset($_POST['dob']) && !empty($_POST['dob']) && trim($_POST['dob'])){
        $dob = $_POST['dob'];
        echo "<br/>Date of Birth: " .$dob;

    } else {
        $errdob = "Select Date of Birth";
    }

    if(isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])){
        if (filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL)){
        $email = $_POST['email'];
        echo "<br/>Email: " .$email;
        } else {
        $erremail = "Enter Valid Email";

        }
    } else {
        $erremail = "Enter Email";
    }
    
    if(isset($_POST['phone'])&& !empty($_POST['phone']) && trim($_POST['phone']) && (strlen($_POST['phone']) == 10)){
        $phone = $_POST['phone'];
        echo "<br/>Phone: " .$phone;

    } else {
        $errphone = "Enter Phone Number";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        span{
            color: red;
        }
    </style>
</head>
<body>
    <h2>Form</h2>
    <form action="" method="post">
        <label for="username">username: </label>
        <input class="input" name="username" id="username" type="text" />
        <span><?php echo isset($errusername) ? $errusername : '' ?><br></span>

        <label for="dob">Date of Birth</label>
        <input class="input" name="dob" id="dob" type="date" />
        <span><?php echo isset($errdob) ? $errdob : '' ?><br></span>

        <label for="email">Email</label>
        <input class="input" name="email" id="email" type="email" />
        <span><?php echo isset($erremail) ? $erremail : '' ?><br></span>

        <label for="phone">Phone</label>
        <input class="input" name="phone" id="phone" type="number" />
        <span><?php echo isset($errphone) ? $errphone : '' ?><br></span>

        <input class="" type="reset" id="reset" name="reset" />
        <input class="" type="submit" id="submit" name="submit" />

    </form>
</body>
</html>