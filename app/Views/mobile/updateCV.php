<?= $this->extend('mobile/base') ?>

<?= $this->section('title') ?>
    RGPH4 - Telechargement CV
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
<form class="paymentWrap container" id="frmRegister" method="post" action="/index.php/postulant/updatecv/" enctype="multipart/form-data">

    <div class="row py-3">
        <div class="col-sm-4 order-1 order-sm-2">

            <section class="section-block1">
                <div class="row">
                    <div class="col">
                        <div class="display-6 text-center fw-bold">Téléchargement CV</div>
                    </div>
                </div>
            </section>

            <?php if(!isset($status)){?>
            <div class="card border mt-2">
                <div class="card-body">
                    <!-- <h5 class="card-title"><b> <i class="fa fa-paperclip" aria-hidden="true"></i> Pièces à Joindre </b></h5> -->
                    <p class="card-text">
                        <div class="my-2">
                            <h3> <?= $postulant['matricule'] ?> </h3>
                            <h3> <?= strtoupper($postulant['name']) ?> <?= strtoupper($postulant['last_name']) ?> </h3>
                            <h3> <?= $postulant['contact1'] ?> </h3>
                        </div>                     
                    
                        <div class="my-2">
                            <label class="form-label fw-bold" for="email">Saisissez votre Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="email" required />
                            <div class="text-muted fw-bold1 py-2">
                                Votre adresse email que vous avez utilisé pour postuler au RGPH-4
                            </div>
                        </div>            

                        <div class="my-2">
                            <label for="cv" class="form-label fw-bold">Joindre Curriculum Vitae </label>
                            <input class="form-control form-control-lg1" id="cv" name="cv" type="file" required />
                            <div class="text-danger fw-bold py-2">
                                Taille Maxi 2Mo en jpeg, png, jpg, pdf
                            </div>
                        </div>                    
                    </p>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="uuid" value="<?= $uuid ?>" required />
                    <button class="btn btn-primary w-100" type="submit"> <i class="fa fa-paperclip" aria-hidden="true"></i> Envoyer le CV</button>
                </div>
            </div>

            <?php }else{?>
                <h2 class="text-success fw-bold display-6 text-center py-3">Votre CV a été mise à jour</h2>

                <div class="text-center">
                    <a href="/" class="btn-link">Terminer</a>
                </div>

            <?php } ?>            

        </div>
    </div>
</form>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">  
    $(document).ready(function(){ 

        

    })    
</script>
<?= $this->endSection() ?>
