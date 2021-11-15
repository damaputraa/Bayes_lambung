<?php
$link_list='?hal=data_pengetahuan';
$link_update='?hal=update_pengetahuan';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$id_penyakit=$_POST['penyakit'];
	$id_gejala=$_POST['gejala'];
	
	if(empty($id_penyakit) or empty($id_gejala)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
			if(mysql_num_rows(mysql_query("select * from pengetahuan where id_penyakit='".$id_penyakit."' and id_gejala='".$id_gejala."'"))>0){
				$error='Basis pengetahuan sudah terdaftar sebelumnya. Silahkan gunakan basis pengetahuan yang lain.';
			}else{
				$q="insert into pengetahuan(id_penyakit, id_gejala) values('".$id_penyakit."', '".$id_gejala."')";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		if($action=='edit'){
			$q=mysql_query("select * from pengetahuan where id_pengetahuan='".$id."'");
			$h=mysql_fetch_array($q);
			$id_penyakit_tmp=$h['id_penyakit'];
			$id_gejala_tmp=$h['id_gejala'];
			if(mysql_num_rows(mysql_query("select * from pengetahuan where id_penyakit='".$id_penyakit."' and id_penyakit<>'".$id_penyakit_tmp."' and id_gejala='".$id_gejala."' and id_gejala<>'".$id_gejala_tmp."'"))>0){
				$error='Basis pengetahuan sudah terdaftar sebelumnya. Silahkan gunakan basis pengetahuan yang lain.';
			}else{
				$q="update pengetahuan set id_penyakit='".$id_penyakit."', id_gejala='".$id_gejala."' where id_pengetahuan='".$id."'";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	//$id_penyakit='';$id_gejala='';$mb='';$md='';
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysql_query("select * from pengetahuan where id_pengetahuan='".$id."'");
		$h=mysql_fetch_array($q);
		$id_penyakit=$h['id_penyakit'];
		$id_gejala=$h['id_gejala'];
		$mb=$h['mb'];
		$md=$h['md'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysql_query("delete from pengetahuan where id_pengetahuan='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}

$list_penyakit='';
$q=mysql_query("select * from penyakit order by kode");
while($h=mysql_fetch_array($q)){
	if($h['id_penyakit']==$id_penyakit){$s='selected';}else{$s='';}
	$list_penyakit.='<option value="'.$h['id_penyakit'].'" '.$s.'>'.$h['kode'].'-'.$h['nama'].'</option>';
}
$list_gejala='';
$q=mysql_query("select * from gejala order by kode");
while($h=mysql_fetch_array($q)){
	if($h['id_gejala']==$id_gejala){$s='selected';}else{$s='';}
	$list_gejala.='<option value="'.$h['id_gejala'].'" '.$s.'>'.$h['kode'].'-'.$h['nama'].'</option>';
}

?>

<h3 class="p2">Update Data Basis Pengetahuan</h3>
<div style="clear:both;height:20px;"></div>
<form action="<?php echo $link_update;?>" name="" method="post" enctype="multipart/form-data">
<input name="id" type="hidden" value="<?php echo $id;?>">
<input name="action" type="hidden" value="<?php echo $action;?>">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
}
?>

<table class="table">
  <tr>
	<td width="120">Penyakit<span class="required">*</span> </td>
	<td><select name="penyakit"><option value=""></option><?php echo $list_penyakit;?></select></td>
  </tr>
  <tr>
	<td>Gejala<span class="required">*</span> </td>
	<td><select name="gejala"><option value=""></option><?php echo $list_gejala;?></select></td>
  </tr>
  
  <tr>
	<td></td>
	<td><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn" onclick="location.href='<?php echo $link_list;?>'">Batal</button></td>
  </tr>
</table>
</form>
