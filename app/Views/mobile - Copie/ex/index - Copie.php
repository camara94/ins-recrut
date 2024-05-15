<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="fr"> 
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>RGPH4 - Inscription</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,700&display=swap" rel="stylesheet">
    <!-- MDB -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/mobile/css/mdb.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/mobile/css/style1.css" />
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
  </head>
  <body class="bg-white">  
    <!-- Start your project here-->
    <main>
        <form class="paymentWrap container-fluid" id="frmValPan" method="post" action="#">
            <div class="row py-3">
            <div class="col-sm-4 order-1 order-sm-2">
                <div class="card border border-start-0 border-bottom-0">
                <div class="card-body">
                    <h5 class="card-title"><b><i class="fas fa-user"></i> Informations Personnelles </b></h5>
                    <p class="card-text">

                    <div class="my-2">
                        <div class="form-outline">
                        <input type="text" id="pren" name="pren" class="form-control" required />
                        <label class="form-label" for="pren">Pre&#769;noms *</label>
                        </div>
                    </div>              
                    
                    <div class="my-2">
                        <div class="form-outline">
                        <input type="text" id="nom" name="nom" class="form-control" required />
                        <label class="form-label" for="nom">Nom *</label>
                        </div>
                    </div>              

                    <div class="my-2">
                        <div class="form-outline">
                        <input type="tel" id="tel1" name="tel1" class="form-control" required />
                        <label class="form-label" for="tel1">Te&#769;le&#769;phone *</label>
                        </div>
                    </div>              
                    
                    <div class="my-2">
                        <div class="form-outline">
                        <input type="email" id="email" name="email" class="form-control" />
                        <label class="form-label" for="email">Email</label>
                        </div>
                    </div> 
                    
                    <!-- <div class="d-fle">  
                        <input type="text" class="form-control form-control-lg border-primary border-1 mb-2" placeholder="login" aria-label="Login sur GLOBUS-GN" aria-describedby="basic-addon2">
                        <input type="password" class="form-control form-control-lg border-primary border-1 mb-2" placeholder="password" aria-label="Password sur GLOBUS-GN" aria-describedby="basic-addon2">
                        <div class="w-2"> <button class="btn btn-primary" type="button"> <i class="fas fa-long-arrow-alt-right fa-2x"></i> </button> </div>
                    </div> -->

                    </p>
                </div>
                </div>

                <div class="card border border-start-0 border-top-0 mt-2">
                <div class="card-body">

                    <div class="my-2">
                        <h5 class="card-title"><b><i class="fas fa-truck"></i> Informations Livraison </b></h5>
                    </div>              

                    <div class="my-2">
                        <div class="form-outline">
                        <input type="text" id="adres" name="adres" class="form-control" required />
                        <label class="form-label" for="adres">Adresse de Livraison *</label>
                        </div>
                        <div class="form-text"> 
                        Precisez l'adresse de livraison qui peut e&#770;tre  
                        votre adresse de domicile, du bureau ou autre.
                        </div>
                    </div>              
                    
                    <div class="my-2">
                        <div class="form-outline">
                        <!-- <input type="text" id="nom" class="form-control" /> -->
                        <textarea name="detail" id="detail" class="form-control" rows="5"></textarea>
                        <label class="form-label" for="detail">Details de livraison et commande </label>

                        </div>
                        <label class="form-label" for="detail">Precisez les detail sur votre livraison et commande</label>
                    </div>           




                </div>
                </div>


            </div>
            </div>

        </form>

    </main>

    <!-- start footer -->
    <!-- end footer -->

    <!-- End your project here-->
    <script type="text/javascript" src="<?= base_url() ?>/assets/mobile/js/jquery-1.12.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/mobile/js/jquery.form.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jStorage/0.4.12/jstorage.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="<?= base_url() ?>/assets/mobile/js/mdb.min.js"></script>
    <script type="text/javascript">  
    $(document).ready(function(){ 
    $red={'border':'1px solid #FF0033'}; $ray={'border':'1px solid #DDDDDD'}; $supAn=""; 
    $tab1=$.jStorage.get("tab",[]); $.jStorage.setTTL("tab",10000000000); $tab=[];
    $nbAdd=0; $duree=4000; $durEnt=1000; $durSort=2000; $tab1=$.jStorage.get("tab",[]); $tab=[];
    $(".nbPanier").text($tab1.length); for($i=0;$i<$tab1.length;$i++){ $(".txtQte"+$tab1[$i][0]).val($tab1[$i][1]); }
    $pren=$("#pren"); $nom=$("#nom"); $tel1=$("#tel1"); $tel2=$("#tel2"); $email=$("#email");

    if($tab1.length>0){/* $.jStorage.set("tab",$tab1); $.jStorage.setTTL("tab",10000000000);*/
        $tab2=[]; $tab3=[]; for($i=0;$i<$tab1.length;$i++){$tab2.push($tab1[$i][0]); $tab3.push($tab1[$i][1]);} $j=$tab2.join(','); $j3=$tab3.join(',');
        $(".loadCmd").load('ficBoutique.php',{idRub:"listeVal",liste:$j,liste1:$j3},function(code_html){ /*listEnPanier(); alert(code_html);*/ });
    }
    
    $("#btnTerm").click(function(e){e.preventDefault(); //  cpt  ref     adres    typPay    #frmValPan  .cBtnOpt
        // if(Number($("#idVil").val())<1){$("#idVil").css($red);}else{$("#idVil").css($ray);}
        // ,pren,nom,tel1,tel2,email
        if($tab1.length>0 && $pren.val().length>0 && $nom.val().length>0 && $tel1.val().length>0 /*&& Number($("#idVil").val())>0*/){
            $tab2=[]; $tab3=[]; $tab4=[]; for($i=0;$i<$tab1.length;$i++){$tab2.push($tab1[$i][0]); $tab3.push($tab1[$i][1]); $tab4.push($tab1[$i][2]);}
            $j=$tab2.join(','); $j3=$tab3.join(','); $j4=$tab4.join(','); $("#liste").val($j); $("#liste1").val($j3); $("#liste3").val($j4);
            $('#frmValPan').ajaxForm({url:'ficBoutique.php',
                beforeSubmit: function(){ $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> loading paiement ...'); },
                success: function(code_html,statut){ $t=code_html.split(' '); // alert(code_html);
                    if($t[0]=="reussi"){ $tab1=[];
                        if($t[2]==1 || $t[2]==2){
                            $(".loadCmd1").html('<b class="text-primary"> <i class="fa fa-check"></i> paiement &eacute;ffectu&eacute;s...</b>');
                            $(".block2").fadeOut(300,function(){ $(".block3").fadeIn(300); }); $.jStorage.set("tab",$tab1);
                            $('#frmValPan').resetForm(); window.location="facture.php?page="+$t[4];
                        }
                        else if($t[2]==3 || $t[2]==4){  
                            $("#amount_1").val($t[1]); $("#custom").val($t[3]);
                            $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> paiement en cours chez PayPal pour la validation...');
                            $("#formPayPal input:image").trigger('click');
                        }
                        else if($t[2]==5){  
                            $("#paycard-amount").val($t[1]); $("#order_id").val($t[3]);  
                            $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> paiement en cours chez PayCard pour la validation...');
                            $("#formPayCard input:image").trigger('click');
                        }
                        else{ $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> error de paiement. Veillez actualiser la page'); }
                    }
                    else if($t[0]=="no"){ $(".loadCmd1").html('<i class="fa fa-times"></i> commande annul&eacute;e par faute de stock &eacute;puis&eacute;'); }
                    else if($t[0]=="vilVide"){ $(".loadCmd1").html('<i class="fa fa-alert"></i> la ville de livraison est obligatoire '); }
                    else{ $(".loadCmd1").html('<i class="fa fa-remove-circle"></i> error reseau '); }
                },
                error:function(jqXHR,textStatus,errorThrown){ }
            }).submit();
        }else{ $(".loadCmd1").html('<b class="text-danger"> <i class="fa fa-remove-circle"></i> champs vide non autoris&eacute; ou votre panier est vide</b>'); }
    })

    $("#frmValPan").on('click',".cBtnOpt",function(e){e.preventDefault();
        $("#typ").val($(this).parent().find(":hidden").val()); 
        if(Number($("#typ").val())==3 || Number($("#typ").val())==4 || Number($("#typ").val())==5){ 
            $("#btnTerm").fadeOut(200); 
        }else{ $("#btnTerm").fadeIn(200); }
    })

    $("#btnCont1, #btnPayCard").click(function(e){e.preventDefault(); 
        $("#btnAnn,#btnTerm,#btnCont1").fadeOut(10); $("#btnTerm").trigger('click'); 
    })
    // $("#btnPayCard").click(function(e){e.preventDefault(); $("#btnAnn,#btnTerm,#btnCont1").fadeOut(10); $("#btnTerm").trigger('click'); })

    })    
    </script>
  </body>
</html>
