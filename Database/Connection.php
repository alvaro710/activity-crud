<?php

class Connection {

    private $host;
    private $user;
    private $password;
    private $based;
    private $connection;

   
    
    public function __construct(){
        $this->host='localhost';
        $this->user='root';
        $this->password='';
        $this->based='mysql_crud';
    }
        
    public function connection(){
        $this->connection = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->based
        );

        $this->connection->set_charset("utf8");

        if(mysqli_connect_errno()){
            print("error de conexion");
        }
    }

    public function executeInstruction($sql){
        $result=mysqli_query($this->connection,$sql);
        $error = mysqli_error($this->connection);

        if(empty($error)){
            return $result;
        } else{
            throw new Exception($error);
        }
    }
    
}

/*$prueba = new Connection();
$prueba->connection();
$resultado=$prueba->executeInstruction('Select * from task');
var_dump(mysqli_fetch_array($resultado));
**/
?>