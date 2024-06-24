<?php
require "database.php";
$db = new database();
require_once "class/goalkeeper.php";

$goalkeeper = new goalkeeper($db);

if (isset($_POST['simpan'])) {
  $kdpemain      = $_POST['kdpemain'];

  $nilai_sm       = $_POST['nilai_sm'];
  $target_sm      = $_POST['target_sm'];
  $selisih_sm     = $_POST['selisih_sm'];
  $nilai_bobot_sm = $_POST['nilai_bobot_sm'];
  $nilai_pc       = $_POST['nilai_pc'];
  $target_pc      = $_POST['target_pc'];
  $selisih_pc     = $_POST['selisih_pc'];
  $nilai_bobot_pc = $_POST['nilai_bobot_pc'];
  $nilai_lpc       = $_POST['nilai_lpc'];
  $target_lpc      = $_POST['target_lpc'];
  $selisih_lpc     = $_POST['selisih_lpc'];
  $nilai_bobot_lpc = $_POST['nilai_bobot_lpc'];
  $nilai_cs       = $_POST['nilai_cs'];
  $target_cs      = $_POST['target_cs'];
  $selisih_cs     = $_POST['selisih_cs'];
  $nilai_bobot_cs = $_POST['nilai_bobot_cs'];

  $nilai_cf_A1    = $_POST['nilai_cf_A1'];
  $nilai_sf_A1    = $_POST['nilai_sf_A1'];
  $nilai_tot_A1   = $_POST['nilai_tot_A1'];

  $goalkeeper->input($kdpemain, $nilai_sm, $target_sm, $selisih_sm, $nilai_bobot_sm, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_lpc, $target_lpc, $selisih_lpc, $nilai_bobot_lpc, $nilai_cs, $target_cs, $selisih_cs, $nilai_bobot_cs, $nilai_cf_A1, $nilai_sf_A1, $nilai_tot_A1);
}

if (isset($_POST['update'])) {
  $kdpemain      = $_POST['kdpemain'];

  $nilai_sm       = $_POST['nilai_sm'];
  $target_sm      = $_POST['target_sm'];
  $selisih_sm     = $_POST['selisih_sm'];
  $nilai_bobot_sm = $_POST['nilai_bobot_sm'];
  $nilai_pc       = $_POST['nilai_pc'];
  $target_pc      = $_POST['target_pc'];
  $selisih_pc     = $_POST['selisih_pc'];
  $nilai_bobot_pc = $_POST['nilai_bobot_pc'];
  $nilai_lpc       = $_POST['nilai_lpc'];
  $target_lpc      = $_POST['target_lpc'];
  $selisih_lpc     = $_POST['selisih_lpc'];
  $nilai_bobot_lpc = $_POST['nilai_bobot_lpc'];
  $nilai_cs       = $_POST['nilai_cs'];
  $target_cs      = $_POST['target_cs'];
  $selisih_cs     = $_POST['selisih_cs'];
  $nilai_bobot_cs = $_POST['nilai_bobot_cs'];

  $nilai_cf_A1    = $_POST['nilai_cf_A1'];
  $nilai_sf_A1    = $_POST['nilai_sf_A1'];
  $nilai_tot_A1   = $_POST['nilai_tot_A1'];

  $goalkeeper->update($kdpemain, $nilai_sm, $target_sm, $selisih_sm, $nilai_bobot_sm, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_kn, $target_kn, $selisih_kn, $nilai_bobot_kn, $nilai_lpc, $target_lpc, $selisih_lpc, $nilai_bobot_lpc, $nilai_cs, $target_cs, $selisih_cs, $nilai_bobot_cs, $nilai_cf_A1, $nilai_sf_A1, $nilai_tot_A1);
}
