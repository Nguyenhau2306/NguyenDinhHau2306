<?php

    /**
     * gọi file autoload
     */
    $open = "dm";
    $active = "product";
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
    $sql = " SELECT sanpham.*, danhmuc.tendanhmuc as danhmuc , nhacungcap.tennhacc as tennhacungcap FROM sanpham 
        LEFT JOIN danhmuc ON danhmuc.id = sanpham.danhmuc_id
        LEFT JOIN nhacungcap ON nhacungcap.id = sanpham.nhacungcap_id
        WHERE 1 ";
    if (isset($_GET['n']))
    {
        $key = $_GET['n'];
        $sql .= " AND tensanpham like '%$key%' ";
    }
    $sql .= ' ORDER BY id DESC';
    $productList = $db->fetchJone("sanpham",$sql,$page = $p,10,true);
    

    if(isset($productList['page']))
    {
        $sotrang =  $productList['page'];
        unset($productList['page']); 
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
                        <i> Sản phẩm  </i>
                    </li>
                </ul>
                <?php include __DIR__ ."/../../layouts/action.php"; ?>
            </div>

            <!-- hiện thông báo -->
            <?php include __DIR__ ."/../../layouts/notification.php"; ?>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Danh mục sản phẩm 
                    </div>
                </div>

                <div class="portlet-body">
                    <div>
                        <form action="" class="form-horizontal" style="display: flex;margin-bottom: 15px;">
                            <input type="text" class="form-control" placeholder="Tên sp" value="<?= $_GET['n'] ?? '' ?>" name="n" style="width: 200px;margin-right: 10px" />
                            <button type="submit" class="btn btn-success">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px"> ID</th>
                                    <th class="text-center"> Tên </th>
                                    <th class="text-center"> Danh mục </th>
                                    <th class="text-center"> Hình ảnh  </th>
                                    <th class="text-center"> Thông tin </th>
                                    <th class="text-center"> Size </th>
                                    <th class="text-center"> Thao Tác </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($productList as $item) :?>
                                <tr>
                                   <td><?= $item['id'] ?></td>
                                   <td class="text-center"><?php echo $item['tensanpham'] ?></td>
                                   <td class="text-center"><?php echo $item['danhmuc'] ?></td>
                                   <td class="text-center">
                                        <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $item['hinhanh'] ?>" class="img" width="100" height="100" />
                                   </td>
                                   
                                   <td class="text-center">
                                       <ul style="list-style: none">
                                            <li> Nhà cung cấp <?php echo $item['tennhacungcap'] ?></li>
                                            <li>Số lượng   : <?php echo $item['soluong'] ?></li>
                                            <li>Tình trạng :  <?php echo checkprice($item['soluong']) ?></li>
                                            <li> Giá Nhập : <?php echo formatprice($item['gianhap'])  ?> đ</li>
                                            <li> Giá Bán : <?php echo formatprice($item['gia'])  ?> đ</li>
                                            <li> Giảm giá  : <?php echo $item['giamgia'] ?> % </li>                                           
                                                                                     
                                       </ul>
                                   </td>
                                    <td class="text-center">
                                        <?= $item['size'] ?>
                                    </td>
                                   <td class="text-center">
                                        <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs green"><i class="fa fa-edit"></i> Sửa</a>
                                        
                                        <a  href="delete.php?id=<?php echo $item['id'] ?>" class="btn default btn-xs red" onclick="return confirm('Bạn có muốn xóa không ? ')";> <i class="fa fa-times"></i> Xóa</a>
                                       
                                    </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                        <nav aria-label="page navigation" class="clearfix">
                            <ul class="pagination" >
                                <li>
                                    <a href=""  aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <?php for(  $i = 1 ; $i <= $sotrang ; $i++ ) : ?>
                                    <?php
                                    if(isset($_GET['page']))
                                    {
                                        $p = $_GET['page'];
                                    }
                                    else
                                    {
                                        $p = 1;
                                    }
                                    ?>
                                    <li class="<?php echo ($i == $p) ? 'active' : ''  ?>">

                                        <a href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>

                                <li>
                                    <a href="" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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
