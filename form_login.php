	<h3 style="text-align:center">Silahkan Login Terlebih Dahulu</h3>
<div id="login" align="center">
	<form action="login.php" method="post">
	<table> <tr> 
	<td>Pilih Login 
	<a href="?hal=admin"><input name="login" type="radio" value="Admin" checked="checked" /> Admin</a>  
	<a href="?hal=pasien"><input name="login" type="radio" value="Pasien" /> Pasien </a> <p>
	</td> </tr>
	<tr> 
	<td><input type="text" name="username" onblur="if(this.value=='')this.value='Username';" onfocus="if(this.value=='Username')this.value='';" value="Username" class="login user"/></td> </tr>
	<tr><td>
	<input type='text' name='password' value='Password'  onfocus="if(this.value=='' || this.value == 'Password') {this.value='';this.type='password'}"  onblur="if(this.value == '') {this.type='text';this.value=this.defaultValue}" class="login password"/></td></tr>
	<br /> <tr> <td colspan="1"> 
	<input name="login" type="submit" value="Login" class="button green" /> </td></tr></table>
	</form>
  </div>