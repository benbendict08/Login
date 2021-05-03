<?php
//include auth_session.php file on all user panel pages
require('db.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
    
    <div class="form" id="auth_form" >
        <form method="POST" action="dashboard.php">
    
            <p>Enter Contact Number </p>
            
            <input type="hidden"name="id" value="<?php echo $_SESSION['ID'];?>">
            <input type="hidden"name="mycode" value="<?php echo $_SESSION['mycode'];?>">
            <input type="hidden"name="user" value="<?php echo $_SESSION['user_id'];?>">
            <input type="text" id="input"  name="input" class="login-input" placeholder="" value="">
            <button type="submit" id="send" name="send"class="login-button" onclick="change(this)">Send</button>
            <p>Enter OTP</p>
            <input type="text" id="code" name="code" class="login-input" placeholder="Enter Number"value="">
            <button type="submit" id="send2" name="dash_submit" class="login-button">Submit</button>
        </form>
    </div>
</body>

</html>
