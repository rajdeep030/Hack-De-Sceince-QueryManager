<?php

class CheckAdmin{
    public $id;
    public $username;
    public $pass;
    public $branch;
    public static function adminCheck($conn,$username,$password,$branch){
        $sql= "SELECT * FROM admin WHERE username=:username";
        $stmt=$conn->prepare($sql);
        $stmt->bindValue(':username',$username,PDO::PARAM_STR);
        $stmt->setFetchMode(PDO::FETCH_CLASS,"CheckUser");
        $stmt->execute();
        $user=$stmt->fetch();
        if($user){
            if(($password===$user->pass)&&($branch===$user->branch))
            return $user->id;
        }
    }
}