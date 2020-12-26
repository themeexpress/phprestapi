<?php 
    class Category{
        private $conn;
        private $table = 'categories';
        //Post properties
        public $id,$name,$created_at;
        //constructor
        public function __construct($db){
            $this->conn = $db;
        }        
        //get categories
        public function read()
        {
            //create query
            $query = 'SELECT 
                id,
                name
            FROM
                '. $this->table.'
            ORDER BY 
                created_at DESC
            ';
            //Prepare statement
            $stmt = $this->conn->prepare($query);
            // Execute query
            $stmt->execute();
            return $stmt;
        }
        //Get single post
        //public function read_single(){
            //create query
            /*$query = 'SELECT 
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

        }*/
        //Create post
        /*
        public function create(){
            $query = 'INSERT INTO ' . $this->table . '
                SET
                title = :title,
                body = :body,
                author = :author,
                category_id = :category_id';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->title));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));

            //Bind data
            $stmt->bindParam(':title',$this->title);
            $stmt->bindParam(':body',$this->body);
            $stmt->bindParam(':author',$this->author);
            $stmt->bindParam(':category_id',$this->category_id);        
            
            //execute query
            if($stmt->execute()){
                return true;
            }
            //Print Error
            //print("Error: %s.\n", $stmt->error);
            return false;
        }
        // Update post
        public function update(){
            $query = 'UPDATE ' . $this->table . '
                SET
                title = :title,
                body = :body,
                author = :author,
                category_id = :category_id
                WHERE id = :id';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->body = htmlspecialchars(strip_tags($this->title));
            $this->author = htmlspecialchars(strip_tags($this->author));
            $this->category_id = htmlspecialchars(strip_tags($this->category_id));
            $this->id = htmlspecialchars(strip_tags($this->id));

            //Bind data
            $stmt->bindParam(':title',$this->title);
            $stmt->bindParam(':body',$this->body);
            $stmt->bindParam(':author',$this->author);
            $stmt->bindParam(':category_id',$this->category_id);
            $stmt->bindParam(':id',$this->id);        

            
            //execute query
            if($stmt->execute()){
                return true;
            }
            //Print Error
            //print("Error: %s.\n", $stmt->error);
            return false;
        }
        // Delete post
        public function delete(){
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            //Prepare statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->id = htmlspecialchars(strip_tags($this->id));

            //Bind data
            $stmt->bindParam(':id',$this->id);        

            
            //execute query
            if($stmt->execute()){
                return true;
            }
            //Print Error
            //print("Error: %s.\n", $stmt->error);
            return false;
        }*/

        
    }
?>