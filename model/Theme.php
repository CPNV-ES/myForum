<?php
    require_once 'db/db.php';
    class Theme {

        public $id;
        public $name;

        public function save(){
            $query = "INSERT INTO themes  VALUES (id,'$this->name')";
            echo $query;
            Db::Insert($query);
        }

        public function load(){

        }

        public function update(){

        }

        public function delete(){

        }
    }

