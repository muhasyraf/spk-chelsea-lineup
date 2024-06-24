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
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Nilai <small>&raquo; Goalkeeper</small></i>

    <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Nilai Goalkeeper</i></div>
        <div class="box-panel">
          <form method="POST" action="prosesnilai_gk.php">
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
                    $qcek = $kon->query("SELECT * FROM pm_pemain WHERE posisi='GK'");
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
                <td style="text-align: right">Saves Made</td>
                <td>
                  <select class="form-control" name="nilai_sm" id="nilai_sm" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_sm" style="width: 50px" oninput="setGapSM()" id="target_sm" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>

                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_sm" id="selisih_sm" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_sm" id="nilai_bobot_sm" readonly>
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
                <td style="text-align: right">Long Pass <br>Accuracy</td>
                <td>
                  <select class="form-control" name="nilai_lpc" id="nilai_lpc" onclick="setHitungCf" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_lpc" style="width: 50px" oninput="setGapLPC()" id="target_lpc" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_lpc" id="selisih_lpc" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_lpc" id="nilai_bobot_lpc" readonly>
                </td>
              </tr>
              <tr>
                <td style="text-align: right">Clean Sheets</td>
                <td>
                  <select class="form-control" name="nilai_cs" id="nilai_cs" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Nilai Target</td>
                <td>
                  <select class="form-control" name="target_cs" style="width: 50px" oninput="setGapCS()" id="target_cs" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </td>
                <td style="text-align: right">Gap</td>
                <td>
                  <input type="text" style="width: 50px" name="selisih_cs" id="selisih_cs" readonly>
                </td>
                <td style="padding-left: 30px">Bobot</td>
                <td>
                  <input type="text" style="width: 50px" name="nilai_bobot_cs" id="nilai_bobot_cs" readonly>
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
                  <input type="text" style="width: 80px" name="nilai_cf_A1" id="nilai_cf_A1" readonly>
                </td>

                <td style="padding-left: 40px; text-align: right">Nilai Secondary <br>Factor</td>
                <td>
                  <input type="text" style="width: 80px" name="nilai_sf_A1" id="nilai_sf_A1" readonly>
                </td>

                <td style="padding-left: 30px">Nilai Total</td>
                <td>
                  <input type="text" style="width: 80px" name="nilai_tot_A1" id="nilai_tot_A1">
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
    function setGapSM() {
      var n = document.getElementById("nilai_sm").value;
      var t = document.getElementById("target_sm").value;
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
      document.getElementById("selisih_sm").value = s;
      document.getElementById("nilai_bobot_sm").value = nb;
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

    function setGapLPC() {
      var n = document.getElementById("nilai_lpc").value;
      var t = document.getElementById("target_lpc").value;
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
      document.getElementById("selisih_lpc").value = s;
      document.getElementById("nilai_bobot_lpc").value = nb;
    }

    function setGapCS() {
      var n = document.getElementById("nilai_cs").value;
      var t = document.getElementById("target_cs").value;
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
      document.getElementById("selisih_cs").value = s;
      document.getElementById("nilai_bobot_cs").value = nb;

      var sm = document.getElementById("nilai_bobot_sm").value;
      var pc = document.getElementById("nilai_bobot_pc").value;
      var lpc = document.getElementById("nilai_bobot_lpc").value;
      var cs = document.getElementById("nilai_bobot_cs").value;
      var cf = (parseInt(sm) + parseInt(cs)) / 2;
      var sf = (parseFloat(pc) + parseFloat(lpc)) / 2;
      var nt = (cf * 0.6) + (sf * 0.4);

      document.getElementById("nilai_cf_A1").value = cf;
      document.getElementById("nilai_sf_A1").value = sf;
      document.getElementById("nilai_tot_A1").value = nt;
    }
  </script>
</body>

</html>