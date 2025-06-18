<?php
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION['user_email']);

// Check if the user is a guest
$isGuest = $loggedIn && strpos($_SESSION['user_email'], 'guest_') === 0; // If 'user_email' starts with 'guest_'

// If user is not logged in, redirect to login page
if (!$loggedIn) {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT360</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">

    
    <link rel='stylesheet' href='https://unpkg.com/flickity@2.0.3/dist/flickity.min.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images/ict_logo-new-removebg.png" alt="Logo" height="39" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">CATEGORIES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#winners-section">PAST WINNER PROJECTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#winners-section">WINNERS</a>
        </li>

        <?php if ($isGuest): ?>
          <!-- Show "Register" and "Logout Guest" for guests -->
          <li class="nav-item">
            <a class="nav-link" href="register.php">REGISTER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php?guest=true">LOGOUT GUEST</a> <!-- Special link to logout guest -->
          </li>
        <?php elseif ($loggedIn): ?>
          <!-- Show "Your Results" and "Logout" for logged-in users -->
          <li class="nav-item">
            <a class="nav-link" href="results.php">YOUR RESULTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>
        <?php else: ?>
          <!-- Show "Login" and "Registration" links for not logged in users -->
          <li class="nav-item">
            <a class="nav-link" href="register.php">REGISTRATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">LOGIN</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

    <!-- Hero Section -->
    <div class="hero">

        <div class="hero-content">
            <h2>Region 2 : South 1</h2>
            <div class="region-card">
                <h3>States under your Region :</h3>
                <div class="states-list">
                    <p>Andaman and Nicobar Islands</p>
                    <p>Tamilnadu | Kerala</p>
                    <p>Lakshadweep & Puducherry</p>
                </div>
            </div>
            <p class="coming-soon">COMING SOON</p>
            <a href="#" class="btn">Register Now</a>
        </div>
    </div>

    <!-- Category  -->


    <div class="category-container text-center py-5" id="categories">

        <a href="category.html" class="no-style-link">
            <h2 class="category-title">CATEGORIES</h2>
        </a>

        <p class="category-description">
            School students aged 6-16 years can participate and showcase their talents in 7 categories - App Design,
            Game Design, Graphic Design, 3D Design, Coding, Web Design, and Movie Making.
        </p>

        <div class="container">
            <!-- Mobile: Scrollable View -->
            <div class="category-scroll-container d-md-none">
                <a href="category.php#game-design" class="category-card">
                    <img src="images/gamedev.webp" alt="Game Design">
                    <h4>Game Design</h4>
                </a>
                <a href="category.php#3D" class="category-card">
                    <img src="images/3Dmod.webp" alt="3D Design">
                    <h4>3D Design</h4>
                </a>
                <a href="category.php#movie" class="category-card">
                    <img src="images/moviemak.webp" alt="Movie Making">
                    <h4>Movie Making</h4>
                </a>
                <a href="category.php#app" class="category-card">
                    <img src="images/appdev.webp" alt="App Design">
                    <h4>App Design</h4>
                </a>
                <a href="category.php#graphic" class="category-card">
                    <img src="images/graphcs.webp" alt="Graphic Design">
                    <h4>Graphic Design</h4>
                </a>
                <a href="category.php#code" class="category-card">
                    <img src="images/coding.webp" alt="Coding">
                    <h4>Coding</h4>
                </a>
                <a href="category.php#web" class="category-card">
                    <img src="images/webdev.webp" alt="Web Design">
                    <h4>Web Design</h4>
                </a>
            </div>

            <!-- Desktop: 4 on top, 3 below -->
            <!-- First row -->
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center d-none d-md-flex">
                <div class="col">
                    <a href="category.php#game-design" class="category-card">
                        <img src="images/gamedev.webp" alt="Game Design">
                        <h4>Game Design</h4>
                    </a>
                </div>
                <div class="col">
                    <a href="category.php#3D" class="category-card">
                        <img src="images/3Dmod.webp" alt="3D Design">
                        <h4>3D Design</h4>
                    </a>
                </div>
                <div class="col">
                    <a href="category.php#movie" class="category-card">
                        <img src="images/moviemak.webp" alt="Movie Making">
                        <h4>Movie Making</h4>
                    </a>
                </div>
                <div class="col">
                    <a href="category.html#app" class="category-card">
                        <img src="images/appdev.webp" alt="App Design">
                        <h4>App Design</h4>
                    </a>
                </div>
            </div>

            <!-- Second row -->
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center d-none d-md-flex">
                <div class="col">
                    <a href="category.php#graphic" class="category-card">
                        <img src="images/graphcs.webp" alt="Graphic Design">
                        <h4>Graphic Design</h4>
                    </a>
                </div>
                <div class="col">
                    <a href="category.php#code" class="category-card">
                        <img src="images/coding.webp" alt="Coding">
                        <h4>Coding</h4>
                    </a>
                </div>
                <div class="col">
                    <a href="category.php#web" class="category-card">
                        <img src="images/webdev.webp" alt="Web Design">
                        <h4>Web Design</h4>
                    </a>
                </div>
            </div>
        </div>

    </div>


    <!-- Carusel and video -->
    <div class="tabs-container">
        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs custom-tabs d-flex justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#gallery">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#video">Video</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-2">
            <!-- Gallery Tab -->
            <div id="gallery" class="tab-pane fade show active">
                <div class="carousel-container">
                    <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images\image1.jpg" class="d-block w-100" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="images\image2.jpg" class="d-block w-100" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="images\image3.jpg" class="d-block w-100" alt="Image 3">
                            </div>
                            <div class="carousel-item">
                                <img src="images\image4.jpg" class="d-block w-100" alt="Image 4">
                            </div>
                            <div class="carousel-item">
                                <img src="images\image5.webp" class="d-block w-100" alt="Image 5">
                            </div>
                        </div>

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="0"
                                class="active"></button>
                            <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="3"></button>
                            <button type="button" data-bs-target="#galleryCarousel" data-bs-slide-to="4"></button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Video Tab -->
            <div id="video" class="tab-pane fade">
                <div class="video-container">
                    <video controls class="w-100 video-responsive">
                        <source src="Video/13122931_1920_1080_30fps.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>



    <!-- Our Journey -->

    <div class="journey-section">
        <div class="box">
            <h2 class="journey-heading">OUR JOURNEY</h2>
            <p class="journey-text">
                Our exciting journey of Design Championship began in 2014. Catch a glimpse below of the number of
                school students, we have empowered with Design Skills, the number of designs they have created in
                different categories and more.
            </p>
        </div>
    </div>

    <div class="journey-stats-wrapper">
        <div class="journey-stats-grid">
            <div class="journey-row">
                <div class="journey-item">
                    <img src="ourjourney/Students.png" alt="Students">
                    <h3 class="counter" data-count="100000">0</h3>
                    <p>Students</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Cities.png" alt="Cities">
                    <h3 class="counter" data-count="20">0</h3>
                    <p>Cities</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Schools.png" alt="Schools">
                    <h3 class="counter" data-count="350">0</h3>
                    <p>Schools</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Juries.png" alt="Juries">
                    <h3 class="counter" data-count="125">0</h3>
                    <p>Juries</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Movies.png" alt="Movies">
                    <h3 class="counter" data-count="1500">0</h3>
                    <p>Movies</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Graphics.png" alt="Graphics">
                    <h3 class="counter" data-count="3500">0</h3>
                    <p>Graphics</p>
                </div>
            </div>

            <div class="journey-row">


                <div class="journey-item">
                    <img src="ourjourney/Apps.png" alt="Apps">
                    <h3 class="counter" data-count="1200">0</h3>
                    <p>Apps</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Games.png" alt="Games">
                    <h3 class="counter" data-count="6000">0</h3>
                    <p>Games</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Coding.png" alt="Coding">
                    <h3 class="counter" data-count="1000">0</h3>
                    <p>Coding</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/Web_Design.png" alt="Web Design">
                    <h3 class="counter" data-count="800">0</h3>
                    <p>Web Design</p>
                </div>
                <div class="journey-item">
                    <img src="ourjourney/3D_Design.png" alt="3D Design">
                    <h3 class="counter" data-count="850">0</h3>
                    <p>3D Design</p>
                </div>
            </div>
        </div>
    </div>



    <!-- PArticipated schjools -->
    <div class="custom-carousel-container">
        <h2 class="custom-carousel-title">PARTICIPATED SCHOOLS</h2>
        <p class="custom-carousel-text">
            Our exciting journey of Design Championship began in 2014. Catch a glimpse below of the number of
            school students we have empowered with design skills, the number of designs they have created
            in different categories, and more.
        </p>

        <div class="custom-carousel-box">
            <div id="schoolCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="custom-carousel-items">
                            <div class="custom-carousel-card">
                                <img src="logo_partic/blue.webp" alt="Blue Ridges">
                                <p>Blue Ridges</p>
                            </div>
                            <div class="custom-carousel-card">
                                <img src="logo_partic/sunrise.webp" alt="Sun Rise Chennai">
                                <p>Sun Rise Chennai</p>
                            </div>
                            <div class="custom-carousel-card">
                                <img src="logo_partic/oak.webp" alt="Oakwood Academy">
                                <p>Oakwood Academy</p>
                            </div>
                            <div class="custom-carousel-card">
                                <img src="logo_partic/green.webp" alt="Green Valley School">
                                <p>Green Valley School</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="custom-carousel-items">
                            <div class="custom-carousel-card">
                                <img src="logo_partic/DPS.webp" alt="Delhi Public School">
                                <p>Delhi Public School</p>
                            </div>
                            <div class="custom-carousel-card">
                                <img src="logo_partic/cms.webp" alt="City Montessori">
                                <p>City Montessori</p>
                            </div>
                            <div class="custom-carousel-card">
                                <img src="logo_partic/frncis.webp" alt="St Francis">
                                <p>St Francis</p>
                            </div>
                            <div class="custom-carousel-card">
                                <img src="logo_partic/pps.webp" alt="Prelude Public School">
                                <p>Prelude Public School</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons Below Carousel with Unique Classes -->
            <div class="school-carousel-buttons">
                <button class="school-carousel-btn school-carousel-prev" type="button" data-bs-target="#schoolCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="school-carousel-btn school-carousel-next" type="button" data-bs-target="#schoolCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </div>


    <!-- Gallery Section -->


    <div class="jury-panel">
        <h2 class="jury-title">JURIES</h2>
        <p class="jury-description">
            The Jury panel will comprise eminent personalities from the education fraternity and leading industry
            experts who will evaluate the students' projects from across India.
        </p>



        <!-- Desktop Carousel -->
        <div id="desktopCarousel" class="carousel slide d-none d-md-block" data-bs-ride="carousel" data-bs-wrap="true">

            <div class="gallery-container">
                <div class="Slider">
                    <div class="Slide">
                        <img src='jury/jury1.webp' alt='Grapefruits, lemons, and pomegranates.' />
                        <p>Mr. Abhishek Goyal</p>
                    </div>

                    <div class="Slide">
                        <img src='jury/jury2.webp' alt='Half of an avocado.' />
                        <p>Ms. Arti Gupta</p>
                    </div>

                    <div class="Slide">
                        <img src='jury/jury3.webp' alt='Half of a lime.' />
                        <p>mr.Asad Dadan</p>
                    </div>

                    <div class="Slide">
                        <img src='jury/jury4.webp' alt='A single cherry with stem.' />
                        <p>Ms. Asmita Madhusudhanan</p>
                    </div>

                    <div class="Slide">
                        <img src='jury/jury5.webp' alt='A bunch of bananas.' />
                        <p>Mr Akash</p>
                    </div>

                    <div class="Slide">
                        <img src='jury/jury6.webp' alt='Three pears.' />
                        <p>Ms Aditi</p>
                    </div>

                    <div class="Slide">
                        <img src='jury/jury7.webp' alt='A basket full of peaches.' />
                        <p>Mr Aditya</p>
                    </div>

                    <div class="Slide">
                        <img src='jury/jury8.webp' alt='A bowl of avocados.' />
                        <p>Ms Akansha</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Tablet Only Carousel -->
        <div id="tabletCarousel" class="carousel slide d-none d-md-block d-lg-none" data-bs-ride="carousel"
            data-bs-wrap="true">


            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <img src="jury/jury1.webp" class="card-img-top" alt="Mr. Abhishek Goyal">
                                <div class="card-body">
                                    <h5 class="card-title">Mr. Abhishek Goyal</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img src="jury/jury2.webp" class="card-img-top" alt="Ms. Aarti Gaur">
                                <div class="card-body">
                                    <h5 class="card-title">Ms. Aarti Gaur</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <img src="jury/jury3.webp" class="card-img-top" alt="Mr. Assad Dadan">
                                <div class="card-body">
                                    <h5 class="card-title">Mr. Assad Dadan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <img src="jury/jury4.webp" class="card-img-top" alt="Ms. Anusmita">
                                <div class="card-body">
                                    <h5 class="card-title">Ms. Anusmita</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more carousel items here following the same structure -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#tabletCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#tabletCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>


        <!-- Mobile Carousel -->
        <div id="mobileCarousel" class="carousel slide d-md-none" data-bs-ride="carousel" data-bs-wrap="true">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury1.webp" class="card-img-top" alt="Mr. Abhishek Goyal">
                                <div class="card-body">
                                    <h5 class="card-title">Mr. Abhishek Goyal</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury2.webp" class="card-img-top" alt="Ms. Aarti Gaur">
                                <div class="card-body">
                                    <h5 class="card-title">Ms. Aarti Gaur</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury3.webp" class="card-img-top" alt="Mr. Assad Dadan">
                                <div class="card-body">
                                    <h5 class="card-title">Mr. Assad Dadan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury4.webp" class="card-img-top" alt="Ms. Aarti Gaur">
                                <div class="card-body">
                                    <h5 class="card-title">Ms. Asmita Madhusudhanan</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury5.webp" class="card-img-top" alt="Ms. Aarti Gaur">
                                <div class="card-body">
                                    <h5 class="card-title">Mr. Akash</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury6.webp" class="card-img-top" alt="Ms. Aarti Gaur">
                                <div class="card-body">
                                    <h5 class="card-title">Ms. Aditi</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury7.webp" class="card-img-top" alt="Ms. Aarti Gaur">
                                <div class="card-body">
                                    <h5 class="card-title">Mr. Aditya</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <img src="jury/jury8.webp" class="card-img-top" alt="Ms. Aarti Gaur">
                                <div class="card-body">
                                    <h5 class="card-title">Ms. Akansha</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mobileCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mobileCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>

    <!-- PAst winner -->

    <div id="winners-section" class="winners-section">

        <h2 class="winners-title">PREVIOUS YEARS WINNERS</h2>
        <p class="winners-subtitle">Your Child Could be The Next Winner</p>

        <div class="winners-container">
            <div class="winners-row">

                <div class="winners-card-wrapper">
                    <div class="winners-card">
                        <img src="Winners\trophy.jpg" class="winners-img" alt="winner1">
                        <div class="winners-card-body">
                            <h5 class="winners-card-title">Design Champion 2023</h5>
                        </div>
                    </div>
                    <a href="winners.php" class="winners-btn">Explore</a> <!-- Button Outside -->
                </div>

                <div class="winners-card-wrapper">
                    <div class="winners-card">
                        <img src="Winners\trophy.jpg" class="winners-img" alt="winner2">
                        <div class="winners-card-body">
                            <h5 class="winners-card-title">Design Champion 2022</h5>
                        </div>
                    </div>
                    <a href="winners2.php" class="winners-btn">Explore</a> <!-- Button Outside -->
                </div>

                <div class="winners-card-wrapper">
                    <div class="winners-card">
                        <img src="Winners\trophy.jpg" class="winners-img" alt="winner3">
                        <div class="winners-card-body">
                            <h5 class="winners-card-title">Design Champion 2021</h5>
                        </div>
                    </div>
                    <a href="winner3.php" class="winners-btn">Explore</a> <!-- Button Outside -->
                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid footer-container">
        <div class="row">
            <!-- Left Section (Green Background) -->
            <div class="col-md-6 left-section text-white p-4">
                <h2 class="fw-bold">ICT360</h2>
                <p>
                    ICT360 offers a comprehensive ICT, Computer Science, and iLAB ecosystem for
                    schools, teachers, and students. Our initiative focuses on fostering 21st-century skills
                    and industry readiness through an NEP-aligned curriculum to all boards. From grades
                    1-10, we employ experiential and project-based learning methodologies, offering
                    certifications for schools in AI, AR, VR, coding, media, apps, games, web design, 3D
                    printing, robotics, IoT, and cloud computing.
                </p>

                <!-- White line before News & Blogs -->
                <h4 class="fw-bold news-heading">News & Blogs</h4>

                <!-- Carousel for News & Blogs -->
                <div id="newsCarouselFooter" class="carousel slide footer-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="footer\class.webp" class="d-block w-100 rounded" alt="News 1">
                        </div>
                        <div class="carousel-item">
                            <img src="footer\premium_photo-1663106423058-c5242333348c.jpeg"
                                class="d-block w-100 rounded" alt="News 2">
                        </div>
                        <div class="carousel-item">
                            <img src="footer\teamwork-pictures-2s6aqzl9v3r9vsbn.jpg" class="d-block w-100 rounded"
                                alt="News 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarouselFooter"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#newsCarouselFooter"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

            <!-- Right Section (Black Background) -->
            <div class="col-md-6 right-section text-white p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <img src="Footerimg\D_online.png" class="img-fluid new-logo" alt="New Image">
                    <div class="text-end">
                        <h5 class="fw-bold">Knowledge Partner</h5>
                        <img src="images/ict_logo-new.png" class="img-fluid ict-logo" alt="ICT360">
                    </div>
                </div>

                <!-- Social Media & Email - Same Line -->
                <div class="social-email-container">
                    <div class="social-icons">
                        <h6 class="fw-bold">Follow Us On</h6>
                        <div class="d-flex">
                            <i class="fab fa-facebook me-2"></i>
                            <i class="fab fa-instagram me-2"></i>
                            <i class="fab fa-linkedin me-2"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>

                    <!-- Email Subscription -->
                    <div class="email-container">
                        <h6 class="fw-bold">Email Us</h6>
                        <div class="input-group">
                            <input type="email" placeholder="Email" class="email-input">
                            <button class="send-button">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="contact-info mt-3">
                    <p><i class="fas fa-envelope me-2"></i> info@designchampionship.in</p>
                    <p><i class="fas fa-phone me-2"></i> 022-42018000</p>
                </div>

                <!-- Footer Links -->
                <div class="row footer-links mt-4">
                    <div class="col-md-4">
                        <h6 class="fw-bold">About Us</h6>
                        <p>For Students</p>
                        <p>FAQ's</p>
                        <p>Organizers</p>
                        <p>Terms & Conditions</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="fw-bold">Winners</h6>
                        <p>Region Wise</p>
                        <p>All India Finals</p>
                        <p>Blogs</p>
                    </div>
                    <div class="col-md-4">
                        <h6 class="fw-bold">Competition</h6>
                        <p>Login</p>
                        <p>Register</p>
                        <p>Judging Rubric</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
    <script src='https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js'></script>
    <script src='https://unpkg.com/flickity-transformer/dist/flickity-transformer.pkgd.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.2/flickity.pkgd.min.js'></script>
    <script src="animations.js"></script>




</body>

</html>