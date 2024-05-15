<?php
require_once('views/part_left.php');
?>
 
<div class="rigthContener">
       <div style="margin-bottom:30px;text-decoration:underline; text-align:center; font-size:20px; font-weight:bold">
            SE CONNECTER
        </div>
        <div class="card">
        <div class="card-body">

            <div class="auth-logo">
                <h3 class="text-center">
                    <a href="index.php" class="logo d-block my-4">
                        <img src="<?php echo BASE_URL.'assets/images/logoins.png'; ?>" class="logo-dark mx-auto" height="100" alt="logo-ins">
                        <img src="<?php echo BASE_URL.'assets/images/logoins.png'; ?>" class="logo-light mx-auto" height="100" alt="logo-ins">
                    </a>
                </h3>
            </div>

            <div class="p-3">
                <h4 class="text-muted font-size-18 text-center">Bienvenue !</h4>
                <p class="text-muted text-center">Connectez-vous pour continuer</p>

                <form class="form-horizontal" action="<?php echo BASE_URL.'welcome/login';?>" method="post">

                    <div class="mb-3">
                        <label class="form-label" for="username">Login</label>
                        <input type="email" name="email" class="form-control" id="username" placeholder="Entrer votre login">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="userpassword">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter votre mot de passe ">
                    </div>

                    <div class="mb-3 row">
                        <div class="col-8 text-end">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SOUMETTRE</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
         
 </div>
