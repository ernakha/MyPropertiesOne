<p>Testing</p>
<div class="content">
    {!! $props->deskripsi !!}
</div>



<div class="container my-5">
    <h2 class="mb-4 text-center">{{ $props->judul }}</h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach($gambar as $img)
                <div class="swiper-slide">
                    <img src="{{ asset('storage/' . $img) }}" class="img-fluid dynamic-img" alt="Gambar Properti">
                </div>
            @endforeach
        </div>

        <!-- Pagination dan Navigasi -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<!-- Stylesheet Swiper -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- Swiper Script -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Dinamis CSS untuk gambar -->
<style>
    .swiper-container {
        width: 100%; /* Lebar slider penuh */
        max-width: 800px; /* Lebar maksimal 800px */
        margin: auto; /* Mengatur posisi slider agar berada di tengah */
    }

    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .dynamic-img {
        max-width: 100%;
        height: auto; /* Tinggi dinamis menyesuaikan gambar */
        object-fit: contain;
    }

    /* Styling navigasi panah */
    .swiper-button-next, .swiper-button-prev {
        width: 30px; /* Ukuran lebih kecil */
        height: 30px; /* Ukuran lebih kecil */
        color: #fff; /* Warna putih untuk panah */
        background-color: rgba(0, 0, 0, 0.5); /* Latar belakang semi-transparan */
        border-radius: 50%; /* Membuat panah menjadi lingkaran */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px; /* Ukuran teks lebih kecil */
    }

    /* Posisikan panah di tengah vertikal slider */
    .swiper-button-next {
        right: 10px; /* Jarak dari tepi kanan */
    }

    .swiper-button-prev {
        left: 10px; /* Jarak dari tepi kiri */
    }

    /* Styling pagination */
    .swiper-pagination {
        bottom: 10px; /* Jarak pagination dari bawah */
    }

    /* Ukuran titik pagination */
    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background-color: #fff;
        opacity: 0.7;
    }

    .swiper-pagination-bullet-active {
        background-color: #007bff; /* Warna aktif pagination */
    }
</style>

<script>
    // Inisialisasi Swiper
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 10,
        effect: 'slide',
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoHeight: true, // Menyesuaikan tinggi slider dengan gambar
    });
</script>