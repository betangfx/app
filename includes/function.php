<?php
	class auth {
		
		function login($Username, $password) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM user WHERE Username='$Username' and Password='$password'"; 
			$query = mysqli_query($conn,$sql);
			while($result = mysqli_fetch_array($query)){
				$hasil[] = $result;
			}
			return $hasil;
		}	
		
		function register($Nama, $Email, $Username, $Password, $NoTelp) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$sql 	= "SELECT * FROM user WHERE Username='$Username'"; 
			$query 	= mysqli_query($conn,$sql);
			$result = mysqli_num_rows($query);
			if ($result <= 0 ) {
				$sql 	= "INSERT INTO user (Nama, Email, Username, Password, NoTelp, UserLevel) VALUES ('$Nama', '$Email', '$Username', '$Password', '$NoTelp', '5')"; 
				$query 	= mysqli_query($conn,$sql);
				if($query) {
					echo 'sukses';
				} 
				else {
					echo 'gagal';
				}
			}
			else {
				echo 'user_tidak_tersedia';
			}
		}
	}	
	
	class left_menu {
		function getgroupmenu() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM app_modul_group";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
		
		function getusermenuList($UserLevel) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$sql = "SELECT ModulID FROM user_hakakses WHERE UserLevelID = '$UserLevel'";
			$query = mysqli_query( $conn , $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil = $result['ModulID'];
			}
			
			return $hasil;
		}
		
		function getusermenu($GroupMenuID, $UserMenuIDList) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM app_modul WHERE GroupModul = $GroupMenuID AND ModulID IN ($UserMenuIDList)";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
	}

	class module {
		function getusermodul($userAccessPage) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$text = "SELECT * FROM app_modul WHERE Link LIKE 'index.php?page=$userAccessPage'";
			$query = mysqli_query($conn, $text);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
	}
	

	class No {
		function NoAnalisa($Analisa,$Req,$UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			// Check No
			$today 		=	date('Y-m-d');
			if ($Analisa == 'simple'){
				$sql 	= "SELECT MAX(AnalisaID) AS AnalisaID FROM analisa_simple WHERE TglBuat LIKE '$today%' AND UserBuat = '$UserID'";
			} else if ($Analisa == 'snd'){
				$sql 	= "SELECT MAX(AnalisaID) AS AnalisaID FROM analisa_snd WHERE TglBuat LIKE '$today%' AND UserBuat = '$UserID'";
			} else if ($Analisa == 'snr'){
				$sql 	= "SELECT MAX(AnalisaID) AS AnalisaID FROM analisa_snr WHERE TglBuat LIKE '$today%' AND UserBuat = '$UserID'";
			} else if ($Analisa == 'elliott'){
				$sql 	= "SELECT MAX(AnalisaID) AS AnalisaID FROM analisa_elliott WHERE TglBuat LIKE '$today%' AND UserBuat = '$UserID'";
			} 
			$query 	= 	mysqli_query($conn,$sql);
			while($result = mysqli_fetch_array($query)){
				$AnalisaID = $result['AnalisaID'];
			}
			//Buat No
			$SubStrNo		= substr($AnalisaID, 9, 2);
			$NoUrutAnalisa 	= (int)$SubStrNo;
			$NoUrutAnalisa++;
			if ($Analisa == 'simple'){
				$pref 	= 'SIM';
			} else if ($Analisa == 'snd'){
				$pref 	= 'SND';
			} else if ($Analisa == 'snr'){
				$pref 	= 'SNR';
			} else if ($Analisa == 'elliott'){
				$pref 	= 'EWP';
			}
			$day		=	date('ymd');
			$new_id		=	$pref.$day.sprintf('%02s', $NoUrutAnalisa);
			//Masukan ke db
			if ($Analisa == 'simple'){
				$sql 	= "INSERT INTO analisa_simple (AnalisaID, UserBuat) VALUES ('$new_id', '$UserID')";
			} else if ($Analisa == 'snd'){
				$sql 	= "INSERT INTO analisa_snd (AnalisaID, UserBuat) VALUES ('$new_id', '$UserID')";
			} else if ($Analisa == 'snr'){
				$sql 	= "INSERT INTO analisa_snr (AnalisaID, UserBuat) VALUES ('$new_id', '$UserID')";
			} else if ($Analisa == 'elliott'){
				$sql 	= "INSERT INTO analisa_elliott (AnalisaID, UserBuat) VALUES ('$new_id', '$UserID')";
			} 
			$result		= 	mysqli_query($conn, $sql);
			if($result) {
				return $new_id;
			} else {
				echo 'gagal tambah analisaid';
			}
		}
		function NoRencana($req, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			// Check No
			$today 		=	date('Y-m-d');
			$sql 	= "SELECT MAX(RencanaID) AS RencanaID FROM rencana WHERE TglBuat LIKE '$today%' AND UserBuat = '$UserID'"; 
			$query 	= 	mysqli_query($conn,$sql);
			while($result = mysqli_fetch_array($query)){
				$RencanaID = $result['RencanaID'];
			}
			//Buat No
			$SubStrNo		= substr($RencanaID, 7, 2);
			$NoUrutRencana 	= (int)$SubStrNo;
			$NoUrutRencana++;
			$pref 			= 'R';
			$day			=	date('ymd');
			$new_id			=	$pref.$day.sprintf('%02s', $NoUrutRencana);
			
			//Masukan ke DB
			$sql 	= "INSERT INTO rencana (RencanaID, UserBuat) VALUES ('$new_id', '$UserID')";
			$result		= 	mysqli_query($conn, $sql);
			if($result) {
				return $new_id;
			} else {
				echo 'gagal tambah rencanaid';
			}
		}

		function NoJurnal($req, $UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			// Check No
			$today 		=	date('Y-m-d');
			$sql 	= "SELECT MAX(JurnalID) AS JurnalID FROM jurnal WHERE TglBuat LIKE '$today%' AND UserBuat = '$UserID'"; 
			$query 	= 	mysqli_query($conn,$sql);
			while($result = mysqli_fetch_array($query)){
				$JurnalID = $result['JurnalID'];
			}
			//Buat No
			$SubStrNo		= substr($JurnalID, 7, 2);
			$NoUrutJurnal 	= (int)$SubStrNo;
			$NoUrutJurnal++;
			$pref 			= 'J';
			$day			=	date('ymd');
			$new_id			=	$pref.$day.sprintf('%02s', $NoUrutJurnal);
			
			//Masukan ke DB
			$sql 	= "INSERT INTO jurnal (JurnalID, UserBuat) VALUES ('$new_id', '$UserID')";
			$result		= 	mysqli_query($conn, $sql);
			if($result) {
				return $new_id;
			} else {
				echo 'gagal tambah jurnalid';
			}
		}
	}
	// function NoAnalisa($req, $UserID) {
	// 	if ($req == 'New' && $UserID != '') {
	// 		include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	// 		$pref		=	'A';
	// 		$day		=	date('ymd');
	// 		$today 		=	date('Y-m-d');
	// 		$sqlcheck	=	"SELECT MAX(AnalisaID) AS AnalisaID FROM analisa WHERE TglBuat LIKE '$today%' AND UserID = '$UserID'";
	// 		$query 		= 	mysqli_query($koneksi,$sqlcheck);
	// 		while ($data 	= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
	// 			$max_id 	= $data['AnalisaID'];
	// 		}
	// 		$nosTrx		= substr($max_id, 7, 2);
	// 		$noUrutTrx 	= (int)$nosTrx;
	// 		$noUrutTrx++;
	// 		$new_id		=	$pref.$day.sprintf('%02s', $noUrutTrx);
	// 		$sqlinsert	=	"INSERT INTO analisa (AnalisaID, UserID) VALUES ('$new_id', '$UserID')";
	// 		$insert		= 	mysqli_query($koneksi, $sqlinsert);
	// 		if($insert) {
	// 			return $new_id;
	// 			} else {
	// 			echo 'gagal tambah analisaid';
	// 		}
	// 		} else {
	// 		echo 'no';
	// 	}
	// 	return;
	// }
	
	// function NoRencana($req, $UserID) {
	// 	if ($req == 'New' && $UserID != '') {
	// 		include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	// 		$pref		=	'R';
	// 		$day		=	date('ymd');
	// 		$today 		=	date('Y-m-d');
	// 		$sqlcheck	=	"SELECT MAX(RencanaID) AS RencanaID FROM rencana WHERE TglBuat LIKE '$today%' AND UserID = '$UserID'";
	// 		$query 		= 	mysqli_query($koneksi,$sqlcheck);
	// 		while ($data 	= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
	// 			$max_id 	= $data['RencanaID'];
	// 		}
	// 		$nosTrx		= substr($max_id, 7, 2);
	// 		$noUrutTrx 	= (int)$nosTrx;
	// 		$noUrutTrx++;
	// 		$new_id		=	$pref.$day.sprintf('%02s', $noUrutTrx);
	// 		$sqlinsert	=	"INSERT INTO rencana (RencanaID, UserID) VALUES ('$new_id', '$UserID')";
	// 		$insert		= 	mysqli_query($koneksi, $sqlinsert);
	// 		if($insert) {
	// 			return $new_id;
	// 			} else {
	// 			echo 'gagal tambah id rencana';
	// 		}
	// 		} else {
	// 		echo 'no';
	// 	}
	// 	return;
	// }
	
	// function NoJurnal($req, $UserID) {
	// 	if ($req == 'New' && $UserID != '') {
	// 		include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	// 		$pref		=	'J';
	// 		$day		=	date('ymd');
	// 		$today 		=	date('Y-m-d');
	// 		$sqlcheck	=	"SELECT MAX(JurnalID) AS JurnalID FROM jurnal WHERE TglBuat LIKE '$today%' AND UserID = '$UserID'";
	// 		$query 		= 	mysqli_query($koneksi,$sqlcheck);
	// 		while ($data 	= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
	// 			$max_id 	= $data['JurnalID'];
	// 		}
	// 		$nosTrx		= substr($max_id, 7, 2);
	// 		$noUrutTrx 	= (int)$nosTrx;
	// 		$noUrutTrx++;
	// 		$new_id		=	$pref.$day.sprintf('%02s', $noUrutTrx);
	// 		$sqlinsert	=	"INSERT INTO jurnal (JurnalID, UserID) VALUES ('$new_id', '$UserID')";
	// 		$insert		= 	mysqli_query($koneksi, $sqlinsert);
	// 		if($insert) {
	// 			return $new_id;
	// 			} else {
	// 			echo 'gagal tambah id rencana';
	// 		}
	// 		} else {
	// 		echo 'no';
	// 	}
	// 	return;
	// 	}
		
		
	?>