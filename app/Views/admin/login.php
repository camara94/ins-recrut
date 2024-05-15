<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login INS</title>
    <!--bootstrap links-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&display=swap" rel="stylesheet">
    <!--css link-->
    <link rel="stylesheet" href="<?php base_url() ?>/admin_css/style.css">
    <!--owl slider link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
   
</head>
<body>

    <section class="login_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="login_box">
                        <h3>Login</h3>
                        <?php if(session()->getFlashdata('msg')): ?>
                            <div class="alert alert-success" role="alert">
                                <strong>Alert Heading</strong><?= session()->getFlashdata('msg') ?>
                            </div>
                            
                            <?php endif; ?>
                        <form class="login_form" method="POST" action="<?php echo site_url('admin_signin');?>">
                        <?php csrf_field(); ?>
                            <input type="email" name="email" placeholder="Username" value="<?php echo  set_value('email')  ?>" class="login_formele" required>
                            <input type="password" placeholder="password" name="password" class="login_formele" value="<?php echo set_value('password')  ?>" required>
                           <div class="login_btnsc">
                                <input type="submit" class="login_btn" value="Login"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <!--bootstrap links-->      
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--owl slider link-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

</body>
</html>