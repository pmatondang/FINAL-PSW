<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_eleven();
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Kelola Akun Pengguna</h2>
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
								  <th>ID Akun</th>
								  <th>Username</th>
								  <th>Email</th>
								  <th>Password</th>	
								  <th>Role<th>
								  Aksi
							  </tr>
						  </thead>
						  <tbody>
							<?php
								include("includes/connection.php");

								$sql = "SELECT * FROM akun ORDER BY id_akun";
								$result=mysql_query($sql); //rs.open sql,con

							while ($row=mysql_fetch_array($result))
							{ ?><!--open of while -->
							<tr>
								<td><?php echo $row['id_akun']; ?></td>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['password']; ?></td>
								<td><?php echo $row['role']; ?></td>
								<td class="center">
									<a class="btn btn-info" href="edit_data.php?uID=<?php echo $row['id_akun']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirmDel()" href="delete_data.php?delID=<?php echo $row['id_akun'];?>">
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

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->