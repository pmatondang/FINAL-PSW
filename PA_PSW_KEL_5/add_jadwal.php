<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_three();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tambah Jadwal Baru</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="save_jadwal.php">
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
									<input class="input-xlarge focused" name="txtnama_paket" id="focusedInput" type="text" placeholder="Nama Paket" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Harga :</label>
								<div class="controls">
									<input class="input-xlarge focused" name="txtharga" id="focusedInput" type="text" value="Rp. " required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Jam Berangkat :</label>
								<div class="controls">
								<select class="form-control" name="txtjam" required>
                                    <option value=""></option>
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
								  <input class="input-xlarge focused" name="txtkap" id="focusedInput" type="text" placeholder="kapasitas" required>
								</div>
							  </div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary">Simpan Jadwal</button>
							  </div>
							</fieldset>
						</form><br>
						<div>
							<a href="jadwal.php"><button type="submit" class="btn btn-primary" style="float:right;">Batal</button></a>	
						</div>
					</div>
				</div><br>
			</div>
<?php
	get_footer();
?>