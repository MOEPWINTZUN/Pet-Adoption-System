<?php 

include('dbconnection.php');

$StaffID=$_GET['SID'];

echo $CtypeDelete ="DELETE FROM stafftb WHERE StaffID= '$StaffID'";

$Ctypequery=mysqli_query($connect, $CtypeDelete);

if ($Ctypequery) {
    echo "<script>window.alert('Successfully PetType Data Deleted')</script>";
    echo "<script>window.location='StaffDashboard.php'</script>";
}
else {
    echo "<script>window.alert('Something went wrong in Delete Statement')</script>";
    echo "<script>window.location='StaffDashboard.php'</script>";
}

?>