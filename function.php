<?php

// Konfigurasi koneksi ke database
$host = "localhost"; // Host database (biasanya localhost)
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi database (kosongkan jika tidak ada)
$database = "bookstore"; // Nama database yang akan digunakan

// Membuat koneksi
$connection = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Jika sampai tahap ini, koneksi berhasil dibuat
echo "Koneksi berhasil dibuat!";

if(isset($_POST['addnewbuku'])){
    $kode_buku = $_POST['kode_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit = $_POST['penerbit'];
    $id_penerbit = $_POST['id_penerbit'];

    // Pengecekan apakah ID penerbit ada dalam tabel penerbit
    $check_penerbit = mysqli_query($connection, "SELECT * FROM penerbit WHERE id_penerbit = '$id_penerbit'");
    if(mysqli_num_rows($check_penerbit) == 0){ // Jika tidak ada baris yang cocok
        echo 'ID penerbit tidak valid';
        header('location:admin.php');
        exit(); // Keluar dari skrip
    }

    // Jika ID penerbit valid, jalankan kueri INSERT
    $addtotable = mysqli_query($connection, "INSERT INTO buku (kode_buku, kategori, nama_buku, harga, stok, penerbit, id_penerbit) VALUES ('$kode_buku', '$kategori', '$nama_buku', '$harga', '$stok', '$penerbit', '$id_penerbit')");
    if($addtotable){
        header ('location:admin.php');
        exit(); // Tambahkan exit() di sini
    } else {
        echo 'Gagal';
        header('location:admin.php');
        exit(); // Tambahkan exit() di sini
    }
}


//menambah penerbit
if(isset($_POST['addnewpenerbit'])){
    $kode_penerbit = $_POST['kode_penerbit'];
    $nama= $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon= $_POST['telepon'];


    $addtotable = mysqli_query($connection, "INSERT INTO penerbit (kode_penerbit, nama, alamat, kota, telepon) VALUES ('$kode_penerbit', '$nama', '$alamat', '$kota', '$telepon')");
    if($addtotable){
        header('location:admin.php');
        exit(); // Tambahkan exit() di sini
    } else {
        echo 'Gagal';
        header('location:admin.php');
        exit(); // Tambahkan exit() di sini
    }
}

// Pastikan untuk memeriksa apakah ID buku sudah diset sebelumnya
if (isset($_POST['updatebuku'])) {
    // Pastikan untuk menginisialisasi variabel $idb jika belum ada
    $idb = $_POST['idb']; // Asumsikan ada input dengan nama 'id_buku'
    
    // Ambil nilai lain dari form
    $kode_buku = $_POST['kode_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $penerbit = $_POST['penerbit'];

    // Lakukan query update dengan menggunakan prepared statement untuk menghindari SQL injection
    $update = mysqli_prepare($connection, "UPDATE buku SET kode_buku=?, kategori=?, nama_buku=?, harga=?, stok=?, penerbit=? WHERE id=?");
    mysqli_stmt_bind_param($update, 'ssssssi', $kode_buku, $kategori, $nama_buku, $harga, $stok, $penerbit, $idb);
    mysqli_stmt_execute($update);

    // Periksa apakah query berhasil dieksekusi
    if (mysqli_stmt_affected_rows($update) > 0) {
        // Jika berhasil, alihkan kembali ke halaman admin.php
        header('Location: admin.php');
        exit(); // Hentikan eksekusi skrip setelah melakukan redirect
    } else {
        // Jika gagal, tampilkan pesan kesalahan
        echo 'Gagal';
        exit(); // Hentikan eksekusi skrip setelah menampilkan pesan kesalahan
    }
}

//Hapus 
function delete($idb)
{
	global $connection;
	mysqli_query($connection, "DELETE FROM buku WHERE id = $idb");
	return mysqli_affected_rows($connection);
}

?>