<?php
require "database.php";
$db = new database();
require_once "class/cmf.php";

$CentralMidfielder = new CentralMidfielder($db);

if (isset($_POST['simpan'])) {
  $kdpemain    = $_POST['kdpemain'];
  $nilai_pc     = $_POST['nilai_pc'];
  $target_pc    = $_POST['target_pc'];
  $selisih_pc   = $_POST['selisih_pc'];
  $nilai_bobot_pc     = $_POST['nilai_bobot_pc'];
  $nilai_tm     = $_POST['nilai_tm'];
  $target_tm    = $_POST['target_tm'];
  $selisih_tm   = $_POST['selisih_tm'];
  $nilai_bobot_tm     = $_POST['nilai_bobot_tm'];
  $nilai_cc    = $_POST['nilai_cc'];
  $target_cc   = $_POST['target_cc'];
  $selisih_cc  = $_POST['selisih_cc'];
  $nilai_bobot_cc    = $_POST['nilai_bobot_cc'];
  $nilai_dw     = $_POST['nilai_dw'];
  $target_dw    = $_POST['target_dw'];
  $selisih_dw   = $_POST['selisih_dw'];
  $nilai_bobot_dw     = $_POST['nilai_bobot_dw'];
  $nilai_br     = $_POST['nilai_br'];
  $target_br    = $_POST['target_br'];
  $selisih_br   = $_POST['selisih_br'];
  $nilai_bobot_br     = $_POST['nilai_bobot_br'];

  $nilai_cf_A5    = $_POST['nilai_cf_A5'];
  $nilai_sf_A5    = $_POST['nilai_sf_A5'];
  $nilai_tot_A5   = $_POST['nilai_tot_A5'];

  $CentralMidfielder->input($kdpemain, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_tm, $target_tm, $selisih_tm, $nilai_bobot_tm, $nilai_cc, $target_cc, $selisih_cc, $nilai_bobot_cc, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_br, $target_br, $selisih_br, $nilai_bobot_br, $nilai_cf_A5, $nilai_sf_A5, $nilai_tot_A5);
}

if (isset($_POST['update'])) {
  $kdpemain   = $_POST['kdpemain'];
  $nilai_pc    = $_POST['nilai_pc'];
  $target_pc   = $_POST['target_pc'];
  $selisih_pc  = $_POST['selisih_pc'];
  $bobot_pc    = $_POST['bobot_pc'];
  $nilai_tm    = $_POST['nilai_tm'];
  $target_tm   = $_POST['target_tm'];
  $selisih_tm  = $_POST['selisih_tm'];
  $bobot_tm    = $_POST['bobot_tm'];
  $nilai_cc   = $_POST['nilai_cc'];
  $target_cc  = $_POST['target_cc'];
  $selisih_cc = $_POST['selisih_cc'];
  $bobot_cc   = $_POST['bobot_cc'];
  $nilai_dw    = $_POST['nilai_dw'];
  $target_dw   = $_POST['target_dw'];
  $selisih_dw  = $_POST['selisih_dw'];
  $bobot_dw    = $_POST['bobot_br'];
  $nilai_br    = $_POST['nilai_br'];
  $target_br   = $_POST['target_br'];
  $selisih_br  = $_POST['selisih_br'];
  $bobot_br    = $_POST['bobot_br'];
  $nilai_cf_A5 = $_POST['nilai_cf_A5'];
  $nilai_sf_A5 = $_POST['nilai_sf_A5'];
  $nilai_tot_A5 = $_POST['nilai_tot_A5'];

  $CentralMidfielder->update($kdpemain, $nilai_pc, $target_pc, $selisih_pc, $bobot_pc, $nilai_tm, $target_tm, $selisih_tm, $bobot_tm, $nilai_cc, $target_cc, $selisih_cc, $bobot_cc, $nilai_dw, $target_dw, $selisih_dw, $bobot_dw, $nilai_br, $target_br, $selisih_br, $bobot_br, $nilai_cf_A5, $nilai_sf_A5, $nilai_tot_A5, $missing_argument);
}
