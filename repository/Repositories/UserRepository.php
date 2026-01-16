<?php

require __DIR__.'/interfaces/UserRepositoryInterface.php';
require '../Models/User.php';

class UserRepository implements UserRepositoryInterface
{

    public function __construct(
        private PDO $db
    ){}

    public function findById(int $id): ?User{
        
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE id = :id"
        );
        
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!data){ 
            return null;
         }
        
        return new User( 
            $data['id'],
            $data['name'],
            $data['email']
        );
    }

    public function findAllUsers():array{

        $users = [];

        $stmt = $this->db->query(
            "SELECT * FROM users;"
        );

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $users[] = new User(
                $row['id'],
                $row['name'],
                $row['email']
            );

        }
        return $users;

    }

    public function insertUser(string $name, string $email): bool{
        
        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email)VALUES(:name, :email );"
        );

        $return = $stmt->execute([
            "name" => $name,
            "email" => $email
        ]);

        return $return;
    }





}