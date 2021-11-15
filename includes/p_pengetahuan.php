<?php

$link_list='?hal=data_pengetahuan';
$link_update='?hal=update_pengetahuan';
$no=0;
$q=mysql_query("select * from basis_aturan");

?>
<h3 class="p2">Data Rule</h3>
<div style="clear:both;height:20px;"></div>
<table class="table table-striped table-hover table-bordered" width="100%">
	<thead>
		<tr>
			<th style="text-align:center; vertical-align:middle" width="3%" rowspan="2">NO</th>
			<th style="text-align:center; vertical-align:middle" rowspan="2">ID GEJALA</th>
			<th style="text-align:center; vertical-align:middle" rowspan="2">PERTANYAAN</th>
			<th style="text-align:center; vertical-align:middle" rowspan="2">RULE</th>
			<th style="text-align:center; vertical-align:middle" align="center" rowspan="2" width="22%">AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php
	while($h=mysql_fetch_array($q)){
		$no++;
		$id=$h['id_gejala'];
		echo'
		  <tr>
			<td style="text-align:center;">'.$no.'</td>
			<td>'.$h['id_gejala'].'</td>
			<td>'.$h['pertanyaan'].'</td>
			<td style="text-align:center;">'.$h['rute'].'</td>
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
