<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div id="global">
        <header>
            <a href="<?php echo './'; ?>">
                <h1 id="blog_title">My Blog</h1>
            </a>
            <p>Welcome on this simple blog !</p>
        </header>
        <div id="content">
            <?php echo $content; ?>
        </div> <!-- #content -->
        
        <footer id="blog_footer">
            <p>Blog performed with PHP, HTML5 and CSS.</p>
        </footer>

    </div> <!-- #global -->
</body>
</html>