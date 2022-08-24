<?php
    $active = "donhang";
    include __DIR__ . "/../../autoload/autoload.php";

    $open   = "dh";
    $active = "donhang";

    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = intval($_GET['id']);
    } else {
        $_SESSION['error'] = ' Không tồn tại ID ';
        redirectAdmin("tranction");
    }

    $doanhang = $db->fetchID('donhang', $id);
    if (!$doanhang) {
        $_SESSION['error'] = ' Không tồn tại ID trong bảng đơn hàng  !!! ';
        redirectAdmin("tranction");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $trangthai = postInput("trangthai");

        $data = array('trangthai' => $trangthai,'updated_at' => $updatetime);

        $id_update = $db->update("donhang",$data , array("id" => $id ));

        if ($trangthai == 3)
        {
            $sql = " SELECT * FROM chitietdonhang WHERE donhang_id =  $id";
            $chitiet = $db->fetchsql($sql);

            foreach($chitiet as $item)
            {
                $sanpham_id = intval($item['sanpham_id']);
                $soluong = intval($item['soluong']);

                $product = $db->fetchID("sanpham",$sanpham_id);
                $pay     = $product['pay'];

                $number = $product['soluong'] - $soluong;
                $pays = $product['pay'] + 1;
                $id_updates = $db->update("sanpham",array('soluong' => $number,'pay' => $pays),array('id' => $sanpham_id));
            }
        }

        $_SESSION['success'] = ' Cập nhật thành công thành công   !!! ';
        redirectAdmin("tranction");
    }
?>

<?php
/**
 * goi file header
 */
include __DIR__ . "/../../layouts/header.php";
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo base_admin() ?>">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ul>
            <?php include __DIR__ . "/../../layouts/action.php"; ?>
        </div>
        <?php include __DIR__ . "/../../layouts/notification.php"; ?>
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus"></i> Cập nhật đơn hàng
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" method="POST" class="form-horizontal ng-pristine ng-valid" action=""
                      enctype="multipart/form-data">

                    <div class="form-body ">
                        <form id="demo-form2" action="" method="POST" class="form-horizontal form-label-left bor"
                              novalidate="" enctype="multipart/form-data">

                            <div class="col-md-12 bor" style="padding-top: 20px;">
                                <div class="form-group">
                                    <label class="control-label col-md-2"> Trạng thái đơn hàng  <span class="required">(*)</span></label>
                                    <div class="col-md-10">
                                        <select class="form-control" name="trangthai">
                                            <option value="0" <?= $doanhang['trangthai'] == 0 ? "selected" : ""  ?>> Chưa xác nhận</option>
                                            <option value="1" <?= $doanhang['trangthai'] == 1 ? "selected" : ""  ?>> Đã xác nhận thanh toán chuyển khoản</option>
                                            <option value="2" <?= $doanhang['trangthai'] == 2 ? "selected" : ""  ?>> Đang vận chuyển</option>
                                            <option value="3" <?= $doanhang['trangthai'] == 3 ? "selected" : ""  ?>> Giao hàng thành công</option>
                                            <option value="4" <?= $doanhang['trangthai'] == 4 ? "selected" : "" ?>> Giao hàng không thành công</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="ln_solid"></div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn green">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
/**
 * goi file footer
 */
include __DIR__ . "/../../layouts/footer.php";
?>
