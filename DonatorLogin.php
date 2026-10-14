<?php
session_start();
include ('dbconnection.php');

if (isset($_POST['btnlogin'])) 
{
    $DonatorEmail = $_POST['txtdonatoremail'];
    

   $selectemailandpassword= "SELECT *FROM donatortb WHERE DonatorEmail='$DonatorEmail'";
    $query=mysqli_query($connect, $selectemailandpassword);

    $rowcount=mysqli_num_rows($query);

    if ($rowcount>0) {

        $array = mysqli_fetch_array($query);

        $DonatorID= $array['DonatorID'];
        $DonatorName =$array['DonatorName'];

        $_SESSION['DID']=$DonatorID;
        $_SESSION['Dname']=$DonatorName;


        echo "<script>window.alert('Donator Login Successfully')</script>";
		echo "<script>window.location='DonationDetails.php'</script>";
    }

    else {
        echo "<script>window.alert('Donator Login Fail')</script>";
		echo "<script>window.location='DonatorLogin.php'</script>";
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
        <header>Donator Login Form</header>
        <form action="DonatorLogin.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Donator Login</span>
                     <div class="fields">
						
                        <div class="input-field">
                            <label>Donator Email</label>
                            <input type="Email" name="txtdonatoremail" placeholder="Email"  class="ho" Required> 
                        </div>
                        
                        
    
                     </div>
                </div>
				<button class="sumbit">
                    <input type="submit" name="btnlogin" value="Save" class="btnText"> 
                            <i class="uil uil-navigator"></i>
                </button>
				<p>If you are New Donator?, then <a href="DonatorRegister.php">Sign In</a> <i class="fa-solid fa-right-to-bracket"></i></p>
                
        </form>
    </div>
    
</body>
</html>