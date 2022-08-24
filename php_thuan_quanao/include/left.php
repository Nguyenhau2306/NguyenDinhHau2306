<div class="col-md-3  fixside">
    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-list"></i> Danh mục</h3>
		<?php showcatemenu($danhmuc);

		use libraries\Url\Input; ?>
    </div>
    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-flag"></i> Sản phẩm hót </h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
        <ul>
			<?php foreach ($sanphamhot as $item) : ?>
                <li class="clearfix">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>"
                         class="img-responsive pull-left" width="80" height="80">
                    <div class="info pull-right">
                        <p class="name"><?php echo $item['tensanpham'] ?></p>
                        <b class="sale"> Giá Gốc
                        :<?php echo formatprice($item['gia']) ?>đ</b><br>
                        <b class="price"> Giảm Giá  : <?php echo formatprice($item['gia'] * (100 - $item['giamgia']) / 100) ?> đ</b><br>
                        <span class="view"><i class="fa fa-eye"></i> 100000 : <i
                                    class="fa fa-heart-o"></i><?php echo $item['yeuthich'] ?></span>
                    </div>
                    </a>
                </li>
			<?php endforeach; ?>
        </ul>
        <!-- </marquee> -->
    </div>


    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-eye"></i> Sản phẩm bán chạy </h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
        <ul>
			<?php foreach ($sanphambc as $item) : ?>
                <li class="clearfix">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>"
                         class="img-responsive pull-left" width="80" height="80">
                    <div class="info pull-right">
                        <p class="name"><?php echo $item['tensanpham'] ?></p>
                        <b class="sale"> Giá Gốc
                        :<?php echo formatprice($item['gia']) ?>đ</b><br>
                        <b class="price"> Giảm Giá  : <?php echo formatprice($item['gia'] * (100 - $item['giamgia']) / 100) ?> đ</b><br>
                        <span class="view"><i class="fa fa-eye"></i> 100000 : <i
                                    class="fa fa-heart-o"></i><?php echo $item['yeuthich'] ?></span>
                    </div>
                    </a>
                </li>
			<?php endforeach; ?>


        </ul>
        <!-- </marquee> -->
    </div>

    <div class="box-left box-menu">
        <h3 class="box-title"><i class="fa fa-heart-o"></i> Sản phẩm yêu thích </h3>
        <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
        <ul>
			<?php foreach ($sanphamyt as $item) : ?>
                <li class="clearfix">
                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>--<?php echo $item['slug'] ?>"">
                    <img src="<?php echo base_url() ?>/public/uploads/product/<?php echo $item['hinhanh'] ?>"
                         class="img-responsive pull-left" width="80" height="80">
                    <div class="info pull-right">
                        <p class="name"><?php echo $item['tensanpham'] ?></p>
                        <b class="sale"> Giá Gốc
                        :<?php echo formatprice($item['gia']) ?>đ</b><br>
                        <b class="price"> Giảm Giá  : <?php echo formatprice($item['gia'] * (100 - $item['giamgia']) / 100) ?> đ</b><br>
                        <span class="view"><i class="fa fa-eye"></i> 100000 : <i
                                    class="fa fa-heart-o"></i><?php echo $item['yeuthich'] ?></span>
                    </div>
                    </a>
                </li>
			<?php endforeach; ?>


        </ul>
        <!-- </marquee> -->
    </div>


</div>