<?php
$id = $_GET['id_posisi'];
require_once "class/aspek.php";
$aspek = new aspek();
$aspek->hapus($id);
