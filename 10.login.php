<?php
if(isset($_COOKIE['username'])){
    session_start();
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['login_time'] = time();
    header('location:10.dashboard.php');
}

if(isset($_POST['btnLogin'])){
    $error = 0;
    if(isset($_POST['username']) && !empty($_POST['username']) 
        && trim($_POST['username'])){
       $username =  $_POST['username'];
    } else {
        $error++;
        $errUsername =  "Enter username";
    }
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password =   $_POST['password'];
    } else {
        $error++;
        $errPassword =  "Enter password";
    }
    if($error == 0){
        //create array for multiple user login
        $userlist = [
            ['username' => 'pmc','password' =>'pmc123'],
            ['username' => 'user','password' =>'user123'],
            ['username' => 'admin','password' =>'admin123'],
            ['username' => 'bca','password' =>'bca123']
        ];
        $login = false;
        foreach ($userlist as $key => $user) {
            if($user['username'] == $username && $user['password'] == $password){
                $login = true;
                break;
            }
        }
        //check valid login
        if($login){
            session_start();
            //store data into session
            $_SESSION['username'] = $username;
            $_SESSION['login_time'] = time();

            if(isset($_POST['remember'])){
                //store cookie
                setcookie('username',$username,time()+7*24*60*60);
            }
            header('location:10.dashboard.php');
        }else {
            echo 'Login failed';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
 
    <h1>Login Form</h1>
    <p>
        <?php if(isset($_GET['msg']) && $_GET['msg']== 1){
         echo 'Please login to continue to access your dashboard';   
        } else if(isset($_GET['msg']) && $_GET['msg']== 2){
         echo 'Session timeout!! please login to continue';   
        }
        ?>
    </p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" 
        placeholder="Enter username" />
        <?php echo (isset($errUsername))?$errUsername:''; ?>
        <br />
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter password" />
        <?php echo (isset($errPassword))?$errPassword:''; ?>
        <br />
        <input type="checkbox" name="remember" id="remember" value="remember" />Remember me for 7 days
        <br />
        <input type="submit" name="btnLogin" id="login" value="login">
    </form>
</body>
</html>