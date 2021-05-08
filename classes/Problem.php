<?php

class Problem{
    public $id;
    public $title;
    public $content;
    public $solved;
    public $category;
    public $sub_category;
    public $branch;
    public $userid;

    public function addProblem($conn,$title,$content,$category,$sub_category,$branch='',$userid){
        $sql= "INSERT INTO 
        problem(title,content,solved,category,sub_category,branch,userid)
        VALUES
        (:title,:content,:solved,:category,:sub_category,:branch,:userid)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':title',$title,PDO::PARAM_STR);
        $stmt->bindValue(':content',$content,PDO::PARAM_STR);
        $stmt->bindValue(':solved',0,PDO::PARAM_INT);
        $stmt->bindValue(':category',$category,PDO::PARAM_STR);
        $stmt->bindValue(':sub_category',$sub_category,PDO::PARAM_STR);
        $stmt->bindValue(':branch',$branch,PDO::PARAM_STR);
        $stmt->bindValue(':userid',$userid,PDO::PARAM_INT);
        return ($stmt->execute());
    }

    public static function getProblems($conn,$id){
        $sql= "SELECT * FROM problem where userid=:id ";
        $stmt =$conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute())
        {
        $problems =$stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($problems);
        }
    }
}