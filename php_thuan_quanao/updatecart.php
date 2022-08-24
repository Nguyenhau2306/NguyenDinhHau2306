<?php 
    require_once __DIR__."/autoload/autoload.php";
    if ( ! isset($_SESSION['cart'] ))
    {
        echo " <script>alert('  Chưa có sản phẩm trong giỏ hàng   !'); location.href='index.php';</script>";
    }
    
    if(isset($_POST['key']) && $_POST['key'] != NULL)
    {
        $key = $_POST['key'];
    }


    if(isset($_POST['qtyupdate']) && $_POST['qtyupdate'] != NULL)
    {
        $qtyupdate = $_POST['qtyupdate'];
    }

    if ($qtyupdate <= 0 )
    {
        $data = 0;
    }else {
        $productEdit = $db->fetchID("sanpham", $key) ;
        if ($productEdit['soluong'] <= $qtyupdate) {
            $data = 0;
        }else{
            if ( $key && $qtyupdate)
            {
                $_SESSION['cart'][$key]['qty'] = $qtyupdate;
                $data = 1;
            }
            else
            {
                $data = 0;
            }
        }
    }

    

    
    echo  $data;
 ?>