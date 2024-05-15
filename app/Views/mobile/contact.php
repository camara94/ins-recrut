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
        <div class="display-6">&nbsp; Contacts</div>

        <div class="text-cente p-3">
            <i class="fas fa-phone fa-3x text-primary"></i>
        </div>
        <div class="h3"> <a href="tel:+224 612 12 75 03">+224 612 12 75 03</a> </div>
        <div class="h3"> <a href="tel:+224 612 12 75 03">+224 612 12 75 13</a> </div>
        <div class="h3"> <a href="tel:+224 612 12 75 03">+224 612 12 75 18</a> </div>
        <div class="h3"> <a href="tel:+224 612 12 75 03">+224 612 12 75 39</a> </div>
        <div class="h3"> <a href="tel:+224 612 12 75 03">+224 612 12 75 56</a> </div>            
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">  
    $(document).ready(function(){ 
        

    })    
</script>
<?= $this->endSection() ?>
