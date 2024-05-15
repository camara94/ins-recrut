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
            <div class="display-6 p-2">Recupération du Recepissé</div>
        </section>

        <section class="section-block2 section">
            <form class="" method="post" action="/index.php/mgetrecepisse" enctype="multipart/form-data">
                <div class="my-2 p-2">  
                    <label for="id_projet" class="form-label">Choisissez un Poste </label>
                    <select class="select" name="id_projet" id="id_projet" required> 
                        <option value="0">Choisissez un Poste</option>
                        <?php 
                            foreach($lists as $list){
                                echo'<option value="'.$list['id'].'">'.$list['NomProjet'].'</option>';
                            }
                        ?>
                    </select>                                      
                </div> 

                <div class="my-2 p-2">
                    <div class="form-outline">
                    <input type="text" id="contact_1x" name="contact_1x" class="form-control" required />
                    <label class="form-label" for="name_postulant"> Saisissez Matricule/Phone/Email *</label>
                    </div>
                </div>        

                <div class="my-2 p-2">
                    <?php if(isset($_SESSION['errorRecepisse'])){ ?>   
                        <h2 class="text-danger text-center text-bold"> Votre inscription est introuvable </h2>
                    <?php }?>
                </div>        

                <div class="my-3 text-center p-2">
                    <button class="btn btn-sm1 btn-success" type="submit" name="formSubmitUpRecep"> <i class="fa fa-search"></i> Récupérer</button>                                      
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
