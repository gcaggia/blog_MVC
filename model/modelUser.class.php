<?php

require_once 'framework/model.class.php';

/**
 * This class represent a user of the blog
 */
class ModelUser extends Model 
{

    /**
    * This function checks if a user exists inside the database
    */
    public function checkUser($login, $password)
    {
        $strSQL = "SELECT USER_ID          " .
                  "FROM T_USER             " .
                  "WHERE USER_PSEUDO   = ? " .
                  "  AND USER_PASSWORD = ? ";

        $user = $this->executeQuery($strSQL, array($login, $password));
        
        return ($user->rowCount() == 1);
    }

    /**
    * Return an existing user from the database
    */
    public function getUser($login, $password)
    {
        $strSQL = "SELECT USER_ID       as idUser,  " .
                  "       USER_PSEUDO   as login,   " .
                  "       USER_PASSWORD as password " .
                  "FROM T_USER                      " .
                  "WHERE USER_PSEUDO   = ?          " .
                  "  AND USER_PASSWORD = ?          ";
        
        $user = $this->executeQuery($strSQL, array($login, $password));
        $user->setFetchMode(PDO::FETCH_OBJ);

        if ($user->rowCount() == 1) {
            return $user->fetch(); // Accès à la première ligne de résultat
        } else {
            throw new Exception("This user does not exist...");
        }
    }

}