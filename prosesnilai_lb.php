<?php
require "database.php";
$db = new database();
require_once "class/lb.php";

$leftback = new LeftBack($db);

if (isset($_POST['simpan'])) {
    $kdpemain      = $_POST['kdpemain'];

    $nilai_tm       = $_POST['nilai_tm'];
    $target_tm      = $_POST['target_tm'];
    $selisih_tm     = $_POST['selisih_tm'];
    $nilai_bobot_tm = $_POST['nilai_bobot_tm'];
    $nilai_pc       = $_POST['nilai_pc'];
    $target_pc      = $_POST['target_pc'];
    $selisih_pc     = $_POST['selisih_pc'];
    $nilai_bobot_pc = $_POST['nilai_bobot_pc'];
    $nilai_dw       = $_POST['nilai_dw'];
    $target_dw      = $_POST['target_dw'];
    $selisih_dw     = $_POST['selisih_dw'];
    $nilai_bobot_dw = $_POST['nilai_bobot_dw'];
    $nilai_ca       = $_POST['nilai_ca'];
    $target_ca      = $_POST['target_ca'];
    $selisih_ca     = $_POST['selisih_ca'];
    $nilai_bobot_ca = $_POST['nilai_bobot_ca'];
    $nilai_cr       = $_POST['nilai_cr'];
    $target_cr      = $_POST['target_cr'];
    $selisih_cr     = $_POST['selisih_cr'];
    $nilai_bobot_cr = $_POST['nilai_bobot_cr'];
    $nilai_cf_A2    = $_POST['nilai_cf_A2'];
    $nilai_sf_A2    = $_POST['nilai_sf_A2'];
    $nilai_tot_A2   = $_POST['nilai_tot_A2'];

    $leftback->input($kdpemain, $nilai_tm, $target_tm, $selisih_tm, $nilai_bobot_tm, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_ca, $target_ca, $selisih_ca, $nilai_bobot_ca, $nilai_cr, $target_cr, $selisih_cr, $nilai_bobot_cr, $nilai_cf_A2, $nilai_sf_A2, $nilai_tot_A2);
}

if (isset($_POST['update'])) {
    $kdpemain      = $_POST['kdpemain'];
    $nilai_tm       = $_POST['nilai_tm'];
    $target_tm      = $_POST['target_tm'];
    $selisih_tm     = $_POST['selisih_tm'];
    $nilai_bobot_tm = $_POST['nilai_bobot_tm'];
    $nilai_pc       = $_POST['nilai_pc'];
    $target_pc      = $_POST['target_pc'];
    $selisih_pc     = $_POST['selisih_pc'];
    $nilai_bobot_pc = $_POST['nilai_bobot_pc'];
    $nilai_dw       = $_POST['nilai_dw'];
    $target_dw      = $_POST['target_dw'];
    $selisih_dw     = $_POST['selisih_dw'];
    $nilai_bobot_dw = $_POST['nilai_bobot_dw'];
    $nilai_ca       = $_POST['nilai_ca'];
    $target_ca      = $_POST['target_ca'];
    $selisih_ca     = $_POST['selisih_ca'];
    $nilai_bobot_ca = $_POST['nilai_bobot_ca'];
    $nilai_cr       = $_POST['nilai_cr'];
    $target_cr      = $_POST['target_cr'];
    $selisih_cr     = $_POST['selisih_cr'];
    $nilai_bobot_cr = $_POST['nilai_bobot_cr'];
    $nilai_cf_A2    = $_POST['nilai_cf_A2'];
    $nilai_sf_A2    = $_POST['nilai_sf_A2'];
    $nilai_tot_A2   = $_POST['nilai_tot_A2'];

    $leftback->update($kdnilai2, $kdpemain, $nilai_tm, $target_tm, $selisih_tm, $nilai_bobot_tm, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_ca, $target_ca, $selisih_ca, $nilai_bobot_ca, $nilai_cr, $target_cr, $selisih_cr, $nilai_bobot_cr, $nilai_cf_A2, $nilai_sf_A2, $nilai_tot_A2);
}
