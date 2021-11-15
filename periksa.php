<!doctype html>
<?php
	include_once 'config.php';
	
	if (!isset($_SESSION['user'])){
		header ('location:index.php?valid=0');
	}
?>
<html style="background:#000;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Sistem Pakar untuk Penyakit Lambung Menggunakan Teorema Bayes</title>
<link rel="icon" href="favicon.png" type="image/png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
<link href="css/animate.css" rel="stylesheet" type="text/css">
 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->
 
</head>
<body>

<!--Header_section-->
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="img/logo.png" alt="logo"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <li><a href="index.php">Kembali</a></li>
			   <li><a href="logout.php">Logout</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
  <div class="hero_wrapper" id="hero_periksa">
	  	<?php
			if (isset($_GET['simpan'])){
				echo "<div class=\"alert alert-success\" style=\"position:fixed; width:100%;\">";
				echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
				echo "<strong>Penyimpanan Berhasil!</strong> Data berhasil disimpan.";
				echo "</div>";
			}
		?>
    <div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-lg-7 col-sm-7">
            <div class="top_left_cont zoomIn wow animated">
				<?php
					include_once 'pertanyaan.php';
				?>
			 </div>
          </div>
          <div class="top_left_cont col-lg-5 col-sm-5">
			<h2>Data User</h2>
			<table class="table table" id="tabel_user">
				<tbody>
					<?php
						$ssql = "SELECT * FROM daftar_user WHERE id_user = '".$_SESSION['user']."'";
						$query = mysql_query($ssql);
						
						while ($record = mysql_fetch_array($query)){
							
							$now = date ('Y');
							$usia = $record['usia'];
							
							echo "<tr>";
							echo "<td>Nama</td>";
							echo "<td>".$record['nama']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<tr>";
							echo "<td>Usia</td>";
							echo "<td>$usia tahun</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>Tanggal diagnosa terakhir</td>";
							echo "<td>".$record['tgl_diagnosa']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>Keterangan</td>";
							echo "<td>".$record['keterangan']."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<img src="img/tesicon.png"/>
		  </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hero_Section--> 

<!--Footer-->
<footer class="footer_wrapper" id="contact_periksa">
  <div class="container">
    <section class="page_section contact" id="contact_periksa">
    </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2017 <a href="index.php">Sistem Pakar untuk Mendiagnosa Penyakit Lambung Menggunakan Teorema Bayes</a>. </span> </div>
  </div>
</footer>

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/wow.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>