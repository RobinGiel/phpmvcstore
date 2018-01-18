<?php
class Category{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getCategory(){
            $this->db->query('SELECT
                              categories.id as categoryId,
                              categories.name as categoryName
                              FROM categories
                              ORDER BY categories.id ASC
                              ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getCategoryById($id){
            $this->db->query('SELECT * FROM categories WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
    }

