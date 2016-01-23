<?php 

/**
* This class is to manage a USER session with global variable $_SESSION
*/
class Session
{
    
    /**
     * Constructor
     * Create or restore a session
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Destroy the current session
     */
    public function sessionDestroy()
    {
        session_destroy();
    }

    public function sessionSetAttribut($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function sessionExistAttribut($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    public function sessionGetAtrribut($name)
    {
        if ($this->sessionExistAttribut($name)) {
            return $_SESSION[$name];
        } else {
            throw new Exception("'$name' attribut is missing in the current session");
        }
    }
}