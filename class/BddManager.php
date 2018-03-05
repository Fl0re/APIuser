<?php 
//BddManager va contenir les instances de nos repository
class BddManager {

    private $UserRepository;
    private $connection;

    function __construct(){
        $this->connection = Connection::getConnection();
        $this->UserRepository = new UserRepository( $this->connection );
    }

    function getUserRepository(){
        return $this->UserRepository;
    }
 

}