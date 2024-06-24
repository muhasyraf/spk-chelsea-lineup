<?php
  session_start();
  if(!isset($_SESSION['nama']))
  {
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
  <link rel="stylesheet" type="text/css" href="css/global.css" /></link>

  <div id="header">
    <!-- <img src="img/pm_header.png"> -->
  </div>

  <?php include_once "sidebar.php"; ?>
</head>

<body>
  <div class="content">
    <i class="fa fa-plus-square" style="font-size: 26px;"><span style="padding-left: 15px">Input Nilai <small>&raquo; Forward</small></i>

  <div id="container">
      <div id="box">
        <div class="box-top"><i>Menambahkan Nilai Forward</i></div>
        <div class="box-panel">
					<form method="POST" action="prosesnilai_cf.php">
					<table class="table">
            <tr>

							<td style="text-align: right">Nama Pemain</td>
							<td>
                <select class="form-control" name="kdpemain" required>
                  <option value=""></option>
                  <?php
                    require_once "database.php";
                    $db  = new database();
                    $kon = $db->connect();
                    $qcek = $kon->query("SELECT * FROM pm_pemain WHERE posisi='CF'");
                    while ($row = $qcek->fetch_array()) {
                      echo"<option value='".$row['kdpemain']."'>".$row['namapemain']."</option>";
                    }
                  ?>
        		</select>
              </td>
			</tr>
            <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
            <tr>
                <td style="text-align: right">Goals</td>
                    <td>
                    <select class="form-control" name="nilai_go" id="nilai_go" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </td>
                    <td style="text-align: right">Nilai Target</td>
                    <td>
                    <select class="form-control" name="target_go" style="width: 50px" oninput="setGapGO()" id="target_go" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <!-- <input type="text" style="width: 80px" name="target_dm" oninput="setGapDm()" id="target_dm" required> -->
                    </td>
                    <td style="text-align: right">Gap</td>
                    <td>
                    <input type="text" style="width: 50px" name="selisih_go" id="selisih_go" readonly>
                    </td>
                    <td style="padding-left: 20px">Bobot</td>
                    <td>
                    <input type="text" style="width: 50px" name="nilai_bobot_go" id="nilai_bobot_go" readonly>
                    </td>
                            </tr>
                            <tr>
                    <td style="text-align: right">Assists</td>
                    <td>
                    <select class="form-control" name="nilai_as" id="nilai_as" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </td>
                    <td style="text-align: right">Nilai Target</td>
                    <td>
                    <select class="form-control" name="target_as" style="width: 50px" oninput="setGapAS()" id="target_as" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </td>
                    <td style="text-align: right">Gap</td>
                    <td>
                    <input type="text" style="width: 50px" name="selisih_as" id="selisih_as" readonly>
                    </td>
                    <td style="padding-left: 20px">Bobot</td>
                    <td>
                    <input type="text" style="width: 50px" name="nilai_bobot_as" id="nilai_bobot_as" readonly>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">Duels Won</td>
                    <td>
                        <select class="form-control" name="nilai_dw" id="nilai_dw" required>
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
                    <td style="padding-left: 20px">Bobot</td>
                    <td>
                        <input type="text" style="width: 50px" name="nilai_bobot_dw" id="nilai_bobot_dw" readonly>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">Touches in opposition box</td>
                    <td>
                        <select class="form-control" name="nilai_tb" id="nilai_tb" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                    <td style="text-align: right">Nilai Target</td>
                    <td>
                    <select class="form-control" name="target_tb" style="width: 50px" oninput="setGapTB()" id="target_tb" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    </td>
                    <td style="text-align: right">Gap</td>
                    <td>
                    <input type="text" style="width: 50px" name="selisih_tb" id="selisih_tb" readonly>
                    </td>
                    <td style="padding-left: 20px">Bobot</td>
                    <td>
                    <input type="text" style="width: 50px" name="nilai_bobot_tb" id="nilai_bobot_tb" readonly>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">Shots on Target</td>
                    <td>
                        <select class="form-control" name="nilai_st" id="nilai_st" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        </td>
                        <td style="text-align: right">Nilai Target</td>
                        <td>
                        <select class="form-control" name="target_st" style="width: 50px" oninput="setGapST()" id="target_st" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        </td>
                        <td style="text-align: right">Gap</td>
                        <td>
                        <input type="text" style="width: 50px" name="selisih_st" id="selisih_st" readonly>
                        </td>
                        <td style="padding-left: 20px">Bobot</td>
                        <td>
                        <input type="text" style="width: 50px" name="nilai_bobot_st" id="nilai_bobot_st" readonly>
                        </td>
                </tr>
                

            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td style="text-align: right">Nilai Core Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_cf_A9" id="nilai_cf_A9" readonly>
              </td>

              <td style="text-align: right; padding-left: 40px">Nilai Secondary<br> Factor</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_sf_A9" id="nilai_sf_A9" readonly>
              </td>

              <td style="text-align: right; padding-left: 20px">Nilai Total</td>
              <td>
                <input type="text" style="width: 80px" name="nilai_tot_A9" id="nilai_tot_A9" readonly>
              </td>
            </tr>
            <tr><td></td></tr><tr><td></td></tr>
            <tr>
              <td></td>
              <td colspan="2"><button type="submit" class="btn-save" name="simpan">
								<i class="fa fa-save" style="font-size:16px"><span style="padding-left: 5px">Simpan</i></button>
                  <span style="padding-left: 50px"><a href="inputnilai_cf.php" class="btn-delete">
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
    function setGapGO(){
  		var n = document.getElementById("nilai_go").value;
  		var t = document.getElementById("target_go").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_go").value = s;
  		document.getElementById("nilai_bobot_go").value = nb;
  	}

    function setGapAS(){
  		var n = document.getElementById("nilai_as").value;
  		var t = document.getElementById("target_as").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_as").value = s;
  		document.getElementById("nilai_bobot_as").value = nb;
  	}

    function setGapTB(){
  		var n = document.getElementById("nilai_tb").value;
  		var t = document.getElementById("target_tb").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_tb").value = s;
  		document.getElementById("nilai_bobot_tb").value = nb;
  	}

    function setGapDW(){
  		var n = document.getElementById("nilai_dw").value;
  		var t = document.getElementById("target_dw").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_dw").value = s;
  		document.getElementById("nilai_bobot_dw").value = nb;
    }

      function setGapST(){
  		var n = document.getElementById("nilai_st").value;
  		var t = document.getElementById("target_st").value;
  		var s = n-t;
  		if(s == 0){
  			nb = 5
  		}else if(s == 1){
  			nb = 4.5
  		}else if(s == -1){
  			nb = 4
  		}else if(s == 2){
  			nb = 3.5
  		}else if(s == -2){
  			nb = 3
  		}else if(s == 3){
  			nb = 2.5
  		}else if(s == -3){
  			nb = 2
  		}else if(s == 4){
  			nb = 1.5
  		}else if(s == -4){
  			nb = 1
  		}
  		document.getElementById("selisih_st").value = s;
  		document.getElementById("nilai_bobot_st").value = nb;


      var go  = document.getElementById("nilai_bobot_go").value;
      var as = document.getElementById("nilai_bobot_as").value;
      var tb = document.getElementById("nilai_bobot_tb").value;
      var dw  = document.getElementById("nilai_bobot_dw").value;
      var st  = document.getElementById("nilai_bobot_st").value;

      var cf  = (parseFloat(go)  + parseFloat(as) + parseFloat(st)) / 3;
      var sf  = (parseFloat(dw) + parseFloat(tb)) / 2;
      var nt  = (cf * 0.6) + (sf * 0.4);

    	document.getElementById("nilai_cf_A9").value  = cf;
        document.getElementById("nilai_sf_A9").value  = sf;
    	document.getElementById("nilai_tot_A9").value = nt;
  	}
  </script>

  </body>
  </html>
