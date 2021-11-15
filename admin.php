<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Bayes Penyakit Lambung</title>
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
                                                    <article class="grid_4 alpha">
                                                        <div class="indent">
                                                            <?php include 'sidebar.php';?>
                                                        </div>
                                                    </article>
                                                    <article class="grid_8 omega">
                                                        <div class="indent-right">
<?php
error_reporting(0);
include "config.php";

if ($_GET['hal']=='data_gejala') {
include "includes/p_gejala.php";
}

elseif ($_GET['hal']=='update_gejala') {
include "includes/p_gejala_update.php";
}

elseif ($_GET['hal']=='data_penyakit') {
include "includes/p_penyakit.php";
}

elseif ($_GET['hal']=='data_solusi') {
include "includes/p_solusi.php";
}

elseif ($_GET['hal']=='data_pengetahuan') {
include "includes/p_pengetahuan.php";
}

elseif ($_GET['hal']=='lpasien') {
include "includes/lpasien.php";
}

elseif ($_GET['hal']=='lkonsultasi') {
include "includes/laporan_konsultasi.php";
}

else {
echo "Selamat Datang Admin..";
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
