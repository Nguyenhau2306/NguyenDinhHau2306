<?php

    /**
     * gọi file autoload
     */
    require_once __DIR__ . "/autoload/autoload.php";

    if( isset($_SESSION['auth_id']))
    {
        $path = $_SERVER["HTTP_REFERER"];
        if(isset($path))
        {
            header("location: ".$path);
        }
        else
        {
            header("location: index.php");
        }
        
    }

     // lấy giá trị từ các ô input

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email    = postInput('email');
        $password = postInput('password');

        $error = [];
        if( $email == "" )
        {
            $error['email'] = "Mời bạn nhập email !";
        }

        if( $password == "" )
        {
            $error['password'] = "Mời bạn nhập mật khẩu !";
        }

        if (empty($error))
        {
            $password = md5($password);

            $admin = $db->fetchOne("thanhvien","email = '".$email."' AND password = '".$password."'");
            if(empty($admin))
            {
                $error['thongtin'] = " Sai thông tin đăng nhập!";    
            }
            else 
            {
                // set_login($admin['id'],$admin['name']);
                $_SESSION['auth_name']    = $admin['hoten'];
                $_SESSION['auth_id']      = $admin['id'];
                $_SESSION['auth_level']   = $admin['level'];
                unset($_SESSION['reg_email']);
                unset($_SESSION['reg_pass']);
                echo " <script> location.href='index.php';</script>";
            }   
        }
        else
        {
            $error['trong'] = " Mời bạn điền đầy đủ thông tin !";
        }
    }
   
?>  


<!DOCTYPE html>
<html lang="en">

<?php require_once __DIR__ . "/include/head.php";  ?>

<body>

    <?php require_once __DIR__ . "/include/top.php";  ?>

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100 danh-muc" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" >
                    <?php foreach($danhmuc ?? [] as $item) :?>
                        <a href="/danh-muc-san-pham.php?id=<?php echo $item['id'];?>&&slug=<?php echo $item['slug'] ?>" class="nav-item nav-link"><?= $item['tendanhmuc'] ?></a>
                    <?php endforeach ; ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <?php require_once __DIR__ . "/include/nav.php";  ?>
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
                <p class="m-0">Đăng nhập</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 pb-5">
            <div class="col-md-4 bor" style="padding: 10px; margin: 0 auto">
                 <div class="panel panel-default">
                    <div class="panel-heading" style ="text-align: center" > <h2>Đăng Nhập</h2> </div>
                    <div class="panel-body"> 
                        <?php if(isset($error) && isset($error['thongtin'])) :?>
                            <div class="alert alert-danger"  style = "background-color: #fff; border : none; padding :0px">
                                <ul>
                                
                                    <?php foreach($error as $key) : ?>
                                        <li style="color: red; "><?php echo $key ?></li>
                                    <?php endforeach ; ?>
                               
                                </ul>
                            </div>
                        <?php endif ; ?>
                        <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                            
                          
                            <div class="form-group">
                                <label class="control-label col-sm-6 " style =" font-weight : bold" for="email">Email <span style="color: red">(*)</span></label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" placeholder="nguyenvana@gmail.com" name="email" value="<?php echo isset($_SESSION['reg_email']) ? $_SESSION['reg_email'] : '' ?>">
                                    <?php if (isset($error['email'])): ?>
                                        <p class="text-danger"><?php echo $error['email']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-6"  style =" font-weight : bold" for="pwd">Mật khẩu <span style="color: red">(*)</span></label>
                                <div class="col-sm-12">          
                                    <input type="password" class="form-control" id="pwd" name="password" placeholder="*******" value="<?php echo isset($_SESSION['reg_pass']) ? $_SESSION['reg_pass'] : '' ?>">
                                    <?php if (isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button type="submit" class="col-sm-12 my-button btn btn-info "> Đăng Nhập </button>
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


    <?php  require_once __DIR__ . "/include/footer.php"; ?>


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
