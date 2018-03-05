<?php
class User extends Model implements JsonSerializable {

    private $username;
    private $password;

    function getPrenom(){
        return $this->username;
    }

    function getPassword(){
        return $this->password;
    }

    function setUsername( $username ){
        $this->username = $username;
    }

    function setPassword( $password ){
        $this->password = $password;
    }

    function jsonSerialize(){
        return [
            "id" => $this->id,
            "username" => $this->username,
            "password" => $this->password
        ];
    }

}