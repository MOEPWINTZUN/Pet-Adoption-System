<?php

include('dbconnection.php');

if (isset($_GET['PID'])) {
	$PetID=$_GET['PID'];
	$Cupdate="SELECT * FROM pettb   WHERE PetID ='$PetID'";
	$updatequery=mysqli_query($connect, $Cupdate);
 
	$Cusarray=mysqli_fetch_array($updatequery);
	$PetID=$Cusarray['PetID'];
    $PetTypeID=$Cusarray['PetTypeID'];
    $PetBreed=$Cusarray['PetBreed'];
    $PetQuantity=$Cusarray['PetQuantity'];
    $ArrivalDate=$Cusarray['ArrivalDate'];
    $PetAdoptionFees=$Cusarray['PetAdoptionFees'];
    $DescriptionOfPet=$Cusarray['DescriptionOfPet'];


}

if (isset($_POST['btnUpdate'])) {
	$PetID=$_POST['txtPid'];
	$PetTypeID=$_POST['txtPtid'];
	$PetBreed=$_POST['txtPbreed'];
    $PetQuantity=$_POST['txtpqty'];
	$ArrivalDate=$_POST['txtad'];
    $PetAdoptionFees=$_POST['txtafee'];
    $DescriptionOfPet=$_POST['txtdop'];
	
  
	$update="UPDATE  pettb    SET PetTypeID='$PetTypeID', PetBreed='$PetBreed', PetQuantity='$PetQuantity',
     ArrivalDate='$ArrivalDate',  PetAdoptionFees='$PetAdoptionFees', DescriptionOfPet='$DescriptionOfPet' 
      WHERE PetID='$PetID'";
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
<input type="text" name="txtPid" value="<?php echo $PetID ?>" readonly="">
<br>

    <label> PetTypeID</label> <br>
    <input type="text" name="txtPtid" value="<?php echo $PetTypeID ?>">
    <br> 

    <label> Breed</label> <br>
    <input type="text" name="txtPbreed" value="<?php echo $PetBreed ?>">
    <br>

    <label>PetQuantity</label> <br>
		<input type="text" name="txtpqty" value="<?php echo $PetQuantity ?>">
		<br>

	

		<label>ArrivalDate</label> <br>
		<input type="text" name="txtad" value="<?php echo $ArrivalDate ?>">
		<br>

        <label>PetAdoptionFees</label> <br>
		<input type="text" name="txtafee" value="<?php echo $PetAdoptionFees ?>">
		<br>

        <label>DescriptionOfPet</label> <br>
		<input type="text" name="txtdop" value="<?php echo $DescriptionOfPet ?>">
		<br>
 
		

		
		<br>

		
		<br>

		<input type="Submit" name="btnUpdate" value="Update">
 </div>
	</form>
</body>
</html>