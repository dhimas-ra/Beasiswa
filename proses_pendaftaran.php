<?php
// Memeriksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $no_hp = $_POST["no_hp"];
    $semester = $_POST["semester"];

    // Memeriksa apakah IPK memenuhi syarat
    $ipk = 3.4; // Asumsi IPK dari sistem
    if ($ipk >= 3) {
        $beasiswa = "Beasiswa Prestasi"; // Asumsi beasiswa yang dipilih jika IPK memenuhi syarat
        $status_ajuan = "Belum di verifikasi";

        // Memeriksa apakah ada berkas yang diunggah
        if (isset($_FILES['berkas'])) {
            $file_name = $_FILES['berkas']['name'];
            $file_tmp = $_FILES['berkas']['tmp_name'];
            move_uploaded_file($file_tmp, "uploads/" . $file_name);
        }
        
        // Redirect ke halaman hasil pendaftaran
        header("Location: beasiswa.php?nama={$nama}&email={$email}&no_hp={$no_hp}&semester={$semester}&beasiswa={$beasiswa}&status_ajuan={$status_ajuan}");
        exit();
    } else {
        // Redirect kembali ke halaman formulir jika IPK tidak memenuhi syarat
        header("Location: beasiswa.php");
        exit();
    }
}
?>