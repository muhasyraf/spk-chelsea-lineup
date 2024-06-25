<?php
require "database.php";
$db = new database();
require_once "class/rmf.php";

$rightmidfielder = new RightMidfielder($db);

if (isset($_POST['simpan'])) {
    $kdpemain      = $_POST['kdpemain'];

    $nilai_pc       = $_POST['nilai_pc'];
    $target_pc      = $_POST['target_pc'];
    $selisih_pc     = $_POST['selisih_pc'];
    $nilai_bobot_pc = $_POST['nilai_bobot_pc'];
    $nilai_as       = $_POST['nilai_as'];
    $target_as      = $_POST['target_as'];
    $selisih_as     = $_POST['selisih_as'];
    $nilai_bobot_as = $_POST['nilai_bobot_as'];
    $nilai_cc       = $_POST['nilai_cc'];
    $target_cc      = $_POST['target_cc'];
    $selisih_cc     = $_POST['selisih_cc'];
    $nilai_bobot_cc = $_POST['nilai_bobot_cc'];
    $nilai_dw       = $_POST['nilai_dw'];
    $target_dw      = $_POST['target_dw'];
    $selisih_dw     = $_POST['selisih_dw'];
    $nilai_bobot_dw = $_POST['nilai_bobot_dw'];
    $nilai_ca       = $_POST['nilai_ca'];
    $target_ca      = $_POST['target_ca'];
    $selisih_ca     = $_POST['selisih_ca'];
    $nilai_bobot_ca = $_POST['nilai_bobot_ca'];
    $nilai_cf_A7    = $_POST['nilai_cf_A7'];
    $nilai_sf_A7    = $_POST['nilai_sf_A7'];
    $nilai_tot_A7   = $_POST['nilai_tot_A7'];

    $rightmidfielder->input($kdpemain, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_as, $target_as, $selisih_as, $nilai_bobot_as, $nilai_cc, $target_cc, $selisih_cc, $nilai_bobot_cc, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_ca, $target_ca, $selisih_ca, $nilai_bobot_ca, $nilai_cf_A7, $nilai_sf_A7, $nilai_tot_A7);
}

if (isset($_POST['update'])) {
    $kdpemain      = $_POST['kdpemain'];
    $nilai_pc       = $_POST['nilai_pc'];
    $target_pc      = $_POST['target_pc'];
    $selisih_pc     = $_POST['selisih_pc'];
    $nilai_bobot_pc = $_POST['nilai_bobot_pc'];
    $nilai_as       = $_POST['nilai_as'];
    $target_as      = $_POST['target_as'];
    $selisih_as     = $_POST['selisih_as'];
    $nilai_bobot_as = $_POST['nilai_bobot_as'];
    $nilai_cc       = $_POST['nilai_cc'];
    $target_cc      = $_POST['target_cc'];
    $selisih_cc     = $_POST['selisih_cc'];
    $nilai_bobot_cc = $_POST['nilai_bobot_cc'];
    $nilai_dw       = $_POST['nilai_dw'];
    $target_dw      = $_POST['target_dw'];
    $selisih_dw     = $_POST['selisih_dw'];
    $nilai_bobot_dw = $_POST['nilai_bobot_dw'];
    $nilai_ca       = $_POST['nilai_ca'];
    $target_ca      = $_POST['target_ca'];
    $selisih_ca     = $_POST['selisih_ca'];
    $nilai_bobot_ca = $_POST['nilai_bobot_ca'];
    $nilai_cf_A7    = $_POST['nilai_cf_A7'];
    $nilai_sf_A7    = $_POST['nilai_sf_A7'];
    $nilai_tot_A7   = $_POST['nilai_tot_A7'];

    $rightmidfielder->update($kdnilai2, $kdpemain, $nilai_pc, $target_pc, $selisih_pc, $nilai_bobot_pc, $nilai_as, $target_as, $selisih_as, $nilai_bobot_as, $nilai_cc, $target_cc, $selisih_cc, $nilai_bobot_cc, $nilai_dw, $target_dw, $selisih_dw, $nilai_bobot_dw, $nilai_ca, $target_ca, $selisih_ca, $nilai_bobot_ca, $nilai_cf_A7, $nilai_sf_A7, $nilai_tot_A7);
}
