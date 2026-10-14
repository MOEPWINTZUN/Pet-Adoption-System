<?php 
include('dbconnection.php');
include('AutoID.php');
if (isset($_POST['btnregister'])) 
{
	$txtstaffid=$_POST['txtstaffid'];
	$staffname=$_POST['txtstaffname'];
	$position=$_POST['txtposition'];
	$staffemail=$_POST['txtstaffemail'];
	$staffpassword=$_POST['txtstaffpassword'];
	$staffphno=$_POST['txtstaffphno'];
	//-------------Password Format-------------//
		$number=preg_match('@[0-9]@', $staffpassword);
		$upperletter=preg_match('@[A-Z]@', $staffpassword);
		$lowerletter=preg_match('@[a-z]@', $staffpassword);
		$specialcharacter=preg_match('@[^\w]@', $staffpassword);
	//-------------Email Check-------------//
	
	$staffaccountcheck="SELECT * FROM stafftb WHERE StaffEmail='$staffemail' AND StaffPassword='$staffpassword'";
	$staffquery=mysqli_query($connect,$staffaccountcheck);
	$staffrow=mysqli_num_rows($staffquery);
	if ($staffrow>0) 
	{
		echo "<script>window.alert('Admin Email already existed!')</script>";
		echo "<script>window.location='staff.php'</script>";
	}
	
	elseif (strlen($staffpassword)<8 || !$number || !$upperletter || !$lowerletter || !$specialcharacter) {
		echo "<script>window.alert('Password length is must include 8 character and include one number, one upperletter, one lowerletter and one specialcharacter')</script>";
		echo "<script>window.location='staff.php'</script>";
	}
	else
	{
		$staffinsertdata="INSERT INTO stafftb(StaffID, StaffName ,	Position, StaffEmail , StaffPassword ,	StaffPhNo 	)
		VALUES('$txtstaffid','$staffname','$position','$staffemail','$staffpassword','$staffphno')";
		$inserted=mysqli_query($connect,$staffinsertdata);
		if ($inserted) 
		{
			echo "<script>window.alert('Staff Account create Successfully!')</script>";
		echo "<script>window.location='stafflogin.php'</script>";
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


<!-- <body>
	<div class="container">
		<div class="left-section">
			
			<h2 class="title"><i class="fa-solid fa-dog"></i>KIRORO</h2>
            
        
    		<div class="forms-container">
        		<div class="signin-signup">
				
                	<form action="staff.php" method="POST" class="sign-in-form">
				
                    <h2>(Staff Sign in)</h2>
                    	<div class="input-field">
                        	<i class="fa-solid fa-user"></i>
                        	<input type="text" name="txtstaffname" placeholder=" StaffName" Required> 
                    	</div>
                    	<div class="input-field">
                        	<i class="fa-solid fa-location-pin"></i>
                        	<input type="text" name="txtposition" placeholder=" Position" Required> 
                    	</div>
                    	<div class="input-field">
                        	<i class="fa-solid fa-envelope"></i>
                        	<input type="Email" name="txtstaffemail" placeholder="Email" Required> 
                    	</div>
                    	<div class="input-field">
                        	<i class="fa-solid fa-lock"></i>
                        	<input type="Password" name="txtstaffpassword" placeholder=" Password" Required> 
                    	</div>
                    	<div class="input-field">
                        	<i class="fa-solid fa-phone"></i>
                        	<input type="text" name="txtstaffphno" placeholder=" Phone Number" Required> 
                    	</div>
                    	<input type="submit" name="btnregister" value="Save" class="btn"> 
                    </form>
						<p>If you are old staff, then <a href="stafflogin.php">Sign Up</a> <i class="fa-solid fa-right-to-bracket"></i></p>
            	</div>
        	</div>
		</div>
	</div>
</body> -->

<body class="admin">
    <div class="container">
        <header>Staff Registration</header>
        <form action="staff.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Staff Details</span>
                    <div class="fields">
						<div class="input-field">
                            <label>StaffID</label>
                            <input type="text" name="txtstaffid" value="<?php echo AutoID('stafftb','StaffID','S-','6') ?>"  class="ho"readonly/>
                    	</div> 

                        <div class="input-field">
                            <label>Staff Name</label>
                            <input type="text" name="txtstaffname" placeholder=" StaffName" class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Staff Position</label>
                            <input type="text" name="txtposition" placeholder=" Position" class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Staff Email</label>
                            <input type="Email" name="txtstaffemail" placeholder="Email" class="ho" Required> 
                        </div>
                        
                        <div class="input-field">
                            <label>Staff Password</label>
                            <input type="Password" name="txtstaffpassword" placeholder=" Password"  class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Staff Phone Number</label>
							<input type="text" name="txtstaffphno" placeholder=" Phone Number"class="ho" required>
                        </div>
                    </div>
                </div>
				<button class="sumbit">
					<input type="submit" name="btnregister" value="Save" class="btnText"> 
                            <i class="uil uil-navigator"></i>
                </button>
				<p>If you are old staff, then <a href="stafflogin.php">Sign Up</a> <i class="fa-solid fa-right-to-bracket"></i></p>
                
        </form>
    </div>
    
</body>
</html>