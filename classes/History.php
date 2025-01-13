<?php
include_once '../config/database.php';

class History extends db{

    private $connexion;
    

    public function __construct(){
         
        $this->connexion = $this->connect();
    }


    public function addToHistory($user_id,$jeu_id){

        $sql = "SELECT*from historique where user_id=:user_id and jeu_id=:jeu_id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['user_id' => $user_id,'jeu_id'=>$jeu_id]);
        $e = $stmt->fetch();
        if($e){
            return false;
        }else{

        $query = "INSERT INTO historique(user_id,jeu_id) VALUES (:user_id,:jeu_id)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':jeu_id', $jeu_id);
        $stmt->execute();
        return true;
        }

    }

    
    public function getUserHistory($user_id){

        $query = "SELECT*FROM jeu JOIN historique ON jeu.jeu_id=historique.jeu_id WHERE user_id=:user_id;";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute(['user_id'=>$user_id]);
        $fv= $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fv;
        
    }

    public function delete($his_id){
        $query = "DELETE FROM historique WHERE his_id = :his_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":his_id" , $his_id);
    
    try{
        $stmt->execute();
        return 1;
    }catch(PDOException $e){
        die("Erreur Lors de Suppression : " . $e);
    }


    }
    

    
}





   