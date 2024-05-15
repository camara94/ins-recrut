
<div class="container">
    <div class="row">
        <div class=" col-sm-offset-1 col-sm-5">
            <?php if(isset($_SESSION['statusMsg'])): ?>
                <h1 class="text-danger fw-bold"><?= $_SESSION['statusMsg']; ?></h1>
            <?php endif; ?>

            <h1>Informations</h1>

            <p class="">
                Une erreur est survenue lors de votre inscription assurez-vous que l’un de vos identifiants n’a pas encore été inscrit auparavant sur ce poste 
                (adresse mail, numéro de téléphone ou numéro de votre pièce d’identité)            
                <!-- <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                    <li class="list-group-item">A fourth item</li>
                    <li class="list-group-item">And a fifth one</li>
                </ul> -->
            </p>

        </div>

        <div class="col-sm-5">
            <div class="list-group">  
                <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true"> The current link item </a> -->
                <a href="<?= url_to('index') ?>" class="list-group-item list-group-item-action"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Cliquer ici pour revenir à l'Accueil</a>
                <a href="<?= url_to('recepisse') ?>" class="list-group-item list-group-item-action"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Cliquer ici pour recupérer votre recipissé</a>
                <a href="<?= url_to('checkapp') ?>" class="list-group-item list-group-item-action"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Cliquer ici pour voir votre resultat</a> 
            </div>       
        </div>
    </div>
    
</div>
