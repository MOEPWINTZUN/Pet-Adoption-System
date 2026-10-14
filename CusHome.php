<?php
session_start();
include ('dbconnection.php');

if (isset ($_POST ['btnlogin'])) 
{
    $cusemail = $_POST['txtcusemail'];
    $cuspassword=$_POST['txtcuspassword'];

   $selectemailandpassword= "SELECT *FROM usertb WHERE UserEmail ='$cusemail' AND 
    UserPassword='$cuspassword'";

    $query=mysqli_query($connect, $selectemailandpassword);

    $rowcount=mysqli_num_rows($query);

    if ($rowcount>0) {

        $array = mysqli_fetch_array($query);

        $CID= $array['UserID '];
        $Cname =$array['UserName'];
        // $Sname =$array['SurName'];
        // $email =$array['UserEmail '];
        // $ps=$array['UserPassword'];
        // $ua=$array['UserAddress '];
        // $up=$array['UserPhoneNo '];

        $_SESSION['CID']=$CID;
        $_SESSION['Cname']=$Cname;
        // $_SESSION['Sname']=$Sname;
        // $_SESSION['email']=$email;
        // $_SESSION['password']=$ps;
        // $_SESSION['address']=$ua;
        // $_SESSION['phoneno']=$up;

        setcookie("user", "Cname", time()+10,"/");


        echo "<script>window.alert('Customer Login Successfully')</script>";
		echo "<script>window.location='CusHome.php'</script>";
    }

    else {

        if (isset($_SESSION ['logincount'] )) {
           $counterror=$_SESSION['logincount'];

           if ($counterror==1) {
            echo "<script>window.alert('Customer Login Fail Attempt Two')</script>";

            $_SESSION ['logincount']=2; 
           }

           elseif ($counterror==2) {
            echo "<script>window.alert('Customer Login Fail Attempt Three')</script>";

            echo "<script>window.location='waitingroom.php'</script>";
           }
        }

        else {
            echo "<script>window.alert('Customer Login Fail Attempt One')</script>";

            $_SESSION ['logincount']=1;
        }
         
		
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cus.css">
    <link rel="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
     <header class = "head">
     <a href="CusHome.php" class="logo"><i class="fa-solid fa-dog"></i>KIRORO</a>

        
        
        <div class="icons">
            <div id="menu-btn"><i class="fa-solid fa-bars"></i></div>
            <div id="search-btn"> <i class="fa-solid fa-magnifying-glass"></i></div>
            <div id="cart-btn"> <i class="fa-brands fa-gratipay"></i></div>
            <div id="login-btn"><i class="fa-solid fa-user"></i></div>
            <a href="Adoption_Cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
        
            <a href="DonatorRegister.php"><img src="Photo/d2.png"></a>
            
            
        </div>
     </header>


     <div id="closer" class="fa-solid fa-x"></div>


    <nav class="navbar">
        <a href="CusHome.html">Home</a>
        <a href="Pet.php">Pet</a>
        <a href="Aboutus.php">About us</a>
        <a href="Contactus.php">Contact us</a>
    
    </nav>

    <div class="shopping-cart">
        <h3 class="total">Adoptable pets</h3> <br>
    
        <a href="Puppy.php"><div class="box">
            <i class="fa-solid fa-bone icon-pet"></i>
            <img src="Photo/pup2.jpg" alt="">
            <div class="content">
                <h3>Puppy</h3>
            
            </div>
        </div>
        </a>

        <a href="Cat.php"><div class="box">
            <i class="fa-solid fa-cat icon-pet"></i>
            <img src="Photo/cat.jpg" alt="">
            <div class="content">
                <h3>Cat</h3>
                
            </div>
        </div>

        <a href="Rabbit.php"><div class="box">
            <i class="fa-solid fa-heart icon-pet"></i> 
            <img src="Photo/rab.jpg" alt="">
            <div class="content">
                <h3>Rabbit</h3>
            
            </div>
        </div>

        <a href="small.php"><div class="box">
            <i class="fa-solid fa-paw icon-pet"></i>
            <img src="Photo/ham.jpg" alt="">
            <div class="content">
                <h3>Small Mammals</h3>
            
            </div>
        </div>

        
    </div>

    

    <div class="login-form">
        <form action="">
            <h3>Login Form</h3>
            <input type="email" placeholder="Enter your email" class="box">
            <input type="password" placeholder="Enter your password" class="box">
            <div class="remember">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>

            </div>
            <input type="submit" value="login now" class="btn">
            <p>don't have an account? <a href="#">create now</a></p>
        </form>
    </div>

    <section class="home">
        <div class="slides-container">
            <div class="slide active">
                <div class="content">
                    <span>Adopt a Friend for Life!</span>
                    <h3>Welcome from Kiroro</h3>
                    <p> At Kiroro, we believe every pet deserves a loving home, and our mission is to connect you with pets in need of adoption. <br>
                    <a href="Pet.php" class="cta-button">Show More</a>
                </div>
                <div class="image">
                    <img src="Photo/gol2.png" alt="">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Adopt a Friend for Life!</span>
                    <h3>Welcome from Kiroro</h3>
                    <p>
                     At Kiroro, we believe every pet deserves a loving home, and our mission is to connect you with pets in need of adoption. <br>
                    <a href="Pet.php" class="de">Show More</a>
                </div>
                <div class="image">
                    <img src="Photo/c.png" alt="">
                </div>
            </div>

        </div>
        <div id="slide-next" onclick="next()" class="fa-solid fa-arrow-right"></div>
        <div id="slide-prev" onclick="prev()" class="fa-solid fa-arrow-left">
        </div>

    </section>
    <section class="adoption-section">
        <div class="hh">
        
        <h2>Our Lovely Pets</h2>
        <p>Find your new best friend and give them a forever home.</p> <br> <br>
    </div>
    <div class="photo-gallery">
        <div class="photo-item">
            <img src="Photo/o.jpg" alt="Pet 1">
            <div class="info">
                <span><i class="fa-solid fa-calendar-days"></i> 2024</span>
                <h3>Breed: Cymric </h3>
                <!-- <a href="" class="detail">details</a> -->
            </div>
        </div>
        <div class="photo-item">
            <img src="Photo/sam.jpg" alt="Pet 2">
            <!-- <a href="#" class="adopt-mark">Adopt</a> -->

            <div class="info">
            <span><i class="fa-solid fa-calendar-days"></i> 2022</span>
                <h3>Breed: Samyoed</h3>
                <!-- <p>About: Loves cuddles and clingy baby.</p> -->
                
            </div>
        </div>
        <div class="photo-item">
            <img src="Photo/car.jpg" alt="Pet 3">
            <!-- <a href="#" class="adopt-mark">Adopt</a> -->
            <div class="info">
                <span><i class="fa-solid fa-calendar-days"></i> 2023</span>
                <h3>Breed: Orange cat</h3>
                <!-- <p>About: Energetic, fun, love to play w/football and friendly.</p> -->
                
            </div>
        </div>

        </div>
    
</section>

<section class="aboutus">
                
                <div class="content">
                     <span>Meet Our Pets</span> <br>
                     <h1>Find Your New Best Friend</h1> <br>
                     <p>At Kiroro, we believe every pet deserves a loving home. Browse through our list of adorable, adoptable pets and make a difference in their lives by giving them the forever home they deserve.</p>
                </div>
            <div class="container">
                <div class="image">
                    
                </div>
                <div class="lbox">
                    <span>Meet Adoption</span>
                    <h1>Work For Adoption Happy Time</h1>
                    <p>Kiroro is dedicated to matching loving pets with caring families.</p>
                    <a href="Pet.php" class="cta-button">Adopt Now</a>

                </div>
                </div>

        
    </section>

    <section class="banner-container">
        
        <?php 
        $selectquery = "SELECT * FROM pettb  LIMIT 3";
        $result = mysqli_query($connect, $selectquery);
        $count = mysqli_num_rows($result);
    
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) { 
                $array = mysqli_fetch_array($result);
                $Pid = $array['PetID'];
                $Ptype = $array['PetTypeID'];
                $Pbreed = $array['PetBreed'];
                $Pqty = $array['PetQuantity'];
                $ArrivalDate = $array['ArrivalDate'];
                $PetLocation = $array['PetLocation'];
                $PetAdoptionFees = $array['PetAdoptionFees'];
                $DescriptionOfPet = $array['DescriptionOfPet'];
                $PetImage1 = $array['PetImage1'];
                $PetImage2 = $array['PetImage2'];
        ?>
            <div class="postbox">
            <img src="<?php echo $PetImage1; ?>" alt="PetImage1" class="postimg"> 
            <h1>Lovely Pet!</h1> <br>
            
                <h3 class="cate">Pet Breed:<span class="span"> <?php echo $Pbreed; ?> </span></h3>
                
            

            <div class="info-row">
            <span class="podate"><i class="fa-solid fa-calendar-days ii"></i>  <?php echo $ArrivalDate; ?></span>
            <span class="podate"><i class="fa-solid fa-money-check-dollar ii"></i> <?php echo $PetAdoptionFees; ?></span>
                
                
            </div>

            <div class="infoss">
                <a href="Details.php?Pid=<?php echo $Pid?>" class="de">Details <i class="fa-solid fa-circle-info"></i></a>
                
                
                
            </div>
            
        </div>
    <?php
            }
        }
    ?>
            
        </div>

        

        </section>

    




