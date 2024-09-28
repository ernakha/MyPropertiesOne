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
  <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon-1.png') }}">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!--
    - preload images
  -->
  <link rel="preload" as="image" href="{{ asset('frontend/assets/images/hero-banner.png') }}">
  <link rel="preload" as="image" href="{{ asset('frontend/assets/images/hero-abs-1.png') }}"
    media="min-width(768px)">
  <link rel="preload" as="image" href="{{ asset('frontend/assets/images/hero-abs-2.png') }}"
    media="min-width(768px)">

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

    .offcanvas {
      position: fixed;
      top: 0;
      right: -100%;
      width: 300px;
      height: 100%;
      background-color: white;
      box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
      transition: right 0.3s ease;
      z-index: 1000;
      padding: 20px;
    }

    .offcanvas-content {
      display: flex;
      flex-direction: column;
    }

    .offcanvas .btn-close {
      position: absolute;
      /* Atur posisi absolut */
      top: 10px;
      /* Jarak dari atas */
      right: 10px;
      /* Jarak dari kanan */
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      z-index: 1;
      /* Pastikan tombol di atas konten lainnya */
    }


    .offcanvas.active {
      right: 0;
    }

    .filter-group {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .filter-item {
      display: flex;
      flex-direction: column;
    }

    .form-select,
    .form-input {
      padding: 8px;
      font-size: 14px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 100%;
    }
  </style>

  <!--
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="#" class="logo">
          <img src="{{ asset('frontend/assets/images/logo-brand3.png') }}" alt="MyPropertiesOne Logo"
            class="logo-img">
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
            <a href="#home" class="navbar-link" data-nav-toggler>Beranda</a>
          </li>

          <li class="navbar-item">
            <a href="#kotaa" class="navbar-link" data-nav-toggler>Kota</a>
          </li>

          <li class="navbar-item">
            <a href="{{route('cari')}}" class="navbar-link" data-nav-toggler>Properti</a>
          </li>

          <li class="navbar-item">
            <a href="#footer" class="navbar-link" data-nav-toggler>Kontak</a>
          </li>

        </ul>

      </nav>

      <div class="header-actions">

        <button class="header-action-btn" id="filterBtn" aria-label="Open filter">
          <ion-icon name="search-outline"></ion-icon>
        </button>


        <button class="header-action-btn nav-open-btn" aria-label="Open menu" data-nav-toggler>
          <ion-icon name="menu-outline"></ion-icon>
        </button>

      </div>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>

  <main>
    <article>

      <!--
        - #HERO
      -->

      <section class="hero" id="home" aria-label="hero"
        style="background-image: url('{{ asset('frontend/assets/images/hero-bg.jpg') }}')">
        <div class="container">

          <!-- Off-canvas filter -->
          <div class="offcanvas" id="filterOffcanvas">
            <div class="offcanvas-content">
              <button class="btn btn-close" id="closeOffcanvas">
                <ion-icon name="close-outline"></ion-icon>
              </button>

              <h3>Filter Properti</h3>

              <!-- Filter Form -->
              <form id="filterForm" method="GET" action="{{ route('properti.search') }}">
                <div class="filter-group">
                  <div class="filter-item">
                    <label for="keyword">Keyword</label>
                    <input type="text" name="keyword" value="{{ old('keyword', '') }}"
                      id="keyword" class="form-input" placeholder="Masukkan keyword...">
                  </div>
                  <div class="filter-item">
                    <label for="kota">Kota</label>
                    <select name="kota" id="kota" class="form-select">
                      <option value="">Semua Kota</option>
                      @foreach ($kota as $city)
                      <option value="{{ $city->id }}">{{ $city->nama }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="filter-item">
                    <label for="jumlahKamar">Jumlah Kamar</label>
                    <select name="jumlahKamar" id="jumlahKamar" class="form-select">
                      <option value=""> Pilih Jumlah Kamar</option>
                      <option value="1"> >=1</option>
                      <option value="2"> >=2</option>
                      <option value="3"> >=3</option>
                      <option value="4"> >=4</option>
                      <option value="5"> >=5</option>
                    </select>
                  </div>

                  <div class="filter-item">
                    <label for="luasTanah">Luas Tanah</label>
                    <select name="luasTanah" id="luasTanah" class="form-select">
                      <option value=""> Pilih Luas Tanah</option>
                      <option value="1">
                        < 50 m&#178;</option>
                      <option value="1">
                        50 m&#178;</option>
                      <option value="2">
                        100 m&#178;</option>
                      <option value="3">
                        200 m&#178;</option>
                      <option value="4">
                        300 m&#178;</option>
                      <option value="5">
                        400 m&#178;</option>
                      <option value="5">
                        500 m&#178;</option>
                      <option value="5">
                        > 500 m&#178;</option>
                    </select>
                  </div>

                  <div class="filter-item">
                    <label for="minHarga">Harga Minimum</label>
                    <select name="minHarga" id="minHarga" class="form-select">
                      <option value=""> Pilih Harga Minimum</option>
                      <option value="1">
                        <= 500 Juta</option>
                      <option value="2">
                        <= 1 Milyar</option>
                      <option value="3">
                        <= 10 Milyar</option>
                      <option value="4">
                        <= 20 Milyar</option>
                      <option value="5">
                        <= 50 Milyar</option>
                      <option value="5">
                        <= 100 Milyar</option>
                    </select>
                  </div>

                  <div class="filter-item">
                    <label for="maxHarga">Harga Maksimum</label>
                    <select name="maxHarga" id="maxHarga" class="form-select">
                      <option value=""> Pilih Harga Maksimum</option>
                      <option value="1">
                        <= 500 Juta</option>
                      <option value="2">
                        <= 1 Milyar</option>
                      <option value="3">
                        <= 10 Milyar</option>
                      <option value="4">
                        <= 20 Milyar</option>
                      <option value="5">
                        <= 50 Milyar</option>
                      <option value="5">
                        <= 100 Milyar</option>
                    </select>
                  </div>

                  <div class="filter-item">
                    <button type="submit" class="btn btn-primary" style="display: block; margin: auto;">Cari</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="hero-content">

            <p class="section-subtitle">penjual properti nomor satu</p>

            <h2 class="h1 hero-title">MyPropertiesOne</h2>

            <p class="hero-text">
              Temukan Rumah yang Sesuai Gaya Hidup Anda. Jelajahi ribuan pilihan properti yang disesuaikan
              dengan kebutuhan Anda.
            </p>

            <a href="{{ route('cari') }}" class="btn btn-primary">
              <span class="span">Cari Properti</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>

          <figure class="hero-banner">

            <img src="{{ asset('frontend/assets/images/hero-banner1.png') }}" width="500"
              height="500" loading="lazy" alt="hero image" class="w-100">

            <img src="{{ asset('frontend/assets/images/hero-abs-01.png') }}" width="318"
              height="352" loading="lazy" aria-hidden="true" class="abs-img abs-img-1">

            <img src="{{ asset('frontend/assets/images/hero-abs-02.png') }}" width="160"
              height="160" loading="lazy" aria-hidden="true" class="abs-img abs-img-2">

          </figure>

        </div>
      </section>

      <!--
        - #CATEGORY
      -->

      <section class="section category" id="kotaa" aria-label="category">
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
                    <a href="#">{{ $item->nama }}</a>
                  </h3>

                  <span class="card-meta">{{ $item->properti_count }} Properti</span>
                </div>

              </div>
            </li>
            @endforeach
          </ul>

        </div>
      </section>

      <section class="section course" id="properti" aria-label="course"
        style="background-image: url('{{ asset('frontend/assets/images/course-bg.jpg') }}')">
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
              <a href="{{ route('detail', ['slug' => $item->slug]) }}" class="card-link">
                <div class="course-card">
                  <figure class="card-banner">
                    <img src="{{ asset('storage/' . $gambarArray[0]) }}"
                      class="img-fluid dynamic-img card-image" alt="Gambar Properti"
                      loading="lazy">
                  </figure>

                  <div class="card-content" style="display: flex; flex-direction: column;">
                    <!-- Bagian harga dan luas tanah (lt) dipindah ke atas -->
                    <div class="card-meta-list" style="margin-bottom: 10px;"> <!-- Adjust spacing here -->
                      @if($item->harga)
                      <div class="card-price" style="font-size: 1.5rem; font-weight: bold; margin-bottom: 5px; margin-right: 150px;">
                        <span class="span">Rp.{{ number_format($item->harga, 0, ',', '.') }}</span>
                      </div>
                      @endif
                      @if($item->lt)
                      <div class="card-meta-item" style="display: flex; align-items: center;">
                        <ion-icon name="expand-outline" style="margin-right: 5px;"></ion-icon>
                        <span class="card-meta-text">{{ $item->lt }} m²</span>
                      </div>
                      @endif
                    </div>

                    <h3 class="h3" style="margin-bottom: 5px;"> <!-- Adjust spacing here -->
                      {{ Str::limit($item->judul, 20) }}
                      @if($item->kota && $item->kota->nama)
                      {{ $item->kota->nama }}
                      @endif
                    </h3>

                    @if($item->alamat)
                    <div class="rating-wrapper" style="margin-bottom: 15px;"> <!-- Adjust spacing here -->
                      <span class="rating-text">{{ $item->alamat }}</span>
                    </div>
                    @endif

                    <!-- Pindahkan kt dan km ke bagian bawah -->
                    <ul class="card-footer" style="margin-top: auto;"> <!-- Make this section grow to fill space -->
                      <li class="card-meta-item">
                        @if($item->kt)
                        <ion-icon name="bed-outline" style="margin-right: 5px;"></ion-icon>
                        <span class="card-meta-text">{{ $item->kt }} Kamar Tidur</span>
                        @endif
                      </li>
                      <li class="card-meta-item">
                        @if($item->km)
                        <ion-icon name="water-outline" style="margin-right: 5px;"></ion-icon>
                        <span class="card-meta-text">{{ $item->km }} Kamar Mandi</span>
                        @endif
                      </li>
                    </ul>
                  </div>

                </div>
              </a>
            </li>
            @else
            <li>
              <div class="empty-space" style="height: 1000px;"></div> <!-- Menjaga ruang kosong -->
            </li>
            @endif
            @endforeach
          </ul>
          <a href="{{ route('cari') }}" class="btn btn-primary">
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
          Copyright <span id="currentYear" style="display: inline;"></span> MyPropertiesOne. Ada
          pertanyaan? <a href=" #" class="copyright-link">Hubungi Kami</a>
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
  <script src="{{ asset('frontend/assets/js/script.js') }}" defer></script>
  <script>
    const filterBtn = document.getElementById('filterBtn');
    const filterOffcanvas = document.getElementById('filterOffcanvas');
    const closeOffcanvas = document.getElementById('closeOffcanvas');

    // Fungsi untuk membuka offcanvas
    filterBtn.addEventListener('click', function() {
      filterOffcanvas.classList.add('active');
    });

    // Fungsi untuk menutup offcanvas
    closeOffcanvas.addEventListener('click', function() {
      filterOffcanvas.classList.remove('active');
    });

    // Menutup offcanvas jika mengklik di luar area
    window.addEventListener('click', function(event) {
      if (event.target === filterOffcanvas) {
        filterOffcanvas.classList.remove('active');
      }
    });

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