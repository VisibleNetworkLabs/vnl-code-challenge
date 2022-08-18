<?php
class dbfunctions
{
    private $conn;

    public function __construct()
    {
        $db = new dbconnect();
        $this->conn = $db->connect();
    }

    public function getNetwork($network_id)
    {
/* SELECT n.* FROM NETWORK n, USERS u WHERE */ 
/*  up.platform_id = $platformUserId AND */ 
/*  n.owner_id = u.user_id; */
        $stmt = $this->conn->prepare("SELECT * FROM network WHERE network_id = ?");
        $stmt->bind_param("i", $network_id);
        $result = $stmt->execute();

        if ($result) {
            $res = $stmt->get_result();
            $network = mysqli_fetch_assoc($res);
            return $network;
        } else {
            return false;
        }
    }

}

class dbconnect {
    // Connecting to database
    public function connect() {
        // Connecting to mysql database
        $this->conn = new mysqli('localhost', 'my_user', 'my_password', 'my_db');

        // return database handler
        return $this->conn;
    }
}

