<?php

class CentreBack
{

	function tampil($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_cb, pm_pemain where pm_cb.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%">No.</td>
					<td width="20%">Nama Pemain</td>
					<td width="15%">Passes Completed</td>
					<td width="15%">Tackles Made</td>
					<td width="15%">Duels Won</td>
					<td width="15%">Clearances</td>
					<td width="15%">Clean Sheets</td>
					<td width="10%">Edit</td>
				</tr>
			</thead>

			<tbody>';
		$no = 1;
		while ($row = $query->fetch_array()) {

			echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td>' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['nilai_pc'] . '</td>
							<td style="text-align: center">' . $row['nilai_tm'] . '</td>
							<td style="text-align: center">' . $row['nilai_dw'] . '</td>
							<td style="text-align: center">' . $row['nilai_cr'] . '</td>
							<td style="text-align: center">' . $row['nilai_cs'] . '</td>
							<td style="text-align: center"><a href="editnilai_cb.php?kdnilai3=' . $row['kdnilai3'] . '">
							<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>
						</tr>';
			$no++;
			$target_pc  = $row['target_pc'];
			$target_tm = $row['target_tm'];
			$target_dw  = $row['target_dw'];
			$target_cr  = $row['target_cr'];
			$target_cs  = $row['target_cs'];

		}
		echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">' . $target_pc . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_tm . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_dw . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_cr . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_cs . '</td>
						</tr>
					</thead>
				</table>
				';
	}

	function input(
		$kdpemain,
		$nilai_pc,
		$target_pc,
		$selisih_pc,
		$nilai_bobot_pc,
		$nilai_tm,
		$target_tm,
		$selisih_tm,
		$nilai_bobot_tm,
		$nilai_dw,
		$target_dw,
		$selisih_dw,
		$nilai_bobot_dw,
		$nilai_cr,
		$target_cr,
		$selisih_cr,
		$nilai_bobot_cr,
		$nilai_cs,
		$target_cs,
		$selisih_cs,
		$nilai_bobot_cs,
		$nilai_cf_A3,
		$nilai_sf_A3,
		$nilai_tot_A3
	) {
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_cb (kdpemain, nilai_pc, target_pc, selisih_pc, nilai_bobot_pc,
																		nilai_tm, target_tm, selisih_tm, nilai_bobot_tm,
						 												nilai_dw, target_dw, selisih_dw, nilai_bobot_dw,
																		nilai_cr, target_cr, selisih_cr, nilai_bobot_cr,
																		nilai_cs, target_cs, selisih_cs, nilai_bobot_cs,
																		nilai_cf_A3, nilai_sf_A3, nilai_tot_A3)
						 VALUES ('$kdpemain', '$nilai_pc', '$target_pc', '$selisih_pc','$nilai_bobot_pc',
							 			 '$nilai_tm', '$target_tm', '$selisih_tm', '$nilai_bobot_tm',
							 		 	 '$nilai_dw', '$target_dw', '$selisih_dw', '$nilai_bobot_dw',
							 		 	 '$nilai_cr', '$target_cr', '$selisih_cr', '$nilai_bobot_cr',
										 '$nilai_cs', '$target_cs', '$selisih_cs', '$nilai_bobot_cs',
									 	 '$nilai_cf_A3', '$nilai_sf_A3', '$nilai_tot_A3')";
		$qcek = $kon->query("select * from pm_cb where kdnilai3='$kdnilai3'");
		$jmbaris = $qcek->num_rows;
		if ($jmbaris == 1) {
			echo "<script>alert('Data Sudah Ada'); window.location='inputnilai_cb.php';</script>";
		} else {
			$simpan = $kon->query("$query");

			if ($simpan) {
				echo "<script>alert('Data Berhasil Ditambahkan'); window.location='hasil_cb.php';</script>";
			} else {
				echo "<script>alert('GAGAL Menambahkan Data'); window.location='inputnilai_cb.php';</script>";
			}
		}
	}

