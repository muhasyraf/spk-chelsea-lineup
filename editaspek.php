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
  <title>Edit Posisi</title>
  <link rel="shortcut icon" href="img/favicon.png">

  <link href="icon/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/global.css" />
  </link>

  <div id="header">
    <img src="img/pm_header.png">
  </div>
</head>

<body>
  <?php include_once "sidebar.php"; ?>

  <div class="content">
    <i class="fa fa-edit" style="font-size: 26px;"><span style="padding-left: 15px;">Form Edit Posisi</i>

    <?php
    $id = $_GET['id_posisi'];

    require_once "database.php";
    $db = new database();
    $kon = $db->connect();
    $query = $kon->query("SELECT * FROM pm_aspek where id_posisi='$id'");
    while ($row = $query->fetch_array()) {
      $idaspek    = $row['id_posisi'];
      $namaposisi  = $row['namaposisi'];
    }
    ?>

    <div id="container">
      <div id="box">
        <div class="box-top"><i>Mengubah Data Posisi</i></div>
        <div class="box-panel">
          <form method="POST" action="prosesaspek.php">
            <table class="table">
              <tr>
                <td>ID Posisi</td>
                <td><input type="text" name="id_posisi" readonly value="<?= $idaspek; ?>"></td>
              </tr>
              <tr>
                <td>Aspek</td>
                <td><input type="text" name="namaposisi" value="<?= $namaposisi; ?>"></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <tr>
                <td></td>
              </tr>
              <td></td>
              <td>
                <button type="submit" class="btn" name="update">
                  <i class="fa fa-save" style="font-size:16px">
                    <span style="padding-left: 5px">Update</i>
                </button>
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