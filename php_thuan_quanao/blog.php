<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

    $navactive = "blog.php";

    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    /**
     *  lấy danh sách sản phẩm
     */
    $sql = " SELECT tintuc.*, menu.tenmenu as tenmenu FROM tintuc
         LEFT JOIN menu ON menu.id = tintuc.menu_id
         WHERE  tintuc.slug != 'gioi-thieu' ORDER BY id DESC";

    $tintuc = $db->fetchJone("tintuc",$sql,$page = $p,6,true);
    if(isset($tintuc['page']))
    {
        $sotrang =  $tintuc['page'];
        unset($tintuc['page']);
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php";  ?>

<body>
<!-- Topbar Start -->
<?php require_once __DIR__ . "/include/top.php";  ?>
<!-- Topbar End -->


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
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Tin Tức</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="<?php echo base_url() ?>">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Tin tức</p>
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
                <?php foreach($tintuc as $item) :?>
                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" style="height: 350px;" src="<?php echo base_url() ?>public/uploads/post/<?php echo $item['hinhanh'] ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $item['tieude'] ?></h6>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="/blog-detail.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->


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
