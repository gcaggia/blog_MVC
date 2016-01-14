<?php 

require 'model.php';

function fct_controller_welcome()
{
    $posts = getPosts();
    require 'viewMain.php';
}

function fct_controller_post($idPost)
{
    $post     = getSpecificPost($idPost);
    $comments = getComments($idPost);
    require 'viewPost.php';
}

function fct_controller_error($msgError)
{
    require 'viewError.php';
}
