<?php
	include 'config.php';
	$auth = $_POST['mode'];
	if ($auth == 'login') {
		$Username = $_POST['Username'];
		$password = md5($_POST['password']);
		
		$auth = new auth();
		$data = $auth->login($Username, $password);
		if ($data > 0) {
			foreach ($data as $row) {
				session_start();
				$_SESSION['UserID']     = $row['UserID'];
				$_SESSION['Username']   = $row['Username'];
				$_SESSION['password']   = $row['Password'];
				$_SESSION['UserLevel']  = $row['UserLevel'];
				if($_SESSION['Username']){
					echo 'sukses';
				}
				else {
					echo 'gagal_tambah_user';
				}
			}
			} else {
			echo 'gagal_user_tidak_tersedia';
		}
	} 
	else if ($auth == 'register') {
		$Nama 		= $_POST['Nama'];
		$Email 		= $_POST['Email'];
		$Username 	= $_POST['Username'];
		$Password 	= md5($_POST['Password']);
		$NoTelp 	= $_POST['NoTelp'];
		
		$auth = new auth();
		$data = $auth->register($Nama, $Email, $Username, $Password, $NoTelp);
	}
?>		