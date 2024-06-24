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
  <title>Input Pemain</title>
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
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Data Pemain</i>

    <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Data Pemain</i></div>
        <div class="box-panel">
          <form method="POST" action="prosespegawai.php">
            <table class="table">
              <tr>
                <td style="text-align: right">Kode Pemain</td>
                <td><input type="text" name="kdpemain"></td>
              </tr>
              <tr>
                <td style="text-align: right">Nama Pemain</td>
                <td><input type="text" name="namapemain"></td>
              </tr>
              <tr>
                <td style="text-align: right">Posisi</td>
                <td><input type="text" name="posisi"></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <td></td>
              <td>
                <button type="submit" class="btn-save" name="simpan">
                  <i class="fa fa-save" style="font-size:16px">
                    <span style="padding-left: 5px">Simpan</i>
                </button>
                <span style="padding-left: 20px"><a href="datapegawai.php" class="btn-default">
                    <i class="fa fa-backward" style="font-size:16px">
                      <span style="padding-left: 5px">Pemain</i></button></a>
              </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>