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
    <div class="col-12">
        <h3 class="display-"> A Propos</h3>
        
        <div>
            L'Institut National de la Statistique (INS) vous souhaite la bienvenue sur le site du recrutement des différentes catégories de personnel de 
            cet important projet pour notre pays.
        </div>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">  
    $(document).ready(function(){ 

        

    })    
</script>
<?= $this->endSection() ?>
