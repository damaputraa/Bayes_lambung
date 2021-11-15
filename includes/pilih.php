<h3 class="p2">Laporan Hasil Konsultasi</h3>
<form action="" method="get">
	<table width="100%" border="1"  class="table table-striped table-hover table-bordered">
      <tr>
    <td>Tahun</td>
	<td>
	  <input name="hal" type="hidden" id="hal" value="lkonsultasi1" size="" />
	<select name="thn" id="thn" required>
	  <option value="">Pilih Tahun</option>
	  <?php for ($i=2016; $i<=2020; $i++) {
	  echo "<option value='$i'>$i</option>";
	  } 
	 ?>
	</select></td>
      </tr>
      <tr>
    <td>Bulan</td>
	<td><select name="bln" id="bln" required>
	  <option value="">Pilih Bulan</option>
	  <?php for ($i=1; $i<=12; $i++) {
	  if ($i<10) { 
	  echo "<option value='0$i'>0$i</option>"; }
	  else { 
	  echo "<option value='$i'>$i</option>"; }
	  } 
	 ?>
	</select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" name="Submit" value="Cetak" />
        </label></td>
      </tr>
    </table>
</form>