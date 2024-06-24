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
  <title>Edit Pemain</title>
  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" />
  </link>
</head>

<body>
  <div id="header">
    <img src="img/header.png">
  </div>

  <?php include_once "sidebar.php"; ?>

  <div class="content">
    <i class="fa fa-edit" style="font-size: 26px;"><span style="padding-left: 15px;">Form Edit Pegawai</i>

    <?php
    $id = $_GET['kdpemain'];

    require_once "database.php";
    $db = new database();
    $kon = $db->connect();
    $query = $kon->query("SELECT * FROM pm_pemain where kdpemain='$id'");
    while ($row = $query->fetch_array()) {
      $kdpemain    = $row['kdpemain'];
      $namapemain  = $row['namapemain'];
      $posisi    = $row['posisi'];
    }
    ?>

    <div id="container">
      <div id="box">
        <div class="box-top"><i>Mengubah Data Pemain</i></div>
        <div class="box-panel">
          <form method="POST" action="prosespegawai.php">
            <table class="table">
              <tr>
                <td>Kode Pemain</td>
                <td><input type="text" name="kdpemain" readonly value="<?= $kdpemain; ?>"></td>
              </tr>
              <tr>
                <td>Nama Pemain</td>
                <td><input type="text" name="namapemain" value="<?= $namapemain; ?>"></td>
              </tr>
              <tr>
                <td>Posisi</td>
                <td><input type="text" name="posisi" value="<?= $posisi; ?>"></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <td></td>
              <td>
                <button type="submit" class="btn-default" name="update">
                  <i class="fa fa-save" style="font-size:16px">
                    <span style="padding-left: 5px">Update</i>
                </button>
              </td>
              </tr>
            </table>
          </form>
        </div>
        <div class="box-bottom">&copy; <strong>2018</strong> - All Rights Reserved
          <span style="font-size: 28px; padding-left: 5px; padding-right: 5px">|</span>
          Developed by: <strong>Randi Triyudanto</strong>
        </div>
      </div>
    </div>
  </div>
</body>

</html>