<body onload=javascript:window:print()>

<?php
error_reporting(0);
session_start(); 
//date_default_timezone_set("Asia/Jakarta");
include 'config.php'; 

//data
$jum_penyakit=5;
$jum_gejala=8;
$n=1;
		echo "<h2>Kondisi</h2>";
		echo "<table class=\"table table-striped\" id=\"tabel_hasil\">";
		echo "<thead class=\"head-table\">";
		echo "<th>Nomor</th>";
		echo "<th>Id Gejala</th>";
		echo "<th>Gejala</th>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr>";
		
		$ssqly = "SELECT * FROM detail_konsul a, daftar_gejala b WHERE a.iduser='$_GET[user]' AND a.idgejala=b.id_gejala AND a.rand='$_GET[rand]' ";
		$queryy = mysql_query($ssqly);
			
		while ($record = mysql_fetch_array($queryy)){
				$nomor = $nomor + 1;
				echo "<tr>";
				echo "<td>$nomor</td>";
				echo "<td>".$record['idgejala']."</td>";
				echo "<td>".$record['gejala']."</td>";
				echo "</tr>";
		}
		echo "</tr>";
		echo "</tbody>";
		echo "</table>";
		
		//perhitungan mendapatkan diagnosa tiap penyakit
		echo "<h2>Proses</h2>";
		$hp1 = "SELECT * FROM detail_konsul WHERE iduser='$_GET[user]' AND rand='$_GET[rand]'";
		$q1 = mysql_query($hp1);
		$no=1;
		while ($r1 = mysql_fetch_array($q1)){
		$idg=$r1['idgejala'];
		echo "$no. $idg ";

		$qp1 = mysql_query("SELECT * FROM basis_aturan WHERE id_gejala='$idg'");
		$rp1 = mysql_fetch_array($qp1);
		echo "- $rp1[id_penyakit] - ";
		
		//rumus
		$p=1/$jum_penyakit;
		$m=$jum_gejala;
		
		if ($rp1['id_penyakit']=='p1') { $p1="1"; } else { $p1="0"; }
		if ($rp2['id_penyakit']=='p2') { $p2="1"; } else { $p2="0"; }
		if ($rp3['id_penyakit']=='p3') { $p3="1"; } else { $p3="0"; }
		if ($rp4['id_penyakit']=='p4') { $p4="1"; } else { $p4="0"; }
		if ($rp5['id_penyakit']=='p5') { $p5="1"; } else { $p5="0"; }
		echo "$p1 $p2 $p3 $p4 $p5 <br>";
		
		$p1=($p1+($jum_gejala*$p))/($n+$jum_gejala);
		$p2=($p2+($jum_gejala*$p))/($n+$jum_gejala);
		$p3=($p3+($jum_gejala*$p))/($n+$jum_gejala);
		$p4=($p4+($jum_gejala*$p))/($n+$jum_gejala);
		$p5=($p5+($jum_gejala*$p))/($n+$jum_gejala);

		echo "$p1 $p2 $p3 $p4 $p5 <br>";
		
		$np1=$p1*$p1*$p1;
		$np2=$p2*$p2*$p2;
		$np3=$p3*$p3*$p3;
		$np4=$p4*$p4*$p4;
		$np5=$p5*$p5*$p5;
		
		$no=$no+1;
		}
		
		$nilai_p1=$p*$np1;
		$nilai_p2=$p*$np2;
		$nilai_p3=$p*$np3;
		$nilai_p4=$p*$np4;
		$nilai_p5=$p*$np5;

		echo "$nilai_p1 $nilai_p2 $nilai_p3 $nilai_p4 $nilai_p5  <hr>"; 
		
		$prob_sakit1 = round ($nilai_p1,5);
		$prob_sakit2 = round ($nilai_p2,5);
		$prob_sakit3 = round ($nilai_p3,5);
		$prob_sakit4 = round ($nilai_p4,5);
		$prob_sakit5 = round ($nilai_p5,5);
		
		//$prob_sakit1 *= 100 ;
		//$prob_sakit2 *= 100;
		//$prob_sakit3 *= 100;
		//$prob_sakit4 *= 100;
		//$prob_sakit5 *= 100;
		
		
		$hasil = $prob_sakit1;
		$penyakit = "p1";
		
		if ($prob_sakit2 >= $prob_sakit1 && $prob_sakit2 >= $prob_sakit3 && $prob_sakit2 >= $prob_sakit4 && $prob_sakit2 >= $prob_sakit5){
			$hasil = $prob_sakit2;
			$penyakit = "p2";
		}
		if ($prob_sakit3 >= $prob_sakit1 && $prob_sakit3 >= $prob_sakit2 && $prob_sakit3 >= $prob_sakit4 && $prob_sakit3 >= $prob_sakit5){
			$hasil = $prob_sakit3;
			$penyakit = "p3";
		}
		if ($prob_sakit4 >= $prob_sakit1 && $prob_sakit4 >= $prob_sakit2 && $prob_sakit4 >= $prob_sakit3 && $prob_sakit4 >= $prob_sakit5){
			$hasil = $prob_sakit4;
			$penyakit = "p4";
		}
		if ($prob_sakit5 >= $prob_sakit1 && $prob_sakit5 >= $prob_sakit2 && $prob_sakit5 >= $prob_sakit3 && $prob_sakit5 >= $prob_sakit4){
			$hasil = $prob_sakit5;
			$penyakit = "p5";
		}
		
		//jika jawaban bernilai tidak semuanya
		if ($prob_sakit1 == 30 && $prob_sakit2 == 20 && $prob_sakit3 == 10 && $prob_sakit4 == 20 && $prob_sakit5 == 20){
			$penyakit = "p0";
			$prob_sakit1 *= 0;
			$prob_sakit2 *= 0;
			$prob_sakit3 *= 0;
			$prob_sakit4 *= 0;
			$prob_sakit5 *= 0;
			$sakit = "Anda Negatif Penyakit Lambung";
		}
		
		$sstring = "SELECT * FROM daftar_penyakit WHERE id_penyakit = '$penyakit'";
		$query = mysql_query($sstring);
		
		while ($record = mysql_fetch_array($query)){
			$sakit = strtoupper($record['nama_penyakit']);
		}
		
		echo "<h2>Kemungkinan Penyakit</h2>";
		echo "<table border=1 class=\"table table-striped\" id=\"tabel_hasil\">";
		echo "<thead class=\"head-table\">";
		echo "<th>Nama Penyakit</th>";
		echo "<th>Gastritis (Maag) Akut</th>";
		echo "<th>Gastritis (Maag) Kronis</th>";
		echo "<th>Dispepsia</th>";
		echo "<th>Gastroesophageal Reflux Disease</th>";
		echo "<th>Kanker Lambung</th>";
		echo "</thead>";
		echo "<tbody>";
		echo "<tr>";
		echo "<td>Kemungkinan</td>";
		echo "<td>$prob_sakit1 %</td>";
		echo "<td>$prob_sakit2 %</td>";
		echo "<td>$prob_sakit3 %</td>";
		echo "<td>$prob_sakit4 %</td>";
		echo "<td>$prob_sakit5 %</td>";
		echo "</tr>";
		echo "</tbody>";
		echo "</table>";
		
		/*menampilkan kesimpulan serta saran*/
		echo "<div class=\"kesimpulan\">";
		if ($penyakit != 'p0'){
			echo "<h5 style=\"font-size:17px;\">Anda dinyatakan mengidap $sakit</h5>";
		}
		
		$ssql = "SELECT * FROM daftar_solusi WHERE id_penyakit = '$penyakit'";
		$query = mysql_query ($ssql);
		
		while ($record = mysql_fetch_array($query)){
			$kesimpulan = $record['solusi'];
			echo "<h5 id=\"hasil_text\">$kesimpulan</h5>";
		}
			echo"</div>";
		echo "</div>";
?>