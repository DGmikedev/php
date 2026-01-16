<?php

require "../Repositories/UserRepository.php";
//require "../Models/User.php";

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userInterface
    ){}

    public function register(string $name, string $email){
        return $this->userInterface->insertUser($name, $email);
    }

    public function getAllUsers(){
        return $this->userInterface->findAllUsers();
    }


}

$db = new PDO(
    "mysql:host=localhost;dbname=php",
    "root",
    ""
);

$userRepository = new UserRepository($db);

$userService = new UserService($userRepository);

// Registrar usuario
// $re = $userService->register("FAZZ", "fazz@email.com");
// echo "<h1>DATO INSERTADO: $re </h1>";

// traer todos los usuarios
$datos = $userService->getAllUsers();


echo "<ul>";

for($i=0; $i<count($datos); $i++){
    echo "<li> ID:" . $datos[$i]->id . " NOMBRE:" . $datos[$i]->name . " EMAIL:". $datos[$i]->email ."</li>";
}
echo "</ul>";

