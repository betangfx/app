<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 								? $_POST['ID'] 		: NULL;
	$AnalisaID 		= isset($_POST['AnalisaID']) 						? $_POST['AnalisaID'] 	: NULL;
	$modul 			= isset($_POST['modul']) 							? $_POST['modul'] 	: NULL;
	$submodul		= isset($_POST['submodul']) 						? $_POST['submodul']: NULL;
	$getData		= isset($_POST['getData']) 							? $_POST['getData'] : NULL;
	$UserID			= isset($_POST['UserID']) 							? $_POST['UserID'] 	: NULL;
	$Symbol			= isset($_POST['Symbol']) 							? $_POST['Symbol']	 	: NULL;
	$JangkaWaktu	= isset($_POST['JangkaWaktu']) 						? $_POST['JangkaWaktu'] : NULL;
	$Arah			= isset($_POST['Arah']) 							? $_POST['Arah'] 		: NULL;
	$AnalisaSimple	= isset($_POST['AnalisaSimple']) 					? $_POST['AnalisaSimple'] : NULL;
	$AreaSupply 	= isset($_POST['AreaSupply']) 						? $_POST['AreaSupply'] : NULL;
	$TglAreaSupply	= isset($_POST['TglAreaSupply']) 					? $_POST['TglAreaSupply'] : NULL;
	$TestAreaSupply	= isset($_POST['TestAreaSupply']) 					? $_POST['TestAreaSupply'] : NULL;
	$AreaDemand 	= isset($_POST['AreaDemand']) 						? $_POST['AreaDemand'] : NULL;
	$TglAreaDemand 	= isset($_POST['TglAreaDemand']) 					? $_POST['TglAreaDemand'] : NULL;
	$TestAreaDemand = isset($_POST['TestAreaDemand']) 					? $_POST['TestAreaDemand'] : NULL;
	$AreaResisten 	= isset($_POST['AreaResisten']) 					? $_POST['AreaResisten'] : NULL;
	$TglAreaResisten= isset($_POST['TglAreaResisten']) 					? $_POST['TglAreaResisten'] : NULL;
	$TestAreaResisten= isset($_POST['TestAreaResisten']) 				? $_POST['TestAreaResisten'] : NULL;
	$AreaSupport 	= isset($_POST['AreaSupport']) 						? $_POST['AreaSupport'] : NULL;
	$TglAreaSupport = isset($_POST['TglAreaSupport']) 					? $_POST['TglAreaSupport'] : NULL;
	$TestAreaSupport= isset($_POST['TestAreaSupport']) 					? $_POST['TestAreaSupport'] : NULL;
	$Rangkaian		= isset($_POST['Rangkaian']) 						? $_POST['Rangkaian'] 	: NULL;
	$Struktur		= isset($_POST['Struktur']) 						? $_POST['Struktur'] 	: NULL;
	$Tipe			= isset($_POST['Tipe']) 							? $_POST['Tipe'] 		: NULL;
	$Pola			= isset($_POST['Pola']) 							? $_POST['Pola'] 		: NULL;
	$Posisi			= isset($_POST['Posisi']) 							? $_POST['Posisi'] 		: NULL;
	$Derajat		= isset($_POST['Derajat']) 							? $_POST['Derajat'] 	: NULL;
	$KondisiAturan	= array_filter(isset($_POST['KondisiAturan'])		? $_POST['KondisiAturan'] 		: array()); 	
	$Aturan			= json_encode($KondisiAturan);
	$NilaiSesuai	= isset($_POST['NilaiSesuai']) 						? $_POST['NilaiSesuai'] 		: NULL;
	$CatatanSebelum	= isset($_POST['CatatanSebelum']) 					? $_POST['CatatanSebelum'] 		: NULL;
	$CatatanSesudah	= isset($_POST['CatatanSesudah']) 					? $_POST['CatatanSesudah'] 		: NULL;
	$CaptureSebelum	= isset($_POST['CaptureSebelum']) 					? $_POST['CaptureSebelum'] 		: NULL;
	$CaptureSesudah	= isset($_POST['CaptureSesudah']) 					? $_POST['CaptureSesudah'] 		: NULL;
	$Status			= isset($_POST['Status']) 							? $_POST['Status'] 				: NULL;
	if ($modul == 'tambah_analisa' && $submodul == 'simple') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_simple($Symbol, $JangkaWaktu, $Arah, $AnalisaSimple, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'tambah_analisa' && $submodul == 'snd') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_snd($Symbol, $JangkaWaktu, $Arah, $AreaSupply, $TglAreaSupply, $TestAreaSupply, $AreaDemand, $TglAreaDemand, $TestAreaDemand, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'tambah_analisa' && $submodul == 'snr') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_snr($Symbol, $JangkaWaktu, $Arah, $AreaResisten, $TglAreaResisten, $TestAreaResisten, $AreaSupport, $TglAreaSupport, $TestAreaSupport, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'tambah_analisa' && $submodul == 'elliott') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_elliot($Symbol, $JangkaWaktu, $Arah, $Rangkaian, $Struktur, $Tipe, $Pola, $Posisi, $Derajat, $Aturan, $NilaiSesuai, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'hapus_analisa') {
		$Aksi 	= new aksi();
		$result = $Aksi->hapus($submodul,$id,$UserID);
		echo $result;
	}

	if ($getData == 'Struktur') {
		if ($id == '') {
			$query_text = "SELECT StrukturID, Struktur FROM wave_struktur";
			} else {
			$query_text = "SELECT StrukturID, Struktur FROM wave_struktur WHERE RangkaianID = '$id'";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}
	if ($getData == 'Tipe') {
		if ($id == '') {
			$query_text = "SELECT TipeID, Tipe FROM wave_tipe";
			} else {
			$query_text = "SELECT TipeID, Tipe FROM wave_tipe WHERE StrukturID = '$id'";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}
	
	if ($getData == 'Pola') {
		$RangkaianID = $_POST['RangkaianID'];
		$StrukturID = $_POST['StrukturID'];
		if ($id == '') {
			$query_text = "SELECT PolaID, Pola FROM wave_pola";
			} else {
			$query_text_pola = "SELECT PolaID FROM wave_aturanjoin WHERE RangkaianID = '$RangkaianID' AND StrukturID = '$StrukturID' AND TipeID = '$id'";
			$query_pola 	= mysqli_query($koneksi, $query_text_pola);
			$data_pola 		= mysqli_fetch_array($query_pola); 
			$ListPolaID 	= $data_pola['PolaID'];
			$query_text = "SELECT PolaID, Pola FROM wave_pola WHERE PolaID IN ($ListPolaID)";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}
	
	if ($getData == 'Posisi') {
		$RangkaianID = $_POST['RangkaianID'];
		$StrukturID = $_POST['StrukturID'];
		if ($id == '') {
			$query_text = "SELECT PosisiID, Posisi FROM wave_posisi";
			} else {
			$query_text_posisi 	= "SELECT PosisiID FROM wave_aturanjoin WHERE RangkaianID = '$RangkaianID' AND StrukturID = '$StrukturID' AND TipeID = '$id'";
			$query_posisi 		= mysqli_query($koneksi, $query_text_posisi);
			$data_posisi		= mysqli_fetch_array($query_posisi); 
			$ListPosisiID 		= $data_posisi['PosisiID'];
			$query_text = "SELECT PosisiID, Posisi FROM wave_posisi WHERE PosisiID IN ($ListPosisiID)";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}
	
	if ($getData == 'Aturan') {
		$RangkaianID = $_POST['RangkaianID'];
		$StrukturID = $_POST['StrukturID'];
		if ($id == '') {
			echo 'empty id';
			} else {
			$query_text_aturan 	= "SELECT AturanID FROM wave_aturanjoin WHERE RangkaianID = '$RangkaianID' AND StrukturID = '$StrukturID' AND TipeID = '$id'";
			$query_aturan 		= mysqli_query($koneksi, $query_text_aturan);
			$data_aturan		= mysqli_fetch_array($query_aturan); 
			$ListAturanID 		= $data_aturan['AturanID'];
			$query_text = "SELECT AturanID, AturanKategoriID, Aturan FROM wave_aturan WHERE AturanID IN ($ListAturanID)";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}
?>	