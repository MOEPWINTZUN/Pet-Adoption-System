<?php 
session_start();
include('dbconnection.php');
include('Adoption_Cart_Functions.php');

if (isset($_GET['Buy']))
{
	$txtPetID=$_GET['txtPetID'];
	$txtAdoptQty=$_GET['txtAdoptQty'];
	AddShoppingCart($txtPetID,$txtAdoptQty);
}



if (isset($_GET['Pid'])) {
    $PetID = $_GET['Pid'];
  $query = "SELECT * FROM pettb p, pettypetb pt WHERE p.PetTypeID = pt.PetTypeID AND p.PetID = '$PetID'";
    $result = mysqli_query($connect, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);
    } else {
        $data = null; // No data found
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

        <!-- <form action="#" class="search-form">
            <input type="search" placeholder="search here..." id="search-box">
            <label for="search-form" class="fa-solid fa-magnifying-glass "></label>
        </form> -->
        
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

<!-- <form action="Details.php" method="GET">    
    <div class="containersss"> -->
    <form action="Details.php" method="GET">    
    <div class="containersss">
        
        <!-- Image Slider at the Top -->
        <div class="top-section">
            <div class="image-slider">
                <!-- Main Image -->
                <div class="top-image">
                <img src="<?php echo $data['PetImage1']; ?>" id="mainImage" class="dimg top-img">
                <img src="<?php echo $data['PetImage2']; ?>" class="dimg" onclick="selectImage(1)">
                <img src="<?php echo $data['PetImage3']; ?>" class="dimg" onclick="selectImage(2)">
                </div>

                
            </div>
        </div>

        <!-- Text content below the image slider -->
        <div class="bottom-section">
    <div class="text-content">
        
        
        <div class="left-column">
            <h1>Details Of Each Pet!</h1>
            <p class="postdecrii"><i class="fa-solid fa-paw ii"></i> PetBreed: <span id="petBreed"><?php echo $data['PetBreed']; ?></span></p>
            <p class="postdecrii"><i class="fa-solid fa-star ii"></i> PetQuantity: <span id="petQuantity"><?php echo $data['PetQuantity']; ?></span></p>
            <p class="postdecrii"><i class="fa-solid fa-calendar-days ii"></i> ArrivalDate: <span id="arrivalDate"><?php echo $data['ArrivalDate']; ?></span></p>
            <p class="postdecrii"><i class="fa-solid fa-money-check-dollar ii"></i> PetAdoptionFees: <span id="petAdoptionFees"><?php echo $data['PetAdoptionFees']; ?></span></p>
            <p class="postdecrii"><i class="fa-solid fa-cart-shopping ii"></i> AdoptQty input  <input type="number" name="txtAdoptQty" min="1" max="<?php echo $PetQty ?>"></p>
            
            <input type="hidden" name="txtPetID" value="<?php echo $PetID ?>">
            <input type="submit" name="Buy" value="Add to Cart" min="1" class="checkout-btn"> <br> <br>
            
            <iframe src="<?php echo $data['PetLocation']; ?>" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
        <!-- Right column for description -->
        <div class="right-column">
            <p class="postdecriiii"><span class="dede">DescriptionOfPet:</span> <br> <span id="descriptionOfPet"><?php echo $data['DescriptionOfPet']; ?></span></p>
        </div>
        
    </div>
</div>
</form>
<script>
    // Array containing data from your database based on the pet id
    var petsData = [
        {
            image: "<?php echo $data['PetImage1']; ?>",
            breed: "<?php echo $data['PetBreed']; ?>",
            quantity: "<?php echo $data['PetQuantity']; ?>",
            date: "<?php echo $data['ArrivalDate']; ?>",
            fees: "<?php echo $data['PetAdoptionFees']; ?>",
            description: "<?php echo $data['DescriptionOfPet']; ?>"
        },
        {
            image: "<?php echo $data['PetImage2']; ?>",
            breed: "<?php echo $data['PetBreed']; ?>",
            quantity: "<?php echo $data['PetQuantity']; ?>",
            date: "<?php echo $data['ArrivalDate']; ?>",
            fees: "<?php echo $data['PetAdoptionFees']; ?>",
            description: "<?php echo $data['DescriptionOfPet']; ?>"
        },
        {
            image: "<?php echo $data['PetImage3']; ?>",
            breed: "<?php echo $data['PetBreed']; ?>",
            quantity: "<?php echo $data['PetQuantity']; ?>",
            date: "<?php echo $data['ArrivalDate']; ?>",
            fees: "<?php echo $data['PetAdoptionFees']; ?>",
            description: "<?php echo $data['DescriptionOfPet']; ?>"
        },
        
    ];

    var currentImageIndex = 0;

    function changeImage(step) {
        currentImageIndex = (currentImageIndex + step + petsData.length) % petsData.length;
        updateContent(currentImageIndex);
    }

    function selectImage(index) {
        currentImageIndex = index;
        updateContent(currentImageIndex);
    }

    function updateContent(index) {
        // Update the main image
        document.getElementById('mainImage').src = petsData[index].image;

        // Update the details on the left
        document.getElementById('petBreed').textContent = petsData[index].breed;
        document.getElementById('petQuantity').textContent = petsData[index].quantity;
        document.getElementById('arrivalDate').textContent = petsData[index].date;
        document.getElementById('petAdoptionFees').textContent = petsData[index].fees;
        document.getElementById('descriptionOfPet').textContent = petsData[index].description;
    }
</script>

    <script src="script.js"></script>
    </body>
    </html>