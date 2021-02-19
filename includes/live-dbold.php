<?php
	// Database Procedural Note: Akan ditinggalkan
	$db['host'] = "localhost"; 
	$db['user'] = "u9261597_tms"; 
	$db['pass'] = "3mMyCLLcbttKEn7"; 
	$db['name'] = "u9261597_tms";
	
	$koneksi = mysqli_connect($db['host'], $db['user'], $db['pass'], $db['name']);
	if (mysqli_connect_errno()) {
		trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR);
	}
?>