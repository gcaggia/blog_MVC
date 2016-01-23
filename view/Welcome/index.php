<?php 
    $this->title = "Welcome on my blog";
?>
        
<?php foreach ($posts as $post) : ?>
    <article>
        <header>

            <a href="post/index/<?php echo $post->id; ?>">
                <h1 class="post_title"><?php echo $post->title; ?></h1>
            </a>
            <time><?php echo $post->date; ?></time>
        </header>
        <p><?php echo $post->content; ?></p>
    </article>
    <hr>
<?php endforeach; ?>
