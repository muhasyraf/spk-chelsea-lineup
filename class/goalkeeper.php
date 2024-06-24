<?php

class Goalkeeper
{

	function tampil($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_gk, pm_pemain where pm_gk.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
					<td width="10%">No.</td>
					<td width="20%">Nama Pemain</td>
					<td width="14%">Saves Made</td>
					<td>Passes <br>Completed</td>
					<td>Long Pass <br>Accuracy</td>
					<td width="10%">Clean Sheets</td>
					<td>Edit</td>

				</tr>
			</thead>

			<tbody>';
		$no = 1;
		while ($row = $query->fetch_array()) {

			echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td>' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['nilai_sm'] . '</td>
							<td style="text-align: center">' . $row['nilai_pc'] . '</td>
							<td style="text-align: center">' . $row['nilai_lpc'] . '</td>
							<td style="text-align: center">' . $row['nilai_cs'] . '</td>
							<td style="text-align: center"><a href="editnilai_gk.php?kdnilai1=' . $row['kdnilai1'] . '">
							<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>

						</tr>';
			$no++;
			$target_sm = $row['target_sm'];
			$target_pc = $row['target_pc'];
			$target_lpc = $row['target_lpc'];
			$target_cs = $row['target_cs'];
		}
		echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">' . $target_sm . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_pc . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_lpc . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_cs . '</td>
						</tr>
					</thead>
				</table>
				';
	}

	function input(
		$kdpemain,
		$nilai_sm,
		$target_sm,
		$selisih_sm,
		$nilai_bobot_sm,
		$nilai_pc,
		$target_pc,
		$selisih_pc,
		$nilai_bobot_pc,
		$nilai_lpc,
		$target_lpc,
		$selisih_lpc,
		$nilai_bobot_lpc,
		$nilai_cs,
		$target_cs,
		$selisih_cs,
		$nilai_bobot_cs,
		$nilai_cf_A1,
		$nilai_sf_A1,
		$nilai_tot_A1
	) {
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_gk (kdpemain, nilai_sm, target_sm, selisih_sm, nilai_bobot_sm,
																										 nilai_pc, target_pc, selisih_pc, nilai_bobot_pc,
																										 nilai_lpc, target_lpc, selisih_lpc, nilai_bobot_lpc,
																										 nilai_cs, target_cs, selisih_cs, nilai_bobot_cs,
																									 	 nilai_cf_A1, nilai_sf_A1, nilai_tot_A1)
						 VALUES ('$kdpemain','$nilai_sm','$target_sm','$selisih_sm','$nilai_bobot_sm',
																  '$nilai_pc','$target_pc','$selisih_pc','$nilai_bobot_pc',
																  '$nilai_lpc','$target_lpc','$selisih_lpc','$nilai_bobot_lpc',
															 	  '$nilai_cs','$target_cs','$selisih_cs','$nilai_bobot_cs',
																	'$nilai_cf_A1','$nilai_sf_A1','$nilai_tot_A1')";
		$qcek = $kon->query("select * from pm_gk where kdnilai1='$kdnilai1'");
		$jmbaris = $qcek->num_rows;
		if ($jmbaris == 1) {
			echo "<script>alert('Data Sudah Ada'); window.location='inputnilai_gk.php';</script>";
		} else {
			$simpan = $kon->query("$query");

			if ($simpan) {
				echo "<script>alert('Data Berhasil Ditambahkan'); window.location='hasil_gk.php';</script>";
			} else {
				echo "<script>alert('Gagal Menambahkan Data'); window.location='inputnilai_gk.php';</script>";
			}
		}
	}

