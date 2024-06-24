<?php
require "database.php";
$db = new database();
require_once "class/pegawai.php";

$pemain = new pegawai($db);

if (isset($_POST['simpan'])) {
  $kdpemain   = $_POST['kdpemain'];
  $namapemain = $_POST['namapemain'];
  $posisi   = $_POST['posisi'];
  // echo $kdpemain;
  $pemain->input($kdpemain, $namapemain, $posisi);
  // echo "<script>alert('Data Berhasil Ditambahkan'); window.location='datapegawai.php';</script>";
}

if (isset($_POST['update'])) {
  $kdpemain   = $_POST['kdpemain'];
  $namapemain = $_POST['namapemain'];
  $posisi   = $_POST['posisi'];

  $pemain->update($kdpemain, $namapemain, $posisi);
}

if (isset($_POST['hapus'])) {
  $pemain->hapus($kdpemain);
  header("location: datapegawai.php");
}
