<?php 
    $title = "Welcome on my blog";
    ob_start();
?>
        
<p>An error has occured : <?php echo $msgError; ?></p>

<?php 
    $content = ob_get_clean(); 
    require 'template.php';
?>           
