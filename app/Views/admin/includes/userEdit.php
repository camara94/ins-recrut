
<?= $this->extend('admin/includes/base') ?>

<?= $this->section('title') ?>
    Online recruitment INS
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="" style="min-height:600px">
    <div class="row">        
        <form action="<?= base_url('/index.php/user/update/') ?>" method="post" class="col-xl-12 col-md-12 col-12">  
            <div class="row">
                <div class="col-5">
                    <h1 class="my-2 text-center">Modification Utilisateur</h1>
                    <?php if(isset($validation)):?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif;?>
                    <div class="form-group mb-3">
                        <input type="text" name="last_name" placeholder="Nom" value="<?= $user->last_name ?>" class="form-control" >
                        <input type="hidden" name="user_id" value="<?= $user->id ?>" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="prenom" value="<?= $user->name  ?>" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="phone" placeholder="phone" value="<?= $user->phone ?>" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= $user->email ?>" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="2" <?php if($user->user_type == 2) echo "selected"; ?>>Agent</option>
                            <option value="1" <?php if($user->user_type == 1) echo "selected"; ?>>Admin</option>
                        </select>
                    </div>                    
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark btn-block">Modification</button>
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
                                <input type="checkbox" name="chPref[]" class="custom-control-input" id="chPref<?= $value['CodDep'] ?>" value="<?= $value['CodDep'] ?>" <?php if(in_array($value['CodDep'], $userprefectures)) echo" checked"; ?> />
                                <label class="custom-control-label" for="chPref<?= $value['CodDep'] ?>"><?= strtoupper($value['NomDep']) ?></label>
                            </div>
                        </div>                  
                        <?php endforeach;?> 
                    </div>
                </div>

            </div>

        </form>            
    </div>

    <div class="row">
        <form action="<?php echo base_url(); ?>index.php/changePWD" method="post" class="col-xl-12 col-md-12 col-12">  
            <div class="row">
                <div class="col-8"> &nbsp; </div>
                <div class="col-4">
                    <h1 class="my-2 text-center text-uppercase">CHANGEMENT DE MOT DE PASSE</h1>
                    <?php if(isset($validation)):?>
                        <div class="alert alert-warning">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif;?>

                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="password" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="confirm password" class="form-control" />
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-warning btn-block text-uppercase">Changer le mot de passe</button>
                    </div>
                </div>     
                <input type="hidden" name="user_id" value="<?= $user->id ?>" />
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