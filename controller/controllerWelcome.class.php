<?php

require_once 'model/modelPost.class.php';
require_once 'view/view.class.php';

class controllerWelcome 
{
    private $modelPost;


    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->modelPost = new ModelPost();
    }

    public function welcome()
    {
        $posts = $this->modelPost->getPosts();
        $view = new view('viewWelcome');
        $view->generate(array('posts' => $posts));
    }   

}