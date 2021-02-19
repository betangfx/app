<?php
	class settingAkun {
		
		function ringkasanAkun($UserID) 
		{
			$query = "SELECT a.AkunID, a.UserID,
			COALESCE(SUM(CASE WHEN a.TransaksiID = '1' then a.Nominal end), 0) as TotalTambahDana,
			COALESCE(SUM(CASE WHEN a.TransaksiID = '2' then a.Nominal end), 0) as TotalTarikDana,
			b.SaldoAkhir
			FROM user_akun_transaksi a
			LEFT JOIN user_akun_saldo b ON a.UserID = b.UserID
			WHERE a.UserID ='$UserID'"; 
			$this->db = new database(); 
			
			$data = mysqli_query($this->db->koneksi,$query);
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
		
		function infoAkun($action, $AkunID, $BrokerID, $NoAkun, $Leverage, $UserID)
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			if ($action == 'create') {
				$sql = "SELECT UserID FROM user_akun WHERE UserID='$UserID'";
				$query = mysqli_query($conn, $sql);
				$result = $query;
				if(mysqli_num_rows($result) > 0){
					$hasil = 'Akun Sudah Ada';
					}else{
					$sql_insert_info = "INSERT INTO user_akun (UserID, BrokerID, NoAkun, Leverage, UserBuat) VALUES ('$UserID', '$BrokerID', '$NoAkun', '$Leverage', '$UserID')";
					$query_insert_info = mysqli_query($conn, $sql_insert_info);
					// check nomor AkunID
					
					$sql_check_infoakun = "SELECT AkunID FROM user_akun WHERE UserID='$UserID'";
					$query_check_infoakun = mysqli_query($conn, $sql_check_infoakun);
					while($result_check_infoakun = mysqli_fetch_array($query_check_infoakun)){
						$AkunIDShadow = $result_check_infoakun['AkunID'];
					}
					
					// insert akun ke table user_akun_saldo
				$sql_insert_akun_saldo = "INSERT INTO user_akun_saldo (AkunID, UserID, SaldoAkhir) VALUES ('$AkunIDShadow', '$UserID', '0')";
				$query = mysqli_query($conn, $sql_insert_akun_saldo);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				}
				return $hasil;
				} 
				else if  ($action == 'read') {
					$sql = "SELECT a.AkunID, a.BrokerID, b.Broker, a.NoAkun, a.Leverage FROM user_akun a LEFT JOIN broker b ON a.BrokerID = b.BrokerID WHERE a.UserID = '$UserID'"; 
					$query = mysqli_query($conn,$sql);
					while($result = mysqli_fetch_array($query)){
						$hasil[] = $result;
					}
					return $hasil;
				} 
				else if  ($action == 'update') {
					$sql = "UPDATE user_akun SET BrokerID = '$BrokerID', NoAkun = '$NoAkun', Leverage = '$Leverage', UserEdit = '$UserID', TglEdit = NOW() WHERE UserID = '$UserID' AND AkunID='$AkunID'"; 
					$query = mysqli_query($conn,$sql);
					if($query){
						$hasil = 'sukses';
						} else {
						$hasil = 'gagal_tambah_data';
					}
					return $hasil;
				} 
				else if  ($action == 'delete') {
					//delete akun dari user_akun_saldo
					$sql_delete_akun_saldo = "DELETE FROM user_akun_saldo WHERE UserID = '$UserID' AND AkunID='$AkunID'";
					$query_delete_akun_saldo = mysqli_query($conn,$sql_delete_akun_saldo);
					
					$sql = "DELETE FROM user_akun WHERE UserID = '$UserID' AND AkunID='$AkunID'"; 
					$query = mysqli_query($conn,$sql);
					if($query){
						$hasil = 'sukses';
						} else {
						$hasil = 'gagal_tambah_data';
					}
					return $hasil;
				}
		}
		
		function infoTransaksi($action, $AkunTransaksiID, $AkunID, $TransaksiID, $Nominal, $TglTransaksi, $UserID)
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			if ($action == 'create') {
				$sql = "INSERT INTO user_akun_transaksi (AkunID, UserID, TransaksiID, Nominal, TglTransaksi, UserBuat) VALUES ('$AkunID', '$UserID', '$TransaksiID', '$Nominal', '$TglTransaksi', '$UserID')";
				$query = mysqli_query($conn, $sql);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				return $hasil;
			}
			else if ($action == 'read') {
				$sql = "SELECT a.AkunID, a.TransaksiID, a.Nominal, a.TglTransaksi, b.Transaksi FROM user_akun_transaksi a 
				LEFT JOIN transaksi b ON a.TransaksiID = b.TransaksiID
				WHERE a.UserID = '$UserID'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
			}
			else if ($action == 'read_tambah') {
				$sql = "SELECT a.AkunTransaksiID, a.AkunID, a.TransaksiID, a.Nominal, a.TglTransaksi, b.Transaksi FROM user_akun_transaksi a 
				LEFT JOIN transaksi b ON a.TransaksiID = b.TransaksiID
				WHERE a.UserID = '$UserID' AND a.TransaksiID = '1'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
			}
			else if ($action == 'read_tarik') {
				$sql = "SELECT a.AkunTransaksiID, a.AkunID, a.TransaksiID, a.Nominal, a.TglTransaksi, b.Transaksi FROM user_akun_transaksi a 
				LEFT JOIN transaksi b ON a.TransaksiID = b.TransaksiID
				WHERE a.UserID = '$UserID' AND a.TransaksiID = '2'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
			}
			else if ($action == 'update') {
				$sql = "UPDATE user_akun_transaksi SET TransaksiID = '$TransaksiID', Nominal = '$Nominal', TglTransaksi = '$TglTransaksi', UserEdit = '$UserID', TglEdit = NOW() WHERE AkunTransaksiID = '$AkunTransaksiID'";
				$query = mysqli_query($conn, $sql);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				return $hasil;
			}
			else if ($action == 'delete') {
				$sql = "DELETE FROM user_akun_transaksi WHERE AkunTransaksiID = '$AkunTransaksiID'"; 
				$query = mysqli_query($conn,$sql);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				return $hasil;
			}
		}
	
		function cekSaldoAkun($UserID)
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			$sql = "SELECT a.SaldoAkhir FROM user_akun_saldo a
				WHERE a.UserID = '$UserID'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
		}
	}
?>
