<?= $this->extend('mobile/base') ?>

<?= $this->section('title') ?>
    RGPH4 - Recepissé
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
    <div class="offset-sm-4 col-sm-4">
        <section class="section-block1 section">
            <div class="display-6 p-2">Vérification du Résultat</div>
        </section>

        <section class="section-block2 section">
            <form class="" method="post" action="/index.php/mgetcheckapp" enctype="multipart/form-data">
                <div class="my-2 p-2">
                    <div class="form-outline">
                    <input type="text" id="searchapp" name="searchapp" class="form-control" required />
                    <label class="form-label" for="searchapp"> Saisissez Matricule / Phone / Email *</label>
                    </div>
                </div>        

                <div class="my-3 text-center p-2">
                    <button class="btn btn-sm1 btn-success" type="submit" name="formSubmitUpRecep"> <i class="fa fa-search"></i> Vérifier</button>                                      
                </div>
            </form>                
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
