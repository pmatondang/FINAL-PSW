<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_eight();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tambah Data Pengunjung</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="save_pengunjung.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Nama Tempat :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="nama_paket" id="focusedInput" type="text" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jumlah Pengunjung :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="jumlah" id="focusedInput" type="number" required>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary">Simpan Pengunjung</button>
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>