	function update(
		$kdnilai1,
		$kdpemain,
		$nilai_sm,
		$target_sm,
		$selisih_sm,
		$nilai_bobot_sm,
		$nilai_pc,
		$target_pc,
		$selisih_pc,
		$nilai_bobot_pc,
		$nilai_lpc,
		$target_lpc,
		$selisih_lpc,
		$nilai_bobot_lpc,
		$nilai_cs,
		$target_cs,
		$selisih_cs,
		$nilai_bobot_cs,
		$nilai_cf_A1,
		$nilai_sf_A1,
		$nilai_tot_A1
	) {
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_gk SET kdpemain='$kdpemain',
							nilai_sm='$nilai_sm', target_sm='$target_sm', selisih_sm='$selisih_sm', nilai_bobot_sm='$nilai_bobot_sm',
							nilai_pc='$nilai_pc', target_pc='$target_pc', selisih_pc='$selisih_pc', nilai_bobot_pc='$nilai_bobot_pc',
							nilai_lpc='$nilai_lpc', target_lpc='$target_lpc', selisih_lpc='$selisih_lpc', nilai_bobot_lpc='$nilai_bobot_lpc',
							nilai_cs='$nilai_cs', target_cs='$target_cs', selisih_cs='$selisih_cs', nilai_bobot_cs='$nilai_bobot_cs',
							nilai_cf_A1='$nilai_cf_A1', nilai_sf_A1='$nilai_sf_A1', nilai_tot_A1='$nilai_tot_A1'
							WHERE kdnilai1 = '$kdnilai1'";
		$update = $kon->query("$query");

		if ($update) {
			echo "<script>alert('Data Berhasil Diperbarui'); window.location='hasil_gk.php';</script>";
		} else {
			echo "<script>alert('Gagal Memperbarui Data'); window.location='hasil_gk.php';</script>";
		}
	}

	function selisih($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_gk, pm_pemain where pm_gk.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
				<td width="10%">No.</td>
				<td width="20%">Nama Pemain</td>
				<td width="14%">Saves Made</td>
				<td>Passes <br>Completed</td>
				<td>Long Pass <br>Accuracy</td>
				<td width="10%">Clean Sheets</td>
				</tr>
			</thead>

			<tbody>';
		$no = 1;
		while ($row = $query->fetch_array()) {

			echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td>' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['selisih_sm'] . '</td>
							<td style="text-align: center">' . $row['selisih_pc'] . '</td>
							<td style="text-align: center">' . $row['selisih_lpc'] . '</td>
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

		$query = $kon->query("SELECT * FROM pm_gk, pm_pemain WHERE pm_gk.kdpemain=pm_pemain.kdpemain AND pm_pemain.namapemain like '%$cari%' ORDER BY nilai_tot_A1 DESC");

		echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
				<td width="10%">No.</td>
				<td width="20%">Nama Pemain</td>
				<td width="14%">Saves Made</td>
				<td>Passes <br>Completed</td>
				<td>Long Pass <br>Accuracy</td>
				<td width="10%">Clean Sheets</td>
					<td width="8%">Nilai CF</td>
					<td width="8%">Nilai SF</td>
					<td width="8%">Nilai Total</td>
				</tr>
			</thead>

			<tbody>';
		$no = 1;
		while ($row = $query->fetch_array()) {

			echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td>' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_sm'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_pc'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_lpc'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_cs'] . '</td>
							<td style="text-align: center">' . round($row['nilai_cf_A1'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_sf_A1'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_tot_A1'], 2) . '</td>
						</tr>';
			$no++;
		}
		$qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'GKSM' or kdkriteria = 'GKCS'");
		$dtcore = $qkriteria_core->fetch_array();
		$jenis_core = $dtcore['jenis'];

		$qkriteria_sec = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'GKPC' or kdkriteria = 'GKLPC'");
		$dtsec = $qkriteria_sec->fetch_array();
		$jenis_sec = $dtsec['jenis'];

		echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_sec . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_sec . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
						</tr>
					</thead>
				</table>
				';
	}

	/* function hapus($kdnilai1) {

				require_once "database.php";
				$db  = new database();
				$kon = $db->connect();

				$hapus = $kon->query("DELETE FROM pm_gk WHERE kdnilai1 = '$kdnilai1'");

				if($hapus) {
						echo"<script>alert('Data Berhasil Dihapus'); window.location='hasil_gk.php';</script>";
				}
				else {
						echo"<script>alert('GAGAL Menghapus Data'); window.location='hasil_gk.php';</script>";
				}
    } */
}
