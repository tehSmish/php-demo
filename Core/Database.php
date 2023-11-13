<?php

namespace Core;

use PDO;

class Database {

    public $connection;
    public $statement;

    public function __construct($config, $user = 'homestead', $pass = 'secret'){
        

        $dsn = 'mysql:' . http_build_query($config, '',';');

        $this -> connection = new PDO($dsn, $user, $pass, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }

    public function query($query, $params = []){
           
        $this -> statement = $this -> connection -> prepare($query);
        
        $this -> statement->execute($params);
        
        
        return $this;

    }

    public function find(){

        return $this -> statement -> fetch();

    }

    public function find_or_fail(){
        
        $result = $this->find();

        if (! $result){
            abort();
        }

        return $result;
    }

    public function find_all(){

        return $this -> statement -> fetchAll();
    }

}