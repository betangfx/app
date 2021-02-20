<?php
	class sub_analisa {
		function tab ($ModuleID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM app_modul_sub";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class analisa_data {
		function analisa_simple($AnalisaID, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($AnalisaID)) {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_simple a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_simple a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.UserBuat = '$UserID'";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function analisa_snd($AnalisaID, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($AnalisaID)) {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_snd a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_snd a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.UserBuat = '$UserID'";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function analisa_snr($AnalisaID, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($AnalisaID)) {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_snr a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_snr a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.UserBuat = '$UserID'";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function analisa_elliott($AnalisaID, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($AnalisaID)) {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_elliott a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_elliott a
						LEFT JOIN pasar b ON a.PasarID = b.PasarID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.UserBuat = '$UserID'";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
		
	}





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
