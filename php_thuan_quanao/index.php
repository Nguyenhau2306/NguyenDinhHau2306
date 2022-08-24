<?php
    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    // session_destroy();

    $sql = "SELECT danhmuc.*, count(sanpham.id) as total_product FROM danhmuc 
    LEFT JOIN sanpham ON sanpham.danhmuc_id = danhmuc.id WHERE 1 GROUP BY danhmuc.id DESC LIMIT 6";

    $danhmucHome = $db->fetchsql($sql);

    $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT 12";

   $sanphamNew = $db->fetchsql($sql);

    $sql = "SELECT * FROM sanpham where hot = 1 ORDER BY id DESC LIMIT 12";
    $sanphamHot = $db->fetchsql($sql);
?> 
<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php";  ?>

<body>
    <!-- Topbar Start -->
    <?php require_once __DIR__ . "/include/top.php";  ?>

    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 danh-muc" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0" style="color: white !important;">Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden">
                        <?php foreach($danhmuc ?? [] as $item) :?>
                            <a href="/danh-muc-san-pham.php?id=<?php echo $item['id'];?>&&slug=<?php echo $item['slug'] ?>" class="nav-item nav-link"><?= $item['tendanhmuc'] ?></a>
                        <?php endforeach ; ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
            <?php require_once __DIR__ . "/include/nav.php";  ?>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="/public/frontend/img/slide.web1.jpg" alt="img">
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="/public/frontend/img/slide.web2.jpg" alt="img">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Đổi trả trong 14 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php foreach($sanphamNew as $item) :?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" style="height: 386px;" src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" alt="">
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
                </div>
            <?php endforeach ;?>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm nổi bật</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php foreach($sanphamHot as $item) :?>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" style="height: 386px;" src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>" alt="">
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
                </div>
            <?php endforeach ;?>
        </div>
    </div>
    <!-- Products End -->
    
    <?php  require_once __DIR__ . "/include/footer.php"; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?php echo base_url() ?>/public/frontend/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?php echo base_url() ?>/public/frontend/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url() ?>/public/frontend/js/main.js"></script>
</body>

</html>
