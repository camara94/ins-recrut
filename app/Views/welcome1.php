<div id="home_pg" style="">
	<div class="text-cente hidden-lg visible-xs col-sm-12" style="padding-bottom:25px">
	<!-- <a href="<?= url_to('checkapp'); ?>" class="btn btn-lg btn-primary"> <span>Voir mon résultat</span> </a> -->
	<a style="font-size:28px;" href="<?= url_to('checkapp'); ?>"> <span> <i class="fa fa-arrow-right"></i> Cliquez ici pour consulter votre résultat</span> </a>
	</div>

	<div>
		<div class="leftContener">
			<div style="border-left:3px solid black;padding:10px; font-size:12px;text-align:justify;  background-color: #e5e5e5;">
			L'Institut National de la Statistique (INS) vous souhaite la bienvenue sur le site du recrutement des différentes catégories de personnel de cet important projet pour notre pays.
			</div>
			<div style="margin:12px 0px; background:#f9e6b7; padding:5px 0;">
				<a href="<?= url_to('recepisse'); ?>" style="text-decoration:none">
					<img src="<?php echo base_url('assets/images/new_button.gif'); ?>" width="30" style="float:left; margin-top:-4px" />
					<span style="font-size:16px; color:black;">Recupérer mon recepissé</span>
				</a>
			</div>
			<div style="margin:12px 0px; background:#f9e6b7; padding:5px 0;">
				<a href="<?= url_to('checkapp'); ?>" style="text-decoration:none">
					<img src="<?php echo base_url('assets/images/new_button.gif'); ?>" width="30" style="float:left; margin-top:-4px" />
					<span style="font-size:16px; color:black;">Voir mon résultat</span>
				</a>
			</div>
		</div>
			
		<div id="home_pg_btn3"><span>PIÈCES À </span><br><span>FOURNIR</span></div>
		<div id="home_pg_btn1"><span>COMMENT</span><br> <span>POSTULER ?</span></div>
		<div id="home_pg_btn6"><span>PROFILS</span><br> <span>DEMANDES</span></div>
		<div id="home_pg_btn2" style="float:left;"> <a style='' href="<?= url_to('profils');?>"><span>POSTULER</span></a> </div>
		<div style="clear:both"></div>


		
	</div>
	<div id="div_btn1" class="div_btn hidden" style="margin-top:10px;background-color:white; padding:10px;">
		  <div style="margin:20px 0 10px;font-weight: bold;">Comment postuler ?</div>
		  <div style="padding:10px; font-size:14px;text-align:justify;">
				<p>Pour postuler, il faut : </p>
				<div class="post_vacant" style="border-top:none">
				<p>1- Cliquez sur <span style="color:red;font-weight:bold">l'intitul&eacute; du profil</span> en fonction du type de poste souhait&eacute; ou sur le bouton
					 <span style="color:red;font-weight:bold">postuler</span> correspondant</p>
				</div>
				<div class="post_vacant">
				<p>2- Renseigner les informations demand&eacute;es. (<span style="color:red;font-weight:bold">NB: les champs (*) sont obligatoires</span>)</p>
				</div>
				<div class="post_vacant">
				<p>3- T&eacute;l&eacute;charger et imprimer le r&eacute;c&eacute;piss&eacute; g&eacute;n&eacute;r&eacute;</p>
				</div>
		  </div>
	</div>
	<div id="div_btn2" class="div_btn hidden" style="margin-bottom:30px;">
		<div id="listPieceF" style=" ">
			<p>Liste des Pièces à Joindre</p>
			<ul>
				<li>Photo d'identité;</li> 
				<li>Carte Nationale d'identité (CNI) / Passeport / Attestation d'identité / Permis;</li> 
				<li>Curriculum Vitae(CV);</li> 
				<li>Copie du dernier diplôme;</li> 
				<li>Pièce d'identité de la personne garante;</li> 				
				<li>Certificat de résidence</li> 
				<li>Certificat médical</li>
				<li>Casier judiciaire</li>
			</ul>
			<p class="top-10" style="text-decoration: none; color:red;text-align: justify;"><span style="font-weight: bold;text-decoration: underline">NB</span> : Tous les fichiers doivent être soit au format : pdf, jpeg ou jpg avec une taille de 2Mo maxi</p>
		</div>
	</div>
	<div>
		<div id="divpartenaire">
			<h4 style="font-family:arial;color:white;font-weight:bold">NOS PARTENAIRES</h4>
		</div>
		<div id="logoPartenaire">
			<div class="imgLP"><img src="<?php echo base_url('assets/images/BM.png');?>"></div>
			<div class="imgLP"><img src="<?php echo base_url('assets/images/unfpa.png');?>"></div>
			<div class="imgLP"><img src="<?php echo base_url('assets/images/bad.png');?>"></div>
			<div class="imgLP"><img src="<?php echo base_url('assets/images/PNUD.png');?>"></div>
			<div class="imgLP"><img src="<?php echo base_url('assets/images/unicef.png');?>"></div>
			<div class="imgLP" alt="logo-oim"><img src="<?php echo base_url('assets/images/logo-oim.png');?>"></div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function(){
		 $('#m_plateforme').css('display','none');
		 $('div#home_pg_btn1').on('click',function(e){
			 $('div#div_btn2').addClass('hidden');
			 $('div#div_btn1').removeClass('hidden');
		 });
		 $('div#home_pg_btn3').on('click',function(e){
			 $('div#div_btn2').removeClass('hidden');
			 $('div#div_btn1').addClass('hidden');
		 });
	});
</script>