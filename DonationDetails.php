<?php  
session_start(); 
include('dbconnection.php');
include('AutoID.php');
include('DonationDetailsFunctions.php');

if(isset($_POST['btnSave'])) 
{
	$txtdonationID=$_POST['txtdonationID'];
	
	$frequency=$_POST['cbofrequency'];
	$txtDonationDate=$_POST['txtDonationDate'];
	$cbodonatorname=$_POST['cbodonatorname'];	
	$txtdonationitems=$_POST['txtdonationitems'];	
	$txtdescription=$_POST['txtdescription'];
	$img1= $_FILES['fileimg1']['name'];
    $copyfile="Images/";
    $filename1= $copyfile.uniqid()."_".$img1;
    $copy=copy($_FILES['fileimg1']['tmp_name'], $filename1);

    if (!$copy) {
      echo "<p> Cannot upload Img1</p>";
      exit();
    }
	
	$Query1="INSERT INTO `donationtb`
			(`DonationID`, `DonationFrequency`, `DonationDate`, `DonatorID`, `DonationItems`, `Descriptions`,`DonationItemsPhoto`) 
			VALUES
			('$txtdonationID','$frequency','$txtDonationDate','$cbodonatorname','$txtdonationitems','$txtdescription', '$filename1')
			";
	$result=mysqli_query($connect,$Query1);
	

	

	if (isset($_SESSION['DonationFunctions']))

	{
		$size=count($_SESSION['DonationFunctions']);

		for($i=0;$i<$size;$i++) 
	{ 
		$PetID=$_SESSION['DonationFunctions'][$i]['PetID'];
		$ItemsQuantity=$_SESSION['DonationFunctions'][$i]['PetQuantity'];

		$Query2="INSERT INTO `donationdetailstb`
				(`DonationID`, `PetID`, `PetQuantity`) 
				VALUES
				('$txtdonationID','$PetID','$ItemsQuantity')
				";
		$result=mysqli_query($connect,$Query2);


		 $update="UPDATE pettb
		         set PetQuantity=PetQuantity+'$ItemsQuantity'
		         Where PetID='$PetID'";
		         $updateret=mysqli_query($connect,$update);

		         if($result) 
	{
		echo "<script>window.alert('DonationDetails Data are successfully saved')</script>";
		unset($_SESSION['DonationFunctions']);
		echo "<script>window.location='DonationDetails.php'</script>";
	}
	else
	{
		echo "<p>Something wrong in DonationDetails :" . mysqli_error($connect) . "</p>";
	}
		

	}



	}
	
	

	
}

if(isset($_POST['btnAdd'])) 
{	
	$PetID=$_POST['cboPetID'];
	$ItemsQuantity=$_POST['txtitemsqty'];
	// $txtdonationitems=$_POST['txtdonationitems'];

	AddDonation($PetID,$ItemsQuantity);
}

if (isset($_REQUEST['Action'])) 
{
	$Action=$_REQUEST['Action'];

	if ($Action === "Remove") 
	{
		$PetID=$_REQUEST['Pid'];
		RemovePet($PetID);
	}
	elseif($Action === "ClearAll") 
	{
		ClearAll();
	}
}
else
{
	$Action="";
}

?>
<html>
<head>
	<title>DonationDetails</title>
	<script type="text/javascript" src="DatePicker/datepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="admin.css">
	<link rel="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="admin">
	<div class="containers">
    	<header>Donation Details </header>
        	<form action="DonationDetails.php" method="POST" enctype="multipart/form-data">
            	<div class="form first">
                	<div class="details personal">
                    	<!-- <span class="title">Donator Details</span> -->
                    			<div class="fields">
									<div class="input-field">
                            			<label>DonationID</label>
                            			<input type="text" name="txtdonationID" value="<?php echo AutoID('donationtb','DonationID','DO-','6') ?>"  class="ho"readonly/>
                    				</div> 

                        		

                        		<div class="input-field">
                            			<label>Donation Frequency</label>
                            			<select name="cbofrequency" required>
    										<option value="One Time">One Time</option>
    										<option value="Monthly">Monthly</option>
    										<option value="Yearly">Yearly</option>
    
										</select>
                        		</div>

                        		<div class="input-field">
                            			<label>Donation Date</label>
                            			<input type="text" name="txtDonationDate" value="<?php echo date('Y-m-d') ?>" OnClick="showCalender(calender,this)" readonly/>
                        		</div>
                        
                        		<div class="input-field">
                            			<label>Donator Name </label>
                            			<select name="cbodonatorname" class="cbodo" required>
								
								<option>-Choose Your Name-</option>
								<?php
                                    $select= "SELECT* FROM donatortb";
                                    $query=mysqli_query($connect, $select);

                                    $count=mysqli_num_rows($query);

                                    for ($i=0; $i < $count; $i++) { 
                                    $row=mysqli_fetch_array($query);
                                    $DID=$row['DonatorID'];
                                    $DN=$row['DonatorName'];

                                    echo "<option value='$DID'>$DN </option>";

                                    }
                                  ?>
							</select>
                        		</div>

                        		<div class="input-field">
                            			<label>PetID</label>
										<select name="cboPetID" class="cbodo" required>
								
								<option>-Choose PetID-</option>
								<?php
                                    $select= "SELECT* FROM pettb";
                                    $query=mysqli_query($connect, $select);

                                    $count=mysqli_num_rows($query);

                                    for ($i=0; $i < $count; $i++) { 
                                    $row=mysqli_fetch_array($query);
                                    $PID=$row['PetID'];
                                    $PN=$row['PetName'];

                                    echo "<option value='$PID'>$PID-$PN </option>";

                                    }
                                  ?>
							</select>
                        		</div>

								<div class="input-field">
                            			<label>Donation items</label>
                            			<input type="text" name="txtdonationitems" placeholder=" Enter Donation Items" class="ho" required>
                        		</div>

								<div class="input-field">
                            			<label>Donation Description</label>
                            			<input type="text" name="txtdescription" placeholder=" Enter Description" class="ho" required>
                        		</div>

								<div class="input-field">
                            			<label>Donation Images</label>
                            			<input type="file" name="fileimg1" placeholder="Enter Donation Items Image" class="ho" required>
                        		</div>

								<div class="input-field">
                            			<label>Donation Items Quantity</label>
										<input type="number" name="txtitemsqty" class="ho" value="0" required/>
                        		</div>

								<button class="sumbit">
				<input type="submit" name="btnAdd" value="Add" class="add"/>
				<a href="DonationDetails.php?Action=ClearAll">Clear All</a>
				<i class="uil uil-navigator"></i>
                </button>

			
                </div>
            </div>
				
			
                
        
    
    


