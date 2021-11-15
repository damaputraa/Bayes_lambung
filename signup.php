<?php
	include_once 'config.php';

	$valid = 0;
	
	$user = $_POST['text_namesignup'];
	$lahir = $_POST['text_lahirsignup'];
	$gender = $_POST['sel_gender'];
	$pass = $_POST['pass_signup'];
	
	for ($counter = 0; $counter < 2; $counter++){
		
		if ($counter == 0){
			$comp = $user;
			$param = "nama";
		}
		else if ($counter > 0){
			$comp = $pass;
			$param = "password";
		}
		
		$ssql = "SELECT * FROM daftar_user WHERE $param = '$comp'";
		$query = mysql_query ($ssql);
		$result = mysql_num_rows($query);
	
		if ($result > 0){
			$valid += 1;
		}
	}
	
	if ($valid >= 2){
		header ('location:daftar.php?berhasil=0');
	}
	else { 
		$defdate = date ('Y-m-d');
		$ssql = "INSERT INTO daftar_user (nama, password, jenis_kelamin, usia, tgl_diagnosa, keterangan) VALUES ('$user', '$pass', '$gender', '$lahir','$defdate','-')";
		$query = mysql_query($ssql);
		header ('location:daftar.php?berhasil=1');
		
	}
?>