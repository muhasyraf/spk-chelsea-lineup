<?php

class LeftMidfielder
{

    function tampil($cari)
    {

        require_once "database.php";
        $db = new database();
        $kon = $db->connect();

        $query = $kon->query("SELECT * FROM pm_lmf, pm_pemain where pm_lmf.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

        echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
                <td width="5%">No.</td>
					<td width="15%">Nama Pemain</td>
					<td width="15%">Passes Completed</td>
					<td width="15%">Assists</td>
					<td width="15%">Chances Created</td>
					<td width="15%">Duels Won</td>
					<td width="15%">Crosses Attempted</td>
					<td width="5%">Edit</td>
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
							<td style="text-align: center">' . $row['nilai_as'] . '</td>
							<td style="text-align: center">' . $row['nilai_cc'] . '</td>
							<td style="text-align: center">' . $row['nilai_dw'] . '</td>
							<td style="text-align: center">' . $row['nilai_ca'] . '</td>
							<td style="text-align: center"><a href="editnilai_gk.php?kdnilai6=' . $row['kdnilai6'] . '">
							<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>

						</tr>';
            $no++;
            $target_pc = $row['target_pc'];
            $target_as = $row['target_as'];
            $target_cc = $row['target_cc'];
            $target_dw = $row['target_dw'];
            $target_ca = $row['target_ca'];
        }
        echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">' . $target_pc . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_as . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_cc . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_dw . '</td>
                            <td style="color: #282828; background-color: #fff">' . $target_ca . '</td>
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
        $nilai_as,
        $target_as,
        $selisih_as,
        $nilai_bobot_as,
        $nilai_cc,
        $target_cc,
        $selisih_cc,
        $nilai_bobot_cc,
        $nilai_dw,
        $target_dw,
        $selisih_dw,
        $nilai_bobot_dw,
        $nilai_ca,
        $target_ca,
        $selisih_ca,
        $nilai_bobot_ca,
        $nilai_cf_A6,
        $nilai_sf_A6,
        $nilai_tot_A6
    ) {
        require_once "database.php";
        $db  = new database();
        $kon = $db->connect();

        $query = "INSERT INTO pm_lmf (kdpemain, nilai_pc, target_pc, selisih_pc, nilai_bobot_pc,
																										 nilai_as, target_as, selisih_as, nilai_bobot_as,
																										 nilai_cc, target_cc, selisih_cc, nilai_bobot_cc,
																										 nilai_dw, target_dw, selisih_dw, nilai_bobot_dw, 
                                                                                                         nilai_ca, target_ca, selisih_ca, nilai_bobot_ca,
																									 	 nilai_cf_A6, nilai_sf_A6, nilai_tot_A6)
						 VALUES ('$kdpemain','$nilai_pc','$target_pc','$selisih_pc','$nilai_bobot_pc',
																  '$nilai_as','$target_as','$selisih_as','$nilai_bobot_as',
																  '$nilai_cc','$target_cc','$selisih_cc','$nilai_bobot_cc',
															 	  '$nilai_dw','$target_dw','$selisih_dw','$nilai_bobot_dw', 
                                                                  '$nilai_ca','$target_ca','$selisih_ca','$nilai_bobot_ca',
																	'$nilai_cf_A6','$nilai_sf_A6','$nilai_tot_A6')";
        $qcek = $kon->query("select * from pm_lmf where kdnilai6='$kdnilai6'");
        $jmbaris = $qcek->num_rows;
        if ($jmbaris == 1) {
            echo "<script>alert('Data Sudah Ada'); window.location='inputnilai_lmf.php';</script>";
        } else {
            $simpan = $kon->query("$query");

            if ($simpan) {
                echo "<script>alert('Data Berhasil Ditambahkan'); window.location='inputnilai_lmf.php';</script>";
            } else {
                echo "<script>alert('Gagal Menambahkan Data'); window.location='inputnilai_lmf.php';</script>";
            }
        }
    }

    function update(
        $kdnilai6,
        $kdpemain,
        $nilai_pc,
        $target_pc,
        $selisih_pc,
        $nilai_bobot_pc,
        $nilai_as,
        $target_as,
        $selisih_as,
        $nilai_bobot_as,
        $nilai_cc,
        $target_cc,
        $selisih_cc,
        $nilai_bobot_cc,
        $nilai_dw,
        $target_dw,
        $selisih_dw,
        $nilai_bobot_dw,
        $nilai_ca,
        $target_ca,
        $selisih_ca,
        $nilai_bobot_ca,
        $nilai_cf_A6,
        $nilai_sf_A6,
        $nilai_tot_A6
    ) {
        require_once "database.php";
        $db  = new database();
        $kon = $db->connect();

        $query = "UPDATE pm_lmf SET kdpemain='$kdpemain',
							nilai_pc='$nilai_pc', target_pc='$target_pc', selisih_pc='$selisih_pc', nilai_bobot_pc='$nilai_bobot_pc',
							nilai_as='$nilai_as', target_as='$target_as', selisih_as='$selisih_as', nilai_bobot_as='$nilai_bobot_as',
							nilai_cc='$nilai_cc', target_cc='$target_cc', selisih_cc='$selisih_cc', nilai_bobot_cc='$nilai_bobot_cc',
							nilai_dw='$nilai_dw', target_dw='$target_dw', selisih_dw='$selisih_dw', nilai_bobot_dw='$nilai_bobot_dw',
                            nilai_ca='$nilai_ca', target_ca='$target_ca', selisih_ca='$selisih_ca', nilai_bobot_ca='$nilai_bobot_ca',
							nilai_cf_A6='$nilai_cf_A6', nilai_sf_A6='$nilai_sf_A6', nilai_tot_A6='$nilai_tot_A6'
							WHERE kdnilai6 = '$kdnilai6'";
        $update = $kon->query("$query");

        if ($update) {
            echo "<script>alert('Data Berhasil Diperbarui'); window.location='hasil_lmf.php';</script>";
        } else {
            echo "<script>alert('Gagal Memperbarui Data'); window.location='hasil_lmf.php';</script>";
        }
    }

    function selisih($cari)
    {

        require_once "database.php";
        $db = new database();
        $kon = $db->connect();

        $query = $kon->query("SELECT * FROM pm_lmf, pm_pemain where pm_lmf.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

        echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
                    <td width="5%">No.</td>
                    <td width="15%">Nama Pemain</td>
                    <td width="15%">Passes Completed</td>
                    <td width="15%">Assists</td>
                    <td width="15%">Chances Created</td>
                    <td width="15%">Duels Won</td>
                    <td width="15%">Crosses Attempted</td>
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
							<td style="text-align: center">' . $row['selisih_as'] . '</td>
							<td style="text-align: center">' . $row['selisih_cc'] . '</td>
							<td style="text-align: center">' . $row['selisih_dw'] . '</td>
                            <td style="text-align: center">' . $row['selisih_ca'] . '</td>
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

        $query = $kon->query("SELECT * FROM pm_lmf, pm_pemain WHERE pm_lmf.kdpemain=pm_pemain.kdpemain AND pm_pemain.namapemain like '%$cari%' ORDER BY nilai_tot_A6 DESC");

        echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
                    <td width="5%">No.</td>
                    <td width="15%">Nama Pemain</td>
                    <td width="15%">Passes Completed</td>
                    <td width="15%">Assists</td>
                    <td width="15%">Chances Created</td>
                    <td width="15%">Duels Won</td>
                    <td width="15%">Crosses Attempted</td>
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
							<td style="text-align: center">' . $row['nilai_bobot_pc'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_as'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_cc'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_dw'] . '</td>
                            <td style="text-align: center">' . $row['nilai_bobot_ca'] . '</td>
							<td style="text-align: center">' . round($row['nilai_cf_A6'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_sf_A6'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_tot_A6'], 2) . '</td>
						</tr>';
            $no++;
        }
        $qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'LMPC' or kdkriteria = 'LMAS' or kdkriteria = 'LMCC'");
        $dtcore = $qkriteria_core->fetch_array();
        $jenis_core = $dtcore['jenis'];

        $qkriteria_sec = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'LMDW' or kdkriteria = 'LMCA'");
        $dtsec = $qkriteria_sec->fetch_array();
        $jenis_sec = $dtsec['jenis'];

        echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_sec . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_sec . '</td>
						</tr>
					</thead>
				</table>
				';
    }
}
