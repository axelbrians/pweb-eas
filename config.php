<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "tetsuya_senior_high_school";
$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
?>