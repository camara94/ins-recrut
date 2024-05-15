
  <?php /* $this->extend('admin/includes/template'); */ ?>
  <?php /* $this->section('admin_content') */ ?>  
    <div class="right_box">
    
        <div class="right_amountbox">
            <div class="right_txtbox">
                <div class="user_box">
                    <h4>Total Inscrit</h4>
                </div>
                <h5><?= $count;?></h5>
            </div>
            <div class="right_txtbox1">
                <div class="user_box">
                    <h4>Total Homme</h4>
                </div>
                <h5><?= $homme;?></h5>
            </div>
            <div class="right_txtbox2">
                <div class="user_box">
                    <h4>Total Femme</h4>
                </div>
                <h5><?= $femme;?></h5>
            </div>
            <div class="right_txtbox3">
                <div class="user_box">
                    <h4>Quotas</h4>
                </div>
                <h6>150</h6>
            </div>
        </div>
    
        <div class="table_box">
        <a href="<?= site_url('postulants/export') ?>" class="btn btn-success">Télécharger la Liste</a>
        <a href="<?= site_url('download') ?>" class="btn btn-success">Télécharger les Images</a>

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenoms</th>
                    <th>Niveau d'etude</th>
                    <th>sexe</th>
                    <th>Contact</th>
                    <th>Langues parlées</th>
                    <th>Experience</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($person as $key => $value):?>
                <tr>
                    <td><?= $value->matricule ;?></td>
                    <td><?= $value->name;?></td>
                    <td><?= $value->last_name;?></td>
                    <td><?= $value->niveau_etude;?></td>

                    <td><?= $value->sexe; ?></td>
                    <td><?= $value->contact1;?></td>
                    <td><?= $value->langue1.'/'.$value->langue2.'/'.$value->langue3;?></td>
                    <td><?= $value->exp_intitule_poste;?></td>
                    <td><?= $value->note;?></td>
                </tr>
                
                <?php endforeach;?>
            
            </tbody>
        
        </table>
        </div>
    </div>

                   
              

<?php $this->section('script')?>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<?php $this->endSection();?>