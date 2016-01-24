<?php

require_once 'framework/controller.class.php';
require_once 'model/modelPost.class.php';

class ControllerWelcome extends Controller
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
        $this->ctrlGenerateView(array('posts' => $posts));
    }   

}