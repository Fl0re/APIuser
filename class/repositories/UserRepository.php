<?php 
class UserRepository extends Repository {

    

     function insertUser( User $user ){

        $query = "INSERT INTO user SET username=:username, password=:password";
        $prep = $this->connection->prepare( $query );
        $prep->execute( [
            "username" => $user->getUsername(),
            "password" => $user->getPassword()
        ] );
        return $this->connection->lastInsertId();

    }

    function selectUser( User $user ){

        $query = "SELECT * FROM user WHERE username=:username AND password=:password";
        $prep = $this->connection->prepare( $query );
        $prep->execute( [
            "username" => $user->getUsername(),
            "password" => $user->getPassword()
        ] );
        
        $result = $prep->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

            
}

function selectIdByUser( User $user ){
    
            $query = "SELECT id FROM user WHERE username=:username AND password=:password";
            $prep = $this->connection->prepare( $query );
            $prep->execute( [
                "username" => $user->getUsername(),
                "password" => $user->getPassword()
            ] );
            
            $result = $prep->fetch(PDO::FETCH_ASSOC);
    
            return $result;
        }
           
//     function getById( User $user ){
        
//                 $query = "SELECT * FROM user WHERE id=:id";
//                 $prep = $this->connection->prepare( $query );
//                 $prep->execute([
//                     "id" => $user->getId()
//                 ]);
//                 $result = $prep->fetch(PDO::FETCH_ASSOC);
        
//                 if( empty( $result ) ){
//                     return false;
//                 }
//                 else {
//                     return new User( $result );
//                 }
                
//             }
//             function getIdByUSer( User $user ){
                
//                         $query = "SELECT id FROM user ";
//                         $prep = $this->connection->prepare( $query );
//                         $prep->execute([]);
//                         $result = $prep->fetch(PDO::FETCH_ASSOC);
                
//                         if( empty( $result ) ){
//                             return false;
//                         }
//                         else {
//                             return new User( $result );
//                         }
                        
//                     }
        
// }
  