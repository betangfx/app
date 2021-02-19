<?php
	class Broker{
		
		function listBroker() 
		{
			$query = "	SELECT * FROM broker"; 
			$this->db = new database(); 
			$data = mysqli_query($this->db->koneksi,$query);
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}		
		
	}
?>
