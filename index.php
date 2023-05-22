<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Mũ nón thời trang chính hãng</title>

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
    <?php
    include('./H.php');
    include('./connect.php');
    ?>
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
                    <li class="active"><a href="./index.php">Trang chủ</a></li>
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
                <!-- filter -->
                <div class="col-md-4 col-xs-6">
                    <div class="filter">
                        <select class="input_select">
                            <option value="0">Giá sản phẩm</option>
                            <option value="1">0 - 5 triệu</option>
                            <option value="1">5 - 10 triệu</option>
                            <option value="1">10 - 20 triệu</option>
                            <option value="1">trên 20 triệu</option>
                        </select>
                    </div>
                </div>
                <!-- /filter -->

                <!-- filter -->
                <div class="col-md-4 col-xs-6">
                    <div class="filter">
                        <select class="input_select">
                            <option value="0">Sắp xếp theo</option>
                            <option value="1">thấp đến cao</option>
                            <option value="1">cao đến thấp</option>
                        </select>
                    </div>
                </div>
                <!-- /filter -->
                <!-- Notice of search results -->
                <h4>
                    <?php include('./Products.php') ?>
                    <?php if (isset($_POST["search-btn"])) {
                        if ($LoaiMN == "" and $input == "") {
                            echo "";
                        } else {
                            if (mysqli_num_rows($result) > 0) {
                                echo "Có " . mysqli_num_rows($result) . " sản phẩm được tìm thấy";
                            } else {
                                echo "Không có sản phẩm nào được tìm thâý";
                            }
                        }
                    }  ?>
                </h4>
                <!-- /Notice of search results -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick1" data-nav="#slick-nav-1">
                                    <!-- product -->
                                    <?php include('./Products.php')?>
                                    <?php
                                    if (mysqli_num_rows($result) != 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="<?php echo $row['HinhMN'] ?>" alt='<?php echo $row['HinhMN'] ?>'>
                                                </div>
                                                <div class="product-body">
                                                    <p class="product-category"><?php echo $row["TenLoaiMN"] ?></p>
                                                    <h3 class="product-name"><a href='./Detail.php?id=<?php echo $row["MaMN"] ?>'>
                                                            <?php echo $row["TenMN"]  ?>
                                                        </a></h3>
                                                    <h4 class="product-price"><?php echo number_format($row['DonGia'], 0, ',', '.')  . ' VNĐ' ?></h4>
                                                </div>
                                                <div class="add-to-cart">
                                                <a href='./themhang.php?id=<?php echo $row["MaMN"] ?>'><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>add to cart</button></a>
                                                </div>
                                            </div>
                                            <!-- /product -->
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- /product-slick -->
                            </div>
                            <!-- /tab -->
                        </div>
                        <!-- /product-tabs -->
                    </div>
                    <!-- /row -->
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <div class="pagination">
        <ul class="pagination justify-content-center">
            <?php
            if ($current_page > 1 && $so_trang > 1) {
                echo '<a  class="page-link" href="?trang=' . ($current_page - 1) . '">Trước</a>';
            }
            for ($i = 1; $i <= $so_trang; $i++) {
                $link_phan_trang = "?trang=" . $i;
                if ($i == $current_page) {
                    echo '<span class="page-link active">' . $i . '</span> ';
                } else {
                    echo "<a class='page-link' href='$link_phan_trang' >";
                    echo $i;
                    echo "</a> ";
                }
            }
            if ($current_page < $so_trang && $so_trang > 1) {
                echo '<a class="page-link" href="?trang=' . ($current_page + 1) . '">Sau</a>';
            }
            ?>
        </ul>
    </div>


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
    .filter {
        position: relative;
        overflow: hidden;
        margin: 15px 0px;
    }

    .main-nav>li+li {
        margin-left: 30px
    }

    .product .product-img>img {
        height: 250px;
        width: 100%;
    }

    .pagination {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .pagination>ul {
        display: flex;
        column-gap: 15px;
    }

    .pagination>ul>a {
        border: 1px black solid;
        cursor: pointer;
        padding: 10px 15px;
    }

    .pagination span.active {
        border: 1px black solid;
        cursor: pointer;
        padding: 10px 15px;
        background: lightcoral;
    }

    .products-slick1 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }

    .section {
        padding-bottom: 50px;
    }
</style>

</html>