<section class="room-section">
    <h2>How Adoption Works</h2>
        <div class="rooms-container">
            
            <div class="room-card">
                <img src="Photo/user8.jpg" alt="Exclusief hotel">
                <p class="wor">Pet-User Matching</p>
            </div>
    
            <div class="room-card">
                <img src="Photo/ev.jpg" alt="Junior Suite">
                <p class="wor">Meet-and-Greet Events</p>
                
            </div>
            </div>
            
        <div class="rooms-container">
            <div class="room-card">
                <img src="Photo/g.jpg " alt="Split-level Suite">
                <p class="wor">Support and Guidance</p>
                
            </div>

            <div class="room-card">
                <img src="Photo/gg.jpg " alt="Split-level Suite">
                <p class="wor">Community Engagement</p>
                
            </div>
        </div>
        
</section>

<section class="services">
    <h1 class="title"><span>Pet Type</span></h1>
    </section>

    <section class="room-section">
        
        <div class="rooms-container">
            
            <div class="room-card">
                <img src="Photo/da5.jpg" alt="Exclusief hotel">
                <h3>Dog</h3>
            </div>
    
            <div class="room-card">
                <img src="Photo/cat6.jpg" alt="Junior Suite">
                <h3>Kitty</h3>
                
            </div>
            
            <div class="room-card">
                <img src="Photo/ham1.jpg " alt="Split-level Suite">
                <h3>Rabbit</h3>
                
            </div>

            <div class="room-card">
                <img src="Photo/ra2.jpg " alt="Split-level Suite">
                <h3>Hamster</h3>
                
            </div>
        </div>
        <a href="Pet.php" class="cta-button">See Details</a>
    </section>



