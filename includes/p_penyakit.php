<?php

$link_list='?hal=data_penyakit';
$link_update='?hal=update_penyakit';

$no=0;
$q=mysql_query("select * from daftar_penyakit");

?>
<h3 class="p2">Data Penyakit</h3>
<div style="clear:both;height:20px;"></div>
<a href="<?php echo $link_update;?>" class="btn blue" style="float:right">Tambah Data Penyakit</a><br /><br />
<table class="table table-striped table-hover table-bordered" width="100%">
	<thead>
		<tr>
			<th style="text-align:center; vertical-align:middle" width="3%" rowspan="2">NO</th>
			<th style="text-align:center; vertical-align:middle" rowspan="2">ID PENYAKIT</th>
			<th style="text-align:center; vertical-align:middle" rowspan="2">NAMA PENYAKIT</th>
			<th style="text-align:center; vertical-align:middle" align="center" rowspan="2" width="22%">AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php
	while($h=mysql_fetch_array($q)){
		$no++;
		$id=$h['id_penyakit'];
		echo'
		  <tr>
			<td style="text-align:center;">'.$no.'</td>
			<td>'.$h['id_penyakit'].'</td>
			<td>'.$h['nama_penyakit'].'</td>
			<td style="text-align:center;">
			<a href="'.$link_update.'&amp;id='.$id.'&amp;action=edit" class="btn">Edit</a> 
			<a href="'.$link_update.'&amp;id='.$id.'&amp;action=hapus" class="btn">Hapus</a> 
			</td>
		  </tr>
		';
}
		?>
	</tbody>
</table>