<?php  
if(!isset($_SESSION['DonationFunctions'])) 
{
	echo "<p>No Donation Record Found.</p>";
}
else
{
?>
  <!-- <div class="Petde">
  	<fieldset>
			<table border="1 solid white">
					<tr>
						<th>PetID</th>
						<th>Pet Photo </th>
						
						<th>PetQuantity</th>
						<th>PetBreed</th>
						<th>Action</th>
					</tr>
					<?php  
					$size=count($_SESSION['DonationFunctions']);

						for ($i=0;$i<$size;$i++) 
					{	
						$PetID=$_SESSION['DonationFunctions'][$i]['PetID'];
						$Image=$_SESSION['DonationFunctions'][$i]['PetImage1'];
						
						$PetQuantity=$_SESSION['DonationFunctions'][$i]['PetQuantity'];
						$Petbreed=$_SESSION['DonationFunctions'][$i]['PetBreed'];

	
	

						echo "<tr>";
						echo "<td>$PetID</td>";
						echo "<td><img src='$Image' width='100px' height='100px'/></td>";
						
						echo "<td>$PetQuantity</td>";
						echo "<td>$Petbreed</td>";
	
						echo "<td><a href='DonationDetails.php?Pid=$PetID&Action=Remove'>Remove</a></td>";
						echo "</tr>";
						
					}
				?>
<tr>
	<td colspan="7" align="right">
	DonatorID :
	<select name="cbodonatorname">
	<option>-Choose Donator-</option>

	
	<?php  
	echo $query_pro="SELECT * FROM donatortb";
	$ret_pro=mysqli_query($connect,$query_pro);
	$count_pro=mysqli_num_rows($ret_pro);

	for($i=0;$i<$count_pro;$i++) 
	{ 
		$row_pro=mysqli_fetch_array($ret_pro);
		$DonatorID=$row_pro['DonatorID'];
		$DonatorName=$row_pro['DonatorName'];

		echo "<option value='$DonatorID'>$DonatorID - $DonatorName</option";
	}
	?>
	</select>
	

	</td>
	<td><input type="submit" name="btnSave" value="Save"/></td>

</tr>
	

	


			</table>
</div>
<?php 
}
?>


<hr>
<hr>
	</fieldset>	


	</div> -->

	<div class="pet-list">
    <?php
    $size = count($_SESSION['DonationFunctions']);
    
    for ($i = 0; $i < $size; $i++) {
        $PetID = $_SESSION['DonationFunctions'][$i]['PetID'];
        $Image = $_SESSION['DonationFunctions'][$i]['PetImage1'];
        $PetQuantity = $_SESSION['DonationFunctions'][$i]['PetQuantity'];
        $Petbreed = $_SESSION['DonationFunctions'][$i]['PetBreed'];
        
        echo "<div class='pet-card'>";
        echo "<img src='$Image' alt='Pet Image' />";
        echo "<div class='pet-info'>";
        echo "<h3>Pet ID: $PetID</h3>";
        echo "<div class='pet-details'>";
        echo "<span>Breed: $Petbreed</span>";
        echo "<span>Quantity: $PetQuantity</span>";
        echo "</div>";
        echo "</div>";
        echo "<div class='action-btn'>";
        echo "<a href='DonationDetails.php?Pid=$PetID&Action=Remove'>Remove</a>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>

<div class="donator-select">
    DonatorID:
    <select name="cbodonatorname">
        <option>-Choose Donator-</option>
        <?php  
        echo $query_pro = "SELECT * FROM donatortb";
        $ret_pro = mysqli_query($connect, $query_pro);
        $count_pro = mysqli_num_rows($ret_pro);
        
        for ($i = 0; $i < $count_pro; $i++) { 
            $row_pro = mysqli_fetch_array($ret_pro);
            $DonatorID = $row_pro['DonatorID'];
            $DonatorName = $row_pro['DonatorName'];
            
            echo "<option value='$DonatorID'>$DonatorID - $DonatorName</option>";
        }
        ?>
    </select>
	<button class="sumbit">
    	<input type="submit" name="btnSave" value="Save" class="btnText" />
	</button>
</div>
</form>
</body>


</html>
