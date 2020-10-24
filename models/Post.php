<?php 
    class Post{
        private $conn;
        private $table = 'posts';
        //Post properties
        public $id,$category_name,$title,$body,$author,$created_at;
        //constructor
        public function __construct($db){
            $this->conn = $db;
        }        
        //get posts
        public function read()
        {
            //create query
            $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.title,
            p.body,
            p.category_id,
            p.author,
            p.created_at
            FROM
            '. $this->table.' p
            LEFT JOIN
            categories c 
            ON p.category_id = c.id
            ORDER BY 
            p.created_at DESC
            ';
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        //Get single post
        public function read_single(){
            //create query
            $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.title,
            p.body,
            p.category_id,
            p.author,
            p.created_at
            FROM
            '. $this->table.' p
            LEFT JOIN
            categories c 
            ON p.category_id = c.id
            WHERE p.id = ?
            LIMIT 0,1
            ';
            //Prepare statemen t
            $stmt = $this->conn->prepare($query);
            //bind id
            $stmt->bindParam(1,$this->id);
            //execute query
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->author = $row['author'];
            $this->category_id = $row['category_id'];
            $this->category_name = $row['category_name'];

        }
         

    }
?>