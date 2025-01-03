<?php
include_once '../config/database.php';

class  users extends db{
   
    public function signup($username,$email,$password){
        if(empty($username)||empty($email)||empty($password)){
            return 'all fields are required';
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return 'Invalid email';
        }
   

        $sql="SELECT * FROM Users where username =:username";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute(['username'=>$username]);
        $username=$stmt->fetch();

        if($username){
            return 'username already exist';
        }
        $sql="SELECT * FROM Users where email =:email";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $email=$stmt->fetch();

        if($email){
            return 'email already exist';
        }


        $password_validation = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';

        if (!preg_match($password_validation, $password)){
            echo "Invalid Password";
        } 
        
    }


    public function login($email,$password){
        if(empty($email)||empty($password)){
            return 'all fields are required';
        }

        $sql="SELECT *from Users where email=:email";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $email=$stmt->fetch();
        if(!$email){
            return "email is incorrect";
        }

        $sql="SELECT*FROM Users where password=:password";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute(['password'=>$password]);
        $password=$stmt->fetch();
        if(!$password){
            return "password is incorrect";
        }

            return 1;
    } 
    
   
}

$user=new users();
// echo $user->signup('h','mg@gmail.com','Cathhh@123'); 
// echo $user->login('meryem@gmail.com','123'); 



?>