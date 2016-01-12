<?php
    //Access to the database using PDO
    $db = new PDO(
        'mysql:host=localhost;dbname=BLOG_MVC;charset=utf8',
        'root',
        'root'
    );

    //This is the query to get the different posts for the main page
    $strSQL = 'SELECT POST_ID as id, POST_DATE as date,            ' .
              '       POST_TITLE as title, POST_CONTENT as content ' .
              'FROM T_POST                                         ' .
              'ORDER BY POST_ID DESC                               ';

    $posts = $db->query($strSQL);
    $posts->setFetchMode(PDO::FETCH_OBJ);

require 'viewMain.php';



