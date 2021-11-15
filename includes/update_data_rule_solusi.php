<?php
$link_list='?hal=data_pengetahuan';
$link_update='?hal=update_data_rule_solusi';

if(isset($_POST['save'])){
	$id=$_POST['id'];
	$action=$_POST['action'];
	$idpenyakit=$_POST['idpenyakit'];
	$idsolusi=$_POST['idsolusi'];
	
	if(empty($idpenyakit) or empty($idsolusi)){
		$error='Masih ada beberapa kesalahan. Silahkan periksa lagi form di bawah ini.';
	}else{
		if($action=='add'){
				$q="insert into solusi_penyakit(idpenyakit, idsolusi) values('".$idpenyakit."', '".$idsolusi."')";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
		}
		if($action=='edit'){
			$q=mysql_query("select * from solusi_penyakit where kode='".$id."'");
			$h=mysql_fetch_array($q);
			$idpenyakit_tmp=$h['idpenyakit'];
			if(mysql_num_rows(mysql_query("select * from solusi_penyakit where idpenyakit='".$idpenyakit."' and idpenyakit<>'".$idpenyakit_tmp."'"))>0){
				$error='idpenyakit sudah terdaftar. Silahkan gunakan idpenyakit yang lain.';
			}else{
				$q="update solusi_penyakit set idpenyakit='".$idpenyakit."', idsolusi='".$idsolusi."' where kode='".$id."'";
				mysql_query($q);
				exit("<script>location.href='".$link_list."';</script>");
			}
		}
		
	}
}else{
	//$idpenyakit='';$idsolusi='';
	if(empty($_GET['action'])){$action='add';}else{$action=$_GET['action'];}
	if($action=='edit'){
		$id=$_GET['id'];
		$q=mysql_query("select * from solusi_penyakit where kode='".$id."'");
		$h=mysql_fetch_array($q);
		$idpenyakit=$h['idpenyakit'];
		$idsolusi=$h['idsolusi'];
	}
	if($action=='delete'){
		$id=$_GET['id'];
		$idp=$_GET['idp'];
		mysql_query("delete from solusi_penyakit where idpenyakit='".$idp."' and idsolusi='".$id."'");
		exit("<script>location.href='".$link_list."';</script>");
	}
}


?>

<h3 class="p2">Update Data Rule Solusi</h3>
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
	<td width="120">Kode Penyakit<span class="required">*</span> </td>
	<td>
	<select name="idpenyakit" id="idpenyakit">
<?php
	echo "<option value=$idpenyakit>$idpenyakit</option>";
 	$q1="select * from penyakit order by id_penyakit";
	$q1=mysql_query($q1);
	while($h1=mysql_fetch_array($q1)){
	echo "<option value=$h1[kode]>$h1[kode] - $h1[nama]</option>";
	}
?>
	</select>
  </tr>
  <tr>
	<td>Kode Solusi<span class="required">*</span> </td>
	<td>
	<select name="idsolusi" id="idsolusi">
<?php
	echo "<option value=$idsolusi>$idsolusi</option>";
 	$q1="select * from solusi";
	$q1=mysql_query($q1);
	while($h1=mysql_fetch_array($q1)){
	echo "<option value=$h1[kode]>$h1[kode] - ".substr($h1['solusi'],0,80)."..</option>";
	}
?>
	</select>
  </tr>
  </tr>
  <tr>
	<td></td>
	<td><button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button> 
	<button type="button" name="cancel" class="btn" onclick="location.href='<?php echo $link_list;?>'">Batal</button></td>
  </tr>
</table>
</form>
