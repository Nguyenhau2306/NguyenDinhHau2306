<?php

/**
 * gọi file autoload
 */
require_once __DIR__ . "/autoload/autoload.php";


if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
    $id = intval($id);
}

$sanpham = $db->fetchID('sanpham', $id);

$sizes = explode(',', $sanpham['size']);

$danhmucID = $sanpham['danhmuc_id'];
$sqldanhmuc = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc FROM sanpham 
        LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
        WHERE 1 AND danhmuc_id = $danhmucID LIMIT 16";

$splienquan = $db->fetchAll('sanpham', $sqldanhmuc);
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php";  ?>

<body>

    <?php require_once __DIR__ . "/include/top.php";  ?>

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 danh-muc" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" >
                    <?php foreach($danhmuc ?? [] as $item) :?>
                        <a href="/danh-muc-san-pham.php?id=<?php echo $item['id'];?>&&slug=<?php echo $item['slug'] ?>" class="nav-item nav-link"><?= $item['tendanhmuc'] ?></a>
                    <?php endforeach ; ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <?php require_once __DIR__ . "/include/nav.php";  ?>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 120px">
            <h2 class="font-weight-semi-bold text-uppercase mb-3"><?= $sanpham['tensanpham'] ?></h2>
            <div class="d-inline-flex">
                <p class="m-0"><a href="<?= base_url() ?>">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Sản phẩm</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="<?php echo base_url() ?>public/uploads/product/<?php echo $sanpham['hinhanh'] ?>" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?= $sanpham['tensanpham'] ?></h3>
                <h3 class="font-weight-semi-bold mb-4"><?php echo formatprice($sanpham['gia'] * (100 - $sanpham['giamgia'])/100) ?></h3>                
                <div class="d-flex align-items-center mb-4 pt-2">
                    <form action="/them-gio-hang.php" style="display: flex;width: 100%">
                        <select name="size" id="" class="form-control" style="width: 70px;margin-right: 10px;">
                            <?php foreach ($sizes as $item) :?>
                            <option value="<?= $item ?>"><?= $item ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" value="<?= $sanpham['id'] ?>" name="id">
<!--                                <a href="/them-gio-hang.php?id=--><?php //echo $sanpham['id'] ?><!--"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</a>-->
                    <button class="btn btn-primary px-3" style="width: 300px;"><i class="fa fa-shopping-cart mr-1"></i> Thêm giỏ hàng</button>
                    </form>
                </div>
                <h4 class="mb-3">Mô tả sản phẩm</h4>
                <?= $sanpham['mota'] ?>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm liên quan</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                <?php foreach($splienquan as $item) :?>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img style="height:388px;"class="img-fluid w-100" src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $item['tensanpham'] ?></h6>
                            <div class="d-flex justify-content-center">
                                    <?php if ($item['giamgia']) :?>
                                        <h6><?php echo formatprice($item['gia'] * (100 - $item['giamgia'])/100) ?> đ</h6>
                                        <h6 class="text-muted ml-2"><del><?php echo formatprice($item['gia']) ?>đ</del></h6>
                                    <?php else:?>
                                        <h6><?php echo formatprice($item['gia']) ?>đ</h6>
                                    <?php endif ;?>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            <a href="/them-gio-hang.php?id=<?php echo $item['id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm giỏ hàng</a>
                        </div>
                    </div>
                    <?php endforeach ;?>
                </div>

            </div>
        </div>
    </div>
    <!-- Products End -->


    <?php  require_once __DIR__ . "/include/footer.php"; ?>


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
