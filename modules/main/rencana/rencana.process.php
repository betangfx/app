<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 								? $_POST['ID'] 			: NULL;
	$AnalisaID 		= isset($_POST['AnalisaID']) 						? $_POST['AnalisaID'] 	: NULL;
	$modul 			= isset($_POST['modul']) 							? $_POST['modul'] 		: NULL;
	$submodul		= isset($_POST['submodul']) 						? $_POST['submodul']	: NULL;
	$UserID			= isset($_POST['UserID']) 							? $_POST['UserID'] 		: NULL;
	$RencanaID 		= isset($_POST['RencanaID'])						? $_POST['RencanaID'] 	: NULL;
	$AnalisaID 		= isset($_POST['AnalisaID'])						? $_POST['AnalisaID'] 	: NULL;
	$PasarID 		= isset($_POST['PasarID'])							? $_POST['PasarID'] 	: NULL;
	$SymbolID 		= isset($_POST['SymbolID'])							? $_POST['SymbolID'] 	: NULL;
	$JangkaWaktuID 	= isset($_POST['JangkaWaktuID'])					? $_POST['JangkaWaktuID'] : NULL;
	$RencanaTipeID 	= isset($_POST['RencanaTipeID'])					? $_POST['RencanaTipeID'] : NULL;
	$RencanaAksiID 	= isset($_POST['RencanaAksiID'])					? $_POST['RencanaAksiID'] : NULL;
	$Harga 			= isset($_POST['Harga'])							? $_POST['Harga'] 		: NULL;
	$BatasRugi 		= isset($_POST['BatasRugi'])						? $_POST['BatasRugi'] 	: NULL;
	$AmbilUntung 	= isset($_POST['AmbilUntung'])						? $_POST['AmbilUntung'] : NULL;
	$Saldo 			= isset($_POST['Saldo'])							? $_POST['Saldo'] 		: NULL;
	$Resiko 		= isset($_POST['Resiko'])							? $_POST['Resiko'] 		: NULL;
	$Lot 			= isset($_POST['Lot'])								? $_POST['Lot'] 		: NULL;
	$Rasio 			= isset($_POST['Rasio'])							? $_POST['Rasio'] 		: NULL;
	$RugiPoint 		= isset($_POST['RugiPoint'])						? $_POST['RugiPoint'] 	: NULL;
	$UntungPoint 	= isset($_POST['UntungPoint'])						? $_POST['UntungPoint'] : NULL;
	$RugiSaldo 		= isset($_POST['RugiSaldo'])						? $_POST['RugiSaldo'] 	: NULL;
	$UntungSaldo 	= isset($_POST['UntungSaldo'])						? $_POST['UntungSaldo'] : NULL;
	$CatatanSebelum = isset($_POST['CatatanSebelum'])					? $_POST['CatatanSebelum'] : NULL;
	$CaptureSebelum = isset($_POST['CaptureSebelum'])					? $_POST['CaptureSebelum'] : NULL;
	$CatatanSesudah = isset($_POST['CatatanSesudah'])					? $_POST['CatatanSesudah'] : NULL;
	$CaptureSesudah = isset($_POST['CaptureSesudah'])					? $_POST['CaptureSesudah'] : NULL;
	$StatusID 		= isset($_POST['StatusID'])							? $_POST['StatusID'] 	: NULL;
	$getData		= isset($_POST['getData']) 							? $_POST['getData'] 	: NULL;
	if ($getData == 'analisaInfo') {
		$StringAID = substr($AnalisaID,0,3);
		if ($StringAID == 'SIM') {
			$DetailAID = new analisa_data();
			$result = $DetailAID->analisa_simple($AnalisaID, $UserID);
		} else if ($StringAID == 'SND' ) {
			$DetailAID = new analisa_data();
			$result = $DetailAID->analisa_snd($AnalisaID, $UserID);
		} else if ($StringAID == 'SNR' ) {
			$DetailAID = new analisa_data();
			$result = $DetailAID->analisa_snr($AnalisaID, $UserID);
		} else if ($StringAID == 'EWP' ) {
			$DetailAID = new analisa_data();
			$result = $DetailAID->analisa_elliott($AnalisaID, $UserID);
		}
		echo json_encode($result);
	}
	if ($getData == 'rencanaaksi') {
		$rencana_aksi = new rencana_data();
		$result = $rencana_aksi->rencana_aksi($id);
		echo json_encode($result);
	}	
	if ($modul == 'tambah_rencana') {
		$Aksi = new aksi_rencana();
		$result = $Aksi->tambah($AnalisaID, $SymbolID, $JangkaWaktuID, $RencanaTipeID, $RencanaAksiID, $Harga, $BatasRugi, $AmbilUntung, $Saldo, $Resiko, $Lot, $Rasio, $RugiPoint, $UntungPoint, $RugiSaldo, $UntungSaldo, $CatatanSebelum, $CaptureSebelum, $CatatanSesudah, $CaptureSesudah, $StatusID, $RencanaID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_rencana') {
		$Aksi = new aksi_rencana();
		$result = $Aksi->ubah($AnalisaID, $SymbolID, $JangkaWaktuID, $RencanaTipeID, $RencanaAksiID, $Harga, $BatasRugi, $AmbilUntung, $Saldo, $Resiko, $Lot, $Rasio, $RugiPoint, $UntungPoint, $RugiSaldo, $UntungSaldo, $CatatanSebelum, $CaptureSebelum, $CatatanSesudah, $CaptureSesudah, $StatusID, $RencanaID, $UserID);
		echo $result;
	}
	if ($modul == 'hapus_rencana') {
		$Aksi = new aksi_rencana();
		$result = $Aksi->hapus($id, $UserID);
		echo $result;
	}
?>	