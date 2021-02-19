<?php
	include 'config.php';
	$auth = $_POST['mode'];
	if ($auth == 'login') {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		$auth = new auth();
		$data = $auth->login($username, $password);
		if ($data > 0) {
			foreach ($data as $row) {
				session_start();
				$_SESSION['userid']     = $row['UserID'];
				$_SESSION['username']   = $row['Username'];
				$_SESSION['password']   = $row['Password'];
				$_SESSION['usergroup']  = $row['UserLevel'];
				if($_SESSION['username']){
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