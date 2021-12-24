<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Siswa Baru</title>
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
        .home-title {
            color: #FF4B35;
            margin-top: 3rem;
            font-size: 3em;
            font-weight: bold;
        }
        .student-add-container {
            width: 100%;
            padding: 0rem 12rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .login-form-container {
            width: 60%;
            display: flex;
            flex-direction: column;
        }

        .orange-button {
            background-color: #FE705F;
            width: 100%;
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

        .rounded-card-table {
            background-color: #F4F3F3;
            border-radius: 0.5rem;
        }

        .head-table {
            padding: 1rem 3rem;
        }

        td, th {
            text-align: center;
        }

	</style>
</head>

<body>
<div class="student-add-container">
    <h1 class="home-title text-center">Daftar Siswa<br/>Tetsuya Senior High School</h1>

    <nav class="text-center">
        <a href="student_add.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table class="table table-borderless rounded-card-table">
        <thead class="border-bottom">
            <tr class="head-table">
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">NIP</th>
                <th scope="col-2">Alamat</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Tindakan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM students";
            $query = mysqli_query($db, $sql);
            $sequence = 1;
            while($siswa = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>".$sequence."</td>";
                echo "<td>".$siswa['nama']."</td>";
                echo "<td>".$siswa['nip']."</td>";
                echo "<td>".$siswa['alamat']."</td>";
                echo "<td>".$siswa['phone']."</td>";
                echo "<td>".$siswa['gender']."</td>";
                echo "<td>";
                echo "<a href='student_edit.php?id=".$siswa['id']."'>Edit</a> | ";
                echo "<a href='student_delete.php?id=".$siswa['id']."'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
                $sequence++;
            }
            ?>
        </tbody>
    </table>
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</div>
</body>
</html>