<?php
session_start();

// Fungsi Pemberishan Data Input
function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = cleanInput($_POST['nik']);
    $nama = cleanInput($_POST['nama']);
    $gender = cleanInput($_POST['gender']);
    
    $errors = [];

    // Validasi Dasar
    if (!ctype_digit($nik) || strlen($nik) != 16) {
        $errors[] = "NIK harus berupa 16 digit angka.";
    }

    // Cek duplikasi di dalam Sesi
    if (isset($_SESSION['temp_storage'])) {
        foreach ($_SESSION['temp_storage'] as $data_lama) {
            if ($data_lama['nik'] === $nik) {
                $errors[] = "Gagal: NIK ini sudah diinput sebelumnya.";
                break;
            }
        }
    }

    if (empty($errors)) {
        // Simpan ke Sesi
        $_SESSION['temp_storage'][] = [
            "nik" => $nik,
            "nama" => $nama,
            "gender" => $gender,
            "waktu" => date("H:i:s")
        ];
        
        // Redirect dengan status sukses
        header("Location: Index.html?status=success&nama=" . urlencode($nama));
        exit;
    } else {
        // Redirect dengan status error
        $msg = implode(", ", $errors);
        header("Location: Index.html?status=error&msg=" . urlencode($msg));
        exit;
    }
}
?>