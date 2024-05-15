
<?= $this->extend('admin/includes/base') ?>

<?= $this->section('title') ?>
    Online recruitment INS
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
    $prefecture_id = (isset($_GET['prefecture_id']) ? intval($_GET['prefecture_id']): 0);
    $project_id = (isset($_GET['project_id']) ? intval($_GET['project_id']): 0);
    $sp_id = (isset($_GET['sp_id']) ? intval($_GET['sp_id']): 0);
    $search = (isset($_GET['search']) ? ($_GET['search']): "");

?>
<section class="dasbord_section">
    <div class="row">

        <div class="col-xl-12 col-md-12 col-12 dasbord_subbox">   
            <div class="right_amountbox">
                <div class="right_txtbox">
                    <div class="user_box">
                        <h4>Total Inscrit</h4>
                    </div>
                    <h5><?= $inscrit ?></h5>
                </div>
                <div class="right_txtbox1">
                    <div class="user_box">
                        <?php if($admin == 1) $menuLib = "Total Affecté aux Agents"; else  $menuLib = "Total Affecté à l'Agent";?>
                        <h4> <?= $menuLib ?> </h4>
                    </div>
                    <h5><?= $affecteAgents ?></h5>
                </div>
                <div class="right_txtbox2">
                    <div class="user_box">
                        <?php if($admin == 1) $menuLib = "Total Traité par les Agents"; else  $menuLib = "Total Traité par l'Agent";?>
                        <h4> <?= $menuLib ?> </h4>
                    </div>
                    <h5><?= $traiteAgents ?> / <?= $affecteAgents ?></h5>
                </div>
                <div class="right_txtbox3">
                    <div class="user_box">
                        <h4>Total non Traité </h4> 
                    </div>
                    <h6> <?= $nonTraite + ($affecteAgents - $traiteAgents) ?>  
                        <?php  if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1){ ?>
                            <!-- <a class="float-right" href="<?= site_url('postulant/depouille/affectation/')?>">cliquer ici pour affecter  </a> -->
                            <a class="float-right" href="<?= site_url('affectations/')?>">cliquer ici pour affecter  </a>
                        <?php } ?>                        
                    </h6>
                </div>
                
            </div>
        </div>

        <div class="col-xl-12 col-md-12 col-12"> 
            <form class="col-12 mt-3" action="/index.php/postulant/agentsaffecte/" method="GET">
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
                        <select name="sp_id" id="sp_id" class="form-control">
                            <option class="optElem0" value="0">Sous-Préfectures / Communes</option>
                            <?php foreach ($listSP as $key => $list):?>
                                <option value="<?php echo $list['CodSp'];?>" class="optElem<?= $list['CodDep']?>" <?php if($list['CodSp'] == $sp_id) echo "selected"; ?>> <?php echo $list['NomSp'];?> </option>
                            <?php endforeach;?>  
                        </select>
                    </div>
                    <div class="col"> 
                        <select name="project_id" id="project_id" class="form-control">
                            <option class="optElem0" value="0">Postes</option>
                            <?php foreach ($listProjet as $list):?>
                                <option value="<?= $list['id'] ?>" class="optElem" <?php if($list['id'] == $project_id) echo "selected"; ?> > <?= $list['NomProjet'] ?> </option>
                            <?php endforeach;?>  
                        </select>         
                    </div>

                    <div class="col"> 
                        <select name="user_id" id="user_id" class="form-control">
                            <option value="0">Agents</option>
                            <?php foreach ($users as $user):?>
                                <option value="<?= $user->id ?>"> <?= strtoupper($user->name) ?> <?= strtoupper($user->last_name) ?> (<?= $user->phone ?> )</option>
                            <?php endforeach;?>
                        </select>         
                    </div>

                    <div class="col-1 text-right">
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="checkDepouille" name="checkDepouille">
                            <label class="form-check-label" for="checkDepouille"> Depouillé </label>
                        </div> -->
                        <select name="checkDepouille" id="checkDepouille" class="form-control">
                            <option value="0">Select</option>
                            <option value="1">Depouillés</option>                      
                            <option value="2">Non Depouillés</option>                      
                        </select> 
                    </div>
                    <div class="col-1 text-right"> <button type="submit" class="btn btn-primary"> <i class="fa fa-search" aria-hidden="true"></i> Trouver</button> </div>
                </div>    
            </form>    
            
            <div class="table_box">                              
                <table id="example" class="table table-striped table-bordered" style="width:100%">                
                    <thead>
                        <tr>
                            <th>MATRICULES</th>
                            <th>NOMS</th>
                            <th>PRENOMS</th>
                            <th>NOTES</th>
                            <th>AGENTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php // var_dump($person); ?>
                        <?php foreach ($person as $key => $value): $j = 0; ?>
                        <tr>
                            <td> <a class="font-weight-bold" href="<?= base_url("index.php/postulant/depouille/".$value->id) ?>"> <?= $value->matricule ?> </a> </td>
                            <td><?= $value->name ?></td>
                            <td><?= $value->last_name ?></td>
                            <td> <?= $value->note_depoullement ?> </td>       
                            <td><?= $value->user_name ?> - <?= $value->user_last_name ?></td>
                        </tr>                            
                        <?php endforeach;?>                        
                    </tbody>                    
                </table>
            </div>
        </div>            
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function () {
        $('#example').DataTable();

        $("#prefecture_id").change(function(){$idElem=$(this).val(); 
            $("#sp_id").val("0"); $("#sp_id option").hide(); 
            $('#sp_id .optElem'+$idElem+', #sp_id .optElem0').show();
        })
    });
</script>
<?= $this->endSection() ?>








































