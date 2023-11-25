<?php

// Panggil Koneksi Database
include "../koneksi.php";

// Uji jika tombol Simpan di klik
if (isset($_POST['bsimpan'])) {

    // Persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO tsiswa (nisn, nama, jenis_kelamin, alamat, kelas, jurusan, id_guru) VALUES ('$_POST[tnisn]', '$_POST[tnama]', '$_POST[tkelamin]', '$_POST[talamat]', '$_POST[tkelas]', '$_POST[tjurusan]', '$_POST[twali]')");
    // Jika simpan sukses
    if ($simpan) {
        echo "<script>alert('Simpan data Sukses!');
        document.location='index.php'
        </script>";
    } else {
        echo "<script>alert('Simpan data Gagal!');
        document.location='index.php'
        </script>";
    }
}

// Uji jika tombol Ubah di klik
if (isset($_POST['bubah'])) {
    // var_dump($_POST['twali']);
    // die;
    // Persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE tsiswa SET nisn = '$_POST[tnisn]', nama = '$_POST[tnama]', jenis_kelamin = '$_POST[tkelamin]', alamat = '$_POST[talamat]', kelas = '$_POST[tkelas]', jurusan = '$_POST[tjurusan]', id_guru = '$_POST[twali]' WHERE id_siswa = '$_POST[id_siswa]'");
    // Jika simpan sukses
    if ($ubah) {
        echo "<script>alert('Ubah data Sukses!');
        document.location='index.php'
        </script>";
    } else {
        echo "<script>alert('Ubah data Gagal!');
        document.location='index.php'
        </script>";
    }
}

// Uji jika tombol Hapus di klik
if (isset($_POST['bhapus'])) {

    // Persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM tsiswa WHERE id_siswa = '$_POST[id_siswa]'");
    // Jika Hapus sukses
    if ($hapus) {
        echo "<script>alert('Hapus data Sukses!');
        document.location='index.php'
        </script>";
    } else {
        echo "<script>alert('Hapus data Gagal!');
        document.location='index.php'
        </script>";
    }
}
