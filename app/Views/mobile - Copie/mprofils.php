<?= $this->extend('mobile/base') ?>

<?= $this->section('title') ?>
    RGPH4 - Profils
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
        <section class="section-block1 section">
            <div class="display-6">Postes</div>
        </section>

        <section class="section-block2 section">
        <?php $active = isset($_GET['test'])? intval($_GET['test']):0; ?>
        <?php foreach($lists as $list): ?>
                <?php  
                    $nbDisponible = $list['nbr_limit'];
                    // foreach ($postulants as $postulant){
                    //     if($postulant['id_projet'] == $list['id']){
                    //         $nbDisponible = $list['nbr_limit'] - $postulant['total'];
                    //     }
                    // }
                ?>

            <div class="card border border-start-01 border-bottom-01 mt-2">
                <form class="card-body" method="post" action="/index.php/m.inscription" enctype="multipart/form-data">
                    <h5 class="card-title"><b><i class="fa fa-link" aria-hidden="true"></i> <?= $list['NomProjet'] ?></b></h5>
                    <p class="card-text">
                        <div> <span class="fw-bold">Place Disponible :</span> <span class=""> <?= $nbDisponible ?> </span> </div>
                        <div> <span class="fw-bold">Type d'Emploi :</span> <span class=""><?php if($list['type_projet'] == 1) echo"Contractuel"; if($list['type_projet']== 2) echo"Poste Vacant"; ?></span> </div>
                        <div> <span class="fw-bold">Type de Poste :</span> <span class=""><?= $list['titre_poste'] ?></span> </div>
                        <div> <span class="fw-bold">Diplôme Requis :</span> <span class=""><?= $list['libelle_nivo_minimum']?></span> </div>
                        <div> <span class="fw-bold">Date Limite  :</span> <span class=""><?= $list['Datefin'] ?></span> </div>
                    </p>                       
                    <div class="card-foote">
                        <?php if($list['active'] == 1 && $nbDisponible > 0 && $active == 1): ?>
                            <!-- <a href="/m.inscription" class="btn btn-success float-end"><i class="fa fa-edit" aria-hidden="true"></i> Postuler</a> -->
                            <button type="submit" class="btn btn-success float-end"><i class="fa fa-edit" aria-hidden="true"></i> Postuler maintenant</button>
                        <?php endif; ?>
                    </div>

                    <input type="hidden" name="nivo_projet" value="<?= $list['id_nivo_minimum'] ?>">
                    <input type="hidden" name="choix_projet" value="<?= $list['id']?>">
                    <input type="hidden" name="codeProjet" value="<?= $list['Codeprojet']?>">
                    <input type="hidden" name="NomProjet" value="<?= $list['NomProjet']?>">
                    <input type="hidden" name="titre_poste" value="<?= $list['titre_poste']?>">
                </form>
            </div>
        <?php endforeach; ?>
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
