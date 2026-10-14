
<?php 
include('dbconnection.php');
include('AutoID.php');

if (isset($_POST['btnregister'])) 
{
	$txtdonatorID=$_POST['txtdonatorID'];
	$donatorname=$_POST['txtdonatorname'];
	$donatoremail=$_POST['txtdonatorEmail'];
	$donatorphno=$_POST['txtdonatorphno'];
	$donatoradd=$_POST['txtaddress'];
	$date=$_POST['date'];
	$selectquery="SELECT * FROM donatortb WHERE DonatorEmail='$donatoremail'";
	$runselect=mysqli_query($connect, $selectquery);
	$donatorrow=mysqli_num_rows($runselect);
 
	if ($donatorrow>0) {
		echo "<script>window.alert('Donator Email already existed!')</script>";
		echo "<script>window.location='DonatorRegister.php'</script>";
	}
	else
	{
		$insertquery="INSERT INTO donatortb(DonatorID, DonatorName , DonatorEmail, DonatorPhNo, DonatorAddress, RegistrationDate) VALUES ('$txtdonatorID','$donatorname','$donatoremail','$donatorphno','$donatoradd','$date')";
		$runinsert=mysqli_query($connect, $insertquery);
		if ($runinsert) 
		{
			echo "<script>window.alert('Donator Regiter Successful!')</script>";
			echo "<script>window.location='DonationDetails.php'</script>";
		}
		else
		{
			echo "<script>window.alert('Donator Regiter  failed.')</script>";
			echo "<script>window.location='DonatorRegister.php'</script>";
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
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title></title>
</head>

<!-- 
<body>
<div class="container">
	<div class="left-section">
			
		<h2 class="title"><i class="fa-solid fa-dog"></i>KIRORO</h2>
            
        
    	<div class="forms-container">
        	<div class="signin-signup">
				
                	<form action="DonatorRegister.php" method="POST" class="sign-in-form">
				
                    <h2>(Donator Register)</h2>
					<div class="input-field">
                        	<i class="fa-solid fa-user"></i>
                        	<input type="text" name="txtdonatorID" value="<?php echo AutoID('donatortb','DonatorID','D-','6') ?>" readonly/>
                    	</div>
					
                    	<div class="input-field">
                        	<i class="fa-solid fa-user"></i>
                        	<input type="text" name="txtdonatorname" placeholder="Enter Your Name" Required> 
                    	</div>
                    	<div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                        	<input type="Email" name="txtdonatorEmail" placeholder=" Enter Your Email" Required> 
                    	</div>
                    	<div class="input-field">
                        	<i class="fa-solid fa-phone"></i>
                        	<input type="text" name="txtdonatorphno" placeholder="Enter Your Phone Number" Required> 
                    	</div>

						<div class="input-field">
                        	<i class="fa-solid fa-phone"></i>
                        	<input type="text" name="txtaddress" placeholder="Enter Your Address" Required> 
                    	</div>
                    	
                    	<input type="submit" name="btnregister" value="Save" class="btn"> 
                    </form>
            </div>
        </div>
	</div>
</div>
</body> -->


<body class="admin">
    <div class="container">
        <header>Donator Registration</header>
        <form action="DonatorRegister.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Donator Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>DonatorID</label>
                            <input type="text" name="txtdonatorID" value="<?php echo AutoID('donatortb','DonatorID','D-','6') ?>"  class="ho"readonly/>
                        </div>
						
                        <div class="input-field">
                            <label>Donator Name</label>
                            <input type="text" name="txtdonatorname" placeholder="Enter Your Name" class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="Email" name="txtdonatorEmail" placeholder=" Enter Your Email"  class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="text" name="txtdonatorphno" placeholder="Enter Your Phone Number" class="ho" Required> 
                        </div>
                        
                        <div class="input-field">
                            <label>Donator Address</label>
                            <input type="text" name="txtaddress" placeholder="Enter Your Address" class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Registration Date</label>
                            <input type="date" name="date" placeholder="Enter your Registration date" class="ho" required>
                        </div>
                    </div>
                </div>
				<button class="sumbit">
							<input type="submit" name="btnregister" value="Save" class="btnText"> 
                            <i class="uil uil-navigator"></i>
                        </button>
						<p>If you are New staff, then <a href="DonatorLogin.php">Sign Up</a> <i class="fa-solid fa-right-to-bracket"></i></p>
        </form>
    </div>
    
</body>

</html>