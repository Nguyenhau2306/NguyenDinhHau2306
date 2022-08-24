<!-- Footer Start -->
<style>
    .footer-master{
        border-top: 2px solid #dedede;
        /* background: white !important; */
        background: #f0f;
        padding-top :1px;
    }
    .footer-master p,     .footer-master a{
        color: #8c8c8c;
    }
</style>
<div class="container-fluid bg-secondary text-dark mt-5 pt-5 footer-master" >
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <img src="<?= base_url() ?>/public/logo.png" alt="" style="width: 200px;margin-bottom: 10px;">
                </a>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> 100 Phố Viên-Bắc Từ Liêm-Hà Nội</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0941445790</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Danh mục</h5>
                        <div class="d-flex flex-column justify-content-start">
                        <?php foreach($danhmuc ?? [] as $item) :?>
                            <a href="/danh-muc-san-pham.php?id=<?php echo $item['id'];?>&&slug=<?php echo $item['slug'] ?>" class="text-dark mb-2"><?= $item['tendanhmuc'] ?></a>
                        <?php endforeach ; ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="<?= base_url() ?>"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="https://www.facebook.com/nguyenhau230699/">Design by :  Nguyễn Đình Hậu </a><br>
                    <!-- <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br> -->
                     <a href="#" target="_blank">Đồ án tốt nghiệp</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

