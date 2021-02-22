<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$modul 			= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$UserID			= isset($_POST['UserID']) ? $_POST['UserID']: NULL;
	$JurnalID		= isset($_POST['JurnalID']) ? $_POST['JurnalID']: NULL;
	if ($modul == 'tambah_jurnal' || $modul == 'ubah_jurnal') {
		$Jurnal 		= $_POST['Jurnal'];
		$Rencana 		= $_POST['Rencana'];
		$Pasar 			= $_POST['Pasar'];
		$Symbol 		= $_POST['Symbol'];
		$JangkaWaktu 	= $_POST['JangkaWaktu'];
		$Aksi 			= $_POST['Aksi'];
		$WaktuMasuk 	= $_POST['WaktuMasuk'];
		$HargaMasuk		= $_POST['HargaMasuk'];
		$BatasRugi 		= $_POST['BatasRugi'];
		$AmbilUntung 	= $_POST['AmbilUntung'];
		$SaldoAwal 		= $_POST['SaldoAwal'];
		$Resiko 		= $_POST['Resiko'];
		$Lot 			= $_POST['Lot'];
		$WaktuKeluar 	= $_POST['WaktuKeluar'];
		$AlasanKeluar 	= $_POST['AlasanKeluar'];
		$HargaKeluar 	= $_POST['HargaKeluar'];
		$RugiPoint 		= $_POST['RugiPoint'];
		$UntungPoint 	= $_POST['UntungPoint'];
		$RugiSaldo 		= $_POST['RugiSaldo'];
		$UntungSaldo 	= $_POST['UntungSaldo'];
		$Rasio 			= $_POST['Rasio'];
		$SaldoAkhir 	= $_POST['SaldoAkhir'];
		$CatatanSebelum = $_POST['CatatanSebelum'];
		$Sebelum 		= $_POST['Sebelum'];
		$CatatanSesudah = $_POST['CatatanSesudah'];
		$Sesudah		= $_POST['Sesudah'];
		$Status 		= $_POST['Status'];
		
		if ($WaktuKeluar == '') {
			$WaktuKeluar = null;
			}
		
		$query 		=	"
		UPDATE jurnal SET 	RencanaID='$Rencana', PasarID='$Pasar', SymbolID='$Symbol', JangkaWaktuID='$JangkaWaktu', AksiID='$Aksi', WaktuMasuk='$WaktuMasuk',
							HargaMasuk='$HargaMasuk', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', SaldoAwal='$SaldoAwal', Resiko='$Resiko', Lot='$Lot', WaktuKeluar='$WaktuKeluar', AlasanKeluar='$AlasanKeluar',
							HargaKeluar='$HargaKeluar', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', Kerugian='$RugiSaldo', Keuntungan='$UntungSaldo', Rasio='$Rasio', SaldoAkhir='$SaldoAkhir',
							CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', Sebelum='$Sebelum', Sesudah='$Sesudah', StatusID='$Status'
		WHERE JurnalID='$Jurnal' AND UserID='$UserID'";
		$insert		= mysqli_query($koneksi, $query);
		if($insert) {
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_insert_data';
		}
	}
	if ($modul == 'hapus_jurnal') {
		$query 		=	"DELETE FROM jurnal WHERE JurnalID='$JurnalID' AND UserID='$UserID'";
		$delete		= mysqli_query($koneksi, $query);
		if($delete) {
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_delete_data';
		}
	}
?>	