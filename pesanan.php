<?php
// Koneksi ke database
include "database/koneksi_database.php";

// Menghapus data
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM pesanan WHERE id = $delete_id";
    if (mysqli_query($db, $delete_query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'pesanan.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($db) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
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
                        <a class="nav-link" href="insert.php">Pendaftaran Paket Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Data Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5">Data Pesanan</h1>
        <div class="mb-2">
            <button onclick="exportToJson()" class="btn btn-primary mb-2">Export to JSON</button>
        </div>
        <table id="data" class="display table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Tanggal</th>
                    <th>Durasi</th>
                    <th>Orang</th>
                    <th>Penginapan</th>
                    <th>Transportasi</th>
                    <th>Makan</th>
                    <th>Paket</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM pesanan ORDER BY id DESC";
                $result = mysqli_query($db, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['telepon'] . "</td>";
                    echo "<td>" . $row['tanggal'] . "</td>";
                    echo "<td>" . $row['durasi'] . "</td>";
                    echo "<td>" . $row['orang'] . "</td>";
                    echo "<td>" . ($row['penginapan'] ? 'Ya' : 'Tidak') . "</td>";
                    echo "<td>" . ($row['transportasi'] ? 'Ya' : 'Tidak') . "</td>";
                    echo "<td>" . ($row['makan'] ? 'Ya' : 'Tidak') . "</td>";
                    echo "<td>" . $row['paket'] . "</td>";
                    echo "<td>" . $row['jumlah'] . "</td>";
                    echo "<td>
                        <a href='paket_edit.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                        <a href='pesanan.php?delete_id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="modal-footer">
        <div class="container text-center">
            <p class="mb-0">
                &copy; 2024 Pariwisata Indonesia. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script>
        /* Export Table */
        $(document).ready(function () {
            var table = $('#data').DataTable({
                responsive: true,
                paging: true,
                info: false,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ]
            });
        });


        /* Export Table to JSON */
        function exportToJson() {
            var tableData = [];
            $('#data tbody tr').each(function (row, tr) {
                tableData[row] = {
                    "nama": $(tr).find('td:eq(0)').text(),
                    "telepon": $(tr).find('td:eq(1)').text(),
                    "tanggal": $(tr).find('td:eq(2)').text(),
                    "durasi": $(tr).find('td:eq(3)').text(),
                    "orang": $(tr).find('td:eq(4)').text(),
                    "penginapan": $(tr).find('td:eq(5)').text(),
                    "transportasi": $(tr).find('td:eq(6)').text(),
                    "makan": $(tr).find('td:eq(7)').text(),
                    "paket": $(tr).find('td:eq(8)').text(),
                    "jumlah": $(tr).find('td:eq(9)').text()
                }
            });

            const jsonData = JSON.stringify(tableData);
            const blob = new Blob([jsonData], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const downloadLink = document.createElement('a');
            downloadLink.download = 'datawisata.json';
            downloadLink.href = url;
            downloadLink.click();
        }
    </script>
</body>

</html>