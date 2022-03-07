<?php
    // appel de la fct de modifier
    if ( isset($_POST['id'])){
    $exitflight = new FlightsController();
    $flight = $exitflight->GetOneFlight();
    // print_r($flights);
    }else{
        Redirect::to('home');
    }
    if ( isset($_POST['submit'])){
        $exitflight = new FlightsController();
        $exitflight->updateFlightS();
        // print_r($flights);
        }
?>
<div class="container">
    <div class="row my-4">
        <!-- scroll  -->
       <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Modfier un vol</div>
                <div class="card-body bg-light table-responsive">
                    <!-- partir a add// -->
                        <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class ="fas fa-home"></i> 
                        </a>
                       <form method="POST">
                           <div class="form-group">
                                <label for="Départ">Départ*</label>
                                <input type="text" name="Départ"class="form-control" placeholder="ville" value="<?php echo $flight->Départ;?>">
                           </div>
                           <div class="form-group">
                                <label for="Destination">Destination*</label>
                                <input type="text" name="Destination"class="form-control" placeholder="ville" value="<?php echo $flight->Destination;?>">
                           </div>
                           <div class="form-group">
                                <label for="aller">aller*</label>
                                <input type="datetime-local" name="date" class="form-control" value="<?php echo $flight->aller;?>" >
                           </div>
                           <div class="form-group">
                                <label for="retour">retour*</label>
                                <input type="datetime-local" name="arriver"class="form-control" value="<?php echo $flight->retour;?>" >
                           </div>
                           <div class="form-group">
                            <label for="Prix">Prix*</label>
                            <input type="number" name="prix" class="form-control" value="<?php echo $flight->prix;?>" >
                        </div>
                        <div class="form-group">
                            <label for="numéro de place">numéro de place*</label>
                            <input type="number" name="numerodeplace" class="form-control" value="<?php echo $flight->numero_de_place;?>">
                            <input type="hidden" name="id" value="<?php echo $flight->id?>">
                            </div>
                        <div class="form-group">
                            <label for="statut">statut*</label>
                            <select name="statut" id="statut" class="form-control" value="<?php echo $flight->statut;?>">
                                <option value="1" <?php echo $flight->statut ? 'selected' : ' ' ; ?>>Aller simple</option>
                                 <option value="0"<?php echo !$flight->statut ? 'selected' : ' ' ; ?>>Aller retour</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btb btn-primary mt-2" name="submit">Valider</button>
                        </div>

                       </form>
                </div>
            </div>
       </div>    
    </div>    
</div>