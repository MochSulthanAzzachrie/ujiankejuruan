<?php

// Panggil Koneksi Database
include "../koneksi.php";

// Uji jika tombol Simpan di klik
if (isset($_POST['bsimpan'])) {

    //menentukan ekstension gambar
    $eksistensi_diperbolehkan  = array('png', 'jpg');

    //mengambil nama file
    $nama = $_FILES['tfoto']['name'];
    $x = explode('.', $nama);
    $eksistensi = strtolower(end($x));
    $ukuran  = $_FILES['tfoto']['size'];
    $file_tmp = $_FILES['tfoto']['tmp_name'];

    if (in_array($eksistensi, $eksistensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            //menyimpan file ke folder image		
            move_uploaded_file($file_tmp, '../image/' . $nama);
            $query = mysqli_query($koneksi, "INSERT INTO tguru (nip, nama, jenis_kelamin, alamat, nohp, foto) VALUES ('$_POST[tnip]', '$_POST[tnama]', '$_POST[tkelamin]', '$_POST[talamat]', '$_POST[tnohp]', '$nama')");
            if ($query) {
                echo "<script>alert('Simpan data berhasil!')</script>";
                echo "<script>location='index.php'</script>";
            } else {
                echo "<script>alert('Simpan data gagal!')</script>";
                echo "<script>location='index.php'</script>";
            }
        } else {
            echo "<script>alert('Data melebihi 1MB!')</script>";
            echo "<script>location='index.php'</script>";
        }
    } else {
        echo "<script>alert('Eksistensi gambar harus png atau jpg')</script>";
        echo "<script>location='index.php'</script>";
    }
}

// Uji jika tombol Ubah di klik
if (isset($_POST['bubah'])) {

    //menentukan ekstension gambar
    $eksistensi_diperbolehkan  = array('png', 'jpg');

    //mengambil nama file
    $nama = $_FILES['tfoto']['name'];
    $x = explode('.', $nama);
    $eksistensi = strtolower(end($x));
    $ukuran  = $_FILES['tfoto']['size'];
    $file_tmp = $_FILES['tfoto']['tmp_name'];

    if (in_array($eksistensi, $eksistensi_diperbolehkan) === true) {
        if ($ukuran < 1044070) {
            //menyimpan file ke folder image		
            move_uploaded_file($file_tmp, '../image/' . $nama);
            $query = mysqli_query($koneksi, "UPDATE tguru SET nip = '$_POST[tnip]', nama = '$_POST[tnama]', jenis_kelamin = '$_POST[tkelamin]', alamat = '$_POST[talamat]', nohp = '$_POST[tnohp]', foto = '$nama' WHERE id_guru = '$_POST[id_guru]'");
            if ($query) {
                echo "<script>alert('Simpan data berhasil!')</script>";
                echo "<script>location='index.php'</script>";
            } else {
                echo "<script>alert('Simpan data gagal!')</script>";
                echo "<script>location='index.php'</script>";
            }
        } else {
            echo "<script>alert('Data melebihi 1MB!')</script>";
            echo "<script>location='index.php'</script>";
        }
    } else {
        echo "<script>alert('Eksistensi gambar harus png atau jpg')</script>";
        // echo "<script>location='index.php'</script>";
    }
}

if (isset($_POST['bhapus'])) {
    // Persiapan hapus data
    $id_guru = $_POST['id_guru'];

    // Mulai transaksi
    mysqli_begin_transaction($koneksi);

    // Hapus data dari tabel siswa terlebih dahulu
    $hapus_siswa = mysqli_query($koneksi, "DELETE FROM tsiswa WHERE id_guru = '$id_guru'");

    // Hapus data dari tabel guru
    $hapus_guru = mysqli_query($koneksi, "DELETE FROM tguru WHERE id_guru = '$id_guru'");

    // Check apakah kedua DELETE berhasil
    if ($hapus_siswa && $hapus_guru) {
        // Commit transaksi jika sukses
        mysqli_commit($koneksi);
        echo "<script>alert('Hapus data Sukses!');
            document.location='index.php';
            </script>";
    } else {
        // Rollback transaksi jika ada kegagalan
        mysqli_rollback($koneksi);
        echo "<script>alert('Hapus data Gagal!');
            document.location='index.php';
            </script>";
    }
}

