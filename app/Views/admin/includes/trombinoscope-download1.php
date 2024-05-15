
<?= $this->extend('admin/includes/base') ?>

<?= $this->section('title') ?>
    Online recruitment INS
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- pour recupere  la variable prefecture id -->
<?php
    $prefecture_id = (isset($_GET['prefecture_id']) ? intval($_GET['prefecture_id']): 0);
    $project_id = (isset($_GET['project_id']) ? intval($_GET['project_id']): 0);
    $sp_id = (isset($_GET['sp_id']) ? intval($_GET['sp_id']): 0);
    $search = (isset($_GET['search']) ? ($_GET['search']): "");
?>
<section class="dasbord_section">
    <div class="row">

    <form class="col-12 mt-3" action="/trombinoscope/download" method="GET">
            <div class="row">
            <div class="col-3"> <input type="search" name="search" id="search" class="form-control" placeholder="matricule, phone, email, CNI" value="<?= $search ?>" /> </div>
                <div class="col"> 
                    <select name="prefecture_id" id="prefecture_id" class="form-control">
                        <option class="optElem0" value="0">Préfectures</option>
                        <?php foreach ($listDep as $key => $list): ?>
                            <option value="<?= $list['CodDep'] ?>" class="optElem" <?php if($list['CodDep'] == $prefecture_id) echo "selected"; ?> > <?= $list['NomDep'] ?> </option>
                        <?php endforeach;?>  
                    </select>
                </div>

                <div class="col"> 
                    <select name="sp_id" id="sp_id" class="form-control" required>
                        <option class="optElem0" value="0">Sous-Préfectures / Communes</option>
                        <?php foreach ($listSP as $key => $list):?>
                            <option value="<?php echo $list['CodSp'];?>" class="optElem<?= $list['CodDep']?>" <?php if($list['CodSp'] == $sp_id) echo "selected"; ?>> <?php echo $list['NomSp'];?> </option>
                        <?php endforeach;?>  
                    </select>
                </div>
                <div class="col"> 
                    <select name="project_id" id="project_id" class="form-control" required>
                        <option class="optElem0" value="0">Postes</option>
                        <?php foreach ($listProjet as $list):?>
                            <option value="<?= $list['id'] ?>" class="optElem" <?php if($list['id'] == $project_id) echo "selected"; ?> > <?= $list['NomProjet'] ?> </option>
                        <?php endforeach;?>  
                    </select>         
                 </div>
                <div class="col-1 text-right"> <button type="submit" class="btn btn-primary"> <i class="fa fa-search" aria-hidden="true"></i> Trouver</button> </div>
            </div>    
    </form>   

        <div class="col-12 mt-3"> 
            <?php foreach ($person as $key => $value):?>
                <div class="row border-bottom">
                    <div class="col-2 image"> 
                    <?php
                        $image_path = 'uploads/files/'.$value->photo;
                        if(file_exists($image_path)) {
                            echo '<img src="' .base_url($image_path).'" alt="PHOTO ..." class="rounded">';
                        }else {
                            echo'<img src="'.base_url('assets/images/logo-rgph4.jpg').'" alt="PHOTO ..." class="img-flui" class="rounded" />';
                        }
                    ?>                         
                    </div>
                    <div class="col-4">
                    <div class="row mb-1"> <div class="col font-weight-bold"> Matricule </div> <div class="col"> <?= $value->matricule ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Prénoms </div> <div class="col"> <?= $value->name ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Nom </div> <div class="col"> <?= $value->last_name ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Sexe </div> <div class="col"> <?= $value->sexe ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Phone </div> <div class="col"> <?= $value->contact1 ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Email </div> <div class="col"> <?= $value->email ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Pièce </div> <div class="col"> <?= strtoupper($value->type_piece) ?> <?= $value->numero_cni ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Naissance </div> <div class="col"> <?= strtoupper($value->lieu_naiss) ?> - <?= $value->date_naiss ?> </div> </div>
                    </div>
                    <div class="col-4">
                    <div class="row mb-1"> <div class="col font-weight-bold"> Papa </div> <div class="col"> <?= $value->namepere ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Maman </div> <div class="col"> <?= $value->namemere ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Tuteur </div> <div class="col"> <?= $value->nomtuteurlegal ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Contact Tuteur </div> <div class="col"> <?= $value->contact2 ?> </div> </div>
                        <!-- <div class="row mb-1"> <div class="col font-weight-bold"> Statut </div> <div class="col"> <?= $value->status ?> </div> </div> -->
                        <div class="row mb-1"> <div class="col font-weight-bold"> Niveaux d'Etudes </div> <div class="col"> <?= $value->niveau_etude ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Langues Parlées </div> <div class="col"> <?= $value->langue1.'/'.$value->langue2.'/'.$value->langue3 ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Experiences </div> <div class="col"> <?= $value->exp_intitule_poste ?> </div> </div>
                    </div>
                    <div class="col-2">
                        <div class="row mb-1"> 
                            <div class="col"> 
                                <div class="font-weight-bold text-center">
                                    <h4 class="display-6">NOTE</h4> 
                                    <h2 class="display-6 font-weight-bold text-primary"><?= $value->note ?></h2> 
                                </div>                                
                            </div> 
                        </div>                              
                    </div>
                </div>
            <?php endforeach;?>
        </div>            
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    window.print();
    $(document).ready(function () {
        // $('#example').DataTable();
        $("#prefecture_id").change(function(){$idElem=$(this).val(); 
            $("#sp_id").val("0"); $("#sp_id option").hide(); 
            $('#sp_id .optElem'+$idElem+', #sp_id .optElem0').show();
        })
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<style>
    .image img{
        max-width:150px;
        max-height:150px;
    }
</style>
<?= $this->endSection() ?>








































