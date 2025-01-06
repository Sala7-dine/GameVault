<?php
include_once '../config/database.php';

class Game extends db{

    private $connexion;

    public function __construct(){

        $this->connexion = $this->connect();
    }

    public function createGame($title, $image , $type , $version ,  $description,){
        $query = "INSERT INTO jeu (title, description ,type, version , image) VALUES (:title, :description, :type , :version , :image)";
        $stmt = $this->connexion->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':image', $image);

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



}



?>


