<?php

require 'model/model.php';

class ModelPost extends Model 
{

    /**
     * This function return the list of differents posts of the blog, 
     * sort by the most recent post
     */
    function getPosts() 
    {   

       $db = getDb(); 

        //This is the query to get the different posts for the main page
        $strSQL = 'SELECT POST_ID as id, POST_DATE as date,            ' .
                  '       POST_TITLE as title, POST_CONTENT as content ' .
                  'FROM T_POST                                         ' .
                  'ORDER BY POST_ID DESC                               ';

        $posts = $this->executeQuery($strSQL);
        $posts->setFetchMode(PDO::FETCH_OBJ);

        return $posts;
    }

    /**
     * This function return a specific post of the blog
     */
    function getSpecificPost($idPost) 
    {   

       $db = getDb(); 

        //This is the query to get the different posts for the main page
        $strSQL = 'SELECT POST_ID as id, POST_DATE as date,            ' .
                  '       POST_TITLE as title, POST_CONTENT as content ' .
                  'FROM T_POST                                         ' .
                  'WHERE POST_ID = ?                                   ';

        $post = $this->executeQuery($strSQL, array($idPost));

        if($post->rowCount() == 1) {
            $post->setFetchMode(PDO::FETCH_OBJ);
            return $post->fetch();
        } else {
            throw new Exception("No post found...");
        }
    }

}
