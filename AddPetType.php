<?php 
include('dbconnection.php');

if (isset($_POST['btnregister'])) 
{
	$pettype=$_POST['txtpettype'];
	$selectquery="SELECT * FROM pettypetb WHERE PetType='$pettype'";
	$runselect=mysqli_query($connect, $selectquery);
	$pettypeRow=mysqli_num_rows($runselect);
 
	if ($pettypeRow>0) {
		echo "<script>window.alert('Pet Type already existed')</script>";
		echo "<script>window.location='AddPetType.php'</script>";
	}
	else
	{
		$insertquery="INSERT INTO pettypetb(PetType) VALUES ('$pettype')";
		$runinsert=mysqli_query($connect, $insertquery);
		if ($runinsert) 
		{
			echo "<script>window.alert('Pet Type data successfully added!')</script>";
			echo "<script>window.location='Pet.php'</script>";
		}
		else
		{
			echo "<script>window.alert('Campaign Type data addition failed.')</script>";
			echo "<script>window.location='Pet.php'</script>";
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
        <header>Pet Type Data</header>
		<form action="AddPetType.php" method="POST" class="sign-in-form">
            <div class="form first">
                <div class="details personal">
                
                    <div class="fields">
						 

                        <div class="inputs-field">
                            <label>Pet Type</label> <br>
                            <input type="text" name="txtpettype" placeholder=" Enter Pet Type" Required> 
                    	</div> 

						<button class="sumbit">
						<input type="submit" name="btnregister" value="Save" class="btnText"> 
                            <i class="uil uil-navigator"></i>
                        </button>
						</div>
                </div>
				      
			
                
        </form>
    </div>
    
</body>
</html>