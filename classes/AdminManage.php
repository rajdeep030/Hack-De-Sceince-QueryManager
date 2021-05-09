<?php

class AdminManage{
    public $id;
    public $title;
    public $content;
    public $solved;
    public $category;
    public $sub_category;
    public $branch;
    public $userid; 

    public static function getAdmin($conn,$id){
        $sql = "SELECT * FROM admin WHERE id=:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS,'AdminManage');
        if($stmt->execute())
         {
           return $stmt->fetch(); 
         }
    }

    public function getProblems($conn){
        $sql= "SELECT * FROM problem WHERE branch=:branch";
        $stmt =$conn->prepare($sql);
        $stmt->bindValue(':branch', $this->branch, PDO::PARAM_STR);
        if($stmt->execute())
        {
        $problems =$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $problems;
        }
    }

    public static function setStatus($conn,$id,$status){
        $sql="UPDATE problem SET solved=:solved WHERE id=:id";
        $stmt =$conn->prepare($sql);
        $stmt->bindValue(':solved',$status,PDO::PARAM_INT);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function readdress($conn,$id,$value){
        $sql="UPDATE problem SET branch=:branch WHERE id=:id";
        $stmt =$conn->prepare($sql);
        $stmt->bindValue(':branch',$value,PDO::PARAM_STR);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        return $stmt->execute();
    }
}