	function selisih($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_cb, pm_pemain where pm_cb.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="10%">No.</td>
					<td width="20%">Nama Pemain</td>
					<td width="15%">Passes Completed</td>
					<td width="15%">Tackles Made</td>
					<td width="15%">Duels Won</td>
					<td width="15%">Clearances</td>
					<td width="15%">Clean Sheets</td>
				</tr>
			</thead>

			<tbody>';
		$no = 1;
		while ($row = $query->fetch_array()) {

			echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td>' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['selisih_pc'] . '</td>
							<td style="text-align: center">' . $row['selisih_tm'] . '</td>
							<td style="text-align: center">' . $row['selisih_dw'] . '</td>
							<td style="text-align: center">' . $row['selisih_cr'] . '</td>
							<td style="text-align: center">' . $row['selisih_cs'] . '</td>
						</tr>';
			$no++;
		}
		echo '
					</tbody>
				</table>
				';
	}

	function factor($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_cb, pm_pemain where pm_cb.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%">No.</td>
					<td width="20%">Nama Pemain</td>
					<td width="15%">Passes Completed</td>
					<td width="15%">Tackles Made</td>
					<td width="15%">Duels Won</td>
					<td width="15%">Clearances</td>
					<td width="15%">Clean Sheets</td>
					<td width="7%">Nilai CF</td>
					<td width="7%">Nilai SF</td>
					<td width="7%">Nilai Total</td>
				</tr>
			</thead>

			<tbody>';
		$no = 1;
		while ($row = $query->fetch_array()) {

			echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td>' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_pc'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_tm'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_dw'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_cr'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_cs'] . '</td>
							<td style="text-align: center">' . round($row['nilai_cf_A3'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_sf_A3'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_tot_A3'], 2) . '</td>
						</tr>';
			$no++;
		}
		$qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'CBTM' or kdkriteria = 'CBDW' or kdkriteria = 'CBCR'");
		$dtcore = $qkriteria_core->fetch_array();
		$jenis_core = $dtcore['jenis'];

		$qkriteria_sec = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'CBPC' or kdkriteria = 'CBCS'");
		$dtsec = $qkriteria_sec->fetch_array();
		$jenis_sec = $dtsec['jenis'];

		echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_secon . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_secon . '</td>

						</tr>
					</thead>
				</table>
				';
	}

	function update(
		$kdnilai3,
		$kdpemain,
		$nilai_pc,
		$target_pc,
		$selisih_pc,
		$nilai_bobot_pc,
		$nilai_tm,
		$target_tm,
		$selisih_tm,
		$nilai_bobot_tm,
		$nilai_dw,
		$target_dw,
		$selisih_dw,
		$nilai_bobot_dw,
		$nilai_cr,
		$target_cr,
		$selisih_cr,
		$nilai_bobot_cr,
		$nilai_cs,
		$target_cs,
		$selisih_cs,
		$nilai_bobot_cs,
		$nilai_cf_A3,
		$nilai_sf_A3,
		$nilai_tot_A3
	) {
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_cb SET kdpemain='$kdpemain', nilai_pc='$nilai_pc',
							target_pc='$target_pc', selisih_pc='$selisih_pc', nilai_bobot_pc='$nilai_bobot_pc',
							nilai_tm='$nilai_tm', target_tm='$target_tm', selisih_tm='$selisih_tm', nilai_bobot_tm='$nilai_bobot_tm',
							nilai_dw='$nilai_dw', target_dw='$target_dw', selisih_dw='$selisih_dw', nilai_bobot_dw='$nilai_bobot_dw',
							nilai_cr='$nilai_cr', target_cr='$target_cr', selisih_cr='$selisih_cr', nilai_bobot_cr='$nilai_bobot_cr',
							nilai_cs='$nilai_cs', target_cs='$target_cs', selisih_cs='$selisih_cs', nilai_bobot_cs='$nilai_bobot_cs',
							nilai_cf_A3='$nilai_cf_A3', nilai_sf_A3='$nilai_sf_A3', nilai_tot_A3='$nilai_tot_A3'
							WHERE kdnilai3 = '$kdnilai3'";
		$update = $kon->query("$query");

		if ($update) {
			echo "<script>alert('Data Berhasil Diperbarui'); window.location='hasil_cb.php';</script>";
		} else {
			echo "<script>alert('Gagal Memperbarui Data'); window.location='hasil_cb.php';</script>";
		}
	}
}
