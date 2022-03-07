<?php
        
        if (isset($_POST['addpass'])) {
            $addPassenger = new FlightsController();
            $addPassenger->addPassenger();
        }
    
?>


<div class ="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <h1 class="display-3 text-center text-success font-weight-bold">Ajouter un autre client</h1>
        </div>
        <div class="col-md-15 mt-15 mx-auto">
            <?php include('./views/includes/alerts.php');?>
            <!-- <div class="card "> -->
            <div class="card-body bg-light table-responsive">
                <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                <i class="fas fa-home"></i>
                </a>
                <a href="<?php echo BASE_URL;?>logout" title= "Déconnexion" class="btn btn-sm btn-secondary bg-info mr-2 mb-2 float-right mb-2 d-flex flex-row">
                <i class="fas fa-user mr-2">  <?php echo $_SESSION['username'];?></i>
                </a><hr>
                
                            <div class="form-group">
                                <label class="text-black" for="fname">S'il vous plait entrer votre nom et la date de naissance</label>
                                <form method="post">
                                    <input type="text" hidden name="user_id">
                                    <input type="text" hidden  name="reservation_id">
                                    <!-- <label for="fullname">Fullname</label> -->
                                    <input type="text"  name="fullname" placeholder="fullname">
                                    <!-- <label for="birthday">Birthday</label> -->
                                    <input type="datetime-local" name="birthday" >
                                    <button type="submit" class="btn btn-primary mt-3" name="addpass">Ajouter un passager au vol</button>
                                </form>

                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

