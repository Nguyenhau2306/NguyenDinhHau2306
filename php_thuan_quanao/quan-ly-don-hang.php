<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";
    if (!$_SESSION['auth_id']) {
        echo " <script>alert(' Bạn phải đăng nhập để thực hiện tính năng này !'); location.href='/login.php';</script>";
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
    /**
     *  lấy danh sách sản phẩm
     */
    $sql = " SELECT donhang.*, admin.name as tenship, admin.id as id_admin FROM donhang
        LEFT JOIN admin on admin.id = donhang.nhanviengiaohang_id 
          WHERE thanhvien_id  = $user_id  ORDER BY donhang.id DESC";

    $donhang = $db->fetchJone("donhang", $sql, $page = $p, 20, false);

    if (isset($donhang['page'])) {
        $sotrang = $donhang['page'];
        unset($donhang['page']);
    }

    if ($transactionID = (isset($_GET['delete']) ? $_GET['delete'] : 0))
    {
        $donhang = $db->fetchID('donhang',$transactionID);
        if (!$donhang)
        {
            $_SESSION['error'] = ' Không tồn tại ID trong bảng danh mục  !!! ';
            redirect("quan-ly-don-hang.php");
        }


        $sql = " SELECT * FROM chitietdonhang WHERE  donhang_id = $transactionID";
        $chitietdonhang = $db->fetchsql($sql);
        foreach($chitietdonhang as $item)
        {
            $id_donhang = intval($item['donhang_id']);
            $num_or = $db->deletesql("chitietdonhang","donhang_id =  $id_donhang");
        }


        $num = $db->delete("donhang",$transactionID);
        if ($num > 0 )
        {

            $_SESSION['success'] = ' Đã xóa thành công chi tiết đơn hàng và đơn hàng hiện thại!!! ';
            redirect('quan-ly-don-hang.php');
        }
        else
        {
            $_SESSION['error'] = ' Xóa thất bại  !!! ';
            redirect('quan-ly-don-hang.php');
        }
    }

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
            <a class="my-button btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
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
        <h2 class="font-weight-semi-bold text-uppercase mb-3">Quản lý đơn hàng</h2>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Quản lý đơn hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-lg-12 table-responsive mb-5">

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>SĐT</th>
                    <th>Tiền</th>
                    <th>Trạng thái</th>
                    <th> Thao tác</th>
                </tr>
                </thead>
                <tbody>

                <?php $stt = 1;
                foreach ($donhang
                as $key => $val): ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $val['ten'] ?></td>
                    <td><?php echo $val['sodienthoai'] ?></td>
                    <td><?php echo number_format($val['tongtien'], 0, ',', '.'); ?>đ</td>
                    <td>
                        <?php if($val['trangthai'] == 0) :?>
                            <a href="javascript:;" class="btn btn-xs btn-default" >Chưa xác nhận </a>
                        <?php elseif($val['trangthai'] == 1) : ?>
                            <a href="javascript:;" class="btn btn-xs btn-success ">Đã xác nhận</a>
                        <?php elseif($val['trangthai'] == 2) : ?>
                            <a href="javascript:;" class="btn btn-xs btn-warning ">Đang vận chuyển</a>
                        <?php elseif($val['trangthai'] == 3) : ?>
                            <a href="javascript:;" class="btn btn-xs btn-info ">Giao hàng thành công</a>
                        <?php elseif($val['trangthai'] == 4) : ?>
                            <a href="javascript:;" class="btn btn-xs btn-danger ">Giao hàng thất bại</a>
                        <?php endif ; ?>
                    </td>
                    <td>
                    <?php if($val['trangthai'] == 0) :?>
                        <a href="/quan-ly-don-hang.php?delete=<?php echo $val['id'] ?>" class="btn  btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa không ? ')" ;> <i class="fa fa-times"
                                                                                  style="color: white;"></i></a>
                        <?php else : ?>
                            <span></span>
                        <?php endif ; ?>
                        <a class="my-button-" href="/chi-tiet-don-hang.php?id=<?= $val['id'] ?>" style="margin-left: 10px;">Chi tiết</a>
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
