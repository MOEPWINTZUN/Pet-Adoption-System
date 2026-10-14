<?php

include('dbconnection.php');

if (isset($_GET['PTID'])) {
	$Pid=$_GET['PTID'];
	$ptupdate="SELECT * FROM pettypetb  WHERE PetTypeID = '$Pid'";
	$updatequery=mysqli_query($connect, $ptupdate);
 
	$Ptarray=mysqli_fetch_array($updatequery);
	$Pid=$Ptarray['PetTypeID'];
	$PetType=$Ptarray['PetType'];
    
}
 
if (isset($_POST['btnUpdate'])) {
	$Pid=$_POST['txtPetTypeID'];
	$PetType=$_POST['txtPTname'];
	
	$update="UPDATE pettypetb SET PetType='$PetType' WHERE PetTypeID='$Pid'";
	$updatequery=mysqli_query($connect, $update);
 
	if ($updatequery){
		echo "<script>window.alert('PetType Data Updated Successfully!')</script>";
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
<label>Pet Type List Edit</label> <br>
<input type="text" name="txtPetTypeID" value="<?php echo $Pid ?>" readonly="">
<br>

    <label>PetType </label> <br>
    <input type="text" name="txtPTname" value="<?php echo $PetType ?>">
    <br>

    
		<input type="Submit" name="btnUpdate" value="Update">
 </div>
	</form>
</body>
</html>