<?php

class FlightsController{

    public function getAllFlights(){
        $flights = Flight::getAll();
        return $flights;
    }
    public function getAllreservations(){
        $flights = Flight::getAllres($_SESSION['id']);
        return $flights;
    }
    public function getOneFlight(){

        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
        
        $flight = Flight::getFlight($data);
        return $flight;
    }
}
    public function findFlights(){
       if(isset($_POST['search'])) {
          $data= array('search' => $_POST['search']);
       }
       $flight = Flight::searchFlights($data);
       return $flight;
    }

    public function  addFlights(){
        if(isset($_POST['submit'])){
            $data = array(
                'Départ' => $_POST['Départ'],
                'Destination' => $_POST['Destination'],
                'aller' => $_POST['aller'],
                'retour' => $_POST['retour'],
                'prix' => $_POST['prix'],
                'numero_de_place' => $_POST['numerodeplace'],
                'statut' => $_POST['statut'],
            );
            $result = Flight::add($data);
            if($result === 'ok'){
                Session::set('success', 'Votre vol est Ajouté par succès');
                Redirect::to('home');
            }else{
                echo $result;
            }


            
        }
    }
    public function  updateFlights(){
        if(isset($_POST['submit'])){
            $data = array(
                'id' => $_POST['id'],
                'Départ' => $_POST['Départ'],
                'Destination' => $_POST['Destination'],
                'aller' => $_POST['date'],
                'retour' => $_POST['date'],
                'prix' => $_POST['prix'],
                'numero_de_place' => $_POST['numerodeplace'],
                'statut' => $_POST['statut']
            );
            $result = Flight::update($data);
            if($result === 'ok'){
                Session::set('success', 'Votre vol est modifié par succès');
                Redirect::to('home');
            }else{
                echo $result;
            }   
        }
    }
    public function deleteFlights(){
        if(isset($_POST['id'])){
            $data['id'] = $_POST['id'];
            $result = Flight::delete($data);
            if($result === 'ok'){
                Session::set('success', 'votre vol est supprimé par succès');
                Redirect::to('home');
            }else{
                echo $result;
            }   
        }
    }
    public function deleteRev(){
        if(isset($_POST['iddelete'])){
            $data['id'] = $_POST['iddelete'];
            $result = Flight::deleteRev($data);
            if($result === 'ok'){
                Session::set('success', 'Reservation Deleted');
                    Redirect::to('showvols');
            }else{
               echo $result ;
            }
     }

     }
    public function reserveFlight(){
        if(isset($_POST['reserve'])){
            $data = array(
                'id_user' => $_SESSION['id'],
                'id_flight' => $_POST['id'],
                'Depart' => $_POST['Depart'],
                'Destination' => $_POST['Destination'],
                'aller' => $_POST['aller'],
                'retour' => $_POST['retour'],
                'prix' => $_POST['prix'],
                'numero_de_place' => $_POST['numero_de_place'],
                'statut' => $_POST['statut'],
            );

            $result = Flight::reserve($data);
            if($result === 'ok'){
                    Session::set('success', 'Flight reserved');
                    Redirect::to('homeuser');
            }else{
            echo $result ;
            }
        }
    }
    public function addPassenger(){
        if(isset($_POST['addpass'])){
            $data = array(
                'user_id' => $_SESSION['id'],
                'reservation_id' => $_POST['reservation_id'],
                'fullname' => $_POST['fullname'],
                'birthday' => $_POST['birthday'],
            );
            $result = Flight::addpass($data);
            if($result === 'ok'){
                Session::set('success', 'Passenger added');
                Redirect::to('home');
            }else{
            echo $result;
            }
        }
    }
}




?>