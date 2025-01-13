<?php
include_once '../config/database.php';

class Library extends db{

    private $connexion;
    public function __construct(){
         
        $this->connexion = $this->connect();
    }


    public function addToBiblio($user_id,$jeu_id){

        $sql = "SELECT*from bibliotheque where user_id=:user_id and jeu_id=:jeu_id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['user_id' => $user_id,'jeu_id'=>$jeu_id]);
        $e = $stmt->fetch();
        if($e){
            return false;
        }else{

        $query = "INSERT INTO bibliotheque(user_id,jeu_id) VALUES (:user_id,:jeu_id)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':jeu_id', $jeu_id);
        $stmt->execute();
        return true;
        }

    }

    public function getbibo($bib_id){

        $query = "SELECT * FROM bibliotheque where bib_id = :bib_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":bib_id" ,$bib_id);
        $stmt->execute();
        $bibo = $stmt->fetch(PDO::FETCH_ASSOC);

        return $bibo;
        
    }

    
    public function getUserBiblio($user_id){

        $query = "SELECT*FROM jeu JOIN bibliotheque ON jeu.jeu_id=bibliotheque.jeu_id WHERE user_id=:user_id;";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['user_id'=>$user_id]);
        $fv= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fv;
        
    }

    public function delete($bib_id){
        $query = "DELETE FROM bibliotheque WHERE bib_id = :bib_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":bib_id" , $bib_id);
    
    try{
        $stmt->execute();
        return true;
    }catch(PDOException $e){
        die("Erreur Lors de Suppression : " . $e);
    }
    }

    function updateStatus($status,$bib_id){
        $query ="UPDATE bibliotheque SET status=:status WHERE bib_id =:bib_id";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':bib_id', $bib_id);

        try {
           
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die("Erreur Lors Modification : " . $e);
        }
    }

    



    }
    


 


    






   