<?php
	class rencana_data {
		function rencana($RencanaID, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($RencanaID)) {
				$sql = "SELECT a.*, b.PasarID, b.Pasar, c.Symbol, d.JangkaWaktu, e.RencanaTipe, f.RencanaAksi
						FROM rencana a
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN rencana_tipe e ON a.RencanaTipeID = e.RencanaTipeID
						LEFT JOIN rencana_aksi f ON a.RencanaAksiID = f.RencanaAksiID
						WHERE a.RencanaID = '$RencanaID' AND a.UserBuat='$UserID'";
			} else {
				$sql = "SELECT a.RencanaID, b.RencanaAksi, c.Symbol, d.JangkaWaktu, a.AnalisaID, e.Status FROM rencana a
						LEFT JOIN rencana_aksi b ON a.RencanaAksiID = b.RencanaAksiID
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

		function rencana_aksi($RencanaTipeID){
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($RencanaTipeID == '') {
				$sql = "SELECT RencanaAksiID, RencanaAksi FROM rencana_aksi";
				} else {
				$sql = "SELECT RencanaAksiID, RencanaAksi FROM rencana_aksi WHERE RencanaTipeID = '$RencanaTipeID'";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function analisa_simple($UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
				$sql = "SELECT AnalisaID FROM analisa_simple WHERE UserBuat = '$UserID' AND StatusID = '1'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function analisa_snd($UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
				$sql = "SELECT AnalisaID FROM analisa_snd WHERE UserBuat = '$UserID' AND StatusID = '1'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function analisa_snr($UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
				$sql = "SELECT AnalisaID FROM analisa_snr WHERE UserBuat = '$UserID' AND StatusID = '1'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}	
		
		
		function analisa_elliott($UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
				$sql = "SELECT AnalisaID FROM analisa_elliott WHERE UserBuat = '$UserID' AND StatusID = '1'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}


	class aksi_rencana {

		function tambah($AnalisaID, $SymbolID, $JangkaWaktuID, $RencanaTipeID, $RencanaAksiID, $Harga, $BatasRugi, $AmbilUntung, $Saldo, $Resiko, $Lot, $Rasio, $RugiPoint, $UntungPoint, $RugiSaldo, $UntungSaldo, $CatatanSebelum, $CaptureSebelum, $CatatanSesudah, $CaptureSesudah, $StatusID, $RencanaID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE rencana SET AnalisaID='$AnalisaID', SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', RencanaTipeID='$RencanaTipeID', RencanaAksiID='$RencanaAksiID', Harga='$Harga', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', SaldoAwal='$Saldo', Resiko='$Resiko', Lot='$Lot', Rasio='$Rasio', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', Kerugian='$RugiSaldo', Keuntungan='$UntungSaldo', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID' WHERE RencanaID='$RencanaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($AnalisaID, $SymbolID, $JangkaWaktuID, $RencanaTipeID, $RencanaAksiID, $Harga, $BatasRugi, $AmbilUntung, $Saldo, $Resiko, $Lot, $Rasio, $RugiPoint, $UntungPoint, $RugiSaldo, $UntungSaldo, $CatatanSebelum, $CaptureSebelum, $CatatanSesudah, $CaptureSesudah, $StatusID, $RencanaID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE rencana SET AnalisaID='$AnalisaID', SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', RencanaTipeID='$RencanaTipeID', RencanaAksiID='$RencanaAksiID', Harga='$Harga', BatasRugi='$BatasRugi', AmbilUntung='$AmbilUntung', SaldoAwal='$Saldo', Resiko='$Resiko', Lot='$Lot', Rasio='$Rasio', RugiPoint='$RugiPoint', UntungPoint='$UntungPoint', Kerugian='$RugiSaldo', Keuntungan='$UntungSaldo', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID', UserEdit='$UserID', TglEdit=NOW() WHERE RencanaID='$RencanaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}

		function hapus($RencanaID,$UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM rencana WHERE RencanaID='$RencanaID' AND UserBuat='$UserID'";
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
