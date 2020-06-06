<?php
$userID = $_GET['uID'];

	include('includes/connection.php');

	$sql ="SELECT * FROM akun where id_akun = '$userID'";
	$result = mysql_query($sql);

	$num = mysql_num_rows($result);

	$i = 0;

	while ($i < $num)
	{
		$autoid = mysql_result($result,$i,"id_akun");
		$user = mysql_result($result,$i,"username");
		$pass = mysql_result($result,$i,"password");
		$fn = mysql_result($result,$i,"role");
		$i++;
	}

?>
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_eleven();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Perbaharui akun</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="update_data.php">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Username:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtusername" id="focusedInput" type="text" placeholder="Username" 
								  value="<?php echo $user; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Password:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtpassword" id="focusedInput" type="password" placeholder="Password"
								  value="<?php echo $pass; ?>">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Role:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtrole" id="focusedInput" type="text" placeholder="Role"
								  value="<?php echo $fn; ?>">
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

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->