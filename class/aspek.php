<?php

class aspek
{

	function tampil($cari)
	{

		require_once "database.php";
		$db = new database();
		$kon = $db->connect();

		$query = $kon->query("SELECT * FROM pm_posisi where namaposisi like '%$cari%'");

		echo '
		<table class="table table-bordered">
			<thead style="font-weight: bold">
				<tr>
					<td width="2%">No.</td>
					<td width="3%">ID Posisi</td>
					<td width="10%">Posisi</td>
					<td colspan="2" width="5%">Aksi</td>
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
							<td style="text-align: center">' . $row['id_posisi'] . '</td>
							<td>' . $row['namaposisi'] . '</td>

							<td style="text-align: center"><a href="editaspek.php?id_posisi=' . $row['id_posisi'] . '">
								<i class="fa fa-edit" style="font-size:20px; color:black;"></i></a>

							<td style="text-align: center"><a title="Hapus" href="hapusaspek.php?id_posisi=' . $row['id_posisi'] . '"
								onclick="return confirm("Anda yakin ingin menghapus Data Posisi?");">
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

	function input($idposisi, $namaposisi)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "INSERT INTO pm_posisi (id_posisi,namaposisi) VALUES ('$idposisi','$namaposisi')";
		$qcek = $kon->query("select * from pm_posisi where id_posisi='$idposisi'");
		$jmbaris = $qcek->num_rows;
		if ($jmbaris == 1) {
			echo "<script>alert('Data sudah ada'); window.location='inputaspek.php';</script>";
		} else {
			$simpan = $kon->query("$query");

			if ($simpan) {
				echo "<script>alert('Data Berhasil Ditambahkan'); window.location='dataaspek.php';</script>";
			} else {
				echo "<script>alert('Gagal Menambahkan Data'); window.location='inputaspek.php';</script>";
			}
		}
	}

	function update($idposisi, $namaposisi)
	{

		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$query = "UPDATE pm_posisi set id_posisi='$idposisi', namaposisi='$namaposisi' where id_posisi='$idposisi'";

		$update = $kon->query("$query");

		if ($update) {
			echo "<script>alert('Data Berhasil Diperbarui'); window.location='dataaspek.php';</script>";
		} else {
			echo "<script>alert('Gagal Memperbarui Data'); window.location='editaspek.php';</script>";
		}
	}

	function hapus($idposisi)
	{
		require_once "database.php";
		$db  = new database();
		$kon = $db->connect();

		$hapus = $kon->query("DELETE FROM pm_posisi WHERE id_posisi = '$idposisi'");

		if ($hapus) {
			echo "<script>alert('Data berhasil Dihapus'); window.location='dataaspek.php';</script>";
		} else {
			echo "<script>alert('Data Gagal Dihapus'); window.location='dataaspek.php';</script>";
		}
	}
}
