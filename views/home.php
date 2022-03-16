<?php
    if(isset($_POST['find'])){
        $data = new FlightsController();
        $flights = $data->findFlights();
    }else{
    $data = new FlightsController();
    $flights = $data->getAllFlights();
    }
    if(isset($_SESSION['role']) && $_SESSION['role'] != 'admin'){
        Redirect::to('homeuser');
    }

    // print_r($flights);
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto" ><h1 class="display-3 text-center text-success font-weight-bold"> MEDAIRLINES</h1></div>
        <!-- scroll  -->
       <div class="col-md-15 mx-auto">
            <?php include('./views/includes/alerts.php'); ?>
            <div class="card">
                <div class="card-body bg-light table-responsive">
                <form method ="POST" class ="float-right mb-2 d-flex flex-row justify-content-between">
                <div>
                        <a href="<?php echo BASE_URL;?>add" class="btn btn-sm btn-primary mr-2 mb-2">
                        <!-- partir a add// -->
                        <i class ="fas fa-plus"></i> 
                        </a>
                        <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class ="fas fa-home"></i> 
                        </a>
                        <a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class ="fas fa-user"><?php echo $_SESSION['username'];?></i> 
                        </a>
                        <a href="<?php echo BASE_URL?>allres" class="btn btn-sm btn-secondary mr-2 mb-2 "> <!--url de base plus la page add -->
                <i class="fas fa-plane">TOUT LES RESERVATIONS</i>
                </a>
                </div>
                            <input type="text" name="search" placeholder="Rechercher">
                            <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
                        </form> 
                        <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Départ</th>
                        <th scope="col">Destination</th>
                        <th scope="col">aller</th>
                        <th scope="col">retour</th>
                        <th scope="col">prix</th>
                        <th scope="col">numéro de place</th>
                        <th scope="col">Statut</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($flights as $flight):?>
                             <tr>
                                <th scope="row"><?php echo $flight['Départ']; ?></th>
                                <td><?php echo $flight['Destination'];?></td>
                                <td><?php echo $flight['aller'];?></td>
                                <td><?php echo $flight['retour'];?></td>
                                <td><?php echo $flight['prix'];?></td>
                                <td><?php echo $flight['numero_de_place'];?></td>
                                <td>
                                    <?php echo $flight['statut']
                                        ?'<span class="badge bg-success">aller simple</span>'
                                        :
                                        '<span class="badge bg-danger">aller retour</span>';
                                ;?></td>
                                <td class="d-flex flex-row">
                                    <form method="POST" class="mr-1" action="update">
                                        <input type="hidden" name="id" value="<?php echo $flight['id'] ;?>">
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                    </form>
                                    <form method="POST" class="mr-3" action="delete">
                                        <input type="hidden" name="id" value="<?php echo $flight['id'] ;?>">
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                             </tr>
                        <?php endforeach;?>
   
                    </tbody>
                    </table>
                </div>
            </div>
       </div>    
    </div>    
</div>