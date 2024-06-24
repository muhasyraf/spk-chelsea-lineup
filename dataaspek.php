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
require_once "class/aspek.php";
$aspek = new aspek()
?>

<html>

<head>
  <title>Data Posisi</title>
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
    <i class="fa fa-th-large" style="font-size: 28px;"><span style="padding-left: 15px;">Data Posisi</span></i>
    <div id="box">
      <div class="box-top"><i>Menampilkan Data Posisi</i></div>
      <div class="box-panel">
        <table width=100%;>
          <tr>
            <td style="width:65%; padding-top:15px;"><a href="inputaspek.php">
                <button class="btn"><i class="fa fa-plus" style="font-size:16px">
                    <span style="padding-left: 5px"> Posisi</span></i></button></a></span>
            </td>
            <td>
              <form method="post" action="dataaspek.php">
                <?php
                $cari = $_POST['cariposisi'];

                if ($_POST['cariposisi']) {
                  echo '
              <a href="dataaspek.php" style="font-size:12px;">Reset Pencarian</>
              <input type="text" name="cariposisi" placeholder="Cari Posisi" value=' . $cari . '>';
                } else {
                  echo '<input type="text" name="cariposisi" placeholder="Cari Posisi">';
                }
                ?>
                <button type="submit" class="btn">
                  <i class="fa fa-search" style="font-size:16px;"></i>
                </button>
              </form>
            </td>
          </tr>

          <?php
          $aspek->tampil($cari);
          ?>
      </div>
    </div>
  </div>
</body>

</html>