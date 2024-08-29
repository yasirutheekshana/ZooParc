<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZooParc-Zoological Park</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img style="height: 60px;" src="./assets/images/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#reviews">Events and Programs</a>
                    </li>
                    <?php if (isset($_SESSION['name'])): ?>
                        <?php if ($_SESSION['name'] === 'admin'): ?>
                            <li class="nav-item"><a class="nav-link" href="adminPanel.php">Dashboard</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link" href="addEvent.html">Add Event</a></li>
                        <li class="nav-item"><a class="nav-link" href="/ZooParc/assets/php/logout.php">Log Out</a></li>
                    <?php endif; ?>
                </ul>
                <a href="<?php echo isset($_SESSION['name']) ? '#' : 'signUp.html'; ?>" class="btn btn-brand ms-lg-3">
                    <?php
                    if (isset($_SESSION['name'])) {
                        echo $_SESSION['name'];
                    } else {
                        echo 'Sign Up';
                    }
                    ?>
                </a>
            </div>
        </div>
    </nav>

    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 data-aos="fade-left" class="text-uppercase text-white fw-semibold display-1">Welcome to ZooParc
                    </h1>
                    <h5 class="text-white mt-3 mb-4" data-aos="fade-right">ZooParc Zoological Park is home to 2,000
                        animals of 200 different species.</h5>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="50">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">About us</h1>
                        <div class="line"></div>
                        <p>ZooParc Zoological Park is home to 2,000 animals of 200 different species, including our
                            famous giant pandas. Spanning 70 hectares, the park provides natural habitats for a wide
                            range of wildlife.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6" data-aos="fade-down" data-aos-delay="50">
                    <img src="./assets/images/zooAnimals.jpg" alt="">
                </div>
                <div data-aos="fade-down" data-aos-delay="150" class="col-lg-5">

                    <div class="d-flex pt-4 mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-home-heart-fill"></i>
                        </div>
                        <div>
                            <h5>Conservation Efforts</h5>
                            <p>ZooParc Zoological Park is dedicated to the conservation of wildlife and their habitats.
                                Our efforts include breeding programs for endangered species and habitat restoration
                                projects.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="iconbox me-4">
                            <i class="ri-user-5-fill"></i>
                        </div>
                        <div>
                            <h5>Educational Programs</h5>
                            <p>We offer a variety of educational programs for all ages, aiming to inspire and educate
                                our visitors about wildlife conservation and the importance of protecting our planet.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="iconbox me-4">
                            <i class="ri-rocket-2-fill"></i>
                        </div>
                        <div>
                            <h5>Community Engagement</h5>
                            <p>Our community outreach programs engage the local community in conservation efforts,
                                providing opportunities for volunteers to contribute to our mission and make a
                                difference.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="section-padding border-top">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Our Services</h1>
                        <div class="line"></div>
                        <p>Explore the variety of services we offer at ZooParc Zoological Park to enhance your visit and
                            promote wildlife conservation.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4 text-center">
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="150">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-pen-nib-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Guided Tours</h5>
                        <p>Join our expert guides for a tour through the park, learning about the diverse species and
                            our conservation efforts.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="250">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-stack-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Animal Care Programs</h5>
                        <p>Participate in our animal care programs to understand how we care for our animals and what
                            you can do to help.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="350">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-ruler-2-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Research and Conservation</h5>
                        <p>Support our ongoing research and conservation projects aimed at preserving endangered species
                            and their habitats.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="450">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-pie-chart-2-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Educational Workshops</h5>
                        <p>Attend our educational workshops designed for all ages to learn about wildlife, conservation,
                            and environmental protection.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="550">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-code-box-line"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Community Programs</h5>
                        <p>Engage with our community programs that involve local schools, organizations, and volunteers
                            in conservation activities.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="650">
                    <div class="service theme-shadow p-lg-5 p-4">
                        <div class="iconbox">
                            <i class="ri-user-2-fill"></i>
                        </div>
                        <h5 class="mt-4 mb-3">Gift Shops and Cafes</h5>
                        <p>Visit our gift shops and cafes for unique souvenirs, delicious food, and refreshments to make
                            your visit even more enjoyable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="counter" class="section-padding">
        <div class="container text-center">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6" data-aos="fade-down" data-aos-delay="150">
                    <h1 class="text-white display-4">20,00+</h1>
                    <h6 class="text-uppercase mb-0 text-white mt-3">Animals</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-down" data-aos-delay="250">
                    <h1 class="text-white display-4">200+</h1>
                    <h6 class="text-uppercase mb-0 text-white mt-3">Different species</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-down" data-aos-delay="350">
                    <h1 class="text-white display-4">10,000+</h1>
                    <h6 class="text-uppercase mb-0 text-white mt-3">Members</h6>
                </div>
                <div class="col-lg-3 col-sm-6" data-aos="fade-down" data-aos-delay="450">
                    <h1 class="text-white display-4">100+</h1>
                    <h6 class="text-uppercase mb-0 text-white mt-3">Workers</h6>
                </div>
            </div>
        </div>
    </section>

    <!-- PORTFOLIO -->
    <section id="portfolio" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Our Portfolio</h1>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="150">
                    <div class="portfolio-item image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/gori.jpg" alt="">
                        </div>
                        <a href="./assets/images/gori.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                    <div class="portfolio-item image-zoom mt-4">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/tiger.jpg" alt="">
                        </div>
                        <a href="./assets/images/tiger.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="250">
                    <div class="portfolio-item image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/koala.jpg" alt="">
                        </div>
                        <a href="./assets/images/koala.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                    <div class="portfolio-item image-zoom mt-4">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/apes.jpg" alt="">
                        </div>
                        <a href="./assets/images/apes.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down" data-aos-delay="350">
                    <div class="portfolio-item image-zoom">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/lion.jpeg" alt="">
                        </div>
                        <a href="./assets/images/lion.jpeg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                    <div class="portfolio-item image-zoom mt-4">
                        <div class="image-zoom-wrapper">
                            <img src="./assets/images/jiraf.jpg" alt="">
                        </div>
                        <a href="./assets/images/jiraf.jpg" data-fancybox="gallery" class="iconbox"><i
                                class="ri-search-2-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EVENTS -->
    <section id="reviews" class="section-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 fw-semibold">Events and Programs</h1>
                        <div class="line"></div>
                        <p>Join us at ZooParc for events that bring the wonders of wildlife to life. From educational
                            workshops to live animal shows, our events offer fun and learning for everyone. Experience
                            the excitement of nature through our special activities and seasonal celebrations.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-5 gx-4" id="events-container">
                <!-- Event items will be inserted here by JavaScript -->
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetch('/ZooParc/assets/php/fetchEvents.php')
                .then(response => response.json())
                .then(events => {
                    const container = document.getElementById('events-container');
                    container.innerHTML = ''; // Clear existing content

                    events.forEach(event => {
                        const col = document.createElement('div');
                        col.className = 'col-lg-4 col-sm-6';
                        col.setAttribute('data-aos', 'fade-down');
                        col.setAttribute('data-aos-delay', '150');

                        col.innerHTML = `
            <div class="review">
              <div class="review-head p-4 bg-white theme-shadow">
                <div class="text-warning">
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                  <i class="ri-star-fill"></i>
                </div>
                <p>${event.description}</p>
              </div>
              <div class="review-person mt-4 d-flex align-items-center">
                <img class="rounded-circle" src="./assets/images/events.jpg" alt="">
                <div class="ms-3">
                  <h5>${event.event_name}</h5>
                  <small>${event.event_date} </br> ${event.event_time} Onward</small>
                </div>
              </div>
            </div>
          `;

                        container.appendChild(col);
                    });
                })
                .catch(error => console.error('Error fetching events:', error));
        });
    </script>

    <!-- CONTACT -->
    <section class="section-padding bg-light" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
                    <div class="section-title">
                        <h1 class="display-4 text-white fw-semibold">Gete in touch</h1>
                        <div class="line bg-white"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-aos="fade-down" data-aos-delay="250">
                <div class="col-lg-8">
                    <form action="#" class="row g-3 p-lg-5 p-4 bg-white theme-shadow">
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" placeholder="Enter first name">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control" placeholder="Enter last name">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="email" class="form-control" placeholder="Enter Email address">
                        </div>
                        <div class="form-group col-lg-12">
                            <input type="text" class="form-control" placeholder="Enter subject">
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" rows="5" class="form-control"
                                placeholder="Enter Message"></textarea>
                        </div>
                        <div class="form-group col-lg-12 d-grid">
                            <button class="btn btn-brand">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-5">
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="mb-0 text-white">SERVICES</h5>
                        <div class="line"></div>
                        <ul>
                            <li><a href="#">Guided Tours</a></li>
                            <li><a href="#">Animal Care Programs</a></li>
                            <li><a href="#">Research and Conservation</a></li>
                            <li><a href="#">Educational Workshops</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="mb-0 text-white">ABOUT</h5>
                        <div class="line"></div>
                        <ul>
                            <li><a href="#">Conservation Efforts</a></li>
                            <li><a href="#">Educational Programs</a></li>
                            <li><a href="#">Community Engagement</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h5 class="mb-0 text-white">CONTACT</h5>
                        <div class="line"></div>
                        <ul>
                            <li>New York, NY 3300</li>
                            <li>+94 76 381 1685</li>
                            <li>www.ZooParc.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row g-4 justify-content-between">
                    <div class="col-auto">
                        <p class="mb-0">© ZooParc. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>