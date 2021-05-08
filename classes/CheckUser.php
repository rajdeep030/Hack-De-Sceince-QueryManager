<?php 
class CheckUser{

public $id;
public $username;
public $pass;

public static function authenticate($conn,$username,$password){
    $sql= "SELECT * FROM user WHERE username=:username";
    $stmt=$conn->prepare($sql);
    $stmt->bindValue(':username',$username,PDO::PARAM_STR);
    $stmt->setFetchMode(PDO::FETCH_CLASS,"CheckUser");
    $stmt->execute();
    $user=$stmt->fetch();
    if($user){
        $id = $user->id;
        if($password===$user->pass)
        return $user->id;
    }
}
}