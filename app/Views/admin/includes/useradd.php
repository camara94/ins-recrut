
<?= $this->extend('admin/includes/base') ?>

<?= $this->section('title') ?>
    Online recruitment INS
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="" style="min-height:600px">
<h1>
<?php 

    // $phone="624201460";
    // //$phone1=strval()
    // $phone="+224-".substr($phone,0, 3).'-'.substr($phone,3, 2).'-'.substr($phone,5, 2).'-'.substr($phone,7, 2);
    // echo $phone ;
?>
</h1>

    <div class="row">        
        <form action="<?php echo base_url(); ?>index.php/useradd" method="post" class="col-xl-12 col-md-12 col-12">  
            <div class="row">
                <div class="col-5">
                    <h1 class="my-2 text-center text-uppercase">Ajouter un nouvel utilisateur</h1>
                    <?php if(isset($validation)):?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif;?>
                    <div class="form-group mb-3">
                        <input type="text" name="last_name" placeholder="nom" value="<?= set_value('last_name') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="prénom" value="<?= set_value('name') ?>" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="phone" placeholder="phone" value="<?= set_value('phone') ?>" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="email" value="<?= set_value('email') ?>" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="2">Agent</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="password" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="confirm password" class="form-control" />
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-block text-uppercase">Créer Utilisateur</button>
                    </div>
                </div>

                <div class="col-7">
                    <h1 class="my-2 text-center">Choisir les Prefectures</h1>
                    <div class="row row-cols-4">
                        <?php 
                            if(isset($prefectures))
                            foreach ($prefectures as $key => $value):
                        ?>
                        <div class="col">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" name="chPref[]" class="custom-control-input" id="chPref<?= $value['CodDep'] ?>" value="<?= $value['CodDep'] ?>" checked />
                                <label class="custom-control-label" for="chPref<?= $value['CodDep'] ?>"><?= strtoupper($value['NomDep']) ?></label>
                            </div>
                        </div>                  
                        <?php endforeach;?> 
                    </div>
                </div>

            </div>

        </form>            
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function () {
        // $('#example').DataTable();
    });
</script>
<?= $this->endSection() ?>