<?php
include_once('./dbfunctions.php');

class AuthorizationService
{
    private $db;
    private $userName;
    private $network;
    private $userId;
    private $loggedOn;

    public function __construct()
    {
        $this->db = new dbfunctions();

        $_SESSION['logged_on'] = 'test@test.com';
        $_SESSION['timeout'] = time();
        $_SESSION['user_id'] = 1;
        $_SESSION['session_id'] = session_id();

        session_commit();
    }

    private static $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new AuthorizationService();

        return self::$instance;
    }

    public function validateLoggedIn()
    {
        if ($this->loggedOn === true)
            return true;
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userName = $_SESSION['logged_on'];
        if(isset($this->userName) && ($_SESSION['timeout'] + $_SERVER['LOGIN_TIMEOUT'] > time())) {
            $this->loggedOn = true;
            $this->userId = $_SESSION['user_id'];
            $_SESSION['timeout'] = time();
            session_write_close();
            return true;
        }  else {
            $this->loggedOn = false;
            session_destroy();
            throw new UnauthorizedError();
        }
    }

    public function getCurrentNetwork()
    {
        if (!$this->loggedOn || !isset($this->userId))
            throw new UnauthorizedError("No user logged in trying to load network");

        if (!isset($this->network)) {
            $this->network = $this->db->getNetwork($this->userId);
            if (!$this->network) {
                throw new UnauthorizedError();
            }
        }
        return $this->network;
    }
}

class UnauthorizedError extends Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message = "Unauthorized Access", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}

