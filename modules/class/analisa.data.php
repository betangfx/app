<?php
	$id				= isset($_POST['ID']) ? $_POST['ID'] : '';
	$getData		= isset($_POST['getData']) ? $_POST['getData'] : '';
	if ($getData == 'Symbol') {
		if ($id == '') {
			$query_text = "SELECT SymbolID, Symbol FROM symbol";
			} else {
			$query_text = "SELECT SymbolID, Symbol FROM symbol WHERE PasarID = '$id'";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
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
