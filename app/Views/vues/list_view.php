<div class="rigthContener">
    <?php 
        // $active = isset($_GET['test'])? intval($_GET['test']):0; 
        if(strtotime(date("Y-m-d H:i:s")) > strtotime("2024-06-01 08:00:00")){
            $active = 0;
        }else{
            $active = 1;
        }                      
    ?>
    <form style="display:none;" method="post" action="<?= site_url('inscription') ?>">
        <?= csrf_field() ?>
        <h1>Envoyer au la demande</h1>
        <input type="text" name="projet" id="inputSendApp" value="14">
        <input type="submit" name="envoyer" value="envoyer" id="btnSendApp">
    </form>

	<div class="blink form-group top-30" style="margin-top:20px ; margin-bottom :20px; color:red ; text-align:center; font-size:16px; font-weight:bold ; font-family:arial; text-decoration: blink; display:none;"> 
        <span style="font-weight: bold;text-decoration: underline">NB</span> : 
        Si le quorum des 150 candidats est atteint, la plate-forme sera fermée à toute autre candidature. 
    </div>
	
    <?php
	
    if(isset($_POST['type_projet'])){
        $type_projet = $_POST['type_projet'];
        echo '<div style="font-weight:bold;margin-bottom:20px; text-align:left; font-size:20px; background-color: #EFEFEF;padding:10px 0 8px 10px;">Liste des Profils en cours</div>';
    }
    else{
        $type_projet = 1;
       // echo '<div style="font-weight: bold; margin-bottom:20px; text-align:left; font-size:20px;  background-color: #EFEFEF;padding:10px 0 8px 10px;">LISTE DES PROFILS DISPONIBLE</div>';
    }
    ?>
    <?php if(isset($lists)):?>
        <div id="result_search">
            <div class="">
                <table id="tab" class="table display responsive " width="100%" cellspacing="0" >
                    <thead>
                    <tr>
                        <th>Intitul&eacute; du poste</th>
                        <th style="width:50px">Nbr. Place Disponible</th>
                        <!-- <th style="text-align:center">Type de poste</th>                         -->
                        <th>Type d&apos;emploi</th>
                        <th>Niveau d'étude</th>
                        <th>Date Limite Candidature</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody style="font-family:arial">
                        <?php foreach ($lists as $key => $list):?>
                        <tr id="<?php echo $list['id'];?>">
                            <?php  
                                $nbDisponible = $list['nbr_limit'];
                                // foreach ($postulants as $postulant){
                                //     if($postulant['id_projet'] == $list['id']){
                                //         $nbDisponible = $list['nbr_limit'] - $postulant['total'];
                                //     }
                                // }
                            ?>
							<?php if($list['active'] == 1 && $nbDisponible > 0 && $active == 1): ?>
                            <td> <a href="<?= site_url('inscription/'.$list['id']); ?>" class="nameProjet"> <?= $list['NomProjet'] ?> </a> </td>
							<?php else: ?>
							<td> <?php echo $list['NomProjet'];?></td>
							<?php endif; ?>                            
                            <td class="text-center"><?= $nbDisponible ?> </td>
                            <?php if($list['type_projet'] == 1) $type_projet = "Contractuel"; if($list['type_projet']== 2) $type_projet = "Poste Vacant";?>                            
                            <!-- <td class="text-center"><?= $list['titre_poste'] ?></td> -->
                            <td class="text-center"><?= $type_projet ?></td>
                            <td class="text-center"><?= $list['libelle_nivo_minimum'] ?></td>
                            <td class="text-center"><?= $list['Datefin'] ?></td>
							<?php if($list['active'] == 1 && $nbDisponible > 0 && $active == 1): ?>
                            <td class="text-center"><a href="<?= site_url('inscription/'.$list['id']); ?>" class="nameProjet" style="display:block;color:#FFF;text-decoration:none;
                                padding:3px 5px ;border-radius:3px; border-solid black; background-color:#54ABF3;" >Postuler</a>  
                            </td>
							<?php else: ?>
							<td><?php echo "";?></td>
							<?php endif; ?>                                                     
                        </tr>
                        <?php endforeach;?>        
                    </tbody>
                </table>
            </div>
			<div class="clearBoth"></div>
        </div>

        <div id="result_search_smallscreen">
            <div class="">
                <table id="tab" class="table display responsive " width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Liste des postes</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($lists as $list): ?>
                        <tr id="<?php echo $list['id'] ?>">
                            <td>
								<?php if($list['active'] == 1 && $nbDisponible > 0 && $active == 1): ?>
                                <a href="#" class="nameProjet">
                                    <?php echo '<p>'.$list['NomProjet'].'</p>';?>
                                    <?php echo '<p style="text-decoration: none; color:#7c7c7c; font-size:11px">' .$list['titre_poste'].'</p>';?>
                                    <?php echo '<p style="text-decoration: none; color:#4e4e4e; font-size:10px">' .$list['libelle_nivo_minimum'].'</p>';?>
                                </a>
								<?php else: ?>
							    	<?php echo $list['NomProjet'];?>
							    <?php endif; ?>
							</td>
							<?php if($list['active'] == 1 && $nbDisponible > 0 && $active == 1): ?>
                            <td class="text-left"><a href="#" class="nameProjet btn btn-primary">Postuler</a></td>
							<?php else: ?>
							<td><?php echo "";?></td>
							<?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php else:?>
        <div id="result_search" style="text-align:center">Aucun projet en cours</div>
    <?php endif;?>
