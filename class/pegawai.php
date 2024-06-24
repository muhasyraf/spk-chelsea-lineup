<?php

class pegawai
{

	function tampil($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_pemain where namapemain like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="2%" style="text-align: center">No.</td>
					<td width="5%" style="text-align: center">Kode Pemain</td>
					<td width="15%" style="text-align: center">Nama Pemain</td>
					<td width="5%" style="text-align: center">Posisi</td>
					<td colspan="2" width="5%" style="text-align: center">Aksi</td>
				</tr>
			</thead>

			<tbody>';
		$jmbaris = $query->num_rows;
		if ($jmbaris == 0) {
			echo "
					<tr><td colspan=7 style='text-align: center'><b>Tidak Ada Data !</b></td></tr>
				";
		} else {
			$no = 1;
			while ($row = $query->fetch_array()) {

				echo '
						<tr>
							<td style="text-align: center">' . $no . '</td>
							<td style="text-align: center">' . $row['kdpemain'] . '</td>
							<td style="text-align: center">' . $row['namapemain'] . '</td>
							<td style="text-align: center">' . $row['posisi'] . '</td>
							<td style="text-align: center"><a href="editpegawai.php?kdpemain=' . $row['kdpemain'] . '">
							<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapuspegawai.php?kdpemain=' . $row['kdpemain'] . '"
								onclick="return confirm("Anda yakin ingin menghapus Data Pemain?");">
								<i class="fa fa-trash" style="font-size:20px; color:red;"></i></a>
							</td>
									 </tr>';
				$no++;
			}
			echo '
					</tbody>
				</table>
				';
		}
	}

	function input($kdpemain, $namapemain, $posisi)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();
		$query = "INSERT INTO pm_pemain (kdpemain,namapemain,posisi) VALUES ('$kdpemain','$namapemain', '$posisi')";
		$qcek = $kon->query("select * from pm_pemain where kdpemain='$kdpemain'");
		$jmbaris = $qcek->num_rows;
		if ($jmbaris == 1) {
			echo "<script>alert('Data sudah ada'); window.location='inputpegawai.php';</script>";
		} else {
			$simpan = $kon->query("$query");

			if ($simpan) {
				echo "<script>alert('Data Berhasil Ditambahkan'); window.location='datapegawai.php';</script>";
			} else {
				echo "<script>alert('Gagal Menambahkan Data'); window.location='datapegawai.php';</script>";
			}
		}
	}

	function update($kdpemain, $namapemain, $posisi)
	{

		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_pemain set kdpemain='$kdpemain', namapemain='$namapemain', posisi='$posisi where kdpemain='$kdpemain'";

		$update = $kon->query("$query");

		if ($update) {
			echo "<script>alert('Data Berhasil Diperbarui'); window.location='datapegawai.php';</script>";
		} else {
			echo "<script>alert('Gagal Memperbarui Data'); window.location='datapegawai.php';</script>";
		}
	}

	function hapus($kdpemain)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$hapus = $kon->query("DELETE FROM pm_pemain WHERE kdpemain = '$kdpemain'");

		if ($hapus) {
			echo "<script>alert('Data berhasil Dihapus'); window.location='datapegawai.php';</script>";
		} else {
			echo "<script>alert('Data gagal dihapus'); window.location='datapegawai.php';</script>";
		}
	}
}
