<?php
	class ewp {
		// Untuk Select di Form
		function rangkaian() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM wave_rangkaian";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function struktur() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM wave_struktur";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function tipe() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM wave_tipe";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function pola() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM wave_pola";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function posisi() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM wave_posisi";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function derajat() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM wave_derajat";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		// Sort By parent di Form
		function struktur_by_parent($RangkaianID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($RangkaianID == '') {
				$sql = "SELECT * FROM wave_struktur";
			} else {
				$sql = "SELECT * FROM wave_struktur WHERE RangkaianID = '$RangkaianID'";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function tipe_by_parent($StrukturID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($StrukturID == '') {
				$sql = "SELECT * FROM wave_tipe";
			} else {
				$sql = "SELECT * FROM wave_tipe WHERE StrukturID = '$StrukturID'";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function pola_by_parent($RangkaianID,$StrukturID,$TipeID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($TipeID == '') {
				$sql = "SELECT * FROM wave_pola";
			} else {
				$sqla = "SELECT PolaID FROM wave_aturanjoin WHERE RangkaianID = '$RangkaianID' AND StrukturID = '$StrukturID' AND TipeID = '$TipeID'";
				$querya 	= mysqli_query($conn, $sqla);
				$resulta 		= mysqli_fetch_array($querya); 
				$ListPolaID 	= $resulta['PolaID'];
				$sql = "SELECT PolaID, Pola FROM wave_pola WHERE PolaID IN ($ListPolaID)";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		function posisi_by_parent($RangkaianID,$StrukturID,$TipeID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($TipeID == '') {
				$sql = "SELECT * FROM wave_posisi";
			} else {
				$sqla = "SELECT PosisiID FROM wave_aturanjoin WHERE RangkaianID = '$RangkaianID' AND StrukturID = '$StrukturID' AND TipeID = '$TipeID'";
				$querya 		= mysqli_query($conn, $sqla);
				$resulta 		= mysqli_fetch_array($querya); 
				$ListPosisiID 	= $resulta['PosisiID'];
				$sql = "SELECT PosisiID, Posisi FROM wave_posisi WHERE PosisiID IN ($ListPosisiID)";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}

		function aturan_by_parent($RangkaianID,$StrukturID,$TipeID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($TipeID == '') {
				echo 'empty';
			} else {
				$sqla = "SELECT AturanID FROM wave_aturanjoin WHERE RangkaianID = '$RangkaianID' AND StrukturID = '$StrukturID' AND TipeID = '$TipeID'";
				$querya 		= mysqli_query($conn, $sqla);
				$resulta 		= mysqli_fetch_array($querya); 
				$ListAturanID 	= $resulta['AturanID'];
				$sql = "SELECT AturanID, AturanKategoriID, Aturan FROM wave_aturan WHERE AturanID IN ($ListAturanID)";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}

		function aturan($AturanID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM wave_aturan WHERE AturanID = '$AturanID'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
		
	}
?>
