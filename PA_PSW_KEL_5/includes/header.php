<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Bootstrap Metro Dashboard">
	<link rel="shortcut icon" type="image/x-icon" href="img/login/travelword.jpg">
	<title>.: Admin :.</title>
	<script type="text/javascript">
	function confirmDel()
	{
		var x = confirm("Are you sure?");

		if (x==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function confirmAdd()
	{
		var a = confirm("Do you want to add this schedule?");

		if(a==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function confirmAddPaket()
	{
		var b = confirm("Do you want to add this package?");

		if(==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function confirmUpdate()
	{
		var b = confirm("Are you sure you want to update this data?");

		if(b==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function confirmUpdateAdmin()
	{
		var c = confirm("Are you sure you want to change password?");

		if(c==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	</script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="css2/bootstrap.min.css" rel="stylesheet">
	<link href="css2/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css2/style.css" rel="stylesheet">
	<link id="base-style" href="css2/newstylee.css" rel="stylesheet">
	<link id="base-style-responsive" href="css2/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="dasboar_admin.html"><span> </span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<strong>
						<span class="a"><br>Admin</span>
					</strong>
					<ul class="nav pull-right">
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> Administrator
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->