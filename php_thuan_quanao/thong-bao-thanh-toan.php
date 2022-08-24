<?php
    require_once __DIR__ . "/autoload/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php";  ?>

<body>

<!-- Topbar Start -->
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
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px">
            <h2 class="font-weight-semi-bold text-uppercase mb-3">Thông báo đặt hàng</h2>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-7 table-responsive mb-5">
                <h2>Đơn hàng đang được xử lý</h2>
            </div>
        </div>
    </div>
    <!-- Cart End -->


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
