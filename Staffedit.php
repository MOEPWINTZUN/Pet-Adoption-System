<?php

include('dbconnection.php');

if (isset($_GET['SID'])) {
    $StaffID = $_GET['SID'];
    
    // Prepare the SQL query to select staff
    $ptupdate = "SELECT * FROM stafftb WHERE StaffID = '$StaffID'";
    $updatequery = mysqli_query($connect, $ptupdate);
    
    // Check if the query was successful
    if (!$updatequery) {
        die("Query Failed: " . mysqli_error($connect));
    }

    // Check if any rows were returned
    $Sarray = mysqli_fetch_array($updatequery);

    if ($Sarray) {
        // Fetch the details only if the array is not null
        $StaffID = $Sarray['StaffID'];
        $StaffName = $Sarray['StaffName'];
        $Position = $Sarray['Position'];
        $StaffEmail = $Sarray['StaffEmail'];
        $StaffPassword = $Sarray['StaffPassword'];
        $StaffPhNo = $Sarray['StaffPhNo'];
    } else {
        echo "<script>alert('No staff found with this ID'); window.location='StaffDashboard.php';</script>";
        exit();
    }
}

if (isset($_POST['btnUpdate'])) {
    $StaffID = $_POST['txtStaffID'];
    $StaffName = $_POST['txtsname'];
    $Position = $_POST['txtpo'];
    $StaffEmail = $_POST['txtse'];
    $StaffPassword = $_POST['txtsp'];
    $StaffPhNo = $_POST['txtsph'];

    // Update query
    $update = "UPDATE stafftb SET 
                StaffName='$StaffName', 
                Position='$Position', 
                StaffEmail='$StaffEmail', 
                StaffPassword='$StaffPassword', 
                StaffPhNo='$StaffPhNo' 
                WHERE StaffID='$StaffID'";
    
    $updatequery = mysqli_query($connect, $update);

    // Check if the update query was successful
    if ($updatequery) {
        echo "<script>alert('Staff Data Updated Successfully!'); window.location='StaffDashboard.php';</script>";
    } else {
        echo "<script>alert('Something went wrong in Update Statement'); window.location='StaffDashboard.php';</script>";
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
<label>Staff List Edit</label> <br>
<input type="text" name="txtStaffID" value="<?php echo $StaffID ?>" readonly="">
<br>

    <label>StaffName </label> <br>
    <input type="text" name="txtsname" value="<?php echo $StaffName ?>">
    <br>

    <label>Position</label> <br>
		<input type="text" name="txtpo" value="<?php echo $Position ?>">
		<br>

        <label>StaffEmail</label> <br>
		<input type="text" name="txtse" value="<?php echo $StaffEmail ?>">
		<br>
 
		<label>StaffPassword</label> <br>
        <input type="text" name="txtsp" value="<?php echo $StaffPassword ?>">
        <br>
 
		<label>StaffPhNo</label> <br>
		<input type="text" name="txtsph" value="<?php echo $StaffPhNo ?>">
		<br>

    
		<input type="Submit" name="btnUpdate" value="Update">
 </div>
	</form>
</body>
</html>