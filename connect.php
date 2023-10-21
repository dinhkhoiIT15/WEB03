<?php
class Connect
{
    public $server;
    public $dbName;
    public $username;
    public $password;

    public function __construct()
    {
        // $this->server = "localhost";
        // $this->username = "root";
        // $this->password = "";
        // $this->dbName = "atn_shop";

        $this->server = 'ckshdphy86qnz0bj.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        $this->dbName = 'adzaj04scixhvgtk';
        $this->username = 'adzaj04scixhvgtk';
        $this->password = 'ue71oory7a2g2c0i';
    }

    //Option 1: mySQL
    function connectToMySQL(): mysqli
    {
        $conn = new mysqli(
            $this->server,
            $this->username, $this->password, $this->dbName
        );

        if ($conn->connect_error) {
            die("Failed " . $conn->connect_error);
        } else {
            //echo "Connect!";
        }
        return $conn;
    }

    //Option 2: PDO
    function connectToPDO(): PDO
    {
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->dbName", $this->username, $this->password);
            //echo "Connect! PDO";
        } catch (PDOException $e) {
            die("Failed " . $e);
        }
        return $conn;
    }
}
?>