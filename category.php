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
    <link rel="stylesheet" href="category.css">
    
    
    <link rel='stylesheet' href='https://unpkg.com/flickity@2.0.3/dist/flickity.min.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">



</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="main.php">
      <img src="images/ict_logo-new-removebg.png" alt="Logo" height="39" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="main.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="category.php">CATEGORIES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="main.php#winners-section">PAST WINNER PROJECTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="main.php#winners-section">WINNERS</a>
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

    <section class="categories">
        <div class="overlay"></div>
        <div class="banner-content">
            <h1>Categories</h1>
            <p>Schools participated in many categories</p>
        </div>
        <p id="game-design"></p>
    </section>




    <p id="game-design"></p>

    <div class="container">
        <div class="image">
            <img src="images\gamedev.webp" alt="Game Design">
        </div>
        <div class="text">
            <h2>Game Design</h2>
            <p>Craft immersive gameplay mechanics, character development, and engaging worlds that players can explore
                and enjoy.</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero quisquam dolorem quasi voluptate
                voluptatibus facere soluta esse tempora quod iste tempore quo mollitia corporis, cupiditate laboriosam
                repellat eos sapiente praesentium veritatis nisi. Reprehenderit maiores quam esse aut voluptatum, sint
                quidem. Quae fugit mollitia totam modi voluptatibus. Possimus hic vel assumenda natus, magni sunt
                sapiente consequatur animi voluptate inventore! Nobis optio hic voluptatem tempora accusantium rem fugit
                eius, voluptate similique eos, quasi reprehenderit aperiam eum, accusamus asperiores. Earum nemo
                exercitationem quod blanditiis quibusdam, tenetur laboriosam recusandae. Voluptatibus pariatur molestias
                voluptatem?</p>
            <p id="3D">
                </id>
        </div>
    </div>

    <div class="container">
        <div class="image">
            <img src="images/3Dmod.webp" alt="3D Design">
        </div>
        <div class="text">
            <h2>3D Design</h2>
            <p>Create lifelike 3D models for games, movies, and simulations using advanced modeling and rendering tools.
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero quisquam dolorem quasi voluptate
                voluptatibus facere soluta esse tempora quod iste tempore quo mollitia corporis, cupiditate laboriosam
                repellat eos sapiente praesentium veritatis nisi. Reprehenderit maiores quam esse aut voluptatum, sint
                quidem. Quae fugit mollitia totam modi voluptatibus. Possimus hic vel assumenda natus, magni sunt
                sapiente consequatur animi voluptate inventore! Nobis optio hic voluptatem tempora accusantium rem fugit
                eius, voluptate similique eos, quasi reprehenderit aperiam eum, accusamus asperiores. Earum nemo
                exercitationem quod blanditiis quibusdam, tenetur laboriosam recusandae. Voluptatibus pariatur molestias
                voluptatem?</p>
            <p id="movie"></p>
        </div>
    </div>

    <div class="container">
        <div class="image">
            <img src="images/moviemak.webp" alt="Movie Making">
        </div>
        <div class="text">
            <h2>Movie Making</h2>
            <div style="text-align: left;">
                <p>Combine storytelling, cinematography, and editing skills to produce captivating films and short
                    videos.
                </p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero quisquam dolorem quasi voluptate
                    voluptatibus facere soluta esse tempora quod iste tempore quo mollitia corporis, cupiditate
                    laboriosam
                    repellat eos sapiente praesentium veritatis nisi. Reprehenderit maiores quam esse aut voluptatum,
                    sint
                    quidem. Quae fugit mollitia totam modi voluptatibus. Possimus hic vel assumenda natus, magni sunt
                    sapiente consequatur animi voluptate inventore! Nobis optio hic voluptatem tempora accusantium rem
                    fugit
                    eius, voluptate similique eos, quasi reprehenderit aperiam eum, accusamus asperiores. Earum nemo
                    exercitationem quod blanditiis quibusdam, tenetur laboriosam recusandae. Voluptatibus pariatur
                    molestias
                    voluptatem?</p>
                <p id="app"></p>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="image">
            <img src="images/appdev.webp" alt="App Design">
        </div>
        <div class="text">
            <h2>App Design</h2>
            <p>Design intuitive and visually appealing user interfaces that enhance user experience on mobile devices.
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero quisquam dolorem quasi voluptate
                voluptatibus facere soluta esse tempora quod iste tempore quo mollitia corporis, cupiditate laboriosam
                repellat eos sapiente praesentium veritatis nisi. Reprehenderit maiores quam esse aut voluptatum, sint
                quidem. Quae fugit mollitia totam modi voluptatibus. Possimus hic vel assumenda natus, magni sunt
                sapiente consequatur animi voluptate inventore! Nobis optio hic voluptatem tempora accusantium rem fugit
                eius, voluptate similique eos, quasi reprehenderit aperiam eum, accusamus asperiores. Earum nemo
                exercitationem quod blanditiis quibusdam, tenetur laboriosam recusandae. Voluptatibus pariatur molestias
                voluptatem?</p>
            <p id="graphic"></p>
        </div>
    </div>

    <div class="container">
        <div class="image">
            <img src="images/graphcs.webp" alt="Graphic Design">
        </div>
        <div class="text">
            <h2>Graphic Design</h2>
            <p>Communicate ideas through visual compositions using typography, imagery, color, and layout techniques.
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero quisquam dolorem quasi voluptate
                voluptatibus facere soluta esse tempora quod iste tempore quo mollitia corporis, cupiditate laboriosam
                repellat eos sapiente praesentium veritatis nisi. Reprehenderit maiores quam esse aut voluptatum, sint
                quidem. Quae fugit mollitia totam modi voluptatibus. Possimus hic vel assumenda natus, magni sunt
                sapiente consequatur animi voluptate inventore! Nobis optio hic voluptatem tempora accusantium rem fugit
                eius, voluptate similique eos, quasi reprehenderit aperiam eum, accusamus asperiores. Earum nemo
                exercitationem quod blanditiis quibusdam, tenetur laboriosam recusandae. Voluptatibus pariatur molestias
                voluptatem?</p>
            <p id="code"></p>
        </div>
    </div>

    <div class="container">
        <div class="image">
            <img src="images/coding.webp" alt="Coding">
        </div>
        <div class="text">
            <h2>Coding</h2>
            <p>Build software, websites, and applications by writing efficient, scalable code using modern programming
                languages.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero quisquam dolorem quasi voluptate
                voluptatibus facere soluta esse tempora quod iste tempore quo mollitia corporis, cupiditate laboriosam
                repellat eos sapiente praesentium veritatis nisi. Reprehenderit maiores quam esse aut voluptatum, sint
                quidem. Quae fugit mollitia totam modi voluptatibus. Possimus hic vel assumenda natus, magni sunt
                sapiente consequatur animi voluptate inventore! Nobis optio hic voluptatem tempora accusantium rem fugit
                eius, voluptate similique eos, quasi reprehenderit aperiam eum, accusamus asperiores. Earum nemo
                exercitationem quod blanditiis quibusdam, tenetur laboriosam recusandae. Voluptatibus pariatur molestias
                voluptatem?</p>
            <p id="web"></p>
        </div>
    </div>

    <div class="container">
        <div class="image">
            <img src="images/webdev.webp" alt="Web Design">
        </div>
        <div class="text">
            <h2>Web Design</h2>
            <p>Create responsive, accessible, and beautiful websites that provide seamless experiences across all
                devices.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad libero quisquam dolorem quasi voluptate
                voluptatibus facere soluta esse tempora quod iste tempore quo mollitia corporis, cupiditate laboriosam
                repellat eos sapiente praesentium veritatis nisi. Reprehenderit maiores quam esse aut voluptatum, sint
                quidem. Quae fugit mollitia totam modi voluptatibus. Possimus hic vel assumenda natus, magni sunt
                sapiente consequatur animi voluptate inventore! Nobis optio hic voluptatem tempora accusantium rem fugit
                eius, voluptate similique eos, quasi reprehenderit aperiam eum, accusamus asperiores. Earum nemo
                exercitationem quod blanditiis quibusdam, tenetur laboriosam recusandae. Voluptatibus pariatur molestias
                voluptatem?</p>
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










</body>

</html>