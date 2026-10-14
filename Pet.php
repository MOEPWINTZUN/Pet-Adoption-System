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


    <section class="heading">
        <h3>Our Pet</h3>
        <p><a href="CusHome.html">home</a>/<span>Adopt</span></p>

    </section>

    <section class="category">
        <h1 class="title"><span>Our Categories </span><a href="#">view all</a></h1>

        <div class="box-container">
            <a href="#" class="box">
                <img src="Photo/M3.png" alt="">
                <h3>About Pet</h3>
            </a>

            <a href="#" class="box">
                <img src="Photo/blog.png" alt="">
                <h3>Blog</h3>
            </a>

            <a href="#" class="box">
                <img src="Photo/do.png" alt="">
                <h3>Donation</h3>
            </a>

            <a href="#" class="box">
                <img src="Photo/spon.png" alt="">
                <h3>Sponsorship</h3>
            </a>

            <a href="#" class="box">
                <img src="Photo/about.png" alt="">
                <h3>About Us</h3>
            </a>

        </div>

    </section>

    <section class="services">
        <h1 class="title"><span>Our Pet</span></h1>
    </section>

  

    
    <form method="GET" action="" class="fo" >
        <div class="search-bar">

    <input type="text" name="PetBreed" placeholder="Enter Pet Breed" value="<?php echo isset($_GET['PetBreed']) ? $_GET['PetBreed'] : ''; ?>">

    <!-- Adoption Fees Search -->
    <input type="number" name="PetFees" placeholder="Max Adoption Fees" value="<?php echo isset($_GET['PetFees']) ? $_GET['PetFees'] : ''; ?>">

    <input type="submit" value="search">
    </div>

    <div class="filter">
    <select name="PetTypeID">
        <option value="all">All Pets</option>
        <option value="1" <?php if (isset($_GET['PetTypeID']) && $_GET['PetTypeID'] == '1') echo 'selected'; ?>>Dog</option>
        <option value="2" <?php if (isset($_GET['PetTypeID']) && $_GET['PetTypeID'] == '2') echo 'selected'; ?>>Rabbit</option>
        <option value="3" <?php if (isset($_GET['PetTypeID']) && $_GET['PetTypeID'] == '3') echo 'selected'; ?>>Hamster</option>
        <option value="4" <?php if (isset($_GET['PetTypeID']) && $_GET['PetTypeID'] == '4') echo 'selected'; ?>>Cat</option>
    </select>

    <!-- Pet Breed Search -->
    

    <input type="submit" value="Filter" class="inin">

    </div>
</form>

<section class="pocontainer">

<?php 
    // Get the selected filters from the form
    $petType = isset($_GET['PetTypeID']) ? $_GET['PetTypeID'] : 'all';
    $petBreed = isset($_GET['PetBreed']) ? $_GET['PetBreed'] : '';
    $petFees = isset($_GET['PetFees']) ? $_GET['PetFees'] : '';

    // Base query
    $selectquery = "SELECT * FROM pettb WHERE 1=1"; 

    // Filter by Pet Type
    if ($petType != 'all') {
        $selectquery .= " AND PetTypeID = '$petType'";
    }

    // Filter by Pet Breed if provided
    if (!empty($petBreed)) {
        $selectquery .= " AND PetBreed LIKE '%$petBreed%'";
    }

    // Filter by Pet Fees if provided
    if (!empty($petFees)) {
        $selectquery .= " AND PetAdoptionFees <= $petFees";
    }

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
</section>

</body>

<footer class="footer">
    <div class="containerr">
        <div class="left">
            <h3> <i class="fa-solid fa-dog"></i>KIRORO</h3>
            <nav>
                <a href="CusHome.php">Home</a>
                <a href="Pet.php">Pet</a>
                <a href="Aboutus.php">About Us</a>
                
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
</html>