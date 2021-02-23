<?php
	class members_data {
		function members($UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($UserID)) {
				$sql = "SELECT a.*, b.UserLevel, c.Status FROM members a
						LEFT JOIN user_level b ON a.UserLevel = b.UserLevelID
						LEFT JOIN status c ON a.StatusID = c.StatusID";
			} else {
				$sql = "SELECT a.*, b.UserLevel, c.Status FROM user a
				LEFT JOIN user_level b ON a.UserLevel = b.UserLevelID
				LEFT JOIN status c ON a.StatusID = c.StatusID";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_members {

		function tambah($RencanaID, $SymbolID, $JangkaWaktuID, $AksiID, $WaktuMasuk, $HargaMasuk, $BatasRugi, $AmbilUntung, $SaldoAwal, $Resiko, $Lot, $WaktuKeluar, $AlasanKeluar, $HargaKeluar, $RugiPoint, $UntungPoint, $Kerugian, $Keuntungan, $Rasio, $SaldoAkhir, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $JurnalID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE members SET RencanaID='$RencanaID', SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', AksiID='$AksiID', WaktuMasuk='$WaktuMasuk', HargaMasuk='$HargaMasuk', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', SaldoAwal='$SaldoAwal', Resiko='$Resiko', Lot='$Lot', WaktuKeluar='$WaktuKeluar', AlasanKeluar='$AlasanKeluar', HargaKeluar='$HargaKeluar', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', Kerugian='$Kerugian', Keuntungan='$Keuntungan', Rasio='$Rasio', SaldoAkhir='$SaldoAkhir', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID' WHERE JurnalID ='$JurnalID' AND UserBuat = '$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($RencanaID, $SymbolID, $JangkaWaktuID, $AksiID, $WaktuMasuk, $HargaMasuk, $BatasRugi, $AmbilUntung, $SaldoAwal, $Resiko, $Lot, $WaktuKeluar, $AlasanKeluar, $HargaKeluar, $RugiPoint, $UntungPoint, $Kerugian, $Keuntungan, $Rasio, $SaldoAkhir, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $JurnalID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE members SET RencanaID='$RencanaID', SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', AksiID='$AksiID', WaktuMasuk='$WaktuMasuk', HargaMasuk='$HargaMasuk', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', SaldoAwal='$SaldoAwal', Resiko='$Resiko', Lot='$Lot', WaktuKeluar='$WaktuKeluar', AlasanKeluar='$AlasanKeluar', HargaKeluar='$HargaKeluar', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', Kerugian='$Kerugian', Keuntungan='$Keuntungan', Rasio='$Rasio', SaldoAkhir='$SaldoAkhir', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID', TglEdit=NOW(), UserEdit='$UserID' WHERE JurnalID ='$JurnalID' AND UserBuat = '$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}

		function hapus($JurnalID,$UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM members WHERE JurnalID='$JurnalID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal hapus data';
			}
			return $hasil;
		}

	}
	

?>
