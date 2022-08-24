<?php

/**
 * gọi file autoload
 */
    use libraries\Url\Input;
use libraries\Url\Url;
    require_once __DIR__ . "/autoload/autoload.php";
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
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Liên hệ</h2>
            <div class="d-inline-flex">
                <p class="m-0"><a href="<?php echo base_url() ?>">Trang chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Liên hệ</p>
            </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">
                <section style="padding: 20px" class="col-sm-6">
                    <ul>
                        <li class="contact">  <strong>Cửa hàng </strong> Cửa hàng quần áo </li>
                        <li class="contact">  <strong>Địa chỉ </strong> : cổ nhuế </li>
                        <li class="contact">  <strong>SDT </strong> : 123456789 </li>
                        <li class="contact">  <strong>Email </strong>: doan@gmail.com </li>

                    </ul>
                </section>
                <section class="col-sm-6" style="margin-bottom: 20px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.0174616877944!2d105.77172461423756!3d21.071964785974988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552defbed8e9%3A0x1584f79c805eb017!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldC4!5e0!3m2!1svi!2s!4v1621259777550!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </section>
            </div>
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
