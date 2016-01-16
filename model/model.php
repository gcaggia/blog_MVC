<?php 

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

    $posts = $db->query($strSQL);
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

    $post = $db->prepare($strSQL);
    $post->execute(array($idPost));

    if($post->rowCount() == 1) {
        $post->setFetchMode(PDO::FETCH_OBJ);
        return $post->fetch();
    } else {
        throw new Exception("No post found...");
    }
}


/**
 * This function return the list of differents posts of the blog, 
 * sort by the most recent post
 */
function getComments($idPost) 
{   

   $db = getDb(); 

    //This is the query to get the different Comments about a specific post
    $strSQL = 'SELECT COM_ID as id, COM_DATE as date,              ' .
              '       COM_AUTHOR as author, COM_CONTENT as content ' .
              'FROM T_COMMENT                                      ' .
              'WHERE POST_ID = ?                                   ';

    $Comments = $db->prepare($strSQL);
    $Comments->execute(array($idPost));
    $Comments->setFetchMode(PDO::FETCH_OBJ);

    return $Comments;
}

/**
 * This function is used to create a connexion to the database with PDO
 * @return PDO Object
 */
function getDb()
{
    //Access to the database using PDO
    $db = new PDO(
        'mysql:host=localhost;dbname=BLOG_MVC;charset=utf8',
        'root',
        'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );

    return $db;
}
