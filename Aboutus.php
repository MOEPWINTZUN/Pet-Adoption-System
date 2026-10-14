<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cus.css">
    <link rel="stylesheet" type= "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
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
        <a href="CusHome.php">Home</a>
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
        <p><a href="CusHome.html">home</a>/<span>About</span></p>

    </section>

    <!-- <section class="about">
        <div class="image">
            <img src="Photo/sb.png" alt="">
        </div>
        <div class="content">
            <span>welcome to KIRORO</span>
            <h3> Finding your perfect furry companion</h3>
            <p>At Kiroro, we believe every pet deserves a loving home, and our mission is to connect you with pets in need of adoption.
                Explore our detailed pet profiles, take our compatibility quiz, and enjoy the convenience of virtual meet and greets.
              Whether you're ready to adopt, looking to donate, or just want to learn more about pet care, Kiroro is here to support you every step of the way.
               Join us in making a difference and giving these wonderful pets a forever home.</p>
        </div>
    </section> -->

    <section class="about-section" id="about-section">
    <div class="ROW">
        <div class="about-image">
            <img src="Photo/aaa.jpg" alt="Greenhouse Image">
        </div>

        <div class="about-content">
            <h1> Finding your perfect furry companion</h1>
            <p>
                Explore our detailed pet profiles, take our compatibility quiz, and enjoy the convenience of virtual meet and greets.
              Whether you're ready to adopt, looking to donate, or just want to learn more about pet care, Kiroro is here to support you every step of the way.
               Join us in making a difference and giving these wonderful pets a forever home.</p>
        </div>
    </div>
</section>

    <section class="services">
        <h1 class="title"><span>Our survices</span><a href="#">view all</a></h1>

        <div class="box-container">
            <div class="box">
                <img src="Photo/adopt.png" alt="">
                <h3>Pet Adoption</h3>
                <p>Browse our extensive list of available pets, <br>
                 complete with detailed profiles and photos</p>
            </div>

            <div class="box">
                <img src="Photo/support.png" alt="">
                <h3>Post-Adoption Support</h3>
                <p>Access valuable resources and support after <br>
                bringing your new pet home.</p>
            </div>

            <div class="box">
                <img src="Photo/donate.png" alt="">
                <h3>Donation and Sponsorship </h3>
                <p>Support us by donating or sponsoring a pet. <br>
                Your contributions help us provide care, medical treatment, and support for animals in need.</p>
            </div>
        </div>
    </section>

    <section class="services">
    <h1 class="title"><span>Our Blog</span></h1>
    </section>
    <section class="postcontainer">
    
        <div class="postbox">
            <img src="Photo/blog4.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" > Caring for Your Dog: Nutrition and Health Dogs</a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri">  Behavioral traits vary by breed, but most dogs require regular exercise, training, and socialization. Annual vet check-ups and vaccinations are important to keep them healthy and protect against parasites and diseases. </p>
            <div class=" profile">
                <img src="Photo/pro5.jpg " alt="" class="profileimage">
                <span class="profilename">Vinice</span>
            </div>
        </div>

        <div class="postbox">
            <img src="Photo/blog1.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" > Adopt a pet, change a life</a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri"> Every adoption makes a difference. By choosing to adopt, you give a homeless pet a second chance at happiness and transform their life in ways they could never imagine. </p>
            <div class=" profile">
                <img src="Photo/pro6.jpg  " alt="" class="profileimage">
                <span class="profilename">Kuromi</span>
            </div>
        </div>

        <div class="postbox">
            <img src="Photo/blog3.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" >Make love a part of your family</a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri"> Adding a pet to your family is more than just finding a new companion—it’s about welcoming unconditional love, joy, and companionship into your home. </p>
            <div class=" profile">
                <img src="Photo/pro1.jpg " alt="" class="profileimage">
                <span class="profilename">Jie</span>
            </div>
        </div>


        <div class="postbox">
            <img src="Photo/blog9.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" > Exercise Needs and Activity</a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri"> High-energy breeds like Border Collies and Huskies require daily runs, while more relaxed breeds like Bulldogs may only need short walks. Regular physical and mental stimulation prevents boredom and destructive behaviors. </p>
            <div class=" profile">
                <img src="Photo/pro2.jpg  " alt="" class="profileimage">
                <span class="profilename">Chwey</span>
            </div>
        </div>

        <div class="postbox">
            <img src="Photo/blog11.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" > Training and Socialization</a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri"> Early training and socialization are key to raising a well-behaved dog. Positive reinforcement methods work best for teaching basic commands and correcting behavior. </p>
            <div class=" profile">
                <img src="Photo/pro3.jpg " alt="" class="profileimage">
                <span class="profilename">Vinice</span>
            </div>
        </div>

        <div class="postbox">
            <img src="Photo/blog5.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" > Litter Box Habits Cats</a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri">It's important to scoop daily and change the litter regularly to avoid any odor or discomfort. Some cats are picky about the type of litter, so experimenting with different varieties can help. </p>
            <div class=" profile">
                <img src="Photo/blog10.jpg " alt="" class="profileimage">
                <span class="profilename">layla</span>
            </div>
        </div>

        <div class="postbox">
            <img src="Photo/blog7.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" > Indoor vs. Outdoor Cats</a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri">While some cats thrive indoors, others may enjoy supervised outdoor time. Indoor cats need plenty of enrichment with toys, tunnels, and window perches to satisfy their hunting instincts.  </p>
            <div class=" profile">
                <img src="Photo/pet1.jpg " alt="" class="profileimage">
                <span class="profilename">Knaine</span>
            </div>
        </div>

        <div class="postbox">
            <img src="Photo/blog8.jpg" alt="" class="postimg">
            <h2 class="cate">Blog</h2>
            <a href="Blog.details" class="posttitle" > Housing and Space Requirements </a>
            <span class="postdate">9 Sep 2024    </span>
            <p class="postdecri">Rabbits need ample space to hop, explore, and stretch out. A spacious pen or cage with plenty of room to move is ideal, but they should also have time outside the cage to exercise and explore a rabbit-proofed area in your home. </p>
            <div class=" profile">
                <img src="Photo/main.jpg  " alt="" class="profileimage">
                <span class="profilename">Main</span>
            </div>
        </div>

    </section>
    <section class="services">
    <h1 class="title"><span>Our Customer</span></h1>
    </section>

    <div class="containerss">
      <div class="slider-wrapper">
    
        <!-- <button id="prev-slide" class="slide-button material-symbols-rounded">
          chevron_left
        </button> -->
        <ul class="image-list">
          <img class="image-item" src="Photo/user5.jpg" alt="img-1" />
          <img class="image-item" src="Photo/user4.jpg" alt="img-2" />
          <img class="image-item" src="Photo/user1.jpg" alt="img-3" />
          <img class="image-item" src="Photo/user11.jpg" alt="img-4" />
          <img class="image-item" src="Photo/user3.jpg" alt="img-5" />
          <img class="image-item" src="Photo/user9.jpg" alt="img-6" />
          <img class="image-item" src="Photo/user8.jpg" alt="img-7" />
          <img class="image-item" src="Photo/user10.jpg" alt="img-8" />
         
        </ul>
        <!-- <button id="next-slide" class="slide-button material-symbols-rounded">
          chevron_right
        </button> -->
      </div>
      <div class="slider-scrollbar">
        <!-- <div class="scrollbar-track">
          <div class="scrollbar-thumb"></div>
        </div> -->
      </div>
    </div>
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