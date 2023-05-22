<?php include('./connect.php') ?>
<?php
$limit = 9;
if (!isset($_GET['trang'])) {
    $_GET['trang'] = 1;
}
$result = mysqli_query($conn, 'select count(MaMN) as total from mu_non');
$row = mysqli_fetch_assoc($result);
$query_1 = mysqli_query($conn, 'select count(MaMN) as total from mu_non');
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
$query = "";
$queryloaimu = "select * from loai_mu";

$query = "select * from mu_non join loai_mu on mu_non.MaLoaiMN = loai_mu.MaLoaiMN LIMIT $start, $limit";

if (isset($_POST["search-btn"])) {

    $input = $_POST["input"];
    $LoaiMN  = $_POST["input-select"];

    if (!empty(trim($LoaiMN)) and empty(trim($input))) {
        $query = "select * from mu_non join loai_mu on mu_non.MaLoaiMN = loai_mu.MaLoaiMN where loai_mu.MaLoaiMN  like '%$LoaiMN%' ";
    } else if (empty(trim($LoaiMN)) and !empty(trim($input))) {
        $query = "select * from mu_non join loai_mu on mu_non.MaLoaiMN = loai_mu.MaLoaiMN where mu_non.TenMN like '%$input%' ";
    } else {
        $query = "select * from mu_non join loai_mu on mu_non.MaLoaiMN = loai_mu.MaLoaiMN where loai_mu.MaLoaiMN  like '%$LoaiMN%'  and mu_non.TenMN  like '%$input%' ";
    }
}

$resultloaimu = mysqli_query($conn, $queryloaimu);
$result = mysqli_query($conn, $query);
?>