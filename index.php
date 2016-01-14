<?php

require 'model.php';    

try {
    $posts = getPosts();   
    require 'viewMain.php';
}
catch (Exception $e) {
    echo '<html><body>An error has occured ! ' .  
         $e->getMessage() . ' </body></html>';
}
