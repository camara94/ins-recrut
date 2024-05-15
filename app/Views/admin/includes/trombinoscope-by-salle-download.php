
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online recruitment INS </title>
    <!--bootstrap links-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!--css link-->
    <link rel="stylesheet" href="<?= base_url() ?>/admin_css/style.css">
    <!--owl slider link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/sweetalert2.min.css" />    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <style>
        .image img{
            max-width:40px;
            max-height:40px;
        }
    </style>
</head>
<body>
    <section class="container-fluid">
        <div class="row">    

            <div class="col-12 mt-3"> 
                <?php foreach ($person as $key => $value):?>
                    <div class="row border-bottom">
                        <div class="col-1 image"> 
                        <?php
                            $image_path = 'uploads/files/'.$value->photo;
                            if(file_exists($image_path)) {
                                echo '<img src="' .base_url($image_path).'" alt="PHOTO ..." class="rounded">';
                            }else {
                                echo'<img src="'.base_url('assets/images/logo-rgph4.jpg').'" alt="PHOTO ..." class="img-flui" class="rounded" />';
                            }
                        ?>                         
                        </div>
                       
                          
                        <div class="col-2">
                            <div class="row mb-1"> 
                                <div class="col"> <?= $value->matricule ?> </div> 
                            </div>
                        </div>    
                        <div class="col-3">
                            <div class="row mb-1"> 
                                <div class="col"> <?= $value->name ?> </div> 
                            </div>
                        </div>    
                        <div class="col-3">
                            <div class="row mb-1"> 
                                <div class="col"> <?= $value->last_name ?> </div> 
                            </div>
                        </div>    
                        <div class="col-3">
                            <div class="row mb-1"> 
                                <div class="col"> <?= $value->siteSalle ?> / <?= $value->salle ?> </div> 
                            </div>
                        </div>    

                    </div>
                <?php endforeach;?>
            </div>            
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function (){

        });
    </script>
</body>

</html>








































