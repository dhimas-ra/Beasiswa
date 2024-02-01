<?php
    session_start();
    if($_SESSION['level']=="") {
        header("location:login.php?pesan=anda_belum_login");
    }

    include 'koneksi.php';
    $username=$_SESSION['username'];
    $query = "SELECT * FROM user WHERE username='username'";
    $result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center bg-light">
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="#">Ceritanya<span>Logo</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto active" href="beasiswa.php">Beasiswa</a></li>
                    <li class="dropdown">
                        <?php 
                            $user = mysqli_query($koneksi, "select * from user where username='$username'");
                            while($data = mysqli_fetch_assoc($user)) {
                        ?>
                        <a class="nav-link scrollto" href="#">

                            <span><?php echo $data['nama_lengkap'];?></span>

                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <?php
                            }
                        ?>
                        <ul>
                            <li>
                                <a href="identitas.php">Profile</a>
                            </li>
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>

            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <section class="mt-3">
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Log Out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin Mau Keluar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="logout.php" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>
        <div>

            <h3 class="text-center">Beasiswa</h3>

            <div justify-content-center align-items-center>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Jenis Beasiswa</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Pendaftaran</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false">Hasil</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <p>1. Beasiswa Prestasi</p>
                        <p>2. Beasiswa Tidak Mampu</p>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form action="proses_pendaftaran.php" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Agus Suhandana" required>
                                <label for="nama">Nama</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com">
                                <label for="email">Email address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="no_hp" name="no_hp" pattern="[0-9]+"
                                    placeholder="089172821" required>
                                <label for="no_hp">Nomor Hp</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select class="form-select" id="semester" name="semester"
                                    aria-label="Floating label select example" required>
                                    <option selected>Open this select menu</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <label for="semester">Semester Saat Ini</label>
                            </div>
                            <?php
                            $ipk =3.4;
                            ?>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="ipk" name="ipk" value="<?php echo $ipk; ?>"
                                    readonly>
                                <label for="ipk">IPK Terakhir</label>
                            </div>

                            <?php
                            // Asumsi IPK dari sistem (ganti sesuai asumsi yang diberikan)
                            $ipk = 3.4; 
                            if ($ipk >= 3) {
                                echo '<div class="form-floating mb-3">
                                <select class="form-select" id="beasiswa" name="beasiswa" aria-label="Floating label select example" required>
                                <option selected>Open this select menu</option>
                                <option value="1">1. Beas</option>
                                <option value="2">2</option>
                            </select>
                            <label for="beasiswa">Pilihan Beasiswa</label>
                            </div>';
                                echo '<div class=" mb-3">
                                <label for="berkas">Upload Berkas</label>
                                <input class="form-control" type="file" id="berkas">
                                
                            </div>';
                            } else {
                                echo '<p>Maaf, IPK Anda tidak memenuhi syarat untuk mendaftar beasiswa.</p>';
                            }
                            ?>

                            <input type="submit" value="Daftar">
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <h3 class="text-center">Hasil Pendaftaran Beasiswa</h3>
                        <?php
                        if (isset($_GET['nama']) && isset($_GET['email']) && isset($_GET['no_hp']) && isset($_GET['semester']) && isset($_GET['beasiswa']) && isset($_GET['status_ajuan'])) {
                            $nama = $_GET['nama'];
                            $email = $_GET['email'];
                            $no_hp = $_GET['no_hp'];
                            $semester = $_GET['semester'];
                            $beasiswa = $_GET['beasiswa'];
                            $status_ajuan = $_GET['status_ajuan'];

                            echo "<p>Nama: {$nama}</p>";
                            echo "<p>Email: {$email}</p>";
                            echo "<p>Nomor HP: {$no_hp}</p>";
                            echo "<p>Semester Saat Ini: {$semester}</p>";
                            echo "<p>Pilihan Beasiswa: {$beasiswa}</p>";
                            echo "<p>Status Ajuan: {$status_ajuan}</p>";
                        } else {
                            echo "<p>Data pendaftaran tidak ditemukan.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</html>