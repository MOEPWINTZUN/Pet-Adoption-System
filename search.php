<?php 
session_start();
include('dbconnection.php');

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
        
        <div class="headd">
            <form action="search.php" method="POST" class="search-form">
            <input type="text" name="txtsearch" required>
            <input type="submit" name="btnsearch" placeholder="search here..." id="search-box"value= "Search" >
            <label for="search-form" class="fa-solid fa-magnifying-glass" ></label>
   
            </div>
        <!-- <form action="#" class="search-form">
            <input type="search" placeholder="search here..." id="search-box">
            <label for="search-form" class="fa-solid fa-magnifying-glass "></label>
        </form> -->
        
        <div class="icons">
            <div id="menu-btn"><i class="fa-solid fa-bars"></i></div>
            <div id="search-btn"> <i class="fa-solid fa-magnifying-glass"></i></div>
            <div id="cart-btn"> <i class="fa-brands fa-gratipay"></i></div>
            <div id="login-btn"><i class="fa-solid fa-user"></i></div>
            <a href="wishlist.php"><i class="fa-solid fa-heart"></i><sup>0</sup></a>
            <a href="DonatorRegister.php"><img src="Photo/d2.png"></a>
            <!-- <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>0</sup></a> -->
            
        </div>
     </header>


     <div id="closer" class="fa-solid fa-x"></div>


    <nav class="navbar">
        <a href="CusHome.html">Home</a>
        <a href="Pet.php">Pet</a>
        <a href="Aboutus.php">About us</a>
        <a href="Contactus.php">Contact us</a>
        <a href="Userfeedback.php">Userfeedback</a>
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


    


<section class="pocontainers">



<?php
         if (isset($_POST['btnsearch'])) {
            $search=$_POST['txtsearch'];
            $searchquery= "SELECT * FROM pettb WHERE PetBreed LIKE '%$search%'";
            $result=mysqli_query($connect, $searchquery);
            $count=mysqli_num_rows($result);

            if ($count>0) {
                echo "<table>";

                for ($i=0; $i < $count ; $i+=3) { 
                    $query1= "SELECT * FROM pettb WHERE
                    
                    PetBreed LIKE '%$search%' LIMIT $i,3";

                      $result1 =mysqli_query($connect, $query1);
                      $count1=mysqli_num_rows($result1);

                      echo "<tr>";

                      for ($j=0; $j < $count1 ; $j++) { 
                         $data=mysqli_fetch_array($result1);

                        $PetID= $data['PetID']; 
                        $PetTypeID=$data['PetTypeID']; 
                        $PetBreed=$data['PetBreed']; 
                        $PetQuantity=$data['PetQuantity'];
                        $ArrivalDate=$data['ArrivalDate'];
                        $PetLocation=$data['PetLocation'];
                        $PetAdoptionFees=$data['PetAdoptionFees'];
                        $DescriptionOfPet=$data['DescriptionOfPet'];
                        $PetImage1=$data['PetImage1'];
                        $PetImage2=$data['PetImage2'];
                        

                        ?>
                        <div class="postbox">
                            <img src="<?php echo $PetImage1; ?>" alt="PetImage1" class="poimg"> 
                            <div class="info-row">
                                <h3 class="cate">Breed: <span class="span"> <?php echo $PetBreed; ?> </span></h3>
                                <span class="podate"> <?php echo $ArrivalDate; ?></span>
                            </div>

                            <div class="info-row">
            
                                <a href="Details.php" class="det"><span> Details:</span>  </a>
                                <a href="" class="cate"><i class="fa-solid fa-heart"></i></a>
                            </div>

                        </div>
                        
                        <?php
                      }
                      echo "<tr>";
                }
                echo "<table>";
            }

            else {
                echo "<h1> No Pet Found</h1>";
            }
        }
         
            ?>

</section>
</form>

</body>
<script src="script.js"></script>
</html>