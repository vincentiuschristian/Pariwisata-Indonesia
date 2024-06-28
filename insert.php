<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Koneksi ke database
    include "database/koneksi_database.php";

    // Ambil data dari form
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $tanggal = $_POST['tanggal'];
    $durasi = $_POST['durasi'];
    $orang = $_POST['jumpemesan'];

    $penginapan = isset($_POST['pelayanan']) && in_array('1000000', $_POST['pelayanan']) ? 1 : 0;
    $transportasi = isset($_POST['pelayanan']) && in_array('1200000', $_POST['pelayanan']) ? 1 : 0;
    $makanan = isset($_POST['pelayanan']) && in_array('500000', $_POST['pelayanan']) ? 1 : 0;

    $paket = $_POST['harga'];
    $jumlah = $_POST['jumtagihan'];

    $query = "INSERT INTO pesanan (nama, telepon, tanggal, durasi, orang, penginapan, transportasi, makan, paket, jumlah) 
              VALUES ('$nama', '$telepon', '$tanggal', '$durasi', '$orang', '$penginapan', '$transportasi', '$makanan', '$paket', '$jumlah')";

    if (mysqli_query($db, $query)) {
        echo "<script>alert('Data berhasil disimpan!');</script>";
    } else {
        echo "<script>alert('Error: " . $query . "<br>" . mysqli_error($db) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pendaftaran Paket Tiket</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <style>
        .content-section {
            margin-top: 10px;
            padding: 20px;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 16px;
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
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Pendaftaran Paket Tiket</a>
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
        <h1 class="mb-4">Form Pemesanan Paket Wisata</h1>
        <form id="booking-form" action="" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <!-- Nama Pemesan -->
                    <div class="form-group">
                        <label for="nama">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Pemesan"
                            required>
                    </div>
                    <!-- Tanggal Pemesanan -->
                    <div class="form-group">
                        <label for="tanggal">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <!-- Jumlah Pemesanan -->
                    <div class="form-group">
                        <label for="jumpemesan">Jumlah Pemesanan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="jumpemesan" name="jumpemesan"
                                placeholder="Jumlah Pemesan" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Orang</span>
                            </div>
                        </div>
                    </div>
                    <!-- Harga Paket -->
                    <div class="form-group">
                        <label for="harga">Harga Paket</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="harga" name="harga"
                                placeholder="Isi Harga Paket" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- No Telepon -->
                    <div class="form-group">
                        <label for="telepon">No Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon"
                            placeholder="Isi No HP / Telepon" required>
                    </div>
                    <!-- Durasi Pemesanan -->
                    <div class="form-group">
                        <label for="durasi">Durasi Pemesanan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="durasi" name="durasi"
                                placeholder="Isi durasi pemesanan" required>
                            <div class="input-group-append">
                                <span class="input-group-text">Hari</span>
                            </div>
                        </div>
                    </div>
                    <!-- Pelayanan Paket Perjalanan -->
                    <div class="form-group">
                        <label for="pelayanan">Pelayanan Paket Perjalanan</label>
                        <div class="d-flex flex-column">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" id="penginapan"
                                    value="1000000">
                                <label class="form-check-label" for="penginapan">Penginapan (Rp 1.000.000)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" id="transportasi"
                                    value="1200000">
                                <label class="form-check-label" for="transportasi">Transportasi (Rp 1.200.000)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="pelayanan[]" id="makanan"
                                    value="500000">
                                <label class="form-check-label" for="makanan">Makanan (Rp 500.000)</label>
                            </div>
                        </div>
                    </div>
                    <!-- Jumlah Tagihan -->
                    <div class="form-group">
                        <label for="jumtagihan">Jumlah Tagihan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="jumtagihan" name="jumtagihan" value="0"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Buttons -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" id="btnHitung" class="btn btn-secondary">Hitung</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
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
    <script>
        const penginapan = document.getElementById('penginapan');
        const transportasi = document.getElementById('transportasi');
        const makanan = document.getElementById('makanan');

        const harga = document.getElementById('harga');
        const jumpemesan = document.getElementById('jumpemesan');
        const jumtagihan = document.getElementById('jumtagihan');
        const durasi = document.getElementById('durasi');
        const btnHitung = document.getElementById('btnHitung');

        // Menghitung total biaya
        function hitungTotalBiaya() {
            let totalBiaya = 0;
            if (penginapan.checked) {
                totalBiaya += parseInt(penginapan.value);
            }
            if (transportasi.checked) {
                totalBiaya += parseInt(transportasi.value);
            }
            if (makanan.checked) {
                totalBiaya += parseInt(makanan.value);
            }
            harga.value = totalBiaya;
        }

        // Menghitung jumlah tagihan
        function hitungTagihan() {
            const hargaPaket = parseInt(harga.value);
            const durasiHari = parseInt(durasi.value);
            const jumlahPemesan = parseInt(jumpemesan.value);
            const totalBiaya = durasiHari * jumlahPemesan * hargaPaket;
            jumtagihan.value = totalBiaya;
        }

        // Listener perubahan checkbox
        penginapan.addEventListener('change', hitungTotalBiaya);
        transportasi.addEventListener('change', hitungTotalBiaya);
        makanan.addEventListener('change', hitungTotalBiaya);

        // Untuk hitung tagihan saat tombol di klik
        btnHitung.addEventListener('click', function () {
            hitungTotalBiaya();
            hitungTagihan();
        });

        // Mengatur nilai default untuk jumlah tagihan
        document.addEventListener('DOMContentLoaded', function () {
            jumtagihan.value = 0;
        });
        
        hitungTotalBiaya();
    </script>

</body>

</html>
