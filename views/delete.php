<?php
    // appel de la fct de modifier
    if ( isset($_POST['id'])){
    $exitflight = new FlightsController();
    $exitflight->deleteFlights();
    }

?>