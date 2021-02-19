<?php
	function getGroupModul() {
		global $koneksi;
		$text = "SELECT * FROM app_modul_group";
		$query = mysqli_query($koneksi, $text);
		while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
			$hasil[] = $result;
			
		}
		return $hasil;
	}
	
	function getUserModulIDList($UserLevel) {
		global $koneksi;
		$text = "SELECT ModulID FROM user_hakakses WHERE UserLevelID = '$UserLevel'";
		$query = mysqli_query( $koneksi , $text);
		while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
			$hasil = $result['ModulID'];
		}
		
		return $hasil;
	}
	
	function getUserModul($GroupModulID, $UserModulIDList) {
		global $koneksi;
		$text = "SELECT * FROM app_modul WHERE GroupModul = $GroupModulID AND ModulID IN ($UserModulIDList)";
		$query = mysqli_query($koneksi, $text);
		while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
			$hasil[] = $result;
		}
		return $hasil;
	}
	
	function getUserModulPage($UserModulPage) {
		global $koneksi;
		$text = "SELECT * FROM app_modul WHERE Link LIKE 'index.php?page=$UserModulPage'";
		$query = mysqli_query($koneksi, $text);
		while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
		{
			$hasil[] = $result;
		}
		return $hasil;
	}

		?>		