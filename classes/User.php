<?php
include_once '../config/database.php';

class users extends db{

    private $connexion;

    public function __construct(){

        $this->connexion = $this->connect();
    }
   
    public function signup($username,$email,$password,$confirmpassword){

        if(empty($username)||empty($email)||empty($password)){
            return 'all fields are required';
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return 'Invalid email';
        }
        
        $sql="SELECT * FROM Users where email =:email";
        $stmt=$this->connexion->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result=$stmt->fetch();

        if($result){
            return 'email already exist';
        }

        $password_validation = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';

        if (!preg_match($password_validation, $password) || $password != $confirmpassword){
            return "Invalid Password";
        } 

        $hash = md5($password);
        $query = "INSERT INTO users(username,email,password) VALUES (:name, :email , :password)";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(':name', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hash);

        try {

            $stmt->execute();
            return 'Register Succeful';

        } catch (PDOException $e) {

            die("Erreur lors de l'insertion de l'utilisateur : " . $e->getMessage());

        }
    }


    public function login($email,$password){

        if(empty($email)||empty($password)){
            return 0;
        }

        $sql="SELECT * from users where email=:email";
        $stmt=$this->connexion->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $e=$stmt->fetch();

        if(!$e){
            return 0;
        }

        $hash = md5($password);
        $sql="SELECT * FROM users where password=:password";
        $stmt=$this->connexion->prepare($sql);
        $stmt->execute(['password'=>$hash]);
        $pass = $stmt->fetch();

        if(!$pass){
            return 0;
        }

        return $e["user_id"];
    } 
    

    public function getUsers(){

        $query = "SELECT * FROM users;";
        $stmt = $this->connexion->prepare($query);  
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public function getUser($user_id){

        $query = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $this->connexion->prepare($query);  
        $stmt->bindParam(":id" , $user_id);
        $stmt->execute();

        return $stmt->fetch();

    }


    public function UpdateRole($user_id , $role){

        $query = "UPDATE users SET role = :role WHERE user_id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam("role", $role);
        $stmt->bindParam("id", $user_id);
        
        try {
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            die("Erreur lors de Update role : " . $e);
        }
    }   


    public function deleteUser($user_id){

        $query = "DELETE FROM users WHERE user_id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam(":id" , $user_id);
        
        try{
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            die("Erreur Lors de Suppression : " . $e);
        }

    }


    public function Bannes($user_id , $status){

        $query = "UPDATE users SET status = :status WHERE user_id = :id";
        $stmt = $this->connexion->prepare($query);
        $stmt->bindParam("status", $status);
        $stmt->bindParam("id", $user_id);
        
        try {
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            die("Erreur lors de Update status : " . $e);
        }

    }

}



?>