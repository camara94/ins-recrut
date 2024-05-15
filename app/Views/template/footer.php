<?php
/**
 * Created by PhpStorm.
 * User: angeeric
 * Date: 10/11/2016
 * Time: 14:41
 */
?>
<!--close div wrapper-->
</div>
<!--close div container -->
</div>
<!--clase div  contener-->
</div>
<!--close div windows-->
</div>



<!-- popup message bienvenue -->
<!--<div id="m_plateforme">
    <div id="pop_up"></div>
    <div id="login_pag_popup">
        <div style="position:relative; margin:0">
            <div class="title_pop_up">BIENVENUE SUR LA PLATEFORME DE RECRUTEMENT EN LIGNE DU RGPH-4 
                <div id="closePopM" style="position:absolute;top:0;right:10px;font-size:30px; color:#c3c3c3; cursor:pointer">x</div>
            </div>
            <div class="l_email" style="margin-top:20px;font-size:20px; color:black;font-weight:bold;padding-bottom:2px;border-left: 2px solid rgba(198, 232, 194, 0.58);border-right: 2px solid rgba(198, 232, 194, 0.58);">
                Pour postuler veuillez cliquer sur le bouton "<span style='color:red'>postuler</span>". 
               <div style="margin-top:30px;">
                    <img src="<?php echo base_url('assets/images/imgPopup.png'); ?>" />
               </div>
            </div>
        </div>

    </div>
</div> -->

<!--- end message -->


<div id="p_u_inscript">
    <div id="pop_up"></div>
    <div id="login_pag_popup">
        <div style="position:relative; margin:0">
            <div class="title_pop_up">RECRUTEMENT EN LIGNE </div>
            <div jsname="paFcre">
                <div class="jXeDnc" jsname="tJHJj" jscontroller="S9352b" jsaction="JIbuQc:pKJJqe(af8ijd);PIbeAb:pKJJqe">
                    <h1 data-a11y-title-piece="" id="headingText" jsname="r4nke">
                        <content>Lire attentivement le message avant de commencer...</content>
                    </h1>
                </div>
            </div>
            <div class="l_email" style="background-color:#ace0b81f; padding-bottom:2px;border-left: 2px solid rgba(198, 232, 194, 0.58);border-right: 2px solid rgba(198, 232, 194, 0.58);">
                    
                <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                    - UN NUMÉRO D'INSCRIPTION SERA G&Eacute;N&Eacute;R&Eacute; A LA FIN DE L'INSCRIPTION. 
                        VEUILLEZ LE NOTER ET LE CONSERVER. 
                </div>
                <!-- <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                    - LE RECEPISSE DOIT ÊTRE IMPRIMÉ ET GARDÉ TOUT AU LONG DE L'OPÉRATION.
                </div> -->
                <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                    - EN CAS D'OUBLI OU DE PERTE DE VOTRE RECEPISSE, VOUS POUVEZ LE RECUPERER SUR LA PAGE D'ACCEUIL A PARTIR DU LIEN 
                    <strong class="text-success">"RECUPERER MON RECEPISSE"</strong>.
                </div>
                <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                          - LA TAILLE DE CHAQUE FICHIER À CHARGER DOIT ÊTRE DE DEUX (2) Mo AU MAXIMUM.
                    </div>
                    <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                           - VEUILLEZ RENSEIGNER DES INFORMATIONS CORRECTES
                    </div>
                   

                    <div>
                        <button id="submitpopupmsg" type="submit" class="btn btn-primary css_btn">J'ai bien lu le message et je m'inscris</button>
                    </div>
            </div>
        </div>

    </div>
</div>


<div class="ec-modal-loading">
    <div class="ec-modal-loading-inner">
        <div class="ec-modal-loading-msg">
            <span>CHARGEMENT DES DONNEES</span>
        </div>
    </div>
</div>

<div id="footerMsg" style="position:fixed;bottom:0px; left:0px;right:15px; background-color:rgba(7, 8, 7,1);height:40px;z-index:3">
  <div style="float:left;background-color:#abc598;; color:white;line-height:40px;font-weight:bold;padding:0 10px;">INFORMATIONS </div>
  <div style="margin-left:150px; height:40px; line-height:40px color:white;margin-right:20px;">
    <marquee style="margin-top:10px;">
       <p style="color:white">
           <!-- <span style="font-size:18px;">Seuls les postes de l'Agent de Collecte de la Cartographie, de Technicien de Laboratoire Cartographique et de Chauffeur sont actuellement ouverts.  </span> -->
           <!-- <span style="font-size:18px;">Seule, la consultation des résultats des Agents de Collecte de la Cartographie et des Techniciens de Laboratoire de Cartographie est actuellement ouverte.</span> -->
           <span style="font-size:25px; font-weight:bold;"> <b>Les candidat(e)s des communes urbaines et sous-préfectures concernées par l'opération pilote sont prioritaires.</b> </span>
       </p>
    </marquee>
  </div>
</div>


<script>
    $(document).ready(function() {
        $('div#closePopM').on('click',function(e){
           $('div#m_plateforme').css('display','none'); 
        })
    });
</script>

</body>
</html>
