<?php
	class jurnal_data {
		function jurnal($JurnalID, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($JurnalID)) {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, c.Units, c.Mask, d.JangkaWaktu, e.RencanaAksi FROM jurnal a
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN rencana_aksi e ON a.AksiID = e.RencanaAksiID
						WHERE a.JurnalID ='$JurnalID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.JurnalID, b.RencanaAksi, c.Symbol, d.JangkaWaktu, a.AlasanKeluar, e.Status FROM jurnal a
						LEFT JOIN rencana_aksi b ON a.AksiID = b.RencanaAksiID
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN status e ON a.StatusID = e.StatusID
						WHERE a.UserBuat = '$UserID' ORDER BY a.TglBuat DESC";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function rencana($RencanaID, $UserID){
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql	= "SELECT a.*, b.Pasar,  c.Symbol, c.Mask, c.Units, d.JangkaWaktu AS JangkaWaktuNM
			FROM rencana a
			LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
			LEFT JOIN pasar b ON c.PasarID = b.PasarID
			LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
			WHERE a.RencanaID = '$RencanaID' AND a.UserID='$UserID'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_jurnal {

		function tambah($RencanaID, $SymbolID, $JangkaWaktuID, $AksiID, $WaktuMasuk, $HargaMasuk, $BatasRugi, $AmbilUntung, $SaldoAwal, $Resiko, $Lot, $WaktuKeluar, $AlasanKeluar, $HargaKeluar, $RugiPoint, $UntungPoint, $Kerugian, $Keuntungan, $Rasio, $SaldoAkhir, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $JurnalID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE jurnal SET RencanaID='$RencanaID', SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', AksiID='$AksiID', WaktuMasuk='$WaktuMasuk', HargaMasuk='$HargaMasuk', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', SaldoAwal='$SaldoAwal', Resiko='$Resiko', Lot='$Lot', WaktuKeluar='$WaktuKeluar', AlasanKeluar='$AlasanKeluar', HargaKeluar='$HargaKeluar', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', Kerugian='$Kerugian', Keuntungan='$Keuntungan', Rasio='$Rasio', SaldoAkhir='$SaldoAkhir', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID' WHERE JurnalID ='$JurnalID' AND UserBuat = '$UserID'";
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
			$sql 		= "UPDATE jurnal SET RencanaID='$RencanaID', SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', AksiID='$AksiID', WaktuMasuk='$WaktuMasuk', HargaMasuk='$HargaMasuk', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', SaldoAwal='$SaldoAwal', Resiko='$Resiko', Lot='$Lot', WaktuKeluar='$WaktuKeluar', AlasanKeluar='$AlasanKeluar', HargaKeluar='$HargaKeluar', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', Kerugian='$Kerugian', Keuntungan='$Keuntungan', Rasio='$Rasio', SaldoAkhir='$SaldoAkhir', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID', TglEdit=NOW(), UserEdit='$UserID' WHERE JurnalID ='$JurnalID' AND UserBuat = '$UserID'";
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
			$sql 		= "DELETE FROM jurnal WHERE JurnalID='$JurnalID' AND UserBuat='$UserID'";
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
