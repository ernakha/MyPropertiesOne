<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyPropertiesOne - Properties Seller Number One</title>

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
          <img src="{{ asset('frontend/assets/images/logo-brand3.png') }}" alt="MyPropertiesOne Logo" class="logo-img">
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
            <a href="#kota" class="navbar-link" data-nav-toggler>Kota</a>
          </li>

          <li class="navbar-item">
            <a href="#properti" class="navbar-link" data-nav-toggler>Properti</a>
          </li>

          <li class="navbar-item">
            <a href="#footer" class="navbar-link" data-nav-toggler>Kontak</a>
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

            <p class="section-subtitle">penjual properti nomor satu</p>

            <h2 class="h1 hero-title">MyPropertiesOne</h2>

            <p class="hero-text">
              Temukan Rumah yang Sesuai Gaya Hidup Anda. Jelajahi ribuan pilihan properti yang disesuaikan dengan kebutuhan Anda.
            </p>

            <a href="#properti" class="btn btn-primary">
              <span class="span">Cari Properti</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">

            <img src="{{asset('frontend/assets/images/hero-banner1.png')}}" width="500" height="500" loading="lazy" alt="hero image"
              class="w-100">

            <img src="{{asset('frontend/assets/images/hero-abs-01.png')}}" width="318" height="352" loading="lazy" aria-hidden="true"
              class="abs-img abs-img-1">

            <img src="{{asset('frontend/assets/images/hero-abs-02.png')}}" width="160" height="160" loading="lazy" aria-hidden="true"
              class="abs-img abs-img-2">

          </figure>

        </div>
      </section>

      <!-- 
        - #CATEGORY
      -->

      <section class="section category" id="kota" aria-label="category">
        <div class="container">

          <p class="section-subtitle">Kota-kota</p>

          <h2 class="h2 section-title">Di Indonesia</h2>

          <ul class="grid-list">
            @foreach ($kota as $item)
            <li>
              <div class="category-card">

                <div class="card-icon">
                  <ion-icon name="business-outline"></ion-icon>
                </div>

                <div>
                  <h3 class="h3 card-title">
                    <a href="#">{{$item->nama}}</a>
                  </h3>

                  <span class="card-meta">{{$item->properti_count}} Properti</span>
                </div>

              </div>
            </li>
            @endforeach
          </ul>

        </div>
      </section>

      <section class="section course" id="properti" aria-label="course"
        style="background-image: url('{{asset('frontend/assets/images/course-bg.jpg')}}')">
        <div class="container">

          <p class="section-subtitle">Rekomendasi</p>
          <h2 class="h2 section-title">Properti Terbaru</h2>

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
                  <span class="badge">{{$item -> kota ->nama}}</span>
                </div>

                <div class="card-content">
                  <ul class="card-meta-list">
                    <li class="card-meta-item">
                      <ion-icon name="bed-outline"></ion-icon>
                      <span class="card-meta-text">{{ $item->kt }} Kamar Tidur</span>
                    </li>
                    <li class="card-meta-item">
                      <ion-icon name="water-outline"></ion-icon>
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
                      <span class="span">Rp.{{ number_format($item->harga, 0, ',', '.') }}</span>
                    </div>
                    <div class="card-meta-item">
                      <ion-icon name="expand-outline"></ion-icon>
                      <span class="card-meta-text">{{ $item->lt }} m²</span>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            @endif
            @endforeach
          </ul>




          <a href="{{route('cari')}}" class="btn btn-primary">
            <span class="span">Lihat Semua Properti</span>

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </a>

        </div>
      </section>
    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer" id="footer">
    <div class="container">
      <div class="footer-bottom">
        <p class="copyright">
          Copyright <span id="currentYear" style="display: inline;""></span> MyPropertiesOne. Ada pertanyaan? <a href="#" class="copyright-link">Hubungi Kami</a>
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
  <script>
    // Mendapatkan tahun saat ini
    const currentYear = new Date().getFullYear();
    // Menyisipkan tahun ke elemen dengan id "currentYear"
    document.getElementById("currentYear").textContent = currentYear;
  </script>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>