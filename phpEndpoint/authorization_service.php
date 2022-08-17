<?php

include_once($_SERVER['PARTNER_INCLUDE_PATH'] . 'dbfunctions.php');
include_once($_SERVER['PARTNER_INCLUDE_PATH'] . 'platform/dbfunctions.php');
include_once($_SERVER['PARTNER_INCLUDE_PATH'] . 'permissions_service.php');

class AuthorizationService
{
    private $db;
    private $platformDb;
    private $user;
    private $userName;
    private $network;
    private $networkId;
    private $loggedOn;
    private $isOrg;
    private $org;
    private $permissionsService; // Instantiation of PermissionsService

    public function __construct()
    {
        $this->db = dbfunctions::getInstance();
        $this->platformDb = platformDbfunctions::getInstance();
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
        $isDev = strtolower($_SERVER['IS_DEV']) == 'true';
        if (
            isset($this->userName) &&
            (
                $_SESSION['timeout'] + $_SERVER['LOGIN_TIMEOUT'] > time() || 
                $isDev
            )
        ) {
            $this->loggedOn = true;
            $this->networkId = $_SESSION['network_id'];
            $this->isOrg = isset($_SESSION['is_org']) && $_SESSION['is_org'];
            $_SESSION['timeout'] = time();
            session_write_close();
            return true;
        } else if (
            isset($_SESSION['platform_logged_on']) && 
            (    
                $_SESSION['timeout'] + $_SERVER['LOGIN_TIMEOUT'] > time() ||
                $isDev
            )
        ){
            $_SESSION['timeout'] = time();
            session_write_close();
            return true;
        } else {
            $this->loggedOn = false;
            session_destroy();
            throw new UnauthorizedError();
        }
    }

    public function getCurrentNetwork()
    {
        if (!$this->loggedOn || !isset($this->networkId))
            throw new UnauthorizedError("No user logged in trying to load network");

        if (!isset($this->network)) {
            $this->network = $this->db->getCollaborative($this->networkId);
            if (!$this->network) {
                throw new UnauthorizedError();
            }
        }
        return $this->network;
    }
}
