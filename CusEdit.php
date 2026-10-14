<?php

include('dbconnection.php');

if (isset($_GET['CID'])) {
	$UserID=$_GET['CID'];
	$Cupdate="SELECT * FROM usertb  WHERE UserID ='$UserID'";
	$updatequery=mysqli_query($connect, $Cupdate);
 
	$Cusarray=mysqli_fetch_array($updatequery);
	$UserID=$Cusarray['UserID'];
    $Uname=$Cusarray['UserName'];
    $Fname=$Cusarray['SurName'];
    $email=$Cusarray['UserEmail'];
    $password=$Cusarray['UserPassword'];
    $Add=$Cusarray['UserAddress'];
    $Phnum=$Cusarray['UserPhoneNo'];
    $Remonth=$Cusarray['RegistrationMonth'];

}

if (isset($_POST['btnUpdate'])) {
	$UserID=$_POST['txtCid'];
	$Uname=$_POST['txtUname'];
	$Fname=$_POST['txtFname'];
    $email=$_POST['txtemail'];
	$password=$_POST['txtpass'];
    $Add=$_POST['txtadd'];
    $Phnum=$_POST['txtph'];
	$Remonth=$_POST['txtrmonth'];
  
	$update="UPDATE  usertb   SET UserName='$Uname', SurName='$Fname', UserEmail='$email',
     UserPassword='$password',  UserAddress='$Add', UserPhoneNo='$Phnum', RegistrationMonth='$Remonth'  WHERE UserID='$UserID'";
	$updatequery=mysqli_query($connect, $update);
 
	if ($updatequery){
		echo "<script>window.alert('User Data Updated Successfully!')</script>";
    	echo "<script>window.location='StaffDashboard.php'</script>";
	}
	else{
    	echo "<script>window.alert('Something went wrong in Update Statement')</script>";
    	echo "<script>window.location='StaffDashboard.php'</script>";
	}
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
</head>
<body class="staff">
<form action="" method="POST">
<div class="form"> 
<label>Camapign List Edit</label> <br>
<input type="text" name="txtCid" value="<?php echo $UserID ?>" readonly="">
<br>

    <label> UserName</label> <br>
    <input type="text" name="txtUname" value="<?php echo $Uname ?>">
    <br>

    <label>SurName</label> <br>
		<input type="text" name="txtFname" value="<?php echo $Fname ?>">
		<br>

	

		<label>Email</label> <br>
		<input type="text" name="txtemail" value="<?php echo $email ?>">
		<br>

        <label>Password</label> <br>
		<input type="text" name="txtpass" value="<?php echo $password ?>">
		<br>

        <label>Address</label> <br>
		<input type="text" name="txtadd" value="<?php echo $Add ?>">
		<br>
 
		<label>PhoneNo</label> <br>
        <input type="text" name="txtph" value="<?php echo $Phnum ?>">
        <br>
 
		<label>RegistrationMonth</label> <br>
		<input type="text" name="txtrmonth" value="<?php echo $Remonth ?>">
		<br>

		
		<br>

		
		<br>

		<input type="Submit" name="btnUpdate" value="Update">
 </div>
	</form>
</body>
</html>