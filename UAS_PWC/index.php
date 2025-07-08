<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Warga RT</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Daftar Warga RT</h2>
        <a href="tambah.php">+ Tambah Warga</a><br><br>

        <form method="get">
            <input type="text" name="cari" placeholder="Cari nama..." value="<?= isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : '' ?>">
            <button type="submit">Cari</button>
        </form>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No KK</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $where = "";

            if (!empty($_GET['cari'])) {
                $cari = mysqli_real_escape_string($conn, $_GET['cari']);
                $where = "WHERE nama_lengkap LIKE '%$cari%'";
            }

            $query = "SELECT * FROM warga $where";
            $data = mysqli_query($conn, $query);

            if (!$data) {
                echo "<tr><td colspan='7'>Query error: " . mysqli_error($conn) . "</td></tr>";
            } elseif (mysqli_num_rows($data) == 0) {
                echo "<tr><td colspan='7'>Tidak ada data ditemukan.</td></tr>";
            } else {
                while ($d = mysqli_fetch_assoc($data)) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $d['nama_lengkap'] ?></td>
                    <td><?= $d['nomor_kk'] ?></td>
                    <td><?= $d['nik'] ?></td>
                    <td><?= $d['alamat'] ?></td>
                    <td><?= $d['status'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
                        <a href="hapus.php?id=<?= $d['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php 
                }
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
