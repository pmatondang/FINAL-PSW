<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_nine();
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2></i><span class="break"></span>Data Jadwal</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr style="background-color:lightblue">
								  <th>ID Jadwal</th>
								  <th>Nama Paket</th>
								  <th>Harga</th>	
								  <th>Jam Berangkat<th>
                                  Kapasitas
								  <th>Aksi</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM data_jadwal ORDER BY id_jadwal DESC";
								$result=mysql_query($sql); //rs.open sql,con

							while ($row=mysql_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td> <center><?php echo $row['id_jadwal']; ?></center></td>
								<td><?php echo $row['nama_paket']; ?></td>
								<td>Rp. <?php echo number_format($row['harga']);?>,-</td>
								<td><?php echo $row['jam_berangkat']; ?></td>
                                <td><?php echo $row['kapasitas']; ?></td>
								<td class="center">
									<a class="btn btn-info" href="edit_jadwal.php?uID=<?php echo $row['id_jadwal']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="delete_jadwal.php?id_jadwal=<?php echo $row['id_jadwal'];?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>