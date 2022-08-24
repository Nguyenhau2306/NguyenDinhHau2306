<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    if (!$_SESSION['auth_id']) {
        echo " <script>alert(' Bạn phải đăng nhập để thực hiện tính năng này !'); location.href='login.php';</script>";
    }

    /**
     * lấy số trang nếu có
     */

    if (isset($_GET['page'])) {
        $p = $_GET['page'];
    } else {
        $p = 1;
    }

    $user_id = $_SESSION['auth_id'];
    $transactionID = $_GET['id'];

    
    /**
     *  lấy danh sách sản phẩm
     */
    $sql = " SELECT chitietdonhang.*, sanpham.tensanpham as tensp FROM chitietdonhang 
         LEFT JOIN sanpham ON sanpham.id = chitietdonhang.sanpham_id
        WHERE 1 AND  donhang_id = $transactionID ";
    $chitietdonhang = $db->fetchsql($sql);

    dd($chitietdonhang);
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php"; ?>

<body>
<!-- Topbar Start -->
<?php require_once __DIR__ . "/include/top.php";  ?>


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
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết đơn hàng</h2>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Chi tiết đơn hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-10 col-lg-offset-1 table-responsive mb-5">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th style="width: 140px;">Số lượng</th>
                    <th>Giá</th>
                    <th style="width: 140px;">Thành tiền</th>
                </tr>
                </thead>
                <tbody>

                <?php $stt = 1;
                foreach ($chitietdonhang
                         as $key => $val): ?>
                    <tr>
                        <td><?php echo $stt; ?></td>
                        <td><?php echo $val['tensp'] ?></td>
                        <td>
                            <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $val['hinhanh'] ?>" class="img" width="100" height="100" />
                        </td>
                        <td><?= $val['soluong'] ?></td>
                        <td><?php echo number_format($val['gia'], 0, ',', '.'); ?>đ</td>
                        <td>
                            <?= number_format($val['soluong']* $val['gia'],0,',','.') ?>đ
                        </td>

                    </tr>
                    <?php  $stt++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
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
        $.ajax({
            url: $url + "updatecart.php",
            type: 'POST',
            data: {'key': $key, 'qtyupdate': $qty, 'size': $size},
            async: true,
            success: function (data) {
                console.log('data- success; ', data);
                if (data == 1) {
                    alert('  Cập nhật thành công! ');
                    location.href = 'danh-sach-gio-hang.php';
                } else {
                    alert(" Cập  nhật thất bại ");
                }

            }
        })
    })
</script>
</body>

</html>
