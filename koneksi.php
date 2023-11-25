<?php

// Koneksi Database
$server = "localhost";
$user = "root";
$password = "";
$database = "db_crud_modal";

// Buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

