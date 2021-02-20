<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$modul 			= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$UserID			= isset($_POST['UserID']) ? $_POST['UserID']: NULL;
	$AnalisaID		= isset($_POST['AnalisaID']) ? $_POST['AnalisaID']: NULL;
	if ($modul == 'tambah_analisa' || $modul == 'ubah_analisa') {
		$Pasar			= $_POST['Pasar'];
		$Symbol			= $_POST['Symbol'];	
		$JangkaWaktu	= $_POST['JangkaWaktu'];
		$Arah			= $_POST['Arah'];
		$Rangkaian		= $_POST['Rangkaian'];
		$Struktur		= $_POST['Struktur'];
		$Tipe			= $_POST['Tipe'];
		$Pola			= $_POST['Pola'];
		$Posisi			= $_POST['Posisi'];
		$Derajat		= $_POST['Derajat'];
		$KondisiAturan	= (array_filter($_POST['KondisiAturan']));
		$Aturan			= json_encode($KondisiAturan);
		$NilaiSesuai	= $_POST['NilaiSesuai'];
		$CatatanSebelum	= $_POST['CatatanSebelum'];
		$CatatanSesudah	= $_POST['CatatanSesudah'];
		$Sebelum		= $_POST['Sebelum'];
		$Sesudah		= $_POST['Sesudah'];
		$Status			= $_POST['Status'];
		$query 		=	"
		UPDATE analisa SET Pasar='$Pasar', Symbol='$Symbol', JangkaWaktu='$JangkaWaktu', Arah='$Arah', Rangkaian='$Rangkaian', Struktur='$Struktur', Tipe='$Tipe', Pola='$Pola', Posisi='$Posisi', Derajat='$Derajat', Aturan='$Aturan', Nilai='$NilaiSesuai', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', Sebelum='$Sebelum', Sesudah='$Sesudah', StatusID='$Status'
		WHERE AnalisaID='$AnalisaID' AND UserID='$UserID'";
		$insert		= mysqli_query($koneksi, $query);
		if($insert) {
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_insert_data';
		}
	}
	if ($modul == 'hapus_analisa') {
		$query 		=	"DELETE FROM analisa WHERE AnalisaID='$AnalisaID' AND UserID='$UserID'";
		$delete		= mysqli_query($koneksi, $query);
		if($delete) {
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_delete_data';
		}
	}
?>	