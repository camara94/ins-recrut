<div id="home_pg" class="hidden-xs">	
	<div class="row">
		<div class="col-sm-4">
			<div style="border-left:3px solid black;padding:10px; text-align:justify;  background-color: #e5e5e5;">
				L'Institut National de la Statistique (INS) vous souhaite la bienvenue sur le site du recrutement des différentes 
				catégories de personnel de cet important projet pour notre pays.
			</div>
			<div style="margin:12px 0px; background:#f9e6b7; padding:5px 0;">
				<a href="<?= url_to('recepisse') ?>" style="text-decoration:none">
					<img src="<?= base_url('assets/images/new_button.gif') ?>" width="30" style="float:left; margin-top:-4px" />
					<span style="font-size:16px; color:black;">Récupérer mon récépissé</span>
				</a>
			</div>
			<div style="margin:12px 0px; background:#f9e6b7; padding:5px 0; display:none;">
				<a href="<?= url_to('checkapp') ?>" style="text-decoration:none">
					<img src="<?= base_url('assets/images/new_button.gif') ?>" width="30" style="float:left; margin-top:-4px" />
					<span style="font-size:16px; color:black;">Voir mon résultat</span>
				</a>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="row">
				<div class="col-sm-3 divLinksInfos linkpd taille"> <span>POSTES</span><br> <span>A POURVOIR</span> </div>
				<div class="col-sm-3 divLinksInfos linkcp taille"> <span>COMMENT</span><br> <span>POSTULER ?</span> </div>
				<div class="col-sm-3 divLinksInfos linkpf taille"> <span>PIÈCES À </span><br><span>FOURNIR</span> </div>
				<div class="col-sm-3 divLinksInfos taille"> <a href="<?= url_to('profils');?>"><span>POSTULER <br> ICI</span></a> </div>
			</div> 
		</div>
	</div>
	
	<div class="div_btn hidden divcp" style="margin-top:10px; padding:10px;" class="taille-norme">
		<div style="margin:20px 0 10px;font-weight: bold;">Comment Postuler ?</div>
		<div style="padding:10px; font-size:1.35em;text-align:justify;" class="divCmtPostule">
			<p>Pour postuler, il faut : </p>
			<div class="post_vacant" style="border-top:none">
				<p>1- Rassembler toutes les pièces à fournir </p>
			</div>
			<div class="post_vacant">
				<p>2- Scanner chaque pièce au format: pdf, jpeg ou jpg avec une taille de 2Mo maxi</p>
			</div>
			<div class="post_vacant">
				<p>3- Consulter <span style=" font-weight:bold">"Postes à pourvoir"</span></p>
			</div>
			<div class="post_vacant">
			<p>4- Après avoir fait le choix du poste, cliquer sur le lien <span style="color:re;font-weight:bold">"intitul&eacute; du poste"</span> en fonction du type de poste souhait&eacute; ou sur le bouton
				<span style="color:re;font-weight:bold">postuler</span> </p>
			</div>
			
			<div class="post_vacant">
				<p>5- Dans l'onglet <span style="color:re;font-weight:bold">postuler</span>, cliquer sur 
				<span style="color:re;font-weight:bold">intitulé du poste</span> ou sur le bouton <span style="color:re;font-weight:bold">intitulé du poste</span> </p>
			</div>
			<div class="post_vacant">
			<p>6- Renseigner les informations demand&eacute;es. (<span style="color:re;font-weight:bold">NB: les champs (*) sont obligatoires</span>)</p>
			</div>
			<div class="post_vacant">
				<p>7- T&eacute;l&eacute;charger le r&eacute;c&eacute;piss&eacute; g&eacute;n&eacute;r&eacute;</p>
			</div>
		</div>
	</div>

	<div class="div_btn hidden divpf" style="margin-bottom:30px;">  
		<div id="listPieceF" class="taille-norme">
			<div class="row">
				<div class="col-sm-12">
					<p> LISTE DES PIECES A FOURNIR POUR LES<strong style="font-weight:bold"> AGENTS DE COLLECTE ET ASSISTANTS TIC </strong> </p>
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
				<div class="col-sm-6 hidden">
					<p>  Liste des pieces à fournir pour les <strong style="font-weight:bold"> CHAUFFEURS </strong> </p>
					<ul>
						<li>Photo d'identité;</li> 
						<li>Carte Nationale d'identité (CNI) / Passeport / Attestation d'identité / Carte d'électeur;</li> 
						<!-- <li>Curriculum Vitae(CV);</li>  -->
						<li>Copie du permis de conduire;</li> 
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

	<div class="div_btn hidden divpd" style="margin-bottom:30px;">
		<div id="listPieceF" style="">
			<p> <strong>Postes à Pourvoir</strong> </p>
			<ul>

			<?php foreach($lists as $list): ?>
				<li>
					<?php if($list['active'] == 1 && true): ?>
					<a href="/index.php/profildemande/<?= $list['id'] ?>"> <?= $list['NomProjet'] ?> </a>
					<!-- <a href="/index.php/profils"> <?= $list['NomProjet'] ?> </a> -->
					<?php else: ?>
						<?= $list['NomProjet'] ?>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
				<!-- <li>AGENT DE COLLECTE DE LA CARTOGRAPHIE CENSITAIRE</li> 
				<li>TECHNICIEN LABORATOIRE CARTOGRAPHIE; </li> 			 -->
				<!-- <li>AGENT PREPARATEUR</li>  -->
				<!-- <li>ASSISTANT TIC</li>  -->
				<!-- <li>SUPERVISEUR</li>  -->
			</ul>
		</div>
	</div>

	<div>
		<div id="divpartenaire">
			<h4 style="font-family:arial;color:white;font-weight:bold">NOS PARTENAIRES</h4>
		</div>
		<!-- <div  style="display: inline-block; width: 90%; margin-left: 8%; margin-top: 10px;"> -->
		<div  style="display: inline-block; width: 90%; margin-top: 10px; margin-left: 15%; text-align:center;">
			<div class="imgLP"><img src="<?= base_url('assets/images/BM.png') ?>" style="height: 40px; width:50px;" /></div>
			<div class="imgLP"><img src="<?= base_url('assets/images/unfpa.png') ?>" style="height: 40px; width:50px;" /></div>
			<div class="imgLP"><img src="<?= base_url('assets/images/bad.png') ?>" style="height: 40px; width:60px;" /></div>
			<div class="imgLP"><img src="<?= base_url('assets/images/PNUD.png') ?>" style="height: 40px; width:60px;" /></div>
			<div class="imgLP"><img src="<?= base_url('assets/images/unicef.png') ?>" style="height: 40px; width:50px;" /></div>
			<div class="imgLP"><img src="<?= base_url('assets/images/logo-snu2.jpg') ?>" style="height: 40px; width:50px;" /></div>
			<div class="imgLP"><img src="<?= base_url('assets/images/oms.jpg') ?>" style="height: 40px; width:50px;" /></div>
			<div class="imgLP" alt="logo-oim"><img src="<?= base_url('assets/images/logo-oim.png') ?>" style="height: 40px; width:60px;" /></div>
		</div>
	</div>
