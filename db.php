<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
   
    // When form submitted, check and create user session.
    include('dbconnect.php');
    session_start();
    
        if (isset($_POST['submit'])) {

            $username = stripslashes($_POST['username']);    // removes backslashes
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($con, $password);
            if($_POST['username'] == "" && $_POST['password'] ==""){
                echo "<div class='form'>
                <h3>Please Fill The missing inputs.</h3><br/>
                </div>";
            }
            else if($_POST['username'] == ""){
                echo "<div class='form'>
                <h3>Please Fill Username.</h3><br/>
                </div>";

            }else if($_POST['password'] ==""){
                echo "<div class='form'>
                <h3>Please Fill Password.</h3><br/>
                </div>";

            }else{
                $create_datetime = date("Y-m-d H:i:s");
                $query    = "SELECT * FROM `users` WHERE username='".$username."'
                        AND password='".$password."'";
                $result = mysqli_query($con, $query);
                if(mysqli_num_rows($result) > 0){
                    
                    while($rows = mysqli_fetch_assoc($result)) {
                        $_SESSION['ID']=$rows["U_ID"];
                        $_SESSION['username']=$rows["username"];
                         
                         
                         $query ="INSERT into `event_log` (UID, activity, date_time)VALUES ('$username','login',current_timestamp())";
                         mysqli_query($con, $query);
                         mysqli_fetch_assoc($result);
                         header("Location: dashboard.php");
                        }
                }else if(mysqli_num_rows($result) == 0){
                    echo "<div class='form'>
                        <h3>Incorrect Username/password.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                        </div>";
                }
                
                
            }
            
        }
        
        if(isset($_POST['send'])){
            
            $code=rand(100000,999999);
            $user_id = $_POST['id'];
            $mycode='';

            $currentDate = date('Y-m-d H:i:s');
            $currentDate_timestamp = strtotime($currentDate);
            $endDate_months = strtotime("+5 seconds", $currentDate_timestamp);
            $packageEndDate = date('Y-m-d H:i:s', $endDate_months);

            $query  = "INSERT into authentication (auth_code,U_ID,code_start,code_expire) VALUES ('$code','$user_id','$currentDate','$packageEndDate')";
            $result = mysqli_query($con, $query);
            
            $query  ="SELECT * FROM authentication WHERE U_ID='".$user_id."'";
            $result = mysqli_query($con, $query);
            if($result){
                while($rows=mysqli_fetch_assoc($result)){
                    $_SESSION['mycode']=$rows['auth_code'];
                }
            }
            echo "<div class='form'>
            <h3>you code ".$_SESSION['mycode']."</h3><br/>
            </div>";
            
            }
        
        if(isset($_POST['dash_submit'])){
            if($_POST['code'] == ""){
                echo "<div class='form'>
                            <h3>Input code.</h3><br/>
                            </div>";
            }
            else if(!empty($_POST['code'])){
                $user_id = $_POST['id'];
                $user_code='';
                $dbcodecompare = $_POST['code'];
                $currentDate = date('Y-m-d H:i:s');
                $mycode=$_POST['mycode'];
                $query = "SELECT * FROM authentication WHERE auth_code='".$dbcodecompare."' AND U_ID='".$user_id."'";
                $result = mysqli_query($con, $query);
                if ($result){
                    while($rows=mysqli_fetch_assoc($result)){
                        $_SESSION["user_id"] = $rows["U_ID"];
                        $_SESSION["codeexp"]=$rows["code_expire"];
                        if($_SESSION["codeexp"] >($currentDate)){
                            if($mycode==$dbcodecompare){
                                    echo "<div class='form' >
                                    <h3>Success.</h3><br/>
                                    <form action='dashboard.php' method='POST'>
                                    <button type='submit'name='success_submit'id='success_submit' onchange='reset()'class='login-button'>OK</button>
                                    </form>
                                    </div>
                                    ";
                            }else{
                                echo "<div class='form'>
                                <h3>Incorrect Code.</h3><br/>
                                </div>";
                            }
                        }else{
                            echo "<script>alert('code expired');</script>";
                        }
                    }
                    
                }
                
                
            }
        }
        if(isset($_POST['success_submit'])){
            $user_id = $_POST['user'];
            $query = "SELECT * FROM 'users' WHERE  U_ID='".$user_id."'";
            $result = mysqli_query($con, $query);
                if ($result){
                    while($rows=mysqli_fetch_assoc($result)){
                    $_SESSION['usertype'] = $rows['usertype'];
                    $_SESSION['username'] = $rows["username"];
                    }
                }
                header("Location:welcome.php");
        }

?>