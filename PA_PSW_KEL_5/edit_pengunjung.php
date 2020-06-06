<?php
$ID = $_GET['uID'];

	include('includes/connection.php');

	$sql ="SELECT * FROM pengunjung where id_pengunjung = '$ID' ORDER BY id_pengunjung";
	$result = mysql_query($sql);

	$num = mysql_num_rows($result);

	$i = 0;

	while ($i < $num)
	{
		$autoid = mysql_result($result,$i,"id_pengunjung");
		$nama_paket = mysql_result($result,$i,"nama_paket");
		$jumlah = mysql_result($result,$i,"jumlah");
		$i++;
	}

?>
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_eight();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Perbaharui data Pengunjung</h2>
						<div class="box-icon">
							<a href="jadwal.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="update_data_pengunjung.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Tempat wisata : </label>
								<div class="controls">
								  <input class="input-xlarge focused" name="nama_paket" id="focusedInput" type="text" 
								  value="<?php echo $nama_paket; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jumlah :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="jumlah" id="focusedInput" type="text" placeholder="Password"
								  value="<?php echo $jumlah; ?>">
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary">Simpan Perubahan</button>
								<input type="hidden" name="hid" value="<?php echo $autoid; ?>">
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>