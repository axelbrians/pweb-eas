<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard - TSHS</title>
    <meta charset="UTF-8">
    <meta name="author" content="Axel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		html, body {
            margin: 0;
            padding: 0;
        }
        .home-container {
            height: 100vh;
            width: 100%;
            padding: 0rem 12rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        .home-title {
            color: #FF4B35;
            font-size: 3em;
            font-weight: bold;
        }
        .orange-button {
            background-color: #FE705F;
            width: 50%;
            text-align: center;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
        }

        .orange-button:hover {
            background-color: #E46657;
            color: #fff;
            text-decoration: none;
        }
        .notifikasi {
            color: #FF4B35;
        }
        footer {
            margin-top: 250px;
            color: #FF4B35;
        }
	</style>
</head>
<body>
    <div class="home-container">
        <h2 class="home-title mb-5">Dashboard Admin</h2><br>
        <a class="orange-button mb-3" href="student_add.php">Tambah Siswa</a>
        <a class="orange-button mb-3" href="student_list.php">Lihat daftar siswa</a>
        <a class="orange-button mb-3" href="#">Tambah Guru</a>
        <a class="orange-button mb-3" href="#">Lihat daftar guru</a>
        <a class="orange-button mb-3" href="#">Tambah orang tua siswa</a>
        <a class="orange-button mb-3" href="#">Lihat daftar orang tua siswa</a>
        <a class="orange-button mb-3" href="#">Ubah slip pembayaran</a>
        <a class="orange-button mb-3" href="#">Cetak slip pembayaran</a>
        <br>
        <a class="orange-button mb-3" href="logout.php">Sign Out</a>

        <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "<p class='text-center notifikasi'>Pendaftaran siswa baru berhasil!</p>";
            } else {
                echo "<p class='text-center notifikasi'>Pendaftaran gagal!</p>";
            }
        ?>
    </p>
    <?php endif; ?>
    </div>

    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
