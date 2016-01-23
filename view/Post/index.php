<?php 
    $this->title = "My blog - " . $post->title;
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
          
<form method="post" action="index.php?action=comment">
    <input type="text" id="author" name="author" placeholder="Your Pseudo" required><br>
    <textarea name="content" id="txtcomment" cols="30" rows="10" 
        placeholder="Your Comment" required>
    </textarea><br>
    <input type="hidden" name="idpost" value="<?php echo $post->id;?>">
    <input type="submit" value="Comment">
</form>