<?php
$link_list='?hal=data_solusi';
$link_update='?hal=update_solusi';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$kode=$_POST['kode'];
	$solusi=$_POST['solusi'];
	
	if(empty($kode) or empty($solusi)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
			if(mysql_num_rows(mysql_query("select * from solusi where kode='".$kode."'"))>0){
				$error='Kode sudah terdaftar. Silahkan gunakan kode yang lain.';
			}else{
				$q="insert into solusi(kode, solusi) values('".$kode."', '".$solusi."')";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		if($action=='edit'){
			$q=mysql_query("select * from solusi where kode='".$id."'");
			$h=mysql_fetch_array($q);
			$kode_tmp=$h['kode'];
			if(mysql_num_rows(mysql_query("select * from solusi where kode='".$kode."' and kode<>'".$kode_tmp."'"))>0){
				$error='Kode sudah terdaftar. Silahkan gunakan kode yang lain.';
			}else{
				$q="update solusi set kode='".$kode."', solusi='".$solusi."' where kode='".$id."'";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	$kode='';$solusi='';
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysql_query("select * from solusi where kode='".$id."'");
		$h=mysql_fetch_array($q);
		$kode=$h['kode'];
		$solusi=$h['solusi'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		mysql_query("delete from solusi where kode='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}


?>

<h3 class="p2">Update Data solusi</h3>
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
	<td width="120">Kode<span class="required">*</span> </td>
	<td><input name="kode" type="text" size="40" value="<?php echo $kode;?>" class="m-wrap large"></td>
  </tr>
  <tr>
	<td>solusi solusi<span class="required">*</span> </td>
	<td><input name="solusi" type="text" size="40" value="<?php echo $solusi;?>" class="m-wrap large"></td>
  </tr>
  <tr>
	<td></td>
	<td><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn" onclick="location.href='<?php echo $link_list;?>'">Batal</button></td>
  </tr>
</table>
</form>
