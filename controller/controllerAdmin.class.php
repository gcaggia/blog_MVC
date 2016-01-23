<?php

require_once 'controllerSecure.class.php';
require_once 'model/modelPost.class.php';
require_once 'model/modelComment.class.php';


/**
 * Controller for Admin Page
 */
class controllerPost extends controllerSecure
{
    private $modelPost;
    private $modelComment;

    /**
     * Class Constructor
     */
    public function __construct()
    {
        $this->modelPost    = new ModelPost();
        $this->modelComment = new ModelComment();
    }

    /**
     * Print out a specific post 
     */
    public function index()
    {
        $nbPosts    = $this->modelPost->getNbPosts();
        $nbComments = $this->modelComment->getNbComments();

        //ctrlRequest attribute is in the mother Class controller
        $login = $this->ctrlRequest->requestGetSession()
                 ->sessionGetAtrribut('login');

        $this->ctrlGenerateView(array('nbPosts'    => $nbPosts, 
                                      'nbComments' => $nbComments,
                                      'login'      => $login));
    }

    /**
     * This function add a commont to a post
     */
    public function comment()
    {   

        $author  = $this->ctrlRequest->requestGetParam("author");
        $content = $this->ctrlRequest->requestGetParam("content");
        $idPost  = $this->ctrlRequest->requestGetParam("idpost");

        //Data saving
        $this->modelComment->addComment($author, $content, $idPost);

        //Updating of the view
        $this->ctrlExecuteAction("index");
    }
}