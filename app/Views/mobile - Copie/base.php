<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="fr"> 
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title> <?= $this->renderSection('title') ?></title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/mobile/css/mdb.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/mobile/css/style1.css" />
    <?php $this->renderSection('style');?>
  </head>
  <body class="bg-white">  
    <!-- Start your project here-->
    <main>

        <!-- Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white d-none d-sm-block1">
            <form method="GET" action="liste.php" class="container-fluid justify-content-between">
                <!-- Left elements -->
                <div class="d-flex justify-content-between w-25">
                <!-- Brand -->
                <a class="navbar-brand me-2 mb-1 d-flex align-items-center text-primary font-weight-bold tit" href="index.php">
                    <!-- <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="20" alt="" loading="lazy" style="margin-top: 2px;" /> -->
                    M<!-- OTO -->  <i class="fas fa-motorcycle fa-2x"></i>
                
                </a>

                <div class="me-2 mb-1 d-flex align-items-center">
                    <a class="btn btn-lg1 btn-primary" href="#" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                    <b> <i class="fas fa-th-list"></i> Category </b>
                    </a>
                </div>

                <!-- Search form -->
                <!-- 
                <form class="input-group w-auto my-auto d-none d-sm-flex">
                    <input autocomplete="on" type="search" class="form-control rounded" placeholder="Search" style="min-width: 125px;" />
                    <span class="input-group-text border-0 d-none d-lg-flex"><i class="fas fa-search"></i></span>
                </form>
                -->
                </div>
                <!-- Left elements -->

                <!-- Center elements -->
                <div class="navbar-nav flex-row d-none d-md-flex w-50">
                <div class="input-group input-group-lg1">
                    <div class="input-group-prepend"> 

                    <div class="dropdown">
                        <button class="btn btn-outline-primary border-1 rounded-0 rounded-start dropdown-toggle" type="button" id="dropdownMenuSearch2" data-mdb-toggle="dropdown" aria-expanded="false"> All Product </button>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuSearch2">
                        <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li> -->

                        </ul>
                    </div>


                    <!-- <button class="btn btn-lg1 btn-outline-primary border-1 rounded-0 rounded-start" type="button">All Product <i class="fas fa-caret-down"></i></button>  -->
                    </div>
                    <input type="text" class="form-control border-primary border-1" name="search" placeholder="Search" aria-label="Search sur Motogn" aria-describedby="basic-addon2">
                    <div class="input-group-append"> <button class="btn btn-primary border-1 rounded-0 rounded-end" type="submit"> <i class="fas fa-search"></i> </button> </div>
                </div>
                </div>
                <!-- Center elements -->
            </form>
        </nav>
        <!-- Navbar -->

        <!-- start menu mobile -->
        <!-- Just an image -->
        <nav class="navbar navbar-light bg-light d-sm-none">
            <div class="container">
                <a class="navbar-brand me-2 mb-1 align-items-center text-success font-weight-bold tit" href="/">
                    <img width="40px" src="<?= base_url('assets/images/logo-rgph4.jpg') ?>" alt="LOGO RGPH4.." /> Candidature RGPH-4
                </a>

                <!-- <a class="text-center p-1 text-black" href="panier.php"> 
                <span><i class="fas fa-shopping-cart fa-"></i></span>
                <span class="badge rounded-pill badge-notification bg-danger nbPanier">0</span>  
                </a> 
                <a class="text-center p-1 text-black ml-2" href="#"> <span> <i class="fas fa-shopping-bag fa-"></i>  </span> </a> 
                <a class="text-center p-1 text-black ml-2" href="#"> <span><i class="fas fa-comment-alt fa-"></i>  </a>   
                <a class="text-center p-1 text-black ml-2" href="heart.php"> 
                <span><i class="fas fa-heart fa-"></i></span>
                <span class="badge rounded-pill badge-notification bg-danger nbHeart">0</span> 
                </a>           
                <a class="text-center p-1 text-black ml-2" href="login.php"> <span><i class="fas fa-user fa-"></i> </span> </a>        -->
                <a class="text-center p-1 text-black ml-2" href="login.php"> <span>  </span> </a>       

                <a href="#" class="text-center p-1 text-black ml-2"
                                data-mdb-toggle="sidenav"
                                data-mdb-target="#sidenav-1"
                                class=""
                                aria-controls="#sidenav-1"
                                aria-haspopup="true"> <i class="fas fa-bars fa-lg text-dark"></i> </a>


            </div>
        </nav>

        <!-- Sidenav -->
        <nav
            id="sidenav-1"
            class="sidenav"
            data-mdb-hidden="true"
            data-mdb-accordion="true"
        >
            <a class="ripple d-flex justify-content-center py-2 text-primary font-weight-bold tit" href="/" data-mdb-ripple-color="primary">  
                <p> <img width="70px" src="<?= base_url('assets/images/logo-rgph4.jpg') ?>" alt="LOGO RGPH4.." />   </p>
                <!-- <p> RGPH-4 </p> -->
            </a>

            <ul class="sidenav-menu">

                <!-- <li class="sidenav-item">
                    <a class="sidenav-link" > <i class="fas fa-plus me-3"></i> <span>Motos</span></a >
                    <ul class="sidenav-collapse">
                    <li class="sidenav-item"> <a href="liste.php?menu_id=1&typ_id=1&nouv=0&categ=Toutes Motos" class="sidenav-link">Toutes</a></li>
                    <li class="sidenav-item"> <a href="liste.php?menu_id=1&typ_id=1&nouv=1&categ=Nouvelles Motos" class="sidenav-link">Nouvelles</a></li>
                    <li class="sidenav-item"> <a href="liste.php?menu_id=1&typ_id=1&nouv=2&categ=Anciennes Motos" class="sidenav-link">Anciennes</a></li>
                    </ul>
                </li> -->

                <hr class="m-0" />
                
                <!-- <li class="sidenav-item">
                    <a class="sidenav-link" href="/"> <i class="fas fa-map-marker-alt me-3"></i> <span>&nbsp;Garages Partenaires</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="infoLiv.php?categ=Infos Livraison"> <i class="fas fa-motorcycle me-3"></i> <span>&nbsp;Livraison</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="information.php?categ=Information MakitiMoto"> <i class="fas fa-info me-3"></i> <span>&nbsp;Information</span></a>
                </li>

                <hr class="m-0" /> -->

                <li class="sidenav-item">
                    <a class="sidenav-link" href="/index.php/mabout" title="A Propos BCR et RGPH-4"> <i class="fa fa-info me-3"></i> <span>&nbsp;&nbsp;&nbsp;A Propos BCR / RGPH-4</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="/index.php/m.profils" title="Postes disponibles"> <i class="fa fa-list me-3"></i> <span>&nbsp;Postes disponibles</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="/index.php/mrecepisse" title="Recupérer mon recepissé"> <i class="fa fa-file me-3"></i> <span>&nbsp;Recupérer mon recepissé</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="/index.php/mcheckapp" title="Voir mon résultat"> <i class="fa fa-id-card me-3"></i> <span>&nbsp;Voir mon résultat</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="/index.php/mcontact" title="Contactez-nous"> <i class="far fa-envelope me-3"></i> <span>&nbsp;Contactez-nous</span></a>
                </li>

                <li class="sidenav-item">
                    <a class="sidenav-link" href="/index.php/mhelp" title="Aide ?"> <i class="fas fa-question me-3"></i> <span>&nbsp;Aide</span></a>
                </li>
            </ul>
        </nav>
        <!-- Sidenav -->
        <!-- end menu mobile -->
        <?php $this->renderSection('content');?>       
    </main>

    <!-- start footer -->
    <!-- end footer -->

    <!-- End your project here-->
    <script type="text/javascript" src="<?= base_url() ?>/assets/mobile/js/jquery-1.12.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/mobile/js/jquery.form.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jStorage/0.4.12/jstorage.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/mobile/js/mdb.min.js"></script>
    <?php $this->renderSection('script');?>    

  </body>
</html>
