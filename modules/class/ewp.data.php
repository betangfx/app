<?php
	class ewp {
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
