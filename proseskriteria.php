<?php
require "database.php";
$db = new database();
require_once "class/kriteria.php";

$kriteria = new kriteria($db);

if (isset($_POST['simpan'])) {
  //echo "sampe";
  $idposisi    = $_POST['id_posisi'];
  $kdkriteria = $_POST['kdkriteria'];
  $nmkriteria = $_POST['nmkriteria'];
  $jenis      = $_POST['jenis'];
  $target     = $_POST['target'];

  $kriteria->input($idposisi, $kdkriteria, $nmkriteria, $jenis, $target);
}

if (isset($_POST['update'])) {

  $idposisi    = $_POST['id_posisi'];
  $kdkriteria = $_POST['kdkriteria'];
  $nmkriteria = $_POST['nmkriteria'];
  $jenis      = $_POST['jenis'];
  $target     = $_POST['target'];

  $kriteria->update($idposisi, $kdkriteria, $nmkriteria, $jenis, $target);
}

if (isset($_POST['hapus'])) {

  $posisi->hapus();
  header("location: datakriteria.php");
}
