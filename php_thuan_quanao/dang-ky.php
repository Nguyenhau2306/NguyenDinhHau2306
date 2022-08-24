<?php

/**
 * gọi file autoload
 */
require_once __DIR__ . "/autoload/autoload.php";

if (isset($_SESSION['auth_id'])) {
    $path = $_SERVER["HTTP_REFERER"];
    if (isset($path)) {
        header("location: " . $path);
    } else {
        header("location: index.php");
    }

}

$data  =
    [
        'hoten'       => postInput('hoten'),
        'email'       => postInput('email'),
        'password'    => postInput('password'),
        'diachi'      => postInput('diachi'),
        'sodienthoai' => postInput('sodienthoai'),
        'confirm_password' => postInput('confirm_password')
    ];
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($data['hoten'] == '') {
        $error['hoten'] = "Họ tên không được để trống";
    }

    if ($data['email'] == '') {
        $error['email'] = "Email không được để trống";
    } else {
        $is_check = $db->fetchOne("thanhvien", "email = '" . $data['email'] . "'");
        if ($is_check != NULL) {
            $error['email'] = "Email đã tồn tại";
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email không đúng định dạng";
        }
    }

    if ($data['password'] == '') {
        $error['password'] = "Mật khẩu không được để trống";
    } else {
        $data['password'] = MD5(postInput('password'));
    }

    if ($data['confirm_password'] == '') {
        $error['confirm_password'] = "Mật khẩu xác nhận không được để trống";
    } else {
        if ($data['password'] && md5($data['confirm_password']) != $data['password'])
        {
            $error['confirm_password'] = "Mật khẩu xác nhận không đúng";
        }
    }

    if ($data['sodienthoai'] == '') {
        $error['sodienthoai'] = "Số điện thoại không được để trống";
    } else {
        if (strlen($data['sodienthoai']) != 10)
            $error['sodienthoai'] = "Số điện thoại không đúng định dạng";
    }

    if ($data['diachi'] == '') {
        $error['diachi'] = "Nhập địa chỉ";
    }

    /*if (isset($_POST['phone']) && $_POST['phone'] != NULL)
    {
        $phone = $_POST['phone'];
    }*/
    if ($data['sodienthoai'] == '') {
        $error['sodienthoai'] = "Số điện thoại không được để trống";
    }

    if (empty($error)) {
        /*$sql = "INSERT INTO user(name,email,password,address,phone) VALUES ('".$name."','".$email."','".$password."','".$address."','".$phone."') ";
        $insert = mysqli_query($conn,$sql) or die("Fail!");*/
        unset($data['confirm_password']);
        $idinsert = $db->insert("thanhvien", $data);
        if ($idinsert > 0) {
            $_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
            header("location: login.php");
        }
        //$_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
        //header("location: dang-nhap.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php"; ?>

<body>

<?php require_once __DIR__ . "/include/top.php"; ?>

<!-- Navbar Start -->
<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 danh-muc"
               data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Danh mục</h6>
                <i class="fa fa-angle-down text-dark"></i>
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
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50px">
        <div class="d-inline-flex">
            <p class="m-0"><a href="<?= base_url() ?>">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Đăng ký</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 pb-5">
            <div class="col-md-6 bor" style="padding: 10px;margin: 0 auto">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Đăng ký</h2></div>
                    <div class="panel-body">
                        <form class="form create account form-create-account" action="" method="post" id="form-validate"
                              enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Họ và tên</label>
                                <div class="col-md-8">
                                    <input type="text" name="hoten" placeholder="" class="form-control"
                                           value="<?php echo $data['hoten'] ?>">
                                    <?php if (isset($error['hoten'])): ?>
                                        <p class="text-danger"><?php echo $error['hoten']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Email</label>
                                <div class="col-md-8">
                                    <input type="email" name="email" required pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" placeholder="" class="form-control"
                                           value="<?php echo $data['email'] ?>">
                                    <?php if (isset($error['email'])): ?>
                                        <p class="text-danger"><?php echo $error['email']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Mật khẩu</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" placeholder="********" class="form-control">
                                    <?php if (isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Xác nhận mật khẩu</label>
                                <div class="col-md-8">
                                    <input type="password" name="confirm_password" placeholder="********" class="form-control">
                                    <?php if (isset($error['confirm_password'])): ?>
                                        <p class="text-danger"><?php echo $error['confirm_password']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Số điện thoại</label>
                                <div class="col-md-8">
                                    <input type="text" name="sodienthoai" placeholder="" class="form-control"
                                           value="<?php echo $data['sodienthoai'] ?>">
                                    <?php if (isset($error['sodienthoai'])): ?>
                                        <p class="text-danger"><?php echo $error['sodienthoai']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 col-md-offset-1" style="margin-top: 10px">Địa chỉ</label>
                                <div class="col-md-8">
                                    <input type="text" name="diachi" placeholder="" class="form-control"
                                           value="<?php echo $data['diachi'] ?>">
                                    <?php if (isset($error['diachi'])): ?>
                                        <p class="text-danger"><?php echo $error['diachi']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="actions-toolbar">
                                <div class="primary">
                                    <button type="submit" class="btn btn-primary" title="Tạo tài khoản"><span>Đăng ký</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Detail End -->


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
