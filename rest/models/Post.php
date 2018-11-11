<?php
/**
 * Created by PhpStorm.
 * User: BRYAN SUAREZ
 * Date: 10/11/2018
 * Time: 22:22
 */

class Post {
    //db stuff
    private $conn;
    private $table = 'posts';

    //properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //get posts
    public function read()
    {
        //query
        $query = 'SELECT c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
          FROM 
          ' .$this->table. ' p
          LEFT JOIN
          categories c ON p.category_id = c.id
          ORDER BY
          p.created_at DESC
        ';

        //PREPARE
        $stm =$this->conn->prepare($query);

        $stm->execute();

        return $stm;
    }

    //get sinlge post
}