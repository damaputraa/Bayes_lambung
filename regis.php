<?php
if ($_GET['aksi']=='simpan') {

$defdate = date ('Y-m-d');
$query = "INSERT INTO daftar_user        
          (id_user, nama, password, username, tgl_diagnosa, keterangan, usia) 
VALUES ('$_POST[id]','$_POST[nama]','$_POST[password]','$_POST[username]','$defdate','-','$_POST[umur]')";
$result = mysql_query($query)
or die(mysql_error());
echo"<meta http-equiv=Refresh content=1;url=?hal=regis-selesai>";
}
?>
<h3 align="center">Form Registrasi</h3>

	<form action="?hal=regis&aksi=simpan" method="post">
	<table> 
	
	<tr> <td>Id Pasien</td> 
	<td>:
	  <input name="id" type="text" id="id" size="10"/></td> </tr>
	<tr> <td>Nama Lengkap </td> 
	  <td>:
	    <input name="nama" type="text" id="nama"/></td> </tr>
	<tr> <td>Username</td> 
	  <td>:
	    <input name="username" type="text" id="username"/></td> </tr>
	<tr> <td>Password</td> 
	  <td>:
	    <input name="password" type="password" id="password"/></td> </tr>
	<tr> <td>Umur</td> 
	  <td>:
	    <input name="umur" type="text" id="umur"/></td> </tr>
<!--	<tr> <td>Jenis Kelamin </td> 
	  <td>: <select name="jk" required>
	    <option value="">Jenis Kelamin</option>
	    <option value="Laki-Laki">Laki-Laki</option>
	    <option value="Perempuan">Perempuan</option>
	  </select></td> </tr>
-->	
	 <tr> <td colspan="2"> 
	<input name="submit" type="submit" class="button green" id="submit" value="Registrasi" /> </td></tr>
	
	</table>
	</form>
