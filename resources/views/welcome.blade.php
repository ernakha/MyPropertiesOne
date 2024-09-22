<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EduHome - Education Is About Academic Excellence</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="{{asset('frontend/assets/favicon.svg')}}" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="{{asset('frontend/assets/images/hero-banner.png')}}">
  <link rel="preload" as="image" href="{{asset('frontend/assets/images/hero-abs-1.png')}}" media="min-width(768px)">
  <link rel="preload" as="image" href="{{asset('frontend/assets/images/hero-abs-2.png')}}" media="min-width(768px)">

</head>

<body id="top">
  <style>
    .logo {
      display: inline-block;
      text-decoration: none;
      /* Hilangkan underline */
    }

    .logo-img {
      height: 60px;
      /* Sesuaikan tinggi logo dengan ukuran yang lebih besar */
      width: auto;
      /* Otomatis menyesuaikan lebar sesuai proporsi tinggi */
    }

    .card-banner {
      position: relative;
      overflow: hidden;
      width: 100%;
      height: 200px;
      /* Sesuaikan tinggi card */
    }

    .card-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Mengatur agar gambar memenuhi seluruh card dan tetap proporsional */
    }

    .course-card {
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      /* Memberikan bayangan lembut */
      border-radius: 8px;
      overflow: hidden;
      /* Agar elemen tidak keluar dari batas card */
      transition: transform 0.3s ease-in-out;
    }

    .course-card:hover {
      transform: scale(1.05);
      /* Menambahkan efek zoom saat hover */
    }

    .card-content {
      padding: 15px;
    }
  </style>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="#" class="logo">
          <img src="{{ asset('frontend/assets/images/logo-brand2.png') }}" alt="EduHome Logo" class="logo-img">
        </a>
      </h1>


      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <a href="#" class="logo"></a>

          <button class="nav-close-btn" aria-label="Close menu" data-nav-toggler>
            <ion-icon name="close-outline"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link" data-nav-toggler>Home</a>
          </li>

          <li class="navbar-item">
            <a href="#about" class="navbar-link" data-nav-toggler>About</a>
          </li>

          <li class="navbar-item">
            <a href="#courses" class="navbar-link" data-nav-toggler>Courses</a>
          </li>

          <li class="navbar-item">
            <a href="#event" class="navbar-link" data-nav-toggler>Event</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-toggler>Blog</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-toggler>Contact</a>
          </li>

        </ul>

      </nav>

      <div class="header-actions">

        <button class="header-action-btn" aria-label="Open search" data-search-toggler>
          <ion-icon name="search-outline"></ion-icon>
        </button>


        <button class="header-action-btn nav-open-btn" aria-label="Open menu" data-nav-toggler>
          <ion-icon name="menu-outline"></ion-icon>
        </button>

      </div>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <!-- 
    - #SEARCH BOX
  -->

  <div class="search-container" data-search-box>
    <div class="container">

      <button class="search-close-btn" aria-label="Close search" data-search-toggler>
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="search-wrapper">
        <input type="search" name="search" placeholder="Search Here..." aria-label="Search" class="search-field">

        <button class="search-submit" aria-label="Submit" data-search-toggler>
          <ion-icon name="search-outline"></ion-icon>
        </button>
      </div>

    </div>
  </div>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home" aria-label="hero" style="background-image: url('{{asset('frontend/assets/images/hero-bg.jpg')}}')">
        <div class="container">

          <div class="hero-content">

            <p class="section-subtitle">Better Learning Future With Us</p>

            <h2 class="h1 hero-title">Education Is About Academic Excellence</h2>

            <p class="hero-text">
              Sed eu volutpat arcu, a tincidunt nulla quam, feugiat sit amet ipsum a, dapibus porta velit.
            </p>

            <a href="#" class="btn btn-primary">
              <span class="span">Get Started Today</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">

            <img src="{{asset('frontend/assets/images/hero-banner.png')}}" width="500" height="500" loading="lazy" alt="hero image"
              class="w-100">

            <img src="{{asset('frontend/assets/images/hero-abs-1.png')}}" width="318" height="352" loading="lazy" aria-hidden="true"
              class="abs-img abs-img-1">

            <img src="{{asset('frontend/assets/images/hero-abs-2.png')}}" width="160" height="160" loading="lazy" aria-hidden="true"
              class="abs-img abs-img-2">

          </figure>

        </div>
      </section>





      <!-- 
        - #CATEGORY
      -->

      <section class="section category" aria-label="category">
        <div class="container">

          <p class="section-subtitle">Course Categories</p>

          <h2 class="h2 section-title">Popular Topics To Learn</h2>

          <ul class="grid-list">

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="briefcase-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Personal Development</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="file-tray-full-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Human Research</a>
                  </h3>

                  <span class="card-meta">24 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="color-palette-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Art & Design</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="layers-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Business Management</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="laptop-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Web Development</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="thumbs-up-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Lifestyle</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="headset-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Digital Marketing</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="server-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Data Sciences</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="medkit-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">Health & Fitness</a>
                  </h3>

                  <span class="card-meta">39 Course</span>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #COURSE
      -->

      <section class="section course" id="courses" aria-label="course"
        style="background-image: url('{{asset('frontend/assets/images/course-bg.jpg')}}')">
        <div class="container">

          <p class="section-subtitle">Popular Courses</p>

          <h2 class="h2 section-title">Our Popular Courses</h2>

          <ul class="grid-list">
            @foreach($properti as $item)
            @php
            $gambarArray = json_decode($item->gambar);
            @endphp

            @if($gambarArray && count($gambarArray) > 0)
            <li>
              <div class="course-card">
                <figure class="card-banner">
                  <!-- Menampilkan gambar pertama dan memastikan ukurannya sesuai dengan card -->
                  <img src="{{ asset('storage/' . $gambarArray[0]) }}" class="img-fluid dynamic-img card-image" alt="Gambar Properti" loading="lazy">
                </figure>

                <div class="card-actions">
                  <span class="badge">Intermediate</span>
                  <button class="whishlist-btn" aria-label="Add to wishlist" data-whish-btn>
                    <ion-icon name="heart"></ion-icon>
                  </button>
                </div>

                <div class="card-content">
                  <ul class="card-meta-list">
                    <li class="card-meta-item">
                      <ion-icon name="reader-outline" aria-hidden="true"></ion-icon>
                      <span class="card-meta-text">{{ $item->kt }} Kamar Tidur</span>
                    </li>
                    <li class="card-meta-item">
                      <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                      <time class="card-meta-text">{{ $item->km }} Kamar Mandi</time>
                    </li>
                  </ul>

                  <h3 class="h3">
                    <a href="#" class="card-title">{{ $item->judul }} {{ $item->kota->nama }}</a>
                  </h3>

                  <div class="rating-wrapper">
                    <span class="rating-text">{{ $item->alamat }}</span>
                  </div>

                  <div class="card-footer">
                    <div class="card-price">
                      <span class="span">${{ $item->harga }}</span>
                      <del class="del">$39.00</del>
                    </div>
                    <div class="card-meta-item">
                      <ion-icon name="people-outline" aria-hidden="true"></ion-icon>
                      <span class="card-meta-text">{{ $item->lt }} m²</span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            @endif
            @endforeach
          </ul>




          <a href="#" class="btn btn-primary">
            <span class="span">View All Courses</span>

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </a>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="section cta" aria-label="workshop" style="background-image: url('{{asset('frontend/assets/images/cta-bg.png')}}')">
        <div class="container">

          <figure class="cta-banner">
            <img src="{{asset('frontend/assets/images/cta-banner.jpg')}}" width="580" height="380" loading="lazy" alt="cta banner"
              class="img-cover">
          </figure>

          <div class="cta-content">

            <p class="section-subtitle">Free Workshop</p>

            <h2 class="h2 section-title">Join Our Free Workshops</h2>

            <p class="section-text">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sit amet, consect adipi scing elit, sed do
              eiusmod tempor
              incididunt ut sed do eiusmod tempor incididunt ut labore et dolore aliqua.
            </p>

            <a href="#" class="btn btn-secondary">
              <span class="span">Upcomming Workshop</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

        </div>
      </section>





      <!-- 
        - #EVENT
      -->

      <section class="section event" id="event" aria-label="event">
        <div class="container">

          <p class="section-subtitle">Upcomming Event</p>

          <h2 class="h2 section-title">Let’s Join Our Community</h2>

          <ul class="grid-list">

            <li>
              <div class="event-card">

                <figure class="card-banner">
                  <img src="{{asset('frontend/assets/images/event-1.jpg')}}" width="370" height="250" loading="lazy"
                    alt="Innovation & Technological Entrepreneurship Team" class="img-cover">
                </figure>

                <time class="badge" datetime="2022-12-04">04 Dec 2022</time>

                <div class="card-content">

                  <address class="card-address">
                    <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

                    <span class="span">Alpaca Way Anaheim, CA 92805</span>
                  </address>

                  <h3 class="h3">
                    <a href="#" class="card-title">Innovation & Technological Entrepreneurship Team</a>
                  </h3>

                  <a href="#" class="btn-link">
                    <span class="span">Get Ticket</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="event-card">

                <figure class="card-banner">
                  <img src="{{asset('frontend/assets/images/event-2.jpg')}}" width="370" height="250" loading="lazy"
                    alt="Virtual Spring Part-time Jobs Fair for Student" class="img-cover">
                </figure>

                <time class="badge" datetime="2022-10-30">30th Oct 2022</time>

                <div class="card-content">

                  <address class="card-address">
                    <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

                    <span class="span">Ritter Avenue Detroit, MI 48226</span>
                  </address>

                  <h3 class="h3">
                    <a href="#" class="card-title">Virtual Spring Part-time Jobs Fair for Student</a>
                  </h3>

                  <a href="#" class="btn-link">
                    <span class="span">Get Ticket</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

            <li>
              <div class="event-card">

                <figure class="card-banner">
                  <img src="{{asset('frontend/assets/images/event-3.jpg')}}" width="370" height="250" loading="lazy"
                    alt="Explorations of Regional Chief Executive Network" class="img-cover">
                </figure>

                <time class="badge" datetime="2022-09-18">18th Sep 2022</time>

                <div class="card-content">

                  <address class="card-address">
                    <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

                    <span class="span">Stout Street York, PA 17401</span>
                  </address>

                  <h3 class="h3">
                    <a href="#" class="card-title">Explorations of Regional Chief Executive Network</a>
                  </h3>

                  <a href="#" class="btn-link">
                    <span class="span">Get Ticket</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #NEWSLETTER
      -->

      <section class="section newsletter" aria-label="newsletter"
        style="background-image: url('{{asset('frontend/assets/images/newsletter-bg.jpg')}}')">
        <div class="container">

          <p class="section-subtitle">Subscribe Newsletter</p>

          <h2 class="h2 section-title">Get Every Latest News</h2>

          <form action="" class="newsletter-form">

            <div class="input-wrapper">
              <input type="email" name="email_address" aria-label="email" placeholder="Enter your mail address" required
                class="email-field">

              <ion-icon name="mail-open-outline" aria-hidden="true"></ion-icon>
            </div>

            <button type="submit" class="btn btn-primary">
              <span class="span">Subscribe</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </button>

          </form>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">
    <div class="container">

      <div class="footer-top">

        <div class="footer-brand">

          <a href="#" class="logo">EduHome</a>

          <p class="section-text">
            It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its
            layout. The point of using Lorem Ipsum.
          </p>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Explore</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">About Us</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Upcoming Events</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Blog & News</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">FAQ Question</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Testimonial</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Privacy Policy</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Useful Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Contact Us</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Pricing Plan</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Instructor Profile</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">FAQ</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Popular Courses</span>
            </a>
          </li>

          <li>
            <a href="#" class="footer-link">
              <ion-icon name="chevron-forward" aria-hidden="true"></ion-icon>

              <span class="span">Terms & Conditions</span>
            </a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact Info</p>
          </li>

          <li class="footer-item">
            <ion-icon name="location-outline" aria-hidden="true"></ion-icon>

            <address class="footer-link">
              275 Quadra Street Victoria Road, New York
            </address>
          </li>

          <li class="footer-item">
            <ion-icon name="call" aria-hidden="true"></ion-icon>

            <a href="tel:+13647657839" class="footer-link">+ 1 (364) 765-7839</a>
          </li>

          <li class="footer-item">
            <ion-icon name="call" aria-hidden="true"></ion-icon>

            <a href="tel:+13647657840" class="footer-link">+ 1 (364) 765-7840</a>
          </li>

          <li class="footer-item">
            <ion-icon name="mail-outline" aria-hidden="true"></ion-icon>

            <a href="mailto:contact@eduhome.com" class="footer-link">contact@eduhome.com</a>
          </li>

        </ul>

      </div>

      <div class="footer-bottom">
        <p class="copyright">
          Copyright 2022 EduHome. All Rights Reserved by <a href="#" class="copyright-link">codewithsadee</a>
        </p>
      </div>

    </div>
  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="Back to top" data-back-top-btn>
    <ion-icon name="arrow-up"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="{{asset('frontend/assets/js/script.js')}}" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>