<?php
session_start();
include ('dbconnection.php');

if (isset($_POST['btnlogin'])) 
{
    $staffemail = $_POST['txtstaffemail'];
    $staffpassword=$_POST['txtstaffpassword'];

   $selectemailandpassword= "SELECT *FROM stafftb WHERE StaffEmail='$staffemail' AND 
    StaffPassword='$staffpassword'";

    $query=mysqli_query($connect, $selectemailandpassword);

    $rowcount=mysqli_num_rows($query);

    if ($rowcount>0) {

        $array = mysqli_fetch_array($query);

        $StaffID= $array['StaffID'];
        $StaffName =$array['StaffName'];

        $_SESSION['SID']=$StaffID;
        $_SESSION['Sname']=$StaffName;


        echo "<script>window.alert('Staff Login Successfully')</script>";
		echo "<script>window.location='StaffDashboard.php'</script>";
    }

    else {
        echo "<script>window.alert('Staff Login Fail')</script>";
		echo "<script>window.location='stafflogin.php'</script>";
    }
}


?>









<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title></title>
    </head>


    <body class="admin">
    <div class="container">
        <header>Staff Login Form</header>
        <form action="stafflogin.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Staff Login</span>
                     <div class="fields">
						
                        <div class="input-field">
                            <label>Staff Email</label>
                            <input type="Email" name="txtstaffemail" placeholder="Email"  class="ho" Required> 
                        </div>
                        
                        <div class="input-field">
                            <label>Staff Password</label>
                            <input type="Password" name="txtstaffpassword" placeholder=" Password" class="ho" Required> 
                        </div>
    
                     </div>
                </div>
				<button class="sumbit">
                    <input type="submit" name="btnlogin" value="Save" class="btnText"> 
                            <i class="uil uil-navigator"></i>
                </button>
				<p>If you are New staff, then <a href="staff.php">Sign In</a> <i class="fa-solid fa-right-to-bracket"></i></p>
                
        </form>
    </div>
    
</body>
</html>