<?php
$id = $_GET['kdpemain'];
require_once "class/pegawai.php";
$pegawai = new pegawai();
$pegawai->hapus($id);
