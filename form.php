<?php


if (isset($_POST['submit'])){
    $fname= $_POST['fname'];
    $mname= $_POST['mname'];
    $lname= $_POST['lname'];
    $dob= $_POST['dob'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $address= $_POST['address'];
    $gender= $_POST['gender'];

    if(isset($fname)&& !empty($fname) && trim($fname)){
        echo "First Name: " . $fname; 
    } else {
        $errfname = "Enter First Name";
    }

    if(isset($mname) && trim($mname)){
        echo "<br />Middle Name: " . $mname; 
    } else {}

    if(isset($lname)&& !empty($lname) && trim($lname)){
        echo "<br />Last Name: " . $lname; 
    } else {
        $errlname = "Enter Last Name";
    }

    if(isset($dob)&& !empty($dob) && trim($dob)){
        echo "<br />Date of Birth: " . $dob; 
    } else {
        $errdob = "Select Date of Birth";
    }

    if(isset($email)&& !empty($email) && trim($email)){
        echo "<br />Email: " . $email; 
    } else {
        $erremail = "Enter Email";
    }
    
    if(isset($phone)&& !empty($phone) && trim($phone)){
        echo "<br />Phone: " . $phone; 
    } else {
        $errphone = "Enter Phone Number";
    }

    if(isset($address)&& !empty($address) && trim($address)){
        echo "<br />Address: " . $address; 
    } else {
        $erraddress = "Enter Address";
    }

    if(isset($gender)&& !empty($gender) && trim($gender)){
        echo "<br />Gender: " . $gender; 
    } else {
        $errgender = "Select Gender";
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
        h2{
            padding: 0 20px;
            text-transform: uppercase;
            color: darkblue;
        }
        form,fieldset {
            padding: 20px;
            width: 400px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        form .box{
            display: flex;
            flex-direction: column;
        } 
        form .main{
            display: flex;
            gap: 20px;
            
        } 
        .input{
            width: 200px;
        }
        span{
            color: red;
        }
        .gender{
            display: flex;
        }
    </style>
</head>
<body>
    <h2>Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Personal Details</legend>
            <div class="main">
                <div class="box">
                    <label for="name">First Name<span>*</span></label>
                    <input class="input" name="fname" id="fname" type="text" />
                    <span><?php echo isset($errfname) ? $errfname : '' ?></span>
                </div>
                <div class="box">
                    <label for="name">Midle Name</label>
                    <input class="input" name="mname" id="mname" type="text"/>
                </div>
                <div class="box">
                    <label for="lname">Last Name<span>*</span></label>
                    <input class="input" name="lname" id="lname" type="text" />
                    <span><?php echo isset($errlname) ? $errlname : '' ?></span>
                </div>
            </div>
            <div class="main">
                <div class="box">
                    <label for="address">Address<span>*</span></label>
                    <input class="input" name="address" id="address" type="text" />
                    <span><?php echo isset($erraddress) ? $erraddress : '' ?></span>
                </div>
                <div class="box">
                    <label for="dob">Date of Birth<span>*</span></label>
                    <input class="input" name="dob" id="dob" type="date" />
                    <span><?php echo isset($errdob) ? $errdob : '' ?></span>
                </div>  
                <div class="box">
                    <label for="gender">Gender<span>*</span></label>
                    <div class="gender">
                        <input class="" value="male" name="gender" id="male" type="radio" /> <label for="male">Male</label>
                        <input class="" value="female" name="gender" id="female" type="radio" /> <label for="female">Female</label>
                        <input class="" value="other" name="gender" id="other" type="radio" /> <label for="other">Other</label>
                    </div> 
                    <span><?php echo isset($errgender) ? $errgender : '' ?></span>
                </div>
            </div>
            <div class="main">
                <div class="box">
                        <label for="email">Email<span>*</span></label>
                        <input class="input" name="email" id="email" type="email" />
                        <span><?php echo isset($erremail) ? $erremail : '' ?></span>
                    </div>
                <div class="box">
                    <label for="phone">Phone<span>*</span></label>
                    <input class="input" name="phone" id="phone" type="phone" />
                    <span><?php echo isset($errphone) ? $errphone : '' ?></span>
                </div>
            </div>
            <div>
                <input class="" type="reset" id="reset" name="reset" />
                <input class="" type="submit" id="submit" name="submit" />
            </div>
        </fieldset>
    </form>
</body>
</html>