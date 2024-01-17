<?php
    // $connection = mysqli_connect('localhost', 'root', '', 'amazon1');
   

     // Check connection
    //  if (!$connection) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo border">
                <a href="index.php">
                    <div class="logo">
                    
                    </div>
                </a>
            </div>

            <div class="nav-address border" >
                <p class="add-first">Deliver to</p>
                <div class="add-icon">
                    <i class="fa-solid fa-location-dot"></i>  
                    <p class="add-sec">Nepal</p>
                </div>
            </div>
            
            <div class="nav-search">
                <select class="search-select border">
                    <option>
                        All
                    </option>
                </select>
                <input placeholder="Search" class="search-input">
                <div class="search-icon border">
                    <i class="fa-solid fa-magnifying-glass border"></i>
                </div>
            </div>

            <div class="nav-icon">
                <div class="icon-first border">
                    <i class="fa-solid fa-language"></i>
                    <p>EN</p>
                </div>
            </div>

            <div class="nav-signin border">
                <a href="login.php"><p><span>Hwllo, sign in</span></p></a>
                <a href="login.php"><p class="nav-second">Accounts & Link</p></a>
    
            </div>

            <div class="nav-return border">
                <p><span>Return</span></p>
                <p class="nav-second">& Orders</p>
    
            </div>

            <div class="nav-cart border">
                <i class="fa-solid fa-cart-shopping"></i>
                <p class="cart-text">Cart</p>
            </div>

        </div>

        <div class="panel ">
            <div class="panel-all border ">
                <i class="fa-solid fa-bars"></i>
                All
            </div>
            <div class="panel-ops">
                <div class="panel-ops1">
                    <p class="border">Today's Deals</p>
                    <p class="border"> Customer Service</p>
                    <p class="border">Registry</p>
                    <p class="border">Gift Card</p>
                    <p class="border">Sell</p>
                </div>
            </div>
            <div class="panel-deals border">
                <p>Shops Deals in Electronic</p>
            </div>

            

        </div>
    </header>

    

    <!-- Slideshow container -->
<div>
    <div class="slideshow-container">

    <!-- Full-width images  -->
        <div class="mySlides fade">
          <img src="hero1.jpg" style="width:100%">
        </div>
  
        <div class="mySlides fade">
          <img src="hero2.jpg" style="width:100%">
         </div>
  
        <div class="mySlides fade">
            <img src="hero3.jpg" style="width:100%">
        </div>
    
  
    <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

<br>








</div>
  
  <!-- The dots/circles -->
  <!-- <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div> -->

  
    <!-- <div class="hero-section">
        <div class="hero-msg">
            <p>Loring and typesetting in the 1960s with the release.
            <a href="index.html">Click here to know more about it.</a>
            </p>
        </div>
    </div> -->

    <div class="shop-section">
        <div class="box1 box">
            <div class="box-content">
                <h3>Health and personal care</h3>
            <div class="box-img" style="background-image: url('box5.jpg');">

            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>
        <div class="box2 box">
            <div class="box-content">
                <h3>New arrival</h3>
            <div class="box-img" style="background-image: url('box4.jpg');">

            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>
        <div class="box3 box">
            <div class="box-content">
                <h3>Electronic</h3>
            <div class="box-img" style="background-image: url('box2.jpg');">
            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>
        <div class="box4 box">
            <div class="box-content">
                <h3>Deals</h3>
            <div class="box-img" style="background-image: url('box1.png');">
            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>
        <div class="box1 box">
            <div class="box-content">
                <h3>Toys</h3>
            <div class="box-img" style="background-image: url('box5.jpg');">

            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>
        <div class="box2 box">
            <div class="box-content">
                <h3>Handheld</h3>
            <div class="box-img" style="background-image: url('box4.jpg');">

            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>
        <div class="box3 box">
            <div class="box-content">
                <h3>Tools</h3>
            <div class="box-img" style="background-image: url('box2.jpg');">
            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>
        <div class="box4 box">
            <div class="box-content">
                <h3>Horses</h3>
            <div class="box-img" style="background-image: url('box1.png');">
            </div>
            <p><a href="index.php">See more</a></p>
            </div>
        </div>

    </div>

    <footer>
        <div class="foot-panel1">
        <a href="index.php">Back To Top</a>
        </div>

        <div class="foot-panel2">
            <ul>
                <p>Get to know us.</p>
                <a>Careers</a>
                <a>Blogs</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Get to know us.</p>
                <a>Careers</a>
                <a>Blogs</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Get to know us.</p>
                <a>Careers</a>
                <a>Blogs</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
            <ul>
                <p>Get to know us.</p>
                <a>Careers</a>
                <a>Blogs</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>
        </div>

        <div class="foot-panel3">
            <div class="logo">
            </div>
        </div>

        <div class="foot-panel4">
            <div class="pages">
                <a>Condtion of use</a>
                <a>Your ads privacy choices</a>
                <a>Privacy Policy</a>
            </div>
            <div class="copyright">
                © 1996-2023, Amazon.com, Inc. or its affiliates
            </div>
        </div>
    </footer>

<script>
    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
//   let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   } 
  slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
}
</script>
    
</body>
</html>