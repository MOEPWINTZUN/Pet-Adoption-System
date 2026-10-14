<?php 
session_start();
include('dbconnection.php');
include('AutoID.php');

if (isset($_POST['btnAdd'])) 
{
    $txtadopsupid=$_POST['txtadopsupid'];
    $adopid = trim($_POST['cboadopid']);
    $txtsupportype= $_POST['txtsupportype'];
    $txtsupdate= $_POST['txtsupdate'];
    $status= $_POST['cbostatus'];
  
    $checkAdoption = "SELECT * FROM adoptiontb WHERE AdoptionID = '$adopid'";
    
    echo "Adoption ID being checked: " . $adopid;
    $adoptionQuery = mysqli_query($connect, $checkAdoption);
    
    if (mysqli_num_rows($adoptionQuery) == 0) {
        echo "<script>window.alert('Invalid Adoption ID. No such adoption found!')</script>";
        echo "<script>window.location='AdoptionSupport.php'</script>";
        exit;
    }

  $select="SELECT*FROM  adoptionsupporttb  WHERE PostAdoptionSupportID='$txtadopsupid'";

  $query= mysqli_query($connect, $select);

  $count=mysqli_num_rows($query);

  if($count>0)
  {
    echo "<script>window.alert('AdoptionSupport already existed!')</script>";
		echo "<script>window.location='AdoptionSupport.php'</script>";
  }
  else {
    $insert = "INSERT INTO adoptionsupporttb (PostAdoptionSupportID, AdoptionID, SupportType, SupportDate, SupportStatus)
    VALUES ('$txtadopsupid', '$adopid', '$txtsupportype', '$txtsupdate', '$status')";

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
        <header>Adoption Support</header>
          <form action="AdoptionSupport.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Adoption Support</span>
                    <div class="fields">
						 

                        <div class="input-field">
                            <label>PostAdoptionSupportID</label>
                            <input type="text" name="txtadopsupid" value="<?php echo AutoID('adoptionsupporttb','PostAdoptionSupportID','PA0-','6') ?>" class="ho"readonly/>
                    	</div> 

                      <div class="input-field">
                        <label>Select AdoptionID</label>
                        <select name="cboadopid" class="cbodo">
    <?php
        $select = "SELECT * FROM adoptiontb";
        $query = mysqli_query($connect, $select);
        $count = mysqli_num_rows($query);

        for ($i = 0; $i < $count; $i++) { 
            $row = mysqli_fetch_array($query);
            $AID = $row['AdoptionID'];
            $AS = $row['AdoptionStatus'];
            echo "<option value='$AID'>$AID</option>"; // Change here
        }
    ?>
</select>
                    	      </div>
                        <div class="input-field">
                            <label>SupportType</label>
                            <input type="text" name="txtsupportype" placeholder=" Enter Support Type"  class="ho" Required> 
                        </div>
                        <div class="input-field">
                            <label>Support Date</label>
                            <input type="date" name="txtsupdate" class="ho"  value="0"/> 
                        </div>
                        
                        
                        <div class="input-field">
                            			<label>SupportStatus</label>
                            			<select name="cbostatus" >
    										<option value="One Time">Pending</option>
    										<option value="Monthly">Completed</option>
    										<option value="Yearly">Ongoing</option>
    
										</select>
                        </div>

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
