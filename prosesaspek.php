<?php
require "database.php";
$db = new database();
require_once "class/aspek.php";

$posisi = new aspek($db);

if (isset($_POST['simpan'])) {

  $idposisi    = $_POST['id_posisi'];
  $namaposisi  = $_POST['namaposisi'];

  $posisi->input($idposisi, $namaposisi);
}

if (isset($_POST['update'])) {

  $idposisi    = $_POST['id_posisi'];
  $namaposisi  = $_POST['namaposisi'];

  $posisi->update($idposisi, $namaposisi);
}

if (isset($_POST['hapus'])) {

  $posisi->hapus($idposisi);
  header("location: dataaspek.php");
}
