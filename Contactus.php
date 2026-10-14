<?php 
include('dbconnection.php');

session_start();
 
if (isset($_POST['btnsubmit'])) 
{
    
    $txtuname=$_POST['txtuname'];
    $txtuemail=$_POST['txtuemail'];
    $txtumessage=$_POST['txtumessage'];
    
    $select="SELECT*FROM usercontact  WHERE UserName='$txtuname'";

  $query= mysqli_query($connect, $select);

  $count=mysqli_num_rows($query);

  if($count>0)
  {
    echo "<script>window.alert('Usercontact already existed!')</script>";
		echo "<script>window.location='Contactus.php'</script>";
  }
  else {
    $insert = "INSERT INTO usercontact (UserName, UserEmail, UserMessage)
VALUES ('$txtuname', '$txtuemail', '$txtumessage')";

    $query=mysqli_query($connect,$insert);

    if ($query) {
        echo "<script>window.alert('Success!')</script>";
        echo "<script>window.location='CusHome.php'</script>";
    }
  }

}

 
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="cus.css">
</head>
<body class="con">
    <div class="wrapper">
        <div class="image-column">
            <div class="image-box">
                <img src="Photo/cat5.jpg" alt="Desk Image">
            </div>
        </div>
        <div class="form-column">
            <h2>Contact us</h2>
            <p>Contact us for a quote, help, or to join the team!</p>
            <div class="contact-info">
                <p><strong>Address:</strong> 29/ Lune street </p>
                <p><strong>Email:</strong> Kiroro@gmail.com</p>
                <p><strong>Phone:</strong> 09-296-206-339</p>
            </div>
        <form action="Contactus.php" method="POST">
        
                <h3>Get a quote</h3>
                <label for="name">Name</label>
                <input type="text" id="name" name="txtuname" placeholder="Write Your Name" required class="in">
                
                <label for="email">Email</label>
                <input type="email" id="email" name="txtuemail"  placeholder="Write Your Email" required class="in">
                
                <label for="message">Message</label>
                <textarea id="message" name="txtumessage"  placeholder="Writre message 'Dear Kiroro! I want to ......" required></textarea>
                
                <button type="submit" name="btnsubmit">Send Message</button>
            </form>
            <!-- <div class="social-links">
                <h4>Follow us</h4>
                <p>Facebook /studio | Twitter /studio | Instagram /studio</p>
            </div> -->
        </div>
    </div>
</body>
</html>



