<?php
	include_once 'config.php';
?>
<?php
	unset ($_SESSION['user']);
	header ('location:index.php');
?>