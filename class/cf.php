<?php

class Forward
{

	function tampil($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_cf, pm_pemain where pm_cf.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
				<td width="5%">No.</td>
				<td width="20%">Nama Pemain</td>
				<td width="15%">Goals</td>
                <td width="15%">Assists</td>
				<td width="15%">Duels Won</td>
				<td width="15%">Touches in opposition box</td>
                <td width="15%">Shots on Target</td>
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
						<td style="text-align: center">' . $row['nilai_go'] . '</td>
						<td style="text-align: center">' . $row['nilai_as'] . '</td>
						<td style="text-align: center">' . $row['nilai_tb'] . '</td>
						<td style="text-align: center">' . $row['nilai_dw'] . '</td>
						<td style="text-align: center">' . $row['nilai_st'] . '</td>
						<td style="text-align: center"><a href="editnilai_cf.php?kdnilai9=' . $row['kdnilai9'] . '">
						<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>
					</tr>';
			$no++;
			$target_go  = $row['target_go'];
			$target_as  = $row['target_as'];
			$target_tb  = $row['target_tb'];
			$target_dw  = $row['target_dw'];
			$target_st  = $row['target_st'];
		}
		echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">' . $target_go . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_as . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_tb . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_dw . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_st . '</td>
						</tr>
					</thead>
				</table>
				';
	}

	function input(
		$kdpemain,
		$nilai_go,
		$target_go,
		$selisih_go,
		$nilai_bobot_go,
		$nilai_as,
		$target_as,
		$selisih_as,
		$nilai_bobot_as,
		$nilai_tb,
		$target_tb,
		$selisih_tb,
		$nilai_bobot_tb,
		$nilai_dw,
		$target_dw,
		$selisih_dw,
		$nilai_bobot_dw,
		$nilai_st,
		$target_st,
		$selisih_st,
		$nilai_bobot_st,
		$nilai_cf_A9,
		$nilai_sf_A9,
		$nilai_tot_A9
	) {
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_cf (kdpemain, nilai_go, target_go, selisih_go, nilai_bobot_go,
																			 nilai_as, target_as, selisih_as, nilai_bobot_as,
																			 nilai_tb, target_tb, selisih_tb, nilai_bobot_tb,
																			 nilai_dw, target_dw, selisih_dw, nilai_bobot_dw,
																			 nilai_st, target_st, selisih_st, nilai_bobot_st,
																			 nilai_cf_A9, nilai_sf_A9, nilai_tot_A9)
							VALUES ('$kdpemain', '$nilai_go', '$target_go', '$selisih_go', '$nilai_bobot_go',
											'$nilai_as', '$target_as', '$selisih_as', '$nilai_bobot_as',
											'$nilai_tb', '$target_tb', '$selisih_tb', '$nilai_bobot_tb',
											'$nilai_dw', '$target_dw', '$selisih_dw', '$nilai_bobot_dw',
											'$nilai_st', '$target_st', '$selisih_st', '$nilai_bobot_st',
											'$nilai_cf_A9', '$nilai_sf_A9', '$nilai_tot_A9')";

		$qcek = $kon->query("select * from pm_pemain where kdnilai9='$kdnilai9'");
		$jmbaris = $qcek->num_rows;
		if ($jmbaris == 1) {
			echo "<script>alert('Data Sudah Ada'); window.location='inputnilai_cf.php';</script>";
		} else {
			$simpan = $kon->query("$query");

			if ($simpan) {
				echo "<script>alert('Data Berhasil Ditambahkan'); window.location='hasil_cf.php';</script>";
			} else {
				echo "<script>alert('GAGAL Menambahkan Data'); window.location='inputnilai_cf.php';</script>";
			}
		}
	}

	function selisih($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_cf, pm_pemain where pm_cf.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="10%">No.</td>
					<td width="20%">Nama Pemain</td>
                    <td width="15%">Goals</td>
                    <td width="15%">Assists</td>
                    <td width="15%">Duels Won</td>
                    <td width="15%">Touches in opposition box</td>
                    <td width="15%">Shots on Target</td>
				</tr>
			</thead>

			<tbody>';
		$no = 1;
		while ($row = $query->fetch_array()) {

			echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td>' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['selisih_go'] . '</td>
							<td style="text-align: center">' . $row['selisih_as'] . '</td>
							<td style="text-align: center">' . $row['selisih_tb'] . '</td>
							<td style="text-align: center">' . $row['selisih_dw'] . '</td>
							<td style="text-align: center">' . $row['selisih_st'] . '</td>
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

		$query = $kon->query("SELECT * FROM pm_cf, pm_pemain where pm_cf.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="5%">No.</td>
					<td width="20%">Nama Pemain</td>
                    <td width="15%">Goals</td>
                    <td width="15%">Assists</td>
                    <td width="15%">Duels Won</td>
                    <td width="15%">Touches in opposition box</td>
                    <td width="15%">Shots on Target</td>
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
							<td style="text-align: center">' . $row['nilai_bobot_go'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_as'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_tb'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_dw'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_st'] . '</td>
							<td style="text-align: center">' . round($row['nilai_cf_A9'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_sf_A9'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_tot_A9'], 2) . '</td>
						</tr>';
			$no++;
		}

		$qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'CFGO' or kdkriteria = 'CFAS' or kdkriteria = 'CFST'");
		$dtcore = $qkriteria_core->fetch_array();
		$jenis_core = $dtcore['jenis'];

		$qkriteria_secon = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'CFDW' or kdkriteria = 'CFTB'");
		$dtsecon = $qkriteria_secon->fetch_array();
		$jenis_secon = $dtsecon['jenis'];

		echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_secon . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_secon . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
						</tr>
					</thead>
				</table>
				';
	}

	function update(
		$kdnilai9,
		$kdpemain,
		$nilai_go,
		$target_go,
		$selisih_go,
		$nilai_bobot_go,
		$nilai_as,
		$target_as,
		$selisih_as,
		$nilai_bobot_as,
		$nilai_tb,
		$target_tb,
		$selisih_tb,
		$nilai_bobot_tb,
		$nilai_dw,
		$target_dw,
		$selisih_dw,
		$nilai_bobot_dw,
		$nilai_st,
		$target_st,
		$selisih_st,
		$nilai_bobot_st,
		$nilai_cf_A9,
		$nilai_sf_A9,
		$nilai_tot_A9
	) {
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_cf SET kdpemain='$kdpemain', nilai_go='$nilai_go',
							target_go='$target_go', selisih_go='$selisih_go', nilai_bobot_go='$nilai_bobot_go',
							nilai_as='$nilai_as', target_as='$target_as', selisih_as='$selisih_as', nilai_bobot_as='$nilai_bobot_as',
							nilai_tb='$nilai_tb', target_tb='$target_tb', selisih_tb='$selisih_tb', nilai_bobot_tb='$nilai_bobot_tb',
							nilai_dw='$nilai_dw', target_dw='$target_dw', selisih_dw='$selisih_dw', nilai_bobot_dw='$nilai_bobot_dw',
							nilai_st='$nilai_st', target_st='$target_st', selisih_st='$selisih_st', nilai_bobot_st='$nilai_bobot_st',
							nilai_cf_A9='$nilai_cf_A9', nilai_sf_A9='$nilai_sf_A9', nilai_tot_A9='$nilai_tot_A9'
							WHERE kdnilai9 = '$kdnilai9'";
		$update = $kon->query("$query");

		if ($update) {
			echo "<script>alert('Data Berhasil Diperbarui'); window.location='hasil_cf.php';</script>";
		} else {
			echo "<script>alert('Gagal Memperbarui Data'); window.location='hasil_cf.php';</script>";
		}
	}
}
