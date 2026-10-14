<?php 

include('dbconnection.php');

$PetID=$_GET['PID'];

echo $CtypeDelete ="DELETE FROM pettb WHERE PetID= '$PetID'";

$Ctypequery=mysqli_query($connect, $CtypeDelete);

if ($Ctypequery) {
    echo "<script>window.alert('Successfully Pet Data Deleted')</script>";
    echo "<script>window.location='StaffDashboard.php'</script>";
}
else {
    echo "<script>window.alert('Something went wrong in Delete Statement')</script>";
    echo "<script>window.location='StaffDashboard.php'</script>";
}

?>