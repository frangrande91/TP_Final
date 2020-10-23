<?php
    namespace DAO;

    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;

    class UserDAO implements IUserDAO{
        private $connection;
        private $tableName = "users";


        public function add(){
            $sql = "INSERT INTO $this->tableName (idRole, dni, name, surname, street, number, phone, email, password)
                                VALUES (:idRole, :dni, :name, :surname, :street, :number, :phone, :email, :password");

            $parameters['idRole']=$user->getIdRole();
            $parameters['dni']=$user->getDni();
            $parameters['name']=$user->getName();
            $parameters['surname']=$user->getSurname();
            $parameters['street']=$user->getStreet();
            $parameters['number']=$user->getNumber();
            $parameters['phone']=$user->getPhone();
            $parameters['email']=$user->getEmail();
            $parameters['password']=$user->getPassword();

            try{
                $this->connection = Connection::getInstance();
                return $this->connection::executeNonQuery($sql, $parameters);
            }
            catch(\PDOException $ex){
                throw $ex;
            }
            

        public function getAll(){      
            try{
                $userList = array();
                $sql = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->execute($sql);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->setIdRole($row["idRole"]);
                    $user->setDni($row["dni"]);
                    $user->setName($row["name"]);
                    $user->setSurname($row["surname"]);
                    $user->setStreet($row["street"]);
                    $user->setNumber($row["number"]);
                    $user->setPhone($row["phone"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);

                    array_push($userList, $user);
                }
                return $userList;
            }
            catch(\PDOException $ex){
                throw $ex;
            }
        }         


        public function search($emailUser){
            $sql = "SELECT * FROM $this->tableName WHERE email = :email";
            $parameters['email'] = $emailUser;

            try{
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->execute($sql, $parameters);
            }
            catch(\PDOException $ex){
                throw $ex;{
            }

            if(!empty($resultSet)){
                return $this->map($resultSet);
            }
            else{
                return false;
            }
        }   


        public function update($user){
            try{
                $sql = "UPDATE $this->tableName set idRole=:idRole, dni=:dni,name=:name,surname=:surname,
                                street=:street,number=:number,phone=:phone,email=:email,password=:password";
                
                $this->connection = Connection::getInstance();
                $parameters["idRole"] = $user->getIdRole();
                $parameters["dni"] = $user->getDni();
                $parameters["name"] = $user->getName();
                $parameters["surname"] = $user->getSurname();
                $parameters["street"]=$user->getStreet();
                $parameters["number"]=$user->getNumber();
                $parameters["email"]=$user->getEmail();
                $parameters["phone"]=$user->getPhone();
                $parameters["password"] = $user->getPassword();

                $rowCant = $this->connection->executeNonQuery($sql, $parameters);
                return $rowCant;
            }
            catch(\PDOException $ex){
                throw $ex;
            }

        }

        protected function map($value){
            $value = is_array($value) ? $value : [];
            
            $result = array_map(function ($p){
                $user = new User();
                $user->setIdUser($p["idUser"]);
                $user->setIdRole($p["idRole"]);
                $user->setDni($p["dni"]);
                $user->setName($p["name"]);
                $user->setSurname($p["surname"]);
                $user->setStreet($p["street"]);
                $user->setNumber($p["number"]);
                $user->setEmail($p["email"]);
                $user->setPhone($p["phone"]);
                $user->setPassword($p["password"]);
                return $user;},$value);
 
            return count($result)>1 ? $result: $result["0"];
        }

    }             

?>