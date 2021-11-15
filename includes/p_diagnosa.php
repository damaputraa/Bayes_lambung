<?php
$id='$_GET[id]';
$link_list='?hal=diagnosa&id=$id';
if(isset($_POST['submit'])){
	$gejala='';
	if(isset($_POST['gejala'])){
		$gejala=$_POST['gejala'];
	}
	if(empty($gejala)){
		$error='Silahkan pilih gelaja terlebih dahulu.';
	}else{
		$_SESSION['GEJALA']=$gejala;
		$id=$_SESSION['LOGIN_MEMBER'];
		exit("<script>location.href='?hal=hasil&id=$id';</script>");
		
	}
}
if(isset($_POST['reset'])){
	if(isset($_SESSION['GEJALA'])){
		unset($_SESSION['GEJALA']);
	}
	exit("<script>location.href='?hal=diagnosa&id=$id';</script>");
		
}

$list_gejala='';
$no=0;
$q=mysql_query("select * from gejala order by kode");
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
?>
<!--
		if(isset($_SESSION['GEJALA'])){
			if(in_array($h['id_gejala'],$_SESSION['GEJALA'])){$c='checked';}else{$c='';}
		}else{
			$c='';
		}
!-->
<?php
		$no++;
		$list_gejala.='
		  <tr>
			<td style="text-align:center;" width="30">'.$no.'</td>
			<td>'.$h['nama'].'</td>
			<td style="text-align:center;" width="30"><input name="gejala[]" type="checkbox" class="checkboxes" '.$c.' value="'.$h['id_gejala'].'" /></td>
		  </tr>
		';
	}
}
?>

<h3 class="p2">Form Konsultasi</h3>
<div style="clear:both;height:20px;"></div>
<form action="" name="" method="post" enctype="multipart/form-data">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
}
					$q=mysql_query("SELECT * FROM `member` WHERE id='$_GET[id]'");
					$h=mysql_fetch_array($q);

$tgl=date("d/m/Y"); echo "<div align=right>Tanggal $tgl</div>";?>

Id  Pengguna		: <?php echo "$h[id]"; ?> <br />
Nama Pengguna	    : <?php echo "$h[nama]"; ?> <br /><br />

<p>Conteng Gejala berikut ini:</p>
<table class="table table-striped table-hover table-bordered" border="1">
	<thead>
	  <tr>
		<td style="text-align:center;" width="30">NO</td>
		<td style="text-align:center;">NAMA GEJALA PENYAKIT REMATIK</td>
		<td style="text-align:center;" width="30"><input type="checkbox" id="ckbCheckAll" /></td>
	  </tr>
	</thead>
	<tbody>
		<?php echo $list_gejala;?>
	</tbody>
</table>
<center>
<button type="submit" name="reset" class="btn"> Reset</button>
<button type="submit" name="submit" class="btn"><i class="icon-ok"></i> Diagnosa</button>
</center>

</form>

<script>
jQuery(document).ready(function() {
	$("#ckbCheckAll").click(function () {
		if($(this).prop("checked")==true){
			$(".checkboxes").attr("checked",true);
			$(".checkboxes").parent("span").attr("class","checked");
		}else{
			$(".checkboxes").attr("checked",false);
			$(".checkboxes").parent("span").attr("class","");
		}
    });
})
</script>

