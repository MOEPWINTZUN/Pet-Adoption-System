<?php
session_start();
include ('dbconnection.php');

if (isset ($_POST ['btnlogin'])) 
{
    $cusemail = $_POST['txtEmail'];
    $cuspassword=$_POST['txtPsw'];

   $selectemailandpassword= "SELECT *FROM usertb WHERE UserEmail ='$cusemail' AND 
    UserPassword='$cuspassword'";

    $query=mysqli_query($connect, $selectemailandpassword);

    $rowcount=mysqli_num_rows($query);

    if ($rowcount>0) {

        $array = mysqli_fetch_array($query);

        $CID= $array['UserID'];
        $Cname =$array['UserName'];
        $email =$array['UserEmail '];
        $ps=$array['UserPassword'];
        // $Sname =$array['SurName'];
        // $email =$array['UserEmail '];
        // $ps=$array['UserPassword'];
        $ua=$array['UserAddress '];
        $up=$array['UserPhoneNo '];

        $_SESSION['CiD']=$CID;
        $_SESSION['Cname']=$Cname;
        $_SESSION['email']=$email;
        $_SESSION['password']=$ps;
        // $_SESSION['Sname']=$Sname;
    
        $_SESSION['address']=$ua;
        $_SESSION['phoneno']=$up;

        setcookie("user", "Cname", time()+10,"/");


        echo "<script>window.alert('Customer Login Successfully')</script>";
		echo "<script>window.location='Pet.php'</script>";
    }

    else {

        if (isset($_SESSION ['logincount'] )) {
           $counterror=$_SESSION['logincount'];

           if ($counterror==1) {
            echo "<script>window.alert('Customer Login Fail Attempt Two')</script>";

            $_SESSION ['logincount']=2; 
           }

           elseif ($counterror==2) {
            echo "<script>window.alert('Customer Login Fail Attempt Three')</script>";

            echo "<script>window.location='waitingroom.php'</script>";
           }
        }

        else {
            echo "<script>window.alert('Customer Login Fail Attempt One')</script>";

            $_SESSION ['logincount']=1;
        }
         
		
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
        <header>User Login Form</header>
        <form action="Cuslogin.php" method="POST" >
            <div class="form first">
                <div class="details personal">
                    <span class="title">User Login</span>
                    <div class="fields">
						 

                    
                        <div class="input-field">
                            <label>User Email</label>
                            <input type="Email" name="txtEmail" placeholder="E.g.kiroro@gmail.com" class="ho" Required> 
                        </div>
                        
                        <div class="input-field">
                            <label>User Password</label>
                            <input type="Password" name="txtPsw" placeholder="Create a Password"  class="ho" Required> 
                        </div>
                        
                    </div>
                </div>
				<button class="sumbit">
                    <input type="submit" name = "btnlogin" value="Login"  class="btnText"> 
                            <i class="uil uil-navigator"></i>
                </button>
                <div class="g-recaptcha" data-sitekey="6Lfp3G0pAAAAAIYH3p8ZdzgCF5m3umioThR_nDDH"> </div>
                    <script type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer> </script>    
                <p>If you are new Adopter, then <a href="Cus.php">Sign Up</a> <i class="fa-solid fa-right-to-bracket"></i></p>
                
        </form>
    </div>
    
</body>
</html>