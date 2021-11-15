<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
	$host = "localhost";
	$user = "root";
	$pass = "";
	
	$con = mysqli_connect("$host","$user","$pass");
	$db = mysqli_select_db("bayes_lambung");
	
	session_start();
?>