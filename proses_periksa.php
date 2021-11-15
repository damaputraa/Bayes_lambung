<?php
	include_once 'config.php';

	if (isset($_GET['jawaban'])){
		$jawaban = $_GET['jawaban'];
		$rute = $_GET['rute'];
		
		switch ($jawaban){
			case 'benar':
				
				$ssql = "SELECT * FROM basis_aturan WHERE id_gejala='$rute'";
				$query = mysql_query($ssql);
				
				while ($record = mysql_fetch_array($query)){
					$rute = $record['rute'];
					$fakta_ya = $record['fakta_ya'];
					
					//memasukan nilai sementara bagian atas rumus bayes
					$ssqlm = "INSERT INTO detail_konsul (iduser, idgejala, rand) VALUES ('$_SESSION[user]', '$_GET[rute]', '$_GET[rand]')";
					$querym = mysql_query($ssqlm);
					
					if (strcmp($rute, 'final')==0){
						$solusi = $rute;
						$sakit = $record['id_penyakit'];
						
						header ("location:periksa.php?solusi=$rute&rand=$_GET[rand]");
					}
					else {
						header ("location:periksa.php?rute=$rute&rand=$_GET[rand]");
					}
				}				
				break;
				
			case 'tidak':
				$ssql = "SELECT * FROM basis_aturan WHERE id_gejala='$rute'";
				$query = mysql_query($ssql);
				
				while ($record = mysql_fetch_array($query)){
					$rute = $record['rute'];
					$fakta_tidak = $record['fakta_tidak'];
					
					if (strcmp($rute, 'final')==0){
						$solusi = $rute;
						$sakit = $record['id_penyakit'];
						
						header ("location:periksa.php?solusi=$rute&sakit=$sakit&rand=$_GET[rand]");
					}
					else {
						header ("location:periksa.php?rute=$rute&rand=$_GET[rand]");
					}
				}
				break;
			
			case 'mulai':
			$rute = $_GET['rute'];
			$rand = rand(2,999);
			header ("location:periksa.php?rute=$rute&rand=$rand");
			break;
		}
	}
?>