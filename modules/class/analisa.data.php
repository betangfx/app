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
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_simple a
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
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
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_snd a
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
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
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_snr a
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
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
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status, g.Rangkaian, h.Struktur, i.Tipe, j.Pola, k.Posisi, l.Derajat FROM analisa_elliott a
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
						LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
						LEFT JOIN arah e ON a.ArahID = e.ArahID
						LEFT JOIN status f ON a.StatusID = f.StatusID
						LEFT JOIN wave_rangkaian g ON a.RangkaianID = g.RangkaianID
						LEFT JOIN wave_struktur h ON a.StrukturID = h.StrukturID
						LEFT JOIN wave_tipe i ON a.TipeID = i.TipeID
						LEFT JOIN wave_pola j ON a.PolaID = j.PolaID
						LEFT JOIN wave_posisi k ON a.PosisiID = k.PosisiID
						LEFT JOIN wave_derajat l ON a.DerajatID = l.DerajatID
						WHERE a.AnalisaID = '$AnalisaID' AND a.UserBuat = '$UserID'";
			} else {
				$sql = "SELECT a.*, b.Pasar, c.Symbol, d.JangkaWaktu, e.Arah, f.Status FROM analisa_elliott a
						LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
						LEFT JOIN pasar b ON c.PasarID = b.PasarID
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

	class aksi {

		function tambah_simple($SymbolID, $JangkaWaktuID, $ArahID, $AnalisaSimple, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_simple SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', AnalisaSimple='$AnalisaSimple', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal tambah data';
			}
		}

		function tambah_snd($SymbolID, $JangkaWaktuID, $ArahID, $AreaSupply, $TglAreaSupply, $TestAreaSupply, $AreaDemand, $TglAreaDemand, $TestAreaDemand, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_snd SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', AreaSupply='$AreaSupply', TglAreaSupply='$TglAreaSupply', TestAreaSupply='$TestAreaSupply', AreaDemand='$AreaDemand', TglAreaDemand='$TglAreaDemand', TestAreaDemand='$TestAreaDemand', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal tambah data';
			}
		}

		function tambah_snr($SymbolID, $JangkaWaktuID, $ArahID, $AreaResisten, $TglAreaResisten, $TestAreaResisten, $AreaSupport, $TglAreaSupport, $TestAreaSupport, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_snr SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', AreaResisten='$AreaResisten', TglAreaResisten='$TglAreaResisten', TestAreaResisten='$TestAreaResisten', AreaSupport='$AreaSupport', TglAreaSupport='$TglAreaSupport', TestAreaSupport='$TestAreaSupport', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal tambah data';
			}
		}

		function tambah_elliot($SymbolID, $JangkaWaktuID, $ArahID, $RangkaianID, $StrukturID, $TipeID, $PolaID, $PosisiID, $DerajatID, $Aturan, $NilaiSesuai, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_elliott SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', RangkaianID='$RangkaianID', StrukturID='$StrukturID', TipeID='$TipeID', PolaID='$PolaID', PosisiID='$PosisiID', DerajatID='$DerajatID', Aturan='$Aturan', Nilai='$NilaiSesuai', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal tambah data';
			}		
		}

		function ubah_simple($SymbolID, $JangkaWaktuID, $ArahID, $AnalisaSimple, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_simple SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', AnalisaSimple='$AnalisaSimple', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', TglEdit=NOW(), UserEdit='$UserID', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}
		}

		function ubah_snd($SymbolID, $JangkaWaktuID, $ArahID, $AreaSupply, $TglAreaSupply, $TestAreaSupply, $AreaDemand, $TglAreaDemand, $TestAreaDemand, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_snd SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', AreaSupply='$AreaSupply', TglAreaSupply='$TglAreaSupply', TestAreaSupply='$TestAreaSupply', AreaDemand='$AreaDemand', TglAreaDemand='$TglAreaDemand', TestAreaDemand='$TestAreaDemand', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', TglEdit=NOW(), UserEdit='$UserID', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}
		}

		function ubah_snr($SymbolID, $JangkaWaktuID, $ArahID, $AreaResisten, $TglAreaResisten, $TestAreaResisten, $AreaSupport, $TglAreaSupport, $TestAreaSupport, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_snr SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', AreaResisten='$AreaResisten', TglAreaResisten='$TglAreaResisten', TestAreaResisten='$TestAreaResisten', AreaSupport='$AreaSupport', TglAreaSupport='$TglAreaSupport', TestAreaSupport='$TestAreaSupport', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', TglEdit=NOW(), UserEdit='$UserID', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}
		}

		function ubah_elliot($SymbolID, $JangkaWaktuID, $ArahID, $RangkaianID, $StrukturID, $TipeID, $PolaID, $PosisiID, $DerajatID, $Aturan, $NilaiSesuai, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $StatusID, $AnalisaID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE analisa_elliott SET SymbolID='$SymbolID', JangkaWaktuID='$JangkaWaktuID', ArahID='$ArahID', RangkaianID='$RangkaianID', StrukturID='$StrukturID', TipeID='$TipeID', PolaID='$PolaID', PosisiID='$PosisiID', DerajatID='$DerajatID', Aturan='$Aturan', Nilai='$NilaiSesuai', CatatanSebelum='$CatatanSebelum', CatatanSesudah='$CatatanSesudah', CaptureSebelum='$CaptureSebelum', CaptureSesudah='$CaptureSesudah', TglEdit=NOW(), UserEdit='$UserID', StatusID='$StatusID' WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}

		function hapus($Table,$AnalisaID,$UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM analisa_$Table WHERE AnalisaID='$AnalisaID' AND UserBuat='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal hapus data';
			}
		}

	}
	
?>
