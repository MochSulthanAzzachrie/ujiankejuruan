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
            <h3 class="text-center">Moch. Sulthan Az-Zachrie</h3>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                Data Guru SMK
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                <a href="../siswa/" class="btn btn-info mb-3">Siswa</a>

                <a href="#" class="btn btn-info mb-3">Guru</a>

                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No.HP</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>

                    <?php

                    // Persiapan Menampilkan Data
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tguru ORDER BY id_guru DESC");
                    while ($data = mysqli_fetch_array($tampil)) :

                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nip']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['jenis_kelamin']; ?></td>
                            <td><?= $data['alamat']; ?></td>
                            <td><?= $data['nohp']; ?></td>
                            <td><img src="../image/<?= $data['foto']; ?>" height="150px"></td>
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
                                        <h1 class="modal-title fs-5" id="modalUbahLabel">Form Data Guru SMK</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="aksi_crud.php" enctype="multipart/form-data">
                                        <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label class="form-label">NIP</label>
                                                <input type="text" class="form-control" name="tnip" value="<?= $data['nip']; ?>" placeholder="Masukkan NIP Anda!">
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
                                                <label class="form-label">No.HP</label>
                                                <input type="text" class="form-control" name="tnohp" value="<?= $data['nohp']; ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Foto</label>
                                                <input type="file" class="form-control" name="tfoto" value="<?= $data['foto']; ?>">
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
                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">

                                        <div class="modal-body">

                                            <h5 class="text-center"> Apakah Anda yakin ingin menghapus data ini? <br>
                                            <span class="text-danger"><?= $data['nip'];?> - <?= $data['nama'];?></span>
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
                            <form method="POST" action="aksi_crud.php" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label class="form-label">NIP</label>
                                        <input type="text" class="form-control" name="tnip" placeholder="Masukkan NIP Anda!">
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
                                        <label class="form-label">No.HP</label>
                                        <input type="text" class="form-control" name="tnohp">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="tfoto">
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

                <!-- Akhir Modal Tambah -->

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>