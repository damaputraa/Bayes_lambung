<?php
error_reporting(0);
session_start();
include "config.php";
?><!DOCTYPE html>
<html lang="en">
<head>
<title>Bayes Penyakit Lambung</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta charset="utf-8">
	<link href="favicon.png" rel="shorcut icon" />
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">   
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">   
    <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>     
	
</head>
<body id="page2">
	<!--==============================header=================================-->
	<?php include 'header.php'; ?>
<!-- content -->
    <section id="content">
        <div class="bg-top">
        	<div class="bg-top-2">
                <div class="bg">
                    <div class="bg-top-shadow">
                        <div class="main">
                            <div class="box p3">
                                <div class="padding">
                                    <div class="container_12">
                                        <div class="wrapper">
                                            <div class="grid_12">
                                                <div class="wrapper">
                                                    <article class="grid_12 omega">
                                                        <div class="indent-right">
<?php
if (!$_GET[hal]) {
include "form_login.php";
}

elseif ($_GET[hal]=='pasien') {
include "form_login_member.php";
}

elseif ($_GET[hal]=='admin') {
include "form_login.php";
}

elseif ($_GET[hal]=='regis') {
include "regis.php";
}

elseif ($_GET[hal]=='regis-selesai') {
echo "<br><br><div align=center><strong>Selamat Anda telah berhasil registrasi. <br><br></strong></div>";
include "form_login_member.php";
}

?>														</div>
                                                    </article>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </section>
    
	<!--==============================footer=================================-->
	<?php include 'footer.php';?>
</body>
</html>
