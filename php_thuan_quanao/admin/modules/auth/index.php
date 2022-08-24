<?php

    /**
     * gọi file autoload
     */
     $open = "auth";
    $active = "thanhvien";
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
     *  lấy danh sách thành viên không phải là admin 
     */
    $sql = " SELECT * FROM thanhvien WHERE 1 AND level != 2";
    $auth = $db->fetchJone("thanhvien",$sql,$page = $p,5,false);
    

    if(isset($auth['page']))
    {
        $sotrang =  $auth['page'];
        unset($auth['page']); 
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
                        <i> Thành viên  </i>
                    </li>
                </ul>
               
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Danh sách khách hàng
                    </div>
                </div>

                <div class="portlet-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center"> Mã KH</th>
                                    <th class="text-center"> Tên </th>
                                    <th class="text-center"> Email </th>
                                    <th class="text-center"> Số điện thoại </th>
                                    <th class="text-center"> Địa chỉ </th>
                                    <th class="text-center" style="width: 20%"> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($auth as $item) :?>
                                <tr>
                                   <td class="text-center"><?= $item['id'] ?></td>
                                   <td class="text-center"><?php echo $item['hoten'] ?></td>
                                   <td class="text-center"><?php echo $item['email'] ?></td>
                                   <td class="text-center"> <?php echo $item['sodienthoai'] ?></td>
                                   <td class="text-center"> <?php echo $item['diachi'] ?></td>
                                   <td class="text-center">                                       
                                        <a  href="delete.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs red" onclick="return confirm('Bạn có muốn xóa không ? ')";> <i class="fa fa-times"></i> Xóa</a>
                                       
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
