<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	?$_POST['UserID'] 	: NULL;
	
	if ($modul == 'tambah_akun' && $submodul == 'infoakun') {
		$AkunID 	= isset($_POST['AkunID']) 		? $_POST['AkunID'] 		: NULL;
		$BrokerID 	= $_POST['Broker'];
		$NoAkun 	= $_POST['NoAkun'];
		$Leverage 	= $_POST['Leverage'];
		
		$info 	= new settingAkun();
		$result = $info->infoAkun('create', $AkunID, $BrokerID, $NoAkun, $Leverage, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_akun' && $submodul == 'infoakun') {
		$AkunID 	= $_POST['ID'];
		$BrokerID 	= $_POST['Broker'];
		$NoAkun 	= $_POST['NoAkun'];
		$Leverage 	= $_POST['Leverage'];
		
		$info 	= new settingAkun();
		$result = $info->infoAkun('update', $AkunID, $BrokerID, $NoAkun, $Leverage, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_akun' && $submodul == 'infoakun') {
		$AkunID 	= $_POST['ID'];
		$BrokerID 	= isset($_POST['Broker']) 		? $_POST['AkunID'] 		: NULL;
		$NoAkun 	= isset($_POST['NoAkun']) 		? $_POST['AkunID'] 		: NULL;
		$Leverage 	= isset($_POST['Leverage']) 		? $_POST['AkunID'] 		: NULL;
		
		$info 	= new settingAkun();
		$result = $info->infoAkun('delete', $AkunID, $BrokerID, $NoAkun, $Leverage, $UserID);
		echo $result;
	}

	if ($modul == 'tambah_akun' && $submodul == 'transaksi') {
		$AkunID 		= $_POST['ID'];
		$TransaksiID 	= $_POST['Transaksi'];
		$Nominal 		= $_POST['Nominal'];
		$TglTransaksi 	= $_POST['TglTransaksi'];
		
		$transaksi 	= new settingAkun(); 
		$result = $transaksi->infoTransaksi('create', '', $AkunID, $TransaksiID, $Nominal, $TglTransaksi, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_akun' && $submodul == 'transaksi') {
		$AkunTransaksiID 	= $_POST['ID'];
		$TransaksiID 		= $_POST['Transaksi'];
		$Nominal 			= $_POST['Nominal'];
		$TglTransaksi 		= $_POST['TglTransaksi'];
		
		$transaksi 	= new settingAkun(); 
		$result = $transaksi->infoTransaksi('update', $AkunTransaksiID, '', $TransaksiID, $Nominal, $TglTransaksi, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_akun' && $submodul == 'transaksi') {
		$AkunTransaksiID 	= $_POST['ID'];
		
		$transaksi 	= new settingAkun(); 
		$result = $transaksi->infoTransaksi('delete', $AkunTransaksiID, '', '', '', '', $UserID);
		echo $result;
	}
?>