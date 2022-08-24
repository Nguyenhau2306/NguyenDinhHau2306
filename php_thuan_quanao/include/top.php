<div class="container-fluid">
    <?php if(isset($_SESSION['auth_name'])) :?>
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-12 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="<?= base_url() ?>quan-ly-don-hang.php" style="font-size: 12px;">
                        <i class="fas fa-shopping-cart"></i> Đơn hàng của tôi
                    </a>
                </div>
            </div>
        </div>
    <?php endif ;?>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="<?= base_url() ?>" class="text-decoration-none">
                    <img src="<?= base_url() ?>public/logo.png" alt="" style="width: 200px;margin-bottom: 10px;">
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="/shop.php">
                    <div class="input-group">
                        <input type="text" class="form-control" name="k" value="<?= \libraries\Url\Input::get('k') ?>" placeholder="Tìm kiếm">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3 col-6 text-right">
                <a href="<?= base_url() ?>danh-sach-gio-hang.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge"><?php echo $tongsanphamgiohang ?></span>
                </a>
            </div>

        </div>
    </div>
    <!-- Topbar End -->
