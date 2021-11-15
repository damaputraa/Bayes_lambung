<?php
	include_once 'config.php';
	
	$nama = $_GET['text_name'];
	$email = $_GET['text_email'];
	$pesan = $_GET['text_message'];
	
	if ($nama =="Your Name *" || $email =="Your E-mail *" || $pesan =="Your Message *"){
		header ('location:index.php?mail=gagal');
	}
	else if ($nama !="" && $email !="" && $pesan !=""){
		$ssql = "INSERT INTO mail (nama_pengirim, email_pengirim, pesan) VALUES ('$nama','$email','$pesan')";
		$query = mysql_query($ssql);
		header ('location:index.php?mail=sukses');
	}
?>