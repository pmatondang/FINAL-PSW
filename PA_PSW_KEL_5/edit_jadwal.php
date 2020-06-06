<?php
$jadwalID = $_GET['uID'];

	include('includes/connection.php');

	$sql ="SELECT * FROM data_jadwal where id_jadwal = '$jadwalID' ORDER BY id_jadwal";
	$result = mysql_query($sql);

	$num = mysql_num_rows($result);

	$i = 0;

	while ($i < $num)
	{
		$autoid = mysql_result($result,$i,"id_jadwal");
		$nama_paket = mysql_result($result,$i,"nama_paket");
		$harga = mysql_result($result,$i,"harga");
        $time = mysql_result($result,$i,"jam_berangkat");
        $kap = mysql_result($result,$i,"kapasitas");
		$i++;
	}

?>
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_nine();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Perbaharui Jadwal</h2>
						<div class="box-icon">
							<a href="jadwal.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="update_data_jadwal.php">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="focusedInput">Nama Paket : </label>
									<div class="controls">
									<input class="input-xlarge focused" name="txtnama_paket" id="focusedInput" type="text" placeholder="Package's Name" 
									value="<?php echo $nama_paket; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="focusedInput">Harga :</label>
									<div class="controls">
									<input class="input-xlarge focused" name="txtharga" id="focusedInput" type="text" placeholder="Password"
									value="<?php echo $harga; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="focusedInput">Jam Berangkat :</label>
									<div class="controls">
									<select class="form-control" name="txtjam" required>
										<option value="<?php echo $time; ?>">Pilih jam keberangkatan</option>
										<option value="09:00">09:00</option>
										<option value="20:00">20:00</option>
										<option value="10:00">10:00</option>
										<option value="22:00">22:00</option>
										<option value="08:30">08:30</option>
										<option value="20:30">20:30</option>
										<option value="07:30">07:30</option>
										<option value="19:30">19:30</option>
										<option value="20:00">20:00</option>
										<option value="07:00">07:00</option>
										<option value="18:30">18:30</option>
									</select>
									
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="focusedInput">Kapasitas :</label>
									<div class="controls">
									<input class="input-xlarge focused" name="txtkap" id="focusedInput" type="text" placeholder="capacity"
									value="<?php echo $kap; ?>">
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Simpan Perubahan</button>
									<input type="hidden" name="hid" value="<?php echo $autoid; ?>">
									<a href="jadwal.php"><button type="submit" class="btn btn-primary" style="float:right;">Batal</button></a>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
<?php
	get_footer();
?>