<?php


if($_SESSION['role'] == 'admin'){
    Redirect::to(BASE_URL); }
        
    if(isset($_POST['reserve'])){
        $data = new FlightsController();
        $flights = $data->reserveFlight();
    }else{
        $data = new FlightsController();
        $flights = $data->getAllreservations();
    }
?>


<div class ="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
            <h1 class="display-3 text-center text-success font-weight-bold">VOS RESERVATIONS</h1>
        </div>
        <div class="col-md-15 mt-5 mx-auto ">
            <?php include('./views/includes/alerts.php');?>
            <div class="card ">
            <div class="card-body bg-light table-responsive">
                
                
                <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                <i class="fas fa-home"></i>
                </a>
                <a href="<?php echo BASE_URL?>logout" title="Logout" class="btn link btn-sm mb-2 mr-2 ">
                <i class="fas fa-user mr-2">  <?php echo $_SESSION['username'];?></i>
                </a>
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
                              
                                <th><?php echo $flight['Depart']; ?></th>
                                
                                <th><?php echo $flight['Destination']; ?></th>
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
                                    <form method="post" class="mr-2" action="addpassenger">
                                    <input type="hidden" name="id" value="<?php echo $flight['id']; ?>">
                                    <button class="btn btn btn-success"><i class="fa fa-users"></i> <i class="fa fa-plus"></i></button>
                                    </form>
                                    
                                    <form method="POST"  action="deleterev" class="mr-2">
                                    <input type="hidden" name="iddelete" value="<?php echo $flight['id'];?>">
                                    <button class="btn btn btn-danger"><i class="fa fa-trash la la-trash"></i></button>
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

