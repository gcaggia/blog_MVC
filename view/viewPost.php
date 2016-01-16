<?php 
    $title = "My blog - " . $post->title;
    ob_start();
?>
        
<article>
    <header>
        <h1 class="post_title"><?php echo $post->title; ?></h1>
        <time><?php echo $post->date; ?></time>
    </header>
    <p><?php echo $post->content; ?></p>
</article>
<hr>

<header>
<h1 id="comment_title">Comments to <?php  echo $post->title;?> : </h1>
</header>
    <?php foreach ($comments as $comment) : ?>
        <p>
            <?php echo $comment->date  ; ?> -  
            <strong><?php echo $comment->author  ; ?> dit :</strong> 
        </p>
        <p class="comment_content">
            <?php echo $comment->content ; ?>
        </p>
    <?php endforeach; ?>   


<?php 
    $content = ob_get_clean(); 
    require 'template.php';
?>           
