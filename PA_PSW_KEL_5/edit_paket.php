<?php
$paketID = $_GET['uID'];

	include('includes/connection.php');

	$sql ="SELECT * FROM paket where id_paket = '$paketID' ORDER BY id_paket";
	$result = mysql_query($sql);

	$num = mysql_num_rows($result);

	$i = 0;

	while ($i < $num)
	{
		$autoid = mysql_result($result,$i,"id_paket");
		$nama_paket = mysql_result($result,$i,"nama_paket");
		$deskripsi = mysql_result($result,$i,"deskripsi");
		$gambar = mysql_result($result,$i,"gambar");
        $harga = mysql_result($result,$i,"harga");
        $jadwal = mysql_result($result,$i,"jadwal");
		$i++;
	}

?>
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_two();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Perbaharui Paket</h2>
						<div class="box-icon">
							<a href="paket.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="update_data_paket.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Nama Paket : </label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtnama_paket" id="focusedInput" type="text" 
								  value="<?php echo $nama_paket; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Deskripsi :</label>
								<div class="controls">
								  <textarea name="txtdeskripsi"><?php echo $deskripsi;?></textarea> 
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Gambar :</label>
								<div class="controls">
									<img src="img2/<?php echo $gambar?>" width="500" height="210"><br/>
									<input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
      								<input type="file" name="gambar" style="width: 200px">	
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Harga :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtharga" id="focusedInput" type="text" placeholder="capacity"
								  value="Rp. <?php echo number_format($harga) ?>,-">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jadwal :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtjadwal" id="focusedInput" type="date"
								  value="<?php echo $jadwal ?>">
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Simpan Perubahan</button>
								<input type="hidden" name="uID" value="<?php echo $autoid; ?>">
								<a href="paket.php"><button type="submit" class="btn btn-primary" style="float:right;">Batal</button></a>
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>