<?php 

require 'model/model.class.php';

function fct_controller_welcome()
{
    $posts = getPosts();
    require 'view/viewMain.php';
}

function fct_controller_post($idPost)
{
    $post     = getSpecificPost($idPost);
    $comments = getComments($idPost);
    require 'view/viewPost.php';
}

function fct_controller_error($msgError)
{
    require 'view/viewError.php';
}
