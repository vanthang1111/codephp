<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Mũ nón chất</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> 038 379 8602</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> tienanh17022002@gmail.com</a></li>
					<li><a href="#"><i class="fa fa-map-marker"></i> Mỹ Đình - Hà Nội</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="./dangnhap.php"><i class="fa fa-user-o"></i> <?php error_reporting(E_ERROR | E_PARSE); session_start(); if($_SESSION['m']) {echo $_SESSION['m'];} else{echo "Tài khoản của tôi";}?></a></li>
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="./index.php" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->

					<!-- SEARCH BAR -->
					<?php include('./Products.php') ?>
					<div class="col-md-6">
						<div class="header-search">
							<form method="POST">
								<select class="input-select" name="input-select">
									<option value="">-----------Tất cả-----------</option>
									<?php
									if (mysqli_num_rows($resultloaimu) != 0) {
										while ($row = mysqli_fetch_array($resultloaimu)) {
									?>
											<option <?php if (isset($loaimu) and $row["MaLoaiMN"] == $loaimu) echo "selected='selected' "; ?> value="<?php echo $row["MaLoaiMN"] ?>"> <?php echo $row["TenLoaiMN"] ?>
											</option>
									<?php
										}
									}
									?>
								</select>
								<input class="input" placeholder="Search here" name="input" id="input" value="<?php if (isset($input)) echo $input ?>">
								<button class="search-btn" id="search-btn" type="search-btn" name="search-btn">Search</button>
							</form>
						</div>
					</div>
					<!-- /SEARCH BAR -->

					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">

							<!-- Cart -->
							<div class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-shopping-cart"></i>
									<div class="qty"><?php include("./giohangcuaban.php")?></div>
									<a href="./giohang.php">Giỏ hàng</span>
									
								</a>
							</div>
							<!-- /Cart -->

						
						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
</body>

<style>
	.header-logo .logo img {
		display: block;
		height: 100px;
		width: 100px;
	}

	#header {
		background-color: black;
	}

	.header-search form .input {
		width: 250px;
		margin-right: -4px;
	}

	.header-search form .search-btn {
		height: 40px;
		width: 80px;
		background: red;
		color: #FFF;
		font-weight: 500;
		border: none;
		border-radius: 0px 40px 40px 0px;
	}

	.header-search form .input-select {
		margin-right: -1px;
		border-radius: 40px 0px 0px 40px;
		width: auto;
	}
	table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
    }
	.tab{
    border-collapse: collapse;
    border-spacing: 0;
    width: 80%;
    border: 1px solid #ddd;
    }

    th, td {
    text-align: center;
    padding: 8px;
    }
    th{
        background-color:lightpink;
        text-align:center;
    }
    img{
        width: 100px;
        height:100px;
    }
    tr:nth-child(even){background-color: #f2f2f2}
	.indent{ padding-left: 1.8em }
	.indent1{ padding-left: 1.2em }
</style>

</html>