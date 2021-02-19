<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$id			= isset($_POST['ID']) ? $_POST['ID'] : NULL;
	$modul 		= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul'] : NULL;
	
	if ($modul == 'tambah_setting-analisa' && $submodul == 'rangkaian') {
		$Rangkaian	= $_POST['Rangkaian'];
		$Deskripsi	= $_POST['Deskripsi'];	
		$query 		= 	"INSERT INTO wave_rangkaian (Rangkaian) VALUES ('$Rangkaian')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'struktur') {
		$Struktur	= $_POST['Struktur'];
		$Deskripsi	= $_POST['Deskripsi'];	
		$query 		= 	"INSERT INTO wave_struktur (Struktur) VALUES ('$Struktur')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'tipe') {
		$Tipe		= $_POST['Tipe'];
		$Deskripsi	= $_POST['Deskripsi'];	
		$query 		= 	"INSERT INTO wave_tipe (Tipe) VALUES ('$Tipe')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'pola') {
		$Pola		= $_POST['Pola'];
		$Deskripsi	= $_POST['Deskripsi'];	
		$query 		= 	"INSERT INTO wave_pola (Pola) VALUES ('$Pola')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'posisi') {
		$Posisi	= $_POST['Posisi'];
		$Deskripsi	= $_POST['Deskripsi'];	
		$query 		= 	"INSERT INTO wave_posisi (Posisi) VALUES ('$Posisi')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'derajat') {
		$Derajat	= $_POST['Derajat'];
		$Deskripsi	= $_POST['Deskripsi'];	
		$query 		= 	"INSERT INTO wave_derajat (Derajat) VALUES ('$Derajat')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'aturan') {
		$Aturan		= $_POST['Aturan'];
		$Deskripsi	= $_POST['Deskripsi'];	
		$query 		= 	"INSERT INTO wave_aturan (Aturan) VALUES ('$Aturan')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'aturanjoin') {
		$NamaAturan		= $_POST['NamaAturan'];
		$RangkaianID	= implode(',',$_POST['RangkaianID']);
		$StrukturID		= implode(',',$_POST['StrukturID']);
		$TipeID			= implode(',',$_POST['TipeID']);
		$PolaID			= implode(',',$_POST['PolaID']);
		$PosisiID		= implode(',',$_POST['PosisiID']);
		$AturanID		= implode(',',$_POST['AturanID']);
		$Deskripsi		= $_POST['Deskripsi'];
		$query 		= 	"INSERT INTO wave_aturanjoin (NamaAturan, RangkaianID, StrukturID, TipeID, PolaID, PosisiID, AturanID) VALUES ('$NamaAturan', '$RangkaianID', '$StrukturID', '$TipeID', '$PolaID', '$PosisiID', '$AturanID')";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	
	if ($modul == 'ubah_setting-analisa' && $submodul == 'rangkaian') {
		$Rangkaian	= $_POST['Rangkaian'];
		$Deskripsi	= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_rangkaian SET Rangkaian='$Rangkaian' WHERE RangkaianID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'ubah_setting-analisa' && $submodul == 'struktur') {
		$Struktur	= $_POST['Struktur'];
		$Deskripsi	= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_struktur SET Struktur='$Struktur' WHERE StrukturID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'ubah_setting-analisa' && $submodul == 'tipe') {
		$Tipe		= $_POST['Tipe'];
		$Deskripsi	= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_tipe SET Tipe='$Tipe' WHERE TipeID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'ubah_setting-analisa' && $submodul == 'pola') {
		$Pola		= $_POST['Pola'];
		$Deskripsi	= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_pola SET Pola='$Pola' WHERE PolaID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'ubah_setting-analisa' && $submodul == 'posisi') {
		$Posisi		= $_POST['Posisi'];
		$Deskripsi	= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_posisi SET Posisi='$Posisi' WHERE PosisiID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'ubah_setting-analisa' && $submodul == 'derajat') {
		$Derajat	= $_POST['Derajat'];
		$Deskripsi	= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_derajat SET Derajat='$Derajat' WHERE DerajatID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'ubah_setting-analisa' && $submodul == 'aturanjoin') {
		$NamaAturan		= $_POST['NamaAturan'];
		$RangkaianID	= implode(',',$_POST['RangkaianID']);
		$StrukturID		= implode(',',$_POST['StrukturID']);
		$TipeID			= implode(',',$_POST['TipeID']);
		$PolaID			= implode(',',$_POST['PolaID']);
		$PosisiID		= implode(',',$_POST['PosisiID']);
		$AturanID		= implode(',',$_POST['AturanID']);
		$Deskripsi		= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_aturanjoin SET NamaAturan='$NamaAturan', RangkaianID='$RangkaianID', StrukturID='$StrukturID', TipeID='$TipeID', PolaID='$PolaID', PosisiID='$PosisiID', AturanID='$AturanID', Deskripsi='' WHERE AturanJoinID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'ubah_setting-analisa' && $submodul == 'aturan') {
		$Aturan	= $_POST['Aturan'];
		$Deskripsi	= $_POST['Deskripsi'];
		$query 		= 	"UPDATE wave_aturan SET Aturan='$Aturan' WHERE AturanID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	
	if ($modul == 'hapus_setting-analisa' && $submodul == 'rangkaian') {
		
		$query 		= 	"DELETE FROM wave_rangkaian WHERE RangkaianID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'hapus_setting-analisa' && $submodul == 'struktur') {
		
		$query 		= 	"DELETE FROM wave_struktur WHERE StrukturID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'hapus_setting-analisa' && $submodul == 'tipe') {
		
		$query 		= 	"DELETE FROM wave_tipe WHERE TipeID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'hapus_setting-analisa' && $submodul == 'pola') {
		
		$query 		= 	"DELETE FROM wave_pola WHERE PolaID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'hapus_setting-analisa' && $submodul == 'posisi') {
		
		$query 		= 	"DELETE FROM wave_posisi WHERE PosisiID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'hapus_setting-analisa' && $submodul == 'derajat') {
		
		$query 		= 	"DELETE FROM wave_derajat WHERE DerajatID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
	if ($modul == 'hapus_setting-analisa' && $submodul == 'aturan') {
		
		$query 		= 	"DELETE FROM wave_aturan WHERE AturanID='$id'";
		
		$run_query 	= mysqli_query($koneksi, $query); 
		if($run_query){
			echo 'sukses_ubah_data';
			} else {
			echo 'gagal_ubah_data';
		}
	}
?>