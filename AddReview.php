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
    $txtreviewid=$_POST['txtreviewid'];
    $cbouserid= $_POST['cbouserid'];
    $txtrev= $_POST['txtrev'];
  


  $select="SELECT*FROM reviewtb WHERE UserReviewID='$txtreviewid'";

  $query= mysqli_query($connect, $select);

  $count=mysqli_num_rows($query);

  if($count>0)
  {
    echo "<script>window.alert('Pet already existed!')</script>";
		echo "<script>window.location='AddCampaign.php'</script>";
  }
  else {
    $insert="INSERT INTO  reviewtb   (UserReviewID , UserID, Review)
    VALUES('$txtreviewid','$cbouserid', '$txtrev')";

    $query=mysqli_query($connect,$insert);

    if ($query) {
        echo "<script>window.alert('Success!')</script>";
        echo "<script>window.location='CusHome.php'</script>";
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
        <header>Write Review!</header>
          <form action="AddReview.php" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">User Review</span>
                    <div class="fields">
						 

                        <div class="input-field">
                            <label>Review ID</label>
                            <input type="text" name="txtreviewid" value="<?php echo AutoID('reviewtb','UserReviewID','R0-','6') ?>" class="ho"readonly/>
                    	</div> 

                      <div class="input-field">
                        <label>Select UserID</label>
                                <select name="cbouserid" class="cbodo" Required>
                                <option>-Choose UserID-</option>
                                  <?php
                                    $select= "SELECT* FROM usertb";
                                    $query=mysqli_query($connect, $select);

                                    $count=mysqli_num_rows($query);

                                    for ($i=0; $i < $count; $i++) { 
                                    $row=mysqli_fetch_array($query);
                                    $UID=$row['UserID'];
                                    $Uname=$row['UserName'];

                                    echo "<option value='$UID'>$Uname </option>";

                                    }
                                  ?>
                                </select>
                    	      </div>
                        <div class="input-field">
                            <label>User Review</label>
                            <input type="text" name="txtrev" placeholder=" Enter User Review"  class="ho" Required> 
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