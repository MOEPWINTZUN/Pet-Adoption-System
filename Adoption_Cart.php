 <?php 
session_start();
include('dbconnection.php');
include('Adoption_Cart_Functions.php');


if(isset($_REQUEST['Action'])) 
{
	$Action=$_REQUEST['Action'];
	if($Action === "Remove")
	{
		$PetID=$_REQUEST['Pid'];
		RemoveShoppingCart($PetID);

	}
	elseif ($Action === "Buy")
	{
		$txtPetID=$_REQUEST['txtPetID'];
		$txtAdoptQty=$_REQUEST['txtAdoptQty'];
		AddShoppingCart($txtPetID,$txtAdoptQty);
	}
	else
	{
		ClearShoppingCart();
	}
}
else
{
	$Action="";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" type="text/css" href="cus.css">
	<link rel="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

<fieldset>
    <legend>Here is Your Shopping Bag:</legend>
	<a href="Pet.php">Back<</a>
    <?php
    if (!isset($_SESSION['ShoppingCartFunctions'])) {
        echo "<p>Your Cart is Empty</p>";
        echo "<a href='Pet.php' class='continue-btn'>Continue Adopting</a>";
    } else {
    ?>
    <div class="cart-container">
        <div class="cart-items">
            <?php
            $size = count($_SESSION['ShoppingCartFunctions']);
            for ($i = 0; $i < $size; $i++) {
                $PetImage1 = $_SESSION['ShoppingCartFunctions'][$i]['PetImage1'];
                $PetID = $_SESSION['ShoppingCartFunctions'][$i]['PetID'];
                $PetBreed = $_SESSION['ShoppingCartFunctions'][$i]['PetBreed'];
                $PetAdoptionFees = $_SESSION['ShoppingCartFunctions'][$i]['PetAdoptionFees'];
                $AdoptQty = $_SESSION['ShoppingCartFunctions'][$i]['AdoptQuantity'];
                $subTotal = $PetAdoptionFees * $AdoptQty;
                ?>
                <div class="cart-item">
                    <div class="cart-item-image">
                        <img src="<?php echo $PetImage1; ?>" width="100" height="100" alt="Pet Image">
                    </div>
                    <div class="cart-item-details">
                         <p>PetBreed <br> <br> <span> <?php echo $PetBreed; ?></span></p>
                        <p>Pet ID <br> <br> <span><?php echo $PetID; ?></span></p>
                        <p>Adoption Fees <br> <br> <span>$<?php echo $PetAdoptionFees; ?></span></p>
                        <p>Quantity <br> <br> <span><?php echo $AdoptQty; ?> </span></p>
                        <p>Subtotal <br> <br> <span> $<?php echo $subTotal; ?></span> </p>
                        <a href="Adoption_Cart.php?Pid=<?php echo $PetID; ?>&Action=Remove" class="remove-btn">Remove</a>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="cart-summary">
            <h2>Cart Totals</h2>
            <p>Subtotal: <b>$<?php echo CalculateTotalAmount(); ?></b></p>
            <hr>
            <a href="Adoption_Cart.php?Action=ClearAll" class="clear-btn">Clear Cart</a>
            <a href="Pet.php" class="continue-btn">Continue Adopting</a>
            <a href="Checkout.php" class="checkout-btn">Proceed to Checkout</a>
        </div>
    </div>
    <?php
    }
    ?>
</fieldset>

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
</html>
