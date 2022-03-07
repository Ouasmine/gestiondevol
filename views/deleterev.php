<?php 
	if(isset($_POST['iddelete'])){
		$deleteRev = new FlightsController();
		$deleteRev->deleteRev();
        Redirect::to("showvols");
	}


?>