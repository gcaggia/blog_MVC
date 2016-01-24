<?php 

require_once 'framework/model.class.php';

class ModelComment extends Model 
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

    /**
     * this function is used to add a comment inside the table t_COMMENT of
     * the database
     */
    public function addComment($author, $content, $idPost)
    {
    	$strSQL = 'INSERT INTO T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, POST_ID) ' .
    	          'VALUES (?, ?, ?, ?)                                               ';

    	$date = date(DATE_W3C); // return the current date with W3C format
    	$this->executeQuery($strSQL, array($date, $author, $content, $idPost));
    }

    /**
     * Count number of comments and return it
     *
     * @return int Number of comments
     */
     public function getNbComments() 
     {
        $strSQL = 'select count(*) as nbComments from T_COMMENT';
        $result = $this->executeQuery($strSQL);
        
        $result->setFetchMode(PDO::FETCH_OBJ);

        return $result->nbComments;
     }

}
