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

<?php
require_once "class/pegawai.php";
$pemain = new pegawai();
?>

<html>

<head>
  <title>Data Pemain</title>

  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" />
  </link>
</head>

<body>
  <div id="header">
    <!--     <img src="img/header.png"> -->
    <!-- <img src="img/pm_header.png"> -->
  </div>

  <?php include_once "sidebar.php"; ?>

  <div class="content">
    <i class="fa fa-users" style="font-size: 28px;"><span style="padding-left: 15px;">Data Pemain</span></i>
    <div id="box">
      <div class="box-top"><i>Menampilkan Data Pemain</i></div>
      <div class="box-panel">
        <table width=100%;>
          <tr>
            <td style="width:65%; padding-top:15px;"><a href="inputpegawai.php">
                <button class="btn"><i class="fa fa-plus" style="font-size:16px">
                    <span style="padding-left: 5px"> Pemain</span></i></button></a></span>
            </td>
            <td>
              <form method="post" action="datapegawai.php">
                <?php
                $cari = $_POST['caripemain'];

                if ($_POST['caripemain']) {
                  echo '
              <a href="datapegawai.php" style="font-size:12px;">Reset Pencarian</>
              <input type="text" name="caripemain" placeholder="Cari Pemain" value=' . $cari . '>';
                } else {
                  echo '<input type="text" name="caripemain" placeholder="Cari Pemain">';
                }
                ?>
                <button type="submit" class="btn">
                  <i class="fa fa-search" style="font-size:16px;"></i>
                </button>
              </form>
            </td>
          </tr>

          <?php
          $pemain->tampil($cari);
          ?>
      </div>
    </div>
  </div>
</body>

</html>