<?php
require "database.php";
$db = new database();
require_once "class/cf.php";

$Forward = new Forward($db);

if (isset($_POST['simpan'])) {
  $kdpemain    = $_POST['kdpemain'];
  $nilai_go     = $_POST['nilai_go'];
  $target_go    = $_POST['target_go'];
  $selisih_go   = $_POST['selisih_go'];
  $nilai_bobot_go     = $_POST['nilai_bobot_go'];
  $nilai_as     = $_POST['nilai_as'];
  $target_as    = $_POST['target_as'];
  $selisih_as   = $_POST['selisih_as'];
  $nilai_bobot_as     = $_POST['bobot_as'];
  $nilai_dw     = $_POST['nilai_dw'];
  $target_dw    = $_POST['target_dw'];
  $selisih_dw   = $_POST['selisih_dw'];
  $nilai_bobot_dw     = $_POST['nilai_bobot_dw'];
  $nilai_tb    = $_POST['nilai_tb'];
  $target_tb   = $_POST['target_tb'];
  $selisih_tb  = $_POST['selisih_tb'];
  $nilai_bobot_tb    = $_POST['nilai_bobot_tb'];
  $nilai_st     = $_POST['nilai_st'];
  $target_st    = $_POST['target_st'];
  $selisih_st   = $_POST['selisih_st'];
  $nilai_bobot_st     = $_POST['nilai_bobot_st'];

  $nilai_cf_A9    = $_POST['nilai_cf_A9'];
  $nilai_sf_A9    = $_POST['nilai_sf_A9'];
  $nilai_tot_A9   = $_POST['nilai_tot_A9'];

  $Forward->input($kdpemain, $nilai_go, $target_go, $selisih_go, $nilai_bobot_go, $nilai_as, $target_as, $selisih_as, $nilai_bobot_as, $nilai_tb, $target_tb, $selisih_tb, $nilai_bobot_tb, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_st, $target_st, $selisih_st, $nilai_bobot_st, $nilai_cf_A9, $nilai_sf_A9, $nilai_tot_A9);
}

if (isset($_POST['update'])) {
  $kdpemain   = $_POST['kdpemain'];
  $nilai_go    = $_POST['nilai_go'];
  $target_go   = $_POST['target_go'];
  $selisih_go  = $_POST['selisih_go'];
  $bobot_go    = $_POST['bobot_go'];
  $nilai_as    = $_POST['nilai_as'];
  $target_as   = $_POST['target_as'];
  $selisih_as  = $_POST['selisih_as'];
  $bobot_as    = $_POST['bobot_as'];
  $nilai_tb   = $_POST['nilai_tb'];
  $target_tb  = $_POST['target_tb'];
  $selisih_tb = $_POST['selisih_tb'];
  $bobot_tb   = $_POST['bobot_tb'];
  $nilai_dw    = $_POST['nilai_dw'];
  $target_dw   = $_POST['target_dw'];
  $selisih_dw  = $_POST['selisih_dw'];
  $bobot_dw    = $_POST['bobot_st'];
  $nilai_st    = $_POST['nilai_st'];
  $target_st   = $_POST['target_st'];
  $selisih_st  = $_POST['selisih_st'];
  $bobot_st    = $_POST['bobot_st'];
  $nilai_cf_A9 = $_POST['nilai_cf_A9'];
  $nilai_sf_A9 = $_POST['nilai_sf_A9'];
  $nilai_tot_A9 = $_POST['nilai_tot_A9'];

  $Forward->update($kdpemain, $nilai_go, $target_go, $selisih_go, $bobot_go, $nilai_as, $target_as, $selisih_as, $bobot_as, $nilai_tb, $target_tb, $selisih_tb, $bobot_tb, $nilai_dw, $target_dw, $selisih_dw, $bobot_dw, $nilai_st, $target_st, $selisih_st, $bobot_st, $nilai_cf_A9, $nilai_sf_A9, $nilai_tot_A9, $missing_argument);
}
