<?php
include_once '../config/database.php';

class Game extends db{

    private $connexion;

    public function __construct(){

        $this->connexion = $this->connect();
    }

    public function createGame($title, $image , $type , $version ,  $description,$screenshot_1,$screenshot_2,$screenshot_3){
        $query = "INSERT INTO jeu (title, description ,type, version , image ,screenshot_1,screenshot_2,screenshot_3) VALUES (:title, :description, :type , :version , :image,:screenshot_1,:screenshot_2,:screenshot_3)";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':screenshot_1', $screenshot_1);
        $stmt->bindParam(':screenshot_2', $screenshot_2);
        $stmt->bindParam(':screenshot_3', $screenshot_3);

        try {
            $stmt->execute();
            return $this->connexion->lastInsertId();
        } catch (PDOException $e) {
            die("Erreur lors de l'insertion de jeu : " . $e->getMessage());
        }
        
    }


    public function getGames(){

        $query = "SELECT * FROM jeu";
        $stmt = $this->connexion->prepare($query);
        $stmt->execute();
        $game = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $game;
        
    }

    public function getGame($jeu_id){

        $query = "SELECT * FROM jeu where jeu_id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":id" ,$jeu_id);
        $stmt->execute();
        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        return $game;
        
    }


    public function deleteGame($jeu_id){

        $query = "DELETE FROM jeu WHERE jeu_id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":id" , $jeu_id);
        
        try{
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            die("Erreur Lors de Suppression : " . $e);
        }

    }


    public function updateGame($jeu_id, $title, $image , $type , $version ,  $description ,$screenshot_1,$screenshot_2,$screenshot_3){

        $query = "UPDATE jeu SET title=:title,type=:type,version=:version,description=:description,image=:image,screenshot_1=:screenshot_1,screenshot_2=:screenshot_2,screenshot_3=:screenshot_3 where jeu_id=:id";

        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':id', $jeu_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':screenshot_1', $screenshot_1);
        $stmt->bindParam(':screenshot_2', $screenshot_2);
        $stmt->bindParam(':screenshot_3', $screenshot_3);

        try {
           
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die("Erreur Lors Modification : " . $e);
        }
    }



}



?>


