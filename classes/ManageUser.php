<?php

class ManageUser{
    public $id;
    public $username;
    public $email;

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
}