<?php
include_once '../config/database.php';

class Review extends db
{

    private $connexion;



    public function __construct()
    {

        $this->connexion = $this->connect();
    }


    
    public function addReview($user_id, $jeu_id, $rating, $review)
    {
        $sql = "INSERT INTO notation (user_id, jeu_id, rating, review) VALUES (:user_id, :jeu_id, :rating, :review)";
        $stmt = $this->connexion->prepare($sql);
        return $stmt->execute([
            'user_id'=>$user_id,
            'jeu_id' => $jeu_id,
            'rating' => $rating,
            'review' => $review
        ]);
    }

    

     function getAverageRating($jeu_id){
        $sql = "SELECT AVG(rating) as avg_rating FROM notation WHERE jeu_id = :jeu_id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['jeu_id' => $jeu_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['avg_rating'];
    }


     function getReviews($jeu_id)
    {
        $sql = "SELECT users.username, notation.rating, notation.review, notation.created_at 
                FROM notation 
                JOIN users ON notation.user_id = users.user_id 
                WHERE jeu_id = :jeu_id 
                ORDER BY notation.created_at DESC";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute(['jeu_id' => $jeu_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}

