<?php
    if(isset($_POST['find'])){
        $data = new FlightsController(); //creat object from the class FlightsController
        $flights = $data->findFlights();
    }else{
        $data = new FlightsController(); //creat object from the class FlightsController
        $flights = $data->getAllFlights();
    }

   


    if(isset($_POST['reserve'])){
        $data = new FlightsController();
        $flights = $data->reserveFlight();
    } 
    $data = new FlightsController();
    $flights = $data->getAllFlights();
    
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
        <h1 class="display-3 text-center text-success font-weight-bold">LES VOLS DISPONIBLES</h1>
        <div class="col-md-15 mt-5 mx-auto">
            <?php include('./views/includes/alerts.php');?>
            <div class="card">
            <div class="card-body bg-light table-responsive">
                   
            <form method ="POST" class ="float-right mb-2 d-flex flex-row justify-content-between">
                         <div>
                         
                        <a href="<?php echo BASE_URL?>" class="btn btn-sm btn-secondary  mr-2 mb-2  "> <!--url de base plus la page add -->
                        <i class="fas fa-home "></i>
                        </a>
                        <a href="<?php echo BASE_URL?>showvols" class="btn btn-warning btn-sm mb-2 mr-2 "> <!--url de base plus la page add -->
                        <i class="fas fa-business-time"></i>
                        </a>
                        <a href="<?php echo BASE_URL?>logout" title="Logout" class="btn link btn-sm mb-2 mr-2 "> <!--url de base plus la page add -->
                        <i class="fas fa-user "><span class="p-2"><?php echo $_SESSION['username'];?></span></i>
                        </a>
                         </div>
                        <div class="ml-auto">
                        <input type="text" name="search" placeholder="Rechercher">
                            <button class="btn btn-info btn-sm" name="find" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                       
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
                                <th scope="row" hidden><?php echo $flight['id'];?></th>
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
                                    <form method="POST"  action="" class="mr-3">
                                        <input type="text" hidden name="id" value="<?php echo $flight['id']; ?>">
                                        <input type="text" hidden name="Depart" value="<?php echo $flight['Départ']; ?>">
                                        <input type="text" hidden name="Destination" value="<?php echo $flight['Destination']; ?>">
                                        <input type="text" hidden name="aller" value="<?php echo $flight['aller']; ?>">
                                        <input type="text" hidden name="retour" value="<?php echo $flight['retour']; ?>">
                                        <input type="text" hidden name="prix" value="<?php echo $flight['prix']; ?>">
                                        <input type="text" hidden name="numero_de_place" value="<?php echo $flight['numero_de_place']; ?>">
                                        <input type="text" hidden name="statut" value="<?php echo $flight['statut']; ?>">
                                        <button class="btn btn-sm btn-success " type="submit" name="reserve" >Réserver</button>
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
