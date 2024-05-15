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
    <main class="container-fluid">
        <!-- Navbar-->

        <div class="container-fluid mt-1 d-none d-sm-block1" style="font-size:75%;">
            <div class="row">
                <div class="col-3"><i class="fas fa-map-marker-alt"></i> Conakry - Madina Dispensaire</div>
                <div class="col-9 text-end"> &nbsp; &nbsp; &nbsp; <i class="fas fa-envelope"></i> infos@makitimoto.com 
                &nbsp; &nbsp; &nbsp;<i class="fas fa-phone"></i> (+224) 620 114 54 - 664 270 62 - 655 806 98 </div>
            </div>  
        </div>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-white d-none d-sm-block">


        <div class="container-fluid">
            <!-- Toggle button -->
            <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0 text-success font-weight-bold" href="/">               
                <img width="40px" src="<?= base_url('assets/images/logo-rgph4.jpg') ?>" alt="LOGO RGPH4.." /> Candidature RGPH-4   
            </a>
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/mabout">A Propos RGPH-4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/m.profils">Postes Disponibles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/mrecepisse">Recupérer mon recepissé</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/mdossiers_fournier">Dossiers Fournir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/mcheckapp">Voir mon résultat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/mcontact">Contactez-nous</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/index.php/mhelp">Aide</a>
                </li>
            </ul>
            <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <!-- <div class="d-flex align-items-center">
                <a class="link-secondary me-3" href="#">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <div class="dropdown">
                    <a
                    data-mdb-dropdown-init
                    class="link-secondary me-3 dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    aria-expanded="false"
                    >
                    <i class="fas fa-bell"></i>
                    <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuLink"
                    >
                    <li>
                        <a class="dropdown-item" href="#">Some news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Another news</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </li>
                    </ul>
                </div>

                <div class="dropdown">
                    <a
                    data-mdb-dropdown-init
                    class="dropdown-toggle d-flex align-items-center hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuAvatar"
                    role="button"
                    aria-expanded="false"
                    >
                    <img
                        src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                        class="rounded-circle"
                        height="25"
                        alt="Black and White Portrait of a Man"
                        loading="lazy"
                    />
                    </a>
                    <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="navbarDropdownMenuAvatar"
                    >
                    <li>
                        <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Logout</a>
                    </li>
                    </ul>
                </div>
            </div> -->
            <!-- Right elements -->

            <div class="d-flex align-items-center">
                <!-- <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2">
                Login
                </button>
                <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
                Sign up for free
                </button> -->
                <a data-mdb-ripple-init class="btn btn-success px-3" href="/index.php/m.profils" role="button" ><i class="fab fa-github"></i> Postuler maintenant</a>
            </div>





        </div>








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
                <p> <img width="70px" src="<?= base_url('assets/images/logo-rgph4.jpg') ?>" alt="LOGO RGPH4.." /> </p>
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
                    <a class="sidenav-link" href="/index.php/mdossiers_fournier" title="Dossiers fournier"> <i class="fa fa-file me-3"></i> <span>&nbsp;Dossiers fournir</span></a>
                    
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
