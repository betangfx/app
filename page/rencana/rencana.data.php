<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$id				= isset($_POST['ID']) ? $_POST['ID'] : '';
	$AnalisaID		= isset($_POST['AnalisaID']) ? $_POST['AnalisaID'] : '';
	$UserID			= isset($_POST['UserID']) ? $_POST['UserID'] : '';
	$getData		= isset($_POST['getData']) ? $_POST['getData'] : '';
	if ($getData == 'analisaInfo') {
		$query_text = "SELECT a.Pasar, b.Pasar AS PasarNM, a.Symbol, c.Symbol AS SymbolNM, c.Mask, c.Units, a.JangkaWaktu, d.JangkaWaktu AS JangkaWaktuNM FROM analisa a
						LEFT JOIN pasar b ON a.Pasar = b.PasarID
						LEFT JOIN symbol c ON a.Symbol = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktu = d.JangkaWaktuID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserID='$UserID'";
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}
	if ($getData == 'rencanaaksi') {
		if ($id == '') {
			$query_text = "SELECT RencanaAksiID, RencanaAksi FROM rencana_aksi";
			} else {
			$query_text = "SELECT RencanaAksiID, RencanaAksi FROM rencana_aksi WHERE RencanaTipeID = '$id'";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}	
?>
