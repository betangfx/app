<?php
	// Database Procedural Note: Akan ditinggalkan
	$db['host'] = "localhost"; 
	$db['user'] = "root"; 
	$db['pass'] = ""; 
	$db['name'] = "tms";
	
	$koneksi = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
	if (mysqli_connect_errno()) {
		trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR);
	}
?>