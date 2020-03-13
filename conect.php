<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name="contacts";

// Create connection
$conn = new mysqli($servername, $username, $password,$database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
/*class Mysql {

    private $conn;

    function __construct(){
        $this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
            die("There was an issue connecting to the database");
    }

    function user_info($username){
        //query
        $query = "SELECT * FROM users WHERE username = ? LIMIT 1";

        //prepare query and execute
        if($stmt = $this->conn->prepare($query)){
            $stmt->bind_param('s', $username);
            $stmt->execute();


            $stmt->close();
            return $data;
        }
    }*/
?>