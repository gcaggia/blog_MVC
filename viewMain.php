<?php 
    $title = "Welcome on my blog";
    ob_start();
?>
        
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

<?php 
    $content = ob_get_clean(); 
    require 'template.php';
?>           
