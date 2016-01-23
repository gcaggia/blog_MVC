<?php

require_once 'model/modelPost.class.php';
require_once 'view/view.class.php';

class controllerWelcome extends Controller
{
    private $modelPost;

    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->modelPost = new ModelPost();
    }

    /**
     * Print the list of all posts of the blog
     */
    public function index()
    {
        $posts = $this->modelPost->getPosts();
        $view->ctrlGenerateView(array('posts' => $posts));
    }   

}