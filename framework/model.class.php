<?php 

require_once 'configuration.class.php';

abstract class Model 
{

    //PDO Attribut to connect to the database
    private static $db;

    /**
     * Execute an SQL query and prepare it if necessary
     */
    protected function executeQuery($sqlCode, $params = null) 
    {
        if ($params == null) {
            $result = $this->getDb()->query($sqlCode);
        } else {
            $result = $this->getDb()->prepare($sqlCode); //prepared query
            $result->execute($params);
        }
        return $result;
    }

    /**
     * This function is used to create a connexion to the database with PDO
     * @return PDO Object
     */
    private function getDb()
    {   
        if (self::$db === null) {
            
            //recovery of configuration parameters to connect to the database
            $dsn      = Configuration::get("dsn");
            $login    = Configuration::get("login");
            $password = Configuration::get("password");

            //Creation of the connexion
            self::$db = new PDO( $dsn, $login, $password,  
                                 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                               );
        }
        
        return self::$db;
    }
}
