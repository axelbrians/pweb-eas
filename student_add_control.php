<?php

include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['save'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];
    $phone = $_POST['phone'];
    $jk = $_POST['gender'];

    // buat query
    $sql = "INSERT INTO students (nama, nip, alamat, phone, gender) VALUE ('$nama', '$nip','$alamat', '$phone', '$jk')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman hone.php dengan status=sukses
        header('Location: home.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman home.php dengan status=gagal
        header('Location: home.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>