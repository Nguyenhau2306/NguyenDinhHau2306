<?php

    /**
     * gọi file autoload
     */
    $open =  "dh";
    $active = "donhang";
    include __DIR__ ."/../../autoload/autoload.php";


    /**
     * lấy số trang nếu có
     */
    
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
    $sql = " SELECT *,donhang.email as email_donhang, donhang.id as id_donhang, admin.name as tenship, admin.email as email_ship,  admin.id as id_admin FROM donhang LEFT JOIN admin on admin.id = donhang.nhanviengiaohang_id  WHERE 1 ";

    if (isset($_GET['id']) && $_GET['id'])
    {
        $sql .= " AND donhang.id = ". $_GET['id'];
    }

    $sql .= " ORDER BY donhang.id DESC";
    $donhang = $db->fetchJone("donhang",$sql,$page = $p,5,false);
    

    if(isset($donhang['page']))
    {
        $sotrang =  $donhang['page'];
        unset($donhang['page']); 
    }

?>  

<?php 
    /**
     * goi file header
     */
    include __DIR__ ."/../../layouts/header.php";
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
                   
                    <li>
                        <i> Đơn hàng  </i>
                    </li>
                </ul>
               
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Đơn hàng
                    </div>
                </div>
                <div class="portlet-body">
                    <div>
                        <form action="" class="form-horizontal" style="display: flex;margin-bottom: 15px;">
                            <input type="number" class="form-control" placeholder="Mã đơn" value="<?= $_GET['id'] ?? '' ?>" name="id" style="width: 200px;margin-right: 10px" />
                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center"> Mã ĐH</th>
                                    <th class="text-center"> Tên </th>
                                    <th class="text-center"> Email </th>
                                    <th class="text-center"> Số điện thoại  </th>
                                    <th class="text-center"> Hình thức </th>
                                    <th class="text-center"> Số tiền </th>
                                    <th class="text-center"> địa chỉ </th>
                                    <th class="text-center"> nội dung </th>
                                    <th class="text-center"> Trạng thái </th>
                                    <th class="text-center"> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  foreach($donhang as $item) :?>
                                <tr>
                                   <td class="text-center"><?php echo $item['id_donhang'] ?></td>
                                   <td class="text-center"><?php echo $item['ten'] ?></td>
                                   <td class="text-center"><?php echo $item['email_donhang'] ?></td>
                                   <td class="text-center"> <?php echo $item['sodienthoai'] ?></td>
                                   <td class="text-center"> <?php echo $item['loai'] == 1 ? "Nhận hàng thanh toán" : "Chuyển khoản" ?></td>
                                   <td class="text-center"> <?php echo formatprice($item['tongtien']) ?> đ</td>
                                   <td class="text-center"><?php echo $item['diachi'] ?></td>
                                   <td class="text-center"><?php echo $item['noidung'] ?></td>
                                   <td class="text-center">
                                       <?php if($item['trangthai'] == 0) :?>
                                            <a href="javascript:;" class="btn btn-xs btn-default trangthai-info" >Chưa xác nhận </a>
                                        <?php elseif($item['trangthai'] == 1) : ?>
                                            <a href="javascript:;" class="btn btn-xs btn-success trangthai-info ">Đã xác nhận thanh toán chuyển khoản</a>
                                       <?php elseif($item['trangthai'] == 2) : ?>
                                            <a href="javascript:;" class="btn btn-xs btn-warning trangthai-info ">Đang vận chuyển</a>
                                       <?php elseif($item['trangthai'] == 3) : ?>
                                            <a href="javascript:;" class="btn btn-xs btn-info trangthai-info ">Giao hàng thành công</a>
                                       <?php elseif($item['trangthai'] == 4) : ?>
                                            <a href="javascript:;" class="btn btn-xs btn-danger trangthai-info ">Giao hàng không thành công</a>
                                        <?php endif ; ?>
                                   </td>
                                   <td class="text-center">
                                       <a href="edit.php?id=<?php echo $item['id_donhang'] ?>" class="btn default btn-xs blue"><i class="fa fa-pencil"></i> Cập nhật </a>
                                        <a href="view.php?id=<?php echo $item['id_donhang'] ?>" class="btn default btn-xs blue"><i class="fa fa-eye-slash"></i> Xem </a>
                                        <a  href="delete.php?id=<?php echo $item['id_donhang'] ?>" class="btn default btn-xs red" onclick="return confirm('Bạn có muốn xóa không ? ')";> <i class="fa fa-times"></i> Xóa</a>
                                       
                                    </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

 <?php 
    /**
     * goi file footer
     */
    include __DIR__ ."/../../layouts/footer.php";
 ?>