</div>
<div class="clearBoth"></div>

<script src="<?php echo base_url('assets/js/dataTables.min.js');?>"></script>
<script>
    // $.extend({
    //     // redirectPost: function (location, args) {
    //     redirectPost: function (location, input_name, arg) {
    //     var form = $('<form>', { action: location, method: 'post' });
    //     // $.each(args,
    //     // function (key, value) {
    //     // $(form).append(
    //     //   $('<input>', { type: 'hidden', name: key, value: value })
    //     // );
    //     // });
    //     $(form).append(
    //         $('<input>', { type: 'hidden', name: input_name, value: arg })
    //     );
    //     $(form).appendTo('body').submit();
    //     }
    // });

    $(document).ready(function() {
        $('#tab').DataTable({
            responsive:true,
            iDisplayLength:25,
            language:{
                processing:"Traitement en cours...",
                search:"Rechercher&nbsp;un&nbsp;Projet&nbsp;:",
                lengthMenu:"Afficher _MENU_ &eacute;l&eacute;ments",
                info:"Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:"Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:"(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:"",
                loadingRecords:"Chargement en cours...",
                zeroRecords:"Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:"Aucune donnée disponible dans le tableau",
                paginate:{
                    first:"Premier",
                    previous:"Pr&eacute;c&eacute;dent",
                    next:"Suivant",
                    last:"Dernier"
                },
                aria:{
                    sortAscending:": activer pour trier la colonne par ordre croissant",
                    sortDescending:": activer pour trier la colonne par ordre décroissant"
                }
                
            },
            //"order": [[ 1, "asc" ]],
			"ordering": false,
            "searching": false,
            "paging": false
        });

        // $('#post_vacant').on('click',function(e){
        //     e.preventDefault();
        //     $.redirectPost(BASE_URL, 'type_projet', 2);
        // })

        $('.nameProjet').on('click',function(e){
            e.preventDefault();
            var id_projet = $(this).parents('tr').attr('id');
            // document.getElementById("inputSendApp").value = id_projet;
            // $.redirectPost(BASE_URL+"inscription", 'projet',id_projet);
            // alert(document.getElementById("inputSendApp").innerHTML);
            $("#inputSendApp").val(Number(id_projet));
            $("#btnSendApp").trigger('click');
        })

        // $('.nameProjet').on('click',function(e){
        //     e.preventDefault();
        //     var id_projet = $(this).parents('tr').attr('id');
        //     $.redirectPost(BASE_URL+"inscription", 'projet',id_projet);
        // })

        $("a#obListPF").on('click',function(e){
            e.preventDefault;
            //$('div.obList').css('display','none');
            var parent = $(this).parents('#infoLeft');
            parent.find('.obList').css('display','none');
            parent.find('#listPieceF').show();
        })

        $("a#obListPost").on('click',function(e){
            e.preventDefault;
            //$('div.obList').css('display','none');
            var parent = $(this).parents('#infoLeft');
            parent.find('.obList').css('display','none');
            parent.find('#cPostuler').show();
        })

    });
</script>
