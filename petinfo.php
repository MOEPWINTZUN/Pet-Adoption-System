<?php 
session_start();
include('dbconnection.php');
include('AutoID.php');
// if (!isset($_SESSION['SID'])) {
// 	echo "<script>window.alert('Please Sign In First!')</script>";
// 	echo "<script>window.location='stafflogin.php'</script>";
// }
if (isset($_POST['btnAdd'])) 
{
    $txtpetid=$_POST['txtpetid'];
    $ptype= $_POST['cbopettype'];
    $Petbreed= $_POST['txtPetbreed'];
    $pname= $_POST['txtpetquantity'];
    $pdate= $_POST['txtpetdate'];
    $plocation= $_POST['txtpetlocation'];
    $fees=$_POST['txtpetfees'];
    $des=$_POST['txtdescription'];
    $img1= $_FILES['fileimg1']['name'];
    $copyfile="Images/";
    $filename1= $copyfile.uniqid()."_".$img1;
    $copy=copy($_FILES['fileimg1']['tmp_name'],  $filename1);

    if (!$copy) {
      echo "<p> Cannot upload Img1</p>";
      exit();
    }

    $img2= $_FILES['fileimg2']['name'];
    $copyfile="Images/";
    $filename2= $copyfile.uniqid()."_".$img2;
    $copy=copy($_FILES['fileimg2']['tmp_name'],  $filename2);

    if (!$copy) {
      echo "<p> Cannot upload Img2</p>";
      exit();
    }

    $img3= $_FILES['fileimg3']['name'];
    $copyfile="Images/";
    $filename3= $copyfile.uniqid()."_".$img3;
    $copy=copy($_FILES['fileimg3']['tmp_name'],  $filename3);

    if (!$copy) {
      echo "<p> Cannot upload Img3</p>";
      exit();
    }

  


  $select="SELECT*FROM pettb WHERE PetID='$txtpetid'";

  $query= mysqli_query($connect, $select);

  $count=mysqli_num_rows($query);

  if($count>0)
  {
    echo "<script>window.alert('Pet already existed!')</script>";
		echo "<script>window.location='AddCampaign.php'</script>";
  }
  else {
    $insert = "INSERT INTO pettb (PetID, PetTypeID, Petbreed, PetQuantity, ArrivalDate, PetLocation, PetAdoptionFees, DescriptionOfPet, PetImage1, PetImage2, PetImage3)
VALUES ('$txtpetid', '$ptype', '$Petbreed', '$pname', '$pdate', '$plocation', '$fees', '$des', '$filename1', '$filename2', '$filename3')";

    $query=mysqli_query($connect,$insert);

    if ($query) {
        echo "<script>window.alert('Success!')</script>";
        echo "<script>window.location='Pet.php'</script>";
    }
  }

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="admin.css">
<title>Add PetInfo </title>
</head>


    <body class="admin">
    <div class="container">
        <header>Pet Registration</header>
          <form action="petinfo.php" method="POST" enctype="multipart/form-data" >
            <div class="form first">
                <div class="details personal">
                    <span class="title">Pet Details</span>
                    <div class="fields">
						 

                        <div class="input-field">
                            <label>Petinfo ID</label>
                            <input type="text" name="txtpetid" value="<?php echo AutoID('pettb','PetID','P0-','6') ?>" class="ho"readonly/>
                    	</div> 

                      <div class="input-field">
                        <label>Select Pet Type</label>
                                <select name="cbopettype" class="cbodo">
                                  <?php
                                    $select= "SELECT* FROM pettypetb";
                                    $query=mysqli_query($connect, $select);

                                    $count=mysqli_num_rows($query);

                                    for ($i=0; $i < $count; $i++) { 
                                    $row=mysqli_fetch_array($query);
                                    $PTID=$row['PetTypeID'];
                                    $PTname=$row['PetType'];

                                    echo "<option value='$PTID'>$PTname </option>";

                                    }
                                  ?>
                                </select>
                    	      </div>
                        <div class="input-field">
                            <label>Pet breed</label>
                            <input type="text" name="txtPetbreed" placeholder=" Enter Pet breed"  class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Pet Quantity</label>
                            <input type="number" name="txtpetquantity" class="ho"  value="0"/> 
                        </div>
                        <div class="input-field">
                            <label>Pet Arrivaldate</label>
                            <input type="date" name="txtpetdate"  placeholder=" Enter Pet Arrivaldate" class="ho" Required> 
                        </div>
                        
                        <div class="input-field">
                            <label>Pet Location</label>
                            <input type="text" name="txtpetlocation" placeholder="Enter Pet Location"  class="ho" Required> 
                        </div>

                        <div class="input-field">
                            <label>Pet Adoption Fees</label>
                            <input type="text" name="txtpetfees" placeholder="Enter Pet Fees"  class="ho" Required> 
                        </div>

                        <div class="input-field">
                            <label>DescriptionOfPet</label>
                            <input type="text" name="txtdescription" placeholder="Enter Description Of Pet"  class="ho" Required> 
                        </div>

                        <div class="input-field">
                            <label>Pet Image1</label>
                            <input type="file" name="fileimg1" placeholder="Enter Pet Image1" class="ho" required>
                        </div>

                        <div class="input-field">
                            <label>Pet Image2</label>
                            <input type="file" name="fileimg2" placeholder="Enter Pet Image2"  class="ho" required>
                        </div>

                        <div class="input-field">
                            <label>Pet Image3</label>
                            <input type="file" name="fileimg3" placeholder="Enter Pet Image3"  class="ho" required>
                        </div>

                        <!-- <div class="input-field">
                            <label>Pet Image4</label>
                            <input type="file" name="fileimg4" placeholder="Enter Pet Image4"  class="ho" required>
                        </div> -->

                        <button class="sumbit">
                          <input type="submit" name="btnAdd" value="Add" class="btnText"> 
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div>
				      
			
                
        </form>
    </div>
    
</body>

</html>