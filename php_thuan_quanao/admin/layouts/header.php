<!DOCTYPE html>
        <!--[if !IE]><!-->
        <html lang="en">
            <!--<![endif]-->
            <!-- BEGIN HEAD -->
            <head>
                <meta charset="utf-8"/>
                <title> Đồ án tốt nghiệp  </title>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
                <meta http-equiv="Content-type" content="text/html; charset=utf-8">
                <meta content="" name="description"/>
                <meta content="" name="author"/>
                <!-- BEGIN GLOBAL MANDATORY STYLES -->
                <link href="<?php echo public_admin() ?>css/css.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/uniform.default.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
                <!-- END GLOBAL MANDATORY STYLES -->
                <!-- BEGIN THEME STYLES -->

                <link href="<?php echo public_admin() ?>css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/plugins.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/layout.css" rel="stylesheet" type="text/css"/>
                <link id="style_color" href="<?php echo public_admin() ?>css/darkblue.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/custom.css" rel="stylesheet" type="text/css"/>
                <link href="<?php echo public_admin() ?>css/style.css" rel="stylesheet" type="text/css"/>
                <!-- END THEME STYLES -->

                 <script src="<?php echo public_admin() ?>ckeditor/ckeditor.js"></script>
            </head>
           
            <body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed page-sidebar-closed-hide-logo">
                <!-- BEGIN HEADER -->
                <div class="page-header -i navbar navbar-fixed-top">
                    <!-- BEGIN HEADER INNER -->
                    <div class="page-header-inner">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            
                            <div class="menu-toggler sidebar-toggler">
                              
                            </div>
                        </div>
                       
                        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        </a>
                       
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                    <a href="<?= base_url() ?>admin/modules/tranction" class="dropdown-toggle">
                                        <i class="icon-bell"></i>
                                        <span class="badge badge-default" style="top:15px"> Có <?php echo $sodonhangf[0]['sohh'] ?>  đơn hàng chưa xử lý</span>
                                    </a>
                                </li>
                                <li class="dropdown dropdown-user">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                   
                                    <span class="username username-hide-on-mobile">
                                        <?php echo $_SESSION['admin_name'] ?>
                                    </span>
                                    <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                       
                                        <li>
                                            <a href="<?php echo base_url() ?>admin/modules/profile/" >
                                            <i class="icon-key"></i> Cập nhật thông tin </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() ?>logout.php" >
                                            <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                               
                                <li class="dropdown dropdown-quick-sidebar-toggler">
                                    <a href="<?php echo base_url() ?>" class="dropdown-toggle" target="_blank">
                                    <i class="icon-logout"></i>
                                    </a>
                                </li>
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                    <!-- END HEADER INNER -->
                </div>
                <!-- END HEADER -->
                <div class="clearfix"></div>
                <!-- BEGIN CONTAINER -->
                <div class="page-container">
                    <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar-wrapper">
                       
                        <div class="page-sidebar navbar-collapse collapse">
                            
                            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                              
                               <?php if (isset($_SESSION['admin_name'])) :?>
                                <li class="<?php echo ! isset($open) ? 'active' : '' ?>">
                                    <a href="<?php echo base_url() ?>admin/">
                                        <i class="icon-home"></i><span class="title"> Thống Kê Báo Cáo</span><span class="arrow "></span>
                                    </a>
                                </li>
                                <li class="<?php echo isset($open) && $open == 'dm'  ? 'active' : '' ?> ">
                                    <a href="javascript:;">
                                        <i class="fa fa-sitemap"></i><span class="title"> Danh Mục </span><span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="<?php echo isset($active) && $active == 'category' ? 'active' : ''  ?>">
                                            <a href="<?php echo modules('category') ?>"><i class="fa fa-list-ul"></i> Danh mục sản phẩm</a>
                                        </li>
                                        <li class="<?php echo isset($active) && $active == 'product' ? 'active' : ''  ?>">
                                            <a href="<?php echo modules('product') ?>"><i class="fa fa-leaf"></i>Sản phẩm </a>
                                        </li>
                                        <li  class="<?php echo isset($active) && $active == 'producer' ? 'active' : ''  ?>">
                                            <a href="<?php echo modules('producer') ?>"><i class="fa fa-building"></i>Nhà cup cấp</a>
                                        </li>

                                        <li  class="<?php echo isset($active) && $active == 'menu' ? 'active' : ''  ?>">
                                            <a href="<?php echo modules('menu') ?>">
                                                <i class="title"> Menu bài viết </i>
                                            </a>
                                        </li>

                                        <li class="<?php echo isset($active) && $active == 'post' ? 'active' : ''  ?>">
                                            <a href="<?php echo modules('post') ?>">
                                            <i class="icon-pencil"></i> Tin tức </a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="<?php echo isset($open) && $open == 'ht' ? 'active' : '' ?>">
                                    <a href="javascript:;">
                                    <i class="icon-handbag"></i>
                                    <span class="title">Mặt Hàng Sắp Hết <span class="badge badge-danger"><?php echo ($soluongton[0]['sl']) ?></span></span>
                                    <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="<?php echo isset($active) && $active == 'inventory' ? 'active' : ''  ?>">
                                            <a href="<?php echo modules('inventory') ?>">
                                                <i class="fa fa-list"></i>
                                                Danh sách  
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <?php endif ;?>

                                <li class="<?php echo isset($open) && $open == 'dh' ? 'active' : '' ?>">
                                    <a href="javascript:;">
                                    <i class="icon-basket"></i>
                                    <span class="title"> Đơn Hàng <span class="badge badge-danger"></span></span>
                                    <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="<?php echo isset($active) && $active == 'donhang' ? 'active' : ''  ?>" >
                                            <a href="<?php echo modules('tranction') ?>">
                                                <i class="fa fa-list"></i>
                                                Danh sách  
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                                <?php if (isset($_SESSION['admin_name'])) :?>
                                <li class="<?php echo isset($open) && $open == 'auth' ? 'active' : '' ?>">
                                    <a href="javascript:;">
                                    <i class="icon-user"></i>
                                    <span class="title"> Khách Hàng </span>
                                    <span class="arrow "></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="<?php echo isset($active) && $active == 'thanhvien' ? 'active' : ''  ?>" >
                                            <a href="<?php echo modules('auth') ?>">
                                                <i class="fa fa-list"></i>
                                                Danh sách  
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </li>

                                <li class="<?php echo isset($open) && $open == 'setting' ? 'active' : '' ?>">
                                   <a href="javascript:;">
                                     <i class="icon-user"></i>
                                     <span class="title"> Ban Quản Trị </span>
                                     <span class="arrow "></span>
                                    </a>
                                   <ul class="sub-menu">
                                        <li class="<?php echo isset($active) && $active == 'admin' ? 'active' : ''  ?>">
                                            <a href="<?php echo modules('administrator') ?>">
                                              <i class="title"></i>
                                              Thành Viên quản trị 
                                            </a>
                                        </li>

                                    </ul>
                                    
                                </li>
                                <?php endif ;?>

                            </ul>

                            <!-- END SIDEBAR MENU -->
                        </div>
                    </div>
                    <!-- END SIDEBAR -->
