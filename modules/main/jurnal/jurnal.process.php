<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 				? 	$_POST['ID'] 			: NULL;
	$AnalisaID 		= isset($_POST['AnalisaID']) 		? 	$_POST['AnalisaID'] 	: NULL;
	$modul 			= isset($_POST['modul']) 			? 	$_POST['modul'] 		: NULL;
	$submodul		= isset($_POST['submodul']) 		? 	$_POST['submodul']		: NULL;
	$UserID			= isset($_POST['UserID']) 			? 	$_POST['UserID'] 		: NULL;
	$JurnalID		= isset($_POST['JurnalID'])			?	$_POST['JurnalID']		:	NULL;
	$RencanaID		= isset($_POST['RencanaID'])		?	$_POST['RencanaID']		:	NULL;
	$SymbolID		= isset($_POST['SymbolID'])			?	$_POST['SymbolID']		:	NULL;
	$JangkaWaktuID	= isset($_POST['JangkaWaktuID'])	?	$_POST['JangkaWaktuID']	:	NULL;
	$AksiID			= isset($_POST['AksiID'])			?	$_POST['AksiID']		:	NULL;
	$WaktuMasuk		= isset($_POST['WaktuMasuk'])		?	$_POST['WaktuMasuk']	:	NULL;
	$HargaMasuk		= isset($_POST['HargaMasuk'])		?	$_POST['HargaMasuk']	:	NULL;
	$BatasRugi		= isset($_POST['BatasRugi'])		?	$_POST['BatasRugi']		:	NULL;
	$AmbilUntung	= isset($_POST['AmbilUntung'])		?	$_POST['AmbilUntung']	:	NULL;
	$Rasio			= isset($_POST['Rasio'])			?	$_POST['Rasio']			:	NULL;
	$Resiko			= isset($_POST['Resiko'])			?	$_POST['Resiko']		:	NULL;
	$Lot			= isset($_POST['Lot'])				?	$_POST['Lot']			:	NULL;
	$WaktuKeluar	= isset($_POST['WaktuKeluar'])		?	$_POST['WaktuKeluar']	:	NULL;
	$AlasanKeluar	= isset($_POST['AlasanKeluar'])		?	$_POST['AlasanKeluar']	:	NULL;
	$HargaKeluar	= isset($_POST['HargaKeluar'])		?	$_POST['HargaKeluar']	:	NULL;
	$RugiPoint		= isset($_POST['RugiPoint'])		?	$_POST['RugiPoint']		:	NULL;
	$UntungPoint	= isset($_POST['UntungPoint'])		?	$_POST['UntungPoint']	:	NULL;
	$Kerugian		= isset($_POST['RugiSaldo'])		?	$_POST['RugiSaldo']		:	NULL;
	$Keuntungan		= isset($_POST['UntungSaldo'])		?	$_POST['UntungSaldo']	:	NULL;
	$SaldoAwal		= isset($_POST['SaldoAwal'])		?	$_POST['SaldoAwal']		:	NULL;
	$SaldoAkhir		= isset($_POST['SaldoAkhir'])		?	$_POST['SaldoAkhir']	:	NULL;
	$CatatanSebelum = isset($_POST['CatatanSebelum'])	? 	$_POST['CatatanSebelum']: NULL;
	$CaptureSebelum = isset($_POST['CaptureSebelum'])	? 	$_POST['CaptureSebelum']: NULL;
	$CatatanSesudah = isset($_POST['CatatanSesudah'])	? 	$_POST['CatatanSesudah']: NULL;
	$CaptureSesudah = isset($_POST['CaptureSesudah'])	? 	$_POST['CaptureSesudah']: NULL;
	$StatusID 		= isset($_POST['StatusID'])			? 	$_POST['StatusID'] 		: NULL;
	$getData		= isset($_POST['getData']) 			? 	$_POST['getData'] 		: NULL;

	if ($getData == 'rencanaInfo') {
		$DetailRID = new rencana_data();
		$result = $DetailRID->rencana($RencanaID, $UserID);
		echo json_encode($result);
	}
	if ($modul == 'tambah_jurnal') {
		$Aksi = new aksi_jurnal();
		$result = $Aksi->tambah($RencanaID, $SymbolID, $JangkaWaktuID, $AksiID, $WaktuMasuk, $HargaMasuk, $BatasRugi, $AmbilUntung, $SaldoAwal, $Resiko, $Lot, $WaktuKeluar, $AlasanKeluar, $HargaKeluar, $RugiPoint, $UntungPoint, $Kerugian, $Keuntungan, $Rasio, $SaldoAkhir, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $JurnalID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_jurnal') {
		$Aksi = new aksi_jurnal();
		$result = $Aksi->ubah($RencanaID, $SymbolID, $JangkaWaktuID, $AksiID, $WaktuMasuk, $HargaMasuk, $BatasRugi, $AmbilUntung, $SaldoAwal, $Resiko, $Lot, $WaktuKeluar, $AlasanKeluar, $HargaKeluar, $RugiPoint, $UntungPoint, $Kerugian, $Keuntungan, $Rasio, $SaldoAkhir, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $JurnalID, $UserID);
		echo $result;
	}
	if ($modul == 'hapus_jurnal') {
		$Aksi = new aksi_jurnal();
		$result = $Aksi->hapus($id, $UserID);
		echo $result;
	}
?>	