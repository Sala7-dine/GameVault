<?php
include_once '../config/database.php';

class Chat extends db{

    private $connexion;
    


    public function __construct(){
         
        $this->connexion = $this->connect();
    }

    public function add_comment_to_chat($user_id,$jeu_id,$content){
        if(empty($content)){
            return false;
        }
        $query = "INSERT INTO chat(user_id,jeu_id,content) VALUES (:user_id,:jeu_id,:content)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':jeu_id', $jeu_id);
        $stmt->bindParam(':content', $content);
        $stmt->execute();
        return true;

    }

    public function display_my_chat($user_id,$jeu_id){
        $sql = "SELECT*from chat where user_id=:user_id and jeu_id=:jeu_id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['user_id' => $user_id,'jeu_id'=>$jeu_id]);
        $e = $stmt->fetchAll();
        return $e;
 
    }
    public function display_others_chat($user_id,$jeu_id){
        $sql = "SELECT*from chat JOIN users ON chat.user_id=users.user_id where chat.user_id !=:user_id and jeu_id=:jeu_id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['user_id' => $user_id,'jeu_id'=>$jeu_id]);
        $e = $stmt->fetchAll();
        return $e;

    }
}
