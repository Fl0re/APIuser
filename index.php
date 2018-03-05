<?php 
require "flight/Flight.php"; 
require "autoload.php";
header('Acces-Control-Allow-Origin: *');
//Enregistrer en global dans Flight le BddManager
Flight::set("BddManager", new BddManager());

Flight::route('POST /user', function(){
    $username = Flight::request()->data["username"];
    $password = Flight::request()->data["password"];
    $status = [
        "success"=>false,
        "id"=> 0
    ];
    if(strlen($username)==0 || strlen($password)==0){
        echo json_encode($status);
    }
    else{
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $bddManager = Flight::get("BddManager");
        $repo = $bddManager->getUserRepository();
        $id = $repo->insertUser($user);
        if($id != 0){
            $status["success"] = true;
            $status["id"] = $id;
        };
        echo json_encode($status);
    };
});

Flight::route("GET /user", function(){
    $username = Flight::request()->query["username"];
    $password = Flight::request()->query["password"];

    $status = [
        "success" => false,
        "user" => false
    ];

    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);

    $bddManager = Flight::get("BddManager");
    $repo = $bddManager->getUserRepository();
    $user = $repo->selectUser( $user );
    
    if( $user != false ){
        $status["success"] = true;
        $status["user"] = $user;
    }

    echo json_encode( $status );
    

});


Flight::start();