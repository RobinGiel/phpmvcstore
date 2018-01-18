<?php
    class Product{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getProducts(){
            $this->db->query('SELECT *,
                                products.id as productId,
                                products.name as productName,
                                products.img as productImg,
                                users.name as userName,
                                categories.id as categoryId
                                FROM products
                                INNER JOIN users
                                ON products.user_id = users.id
                                INNER JOIN categories ON
                                products.category = categories.id
                                ORDER BY products.id DESC
                              ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function addProduct($data){

        $this->db->query('INSERT INTO products (name, description, category, price, img, user_id ) VALUES(:name, :description, :category, :price, :img, :user_id)');

            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':user_id', $data['user_id']);

            // Exectute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function updateProduct($data){
        $this->db->query('UPDATE products SET
                            name = :name,
                            description = :description,
                            category = :category,
                            price = :price
                            WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':category', $data['category']);
            $this->db->bind(':price', $data['price']);

            // Exectute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function getProductById($id){
            $this->db->query('SELECT * FROM products WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function deleteProduct($id){
        $this->db->query('DELETE FROM products WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);

            // Exectute
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }
    }