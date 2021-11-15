<h3 class="p2">Laporan Pasien</h3>
<table width="100%" border="1" bgcolor="#CCCCCC"  class="table table-striped table-hover table-bordered">
      <tr bgcolor="#999999">
        <td valign="top"><strong>No.</strong></td>
        <td><strong>Id pasien</strong></td>
        <td valign="top"><strong>Nama Lengkap</strong></td>
        <td><strong>Jenis Kelamin</strong></td>
        <td><strong>Tgl.Lahir</strong></td>
      </tr>
	  	<?php 
$querya = "SELECT * FROM daftar_user"; 
$resulta = mysql_query($querya) or die('Error');
$no=1;
while($data = mysql_fetch_array($resulta))
{
$a= $data['jenis_kelamin'] ;
$d= $data['usia'] ;
$f= $data['nama'] ;
$id= $data['id_user'] ;
?>
      <tr>
        <td valign="top"><?php echo "$no"; ?></td>
        <td valign="top"><?php echo "$id " ; ?></td>
        <td valign="top"><?php echo "$f" ;?></td>
        <td valign="top"><?php echo "$a " ; ?></td>
        <td valign="top"><?php echo "$d" ; ?></td>
      </tr>
<?php $no++; }?>
      
    </table>
     
