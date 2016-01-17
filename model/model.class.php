<?php 


abstract class Model 
{

    //PDO Attribut to connect to the database
    private $db;

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
        if ($this->db == null) {

            //Creation of the connexion
            $this->db = new PDO(
                    'mysql:host=localhost;dbname=BLOG_MVC;charset=utf8',
                    'root',
                    'root', 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
                );

        }
        return $this->db;
    }
}