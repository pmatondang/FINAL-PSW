<!DOCTYPE html>
<?php 
	include 'includes/data.php';
	
?>	
<html lang="en">
	<head>
	<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_seven();
?>


	</head>
	<body>    

	<!-- Navbar
    ================================================== -->

	

	<div id="wrap">
	<div class="container">
		<div class="row">
			
			<div class="span6" id="form-login">
				
			</div>
			<div class="span3 hidden-phone"></div>

			
		</div>
		<form action="export.php" method="post" name="export_excel">

			<div class="control-group">
				<div class="controls">
					<button type="submit" id="export" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export MySQL Data ke CSV/Excel File</button>
				</div>
			</div>
		</form>	

		<table class="table table-bordered">
			<thead>
				  	<tr>
						<th>Nomor Pesanan</th>
						<th>Nomor Pesanan Tiket</th>
						<th>Nama</th>
						<th>Gender</th>
						<th>Email</th>
				  	</tr>	
				  </thead>
			<?php
				$SQLSELECT = "SELECT * FROM pemesanan";
				$result_set =  mysql_query($SQLSELECT, $conn);
				while($row = mysql_fetch_array($result_set))
				{
				?>
			
					<tr>
						<td><?php echo $row['id_pesanan']; ?></td>
						<td><?php echo $row['id_tiket']; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['gender']; ?></td>
						<td><?php echo $row['email']; ?></td>
					</tr>
				<?php
				}
			?>
		</table>
	</div>

	</div>

	<?php
            get_footer();
        ?>	

    </body>
</html>

<style type="text/css">
	.a{	
		color: #ffff;

	}
    .col-md {
        background: #c2dcd8;
        padding: 0.5em;
        border: 1px solid white;
        border-radius: 5px;
        margin-right: 22px;
    }
    .future{
        margin-left: 120px;
    }
</style>
