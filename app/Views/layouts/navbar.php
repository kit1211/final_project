<?php
    $session = \Config\Services::session();
    $isLoggedIn = $session->get('isLoggedIn');
?>
<section class="header-main navv">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-6">
                <div class="brand-wrap">
                    <a href="<?=base_url()?>"><h2 class="logo-text th-600 text-white">DESSLAND</h2></a>
                    <img class="logo" src="<?=base_url('assets/delicious.webp');?>">
                    <?php if($isLoggedIn){ ?>
                    <!-- <a href="<?=base_url()?>" class="text-white pl-5 th-400"><i class="bi bi-house"></i> Dashboard</a> -->
                    <a href="<?=base_url()?>" class="text-white pl-3 th-400"><i class="bi bi-receipt"></i> POS</a>
                    <a href="<?=base_url('home/customer')?>" class="text-white pl-3 th-400"><i class="bi bi-people"></i> จัดการลูกค้า</a>
                    <a href="<?=base_url('home/product')?>" class="text-white pl-3 th-400"><i class="bi bi-box-seam"></i> จัดการสินค้า</a>
                    <!-- <div class="widget-header">
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle th-400" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                การจัดการ
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item th-400" href="<?=base_url('home/customer')?>">จัดการสมาชิก</a>
                                <a class="dropdown-item th-400" href="<?=base_url('home/product')?>">จัดการสินค้า</a>
                                <a class="dropdown-item th-400" href="#">สรุป</a>
                            </div>
                        </div>
                    </div> -->
                    <?php } ?>
                </div> 
            </div>
            
            <div class="col-lg-6 col-sm-6">
                <?php if($isLoggedIn){ ?>
                <div class="widgets-wrap d-flex justify-content-end">
                    <span class="pt-2 pl-2 th-500 text-white" id="showUsername">กำลังโหลด..</span>
                    <div class="widget-header dropdown">
                        <a href="#" class="ml-1 icontext" data-toggle="dropdown" data-offset="20,10">
                            <?php if($isLoggedIn){ ?>
                            <img src="<?=base_url('assets/User.png')?>" class="avatar" alt="">
                            <?php }else{ ?>
                            <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" class="avatar" alt="">
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item th-400" href="<?=base_url('home/signout')?>"><i class="fa fa-sign-out-alt"></i> ออกจากระบบ</a>
                        </div>
                    </div> 
                </div> 
                <?php } ?>
            </div> 
        </div>
    </div> 
</section>
<script>
    <?php if($isLoggedIn){ ?>
    const usernameNav = '<i class="bi bi-person-fill-check"></i>: <?=$session->get('username')?>';
    <?php }else{ ?>
    usernameNav = null;
    <?php } ?>
    if(usernameNav){
        document.getElementById('showUsername').innerHTML = usernameNav;
    }
</script>
