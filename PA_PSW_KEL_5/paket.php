<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_two();
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2></i><span class="break"></span>Data Paket</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							  <tr style="background-color:lightblue;">
								  <th>ID Paket</th>
								  <th>Nama Paket</th>
								  <th>Deskripsi</th>	
								  <th>Gambar</th>
                                  <th>Harga</th>
                                  <th>Aksi</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM paket ORDER BY id_paket DESC";
								$result=mysql_query($sql); //rs.open sql,con

							while ($row=mysql_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td style="width:100px;"> <center><?php echo $row['id_paket']; ?></center></td>
								<td style="width:200px;"><?php echo $row['nama_paket']; ?></td>
								<td><?php echo $row['deskripsi']; ?></td>
								<td style="width:300px;"><center><img src="<?php echo 'img2/'.$row['gambar']?>" style='width:280px;height:130px'></center></td>
								<td style="width:200px;">Rp. <?= number_format($row['harga'])?>,-</td>
								<td class="center" style="width:150px;">
									<a class="btn btn-info" href="edit_paket.php?uID=<?php echo $row['id_paket']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="delete_paket.php?id_paket=<?php echo $row['id_paket'];?>">
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