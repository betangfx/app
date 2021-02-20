<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$modul 			= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$UserID			= isset($_POST['UserID']) ? $_POST['UserID']: NULL;
	$RencanaID		= isset($_POST['RencanaID']) ? $_POST['RencanaID']: NULL;
	if ($modul == 'tambah_rencana' || $modul == 'ubah_rencana') {
		$Rencana		= $_POST['Rencana'];
		$Analisa		= $_POST['Analisa'];
		$Pasar			= $_POST['Pasar'];
		$Symbol 		= $_POST['Symbol'];
		$JangkaWaktu 	= $_POST['JangkaWaktu'];
		$RencanaTipe 	= $_POST['RencanaTipe'];
		$RencanaAksi 	= $_POST['RencanaAksi'];
		$Harga			= $_POST['Harga'];
		$BatasRugi		= $_POST['BatasRugi'];
		$AmbilUntung	= $_POST['AmbilUntung'];
		$RugiPoint		= $_POST['RugiPoint'];
		$UntungPoint	= $_POST['UntungPoint'];
		$SaldoAwal		= $_POST['Saldo'];
		$Resiko			= $_POST['Resiko'];
		$Lot			= $_POST['Lot'];
		$Rasio			= $_POST['Rasio'];
		$Kerugian		= $_POST['RugiSaldo'];
		$Keuntungan		= $_POST['UntungSaldo'];
		$CatatanSebelum	= $_POST['CatatanSebelum'];
		$CatatanSesudah	= $_POST['CatatanSesudah'];
		$Sebelum		= $_POST['Sebelum'];
		$Sesudah		= $_POST['Sesudah'];
		
		$query 		=	"
		UPDATE rencana SET AnalisaID='$Analisa', PasarID='$Pasar', SymbolID='$Symbol', JangkaWaktuID='$JangkaWaktu', RencanaTipeID='$RencanaTipe', RencanaAksiID='$RencanaAksi', Harga='$Harga', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', SaldoAwal='$SaldoAwal', Resiko='$Resiko', Lot='$Lot', Rasio='$Rasio', Kerugian='$Kerugian', Keuntungan='$Keuntungan', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', Sebelum='$Sebelum', Sesudah='$Sesudah'
		WHERE RencanaID='$Rencana' AND UserID='$UserID'";
		$insert		= mysqli_query($koneksi, $query);
		if($insert) {
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_insert_data';
		}
	}
	if ($modul == 'hapus_rencana') {
		$query 		=	"DELETE FROM rencana WHERE RencanaID='$RencanaID' AND UserID='$UserID'";
		$delete		= mysqli_query($koneksi, $query);
		if($delete) {
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_delete_data';
		}
	}
?>	