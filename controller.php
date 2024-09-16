<?php
include 'database/connection.php';

tambahPendaftaranBeasiswa($db);

function tambahPendaftaranBeasiswa($db)
{
    $nama_beasiswa = $_POST['nama_beasiswa'];
    $nama_pendaftar = $_POST['nama_pendaftar'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor'];
    $ipk = $_POST['IPK'];
    $pilihan = $_POST['pilihan'];
    $berkas = $_POST['berkas'];

    $sql = "INSERT INTO detail_beasiswa (nama_beasiswa, nama_pendaftar, email, nomor_hp, ipk, pilihan, berkas) VALUE ('$nama_beasiswa', '$nama_pendaftar', '$email', '$nomor_hp', '$ipk', '$pilihan', '$berkas')";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: hasil.php?status=sukses');
    } else {
        header('Location: hasil.php?status=gagal');
    }
}