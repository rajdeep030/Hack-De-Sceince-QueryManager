<?php

class ManageUser{
    public $id;
    public $username;
    public $email;
    public $pass;

    public static function getUser($conn,$id){
        $sql="SELECT * FROM user WHERE id=:id";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'ManageUser');
        if($stmt->execute())
         {
           return $stmt->fetch(); 
         }
    }

    public static function isExisting($conn,$email){
        $sql = "SELECT * FROM user WHERE email=:email";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS,"ManageUser");
        $stmt->execute();
        $user = $stmt->fetch();
        if($user)
        return true;
        else
        return false;
    }
    
    public function addUser($conn,$name,$roll,$email,$branch,$password)
    {
        $sql = "INSERT INTO user(username,email,pass)VALUES(:name,:email,:pass)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name',$name,PDO::PARAM_STR);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->bindValue(':pass',$password,PDO::PARAM_STR);
        if($stmt->execute())
        {
            return $conn->lastInsertId();
        }
    }
}