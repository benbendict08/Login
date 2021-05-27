<?php 
include('dbconnect.php');
require('db.php');
$username=$_SESSION['username'];
$query ="SELECT * FROM event_log where UID='".$username."'";        
$result1 = mysqli_query($con, $query);
$result2 = mysqli_query($con, $query);
$result3 = mysqli_query($con, $query);

if(isset($_POST['logout'])){
    $username = $_POST['name'];
    $query="INSERT into `event_log` (UID, activity, date_time)VALUES ('$username','logout',current_timestamp())";
    mysqli_query($con, $query);
    header("location:logout.php");
}
if(isset($_POST['reset'])){
    echo "<div class='form' >
    <h3>Reset Password</h3><br/>
    <form action='welcome.php' method='POST'>
    <input type='text' class='login-input' name='name'placeholder='Name'>
    <input type='password' class='login-input' name='oldpass' placeholder='Old Password'>
    <input type='password' class='login-input' name='newpass' placeholder='New Password'>
    <input type='password' class='login-input' name='confirm_pass' placeholder='Confirm Password'>
    <button type='submit'name='change_submit'id='change_submit' onchange='reset()'class='login-button'>OK</button>
    </form>
    </div>";
    
}
if(isset($_POST['change_submit'])){
    $newpass=$_POST['newpass'];
    $oldpass=$_POST['oldpass'];
    $username=$_SESSION['username'];
    $re = "/^(?=.*[a-z])(?=.*\\d).{8,}$/i";
    if(!preg_match($re,$newpass)) {
        echo "<div class='form'><h3>Password does not contain at least 1 number/letter, 8 character minimum requirement.</h3></div>";
    }
    else if($_POST['newpass'] != $_POST['confirm_pass']){
        echo "<div class='form'>
        <h3>Password did not match.</h3><br/>
        </div>";
    }
    else if(empty($_POST['newpass']) || empty($_POST['name']) ||empty($_POST['oldpass']) ||empty($_POST['confirm_pass'])){
        echo "<div class='form'>
        <h3>Input Fields.</h3><br/>
        </div>";
    }
    else{
        $query = "SELECT * FROM users WHERE username='".$username."'";
        $result = mysqli_query($con,$query);
            while($row=mysqli_fetch_assoc($result)){
                $pass=$row["password"];
                }
                if ($pass!=$oldpass){
                    echo "<div class='form'>
                    <h3>Wrong Old Password.</h3><br/>
                    </div>";
                }else{
                    $query ="UPDATE users SET password='".$newpass."' where username='".$username."'";
                    $result = mysqli_query($con, $query);        
                    $query="INSERT into `event_log` (UID, activity, date_time)VALUES ('$username','change_pass',current_timestamp())";
                    $result = mysqli_query($con, $query);
                    echo "<div class='form'>
                    <h3>Change Password Successful!.</h3><br/>
                    </div>";
            }
        
    }
    
    
        
    }
if(isset($_POST['backup'])){
    header('location:backup.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<script type="text/javascript">
/*
document.getElementById("success_submit").addEventListener("click",function(){
    document.querySelector(".form_info").style.display ="none";
})
function reset() {
    document.querySelector(".reset").disabled = true;
}

    function change_text(id){
       id.innerHTML="Send Again";
       document.getElementById("code").disabled = false;
}     
*/
</script>
<body>
    <form class="form" method="post" action="welcome.php">
        <input type="hidden"name="name" value="<?php echo $_SESSION['username'];?>">
        <button type="submit" name="reset" class='login-button'>Reset</button><br><br>
        <button type="submit" name="logout" class='login-button'>Logout</button>
        <table style="width: 350px;">
                <tr>
                    <td colspan="3" style="font-size:20px;">Welcome <?php echo $_SESSION['username'];?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">History</td>
                </tr>
                <tr>
                    <td>
                    <?php 
                        while($rows=mysqli_fetch_assoc($result1)){
                            
                            echo $rows['UID']."<br>";
                        }
                    ?>
                    </td>
                    <td>
                    <?php 
                        while($rows=mysqli_fetch_assoc($result2)){
                            echo $rows['activity']."<br>";
                        }
                    ?> 
                    </td>
                    <td>
                    <?php 
                        while($rows=mysqli_fetch_assoc($result3)){
                            echo $rows['date_time']."<br>";
                        }
                    ?></td>
                </tr>
                
        </table>
    </form>
</body>
</html>
