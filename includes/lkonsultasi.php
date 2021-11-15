<body onload=javascript:window:print()>

<h3 class="p2" align="center">REKAPITULASI  HASIL KONSULTASI</h3>
Bulan : <?php echo"$_GET[bln] / $_GET[thn]"; 

include "../config.php";?>
<table width="100%" border="1" bgcolor="#CCCCCC"  class="table table-striped table-hover table-bordered">
      <tr bgcolor="#999999">
        <td valign="top"><strong>No.</strong></td>
        <td><strong>Id pasien</strong></td>
        <td valign="top"><strong>Nama Lengkap</strong></td>
        <td><strong>Umur</strong></td>
        <td><strong>Penyakit</strong></td>
        <td><strong>CF</strong></td>
      </tr>
	  	<?php 
$no=1;
$querya1 = "SELECT * FROM konsultasi WHERE substr(tgl,1,4)='$_GET[thn]' AND substr(tgl,6,2)='$_GET[bln]' "; 
$resulta1 = mysql_query($querya1) or die('Error');
while($data1 = mysql_fetch_array($resulta1))
{

$querya = "SELECT * FROM member where id='$data1[pasien]'"; 
$resulta = mysql_query($querya) or die('Error');
$data = mysql_fetch_array($resulta);

$a= $data['username'] ;
$d= $data['umur'] ;
$e= $data['jk'] ;
$f= $data['nama'] ;
$id= $data['id'] ;
?>
      <tr>
        <td valign="top"><?php echo "$no"; ?></td>
        <td valign="top"><?php echo "$id " ; ?></td>
        <td valign="top"><?php echo "$f" ;?></td>
        <td valign="top"><?php echo "$d " ; ?></td>
        <td valign="top"><?php echo "$data1[penyakit]" ; ?></td>
        <td valign="top"><?php echo "$data1[persentase] %"; ?></td>
      </tr>
<?php
$no++;  }
?>
      
    </table>
     
<table width="30%" align="right">
  <tr>
    <td align="center">Bengkulu, <?php $now=date("d/m/Y"); echo"$now";?>
	<br /><br /><br />
	(Admin)</td>
  </tr>
</table>
