<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Warga</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Tambah Data Warga</h2>
            <form method="post">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" required>

                <label>Nomor KK:</label>
                <input type="text" name="nomor_kk" required>

                <label>NIK:</label>
                <input type="text" name="nik" required>

                <label>Alamat:</label>
                <textarea name="alamat" required></textarea>

                <label>Status:</label>
                <select name="status">
                    <option value="Kepala Keluarga">Kepala Keluarga</option>
                    <option value="Anggota Keluarga">Anggota Keluarga</option>
                </select>

                <br><br>
                <input type="submit" name="simpan" value="Simpan">
            </form>
            <a href="index.php" class="link-kembali">← Ke
