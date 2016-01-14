<?php

require 'model.php';    

try {
    $posts = getPosts();   
    require 'viewMain.php';
}
catch (Exception $e) {
    $msgError = $e->getMessage();
    require 'viewError.php';
}