<section class="services">    
    <h1 class="title"><span>Customer Review</span></h1>
    </section>
<div class="feedback-container">
    <?php 
        $selectquery = "SELECT * FROM reviewtb";
        $result = mysqli_query($connect, $selectquery);
        $count = mysqli_num_rows($result);

        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) { 
                $array = mysqli_fetch_array($result);
                $URid = $array['UserReviewID'];
                $Uid = $array['UserID'];
                $Review = $array['Review'];
    ?>
        <div class="feedback-card">
            <div class="quote">“</div>
            <p class="feedback-text"> <?php echo $Review; ?></p>
        </div>
    <?php
            }
        }
    ?>
    
</div>
<a href="AddReview.php" class="cta-buttonS">Click to write review</a>

    




    <footer class="footer">
    <div class="containerr">
        <div class="left">
            <h3> <i class="fa-solid fa-dog"></i>KIRORO</h3>
            <nav>
                <a href="CusHome.php">Home</a>
                <a href="Pet.php">Pet</a>
                <a href="Aboutus.php">About Us</a>
                <a href="DonatorRegister.php">Donate</a>
                
            </nav>
            <p>© 2024 All rights reserved.</p>
        </div>

        <div class="right">
            <a href="UserManual.pdf" target="_blank" class="manual">
                    Download Our Adoption Guide (PDF)
<br><br>
            <div class="social-icons">
            
                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
            
        
        </div>
    </div>
</footer>
<script src="script.js"></script>
</body>
</html>


