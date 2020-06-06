<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_ten();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tambah Paket Baru</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="save_paket.php">
							<fieldset>
							<!-- <div class="control-group">
								<label class="control-label" for="focusedInput">ID Schedule :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="id_jadwal" id="focusedInput" type="text"required>
								</div>
							  </div> -->
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Nama Paket :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtnama_paket" id="" type="text" placeholder="isi nama paket..." required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Deskripsi :</label>
								<div class="controls">
								  <textarea class="input-xlarge focused" name="txtdeskripsi" type="text" required>
								  </textarea>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Gambar :</label>
								<div class="controls">
                                    <input type="file" name="txtgambar">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Harga :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtharga" id="focusedInput" type="number" value="Rp. " required>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label" for="focusedInput">Jadwal :</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtjadwal" id="focusedInput" type="date" placeholder="your jadwal" required> sampai 
								  <input class="input-xlarge focused" name="txtjadwal2" id="focusedInput" type="date" placeholder="your jadwal" required>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Simpan Paket</button>
							  </div>
							</fieldset>
						</form><br>
						<a href="paket.php"><button type="submit" class="btn btn-primary" style="float:right;">Batal</button></a>	
					</div>
				</div>
			</div>
<?php
	get_footer();
?>