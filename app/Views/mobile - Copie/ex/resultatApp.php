<?= $this->extend('mobile/base') ?>

<?= $this->section('title') ?>
    RGPH4 - Résultat
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<style>
    .tit{ 
        font-family: 'Baloo', sans-serif;   
        /*font-family: 'Baloo Tammudu', sans-serif; */
        /*font-family: 'Cairo', sans-serif; */
        /*font-family: 'Cuprum', sans-serif; */
        /*font-family: 'Lobster', sans-serif; */
        /*font-family: 'Rajdhani', sans-serif; */
    }  


</style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="row py-3">
    <div class="col-sm-4 order-1 order-sm-2">
        <!-- <section class="section-block1 section">
            <div class="display-6">Profils</div>
        </section> -->
        <section class="section-block2 container">
        <?php if($hasExiste == true): ?>
            <div class="row">
                <div class="col-xs-12">
                    <?php $sexe_ac = ""; $title = "M."; if($data['sexe']==2){ $sexe_ac = "e"; $title = "Mme"; } ?>
                    <?php if($data['is_admited'] == 1): ?>
                        <div class="row">
                            <div class="col-xs-12 text-center text-success"> 
                                <h3 class="h1"> <strong>Féliciation</strong> 
                                <?= $title ?> <?= strtoupper($data['last_name']); ?>! <br> vous êtes admis<?= $sexe_ac ?> au poste 
                                <strong><?= ucfirst(strtolower($data['NomProjet'])); ?></strong> </h3> 
                            </div>    
                        </div>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-xs-12 text-center text-danger"> 
                                <h3 class="h1"> <strong>Desolé</strong> <?= $title ?> <?= strtoupper($data['last_name']); ?>! <br> votre candidatrue n'a pas été acceptée </h3> 
                            </div>    
                        </div>                           
                    <?php endif; ?>
                </div>
            </div>
            <div class="top-30 row">
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-xs-5"> <h3 class="h3">Matricule</h3> </div>
                        <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['matricule']); ?> </h3> </div>    
                    </div>

                    <div class="row">
                        <div class="col-xs-5"> <h3 class="h3">Prénom (s)</h3> </div>
                        <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['name']); ?> </h3> </div>    
                    </div>

                    <div class="row">
                        <div class="col-xs-5"> <h3 class="h3">Nom de Famille</h3> </div>
                        <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['last_name']); ?> </h3> </div>    
                    </div>

                    <div class="row">
                        <div class="col-xs-5"> <h3 class="h3">Téléphone</h3> </div>
                        <div class="col-xs-7"> <h3 class="h3"> <?= $data['contact1']; ?> </h3> </div>    
                    </div>

                    <div class="row">
                        <div class="col-xs-5"> <h3 class="h3">Email</h3> </div>
                        <div class="col-xs-7"> <h3 class="h3"> <?= strtolower($data['email']); ?> </h3> </div>    
                    </div>

                    <div class="row">
                        <div class="col-xs-5"> <h3 class="h3">N° Pièce</h3> </div>
                        <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['numero_cni']); ?> </h3> </div>    
                    </div>

                    <div class="row">
                        <div class="col-xs-12 text-center"> 
                        
                        <img src="<?= base_url();?>uploads/files/<?= $data['photo'];?>" alt="Loading..." height="100" width="100"> 
                        </div>    
                    </div>         
                        
                    <div class="form-group">
                        <canvas id="canvasTarget" width="150" height="150"></canvas> 
                    </div>
                </div>
                <div class="col-sm-5">
                    <h1 class="h1 text-center">
                        Veuillez prendre contact avec l'Unité des Ressources Humaines du Bureau Central du Recensement (BCR). <br>
                        <?php if($data['fonction_id'] == 0 && $data['is_admited'] == 1): ?>                        
                            <h1 class="text-danger text-center h2" style="padding:15px;"> <strong>Vous êtes sur la liste d'attente</strong> </h1>						
                        <?php endif; ?>
                        <h3 class="text-center"> <a href="<?= url_to('index'); ?>" class=""> <i class="fa fa-reply"></i> Terminer </a> </h3> 
                    </h1>
                </div>

            </div>
        <?php else: ?>
            <div class="row"> 
                <div class="col-xs-12 text-center text-danger"> 
                    <h3 class="h2"> Votre candidature n'a pas été retrouver, veillez verifier votre coordonnée <br> (matricule, numéro de telephone ou email) </h3> 
                </div>              
            </div>              
            <div class="row"> 
                <div class="col-xs-12 text-center"> 
                    <h3> <a href="<?= url_to('mcheckapp'); ?>" class=""> <i class="fa fa-undo"></i> Reessayez </a> </h3> 
                </div>              
            </div>              
        <?php endif; ?> 
        </section>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">  
    $(document).ready(function(){ 

        

    })    
</script>
<?= $this->endSection() ?>
