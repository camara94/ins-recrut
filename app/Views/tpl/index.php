
<?= $this->extend('tpl/tpl') ?>

<?= $this->section('title') ?>
    Online recruitment INS
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="mb-4">
        <div class="card">
            <div class="card-header py-3">
            <h5 class="mb-0 text-center"><strong class="display-6 text-uppercase">LISTE DES candidats</strong></h5>
            </div>
            <div class="card-body">
            <!-- <canvas class="my-4 w-100" id="myChart" height="380"></canvas> -->
            <table class="table table-striped table-hover table-sm" id="tablo">
                <thead class="table-light">
                <tr class="text-uppercase">
                    <th scope="col">#</th>
                    <th scope="col">Matricules</th>
                    <th scope="col">Prenoms</th>
                    <th scope="col">Noms</th>
                    <th scope="col">Niveau d'Etude</th>
                    <th scope="col">Sexes</th>
                    <th scope="col">Contacts</th>
                    <th scope="col">Langues parlées</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Note</th>
                </tr>
                </thead>
                <tbody> <!-- loading --> </tbody>
            </table>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
$(document).ready(function () {

    let tablo = [
        {
        "N°": 1,
        "matricule": "2211B",
        "last_name": "WILLIAMS JOHNSON",
        "name": "TOLNO",
        "date_naiss": "22/12/1999",
        "lieu_naiss": "CONAKRY",
        "lib_sexe": "MASCULIN",
        "niveau_etude": "MAITRISE / MASTER 1 / BAC+4",
        "last_diplome": "AMENAGEMENT ET GESTION DES TERROIRS",
        "email": "williamsjohnsontolno8@gmail.com",
        "contact1": "+224 621-02-86-44",
        "nomtuteurlegal": "NANSIRA KOUROUMA",
        "contact2": "+224 628-68-87-46",
        "nomtuteurlegal2": "KOLY BEAVOGUI",
        "contact3": "+224 621-86-61-62",
        "first_langue_nat": "Français",
        "second_langue_nat": "Soussou",
        "third_langue_nat": "Maninka",
        "type_piece": "cni",
        "numero_cni": "6502687/18",
        "namepere": "RICHARD TOLNO",
        "namemere": "NANSIRA KOUROUMA",
        "ExpCollecte": "OUI",
        "exp_structure": "Fonds de développeme",
        "exp_annee": "2022",
        "exp_intitule_poste": "Agent enquêteur",
        "exp_intitule_projet": "Ciblage des ménages ",
        "date_jour_decla": "02/08/2023",
        "NomDep": "Ratoma",
        "NomSp": "Ratoma",
        "NOTE1": 30,
        "NOTE2": 50,
        "NOTE3": 20,
        "TOTAL": 100
        }
    ];

    tablo = <?= $json_person ?>;
    
    for (let i = 0; i < tablo.length; i++) {
        let note1 = 0;
        let note2 = 0;
        let note3 = 0;
        let niveau_etude = String(tablo[i]['niveau_etude']).trim();
        let exp_collecte = String(tablo[i]['ExpCollecte']).trim();

        let first_langue_nat = typeof tablo[i]['first_langue_nat'] == "string" ? tablo[i]['first_langue_nat'] : "";
        let second_langue_nat = typeof tablo[i]['second_langue_nat'] == "string" ? tablo[i]['second_langue_nat'] : "";
        let third_langue_nat = typeof tablo[i]['third_langue_nat'] == "string" ? tablo[i]['third_langue_nat'] : "";
        
        if(niveau_etude == "MAITRISE / MASTER 1 / BAC+4"){ note1 = 30; }
        else if(niveau_etude == "LICENCE 3 / BAC+3"){ note1 = 25; }
        else{ note1 = 20; }

        if(exp_collecte == "OUI"){ note2 = 50; }
        else{ note2 = 40; }


        if(second_langue_nat != "" && third_langue_nat != ""){
            if(first_langue_nat == second_langue_nat && first_langue_nat == third_langue_nat) note3 = 10;
            else if(first_langue_nat == second_langue_nat && first_langue_nat != third_langue_nat) note3 = 15;
            else if(first_langue_nat == third_langue_nat && first_langue_nat != second_langue_nat) note3 = 15;
            else if(second_langue_nat == third_langue_nat && second_langue_nat != first_langue_nat) note3 = 15;
            else note3 = 20;                
        }
        else if(second_langue_nat != "" && third_langue_nat == ""){
            if(first_langue_nat == second_langue_nat) note3 = 10;
            else note3 = 15;
        }

        else if(second_langue_nat == "" && third_langue_nat != ""){
            if(first_langue_nat == third_langue_nat) note3 = 10;
            else note3 = 15;
        }

        else{
            note3 = 10;
        }          

        $("#tablo tbody").append(
        '<tr>'+
            '<td>'+(i+1)+'</td>'+
            '<td>'+tablo[i]['matricule']+'</td>'+
            '<td>'+tablo[i]['last_name']+'</td>'+
            '<td>'+tablo[i]['name']+'</td>'+
            '<td>'+tablo[i]['niveau_etude']+'</td>'+            
            '<td>'+tablo[i]['sexe']+'</td>'+
            '<td>'+tablo[i]['contact1']+'</td>'+   
            '<td>'+tablo[i]['first_langue_nat']+', '+ tablo[i]['second_langue_nat']+', '+tablo[i]['third_langue_nat']+'</td> '+                                    
            '<td class="text-center">'+tablo[i]['ExpCollecte']+'</td> '+                         
            '<td>'+(note1 + note2 + note3)+'</td> '+               
        '</tr>');
    }    
            
    // '<td>'+note1+' +'+               
    // ' '+note2+' +'+               
    // ' '+note3+' ='+               
    // ' '+(note1 + note2 + note3)+'</td> '+       

    // alert($('#table_recruitement1').html());
    $('#tablo').DataTable({
        "paging": true, // Enable pagination
        "searching": true, // Enable search
        // Other options...
    });

});
</script>
<?= $this->endSection() ?>

