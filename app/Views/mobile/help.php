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
        <section class="section-block1 section">
            <div class="display-6">Comment Postuler ?</div>
        </section>
		
		<p>Pour postuler, il faut : </p>
		<div class="post_vacant" style="border-top:none">
			<p>1- Rassembler toutes les pièces à fournir </p>
		</div>
		<div class="post_vacant">
			<p>2- Scanner chaque pièce au format: pdf, jpeg ou jpg avec une taille de 2Mo maxi</p>
		</div>
		<div class="post_vacant">
			<p>3- Consulter le poste demandé</p>
		</div>
		<div class="post_vacant">
		<p>4- Après avoir fait le choix du poste cliquer sur le lien <span style="color:re;font-weight:bold">"intitul&eacute; du poste"</span> en fonction du type de poste souhait&eacute; ou sur le bouton
				<span style="color:re;font-weight:bold">postuler</span> correspondant</p>
		</div>
		
		<div class="post_vacant">
			<p>5- Dans l'onglet postuler cliquer sur l'intitulé du poste ou sur le bouton postuler correspondant</p>
		</div>
		<div class="post_vacant">
		<p>6- Renseigner les informations demand&eacute;es. (<span style="color:re;font-weight:bold">NB: les champs (*) sont obligatoires</span>)</p>
		</div>
		<div class="post_vacant">
			<p>7- T&eacute;l&eacute;charger et imprimer le r&eacute;c&eacute;piss&eacute; g&eacute;n&eacute;r&eacute;</p>
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
