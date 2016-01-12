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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Welcome on my blog</title>
</head>
<body>
    <div id="global">
        <header>
            <a href="">
                <h1 id="blog_title">My Blog</h1>
            </a>
            <p>Welcome on this simple blog !</p>
        </header>
        <div id="content">
        

        <?php foreach ($posts as $post) : ?>
            <article>
                <header>
                    <h1 class="post_title"><?php echo $post->title; ?></h1>
                    <time><?php echo $post->date; ?></time>
                </header>
                <p><?php echo $post->content; ?></p>
            </article>
            <hr>
        <?php endforeach; ?>

            
        </div> <!-- #content -->
        
        <footer id="blog_footer">
            Blog performed with PHP, HTML5 and CSS.
        </footer>

    </div> <!-- #global -->
</body>
</html>
