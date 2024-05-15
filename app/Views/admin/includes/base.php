<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $this->renderSection('title') ?> </title>
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
    <?php $this->renderSection('style'); ?>
</head>
<body>
<div class="container-fluid">
    <header class="header_sc" style="border-radius:10px;">
        <div class="row">
            <div class="col-9">
                <nav class="navbar navbar-expand-sm bg-infos navbar-dark">
                    <a class="navbar-brand" href="<?= site_url('tableau') ?>">
                        <img src="<?= base_url('assets/images/logo-rgph4.jpg'); ?>" alt="Logo RGPH4" style="height:40px; border-radius:10px;">
                    </a>                
                    <ul class="navbar-nav">
                        <li class="nav-item active"> <a class="nav-link text-dark font-weight-bold" href="<?= site_url('tableau') ?>">Tableau de bord</a> </li>                        
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle text-dark font-weight-bold" data-toggle="dropdown" href="#">Postulants</a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('tableau') ?>" class="dropdown-item text-dark font-weight-bold">Liste des Candidats</a>                                
                                <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1){ ?>
                                <a href="<?= site_url('postulants/export') ?>" class="dropdown-item text-dark font-weight-bold">Télécharger la liste en xslx</a>
                                <!-- <a href="<?= site_url('download') ?>" class="dropdown-item">Télécharger les images</a>                                 -->
                                <?php } ?>                            
                            </div>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle text-dark font-weight-bold" data-toggle="dropdown" href="#">Trombinoscopes</a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('trombinoscope/') ?>" class="dropdown-item text-dark font-weight-bold">Listes des candidats</a>
                                <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1){ ?>
                                <a href="<?= site_url('trombinoscope/download') ?>" class="dropdown-item text-dark font-weight-bold">Télécharger le fichier pdf</a>
                                <?php } ?>
                            </div>
                        </li>

                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle text-dark font-weight-bold" data-toggle="dropdown" href="#">Depouillements</a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('postulant/depouillement/')?>" class="dropdown-item text-dark font-weight-bold">Depouillements</a>
                                <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1){ ?>
                                    <a href="<?= site_url('postulant/depouilles/')?>" class="dropdown-item text-dark font-weight-bold">Depouillés</a>
                                    <a href="<?= site_url('postulant/agentsaffecte/')?>" class="dropdown-item text-dark font-weight-bold">Affectés Agents</a>                           
                                <?php } ?>
                            </div>
                        </li>
                        
                        <?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1){ ?>
                        <li class="nav-item active"> <a class="nav-link text-dark font-weight-bold" href="<?= site_url('users')?>">Utilisateurs  </a> </li>    
                        <li class="nav-item active"> <a class="nav-link text-dark font-weight-bold" href="<?= site_url('affectations')?>">Affectations </a> </li>    
                        <li class="nav-item active"> <a class="nav-link text-dark font-weight-bold" href="<?= site_url('rapports')?>">Rapports </a> </li>    
                        <?php } ?>

                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle text-dark font-weight-bold" data-toggle="dropdown" href="#">Profils</a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('signout')?>" class="dropdown-item text-dark font-weight-bold">Deconnexion</a>
                            </div>
                        </li>
                        
                    </ul>               
                </nav>
            </div>
            <div class="col-3 text-center font-weight-bold text-white h5 text-secondary">
                <?php if(isset($_SESSION['id'])){ ?>
                    <div class=""> Agent Connecté </div>   
                    <?= strtoupper($_SESSION['name']) ?>   
                <?php } ?>                
            </div>
        </div>
    </header>

    <?php $this->renderSection('content');?>

    <footer class="defpooter_section">
        <div class="row">
            <div class="col-12">
                <p>Copyright © all rights reserved. developed by <b>INS GUINEE</b></p>
            </div>
        </div>
    </footer>
</div>
<!--bootstrap links-->

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!--owl slider link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<?php $this->renderSection('script');?>

<script>
    $(document).ready(function (){

    });
</script>

</body>

</html>