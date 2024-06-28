<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Web Pariwisata Indonesia</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <style>
    .content-section {
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="py-4 ps-5 bg-primary text-white">
    <div class="container">
      <h1>Pariwisata Indonesia</h1>
      <p>Wonderful Indonesia</p>
    </div>
  </header>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="insert.php">Pendaftaran Paket Tiket</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pesanan.php">Data Pesanan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content Section -->
  <div class="container content-section">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <!-- Card 1 -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="https://dr7f10k1l6bnm.cloudfront.net/wp-content/uploads/2023/05/photo3jpg-2-1.jpg"
                class="card-img-top" alt="Jimbaran" />
              <div class="card-body">
                <h5 class="card-title">Jimbaran</h5>
                <p class="card-text">
                  Teluk Jimbaran adalah pantai yang terkenal di Bali dan
                  merupakan salah satu pantai terbaik di Bali yang terletak di
                  wilayah barat daya.
                </p>
              </div>
            </div>
          </div>
          <!-- Card 2 -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img
                src="https://awsimages.detik.net.id/community/media/visual/2023/06/28/danay-kaolin-di-bangka-tengah-deni-wahyonodetiksumbagsel-1_169.jpeg?w=1200"
                class="card-img-top" alt="Danau Kaolin" />
              <div class="card-body">
                <h5 class="card-title">Danau Kaolin</h5>
                <p class="card-text">
                  Danau Kaolin seringkali disebut dengan istilah Camoi Aik
                  Biru (kolam biru). Danau ini terbentuk dari hasil galian
                  tamban yang berbentuk cekungan, lalu lambat laun terisi air.
                  Danau ini terlihat cantik dengan airnya yang berwarna biru
                  toska. Warna birunya ditimbulkan dari sisa mineral
                  pertambangan dan kaolin.
                </p>
              </div>
            </div>
          </div>
          <!-- Card 3 -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img
                src="https://v1.indonesia.travel/content/dam/indtravelrevamp/id-id/ide-liburan/6-aktivitas-seru-yang-wajib-dicoba-saat-ke-taman-nasional-bromo-tengger-semeru/bukit-cinta.jpg"
                class="card-img-top" alt="Gunung Bromo" />
              <div class="card-body">
                <h5 class="card-title">Gunung Bromo</h5>
                <p class="card-text">
                  Gunung Bromo terletak di Kabupaten Probolinggo. Gunung Bromo
                  memiliki ketinggian sekitar 2392 mdpl. Memiliki kawah yang
                  menjadi objek utama yang sering dikunjungi oleh wisatawan
                  asing maupun lokal.
                </p>
              </div>
            </div>
          </div>
          <!-- Card 4 -->
          <div class="col-md-6 mb-4">
            <div class="card">
              <img src="https://www.cimbniaga.co.id/content/dam/cimb/inspirasi/gili-meno.webp" class="card-img-top"
                alt="Gili Meno" />
              <div class="card-body">
                <h5 class="card-title">Gili Meno</h5>
                <p class="card-text">
                  Gili Meno adalah salah satu dari tiga pulau kecil, selain
                  Gili Trawangan dan Gili Air, yang menjadi kawasan wisata
                  bahari. Terdapat taman burung yang mempunyai koleksi
                  burung-burung langka dari Indonesia dan mancanegara.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Embedded Video -->
      <div class="col-md-4">
    <div class="card mb-3 text-center"> 
        <div class="card-header">
            Paket Wisata 1
        </div>
        <div class="card-body d-flex justify-content-center align-items-center"> 
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Iq_XlLKTea4" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <div class="card mb-3 text-center"> 
        <div class="card-header">
            Paket Wisata 2
        </div>
        <div class="card-body d-flex justify-content-center align-items-center">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TEXBgNVt19Q" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

    </div>

    <!-- Footer -->
    <footer class="modal-footer">
      <div class="container text-center">
        <p class="mb-0">
          &copy; 2024 Pariwisata Indonesia. All Rights Reserved.
        </p>
      </div>
    </footer>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>