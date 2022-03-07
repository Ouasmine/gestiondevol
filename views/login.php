<?php
    if(isset($_POST['submit'])){
        $loginUser = new UsersController();
        $loginUser->auth();
    }
    // print_r($flights);
?>
<div class="container">
    <div class="row my-4">
        <!-- scroll  -->
       <div class="col-md-10 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Connecter</h3>
                </div>
                <div class="card-body bg-light table-responsive">
                        <form method="POST" class="mr-3">   
                        <div class="form-group">
                            <input type="text" name="username" placeholder="Pseudo" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="mot de passe" class="form-control">
                        </div>
                        <button name="submit" class="btn btn-sm btn-primary">Connexion</button>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo BASE_URL;?>register" class="btn btn-link">Inscription</a>
                </div>
            </div>
       </div>    
    </div>    
</div>