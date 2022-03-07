<?php
    // appel de la fct de ajouter
    if ( isset($_POST['submit'])){
    $nouveauVol = new FlightsController();
    $nouveauVol->addFlights();
    // print_r($flights);
    }
?>
<div class="container">
    <div class="row my-4">
        <!-- scroll  -->
       <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">Ajouter un vol</div>
                <div class="card-body bg-light table-responsive">
                    <!-- partir a add// -->
                        <a href="<?php echo BASE_URL;?>" class="btn btn-sm btn-secondary mr-2 mb-2">
                        <i class ="fas fa-home"></i> 
                        </a>
                       <form method="POST">
                           <div class="form-group">
                                <label for="Départ">Départ*</label>
                                <input type="text" name="Départ"class="form-control" placeholder="ville">
                           </div>
                           <div class="form-group">
                                <label for="Destination">Destination*</label>
                                <input type="text" name="Destination"class="form-control" placeholder="ville">
                           </div>
                           <div class="form-group">
                                <label for="aller">aller*</label>
                                <input type="datetime-local" name="aller"class="form-control" >
                           </div>
                           <div class="form-group">
                                <label for="retour">retour*</label>
                                <input type="datetime-local" name="retour"class="form-control" >
                           </div>
                           <div class="form-group">
                            <label for="Prix">Prix*</label>
                            <input type="number" name="prix" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="numéro de place">numéro de place*</label>
                            <input type="number" name="numerodeplace" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="statut">statut*</label>
                            <select name="statut" id="statut" class="form-control">
                                <option value="1">Aller simple</option>
                                 <option value="0">Aller retour</option>
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