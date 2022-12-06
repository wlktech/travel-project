<?php
use Vtiful\Kernel\Excel;

class Post{
    private $conn;
    public function __construct($connection){
        $this->conn = $connection;
    }

    public function create($title, $des, $image){
        try{
            $state = $this->conn->prepare("INSERT INTO posts(title, description, image) VALUES(:title, :des,:image)");
            $state->bindParam(":title", $title);
            $state->bindParam(":des", $des);
            $state->bindParam(":image", $image);
            $state->execute();
            return true;

        }catch(Exception $e){

        }
    }
    public function getAll(){
        try{
            $state = $this->conn->prepare("SELECT * FROM posts");
            $state -> execute();
            $posts = $state->fetchAll(PDO::FETCH_ASSOC);
            return $posts;
        }catch(Exception $e){
            print_r($e);
        }
        
    }
    public function get($id){
        try{
            $state = $this->conn->prepare("SELECT * FROM posts WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $post = $state->fetch(PDO::FETCH_ASSOC);
            return $post;
        }catch(Exception $e){

        }
    }
    public function update($id, $title, $des, $image){
        try{
            $state = $this->conn->prepare("UPDATE posts SET title=:title, description=:des, image=:image WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->bindParam(":title", $title);
            $state->bindParam(":des", $des);
            $state->bindParam(":image", $image);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }
    public function delete($id){
        try{
            $state = $this->conn->prepare("DELETE FROM posts WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
        }catch(Exception $e){

        }
    }
    
}