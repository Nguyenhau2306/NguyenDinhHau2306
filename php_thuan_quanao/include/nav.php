<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0  test-huhu">
    <a href="<?= base_url() ?>" class="text-decoration-none d-block d-lg-none">
        <h1 class="m-0 display-5 font-weight-semi-bold">
            <img src="<?= base_url() ?>/public/logo.png" alt="" style="width: 200px;margin-bottom: 10px;">
        </h1>
    </a>
    <!-- <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            <a href="<?= base_url() ?>" class="nav-item nav-link active nav-menu-text">Trang chủ</a>
            <a href="/shop.php" class="nav-item nav-link nav-menu-text">Sản phẩm</a>
            <a href="/blog.php" class="nav-item nav-link nav-menu-text">Tin tức</a>
            <a href="/gioi-thieu.php" class="nav-item nav-link nav-menu-text">Giới thiệu</a>
            <a href="/lien-he.php" class="nav-item nav-link nav-menu-text">Liên hệ</a>
        </div>
        <div class="navbar-nav ml-auto py-0">
            <?php if(isset($_SESSION['auth_name'])) :?>
                <a href="/quan-ly-don-hang.php" style="color: red">
                    <i class="fa fa-share-square-o"></i> Xin chào <?php echo $_SESSION['auth_name'] ?>
                </a>
                <a href="thoat.php"><i class="fa fa-share-square-o"></i> Thoát </a>
            <?php else :?>
                <a href="<?= base_url() ?>login.php" class="my-button" style="color: #fff; margin-right: 8px">Đăng nhập</a>
                <a href="<?= base_url() ?>dang-ky.php" class=" my-button" style="color: #fff">Đăng ký</a>
            <?php endif ; ?>   
        </div>
    </div>
</nav>
<style>
    

</style>
