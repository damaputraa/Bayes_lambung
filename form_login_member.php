	<h3 style="text-align:center">Silahkan Login Terlebih Dahulu</h3>
	<div id="login" align="center">
	<form action="user-login.php" method="post">
	<table> <tr> 
	<td>Pilih Login 
	<a href="?hal=admin"><input name="login" type="radio" value="Admin"/> Admin</a>  
	<a href="?hal=pasien"><input name="login" type="radio" value="Pasien" checked="checked" /> Pasien </a> <p>
	</td> </tr>
	<tr> 
	<td><input name="text_name" type="text" class="login user" id="text_name" onfocus="if(this.value=='Username')this.value='';" onblur="if(this.value=='')this.value='Username';" value="Username"/></td> </tr>
	<tr> <td>
	<input name='pass' type='text' class="login password" id="pass"  onfocus="if(this.value=='' || this.value == 'Password') {this.value='';this.type='password'}"  onblur="if(this.value == '') {this.type='text';this.value=this.defaultValue}" value='Password'/></td></tr>
	<br /> <tr> <td colspan="1"> 
	<input name="login" type="submit" value="Konsultasi" class="button green" /> </td></tr></table>
	</form>
	Bagi pasien yang belum memiliki Username, <a href="?hal=regis">Registrasi disini</a>  
  </div>