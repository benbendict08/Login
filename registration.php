<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('dbconnect.php');
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['Rsubmit'])) {
            // removes backslashes
            $re = "/^(?=.*[a-z])(?=.*\\d).{8,}$/i";
            $username = stripslashes($_POST['Rusername']);
            //escapes special characters in a string
            $username = mysqli_real_escape_string($con, $username);
            $email    = stripslashes($_POST['email']);
            $email    = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_POST['Rpassword']);
            $password2 = stripslashes($_POST['Rpassword2']);
            $password = mysqli_real_escape_string($con, $password);
            if(!preg_match($re,$password)) {
                echo "<div class='form'><h3>Password does not contain at least 1 number/letter, 8 character minimum requirement.</h3></div>";
            }
            else{
                if($password!=$password2){
                    echo "<div class='form'>
                    <h3>password incorrect.</h3><br/>
                    </div>";
                }else{
                    $create_datetime = date("Y-m-d H:i:s");
                    $query    = "INSERT INTO `users` (username, password, email, create_datetime)
                            VALUES ('$username', '$password)', '$email', '$create_datetime')"; 
                    $result   = mysqli_query($con, $query);   
                    $query ="INSERT into `event_log` (UID, activity, date_time)VALUES ('$username','Register',current_timestamp())";
                    $result   = mysqli_query($con, $query);
                    if ($result>0) {
                            
                            echo "<div class='form'>
                            <h3>Succesfull.</h3><br/>
                            <p class='link'>Click here to <a href='login.php'>Log in</a> again.</p>
                            </div>";
                            
                            
                    }else {
                        echo "<div class='form'>
                            <h3>Required fields are missing.</h3><br/>
                            <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                            </div>";
                    } 
                }
            }
            
            
            
        } 
    }
    // When form submitted, insert values into the database.
    
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="Rusername" placeholder="Username" required>
        <input type="email" class="login-input" name="email" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="Rpassword" placeholder="Password" required>
        <input type="password" class="login-input" name="Rpassword2" placeholder="Confirm Password" required>
        <input type="submit" name="Rsubmit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    
?>
</body>
</html>