</div>


<!-- interface pour le mobile -->
<div class="winMobile hidden-md visible-xs">	
	
	<div class="panel-group hidden" id="accordion">
		<div class="panel panel-default">
			<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Comment Postuler ?</a>
			</h4>
			</div>
			<div id="collapse1" class="panel-collapse collapse">
			<div class="panel-body">				
				<div style="padding:10px; font-size:14px;text-align:justify;">
					
						<p>Pour postuler, il faut : </p>
						<div class="post_vacant" style="border-top:none">
							<p>1- Rassembler toutes les pièces à fournir </p>
						</div>
						<div class="post_vacant">
							<p>2- Scanner chaque pièce au format: pdf, jpeg ou jpg avec une taille de 2Mo maxi</p>
						</div>
						<div class="post_vacant">
							<p>3- Consulter <span style=" font-weight:bold">Poste à Pourvoir</span> </p>
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
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Liste des Pièces à Joindre </a>
			</h4>
			</div>
			<div id="collapse2" class="panel-collapse collapse">
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<p> <strong style="font-weight:bold" class="text-warning"> LISTE DES PIECES A FOURNIR POUR LES AGENTS CARTOGRAPHES et TECHNICIENS DE LABORATOIRE  </strong> </p>
						<ol class="list-group">
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Photo d'identité;</li> 
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Carte Nationale d'identité (CNI) / Passeport / Attestation d'identité / Carte d'électeur;</li> 
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Curriculum Vitae(CV);</li> 
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Copie du dernier diplôme;</li> 
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Pièce d'identité de la personne à contacter en cas d'urgence;</li> 				
							<!-- <li>Certificat de résidence</li>  -->
							<!-- <li>Certificat médical(datant de moins de trois mois)</li> -->
							<!-- <li>Casier judiciaire</li> -->
						</ol>				
					</div>
					<div class="col-sm-6">
						<p> <strong style="font-weight:bold" class="text-warning"> LISTE DES PIECES A FOURNIR POUR LES CHAUFFEURS </strong> </p>
						<ol class="list-group">
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Photo d'identité;</li> 
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Carte Nationale d'identité (CNI) / Passeport / Attestation d'identité / Carte d'électeur;</li> 
							<!-- <li>Curriculum Vitae(CV);</li>  -->
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Copie du permis de conduire;</li> 
							<li class="list-group-item"><i class="fa fa-arrow-right"></i> Pièce d'identité de la personne à contacter en cas d'urgence;</li> 				
							<!-- <li>Certificat de résidence</li>  -->
							<!-- <li>Certificat médical(datant de moins de trois mois)</li> -->
							<!-- <li>Casier judiciaire</li> -->
						</ol>			
					</div>
				</div>
				<p class="top-10" style="text-decoration: none; color:red;text-align: justify;"><span style="font-weight: bold;text-decoration: underline">NB</span> : Tous les fichiers doivent être soit au format : pdf, jpeg ou jpg avec une taille de 2Mo maxi</p>		
			</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Postes Demandés</a>
			</h4>
			</div>
			<div id="collapse3" class="panel-collapse collapse">
			<div class="panel-body">			
				<ul style="line-height:23px;">
					<?php foreach($lists as $list): ?>
					<li>
						<?php if($list['active'] == 1 && true): ?>
						<!-- <a href="/index.php/profildemande/<?= $list['id'] ?>"> <?= $list['NomProjet'] ?> </a> -->
						<a href="/index.php/m.profils"> <?= $list['NomProjet'] ?> </a>
						<?php else: ?>
							<?= $list['NomProjet'] ?>
						<?php endif; ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			</div>
		</div>
	</div>

	<div class="text-center">
		<a class="btn btn-lg btn-primary" href="index.php/m.profils"><span>Postuler maintenant!</span></a>
		<br> <br>
		<a class="btn btn-lg btn-default hide" href="<?= url_to('mcheckapp'); ?>"><span> <i class="fa fa-arrow-right"></i> Consulter Votre Résultat et Salle</span></a>
	</div>

	<div class="list-group hidden" style="margin-top:30px;">
		<a href="<?= url_to('mcheckapp'); ?>" class="list-group-item">
			<h4 class="list-group-item-heading">Consulter Votre Résultat</h4>
			<p class="list-group-item-text"> <i class="fa fa-arrow-right"></i> Cliquez ici pour consulter votre résultat</p>
		</a>
		<a href="<?= url_to('mrecepisse'); ?>" class="list-group-item">
			<h4 class="list-group-item-heading">Récupérer mon récépissé</h4>
			<p class="list-group-item-text"> <i class="fa fa-arrow-right"></i> Cliquez ici pour recupérer mon recepissé</p>
		</a>
		<!-- <a href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Third List Group Item Heading</h4>
			<p class="list-group-item-text">List Group Item Text</p>
		</a> -->
	</div>

</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
		$('#m_plateforme').css('display','none');
		//  $('div#home_pg_btn1').on('click',function(e){
		// 	 $('div#div_btn2').addClass('hidden');
		// 	 $('div#div_btn1').removeClass('hidden');
		//  });

		//  $('div#home_pg_btn3').on('click',function(e){
		// 	 $('div#div_btn2').removeClass('hidden');
		// 	 $('div#div_btn1').addClass('hidden');
		//  });

		// divpd  divpf divcp  linkcp linkpd
		$('.linkpf').on('click',function(e){
			$('.divpf').removeClass('hidden');
			$('.divpd, .divcp').addClass('hidden');
		});

		$('.linkcp').on('click',function(e){
			$('.divcp').removeClass('hidden');
			$('.divpd, .divpf').addClass('hidden');
		});

		$('.linkpd').on('click',function(e){
			$('.divpd').removeClass('hidden');
			$('.divcp, .divpf').addClass('hidden');
		});
	});
</script>