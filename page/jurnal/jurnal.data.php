<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$id				= isset($_POST['ID']) ? $_POST['ID'] : '';
	$RencanaID		= isset($_POST['RencanaID']) ? $_POST['RencanaID'] : '';
	$UserID			= isset($_POST['UserID']) ? $_POST['UserID'] : '';
	$getData		= isset($_POST['getData']) ? $_POST['getData'] : '';
	if ($getData == 'rencanaInfo') {
		$query_text = "SELECT a.PasarID, a.RencanaID, a.SymbolID, a.JangkaWaktuID, a.RencanaAksiID, a.Harga, a.BatasRugi, a.AmbilUntung, a.RugiPoint, a.UntungPoint, a.SaldoAwal, a.Resiko, a.Lot, a.Rasio, a.Kerugian, a.Keuntungan, 
						b.Pasar AS PasarNM,  c.Symbol AS SymbolNM, c.Mask, c.Units, d.JangkaWaktu AS JangkaWaktuNM
						FROM rencana a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						WHERE a.RencanaID = '$RencanaID' AND a.UserID='$UserID'";
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$data[] = $row;
		}
		echo json_encode($data);
		mysqli_close($koneksi);
	}
?>
