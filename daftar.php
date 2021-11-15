<!doctype html>
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
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css">
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d",
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
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
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<!--daftar-->
<section id="daftar">
	 	<?php
		if (isset($_GET['berhasil'])){
			
			$berhasil = $_GET['berhasil'];
			
			switch ($berhasil){
				case '0':
				echo "<div class=\"alert alert-danger\" style=\"position:fixed; width:100%;\">";
				echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
				echo "<strong>GAGAL INPUT!</strong> User ID atau Password mungkin sudah pernah dipakai \"TES ASMA\".";
				echo "</div>";
				break;
				
				case '1':
				echo "<div class=\"alert alert-success\" style=\"position:fixed; width:100%;\">";
				echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
				echo "<strong>BERHASIL!</strong> Selamat anda sudah terdaftar menjadi member \"TES ASMA\".";
				echo "</div>";
				break;
				
			}
		}
	?>
	 <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>DAFTAR</h2>
        <div class="row">
          <div class="col-lg-4">
            
          </div>
          <div class="col-lg-4">
           
          </div>
          <div class="col-lg-4">
          
          </div>
        </div>
      </div>
      <div class="row">
 
        <div class="col-lg-12 wow fadeInLeft delay-06s">
          <form class="form" method="POST" action="signup.php">
			<h3>Nama</h3>
            <input class="input-text" type="text" name="text_namesignup" value="Nama *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
            <h3>Tanggal Lahir</h3>
			<input class="input-text demo_ranged" id="inputField" type="text" name="text_lahirsignup">
			<h3>Jenis Kelamin</h3>
			<select class="input-text" name="sel_gender">
				<option name="sel_gender" value="pria">Pria</option>
				<option name="sel_gender" value="wanita">Wanita</option>
			</select>
			<h3>Password</h3>
			<input class="input-text" type="password" name="pass_signup" value="password">
            <input class="input-btn" type="submit" value="DAFTAR">
          </form>
        </div>
		
      </div>
    </section>
  </div>
</section>
<!--daftar-->

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