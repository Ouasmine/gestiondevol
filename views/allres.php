<?php


if($_SESSION['role'] == 0){
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
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <h1 class="display-3 text-center font-weight-bold text-danger">All Reservations</h1>
        </div>
        <div class="col-md-15 mt-5 mx-auto ">
            <?php include('./views/includes/alerts.php');?>
            <!-- <div class="card "> -->
                <div class="card-body bg-dark ">
                <a href="<?php echo BASE_URL;?>home" class="btn btn-sm btn-secondary mr-2 mb-2">
                <i class="fas fa-home"></i>
                </a>
                <a href="<?php echo BASE_URL;?>logout" title= "Déconnexion" class="btn btn-sm btn-secondary bg-info mr-2 mb-2 float-right mb-2 d-flex flex-row">
                <i class="fas fa-user mr-2">  <?php echo $_SESSION['username'];?></i>
                </a>
                <table class="table table-striped table-hover table-dark table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">Reservation ID</th>
                            <th scope="col">Depart</th>
                            <th scope="col">Destination</th>
                            <th scope="col">aller</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Flight ID</th>
                            <th scope="col">statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($flights as $flight):?>
                                    <td><?php echo $flight['id']; ?></td>
                                    <th><?php echo $flight['Depart']; ?></th>
                                    <td><?php echo $flight['Destination']; ?></td>
                                    <td><?php echo $flight['aller']; ?></td>
                                    <td><?php echo $flight['fullname']; ?></td>
                                    <td><?php echo $flight['id_vol']; ?></td>
                                    <td><?php echo $flight['flight_type']
                                        ?
                                        '<span class="badge badge-warning">One way</span>'
                                        :
                                        '<span class="badge badge-info">Round trip</span>';
                                    ; ?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>

