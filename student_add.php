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
	<title>Add New Student - TSHS</title>
    <meta charset="UTF-8">
    <meta name="author" content="Axel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

	</style>
</head>
<body>
<div class="student-add-container">
    <h1 class="home-title">Add New Student</h1>

    <form action="student_add_control.php" class="login-form-container" method="post">
        <div class="mb-3 form-group">
            <label for="input-nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="input-nama">
        </div>
        <div class="mb-3 form-group">
            <label for="input-nip" class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" id="input-nip">
        </div>            
        <div class="form-group">
            <label for="input-alamat" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat"></textarea>
        </div>
        <div class="mb-3 form-group">
            <label for="input-phone" class="form-label">Phone</label>
            <input type="phone" name="phone" class="form-control" id="input-phone">
        </div>

        <div class="form-group">
            <label for="gender">Jenis Kelamin</label>
            <select class="form-control" name="gender">
                <option selected>Select your gender</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>


        <div class="form-group">
            <input class="orange-button" type="submit" value="Simpan" name="save" />
        </div>
    </form>
</div>



<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
