<?php
class Connect
{
    public $server;
    public $dbName;
    public $username;
    public $password;

    public function __construct()
    {
        $this->server = "en1ehf30yom7txe7.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "nfj6474jfksqq86q";
        $this->password = "aj7ytel7ko2a56xa";
        $this->dbName = "lpwxwl4lo5jsitdw";
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