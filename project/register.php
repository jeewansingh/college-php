<?php
include("./connection.php");
if (isset($_POST['btnSave'])){
    $error = [];
    $success = [];
    // NAME VALIDATION
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])){
        $name = $_POST['name'];
    } else {
        $error['name'] = 'Name Required!';
    }

    // EMAIL VALIDATION
    if (isset($_POST['email']) && !empty($_POST['email']) && trim($_POST['email'])){
        $email = $_POST['email'];
    } else {
        $error['email'] = 'Email Required!';
    }

    // USERNAME VALIDATION
    if (isset($_POST['username']) && !empty($_POST['username']) && trim($_POST['username'])){
        $username = $_POST['username'];
    } else {
        $error['username'] = 'Username Required!';
    }

    // PASSWORD VALIDATION
    if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password']) && $_POST['password'] >= 4){
        $password = $_POST['password'];
    } else {
        $error['password'] = 'Password Required!';
    }

    // PHONE VALIDATION
    if (isset($_POST['phone']) && !empty($_POST['phone']) && trim($_POST['phone']) && $_POST['phone'] >= 4){
        $phone = $_POST['phone'];
    } else {
        $error['phone'] = 'Phone Required!';
    }

    // ADDRESS VALIDATION
    if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address']) && $_POST['address'] >= 4){
        $address = $_POST['address'];
    } else {
        $error['address'] = 'Address Required!';
    }

    // WEBSITE VALIDATION
    if (isset($_POST['website']) && !empty($_POST['website']) && trim($_POST['website']) && $_POST['website'] >= 4){
        $website = $_POST['website'];
    } else {
        $website = $_POST['website'];
    }

    // IMAGE VALIDATION
    if (isset($_POST['profile_img']) && !empty($_POST['profile_img']) && trim($_POST['profile_img']) && $_POST['profile_img'] >= 4){
        $profile_img = $_POST['profile_img'];
    } else {
        $error['profile_img'] = 'Profile_img Required!';
    }

    // INSERT INTO DATABASE
    if (count($error) == 0){
        try{
        $sql = "INSERT INTO users (name, email, phone, address, username, password, website, profile_img) VALUES ('$name', '$email', '$phone', '$address', '$username','$password', '$website', '$profile_img')";
        if (mysqli_query($conn, $sql)){
            $success['create'] = 'User Created Successfully !';
        } else {
            echo 'Failed to Create User';
        }
        } catch(Exception $ex){
            die('Database Error: ' . $ex->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100&family=Manrope:wght@200;300;400;500;600;700;800&family=Open+Sans:wght@400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400&family=Roboto:ital,wght@0,400;0,500;1,500&family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body{
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            font-family: 'Poppins', sans-serif;
        }
        .head{
            display: flex;
            gap: 2px;
        }
        h2{
            text-transform: uppercase;
            color: #0f2027;
            text-align: center;
            line-height: 0.5;
        }
        .success{
            color: darkgreen;
            text-align: center;
            font-weight: 500;
        }
        form {
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 800px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        div{
            display: flex;
            flex-direction: column;
        }
        .field {
            display: flex;
            flex-direction: row;
            gap: 40px;
        }
        label{
            font-weight: bold;
            padding: 3px 0;
            font-weight: 400;
        }
        form input{
            width: 300px;
            padding: 5px;
            background-color: #BED1CF;
            border: 1px solid #92C7CF;
            border-radius: 5px;
            outline: red;
        }
        div span{
            color: red;
            margin-left: 10px;
        }
        button{
            border-radius: 5px;
            border: none;
            background-color: #0f2027;
            color: #fff;
            font-family: inherit;
            padding: 10px 20px;
            margin: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <div>
            <h2>Sign-up Form</h2>
            <p><?php echo isset($success['create']) ? $success['create'] : '';?></span></p>
        </div>
        <div class="field">
            <div>
                <label for="name">Name<span><?php echo isset($error['name']) ? $error['name'] : '';?></span></label>
                <input type="text" name="name" />
            </div>
            <div>
                <label for="email">Email<span><?php echo isset($error['email']) ? $error['email'] : '';?></span></label>
                <input type="email" name="email" />
            </div>
        </div>
        <div class="field">
            <div>
            <label for="phone">Phone<span><?php echo isset($error['phone']) ? $error['phone'] : '';?></span> </label>
            <input type="number" name="phone" />
            </div>
            <div>
            <label for="username">Username<span><?php echo isset($error['username']) ? $error['username'] : '';?></span></label>
            <input type="text" name="username" />
            </div>
        </div>
        <div class="field">
            <div>
            <label for="password">Password<span><?php echo isset($error['password']) ? $error['password'] : '';?></span></label>
            <input type="password" name="password" />
            </div>
            <div>
            <label for="address">Address<span><?php echo isset($error['address']) ? $error['address'] : '';?></span></label>
            <input type="text" name="address" />
            </div>
        </div>
        <div class="field">
            <div>
            <label for="website">Website<span><?php echo isset($error['website']) ? $error['website'] : '';?></span></label>
            <input type="text" name="website" /> 
            </div>
            <div>
            <label for="profile_img">Profile Picture<span><?php echo isset($error['profile_img']) ? $error['profile_img'] : '';?></span></label>
            <input type="text" name="profile_img" />
            </div>
        </div> 
        <div class="field">
            <button type="submit" name="btnSave">Create</button>
        </div>
    </form>
</body>
</html>



