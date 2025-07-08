<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM warga WHERE id=$id");
$d = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Edit Data Warga</h2>
        <form method="post">
            <label>Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($d['nama_lengkap']) ?>" required>

            <label>Nomor KK:</label>
            <input type="text" name="nomor_kk" value="<?= htmlspecialchars($d['nomor_kk']) ?>" required>

            <label>NIK:</label>
            <input type="text" name="nik" value="<?= htmlspecialchars($d['nik']) ?>" required>

            <label>Alamat:</label>
            <textarea name="alamat" required><?= htmlspecialchars($d['alamat']) ?></textarea>

            <label>Status:</label>
            <select name="status">
                <option value="Kepala Keluarga" <?= $d['status'] == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
                <option value="Anggota Keluarga" <?= $d['status'] == 'Anggota Keluarga' ? 'selected' : '' ?>>Anggota Keluarga</option>
            </select>

            <br><br>
            <input type="submit" name="update" value="Simpan Perubahan">
        </form>
        <a href="index.php" class="link-kembali">← Kembali</a>
    <
