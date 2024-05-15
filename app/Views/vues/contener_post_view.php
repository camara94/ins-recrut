<?php
require_once('views/part_left.php');
?>
 
<div class="rigthContener">
    <?php if(isset($_POST['projet'])):?>
        <?php
            session_start();
            $id_projet = $_POST['projet'];
            $table="recrut_projet";
            $where = "active=1 and id = $id_projet";
            $projet = get_by($table,$where);
     
            $_SESSION['idProjet'] = $id_projet;
            $_SESSION['codeProjet'] = $projet['Codeprojet'];
            $_SESSION['NomProjet'] = $projet['NomProjet'];
            $_SESSION['titre_poste'] = $projet['titre_poste'];
            $_SESSION['id_nivo_minimum'] = $projet['id_nivo_minimum'];
        ?>

        <div style="margin-bottom:30px;text-decoration:underline; text-align:center; font-size:20px; font-weight:bold">
            <?php echo $projet['NomProjet'];?>
        </div>
         <!--information projet-->
        <div style="margin-bottom:15px;font-size:14px; font-weight:bold; ">Intitul&eacute; du Projet : 
                <span style="font-weight:500; font-size:18px; color:black; text-decoration:underline"><?php echo $projet['NomProjet'];?></span>
        </div>
        <div style="margin-bottom:15px;font-size:14px; font-weight:bold;">Titre du Poste : 
                <span style="font-weight:500; font-size:18px; color:black"><?php echo $projet['titre_poste'];?></span>
        </div>
        <div style="margin-bottom:15px;font-size:14px; font-weight:bold;">Dipl&ocirc;me requis : 
                <span style="font-weight:500; font-size:18px; color:black"><?php echo $projet['libelle_nivo_minimum'];?></span>
        </div>
        <div style="margin-bottom:15px;font-size:14px; font-weight:bold;">Date Limite Recrutement : 
                <span style="font-weight:500; font-size:18px;color:black"><?php echo $projet['Datefin'];?></span>
        </div>
 
        <hr>  
        <!--description projet-->
        <div style="margin-bottom:15px;font-size:18px; font-weight:bold">Description</div>
        <div style="text-align:justify">
            <?php echo $projet['description'];?>
        </div>
        <hr>
        <div style="margin-bottom:15px;font-size:18px; font-weight:bold">Mission, Profil et Dossier du Candidat </div>
        <div style="text-align:justify"><?php echo $projet['piece_fourni'];?></div>
        <div id="<?php echo $projet['id'];?>" style="margin:0; margin-top:20px">
            <a id="postuler" href="#" class="btn_postuler" > POSTULERS </a>
        </div>
    <?php else: ?>
         <?php echo "<div id='msgSelectProjet' style='text-align:center;font-weight: bold'><a href='https://rgph.gov.gn'>Veuillez cliquer sur ce lien pour
                 s&eacute;lectionner le profil de votre candidature</a></div>"; ?>
    <?php endif; ?>
</div>

<script>
    $.extend(
        {
//            redirectPost: function (location, args) {
            redirectPost: function (location,input_name,arg) {
                var form = $('<form>', { action: location, method: 'post' });
//                $.each(args,
//                    function (key, value) {
//                        $(form).append(
//                            $('<input>', { type: 'hidden', name: key, value: value })
//                        );
//                    });
                $(form).append(
                    $('<input>', { type: 'hidden', name: input_name, value: arg })
                );
                $(form).appendTo('body').submit();
            }
        });
    $(document).ready(function() {

        $('#postuler').on('click',function(e){
            e.preventDefault();
            var id_projet = $(this).parent().attr('id');
            $.redirectPost(BASE_URL+"application_view.php",'projet',id_projet);
        });

        $('#post_vacant').on('click',function(e){
            e.preventDefault();
            $.redirectPost(BASE_URL,'type_projet',2);
        })


    } );
</script>