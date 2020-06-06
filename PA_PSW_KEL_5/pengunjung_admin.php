<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_eight();
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2></i><span class="break"></span>Data Pengunjung</h2>
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
								  <th>ID</th>
								  <th>Tempat yang dikunjungi</th>
								  <th>Jumlah Pengunjung</th>
								  <th>Aksi</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM pengunjung ORDER BY id_pengunjung DESC";
								$result=mysql_query($sql); //rs.open sql,con

							while ($row=mysql_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td> <center><?php echo $row['id_pengunjung']; ?></center></td>
								<td><?php echo $row['nama_paket']; ?></td>
								<td><?php echo $row['jumlah']; ?></td>
								<td class="center">
                                    <a class="btn btn-info" href="add_pengunjung.php?uID=<?php echo $row['id_pengunjung']; ?>">
										<i class="halflings-icon white plus"></i>  
									</a>
									<a class="btn btn-info" href="edit_pengunjung.php?uID=<?php echo $row['id_pengunjung']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="hapus_pengunjung.php?id_pengunjung=<?php echo $row['id_pengunjung'];?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
                          <div>
                            <a href="grafik_pengunjung_admin.php"><button style="height:30px;float:right;background-color:silver;cursor:pointer;font-size:20px;">
                                <b>Lihat diagram pengunjung</b></button>
                            </a>
                        </div>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>