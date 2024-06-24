<?php
require "database.php";
$db = new database();
require_once "class/cb.php";

$CentreBack = new CentreBack($db);

if (isset($_POST['simpan'])) {
  $kdpemain      = $_POST['kdpemain'];
  $nilai_pc        = $_POST['nilai_pc'];
  $target_pc       = $_POST['target_pc'];
  $selisih_pc      = $_POST['selisih_pc'];
  $nilai_bobot_pc  = $_POST['nilai_bobot_pc'];
  $nilai_tm       = $_POST['nilai_tm'];
  $target_tm      = $_POST['target_tm'];
  $selisih_tm     = $_POST['selisih_tm'];
  $nilai_bobot_tm = $_POST['nilai_bobot_tm'];
  $nilai_dw        = $_POST['nilai_dw'];
  $target_dw       = $_POST['target_dw'];
  $selisih_dw      = $_POST['selisih_dw'];
  $nilai_bobot_dw  = $_POST['nilai_bobot_dw'];
  $nilai_cr        = $_POST['nilai_cr'];
  $target_cr       = $_POST['target_cr'];
  $selisih_cr      = $_POST['selisih_cr'];
  $nilai_bobot_cr  = $_POST['nilai_bobot_cr'];
  $nilai_cs        = $_POST['nilai_cs'];
  $target_cs       = $_POST['target_cs'];
  $selisih_cs      = $_POST['selisih_cs'];
  $nilai_bobot_cs  = $_POST['nilai_bobot_cs'];
  $nilai_cf_A3    = $_POST['nilai_cf_A3'];
  $nilai_sf_A3    = $_POST['nilai_sf_A3'];
  $nilai_tot_A3   = $_POST['nilai_tot_A3'];

  $CentreBack->input($kdpemain, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_tm, $target_tm, $selisih_tm, $nilai_bobot_tm, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_cr, $target_cr, $selisih_cr, $nilai_bobot_cr, $nilai_cs, $target_cs, $selisih_cs, $nilai_bobot_cs, $nilai_cf_A3, $nilai_sf_A3, $nilai_tot_A3);
}

if (isset($_POST['update'])) {
  $kdpemain       = $_POST['kdpemain'];
  $nilai_pc        = $_POST['nilai_pc'];
  $target_pc       = $_POST['target_pc'];
  $selisih_pc      = $_POST['selisih_pc'];
  $nilai_bobot_pc  = $_POST['nilai_bobot_pc'];
  $nilai_tm       = $_POST['nilai_tm'];
  $target_tm      = $_POST['target_tm'];
  $selisih_tm     = $_POST['selisih_tm'];
  $nilai_bobot_tm = $_POST['nilai_bobot_tm'];
  $nilai_dw        = $_POST['nilai_dw'];
  $target_dw       = $_POST['target_dw'];
  $selisih_dw      = $_POST['selisih_dw'];
  $nilai_bobot_dw  = $_POST['nilai_bobot_dw'];
  $nilai_cr        = $_POST['nilai_cr'];
  $target_cr       = $_POST['target_cr'];
  $selisih_cr      = $_POST['selisih_cr'];
  $nilai_bobot_cr  = $_POST['nilai_bobot_cr'];
  $nilai_cs        = $_POST['nilai_cs'];
  $target_cs       = $_POST['target_cs'];
  $selisih_cs      = $_POST['selisih_cs'];
  $nilai_bobot_cs  = $_POST['nilai_bobot_cs'];
  $nilai_cf_A3     = $_POST['nilai_cf_A3'];
  $nilai_sf_A3     = $_POST['nilai_sf_A3'];
  $nilai_tot_A3    = $_POST['nilai_tot_A3'];

  $CentreBack->update($kdpemain, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_tm, $target_tm, $selisih_tm, $nilai_bobot_tm, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_cr, $target_cr, $selisih_cr, $nilai_bobot_cr, $nilai_cs, $target_cs, $selisih_cs, $nilai_bobot_cs, $nilai_cf_A3, $nilai_sf_A3, $nilai_tot_A3, $missing_argument);
}
