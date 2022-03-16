<!-- page pour ajout des vols -->

<?php

class Flight{

   static public function getAll(){
       $stmt = DB::connect()->prepare('SELECT * FROM flight');
       $stmt->execute();
       return $stmt->fetchAll();
      //  $stmt->close; //fermer la cnx
       $stmt = null; //pour éviter l'ouverture de la connection with database

   }
   static public function getAllres($id_user)
    {
        if ($_SESSION['role'] == 1) {
            $stmt = DB::connect()->prepare('SELECT
                booking.id,
                booking.Depart,
                booking.Destination,
                booking.aller,
                users.retour,
                booking.prix,
                booking.numero_de_place,
                booking.statut,

            FROM
                booking
            INNER JOIN users ON booking.id_user = users.id;');
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = DB::connect()->prepare('SELECT * FROM booking WHERE id_user=:id_user');
            $stmt->bindParam(':id_user', $id_user);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
   
   static public function getFlight($data){
        $id = $data['id'];
        try{
          $query ='SELECT * FROM flight WHERE id=:id'; 
          $stmt = DB::connect()->prepare($query);     
          $stmt->execute(array(":id" => $id));
          $flight = $stmt->fetch(PDO::FETCH_OBJ);
          return $flight;
        }catch(PDOException $ex){
            echo 'erreur' .$ex->getMessage();
        }
   }
   static public function add($data){
    $stmt = DB::connect()->prepare("INSERT INTO `flight` (`Départ`, `Destination`, `aller`, `retour`, `prix`, `numero_de_place`, `statut`) VALUES (?,?,?,?,?,?,?)") ;
    $stmt->bindParam(1,$data['Départ']);
    $stmt->bindParam(2,$data['Destination']);
    $stmt->bindParam(3,$data['aller']);
    $stmt->bindParam(4,$data['retour']);
    $stmt->bindParam(5,$data['prix']);
    $stmt->bindParam(6,$data['numero_de_place']);
    $stmt->bindParam(7,$data['statut']);

    if($stmt->execute()){
        return 'ok';
        }else{
          return 'erreur';  
        }
       
        $stmt = null;


   }
   static public function update($data){
    $stmt = DB::connect()->prepare('UPDATE flight SET Départ = ?,Destination = ?, aller = ?, retour = ?, prix = ?, numero_de_place = ?, statut=? WHERE id = ?');
    $stmt->bindParam(1,$data['Départ']);
    $stmt->bindParam(2,$data['Destination']);
    $stmt->bindParam(3,$data['aller']);
    $stmt->bindParam(4,$data['retour']);
    $stmt->bindParam(5,$data['prix']);
    $stmt->bindParam(6,$data['numero_de_place']);
    $stmt->bindParam(7,$data['statut']);
    $stmt->bindParam(8,$data['id']);

    if($stmt->execute()){
        return 'ok';
        }else{
          return 'erreur';  
        }
        
        $stmt = null;
   }
   static public function delete($data){
      $id = $data['id'];
      try{
        $query ='DELETE FROM flight WHERE id=:id'; 
        $stmt = DB::connect()->prepare($query);     
        $stmt->execute(array(":id" => $id));
        if($stmt->execute()){
          return 'ok';
          }
      }catch(PDOException $ex){
          echo 'erreur' .$ex->getMessage();
      }
   }
   
   static public function searchFlights($data){
    $search = $data['search'];
    try{
      $query ='SELECT * FROM flight WHERE Départ LIKE ? OR Destination LIKE ? '; 
      $stmt = DB::connect()->prepare($query);     
      $stmt->execute(array('%'.$search.'%','%'.$search.'%'));
      $flights = $stmt->fetchAll();
      return $flights;
    }catch(PDOException $ex){
        echo 'erreur' .$ex->getMessage();
    }
   }
   static public function deleteRev($data)
    {
        $id = $data['id'];
        try {
            $query = 'DELETE FROM booking WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if ($stmt->execute()) {
                return 'ok';
            }
        } catch (PDOException $ex) {
            echo 'error' . $ex->getMessage();
        }
    }
    static public function reserve($data)
    {
        $stmt = DB::connect()->prepare('SELECT * FROM flight WHERE id=:id');
        // $stmt= DB::connect()->prepare('SELECT COUNT (*) FROM booking WHERE id=:id');  
        $stmt = DB::connect()->prepare('INSERT INTO booking (id_user, id_flight, Depart, Destination, aller,retour,prix,numero_de_place, statut) VALUES (:id_user,:id_flight,:Depart,:Destination,:aller,:retour,:prix,:numero_de_place,:statut)');
        $stmt->bindParam(':id_user', $data['id_user']);
        $stmt->bindParam(':id_flight', $data['id_flight']);
        $stmt->bindParam(':Depart', $data['Depart']);
        $stmt->bindParam(':Destination', $data['Destination']);
        $stmt->bindParam(':aller', $data['aller']);
        $stmt->bindParam(':retour', $data['retour']);
        $stmt->bindParam(':prix', $data['prix']);
        $stmt->bindParam(':numero_de_place', $data['numero_de_place']);
        $stmt->bindParam(':statut', $data['statut']);
        if($stmt->execute()){
            return 'ok';
        }

    }
    static public function addpass($data)
    { 
        $stmt = DB::connect()->prepare('INSERT INTO passenger (user_id, reservation_id, fullname,birthday) VALUES (:user_id,:reservation_id,:fullname,:birthday)');
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':reservation_id', $data['reservation_id']);
        $stmt->bindParam(':fullname', $data['fullname']);
        $stmt->bindParam(':birthday', $data['birthday']);
        if($stmt->execute()){
            return 'ok';
        }
    
    }
   
}


