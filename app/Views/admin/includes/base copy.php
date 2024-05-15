<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste recrutement</title>
    <!--bootstrap links-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!--google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&display=swap" rel="stylesheet">
    <!--css link-->
    <link rel="stylesheet" href="<?= base_url() ;?>/admin_css/style.css">
    <!--owl slider link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>
</head>
<body>
<div class="container-fluid">
    <header class="header_sc">
        <div class="row">
            <div class="col">
                <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                    <a class="navbar-brand" href="#">
                        <img src="bird.jpg" alt="Logo" style="width:40px;">
                    </a>
                </nav> -->
                <nav class="navbar navbar-expand-sm bg-infos navbar-dark">
                    <a class="navbar-brand" href="#">
                        <img src="<?= base_url('assets/images/login_insg.png'); ?>" alt="Logo" style="width:40px;">
                    </a>
                
                    <ul class="navbar-nav">
                        <li class="nav-item active"> <a class="nav-link" href="/">Tableau de bord</a> </li>                        
                        <!-- <li class="nav-item"> <a class="nav-link" href="#">Link</a> </li>                         -->
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Postulants</a>
                            <div class="dropdown-menu">
                                <a href="<?= site_url('postulants/export') ?>" class="dropdown-item">Telecharger la liste</a>
                                <a href="<?= site_url('download') ?>" class="dropdown-item">Telecharger les images</a>                                
                            </div>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Profil</a>
                            <div class="dropdown-menu">
                                <a href="<?= route_to('admin')?>" class="dropdown-item">Deconnexion</a>
                            </div>
                        </li>
                    </ul>               
                </nav>
            </div>
        </div>
    </header>

    <?php $this->renderSection('content');?>

    <section class="dasbord_section">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-12 dasbord_subbox">   
                <div class="right_amountbox">
                    <div class="right_txtbox">
                        <div class="user_box">
                            <h4>Total Inscrit</h4>
                        </div>
                        <h5><?= $count;?></h5>
                    </div>
                    <div class="right_txtbox1">
                        <div class="user_box">
                            <h4>Total Homme</h4>
                        </div>
                        <h5><?= $homme;?></h5>
                    </div>
                    <div class="right_txtbox2">
                        <div class="user_box">
                            <h4>Total Femme</h4>
                        </div>
                        <h5><?= $femme;?></h5>
                    </div>
                    <div class="right_txtbox3">
                        <div class="user_box">
                            <h4>Quotas</h4>
                        </div>
                        <h6>150</h6>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-md-12 col-12">   
                <div class="table_box">                   
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Matricules</th>
                                <th>Noms</th>
                                <th>Prenoms</th>
                                <th>Niveaux d'Etudes</th>
                                <th>Sexes</th>
                                <th>Contacts</th>
                                <th>Langues Parlées</th>
                                <th>Experiences</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($person as $key => $value):?>
                            <tr>
                                <td><?= $value->matricule ;?></td>
                                <td><?= $value->name;?></td>
                                <td><?= $value->last_name;?></td>
                                <td><?= $value->niveau_etude;?></td>
                                <td><?= $value->sexe; ?></td>
                                <td><?= $value->contact1;?></td>
                                <td><?= $value->langue1.'/'.$value->langue2.'/'.$value->langue3;?></td>
                                <td><?= $value->exp_intitule_poste;?></td>
                                <td><?= $value->note;?></td>
                            </tr>                            
                            <?php endforeach;?>                        
                        </tbody>                    
                    </table>
                </div>
            </div>            
        </div>
    </section>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!--owl slider link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

<?php $this->renderSection('script');?>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

</body>

</html>