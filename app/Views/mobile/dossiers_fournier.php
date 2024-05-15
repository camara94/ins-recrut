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
		<div class="display-6 p-2">Dossiers à Fournir</div>
        <div class="div_btn hidden divpf" style="margin-bottom:30px;">  
			<div id="listPieceF" class="taille-norme">
				<div class="row">
					<div class="col-sm-12">
						<p> Liste des pieces à fournir pour les <strong style="font-weight:bold"> AGENTS CARTOGRAPHES et TECHNICIENS DE LABORATOIRE CARTOGRAPHIQUE </strong> </p>
						<ul>
							<li>Photo d'identité;</li> 
							<li>Carte Nationale d'identité (CNI) / Passeport / Attestation d'identité / Carte d'électeur;</li> 
							<li>Curriculum Vitae(CV);</li> 
							<li>Copie du dernier diplôme;</li> 
							<li>Pièce d'identité de la personne à contacter en cas d'urgence;</li> 				
							<!-- <li>Certificat de résidence</li>  -->
							<!-- <li>Certificat médical(datant de moins de trois mois)</li> -->
							<!-- <li>Casier judiciaire</li> -->
						</ul>				
					</div>	
				</div>
				<p class="top-10" style="text-decoration: none; color:red;text-align: justify;"><span style="font-weight: bold;text-decoration: underline">NB</span> : Chaque pièce doit être au format pdf, jpeg ou jpg et avoir une taille de 2Mo au maximum</p>
			</div>
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
