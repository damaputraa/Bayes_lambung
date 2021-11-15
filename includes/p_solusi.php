<?php

$link_list='?hal=data_solusi';
$link_update='?hal=update_solusi';

$no=0;
$q=mysql_query("select * from daftar_solusi");

?>
<h3 class="p2">Data Solusi</h3>
<div style="clear:both;height:20px;"></div>
<a href="<?php echo $link_update;?>" class="btn blue" style="float:right">Tambah Data Solusi</a><br /><br />
<table class="table table-striped table-hover table-bordered" width="100%">
	<thead>
		<tr>
			<th style="text-align:center; vertical-align:middle" width="3%" rowspan="2">NO</th>
			<th style="text-align:center; vertical-align:middle" rowspan="2">ID SOLUSI</th>
			<th style="text-align:center; vertical-align:middle" rowspan="2">NAMA SOLUSI</th>
			<th style="text-align:center; vertical-align:middle" align="center" rowspan="2" width="22%">AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php
	while($h=mysql_fetch_array($q)){
		$no++;
		$id=$h['id_solusi'];
		echo'
		  <tr>
			<td style="text-align:center;">'.$no.'</td>
			<td>'.$h['id_solusi'].'</td>
			<td>'.$h['solusi'].'</td>
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
