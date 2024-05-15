<div id="home_pg" style="">
	<div>
	<div class="leftContener"> 
		<div style="border-left:3px solid black;padding:10px; font-size:12px;text-align:justify;  background-color: #e5e5e5;">
        L'Institut National de la Statistique (INS) vous souhaite la bienvenue sur le site du recrutement des différentes catégories de personnel de cet important projet pour notre pays.
   		</div>
		<div style="margin:20px 0px; background:#f9e6b7; padding:10px 0;">
			 <a href="<?= url_to('welcome') ?>" style="text-decoration:none"> Il faut cliquer ici
			 <img src="<?php echo base_url('assets/images/new_button.gif'); ?>" width="30" style="float:left; margin-top:-4px" />
			 <span style="font-size:16px; color:black;">Recupérer mon recepissé</span></a>
    	</div>
	</div>

	<div id="home_pg_btn2" style="">
		<a style='' href="<?= url_to('profils');?>"><span>PROFIL</span><br><span>RECHERCHÉ</span></a>
	</div>

		
</div>

<script>
    $(document).ready(function() {
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