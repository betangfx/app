<?php
	class symbol {
		function data($PasarID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM symbol WHERE PasarID = '$PasarID'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
	}
?>
