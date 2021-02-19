<?php
	
	class auth {
		
		function login($username, $password)
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			$sql = "SELECT * FROM user WHERE Username='$username' and Password='$password'"; 
			$query = mysqli_query($conn,$sql);
			while($result = mysqli_fetch_array($query)){
				$hasil[] = $result;
			}
			return $hasil;
		}	
		
		function register($Nama, $Email, $Username, $Password, $NoTelp)
		{
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
	
	
	function NoAnalisa($req, $userid) {
		if ($req == 'New' && $userid != '') {
			include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
			$pref		=	'A';
			$day		=	date('ymd');
			$today 		=	date('Y-m-d');
			$sqlcheck	=	"SELECT MAX(AnalisaID) AS AnalisaID FROM analisa WHERE TglBuat LIKE '$today%' AND UserID = '$userid'";
			$query 		= 	mysqli_query($koneksi,$sqlcheck);
			while ($data 	= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$max_id 	= $data['AnalisaID'];
			}
			$nosTrx		= substr($max_id, 7, 2);
			$noUrutTrx 	= (int)$nosTrx;
			$noUrutTrx++;
			$new_id		=	$pref.$day.sprintf('%02s', $noUrutTrx);
			$sqlinsert	=	"INSERT INTO analisa (AnalisaID, UserID) VALUES ('$new_id', '$userid')";
			$insert		= 	mysqli_query($koneksi, $sqlinsert);
			if($insert) {
				return $new_id;
				} else {
				echo 'gagal tambah analisaid';
			}
			} else {
			echo 'no';
		}
		return;
	}
	
	function NoRencana($req, $userid) {
		if ($req == 'New' && $userid != '') {
			include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
			$pref		=	'R';
			$day		=	date('ymd');
			$today 		=	date('Y-m-d');
			$sqlcheck	=	"SELECT MAX(RencanaID) AS RencanaID FROM rencana WHERE TglBuat LIKE '$today%' AND UserID = '$userid'";
			$query 		= 	mysqli_query($koneksi,$sqlcheck);
			while ($data 	= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$max_id 	= $data['RencanaID'];
			}
			$nosTrx		= substr($max_id, 7, 2);
			$noUrutTrx 	= (int)$nosTrx;
			$noUrutTrx++;
			$new_id		=	$pref.$day.sprintf('%02s', $noUrutTrx);
			$sqlinsert	=	"INSERT INTO rencana (RencanaID, UserID) VALUES ('$new_id', '$userid')";
			$insert		= 	mysqli_query($koneksi, $sqlinsert);
			if($insert) {
				return $new_id;
				} else {
				echo 'gagal tambah id rencana';
			}
			} else {
			echo 'no';
		}
		return;
	}
	
	function NoJurnal($req, $userid) {
		if ($req == 'New' && $userid != '') {
			include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
			$pref		=	'J';
			$day		=	date('ymd');
			$today 		=	date('Y-m-d');
			$sqlcheck	=	"SELECT MAX(JurnalID) AS JurnalID FROM jurnal WHERE TglBuat LIKE '$today%' AND UserID = '$userid'";
			$query 		= 	mysqli_query($koneksi,$sqlcheck);
			while ($data 	= mysqli_fetch_array($query,MYSQLI_ASSOC)) {
				$max_id 	= $data['JurnalID'];
			}
			$nosTrx		= substr($max_id, 7, 2);
			$noUrutTrx 	= (int)$nosTrx;
			$noUrutTrx++;
			$new_id		=	$pref.$day.sprintf('%02s', $noUrutTrx);
			$sqlinsert	=	"INSERT INTO jurnal (JurnalID, UserID) VALUES ('$new_id', '$userid')";
			$insert		= 	mysqli_query($koneksi, $sqlinsert);
			if($insert) {
				return $new_id;
				} else {
				echo 'gagal tambah id rencana';
			}
			} else {
			echo 'no';
		}
		return;
		}
		
		
	?>