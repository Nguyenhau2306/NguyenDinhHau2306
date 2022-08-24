<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    if (!isset($_SESSION['cart'])) {
        echo " <script>alert('  Chưa có sản phẩm trong giỏ hàng   !'); location.href='index.php';</script>";
    }


    
    $sum = 0;

    if (isset($_GET['transactionID']) && $_GET['transactionID']) {
        $sqlUpdate = "UPDATE donhang SET loai = 2 WHERE id =  " . $_GET['transactionID'];
        $db->fetchsql($sqlUpdate);
        unset($_SESSION["cart"]);
        header("location: http://banhoa.local/index.php?page_layout=notify");
    }

    $user_id = isset($_SESSION['auth_id']) ? $_SESSION['auth_id'] : 0;
    if ($user_id) {
        $auth_us = $db->fetchID('thanhvien', $user_id);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name    = postInput("name");
        $email   = postInput("email");
        $phone   = postInput("phone");
        $address = postInput("address");
        $comment = postInput("comment");
        $loai = postInput("loai");
        $shipper = $db->fetchOne('admin', 'level = 1 ');

        $data = [
            'ten'                 => $name,
            'sodienthoai'         => $phone,
            'diachi'              => $address,
            'email'               => $email,
            'loai'               => $loai,
            'tongtien'            => $_SESSION['sums'],
            'noidung'             => $comment,
            'thanhvien_id'        => isset($_SESSION['auth_id']) ? $_SESSION['auth_id'] : 0,
            'nhanviengiaohang_id' => isset($shipper['id']) ? $shipper['id'] : 0,
        ];

        // tiến hành insert
        $id_instart = $db->insert("donhang", $data);
        if ((isset($_SESSION['cart'])) && count($_SESSION['cart']) > 0) {
            foreach ($_SESSION['cart'] as $m => $l) {
                $data2       = [
                    'sanpham_id' => $m,
                    'donhang_id' => $id_instart,
                    'soluong'    => $l['qty'],
                    'gia'        => $l['gia'],
                    'hinhanh'    => $l['hinhanh'],
                    'size' => $l['size'] ?? 'Tuỳ chọn'
                ];
                $id_instart2 = $db->insert("chitietdonhang", $data2);

            }

            unset($_SESSION['cart']);
            unset($_SESSION['tongtien']);
            unset($_SESSION['sums']);
            $_SESSION['success'] = ' Xác nhận thành công ! bạn hãy đợi bộ phận thanh toán xác nhận nhé ';
            redirectStyle('thong-bao-thanh-toan.php');

        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php"; ?>

<body>
<!-- Topbar Start -->
<?php require_once __DIR__ . "/include/top.php"; ?>

<style>
    .input-group {
        margin-top: 15px;
    }
</style>
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
                <div class="navbar-nav w-100 overflow-hidden" >
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
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 120px">
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h2>
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
        <div class="col-lg-8 table-responsive mb-5">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <!-- <th>Id</th> -->
                    <th>Tên</th>
                    <th>Hình ảnh</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                    <th style="min-width: 175px; text-align: center"> Thao tác</th>
                </tr>
                </thead>
                <tbody>

                <?php $stt = 1;
                foreach ($_SESSION['cart'] as $key => $val): ?>
                    <tr >
                        <td><?php echo $stt; ?></td>
                        <!-- <td><?php echo $key; ?></td> -->
                        <td>
                            <?php echo $val['tensanpham'] ?> <br>
                            <?php if (isset($val['size'])) :?>
                                Size: <?= $val['size'] ?>
                            <?php endif ;?>
                        </td>
                        <td>
                            <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $val['hinhanh'] ?>"
                                 class="" with="50px" height="50px">
                        </td>
                        <td>
                            <input type="number" name="quantity" min="1" max="10" class="form-control" id="qtyup"
                                   value="<?php echo $val['qty']; ?>">

                        </td>
                        <td><?php echo number_format($val['gia'],0,',','.'); ?></td>
                        <td>
                            <?php echo number_format($val['gia'] * $val['qty'],0,',','.'); ?>
                        </td>
                        <td style="min-width: 175px; text-align: center">
                            <a href="javascript:;" class="btn  btn-xs btn-info updatecart my-button" data-key=<?php echo $key ?>>Cập nhật</a>
                            <a href="remove-gio-hang.php?id=<?php echo $key ?>" class="btn  btn-xs btn-danger my-button"
                               onclick="return confirm('Bạn có muốn xóa không ? ')" ;> <i class="fa fa-times"
                                                                                      style="color: white"></i></a>
                        </td>

                    </tr>
                    <?php $sum += $val['gia'] * $val['qty'] ?>
                    <?php $stt++; endforeach;
                $_SESSION['tongtien'] = $sum; ?>
                <tr class="text-right">
                    <td colspan="9">
                        <div class="label-thanh-toan">Thành tiền : <span><?php echo formatprice($sum) ?> đ</a></div>

                        <div class="label-thanh-toan" style="margin-top: 15px;margin-bottom: 15px;"> Giảm giá : <span><?php echo checksumcart($sum) ?>
                                % </span></div>
                        <?php $_SESSION['sums'] = $sum * (100 - checksumcart($sum)) / 100 ?>
                        <div class="label-thanh-toan">Tổng tiền : <span><?php echo formatprice($sum * (100 - checksumcart($sum)) / 100) ?>
                                đ</span></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thông tin thanh toán</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="email" type="email"
                                   class="form-control" <?php echo isset($auth_us) ? 'readonly="readonly"' : '' ?>
                                   name="email" placeholder="Email" required="required"
                                   value="<?php echo isset($auth_us) ? $auth_us['email'] : '' ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Họ và tên"
                                   required="" value="<?php echo isset($auth_us) ? $auth_us['hoten'] : '' ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input id="name" type="number" class="form-control" name="phone"
                                   placeholder="Số điện thoại" required=""
                                   value="<?php echo isset($auth_us) ? $auth_us['sodienthoai'] : '' ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                            <input id="name" type="text" class="form-control" name="address"
                                   placeholder="Địa chỉ" required=""
                                   value="<?php echo isset($auth_us) ? $auth_us['diachi'] : '' ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                            <select name="loai" class="form-control" id="">
                                <option value="1">Nhận hàng thanh toán</option>
                                <option value="2">Chuyển khoản</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <textarea class="form-control" name="comment" placeholder="Ghi chú" rows="2"
                                      cols="100"></textarea>
                        </div>
                        <div class="" style="display: flex;justify-content: center">
                            <input type="submit" name="" value="ĐẶT HÀNG" class="my-button"  style="flex: 0 0 100%; margin-top: 10px" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


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

<script type="text/javascript">

    /**
     *  url  golbal
     */

    $url = "http://localhost:8000/";


    $(function () {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function () {
            $(this).children(".hidenitem").show(100);
        }, function () {
            $hidenitem.hide(500);
        })
    })


    /**
     * update giỏ hàng
     */


    $updatecart = $(".updatecart");
    $updatecart.click(function () {

        $key = $(this).attr("data-key");
        $qty = $(this).parents("tr").find("#qtyup").val();

        $size = $(this).parents('tr').find(".selected-size option:selected").val();

        if ($qty <= 0)
        {
            alert("Số lượng phải lớn hơn 0");
            location.href = '/danh-sach-gio-hang.php';
        }

        $.ajax({
            url: $url + "updatecart.php",
            type: 'POST',
            data: {'key': $key, 'qtyupdate': $qty, 'size': $size},
            async: true,
            success: function (data) {
                if (data == 1) {
                    alert('  Cập nhật thành công ! !!   !');
                } else {
                    alert(" Cập  nhật thất bại ");
                }

               location.href = 'danh-sach-gio-hang.php';

            }
        })
    })
</script>
</body>

</html>
