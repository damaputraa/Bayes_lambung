<?php
$link_update='?hal=ubah_password';

if(isset($_POST['save'])){
	if(empty($_POST['password']) or empty($_POST['password_baru']) or empty($_POST['ulangi'])){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($_POST['password_baru']!=$_POST['ulangi']){
			$error='Password baru tidak sama. Silahkan ulangi lagi.';
		}else{
			if(mysql_num_rows(mysql_query("select * from `user` where id_user='".$id_login."' and password='".$_POST['password']."'"))>0){
				mysql_query("update `user` set password='".$_POST['password_baru']."' where id_user='".$id_login."'");
				$success='Password anda berhasil diubah.';
			}else{
				$error='Password anda salah. Silahkan ulangi lagi.';
			}
		}
	}
}


?>
 
<h3 class="p2">Ubah Password</h3>
<div style="clear:both;height:20px;"></div>
<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
}
if(!empty($success)){
	echo '
	   <div class="alert alert-success ">
		  '.$success.'
	   </div>
	';
}
?>

<table class="table">
  <tr>
	<td width="120">Password Anda<span class="required">*</span> </td>
	<td><input name="password" type="password" size="40" value="" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>Password Baru<span class="required">*</span> </td>
	<td><input name="password_baru" type="password" size="40" value="" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>Ulangi<span class="required">*</span> </td>
	<td><input name="ulangi" type="password" size="40" value="" class="m-wrap large"></td>
  </tr>
  <tr>
	<td></td>
	<td><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn" onclick="location.href='<?php echo $web_host;?>'">Batal</button></td>
  </tr>
</table>
</form>
