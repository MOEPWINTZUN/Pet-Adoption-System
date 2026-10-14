<?php 
include('dbconnection.php');
include('AutoID.php');
session_start();
 
if (isset($_POST['btnRegister'])) 
{
    $txtuserid=$_POST['txtuserid'];
    $UsName=$_POST['txtUserName'];
    $sname=$_POST['txtsurename'];
    $Email=$_POST['txtEmail'];
    $Psw=$_POST['txtPsw'];
    $address=$_POST['txtadress'];
    $PhNum=$_POST['txtPhNum'];
    $Rmonth=$_POST['txtRmonth'];
 
    //img upload
    $Pfp=$_FILES['filePfp']['name'];
    $copyfolder="Images/";
    // $filename=$copyfolder.$Pfp."_".uniqid();
       $filename = $copyfolder . uniqid() . "_" . $Pfp;
    $copy=copy($_FILES['filePfp']['tmp_name'], $filename);
 
    if (!$copy) 
    {
        echo "<p>Profile Photo cannot be uploaded</p>";
        exit();
    }
 
    $number=preg_match('@[0-9]@', $Psw);
    $upperletter=preg_match('@[A-Z]@', $Psw);
    $lowerletter=preg_match('@[a-z]@', $Psw);
    $specialcharacter=preg_match('@[^\w]@', $Psw);
    $checkUN="SELECT * FROM usertb WHERE UserName='$UsName'";
    $query=mysqli_query($connect, $checkUN);
    $count=mysqli_num_rows($query);
    if ($count>0) 
    {
    	echo "<script>window.alert('Username already exist')</script>";
    	echo "<script>window.location='Cus.php'</script>";
    }
    else if(strlen($Psw) <8 || !$number || !$upperletter || !$lowerletter || !$specialcharacter)
    {
    	echo "<script>window.alert('Password length must include 8 characters that include at least a number, an upper letter and a lower letter.')</script>";
        echo "<script>window.location='Cus.php'</script>";
    }
    else
    {
    	$insert="INSERT INTO usertb(UserID, UserName, SurName, UserEmail, UserPassword, UserAddress, UserPhoneNo, RegistrationMonth, Profile) VALUES('$txtuserid','$UsName', '$sname','$Email', '$Psw', '$address', '$PhNum', '$Rmonth', '$filename')";
    	$insertquery=mysqli_query($connect, $insert);
    	if ($insertquery) 
    	{
    		echo "<script>window.alert('Account created successfully')</script>";
    		echo "<script>window.location='CusHome.php'</script>";
    	}
    }
}
 
?>
 
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="admin.css">
<link rel="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<title>Customer Registration</title>
</head>



<body class="admin">
    <div class="container">
        <header>User Registration</header>
        <form action="Cus.php" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">User Details</span>
                    <div class="fields">
						 

                        <div class="input-field">
                            <label>UserID</label>
                            <input type="text" name="txtuserid" value="<?php echo AutoID('usertb','UserID','U-','6') ?>"  class="ho"readonly/>
                    	</div> 

                        <div class="input-field">
                            <label>User Name</label>
                            <input type="text" name="txtUserName" placeholder="Create a Username" class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Sure Name</label>
                            <input type="text" name="txtsurename" placeholder="SureName" class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>User Email</label>
                            <input type="Email" name="txtEmail" placeholder="E.g.kiroro@gmail.com" class="ho" Required> 
                        </div>
                        
                        <div class="input-field">
                            <label>User Password</label>
                            <input type="Password" name="txtPsw" placeholder="Create a Password"  class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>User Address</label>
							<input type="text" name="txtadress" placeholder="Enter Your Address" class="ho" required>
                        </div>

                        <div class="input-field">
                            <label>User Phone Number</label>
                            <input type="text" name="txtPhNum" placeholder="Enter Phone Number"  class="ho" required>
                        </div>

                        <div class="input-field">
                            <label>User Registration Date Nmber</label>
                            <input type="date" name="txtRmonth" placeholder="Enter Registration Date"  class="ho" required>
                        </div>

                        <div class="input-field">
                            <label>User Profile</label>
                            <input type="file" name="filePfp"   class="ho" required>
                        </div>
                    </div>
                </div>
				<button class="sumbit">
                <input type="submit" name="btnRegister" value="Register" class="btnText"> 
                            <i class="uil uil-navigator"></i>
                </button>
				<p>If you are old Adopter, then <a href="cuslogin.php">Sign Up</a> <i class="fa-solid fa-right-to-bracket"></i></p>
                
        </form>
    </div>
    
</body>
</html>