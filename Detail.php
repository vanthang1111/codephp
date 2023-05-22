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
    <?php include('./H.php') ?>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <?php
                $query = " select * from loai_mu";
                $result = mysqli_query($conn, $query);
                ?>
                <ul class="main-nav nav navbar-nav">
                    <li><a href="./index.php">Trang chủ</a></li>
                    <?php
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <li><a href="Category.php?thamso=<?php echo $row["MaLoaiMN"] ?>"><?php echo $row["TenLoaiMN"] ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <?php include('./connect.php');
                $id = $_GET["id"];
                $query = "SELECT * FROM mu_non JOIN loai_mu ON mu_non.MaLoaiMN = loai_mu.MaLoaiMN WHERE MaMN ='$id' ";
                $result = mysqli_query($conn, $query);
                ?>
                <!-- Product main img -->
                <?php
                if (mysqli_num_rows($result) != 0) {
                    while ($row = mysqli_fetch_array($result)) {

                ?>
                        <div class="col-md-5">
                            <div id="product-main-img">
                                <img style="width: 100%;" src="<?php echo $row['HinhMN'] ?>" alt='<?php echo $row['HinhMN'] ?>'>
                            </div>
                        </div>
                        <!-- /Product main img -->

                        <!-- Product details -->
                        <div class="col-md-5">
                            <div class="product-details">
                                <h2 class="product-name">
                                    <p><?php echo $row["TenMN"] ?></p>
                                </h2>
                            </div>
                            <div>
                                <h3 class="product-price"><?php echo number_format($row['DonGia'], 0, ',', '.')  . ' VNĐ' ?></h3>
                            </div>
                            <br>

                            <h4>Mô tả sản phẩm</h4>
                            <p><?php echo $row["MoTa"] ?></p>
                            <br>

                            <div class="add-to-cart">
                                <a href="./themhang.php?id=<?php echo $row['MaMN'];?>"><button class="add-to-cart-btn" ><i class="fa fa-shopping-cart"></i> add to cart</button></a>
                            </div>
                            <br>

                            <ul class="product-links">
                                <li>Category: <a href="#"><?php echo $row["TenLoaiMN"] ?></a></li>
                            </ul>

                        </div>
                        <!-- /Product details -->
            </div>
            <!-- /row -->
    <?php
                    }
                }
    ?>
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    <!-- FOOTER -->
    <?php include('./F.php') ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

<style>
    #product-main-img {
        padding-right: 30px;
        height: 300px;
    }

    .add-to-cart-btn {
        height: 40px;
        width: 50%;
        background-color: lightsalmon;
    }

    .section {
        padding-top: 100px;
        padding-bottom: 150px;
    }
</style>

</html>