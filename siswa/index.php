<?php

// Panggil Koneksi Database
include "../koneksi.php";

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - PHP MySQL + Boostrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="mt-3">
            <h3 class="text-center">CRUD - PHP MySQL + Boostrap 5</h3>
            <h3 class="text-center">Mocha</h3>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                Data Siswa SMK
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <a href="#" class="btn btn-info mb-3">Siswa</a>

                <a href="../guru/" class="btn btn-info mb-3">Guru</a>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>NISN</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Wali Kelas</th>
                        <th>Aksi</th>
                    </tr>

                    <?php

                    // Persiapan Menampilkan Data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT tsiswa.*, tguru.nama as nama_guru FROM tsiswa INNER JOIN tguru ON tsiswa.id_guru = tguru.id_guru ORDER BY id_siswa DESC");
                    while ($data = mysqli_fetch_array($tampil)) :

                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nisn']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['jenis_kelamin']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['kelas']; ?></td>
                            <td><?= $data['jurusan']; ?></td>
                            <td><?= $data['nama_guru']; ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no; ?>">Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no; ?>">Hapus</a>
                            </td>
                        </tr>

                        <!-- Awal Modal Ubah -->
                        <div class="modal fade modal-lg" id="modalUbah<?= $no; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUbahLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalUbahLabel">Form Data Siswa SMK</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label class="form-label">NISN</label>
                                                <input type="text" class="form-control" name="tnisn" value="<?= $data['nisn']; ?>" placeholder="Masukkan NISN Anda!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama']; ?>" placeholder="Masukkan Nama Lengkap Anda!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="tkelamin">
                                                    <option value="<?= $data['jenis_kelamin']; ?>"><?= $data['jenis_kelamin']; ?></option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <textarea class="form-control" name="talamat" rows="3"><?= $data['alamat']; ?></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Kelas</label>
                                                <select class="form-select" name="tkelas">
                                                    <option value="<?= $data['kelas']; ?>"><?= $data['kelas']; ?></option>
                                                    <option value="X(10)">X(10)</option>
                                                    <option value="XI(11)">XI(11)</option>
                                                    <option value="XII(12)">XII(12)</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Jurusan</label>
                                                <select class="form-select" name="tjurusan">
                                                    <option value="<?= $data['jurusan']; ?>"><?= $data['jurusan']; ?></option>
                                                    <option value="TKJ - Teknik Komputer & jaringan">TKJ - Teknik Komputer & jaringan</option>
                                                    <option value="RPL - Rekayasa Perangkat Lunak">RPL - Rekayasa Perangkat Lunak</option>
                                                    <option value="DKV - Desain Komunikasi Visual">DKV - Desain Komunikasi Visual</option>
                                                    <option value="TKR - Teknik Kendaraan Ringan">TKR - Teknik Kendaraan Ringan</option>
                                                    <option value="TBSM - Teknik & Bisnis Sepeda Motor">TBSM - Teknik & Bisnis Sepeda Motor</option>
                                                    <option value="ATP - Agribisnis Tanaman Perkebunan">ATP - Agribisnis Tanaman Perkebunan</option>
                                                    <option value="ATPH - Agribisnis Tanaman Pangan & Hortikultura">ATPH - Agribisnis Tanaman Pangan & Hortikultura</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Wali Kelas</label>
                                                <select class="form-select" name="twali">

                                                    <option value="<?= $data['id_siswa']; ?>"><?= $data['nama_guru']; ?></option>
                                                    <?php
                                                    //menyeleksi data user
                                                    $wali = mysqli_query($koneksi, "SELECT * FROM tguru");
                                                    while ($guru = mysqli_fetch_array($wali)) {
                                                    ?>
                                                        <option value="<?= $guru['id_guru']; ?>"><?= $guru['nama']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Akhir Modal Ubah -->

                        <!-- Awal Modal Hapus-->
                        <div class="modal fade modal-lg" id="modalHapus<?= $no; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalHapusLabel">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php" enctype="multipart/form-data">
                                        <input type="hidden" name="id_siswa" value="<?= $data['id_siswa'] ?>">

                                        <div class="modal-body">

                                            <h5 class="text-center"> Apakah Anda yakin ingin menghapus data ini? <br>
                                                <span class="text-danger"><?= $data['nisn']; ?> - <?= $data['nama']; ?></span>
                                            </h5>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bhapus">Hapus</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Akhir Modal Hapus -->

                    <?php

                    endwhile;

                    ?>

                </table>



                <!-- Awal Modal Tambah -->
                <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalTambahLabel">Form Data Siswa SMK</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php">

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label class="form-label">NISN</label>
                                                <input type="text" class="form-control" name="tnisn" placeholder="Masukkan NISN Anda!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Lengkap Anda!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="tkelamin">
                                                    <option value=""></option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <textarea class="form-control" name="talamat" rows="3"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Kelas</label>
                                                <select class="form-select" name="tkelas">
                                                    <option value=""></option>
                                                    <option value="X(10)">X(10)</option>
                                                    <option value="XI(11)">XI(11)</option>
                                                    <option value="XII(12)">XII(12)</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Jurusan</label>
                                                <select class="form-select" name="tjurusan">
                                                    <option value=""></option>
                                                    <option value="TKJ - Teknik Komputer & jaringan">TKJ - Teknik Komputer & jaringan</option>
                                                    <option value="RPL - Rekayasa Perangkat Lunak">RPL - Rekayasa Perangkat Lunak</option>
                                                    <option value="DKV - Desain Komunikasi Visual">DKV - Desain Komunikasi Visual</option>
                                                    <option value="TKR - Teknik Kendaraan Ringan">TKR - Teknik Kendaraan Ringan</option>
                                                    <option value="TBSM - Teknik & Bisnis Sepeda Motor">TBSM - Teknik & Bisnis Sepeda Motor</option>
                                                    <option value="ATP - Agribisnis Tanaman Perkebunan">ATP - Agribisnis Tanaman Perkebunan</option>
                                                    <option value="ATPH - Agribisnis Tanaman Pangan & Hortikultura">ATPH - Agribisnis Tanaman Pangan & Hortikultura</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Wali Kelas</label>
                                                <select class="form-select" name="twali">

                                                    <option value=""></option>
                                                    <?php
                                                    //menyeleksi data user
                                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tguru");
                                                    while ($guru = mysqli_fetch_array($tampil)) {
                                                    ?>
                                                        <option value="<?= $guru['id_guru']; ?>"><?= $guru['nama']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Akhir Modal Ubah -->
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>