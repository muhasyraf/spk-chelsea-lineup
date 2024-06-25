<?php

class RightBack
{

    function tampil($cari)
    {

        require_once "database.php";
        $db = new database();
        $kon = $db->connect();

        $query = $kon->query("SELECT * FROM pm_rb, pm_pemain where pm_rb.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

        echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
                <td width="5%">No.</td>
					<td width="15%">Nama Pemain</td>
					<td width="15%">Passes Completed</td>
					<td width="15%">Tackels Made</td>
					<td width="15%">Duels Won</td>
					<td width="15%">Crosses Attempted</td>
					<td width="15%">Clearances</td>
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
							<td style="text-align: center">' . $row['nilai_tm'] . '</td>
							<td style="text-align: center">' . $row['nilai_dw'] . '</td>
							<td style="text-align: center">' . $row['nilai_ca'] . '</td>
							<td style="text-align: center">' . $row['nilai_cr'] . '</td>
							<td style="text-align: center"><a href="editnilai_gk.php?kdnilai4=' . $row['kdnilai4'] . '">
							<i class="fa fa-edit" style="font-size:18px; color: #282828;"></i></a></td>

						</tr>';
            $no++;
            $target_pc = $row['target_pc'];
            $target_tm = $row['target_tm'];
            $target_dw = $row['target_dw'];
            $target_ca = $row['target_ca'];
            $target_cr = $row['target_cr'];
        }
        echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Nilai Target</td>
							<td style="color: #282828; background-color: #fff">' . $target_pc . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_tm . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_dw . '</td>
							<td style="color: #282828; background-color: #fff">' . $target_ca . '</td>
                            <td style="color: #282828; background-color: #fff">' . $target_cr . '</td>
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
        $nilai_ca,
        $target_ca,
        $selisih_ca,
        $nilai_bobot_ca,
        $nilai_cr,
        $target_cr,
        $selisih_cr,
        $nilai_bobot_cr,
        $nilai_cf_A4,
        $nilai_sf_A4,
        $nilai_tot_A4
    ) {
        require_once "database.php";
        $db  = new database();
        $kon = $db->connect();

        $query = "INSERT INTO pm_rb (kdpemain, nilai_pc, target_pc, selisih_pc, nilai_bobot_pc,
																										 nilai_tm, target_tm, selisih_tm, nilai_bobot_tm,
																										 nilai_dw, target_dw, selisih_dw, nilai_bobot_dw,
																										 nilai_ca, target_ca, selisih_ca, nilai_bobot_ca, 
                                                                                                         nilai_cr, target_cr, selisih_cr, nilai_bobot_cr,
																									 	 nilai_cf_A4, nilai_sf_A4, nilai_tot_A4)
						 VALUES ('$kdpemain','$nilai_pc','$target_pc','$selisih_pc','$nilai_bobot_pc',
																  '$nilai_tm','$target_tm','$selisih_tm','$nilai_bobot_tm',
																  '$nilai_dw','$target_dw','$selisih_dw','$nilai_bobot_dw',
															 	  '$nilai_ca','$target_ca','$selisih_ca','$nilai_bobot_ca', 
                                                                  '$nilai_cr','$target_cr','$selisih_cr','$nilai_bobot_cr',
																	'$nilai_cf_A4','$nilai_sf_A4','$nilai_tot_A4')";
        $qcek = $kon->query("select * from pm_rb where kdnilai4='$kdnilai4'");
        $jmbaris = $qcek->num_rows;
        if ($jmbaris == 1) {
            echo "<script>alert('Data Sudah Ada'); window.location='inputnilai_rb.php';</script>";
        } else {
            $simpan = $kon->query("$query");

            if ($simpan) {
                echo "<script>alert('Data Berhasil Ditambahkan'); window.location='inputnilai_rb.php';</script>";
            } else {
                echo "<script>alert('Gagal Menambahkan Data'); window.location='inputnilai_rb.php';</script>";
            }
        }
    }

    function update(
        $kdnilai4,
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
        $nilai_ca,
        $target_ca,
        $selisih_ca,
        $nilai_bobot_ca,
        $nilai_cr,
        $target_cr,
        $selisih_cr,
        $nilai_bobot_cr,
        $nilai_cf_A4,
        $nilai_sf_A4,
        $nilai_tot_A4
    ) {
        require_once "database.php";
        $db  = new database();
        $kon = $db->connect();

        $query = "UPDATE pm_rb SET kdpemain='$kdpemain',
							nilai_pc='$nilai_pc', target_pc='$target_pc', selisih_pc='$selisih_pc', nilai_bobot_pc='$nilai_bobot_pc',
							nilai_tm='$nilai_tm', target_tm='$target_tm', selisih_tm='$selisih_tm', nilai_bobot_tm='$nilai_bobot_tm',
							nilai_dw='$nilai_dw', target_dw='$target_dw', selisih_dw='$selisih_dw', nilai_bobot_dw='$nilai_bobot_dw',
							nilai_ca='$nilai_ca', target_ca='$target_ca', selisih_ca='$selisih_ca', nilai_bobot_ca='$nilai_bobot_ca',
                            nilai_cr='$nilai_cr', target_cr='$target_cr', selisih_cr='$selisih_cr', nilai_bobot_cr='$nilai_bobot_cr',
							nilai_cf_A4='$nilai_cf_A4', nilai_sf_A4='$nilai_sf_A4', nilai_tot_A4='$nilai_tot_A4'
							WHERE kdnilai4 = '$kdnilai4'";
        $update = $kon->query("$query");

        if ($update) {
            echo "<script>alert('Data Berhasil Diperbarui'); window.location='hasil_lb.php';</script>";
        } else {
            echo "<script>alert('Gagal Memperbarui Data'); window.location='hasil_lb.php';</script>";
        }
    }

    function selisih($cari)
    {

        require_once "database.php";
        $db = new database();
        $kon = $db->connect();

        $query = $kon->query("SELECT * FROM pm_rb, pm_pemain where pm_rb.kdpemain=pm_pemain.kdpemain and pm_pemain.namapemain like '%$cari%'");

        echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
                    <td width="5%">No.</td>
                    <td width="15%">Nama Pemain</td>
                    <td width="15%">Passes Completed</td>
                    <td width="15%">Tackels Made</td>
                    <td width="15%">Duels Won</td>
                    <td width="15%">Crosses Attempted</td>
                    <td width="15%">Clearances</td>
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
							<td style="text-align: center">' . $row['selisih_ca'] . '</td>
                            <td style="text-align: center">' . $row['selisih_cr'] . '</td>
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

        $query = $kon->query("SELECT * FROM pm_rb, pm_pemain WHERE pm_rb.kdpemain=pm_pemain.kdpemain AND pm_pemain.namapemain like '%$cari%' ORDER BY nilai_tot_A4 DESC");

        echo '
		<table class="table table-bordered" style="color: #282828; background-color: #fff">
			<thead style="font-weight: bold">
				<tr>
                    <td width="5%">No.</td>
                    <td width="15%">Nama Pemain</td>
                    <td width="15%">Passes Completed</td>
                    <td width="15%">Tackels Made</td>
                    <td width="15%">Duels Won</td>
                    <td width="15%">Crosses Attempted</td>
                    <td width="15%">Clearances</td>
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
							<td style="text-align: center">' . $row['nilai_bobot_tm'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_dw'] . '</td>
							<td style="text-align: center">' . $row['nilai_bobot_ca'] . '</td>
                            <td style="text-align: center">' . $row['nilai_bobot_cr'] . '</td>
							<td style="text-align: center">' . round($row['nilai_cf_A4'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_sf_A4'], 2) . '</td>
							<td style="text-align: center">' . round($row['nilai_tot_A4'], 2) . '</td>
						</tr>';
            $no++;
        }
        $qkriteria_core = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'RBTM' or kdkriteria = 'RBDW' or kdkriteria = 'RBCA'");
        $dtcore = $qkriteria_core->fetch_array();
        $jenis_core = $dtcore['jenis'];

        $qkriteria_sec = $kon->query("select distinct jenis from pm_kriteria where kdkriteria = 'RBPC' or kdkriteria = 'RBCR'");
        $dtsec = $qkriteria_sec->fetch_array();
        $jenis_sec = $dtsec['jenis'];

        echo '
					</tbody>
					<thead style="font-weight: bold">
						<tr>
							<td colspan="2">Jenis Factor</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_sec . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_core . '</td>
							<td style="color: #282828; background-color: #fff">' . $jenis_sec . '</td>
						</tr>
					</thead>
				</table>
				';
    }
}
