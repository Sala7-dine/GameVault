<?php
include_once '../config/database.php';

class Favoris extends db{

    private $connexion;
    


    public function __construct(){
         
        $this->connexion = $this->connect();
    }

  


    public function add_favoris($user_id,$jeu_id){
        $sql = "SELECT*from Favoris where user_id=:user_id and jeu_id=:jeu_id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['user_id' => $user_id,'jeu_id'=>$jeu_id]);
        $e = $stmt->fetch();
        if($e){
            return false;
        }else{
        $query = "INSERT INTO Favoris(user_id,jeu_id) VALUES (:user_id,:jeu_id)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':jeu_id', $jeu_id);
        $stmt->execute();
        return true;
        }

    }
    public function nb_favoris_element($user_id){
        $sql="SELECT COUNT(*) AS nb_favoris_element FROM favoris where user_id=:user_id";
        $stmt=$this->connexion->prepare($sql);
        $stmt->execute(['user_id'=>$user_id]);  
        $result=$stmt->fetch();
        return $result['nb_favoris_element'];
        }

    
        public function getUserFavoris($user_id){
            $query = "SELECT*FROM jeu JOIN favoris ON jeu.jeu_id=favoris.jeu_id WHERE user_id=:user_id;";
            $stmt = $this->connexion->prepare($query);
            $stmt->execute(['user_id'=>$user_id]);
            $fv= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $fv;
           
        }

        public function deleteFavoris($favoris_id){
            $query = "DELETE FROM favoris WHERE favoris_id = :favoris_id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":favoris_id" , $favoris_id);
        
        try{
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            die("Erreur Lors de Suppression : " . $e);
        }



        }

    


 


    
}





   