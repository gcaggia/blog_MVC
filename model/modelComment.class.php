<?php 

require_once 'model/model.class.php';

class modelComment extends Model 
{

    /**
     * This function return the list of differents posts of the blog, 
     * sort by the most recent post
     */
    function getComments($idPost) 
    {   

        //This is the query to get the different Comments about a specific post
        $strSQL = 'SELECT COM_ID as id, COM_DATE as date,              ' .
                  '       COM_AUTHOR as author, COM_CONTENT as content ' .
                  'FROM T_COMMENT                                      ' .
                  'WHERE POST_ID = ?                                   ';

        $comments = $this->executeQuery($strSQL, array($idPost));
        $comments->setFetchMode(PDO::FETCH_OBJ);

        return $comments;
    }

}
