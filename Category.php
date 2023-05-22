<?php
$thamso = $_GET["thamso"];
$query = "select * from loai_mu where MaLoaiMN = '$thamso'";
?>
<?php include('./H.php');
include('./connect.php'); ?>
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
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

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
                            <?php
                            //phân trang

                            $limit = 9;
                            if (!isset($_GET['trang'])) {
                                $_GET['trang'] = 1;
                            }
                            $query = "select count(MaLoaiMN) as total from mu_non";
                            $query_1 = mysqli_query($conn, $query);
                            $query_2 = mysqli_fetch_array($query_1);
                            $total_records = $query_2['total'];
                            $so_trang = ceil($total_records  / $limit);
                            $start = ($_GET['trang'] - 1) * $limit;
                            $current_page = isset($_GET['trang']) ? $_GET['trang'] : 1;
                            if ($current_page > $so_trang) {
                                $current_page = $so_trang;
                            } else if ($current_page < 1) {
                                $current_page = 1;
                            }
                            $query = "select * from loai_mu  join mu_non  on loai_mu.MaLoaiMN = mu_non.MaLoaiMN where mu_non.MaLoaiMN = '$thamso' limit $start, $limit";
                            $result = mysqli_query($conn, $query);
                            ?>

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
                                                    <?php echo $row["TenNC"]  ?>
                                                </a></h3>
                                            <h4 class="product-price"><?php echo number_format($row['DonGia'], 0, ',', '.')  . ' VNĐ' ?></h4>
                                        </div>
                                        <div class="add-to-cart">
                                        <a href='./themhang.php?id=<?php echo $row["MaNC"] ?>'><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
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
        padding-bottom: 70px;
    }

</style>
<?php include('./F.php') ?>

</html>