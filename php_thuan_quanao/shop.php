<?php

/**
 * gọi file autoload
 */

use libraries\Url\Input;
use libraries\Url\Url;

require_once __DIR__ . "/autoload/autoload.php";

$showPrice = 'true';
$path      = $_SERVER['SCRIPT_NAME'];

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
}


if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 1;
}


/**
 *  lấy danh sách sản phẩm
 */


$sql = " SELECT count('id') as tongso FROM sanpham  WHERE 1";

$tongsobanghi = $db->fetchsql($sql);

$sqldanhmuc = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc FROM sanpham 
        LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
        WHERE 1 ";

if (Input::get('cc') && $nhaccID = Input::get('cc')) {
    $sqldanhmuc .= " AND nhacungcap_id = $nhaccID";
}

if ($name = Input::get('k')) {
    $sqldanhmuc .= " AND tensanpham LIKE  '%$name%' ";
}

if (Input::get('price')) {
    $key = Input::get('price');
    if ($key == 1) {
        $sqldanhmuc .= ' AND gia <=  500000';
    } elseif ($key == 2) {
        $sqldanhmuc .= ' AND gia BETWEEN 500000 AND  2000000 ';
    } else {
        $sqldanhmuc .= ' AND gia >  2000000';
    }


    $filter['price'] = $key;
}

$sanpham = $db->fetchJone('sanpham', $sqldanhmuc, $page = $p, 12, true);
if (count($sanpham) == 0) {
    $error = "Dữ liệu đang được cập nhật ";
}
if (isset($sanpham['page'])) {
    $sotrang = $sanpham['page'];
    unset($sanpham['page']);
}

$sql        = " SELECT * FROM nhacungcap WHERE 1";
$nhacungcap = $db->fetchAll("nhacungcap", $sql);
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php"; ?>

<body>
<!-- Topbar Start -->
<?php require_once __DIR__ . "/include/top.php"; ?>

<style>
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }
    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }
</style>
<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 danh-muc"
               data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0" style="color: white !important;">Danh mục</h6>
                <i class="fa fa-angle-down text-dark" style="color: white !important;"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light"
                 id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden">
                    <?php foreach ($danhmuc ?? [] as $item) : ?>
                        <a href="/danh-muc-san-pham.php?id=<?php echo $item['id']; ?>&&slug=<?php echo $item['slug'] ?>"
                           class="nav-item nav-link"><?= $item['tendanhmuc'] ?></a>
                    <?php endforeach; ?>

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <?php require_once __DIR__ . "/include/nav.php"; ?>
        </div>
    </div>
</div>
<!-- Navbar End -->


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 120px;">
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Tất cả sản phẩm</h2>
            <div class="d-inline-flex">
                <p class="m-0"><a href="<?php echo base_url() ?>">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Sản phẩm</p>
            </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <!-- <div class="col-lg-3 col-md-12"> -->
        <!-- Price Start -->
        <!-- Price End -->

        <!-- Color Start -->
        <!-- Color End -->
        <!-- </div> -->
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">
                <?php foreach ($sanpham as $item) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" style="height: 388px;"
                                     src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>"
                                     alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $item['tensanpham'] ?></h6>
                                <div class="d-flex justify-content-center">
                                    <?php if ($item['giamgia']) : ?>
                                        <h6><?php echo formatprice($item['gia'] * (100 - $item['giamgia']) / 100) ?>
                                            đ</h6>
                                        <h6 class="text-muted ml-2">
                                            <del><?php echo formatprice($item['gia']) ?>đ</del>
                                        </h6>
                                    <?php else: ?>
                                        <h6><?php echo formatprice($item['gia']) ?>đ</h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"
                                   class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                                <a href="/them-gio-hang.php?id=<?php echo $item['id'] ?>"
                                   class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (empty($sanpham)) : ?>
                <p style="color: red">Không có sản phẩm nào</p>
            <?php else: ?>
                <nav aria-label="page navigation col-xs-12" class="clearfix" style="clear: both">
                    <ul class="pagination">
                        <a href="#">&laquo;</a>

                        <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
                            <?php
                            if (isset($_GET['page'])) {
                                $p = $_GET['page'];
                            } else {
                                $p = 1;
                            }
                            ?>
                            <a  class="<?php echo ($i == $p) ? 'active' : '' ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endfor; ?>
                        <a href="#">&raquo;</a>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->


<?php require_once __DIR__ . "/include/footer.php"; ?>


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/lib/easing/easing.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="<?php echo base_url() ?>/public/frontend/mail/jqBootstrapValidation.min.js"></script>
<script src="<?php echo base_url() ?>/public/frontend/mail/contact.js"></script>

<!-- Template Javascript -->
<script src="<?php echo base_url() ?>/public/frontend/js/main.js"></script>
</body>

</html>
