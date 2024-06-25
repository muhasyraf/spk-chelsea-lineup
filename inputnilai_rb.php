<?php
session_start();
if (!isset($_SESSION['nama'])) {
    echo "
      <script type=text/javascript>
        alert('Silakan login terlebih dahulu !');
        window.location = 'login.php';
      </script>
    ";
    exit;
}
?>

<html>

<head>
    <title>Input Nilai</title>
    <link rel="shortcut icon" href="img/favicon.png">

    <link href="icon/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/global.css" />
    </link>

    <div id="header">
        <!-- <img src="img/pm_header.png"> -->
    </div>

    <?php include_once "sidebar.php"; ?>
</head>

<body>
    <div class="content">
        <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Nilai <small>&raquo; Right Back</small></i>

        <div id="container">
            <div id="box">
                <div class="box-top"><i>Menambahkan Nilai Right Back</i></div>
                <div class="box-panel">
                    <form method="POST" action="prosesnilai_rb.php">
                        <table class="table">
                            <tr>
                                <td style="text-align: right">Nama Pemain</td>
                                <td>
                                    <select class="form-control" style="width: 140px" name="kdpemain" required>
                                        <option value=""></option>
                                        <?php
                                        require_once "database.php";
                                        $db  = new database();
                                        $kon = $db->connect();
                                        $qcek = $kon->query("SELECT * FROM pm_pemain WHERE posisi='RB'");
                                        while ($row = $qcek->fetch_array()) {
                                            echo "<option value='" . $row['kdpemain'] . "'>" . $row['namapemain'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Tackles Made</td>
                                <td>
                                    <select class="form-control" name="nilai_tm" id="nilai_tm" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Nilai Target</td>
                                <td>
                                    <select class="form-control" name="target_tm" style="width: 50px" oninput="setGapTM()" id="target_tm" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>

                                </td>
                                <td style="text-align: right">Gap</td>
                                <td>
                                    <input type="text" style="width: 50px" name="selisih_tm" id="selisih_tm" readonly>
                                </td>
                                <td style="padding-left: 30px">Bobot</td>
                                <td>
                                    <input type="text" style="width: 50px" name="nilai_bobot_tm" id="nilai_bobot_tm" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Passes <br>Completed</td>
                                <td>
                                    <select class="form-control" name="nilai_pc" id="nilai_pc" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Nilai Target</td>
                                <td>
                                    <select class="form-control" name="target_pc" style="width: 50px" oninput="setGapPC()" id="target_pc" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Gap</td>
                                <td>
                                    <input type="text" style="width: 50px" name="selisih_pc" id="selisih_pc" readonly>
                                </td>
                                <td style="padding-left: 30px">Bobot</td>
                                <td>
                                    <input type="text" style="width: 50px" name="nilai_bobot_pc" id="nilai_bobot_pc" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Duels Won</td>
                                <td>
                                    <select class="form-control" name="nilai_dw" id="nilai_dw" onclick="setHitungCf" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Nilai Target</td>
                                <td>
                                    <select class="form-control" name="target_dw" style="width: 50px" oninput="setGapDW()" id="target_dw" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Gap</td>
                                <td>
                                    <input type="text" style="width: 50px" name="selisih_dw" id="selisih_dw" readonly>
                                </td>
                                <td style="padding-left: 30px">Bobot</td>
                                <td>
                                    <input type="text" style="width: 50px" name="nilai_bobot_dw" id="nilai_bobot_dw" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Crosses Attempted</td>
                                <td>
                                    <select class="form-control" name="nilai_ca" id="nilai_ca" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Nilai Target</td>
                                <td>
                                    <select class="form-control" name="target_ca" style="width: 50px" oninput="setGapCA()" id="target_ca" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Gap</td>
                                <td>
                                    <input type="text" style="width: 50px" name="selisih_ca" id="selisih_ca" readonly>
                                </td>
                                <td style="padding-left: 30px">Bobot</td>
                                <td>
                                    <input type="text" style="width: 50px" name="nilai_bobot_ca" id="nilai_bobot_ca" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Clearances</td>
                                <td>
                                    <select class="form-control" name="nilai_cr" id="nilai_cr" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Nilai Target</td>
                                <td>
                                    <select class="form-control" name="target_cr" style="width: 50px" oninput="setGapCR()" id="target_cr" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                                <td style="text-align: right">Gap</td>
                                <td>
                                    <input type="text" style="width: 50px" name="selisih_cr" id="selisih_cr" readonly>
                                </td>
                                <td style="padding-left: 30px">Bobot</td>
                                <td>
                                    <input type="text" style="width: 50px" name="nilai_bobot_cr" id="nilai_bobot_cr" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="text-align: right">Nilai Core Factor</td>
                                <td>
                                    <input type="text" style="width: 80px" name="nilai_cf_A4" id="nilai_cf_A4" readonly>
                                </td>

                                <td style="padding-left: 40px; text-align: right">Nilai Secondary <br>Factor</td>
                                <td>
                                    <input type="text" style="width: 80px" name="nilai_sf_A4" id="nilai_sf_A4" readonly>
                                </td>

                                <td style="padding-left: 30px">Nilai Total</td>
                                <td>
                                    <input type="text" style="width: 80px" name="nilai_tot_A4" id="nilai_tot_A4">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"><button type="submit" class="btn-save" name="simpan">
                                        <i class="fa fa-save" style="font-size:16px"><span style="padding-left: 5px">Simpan</i></button>
                                    <span style="padding-left: 50px"><a href="inputnilai_ki.php" class="btn-delete">
                                            <i class="fa fa-close" style="font-size:16px">
                                                <span style="padding-left: 5px">Batal</i></a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setGapTM() {
            var n = document.getElementById("nilai_tm").value;
            var t = document.getElementById("target_tm").value;
            var s = n - t;
            if (s == 0) {
                nb = 5
            } else if (s == 1) {
                nb = 4.5
            } else if (s == -1) {
                nb = 4
            } else if (s == 2) {
                nb = 3.5
            } else if (s == -2) {
                nb = 3
            } else if (s == 3) {
                nb = 2.5
            } else if (s == -3) {
                nb = 2
            } else if (s == 4) {
                nb = 1.5
            } else if (s == -4) {
                nb = 1
            }
            document.getElementById("selisih_tm").value = s;
            document.getElementById("nilai_bobot_tm").value = nb;
        }

        function setGapPC() {
            var n = document.getElementById("nilai_pc").value;
            var t = document.getElementById("target_pc").value;
            var s = n - t;
            if (s == 0) {
                nb = 5
            } else if (s == 1) {
                nb = 4.5
            } else if (s == -1) {
                nb = 4
            } else if (s == 2) {
                nb = 3.5
            } else if (s == -2) {
                nb = 3
            } else if (s == 3) {
                nb = 2.5
            } else if (s == -3) {
                nb = 2
            } else if (s == 4) {
                nb = 1.5
            } else if (s == -4) {
                nb = 1
            }
            document.getElementById("selisih_pc").value = s;
            document.getElementById("nilai_bobot_pc").value = nb;
        }

        function setGapDW() {
            var n = document.getElementById("nilai_dw").value;
            var t = document.getElementById("target_dw").value;
            var s = n - t;
            if (s == 0) {
                nb = 5
            } else if (s == 1) {
                nb = 4.5
            } else if (s == -1) {
                nb = 4
            } else if (s == 2) {
                nb = 3.5
            } else if (s == -2) {
                nb = 3
            } else if (s == 3) {
                nb = 2.5
            } else if (s == -3) {
                nb = 2
            } else if (s == 4) {
                nb = 1.5
            } else if (s == -4) {
                nb = 1
            }
            document.getElementById("selisih_dw").value = s;
            document.getElementById("nilai_bobot_dw").value = nb;
        }

        function setGapCA() {
            var n = document.getElementById("nilai_ca").value;
            var t = document.getElementById("target_ca").value;
            var s = n - t;
            if (s == 0) {
                nb = 5
            } else if (s == 1) {
                nb = 4.5
            } else if (s == -1) {
                nb = 4
            } else if (s == 2) {
                nb = 3.5
            } else if (s == -2) {
                nb = 3
            } else if (s == 3) {
                nb = 2.5
            } else if (s == -3) {
                nb = 2
            } else if (s == 4) {
                nb = 1.5
            } else if (s == -4) {
                nb = 1
            }
            document.getElementById("selisih_ca").value = s;
            document.getElementById("nilai_bobot_ca").value = nb;

        }

        function setGapCR() {
            var n = document.getElementById("nilai_cr").value;
            var t = document.getElementById("target_cr").value;
            var s = n - t;
            if (s == 0) {
                nb = 5
            } else if (s == 1) {
                nb = 4.5
            } else if (s == -1) {
                nb = 4
            } else if (s == 2) {
                nb = 3.5
            } else if (s == -2) {
                nb = 3
            } else if (s == 3) {
                nb = 2.5
            } else if (s == -3) {
                nb = 2
            } else if (s == 4) {
                nb = 1.5
            } else if (s == -4) {
                nb = 1
            }
            document.getElementById("selisih_cr").value = s;
            document.getElementById("nilai_bobot_cr").value = nb;

            var tm = document.getElementById("nilai_bobot_tm").value;
            var pc = document.getElementById("nilai_bobot_pc").value;
            var dw = document.getElementById("nilai_bobot_dw").value;
            var ca = document.getElementById("nilai_bobot_ca").value;
            var cr = document.getElementById("nilai_bobot_cr").value;
            var cf = (parseFloat(tm) + parseFloat(dw) + parseFloat(ca)) / 3;
            var sf = (parseFloat(pc) + parseFloat(cr)) / 2;
            var nt = (cf * 0.6) + (sf * 0.4);

            document.getElementById("nilai_cf_A4").value = cf;
            document.getElementById("nilai_sf_A4").value = sf;
            document.getElementById("nilai_tot_A4").value = nt;
        }
    </script>
</body>

</html>