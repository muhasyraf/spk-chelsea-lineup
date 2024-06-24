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
  <!-- <div id="header"><img src="img/pm_header.png"></div> -->

  <?php include_once "sidebar.php"; ?>
</head>

<body>
  <div class="content">
    <i class="fa fa-calculator" style="font-size: 28px;"><span style="padding-left: 15px;">Input Penilaian</span></i>

    <div id="box">
      <div class="box-top"><i>Menginput Data Nilai Pemain</i></div>
      <div class="box-panel">
        <span style="font-size: 16px">Silakan pilih <strong>posisi pemain</strong> yang hendak diinput:<br>
          <table style="margin-top: 20px">
            <tr>
              <td>Nama Posisi</td>
              <td>
                <select style="width: 180px" class="form-control" name="id_posisi" id="id_posisi" onchange="inputNilai()" required>
                  <option value="">-- Pilih Posisi --</option>
                  <?php
                  require_once "database.php";
                  $db  = new database();
                  $kon = $db->connect();
                  $qcek = $kon->query("SELECT * from pm_posisi");
                  while ($row = $qcek->fetch_array()) {
                  ?>
                    <option value='<?= $row['id_posisi'] ?>'><?= $row['namaposisi'] ?></option>;
                  <?php
                  }
                  ?>
                </select>
              </td>
            </tr>
          </table>
          <br>
      </div>
    </div>
  </div>

  <?php
  require_once "database.php";
  $db  = new database();
  $kon = $db->connect();

  $id_posisi = $_POST['namaposisi'];
  ?>

  <script>
    function inputNilai() {
      let x = document.getElementById("id_posisi").value;
      if (x == "GK") {
        window.location = 'inputnilai_gk.php';
      } else if (x == "CB") {
        window.location = 'inputnilai_cb.php';
      } else if (x == "LB") {
        window.location = 'inputnilai_lb.php';
      } else if (x == "RB") {
        window.location = 'inputnilai_rb.php';
      } else if (x == "CMF") {
        window.location = 'inputnilai_cmf.php';
      } else if (x == "LMF") {
        window.location = 'inputnilai_lmf.php';
      } else if (x == "RMF") {
        window.location = 'inputnilai_rmf.php';
      } else if (x == "AMF") {
        window.location = 'inputnilai_amf.php';
      } else if (x == "CF") {
        window.location = 'inputnilai_cf.php';
      }
    }
  </script>
</body>

</html>