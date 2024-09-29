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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">



    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">


    <!--
    - preload images
  -->
    <link rel="preload" as="image" href="{{ asset('frontend/assets/images/hero-banner.png') }}">
    <link rel="preload" as="image" href="{{ asset('frontend/assets/images/hero-abs-1.png') }}"
        media="min-width(768px)">
    <link rel="preload" as="image" href="{{ asset('frontend/assets/images/hero-abs-2.png') }}"
        media="min-width(768px)">

</head>

<body id="top" style="font-family: 'Urbanist', sans-serif;">
    <style>
        .bootstrap-only .carousel-item img {
            max-height: 500px;
            object-fit: cover;
        }

        /* Styling untuk header agar tetap di atas saat di-scroll */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

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
        }

        .property-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
        }

        /* Styling untuk lokasi properti */
        .property-location {
            font-size: 18px;
            color: #7f8c8d;
        }

        /* Styling untuk wrapper detail properti */
        .property-detail-wrapper {
            display: flex;
            flex-direction: column;
            gap: 30px;
            background-color: #f7f7f7;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.05);
        }

        .property-info-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: flex-start;
        }

        /* Properti info (kiri) */
        .property-info {
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Properti description (kanan) */
        .property-description {
            flex: 2;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #34495e;
        }

        .property-description h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #34495e;
        }

        /* Styling individual property detail items */
        .property {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .property strong {
            min-width: 120px;
            font-weight: 600;
            color: #34495e;
        }

        /* Styling untuk meta informasi */
        .property-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            background-color: #ecf0f1;
            padding: 15px;
            border-radius: 8px;
        }

        .property-meta p {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .property-meta strong {
            color: #2980b9;
        }

        /* Carousel styling */
        .carousel-item img {
            border-radius: 10px;
            object-fit: cover;
            max-height: 600px;
        }

        /* Carousel control button */
        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        /* Responsiveness */
        @media (width: 768px) {
            .property-info-wrapper {
                flex-direction: column;
            }

            .property-info,
            .property-description {
                width: 100%;
            }
        }

        .carousel-image {
            width: 100%;
            height: auto;
            max-height: 100px;
            /* Anda bisa menyesuaikan max-height agar gambar tidak terlalu besar */
            object-fit: cover;
            /* Menjaga proporsi gambar tanpa distorsi */
        }

        .carousel-item img {
            width: 100%;
            max-height: 500px;
            /* Tentukan tinggi maksimal box */
            object-fit: contain;
            /* Gambar tetap proporsional tanpa distorsi */
            background-color: #f0f0f0;
            /* Warna latar belakang untuk gambar yang lebih kecil */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Efek bayangan */
        }

        /* Carousel control button */
        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            top: 50%;
            /* Pastikan tombol kontrol berada di tengah secara vertikal */
            transform: translateY(-50%);
        }

        .carousel-control-prev {
            left: 15px;
        }

        .carousel-control-next {
            right: 15px;
        }

        .section {
            position: relative;
            /* Beri ruang untuk tombol */
        }

        h1 {
            position: relative;
            z-index: 1;
            /* Pastikan judul tetap di atas layer tombol */
        }

        .price-box {
            background-color: #ffdd57;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .price-box {
            display: inline-block;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
            margin-left: 10px;
            margin-top: 0px;
        }

        .price-label {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .property-meta {
            margin-top: 20px;
        }

        .property-meta p {
            margin: 5px 0;
        }

        #zoomContainer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #zoomImage {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
        }

        #closeZoom {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }

        /* Styling untuk form container */
        #contact-form {
            margin-top: 10px;
            /* Jarak antara tombol dan form */
            padding: 15px;
            /* Padding di dalam form */
            border: 1px solid #ccc;
            /* Garis batas */
            border-radius: 5px;
            /* Sudut membulat */
            background-color: #f9f9f9;
            /* Warna latar belakang */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Bayangan halus */
        }

        /* Styling untuk label */
        #contact-form label {
            display: block;
            /* Mengatur label menjadi blok */
            margin-bottom: 5px;
            /* Jarak di bawah label */
            font-weight: bold;
            /* Teks label menjadi tebal */
        }

        /* Styling untuk input */
        #contact-form input[type="text"] {
            width: 100%;
            /* Memperlebar input agar memenuhi lebar form */
            padding: 10px;
            /* Padding dalam input */
            margin-bottom: 15px;
            /* Jarak di bawah input */
            border: 1px solid #ccc;
            /* Garis batas input */
            border-radius: 5px;
            /* Sudut membulat */
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            /* Bayangan dalam */
        }

        /* Styling untuk button */
        #contact-form button {
            width: 100%;
            /* Memperlebar tombol agar memenuhi lebar form */
            padding: 10px;
            /* Padding dalam tombol */
            background-color: #007bff;
            /* Warna latar belakang tombol */
            color: white;
            /* Warna teks tombol */
            border: none;
            /* Menghilangkan garis batas */
            border-radius: 5px;
            /* Sudut membulat tombol */
            cursor: pointer;
            /* Menunjukkan bahwa tombol dapat diklik */
            font-size: 16px;
            /* Ukuran font tombol */
            transition: background-color 0.3s;
            /* Transisi untuk efek hover */
        }

        /* Efek hover pada tombol */
        #contact-form button:hover {
            background-color: #0056b3;
            /* Warna latar belakang saat hover */
        }

        #otp-confirmation-form {
            background-color: #f9f9f9;
            /* Latar belakang form */
            border: 1px solid #ddd;
            /* Garis batas */
            border-radius: 5px;
            /* Sudut melengkung */
            padding: 20px;
            /* Ruang dalam form */
            margin-top: 20px;
            /* Jarak dari elemen sebelumnya */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Bayangan */
        }

        #otp-confirmation-form label {
            display: block;
            /* Membuat label dalam satu baris */
            margin-bottom: 5px;
            /* Jarak bawah label */
            font-weight: bold;
            /* Tebal untuk label */
        }

        #otp-confirmation-form input[type="text"] {
            width: 100%;
            /* Mengatur lebar input sesuai lebar form */
            padding: 10px;
            /* Ruang dalam input */
            margin-bottom: 15px;
            /* Jarak bawah input */
            border: 1px solid #ccc;
            /* Garis batas input */
            border-radius: 4px;
            /* Sudut melengkung input */
            font-size: 16px;
            /* Ukuran font */
        }

        #otp-confirmation-form button {
            background-color: #007bff;
            /* Warna latar belakang button */
            color: #fff;
            /* Warna teks button */
            padding: 10px;
            /* Ruang dalam button */
            border: none;
            /* Hilangkan garis batas */
            border-radius: 4px;
            /* Sudut melengkung button */
            cursor: pointer;
            /* Kursor pointer saat hover */
            font-size: 16px;
            /* Ukuran font button */
            width: 100%;
            /* Mengatur lebar button sama dengan input */
        }

        #otp-confirmation-form button:hover {
            background-color: #0056b3;
            /* Warna latar belakang button saat hover */
        }
    </style>

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
                        <a href="/#home" class="navbar-link" data-nav-toggler>Beranda</a>
                    </li>

                    <li class="navbar-item">
                        <a href="/#kota" class="navbar-link" data-nav-toggler>Kota</a>
                    </li>

                    <li class="navbar-item">
                        <a href="#properti" class="navbar-link active" data-nav-toggler>Properti</a>
                    </li>

                    <li class="navbar-item">
                        <a href="#footer" class="navbar-link" data-nav-toggler>Kontak</a>
                    </li>

                </ul>

            </nav>

            <div class="header-actions">

                <button class="header-action-btn" onclick="window.history.back();" data-search-toggler>
                    <ion-icon name="arrow-back-outline"></ion-icon>
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
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <section class="section course" id="properti" aria-label="course"
                style="background-image: url('{{ asset('frontend/assets/images/course-bg.jpg') }}')">

                <div class="container">

                    <h1>{{ $properti->judul }}</h1>
                    <br>
                    <p class="property-location">{{ $properti->alamat }}</p>

                    <!-- Carousel Section -->
                    <div id="propertyCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php $gambarArray = json_decode($properti->gambar); @endphp
                            @if ($gambarArray && count($gambarArray) > 0)
                            @foreach ($gambarArray as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image) }}"
                                    class="d-block w-100 carousel-image" alt="{{ $properti->judul }}">
                            </div>
                            @endforeach
                            @else
                            <div class="carousel-item active">
                                <img src="path_to_placeholder_image.jpg" class="d-block w-100 carousel-image"
                                    alt="No Image Available">
                            </div>
                            @endif
                        </div>

                        <!-- Carousel controls -->
                        <a class="carousel-control-prev" href="#propertyCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#propertyCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                    <div class="property-info-wrapper">
                        <div class="property-info">
                            <h2>{{ $properti->judul }}</h2>
                            @if (session('otp_verified'))
                            <!-- Display phone number only if OTP is verified -->

                            <p class="property"><strong>Telepon:</strong><a href="https://wa.me/{{ $properti->notelp }}">{{ $properti->notelp }}</a></p>
                            @else
                            <!-- Display the contact link only if OTP is not verified -->
                            <p class="property"><strong>Telepon:</strong>
                                <a href="#" class="property" id="toggle-contact-form">Lihat Kontak</a>
                            </p>
                            @endif
                            <div id="contact-form" style="display: none;"> <!-- Form disembunyikan secara default -->
                                <form id="otp-form" method="POST">
                                    @csrf
                                    <label for="phone">Masukkan Nomor Telepon Anda:</label>
                                    <input type="text" id="phone" name="phone" placeholder="6281xxxxxx"
                                        required>
                                    <button type="submit" class="btn bt-primary">Kirim OTP</button>
                                </form>
                            </div>

                            <div id="otp-confirmation-form" style="display: none;">
                                <!-- Form konfirmasi OTP disembunyikan secara default -->
                                <form action="{{ route('verify.otp') }}" method="POST">
                                    @csrf
                                    <label for="phone-confirmation">Masukkan Nomor Telepon:</label>
                                    <input type="text" id="phone-confirmation" name="phone" required readonly>

                                    <label for="otp">Masukkan OTP:</label>
                                    <input type="text" id="otp" name="otp" required>

                                    <button type="submit">Verifikasi OTP</button>
                                </form>
                            </div>
                            <br>
                            <p class="property"><strong>Lokasi:</strong> {{ $properti->alamat }}</p>
                            <p class="property"><strong>Harga:</strong><span
                                    class="price-box">Rp.{{ number_format($properti->harga, 0, ',', '.') }}</span></p>
                            <div class="property-meta">
                                @if($properti->lb)
                                <p><strong>Luas Bangunan:</strong> {{ $properti->lb }} m²</p>
                                @endif
                                @if($properti->lt)
                                <p><strong>Luas Tanah:</strong> {{ $properti->lt }} m²</p>
                                @endif
                                @if($properti->kt)
                                <p><strong>Kamar Tidur:</strong> {{ $properti->kt }}</p>
                                @endif
                                @if($properti->km)
                                <p><strong>Kamar Mandi:</strong> {{ $properti->km }}</p>
                                @endif
                                @if($properti->garasi)
                                <p><strong>Garasi:</strong> {{ $properti->garasi }}</p>
                                @endif
                                @if($properti->sertifikat && $properti->sertifikat->kode)
                                <p><strong>Sertifikat:</strong> {{ $properti->sertifikat->kode }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="property-description">
                            <h2>Deskripsi Properti</h2>
                            <p>{!! $properti->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </article>
    </main>
    <!-- Fullscreen Image Zoom -->
    <div id="zoomContainer"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:1000;">
        <span id="closeZoom"
            style="position:absolute; top:20px; right:20px; font-size:40px; color:white; cursor:pointer;">&times;</span>
        <img id="zoomImage" src="" alt="Zoomed Image" style="max-width:90%; max-height:90%;">
    </div>

    <footer class="footer" id="footer">
        <div class="container">
            <div class="footer-bottom">
                <p class="copyright">
                    Copyright <span id="currentYear" style="display: inline;"></span> MyPropertiesOne. Ada pertanyaan? Hubungi Kami di <a href="https://wa.me/6283876767059" class="copyright-link" target="_blank">WhatsApp</a> atau <a href="https://www.instagram.com/mypropertiesone/" class="copyright-link" target="_blank"> Instagram</a>
                </p>
            </div>
        </div>
    </footer>

    <a href="#top" class="back-top-btn" aria-label="Back to top">
        <ion-icon name="arrow-up"></ion-icon>
    </a>

    <script src="{{ asset('frontend/assets/js/script.js') }}" defer></script>
    <script>
        document.getElementById('toggle-contact-form').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah aksi default dari link
            var form = document.getElementById('contact-form');
            form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none";
        });

        document.getElementById('otp-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah pengiriman form default

            var phone = document.getElementById('phone').value;

            // Mengirim data menggunakan AJAX
            fetch('{{ route("send.otp") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        phone: phone
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Tampilkan form konfirmasi OTP
                        document.getElementById('contact-form').style.display =
                            'none'; // Sembunyikan form pengiriman OTP
                        document.getElementById('otp-confirmation-form').style.display =
                            'block'; // Tampilkan form konfirmasi OTP
                        document.getElementById('phone-confirmation').value = data
                            .phone; // Masukkan nomor telepon ke form konfirmasi
                        alert(data.message); // Tampilkan pesan keberhasilan
                    } else {
                        alert('Gagal mengirim OTP: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, silakan coba lagi.');
                });
        });
    </script>
    <script>
        // Mendapatkan tahun saat ini
        const currentYear = new Date().getFullYear();
        document.getElementById("currentYear").textContent = currentYear;
    </script>
    <script>
        // Script to handle image click for zoom effect
        document.addEventListener('DOMContentLoaded', function() {
            const carouselImages = document.querySelectorAll('.carousel-item img'); // Select all carousel images
            const zoomContainer = document.getElementById('zoomContainer');
            const zoomImage = document.getElementById('zoomImage');
            const closeZoom = document.getElementById('closeZoom');

            // Function to display the zoomed image in fullscreen
            carouselImages.forEach(function(image) {
                image.addEventListener('click', function() {
                    zoomImage.src = this
                        .src; // Set the zoom image source to the clicked image source
                    zoomContainer.style.display = 'flex'; // Show the zoom container
                });
            });

            // Function to close the zoomed image when "X" is clicked
            closeZoom.addEventListener('click', function() {
                zoomContainer.style.display = 'none'; // Hide the zoom container
            });

            // Close the zoomed image when clicking outside the image
            zoomContainer.addEventListener('click', function(e) {
                if (e.target !== zoomImage) {
                    zoomContainer.style.display = 'none'; // Hide the zoom container
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>