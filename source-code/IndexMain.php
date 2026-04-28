<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kependudukan - Sesi</title>
    <link rel="stylesheet" href="Index.css">
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Penduduk Baru</h2>
        
        <form id="formPendaftaran" action="Index.php" method="POST">
            <div class="form-group">
                <label>NIK (16 Digit):</label>
                <input type="text" name="nik" id="nik" maxlength="16" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap:</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <select name="gender" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Simpan Data</button>
        </form>

        <div id="confirmation-area" style="margin-top: 25px; border-top: 2px dashed #ccc; padding-top: 20px;">
            <?php
            // 1. Cek jika ada status kiriman dari URL
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'success') {
                    echo "<div class='error-box' style='background:#d4edda; color:#155724; border:1px solid #c3e6cb; padding:10px; border-radius:5px;'>
                            <strong>Berhasil!</strong> Data " . htmlspecialchars($_GET['nama']) . " telah disimpan di sesi.
                            </div>";
                } else {
                    echo "<div class='error-box' style='background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:10px; border-radius:5px;'>
                            <strong>Kesalahan:</strong> " . htmlspecialchars($_GET['msg']) . "
                            </div>";
                }
            }

            // 2. Menampilkan Data Terakhir yang ada di memori Sesi
            if (isset($_SESSION['temp_storage']) && !empty($_SESSION['temp_storage'])) {
                // Mengambil data paling baru (indeks terakhir)
                $last_data = end($_SESSION['temp_storage']);
                echo "<div style='margin-top:20px; padding:15px; background:#f9f9f9; border-radius:8px;'>
                        <p style='font-weight:bold; margin-bottom:10px; border-bottom:1px solid #ddd;'>Informasi Data Diterima:</p>
                        <table style='width:100%; font-size:14px; color:#444;'>
                            <tr><td><strong>NIK</strong></td><td>: {$last_data['nik']}</td></tr>
                            <tr><td><strong>Nama</strong></td><td>: {$last_data['nama']}</td></tr>
                            <tr><td><strong>Gender</strong></td><td>: {$last_data['gender']}</td></tr>
                            <tr><td><strong>Waktu</strong></td><td>: {$last_data['waktu']} WIB</td></tr>
                        </table>
                        <p style='font-size:11px; color:orange; margin-top:10px;'>*Data ini tersimpan sementara di memori browser.</p>
                        </div>";
            }
            ?>
        </div>
    </div>
    
    <script src="Script.js"></script>
</body>
</html>