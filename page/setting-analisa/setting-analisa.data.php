<?php
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$id				= isset($_POST['ID']) ? $_POST['ID'] : '';
	$getData		= isset($_POST['getData']) ? $_POST['getData'] : '';
	if ($getData == 'Pasangan') {
		if ($id == '') {
			$query_text = "SELECT PasanganID, Pasangan FROM pasangan";
			} else {
			$query_text = "SELECT PasanganID, Pasangan FROM pasangan WHERE PasarID = '$id'";
		}
		$query = mysqli_query($koneksi, $query_text);
		while ($row = mysqli_fetch_assoc($query)) {
			$pasangan[] = $row;
		}
		echo json_encode($pasangan);
		mysqli_close($koneksi);
	}
	
?>
